<?php
   include('connection.php');
    if(!isset($_SESSION['login'])){
        header("location: index.php");
    }

    $statement = mysqli_query($connection, "SELECT * FROM kamar WHERE id_kamar=".$_GET['id']);
    while($row = mysqli_fetch_array($statement)){
        $id_kamar = $row['id_kamar'];
        $no_seri = $row['no_seri'];
        $jenis = $row['jenis'];
        $type = $row['type'];
        $tarif = $row['tarif'];
        $jumlah = $row['jumlah'];
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
            <form method="POST" action= "edit_kamar_proses.php">
                <div  style="  margin: auto; border-radius: 30px;" class="card-body">
                <h3 class="text-center "><b>Ubah Data Kamar</b></h3>
                     <div class="form-group">
                        <label class="mb-2 mt-2" for="no_seri">Kode Kamar : </label>
                        <input type="hidden" id="id_pelanggan" name="id" value="<?php echo $id_kamar?>">
                        <input type="text" class="form-control" id ="no_seri" name ="no_seri" placeholder="Masukkan No Seri..." value ="<?php echo $no_seri; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class=" mb-2 mt-2" for="jenis">Jenis Kamar : </label>
                        <select type="text" name="jenis" class="form-control">
                            <option value="" selected>- Jenis Kamar -</option>
                            <option value="Standard">Standard</option>
                            <option value="Superior Room">Superior Room</option>
                            <option value="Deluxe Room">Deluxe Room</option>
                            <option value="Presidential Room">Presidential Room</option>

                        </select>
                    </div>  
                    <div class="form-group">
                        <label class=" mb-2 mt-2" for="type">Type Kamar : </label>
                        <select type="text" name="type" class="form-control">
                            <option value="" selected>- Type Kamar -</option>
                            <option value="Single">Single</option>
                            <option value="Double">Double</option>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label class="mt-2 mb-2"  for="tarif">Tarif</label>
                        <input type="text" class="form-control" id ="tarif" name ="tarif" placeholder="Masukkan Nama..." value ="<?php echo $tarif; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class=" mt-2 mb-2"  for="tarif">Jumlah</label>
                        <input  type="text" class="form-control" id ="jumlah" name ="jumlah" placeholder="Masukkan Nama..." value ="<?php echo $jumlah; ?>" required>
                    </div>
                    <div class="form-group">
                  
                   

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
