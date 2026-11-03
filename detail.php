<?php
require __DIR__ . '/koneksi.php';
require __DIR__ . '/helper.php';
require __DIR__ . '/SiswaRepository.php';
require __DIR__ . '/NilaiRepository.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    http_response_code(400);
    exit('ID siswa tidak valid.');
}

$siswaRepo = new SiswaRepository($pdo);
$siswa = $siswaRepo->berdasarkanId($id);
if (!$siswa) {
    http_response_code(404);
    exit('Data siswa tidak ditemukan.');
}