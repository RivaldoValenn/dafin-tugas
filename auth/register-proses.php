<?php
// register.php - Halaman untuk menampilkan formulir registrasi dan memproses pendaftaran

// Masukkan file koneksi database
include '../utils/db.php';

// Inisialisasi pesan kesalahan
$error = '';

// Cek apakah form registrasi telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir registrasi
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $role = $_POST['role'];
    $no_identitas = $_POST['no_identitas'];

    // Query untuk mengecek apakah username sudah digunakan
    $query_check_username = "SELECT * FROM user WHERE username = :username";
    $stmt_check_username = $db_con->prepare($query_check_username);
    $stmt_check_username->bindParam(':username', $username);
    $stmt_check_username->execute();
    $existing_user = $stmt_check_username->fetch(PDO::FETCH_ASSOC);

    if ($existing_user) {
        // Username sudah digunakan, tampilkan pesan kesalahan
        $error = "Username sudah digunakan";
    } else {
        // Username tersedia, lakukan registrasi
        // Hash password sebelum disimpan ke database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Query untuk menyimpan pengguna baru ke dalam database
        $query_register = "INSERT INTO user (nama, username, password, status, role, no_identitas) 
                           VALUES (:nama, :username, :password, :status, :role, :no_identitas)";
        $stmt_register = $db_con->prepare($query_register);
        $stmt_register->bindParam(':nama', $nama);
        $stmt_register->bindParam(':username', $username);
        $stmt_register->bindParam(':password', $hashed_password);
        $stmt_register->bindParam(':status', $status);
        $stmt_register->bindParam(':role', $role);
        $stmt_register->bindParam(':no_identitas', $no_identitas);
        $stmt_register->execute();
        echo "<script>";
        echo "alert('Registrasi Berhasil');";
        echo "</script>";
        header("Location: login.php");
        exit;
    }
}
