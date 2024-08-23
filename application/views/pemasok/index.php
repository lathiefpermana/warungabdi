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
                                <li class="breadcrumb-item" aria-current="page">Pemasok</li>
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
                                <h5 class="mb-0">Data Pemasok</h5>
                            </div>
                            <p class="card-subtitle mb-3">Data pemasok adalah tempat warung belanja produk.</p>
                            <div class="mb-3">
                                <a href="<?= base_url('pemasok/tambah'); ?>" class="btn btn-primary"><i class="ti ti-plus"></i> Pemasok</a>
                            </div>
                            <div class="table-responsive">
                                <table id="multi_control-custom" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Kontak</th>
                                            <th>Nomor Telepon</th>
                                            <th>Alamat</th></th>
                                            <th>Dibuat Oleh</th>
                                            <th>Waktu dibuat</th>
                                            <th>Log</th>
                                            <th class="text-center">Sunting</th>
                                            <th  class="text-center">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        <?php foreach($pemasok as $key): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $key->nama ?></td>
                                                <td><?= $key->kontak ?></td>
                                                <td><?= $key->nomor_telepon ?></td>
                                                <td><?= $key->alamat ?></td>
                                                <td><?= $key->created_by ?></td>
                                                <td><?= $key->created_at ?></td>
                                                <td><?= $key->log ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('pemasok/sunting/'.$key->id); ?>" class="btn btn-secondary btn-sm"><i class="ti ti-pencil fs-3"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('pemasok/hapus/'.$key->id); ?>" class="btn btn-danger btn-sm confirm"><i class="ti ti-trash fs-3"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Kontak</th>
                                            <th>Nomor Telepon</th>
                                            <th>Alamat</th></th>
                                            <th>Dibuat Oleh</th>
                                            <th>Waktu dibuat</th>
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