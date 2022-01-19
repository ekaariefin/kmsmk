<?php
  session_start();
  // error_reporting(0);
  include_once('../system/sys_user.php');
  include_once('../system/sys_other.php');
  include_once('security/session_check.php');
  $qother = new other();
  $myavatar = $qother->show_my_avatar($_SESSION['user_id']);

  if(isset($_GET['setactive'])){
    $avatar_id = $_GET['setactive'];
    if($qother->check_activated($avatar_id, $user_id) == 'Already'){
       echo "<script LANGUAGE='JavaScript'>
          window.alert('Avatar sudah pernah diaktifkan atau telah aktif!');
          </script>";
    }
    else if ($qother->check_activated($avatar_id, $user_id) == 'Empty'){
      if($qother->check_user_already($user_id) == 'Empty'){
        if($qother->activated_avatar($avatar_id, $user_id)){
          echo "<script LANGUAGE='JavaScript'>
            window.alert('Avatar berhasil diterapkan!');
            </script>";
        }
      }
      else if($qother->check_user_already($user_id) == 'Already'){
        if($qother->update_avatar($avatar_id, $user_id)){
          echo "<script LANGUAGE='JavaScript'>
            window.alert('Avatar Baru berhasil diterapkan!');
            </script>";
        }
      }
  }
}
?>
<!DOCTYPE html>
<html>
<?php 
  include 'included/head.php';
?>
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
            <h1>Akun Saya</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
      <div class="card card-solid">
        <div class="card-header">
          <h3 class="card-title">Avatar Saya</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <?php
              if($qother->show_my_avatar($_SESSION['user_id']) == "No Data"){
               echo "<tr><td>Anda belum memiliki Avatar, dapatkan avatar pada menu Store</td></tr>";
              }
              else{
                $myavatar = $qother->show_my_avatar($_SESSION['user_id']);
                foreach($myavatar as $row) {
                  $avatar_id = $row['avatar_id'];
                  $user_id = $_SESSION['user_id'];
            ?>
            <div class="col-sm-3">
              <div class="card bg-light">
                <div class="card-header border-bottom-0">
                  <center>
                    <p style="color: black; padding-bottom: 0px"><?php echo $row['avatar_name']; ?></p>
                  </center>
                </div>
                <div class="card-body">
                  <center>
                    <img src="../dist/character/<?php echo $row['avatar_picture']; ?>" width="150" />
                    <br/>
                  </center>
                </div>
                <div class="card-footer">
                  <div class="text-center">
                    <?php
                    if($qother->check_activated($avatar_id, $user_id) == 'Already'){
                       echo '<button class="btn btn-sm btn-dark" disabled>
                            <i class="fas fa-check" style="margin-left: 5px;margin-right: 5px;"></i>⠀
                              Aktifkan
                            </button>';
                    }
                    else{
                      echo '<a href="my_avatar.php?ex='.session_id().'&setactive='.$avatar_id.'&user_id='.$user_id.'" class="btn btn-sm btn-primary">
                        <i class="fas fa-check" style="margin-left: 5px;margin-right: 5px;"></i>⠀Aktifkan
                        </a>';
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <?php
              }}
            ?>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include 'included/footer.php'; ?>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
</body>
</html>
