-- Buat Database
CREATE DATABASE IF NOT EXISTS app_bukutamu;
USE app_bukutamu;

-- Buat Tabel buku_tamu
CREATE TABLE buku_tamu (
    id_tamu INT(11) NOT NULL AUTO_INCREMENT,
    tanggal DATE NOT NULL,
    nama_tamu VARCHAR(255) NOT NULL,
    alamat VARCHAR(255) NOT NULL,
    no_hp VARCHAR(13) NOT NULL,
    bertemu VARCHAR(255) NOT NULL,
    kepentingan VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_tamu)
);
