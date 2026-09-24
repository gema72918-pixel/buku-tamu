<?php
$title = "Data User";
require 'function.php';
if($_SESSION['role'] != 'operator') {
    header("Location: index.php");
    exit;
}
include_once('templates/header.php');
$users = query("SELECT * FROM users ORDER BY id_user DESC");
if (isset($_POST['tambah'])) {
    if (tambah_user($_POST) > 0) {
        echo "<script>alert('Data user berhasil ditambahkan!'); document.location.href = 'users.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data user!');</script>";
    }
}
if (isset($_POST['ganti_password'])) {
    if (ganti_password($_POST) > 0) {
        echo "<script>alert('Password berhasil diubah!'); document.location.href = 'users.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah password!');</script>";
    }
}
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data User</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah">
            <i class="fas fa-plus mr-1"></i> Tambah Data
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($users as $u): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars($u['username']); ?></td>
                        <td><?php echo htmlspecialchars($u['nama_lengkap']); ?></td>
                        <td><?php echo htmlspecialchars($u['role']); ?></td>
                        <td class="text-center">
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalPassword" onclick="setIdPassword(<?php echo $u['id_user']; ?>)" title="Ganti Password">
                                <i class="fas fa-key"></i>
                            </button>
                            <a href="edit-user.php?id=<?php echo $u['id_user']; ?>" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="hapus-user.php?id=<?php echo $u['id_user']; ?>" class="btn btn-danger btn-sm" onclick="return konfirmasi_hapus();" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus-circle text-primary mr-2"></i>Tambah Data User</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role <span class="text-danger">*</span></label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="">Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="operator">Operator</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Batal</button>
                    <button type="submit" name="tambah" class="btn btn-primary"><i class="fas fa-save mr-1"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalPassword" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-key text-primary mr-2"></i>Ganti Password</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_user" id="id_user_password">
                    <div class="form-group">
                        <label for="password_baru">Password Baru <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password_baru" name="password" placeholder="Masukkan password baru" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Batal</button>
                    <button type="submit" name="ganti_password" class="btn btn-primary"><i class="fas fa-save mr-1"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once('templates/footer.php'); ?>
