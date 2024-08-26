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
                                <li class="breadcrumb-item" aria-current="page">Daftar Harga</li>
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
                                <h5 class="mb-0">Data Daftar Harga</h5>
                            </div>
                            <p class="card-subtitle mb-3">Data daftar harga produk sebagai database dari sistem penjualan.</p>
                            <div class="mb-3">
                                <a href="<?= base_url('daftar_harga/tambah'); ?>" class="btn btn-primary"><i class="ti ti-plus"></i> Daftar Harga</a>
                            </div>
                            <div class="table-responsive">
                                <table id="datatables-daftar-harga" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Produk</th>
                                            <th>Nama</th>
                                            <th>Harga Jual</th>
                                            <th>Jumlah Jual</th>
                                            <th>Satuan</th>
                                            <th>Log</th>
                                            <th class="text-center">Sunting</th>
                                            <th class="text-center">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Produk</th>
                                            <th>Nama</th>
                                            <th>Harga Jual</th>
                                            <th>Jumlah Jual</th>
                                            <th>Satuan</th>
                                            <th>Log</th>
                                            <th class="text-center">Sunting</th>
                                            <th class="text-center">Hapus</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>