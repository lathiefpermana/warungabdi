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
                                <mark>Step 2</mark>. Tambah item - item yang akan dimasukan sesuai dengan faktur yang sudah dibuat. Beras 1L = 0.753KG, Minyak 1L = 0.933KG
                            </p>
                            <form method="post" action="<?= base_url('barang_masuk/update'); ?>">
                                <div class="row mb-3">
                                    <div class="col-md-3" hidden>
                                        <div class="form-group  mb-3">
                                            <label class="form-label" for="validationCustom01">ID</label>
                                             <input type="text" class="form-control" name="id" value="<?= $barang_masuk['id']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group  mb-3">
                                            <label class="form-label" for="validationCustom01">Tanggal</label>
                                             <input type="date" class="form-control" name="tanggal" onchange='this.form.submit();' value="<?= $barang_masuk['tanggal']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group  mb-3">
                                            <label class="form-label" for="validationCustom01">Pemasok</label>
                                             <select name="pemasok" class="form-control" onchange='this.form.submit();'>
                                                <?php  foreach ($pemasok as $key): ?>
                                                    <option value="<?= $key->id; ?>" <?php if($key->id == $barang_masuk['id_pemasok']){ echo "selected"; } ?> ><?= $key->nama; ?></option>
                                                <?php endforeach; ?>
                                             </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="validationCustom01">Nomor Faktur</label>
                                             <input type="text" class="form-control" name="nomor_faktur" onchange='this.form.submit();' value="<?= $barang_masuk['nomor_faktur']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="mb-3">
                                <h5 class="card-title">
                                    Daftar Produk
                                </h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <form class="was-validated" method="post" action="<?= base_url('barang_masuk/simpan_item'); ?>">
                                        <tr>
                                            <td class="text-center">
                                                <i class="ti ti-plus-square"></i>
                                                </span> <input type="text" class="form-control" name="barang_masuk" value="<?= $barang_masuk['id']; ?>" hidden>
                                            </td>
                                            <td width="20%">
                                                <input type="text" id="nama_produk" class="form-control" name="detail_produk" placeholder="Produk" autofocus required>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="jumlah" placeholder="Jumlah" required>
                                            </td>
                                            <td>
                                                <select class="form-control select2" name="satuan" required>
                                                    <?php foreach($satuan as $key): ?>
                                                        <option value="<?= $key->id; ?>"><?= $key->nama; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="modal" placeholder="Modal / Harga Beli" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="jumlah_stok" placeholder="Jumlah Stok" required>
                                            </td>
                                            <td>
                                                <select class="form-control select2" name="satuan_stok" required>
                                                    <?php foreach($satuan as $key): ?>
                                                        <option value="<?= $key->id; ?>"><?= $key->nama; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </td>
                                            <td>
                                                <!-- <p class="form-control-static mt-2"><span class="float-end">Kadaluarsa</span></p> -->
                                            </td>
                                            <td>
                                                <input type="date" class="form-control" name="kadaluarsa" placeholder="Kadaluarsa">
                                            </td>
                                            <td>
                                                <button class="btn btn-success">Tambah</button>
                                            </td>
                                        </tr>
                                        </form>
                                        <tr class="text-center">
                                            <td class="bg-light">No</td>
                                            <td class="bg-light">Produk</td>
                                            <td class="bg-light">Jumlah Beli</td>
                                            <td class="bg-light">Satuan</td>
                                            <td class="bg-light">Modal / Harga Beli</td>
                                            <td class="bg-light">Jumlah Stok</td>
                                            <td class="bg-light">Satuan</td>
                                            <td class="bg-light">Tanggal Kadaluarsa</td>
                                            <td class="bg-light">Modal Awal</td>
                                            <td class="bg-light">Margin 20%</td>
                                            <td class="bg-light">Daftar Harga</td>
                                            <td class="bg-light">Hapus</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php $no=1; $total = 0; ?>
                                        <?php foreach ($daftar_produk as $key): ?>
                                            <form method="post" action="<?= base_url('barang_masuk/update_item');?>">
                                            <tr>
                                                <td hidden><input type="text" class="form-control" name="id_barang_masuk" value="<?= $key->barang_masuk; ?>"></td>
                                                <td hidden><input type="text" class="form-control" name="id_item" value="<?= $key->id; ?>"></td>
                                                <td><?= $no++; ?></td>
                                                <td><?= $key->produk; ?></td>
                                                <td>
                                                    <input type="number"  step="any" class="form-control" name="jumlah" onchange='if(this.value != 0) { this.form.submit(); }' value="<?= $key->jumlah; ?>">
                                                </td>
                                                <td>
                                                    <select class="form-control" name="satuan" onchange='if(this.value != 0) { this.form.submit(); }'>
                                                        <?php foreach($satuan as $key2): ?>
                                                            <option value="<?= $key2->id; ?>" <?php if($key2->id == $key->id_satuan){ echo 'selected'; } ?>><?= $key2->nama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control" name="kadaluarsa" onchange='this.form.submit();' value="<?= $key->kadaluarsa; ?>">
                                                </td>
                                                <td>
                                                    <input type="number" step="any" class="form-control" name="modal" onchange='if(this.value != 0) { this.form.submit(); }' value="<?= $key->modal; ?>">
                                                </td>
                                                <td class="text-end">
                                                    <input type="number" step="any" class="form-control" name="jumlah_stok" onchange='if(this.value != 0) { this.form.submit(); }' value="<?= $key->jumlah_stok; ?>">
                                                </td>
                                                <td>
                                                    <select class="form-control" name="satuan_stok" onchange='if(this.value != 0) { this.form.submit(); }'>
                                                        <?php foreach($satuan as $key2): ?>
                                                            <option value="<?= $key2->id; ?>" <?php if($key2->id == $key->id_satuan_stok){ echo 'selected'; } ?> ><?= $key2->nama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <?php $modal_awal = $key->modal/$key->jumlah_stok; $margin = $modal_awal * 0.2; $jual = $modal_awal + $margin;  ?>
                                                <td class="text-end"><mark><?= number_format(round($modal_awal)); ?></mark></td>
                                                <td class="text-end"><mark><?= number_format(round($jual)); ?></mark></td>

                                                <?php 
                                                $daftar_harga = $this->model_main->data_result('view_daftar_harga',array('id_produk'=>$key->id_produk),'delete_by IS NULL');
                                                if($daftar_harga->num_rows() > 0){
                                                    $harga = "";
                                                    foreach($daftar_harga->result() as $key2){
                                                        $harga .= $key2->nama.' - '.$key2->harga_jual.'<br>';
                                                    }
                                                }else{
                                                    $harga = 'belum ada';
                                                }
                                                ?>

                                                <td><mark><?= $harga; ?></mark></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('barang_masuk/hapus_item/'.$key->id.'/'.$key->barang_masuk); ?>" class="btn btn-danger confirm"><i class="ti ti-trash"></i></a>
                                                </td>
                                            </tr>
                                            </form>
                                            <?php $total = $total + $key->modal; ?>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">Total</td>
                                            <td class="text-end"><?= number_format($total); ?></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <a href="<?= base_url('barang_masuk'); ?>" class="btn btn-primary rounded-pill px-4 mt-3 me-2">Selesai</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>