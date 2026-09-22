<?php
$title = "Edit Data Tamu";
require 'function.php';
include_once('templates/header.php');

// Ambil ID dari URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Validasi ID
if ($id === 0) {
     header("Location: buku-tamu.php");
     exit;
}

// Ambil data tamu berdasarkan ID
$tamu = query("SELECT * FROM buku_tamu WHERE id_tamu = $id");
if (count($tamu) === 0) {
     header("Location: buku-tamu.php");
     exit;
}
$t = $tamu[0];

// Proses form edit
if (isset($_POST['simpan'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data tamu berhasil diubah!');
                document.location.href = 'buku-tamu.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal mengubah data tamu!');
              </script>";
    }
}
?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Data Tamu</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Tamu</h6>
    </div>
    <div class="card-body">
        <form method="POST">
            <input type="hidden" name="id_tamu" value="<?php echo $t['id_tamu']; ?>">

            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value="<?php echo $t['tanggal']; ?>" required>
            </div>

            <div class="form-group">
                <label>Nama Tamu</label>
                <input type="text" class="form-control" name="nama_tamu" value="<?php echo $t['nama_tamu']; ?>" required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $t['alamat']; ?>" required>
            </div>

            <div class="form-group">
                <label>No HP</label>
                <input type="text" class="form-control" name="no_hp" value="<?php echo $t['no_hp']; ?>" required>
            </div>

            <div class="form-group">
                <label>Bertemu</label>
                <input type="text" class="form-control" name="bertemu" value="<?php echo $t['bertemu']; ?>" required>
            </div>

            <div class="form-group">
                <label>Kepentingan</label>
                <input type="text" class="form-control" name="kepentingan" value="<?php echo $t['kepentingan']; ?>" required>
            </div>

            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            <a href="buku-tamu.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?php
include_once('templates/footer.php');
?>
