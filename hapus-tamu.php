<?php
require 'function.php';

// Ambil ID dari URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Validasi ID
if ($id === 0) {
     header("Location: buku-tamu.php");
     exit;
}

// Hapus data
if (hapus_tamu($id) > 0) {
     echo "<script>
            alert('Data tamu berhasil dihapus!');
            document.location.href = 'buku-tamu.php';
          </script>";
} else {
     echo "<script>
            alert('Gagal menghapus data tamu!');
            document.location.href = 'buku-tamu.php';
          </script>";
}
?>
