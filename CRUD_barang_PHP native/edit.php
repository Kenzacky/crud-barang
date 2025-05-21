<?php
include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM barang WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Barang</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="edit.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Edit Barang</h2>
  <form action="update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <div class="form-group">
      <label>Kode</label>
      <input type="text" name="kode" value="<?= $row['kode'] ?>" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Nama Barang</label>
      <input type="text" name="nama_barang" value="<?= $row['nama_barang'] ?>" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Deskripsi</label>
      <textarea name="deskripsi" class="form-control" required><?= $row['deskripsi'] ?></textarea>
    </div>
    <div class="form-group">
      <label>Harga Satuan</label>
      <input type="number" name="harga_satuan" value="<?= $row['harga_satuan'] ?>" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Jumlah</label>
      <input type="number" name="jumlah" value="<?= $row['jumlah'] ?>" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Foto (biarkan kosong jika tidak diganti)</label>
      <input type="file" name="foto" class="form-control-file">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>