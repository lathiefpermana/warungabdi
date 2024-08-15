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
                                <li class="breadcrumb-item" aria-current="page">Produk</li>
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
                                    Daftar Produk
                                </h5>
                            </div>
                            <p class="card-subtitle mb-3">
                                Produk - produk yang ada pada database warung. Jika pengguna ingin menambahkan produk baru, klik tombol tambah produk.
                            </p>
                            <a href="<?= base_url('produk/tambah') ?>" class="btn btn-primary me-1">
                                <i class="ti ti-plus"></i>
                                Tambah Produk
                            </a>

                            <div class="table-responsive mt-3">
                                <table id="alt_pagination" class="table border table-striped table-bordered display text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Barcode</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Tanggal input</th>
                                            <th>Tanggal update</th>
                                            <th>Diinput oleh</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                            <td>$320,800</td>
                                            <td><a href="" class="btn btn-secondary"><span class="ti ti-pencil"></span></a></td>
                                            <td><a href="" class="btn btn-danger"><span class="ti ti-trash"></span></a></td>
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