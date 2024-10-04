<?php
// Koneksi ke database
$conn = new mysqli("localhost", "username", "password", "database");

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil ID produk dari parameter URL
$product_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Query untuk mendapatkan data produk berdasarkan ID
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ambil data produk
    $product = $result->fetch_assoc();
    $name = $product['name'];
    $image_url = $product['image_url'];
    $price = number_format($product['price'], 2, ',', '.');
    $description = $product['description']; // Pastikan kolom ini ada dalam tabel produk
} else {
    echo "Produk tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name; ?> - Shop</title>
    <link rel="stylesheet" href="styles.css"> <!-- Ganti dengan file CSS Anda -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Konten Halaman -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo $image_url; ?>" alt="<?php echo $name; ?>" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2><?php echo $name; ?></h2>
            <p class="price">Rp. <?php echo $price; ?></p>
            <p><?php echo $description; ?></p>
            <button class="btn btn-primary add-to-cart" data-id="<?php echo $product_id; ?>">Add to Cart</button>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Event untuk menambah produk ke keranjang
    $('.add-to-cart').on('click', function() {
        var productId = $(this).data('id');
        // Logika untuk menambah produk ke keranjang bisa ditambahkan di sini
        alert("Produk dengan ID " + productId + " telah ditambahkan ke keranjang.");
    });
});
</script>

</body>
</html>

<?php
$conn->close();
?>
