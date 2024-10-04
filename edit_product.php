<?php
include 'koneksi.php'; // Ganti dengan koneksi database Anda

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $detail_url = $_POST['detail_url'];
    $quick_view_url = $_POST['quick_view_url'];

    // Handle image upload
    $image_url = $_POST['existing_image_url'];
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {
        // Delete old image if exists
        if (file_exists($image_url) && $image_url != '') {
            unlink($image_url);
        }

        $image_ext = pathinfo($_FILES['image_url']['name'], PATHINFO_EXTENSION);
        $image_url = 'uploads/' . uniqid() . '.' . $image_ext;
        move_uploaded_file($_FILES['image_url']['tmp_name'], $image_url);
    }

    $sql = "UPDATE products SET name=?, category=?, image_url=?, price=?, detail_url=?, quick_view_url=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $name, $category, $image_url, $price, $detail_url, $quick_view_url, $id);

    if ($stmt->execute()) {
        header("Location: data produk.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$product = $stmt->get_result()->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... head content ... -->
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar" class="expand">
            <!-- ... sidebar content ... -->
        </aside>
        <main class="main">
            <div class="nullbar"></div>
            <div class="container my-3">
                <h1>Edit Product</h1>
                <form action="edit_product.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $product['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <input type="text" name="category" id="category" class="form-control" value="<?php echo $product['category']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" name="price" id="price" class="form-control" value="<?php echo $product['price']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="detail_url">Detail URL:</label>
                        <input type="text" name="detail_url" id="detail_url" class="form-control" value="<?php echo $product['detail_url']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="quick_view_url">Quick View URL:</label>
                        <input type="text" name="quick_view_url" id="quick_view_url" class="form-control" value="<?php echo $product['quick_view_url']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="image_url">Image:</label>
                        <input type="file" name="image_url" id="image_url" class="form-control">
                        <input type="hidden" name="existing_image_url" value="<?php echo $product['image_url']; ?>">
                        <?php if ($product['image_url']): ?>
                            <img src="<?php echo $product['image_url']; ?>" alt="Product Image" style="max-width: 200px; margin-top: 10px;">
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update Product</button>
                </form>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const hamBurger = document.querySelector(".toggle-btn");
        hamBurger.addEventListener("click", function () {
            document.querySelector("#sidebar").classList.toggle("expand");
        });
    </script>
</body>
</html>
