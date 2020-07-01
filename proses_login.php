<?php
session_start();

// jika klik tombol login
if(isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  require_once __DIR__."/koneksi.php";
  
  $query = "SELECT * FROM admin WHERE username = '". $username ."'";
  $result= mysqli_query($koneksi, $query);

  // Cek apakah username terdaftar
  if($result->num_rows == 0)
    die("Username atau password salah");

  $row = mysqli_fetch_assoc($result);

  // cek apakah password input sama dengan password di database
  // karena menggunakan enkripsi, maka perlu menggunakan fungsi password_verify
  // untuk memvalidasi
  if(!password_verify($password, $row['password']))
    die("Username atau password salah");

  $_SESSION['is_login'] = true;
  $_SESSION['id'] = (int) $row['id'];
  $_SESSION['username'] = $row['username'];
  $_SESSION['nama'] = $row['nama'];

  header("Location: index.php");
}
?>