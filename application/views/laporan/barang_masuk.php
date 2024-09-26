<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Laporan Barang Masuk</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url(); ?>">Dasbor</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Laporan Barang Masuk</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="<?= base_url('assets/images/breadcrumb/ChatBc.png'); ?>" alt="" class="img-fluid mb-n4"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="datatables">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi_control-custom" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>No Faktur</th>
                                            <th>Pemasok</th>
                                            <th>Kategori</th>
                                            <th>Produk</th>
                                            <th>Jumlah</th>
                                            <th>Satuan</th>
                                            <th>Modal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; $grandtotal = 0; foreach ($barang_masuk as $key): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $key->tanggal; ?></td>
                                                <td><?= $key->nomor_faktur; ?></td>
                                                <td><?= $key->pemasok; ?></td>
                                                <td><?= $key->kategori_produk; ?></td>
                                                <td><?= $key->produk; ?></td>
                                                <td><?= $key->jumlah; ?></td>
                                                <td><?= $key->satuan; ?></td>
                                                <td class="text-end"><?= number_format($key->modal,0,',','.'); ?></td>
                                            </tr>
                                            <?php $grandtotal = $grandtotal + $key->modal; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">Grand Total</td>
                                            <td class="text-end"><?= number_format($grandtotal,0,',','.') ?></td>
                                        </tr>
                                    </tfoot>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>