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
                                        <?php 
                                        $no=1; $total_saldo = 0; $total_pemasukan = 0; $total_pengeluaran = 0;
                                        $begin = new DateTime(date('Y-m-01')); $end  = new DateTime(date('Y-m-t')); $tgl = ""; ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td></td>
                                            <td>Saldo Awal <?= namabulan($bulan).' '.$tahun; ?></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end"><?= number_format($saldo['nominal']); ?></td>
                                            <?php $total_saldo = $total_saldo + $saldo['nominal']; ?>
                                        </tr>
                                        <?php for ($i=$begin; $i <= $end ; $i->modify('+1 day')) { ?>
                                            <?php $tanggal = $i->format('Y-m-d'); ?>
                                            <!-- kas Masuk -->
                                            <?php 
                                            $kas_masuk = $this->model_main->data_result('view_cash_flow',array('tanggal'=>$tanggal,'id_tipe'=>2),'delete_by IS NULL'); 
                                            if($kas_masuk->num_rows() > 0){ 
                                                foreach($kas_masuk->result() as $key1){ ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?php if($tgl != $key1->tanggal){ echo $key1->tanggal; } $tgl = $key1->tanggal; ?></td>
                                                        <td><?= $key1->deskripsi; ?></td>
                                                        <td class="text-end"><?= number_format($key1->nominal,2,',','.'); ?></td>
                                                        <td></td>
                                                        <td class="text-end"><?php $total_saldo = $total_saldo + $key1->nominal; echo number_format($total_saldo,0,',','.') ?></td>
                                                        <?php $total_pemasukan = $total_pemasukan + $key1->nominal;  ?>
                                                    </tr>
                                                <?php }
                                            }
                                            ?>
                                            <!-- kas Masuk -->
                                            <!-- Kas Keluar -->
                                            <?php 
                                            $kas_keluar = $this->model_main->data_result('view_cash_flow',array('tanggal'=>$tanggal,'id_tipe'=>3),'delete_by IS NULL');
                                            if($kas_keluar->num_rows() > 0){
                                                foreach($kas_keluar->result() as $key2){ ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?php if($tgl != $key2->tanggal){ echo $key2->tanggal; } $tgl = $key2->tanggal; ?></td>
                                                        <td><?= $key2->deskripsi; ?></td>
                                                        <td></td>
                                                        <td class="text-end"><?= number_format($key2->nominal,0,',','.'); ?></td>
                                                        <td class="text-end"><?php $total_saldo = $total_saldo - $key2->nominal; echo number_format($total_saldo,0,',','.') ?></td>
                                                        <?php $total_pengeluaran = $total_pengeluaran + $key2->nominal;  ?>
                                                    </tr>
                                                <?php }
                                            }
                                            ?>
                                            <!-- Kas Keluar -->
                                            <!-- Penjualan -->
                                            <?php
                                            $penjualan = $this->model_main->data_result('view_data_penjualan',array('tanggal'=>$tanggal),null);
                                            if($penjualan->num_rows() > 0){
                                                foreach($penjualan->result() as $key3){ ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?php if($tgl != $key3->tanggal){ echo $key3->tanggal; } $tgl = $key3->tanggal; ?></td>
                                                        <td><?= 'Penjualan '.$key3->nama_item; ?></td>
                                                        <td class="text-end"><?= number_format($key3->total,2,',','.') ?></td>
                                                        <td></td>
                                                        <td class="text-end"><?php $total_saldo = $total_saldo + $key3->total; echo number_format($total_saldo,0,',','.') ?></td>
                                                        <?php $total_pemasukan = $total_pemasukan + $key3->total; ?>
                                                    </tr>
                                                <?php }
                                            }
                                            ?>
                                            <!-- Penjualan -->
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>                                            
                                            <td class="text-end"><?= number_format($total_pemasukan,2,',','.'); ?></td>
                                            <td class="text-end"><?= number_format($total_pengeluaran,2,',','.'); ?></td>
                                            <td class="text-end"><?= number_format($total_saldo,2,',','.'); ?></td>
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