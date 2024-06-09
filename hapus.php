<?php
// koneksi ke session dulu
session_start();

// kalo user maksa masuk ke halaman ini tanpa login maka tendang dia ke halaman login.php
if( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;
}

require 'funcions.php';
$id = $_GET["id"];
?>