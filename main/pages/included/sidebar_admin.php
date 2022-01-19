    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          $quser = new user();
          $user_get = $quser->user_get_photo($_SESSION['user_id']);
          ?>
          <img src="files/user_photo/<?php echo $user_get['user_photo']; ?>" class="img-circle elevation-2" alt="User Image" style="width: 30px;height: 30px">
        </div>
        <div class="info">
          <a href="admin_detail.php?ex=<?php echo session_id() ?>" class="d-block"><?php echo ucwords(strtolower($_SESSION['user_name'])); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="admin_dashboard.php?ex=<?php echo session_id() ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="show_data_sekolah.php?ex=<?php echo session_id() ?>" class="nav-link">
              <i class="fas fa-school nav-icon"></i>
              <p>Data Sekolah</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="admin_pusat_gurulist.php?ex=<?php echo session_id() ?>" class="nav-link">
              <i class="fas fa-chalkboard-teacher nav-icon"></i>
              <p>Data Guru</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="admin_pusat_userlist.php?ex=<?php echo session_id() ?>" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>Data Siswa</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="point_config.php?ex=<?php echo session_id() ?>" class="nav-link">
              <i class="fa fa-cogs nav-icon"></i>
              <p>Konfigurasi Point</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>