<?php
session_start();

// Koneksi ke database
include "includes/koneksi.php";

if ( isset($_SESSION["login"]) ) {
    header("location: index.php");
    exit;
  }

  require 'fungsi.php';

  if (isset($_POST["login"]) ) {

    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    // cek email yang dimasukkan ada atau tidak di database
    $result= mysqli_query($koneksi, "SELECT * FROM users WHERE 
              email = '$email' AND password = '$password'");

    // cek email
    if ( mysqli_num_rows($result) === 1) {

        // set session
        $_SESSION["login"] = true;

        header("location: index.php"); 
        exit;   
      }
      $error = true;
    }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="assets/style.css">

    <title>Form Login</title>
  </head>
  <body>

    <form method="post" action="login.php">
         <?php if ( isset($error) ) : ?>
            <script>
                alert('Username atau password salah!');
                document.location.href= 'login.php';
            </script>
        <?php endif; ?>

        <h2>Login</h2>
        <label for="email"> Email </label><br>
        <input type="email" id="email" name="email" placeholder="Enter email"><br>
        <label for="password"> Password </label><br>
        <input type="password" id="password" name="password" placeholder="Enter password"><br>
        <button type="submit" class="btn btn-primary" name="login">Login</button>
        <!-- <p style="text-align: center;"> Belum punya akun? Daftar <a href="tambah.php">disini!</a></p> -->
    </form>
    
  </body>
</html>
