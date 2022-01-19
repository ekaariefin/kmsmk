<?php
session_start();
// error_reporting(0);
include_once('security/session_check.php');
include_once('../system/sys_sekolah.php');
$qsekolah = new sekolah();
$uid = $_SESSION['user_id'];
$npsn = $_GET['npsn'];
if (!is_null($npsn)) {
    $qsekolah_detail = $qsekolah->school_detail($npsn);
} else {
    header('location: show_data_sekolah.php?ex=' . $session_id() . '');
}
?>

<!DOCTYPE html>
<html>
<?php include 'included/head.php'; ?>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <?php
        include 'included/navbar.php';
        include 'included/sidebar.php';
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header" style="margin-bottom: -15px">
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <!-- Default box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Tentang Sekolah</h3>
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered" style="margin-bottom: 30px">
                                <tbody>
                                    <tr>
                                        <div style="position: relative; float:right; margin-bottom: 10px">
                                            <a href="admin_edit_gurudetail.php?id=<?php echo $uid; ?>&ex=<?php echo session_id() ?>" type="button" class="btn btn-sm btn-primary" style="width: 90px"><i class="far fa-edit" style="margin-right: 5px"></i> Edit</a>
                                            <a href="admin_show_gurudetail.php?id=<?php echo $uid; ?>&ex=<?php echo session_id() ?>&delUser=<?php echo $uid; ?>" type="button" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus akun ini ?')" style="width: 100px"><i class="far fa-trash-alt" style="margin-right: 5px"></i> Delete</a>
                                            </a>
                                        </div>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%;">NPSN</td>
                                        <td style="width: 50%;"><?php echo $qsekolah_detail['npsn']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Sekolah</td>
                                        <td><?php echo $qsekolah_detail['nama_sekolah']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td><?php echo $qsekolah_detail['status']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><?php echo $qsekolah_detail['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Provinsi</td>
                                        <td><?php echo $qsekolah_detail['provinsi']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kota</td>
                                        <td><?php echo $qsekolah_detail['kota']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td><?php echo $qsekolah_detail['kecamatan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td><?php echo $qsekolah_detail['telp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fax</td>
                                        <td><?php echo $qsekolah_detail['fax']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <h5>Administrator</h5>
                            <table class="table table-bordered" style="margin-bottom: 30px">
                                <tr>
                                        <div style="position: relative; float:right; margin-bottom: 10px">
                                            <a href="add_new_admin.php?ex=<?php echo session_id() ?>&npsn=<?php echo $qsekolah_detail['npsn']; ?>" type="button" class="btn btn-sm btn-primary" style="width: 90px"><i class="fas fa-plus" style="margin-right: 5px"></i> Tambah</a>
                                        </div>
                                    </tr>
                                <tbody>
                                    <tr>
                                        <td><center>NIP/NIPUS/ID</center></td>
                                        <td><center>Nama Administrator</center></td>
                                        <td><center>Kelola</center></td>
                                    </tr>
                                    <?php
                                        if($qsekolah->get_admin_sekolah($npsn) == "No Data"){
                                         echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
                                        }
                                        else{
                                          $adminlist = $qsekolah->get_admin_sekolah($npsn);
                                          foreach($adminlist as $admin) {
                                    ?>
                                    <tr>
                                        <td><center><?= $admin['user_id']; ?></center></td>
                                        <td><?= $admin['user_name']; ?></td>
                                        <td></td>
                                    </tr>
                                <?php }} ?>
                                </tbody>
                            </table>
                            <hr>
                            <h5>Statistic</h5>
                            <table class="table table-bordered" style="margin-bottom: 30px">
                                <tbody>
                                    <tr>
                                        <td width="30%">Jumlah Siswa</td>
                                        <td><?php echo $qsekolah->count_jumlah_siswa($npsn); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Guru</td>
                                        <td><?php echo $qsekolah->count_jumlah_guru($npsn); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Knowledge (Tacit)</td>
                                        <td><?php echo $qsekolah->count_jumlah_tacit($npsn); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Knowledge (Explicit)</td>
                                        <td><?php echo $qsekolah->count_jumlah_explicit($npsn); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Knowledge</td>
                                        <td><?php echo $qsekolah->count_jumlah_tacit($npsn) + $qsekolah->count_jumlah_explicit($npsn) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    </tr>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include 'included/footer.php'; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>

    <!-- Modal Sharing-->
    <div class="modal fade" id="myModal<?php echo $qexplicit_show['explicit_id']; ?>" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Bagikan Pengetahuan</h4>
                </div>
                <div class="modal-body">
                    <div class="callout callout-success">
                        <small>Potensi penambahan point sebanyak +3 Point dengan membagikan pengetahuan</small>
                    </div>

                    <center>
                        <!-- <img src="<?php echo $qrcode; ?>" alt="KMS TKJ SMKN 2 PLG"> -->
                        <p>
                            <center><?php echo $base; ?></center>
                        </p>
                    </center>

                    <p>bagikan dengan teman anda</p>
                    <form action="" method="POST">
                        <?php
                        $user_friend = $quser->list_friend($_SESSION['user_id']);
                        ?>
                        <select class="form-control" name="share_to_friend" style="margin-bottom: 15px;" required>
                            <option disabled readonly selected>--Pilih Teman--</option>
                            <?php
                            foreach ($user_friend as $row) {
                            ?>
                                <option value="<?php echo $row['friend_id']; ?>"><?php echo ucwords(strtolower($row['user_name'])) ?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="km_id" value="<?php echo $_GET['id']; ?>">
                        <input type="submit" class="btn btn-success" value="Bagikan" name="sendTag">
                    </form>
                </div>
            </div>
</body>

</html>