<header class="topbar">
        <div class="with-vertical">
            <nav class="navbar navbar-expand-lg p-0">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                </ul>

                <div class="d-block d-lg-none">
                    <a href="#" class="text-nowrap logo-img">
                        <img src="<?= base_url('assets/images/logos/dark-logo.png'); ?>" class="dark-logo" alt="Logo-Dark"/>
                        <img src="<?= base_url('assets/images/logos/light-logo.png'); ?>" class="light-logo" alt="Logo-light"/>
                    </a>
                </div>
                <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="p-2">
                        <i class="ti ti-dots fs-7"></i>
                    </span>
                </a>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                            <i class="ti ti-align-justified fs-7"></i>
                        </a>
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                            <li class="nav-item dropdown">
                                <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <div class="user-profile-img">
                                            <img src="<?= base_url('assets/images/profile/user-1.jpg'); ?>" class="rounded-circle" width="35" height="35" alt=""/>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                                    <div class="profile-dropdown position-relative" data-simplebar>
                                        <div class="py-3 px-7 pb-0">
                                            <h5 class="mb-0 fs-5 fw-semibold"><?= $this->session->userdata('warung'); ?></h5>
                                        </div>
                                        <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                            <img src="<?= base_url('assets/images/profile/user-1.jpg'); ?>" class="rounded-circle" width="80" height="80" alt=""/>
                                            <div class="ms-3">
                                                <h5 class="mb-1 fs-3"><?= $this->session->userdata('warung'); ?></h5>
                                                <span class="mb-1 d-block"><?= $this->session->userdata('akun_level'); ?></span>
                                                <p class="mb-0 d-flex align-items-center gap-2">
                                                    <i class="ti ti-mail fs-4"></i> <?= $this->session->userdata('akun'); ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="message-body">
                                            <a href="#" class="py-8 px-7 mt-8 d-flex align-items-center">
                                                <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                    <img src="<?= base_url('assets/images/svgs/icon-account.svg'); ?>" alt="" width="24" height="24"/>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h6 class="mb-1 fs-3 fw-semibold lh-base">My Profile</h6>
                                                    <span class="fs-2 d-block text-body-secondary">Account Settings</span>
                                                </div>
                                            </a>
                                            <a href="#" class="py-8 px-7 d-flex align-items-center">
                                                <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                    <img src="<?= base_url('assets/images/svgs/icon-inbox.svg'); ?>" alt="" width="24" height="24">
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h6 class="mb-1 fs-3 fw-semibold lh-base">My Inbox</h6>
                                                    <span class="fs-2 d-block text-body-secondary">Messages & Emails</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-grid py-4 px-7 pt-8">
                                            <a href="<?= base_url('autentikasi/logout'); ?>" class="btn btn-outline-primary">Log Out</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>