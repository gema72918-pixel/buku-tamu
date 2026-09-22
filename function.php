<?php
// Include koneksi
require 'koneksi.php';

// Function query - ambil data dari database
function query($sql) {
    global $koneksi;
    $result = mysqli_query($koneksi, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Function tambah tamu
function tambah($data) {
     global $koneksi;
     
     $tanggal = $data['tanggal'];
     $nama_tamu = mysqli_real_escape_string($koneksi, $data['nama_tamu']);
     $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
     $no_hp = mysqli_real_escape_string($koneksi, $data['no_hp']);
     $bertemu = mysqli_real_escape_string($koneksi, $data['bertemu']);
     $kepentingan = mysqli_real_escape_string($koneksi, $data['kepentingan']);
     
     // Query insert
     $sql = "INSERT INTO buku_tamu (tanggal, nama_tamu, alamat, no_hp, bertemu, kepentingan) 
             VALUES ('$tanggal', '$nama_tamu', '$alamat', '$no_hp', '$bertemu', '$kepentingan')";
     
     if (mysqli_query($koneksi, $sql)) {
         return mysqli_affected_rows($koneksi);
     } else {
         return false;
     }
}

// Function ubah tamu
function ubah($data) {
     global $koneksi;
     
     $id_tamu = (int)$data['id_tamu'];
     $tanggal = $data['tanggal'];
     $nama_tamu = mysqli_real_escape_string($koneksi, $data['nama_tamu']);
     $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
     $no_hp = mysqli_real_escape_string($koneksi, $data['no_hp']);
     $bertemu = mysqli_real_escape_string($koneksi, $data['bertemu']);
     $kepentingan = mysqli_real_escape_string($koneksi, $data['kepentingan']);
     
     // Query update
     $sql = "UPDATE buku_tamu SET 
             tanggal = '$tanggal',
             nama_tamu = '$nama_tamu',
             alamat = '$alamat',
             no_hp = '$no_hp',
             bertemu = '$bertemu',
             kepentingan = '$kepentingan'
             WHERE id_tamu = $id_tamu";
     
     if (mysqli_query($koneksi, $sql)) {
         return mysqli_affected_rows($koneksi);
     } else {
         return false;
     }
}

// Function hapus tamu
function hapus_tamu($id) {
     global $koneksi;
     
     $id = (int)$id;
     $sql = "DELETE FROM buku_tamu WHERE id_tamu = $id";
     
     if (mysqli_query($koneksi, $sql)) {
         return mysqli_affected_rows($koneksi);
     } else {
         return false;
     }
}
?>
