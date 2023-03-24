<?php
require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST['cari'])) {
  $mahasiswa = cari($_POST['keyword']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <h3>Daftar Mahasiswa</h3>
  <br></br>

  <form action="" method="POST">
    <input type="text" name="keyword" size=80" placeholder="Masukan Keyword" autocomplete="off" autofocus>
    <button type="submit" name="cari">Cari!</button>
  </form>

  <table border="1" cellpadding="10" cellspasing="">

    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>NRP</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
      <th>Aksi</th>
    </tr>

    <?php if (empty($mahasiswa)) : ?>
      <tr>
        <td colspan="7">
          <p style="color: red; font-size: italic; text-align: center;">Data mahasiswa tidak ditemukan</p>
        </td>
      </tr>
    <?php endif; ?>
    <?php $i = 1;
    foreach ($mahasiswa as $m) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $m['gambar']; ?>" width="60"></td>
        <td><?= $m['nrp']; ?></td>
        <td><?= $m['nama']; ?></td>
        <td><?= $m['email']; ?></td>
        <td><?= $m['jurusan']; ?></td>
        <td>
          <a href="">Ubah</a> | <a href="detail.php?id= <?= $m['id']; ?>">Detail</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>