<?php
    include('connection.php');
    if(!isset($_SESSION['login'])){
        header("location:index.php");
    }

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
        <div class="card mt-5 shadow p-3 mb-5 bg-body rounded">
            <form method="POST" action= "transaksi_proses.php">
                <div class="card-body" style="  margin: auto; border-radius: 30px;">
                <h3 class="text-center "><b>Booking</b></h3>
                <div class="form-group">
                        <label class=" mb-2 mt-2" for="seri">Kode Kamar : </label>
                        <select type="text" name="seri" class="form-control">
                            <option value="" selected>- Kode Kamar -</option>
                            <?php 
                                include('connection.php');

                                $seri_kamar = mysqli_query($connection, "SELECT * FROM kamar ORDER BY id_kamar ASC");
                                while ($datak = mysqli_fetch_array($seri_kamar)) {
                                    echo "<option value ='$datak[id_kamar]'>$datak[no_seri]</option>";
                                }
                                ?>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label class=" mb-2 mt-2" for="nama">Nama Pelanggan : </label>
                        <select type="text" name="nama" class="form-control">
                        
                            <option value="" selected>- Nama Pelanggan -</option>
                            <?php 
                                include('connection.php');

                                $nama_pel = mysqli_query($connection, "SELECT * FROM tb_pelanggan ORDER BY id_pelanggan ASC");
                                while ($data = mysqli_fetch_array($nama_pel)) {
                                    echo "<option value ='$data[id_pelanggan]'>$data[nama]</option>";
                                }
                                ?>
                        </select>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="mb-2 mt-2" for="checkin">Check-In</label>
                        <input type="date" class="form-control" id ="tgl_masuk" name ="tgl_masuk" placeholder="Masukkan Tanggal Check-In..." required>
                    </div>
                    <div class="form-group">
                        <label class=" mb-2 mt-2" for="checkin">Check-Out</label>
                        <input type="date" class="form-control" id ="tgl_keluar" name ="tgl_keluar" placeholder="Masukkan Tanggal Check-In..." required>
                    </div>
                     
                    <div class="form-group">
                        <label class=" mb-2 mt-2" for="lama">Lama Inap</label>
                        <input type="number" class="form-control" id ="lama" name ="lama" placeholder="Masukkan Lama Inap..." required>
                    </div>
            
                  
                    

                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-danger" onclick="history.back()">Batal</button>
                        <input style="background-color:rgb(32, 38, 50);"  type="submit" name="submit" class="btn btn-primary" value="SIMPAN" onclick="return confirm('Apakah Anda yakin ?')">
                    </div>
                    
                </div>
            </form>    

        </div>
        
    </div>
    <?php include('js.php'); ?>
    
</body>
</html>

