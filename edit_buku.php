<?php 
session_start(); 
// cek jika belom login, pindah ke halaman login
if(!isset($_SESSION['is_login'])) {
  header("Location: login.php");
}

require_once __DIR__."/koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi, "select * from buku where kd_buku=$id");
$data= mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Perpustakaan | Buku</title>

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
            <h1 class="h3 mb-4 text-gray-800">Buku</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Tambah Buku</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="proses_edit_buku.php?id=<?php echo $id;?>">
                        <div class="form-group">
                            <label>Kode Buku</label>
                            <input type="text" name="kode" value="<?php echo $data['kd_buku']?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" value="<?php echo $data['judul_buku']?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Pengarang</label>
                            <input type="text" name="pengarang" value="<?php echo $data['pengarang']?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jenis</label>
                            <select class="form-control" name="jenis">
                                <option value="<?php echo $data['jenis_buku']?>"><?php echo $data['jenis_buku']?></option>
                                <option value="Novel">Novel</option>
                                <option value="Komik">Komik</option>
                                <option value="Ensiklopedi">Ensiklopedi</option>
                                <option value="Dongeng">Dongeng</option>
                                <option value="Biografi">Biografi</option>
                                <option value="Karya Ilmiah">Karya Ilmiah</option>
                                <option value="Kamus">Kamus</option>
                                <option value="Panduan">Panduan</option>
                                <option value="Fotografi">Fotografi</option>
                                <option value="Tafsir">Tafsir</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Penerbit</label>
                            <input type="text" name="penerbit" value="<?php echo $data['penerbit']?>" class="form-control">
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