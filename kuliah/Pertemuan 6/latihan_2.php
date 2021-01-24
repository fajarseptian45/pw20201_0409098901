<?php
include "latihan_1.php";

$dbname = "lat_dbase";
$sql = "CREATE DATABASE $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully with the name $dbname";
} else {
    echo "Error creating database: " . $conn->error;
}
?>