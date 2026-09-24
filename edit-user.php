<?php
$title = "Edit Data User";
require 'function.php';
if($_SESSION['role'] != 'operator') {
    header("Location: index.php");
    exit;
}
include_once('templates/header.php');
$id = $_GET['id'];
$u = query("SELECT * FROM users WHERE id_user = $id")[0];
if (isset($_POST['simpan'])) {
    if (ubah_user($_POST) > 0) {
        echo "<script>alert('Data user berhasil diubah!'); document.location.href = 'users.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data user!');</script>";
    }
}
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data User</h1>
    <a href="users.php" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-1"></i>Kembali</a>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex align-items-center">
                <i class="fas fa-edit text-primary mr-2"></i>
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Data User</h6>
            </div>
            <div class="card-body">
                <form method="POST">
                    <input type="hidden" name="id_user" value="<?php echo $u['id_user']; ?>">
                    <div class="form-group">
                        <label for="username">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($u['username']); ?>" placeholder="Masukkan username" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo htmlspecialchars($u['nama_lengkap']); ?>" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role <span class="text-danger">*</span></label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="admin" <?php echo ($u['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                            <option value="operator" <?php echo ($u['role'] == 'operator') ? 'selected' : ''; ?>>Operator</option>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group mb-0">
                        <button type="submit" name="simpan" class="btn btn-primary"><i class="fas fa-save mr-1"></i>Simpan Perubahan</button>
                        <a href="users.php" class="btn btn-secondary"><i class="fas fa-times mr-1"></i>Batal</a>
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
                <p class="mb-2 small"><i class="fas fa-id-badge text-primary mr-2"></i><strong>ID User:</strong> <?php echo $u['id_user']; ?></p>
                <hr>
                <p class="small text-muted mb-0">Password tidak dapat diubah di halaman ini. Gunakan fitur Ganti Password.</p>
            </div>
        </div>
    </div>
</div>
<?php include_once('templates/footer.php'); ?>
