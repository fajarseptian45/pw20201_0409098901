<?php
include "latihan_1.php";
mysqli_select_db($conn, "lat_dbase"); // mengaktifkan database

$conn->query("INSERT INTO tbl_mhs (FirstName, LastName, Age) VALUES ('Karina', 'Suwandi', '29')");
$conn->query("INSERT INTO tbl_mhs (FirstName, LastName, Age) VALUES ('Glenn', 'Gandari', '32')");

$conn->close();
?>