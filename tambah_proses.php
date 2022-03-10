<?php

    include('connection.php');

    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $nik = $_POST['nik'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
       
        $created_at = date('Y-m-d H:i:s');
        $del_flage  = 0;


        $statement = mysqli_query($connection,"INSERT INTO tb_pelanggan (nama,nik,jk,alamat,telp,created_at,del_flage)
            VALUES ('$nama','$nik','$jk','$alamat','$telp','$created_at','$del_flage')");

        if($statement){
            $_SESSION['message'] = '<div class ="alert alert-success" role="alert">Berhasil menambahkan Data</div>' ;
            header("location:daftar_pelanggan.php");
        }else{
            $_SESSION['message'] = '<div class ="alert alert-danger" role="alert">Gagal Menambahkan Data</div>' ;
            header("location:tambah.php");
        }

    }
    

?>