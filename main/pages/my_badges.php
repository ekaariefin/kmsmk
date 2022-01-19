<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_point.php');
  include_once('../system/sys_user.php');
  include_once('security/session_check.php');
  $qpoint = new point();
  $quser = new user();
  $qhistory = $qpoint->show_badges();
  $user_show = $quser->user_detail($_SESSION['user_id']);

  $total_point =  $qpoint->count_mypoint($_SESSION['user_id']);
  $total_belanja =  $qpoint->count_shopping($_SESSION['user_id']);
  $total_transfer =  $qpoint->count_transfer($_SESSION['user_id']);
  $total_penerimaan = $qpoint->count_penerimaan($_SESSION['user_id']);
  $total_keseluruhan =  $qpoint->count_total($total_point, $total_belanja, $total_transfer, $total_penerimaan);
?>
<!DOCTYPE html>
<html>
<?php 
  include 'included/head.php';
?>
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
            <h1>Medali Saya</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-8">
        <!-- Default box -->
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Status Akun</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            </div>
          </div>
          <div class="card-body">
            Total Seluruh Poin yang terkumpul:<br/>
            <h2 style="margin-bottom: 30px">
              <?php 
              if ($total_point+$total_penerimaan == NULL){
                echo '0';
              }
              else{
                echo $total_point+$total_penerimaan;
              }
              ?> Poin
            </h2>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <div class="col-md-4">
        <!-- Default box -->
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Medali Saya</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            </div>
          </div>
          <div class="card-body">
            <!-- <center>
              <img src="../dist/rank/level6.png" width="68">
            </center>
            <center><b>Si Hebat</b></center> -->

            <?php
              if ($total_point+$total_penerimaan >= 0 AND $total_point+$total_penerimaan <= 19){
                echo '<center>
                        <img src="../dist/rank/level1.png" width="68">
                      </center>
                      <center><b>Pemula</b></center>';
                    }
              else if ($total_point+$total_penerimaan >= 20 AND $total_point+$total_penerimaan <= 49){
                echo '<center>
                        <img src="../dist/rank/level2.png" width="68">
                      </center>
                      <center><b>Gemar Membantu</b></center>';
              }
              else if ($total_point+$total_penerimaan >= 50 AND $total_point+$total_penerimaan <= 69){
                echo '<center>
                        <img src="../dist/rank/level3.png" width="68">
                      </center>
                      <center><b>Ambisius</b></center>';
              }
              else if ($total_point+$total_penerimaan >= 70 AND $total_point+$total_penerimaan <= 99){
                echo '<center>
                        <img src="../dist/rank/level4.png" width="68">
                      </center>
                      <center><b>Terpelajar</b></center>';
              }
              else if ($total_point+$total_penerimaan >= 100 AND $total_point+$total_penerimaan <= 149){
                echo '<center>
                        <img src="../dist/rank/level5.png" width="68">
                      </center>
                      <center><b>Pakar</b></center>';
              }
              else if ($total_point+$total_penerimaan >= 150 AND $total_point+$total_penerimaan <= 249){
                echo '<center>
                        <img src="../dist/rank/level6.png" width="68">
                      </center>
                      <center><b>Si Hebat</b></center>';
              }
              else {
                echo '<center>
                        <img src="../dist/rank/level7.png" width="68">
                      </center>
                      <center><b>Jenius</b></center>';
              }
              ?>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>


            <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Index Level Aplikasi</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 80px">Badges</th>
                      <th style="width: 300px">Level</th>
                      <th style="width: 300px">Syarat Perolehan Poin</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 1;
                      foreach($qhistory as $row) {
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><center><img src="../dist/rank/<?php echo $row['badges_pic'] ?>" width="50"></center></td>
                      <td><?php echo $row['badges_name']; ?></td>
                      <td><?php echo $row['badges_point']; ?> Poin</td>
                    </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->
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

<script type="text/javascript">
  var client = {
     init: function() {
          var o=this;

          // this will disable dragging of all images
          $("img").mousedown(function(e){
               e.preventDefault()
          });

          // this will disable right-click on all images
          $("body").on("contextmenu",function(e){
               return false;
          });
    }
};
</script>