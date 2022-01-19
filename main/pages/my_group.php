<?php
  session_start();
  // error_reporting(0);
  include_once('security/session_check.php');
  include_once('../system/sys_user.php');
  include_once('../system/sys_other.php');
  $quser = new user();
  $qother = new other();
  $user_id = $_SESSION['user_id'];
  $user_show = $quser->user_detail($_SESSION['user_id']);
  //$quser_list = $quser->user_list();

  if(isset($_GET['action'])){
    if($_GET['action'] == 'add'){
      $qother->add_group($_GET['gid'], $_SESSION['user_id']);
      echo "<script LANGUAGE='JavaScript'>
          window.alert('Berhasil Bergabung kedalam Grup!');
          </script>";
      header('location:my_group.php?&ex='.session_id().'');
    }
    else{
      echo "<script LANGUAGE='JavaScript'>
          window.alert('Terjadi kesalahan tidak terduga!');
          </script>";
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
            <h1>Grup Saya</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Cari Grup</h3>
        </div>
        <div class="card-body">
          <form method="GET">
            <div style="margin-bottom: 10px">
              <h7>Masukkan kode grup untuk bergabung</h7><br/>
            </div>
            <div style="margin-bottom: 10px; width: 100%">
              <input type="text" name="group_code" class="form-control" placeholder="contoh: X391KDS" autocomplete="off" required="">
            </div>
            <input type="hidden" name="ex" value="<?php echo session_id(); ?>">
            <button type="submit" name="submitCariGrup" class="btn btn-primary">
              <i class="fas fa-search" style="margin-right:5px;"></i>
              Proses Pencarian
            </button>
          </form>
        </div>
      </div>

      <?php
        if(isset($_GET['submitCariGrup'])){

          if ($qother->find_group($_GET['group_code'], $_SESSION['user_id']) == 'No Data'){
            echo '<table id="example1" class="table table-bordered table-striped">
            <tr>
              <td>Kode Grup tidak ditemukan/tidak terdaftar pada sistem!</td>
            </tr>
            </table>';
          }

          else if ($qother->find_group($_GET['group_code'], $_SESSION['user_id']) == 'Already'){
            echo '<table id="example1" class="table table-bordered table-striped">
            <tr>
              <td>Anda telah bergabung pada grup!</td>
            </tr>
            </table>';
          }

          else if ($qother->find_group($_GET['group_code'], $_SESSION['user_id'])){
            $qother->find_group($_GET['group_code'], $_SESSION['user_id']);
            if (empty($qother->find_group($_GET['group_code'], $_SESSION['user_id']))){
              echo "Null";
            }
            include "my_group_result.php";
          }
          else {
            exit();
          }
        }
      ?>
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Daftar Grup Yang Saya Ikuti</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th><center>No.</center></th>
                    <th><center>Group Name</center></th>
                    <th><center>Topics</center></th>
                    <th><center>Total Member</center></th>
                    <th><center>Action</center></th>                  
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    if($qother->show_mygroup($_SESSION['user_id']) == "No Data"){
                     echo "<tr><td colspan='5'>Tidak ada yang ditampilkan</td></tr>";
                    }
                    else{
                      $no = 1;
                      $group = $qother->show_mygroup($_SESSION['user_id']);
                      foreach($group as $row) {
                  ?>
                  <tr>
                    <td><center><?php echo $no++; ?></center></td>
                    <td><?php echo $row['group_name']; ?></td>
                    <td><?php echo $row['group_topic']; ?></td>
                    <td><center><?php echo $qother->count_group_user($row['group_id']) ?></center></td>
                    <td>
                      <center>
                        <a href="show_group_detail.php?gid=<?php echo $row['group_id'] ?>&ex=<?php echo session_id(); ?>" type="button" class="btn btn-block btn-success">Lihat Grup</a>
                      </center>
                    </td>
                  </tr>
                  <?php
                    }}
                  ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th><center>No.</center></th>
                    <th><center>Group Name</center></th>
                    <th><center>Topics</center></th>
                    <th><center>Total Member</center></th>
                    <th><center>Action</center></th>  
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
    </section>
  </div>
  <?php include 'included/footer.php'; ?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
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