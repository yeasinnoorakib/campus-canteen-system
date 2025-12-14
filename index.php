<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ChopStix Canteen🥢</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <script>

    </script>

    <div class="anime-decoration top-left"></div>
    <div class="anime-decoration top-right"></div>
    <div class="anime-decoration bottom-left"></div>
    <div class="anime-decoration bottom-right"></div>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-utensils me-2"></i>
                ChopStix Canteen🥢
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">
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
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-clock me-2"></i>Current Time
                        </h5>
                        <h2 id="currentTime" class="text-center"></h2>
                        <p id="currentMenuType" class="text-center text-muted"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-user-tag me-2"></i>Select User Type
                        </h5>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <button class="btn btn-outline-primary w-100" onclick="selectUserType('employee')">
                                    <i class="fas fa-user-tie me-2"></i>Employee
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-outline-success w-100" onclick="selectUserType('staff')">
                                    <i class="fas fa-user-graduate me-2"></i>Staff
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-outline-warning w-100" onclick="selectUserType('contract')">
                                    <i class="fas fa-hard-hat me-2"></i>Contract
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-outline-info w-100" onclick="selectUserType('guest')">
                                    <i class="fas fa-user me-2"></i>Guest
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-info-circle me-2"></i>Rules & Information
                        </h5>
                        <div id="rulesContent">
                            <!-- Rules will be loaded based on user type -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-map-marker-alt me-2"></i>Available Canteens
                        </h5>
                        <div class="list-group" id="canteenList">
                            <!-- Canteen list will be loaded here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-utensils me-2"></i>Today's Menu
                            <div class="text-end mt-3">
                                <a href="menu.php" class="btn btn-primary">
                                  <i class="fas fa-arrow-right me-2"></i>View Full Menu
                                </a>
                              </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5><i class="fas fa-info-circle me-2"></i>About Us</h5>
                    <p>Providing delicious meals with quick service and excellent quality.</p>
                </div>
                <div class="col-md-4">
                    <h5><i class="fas fa-link me-2"></i>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php"><i class="fas fa-chevron-right me-2"></i>Menu</a></li>
                        <li><a href="order.php"><i class="fas fa-chevron-right me-2"></i>Place Order</a></li>
                        <li><a href="track-order.php"><i class="fas fa-chevron-right me-2"></i>Track Order</a></li>
                        <li><a href="admin.php"><i class="fas fa-chevron-right me-2"></i>Admin</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5><i class="fas fa-address-card me-2"></i>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-phone me-2"></i> +86 15 755 003 513</li>
                        <li><i class="fas fa-envelope me-2"></i> ayoubbrouzi001@gmail.com</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> 123 Food Street, City</li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-4">
                <p>&copy; 2025 Canteen Management System. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode-generator@1.4.4/qrcode.min.js"></script>
    <script src="js/app.js"></script>
    <script>
        // Update current time every second
        function updateTime() {
            const now = new Date();
            document.getElementById('currentTime').textContent = now.toLocaleTimeString();
            
            // Determine menu type based on time
            const hour = now.getHours();
            let menuType = '';
            if (hour >= 6 && hour < 11) menuType = 'Breakfast';
            else if (hour >= 11 && hour < 16) menuType = 'Lunch';
            else if (hour >= 16 && hour < 19) menuType = 'Dinner';
            else menuType = 'Closed';
            
            document.getElementById('currentMenuType').textContent = menuType;
        }
        
        setInterval(updateTime, 1000);
        updateTime();

        // Load current user from localStorage
        const currentUser = localStorage.getItem('currentUser');
        if (currentUser) {
            document.getElementById('currentUser').textContent = currentUser;
        }

        function logout() {
            localStorage.removeItem('currentUser');
            window.location.href = 'login.php';
        }

        function selectUserType(type) {
            // Store selected user type
            localStorage.setItem('userType', type);
            
            // Update UI based on user type
            updateRules(type);
            updateMenu(type);
        }

        function updateRules(type) {
            const rules = {
                employee: [
                    'Pre-paid balance available',
                    'Access to all meal types',
                    'Special employee discounts',
                    'Monthly meal allowance'
                ],
                staff: [
                    'Post-paid billing',
                    'Access to all meal types',
                    'Monthly billing cycle',
                    'Department-based limits'
                ],
                contract: [
                    'Pre-paid balance required',
                    'Basic meal access',
                    'Daily spending limits',
                    'Contract period validity'
                ],
                guest: [
                    'Cash payment only',
                    'Limited menu access',
                    'No discounts available',
                    'Visitor pass required'
                ]
            };

            const rulesContent = document.getElementById('rulesContent');
            rulesContent.innerHTML = `
                <ul class="list-group list-group-flush">
                    ${rules[type].map(rule => `
                        <li class="list-group-item">
                            <i class="fas fa-check-circle text-success me-2"></i>${rule}
                        </li>
                    `).join('') }
                </ul>
            `;
        }

        function updateMenu(type) {
            const menuContent = document.getElementById('menuContent');
            // This will be replaced with actual menu data
            menuContent.innerHTML = `
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Menu will be displayed based on current time and user type.
                </div>
            `;
        }
    </script>
</body>
</html>
