<?php 
$servername = "localhost";
$user		= "root";
$pasword	= "";
$db			= "perpustakaan_yuda";

$koneksi = mysqli_connect($servername,$user, $pasword)
			or die('gagal terkoneksi'.mysqli_error());
			
$database = mysqli_select_db($koneksi, $db)
			or die('gagal terhubung ke database'.mysqli_error());

function show_status($status) {
	if($status==1){
		return "Aktif";
	} elseif($status==2) {
		return "Tidak Aktif";
	} else {
		return "-";
	}
}
?>