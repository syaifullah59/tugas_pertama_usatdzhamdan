<?php

abstract class Repository
{
    // Enkapsulasi: detail koneksi tidak bisa dibaca langsung dari luar
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Hanya kelas turunan yang dapat memakai koneksi
    protected function pdo(): PDO
    {
        return $this->pdo;
    }

    // Kontrak yang wajib diisi kelas turunan
    abstract public function cari(string $kata): array;
}