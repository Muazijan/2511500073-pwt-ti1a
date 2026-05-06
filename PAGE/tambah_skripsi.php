<?php
include "config/koneksi.php";

// 🔥 AUTO ID
$query = mysqli_query($conn, "SELECT MAX(id_skripsi073) as max_id FROM skripsi_2511500073");
$data  = mysqli_fetch_assoc($query);

$idMax = $data['max_id'];

if ($idMax) {
    $noUrut = (int) substr($idMax, 1, 3);
    $noUrut++;
    $idBaru = "S" . str_pad($noUrut, 3, "0", STR_PAD_LEFT);
} else {
    $idBaru = "S001";
}

// 🔥 SIMPAN
if (isset($_POST['simpan'])) {
    $id     = $_POST['id_skripsi073'];
    $judul  = $_POST['judul_skripsi073'];
    $topik  = $_POST['topik073'];
    $smt    = $_POST['semester073'];
    $thn    = $_POST['thn_ajaran073'];

    $insert = mysqli_query($conn, "INSERT INTO skripsi_2511500073 
        (id_skripsi073, judul_skripsi073, topik073, semester073, thn_ajaran073)
        VALUES ('$id','$judul','$topik','$smt','$thn')");

    if ($insert) {
        echo "<script>alert('Data berhasil ditambahkan');location='starter.php?page=skripsi';</script>";
    }
}
?>

<h3>Tambah Skripsi</h3>

<form method="POST">

<label>ID Skripsi</label>
<input type="text" name="id_skripsi073" value="<?= $idBaru ?>" class="form-control" readonly>

<label>Judul</label>
<input type="text" name="judul_skripsi073" class="form-control" required>

<label>Topik</label>
<input type="text" name="topik073" class="form-control" required>

<label>Semester</label>
<select name="semester073" class="form-control" required>
    <option value="">-- Pilih --</option>
    <option value="Gasal">Gasal</option>
    <option value="Genap">Genap</option>
</select>

<label>Tahun Ajaran</label>
<select name="thn_ajaran073" class="form-control" required>
    <option value="">-- Pilih --</option>
    <option value="2022/2023">2022/2023</option>
    <option value="2023/2024">2023/2024</option>
    <option value="2024/2025">2024/2025</option>
    <option value="2025/2026">2025/2026</option>
</select>

<br>
<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
<a href="starter.php?page=skripsi" class="btn btn-secondary">Kembali</a>

</form>