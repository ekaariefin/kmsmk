<?php
  error_reporting(0);
  session_start();
  include_once('security/session_check.php');
  include_once('../system/sys_user.php');
  include_once('../system/sys_other.php');
  $quser = new user();
  $user_show = $quser->user_detail($_SESSION['user_id']);
  $quser_list = $quser->user_list($_SESSION['npsn_login']);
  $qstore = new other();
  $qstore_list = $qstore->show_etalase();
?>
<!DOCTYPE html>
<html>
<?php include 'included/head.php'; ?>
<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
            <h1>Store</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-header">
          <h3 class="card-title">Avatar</h3>
        </div>
        <div class="card-body">
          <div class="row">

            <?php
              foreach($qstore_list as $row) {
            ?>

            <div class="col-sm-3">
              <div class="card bg-light">
                <div class="card-header border-bottom-0">
                  <center><p style="color: black; padding-bottom: 0px"><?php echo $row['avatar_name']; ?></p></center>
                </div>
                <div class="card-body">
                    <center>
                      <img src="../dist/character/<?php echo $row['avatar_picture']; ?>" alt=""  width="120" class="img-circle"/>
                      <br/><br/>
                      <?php echo $row['avatar_price']; ?> Poin
                    </center>
                </div>
                <div class="card-footer">
                  <div class="text-center">
                    <?php
                      $trx_date   = date('dmY');
                      $random     = rand(001,8494);
                      $orderid    = '999'.$trx_date.$user_id.$random;
                    ?>
                    <a href="transaction.php?item_id=<?php echo $row['avatar_id']; ?>&ex=<?php echo session_id() ?>&orderid=<?php echo $orderid ?>" class="btn btn-sm btn-primary">
                      <i class="fas fa-shopping-cart "></i>⠀Beli Item
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <?php
              }
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
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>