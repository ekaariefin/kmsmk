<?php

include_once('db_connect.php');

class new_user_validation {

	function __construct(){
		$this->conn = new conn();
	}

	function user_list(){
		$data = mysqli_query($this->conn->koneksi,"SELECT user_last_login FROM db_user WHERE user_id = '' ");
		while($row = mysqli_fetch_array($data)){
			$tampil[] = $row;
		}
		return $tampil;
	}
}
?>