<?php 

include_once('db_connect.php');

class tacit {

	function __construct(){
		$this->conn = new conn();
	}

	function tacit_add ($tacit_date, $tacit_name, $tacit_desc, $tacit_status, $tacit_source, $mapel_id, $user_id)
		{	
			$query_add = mysqli_query ($this->conn->koneksi,
				"INSERT into db_tacit (tacit_date, tacit_name, tacit_desc, tacit_status, tacit_source, user_id, mapel_id) 
								VALUES ('$tacit_date','$tacit_name','$tacit_desc', '$tacit_status', '$tacit_source','$user_id','$mapel_id')");
			return $query_add;
		}

	function tacit_edit ($tacit_id, $tacit_name, $tacit_desc, $tags_id)
		{
			$query_edit = mysqli_query ($this->conn->koneksi,
				"UPDATE db_tacit SET tacit_name = '$tacit_name', tacit_desc = '$tacit_desc', tags_id = '$tags_id' 
						WHERE tacit_id = '$tacit_id'");
			return $query_edit;
		}

	function tacit_delete ($tacit_id)
		{
			$query_delete = mysqli_query ($this->conn->koneksi,
				"DELETE FROM db_tacit WHERE tacit_id = '$tacit_id'");
			return $query_delete;
		}

	function tacit_list()
		{
			$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_tacit
			INNER JOIN db_mapel ON db_tacit.mapel_id = db_mapel.mapel_id 
			INNER JOIN db_user ON db_tacit.user_id = db_user.user_id WHERE tacit_status = 'Approve'");
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

	function tacit_list_select_mp($mapel_id)
		{
			$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_tacit 
			INNER JOIN db_mapel ON db_tacit.mapel_id = db_mapel.mapel_id
			INNER JOIN db_user ON db_tacit.user_id = db_user.user_id
			WHERE db_tacit.mapel_id='$mapel_id' AND db_tacit.tacit_status = 'Approve' ");
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

	function tacit_list_all($npsn)
		{
			$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_tacit INNER JOIN db_mapel ON db_tacit.mapel_id = db_mapel.mapel_id INNER JOIN db_user ON db_tacit.user_id = db_user.user_id WHERE db_tacit.tacit_status = 'Pending' AND db_user.npsn = '$npsn'");
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


	function tacit_list_mp($mapel_id, $npsn){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_tacit 
			INNER JOIN db_mapel ON db_tacit.mapel_id = db_mapel.mapel_id
			INNER JOIN db_user ON db_tacit.user_id = db_user.user_id
			WHERE db_tacit.mapel_id='$mapel_id' AND db_tacit.tacit_status = 'Pending' AND db_user.npsn = '$npsn' ");
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

	// menampilkan tacit knowledge pribadi
	function my_tacit_list($user_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_tacit
		INNER JOIN db_mapel ON db_tacit.mapel_id = db_mapel.mapel_id WHERE user_id = '$user_id'");
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

	// menampilkan tacit knowledge pribadi
	function my_tacit_list_select_mp($mapel_id, $user_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_tacit 
			INNER JOIN db_mapel ON db_tacit.mapel_id = db_mapel.mapel_id
			WHERE db_tacit.mapel_id='$mapel_id' AND user_id = '$user_id' ");
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

	function user_tacit_list($user_id)
		{
			$query = mysqli_query($this->conn->koneksi,"SELECT tacit_id, tacit_name FROM db_tacit WHERE user_id = '$user_id'");
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

	function tacit_detail($tacit_id)
		{
			$query = mysqli_query($this->conn->koneksi, "SELECT * from db_tacit 
			INNER JOIN db_mapel ON db_tacit.mapel_id = db_mapel.mapel_id 
			INNER JOIN db_user ON db_tacit.user_id = db_user.user_id 
			where tacit_id='$tacit_id'");
			return $query->fetch_array();
		}

	function show_tacit_comment($tacit_id)
		{
			$data = mysqli_query ($this->conn->koneksi, "SELECT * FROM db_tacit_comment 
			INNER JOIN db_user ON db_tacit_comment.user_id = db_user.user_id
			WHERE tacit_id = '$tacit_id' ORDER BY comment_date ASC");
			$cek = mysqli_num_rows($data);
			if (empty($cek)){
				return "No Data";
			}
			else{
				while($row = mysqli_fetch_array($data)){
					$tampil[] = $row;
				}
				return $tampil;
			}
		}

	function add_tacit_comment($comment_date, $user_id, $tacit_id, $comment_desc){
		$query_add = mysqli_query ($this->conn->koneksi,
				"INSERT into db_tacit_comment (comment_date, user_id, tacit_id, comment_desc) 
								VALUES ('$comment_date','$user_id','$tacit_id', '$comment_desc')");
			return $query_add;
	}

	function setApproval($tacit_id){
		$query = mysqli_query ($this->conn->koneksi,
				"UPDATE db_tacit SET tacit_status = 'Approve' WHERE tacit_id='$tacit_id'");
		return $query;
	}

	function count_tacit_like($tacit_id){
		$query = mysqli_query($this->conn->koneksi,"SELECT * FROM db_tacit_like WHERE tacit_id='$tacit_id'");
		$hitung = mysqli_num_rows($query);
		return $hitung;
	}

	function count_tacit_comment($tacit_id){
		$query = mysqli_query($this->conn->koneksi,"SELECT * FROM db_tacit_comment WHERE tacit_id='$tacit_id'");
		$hitung = mysqli_num_rows($query);
		return $hitung;
	}

	function check_user_liked($tacit_id, $user_id){
		$query = mysqli_query($this->conn->koneksi,"SELECT * FROM db_tacit_like WHERE tacit_id='$tacit_id' AND user_id='$user_id'");
		$hitung = mysqli_num_rows($query);
		return $hitung;
	}

	function set_tacit_like($date, $tacit_id, $user_id){
		$query = mysqli_query($this->conn->koneksi,"INSERT INTO db_tacit_like (like_date, tacit_id, user_id) VALUES ('$date','$tacit_id','$user_id')");
		return $query;
	}

	function set_tacit_unlike($tacit_id, $user_id){
		$query = mysqli_query($this->conn->koneksi,"DELETE FROM db_tacit_like WHERE tacit_id='$tacit_id' AND user_id='$user_id'");
		return $query;
	}

	function get_tacit_name($tacit_id){
		$query = mysqli_query($this->conn->koneksi,"SELECT tacit_name FROM db_tacit WHERE tacit_id='$tacit_id'");
		return $query->fetch_array();
	}

	function editTacit($id, $tacit_name, $tacit_desc){
		$query = mysqli_query($this->conn->koneksi,"UPDATE db_tacit SET tacit_name='$tacit_name', tacit_desc='$tacit_desc' WHERE tacit_id='$id'");
		return $query;
	}


	function tacit_edit_comment($comment_id)
		{
			$query = mysqli_query($this->conn->koneksi, "SELECT * from db_tacit_comment WHERE comment_id = '$comment_id'");
			return $query->fetch_array();
		}

	function tacit_save_comment($comment_id, $comment_desc){
		$query = mysqli_query($this->conn->koneksi, "UPDATE db_tacit_comment SET comment_desc='$comment_desc' WHERE comment_id='$comment_id'");
		return $query;
	}

	function delete_comment($comment_id){
		$query = mysqli_query($this->conn->koneksi, "DELETE FROM db_tacit_comment WHERE comment_id='$comment_id'");
		return $query;
	}

	function tacit_share_to_friend($tanggal, $notif_sender, $notif_isi, $notif_receiver, $type){
		$query_add = mysqli_query ($this->conn->koneksi,
				"INSERT into db_notif (tanggal, notif_sender, notif_isi, notif_receiver, type) 
								VALUES ('$tanggal','$notif_sender','$notif_isi','$notif_receiver','$type')");
			return $query_add;
	}

	function getKnowledgeDetail($tacit_id){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_tacit WHERE tacit_id='$tacit_id'");
			return $query->fetch_array();
	}

	// pengecekan verifikasi knowledge oleh pimpinan terhadap guru

	function tacit_list_mp_teacher($mapel_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_tacit
			INNER JOIN db_mapel ON db_tacit.mapel_id = db_mapel.mapel_id
			INNER JOIN db_user ON db_tacit.user_id = db_user.user_id
			WHERE db_tacit.mapel_id='$mapel_id' AND db_tacit.tacit_status = 'Pending Pimpinan' ");
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

	function tacit_list_all_teacher(){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_tacit
			INNER JOIN db_mapel ON db_tacit.mapel_id = db_mapel.mapel_id
			INNER JOIN db_user ON db_tacit.user_id = db_user.user_id 
			AND db_tacit.tacit_status = 'Pending Pimpinan' ");
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

}
?>