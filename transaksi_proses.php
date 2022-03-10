<?php  
    include('connection.php');

    if (isset($_POST['submit'])) {
      $seri = $_POST['seri'];
      $nama = $_POST['nama'];
      $masuk = $_POST['tgl_masuk'];
      $keluar = $_POST['tgl_keluar'];
      $lama = $_POST['lama'];
  
      $input = mysqli_query($connection, "INSERT INTO tb_transaksi (id_kamar,id_pelanggan,tgl_masuk,tgl_keluar,lama) VALUES('$seri','$nama','$masuk','$keluar','$lama')");
  
      if ($input) {
        header('location:data_reservasi.php');
      }
    }
  ?>

