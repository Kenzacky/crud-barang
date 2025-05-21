<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Daftar Barang</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Data Barang</h2>
  <a href="create.php" class="btn btn-primary mb-3">Tambah Barang</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Foto</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $result = $conn->query("SELECT * FROM barang");
    while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['kode'] ?></td>
        <td><?= $row['nama_barang'] ?></td>
        <td><?= $row['deskripsi'] ?></td>
        <td><?= $row['harga_satuan'] ?></td>
        <td><?= $row['jumlah'] ?></td>
        <td><img src="upload/<?= $row['foto'] ?>" width="60"></td>
        <td>
          <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>