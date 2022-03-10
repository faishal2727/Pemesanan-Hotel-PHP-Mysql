<?php

   include('connection.php');

   if (!isset($_SESSION['login'])){
    header("Location: index.php");
}   
    $statement = mysqli_query($connection,"SELECT tb_transaksi.id_trs, tb_pelanggan.nama,kamar.no_seri, tb_transaksi.tgl_bayar, kamar.tarif,tb_transaksi.tgl_masuk,tb_transaksi.tgl_keluar,tb_transaksi.lama, tb_transaksi.status,tb_transaksi.lama*kamar.tarif as jumlah FROM tb_transaksi JOIN tb_pelanggan ON tb_transaksi.id_pelanggan = tb_pelanggan.id_pelanggan JOIN kamar ON tb_transaksi.id_kamar = kamar.id_kamar ");
    $jumlah = $statement->jumlah;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include("head.php"); ?>
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
            
              
           
          
            <div class="card-body shadow p-3 mb-5 bg-body rounded col-12 col-md-12">
            <h3 class="text-center"><b>Data Reservasi Pelanggan</b></h3>
                <div class="table table-bordered text-center">
                <table class="table table-secondary table-striped text-center ">
                <thead>
                <tr>
                            <td><b>No</b></td>
                            <td><b>Nama Pelanggan</b></td>
                            <td><b>Kode Kamar</b></td>
                            <td><b>Permalam</b></td>
                            <td><b>Check-in</b></td>
                            <td><b>Check-out</b></td>
                            <td><b>Lama Inap</b></td>
                            <td><b>Total Tagihan</b></td>
                            <td><b>Tanggal Bayar</b></td>
                            <td><b>Status</b></td>
                            <td><b>Aksi</b></td>
                        </tr>
              </thead>
    
                    <tbody>
                        <?php $no=1; while($row = mysqli_fetch_array($statement)):?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['no_seri']; ?></td>
                            <td><?= $row['tarif']; ?></td>
                            <td><?= $row['tgl_masuk']; ?></td>
                            <td><?= $row['tgl_keluar'];?></td>
                            <td><?= $row['lama'];?></td>
                            
                            <td><?= $row['jumlah'];?></td>
                            <td><?= $row['tgl_bayar'];?></td>
                            <?php if($row['status'] == 1): ?>
                                <td>Lunas</td>
                                <td>
                                <a href="" class="btn btn-secondary btn-block" >Done</a>
                            </td> 
                            <?php else: ?>

                                <td> Tidak Lunas</td>
                                <td>
                                <a href="bayar.php?id=<?= $row['id_trs']; ?>" class="btn btn-success btn-block" onclick="return confirm('Apakah Anda yakin ?')">Bayar</a>
                            </td> 
                            <?php endif; ?>
                                 
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </div>
            </div>
        <div>
        </div>

        </div>
        
    </div>
    
</body>
</html>