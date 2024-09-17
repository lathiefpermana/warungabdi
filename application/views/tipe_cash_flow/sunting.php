<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Tipe <i>Cash Flow</i></h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url(); ?>">Dasbor</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url('tipe_cash_flow'); ?>">Tipe <i>Cash Flow</i></a>
                                </li>
                                <li class="text-muted breadcrumb-item" aria-current="page">Sunting Tipe</li>
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
                                    Sunting Tipe <i>Cash Flow</i>
                                </h5>
                            </div>
                            <p class="card-subtitle mb-3">
                                Sunting tipe <i>cash flow</i> untuk merubah penamaan tipe.
                            </p>

                            <form class="was-validated" method="post" action="<?= base_url('tipe_cash_flow/pembaruan'); ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                    <div class="form-group  mb-3" hidden>
                                            <label class="form-label" for="validationCustom01">ID</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="id" value="<?= $tipe['id']; ?>" required="">
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>

                                        <div class="form-group  mb-3">
                                            <label class="form-label" for="validationCustom01">Nama</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="nama" value="<?= $tipe['nama']; ?>" required="">
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-secondary rounded-pill px-4 mt-3 me-2" type="submit">Pembaruan</button>
                                <a href="<?= base_url('tipe_cash_flow')?>" class="btn btn-outline-danger rounded-pill px-4 mt-3" >Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>