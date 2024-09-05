<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Stok</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url(); ?>">Dasbor</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Stok</li>
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
                                <h5 class="mb-0">Data Stok</h5>
                            </div>
                            <p class="card-subtitle mb-3">Data stok produk. Data stok harus digenerate setiap user ganti bulan.</p>
                            <div class="mb-3">
                                <a href="<?= base_url('stok/generate'); ?>" class="btn btn-primary"><i class="ti ti-plus"></i> Generate</a>
                            </div>
                            <div class="title">
                                <h3 class="text-center"><?= strtoupper(namabulan(($bulan)).' '.$tahun); ?></h3>
                            </div>
                            <div class="table-responsive">
                                <table id="datatables-stok" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Kategori</th>
                                            <th>Produk</th>
                                            <th>Satuan</th>
                                            <th>Stok Awal</th>
                                            <th>Stok Masuk</th>
                                            <th>Stok Keluar</th>
                                            <th>Stok Opname</th>
                                            <th>Stok Balance</th>
                                            <th>Stok Log</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Kategori</th>
                                            <th>Produk</th>
                                            <th>Satuan</th>
                                            <th>Stok Awal</th>
                                            <th>Stok Masuk</th>
                                            <th>Stok Keluar</th>
                                            <th>Stok Opname</th>
                                            <th>Stok Balance</th>
                                            <th>Stok Log</th>
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