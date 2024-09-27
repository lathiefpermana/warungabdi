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
        <!-- Preloader -->
        <div class="preloader">
            <img src="<?= base_url('assets/images/logos/favicon.png'); ?>" alt="loader" class="lds-ripple img-fluid" />
        </div>
        <div id="main-wrapper">
            <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
                <div class="d-flex align-items-center justify-content-center w-100">
                    <div class="row justify-content-center w-100">
                        <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
                            <div class="card mb-0">
                                <div class="card-body pt-5">
                                    <a href="<?= base_url(); ?>" class="text-nowrap logo-img text-center d-block mb-4 w-100">
                                        <img src="../assets/images/logos/dark-logo.svg" class="dark-logo" alt="Logo-Dark" />
                                        <img src="../assets/images/logos/light-logo.svg" class="light-logo" alt="Logo-light" />
                                    </a>
                                    <div class="mb-5 text-center">
                                        <p class="mb-0 ">   
                                            Masukan email anda, kami akan mengirimkan tautan untuk mengatur ulang sandi akun anda.
                                        </p>
                                    </div>
                                    <form method="post" action="<?= base_url('autentikasi/permintaan_sandi'); ?>" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Akun / Alamat email</label>
                                            <input type="email" class="form-control" name="akun" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100 py-8 mb-3">Lupa sandi</button>
                                        <a href="<?= base_url(); ?>" class="btn bg-primary-subtle text-primary w-100 py-8">Kembali</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dark-transparent sidebartoggler"></div>
        <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/app.min.js');?>"></script>
        <script src="<?= base_url('assets/js/app.init.js'); ?>"></script>
        <script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
        <script src="<?= base_url('assets/libs/simplebar/dist/simplebar.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/sidebarmenu.js'); ?>"></script>
        <script src="<?= base_url('assets/js/theme.js'); ?>"></script>
    </body>
</html>