<?php
if (!function_exists('e')) {
    require_once __DIR__ . '/helper.php';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($judul ?? 'Data Siswa') ?></title>
    <script>
        // Dijalankan sebelum halaman digambar agar tidak berkedip
        document.documentElement.dataset.theme = localStorage.getItem('tema') ?? 'light';
    </script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="topbar">
        <div class="topbar__isi">
            <a class="topbar__brand" href="index.php">Data Siswa</a>
            <nav class="topbar__nav" aria-label="Menu utama">
                <a class="topbar__link" href="index.php">Daftar</a>
                <a class="topbar__link" href="tambah.php">Tambah</a>
                <button type="button"
                        class="btn btn-ghost"
                        id="tombol-tema"
                        aria-label="Ganti tema terang/gelap">🌙</button>
            </nav>
        </div>
    </header>
    <main class="container">
        <h1><?= e($judul ?? 'Data Siswa') ?></h1>