<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_user.php');
  include_once('../system/sys_other.php');
  include_once('../system/sys_tacit.php');
  include_once('../system/sys_explicit.php');
  include_once('security/session_check.php');
  $quser = new user();
  $qother = new other();
  $qtacit = new tacit();
  $qexplicit = new explicit();
  $user_show = $quser->user_detail($_SESSION['user_id']);
  $quser_list = $quser->user_list($_SESSION['npsn_login']);
  $qnotif_list = $qother->notif_list($_SESSION['user_id']);
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
            <h1>Notifikasi</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Notifikasi Sistem</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th><center>Tanggal</center></th>
              <th><center>Isi Pesan</center></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              if($qnotif_list == "No Data"){
               echo "<tr><td colspan='3'>Anda belum memiliki notifikasi</td></tr>";
              }
              else{
              foreach($qnotif_list as $row) {
                if($row['type'] == "Tacit"){
                  $getKnowledgeDetail = $qtacit->getKnowledgeDetail($row['notif_isi']);
                }
                if($row['type'] == "Explicit"){
                  $getKnowledgeDetail = $qexplicit->getKnowledgeDetail($row['notif_isi']);
                }
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td width='20%'><small><?php echo $row['tanggal']; ?></small></td>
              <td width='70%'>
              <?php
              if($row['type'] == "Tacit"){
                  echo ucwords(strtolower($row['user_name']))." membagikan pengetahuan <b>".
                  $getKnowledgeDetail['tacit_name']."</b> kepada anda <a href='show_tacit.php?id=".$getKnowledgeDetail['tacit_id']."&ex=".session_id()."'>[Cek Disini]</a>";
                }
                if($row['type'] == "Explicit"){
                  echo ucwords(strtolower($row['user_name']))." membagikan pengetahuan <b>".
                  $getKnowledgeDetail['explicit_name']."</b> kepada anda <a href='show_explicit.php?id=".$getKnowledgeDetail['explicit_id']."&ex=".session_id()."'>[Cek Disini]</a>";
                }
              ?>
              </td>
              <!-- <?php echo ucwords(strtolower($row['user_name'])); ?> membagikan pengetahuan <b> <?php echo $getKnowledgeDetail['tacit_name']; ?></b> kepada anda -->
            </tr>
            <?php
              }}
            ?>
          </tbody>
        </table>
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
</body>
</html>
