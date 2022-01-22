<?php
  session_start();
  // error_reporting(0);
  include_once('security/session_check.php');
  include_once('../system/sys_user.php');
  include_once('../system/sys_tacit.php');
  include_once('../system/sys_point.php');
  include_once('../system/kmp.php');
  $KMP = new KMP();
  $qtacit = new tacit();
  $tacit_id = $_GET['id'];
  $uid = $_SESSION['user_id'];

  // pengecekan terhadap tacit id pada address bar
  if(!is_null($tacit_id)){
    $qtacit_show = $qtacit->tacit_detail($tacit_id);
    $qtacit_id = $qtacit_show['tacit_id'];
  }else{
    header('location: my_tacit.php');
  }

  // pengecekan terhadap aksi tombol komentar
  if(isset($_POST['reply_comment'])){
    date_default_timezone_set('Asia/Jakarta');
    $comment_date = date('d F Y H:i:s');
    $user_id = $_SESSION['user_id'];
    $tacit_id = $_GET['id'];
    $comment_desc = $_POST['comment_desc'];

    if($qtacit->add_tacit_comment($comment_date, $user_id, $tacit_id, $comment_desc))
    {
      header('location:show_tacit.php?ex='.session_id().'&id='.$tacit_id.'');
    }
  }

  if(isset($_GET['action'])){
    if($_GET['action'] == 'setlike'){
      $date = date('d F Y');
      $qtacit->set_tacit_like($date, $_GET['id'], $_SESSION['user_id']);
    }
    else if($_GET['action'] == 'unlike'){
      $qtacit->set_tacit_unlike($_GET['id'], $_SESSION['user_id']);
    }
    else if($_GET['action'] == 'hapus'){
      $comment_id = $_GET['comment'];
      $qtacit->delete_comment($comment_id);
    }
  }

  if(isset($_POST['sendTag'])){
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('d F Y H:i:s');
    $notif_sender = $_SESSION['user_id'];
    $notif_isi = $_POST['km_id'];
    $notif_receiver = $_POST['share_to_friend'];
    $type = "Tacit";
    if($qtacit->tacit_share_to_friend($tanggal, $notif_sender, $notif_isi, $notif_receiver, $type))
      {
        // include "../system/sys_point.php";
        $qpoint = new point();
        
        $qpoint->addPointTacitSharing($_GET['id'],$_SESSION['user_id']);
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Berhasil membagikan pengetahuan, Point bertambah +1');
            window.location.href='#';
            </script>");
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
      <div class="container-fluid">

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Detail Knowledge</h3>
        </div>
        <div class="card-body">
          <div class="col-md-12">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                  <?php
                    $publisher_photo = $quser->get_publisher_photo($qtacit_show['user_id']);
                  ?>
                  <img class="img-circle" src="files/user_photo/<?php echo $publisher_photo['user_photo']; ?>" alt="User Image">
                  <span class="username"><?php echo $qtacit_show['user_name']; ?></span>
                  <span class="description">Dipublikasikan pada <?php echo $qtacit_show['tacit_date']; ?></span>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                  $kata = '';
                  if(isset($_GET['kata'])){
                    $kata = $_GET['kata'];
                  }
                ?>
                <form action="" method="GET">
                  <table class="table table-bordered" style="width: 100%; margin-bottom: 30px">
                  <tbody>
                    <input type="hidden" name="id" value="<?php echo $qtacit_show['tacit_id']; ?>">
                    <input type="hidden" name="ex" value="<?php echo session_id(); ?>">
                    <tr>
                      <td>Pencarian Kata</td>
                      <td>
                        <input type="text" name="kata" class="form-control" placeholder="Masukkan keyword" autocomplete="off">
                      </td>
                      <td width="100px"> 
                        <button type="submit" name="cari" class="btn btn-info" style="width: 150px"><i class="fas fa-search" style="margin-right: 5px"></i> Cari</button>
                      </td>
                    </tr>
                  </tbody>
                  </table>
                </form>

                <!-- post text -->
                <div class="post-tags" style="margin-bottom: 15px;">
                  <small>
                  <i class="fas fa-tags" style="margin-right: 5px;"></i>
                    <?php echo $qtacit_show['mapel_name']; ?>
                  </small>
                </div>
                <div class="post_title" style="margin-bottom: 15px;">
                  <h5>
                    <b><?php echo $qtacit_show['tacit_name']; ?></b>
                  </h5>
                </div>
                <div class="post-content" style="margin-bottom: 25px;">
                  <?php
                      if($kata!=''){
                        $hasil = $KMP->KMPSearch($kata,$qtacit_show['tacit_desc']);
                        echo "<hr>";
                        echo "Kata yang dicari adalah : ".$kata."<br/>";
                        echo "Jumlah kata yang ditemukan : ".count($hasil)."<br/>";
                        echo "<hr>";
                      }
                        echo (str_replace($kata,"<font color='red'>".$kata."</font>",$qtacit_show['tacit_desc']));
                        echo "</div>";
                    ?>
                  <!-- <?php echo $qtacit_show['tacit_desc']; ?> -->
                </div>
                <div class="post-content" style="margin-left:25px;margin-bottom: 25px;margin-right: 20px">
                  <p>
                <!-- Social sharing buttons -->
                <a href="#" type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal<?php echo $qtacit_show['tacit_id']; ?>"><i class="fas fa-share"></i> Share</a>

                <?php
                  if(empty($qtacit->check_user_liked($qtacit_id, $uid))){
                    echo '<a href="show_tacit.php?ex='.$session_id.'&id='.$qtacit_id.'&user_id='.$uid.'&action=setlike" type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</a>';
                  }
                  else{
                    echo '<a href="show_tacit.php?ex='.$session_id.'&id='.$qtacit_id.'&user_id='.$uid.'&action=unlike" type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-down" style="color: blue"></i> Unlike</a>';
                  }
                ?>
                <span class="float-right text-muted"><?php echo $qtacit->count_tacit_like($qtacit_show['tacit_id']) ?> likes - <?php echo $qtacit->count_tacit_comment($qtacit_show['tacit_id']) ?> comments</span>
              </p>
              </div>
              <div class="card-footer card-comments">
                <?php
                  if($qtacit->show_tacit_comment($tacit_id) == "No Data"){
                   echo "<tr><td>Tidak ada komentar</td></tr>";
                  }
                  else{
                    $qkomen = $qtacit->show_tacit_comment($tacit_id);
                    foreach($qkomen as $row) {
                ?>
                <div class="card-comment">
                  <img class="img-circle img-sm" src="files/user_photo/<?php echo $row['user_photo']; ?>" alt="User Image">
                  <div class="comment-text">
                    <span class="username">
                      <?php echo ucwords(strtolower($row['user_name'])); ?>
                      <?php
                    	if($row['user_id'] == $_SESSION['user_id']){
                    		echo "<small>
                    		<a href='edit_comment_tacit.php?ex=".session_id()."&comment=".$row['comment_id']."&action=edit&tacit_id=".$tacit_id."' style='margin-left:5px'><i class='fas fa-edit' style='margin-right: 2px'></i>Edit</a>
                         <a href='show_tacit.php?ex=".session_id()."&comment=".$row['comment_id']."&action=hapus&id=".$tacit_id."' style='margin-left:5px'><i class='fas fa-trash' style='margin-right: 2px'></i>Hapus</a>
                        </small>";
                    	}
                    	?>
                      <span class="text-muted float-right"><?php echo $row['comment_date']; ?></span>
                    </span>
                    <?php echo $row['comment_desc']; ?>

                  </div>
                </div>
                <?php
                  }
                }
                ?>
              </div>
              <div class="card-footer">
                <form action="#" method="post">
                  <?php
                    $user_get = $quser->user_get_photo($_SESSION['user_id']);
                  ?>
                  <img class="img-fluid img-circle img-sm" src="files/user_photo/<?php echo $user_get['user_photo']; ?>" alt="Alt Text">
                  <!-- .img-push is used to add margin to elements next to floating images -->
                  <div class="img-push">
                     <input type="text" class="form-control" name="comment_desc" style="width: 80%;position: relative;float: left;margin-right: 10px;" placeholder="Tulis komentar disini...">
                     <button type="submit" name="reply_comment" class="btn btn-info" style="width: 15%;position: relative;float: right;">
                        <i class="fas fa-paper-plane" style="margin-right: 10px"></i>Kirim
                      </button>
                  </div>
                </form>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
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

<!-- Modal Sharing-->
<div class="modal fade" id="myModal<?php echo $qtacit_show['tacit_id']; ?>" role="dialog">
  <div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Bagikan Pengetahuan</h4>
    </div>
    <div class="modal-body">
      <div class="callout callout-success">
          <small>Potensi penambahan point sebanyak +1 Point dengan membagikan pengetahuan</small>
        </div>
            <p>bagikan pengetahuan ini dengan teman anda</p>
            <form action="" method="POST">
              <?php
                $user_friend = $quser->list_friend($_SESSION['user_id']);
              ?>
              <select class="form-control" name="share_to_friend" style="margin-bottom: 15px;" required>
                <option disabled readonly selected>--Pilih Teman--</option>
                <?php
                  foreach ($user_friend as $row) {
                ?>
                <option value="<?php echo $row['friend_id']; ?>"><?php echo ucwords(strtolower($row['user_name'])) ?></option>
              <?php } ?>
              </select>
              <input type="hidden" name="km_id" value="<?php echo $_GET['id']; ?>">
              <input type="submit" class="btn btn-success" value="Bagikan" name="sendTag">
            </form>
      <!-- </form> -->
    </div>
  </div>
</body>
</html>
