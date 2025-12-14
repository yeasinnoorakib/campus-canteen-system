<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Today's Menu</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }
    .navbar {
      background-color: #343a40;
    }
    .navbar-brand {
      color: #ffffff !important;
    }
    .navbar-light .navbar-nav .nav-link {
      color: #ffffff !important;
    }
    .navbar-light .navbar-nav .nav-link:hover {
      color: #f1c40f !important;
    }
    .header-title {
      text-align: center;
      color: #343a40;
      padding: 30px 0;
      font-size: 3rem;
      font-weight: bold;
    }
    .card-deck {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
    }
    .card {
      margin: 15px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .card img {
      border-radius: 10px 10px 0 0;
    }
    .card-body {
      background-color: #ffffff;
      border-radius: 0 0 10px 10px;
      padding: 15px;
    }
    .card-title {
      font-size: 1.5rem;
      font-weight: bold;
      color: #2d3436;
    }
    .card-text {
      font-size: 1.1rem;
      color: #636e72;
    }
    .btn-primary {
      background-color: #f1c40f;
      border: none;
      color: #ffffff;
      font-weight: bold;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 1rem;
    }
    .btn-primary:hover {
      background-color: #e67e22;
    }
    .footer {
      background-color: #343a40;
      color: #ffffff;
      text-align: center;
      padding: 15px;
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">Restaurant</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Back to Home</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Header for Today's Menu -->
  <div class="header-title">
    <h2>Today's Special Menu</h2>
    <p>Explore the best dishes selected just for today!</p>
  </div>

  <!-- Today's Menu Section -->
  <div class="container">
    <div class="card-deck" id="todayMenuItems"></div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <p>&copy; 2025 Restaurant - All Rights Reserved</p>
  </div>

  <script>
    // Full menu data (can be replaced with your actual menu data)
    const menuData = {
      breakfast: [
        { id: 1, name: "Pancakes", price: 5.99, image: "https://via.placeholder.com/300x200" },
        { id: 2, name: "Omelette", price: 6.49, image: "https://via.placeholder.com/300x200" }
      ],
      lunch: [
        { id: 6, name: "Chicken Salad", price: 8.99, image: "https://via.placeholder.com/300x200" },
        { id: 7, name: "Grilled Cheese Sandwich", price: 5.49, image: "https://via.placeholder.com/300x200" }
      ],
      dinner: [
        { id: 11, name: "Spaghetti Bolognese", price: 12.99, image: "https://via.placeholder.com/300x200" },
        { id: 12, name: "Steak and Fries", price: 14.99, image: "https://via.placeholder.com/300x200" }
      ],
      snacks: [
        { id: 16, name: "Fries", price: 3.99, image: "https://via.placeholder.com/300x200" },
        { id: 17, name: "Nachos", price: 4.49, image: "https://via.placeholder.com/300x200" }
      ]
    };

    // Function to update menu based on the time of day
    function getTodaysMenu() {
      const now = new Date();
      const hour = now.getHours();
      let mealType = '';

      // Determine the meal based on the time of day
      if (hour >= 6 && hour < 11) mealType = 'breakfast';
      else if (hour >= 11 && hour < 15) mealType = 'lunch';
      else if (hour >= 15 && hour < 19) mealType = 'dinner';
      else mealType = 'snacks';

      return mealType;
    }

    // Function to display today's menu items
    function displayTodaysMenu() {
      const mealType = getTodaysMenu();
      const menuItems = menuData[mealType];
      const todayMenuContainer = document.getElementById('todayMenuItems');

      todayMenuContainer.innerHTML = ''; // Clear previous items

      menuItems.forEach(item => {
        const menuItemDiv = document.createElement('div');
        menuItemDiv.classList.add('card', 'col-md-4');
        menuItemDiv.innerHTML = `
          <img src="${item.image}" class="card-img-top" alt="${item.name}">
          <div class="card-body">
            <h5 class="card-title">${item.name}</h5>
            <p class="card-text">$${item.price.toFixed(2)}</p>
            <button class="btn btn-primary" onclick="addToCart(${item.id})">Add to Cart</button>
          </div>
        `;
        todayMenuContainer.appendChild(menuItemDiv);
      });
    }

    // Function to handle adding items to the cart
    function addToCart(itemId) {
      alert('Item added to cart: ' + itemId);
    }

    // Display the menu when the page is loaded
    window.onload = displayTodaysMenu;
  </script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
