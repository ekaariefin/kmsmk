<aside class="main-sidebar elevation-4 sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="#" class="brand-link navbar-primary">
        <img src="../../assets/img/diknas.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .9;">
        <span class="brand-text font-weight-light" style="color: white;"><b>KMS SMK TKJ</b></span>
    </a>

    <?php
    $quser = new user();
    $role       = $quser->user_get_role($_SESSION['user_id']);

    if ($role['user_role'] == 'Siswa') {
        include "sidebar_siswa.php";
    } else if ($role['user_role'] == 'Guru') {
        include "sidebar_guru.php";
    } else if ($role['user_role'] == 'Admin Pusat') {
        include "sidebar_admin.php";
    } else if ($role['user_role'] == 'Admin Sekolah') {
        include "sidebar_admin_sekolah.php";
    } else if ($role['user_role'] == 'Pimpinan') {
        include "sidebar_pimpinan.php";
    }

    ?>