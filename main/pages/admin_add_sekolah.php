<?php
session_start();
// error_reporting(0);
include_once('../system/sys_sekolah.php');
include_once('../system/sys_user.php');
$quser = new user();
$qsekolah = new sekolah();
$adminid = $_SESSION['user_id'];
if (isset($_POST['addSchool'])) {
    $npsn               = $_POST['npsn'];
    $nama_sekolah       = $_POST['nama_sekolah'];
    $status             = $_POST['status'];
    $alamat             = $_POST['alamat'];
    $provinsi           = $_POST['provinsi'];
    $kota               = $_POST['kota'];
    $kecamatan          = $_POST['kecamatan'];
    $telp               = $_POST['telp'];
    $fax                = $_POST['fax'];

    if ($qsekolah->add_school($npsn, $nama_sekolah, $status, $alamat, $provinsi, $kota, $kecamatan, $telp, $fax)) {
        header("location: detail_sekolah.php?ex=".session_id()."&npsn=".$npsn."");
    } 
    else {
        header("location: admin_add_sekolah.php?ex=".session_id()."&message=Gagal");
    }
}
?>

<!DOCTYPE html>
<html>
<?php include 'included/head.php'; ?>
<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../dist/css/adminlte.min.css">
<!-- summernote -->
<link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<body class="hold-transition sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper">

        <?php
        include 'included/navbar.php';
        include 'included/sidebar.php';
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tambah Sekolah Baru</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <?php
                    if (isset($_GET['message'])) {
                        if ($_GET['message'] == 'Success') {
                            echo '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                      Selamat anda berhasil menambahkan Akun Siswa Baru!
                    </div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Maaf!</h5>
                  Terjadi kesalahan saat menambahkan Data Sekolah, harap coba lagi..
                </div>';
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-12">

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Formulir Penambahan Siswa Baru</h3>
                                </div>

                                <form action="" method="POST">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nomor Pokok Sekolah Nasional (NPSN)</label>
                                            <input type="text" name="npsn" class="form-control" autocomplete="off" placeholder="Masukkan NPSN">
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Sekolah</label>
                                            <input type="text" name="nama_sekolah" class="form-control" autocomplete="off" placeholder="Masukkan Nama Sekolah">
                                        </div>

                                        <div class="form-group">
                                            <label>Status Sekolah</label>
                                            <select class="form-control" name="status">
                                                <option disabled readonly selected>-- Pilih Status Sekolah --</option>
                                                <option value="Negeri">Negeri</option>
                                                <option value="Swasta">Swasta</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" class="form-control" autocomplete="off" placeholder="Masukkan Alamat Lengkap Sekolah">
                                        </div>

                                        <div class="form-group">
                                            <label>Provinsi</label>
                                            <input type="text" name="provinsi" class="form-control" autocomplete="off" value="Sumatera Selatan" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label>Kabupaten/Kota</label>
                                            <select class="form-control" name="kota">
                                                <option disabled readonly selected>-- Pilih Kabupaten/Kota --</option>
                                                <option>Kabupaten Banyuasin</option>
                                                <option>Kabupaten Empat Lawang</option>
                                                <option>Kabupaten Lahat</option>
                                                <option>Kabupaten Muara Enim</option>
                                                <option>Kabupaten Musi Banyuasin</option>
                                                <option>Kabupaten Musi Rawas</option>
                                                <option>Kabupaten Musi Rawas Utara</option>
                                                <option>Kabupaten Ogan Ilir</option>
                                                <option>Kabupaten Ogan Komering Ilir</option>
                                                <option>Kabupaten Ogan Komering Ulu</option>
                                                <option>Kabupaten Ogan Komering Ulu Selatan</option>
                                                <option>Kabupaten Ogan Komering Ulu Timur</option>
                                                <option>Kabupaten Penukal Abab Lematang Ilir</option>
                                                <option>Kota Lubuklinggau</option>
                                                <option>Kota Pagar Alam</option>
                                                <option>Kota Palembang</option>
                                                <option>Kota Prabumulih</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Kecamatan</label>
                                            <input type="text" name="kecamatan" class="form-control" autocomplete="off" placeholder="Masukkan Kecamatan">
                                        </div>

                                        <div class="form-group">
                                            <label>Telepon</label>
                                            <input type="text" name="telp" class="form-control" autocomplete="off" placeholder="Masukkan Nomor Telepon">
                                        </div>

                                        <div class="form-group">
                                            <label>Fax</label>
                                            <input type="text" name="fax" class="form-control" autocomplete="off" placeholder="Masukkan Nomor Fax">
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" name="addSchool" class="btn btn-primary">Daftarkan Sekolah</button>
                                    </div>

                                </form>
                            </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <div class="modal fade" id="modal-mass-upload" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Upload Data Siswa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <b>Informasi</b>
                        <ol>
                            <li>Pastikan format yang diupload adalah .xls (Excel 97-2003)</li>
                            <li>Pastikan bahwa file yand diupload sesuai dengan template yang ditentukan</li>
                            <li>Template Excel silahkan download : <a href="bulk_upload.xls">disini</a></li>
                        </ol>
                        </p>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="file" name="mass_files" class="form-control" style="padding-bottom: 38px">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" name="bulk_upload" class="btn btn-primary">Upload Data</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <?php include 'included/footer.php'; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
</body>

</html>


<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('.textarea').summernote()
    })
</script>