<?php
    include "koneksi.php";
    
    $judul = $_POST['title'];
    $penulis = $_POST['author'];
    $lead = $_POST['abstraksi'];
    $isi = $_POST['content'];
    $lead = str_replace("\r\n","<br>",$lead);
    $content = str_replace("\r\n","<br>",$isi);

    $query = "INSERT INTO articles (judul,penulis,lead,content) 
    values('$judul','$penulis','$lead','$isi')";

    if($conn->query($query) == true) {
        echo "<h3 align=center>Proses penambahan artikel berhasil</h3>";
        echo "<A href=\"tampil_articles.php\">List</A>";
    } else {
        echo "<h2 align=center>Proses penambahan artikel tidak
        berhasil</h2>";
    }
?>