<?php
include 'koneksi.php'; // Ganti dengan koneksi database Anda

$id = $_GET['id'];

// Get the image URL
$sql = "SELECT image_url FROM products WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$image_url = $stmt->get_result()->fetch_assoc()['image_url'];
$stmt->close();

// Delete the product
$sql = "DELETE FROM products WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // Delete the image file
    if (file_exists($image_url) && $image_url != '') {
        unlink($image_url);
    }
    header("Location: data produk.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
