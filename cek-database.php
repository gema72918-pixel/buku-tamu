<?php
$koneksi = mysqli_connect("localhost", "root", "", "app_bukutamu");

if (!$koneksi) {
    echo "Database app_bukutamu TIDAK DITEMUKAN\n";
    echo "Error: " . mysqli_connect_error() . "\n";
} else {
    echo "Database app_bukutamu DITEMUKAN\n\n";
    
    // Cek tabel buku_tamu
    $result = mysqli_query($koneksi, "SHOW TABLES LIKE 'buku_tamu'");
    if (mysqli_num_rows($result) > 0) {
        echo "Tabel buku_tamu: ADA\n";
        
        // Cek struktur tabel
        $cols = mysqli_query($koneksi, "DESCRIBE buku_tamu");
        echo "\nStruktur tabel:\n";
        while ($col = mysqli_fetch_assoc($cols)) {
            echo "- {$col['Field']} ({$col['Type']})\n";
        }
        
        // Cek jumlah data
        $count = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM buku_tamu");
        $total = mysqli_fetch_assoc($count);
        echo "\nJumlah data: {$total['total']} record\n";
    } else {
        echo "Tabel buku_tamu: TIDAK ADA\n";
    }
    
    mysqli_close($koneksi);
}
?>
