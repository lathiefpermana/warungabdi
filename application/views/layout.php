<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">
<?php $this->load->view('layout/head'); ?>
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
