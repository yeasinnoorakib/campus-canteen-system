<?php
// ===== Bagian PHP (di atas tag <!DOCTYPE>) =====
require('config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);

    $email = $data['email'] ?? '';
    $password = $data['password'] ?? '';

    if (empty($email) || empty($password)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Please fill in all fields']);
        exit();
    }

    // Cek koneksi ke database menggunakan MySQLi
    if (!$koneksi) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Database connection failed']);
        exit();
    }

    try {
        // Gunakan MySQLi untuk query
        $stmt = $koneksi->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);  // bind email sebagai parameter (tipe string)
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Cek password (sesuaikan dengan hash jika perlu)
        if ($user && $password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];

            echo json_encode([
                'success' => true,
                'message' => 'Login successful',
                'redirect' => $user['role'] === 'admin' ? 'index.php' : 'index.php'
            ]);
        } else {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Invalid email or password']);
        }
    } catch (Exception $e) {
        error_log("Login error: " . $e->getMessage());
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'An error occurred. Please try again.']);
    }

    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Canteen Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-wrapper position-relative">
        <div class="anime-decoration top-left"></div>
        <div class="anime-decoration top-right"></div>
        <div class="anime-decoration bottom-left"></div>
        <div class="anime-decoration bottom-right"></div>
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-6 col-lg-4">
                    <div class="card login-card">
                        <div class="card-body">
                            <h2 class="login-title text-center">Welcome Back</h2>
                            <form id="loginForm">
                                <div class="mb-4">
                                    <label for="username" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="username" required>
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" required>
                                </div>
                                <div class="d-grid gap-3">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                    <a href="register.php" class="btn btn-outline-primary">Register</a>
                                </div>
                            </form>
                            <div id="message" class="mt-3 text-danger text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById("loginForm").addEventListener("submit", function(e) {
        e.preventDefault();

        const email = document.getElementById("username").value;
        const password = document.getElementById("password").value;

        fetch(window.location.href, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ email, password })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                window.location.href = data.redirect;
            } else {
                document.getElementById("message").textContent = data.message;
            }
        })
        .catch(error => {
            document.getElementById("message").textContent = "Login failed. Please try again.";
            console.error("Login error:", error);
        });
    });
    </script>
</body>
</html>
