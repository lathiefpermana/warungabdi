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
                                        <?php $no=1; $tanggal = ""; $total_pemasukan = 0; $total_pengeluaran = 0; $total_saldo = 0; ?>
                                        <?php foreach($cashflow as $key): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?php if($tanggal != $key->tanggal){ echo $key->tanggal;} ?></td>
                                                <td><?= $key->deskripsi; ?></td>
                                                <?php 
                                                if($key->id_tipe == 1){
                                                    echo '<td></td><td></td><td class="text-end">'.number_format($key->nominal).'</td>';
                                                    $total_saldo = $total_saldo + $key->nominal;
                                                }elseif($key->id_tipe == 2){ //
                                                    echo '<td class="text-end">'.number_format($key->nominal).'</td><td></td><td></td>';
                                                    $total_saldo = $total_saldo + $key->nominal;
                                                    $total_pemasukan = $total_pemasukan + $key->nominal;
                                                }elseif($key->id_tipe == 3){
                                                    echo '<td></td><td class="text-end">'.number_format($key->nominal).'</td><td></td>';
                                                    $total_saldo = $total_saldo - $key->nominal;
                                                    $total_pengeluaran = $total_pengeluaran + $key->nominal;
                                                }else{
                                                    echo '<td></td><td></td><td></td>';
                                                }
                                                ?>
                                            </tr>
                                        <?php $tanggal = $key->tanggal; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th class="text-end">Total</th>
                                            <th class="text-end"><?= number_format($total_pemasukan); ?></th>
                                            <th class="text-end"><?= number_format($total_pengeluaran); ?></th>
                                            <th class="text-end"><?= number_format($total_saldo); ?></th>
                                        </tr>
                                    </tfoot>
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