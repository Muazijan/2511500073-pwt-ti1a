<?php
require_once __DIR__ . "/../config/koneksi.php";
?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">skripsi</h1>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $kd = $_GET['kd'];

        $query = mysqli_query($conn, "DELETE FROM skripsi_2511500073 WHERE id_skripsi073 = '$kd'");

        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
                Berhasil Di Hapus
            </div>';

            echo '<meta http-equiv="refresh" content="1;url=starter.php?page=skripsi">';
        }
    }
}
?>

<div class="content">
    <div class="container-fluid">
  <div class="card">
    <div class="card-body">

      <a href="starter.php?page=tambah_skripsi" class="btn btn-primary btn-sm">
        Tambah skripsi
      </a>

      <br><br>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>id skripsi</th>
            <th>judul skripsi</th>
            <th>topik</th>
            <th>semester</th>
            <th>tahun ajaran</th>
            <th>aksi</th>

          </tr>
        </thead>

        <tbody>
          <?php
          $no = 0;
          $query = mysqli_query($conn, "SELECT * FROM skripsi_2511500073 ");

          while ($result = mysqli_fetch_array($query)) {
              $no++;
          ?>
          <tr>
            <td><?= $no; ?></td>
            <td><?= $result['id_skripsi073']; ?></td>
            <td><?= $result['judul_skripsi073']; ?></td>
            <td><?= $result['topik073']; ?></td>
            <td><?= $result['semester073']; ?></td>
            <td><?= $result['thn_ajaran073']; ?></td>
            <td>
              
              <a href="starter.php?page=skripsi&action=hapus&kd=<?= $result['id_skripsi073']; ?>"
   onclick="return confirm('Yakin ingin menghapus data ini?')">
    <span class="badge badge-danger">Hapus</span>
</a>

              
              <a href="starter.php?page=edit_skripsi&kd=<?= $result['id_skripsi073']; ?>" title="Edit">
                <span class="badge badge-warning">Edit</span>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>

      </table>

    </div>
  </div>
</div>
