<?php
include "latihan_1.php";
mysqli_select_db($conn, "lat_dbase");

$conn->query("DELETE FROM tbl_mhs WHERE LastName='Prabowo'");

$conn->close();
?>