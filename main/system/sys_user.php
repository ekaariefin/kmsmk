<?php 

include_once('db_connect.php');

class user {

	function __construct(){
		$this->conn = new conn();
	}

	// menambahkan user baru
	function add_new_user($user_nip, $user_name, $user_gender, $user_photo, $user_role, $npsn, $user_password){
		$query =  mysqli_query($this->conn->koneksi,"INSERT INTO db_user (user_nip,user_name,user_gender,user_photo,user_role,npsn,user_password) VALUES ('$user_nip','$user_name','$user_gender','$user_photo','$user_role','$npsn','$user_password')");
		return $query;
	}

	// menambahkan user baru kepada kelas
	function add_new_student_class($user_id, $class_id){
		$query = mysqli_query($this->conn->koneksi,"INSERT INTO db_class_trans (user_id,class_id) VALUES ('$user_id','$class_id')");
		return $query;
	}


	// menampilkan detail data siswa
	function user_detail($user_id)
	{
		$data = mysqli_query($this->conn->koneksi,"SELECT db_user.user_id, db_user.user_nip, db_user.user_name, db_user.user_gender, db_user.user_photo, db_user.user_role, db_class.class_name, db_login_activity.activity_date, db_sekolah.nama_sekolah FROM db_user INNER JOIN db_class_trans ON db_user.user_id = db_class_trans.user_id INNER JOIN db_class ON db_class_trans.class_id = db_class.class_id INNER JOIN db_sekolah ON db_user.npsn = db_sekolah.npsn LEFT OUTER JOIN db_login_activity ON db_login_activity.user_id = db_user.user_id WHERE db_user.user_id='$user_id' ORDER BY db_login_activity.activity_date DESC LIMIT 1");
		return $data->fetch_array();
	}

	// menampilkan detail data siswa
	function admin_change_user_photo($user_id)
	{
		$data = mysqli_query($this->conn->koneksi,"SELECT user_photo FROM db_user WHERE user_id = '$user_id'");
		return $data->fetch_array();
	}

	// get user photo
	function user_get_photo($user_id){
		$query = mysqli_query($this->conn->koneksi,"SELECT user_photo FROM db_user WHERE user_id='$user_id'");
		return $query->fetch_array();
	}

	function get_publisher_photo($user_id){
		$query = mysqli_query($this->conn->koneksi,"SELECT user_photo FROM db_user WHERE user_id='$user_id'");
		return $query->fetch_array();
	}

	// function pengecekan role
	function user_get_role($user_id){
		$query = mysqli_query($this->conn->koneksi,"SELECT user_role FROM db_user WHERE user_id='$user_id'");
		return $query->fetch_array();
	}

	// function get class list saat pendaftaran akun
	function get_class_list($npsn_login){
		$query = mysqli_query($this->conn->koneksi,"SELECT * FROM db_class WHERE npsn = '$npsn_login'");
		while($row = mysqli_fetch_array($query)){
			$tampil[] = $row;
		}
		return $tampil;
	}

	// menampilkan detail data siswa
	function teacher_detail($user_id)
	{
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_user INNER JOIN db_sekolah ON db_sekolah.npsn = db_user.npsn WHERE user_id='$user_id' ");
		return $data->fetch_array();
	}
	
	// menampilkan seluruh list data siswa
	function user_list($npsn_login)
	{
		$data = mysqli_query($this->conn->koneksi,"SELECT db_user.user_id, db_user.user_nip, db_user.user_name, db_user.user_gender, db_user.user_photo, db_sekolah.nama_sekolah, db_class.class_name FROM db_user INNER JOIN db_sekolah ON db_user.npsn = db_sekolah.npsn INNER JOIN db_class_trans ON db_user.user_id = db_class_trans.user_id INNER JOIN db_class ON db_class_trans.class_id = db_class.class_id WHERE db_user.npsn = $npsn_login AND db_user.user_role = 'Siswa' GROUP BY db_user.user_name ORDER BY `db_user`.`user_id` ASC; ");

		
		while($row = mysqli_fetch_array($data)){
			$tampil[] = $row;
		}
		if (empty($tampil)){
			return "No Data";
		}
		else{
			return $tampil;
		}
	}

	function catch_userid($user_nip){
		$data = mysqli_query($this->conn->koneksi,"SELECT user_id FROM db_user WHERE user_nip = '$user_nip' ");
		while($row = mysqli_fetch_array($data)){
			$tampil[] = $row;
		}
		return $tampil;
	}

	function catch_classid($user_class,$npsn){
		$data = mysqli_query($this->conn->koneksi,"SELECT class_id FROM db_class WHERE class_name = '$user_class' AND npsn = '$npsn' ");
		while($row = mysqli_fetch_array($data)){
			$tampil[] = $row;
		}
		return $tampil;
	}

