<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Produk</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url(); ?>">Dasbor</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url('produk'); ?>">Produk</a>
                                </li>
                                <li class="text-muted breadcrumb-item" aria-current="page">Tambah Produk</li>
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
                                <h5 class="card-title">
                                    Tambah Barang Masuk
                                </h5>
                            </div>
                            <p class="card-subtitle mb-3">
                                Tambah barang masuk merupakan proses untuk input data belanja dengan qty dan harga beli. Sehingga belanja modal dapat tercatat dan stok produk bertambah.
                            </p>

                            <form class="was-validated" method="post" action="<?= base_url('barang_masuk/simpan'); ?>" novalidate>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group  mb-3">
                                            <label class="form-label" for="validationCustom01">Tanggal</label>
                                            <input type="date" class="form-control" id="validationCustom01" name="tanggal" value="<?= date('Y-m-d') ?>" required>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group  mb-3">
                                            <label class="form-label" for="validationCustom01">Pemasok</label>
                                            <select class="form-control select2" name="pemasok" required>
                                                <option>-</option>
                                            </select>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="validationCustom01">Nomor Faktur</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="nomor_faktur">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h6 class="mt-3">Item Barang</h6>
                                </div>
                                <button class="btn btn-primary rounded-pill px-4 mt-3 me-2" type="submit">Simpan</button>
                                <a href="<?= base_url('produk')?>" class="btn btn-outline-danger rounded-pill px-4 mt-3" >Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>