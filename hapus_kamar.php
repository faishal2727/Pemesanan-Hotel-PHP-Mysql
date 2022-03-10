<?php

    include('connection.php');
    if(isset($_GET['id'])){
        $id_mahasiswa = $_GET['id'];
        $deleted_at = date('Y-m-d H:i:s');
        $del_flage = 1;
        
        $statement = mysqli_query($connection,"DELETE FROM kamar WHERE id_kamar = '$_GET[id]'");
      


        if($statement){
            $_SESSION['message'] = '<div class ="alert alert-success" role="alert">Berhasil Menghapus Data</div>' ;
            header("location:daftar_kamar.php");
        }else{
            $_SESSION['message'] = '<div class ="alert alert-danger" role="alert">Gagal Menghapus Data</div>' ;
            header("location:daftar_kamar.php");
        }

    }   

?>
