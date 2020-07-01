<?php
session_start(); 
// cek jika belom login, pindah ke halaman login
if(!isset($_SESSION['is_login'])) {
  header("Location: login.php");
}

require_once __DIR__."/koneksi.php";

$id = $_GET['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query = mysqli_query($koneksi, "UPDATE admin SET nama='$nama', username='$username', password='$password' WHERE id='$id'");

if ($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='admin.php'</script>\n";
} else {
echo "<script>alert('data gagal disimpan');
document.location.href='admin.php'</script>\n";
}
// ?>