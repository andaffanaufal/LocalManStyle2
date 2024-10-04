<?php
// Memulai session untuk login user
session_start();
// Memanggil file koneksi ke database
include "koneksi.php";

if (isset($_POST['kirim'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Menyiapkan query dengan prepared statement untuk menghindari SQL Injection
    $query = "SELECT * FROM tb_user WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $hasil = $stmt->get_result();
    $cek = $hasil->num_rows;

    if ($cek > 0) {
        $data = $hasil->fetch_assoc();
        
        // Verifikasi password dengan password_verify
        if (password_verify($password, $data['password'])) {
            session_regenerate_id(true); // Untuk keamanan sesi

            // Cek role pengguna
            if ($data['role'] == "admin") {
                $_SESSION['email'] = $email;
                $_SESSION['role'] = "admin";
                header("location: Dasbord admin.html");
            } else if ($data['role'] == "user") {
                $_SESSION['email'] = $email;
                $_SESSION['role'] = "user";
                header("location:index.html");
            } else {
                echo "Anda Bukan Admin dan Bukan User";
            }
        } else {
            // Password tidak cocok
            echo "GAGAL LOGIN!!!, Username dan Password tidak ditemukan";
        }
    } else {
        // Email tidak ditemukan
        echo "GAGAL LOGIN!!!, Username dan Password tidak ditemukan";
    }
}
?>
