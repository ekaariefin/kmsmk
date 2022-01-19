    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          $quser = new user();
          $user_get = $quser->user_get_photo($_SESSION['user_id']);

          include_once('../system/sys_point.php');
          $qpoint = new point();

          $total_point =  $qpoint->count_mypoint($_SESSION['user_id']);
          $total_belanja =  $qpoint->count_shopping($_SESSION['user_id']);
          $total_transfer =  $qpoint->count_transfer($_SESSION['user_id']);
          $total_penerimaan = $qpoint->count_penerimaan($_SESSION['user_id']);
          $total_keseluruhan =  $qpoint->count_total($total_point, $total_belanja, $total_transfer, $total_penerimaan);
          ?>
          <img src="files/user_photo/<?php echo $user_get['user_photo']; ?>" class="img-circle elevation-2" alt="User Image" style="width: 50px;height: 50px">
        </div>
        <div class="info">
          <a href="my_detail.php?ex=<?php echo session_id() ?>" class="d-block"><?php echo ucwords(strtolower($_SESSION['user_name'])); ?></a>
          <small>
            <?php echo $total_keseluruhan ?> Pts /

            <?php
            if ($total_point + $total_penerimaan >= 0 and $total_point + $total_penerimaan <= 19) {
              echo '<b>Pemula</b>';
            } else if ($total_point + $total_penerimaan >= 20 and $total_point + $total_penerimaan <= 49) {
              echo '<b>Gemar Membantu</b>';
            } else if ($total_point + $total_penerimaan >= 50 and $total_point + $total_penerimaan <= 69) {
              echo '<b>Ambisius</b>';
            } else if ($total_point + $total_penerimaan >= 70 and $total_point + $total_penerimaan <= 99) {
              echo '<b>Terpelajar</b>';
            } else if ($total_point + $total_penerimaan >= 100 and $total_point + $total_penerimaan <= 149) {
              echo '<b>Pakar</b>';
            } else if ($total_point + $total_penerimaan >= 150 and $total_point + $total_penerimaan <= 249) {
              echo '<b>Si Hebat</b>';
            } else {
              echo '<b>Jenius</b>';
            }
            ?>

          </small>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="student_dashboard.php?ex=<?php echo session_id() ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user-cog"></i>
              <p>
                Akun Saya
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="my_point.php?ex=<?php echo session_id() ?>" class="nav-link">
                  <i class="fa fa-coins nav-icon"></i>
                  <p>Point Saya</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="my_avatar.php?ex=<?php echo session_id() ?>" class="nav-link">
                  <i class="fa fa-user-ninja nav-icon"></i>
                  <p>Avatar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="my_badges.php?ex=<?php echo session_id() ?>" class="nav-link">
                  <i class="fa fa-ribbon nav-icon"></i>
                  <p>Badges</p>
                </a>
              </li>
            </ul>
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
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                My Knowledge
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="my_tacit.php?ex=<?php echo session_id() ?>" class="nav-link">
                  <i class="fa fa-file-alt nav-icon"></i>
                  <p>Tacit Knowledge</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="my_explicit.php?ex=<?php echo session_id() ?>" class="nav-link">
                  <i class="fa fa-file-archive nav-icon"></i>
                  <p>Explicit Knowledge</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-gamepad"></i>
              <p>
                Game Elements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="store.php?ex=<?php echo session_id() ?>" class="nav-link">
                  <i class="fa fa-shopping-bag nav-icon"></i>
                  <p>Store</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="my_friends.php?ex=<?php echo session_id() ?>" class="nav-link">
                  <i class="fa fa-user-plus nav-icon"></i>
                  <p>Friends</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="my_group.php?ex=<?php echo session_id() ?>" class="nav-link">
                  <i class="fa fa-user-friends nav-icon"></i>
                  <p>Group</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="my_missions.php?ex=<?php echo session_id() ?>" class="nav-link">
                  <i class="fa fa-bullseye nav-icon"></i>
                  <p>Missions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="my_point_transfer.php?ex=<?php echo session_id() ?>" class="nav-link">
                  <i class="fa fa-exchange-alt nav-icon"></i>
                  <p>Transfer Point</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="my_void_history.php?ex=<?php echo session_id() ?>" class="nav-link">
                  <i class="fa fa-history nav-icon"></i>
                  <p>Void History</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="notification.php?ex=<?php echo session_id() ?>" class="nav-link">
              <i class="fa fa-bell nav-icon"></i>
              <p>
                Notification
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>