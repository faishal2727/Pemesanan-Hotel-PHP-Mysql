<?php

     include('connection.php');

    if(isset($_POST['submit'])){
        $id_kamar = $_POST['id'];
        $no_seri = $_POST['no_seri'];
        $jenis = $_POST['jenis'];
        $type = $_POST['type'];
        $tarif = $_POST['tarif'];
        $jumlah = $_POST['jumlah'];
      

        $statement = mysqli_query($connection,"UPDATE kamar SET no_seri ='$no_seri', jenis ='$jenis', type='$type', tarif='$tarif', jumlah='$jumlah'
         WHERE id_kamar = '$id_kamar' ");
        

        if($statement){
            $_SESSION['message'] = '<div class ="alert alert-success" role="alert">Berhasil Mengubah Data</div>' ;
            header("location:daftar_kamar.php");
        }else{
            $_SESSION['message'] = '<div class ="alert alert-danger" role="alert">Gagal Mengubah Data</div>' ;
            header("location:detail.php?id=$id_kamar");
        }

    }
    
?>