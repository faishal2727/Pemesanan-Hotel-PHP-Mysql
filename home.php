<?php

   include('connection.php');

   if (!isset($_SESSION['login'])){
    header("Location: index.php");
}
  $statement4 = mysqli_query($connection,"SELECT * FROM tb_admin");
  while($row = mysqli_fetch_array($statement4)){
    $username = $row['username'];

   
}
    $statement = mysqli_query($connection,"SELECT * FROM tb_pelanggan");
    $result1 = mysqli_num_rows($statement);

    $statement2 = mysqli_query($connection,"SELECT * FROM kamar");
    $result2 = mysqli_num_rows($statement2);

    $statement3 = mysqli_query($connection,"SELECT * FROM tb_transaksi");
    $result3 = mysqli_num_rows($statement3);
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

    <div class="container mt-5">
    <?php include("nav.php");?>
        <div class="row">
          <div class=" col-sm-12 col-md-12 text-center mt-5">
            <h2><b>Selamat Datang</b></h2>
            <h2><b>HotelKu</b></h2>
            <h3><p>Anda Masuk Sebagai : <?php echo $username; ?></p></h3>
            
            <hr class="mx-auto bg-secondary" />
          </div>
        </div>
      </div>
        <div class="container mb-5" id="listBook">
            <div class="row">
              <div class="col-12 col-md-4" >
                <div class="card mb-4 shadow-lg  mb-5" style="width: 15rem;  margin: auto; border-radius: 30px;"  id="kategori">
                 
                  <div class="card-body" >
                    <h5 class="card-title" style="text-align: center; font-style: bold;"><b>Jumlah Pelanggan Aktif</b></h5>
                    <p class="card-text fs-1" style="text-align: center ; font-style:bold; text-size 100px;"><?=$result1;?></p>
                  </div>
                </div>
              </div>
        
            <div class="col-12 col-md-4">
              <div class="card mb-4 shadow-lg  mb-5" style="width: 15rem;  margin: auto; border-radius: 30px;"  id="kategori">
               
              <div class="card-body" >
                    <h5 class="card-title" style="text-align: center; font-style: bold;"><b>Jumlah Data Kamar Hotel</b></h5>
                    <p class="card-text fs-1" style="text-align: center ; font-style:bold; text-size 100px;"><?=$result2;?></p>
                  </div>
                </div>
            </div>
      
            <div class="col-12 col-md-4">
              <div class="card mb-4 shadow-lg mb-5" style="width: 15rem;  margin: auto; border-radius: 30px;"  id="kategori">
              
                <div class="card-body" >
                    <h5 class="card-title" style="text-align: center; font-style: bold;"><b>Jumlah Data Resservasi</b></h5>
                    <p class="card-text fs-1" style="text-align: center ; font-style:bold; text-size : ;"><?=$result3;?></p>
                  </div>
                </div>
            </div>
      
           
            </div>
</body>
</html>