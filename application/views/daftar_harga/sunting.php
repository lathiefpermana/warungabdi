<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Daftar Harga</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url(); ?>">Dasbor</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url('daftar_harga'); ?>">Daftar Harga</a>
                                </li>
                                <li class="text-muted breadcrumb-item" aria-current="page">Sunting Daftar Harga</li>
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
                                    Sunting Daftar Harga
                                </h5>
                            </div>
                            <p class="card-subtitle mb-3">
                                Sunting daftar harga yang sudah pernah disimpan.
                            </p>
                            <form class="was-validated" method="post" action="<?= base_url('daftar_harga/pembaruan'); ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group  mb-3" hidden>
                                            <label class="form-label" for="nama_produk">ID</label>
                                            <input type="text" id="nama_produk_stok" class="form-control" name="id" value="<?= $daftar['id']; ?>" autofocus required>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>
                                        <div class="form-group  mb-3">
                                            <label class="form-label" for="nama_produk">Produk</label>
                                            <input type="text" id="nama_produk_stok" class="form-control" name="produk" value="<?= $daftar['produk']; ?>" autofocus required>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label" for="validateCustom01">Nama</label>
                                            <input type="text" id="validateCustom01" class="form-control" name="nama" value="<?= $daftar['nama']; ?>" required>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label" for="validateCustom01">Harga jual</label>
                                            <input type="number" step="any" class="form-control" id="validateCustom01" name="harga_jual" value="<?= $daftar['harga_jual']; ?>" required>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="validateCustom01">Jumlah jual</label>
                                                    <input type="number" step="any" class="form-control" id="validateCustom01" name="jumlah_jual" value="<?= $daftar['jumlah_jual']; ?>" required>
                                                    <div class="invalid-feedbeck"></div>
                                                </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <div id="satuanstok">
                                                        <label class="form-label">Satuan stok</label>
                                                        <input type="text" class="form-control" value="<?= $daftar['satuan']; ?>" readonly>
                                                        <input type="text" name="id_satuan" class="form-control" value="<?= $daftar['id_satuan']; ?>" hidden>
                                                        <input type="text" name="id_produk" class="form-control" value="<?= $daftar['id_produk']; ?>" hidden>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="validateCustom01">Status Aktif</label>
                                            <select name="status_aktid" class="form-control" id="validateCustomer01" required>
                                                <option  value="aktif">Aktif</option>
                                                <option  value="non_aktif">Non Aktif</option>
                                            </select>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>

                                        
                                    </div>
                                </div>
                                <button class="btn btn-secondary rounded-pill px-4 mt-3 me-2" type="submit">Pembaruan</button>
                                <a href="<?= base_url('daftar_harga')?>" class="btn btn-outline-danger rounded-pill px-4 mt-3" >Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>