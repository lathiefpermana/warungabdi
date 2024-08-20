<aside class="left-sidebar with-vertical">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="<?= base_url(); ?>" class="text-nowrap logo-img">
                <img src="<?= base_url('assets/images/logos/dark-logo.svg'); ?>" class="dark-logo" alt="Logo-Dark"/>
                <img src="<?= base_url('assets/images/logos/light-logo.svg'); ?>" class="light-logo" alt="Logo-light"/>
            </a>
            <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none" >
                <i class="ti ti-x"></i>
            </a>
        </div>

        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Sistem</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('dasbor'); ?>" aria-expanded="false">
                        <span><i class="ti ti-aperture"></i></span>
                        <span class="hide-menu">Dasbor</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('penjualan'); ?>" aria-expanded="false">
                        <span><i class="ti ti-shopping-bag"></i></span>
                        <span class="hide-menu">Penjualan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('produk/daftar_harga'); ?>" aria-expanded="false">
                        <span><i class="ti ti-tag"></i></span>
                        <span class="hide-menu">Daftar Harga</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('produk'); ?>" aria-expanded="false">
                        <span><i class="ti ti-package"></i></span>
                        <span class="hide-menu">Produk</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('barang_masuk'); ?>" aria-expanded="false">
                        <span><i class="ti ti-package-import"></i></span>
                        <span class="hide-menu">Barang Masuk</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('pemasok'); ?>" aria-expanded="false">
                        <span><i class="ti ti-users"></i></span>
                        <span class="hide-menu">Pemasok</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-building-warehouse"></i>
                        </span>
                        <span class="hide-menu">Gudang</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="<?= base_url('gudang') ?>" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Stok</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('gudang/stock_opname'); ?>" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"><i>Stock Opname</i></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-table-alias"></i>
                        </span>
                        <span class="hide-menu">Data</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="<?= base_url('penjualan/data') ?>" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Data Penjualan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('barang_masuk/data'); ?>" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Data Barang Masuk</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-report"></i>
                        </span>
                        <span class="hide-menu">Laporan</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="<?= base_url('laporan/penjualan') ?>" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Laporan Penjualan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('laporan/barang_masuk'); ?>" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Laporan Barang Masuk</span>
                            </a>
                        </li>
                    </ul>
                </li>
                

            </ul>
        </nav>

        <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <img src="<?= base_url('assets/images/profile/user-1.jpg'); ?>" class="rounded-circle" width="40" height="40" alt="" />
                </div>
                <div class="john-title">
                    <h6 class="mb-0 fs-2 fw-semibold"><?= $this->session->userdata('warung'); ?></h6>
                    <span class="fs-1"><?= $this->session->userdata('akun_level'); ?></span>
                </div>
                <a href="<?= base_url('autentikasi/logout'); ?>" class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                    <i class="ti ti-power fs-6"></i>
                </a>
            </div>
        </div>
    </div>
</aside>
