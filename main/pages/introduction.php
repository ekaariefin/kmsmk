<!DOCTYPE html>
<html>

<?php
  session_start();

  if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1;
  } else {
    $_SESSION['count']++;
  }

  if(!isset($_SESSION['is_login']))
  {
    header('location:../../login.php');
  }


  include_once('../system/sys_user.php');
  include_once('../system/sys_point.php');
  include 'included/head.php';
  $quser = new user();
  $qpoint = new point();

  if(empty($_SESSION['free_avatar'])){
    $get_avatar = $quser->new_user_get_avatar();
    $_SESSION['free_avatar'] = $get_avatar['avatar_id'];
    $get_avatar_detail = $quser->new_user_get_avatar_detail($_SESSION['free_avatar']);
  }
  else{
    $get_avatar_detail = $quser->new_user_get_avatar_detail($_SESSION['free_avatar']);
  }

  if(isset($_POST['ambil_free_avatar'])){
    $trans_desc = date('d F Y');
    $avatar_id = $_POST['avatar_id'];
    $user_id = $_SESSION['user_id'];
    if($quser->add_free_avatar($trans_desc, $avatar_id, $user_id))
      {
          echo ("<script LANGUAGE='JavaScript'>
            window.alert('Berhasil Klaim Hadiah');
            window.location.href='introduction.php';
            </script>");
      }
      else{
         echo ("<script LANGUAGE='JavaScript'>
            window.alert('Terjadi Kesalahan saat Klaim Hadiah!');
            window.location.href='introduction.php';
            </script>");
      }
  }

  if(isset($_POST['submitFoto'])){
    $user_id = $_SESSION['user_id'];
    $temp = $_FILES['user_photo']['tmp_name'];
    $user_photo = rand(0,9999999999).$_FILES['user_photo']['name'];
    $size = $_FILES['user_photo']['size'];
    $type = $_FILES['user_photo']['type'];
    $folder = "files/user_photo/";

    if ($size < 1000000){
      move_uploaded_file($temp,$folder.$user_photo);
      if($quser->update_user_photo($user_id,$user_photo))
      {
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Berhasil Upload Foto Profil');
            window.location.href='introduction.php';
            </script>");
      }
    }else{
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Terjadi Kesalahan saat Upload Foto Profil!');
            window.location.href='introduction.php';
            </script>");
    }
  }

  if(isset($_GET['message'])){
    if($_GET['message'] == 'ambil_bonus_point'){
        $add_new_user_point = $qpoint->get_point_score(10310);
        $add_point_score = $add_new_user_point['point_score'];
        $qpoint->add_point_new_user($_SESSION['user_id'], $add_point_score);
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Berhasil Menambahkan Bonus Point Free Lunch!');
            window.location.href='introduction.php';
            </script>");

    }
  }

?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php 
    include 'included/navbar.php';
    include 'included/blank_sidebar.php';
  ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halo <?php echo ucwords(strtolower($_SESSION['user_name'])); ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 style="margin-top: 15px; margin-bottom: 15px;"> Selamat Datang di KMS TKJ SMK Negeri 2 Palembang </h5>
          <div class="alert alert-success alert-dismissible">
            Sebelum berpetualang lebih jauh, Yuk ikuti langkah-langkah dibawah ini dahulu ya
          </div>
          <div class="alert alert-danger alert-dismissible">
            <b>PENGUMUMAN</b><br/>
            Apabila anda tidak melakukan proses dibawah ini, anda akan kehilangan kesempatan untuk mendapatkan Avatar dan Point pertama anda!
          </div>
        </div>
      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> Langkah Pertama </h3>
        </div>
        <div class="card-body">
          
          <h5 style="margin-top: 15px; margin-bottom: 15px;"> Dapatkan Avatar Pertama Anda </h5>
          <p>Anda akan mendapatkan karakter acak untuk petualangan pertama anda, silahkan klik tombol dibawah ini </p>
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#getAvatar">
            Klik Disini
          </button>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> Langkah Kedua </h3>
        </div>
        <div class="card-body">
          
          <h5 style="margin-top: 15px; margin-bottom: 15px;"> Upload Foto Profil </h5>
           <form method="POST" enctype="multipart/form-data">
            <input type="file" class="form-control" name="user_photo" accept="image/jpg,image/jpeg" style="height:45px;margin-bottom:20px;" required="">
            <button type="submit" name="submitFoto" class="btn btn-primary">Ganti Foto</button>
          </form>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> Langkah Ketiga </h3>
        </div>
        <div class="card-body">
          
          <h5 style="margin-top: 15px; margin-bottom: 15px;"> Dapatkan Point Pertama Anda </h5>
          <p> Sebagai pengguna baru aplikasi KMS, kami berikan anda point awal sebesar 10 Point, Tambah dan Gunakan Point anda lalu tukarkan dengan berbagai pilihan penawaran </p>

          <?php
            $getStatus = $qpoint->freeLunchStatus($_SESSION['user_id']);
            if ($getStatus == "No Data"){
              echo '
                <a type="button" href="introduction.php?message=ambil_bonus_point" class="btn btn-primary">
                  <i class="icon fas fa-plus"></i> Ambil Bonus Point
                </a>';
              }
              else {
                echo '<button type="button" class="btn btn-primary" disabled>
                  <i class="icon fas fa-plus"></i> Ambil Bonus Point
                </a>';
              }
          ?>
          
        </div>
      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <a type="button" href="student_dashboard.php" class="btn btn-primary" style="position: relative; float: right;">
            <i class="icon fas fa-arrow-right"></i> Lanjutkan Ke Aplikasi
          </a>
        </div>
      </div>
    </section>
    <div class="modal fade" id="getAvatar" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Generate Avatar</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Selamat anda mendapatkan avatar berikut!</p>
            <br>
            <center>
              <img src="../dist/character/<?php echo $get_avatar_detail['avatar_picture']; ?>" width="50%">
            </center>
            <br>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <form action="" method="POST">
              <input type="hidden" name="avatar_id" value="<?php echo $get_avatar_detail['avatar_id']; ?>">
              <button type="submit" name="ambil_free_avatar" class="btn btn-primary">Terima Hadiah!</button>
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

  </div>

  <?php 
    include 'included/footer.php'; 
  ?>
  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>
  
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/sparklines/sparkline.js"></script>
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dist/js/adminlte.js"></script>
<script src="../dist/js/pages/dashboard.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<script src="../dist/js/pages/dashboard.js"></script>
</body>
</html>