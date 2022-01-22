<?php 
include_once('db_connect.php');

class mapel {
	function __construct(){
		$this->conn = new conn();
	}

	function show_mapel($npsn){
		$data = mysqli_query($this->conn->koneksi,"SELECT mapel_id,mapel_name FROM db_mapel WHERE npsn = '$npsn' ORDER BY mapel_name ASC");
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

	function mapel_edit ($mapel_id, $mapel_name)
		{
			$query_edit = mysqli_query ($this->conn->koneksi,
				"UPDATE db_mapel SET mapel_name = '$mapel_name'	WHERE mapel_id = '$mapel_id'");
			return $query_edit;
		}

	function add_new_mapel($mapel_name, $mapel_desc, $npsn){
		$query = mysqli_query($this->conn->koneksi,"INSERT INTO db_mapel (mapel_name, mapel_desc, npsn) VALUES ('$mapel_name','$mapel_desc','$npsn')");
		return $query;
	}
}