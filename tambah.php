<?php

require __DIR__ . '/koneksi.php';
require __DIR__ . '/helper.php';
require __DIR__ . '/SiswaRepository.php';

$repo = new SiswaRepository($pdo);

// Nilai awal form kosong
$data = [
    'nama'          => '',
    'email'         => '',
    'jenis_kelamin' => '',
    'tanggal_lahir' => '',
    'id_jurusan'    => '',
];
$errors = [];

// Proses hanya saat form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = bersihkanInputSiswa($_POST);
    $errors = validasiSiswa($data);

    if (!$errors) {
        try {
            $repo->tambah($data);
            header('Location: index.php?status=tambah');
            exit;
        } catch (PDOException $e) {
            // 23000 = pelanggaran constraint (UNIQUE / FOREIGN KEY)
            if ($e->getCode() === '23000') {
                $errors[] = 'Email sudah dipakai atau jurusan tidak ditemukan.';
            } else {
                $errors[] = 'Terjadi kesalahan saat menyimpan data.';
            }
        }
    }
}

$daftarJurusan = ambilJurusan($pdo);
$labelTombol = 'Simpan';
$judul = 'Tambah Siswa';

require __DIR__ . '/header.php';
require __DIR__ . '/form_siswa.php';
require __DIR__ . '/footer.php';