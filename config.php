<?php
$host = "localhost";
$dbname = "birthday";
$user = "root"; // ganti dengan username MySQL-mu
$pass = "";     // ganti dengan password MySQL-mu

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
