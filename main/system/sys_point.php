<?php 

include_once('db_connect.php');

class point {

	function __construct(){
		$this->conn = new conn();
	}

	function count_mypoint ($user_id)
		{	
			$query = mysqli_query($this->conn->koneksi, 
				"SELECT db_point_trans.*, db_point.point_id, db_point.point_name, db_point.point_score, SUM(db_point_trans.total_point) AS total FROM db_point_trans INNER JOIN db_point ON db_point.point_id = db_point_trans.point_id WHERE user_id='$user_id'");
			$row = mysqli_fetch_assoc($query); 
			$sum = $row['total'];
			return $sum;
		}

	function count_shopping ($user_id){
		$query = mysqli_query($this->conn->koneksi, 
				"SELECT db_avatar_trans.*, SUM(db_avatar.avatar_price) AS total_belanja FROM db_avatar_trans INNER JOIN db_avatar ON db_avatar.avatar_id = db_avatar_trans.avatar_id WHERE user_id='$user_id' AND status != 'Free' ");
		$row = mysqli_fetch_assoc($query); 
		$sum = $row['total_belanja'];
		return $sum;
	}

	function count_transfer ($user_id){
		$query = mysqli_query($this->conn->koneksi, 
				"SELECT SUM(total_point) AS total FROM db_point_transfer WHERE user_id='$user_id'");
		$row = mysqli_fetch_assoc($query); 
		$sum = $row['total'];
		return $sum;
	}


	function count_penerimaan ($user_id){
		$query = mysqli_query($this->conn->koneksi, "SELECT SUM(total_point) AS total_penerimaan FROM db_point_transfer WHERE friend_id='$user_id'");
		$row = mysqli_fetch_assoc($query); 
		$sum = $row['total_penerimaan'];
		return $sum;
	}

	function count_total ($total_point, $total_belanja, $total_transfer, $total_penerimaan){
		return ($total_point + $total_penerimaan - $total_belanja - $total_transfer);
	}

	function get_point_score ($point_id){
		$query = mysqli_query($this->conn->koneksi,"SELECT point_score FROM db_point WHERE point_id='$point_id'");
		return $query->fetch_array();
	}

