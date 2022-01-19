<!DOCTYPE html>
<html>
<?php
session_start();
include_once('../system/sys_user.php');
include_once('../system/sys_other.php');
$quser = new user();
$qother = new other();

include 'included/head.php';
?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php
    include 'included/navbar.php';
    include 'included/sidebar.php';
    ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <?php
              date_default_timezone_set("Asia/Jakarta");
              $jam = date('H:i');
              if ($jam > '00:00' && $jam < '10:00') {
                $salam = 'Pagi';
              } elseif ($jam >= '10:00' && $jam <= '15:00') {
                $salam = 'Siang';
              } elseif ($jam >= '15:00' && $jam <= '18:00') {
                $salam = 'Sore';
              } elseif ($jam >= '18:01' && $jam <= '23:59') {
                $salam = 'Malam';
              } else {
                $salam = 'NULL';
              }
              echo '<h1>Selamat ' . $salam;
              echo '!</h1>';
              ?>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Knowledge Management System</h3>
          </div>
          <div class="card-body">
            <center>
              <img src="../../assets/img/diknas.png" style="width: 160px; height: 120px;margin-bottom: 30px">
            </center>
            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?php echo $qother->count_total_mp($_SESSION['user_id'],$_SESSION['npsn_login']); ?></h3>
                    <p>Mapel Saya</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-book"></i>
                  </div>
                  <a href="admin_mplist.php?ex<?php echo session_id(); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3><?php echo $qother->count_total_knowledge($_SESSION['npsn_login']); ?></h3>
                    <p>Total Knowledge</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-database"></i>
                  </div>
                  <a href="all_tacit.php?ex<?php echo session_id(); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?php echo $qother->count_total_siswa($_SESSION['npsn_login']); ?></h3>

                    <p>Total Siswa</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <a href="teacher_userlist.php?ex<?php echo session_id(); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3><?php echo $qother->count_total_mission($_SESSION['user_id']); ?></h3>

                    <p>Mission</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-bullseye" aria-hidden="true"></i>

                  </div>
                  <a href="teacher_mission_control.php?ex=<?php echo session_id(); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>


      </section>
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
</body>

</html>