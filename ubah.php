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

// ambil data di url
$id = $_GET["id"];
// query data mahasiswa berdasarkan id nya
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek apakah tombol sudah di klik atau belum
if( isset($_POST["submit"]) ) {
    // cek apakah data berhasil diubah
    if( ubah($_POST) > 0 ) {
        echo "
           <script>
           alert('data berhasil diubah!');
           document.localhost.href = 'index.php';
           </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal diubah!');
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
    <title>Edit data mahasiswa</title>
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <ul>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"] ?>">
            </li>
            <li>
                <label for="nrp">NRP :</label>
                <input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"] ?>">
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" required value="<?= $mhs["email"] ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"] ?>">
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="text" name="gambar" id="gambar" required value="<?= $mhs["gambar"] ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>
