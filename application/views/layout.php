<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">
<?php $this->load->view('layout/head'); ?>
    <body>
        <!-- flashdata toast -->
        <?php if($this->session->flashdata('success')){ ?>
            <div class="toast toast-onload align-items-center toast-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body hstack align-items-start gap-6">
                    <i class="ti ti-alert-circle fs-6"></i>
                    <div>
                        <h5 class="text-white fs-3 mb-1"><?= $this->session->flashdata('success'); ?></h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white fs-2 m-0 ms-auto shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        <?php } ?>
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
        <!-- end flashdata toast -->
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
