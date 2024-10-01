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
            <div class="position-relative overflow-hidden min-vh-100 w-100 d-flex align-items-center justify-content-center">
                <div class="d-flex align-items-center justify-content-center w-100">
                    <div class="row justify-content-center w-100">
                        <div class="col-lg-4">
                            <div class="text-center">
                                <img src="/assets/images/backgrounds/maintenance.svg" alt="" class="img-fluid" width="500">
                                <h1 class="fw-semibold my-7 fs-9">Maintenance Mode!!!</h1>
                                <h4 class="fw-semibold mb-7">Website is Under Construction. Check back later!</h4>
                                <a class="btn btn-primary" href="../main/index.html" role="button">Go Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dark-transparent sidebartoggler"></div>
        <!-- Import Js Files -->
        <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/app.min.js');?>"></script>
        <script src="<?= base_url('assets/js/app.init.js'); ?>"></script>
        <script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
        <script src="<?= base_url('assets/libs/simplebar/dist/simplebar.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/sidebarmenu.js'); ?>"></script>
        <script src="<?= base_url('assets/js/theme.js'); ?>"></script>
    </body>
</html>