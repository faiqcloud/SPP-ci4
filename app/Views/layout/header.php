<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <?php if (session()->get('level') == 'admin'): ?>
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?= base_url('admin'); ?>">SPP Gregorius</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin'); ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout'); ?>">Logout</a>
            </li>
        </ul>
    <?php endif; ?>
    <?php if (session()->get('level') == 'user'): ?>
        <a class="navbar-brand ps-3" href="<?= base_url('vuser'); ?>">SPP Gregorius</a>

        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('vuser'); ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('cetak/laporan/' . ($data['idspp'] ?? '') . '/' . ($data['nis'] ?? '')); ?>">Cetak</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout'); ?>">Logout</a>
            </li>
        </ul>
    <?php endif; ?>
</nav>
<?php if (session()->get('level') == 'admin'): ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Laporan Data</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Input Data
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('user'); ?>">Data User</a>
                                <a class="nav-link" href="<?= base_url('guru'); ?>">Data Guru</a>
                                <a class="nav-link" href="<?= base_url('siswa'); ?>">Data Siswa</a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Laporan Pembayaran</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pembayaran
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseSpp" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    SPP
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseSpp" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= base_url('spp'); ?>">SPP</a>
                                        <a class="nav-link" href="<?= base_url('spp/detail'); ?>">Detail SPP</a>
                                    </nav>
                                </div>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseTahunan" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Uang Tahunan
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseTahunan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?= base_url('tahunan'); ?>">Uang Tahunan</a>
                                            <a class="nav-link" href="<?= base_url('tahunan/detail'); ?>">Detail Tahunan</a>
                                        </nav>
                                    </div>
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapsePangkal" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                            Uang Pangkal
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="pagesCollapsePangkal" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="<?= base_url('pangkal'); ?>">Uang Pangkal</a>
                                                <a class="nav-link" href="<?= base_url('pangkal/detail'); ?>">Detail Uang Pangkal</a>

                                            </nav>
                                        </div>
                                    </nav>
                                </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        <?php endif; ?>
        </div>
        <div id="layoutSidenav_content">