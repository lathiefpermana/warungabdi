<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Penjualan</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url(); ?>">Dasbor</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url('penjualan'); ?>">Penjualan</a>
                                </li>
                                <li class="text-muted breadcrumb-item" aria-current="page">Tambah Penjualan</li>
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
                            <div class="mb-2">
                                <h5 class="card-title mb-3">
                                    <?= 'Nomor: '.$penjualan['nomor_penjualan']; ?>
                                </h5>
                            </div>
                            <form class="was-validated" method="post" action="<?= base_url('penjualan/simpan'); ?>">
                                <div class="row">
                                    <div class="col-md-1" hidden>
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="">ID</label>
                                            <input type="text" class="form-control" name="penjualan" value="<?= $penjualan['id']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group  mb-3">
                                            <label class="form-label" for="harga_produk">Produk</label>
                                            <input type="text" id="harga_produk" class="form-control" name="produk" placeholder="Produk" autofocus required>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="jumlah">Jumlah</label>
                                            <input type="number" id="jumlah" name="jumlah" class="form-control" value="1" required>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-light btn-block mt-4">Enter</button>
                                    </div>
                                </div>
                                
                            </form>
                            <div class="d-flex w-100 h-100">
                                <div class="left-part border-end w-70 flex-shrink-0 d-none d-lg-block">
                                    <div class="pt-4 pb-3">
                                        <h5>List Item</h5>
                                        <div class="table-responsive mt-5" style="clear: both">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Item</th>
                                                        <th>Qty</th>
                                                        <th>Price</th>
                                                        <th>Total</th>
                                                        <th>&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no=1; $total = 0; ?>
                                                    <?php foreach ($item as $key): ?>
                                                        <tr>
                                                            <td><?= $no++; ?></td>
                                                            <td><?= $key->produk; ?></td>
                                                            <form action="<?= base_url('penjualan/update_item'); ?>" method="post">
                                                            <td>
                                                                <input type="text" class="form-control" name="id" value="<?= $key->id; ?>" hidden>
                                                                <input type="text" class="form-control" name="penjualan" value="<?= $key->id_penjualan; ?>" hidden>
                                                                <input type="number" class="form-control" name="jumlah" onchange='if(this.value != 0) { this.form.submit(); }' value="<?= $key->jumlah; ?>">
                                                            </td>
                                                            </form>
                                                            <td class="text-end"><?= number_format($key->harga); ?></td>
                                                            <td class="text-end"><?= number_format($key->total); ?></td>
                                                            <td class="text-center">
                                                                <a href="<?= base_url('penjualan/hapus_item/'.$key->id); ?>" class="confirm"><span class="ti ti-trash fs-3"></span></a>
                                                            </td>
                                                        </tr>
                                                        <?php $total = $total + $key->total; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td class="text-end" colspan="4">Total</td>
                                                        <td class="text-end"><?= number_format($total); ?></td>
                                                        <td></td>
                                                    </tr>
                                                    <form action="<?= base_url('penjualan/update_diskon') ?>" method="post">
                                                        <tr hidden>
                                                            <td class="text-end" colspan="4">ID Penjualan</td>
                                                            <td><input type="text" class="form-control" name="id_penjualan" value="<?= $penjualan['id']; ?>"></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-end" colspan="4">Diskon</td>
                                                            <td><input type="number" name="diskon" class="form-control text-end" onchange='this.form.submit();' value="<?= $penjualan['diskon']; ?>"></td>
                                                            <td></td>
                                                        </tr>
                                                    </form>
                                                    <tr>
                                                        <td class="text-end" colspan="4">Grand Total</td>
                                                        <td class="text-end"><?= number_format($total - $penjualan['diskon']); ?></td>
                                                        <td></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-30 w-xs-100 ">
                                    <div class="px-4 pt-4 pb-3">
                                        <h5>&nbsp;</h5>
                                        <div class="table-responsive mt-5" style="clear: both">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th>&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td>:</td>
                                                        <td class="text-end"><?= number_format($total); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Diskon</td>
                                                        <td>:</td>
                                                        <td class="text-end"><?= number_format($penjualan['diskon']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Grand Total</td>
                                                        <td>:</td>
                                                        <td class="text-end"><?= number_format($total - $penjualan['diskon']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="<?= base_url('penjualan'); ?>" class="btn btn-primary rounded-pill px-4 mt-3 me-2">Selesai</a>
                                                        </td>
                                                    </tr>
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
        </div>
    </div>
</div>