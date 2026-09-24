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

function tambah($data) {
    global $koneksi;
    $tanggal = $data['tanggal'];
    $nama_tamu = $data['nama_tamu'];
    $alamat = $data['alamat'];
    $no_hp = $data['no_hp'];
    $bertemu = $data['bertemu'];
    $kepentingan = $data['kepentingan'];
    
    $sql = "INSERT INTO buku_tamu (tanggal, nama_tamu, alamat, no_hp, bertemu, kepentingan) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $tanggal, $nama_tamu, $alamat, $no_hp, $bertemu, $kepentingan);
    
    if (mysqli_stmt_execute($stmt)) {
        $affected = mysqli_stmt_affected_rows($stmt);
        mysqli_stmt_close($stmt);
        return $affected;
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function ubah($data) {
    global $koneksi;
    $id_tamu = (int)$data['id_tamu'];
    $tanggal = $data['tanggal'];
    $nama_tamu = $data['nama_tamu'];
    $alamat = $data['alamat'];
    $no_hp = $data['no_hp'];
    $bertemu = $data['bertemu'];
    $kepentingan = $data['kepentingan'];
    
    $sql = "UPDATE buku_tamu SET tanggal = ?, nama_tamu = ?, alamat = ?, no_hp = ?, bertemu = ?, kepentingan = ? WHERE id_tamu = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssi", $tanggal, $nama_tamu, $alamat, $no_hp, $bertemu, $kepentingan, $id_tamu);
    
    if (mysqli_stmt_execute($stmt)) {
        $affected = mysqli_stmt_affected_rows($stmt);
        mysqli_stmt_close($stmt);
        return $affected;
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function hapus_tamu($id) {
    global $koneksi;
    $id = (int)$id;
    $sql = "DELETE FROM buku_tamu WHERE id_tamu = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    
    if (mysqli_stmt_execute($stmt)) {
        $affected = mysqli_stmt_affected_rows($stmt);
        mysqli_stmt_close($stmt);
        return $affected;
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function get_tamu_by_id($id) {
    global $koneksi;
    $id = (int)$id;
    $sql = "SELECT * FROM buku_tamu WHERE id_tamu = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $data;
}
?>