	function get_point_history ($user_id)
	{
		$data = mysqli_query($this->conn->koneksi, "SELECT db_point_trans.*, db_point.point_id, db_point.point_name, db_point.point_score FROM db_point_trans INNER JOIN db_point ON db_point.point_id = db_point_trans.point_id WHERE user_id='$user_id'");
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

	function get_history_penerimaan ($user_id){
		$data = mysqli_query($this->conn->koneksi, "SELECT db_point_transfer.*, db_user.user_name AS nama_pengirim FROM db_point_transfer INNER JOIN db_user ON db_user.user_id = db_point_transfer.user_id WHERE friend_id='$user_id'");
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

	function get_history_transfer ($user_id){
		$data = mysqli_query($this->conn->koneksi, "SELECT db_point_transfer.*, db_user.user_name AS tujuan FROM db_point_transfer INNER JOIN db_user ON db_user.user_id = db_point_transfer.friend_id WHERE db_point_transfer.user_id='$user_id'");
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

	function show_badges(){
		$query = mysqli_query($this->conn->koneksi, "SELECT * FROM db_badges");
		while($row = mysqli_fetch_array($query)){
				$tampil[] = $row;
			}
		if (empty($tampil)){
			return "No Data";
		}
		else{
			return $tampil;
		}
	}

	function leaderboard(){
		$query = mysqli_query($this->conn->koneksi, "SELECT db_point_trans.user_id, db_user.user_name ,SUM(db_point_trans.total_point) AS total_point FROM db_point_trans INNER JOIN db_point ON db_point_trans.point_id = db_point.point_id INNER JOIN db_user ON db_point_trans.user_id = db_user.user_id WHERE db_user.user_role = 'Siswa' GROUP BY db_point_trans.user_id ORDER BY SUM(db_point.point_score) DESC LIMIT 10");
		while($row = mysqli_fetch_array($query)){
				$tampil[] = $row;
			}
		if (empty($tampil)){
			return "No Data";
		}
		else{
			return $tampil;
		}
	}

	function point_detail($point_id){
		$data = mysqli_query($this->conn->koneksi, "SELECT * FROM db_point WHERE point_id='$point_id'");
		return $data->fetch_array();
	}

	function editPointDetail($point_id, $point_score){
		$query = mysqli_query ($this->conn->koneksi,
				"UPDATE db_point SET point_score = '$point_score' WHERE point_id='$point_id'");
		return $query;
	}

	function transferpoint($current_user, $total_transfer, $receiver){
		$query = mysqli_query($this->conn->koneksi,"INSERT INTO db_point_transfer (user_id, total_point, friend_id) VALUES ($current_user, $total_transfer, $receiver)");
		return $query;
	}

	function getBadges($total_point){
		if($total_point >= 0 AND $total_point <= 19){
			echo "level1.png";
		}
		else if($total_point >= 20 AND $total_point <= 49){
			echo "level2.png";
		}
		else if($total_point >= 50 AND $total_point <= 69){
			echo "level3.png";
		}
		else if($total_point >= 70 AND $total_point <= 99){
			echo "level4.png";
		}
		else if($total_point >= 100 AND $total_point <= 149){
			echo "level5.png";
		}
		else if($total_point >= 150 AND $total_point <= 249){
			echo "level6.png";
		}
		else{
			echo "level7.png";
		}
	}

	function getLevel($total_point){
		if($total_point >= 0 AND $total_point <= 19){
			echo "1";
		}
		else if($total_point >= 20 AND $total_point <= 49){
			echo "2";
		}
		else if($total_point >= 50 AND $total_point <= 69){
			echo "3";
		}
		else if($total_point >= 70 AND $total_point <= 99){
			echo "4";
		}
		else if($total_point >= 100 AND $total_point <= 149){
			echo "5";
		}
		else if($total_point >= 150 AND $total_point <= 249){
			echo "6";
		}
		else{
			echo "7";
		}
	}

	function getTitle($total_point){
		if($total_point >= 0 AND $total_point <= 19){
			echo "Pemula";
		}
		else if($total_point >= 20 AND $total_point <= 49){
			echo "Gemar Membantu";
		}
		else if($total_point >= 50 AND $total_point <= 69){
			echo "Ambisius";
		}
		else if($total_point >= 70 AND $total_point <= 99){
			echo "Terpelajar";
		}
		else if($total_point >= 100 AND $total_point <= 149){
			echo "Pakar";
		}
		else if($total_point >= 150 AND $total_point <= 249){
			echo "Si Hebat";
		}
		else{
			echo "Jenius";
		}
	}

	function addPointTacit($tacit_id,$user_id,$point_score){
		$sql = mysqli_query($this->conn->koneksi, "SELECT user_id FROM db_tacit WHERE tacit_id = '$tacit_id'");
		while ($row = $sql->fetch_assoc()) {
		$owner = $row['user_id'];
		date_default_timezone_set('Asia/Jakarta');
		$date = date('d-m-Y H:i:s');

		$query = mysqli_query($this->conn->koneksi, "INSERT INTO db_point_trans (trans_date, point_id, user_id, trans_verified, total_point) VALUES ('$date','10301','$owner','$user_id', '$point_score')");
		}
		return $query;
	}

	function addPointExplicit($explicit_id,$user_id){
		$sql = mysqli_query($this->conn->koneksi, "SELECT user_id FROM db_explicit WHERE explicit_id = '$explicit_id'");
		while ($row = $sql->fetch_assoc()) {
			$owner = $row['user_id'];
			date_default_timezone_set('Asia/Jakarta');
			$date = date('d-m-Y H:i:s');
   			 $query = mysqli_query($this->conn->koneksi, "INSERT INTO db_point_trans (trans_date, point_id, user_id, trans_verified) VALUES ('$date','10302','$owner','$user_id')");
		}
		return $query;
	}

	function addPointRegistered($user_id, $adminid, $total_point){
		date_default_timezone_set('Asia/Jakarta');
		$date = date('d-m-Y H:i:s');
		$query = mysqli_query($this->conn->koneksi, "INSERT INTO db_point_trans (trans_date, point_id, user_id, trans_verified, total_point) VALUES ('$date','10310','$user_id','$adminid','$total_point')");
		return $query;
	}


	function addPointTacitSharing($tacit_id,$user_id){
		$sql = mysqli_query($this->conn->koneksi, "SELECT user_id FROM db_tacit WHERE tacit_id = '$tacit_id'");
		while ($row = $sql->fetch_assoc()) {
			date_default_timezone_set('Asia/Jakarta');
			$date = date('d-m-Y H:i:s');

			$transcation_id = '10309';
			$total_point = mysqli_query($this->conn->koneksi, "SELECT point_score FROM db_point WHERE point_id = '$transcation_id' ");

			foreach($total_point as $row) {
          		$point_gived = $row['point_score'];
      		}

   			$query = mysqli_query($this->conn->koneksi, "INSERT INTO db_point_trans (trans_date, point_id, user_id, trans_verified, total_point) VALUES ('$date','$transcation_id','$user_id','$user_id', '$point_gived')");
		}
		return $query;
	}

	function addPointExplicitSharing($explicit_id,$user_id){
		$sql = mysqli_query($this->conn->koneksi, "SELECT user_id FROM db_explicit WHERE explicit_id = '$explicit_id'");
		while ($row = $sql->fetch_assoc()) {
			date_default_timezone_set('Asia/Jakarta');
			$date = date('d-m-Y H:i:s');

			$transcation_id = '10309';
			$total_point = mysqli_query($this->conn->koneksi, "SELECT point_score FROM db_point WHERE point_id = '$transcation_id' ");

			foreach($total_point as $row) {
          	$point_gived = $row['point_score'];
      	}

   			$query = mysqli_query($this->conn->koneksi, "INSERT INTO db_point_trans (trans_date, point_id, user_id, trans_verified, total_point) VALUES ('$date','$transcation_id','$user_id','$user_id', '$point_gived')");
		}
		return $query;
	}


	function proses_belanja($trans_desc, $avatar_id, $user_id){
		$sql = mysqli_query($this->conn->koneksi, "INSERT INTO db_avatar_trans(trans_desc,avatar_id,user_id) VALUES ('$trans_desc','$avatar_id','$user_id')");
		return $sql;
	}

	function show_void_point($user_id){
		$data = mysqli_query($this->conn->koneksi, "SELECT * FROM db_point_trans INNER JOIN db_point ON db_point_trans.point_id = db_point.point_id WHERE db_point_trans.user_id='$user_id' AND db_point.point_score < 0");
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

	function list_point_config(){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_point");
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

	function add_point_new_user($user_id, $total_point){
		date_default_timezone_set('Asia/Jakarta');
		$date = date('d-m-Y H:i:s');
		$transcation_id = '10310';
		$total_point = mysqli_query($this->conn->koneksi, "SELECT point_score FROM db_point WHERE point_id = '$transcation_id' ");

		foreach($total_point as $row) {
      		$point_gived = $row['point_score'];
		}

		$query = mysqli_query($this->conn->koneksi, "INSERT INTO db_point_trans (trans_date, point_id, user_id, trans_verified, total_point) VALUES ('$date','10310','$user_id','422','$point_gived')");
		return $query;
	}

	function freeLunchStatus($user_id){
		$data = mysqli_query($this->conn->koneksi,"SELECT * FROM db_point_trans WHERE user_id = '$user_id' AND point_id = '10310'");
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
