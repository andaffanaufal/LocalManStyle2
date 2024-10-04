<?php
include 'koneksi.php'; // Ganti dengan koneksi database Anda

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $detail_url = $_POST['detail_url'];
    $quick_view_url = $_POST['quick_view_url'];

    // Handle image upload
    $image_url = '';
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {
        $image_ext = pathinfo($_FILES['image_url']['name'], PATHINFO_EXTENSION);
        $image_url = 'uploads/' . uniqid() . '.' . $image_ext;
        move_uploaded_file($_FILES['image_url']['tmp_name'], $image_url);
    }

    $sql = "INSERT INTO products (name, category, image_url, price, detail_url, quick_view_url) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $category, $image_url, $price, $detail_url, $quick_view_url);

    if ($stmt->execute()) {
        header("Location: data produk.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        h1 {
            font-size: 1.5em;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 0.9em;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
        }

        .form-group input[type="file"] {
            padding: 3px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Add Product</h1>

        <!-- Form to Add a Product -->
        <form action="add_product.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" id="category" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" required>
            </div>

            <div class="form-group">
                <label for="detail_url">Detail URL</label>
                <input type="text" name="detail_url" id="detail_url" required>
            </div>

            <div class="form-group">
                <label for="quick_view_url">Quick View URL</label>
                <input type="text" name="quick_view_url" id="quick_view_url" required>
            </div>

            <div class="form-group">
                <label for="image_url">Image</label>
                <input type="file" name="image_url" id="image_url">
            </div>

            <button type="submit" class="btn">Add Product</button>
        </form>
    </div>
</body>

</html>

    <!-- Toggle Sidebar Script -->
    <script>
        const hamBurger = document.querySelector(".toggle-btn");
        hamBurger.addEventListener("click", function () {
            document.querySelector("#sidebar").classList.toggle("expand");
        });
    </script>
</body>

</html>

