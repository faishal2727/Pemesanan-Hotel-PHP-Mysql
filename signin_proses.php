<?php
include('connection.php');

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // menyeleksi data admin dengan username dan password yang sesuai
    $statement = mysqli_query($connection,"SELECT * FROM tb_admin WHERE username='$username' and password='$password'");
    //untuk ngitung ada berapa baris yang dikembalikan fngsi selct
    $cek = mysqli_num_rows($statement);
    if($cek > 0){
        $_SESSION['username'] = $username;
        $_SESSION['login'] = true;

        header("location: home.php");
    }else{
        header("location:index.php?pesan=gagal=$cek");
    }
} else{
    die("Akses dilarang...");
}

?>