<?php
	session_start();
	include_once ("system/sys_user.php");
	$quser = new user();
	$chkrole = $quser->user_get_role($_SESSION['user_id']);

	if ($chkrole['user_role'] == "Siswa"){
	    if($quser->get_total_login($_SESSION['user_id']) == '1'){
	      echo '<script type="text/javascript">
	        window.location.replace("pages/introduction.php");
	      </script>';
	    }
	    else{
	    echo '<script type="text/javascript">
	        window.location.replace("pages/student_dashboard.php");
	      </script>';
	    }
  	}
	else if ($chkrole['user_role'] == "Guru"){
		echo '<script type="text/javascript">
			  window.location.replace("pages/teacher_dashboard.php");
			</script>';
	}
	else if ($chkrole['user_role'] == "Admin Pusat"){
		echo '<script type="text/javascript">
			  window.location.replace("pages/admin_dashboard.php");
			</script>';
	}
	else if ($chkrole['user_role'] == "Admin Sekolah"){
		echo '<script type="text/javascript">
			  window.location.replace("pages/admin_dashboard_sekolah.php");
			</script>';
	}
	else if ($chkrole['user_role'] == "Pimpinan"){
		echo '<script type="text/javascript">
			  window.location.replace("pages/pimpinan_dashboard.php");
			</script>';
	}
	else if ($chkrole['user_role'] == "Blocked"){
		echo ("<script LANGUAGE='JavaScript'>
            window.alert('Akun anda sedang diblokir oleh sistem, harap hubungi Administrator!');
            window.location.href='../logout.php';
            </script>");
	}
	else{
		exit();
	}
?>
