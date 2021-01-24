<?php
include "latihan_1.php";
mysqli_select_db($conn, "lat_dbase");

$conn->query("UPDATE tbl_mhs SET Age = '30' WHERE FirstName = 'Karina' AND LastName = 'Suwandi'");

$conn->close();
?>