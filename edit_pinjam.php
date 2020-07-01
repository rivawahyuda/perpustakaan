<?php 
session_start(); 
// cek jika belom login, pindah ke halaman login
if(!isset($_SESSION['is_login'])) {
  header("Location: login.php");
}

require_once __DIR__."/koneksi.php";
$id = $_GET['id'];
$query = mysqli_query ($koneksi, "select * from meminjam where id_pinjam=$id");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Perpustakaan | Pinjaman</title>

  <!-- Custom fonts for this template-->
  <link href="sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include("templates/sidebar.php");?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <?php include("templates/top-navbar.php");?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Peminjaman</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Peminjaman Buku</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="proses_edit_pinjam.php?id=<?php echo $id;?>">
                        <div class="form-group">
                            <label>Nama Peminjam</label>
                            <select class="form-control" name="anggota">
                                <?php
                                    $sql_anggota="select * from anggota order by id_anggota";
                                    $kueri_anggota=mysqli_query($koneksi, $sql_anggota) or die(mysqli_error());
                                    while (list($kode, $nama_status)=mysqli_fetch_array($kueri_anggota)) {
                                ?>
                                    <option  value="<?php echo $kode ?>"
                                        <?php 
                                            if($kode == $data['id_anggota']) {
                                                echo("selected");
                                            }
                                        ?>
                                    >
                                        <?php echo $nama_status ?>
                                    </option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <select class="form-control" name="buku">
                                <?php
                                    $sql_buku="select * from buku order by kd_buku";
                                    $kueri_buku=mysqli_query($koneksi, $sql_buku) or die(mysqli_error());
                                    while (list($kode,$nama_status)=mysqli_fetch_array($kueri_buku)) {
                                ?>
                                    <option  value="<?php echo $kode ?>"
                                        <?php 
                                            if($kode == $data['kd_buku']) {
                                                echo("selected");
                                            }
                                        ?>
                                    >
                                        <?php echo $nama_status ?>
                                    </option>
                                <?php }?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Perpustakaan Yuda 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="sb-admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="sb-admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="sb-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="sb-admin/js/demo/datatables-demo.js"></script> -->
</body>

</html>