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
                                        <img src="<?= base_url('assets/images/logos/dark-logo.svg'); ?>" class="dark-logo" alt="Logo-Dark" />
                                        <img src="<?= base_url('assets/images/logos/light-logo.svg'); ?>" class="light-logo" alt="Logo-light" />
                                    </a>
                                    <form method="post" action="<?= base_url('autentikasi/registrasi'); ?>" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Warung</label>
                                            <input type="text" name="warung" class="form-control" placeholder="Nama Warung" autofocus>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Provinsi</label>
                                            <select class="form-control" name="provinsi" id="provinsi" onchange="getkabupaten()">
                                                <?php foreach ($provinsi as $key): ?>
                                                    <option value="<?= $key->id; ?>"><?= $key->nama; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kabupaten</label>
                                            <input type="text" name="kabupaten" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kecamatan</label>
                                            <input type="text" name="kecamatan" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" name="alamat" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">No Handphone</label>
                                            <input type="text" name="nomor_handphone" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="akun" class="form-control" placeholder="email">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Sandi</label>
                                            <input type="password" name="sandi" class="form-control" placeholder="Sandi Akun">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Tipe</label>
                                            <select class="form-control">
                                                <option value="trial">Trial 7-Hari</option>
                                                <option value="premium">Premium</option>
                                            </select>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Daftar</button>
                                        <div class="text-center">
                                            <a class="text-primary fw-medium" href="<?= base_url('autentikasi/login'); ?>">Masuk ?</a>
                                        </div>
                                    </form>
                                </div>
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