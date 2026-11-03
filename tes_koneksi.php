<?php
require __DIR__ . '/koneksi.php'; 

$stmt = $pdo->query('SELECT COUNT(*) FROM siswa');
$jumlah = $stmt->fetchColumn();
echo "Koneksi berhasil. Jumlah siswa: " . $jumlah;