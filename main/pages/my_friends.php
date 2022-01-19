<?php
  session_start();
  // error_reporting(0);
  include_once('security/session_check.php');
  include_once('../system/sys_user.php');
  $quser = new user();
  $user_show = $quser->user_detail($_SESSION['user_id']);
  $user_friend = $quser->list_friend($_SESSION['user_id']);

  if (isset($_GET['prosesAdd'])){
    if ($proses = $quser->addFriend($_GET['addFriend'], $_SESSION['user_id'])) {
      echo "<script LANGUAGE='JavaScript'>
            window.alert('Berhasil Menambahkan Teman!');
            window.location.href='my_friends.php?ex=".session_id()." '
            </script>";
    }
    else{
      echo "<script LANGUAGE='JavaScript'>
            window.alert('Terjadi kesalahan saat menambahkan teman!');
            window.location.href='my_friends.php?ex=".session_id()." '
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
            <h1>Teman Saya</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Cari Teman</h3>
        </div>
        <div class="card-body">
          <form method="GET" action="">
            <div style="margin-bottom: 10px">
              <h7>Masukkan NIS/User ID teman anda untuk menambahkan</h7>
            </div>
            <div style="margin-bottom: 10px; width: 100%">
              <input type="text" name="findUser" class="form-control" placeholder="Cari.." autocomplete="off" maxlength="6" required="">
              <input type="hidden" name="ex" class="form-control" value="<?php echo session_id(); ?>">
            </div>
            <button type="submit" name="submitCariTeman" class="btn btn-primary"><i class="fas fa-search" style="margin-right:5px"></i>Proses Pencarian</button>
          </form>
      </div>
    </div>

      <?php
        if(isset($_GET['submitCariTeman'])){

          if ($_GET['findUser'] == $_SESSION['user_id']){
             echo ("<script LANGUAGE='JavaScript'>
            window.alert('Anda tidak dapat menambahkan diri sendiri!');
            window.location.href='my_friends.php?ex=".session_id()." '
            </script>");
          }

          else if ($quser->find_user($_GET['findUser']) == 'No Data'){
            echo '<table id="example1" class="table table-bordered table-striped">
            <tr>
              <td>Pengguna dengan ID: '.$_GET['findUser'].' yang dicari tidak ditemukan</td>
            </tr>
            </table>';
          }

          else if ($quser->find_user($_GET['findUser']) == 'Already'){
            echo '<table id="example1" class="table table-bordered table-striped">
            <tr>
              <td>Pengguna sudah menjadi teman anda!</td>
            </tr>
            </table>';
          }

          else if ($quser->find_user($_GET['findUser'])){
            $quser->find_user($_GET['findUser']);
            if (empty($quser->find_user($_GET['findUser']))){
              echo "Null";
            }
            include "show_friend_search.php";
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
                <h3 class="card-title">Daftar Teman Saya</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="10"><center>No.</center></th>
                    <th width="20"></th>
                    <th><center>Name</center></th>
                    <th><center>Kelas</center></th>            
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 1;
                      if($user_friend == "No Data"){
                      }
                      else{
                        $no = 1;
                        foreach ($user_friend as $row) {
                    ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td>
                      <center>
                        <img src="files/user_photo/<?php echo $row['user_photo']; ?>" width="50" height="50" class="img-circle">
                      </center>
                    </td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['class_name']; ?></td>
                  </tr>
                  <?php
                    }}
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th><center>No.</center></th>
                    <th></th>
                    <th><center>Name</center></th>
                    <th><center>Kelas</center></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
    </section>
  </div>
  <?php include 'included/footer.php'; ?>
  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
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
</body>
</html>