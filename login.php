<?php
// error_reporting(0);
include_once('conn_user.php');
$library = new user();

session_start();

if (isset($_SESSION['is_login'])) {
  if ($_SESSION['is_login'] == 'login') {
    header('location:main/');
  }
}

if (isset($_POST['login'])) {
  $user_nip = htmlentities($_POST['user_nip'], ENT_COMPAT, 'ISO-8859-1', true);
  $user_password = htmlentities(md5($_POST['user_password']), ENT_COMPAT, 'ISO-8859-1', true);

  if ($user_nip == '' or $user_password == '') {
    header('location:login.php?message="wrong"');
  } else {
    if ($library->login($user_nip, $user_password)) {
      // menambahkan poin login harian
      $add_login_point = $library->get_point_score(10311);
      $add_login_point_score = $add_login_point['point_score'];
      $library->addPointLogin($_SESSION['user_id'], $add_login_point_score);
      // mengalihkan halaman jika login sukses
      header('location:login.php?message=success_login');
    } else {
      header('location:login.php?message=proses_gagal');
    }
  }
}
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login KMS | SMK Provinsi Sumatera Selatan</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <form class="form-signin" method="post" action="">

    <?php
    if (isset($_GET['message'])) {
      if ($_GET['message'] == "proses_gagal") {
        echo "<div class='alert alert-danger' role='alert'>
                    Proses Login Gagal!
                  </div>";
      } else if ($_GET['message'] == "success_login") {
        echo '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Login Berhasil! mengalihkan....
                </div>';
        echo '<meta http-equiv="refresh" content="1;url=main/">';
        $_SESSION['is_login'] = 'login';
      } else if ($_GET['message'] == "register") {
        echo '<div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Mengalihkan....
                </div>';
        echo '<meta http-equiv="refresh" content="1;url=register.php">';
      }
    }
    ?>

    <img class="mb-4" src="assets/img/diknas.png" alt="" width="100" height="72">

    <div style="margin-bottom: 30px">
      <h1 class="h3 mb-3 font-weight-normal">Login KMS</h1>
    </div>

    <div style="margin-bottom: 20px">
      <label for="user_id" class="sr-only">NIS/NIP</label>
      <input type="text" class="form-control" placeholder="NIS / NIP" name="user_nip" autocomplete="off" onkeypress="return isNumber(event)" maxlength="18" required autofocus>
    </div>

    <div style="margin-bottom: 20px">
      <label for="user_password" class="sr-only">Password</label>
      <input type="password" class="form-control" placeholder="Password" name="user_password" required>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
    <hr>

    <p class="mt-5 mb-3 text-muted">
      Knowledge Management System <br>
      Dinas Pendidikan Prov Sumatera Selatan <br>
      &copy; <?php echo date('Y'); ?>
    </p>
  </form>
</body>

</html>
<script type="text/javascript">
  function isNumber(event) {
    var keycode = event.keyCode;
    if (keycode > 47 && keycode < 58) {
      return true;
    } else {
      return false;
    }
  }
</script>