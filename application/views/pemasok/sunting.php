<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Pemasok</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url(); ?>">Dasbor</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url('pemasok'); ?>">Pemasok</a>
                                </li>
                                <li class="text-muted breadcrumb-item" aria-current="page">Sunting Pemasok</li>
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
                                    Sunting Pemasok
                                </h5>
                            </div>
                            <p class="card-subtitle mb-3">
                                Sunting pemasok merupakan proses melakukan perubahan pada data pemasok yang sudah dipilih.
                            </p>

                            <form class="was-validated" method="post" action="<?= base_url('pemasok/pembaruan'); ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-3" hidden>
                                            <label class="form-label" for="validationCustom01">ID</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="id" value="<?= $pemasok['id'] ?>" required>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label" for="validationCustom01">Nama</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="nama" value="<?= $pemasok['nama']; ?>" required="">
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label" for="validationCustom01">Kontak</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="kontak" value="<?= $pemasok['kontak'] ?>" required="">
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label" for="validationCustom01">Nomor Telepon</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="nomor_telepon" value="<?= $pemasok['nomor_telepon'] ?>" required="">
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="validationCustom01">Alamat</label>
                                            <textarea class="form-control" name="alamat" required=""><?= $pemasok['alamat'] ?></textarea>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>

                                    </div>
                                </div>
                                <button class="btn btn-secondary rounded-pill px-4 mt-3 me-2" type="submit">Pembaruan</button>
                                <a href="<?= base_url('pemasok')?>" class="btn btn-outline-danger rounded-pill px-4 mt-3" >Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>