<?php
include "latihan_1.php";
mysqli_select_db($conn, "lat_dbase");

$hasil = $conn->query("select * from tbl_mhs");

while($data = mysqli_fetch_array($hasil)) {
    echo "$data[FirstName] $data[LastName] $data[Age]\n";
}

?>