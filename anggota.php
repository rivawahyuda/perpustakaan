<?php
session_start(); 
// cek jika belom login, pindah ke halaman login
if(!isset($_SESSION['is_login'])) {
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Perpustakaan | Anggota</title>

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
            <h1 class="h3 mb-4 text-gray-800">Anggota</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Data Anggota</h6>
                    <a href="input_anggota.php" class="btn btn-primary float-right">Tambah Anggota</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Anggota</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    require_once __DIR__."/koneksi.php"; 

                                    $query  = "select * from anggota order by id_anggota";
                                    $sql  = mysqli_query($koneksi, $query);
                                    $no = 1;
                                    while ($data=mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['id_anggota'];?></td>
                                        <td><?php echo $data['nm_anggota'];?></td>
                                        <td><?php echo $data['alamat'];?></td>
                                        <td><?php echo $data['ttl_anggota'];?></td>
                                        <td><?php echo show_status($data['status_anggota']);?></td>
                                        <td>
                                        <a href="edit_anggota.php?id=<?php echo $data['id_anggota']; ?>">Edit</a> | <a href="hapus_anggota.php?id=<?php echo $data['id_anggota']; ?>">Hapus</a>
                                        </td>
                                    </tr>
                                <?php $no++; };?>

                            </tbody>
                        </table>
                    </div>
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