	// menampilkan seluruh list data siswa yang diblokir
	function user_block()
	{
		$data = mysqli_query($this->conn->koneksi,"SELECT db_user.user_id, db_user.user_name, db_user.user_gender, db_user.user_photo, db_class.class_name FROM db_user INNER JOIN db_class_trans ON db_user.user_id = db_class_trans.user_id INNER JOIN db_class ON db_class_trans.class_id = db_class.class_id WHERE db_user.user_role = 'Blocked'");
		while($row = mysqli_fetch_array($data)){
			$tampil[] = $row;
		}
		if (empty($tampil)){
			return "No Data";
		}
		else{
			return $tampil;
		}
	}

	// melakukan perubahan terhadap data pengguna (admin)
	function edit_user($user_id, $user_name, $user_gender, $user_role){
		$query = mysqli_query($this->conn->koneksi,"UPDATE db_user SET user_name = '$user_name', user_gender = '$user_gender', user_role = '$user_role' WHERE user_id = '$user_id'");
		return TRUE;
	}

	// set blokir true
	function set_block_true($user_id){
		$query = mysqli_query($this->conn->koneksi,"UPDATE db_user SET user_role = 'Blocked' WHERE user_id = '$user_id'");
		return $query;
	}

	function set_block_false($user_id){
		$query = mysqli_query($this->conn->koneksi,"UPDATE db_user SET user_role = 'Siswa' WHERE user_id = '$user_id'");
		return $query;
	}

	// menampilkan seluruh akun guru
	function guru_list($npsn_login)
	{
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_user INNER JOIN db_sekolah ON db_user.npsn = db_sekolah.npsn WHERE user_role = 'Guru' AND db_sekolah.npsn = '$npsn_login' GROUP BY user_name");
		while($row = mysqli_fetch_array($data)){
			$tampil[] = $row;
		}
		return $tampil;
	}

	// menampilkan detail akun guru
	function guru_detail($user_id)
	{
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_user WHERE user_id='$user_id'");
		return $data->fetch_array();
	}

