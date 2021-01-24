<?php
    include "latihan_1.php";
    mysqli_select_db($conn, "lat_dbase"); // mengaktifkan database
    
    //membuat tabel
    $sql = "CREATE TABLE tbl_mhs(
        mhsID int NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(mhsID),
        FirstName varchar(15),
        LastName varchar(15),
        Age int
    )";
    $conn->query($sql);
    // input data
    $input = "INSERT into tbl_mhs(FirstName,LastName,Age) values('Anjar','Prabowo',25)";
    if($conn->query($input) == true) {
        echo "Berhasil Input Data";
    }
?>