<?php
// hostname or ip of server
$servername='localhost';
// username and password
$dbusername='root';
$dbpassword='';
$conn = new mysqli("$servername","$dbusername","$dbpassword");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    return;
}
if ($conn) {
    echo "Koneksi berhasil\n";
}
?>