<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Shopping Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/qrcode@1.4.4/build/qrcode.min.js"></script>
  <style>
    body {
      background-color: #f4f4f9;
    }
    .cart-item {
      display: flex;
      justify-content: space-between;
      padding: 10px;
      border-bottom: 1px solid #ddd;
      background-color: white;
      margin-bottom: 10px;
      border-radius: 8px;
    }
    .cart-item img {
      width: 80px;
      height: 80px;
      object-fit: cover;
    }
    .cart-item-details {
      flex: 1;
      padding-left: 10px;
    }
    .cart-item-details h5 {
      margin: 0;
      font-size: 16px;
      color: #333;
    }
    .cart-item-details .price {
      color: #777;
      font-size: 14px;
    }
    .cart-item-actions button {
      background-color: #e74c3c;
      border: none;
      color: white;
      padding: 5px 10px;
      border-radius: 5px;
    }
    .order-summary {
      margin-top: 30px;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .btn-place-order {
      background-color: #27ae60;
      border: none;
      padding: 12px 20px;
      font-size: 18px;
      color: white;
      border-radius: 8px;
      width: 100%;
    }
    .btn-place-order:hover {
      background-color: #2ecc71;
    }
    #orderConfirmation {
      display: none;
      text-align: center;
      padding: 30px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-top: 30px;
    }
    #qrcode {
      margin-top: 20px;
    }
  </style>
</head>
<body>

<div class="container">
  <h2 class="my-4 text-center">Your Shopping Cart</h2>

  <div class="cart-items-container">
    <div id="cartItems"></div>
  </div>

  <div class="order-summary">
    <table class="table">
      <tr>
        <td><strong>Total:</strong></td>
        <td><span id="total">$0.00</span></td>
      </tr>
    </table>
    <button id="placeOrder" class="btn btn-place-order">Place Order</button>
  </div>

  <div id="orderConfirmation">
    <h4>Your Order Has Been Placed</h4>
    <p><strong>Order Number: <span id="orderNumber"></span></strong></p>
    <div id="qrcode"></div>
  </div>
</div>

<script>
  let cart = [];

  // Load cart from localStorage
  function loadCart() {
    const storedCart = localStorage.getItem('cart');
    if (storedCart) {
      try {
        cart = JSON.parse(storedCart);
        // Ensure each item has a valid quantity
        cart.forEach(item => {
          if (!item.quantity || item.quantity <= 0) {
            item.quantity = 1; // Default quantity to 1 if missing or invalid
          }
        });
      } catch (e) {
        console.error('Cart JSON parse error:', e);
        cart = [];
      }
    }
  }

  function updateCartDisplay() {
    const cartItems = document.getElementById('cartItems');
    cartItems.innerHTML = '';
    let total = 0;

    if (cart.length === 0) {
      cartItems.innerHTML = '<p>Your cart is empty.</p>';
    }

    cart.forEach((item, index) => {
      console.log('Cart Item:', item);  // Debugging line
      const itemTotal = item.price * item.quantity;
      total += itemTotal;

      const cartItem = document.createElement('div');
      cartItem.classList.add('cart-item');
      cartItem.innerHTML = `
        <img src="${item.image}" alt="${item.name}">
        <div class="cart-item-details">
          <h5>${item.name}</h5>
          <p class="price">$${item.price.toFixed(2)} x ${item.quantity}</p>
        </div>
        <div class="cart-item-actions">
          <button onclick="removeItem(${index})">Remove</button>
        </div>
      `;
      cartItems.appendChild(cartItem);
    });

    document.getElementById('total').textContent = `$${total.toFixed(2)}`;
  }

  function removeItem(index) {
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartDisplay();
  }

  document.getElementById('placeOrder').addEventListener('click', function() {
    const orderNumber = Math.floor(Math.random() * 1000000);
    document.getElementById('orderNumber').textContent = orderNumber;

    const qrCodeElement = document.getElementById('qrcode');
    qrCodeElement.innerHTML = '';
    try {
      new QRCode(qrCodeElement, {
        text: `Order Number: ${orderNumber}`,
        width: 128,
        height: 128
      });
    } catch (error) {
      console.error("QR Code Error:", error);
    }

    localStorage.removeItem('cart');
    document.querySelector('.cart-items-container').style.display = 'none';
    document.querySelector('.order-summary').style.display = 'none';
    document.getElementById('orderConfirmation').style.display = 'block';
  });

  // INIT
  loadCart();
  updateCartDisplay();
</script>

</body>
</html>
