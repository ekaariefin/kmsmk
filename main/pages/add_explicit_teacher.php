<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_user.php');
  include_once('../system/sys_explicit.php');
  $qexplicit = new explicit();
  if(isset($_POST['addExplicit']))
  {   
      $explicit_name   = $_POST['explicit_name'];
      $explicit_desc   = $_POST['explicit_desc'];
      $explicit_date   = date('d F Y');
      $explicit_status = "Approve";
      $explicit_source = $_POST['explicit_source'];
      $user_id      = $_SESSION['user_id'];
      $mapel_id      = $_POST['mapel_id'];

      // proses terhadap file yang diupload
      $temp = $_FILES['explicit_file']['tmp_name'];
      $explicit_file = rand(0,9999).$_FILES['explicit_file']['name'];
      $size = $_FILES['explicit_file']['size'];
      $type = $_FILES['explicit_file']['type'];
      $folder = "files/";
      

      // pengecekan ukuran file (maksimal 10mb)
      if ($size < 20048000){
        move_uploaded_file($temp,$folder.$explicit_file);
        if($qexplicit->explicit_add($explicit_name, $explicit_desc, $explicit_date, $explicit_status, $explicit_source, $explicit_file, $user_id, $mapel_id))
        {
          header('location:my_explicit_teacher.php?ex='.session_id().'');
          
        }
      }else{
        echo "<b>Gagal Upload</b>";
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
            <h1>Explicit Knowledge</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Pengetahuan Explicit</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="" method="POST" enctype="multipart/form-data">

                <div class="card-body">
                  <div class="form-group">
                    <label for="explicit_name">Judul Pengetahuan</label>
                    <input type="text" class="form-control" name="explicit_name" autocomplete="off" placeholder="Judul Pengetahuan Explicit">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Keterangan</label>
                    <textarea class="textarea" name="explicit_desc" placeholder="Place some text here"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    </textarea>
                  </div>

                  <div class="form-group">
                    <label>Kategori</label>
                    <select name="mapel_id" class="custom-select" required="">
                      <option disabled readonly selected>-- Pilih Kategori --</option>
                      <?php
                        include_once('../system/sys_mapel.php');
                        $qmapel = new mapel();
                        $qmapel_list = $qmapel->show_mapel($_SESSION['npsn_login']);
                        foreach($qmapel_list as $row) {
                      ?>
                        <option value="<?php echo $row['mapel_id']; ?>"><?php echo $row['mapel_name']; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <p><small>Max. 2 Mb</small><br/><small>Format yang diizinkan : pdf, doc, docx, ppt, pptx, xls, xlsx</small></p>
                    <input type="file" class="form-control" name="explicit_file" style="margin-bottom: 15px" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.openxmlformats-officedocument.presentationml.presentation, application/pdf,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                  </div>

                  <div class="form-group">
                    <label for="source">Sumber/Referensi</label>
                    <input type="text" name="explicit_source" class="form-control" autocomplete="off" placeholder="Sumber Perolehan Pengetahuan, Contoh: Pengalaman / Buku Simulasi Digital Bab 3 Hal 15" required>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="addExplicit" class="btn btn-primary">Submit Knowledge</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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