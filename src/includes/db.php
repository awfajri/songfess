<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "songffess";
$port = 3306; // optional port

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>