	// menampilkan data mapel yang diajarkan oleh guru
	function get_guru_mapel($user_id){
		$data = mysqli_query ($this->conn->koneksi, "SELECT * FROM db_gurumapel
		INNER JOIN db_mapel ON db_gurumapel.mapel_id = db_mapel.mapel_id WHERE user_id = '$user_id'");
		while($row = mysqli_fetch_array($data)){
			$tampil[] = $row;
		}
		if (empty($tampil)){
			return "No Data";
		}
		else{
			return $tampil;
		}
	}

	function update_user_photo($user_id,$user_photo){
		$query = mysqli_query($this->conn->koneksi,"UPDATE db_user SET user_photo='$user_photo' WHERE user_id='$user_id'");
		return TRUE;
	}

	function update_guru_photo($user_id,$user_photo){
		$query = mysqli_query($this->conn->koneksi,"UPDATE db_user SET user_photo='$user_photo' WHERE user_id='$user_id'");
		return TRUE;
	}

	function get_user_password($user_id){
		$query = mysqli_query($this->conn->koneksi,"SELECT user_password FROM db_user WHERE user_id='$user_id'");
		return $query->fetch_array();
	}

	function update_user_password($user_id, $new_password){
		$query = mysqli_query($this->conn->koneksi,"UPDATE db_user SET user_password='$new_password' WHERE user_id='$user_id'");
		return TRUE;
	}

	function get_user_photo($user_id){
		$query = mysqli_query($this->conn->koneksi,"SELECT user_photo FROM db_user WHERE user_id='$user_id'");
		return $query->fetch_array();
	}


	function edit_guru($user_id, $user_name, $user_gender){
		$query = mysqli_query($this->conn->koneksi,"UPDATE db_user SET user_name = '$user_name', user_gender = '$user_gender' WHERE user_id='$user_id'");
		return TRUE;
	}

	function guru_delete($user_id){
		$data = mysqli_query($this->conn->koneksi,"DELETE FROM db_user WHERE user_id='$user_id'");
		return TRUE;
	}

	function user_delete($user_id){
		$data = mysqli_query($this->conn->koneksi,"DELETE FROM db_user WHERE user_id='$user_id'");
		return TRUE;
	}

	// menampilkan daftar teman dari user yg bersangkutan
	function list_friend($user_id){
		$data = mysqli_query ($this->conn->koneksi, "SELECT db_friend_trans.trans_id, db_friend_trans.trans_date, db_friend_trans.friend_id, db_user.user_name, db_user.user_photo, db_class.class_name FROM db_friend_trans INNER JOIN db_user ON db_user.user_id = db_friend_trans.friend_id INNER JOIN db_class_trans ON db_class_trans.user_id = db_friend_trans.friend_id INNER JOIN db_class ON db_class.class_id = db_class_trans.class_id WHERE db_friend_trans.user_id = '$user_id'");
		while($row = mysqli_fetch_array($data)){
			$tampil[] = $row;
		}
		if (empty($tampil)){
			return "No Data";
		}
		else{
			return $tampil;
		}
	}

	// menampilkan daftar teman dari user yg bersangkutan
	function list_mapel($user_id){
		$data = mysqli_query ($this->conn->koneksi, "SELECT * FROM db_gurumapel INNER JOIN db_mapel ON db_gurumapel.mapel_id = db_mapel.mapel_id WHERE db_gurumapel.user_id = '$user_id' ");
		while($row = mysqli_fetch_array($data)){
			$tampil[] = $row;
		}
		if (empty($tampil)){
			return "No Data";
		}
		else{
			return $tampil;
		}
	}
	

	function find_user($user_nip){
		$data = mysqli_query ($this->conn->koneksi, "SELECT db_user.user_id, db_user.user_name, db_user.user_gender, db_user.user_photo, db_class.class_name FROM db_user INNER JOIN db_class_trans ON db_class_trans.user_id =db_user.user_id INNER JOIN db_class ON db_class.class_id = db_class_trans.class_id WHERE db_user.user_nip ='$user_nip'");
		$hitung = mysqli_num_rows($data);

		$chkfriendlist = mysqli_query ($this->conn->koneksi, "SELECT * FROM db_friend_trans WHERE friend_id = '$user_nip'");
		$cekteman = mysqli_num_rows($chkfriendlist);

		if ($cekteman > 0){
			return "Already";
		}

		if ($hitung > 0 AND $cekteman == 0 ){
			while($row = mysqli_fetch_array($data)){
			$tampil[] = $row;
			return $tampil;
			}
		}
		else{
			return "No Data";
		}	
	}

	function addFriend($friend_id, $user_id){
		$query = mysqli_query ($this->conn->koneksi, "INSERT INTO db_friend_trans (trans_date, user_id, friend_id) VALUES (NOW(), '$user_id', '$friend_id')");
		return $query;
	}

	function bulk_upload_user($user_nip,$user_name,$user_gender,$user_photo,$user_role,$npsn,$user_password){
		$query = mysqli_query ($this->conn->koneksi, "INSERT INTO db_user VALUES ('','$user_nip','$user_name','$user_gender','$user_photo','$user_role','$npsn','$user_password')");
		return $query;
	}

	function bulk_upload_class($current_userid,$current_class){
		$query = mysqli_query ($this->conn->koneksi, "INSERT INTO `db_class_trans`(`trans_id`, `user_id`, `class_id`) VALUES ('','$current_userid','$current_class')");
		return $query;
	}

	function get_total_login($user_id){
		$query = mysqli_query($this->conn->koneksi, "SELECT COUNT(user_id) AS total FROM db_login_activity WHERE user_id = '$user_id'");
		$row = mysqli_fetch_assoc($query); 
		$sum = $row['total'];
		return $sum;
	}

	function new_user_get_avatar(){
		$query = mysqli_query($this->conn->koneksi,"SELECT * FROM db_avatar ORDER BY rand() LIMIT 1");
		return $query->fetch_array();
	}

	function new_user_get_avatar_detail($avatar_id){
		$query = mysqli_query($this->conn->koneksi,"SELECT * FROM db_avatar WHERE avatar_id = '$avatar_id' ");
		return $query->fetch_array();
	}

	function add_free_avatar($trans_desc, $avatar_id, $user_id){
		$sql = mysqli_query($this->conn->koneksi, "INSERT INTO db_avatar_trans(trans_desc,avatar_id,user_id,status) VALUES ('$trans_desc','$avatar_id','$user_id','Free')");
		return $sql;
	}

	function new_user_get_point ($user_id, $total_point){
		date_default_timezone_set('Asia/Jakarta');
		$date = date('d-m-Y H:i:s');
		$query = mysqli_query($this->conn->koneksi, "INSERT INTO db_point_trans (trans_date, point_id, user_id, trans_verified, total_point) VALUES ('$date','10311','$user_id','8888','$total_point')");
	}

// admin pusat
	function admin_pusat_guru_list()
	{
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_user INNER JOIN db_sekolah ON db_user.npsn = db_sekolah.npsn WHERE user_role = 'Guru'");
		while($row = mysqli_fetch_array($data)){
			$tampil[] = $row;
		}
		return $tampil;
	}

	function admin_pusat_user_list()
	{
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_user INNER JOIN db_sekolah ON db_user.npsn = db_sekolah.npsn WHERE user_role = 'Siswa'");
		while($row = mysqli_fetch_array($data)){
			$tampil[] = $row;
		}
		return $tampil;
	}
}
?>