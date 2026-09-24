<?php
$title = "Laporan Buku Tamu";
require 'function.php';
include_once('templates/header.php');
$tanggal_awal = isset($_GET['tanggal_awal']) ? $_GET['tanggal_awal'] : date('Y-m-01');
$tanggal_akhir = isset($_GET['tanggal_akhir']) ? $_GET['tanggal_akhir'] : date('Y-m-d');
$tamu = query("SELECT * FROM buku_tamu WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tanggal DESC");
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Buku Tamu</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Filter Laporan</h6>
    </div>
    <div class="card-body">
        <form method="GET" class="form-inline">
            <div class="form-group mr-3">
                <label for="tanggal_awal" class="mr-2">Dari:</label>
                <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" value="<?php echo $tanggal_awal; ?>" required>
            </div>
            <div class="form-group mr-3">
                <label for="tanggal_akhir" class="mr-2">Sampai:</label>
                <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="<?php echo $tanggal_akhir; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-filter mr-1"></i>Filter</button>
        </form>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Laporan (<?php echo count($tamu); ?> data)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Tamu</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Bertemu</th>
                        <th>Kepentingan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($tamu) > 0): ?>
                    <?php $no = 1; foreach ($tamu as $t): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($t['tanggal'])); ?></td>
                        <td><?php echo htmlspecialchars($t['nama_tamu']); ?></td>
                        <td><?php echo htmlspecialchars($t['alamat']); ?></td>
                        <td><?php echo htmlspecialchars($t['no_hp']); ?></td>
                        <td><?php echo htmlspecialchars($t['bertemu']); ?></td>
                        <td><?php echo htmlspecialchars($t['kepentingan']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once('templates/footer.php'); ?>
