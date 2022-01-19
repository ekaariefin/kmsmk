<?php
  session_start();
  include_once ("../system/sys_user.php");
  $quser = new user();
  $chkrole = $quser->user_get_role($_SESSION['user_id']);

  if ($chkrole['user_role'] == "Siswa"){
    if($quser->get_total_login($_SESSION['user_id']) == '1'){
      echo '<script type="text/javascript">
        window.location.replace("introduction.php");
      </script>';
    }
    else{
    echo '<script type="text/javascript">
        window.location.replace("student_dashboard.php");
      </script>';
    }
  }
  else if ($chkrole['user_role'] == "Guru"){
    echo '<script type="text/javascript">
        window.location.replace("teacher_dashboard.php");
      </script>';
  }
  else if ($chkrole['user_role'] == "Admin"){
    echo '<script type="text/javascript">
        window.location.replace("admin_dashboard.php");
      </script>';
  }
  else if ($chkrole['user_role'] == "Pimpinan"){
    echo '<script type="text/javascript">
        window.location.replace("pimpinan_dashboard.php");
      </script>';
  }
  else{
    exit();
  }
?>
