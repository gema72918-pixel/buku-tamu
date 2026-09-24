<?php
require 'function.php';
if($_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}
$id = $_GET['id'];
$tamu = query("SELECT * FROM buku_tamu WHERE id_tamu = $id")[0];
if($tamu['gambar'] && file_exists('assets/upload_gambar/' . $tamu['gambar'])) {
    unlink('assets/upload_gambar/' . $tamu['gambar']);
}
mysqli_query($koneksi, "DELETE FROM buku_tamu WHERE id_tamu = $id");
header("Location: buku-tamu.php");
exit;
?>
