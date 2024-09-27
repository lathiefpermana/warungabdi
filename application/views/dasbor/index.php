<div class="body-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 d-flex align-items-stretch">
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
                                        <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center"><?php if(!empty($day['penjualan_day'])){ echo number_format($day['penjualan_day'],0,',','.');}else{  echo 0;} ?><i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                                        <p class="mb-0 text-dark">Penjualan hari ini</p>
                                    </div>
                                    <div class="ps-4">
                                        <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center"><?php if(!empty($month['penjualan_month'])){ echo number_format($month['penjualan_month'],0,',','.');}else{ echo 0; } ?><i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
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
            <div class="col-lg-2 align-items-stretch">
                <div class="card text-bg-primary border-0 w-100">
                    <div class="card-body pb-0">
                        <h5 class="fw-semibold mb-1 text-white card-title">
                            <i>Cash Flow</i>
                        </h5>
                        <p class="fs-3 mb-3 text-white"><?= namabulan($bulan).' '.$tahun ?></p>
                    </div>
                    <div class="card mx-2 mb-2 mt-n2">
                        <div class="card-body">
                            <div class="pb-1">
                                <div class="d-flex justify-content-between align-items-center mb-6">
                                    <div>
                                        <h6 class="mb-1 fs-4 fw-semibold">Pemasukan</h6>
                                         <?php  if(!empty($cash_flow['saldo'])){ $pemasukan = $cash_flow['saldo'] + $cash_flow['pemasukan']; }else{ $pemasukan = 0;} ?>
                                        <p class="fs-3 mb-0 fw-semibold"><?php echo number_format($pemasukan); ?></p>
                                    </div>
                                    <div>
                                        <span class="badge bg-primary-subtle text-primary fw-semibold fs-3"></span>
                                    </div>
                                </div>
                                <div class="progress bg-primary-subtle" style="height: 4px">
                                    <div class="progress-bar text-bg-primary w-50" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 align-items-stretch">
                <div class="card text-bg-danger border-0 w-100">
                    <div class="card-body pb-0">
                        <h5 class="fw-semibold mb-1 text-white card-title">
                            <i>Cash Flow</i>
                        </h5>
                        <p class="fs-3 mb-3 text-white"><?= namabulan($bulan).' '.$tahun ?></p>
                    </div>
                    <div class="card mx-2 mb-2 mt-n2">
                        <div class="card-body">
                            <div class="pb-1">
                                <div class="d-flex justify-content-between align-items-center mb-6">
                                    <div>
                                        <h6 class="mb-1 fs-4 fw-semibold">Pengeluaran</h6>
                                        <?php if(!empty($cash_flow['pengeluaran'])){ $pengeluaran = $cash_flow['pengeluaran'];}else{ $pengeluaran = 0;} ?>
                                        <p class="fs-3 mb-0 fw-semibold"><?= number_format($pengeluaran); ?></p>
                                    </div>
                                    <div>
                                        <span class="badge bg-primary-subtle text-primary fw-semibold fs-3"></span>
                                    </div>
                                </div>
                                <div class="progress bg-primary-subtle" style="height: 4px">
                                    <div class="progress-bar text-bg-danger w-50" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 align-items-stretch">
                <div class="card text-bg-success border-0 w-100">
                    <div class="card-body pb-0">
                        <h5 class="fw-semibold mb-1 text-white card-title">
                            <i>Cash Flow</i>
                        </h5>
                        <p class="fs-3 mb-3 text-white"><?= namabulan($bulan).' '.$tahun ?></p>
                    </div>
                    <div class="card mx-2 mb-2 mt-n2">
                        <div class="card-body">
                            <div class="pb-1">
                                <div class="d-flex justify-content-between align-items-center mb-6">
                                    <div>
                                        <h6 class="mb-1 fs-4 fw-semibold">Total Saldo</h6>
                                        <?php if(!empty($cash_flow['saldo'])){ $total_saldo = $cash_flow['saldo'] + $cash_flow['pemasukan'] - $cash_flow['pengeluaran']; }else{ $total_saldo = 0;} ?>
                                        <p class="fs-3 mb-0 fw-semibold"><?= number_format($total_saldo); ?></p>
                                    </div>
                                    <div>
                                        <span class="badge bg-primary-subtle text-primary fw-semibold fs-3"></span>
                                    </div>
                                </div>
                                <div class="progress bg-primary-subtle" style="height: 4px">
                                    <div class="progress-bar text-bg-success w-50" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                               
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body">
                    <div class="mb-4">
                        <h5 class="card-title fw-semibold">Transaksi Terakhir</h5>
                    </div>
                    <ul class="timeline-widget mb-0 position-relative mb-n5">
                        <?php foreach ($recent as $key): ?>
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-time text-dark flex-shrink-0 text-end"><?= $key->tanggal.'<br>'.$key->jam ?></div>
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark mt-n1"><?= $key->nama_item; ?> <br>RP. <?= $key->total; ?></div>
                            </li>    
                        <?php endforeach; ?>
                    </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h5 class="card-title fw-semibold">Penjualan terbanyak</h5>
                                <p class="card-subtitle mb-0"><?= namabulan($bulan).' '.$tahun ?></p>
                            </div>
                        </div>
                        <div class="card mt-4 mb-0 shadow-none">
                            <div class="table-responsive">
                                <table class="table mb-0 align-middle text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="ps-0">Item</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-dark ">
                                        <?php foreach($terbanyak as $key): ?>
                                        <tr>
                                            <td class="ps-0"><?= $key->produk; ?></td>
                                            <td class="text-center"><?= $key->jumlah_jual; ?></td>
                                            <td class="text-dark text-end"><?= number_format($key->total); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    