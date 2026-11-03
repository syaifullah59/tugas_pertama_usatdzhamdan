<form method="post" class="form-siswa" id="form-siswa" novalidate>
    <div class="field">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" value="<?= e($data['nama'] ?? '') ?>">
        <div class="field__bantuan">
            <span class="field__error" data-error-untuk="nama"></span>
        </div>
    </div>

    <div class="field">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= e($data['email'] ?? '') ?>">
        <div class="field__bantuan">
            <span class="field__error" data-error-untuk="email"></span>
        </div>
    </div>

    <div class="field">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select id="jenis_kelamin" name="jenis_kelamin">
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="L" <?= (($data['jenis_kelamin'] ?? '') === 'L') ? 'selected' : '' ?>>Laki-laki</option>
            <option value="P" <?= (($data['jenis_kelamin'] ?? '') === 'P') ? 'selected' : '' ?>>Perempuan</option>
        </select>
        <div class="field__bantuan">
            <span class="field__error" data-error-untuk="jenis_kelamin"></span>
        </div>
    </div>

    <div class="field">
        <label for="tanggal_lahir">Tanggal Lahir (opsional)</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= e($data['tanggal_lahir'] ?? '') ?>">
        <div class="field__bantuan">
            <span class="field__error" data-error-untuk="tanggal_lahir"></span>
        </div>
    </div>

   
<div class="field">
    <label for="id_jurusan">Jurusan (opsional)</label>
    <select id="id_jurusan" name="id_jurusan">
        <option value="">-- Belum ada jurusan --</option>

        <?php foreach (($daftarJurusan ?? []) as $j): ?>
            <?php
            $selected = (string)($data['id_jurusan'] ?? '') === (string)$j['id_jurusan']
                ? 'selected'
                : '';
            ?>
            <option value="<?= (int)$j['id_jurusan'] ?>" <?= $selected ?>>
                <?= htmlspecialchars($j['nama_jurusan'] ?? '', ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

    <div class="form-aksi">
        <button type="submit" class="btn"><?= e($labelTombol) ?></button>
        <a class="btn btn-abu" href="index.php">Batal</a>
    </div>
</form>