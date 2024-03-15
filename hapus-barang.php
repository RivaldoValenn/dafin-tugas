<?php
include 'db.php'; // Sertakan file koneksi database

function hapusBarang($id_barang)
{
    global $db_con;

    // Buat query SQL untuk menghapus barang berdasarkan ID
    $query = "DELETE FROM barang WHERE id_barang = :id_barang";
    $stmt = $db_con->prepare($query);

    // Bind parameter
    $stmt->bindParam(':id_barang', $id_barang);

    // Jalankan query
    if ($stmt->execute()) {
        return true; // Mengembalikan true jika penghapusan berhasil
    } else {
        return false; // Mengembalikan false jika terjadi kesalahan
    }
}

// Contoh penggunaan fungsi hapusBarang
$id_barang = 1; // ID barang yang ingin dihapus
if (hapusBarang($id_barang)) {
    echo "Barang berhasil dihapus.";
} else {
    echo "Gagal menghapus barang.";
}
