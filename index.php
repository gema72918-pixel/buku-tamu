<?php
$title = "Dashboard";
include_once('templates/header.php');
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
</div>
<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="card shadow">
            <div class="card-header py-3 d-flex align-items-center">
                <i class="fas fa-book text-primary mr-2"></i>
                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang di Aplikasi Buku Tamu</h6>
            </div>
            <div class="card-body">
                <h5 class="mb-3">Sistem Pencatatan Tamu</h5>
                <p class="mb-3">Aplikasi ini digunakan untuk mencatat data pengunjung atau tamu yang berkunjung ke sekolah secara sistematis dan terorganisir.</p>
                <p class="mb-4">Anda dapat mengelola data tamu dengan mudah melalui menu yang tersedia.</p>
                <a href="buku-tamu.php" class="btn btn-primary"><i class="fas fa-eye mr-1"></i> Lihat Data Buku Tamu</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="card shadow">
            <div class="card-header py-3 d-flex align-items-center">
                <i class="fas fa-list text-primary mr-2"></i>
                <h6 class="m-0 font-weight-bold text-primary">Fitur Aplikasi</h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><i class="fas fa-check-circle text-success mr-2"></i>Melihat data tamu</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success mr-2"></i>Menambah data tamu</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success mr-2"></i>Mengubah data tamu</li>
                    <li class="mb-0"><i class="fas fa-check-circle text-success mr-2"></i>Menghapus data tamu</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include_once('templates/footer.php'); ?>
