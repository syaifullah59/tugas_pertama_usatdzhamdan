<?php
require __DIR__ . '/koneksi.php';
require __DIR__ . '/SiswaRepository.php';

header('Content-Type: application/json; charset=utf-8');

$q = $_GET['q'] ?? '';
$q = is_string($q) ? trim($q) : '';

if (mb_strlen($q) < 2) {
    echo json_encode([]);
    exit;
}

$repo = new SiswaRepository($pdo);
$hasil = array_slice($repo->cari(mb_substr($q, 0, 100)), 0, 10);

echo json_encode($hasil, JSON_UNESCAPED_UNICODE);