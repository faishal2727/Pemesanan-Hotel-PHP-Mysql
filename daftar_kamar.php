<?php

   include('connection.php');

   if (!isset($_SESSION['login'])){
    header("Location: index.php");
}

    $statement = mysqli_query($connection,"SELECT * FROM kamar ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include("head.php"); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f9355065a6.js" crossorigin="anonymous"></script>
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
                <a  style="background-color:rgb(32, 38, 50);"  class = "btn btn-primary float-right" href="tambah_kamar.php"><i class="fas fa-plus"></i> Tambah Data Kamar</a>
            
          
            <h3 class="text-center"><b>Daftar Kamar</b></h3>
                <div  class="table table-bordere text-center">
                <table  style="border-radius:10;" class="table table-secondary table-striped">
                <thead>
                <tr><b>
                            <td><b>NO</b></td>
                            <td><b>Seri Kamar</b></td>
                            <td><b>Jenis</b></td>
                            <td><b>Type</b></td>
                            <td><b>Tarif</b></td>
                            <td><b>Jumlah</b></td>
                            <td><b>Aksi</b></td>
                            </b></tr>
              </thead>
    
                    <tbody>
                        <?php $no=1; while($row = mysqli_fetch_array($statement)): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['no_seri'];?></td>
                            <td><?= $row['jenis']; ?></td>
                            <td><?= $row['type']; ?></td>
                            <td><?= $row['tarif']; ?></td>
                            <td><?= $row['jumlah'];?></td>
                            <td>
                                <a href="edit_kamar.php?id=<?= $row['id_kamar']; ?>" class="btn btn-warning btn-block"><i class="fas fa-edit"></i></a>
                                <a href="hapus_kamar.php?id=<?= $row['id_kamar']; ?>" class="btn btn-danger btn-block" onclick="return confirm('Apakah Anda yakin ?')"class="btn btn-danger btn-block"><i class="fas fa-trash"></i></a>
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