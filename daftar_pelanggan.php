<?php

   include('connection.php');

   if (!isset($_SESSION['login'])){
    header("Location: index.php");
}

    $statement = mysqli_query($connection,"SELECT * FROM tb_pelanggan ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include("head.php"); ?>
    <script src="https://kit.fontawesome.com/f9355065a6.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body style="background-color:rgb(220, 222, 224);">
    <?php include("nav.php");?>
    <div class= "container" style = "margin-top :100px; margin-bottom : 100px;">
        <div class="">
            
            <?php 
                if(!empty($_SESSION['message'])){
                    echo $_SESSION['message'];
                    $_SESSION['message'] = null;
                }
            
            ?>    
        </div>
          
            <div class="card-body shadow p-3 mb-5 bg-body rounded">
                <a style="background-color:rgb(32, 38, 50);"  class="btn btn-primary float-right" href="tambah.php"><i class="fas fa-plus"></i> Tambah Data Pelanggan</a>
                <h3 class="text-center"><b>Daftar Pelanggan</b></h3>
                <div class="table table-bordered text-center">
                <table class="table table-secondary table-striped">
                <thead>
                <tr>
                            <td><b>No</b></td>
                            <td><b>Nama</b></td>
                            <td><b>NIK</b></td>
                            <td><b>Jenis Kelamin</b></td>
                            <td><b>Alamat</b></td>
                            <td><b>No.HP</b></td>
                            <td><b>Aksi</b></td>
                        </tr>
              </thead>
    
                    <tbody>
                        <?php $no=1; while($row = mysqli_fetch_array($statement)): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['nik']; ?></td>
                            <td><?= $row['jk']; ?></td>
                            <td><?= $row['alamat']; ?></td>
                            <td><?= $row['telp'];?></td>
                            <td>
                                <a href="ubah.php?id=<?= $row['id_pelanggan']; ?>" class="btn btn-warning btn-block"><i class="fas fa-edit"></i></a>
                                <a href="hapus.php?id=<?= $row['id_pelanggan']; ?>" onclick="return confirm('Apakah Anda yakin ?')"class="btn btn-danger btn-block"><i class="fas fa-trash"></i></a>
                            </td>      
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </div>
            </div>
        <div>

        </div>
        
    </div>
    
</body>
</html>