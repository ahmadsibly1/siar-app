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
            <li class="nav-item mb-2">
                <a href="index.php" class="nav-link <?php if ($title == 'dashboard') {
                                                        echo 'active';
                                                    } ?>">
                    <i class="nav-icon fas fa-tachometer-alt mr-3"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="biodata.php?page=id" class="nav-link <?php if ($title == 'biodata') {
                                                                    echo 'active';
                                                                } ?>">
                    <i class="nav-icon fas fa-solid fa-users mr-3"></i>
                    <p>
                        Biodata
                    </p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="data-kelompok.php?id_user=<?= $anggota['id_user']; ?>" class="nav-link <?php if ($title == 'kelompok') {
                                                                                                    echo 'active';
                                                                                                } ?>">
                    <i class="nav-icon fas fa-solid fa-user mr-3"></i>
                    <p>
                        Kelompok Arisan
                    </p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="data-pembayaran.php?id_user=<?= $anggota['id_user']; ?>" class="nav-link <?php if ($title == 'pembayaran') {
                                                                                                        echo 'active';
                                                                                                    } ?>">
                    <i class="nav-icon fas fa-solid fa-credit-card mr-3"></i>
                    <p>
                        Pembayaran
                    </p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="data-pembayaran.php?id_user=<?= $anggota['id_user']; ?>" class="nav-link <?php if ($title == 'penerima') {
                                                                                                        echo 'active';
                                                                                                    } ?>">
                    <i class="nav-icon bi bi-wallet-fill mr-3"></i>
                    <p>
                        Bukti Penerima
                    </p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="pages/widgets.html" class="nav-link <?php if ($title == 'undian') {
                                                                    echo 'active';
                                                                } ?>">
                    <i class="nav-icon fas fa-random mr-3"></i>
                    <p>
                        Undian Arisan
                    </p>
                </a>
            </li>
            <li class="nav-item mb-2 menu-open">
                <a href="logout.php" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-arrow-left mr-3" style="color: #f44336;"></i>
                    <p style="color: #f44336;">
                        Logout
                    </p>
                </a>
            </li>
        </ul>
    </nav>

    <!-- /.sidebar-menu -->
</div>