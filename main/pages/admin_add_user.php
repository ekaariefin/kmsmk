<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_user.php');
  include_once('../system/sys_point.php');
  $quser = new user();
  $qpoint = new point();
  $adminid = $_SESSION['user_id'];
  if(isset($_POST['addUser']))
  {
    $user_nip     = $_POST['user_nip'];
    $user_name    = $_POST['user_name'];
    $user_gender  = $_POST['user_gender'];
    $user_photo   = "blank.jpg";
    $user_role    = "Siswa";
    $user_password  = md5($user_nip);
    $npsn         = $_SESSION['npsn_login'];
    $class_id     = $_POST['class_id'];

    if($quser->add_new_user($user_nip, $user_name, $user_gender, $user_photo, $user_role, $npsn, $user_password)){


      $catch = $quser->catch_userid($user_nip);
      foreach($catch as $row) {
          $current_userid = $row['user_id'];
      }

      if($quser->add_new_student_class($current_userid, $class_id)){
      header("location: admin_add_user.php?&message=Success");
      }
    }
    else{
      header("location: admin_add_user.php?ex=&message=Gagal");
    }
  }

  if(isset($_POST['bulk_upload'])){
    include "../excel_parsing.php";

    // upload file xls
    $target = basename($_FILES['mass_files']['name']) ;
    move_uploaded_file($_FILES['mass_files']['tmp_name'], $target);
    chmod($_FILES['mass_files']['name'],0777);
    $data = new Spreadsheet_Excel_Reader($_FILES['mass_files']['name'],false);
    $jumlah_baris = $data->rowcount($sheet_index=0);

    $queue = 0;
    for ($i=2; $i<=$jumlah_baris; $i++){

    $user_nip     = $data->val($i, 1);
    $user_name   = $data->val($i, 2);
    $user_gender  = $data->val($i, 3);
    $user_photo   = "blank.jpg";
    $user_role    = "Siswa";
    $user_password  = md5($user_nip);
    $npsn = $_SESSION['npsn_login'];
    $user_class   = $data->val($i, 4);

    if($user_nip != "" && $user_name != "" && $user_gender != ""){
      $quser->bulk_upload_user($user_nip,$user_name,$user_gender,$user_photo,$user_role,$npsn,$user_password);
      
      $catch = $quser->catch_userid($user_nip);
      foreach($catch as $row) {
          $current_userid = $row['user_id'];
      }

      $catch_class_id = $quser->catch_classid($user_class,$npsn);
      foreach($catch_class_id as $row) {
          $current_class = $row['class_id'];
      }
    
      $quser->bulk_upload_class($current_userid,$current_class);
      
      $queue++;
    }
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['mass_files']['name']);
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
            <h1>Tambah Siswa Baru</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <?php
          if(isset($_GET['message'])){
            if($_GET['message'] == 'Success'){
              echo '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                      Selamat anda berhasil menambahkan Akun Siswa Baru!
                    </div>';
            }
            else{
              echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Maaf!</h5>
                  Terjadi kesalahan saat menambahkan Akun Siswa, harap coba lagi..
                </div>';
            }
          }
          ?>
        <div class="row">
          <div class="col-12">

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Mass Upload</h3>
              </div>
              <div class="card-body">
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-mass-upload"><i class="fas fa-upload" style="margin-right: 5px"></i>Mass Upload</button>
              </div>
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Formulir Penambahan Siswa Baru</h3>
              </div>

              <form action="" method="POST">

                <div class="card-body">
                  <div class="form-group">
                    <label for="user_id">Nomor Induk Siswa</label>
                    <input type="text" name="user_nip" class="form-control" autocomplete="off" placeholder="Masukkan Nomor Induk Siswa..">
                  </div>

                  <div class="form-group">
                    <label for="user_name">Nama Lengkap Siswa</label>
                    <input type="text" name="user_name" class="form-control" autocomplete="off" placeholder="Masukkan Nama Lengkap Siswa..">
                  </div>

                  <div class="form-group">
                    <label for="user_gender">Jenis Kelamin</label>
                    <select class="form-control" name="user_gender">
                      <option disabled readonly selected>-- Pilih Jenis Kelamin --</option>
                      <option value="Laki - Laki">Laki - Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="class">Kelas</label>
                    <select class="form-control" name="class_id">
                      <option disabled readonly selected>-- Pilih Kelas --</option>
                      <?php
                        $qclass = $quser->get_class_list($_SESSION['npsn_login']);
                        foreach($qclass as $row) {
                      ?>
                        <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>

                  <div class="callout callout-info">
                    <p>Informasi!</p>
                    <small>
                      <ol>
                        <li>Setelah ditambahkan, siswa dapat login dengan username: NIS dan password: NIS</li>
                        <li>Siswa diharapkan dapat langsung mengupload foto profil agar dapat dikenali dalam sistem</li>
                        <li>Role akan secara otomatis diset sebagai Siswa</li>
                    </small>
                  </div>

                </div>

                <div class="card-footer">
                  <button type="submit" name="addUser" class="btn btn-primary">Daftarkan Akun</button>
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
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>