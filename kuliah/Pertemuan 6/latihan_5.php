<?php
include "latihan_1.php";
mysqli_select_db($conn, "lat_dbase");

$hasil = $conn->query("select * from tbl_mhs");

while($data = mysqli_fetch_row($hasil)) {
    echo "$data[0] $data[1] $data[2]\n";
}

?>