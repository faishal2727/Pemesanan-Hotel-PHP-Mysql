<?php

    include('connection.php');

    if(isset($_POST['submit'])){
        $seri = $_POST['no_seri'];
        $jenis = $_POST['jenis'];
        $type = $_POST['type'];
        $tarif = $_POST['tarif'];
        $jumlah = $_POST['jumlah'];
       
        $created_at = date('Y-m-d H:i:s');
      

        $statement = mysqli_query($connection,"INSERT INTO kamar (no_seri,jenis,type,tarif,jumlah,created_at)
            VALUES ('$seri','$jenis','$type','$tarif','$jumlah','$created_at')");

        if($statement){
            $_SESSION['message'] = '<div class ="alert alert-success" role="alert">Berhasil menambahkan Data</div>' ;
            header("location:daftar_kamar.php");
        }else{
            $_SESSION['message'] = '<div class ="alert alert-danger" role="alert">Gagal Menambahkan Data</div>' ;
            header("location:tambah_kamar.php");
        }

    }
    

?>