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

$query = mysqli_query($koneksi, 'insert into anggota(nm_anggota,alamat,ttl_anggota,status_anggota) values ("'.$nama.'","'.$alamat.'","'.$ttl.'","'.$status.'")');

if ($query) {
    echo "<script>alert('data berhasil disimpan');
    document.location.href='anggota.php'</script>\n";
} else {
    echo "<script>alert('data gagal disimpan');
    document.location.href='input_anggota.php'</script>\n";
}
?>