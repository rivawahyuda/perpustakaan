<?php
session_start(); 
// cek jika belom login, pindah ke halaman login
if(!isset($_SESSION['is_login'])) {
  header("Location: login.php");
}

require_once __DIR__."/koneksi.php";

$tgl = date('Y-m-d');
$query = mysqli_query($koneksi, "UPDATE meminjam SET tgl_kembali = '$tgl', kembali = '2' where id_pinjam ='$_GET[id]'");

if ($query) {
	echo "<script>alert('Buku Sudah Dikembalikan');
	document.location.href='pinjam.php'</script>\n";
} else {
	echo "<script>alert('gagal');
	document.location.href='pinjam.php'</script>\n";
}
?>