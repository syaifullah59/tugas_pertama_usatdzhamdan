<?php
require __DIR__ . '/koneksi.php';
require __DIR__ . '/SiswaRepository.php';

$repo = new SiswaRepository($pdo);

// Hanya menerima permintaan POST; akses langsung lewat URL ditolak
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Metode tidak diizinkan.');
}

// Ambil dan validasi ID dari form
$id = filter_input(INPUT_POST, 'id_siswa', FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    header('Location: index.php?status=gagal');
    exit;
}

// Repository mengembalikan true jika ada baris yang terhapus
$status = $repo->hapus($id) ? 'hapus' : 'gagal';

header('Location: index.php?status=' . $status);
exit;