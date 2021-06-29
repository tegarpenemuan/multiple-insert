<?php
// Include / load file koneksi.php
include "koneksi.php";
// Ambil data yang dikirim dari form
$nis = $_POST['nis']; // Ambil data nis dan masukkan ke variabel nis
$nama = $_POST['nama']; // Ambil data nama dan masukkan ke variabel nama
$telp = $_POST['telp']; // Ambil data telp dan masukkan ke variabel telp
$alamat = $_POST['alamat']; // Ambil data alamat dan masukkan ke variabel alamat
// Proses simpan ke Database
$sql = $pdo->prepare("INSERT INTO siswa VALUES(:nis,:nama,:telp,:alamat)");
$index = 0; // Set index array awal dengan 0
foreach($nis as $datanis){ // Kita buat perulangan berdasarkan nis sampai data terakhir
  $sql->bindParam(':nis', $datanis); // Set data nis
  $sql->bindParam(':nama', $nama[$index]); // Ambil dan set data nama sesuai index array dari $index
  $sql->bindParam(':telp', $telp[$index]); // Ambil dan set data telepon sesuai index array dari $index
  $sql->bindParam(':alamat', $alamat[$index]); // Ambil dan set data alamat sesuai index array dari $index
  $sql->execute(); // Eksekusi query insert
  
  $index++; // Tambah 1 setiap kali looping
}
// Buat sebuah alert sukses, dan redirect ke halaman awal (index.php)
echo "<script>alert('Data berhasil disimpan');window.location = 'index.php';</script>";
