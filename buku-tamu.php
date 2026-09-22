<?php
$title = "Data Buku Tamu";
require 'function.php';
include_once('templates/header.php');

$tamu = query("SELECT * FROM buku_tamu ORDER BY tanggal DESC");

// Proses tambah data
if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data tamu berhasil ditambahkan!');
                document.location.href = 'buku-tamu.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menambahkan data tamu!');
              </script>";
    }
}
?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Buku Tamu</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah">
            <i class="fas fa-plus"></i> Tambah Data
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                    <?php $no = 1; ?>
                    <?php foreach ($tamu as $t): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $t['tanggal']; ?></td>
                            <td><?php echo $t['nama_tamu']; ?></td>
                            <td><?php echo $t['alamat']; ?></td>
                            <td><?php echo $t['no_hp']; ?></td>
                            <td><?php echo $t['bertemu']; ?></td>
                            <td><?php echo $t['kepentingan']; ?></td>
                            <td>
                                <a href="edit-tamu.php?id=<?php echo $t['id_tamu']; ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="hapus-tamu.php?id=<?php echo $t['id_tamu']; ?>" class="btn btn-danger btn-sm" onclick="return konfirmasi_hapus();">
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

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Tamu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Tamu</label>
                        <input type="text" class="form-control" name="nama_tamu" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" class="form-control" name="no_hp" required>
                    </div>
                    <div class="form-group">
                        <label>Bertemu</label>
                        <input type="text" class="form-control" name="bertemu" required>
                    </div>
                    <div class="form-group">
                        <label>Kepentingan</label>
                        <input type="text" class="form-control" name="kepentingan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DataTables CSS & JS -->
<link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

<?php
include_once('templates/footer.php');
?>
