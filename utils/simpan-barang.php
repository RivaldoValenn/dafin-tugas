<?php

include 'db.php';

$kode_brg = $_POST['kode_brg'];
$nama_brg = $_POST['nama_brg'];
$kategori_id = $_POST['kategori'];
$merk = $_POST['merk'];
$jumlah = $_POST['jumlah'];

$gambar_path = '';
if ($_FILES['gambar']['error'] == 0) {
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        $gambar_path = $target_file;
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah gambar.";
        exit;
    }
}

$query = "INSERT INTO barang (kode_brg, nama_brg, kategori_id, merk, jumlah, gambar) 
          VALUES (:kode_brg, :nama_brg, :kategori_id, :merk, :jumlah, :gambar_path)";
$stmt = $db_con->prepare($query);
$stmt->bindParam(':kode_brg', $kode_brg);
$stmt->bindParam(':nama_brg', $nama_brg);
$stmt->bindParam(':kategori_id', $kategori_id);
$stmt->bindParam(':merk', $merk);
$stmt->bindParam(':jumlah', $jumlah);
$stmt->bindParam(':gambar_path', $gambar_path);
$stmt->execute();

header("Location: ../barang.php");
exit;
