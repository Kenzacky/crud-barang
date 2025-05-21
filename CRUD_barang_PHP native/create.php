<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tambah Barang</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="create.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Tambah Barang</h2>
  <form action="store.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Kode</label>
      <input type="text" name="kode" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Nama Barang</label>
      <input type="text" name="nama_barang" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Deskripsi</label>
      <textarea name="deskripsi" class="form-control" required></textarea>
    </div>
    <div class="form-group">
      <label>Harga Satuan</label>
      <input type="number" name="harga_satuan" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Jumlah</label>
      <input type="number" name="jumlah" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Foto</label>
      <input type="file" name="foto" class="form-control-file" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
