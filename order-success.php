<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success - Canteen Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="anime-decoration top-left"></div>
    <div class="anime-decoration top-right"></div>
    <div class="anime-decoration bottom-left"></div>
    <div class="anime-decoration bottom-right"></div>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-utensils me-2"></i>
                Canteen Management
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-home me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php">
                            <i class="fas fa-utensils me-1"></i> Menu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="orders.php">
                            <i class="fas fa-shopping-cart me-1"></i> Orders
                        </a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <span class="text-white me-3">
                        <i class="fas fa-user me-1"></i>
                        <span id="currentUser">Guest</span>
                    </span>
                    <button class="btn btn-outline-light" onclick="logout()">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                        </div>
                        <h2 class="card-title">Order Placed Successfully!</h2>
                        <p class="text-muted">Your order has been received and is being processed.</p>
                        
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <i class="fas fa-receipt me-2"></i>Order Details
                                        </h5>
                                        <div id="orderDetails">
                                            <!-- Order details will be loaded here -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <i class="fas fa-qrcode me-2"></i>Order QR Code
                                        </h5>
                                        <div id="qrCode" class="text-center">
                                            <!-- QR code will be generated here -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-primary me-2" onclick="window.location.href='menu.php'">
                                <i class="fas fa-utensils me-1"></i>Order More
                            </button>
                            <button class="btn btn-outline-primary" onclick="window.location.href='orders.php'">
                                <i class="fas fa-list me-1"></i>View Orders
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode-generator@1.4.4/qrcode.min.js"></script>
    <script src="js/app.js"></script>
    <script>
        // Get order ID from URL
        const urlParams = new URLSearchParams(window.location.search);
        const orderId = urlParams.get('orderId');

        // Load current user
        const currentUser = localStorage.getItem('currentUser');
        if (currentUser) {
            document.getElementById('currentUser').textContent = currentUser;
        }

        // Load order details
        function loadOrderDetails() {
            const orders = JSON.parse(localStorage.getItem('orders')) || [];
            const order = orders.find(o => o.id === orderId);

            if (order) {
                const orderDetails = document.getElementById('orderDetails');
                orderDetails.innerHTML = `
                    <p class="mb-1"><strong>Order ID:</strong> ${order.id}</p>
                    <p class="mb-1"><strong>Date:</strong> ${new Date(order.date).toLocaleString()}</p>
                    <p class="mb-1"><strong>Status:</strong> <span class="badge bg-success">${order.status}</span></p>
                    <p class="mb-1"><strong>Total:</strong> $${order.total.toFixed(2)}</p>
                    <hr>
                    <h6 class="mb-2">Items:</h6>
                    <ul class="list-unstyled">
                        ${order.items.map(item => `
                            <li class="mb-1">${item.name} - $${item.price.toFixed(2)}</li>
                        `).join('')}
                    </ul>
                `;

                // Generate QR code
                const qr = qrcode(0, 'L');
                qr.addData(order.id);
                qr.make();
                document.getElementById('qrCode').innerHTML = qr.createImgTag(4);
            }
        }

        function logout() {
            localStorage.removeItem('currentUser');
            localStorage.removeItem('userType');
            window.location.href = 'login.php';
        }

        // Initialize
        loadOrderDetails();
    </script>
</body>
</html> 
<!-- Removed duplicate HTML document -->