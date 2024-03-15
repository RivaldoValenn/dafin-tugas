<?php
session_start();
// login.php - Halaman untuk menampilkan formulir login dan memproses login

// Masukkan file koneksi database
include '../utils/db.php';

// Inisialisasi pesan kesalahan
$error = '';

// Cek apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencari pengguna dengan username yang sesuai
    $query = "SELECT * FROM user WHERE username = :username";
    $stmt = $db_con->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifikasi password
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['login'] = $user['username'];
        header("Location: ../index.php");
        exit;
    } else {
        echo "<script>alert('Username atau password salah')</script>";
        echo "<script>window.location.href = 'login.php'</script>";
        $error = "Username atau password salah";
    }
}
