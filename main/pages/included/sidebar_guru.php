    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          $quser = new user();
          $user_get = $quser->user_get_photo($_SESSION['user_id']);
          ?>
          <img src="files/user_photo/<?php echo $user_get['user_photo']; ?>" class="img-circle elevation-2" alt="User Image" style="width: 30px;height: 30px">
        </div>
        <div class="info">
          <a href="teacher_detail.php?ex=<?php echo session_id() ?>" class="d-block"><?php echo ucwords(strtolower($_SESSION['user_name'])); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="teacher_dashboard.php?ex=<?php echo session_id() ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="leaderboard.php?ex=<?php echo session_id() ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Leaderboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="search.php?ex=<?php echo session_id() ?>" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Pencarian
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Knowledge Database
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="all_tacit.php?ex=<?php echo session_id() ?>" class="nav-link">
                  <i class="fa fa-file-alt nav-icon"></i>
                  <p>Tacit Knowledge</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="all_explicit.php?ex=<?php echo session_id() ?>" class="nav-link">
                  <i class="fa fa-file-archive nav-icon"></i>
                  <p>Explicit Knowledge</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Tambah Knowledge
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_tacit_teacher.php?ex=<?php echo session_id() ?>" class="nav-link">
                  <i class="fa fa-file-alt nav-icon"></i>
                  <p>Tacit Knowledge</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="add_explicit_teacher.php?ex=<?php echo session_id() ?>" class="nav-link">
                  <i class="fa fa-file-archive nav-icon"></i>
                  <p>Explicit Knowledge</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="admin_show_pend_tacit.php?ex=<?php echo session_id() ?>" class="nav-link">
              <i class="fa fa-file-alt nav-icon"></i>
              <p>Tacit Pending</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin_show_pend_explicit.php?ex=<?php echo session_id() ?>" class="nav-link">
              <i class="fa fa-file-archive nav-icon"></i>
              <p>Explicit Pending</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="teacher_group_control.php?ex=<?php echo session_id() ?>" class="nav-link">
              <i class="fa fa-users nav-icon"></i>
              <p>Group Control</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="teacher_mission_control.php?ex=<?php echo session_id() ?>" class="nav-link">
              <i class="fa fa-bullseye nav-icon"></i>
              <p>Mission Control</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>