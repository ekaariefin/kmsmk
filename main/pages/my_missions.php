<?php
  session_start();
  // error_reporting(0);
  include_once('security/session_check.php');
  include_once('../system/sys_user.php');
  include_once('../system/sys_other.php');
  $quser = new user();
  $qother = new other();
?>
<!DOCTYPE html>
<html>
  <?php include 'included/head.php'; ?>
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
            <h1>Missions</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       <!-- Default box -->
      <div class="card card-solid">
        <div class="card-header">
          <h3 class="card-title">Misi Saya</h3>
        </div>
        <div class="card-body">
          <div class="row" style="margin-left:5px;margin-bottom: 20px">
            <div class="join">
              <a href="show_all_mission.php?ex=<?php echo session_id(); ?>" type="button" class="btn bg-gradient-primary"><i class="fas fa-user-plus" style="margin-right: 5px;"></i>Ikut Misi</a>
            </div>
          </div>
          <div class="row">
            <?php
              if($qother->show_my_mission($user_id) == "No Data"){
                 echo "Anda belum bergabung pada misi apapun!";
                }
                else{
                  $mymission = $qother->show_my_mission($user_id);
                  foreach($mymission as $row) {
            ?>
            <div class="col-sm-3">
              <div class="card bg-light">
                <div class="card-header border-bottom-0">
                  <center><p style="color: black; padding-bottom: 0px"><?php echo $row['mission_name']; ?><br/>Target: <?php echo $row['mission_target']; ?></p></center>
                </div>
                <div class="card-body">
                    <center>
                      <img src="../dist/img/coin.png" alt=""  width="120" class="img-circle">
                    <p>Reward : <?php echo $row['mission_reward']; ?> </p>
                    </center>
                </div>
                <div class="card-footer">
                  <div class="text-center">
                    <?php
                      $mission_id = $row['mission_id'];
                      $get_progress = $qother->get_user_progress($mission_id, $_SESSION['user_id']);
                      foreach ($get_progress as $row) {
                        $status = $row['status'];
                        if ($status != 'Selesai'){
                          echo '<a href="show_mission_detail_student.php?ex='.session_id().'&mid='.$row['mission_id'].'" class="btn btn-sm btn-primary">
                           <i class="fas fa-external-link-alt" style="margin-right: 5px;"></i>Info
                            </a>';
                        }
                        else {
                          echo "Mission Complete";
                        }
                      }
                    ?>
                    
                  </div>
                </div>
              </div>
            </div>
            <?php
              }}
            ?>
          <!-- /.card-body -->
          </div>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer -->
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
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
