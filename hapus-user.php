<?php
require 'function.php';
if($_SESSION['role'] != 'operator') {
    header("Location: index.php");
    exit;
}
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM users WHERE id_user = $id");
header("Location: users.php");
exit;
?>
