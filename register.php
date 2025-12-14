<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Canteen Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, var(--primary-red), var(--primary-green));
            font-family: 'Poppins', sans-serif;
        }

        .register-container {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            margin: 2rem auto;
        }

        .register-logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .register-logo i {
            font-size: 3rem;
            color: var(--primary-red);
        }

        .form-control {
            border-radius: 10px;
            padding: 0.8rem;
            margin-bottom: 1rem;
        }

        .btn-register {
            width: 100%;
            padding: 0.8rem;
            border-radius: 10px;
            font-weight: 600;
            background: var(--primary-red);
            border: none;
        }

        .btn-register:hover {
            background: var(--primary-green);
        }

        .login-link {
            text-align: center;
            margin-top: 1rem;
        }

        .login-link a {
            color: var(--primary-red);
            text-decoration: none;
        }

        .login-link a:hover {
            color: var(--primary-green);
        }
    </style>
</head>
<body>
    <div class="anime-decoration top-left"></div>
    <div class="anime-decoration top-right"></div>
    <div class="anime-decoration bottom-left"></div>
    <div class="anime-decoration bottom-right"></div>

    <div class="register-container">
        <div class="register-logo">
            <i class="fas fa-utensils"></i>
            <h2 class="mt-3">Create Account</h2>
        </div>
        <form id="registerForm">
            <div class="mb-3">
                <input type="text" class="form-control" id="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" id="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-register">Register</button>
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Store user info in localStorage
            localStorage.setItem('currentUser', document.getElementById('username').value);
            // Redirect to main page
            window.location.href = 'index.php';
        });
    </script>
</body>
</html>

