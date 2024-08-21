<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Barang Masuk</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url(); ?>">Dasbor</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url('barang_masuk'); ?>">Barang Masuk</a>
                                </li>
                                <li class="text-muted breadcrumb-item" aria-current="page">Tambah Barang Masuk</li>
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
                                <mark>Step 2</mark>. Tambah item - item yang akan dimasukan sesuai dengan faktur yang sudah dibuat.
                            </p>

                            <form class="was-validated" method="post" action="<?= base_url('barang_masuk/simpan_item'); ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group  mb-3">
                                            <label class="form-label" for="validationCustom01">Tanggal</label>
                                            <p class="form-control-static"><?= $barang_masuk['tanggal']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group  mb-3">
                                            <label class="form-label" for="validationCustom01">Pemasok</label>
                                            <p class="form-control-static"><?= $barang_masuk['pemasok']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="validationCustom01">Nomor Faktur</label>
                                            <p class="form-control-static"><?= $barang_masuk['nomor_faktur']; ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-2 mt-3">
                                    <h5 class="card-title">
                                        Tambah Produk
                                    </h5>
                                </div>

                                <div class="row">
                                    <div class="col-md-1" hidden>
                                        <input type="text" class="form-control" name="barang_masuk" value="<?= $barang_masuk['id']; ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="nama_produk" class="form-control" name="detail_produk" placeholder="Produk" autofocus required>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="number" class="form-control" name="jumlah" placeholder="Jumlah" required>
                                    </div>
                                    <div class="col-md-1">
                                        <select class="form-control select2" name="satuan" required>
                                            <?php foreach($satuan as $key): ?>
                                                <option value="<?= $key->id; ?>"><?= $key->nama; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" name="modal" placeholder="Modal / Harga Beli" required>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name="jumlah_item" placeholder="Jumlah Item">
                                    </div>
                                    <div class="col-md-1">
                                        <p class="form-control-static mt-2">PCS <span class="float-end">Kadaluarsa</span></p>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control" name="modal" placeholder="Kadaluarsa" required>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-success">Tambah</button>
                                    </div>
                                </div>
                            </form>

                            <div class="mb-2 mt-5">
                                <h5 class="card-title">
                                    Daftar Produk
                                </h5>
                            </div>
                            <table class="table table-striped table-border table-hover">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Produk</td>
                                        <td>Jumlah Beli</td>
                                        <td>Modal / Harga Beli</td>
                                        <td>Jumlah satuan</td>
                                        <td>Modal Awal</td>
                                        <td>Tanggal Kadaluarsa</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-end">Total</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <a href="<?= base_url('barang_masuk'); ?>" class="btn btn-primary rounded-pill px-4 mt-3 me-2">Selesai</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>