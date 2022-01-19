<!DOCTYPE html>
<html>
<?php
session_start();
if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 1;
} else {
  $_SESSION['count']++;
}

if (!isset($_SESSION['is_login'])) {
  header('location:../../login.php');
}
include_once('../system/sys_user.php');
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
              <?php
              date_default_timezone_set("Asia/Jakarta");
              $jam = date('H:i');
              if ($jam > '00:00' && $jam < '10:00') {
                $salam = 'Pagi';
              } elseif ($jam >= '10:00' && $jam <= '15:00') {
                $salam = 'Siang';
              } elseif ($jam >= '15:00' && $jam <= '18:00') {
                $salam = 'Sore';
              } elseif ($jam >= '18:01' && $jam <= '23:59') {
                $salam = 'Malam';
              } else {
                $salam = 'NULL';
              }
              echo '<h1>Selamat ' . $salam;
              echo '!</h1>';
              ?>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Knowledge Management System</h3>
            </div>
            <div class="card-body">
              <div class="alert alert-info alert-dismissible" style="margin-bottom: 25px">
                <h5><i class="icon fas fa-info"></i> Hi <?php echo ucwords(strtolower($_SESSION['user_name'])); ?>!</h5>
                Selamat datang di Aplikasi Knowledge Management System, anda dapat mulai menggunakan aplikasi ini untuk mencari, menambahkan serta membagikan knowledge, Terus lakukan aktivitas pada aplikasi untuk mendapatkan point.
              </div>
              <center>
                <img src="../../assets/img/diknas.png" style="width: 160px; height: 120px">
              </center>
              <h5 style="margin-top: 20px; margin-bottom: 10px;">Frequently Asked Question</h5>
              <div id="accordion" style="margin-top: 30px">
                <div class="card card-success">
                  <div class="card-header">
                    <h4 class="card-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed" aria-expanded="false">
                        Bagaimana cara mendapatkan poin?
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse">
                    <div class="card-body">
                      Untuk mendapatkan point, siswa dapat melakukan aktivitas sebagai berikut:
                      <ul>
                        <li>Menambahkan Tacit Knowledge (+5)</li>
                        <li>Menambahkan Explicit Knowledge (+5)</li>
                        <li>Melakukan Sharing Knowledge (+3)</li>
                        <li>Menjalankan Misi atau Tugas khusus yang diberikan</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card card-success">
                  <div class="card-header">
                    <h4 class="card-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">
                        Apakah aplikasi ini dapat menambah nilai saya?
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="card-body">
                      Ya, aplikasi ini akan menambahkan Nilai Keterampilan pada nilai proses belajar Mata Pelajaran yang bersangkutan.
                    </div>
                  </div>
                </div>
                <div class="card card-success">
                  <div class="card-header">
                    <h4 class="card-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                        Bagaimana apabila saya tidak mendapatkan poin?
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="card-body">
                      Apabila anda sudah menambahkan knowledge atau sudah menjalankan misi/tugas tertentu namun tetap tidak mendapatkan point, maka anda dapat melakukan Screenshot pada aktivitas yang anda lakukan lalu meneruskan ke Guru Mapel yang bersangkutan/Kepala Bengkel, agar dapat dilakukan inject point secara manual.
                    </div>
                  </div>
                </div>
                <div class="card card-success">
                  <div class="card-header">
                    <h4 class="card-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" class="collapsed" aria-expanded="false">
                        Apabila terjadi kesalahan sistem, apa yang harus saya lakukan?
                      </a>
                    </h4>
                  </div>
                  <div id="collapseFour" class="panel-collapse collapse">
                    <div class="card-body">
                      Apabila terjadi kesalahan sistem sebagai berikut:
                      <ul>
                        <li>Website tidak dapat diakses</li>
                        <li>Selalu gagal saat menambahkan knowledge</li>
                        <li>Poin tidak bertambah</li>
                        <li>Pembelian avatar gagal namun poin terpotong</li>
                        <li>Peretasan dan penyalahgunaan akun</li>
                      </ul>
                      Maka anda dapat melakukan pengaduan kepada Guru Mapel/Kepala Bengkel
                      atau menghubungi administrator sistem melalaui Surel : ekaariefin@gmail.com
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </section>
    </div>

    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Pengumuman!</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Selamat Datang pada Aplikasi Knowledge Management System (KMS)</p>
            <br />
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item">
                  <img class="d-block w-100" src="../dist/img/narrative/1.jpg" alt="First slide">
                </div>
                <div class="carousel-item active">
                  <img class="d-block w-100" src="../dist/img/narrative/2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="../dist/img/narrative/3.jpg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    include 'included/footer.php';
    ?>
    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>

  <script src="../plugins/jquery/jquery.min.js"></script>
  <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../plugins/sparklines/sparkline.js"></script>
  <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
  <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="../dist/js/adminlte.js"></script>
  <script src="../dist/js/pages/dashboard.js"></script>
  <script src="../dist/js/demo.js"></script>
  <?php
  if ($_SESSION['count'] <= 1) {
    echo "<script>
              $('#modal-default').modal('show');
            </script>";
  } else {
    // nothing to show
  }
  ?>

</body>

</html>