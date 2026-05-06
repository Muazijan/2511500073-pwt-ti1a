<?php

include "config/koneksi.php";

$kd = $_GET['kd'] ?? '';

if ($kd == '') {
    echo "ID tidak ditemukan!";
    exit;
}


$query = mysqli_query($conn, "SELECT * FROM skripsi_2511500073 WHERE id_skripsi073='$kd'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {

    $judul  = $_POST['judul'];
    $topik  = $_POST['topik'];
    $smt    = $_POST['semester'];
    $thn    = $_POST['tahun'];

    mysqli_query($conn, "UPDATE skripsi_2511500073 SET
        judul_skripsi073='$judul',
        topik073='$topik',
        semester073='$smt',
        thn_ajaran073='$thn'
        WHERE id_skripsi073='$kd'
    ");

    echo "<script>alert('Data berhasil diupdate');location='starter.php?page=skripsi';</script>";
}
?>

<h3>Edit Skripsi</h3>

<form method="POST">

<label>ID</label>
<input type="text" value="<?= $data['id_skripsi073'] ?>" class="form-control" readonly>

<label>Judul</label>
<input type="text" name="judul" value="<?= $data['judul_skripsi073'] ?>" class="form-control">

<label>Topik</label>
<input type="text" name="topik" value="<?= $data['topik073'] ?>" class="form-control">

<label>Semester</label>
<select name="semester" class="form-control">
    <option <?= $data['semester073']=='Gasal'?'selected':'' ?>>Gasal</option>
    <option <?= $data['semester073']=='Genap'?'selected':'' ?>>Genap</option>
</select>

<label>Tahun</label>
<input type="text" name="tahun" value="<?= $data['thn_ajaran073'] ?>" class="form-control">

<br>
<button type="submit" name="update" class="btn btn-success">Update</button>
<a href="starter.php?page=skripsi" class="btn btn-secondary">Kembali</a>

</form>