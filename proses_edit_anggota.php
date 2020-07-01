<?php
session_start(); 
// cek jika belom login, pindah ke halaman login
if(!isset($_SESSION['is_login'])) {
  header("Location: login.php");
}

require_once __DIR__."/koneksi.php";

$nama	= $_POST['nama'];
$alamat	= $_POST['alamat'];
$ttl	= $_POST['ttl'];
$status	= $_POST['status'];

$query = mysqli_query($koneksi, "UPDATE anggota SET nm_anggota ='$nama',
										alamat			='$alamat',
										ttl_anggota		='$ttl',
										status_anggota	='$status' 
										where id_anggota ='$_GET[id]'");
		
if ($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='anggota.php'</script>\n";
} else {
echo "<script>alert('data gagal disimpan');
document.location.href='anggota.php'</script>\n";
}
?>