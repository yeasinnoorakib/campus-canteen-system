<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History - Canteen Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .order-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .order-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .order-header {
            background: linear-gradient(45deg, var(--primary-red), #ff6b6b);
            color: white;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .order-id {
            font-weight: 600;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .order-date {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .order-items {
            padding: 1.5rem;
        }

        .item-row {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid var(--gray-200);
            transition: background-color 0.3s ease;
        }

        .item-row:last-child {
            border-bottom: none;
        }

        .item-row:hover {
            background-color: var(--gray-100);
        }

        .item-image {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            object-fit: cover;
            margin-right: 1rem;
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 0.25rem;
        }

        .item-quantity {
            color: var(--gray-600);
            font-size: 0.9rem;
        }

        .item-price {
            font-weight: 600;
            color: var(--primary-red);
        }

        .order-summary {
            background-color: var(--gray-100);
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--gray-200);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            color: var(--gray-700);
        }

        .summary-row.total {
            font-weight: 600;
            color: var(--gray-900);
            font-size: 1.1rem;
            border-top: 1px solid var(--gray-300);
            padding-top: 0.5rem;
            margin-top: 0.5rem;
        }

        .empty-orders {
            text-align: center;
            padding: 3rem 1rem;
        }

        .empty-orders i {
            font-size: 4rem;
            color: var(--gray-400);
            margin-bottom: 1rem;
        }

        .empty-orders h3 {
            color: var(--gray-700);
            margin-bottom: 0.5rem;
        }

        .empty-orders p {
            color: var(--gray-600);
            margin-bottom: 1.5rem;
        }

        .status-badge {
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
        }

        .order-actions {
            display: flex;
            gap: 1rem;
            padding: 1rem 1.5rem;
            background-color: var(--white);
        }

        .btn-reorder {
            background: var(--primary-red);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-reorder:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-track {
            background: transparent;
            color: var(--primary-red);
            border: 1px solid var(--primary-red);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-track:hover {
            background: var(--primary-red);
            color: white;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="anime-decoration top-left"></div>
    <div class="anime-decoration top-right"></div>
    <div class="anime-decoration bottom-left"></div>
    <div class="anime-decoration bottom-right"></div>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-utensils"></i> Canteen Management
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="orders.php">Orders</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <span class="text-white me-3">
                        <i class="fas fa-user"></i>
                        <span id="currentUser">Guest</span>
                    </span>
                    <button class="btn btn-outline-light" onclick="logout()">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5 pt-4">
        <div class="row mb-4">
            <div class="col">
                <h2 class="mb-4">
                    <i class="fas fa-history"></i> Order History
                </h2>
                
                <div class="order-filters">
                    <button class="filter-btn active" onclick="filterOrders('all')">
                        All Orders
                    </button>
                    <button class="filter-btn" onclick="filterOrders('pending')">
                        Pending
                    </button>
                    <button class="filter-btn" onclick="filterOrders('preparing')">
                        Preparing
                    </button>
                    <button class="filter-btn" onclick="filterOrders('ready')">
                        Ready
                    </button>
                    <button class="filter-btn" onclick="filterOrders('completed')">
                        Completed
                    </button>
                </div>
            </div>
        </div>

        <div id="orderHistory">
            <!-- Orders will be loaded here dynamically -->
            <div class="empty-orders">
                <i class="fas fa-shopping-bag"></i>
                <h3>No Orders Yet</h3>
                <p>Your order history will appear here once you place an order.</p>
                <a href="menu.php" class="btn btn-primary">
                    <i class="fas fa-utensils"></i> Browse Menu
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap Modal for Order Tracking -->
    <div class="modal fade" id="trackingModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-truck"></i> Track Order
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="tracking-timeline">
                        <!-- Tracking info will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
    <script>
        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            loadOrderHistory();
            
            // Update current user display
            const currentUser = localStorage.getItem('currentUser');
            if (!currentUser) {
                window.location.href = 'login.php';
                return;
            }
            document.getElementById('currentUser').textContent = currentUser;
        });
    </script>
</body>
</html> 