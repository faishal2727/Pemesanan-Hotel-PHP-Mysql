<?php

    include('connection.php');
    if(isset($_GET['id'])){
     
        
        $statement = mysqli_query($connection,"DELETE FROM tb_pelanggan WHERE id_pelanggan = '$_GET[id]'");


        if($statement){
            $_SESSION['message'] = '<div class ="alert alert-success" role="alert">Berhasil Menghapus Data</div>' ;
            header("location:daftar_pelanggan.php");
        }else{
            $_SESSION['message'] = '<div class ="alert alert-danger" role="alert">Gagal Menghapus Data</div>' ;
            header("location:daftar_pelanggan.php");
        }

    }   

?>
