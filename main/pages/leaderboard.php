<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_user.php');
  include_once('security/session_check.php');
  $quser = new user();
  $user_show = $quser->user_detail($_SESSION['user_id']);
  $quser_list = $quser->user_list($_SESSION['npsn_login']);

  include_once('../system/sys_point.php');
  $qpoint = new point();
  $qboard = $qpoint->leaderboard();
?>
<!DOCTYPE html>
<html>
<?php 
  include 'included/head.php';
?>
<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
            <h1>Leaderboard</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Jajak Perolehan Point // 10 Poin Tertinggi</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th><center>Nama Pengguna</center></th>
              <th><center>Total Point</center></th>
              <th><center>Badges</center></th>
              <th><center>Level<center></th>
              <th><center>Gelar<center></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              if($qboard == "No Data"){
               echo "<tr><td colspan='6'>Belum Ada Data Point</td></tr>";
              }
              else{
              foreach($qboard as $row) {
              $penerimaan = $qpoint->count_penerimaan($row['user_id']);
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo  ucwords(strtolower($row['user_name'])); ?></td></td>
              <td><center><?php echo $row['total_point']+$penerimaan; ?></center></td>
              <td><center><img src="../dist/rank/<?php echo $qpoint->getBadges($row['total_point']+$penerimaan); ?>" width="30"></center></td>
              <td><center><?php echo $qpoint->getLevel($row['total_point']+$penerimaan); ?></center></td>
              <td><center><?php echo $qpoint->getTitle($row['total_point']+$penerimaan); ?></center></td>
            </tr>
            <?php
              }}
            ?>
          </tbody>
        </table>
      </div>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Chart</h3>
        </div>
        <div class="card-body">
          <script type="text/javascript" src="Chart.js"></script>
          <?php
            if($qboard == "No Data"){
             echo "belum ada data yang cukup untuk menampilkan chart";
            }
            else{
              foreach($qboard as $row) {
                $penerimaanx = $qpoint->count_penerimaan($row['user_id']);
                $user_name[] = $row['user_name'];
                $total_pointx[] = $row['total_point']+$penerimaanx;
              }}
          ?>
        <div>
          <canvas id="myChart"></canvas>
        </div>
          
      </div>
    </section>

  </div>
  <?php include 'included/footer.php'; ?>
  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($user_name); ?>,
        datasets: [{
          label: 'Total Perolehan Point',
          data: <?php echo json_encode($total_pointx); ?>,
          backgroundColor: 'rgba(0, 24, 255, 0.4)',
          borderColor: 'rgba(0, 0, 255, 0.6)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
</body>
</html>
