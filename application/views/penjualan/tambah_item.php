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
                                <div class="left-part border-end w-75 flex-shrink-0 d-none d-lg-block">
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
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-25 w-xs-100 ">
                                    <div class="px-4 pt-4 pb-3">
                                        <h3>Total : </h3>
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