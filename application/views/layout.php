<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">
<?php $this->load->view('layout/head'); ?>
    <style>
        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            transition: .5s ease;
            background-color: grey;
            }

            .container:hover .overlay {
            opacity: 0.8;
            }

            .text {
            color: white;
            font-size: 36px;
            position: absolute;
            top: 50%;
            left: 60%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
            }
    </style>
    <body>
        <!-- preloader -->
        <div class="preloader">
            <img src="<?= base_url('assets/images/logos/favicon.png'); ?>" alt="loader" class="lds-ripple img-fluid"/>
        </div>
        <!-- end preloader -->
        <div id="main-wrapper">
            <?php $this->load->view('layout/sidebar'); ?>
                <div class="page-wrapper">
                    <?php $this->load->view('layout/topbar'); ?>
                    <?php $this->load->view($content); ?>
                </div>
                <?php  if($this->session->status_aktif == 'non aktif'){ ?>
                    <div class="container">
                        <div class="overlay">
                            <?php $tgl_kadaluarsa = explode('-',$this->session->userdata('tanggal_kadaluarsa')); ?>
                            <div class="text">Lisensi kadaluarsa pada tanggal <br><?= $tgl_kadaluarsa[2].'-'.namabulan($tgl_kadaluarsa[1]).'-'.$tgl_kadaluarsa[0]; ?> </div>
                        </div>
                    </div>
                <?php } ?>
        </div>
        <?php $this->load->view('layout/javascript'); ?>
    </body>
</html>
