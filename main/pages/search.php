<?php
  session_start();
  // error_reporting(0);
  include_once('security/session_check.php');
  include_once('../system/sys_user.php');
  include_once('../system/sys_other.php');
  $quser = new user();
  $qother = new other();
  $user_show = $quser->user_detail($_SESSION['user_id']);
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
            <h1>Pencarian</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Pencarian Knowledge</h3>
        </div>
        <div class="card-body">
          <form method="POST" action="">
            <div style="margin-bottom: 10px">
              <h7>Masukkan kata kunci/judul knowledge</h7><br/>
            </div>
            <div style="margin-bottom: 10px; width: 100%">
              <input type="text" name="keyword" class="form-control" placeholder="contoh: Windows 10" autocomplete="off" required="">
            </div>
            <button type="submit" name="submitKnowledge" class="btn btn-primary">
              <i class="fas fa-search" style="margin-right:5px;"></i>
              Proses Pencarian
            </button>
          </form>
        </div>
      </div>
      <?php
        if(isset($_POST['submitKnowledge'])){
          $findtacit = $qother->findTacit($_POST['keyword']);
          $findexplicit = $qother->findExplicit($_POST['keyword']);
          
          if ($findtacit == "No Data"){
            echo '<table id="example1" class="table table-bordered table-striped">
            <tr>
              <td>Tidak ditemukan Tacit Knowledge dengan keyword <i>'.$_POST['keyword'].'</i></td>
            </tr>
            </table>';
          }
          else{
            include "search_tacit.php";
          }

          if ($findexplicit == "No Data"){
            echo '<table id="example1" class="table table-bordered table-striped">
            <tr>
              <td>Tidak ditemukan Explicit Knowledge dengan keyword <i>'.$_POST['keyword'].'</i></td>
            </tr>
            </table>';
          }
          else{
            include "search_explicit.php";
          }
        }
      ?>
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


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>