<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="Warung Abdi" name="description" />
        <meta content="alathiefpermana@gmail.com" name="author" />
        <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/images/logos/favicon.png'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/styles.css'); ?>" />
        <title>Warung Abdi</title>
    </head>
    <body>
        <?php if($this->session->flashdata('error')){ ?>
            <div class="toast toast-onload align-items-center toast-error border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body hstack align-items-start gap-6">
                    <i class="ti ti-alert-circle fs-6"></i>
                    <div>
                        <h5 class="text-white fs-3 mb-1"><?= $this->session->flashdata('error'); ?></h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white fs-2 m-0 ms-auto shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        <?php } ?>
        <div class="preloader">
            <img src="<?= base_url('assets/images/logos/favicon.png'); ?>" alt="loader" class="lds-ripple img-fluid">
        </div>
        <div id="main-wrapper">
            <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
                <div class="d-flex align-items-center justify-content-center w-100">
                    <div class="row justify-content-center w-100">
                        <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <a href="#" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                                        <img src="<?= base_url('assets/images/logos/dark-logo.svg'); ?>" class="dark-logo" alt="Logo-Dark" />
                                        <img src="<?= base_url('assets/images/logos/light-logo.svg'); ?>" class="light-logo" alt="Logo-light" />
                                    </a>
                                    <form method="post" action="<?= base_url('autentikasi/login_lisensi'); ?>" enctype="multipart/form-data">
                                        <div class="mb-3" hidden>
                                            <label class="form-label">Lisensi</label>
                                            <input type="text" name="lisensi" class="form-control" value="<?= $akun['lisensi']; ?>" readonly>
                                        </div>
                                        <div class="mb-3" hidden>
                                            <label class="form-label">Akun</label>
                                            <input type="text" name="akun" class="form-control" value="<?= $akun['akun']; ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Akun</label>
                                            <p><?= $akun['akun']; ?></p>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Sandi</label>
                                            <input type="password" name="sandi" class="form-control" placeholder="Sandi Akun">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Lisensi</label>
                                            <p><?= 'Lisensi sampai '.$akun['tanggal_kadaluarsa']; ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Lisensi</label>
                                            <p><?= 'Status '.$akun['status_aktif']; ?></p>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                                        <div class="mb3 text-center">
                                            <a href="<?= base_url('autentikasi/delete_cookie'); ?>">bukan kamu?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/app.min.js');?>"></script>
        <script src="<?= base_url('assets/js/app.init.js'); ?>"></script>
        <script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
        <script src="<?= base_url('assets/libs/simplebar/dist/simplebar.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/sidebarmenu.js'); ?>"></script>
        <script src="<?= base_url('assets/js/theme.js'); ?>"></script>
    </body>
</html>