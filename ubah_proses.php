<?php

     include('connection.php');

    if(isset($_POST['submit'])){
        $id_pelanggan = $_POST['id_pelanggan'];
        $nama = $_POST['nama'];
        $nik = $_POST['nik'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $updated_at = date('Y-m-d H:i:s');

        $statement = mysqli_query($connection,"UPDATE tb_pelanggan SET nama='$nama', nik='$nik', jk='$jk',
        alamat='$alamat',telp='$telp', updated_at='$updated_at'
        WHERE id_pelanggan='$id_pelanggan' ");
        

        if($statement){
            $_SESSION['message'] = '<div class ="alert alert-success" role="alert">Berhasil Mengubah Data</div>' ;
            header("location:daftar_pelanggan.php");
        }else{
            $_SESSION['message'] = '<div class ="alert alert-danger" role="alert">Gagal Mengubah Data</div>' ;
            header("location:detail.php?id=$id_pelanggan");
        }

    }
    
?>