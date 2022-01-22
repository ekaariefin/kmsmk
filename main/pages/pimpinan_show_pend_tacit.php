<!-- pengecekan dan verifikasi knowledge oleh Pimpinan terhadap knowledge yang di input oleh guru -->
<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_user.php');
  include_once('../system/sys_other.php');
  include_once('../system/sys_tacit.php');
  include_once('../system/sys_point.php');
  $qmp = new other();
  $qtacit = new tacit();
  $qpoint = new point();
  $qmp_list = $qmp->mp_list($_SESSION['npsn_login']);

   if(isset($_GET['mpid'])){
    $show = $qtacit->tacit_list_mp_teacher($_GET['mpid']);
  }
  else{
    $show = $qtacit->tacit_list_all_teacher();
  }

 if (isset($_GET['action'])){
     if ($_GET['action'] == "setReject"){
        $qtacit->setReject($_GET['id']);
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Pengetahuan berhasil direject!');
            window.location.href='pimpinan_show_pend_tacit.php?ex=".session_id()."';
            </script>");
     }
     else if ($_GET['action'] == "setApproval"){
    $qtacit->setApproval($_GET['id']);
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Knowledge berhasil disetujui!');
            window.location.href='pimpinan_show_pend_tacit.php?ex".session_id()."';
            </script>");
    }
  }
  
?>

<!DOCTYPE html>
<html>
<?php 
  include 'included/head.php';
?>
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
            <h1>Pending Tacit Knowledge</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Kategori Pengetahuan Tacit Pending</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <a href="admin_show_pend_tacit.php?ex=<?php echo session_id() ?>" type="button" class="btn btn-success" style="margin-bottom: 5px; margin-right: 5px; margin-top: 5px; margin-left: 5px;"><i class="fas fa-tags" style="margin-right: 5px;"></i>Seluruh Kategori</a>


                <?php
                  foreach($qmp_list as $mp) {
                ?>

                <a href="admin_show_pend_tacit.php?mpid=<?php echo $mp['mapel_id']; ?>&ex=<?php echo session_id() ?>" type="button" class="btn btn-info" style="margin-bottom: 5px; margin-right: 5px; margin-top: 5px; margin-left: 5px;"><i class="fas fa-tags" style="margin-right: 5px;"></i><?php echo $mp['mapel_name']; ?></a>

                <?php
                  }
                ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tabel Data Pengetahuan Tacit Pending</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID Tacit</th>
                    <th>Kategori</th>
                    <th>Judul Knowledge</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    if($show == "No Data"){
                      echo "<td colspan='4'>Tidak ada knowledge tacit bersatus pending</td>";
                    } 
                    else{
                      $no = 1;
                      foreach ($show as $row) {
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['mapel_name']; ?></td>
                    <td><?php echo $row['tacit_name']; ?></td>
                    <td>
                      <center>
                        <a href="pimpinan_show_tacit.php?id=<?php echo $row['tacit_id']; ?>&mpid=<?php echo $row['mapel_id']; ?>&ex=<?php echo session_id() ?>" type="button" class="btn btn-info btn-sm" style="margin-right: 5px;"><i class="fas fa-external-link-alt"></i></a>

                         <a href="pimpinan_show_pend_tacit.php?id=<?php echo $row['tacit_id']; ?>&mpid=<?php echo $row['mapel_id']; ?>&publisher_id=<?php echo $row['user_id']; ?>&ex=<?php echo session_id() ?>&action=setApproval" type="button" class="btn btn-success btn-sm" style="margin-right: 5px;"><i class="fas fa-check-circle"></i></a>

                         <a href="pimpinan_show_pend_tacit.php?id=<?php echo $row['tacit_id']; ?>&mpid=<?php echo $row['mapel_id']; ?>&publisher_id=<?php echo $row['user_id']; ?>&ex=<?php echo session_id() ?>&action=setReject" type="button" class="btn btn-danger btn-sm" style="margin-right: 5px;"><i class="fas fa-times-circle"></i></a>

                      </center>
                    </td>
                  </tr>
                  <?php
                    }}
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID tacit</th>
                    <th>Kategori</th>
                    <th>Judul Knowledge</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
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