<div class="sidebar ">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-2 mb-3 d-flex">
        <div class="image">
            <img src="../dist/img/logo-siar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM users  WHERE username='$_SESSION[username]'");
        $anggota = mysqli_fetch_array($query);

        ?>
        <div class="info">
            <a href="index.php" class="d-block"><?= $anggota['nama_user']; ?></a>
        </div>
    </div>

    <!-- SidebarSearch Form -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="navbar">
            <li class="nav-item menu-open mb-2">
                <a href="index.php?page=dashboard.php" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt mr-3"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="biodata.php?page=id" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-users mr-3"></i>
                    <p>
                        Biodata
                    </p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="data-kelompok.php" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-user mr-3"></i>
                    <p>
                        Kelompok Arisan
                    </p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="data-pembayaran.php?id_user=<?= $anggota['id_user']; ?>" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-credit-card mr-3"></i>
                    <p>
                        Pembayaran
                    </p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="pages/widgets.html" class="nav-link">
                    <i class="nav-icon fas fa-random mr-3"></i>
                    <p>
                        Undian Arisan
                    </p>
                </a>
            </li>
            <li class="nav-item mb-2" style="background-color: #f44336;">
                <a href="logout.php" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-arrow-left mr-3" style="color: #ffffff;"></i>
                    <p style="color: #ffffff;">
                        Logout
                    </p>
                </a>
            </li>
        </ul>
    </nav>

    <!-- /.sidebar-menu -->
</div>