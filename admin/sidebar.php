<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="images/logo.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="dashboard.php" class="d-block">Admin</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!--<li class="nav-item">-->
          <!--<a href="index.php" class="nav-link <?= $currentPage == 'index.php' ? 'active' : '' ?>">-->
        <!--    <i class="nav-icon fas fa-tachometer-alt"></i>-->
        <!--    <p>Dashboard</p>-->
        <!--  </a>-->
        <!--</li>-->
        <li class="nav-item">
          <a href="gallerytable.php" class="nav-link <?= $currentPage == 'gallery.php' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>Gallery</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="table.php" class="nav-link <?= $currentPage == 'table.php' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>Slider Image</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="annoucetable.php" class="nav-link <?= $currentPage == 'annoucetable.php' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>Announcements</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="achievtable.php" class="nav-link <?= $currentPage == 'achievtable.php' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>Achievement</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="eventable.php" class="nav-link <?= $currentPage == 'eventable.php' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>Events</p>
          </a>
        </li>
                <li class="nav-item">
          <a href="contactable.php" class="nav-link <?= $currentPage == 'contactable.php' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>Contact Query</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="imagetable.php" class="nav-link <?= $currentPage == 'imagetable.php' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>Fixed Images</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="news_table.php" class="nav-link <?= $currentPage == 'news_table.php' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-edit"></i>
            <p>News</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="nav-link <?= $currentPage == 'logout.php' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
