<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Stok <i>Opname</i></h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url(); ?>">Dasbor</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Stok <i>Opname</i></li>
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
                                <h5 class="mb-0">Data Stok Opname</h5>
                            </div>
                            <p class="card-subtitle mb-3">Data stok opnam merajuk pada data stok dengan produk di lapangan jumlah barang tidak sama. Atau ada kerusakan barang maupun barang masuk yang tidak dimasukan.</p>
                            <p class="card-subtitle mb-3">Jika stok bertambah maka nilai qty opname harus positif <mark>( + )</mark> jika stok berkurang maka harus minus<mark>( - )</mark>. Sesuaikan qty dengan nilai satuan produk. Contok satuan KG, hilang 1/4 item, maka qty opname = <mark>-0.25</mark></p>
                            <div class="title">
                                <h3 class="text-center"><?= strtoupper(namabulan(($bulan)).' '.$tahun); ?></h3>
                            </div>
                            <div class="table-responsive">
                                <table id="multi_control-custom" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Periode</th>
                                            <th>Kategori</th>
                                            <th>Produk</th>
                                            <th>Balance tanpa <i>Opname</i></th>
                                            <th>Satuan</th>
                                            <th><i>Qty Opname</i></th>
                                            <th>Keterangan</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        <?php foreach ($stok as $key): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= namabulan($key->bulan).' '.$key->tahun; ?></td>
                                                <td><?= $key->kategori_produk; ?></td>
                                                <td><?= $key->produk; ?></td>
                                                <td class="text-center"><?= $key->balance_not_opname; ?></td>
                                                <td class="text-center"><?= $key->satuan; ?></td>
                                                <form action="<?= base_url('stok_opname/tambah') ?>" method="post">
                                                    <td>
                                                    <input type="text" name="stok" class="form-control" value="<?= $key->id; ?>" required hidden>
                                                    <input type="number"  step="any" name="jumlah" class="form-control" value="<?= $key->jumlah; ?>" required>
                                                </td>
                                                <td>
                                                    <textarea name="keterangan" class="form-control" rows="1" onchange='if(this.value != 0) { this.form.submit(); }' required><?= $key->keterangan;?></textarea>
                                                </td>
                                                </form>
                                                <td class="text-center"><?= $key->balance; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
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