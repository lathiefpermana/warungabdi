<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8"><i>Cash Flow</i></h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url(); ?>">Dasbor</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url('cash_flow'); ?>"><i>Cash Flow</i></a>
                                </li>
                                <li class="text-muted breadcrumb-item" aria-current="page">Tambah</li>
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
                                    Tambah <i>Cash Flow</i>
                                </h5>
                            </div>
                            <p class="card-subtitle mb-3">
                                Tambah <i>cash flow</i> untuk menambahkan transaksi masuk - keluar uang kas.
                            </p>

                            <form class="was-validated" method="post" action="<?= base_url('cash_flow/simpan'); ?>">
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-group  mb-3">
                                            <label class="form-label" for="validationCustom01">Tanggal</label>
                                            <input type="date" class="form-control" id="validationCustom01" name="tanggal" value="<?= date('Y-m-d') ?>" required="">
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>
                                        <div class="form-group  mb-3">
                                            <label class="form-label" for="validationCustom01">Tipe</label>
                                            <select class="form-control" id="validationCustom01" name="tipe">
                                                <?php foreach($tipe as $key): ?>
                                                    <option value="<?= $key->id ?>"><?= $key->nama ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>
                                        <div class="form-group  mb-3">
                                            <label class="form-label" for="validationCustom01">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" id="validationCustom01" required></textarea>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>
                                        <div class="form-group  mb-3">
                                            <label class="form-label" for="validationCustom01">Nominal</label>
                                            <input type="number" step="any" class="form-control" id="validationCustom01" name="nominal" required="">
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary rounded-pill px-4 mt-3 me-2" type="submit">Simpan</button>
                                <a href="<?= base_url('satuan')?>" class="btn btn-outline-danger rounded-pill px-4 mt-3" >Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>