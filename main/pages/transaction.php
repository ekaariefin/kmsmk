<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_user.php');
  include_once('../system/sys_other.php');
  include_once('../system/sys_point.php');
  $quser = new user();
  $qother = new other();
  $qpoint = new point();
  $user_id = $_SESSION['user_id'];
  $show = $qother->get_item_detail($_GET['item_id']);
  $user_show = $quser->user_detail($_SESSION['user_id']);

  $total_point =  $qpoint->count_mypoint($_SESSION['user_id']);
  $total_belanja =  $qpoint->count_shopping($_SESSION['user_id']);
  $total_transfer = $qpoint->count_transfer($_SESSION['user_id']);
  $total_penerimaan = $qpoint->count_penerimaan($_SESSION['user_id']);
  $total_keseluruhan =  $qpoint->count_total($total_point, $total_belanja, $total_transfer, $total_penerimaan);

  if(isset($_POST['proses'])){
    $trans_desc = date('d F Y');
    $avatar_id = $_POST['avatar_id'];
    $user_id = $_POST['user_id'];
    if($qpoint->proses_belanja($trans_desc, $avatar_id, $user_id)){
      echo "<script LANGUAGE='JavaScript'>
            window.alert('Proses belanja berhasil, harap periksa avatar dan point anda untuk memastikan transaksi!');
            window.location.href='my_avatar.php?ex=".session_id()." '
            </script>";
    }
    else{
      echo "<script LANGUAGE='JavaScript'>
            window.alert('Maaf! Proses belanja tidak dapat dilakukan karena kesalahan!');
            window.location.href='store.php?ex=".session_id()." '
            </script>";
    }
  }
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
    <section class="content-header" style="margin-bottom: -15px">
      <!-- <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Knowledge</h1>
          </div>
        </div>
      </div> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Konfirmasi Pembelian</h3>
        </div>
        <div class="card-body">
          
          <table class="table table-bordered" style="margin-bottom: 30px">
            <tbody>
            <form action="" method="POST">
              <input type="hidden" name="avatar_id" value="<?php echo $show['avatar_id']; ?>">
              <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
              <tr>
                <td style="width: 30%;">Nomor Order</td>
                <td style="width: 50%;"><?php echo $_GET['orderid']; ?></td>
              </tr>
              <tr>
                <td>Nama Item</td>
                <td><?php echo $show['avatar_name']; ?>
                </td>
              </tr>
              <tr>
                <td>Harga (Pts)</td>
                <td><?php echo $show['avatar_price']; ?></td>
              </tr>
              <tr>
                <td>Poin yang dimiliki</td>
                <td>
                  <?php
                    if(empty($total_keseluruhan)){
                      echo "<b style='color:red'>Anda belum memiliki poin!</b>";
                    }
                    else {
                      echo $total_keseluruhan;
                    }
                  ?>
                </td>
              </tr>
              <tr>
                <td>Konfirmasi Pembelian<br/><small><i style="color:red">Transaksi ini akan memotong poin anda!</i></small></td>
                <td>
                  <?php
                    if(empty($total_keseluruhan)){
                      echo "<b style='color:red'>Tidak dapat melakukan transaksi!</b>";
                    }
                    else if ($total_keseluruhan < $show['avatar_price']){
                      echo "<b style='color:red'>Tidak dapat melakukan transaksi! Jumlah poin tidak mencukupi!</b>";
                    }
                    else if ($total_keseluruhan >= $show['avatar_price']){
                      echo '<input type="password" class="form-control" name="password_confirmation" placeholder="Masukkan password anda...">';
                    }
                    else {
                      echo '<input type="password" class="form-control" name="password_confirmation" placeholder="Masukkan password anda...">';
                    }
                  ?>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <?php
                   if ($total_keseluruhan < $show['avatar_price']){
                      echo '<a type="button" href="../"class="btn btn-primary">
                            <i class="fas fa-undo" style="margin-right: 10px"></i>
                              Kembali ke Store
                            </button>';
                    }
                    else if ($total_keseluruhan >= $show['avatar_price']){
                      echo '<button type="submit" name="proses" class="btn btn-primary">
                            <i class="fas fa-shopping-cart" style="margin-right: 10px"></i>
                              Beli Sekarang
                            </button>';
                    }
                    else {
                      echo '<button type="submit" name="proses" class="btn btn-primary">
                            <i class="fas fa-shopping-cart" style="margin-right: 10px"></i>
                              Beli Sekarang
                            </button>';
                    }
                  ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </tr>

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
