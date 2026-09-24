<?php
require 'koneksi.php';
function query($sql) {
    global $koneksi;
    $result = mysqli_query($koneksi, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function uploadGambar() {
    $namaFile = $_FILES['gambar']['name'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    if($error === 4) {
        return '';
    }
    $namaFileBaru = uniqid() . '_' . $namaFile;
    move_uploaded_file($tmpName, 'assets/upload_gambar/' . $namaFileBaru);
    return $namaFileBaru;
}
function tambah($data) {
    global $koneksi;
    $tanggal = $data['tanggal'];
    $nama_tamu = $data['nama_tamu'];
    $alamat = $data['alamat'];
    $no_hp = $data['no_hp'];
    $bertemu = $data['bertemu'];
    $kepentingan = $data['kepentingan'];
    $gambar = uploadGambar();
    $sql = "INSERT INTO buku_tamu (tanggal, nama_tamu, alamat, no_hp, bertemu, kepentingan, gambar) VALUES ('$tanggal', '$nama_tamu', '$alamat', '$no_hp', '$bertemu', '$kepentingan', '$gambar')";
    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);
}
function ubah($data) {
    global $koneksi;
    $id_tamu = $data['id_tamu'];
    $tanggal = $data['tanggal'];
    $nama_tamu = $data['nama_tamu'];
    $alamat = $data['alamat'];
    $no_hp = $data['no_hp'];
    $bertemu = $data['bertemu'];
    $kepentingan = $data['kepentingan'];
    $gambarLama = $data['gambarLama'];
    if($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadGambar();
        if($gambarLama && file_exists('assets/upload_gambar/' . $gambarLama)) {
            unlink('assets/upload_gambar/' . $gambarLama);
        }
    }
    $sql = "UPDATE buku_tamu SET tanggal = '$tanggal', nama_tamu = '$nama_tamu', alamat = '$alamat', no_hp = '$no_hp', bertemu = '$bertemu', kepentingan = '$kepentingan', gambar = '$gambar' WHERE id_tamu = $id_tamu";
    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);
}
function tambah_user($data) {
    global $koneksi;
    $username = $data['username'];
    $password = md5($data['password']);
    $nama_lengkap = $data['nama_lengkap'];
    $role = $data['role'];
    $sql = "INSERT INTO users (username, password, nama_lengkap, role) VALUES ('$username', '$password', '$nama_lengkap', '$role')";
    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);
}
function ubah_user($data) {
    global $koneksi;
    $id_user = $data['id_user'];
    $username = $data['username'];
    $nama_lengkap = $data['nama_lengkap'];
    $role = $data['role'];
    $sql = "UPDATE users SET username = '$username', nama_lengkap = '$nama_lengkap', role = '$role' WHERE id_user = $id_user";
    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);
}
function ganti_password($data) {
    global $koneksi;
    $id_user = $data['id_user'];
    $password = md5($data['password']);
    $sql = "UPDATE users SET password = '$password' WHERE id_user = $id_user";
    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);
}
?>
