<?php
    include "latihan_1.php";
    mysqli_select_db($conn, "lat_dbase");

    $sql = "INSERT INTO tbl_mhs (FirstName, LastName, Age) VALUES
    ('$_POST[firstname]','$_POST[lastname]','$_POST[age]')";

    if ($conn->query($sql)) {
        echo "1 record added";   
    } else {
        die('Error: ' . $conn->error());
    }
    $conn->close()
?>