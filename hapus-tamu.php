<?php
require 'function.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id === 0) {
    header("Location: buku-tamu.php");
    exit;
}

if (hapus_tamu($id) > 0) {
    echo "<script>alert('Data tamu berhasil dihapus!'); document.location.href = 'buku-tamu.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data tamu!'); document.location.href = 'buku-tamu.php';</script>";
}
?>
