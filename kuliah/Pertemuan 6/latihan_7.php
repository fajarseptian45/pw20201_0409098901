<?php
include "latihan_1.php";
mysqli_select_db($conn, "lat_dbase");

$hasil = $conn->query("select * from tbl_mhs");

$hit = mysqli_num_rows($hasil);
echo "jumlah record $hit";

?>