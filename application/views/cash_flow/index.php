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
                                <li class="breadcrumb-item" aria-current="page"><i>Cash Flow</i></li>
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
                                <h5 class="mb-0"><i>Cash Flow</i></h5>
                            </div>
                            <p class="card-subtitle mb-3">Cash flow adalah untuk menambahkan saldo awal, pemasukan dan pengeluaran dalam bentuk kas.</p>
                            <div class="mb-3">
                                <a href="<?= base_url('cash_flow/tambah'); ?>" class="btn btn-primary"><i class="ti ti-plus"></i> Tambah</a>
                            </div>
                            <div class="table-responsive">
                                <table id="multi_control-custom" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Tipe</th>
                                            <th>Deskripsi</th>
                                            <th>Nominal</th>
                                            <th class="text-center">Sunting</th>
                                            <th  class="text-center">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        <?php foreach($cash_flow as $key): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $key->tanggal ?></td>
                                                <td><?= $key->jam ?></td>
                                                <td><?= $key->tipe ?></td>
                                                <td><?= $key->deskripsi ?></td>
                                                <td class="text-end"><?= number_format($key->nominal) ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('cash_flow/sunting/'.$key->id); ?>" class="btn btn-secondary btn-sm"><i class="ti ti-pencil fs-3"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('cash_flow/hapus/'.$key->id); ?>" class="btn btn-danger btn-sm confirm"><i class="ti ti-trash fs-3"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Tipe</th>
                                            <th>Deskripsi</th>
                                            <th>Nominal</th>
                                            <th class="text-center">Sunting</th>
                                            <th  class="text-center">Hapus</th>
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