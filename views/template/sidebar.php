<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?= $nama; ?> <sup><?= $role ?></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
          

            <hr class="sidebar-divider d-none d-md-block">
            

            <?php if($role == "admin") : ?>
            <li class="nav-item <?= $halaman == 'admin' ? 'active' : ''; ?>">
                <a class="nav-link" href="home_admin.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Home</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if($role == "admin") : ?>
            <li class="nav-item <?= $halaman == 'suratmasuk' ? 'active' : ''; ?>">
                <a class="nav-link" href="suratmasuk.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Surat Masuk</span>
                </a>
            </li>
            <?php endif; ?>
            
            <?php if($role == "sekretaris") : ?>
            <li class="nav-item <?= $halaman == 'masuksek' ? 'active' : ''; ?>">
                <a class="nav-link" href="suratmasuk_sekretaris.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Surat Masuk</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if($role == "admin") : ?>
            <li class="nav-item <?= $halaman == 'suratkeluar' ? 'active' : ''; ?>">
                <a class="nav-link" href="suratkeluar.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Surat Keluar</span>
                </a>
            </li>
            <?php endif; ?>
            
            <?php if($role == "sekretaris") : ?>
            <li class="nav-item <?= $halaman == 'luarsek' ? 'active' : ''; ?>">
                <a class="nav-link" href="suratkeluar_sekretaris.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Surat Keluar</span>
                </a>
            </li>
            <?php endif; ?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
