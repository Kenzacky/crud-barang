<?php
include 'db.php';

$kode = $_POST['kode'];
$nama = $_POST['nama_barang'];
$desc = $_POST['deskripsi'];
$harga = $_POST['harga_satuan'];
$jumlah = $_POST['jumlah'];

$foto = $_FILES['foto']['name'];
$tmp  = $_FILES['foto']['tmp_name'];
move_uploaded_file($tmp, "uploads/".$foto);

$sql = "INSERT INTO barang (kode, nama_barang, deskripsi, harga_satuan, jumlah, foto) VALUES ('$kode', '$nama', '$desc', '$harga', '$jumlah', '$foto')";
$conn->query($sql);

header("Location: index.php");
?>
