<?php
// koneksi ke session dulu
session_start();

// kalo user maksa masuk ke halaman ini tanpa login maka tendang dia ke halaman login.php
if( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;
}

// konek file bang
require 'funcions.php';

// konek ke database
$conn = mysqli_connect("localhost", "farid", "test1", "phpdasar");

// cek apakah tombol sudah di klik atau belum
if( isset($_POST["submit"]) ) {

    // cek apakah data berhasil ditambahkan atau tidak
    if( tambah($_POST) > 0 ) {
        echo "
           <script>
           alert('data berhasil ditambahkan!');
           document.localhost.href = 'index.php';
           </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal ditambahkan!');
        document.localhost.href = 'index.php';
        </script>
     ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="nrp">NRP :</label>
                <input type="text" name="nrp" id="nrp" required>
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" required>
            </li>
            <li>
                <label for="jurusan">Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>
