<?php
require __DIR__ . '/koneksi.php';
require __DIR__ . '/helper.php';
require __DIR__ . '/SiswaRepository.php';
require __DIR__ . '/JurusanRepository.php'; // Pastikan file repository/helper jurusan dimuat agar ambilJurusan dikenal

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    http_response_code(400);
    exit('ID siswa tidak valid.');
}

$repo = new SiswaRepository($pdo);
$siswa = $repo->berdasarkanId($id);

if (!$siswa) {
    http_response_code(404);
    exit('Data siswa tidak ditemukan.');
}

$data = $siswa;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = bersihkanInputSiswa($_POST);
    $errors = validasiSiswa($data);

    if (!$errors) {
        try {
            $repo->ubah($id, $data);
            header('Location: index.php?status=ubah');
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() === '23000') {
                $errors[] = 'Email sudah dipakai atau jurusan tidak ditemukan.';
            } else {
                $errors[] = 'Terjadi kesalahan saat mengubah data.';
            }
        }
    }
}

$daftarJurusan = ambilJurusan($pdo);
$labelTombol = 'Simpan Perubahan';
$judul = 'Edit Siswa';

require __DIR__ . '/header.php';
require __DIR__ . '/form_siswa.php';
require __DIR__ . '/footer.php';