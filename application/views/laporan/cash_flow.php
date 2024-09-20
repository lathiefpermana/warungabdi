<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Laporan <i>Cash Flow</i></h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url(); ?>">Dasbor</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Laporan <i>Cash FLow</i></li>
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
                            <div class="table-responsive">
                                <table id="multi_control-custom" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Deskripsi</th>
                                            <th>Pemasukan</th>
                                            <th>Pengeluaran</th>
                                            <th>Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; $total_saldo = 0; $begin = new DateTime(date('Y-m-01')); $end   = new DateTime(date('Y-m-t')); ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td></td>
                                            <td>Saldo Awal <?= namabulan($bulan).' '.$tahun; ?></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end"><?= number_format($saldo['nominal']); ?></td>
                                            <?php $total_saldo = $saldo + $saldo['nominal']; ?>
                                        </tr>
                                        <?php 
                                        for ($i=$begin; $i <= $end ; $i->modify('+1 day')) {  ?>
                                        $
                                        <?php }
                                        ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                            <p><mark>*Untuk pengelompokan tipe secara manual.</mark></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>