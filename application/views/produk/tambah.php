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
                                    Tambah Produk
                                </h5>
                            </div>
                            <p class="card-subtitle mb-3">
                                Tambah produk merupakan proses untuk membuat data produk baru yang belum ada pada data produk.
                            </p>

                            <form class="was-validated" method="post" action="<?= base_url('produk/simpan'); ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group  mb-3">
                                            <label class="form-label" for="validationCustom01">Kategori Produk</label>
                                            <select class="form-control select2" name="kategori_produk" required>
                                                <?php foreach($kategori as $key): ?>
                                                    <option value="<?= $key->id ?>"><?= $key->nama ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>
                                        <div class="form-group  mb-3">
                                            <label class="form-label" for="validationCustom01">Barcode</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="barcode">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="validationCustom01">Nama Produk</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="nama" required>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="validationCustom01">Satuan Jual</label>
                                            <select class="form-control select2" name="satuan" id="validationCustom01" required>
                                                <?php foreach($satuan as $key): ?>
                                                    <option value="<?= $key->id; ?>"><?= $key->nama; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>
                                    </div>
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