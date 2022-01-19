<?php
include_once('db_connect.php');
class user
{

	function __construct()
	{
		$this->conn = new conn();
	}

	function login($user_nip, $user_password)
	{
		$sql = mysqli_query($this->conn->koneksi, "SELECT user_id, user_nip, user_name, user_password, npsn FROM db_user WHERE user_nip='$user_nip' AND user_password='$user_password'");
		$data = $sql->fetch_array();

		if ($user_nip == $data['user_nip'] and $user_password == $data['user_password']) {
			//session_start();
			$_SESSION['user_id'] = $data['user_id'];
			$_SESSION['user_nip'] = $data['user_nip'];
			$_SESSION['npsn_login'] = $data['npsn'];
			$user_id = $data['user_id'];
			$_SESSION['user_name'] = $data['user_name'];
			$last_login = date('d F Y H:i:s');
			mysqli_query($this->conn->koneksi, "INSERT INTO `db_login_activity`(`activity_id`, `activity_date`, `user_id`) VALUES ('','$last_login','$user_id')");
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function get_point_score($point_id)
	{
		$query = mysqli_query($this->conn->koneksi, "SELECT point_score FROM db_point WHERE point_id='$point_id'");
		return $query->fetch_array();
	}

	function addPointLogin($user_id, $total_point)
	{
		date_default_timezone_set('Asia/Jakarta');
		$date = date('d-m-Y H:i:s');
		$query = mysqli_query($this->conn->koneksi, "INSERT INTO db_point_trans (trans_date, point_id, user_id, trans_verified, total_point) VALUES ('$date','10311','$user_id','8888','$total_point')");
	}

	function getdata($user_id)
	{
		$query = mysqli_query($this->conn->koneksi, "select * from db_user where user_id='$user_id'");
		return $query->fetch_array();
	}
}
