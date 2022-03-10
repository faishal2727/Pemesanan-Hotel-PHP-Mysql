<?php
   include('connection.php');
    if(!isset($_SESSION['login'])){
        header("location: index.php");
    }

    $statement = mysqli_query($connection, "SELECT * FROM tb_pelanggan WHERE id_pelanggan=".$_GET['id']);
    while($row = mysqli_fetch_array($statement)){
        $id_pelanggan = $row['id_pelanggan'];
        $nama = $row['nama'];
        $nik = $row['nik'];
        $jk= $row['jk'];
        $alamat = $row['alamat'];
        $telp= $row['telp'];


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
            <form method="POST" action= "ubah_proses.php">
                <div style="  margin: auto; border-radius: 30px;" class="card-body">
                <h3 class="text-center "><b>Ubah Data Pelanggan</b></h3>
                     <div class="form-group">
                        <label class="mt-2 mb-2" for="nama">Nama</label>
                        <input type="text" class="form-control" id ="nama" name ="nama" placeholder="Masukkan Nama..." value ="<?php echo $nama; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class=" mt-2 mb-2" for="exampleInputEmail1">NIK</label>
                        <input type="number" class="form-control" id ="nik" name ="nik" placeholder="Masukkan NIK..." value ="<?php echo $nik; ?>"required>
                        <input type="hidden" id="id_pelanggan" name="id_pelanggan" value="<?php echo $id_pelanggan?>">
                    </div>
                    <div class="form-group">
                        <label class="mt-2 mb-2" for="jk">Jenis Kelamin</label>
                        <select class = "form-control"name="jk" id="jk" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="mt-2 mb-2" for="alamat">Alamat</label>
                        <textarea class="form-control" id ="alamat" name ="alamat" placeholder="Masukkan Alamat..." required><?php echo $alamat; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class=" mt-2 mb-2" for="no_hp">No HP</label>
                        <input type="number" class="form-control" id ="telp" name ="telp" value ="<?php echo $telp; ?>" placeholder="Masukkan No HP..." required>
                    </div>
                   
                   

                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-danger" onclick="history.back()">Batal</button>
                        <input  style="background-color:rgb(32, 38, 50);" type="submit" name="submit" class="btn btn-primary" value="SIMPAN" onclick="return confirm('Apakah Anda yakin ?')">
                    </div>
                    
                </div>
            </form>    

        </div>
        
    </div>
    <?php include('js.php'); ?>
    
</body>
</html>
