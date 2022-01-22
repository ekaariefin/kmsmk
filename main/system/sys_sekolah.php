<?php

include_once('db_connect.php');

class sekolah
{
    function __construct()
    {
        $this->conn = new conn();
    }

    function show_school()
    {
        $data = mysqli_query($this->conn->koneksi, "SELECT * FROM db_sekolah GROUP BY nama_sekolah");
        while ($row = mysqli_fetch_array($data)) {
            $tampil[] = $row;
        }
        if (empty($tampil)) {
            return "No Data";
        } else {
            return $tampil;
        }
    }

    function school_detail($npsn)
    {
        $data = mysqli_query($this->conn->koneksi, "SELECT * FROM db_sekolah WHERE npsn='$npsn'");
        return $data->fetch_array();
    }

    function add_school($npsn, $nama_sekolah, $status, $alamat, $provinsi, $kota, $kecamatan, $telp, $fax)
    {
        $query =  mysqli_query($this->conn->koneksi, "INSERT INTO db_sekolah (npsn, nama_sekolah, status, alamat, provinsi, kota, kecamatan, telp, fax) VALUES ('$npsn','$nama_sekolah','$status','$alamat','$provinsi','$kota','$kecamatan','$telp','$fax')");
        return $query;
    }

    function get_admin_sekolah($npsn)
    {
        $query = mysqli_query($this->conn->koneksi,"SELECT * FROM db_user WHERE npsn='$npsn' AND user_role='Admin' ORDER BY user_id ASC");
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

    function count_jumlah_siswa($npsn){
        $query = mysqli_query($this->conn->koneksi, "SELECT COUNT(user_id) AS total FROM db_user WHERE npsn = '$npsn' AND user_role = 'Siswa' ");
        $row = mysqli_fetch_assoc($query); 
        $sum = $row['total'];
        return $sum;
    }

    function count_jumlah_guru($npsn){
        $query = mysqli_query($this->conn->koneksi, "SELECT COUNT(user_id) AS total FROM db_user WHERE npsn = '$npsn' AND user_role = 'Guru' ");
        $row = mysqli_fetch_assoc($query); 
        $sum = $row['total'];
        return $sum;
    }

    function count_jumlah_tacit($npsn){
        $query = mysqli_query($this->conn->koneksi, "SELECT COUNT(tacit_id) AS total FROM db_tacit INNER JOIN db_user ON db_tacit.user_id = db_user.user_id INNER JOIN db_sekolah ON db_user.npsn = db_sekolah.npsn WHERE db_sekolah.npsn = '$npsn'");
        $row = mysqli_fetch_assoc($query); 
        $sum = $row['total'];
        return $sum;
    }

    function count_jumlah_explicit($npsn){
        $query = mysqli_query($this->conn->koneksi, "SELECT COUNT(explicit_id) AS total FROM db_explicit INNER JOIN db_user ON db_explicit.user_id = db_user.user_id INNER JOIN db_sekolah ON db_user.npsn = db_sekolah.npsn WHERE db_sekolah.npsn = '$npsn'");
        $row = mysqli_fetch_assoc($query); 
        $sum = $row['total'];
        return $sum;
    }

    function add_new_class($class_grade, $class_name, $npsn_login){
        $query =  mysqli_query($this->conn->koneksi, "INSERT INTO db_class (class_grade, class_name, npsn) VALUES ('$class_grade', '$class_name', '$npsn_login')");
        return $query;
    }

    function class_list($npsn){
        $query = mysqli_query($this->conn->koneksi,"SELECT * FROM db_class WHERE npsn='$npsn' ORDER BY class_grade ASC");
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

    function delete_class($class_id){
        $query = mysqli_query($this->conn->koneksi,"DELETE FROM db_class WHERE class_id = '$class_id'");
        return $query;
    }
}
