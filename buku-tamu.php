<?php
$title = "Data Buku Tamu";
require 'function.php';
include_once('templates/header.php');

$tamu = query("SELECT * FROM buku_tamu ORDER BY tanggal DESC");

if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo "<script>alert('Data tamu berhasil ditambahkan!'); document.location.href = 'buku-tamu.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data tamu!');</script>";
    }
}
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Buku Tamu</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Tamu</h6>
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
                        <th>Tanggal</th>
                        <th>Nama Tamu</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Bertemu</th>
                        <th>Kepentingan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($tamu as $t): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($t['tanggal'])); ?></td>
                        <td><?php echo htmlspecialchars($t['nama_tamu']); ?></td>
                        <td><?php echo htmlspecialchars($t['alamat']); ?></td>
                        <td><?php echo htmlspecialchars($t['no_hp']); ?></td>
                        <td><?php echo htmlspecialchars($t['bertemu']); ?></td>
                        <td><?php echo htmlspecialchars($t['kepentingan']); ?></td>
                        <td class="text-center">
                            <a href="edit-tamu.php?id=<?php echo $t['id_tamu']; ?>" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="hapus-tamu.php?id=<?php echo $t['id_tamu']; ?>" class="btn btn-danger btn-sm" onclick="return konfirmasi_hapus();" title="Hapus">
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
                <h5 class="modal-title"><i class="fas fa-plus-circle text-primary mr-2"></i>Tambah Data Tamu</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggal">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_tamu">Nama Tamu <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" placeholder="Masukkan nama tamu" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Contoh: 08123456789" required>
                    </div>
                    <div class="form-group">
                        <label for="bertemu">Bertemu Dengan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="bertemu" name="bertemu" placeholder="Masukkan nama yang ditemui" required>
                    </div>
                    <div class="form-group">
                        <label for="kepentingan">Kepentingan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="kepentingan" name="kepentingan" placeholder="Masukkan keperluan" required>
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
<?php include_once('templates/footer.php'); ?>
