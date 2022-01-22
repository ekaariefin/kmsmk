<?php 

include_once('db_connect.php');

class explicit {

	function __construct(){
		$this->conn = new conn();
	}

	function explicit_add ($explicit_name, $explicit_desc, $explicit_date, $explicit_status, $explicit_source, $explicit_file, $user_id, $mapel_id)
		{	
			$query_add = mysqli_query ($this->conn->koneksi,
				"INSERT into db_explicit (explicit_name, explicit_desc, explicit_date, explicit_source, explicit_status, explicit_file, user_id, mapel_id) VALUES ('$explicit_name','$explicit_desc','$explicit_date','$explicit_source','$explicit_status','$explicit_file','$user_id','$mapel_id')");
			return $query_add;
		}

	function explicit_edit ($explicit_id, $explicit_name, $explicit_desc, $tags_id)
		{
			$query_edit = mysqli_query ($this->conn->koneksi,
				"UPDATE db_explicit SET explicit_name = '$explicit_name', explicit_desc = '$explicit_desc', tags_id = '$tags_id' 
						WHERE explicit_id = '$explicit_id'");
			return $query_edit;
		}

	function explicit_delete ($explicit_id)
		{
			$query_delete = mysqli_query ($this->conn->koneksi,
				"DELETE FROM db_explicit WHERE explicit_id = '$explicit_id'");
			return $query_delete;
		}

	function explicit_list()
		{
			$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_explicit
				INNER JOIN db_mapel ON db_explicit.mapel_id = db_mapel.mapel_id
				INNER JOIN db_user ON db_explicit.user_id = db_user.user_id WHERE explicit_status = 'Approve'");
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

	function explicit_list_select_mp($mapel_id)
		{
			$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_explicit 
			INNER JOIN db_mapel ON db_explicit.mapel_id = db_mapel.mapel_id
			INNER JOIN db_user ON db_explicit.user_id = db_user.user_id
			WHERE db_explicit.mapel_id='$mapel_id' AND db_explicit.explicit_status = 'Approve' ");
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


	function explicit_list_all($npsn)
		{
			$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_explicit INNER JOIN db_mapel ON db_explicit.mapel_id = db_mapel.mapel_id INNER JOIN db_user ON db_explicit.user_id = db_user.user_id WHERE db_explicit.explicit_status = 'Pending' AND db_user.npsn = '$npsn'");
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


	function explicit_list_mp($mapel_id, $npsn){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_explicit
			INNER JOIN db_mapel ON db_explicit.mapel_id = db_mapel.mapel_id
			INNER JOIN db_user ON db_explicit.user_id = db_user.user_id
			WHERE db_explicit.mapel_id='$mapel_id' AND db_explicit.explicit_status = 'Pending' AND db_user.npsn = '$npsn'");
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
	function my_explicit_list($user_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_explicit
		INNER JOIN db_mapel ON db_explicit.mapel_id = db_mapel.mapel_id WHERE user_id = '$user_id'");
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
	function my_explicit_list_select_mp($mapel_id, $user_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_explicit 
			INNER JOIN db_mapel ON db_explicit.mapel_id = db_mapel.mapel_id
			WHERE db_explicit.mapel_id='$mapel_id' AND user_id = '$user_id' ");
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

	function user_explicit_list($user_id)
		{
			$query = mysqli_query($this->conn->koneksi,"SELECT explicit_id, explicit_name FROM db_explicit WHERE user_id = '$user_id'");
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


	function explicit_detail($explicit_id)
		{
			$query = mysqli_query($this->conn->koneksi,"SELECT * from db_explicit 
				INNER JOIN db_mapel ON db_explicit.mapel_id = db_mapel.mapel_id 
				INNER JOIN db_user ON db_explicit.user_id = db_user.user_id 
				where explicit_id='$explicit_id'");
			return $query->fetch_array();
		}

	function show_explicit_comment($explicit_id)
		{
			$data = mysqli_query ($this->conn->koneksi, "SELECT * FROM db_explicit_comment 
			INNER JOIN db_user ON db_explicit_comment.user_id = db_user.user_id
			WHERE explicit_id = '$explicit_id' ORDER BY comment_date ASC");
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

	function tacit_share_to_friend($tanggal, $notif_sender, $notif_isi, $notif_receiver, $type){
		$query_add = mysqli_query ($this->conn->koneksi,
				"INSERT into db_notif (tanggal, notif_sender, notif_isi, notif_receiver, type) 
								VALUES ('$tanggal','$notif_sender','$notif_isi','$notif_receiver','$type')");
			return $query_add;
	}
	
	function add_explicit_comment($comment_date, $user_id, $explicit_id, $comment_desc){
		$query_add = mysqli_query ($this->conn->koneksi,
				"INSERT into db_explicit_comment (comment_date, user_id, explicit_id, comment_desc) 
								VALUES ('$comment_date','$user_id','$explicit_id', '$comment_desc')");
			return $query_add;
	}

	function setApproval($explicit_id){
		$query = mysqli_query ($this->conn->koneksi,
				"UPDATE db_explicit SET explicit_status = 'Approve' WHERE explicit_id='$explicit_id'");
		return $query;
	}

	function setReject($explicit_id){
		$query = mysqli_query ($this->conn->koneksi,
				"UPDATE db_explicit SET explicit_status = 'Reject' WHERE explicit_id='$explicit_id'");
		return $query;
	}

	function count_explicit_like($explicit_id){
		$query = mysqli_query($this->conn->koneksi,"SELECT * FROM db_explicit_like WHERE explicit_id='$explicit_id'");
		$hitung = mysqli_num_rows($query);
		return $hitung;
	}

	function count_explicit_comment($explicit_id){
		$query = mysqli_query($this->conn->koneksi,"SELECT * FROM db_explicit_comment WHERE explicit_id='$explicit_id'");
		$hitung = mysqli_num_rows($query);
		return $hitung;
	}

	function check_user_liked($explicit_id, $user_id){
		$query = mysqli_query($this->conn->koneksi,"SELECT * FROM db_explicit_like WHERE explicit_id='$explicit_id' AND user_id='$user_id'");
		$hitung = mysqli_num_rows($query);
		return $hitung;
	}

	function set_explicit_like($date, $explicit_id, $user_id){
		$query = mysqli_query($this->conn->koneksi,"INSERT INTO db_explicit_like (like_date, explicit_id, user_id) VALUES ('$date','$explicit_id','$user_id')");
		return $query;
	}

	function set_explicit_unlike($explicit_id, $user_id){
		$query = mysqli_query($this->conn->koneksi,"DELETE FROM db_explicit_like WHERE explicit_id='$explicit_id' AND user_id='$user_id'");
		return $query;
	}

	function get_explicit_name($explicit_id){
		$query = mysqli_query($this->conn->koneksi,"SELECT explicit_name FROM db_explicit WHERE explicit_id='$explicit_id'");
		return $query->fetch_array();
	}

	function editExplicit($id, $explicit_name, $explicit_desc){
		$query = mysqli_query($this->conn->koneksi,"UPDATE db_explicit SET explicit_name='$explicit_name', explicit_desc='$explicit_desc' WHERE explicit_id='$id'");
		return $query;
	}

	function explicit_edit_comment($comment_id)
		{
			$query = mysqli_query($this->conn->koneksi, "SELECT * from db_explicit_comment WHERE comment_id = '$comment_id'");
			return $query->fetch_array();
		}

	function explicit_save_comment($comment_id, $comment_desc){
		$query = mysqli_query($this->conn->koneksi, "UPDATE db_explicit_comment SET comment_desc='$comment_desc' WHERE comment_id='$comment_id'");
		return $query;
	}

	function delete_comment($comment_id){
		$query = mysqli_query($this->conn->koneksi, "DELETE FROM db_explicit_comment WHERE comment_id='$comment_id'");
		return $query;
	}

// pengecekan verifikasi knowledge oleh pimpinan terhadap guru

	function explicit_list_mp_teacher($mapel_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_explicit
			INNER JOIN db_mapel ON db_explicit.mapel_id = db_mapel.mapel_id
			INNER JOIN db_user ON db_explicit.user_id = db_user.user_id
			WHERE db_explicit.mapel_id='$mapel_id' AND db_explicit.explicit_status = 'Pending Pimpinan' ");
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

	function explicit_list_all_teacher(){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_explicit
			INNER JOIN db_mapel ON db_explicit.mapel_id = db_mapel.mapel_id
			INNER JOIN db_user ON db_explicit.user_id = db_user.user_id 
			AND db_explicit.explicit_status = 'Pending Pimpinan' ");
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