<div class="sidebar ">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-2 mb-3 d-flex">
        <div class="image">
            <img src="../dist/img/logo-siar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="." class="d-block">Admin</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="navbar">
            <li class="nav-item mb-2">
                <a href="." class="nav-link <?php if ($title == 'home') {
                                                echo 'active';
                                            } ?>">
                    <i class="nav-icon fas fa-tachometer-alt mr-3"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="data-anggota.php" class="nav-link <?php if ($title == 'Data Anggota') {
                                                                echo 'active';
                                                            } ?>">
                    <i class="nav-icon fas fa-solid fa-user mr-3"></i>
                    <p>
                        Data Anggota
                    </p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="" class="nav-link <?php if ($title == 'Data Kelompok') {
                                                echo 'active';
                                            } ?>">
                    <i class="nav-icon fas fa-solid fa-users mr-3"></i>
                    <p>
                        Data Kelompok
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item menu-open">
                        <a href="data-kelompok.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kelompok Aktif</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="antrian-kelompok.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Antrian Kelompok</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item mb-2">
                <a href="" class="nav-link <?php if ($title == 'Data transaksi') {
                                                echo 'active';
                                            } ?>">
                    <i class="nav-icon fas fa-solid fa-money-check-dollar mr-3"></i>
                    <p>
                        Data Transaksi
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item mb-2">
                        <a href="data-tagihan.php" class="nav-link <?php if ($title2 == 'Data tagihan') {
                                                                        echo 'active';
                                                                    } ?>">
                            <i class="far fa-circle nav-icon mr-3"></i>
                            <p>
                                Data Tagihan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="pembayaran.php" class="nav-link <?php if ($title2 == 'Data pembayaran') {
                                                                        echo 'active';
                                                                    } ?>">
                            <i class="far fa-circle nav-icon mr-3"></i>
                            <p>
                                Data Pembayaran
                            </p>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="data-penerima.php" class="nav-link <?php if ($title2 == 'Data penerima') {
                                                                        echo 'active';
                                                                    } ?>">
                            <i class="far fa-circle nav-icon mr-3"></i>
                            <p>
                                Data Penerima
                            </p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item mb-2">
                <a href="undian.php" class="nav-link <?php if ($title == 'Undian Arisan') {
                                                            echo 'active';
                                                        } ?>">
                    <i class="nav-icon fas fa-random mr-3"></i>
                    <p>
                        Undian Arisan
                    </p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="saldo.php" class="nav-link <?php if ($title == 'Saldo') {
                                                        echo 'active';
                                                    } ?>">
                    <i class="nav-icon fas fa-solid fa-dollar-sign mr-3"></i>
                    <p>
                        Saldo
                    </p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="laporan.php" class="nav-link <?php if ($title == 'Laporan') {
                                                            echo 'active';
                                                        } ?>">
                    <i class="nav-icon fas fa-solid fa-book mr-3"></i>
                    <p>
                        Laporan
                    </p>
                </a>
            </li>
            <li class="nav-item mb-2 menu-open">
                <a href="logout.php" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-arrow-left mr-3" style="color:#f44336;"></i>
                    <p style="color:#f44336;">
                        Logout
                    </p>
                </a>
            </li>

        </ul>
    </nav>

    <!-- /.sidebar-menu -->
</div>