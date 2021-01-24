<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "artikel_db";

$conn = new mysqli("$servername","$dbusername","$dbpassword");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    return;
}

//pilih database
$pilih_db = mysqli_select_db($conn, $dbname);
if(!$pilih_db){
    $sql = "CREATE DATABASE $dbname";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully with the name $dbname";
    } else {
        echo "Error creating database: " . $conn->error;
        exit;
    }
}

$sql = "CREATE TABLE articles(
    articleID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(articleID),
    judul varchar(255),
    penulis varchar(255),
    lead varchar(255),
    content text,
    waktu TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($sql);
?>