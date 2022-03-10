<?php

    include('connection.php');
    if(isset($_GET['id'])){
        $id_mahasiswa = $_GET['id'];
        $tgl_bayar = date('Y-m-d H:i:s');
        $status = 1;
        
        
        $statement = mysqli_query($connection,"UPDATE tb_transaksi SET tgl_bayar='$tgl_bayar', status= '$status' WHERE id_trs = '$id_mahasiswa'");


        if($statement){
            $_SESSION['message'] = '<div class ="alert alert-success" role="alert">Berhasil Membayar </div>' ;
            header("location:data_reservasi.php");
        }else{
            $_SESSION['message'] = '<div class ="alert alert-danger" role="alert">Gagal Membayar</div>' ;
            header("location:data_reservasi.php");
        }



    }   



   
?>