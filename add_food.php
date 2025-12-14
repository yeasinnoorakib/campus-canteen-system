<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Food Item - Canteen Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #e74c3c;
            --primary-dark: #c0392b;
            --sidebar-width: 250px;
            --header-height: 60px;
            --card-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f5f5f5;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background-color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            box-shadow: var(--card-shadow);
            padding: 20px 0;
        }

        .logo {
            padding: 0 20px;
            margin-bottom: 30px;
        }

        .logo h2 {
            color: var(--primary-color);
            font-size: 1.5rem;
        }

        .nav-links {
            list-style: none;
        }

        .nav-links li {
            margin-bottom: 5px;
        }

        .nav-links a {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: #333;
            text-decoration: none;
            transition: var(--transition);
        }

        .nav-links a:hover,
        .nav-links a.active {
            background-color: #f8f8f8;
            color: var(--primary-color);
        }

        .nav-links i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 20px;
        }

        .header {
            background-color: white;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-title h1 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 5px;
        }

        .page-title p {
            color: #666;
        }

        /* Form Styles */
        .form-container {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: var(--card-shadow);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(231, 76, 60, 0.1);
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        /* Image Upload Styles */
        .image-upload {
            border: 2px dashed #ddd;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .image-upload:hover {
            border-color: var(--primary-color);
        }

        .image-upload i {
            font-size: 2rem;
            color: #666;
            margin-bottom: 10px;
        }

        .image-upload p {
            color: #666;
            margin-bottom: 5px;
        }

        .image-upload small {
            color: #999;
        }

        .image-preview {
            margin-top: 15px;
            display: none;
        }

        .image-preview img {
            max-width: 200px;
            max-height: 200px;
            border-radius: 5px;
            object-fit: cover;
        }

        /* Button Styles */
        .submit-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .submit-btn:hover {
            background-color: var(--primary-dark);
        }

        .submit-btn i {
            font-size: 1.1rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 60px;
                padding: 20px 0;
            }

            .logo h2,
            .nav-links span {
                display: none;
            }

            .main-content {
                margin-left: 60px;
            }

            .nav-links a {
                justify-content: center;
                padding: 15px 0;
            }

            .nav-links i {
                margin-right: 0;
                font-size: 1.2rem;
            }

            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <h2>CanteenMS</h2>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="active">
                    <i class="fas fa-utensils"></i>
                    <span>Add Food</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Orders</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <div class="page-title">
                <h1>Add New Food Item</h1>
                <p>Fill in the details to add a new item to the menu</p>
            </div>
        </div>

        <div class="form-container">
            <form id="addFoodForm">
                <div class="form-group">
                    <label for="foodName">Food Name</label>
                    <input type="text" id="foodName" name="foodName" placeholder="Enter food name" required>
                </div>

                <div class="form-group">
                    <label for="foodPrice">Price</label>
                    <input type="number" id="foodPrice" name="foodPrice" placeholder="Enter price" min="0" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="foodDescription">Description</label>
                    <textarea id="foodDescription" name="foodDescription" placeholder="Enter food description" required></textarea>
                </div>

                <div class="form-group">
                    <label>Food Image</label>
                    <div class="image-upload" id="imageUpload">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Click to upload image</p>
                        <small>or drag and drop</small>
                        <input type="file" id="foodImage" name="foodImage" accept="image/*" style="display: none;">
                    </div>
                    <div class="image-preview" id="imagePreview">
                        <img src="" alt="Preview">
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-plus"></i>
                    Add Food Item
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageUpload = document.getElementById('imageUpload');
            const foodImage = document.getElementById('foodImage');
            const imagePreview = document.getElementById('imagePreview');
            const previewImg = imagePreview.querySelector('img');

            // Handle image upload click
            imageUpload.addEventListener('click', () => {
                foodImage.click();
            });

            // Handle drag and drop
            imageUpload.addEventListener('dragover', (e) => {
                e.preventDefault();
                imageUpload.style.borderColor = 'var(--primary-color)';
            });

            imageUpload.addEventListener('dragleave', () => {
                imageUpload.style.borderColor = '#ddd';
            });

            imageUpload.addEventListener('drop', (e) => {
                e.preventDefault();
                imageUpload.style.borderColor = '#ddd';
                const file = e.dataTransfer.files[0];
                if (file && file.type.startsWith('image/')) {
                    handleImageUpload(file);
                }
            });

            // Handle file input change
            foodImage.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (file) {
                    handleImageUpload(file);
                }
            });

            // Handle image preview
            function handleImageUpload(file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewImg.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }

            // Handle form submission
            const form = document.getElementById('addFoodForm');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                
                // Get form data
                const formData = new FormData(form);
                
                // In a real application, you would send this to your backend
                console.log('Form submitted:', {
                    name: formData.get('foodName'),
                    price: formData.get('foodPrice'),
                    description: formData.get('foodDescription'),
                    image: formData.get('foodImage')
                });

                // Show success message
                alert('Food item added successfully!');
                form.reset();
                imagePreview.style.display = 'none';
            });
        });
    </script>
</body>
</html> 