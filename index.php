<?php
$title = "Dashboard";
include_once('templates/header.php');
?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Dashboard Admin</h1>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang</h6>
            </div>
            <div class="card-body">
                <h5>Aplikasi Buku Tamu</h5>
                <p>Aplikasi ini digunakan untuk mencatat data pengunjung/tamu yang berkunjung ke sekolah.</p>
                <p>Anda dapat menambahkan, mengubah, dan menghapus data tamu melalui menu Buku Tamu.</p>
                <a href="buku-tamu.php" class="btn btn-primary">Lihat Data Buku Tamu</a>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Fitur Aplikasi</h6>
            </div>
            <div class="card-body">
                <ul>
                    <li>Melihat data tamu</li>
                    <li>Menambah data tamu</li>
                    <li>Mengubah data tamu</li>
                    <li>Menghapus data tamu</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
include_once('templates/footer.php');
?>
