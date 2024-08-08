<div class="body-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 d-flex align-items-stretch">
                    <div class="card w-100 bg-primary-subtle overflow-hidden shadow-none">
                        <div class="card-body position-relative">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="d-flex align-items-center mb-7">
                                        <div class="rounded-circle overflow-hidden me-6">
                                            <img src="<?= base_url('assets/images/profile/user-1.jpg'); ?>" alt="" width="40" height="40">
                                        </div>
                                        <h5 class="fw-semibold mb-0 fs-5">Welcome back,  <?= $this->session->userdata('warung'); ?> !</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="border-end pe-4 border-muted border-opacity-10">
                                            <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">52,500<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                                            <p class="mb-0 text-dark">Penjualan hari ini</p>
                                        </div>
                                        <div class="ps-4">
                                            <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">1,575,000<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                                            <p class="mb-0 text-dark">Penjualan bulan ini</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="welcome-bg-img mb-n7 text-end">
                                        <img src="<?= base_url('assets/images/backgrounds/welcome-bg2.png'); ?>" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-7 align-items-stretch">
                    <h5>Grafik Penjualan Perminggu</h5>
                    <div id="chart-line-zoomable"></div>
                </div> -->
                <!-- <div class="col-lg-3 d-flex align-items-strech">
                    <div class="card text-bg-primary border-0 w-100">
                        <div class="card-body pb-0">
                            <h5 class="fw-semibold mb-1 text-white card-title">
                                Produk terlaris
                            </h5>
                            <p class="fs-3 mb-3 text-white">Agustus 2024</p>
                            <div class="text-center mt-3">
                                <img src="<?= base_url('assets/images/backgrounds/piggy.png'); ?>" class="img-fluid" alt=""/>
                            </div>
                        </div>
                        <div class="card mx-2 mb-2 mt-n2">
                            <div class="card-body">
                                <div class="mb-7 pb-1">
                                    <div class="d-flex justify-content-between align-items-center mb-6">
                                        <div>
                                            <h6 class="mb-1 fs-4 fw-semibold">Indomie Goreng</h6>
                                            <p class="fs-3 mb-0">55 Item</p>
                                        </div>
                                        <div>
                                            <span class="badge bg-primary-subtle text-primary fw-semibold fs-3"></span>
                                        </div>
                                    </div>
                                    <div class="progress bg-primary-subtle" style="height: 4px">
                                        <div class="progress-bar w-50" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-6">
                                        <div>
                                            <h6 class="mb-1 fs-4 fw-semibold">Indomie Ayam Bawang</h6>
                                            <p class="fs-3 mb-0">40 Item</p>
                                        </div>
                                        <div>
                                            <span class="badge bg-secondary-subtle text-secondary fw-bold fs-3"></span>
                                        </div>
                                    </div>
                                    <div class="progress bg-secondary-subtle" style="height: 4px">
                                        <div class="progress-bar text-bg-secondary w-40" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">Stok rendah / <i>Stock Low</i></h5>
                            <div class="position-relative">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex">
                                        <div class="p-8 bg-primary-subtle rounded-2 d-flex align-items-center justify-content-center me-6">
                                            <img src="<?= base_url('assets/images/svgs/icon-package.svg'); ?>" alt="" class="img-fluid" width="24" height="24">
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fs-4 fw-semibold">Indomie Goreng</h6>
                                            <p class="fs-3 mb-0">Makanan</p>
                                        </div>
                                    </div>
                                    <h6 class="mb-0 fw-semibold">4 Item</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex">
                                        <div class="p-8 bg-primary-subtle rounded-2 d-flex align-items-center justify-content-center me-6">
                                            <img src="<?= base_url('assets/images/svgs/icon-package.svg'); ?>" alt="" class="img-fluid" width="24" height="24">
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fs-4 fw-semibold">Sampoerna Mild 16</h6>
                                            <p class="fs-3 mb-0">Rokok</p>
                                        </div>
                                    </div>
                                    <h6 class="mb-0 fw-semibold">2 Item</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex">
                                        <div class="p-8 bg-primary-subtle rounded-2 d-flex align-items-center justify-content-center me-6">
                                            <img src="<?= base_url('assets/images/svgs/icon-package.svg'); ?>" alt="" class="img-fluid" width="24" height="24">
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fs-4 fw-semibold">Sampoerna Mild 12</h6>
                                            <p class="fs-3 mb-0">Rokok</p>
                                        </div>
                                    </div>
                                    <h6 class="mb-0 fw-semibold">0 Item</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                               
            </div>
        </div>
    </div>
    