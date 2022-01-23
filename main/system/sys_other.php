<?php 

include_once('db_connect.php');

class other {

	function __construct(){
		$this->conn = new conn();
	}

	function show_etalase(){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_avatar WHERE avatar_price != 0 ");
		while($row = mysqli_fetch_array($data)){
			$tampil[] = $row;
		}
		return $tampil;
	}

	function show_my_avatar($user_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_avatar_trans INNER JOIN db_avatar ON db_avatar_trans.avatar_id = db_avatar.avatar_id WHERE user_id = '$user_id' ");
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

	function mp_list($npsn){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_mapel WHERE npsn = '$npsn'");
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

	function mp_detail($mapel_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_mapel WHERE mapel_id='$mapel_id'");
		return $data->fetch_array();
	}

	function mp_detail_count_tacit($mapel_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT tacit_id FROM db_tacit WHERE mapel_id='$mapel_id'");
		$jumlah_tacit = mysqli_num_rows($data);
		return $jumlah_tacit;
	}

	function mp_detail_count_explicit($mapel_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT explicit_id FROM db_explicit WHERE mapel_id='$mapel_id'");
		$jumlah_explicit = mysqli_num_rows($data);
		return $jumlah_explicit;
	}

	function mp_count_guru($mapel_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT user_id FROM db_gurumapel WHERE mapel_id = '$mapel_id' ");
		$jumlah_guru = mysqli_num_rows($data);
		return $jumlah_guru;
	}

	function mp_del_gurumapel($mapel_id,$user_id){
		$data = mysqli_query($this->conn->koneksi,"DELETE FROM db_gurumapel WHERE user_id='$user_id' AND mapel_id='$mapel_id' ");
		return TRUE;
	}

	function mp_add_gurumapel($guru_id, $mapel_id){
		$data = mysqli_query($this->conn->koneksi,"INSERT INTO db_gurumapel VALUES ('','$guru_id', '$mapel_id')");
		return TRUE;
	}

	function get_guru_mapel($mapel_id)
	{
		$query = mysqli_query($this->conn->koneksi,"SELECT * FROM db_gurumapel INNER JOIN db_user ON db_gurumapel.user_id = db_user.user_id WHERE mapel_id='$mapel_id' ORDER BY user_name ASC");
		$cek = mysqli_num_rows($query);
		if (empty($cek)){
			return "No Data";
		}
		else{
			while($row = mysqli_fetch_array($query)){
				$tampil[] = $row;
			}
			return $tampil;
		}
	}

	function delmapel($mapel_id){
		$query = mysqli_query($this->conn->koneksi,"DELETE FROM db_mapel WHERE mapel_id='$mapel_id'");
		return TRUE;
	}

	function get_item_detail($avatar_id){
		$get = mysqli_query($this->conn->koneksi,"SELECT * FROM db_avatar WHERE avatar_id = '$avatar_id' ");
		return $get->fetch_array();
	}

	function findTacit($keyword){
		$find = mysqli_query($this->conn->koneksi, "SELECT * FROM db_tacit INNER JOIN db_user ON db_tacit.user_id = db_user.user_id INNER JOIN db_mapel ON db_mapel.mapel_id = db_tacit.mapel_id WHERE tacit_name LIKE '%$keyword%'");
		while($row = mysqli_fetch_array($find)){
			$tampil[] = $row;
		}
		if (empty($tampil)){
			return "No Data";
		}
		else{
			return $tampil;
		}
	}

	function findExplicit($keyword){
		$find = mysqli_query($this->conn->koneksi, "SELECT * FROM db_explicit INNER JOIN db_user ON db_explicit.user_id = db_user.user_id INNER JOIN db_mapel ON db_mapel.mapel_id = db_explicit.mapel_id WHERE explicit_name LIKE '%$keyword%'");
		while($row = mysqli_fetch_array($find)){
			$tampil[] = $row;
		}
		if (empty($tampil)){
			return "No Data";
		}
		else{
			return $tampil;
		}
	}

	function new_group($group_name, $group_code, $group_topic, $group_task, $pembina){
		$query_add = mysqli_query ($this->conn->koneksi,"INSERT into db_group (group_name, group_code, group_topic, group_task, pembina) VALUES ('$group_name','$group_code','$group_topic','$group_task','$pembina')");
	}

	function add_group($group_id, $user_id){	
		$query_add = mysqli_query ($this->conn->koneksi,"INSERT into db_group_trans (group_id, user_id) VALUES ($group_id,$user_id)");
		return $query_add;
	}

	function show_mygroup($user_id){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_group_trans INNER JOIN db_group on db_group_trans.group_id = db_group.group_id INNER JOIN db_user ON db_group_trans.user_id = db_user.user_id WHERE db_group_trans.user_id='$user_id'");
		$cek = mysqli_num_rows($query);
			if (empty($cek)){
				return "No Data";
			}
			else{
				while($row = mysqli_fetch_array($query)){
					$tampil[] = $row;
				}
				return $tampil;
			}
	}

	function show_group_guru($user_id){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_group WHERE pembina ='$user_id'");
		$cek = mysqli_num_rows($query);
			if (empty($cek)){
				return "No Data";
			}
			else{
				while($row = mysqli_fetch_array($query)){
					$tampil[] = $row;
				}
				return $tampil;
			}
	}

	function show_group_all($npsn){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_group INNER JOIN db_user WHERE db_group.pembina = db_user.user_id AND npsn = '$npsn'");
		$cek = mysqli_num_rows($query);
			if (empty($cek)){
				return "No Data";
			}
			else{
				while($row = mysqli_fetch_array($query)){
					$tampil[] = $row;
				}
				return $tampil;
			}
	}

	function count_group_user($group_id){
		$query = mysqli_query($this->conn->koneksi, "SELECT user_id FROM db_group_trans WHERE group_id = '$group_id'");
		$hitung = mysqli_num_rows($query);
		return $hitung;
	}

	function group_detail($group_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_group WHERE group_id = '$group_id'");
		return $data->fetch_array();
	}

	function get_group_member($group_id){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_group_trans INNER JOIN db_group ON db_group_trans.group_id = db_group.group_id INNER JOIN db_user ON db_group_trans.user_id = db_user.user_id INNER JOIN db_class_trans ON db_user.user_id = db_class_trans.user_id INNER JOIN db_class ON db_class_trans.class_id = db_class.class_id WHERE db_group_trans.group_id = '$group_id'");
		$cek = mysqli_num_rows($query);
			if (empty($cek)){
				return "No Data";
			}
			else{
				while($row = mysqli_fetch_array($query)){
					$tampil[] = $row;
				}
				return $tampil;
			}
	}

	function find_group($group_code, $user_id){
		$data = mysqli_query ($this->conn->koneksi, "SELECT * FROM db_group WHERE group_code = '$group_code'");
		$hitung = mysqli_num_rows($data);

		$chk = mysqli_query ($this->conn->koneksi, "SELECT * FROM db_group_trans INNER JOIN db_group ON db_group_trans.group_id = db_group.group_id WHERE user_id = '$user_id' AND db_group.group_code = '$group_code'");
		$result = mysqli_num_rows($chk);

		if ($result > 0){
			return "Already";
		}

		if ($hitung > 0 AND $result == 0 ){
			while($row = mysqli_fetch_array($data)){
			$tampil[] = $row;
			return $tampil;
			}
		}
		else{
			return "No Data";
		}	
	}

	function new_mission($mission_name, $mission_target, $mission_reward, $mission_task, $mission_expired, $pembina){
		$query_add = mysqli_query ($this->conn->koneksi,"INSERT into db_mission (mission_name, mission_target, mission_reward,  mission_task, mission_expired, pembina) VALUES ('$mission_name', '$mission_target', '$mission_reward', '$mission_task', '$mission_expired', '$pembina')");
		return $query_add;
	}

	function show_mission_guru($user_id){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_mission WHERE pembina ='$user_id'");
		$cek = mysqli_num_rows($query);
			if (empty($cek)){
				return "No Data";
			}
			else{
				while($row = mysqli_fetch_array($query)){
					$tampil[] = $row;
				}
				return $tampil;
			}
	}

	function show_mission_all($npsn){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_mission INNER JOIN db_user ON db_mission.pembina = db_user.user_id AND npsn = '$npsn'");
		$cek = mysqli_num_rows($query);
			if (empty($cek)){
				return "No Data";
			}
			else{
				while($row = mysqli_fetch_array($query)){
					$tampil[] = $row;
				}
				return $tampil;
			}
	}

	function count_mission_user($mission_id){
		$query = mysqli_query($this->conn->koneksi, "SELECT user_id FROM db_mission_trans WHERE mission_id = '$mission_id'");
		$hitung = mysqli_num_rows($query);
		return $hitung;
	}

	function mission_detail($mission_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_mission
		INNER JOIN db_user ON db_mission.pembina = db_user.user_id WHERE mission_id = '$mission_id'");
		return $data->fetch_array();
	}

	function count_kontribusi($mission_id, $user_id){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_mission_progress
		INNER JOIN db_mission ON db_mission_progress.mission_id = db_mission.mission_id
		INNER JOIN db_user ON db_mission_progress.user_id = db_user.user_id WHERE db_mission_progress.user_id='$user_id' AND db_mission_progress.mission_id = '$mission_id'");
		return $query->fetch_array();
	}

	function get_mission_member($mission_id){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_mission_trans INNER JOIN db_mission ON db_mission_trans.mission_id = db_mission.mission_id INNER JOIN db_user ON db_mission_trans.user_id = db_user.user_id INNER JOIN db_class_trans ON db_user.user_id = db_class_trans.user_id INNER JOIN db_class ON db_class_trans.class_id = db_class.class_id WHERE db_mission_trans.mission_id = '$mission_id'");
		$cek = mysqli_num_rows($query);
			if (empty($cek)){
				return "No Data";
			}
			else{
				while($row = mysqli_fetch_array($query)){
					$tampil[] = $row;
				}
				return $tampil;
			}
	}

	function show_my_mission($user_id){
		$query = mysqli_query($this->conn->koneksi,"SELECT * FROM db_mission_trans INNER JOIN db_mission ON db_mission_trans.mission_id = db_mission.mission_id WHERE user_id = '$user_id' ");
		$cek = mysqli_num_rows($query);
			if (empty($cek)){
				return "No Data";
			}
			else{
				while($row = mysqli_fetch_array($query)){
					$tampil[] = $row;
				}
				return $tampil;
			}
	}

	function assignment_detail($mission_id,$user_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_mission_trans WHERE db_mission_trans.mission_id = '$mission_id' AND db_mission_trans.user_id='$user_id'");
		return $data->fetch_array();
	}

	function mission_upload_file($mission_id,$user_id,$user_file){
		$query = mysqli_query($this->conn->koneksi,"UPDATE db_mission_trans SET user_file='$user_file' WHERE mission_id='$mission_id' AND user_id='$user_id' ");
		return $query;
	}

	function mission_list()
		{
			$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_mission");
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

	function join_mission($mission_id,$user_id){
		$query = mysqli_query($this->conn->koneksi,"INSERT INTO db_mission_trans (mission_id,user_id) VALUES ('$mission_id','$user_id')");
		return $query;
	}

	function join_mission_progress($mission_id,$user_id){
		$query = mysqli_query($this->conn->koneksi,"INSERT INTO db_mission_progress (mission_id,user_id,total_kontribusi) VALUES ('$mission_id','$user_id','0')");
		return $query;
	}


	function check_join($mission_id,$user_id){
		$query = mysqli_query($this->conn->koneksi,"SELECT * FROM db_mission_trans WHERE mission_id='$mission_id' AND user_id='$user_id'");
		$hitung = mysqli_num_rows($query);
		return $hitung;
	}

	function mission_approve_file($mid,$student,$user_id){
		$query = mysqli_query($this->conn->koneksi,"UPDATE db_mission_trans SET verified='$user_id' WHERE mission_id='$mid' AND user_id='$student'");
		return $query;
	}

	function mission_approve_sendpoint($mid,$student,$send_point,$user_id){
		$date_now = date('d F Y');
		$query = mysqli_query($this->conn->koneksi,"INSERT INTO db_point_transfer VALUES ('','$date_now','$user_id','$send_point','$student')");
		return $query;
	}

	// teacher dashboard control START
	function count_total_mp($user_id, $npsn_login){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_gurumapel INNER JOIN db_user ON db_user.user_id = db_gurumapel.user_id WHERE db_gurumapel.user_id ='$user_id' AND db_user.npsn = '$npsn_login'");
		$hitung = mysqli_num_rows($query);
		return $hitung;
	}

	function count_total_knowledge($npsn_login){
		$tacit = mysqli_query($this->conn->koneksi, "SELECT * FROM db_tacit  INNER JOIN db_user ON db_user.user_id = db_tacit.user_id WHERE tacit_status='Approve' AND npsn = '$npsn_login'");
		$hitung_tacit = mysqli_num_rows($tacit);
		$explicit = mysqli_query($this->conn->koneksi, "SELECT * FROM db_explicit INNER JOIN db_user ON db_user.user_id = db_explicit.user_id WHERE explicit_status='Approve' AND npsn = '$npsn_login'");
		$hitung_explicit = mysqli_num_rows($explicit);
		$hitung = $hitung_tacit + $hitung_explicit;
		return $hitung;
	}

	function count_total_siswa($npsn_login){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_user WHERE user_role='Siswa' AND npsn = '$npsn_login'");
		$hitung = mysqli_num_rows($query);
		return $hitung;
	}

	function count_total_mission($user_id){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_mission WHERE pembina='$user_id'");
		$hitung = mysqli_num_rows($query);
		return $hitung;
	}
	// teacher dashboard control END

	// admin dashboard control START

	function count_total_teacher($npsn_login){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_user WHERE user_role='Guru' AND npsn = '$npsn_login'");
		$hitung = mysqli_num_rows($query);
		return $hitung;
	}

	function count_all_mapel($npsn){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_mapel WHERE npsn='$npsn'");
		$hitung = mysqli_num_rows($query);
		return $hitung;
	}

	// admin pusat
	function admin_pusat_count_total_mapel(){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_mapel");
		$hitung = mysqli_num_rows($query);
		return $hitung;
	}

	function admin_pusat_count_total_knowledge(){
		$tacit = mysqli_query($this->conn->koneksi, "SELECT * FROM db_tacit  INNER JOIN db_user ON db_user.user_id = db_tacit.user_id WHERE tacit_status='Approve'");
		$hitung_tacit = mysqli_num_rows($tacit);
		$explicit = mysqli_query($this->conn->koneksi, "SELECT * FROM db_explicit INNER JOIN db_user ON db_user.user_id = db_explicit.user_id WHERE explicit_status='Approve'");
		$hitung_explicit = mysqli_num_rows($explicit);
		$hitung = $hitung_tacit + $hitung_explicit;
		return $hitung;
	}

	function admin_pusat_count_total_siswa(){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_user WHERE user_role='Siswa'");
		$hitung = mysqli_num_rows($query);
		return $hitung;
	}

	function admin_pusat_count_total_teacher(){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_user WHERE user_role='Guru'");
		$hitung = mysqli_num_rows($query);
		return $hitung;
	}

	// admin dashboard control END

	function activated_avatar($avatar_id, $user_id){
		$query = mysqli_query($this->conn->koneksi, "INSERT INTO db_avatar_used (avatar_id, user_id) VALUES ('$avatar_id', '$user_id')");
		return $query;
	}

	function update_avatar($avatar_id, $user_id){
		$query = mysqli_query($this->conn->koneksi, "UPDATE db_avatar_used SET avatar_id='$avatar_id' WHERE user_id='$user_id'");
		return $query;
	}

	function check_activated($avatar_id, $user_id){
		$data = mysqli_query($this->conn->koneksi, "SELECT * FROM db_avatar_used WHERE avatar_id='$avatar_id' AND user_id='$user_id'");
		$hitung = mysqli_num_rows($data);
		if(empty($hitung)){
			return "Empty";
		}
		else if($hitung > 0){
			return "Already";
		}
	}

	function check_user_already($user_id){
		$data = mysqli_query($this->conn->koneksi, "SELECT * FROM db_avatar_used WHERE user_id='$user_id'");
		$hitung = mysqli_num_rows($data);
		if(empty($hitung)){
			return "Empty";
		}
		else if($hitung > 0){
			return "Already";
		}
	}

	function check_join_missions($user_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_mission_progress WHERE user_id = '$user_id' AND status != 'Selesai'");
		$hitung = mysqli_num_rows($data);
		if(empty($hitung)){
			return FALSE;
		}
		else if($hitung > 0){
			return TRUE;
		}
	}

	function get_mission_user_join($user_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_mission_progress WHERE user_id = '$user_id' AND status != 'Selesai'");
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

	function tambah_nilai_kontribusi_mission($mission_id, $user_id, $total_kontribusi){
		$query = mysqli_query($this->conn->koneksi,"UPDATE db_mission_progress SET total_kontribusi='$total_kontribusi' WHERE mission_id='$mission_id' AND user_id='$user_id' AND status != 'Selesai' ");
		return $query;
	}

	function set_status_misi_selesai($mission_id, $user_id){
		$query = mysqli_query($this->conn->koneksi,"UPDATE db_mission_trans SET status='Selesai' WHERE mission_id='$mission_id' AND user_id='$user_id' ");
		$delete = mysqli_query($this->conn->koneksi,"UPDATE db_mission_progress SET status='Selesai' WHERE mission_id='$mission_id' AND user_id='$user_id' ");
		return TRUE;
	}

	function get_user_progress($mission_id, $user_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_mission_progress WHERE mission_id = '$mission_id' AND user_id = '$user_id'");
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


	function notif_list($receiver){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_notif 
			INNER JOIN db_user ON db_notif.notif_sender = db_user.user_id 
			WHERE notif_receiver='$receiver'");
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

	function kick_siswa($user_id,$gid){
		$query = mysqli_query($this->conn->koneksi,"DELETE FROM db_group_trans WHERE group_id='$gid' AND user_id = '$user_id' ");
		return $query;
	}

}

?>