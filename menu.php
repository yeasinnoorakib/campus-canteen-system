    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu - Canteen Management System</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <style>
            .menu-container {
                max-width: 1200px;
                margin: 100px auto 0;
                padding: 2rem;
            }

            .category-filters {
                display: flex;
                gap: 1rem;
                margin-bottom: 2rem;
                flex-wrap: wrap;
            }

            .filter-btn {
                padding: 0.5rem 1rem;
                border: 1px solid var(--secondary-color);
                border-radius: 20px;
                background: white;
                color: var(--secondary-color);
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .filter-btn.active {
                background: var(--secondary-color);
                color: white;
            }

            .menu-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 2rem;
            }

            .menu-item {
                background: white;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                transition: transform 0.3s ease;
            }

            .menu-item:hover {
                transform: translateY(-5px);
            }

            .menu-item img {
                width: 100%;
                height: 200px;
                object-fit: cover;
            }

            .menu-item-content {
                padding: 1.5rem;
            }

            .menu-item h3 {
                margin-bottom: 0.5rem;
                color: var(--primary-color);
            }

            .menu-item p {
                color: var(--text-color);
                margin-bottom: 1rem;
            }

            .menu-item-price {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .price {
                font-size: 1.2rem;
                font-weight: bold;
                color: var(--accent-color);
            }

            .add-to-cart {
                padding: 0.5rem 1rem;
                background: var(--secondary-color);
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background 0.3s ease;
            }

            .add-to-cart:hover {
                background: var(--accent-color);
            }
        </style>
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
                            <a class="nav-link active" href="menu.php">
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
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-clock me-2"></i>Current Menu Type
                            </h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 id="currentMenuType" class="mb-0">Loading...</h3>
                                <span class="badge bg-primary" id="userTypeBadge">Guest</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-shopping-cart me-2"></i>Cart Summary
                            </h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Items: <span id="cartCount">0</span></span>
                                <span>Total: ¥<span id="cartTotal">0.00</span></span>
                                <button class="btn btn-primary" onclick="viewCart()">
                                    <i class="fas fa-shopping-cart me-1"></i>View Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-filter me-2"></i>Filter Menu
                            </h5>
                            <div class="list-group">
                                <button class="list-group-item list-group-item-action active" onclick="filterMenu('all')">
                                    All Items
                                </button>
                                <button class="list-group-item list-group-item-action" onclick="filterMenu('breakfast')">
                                    Breakfast
                                </button>
                                <button class="list-group-item list-group-item-action" onclick="filterMenu('lunch')">
                                    Lunch
                                </button>
                                <button class="list-group-item list-group-item-action" onclick="filterMenu('dinner')">
                                    Dinner
                                </button>
                                <button class="list-group-item list-group-item-action" onclick="filterMenu('snacks')">
                                    Snacks
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row" id="menuItems">
                        <!-- Menu items will be loaded here -->
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/app.js"></script>
        <script>
            // Sample menu data
            const menuData = {
                breakfast: [
                    { id: 1, name: 'Full English Breakfast', price: 8.99, image: 'images/breakfast1.jpg', available: true },
                    { id: 2, name: 'Pancakes with Syrup', price: 6.99, image: 'images/egg-pancake-adailyfood.jpg', available: true },
                    { id: 3, name: '粥(Zhōu)Rice Porridge', price: 7.99, image: 'images/粥 (Zhōu) – Rice Porridge.jpg', available: true }
                ],
                lunch: [
                    { id: 4, name: 'Chicken Leg Curry', price: 9.99, image: 'images/Chicken Leg Curry.jpg', available: true },
                    { id: 5, name: 'Veggie Dumplings Soup-蔬菜汤饺子(Shūcài Tāng Jiǎozi)', price: 8.99, image: 'images/pexels-momo-king-3616480-5409015.jpg', available: true },
                    { id: 6, name: 'Shrimp Lo Mein(虾仁捞面)', price: 10.99, image: 'images/Shrimp Lo Mein (虾仁捞面).jpg', available: true },
                    { id: 7, name: 'Beef Tripe(牛肚炒菜)', price: 9.99, image: 'images/Beef Tripe (牛肚炒菜).jpg', available: true },
                    { id: 8, name: 'Roast Duck-烤鸭(Kǎo yā)', price: 8.99, image: 'images/Roast Duck - 烤鸭 (Kǎo yā).jpg', available: true },
                    { id: 9, name: 'Kung Pao Chicken-宫保鸡丁(Gōng bǎo jī dīng)', price: 10.99, image: 'images/Kung Pao Chicken - 宫保鸡丁 (Gōng bǎo jī dīng).jpeg', available: true }
                ],
                dinner: [
                    { id: 10, name: 'Sweet & Sour Chicken(糖醋鸡-Táng cù jī)', price: 12.99, image: 'images/Sweet & Sour Chicken (糖醋鸡 - Táng cù jī).jpeg', available: true },
                    { id: 11, name: 'Sizzling Hotplate Beef(铁板牛肉-Tiě bǎn niú ròu)', price: 9.99, image: 'images/Sizzling Hotplate Beef (铁板牛肉 - Tiě bǎn niú ròu).jpeg', available: true },
                    { id: 12, name: 'Seafood Chow Mein(海鲜炒面-Hǎi xiān chǎo miàn)', price: 11.99, image: 'images/Seafood Chow Mein (海鲜炒面 - Hǎi xiān chǎo miàn).jpeg', available: true }
                ],
                snacks: [
                    { id: 13, name: 'Zha Liang(炸两)', price: 3.99, image: 'images/Zha Liang (炸两).jpeg', available: true },
                    { id: 14, name: 'Sweet Osmanthus Cake(桂花糕)', price: 5.99, image: 'images/Sweet Osmanthus Cake (桂花糕).jpeg', available: true },
                    { id: 15, name: 'Sticky Rice Rolls(糯米卷)', price: 4.99, image: 'images/Sticky Rice Rolls (糯米卷.jpeg', available: true }
                ]
            };

            // Initialize cart
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            updateCartDisplay();

            // Load current user and menu type
            const currentUser = localStorage.getItem('currentUser');
            const userType = localStorage.getItem('userType') || 'guest';
            
            if (currentUser) {
                document.getElementById('currentUser').textContent = currentUser;
            }
            
            document.getElementById('userTypeBadge').textContent = userType.charAt(0).toUpperCase() + userType.slice(1);

            function updateTime() {
                const now = new Date();
                const hour = now.getHours();
                let menuType = '';
                
                if (hour >= 6 && hour < 11) menuType = 'Breakfast';
                else if (hour >= 11 && hour < 15) menuType = 'Lunch';
                else if (hour >= 15 && hour < 19) menuType = 'Dinner';
                else menuType = 'Snacks';
                
                document.getElementById('currentMenuType').textContent = menuType;
                filterMenu(menuType.toLowerCase());
            }

            function filterMenu(type) {
                const menuItems = document.getElementById('menuItems');
                let items = [];
                
                if (type === 'all') {
                    items = [...menuData.breakfast, ...menuData.lunch, ...menuData.dinner, ...menuData.snacks];
                } else {
                    items = menuData[type] || [];
                }

                menuItems.innerHTML = items.map(item => `
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="${item.image}" class="card-img-top" alt="${item.name}">
                            <div class="card-body">
                                <h5 class="card-title">${item.name}</h5>
                                <p class="card-text">$${item.price.toFixed(2)}</p>
                                <button class="btn btn-primary w-100" onclick="addToCart(${item.id})" ${!item.available ? 'disabled' : ''}>
                                    <i class="fas fa-plus me-1"></i>Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                `).join('');
            }

            function addToCart(itemId) {
                // Find the item in menu data
                let item = null;
                for (const category of Object.values(menuData)) {
                    const found = category.find(i => i.id === itemId);
                    if (found) {
                        item = found;
                        break;
                    }
                }

                if (item) {
                    cart.push(item);
                    localStorage.setItem('cart', JSON.stringify(cart));
                    updateCartDisplay();
                }
            }

            function updateCartDisplay() {
                document.getElementById('cartCount').textContent = cart.length;
                const total = cart.reduce((sum, item) => sum + item.price, 0);
                document.getElementById('cartTotal').textContent = total.toFixed(2);
            }

            function viewCart() {
                window.location.href = 'cart.php';
            }

            function logout() {
                localStorage.removeItem('currentUser');
                localStorage.removeItem('userType');
                window.location.href = 'login.php';
            }

            // Initialize
            updateTime();
            setInterval(updateTime, 60000); // Update every minute
        </script>
    </body>
    </html>
