<?php
$title = "Edit Data Tamu";
require 'function.php';
if($_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}
include_once('templates/header.php');
$id = $_GET['id'];
$t = query("SELECT * FROM buku_tamu WHERE id_tamu = $id")[0];
if (isset($_POST['simpan'])) {
    if (ubah($_POST) > 0) {
        echo "<script>alert('Data tamu berhasil diubah!'); document.location.href = 'buku-tamu.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data tamu!');</script>";
    }
}
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Tamu</h1>
    <a href="buku-tamu.php" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-1"></i>Kembali</a>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex align-items-center">
                <i class="fas fa-edit text-primary mr-2"></i>
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Tamu</h6>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_tamu" value="<?php echo $t['id_tamu']; ?>">
                    <input type="hidden" name="gambarLama" value="<?php echo $t['gambar']; ?>">
                    <div class="form-group">
                        <label for="tanggal">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $t['tanggal']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_tamu">Nama Tamu <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" value="<?php echo htmlspecialchars($t['nama_tamu']); ?>" placeholder="Masukkan nama tamu" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo htmlspecialchars($t['alamat']); ?>" placeholder="Masukkan alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo htmlspecialchars($t['no_hp']); ?>" placeholder="Contoh: 08123456789" required>
                    </div>
                    <div class="form-group">
                        <label for="bertemu">Bertemu Dengan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="bertemu" name="bertemu" value="<?php echo htmlspecialchars($t['bertemu']); ?>" placeholder="Masukkan nama yang ditemui" required>
                    </div>
                    <div class="form-group">
                        <label for="kepentingan">Kepentingan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="kepentingan" name="kepentingan" value="<?php echo htmlspecialchars($t['kepentingan']); ?>" placeholder="Masukkan keperluan" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <?php if($t['gambar']): ?>
                        <div class="mb-2">
                            <img src="assets/upload_gambar/<?php echo $t['gambar']; ?>" width="100" height="100" style="object-fit:cover;">
                        </div>
                        <?php endif; ?>
                        <input type="file" class="form-control-file" id="gambar" name="gambar">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                    </div>
                    <hr>
                    <div class="form-group mb-0">
                        <button type="submit" name="simpan" class="btn btn-primary"><i class="fas fa-save mr-1"></i>Simpan Perubahan</button>
                        <a href="buku-tamu.php" class="btn btn-secondary"><i class="fas fa-times mr-1"></i>Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex align-items-center">
                <i class="fas fa-info-circle text-primary mr-2"></i>
                <h6 class="m-0 font-weight-bold text-primary">Informasi</h6>
            </div>
            <div class="card-body">
                <p class="mb-2 small"><i class="fas fa-calendar text-primary mr-2"></i><strong>ID Tamu:</strong> <?php echo $t['id_tamu']; ?></p>
                <hr>
                <p class="small text-muted mb-0">Pastikan semua data yang diubah sudah benar sebelum menyimpan.</p>
            </div>
        </div>
    </div>
</div>
<?php include_once('templates/footer.php'); ?>
