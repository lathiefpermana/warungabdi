<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Stok <i>Generate</i></h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url(); ?>">Dasbor</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= base_url('stok_awal'); ?>">Stok <i>Generate</i></a>
                                </li>
                                <li class="text-muted breadcrumb-item" aria-current="page">Buat Stok</li>
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
                                    Buat Stok
                                </h5>
                            </div>
                            <p class="card-subtitle mb-3">
                                Stok <i>Generate</i> adalah untuk membuat data stok sebagai tempat penambahan dan pengurangan stok berdasarkan aktifitas.
                            </p>

                            <form class="was-validated" method="post" action="<?= base_url('stok/generate_stok'); ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group  mb-3">
                                            <label class="form-label" for="validationCustom01">Bulan</label>
                                            <?php $array_bulan = array('1'=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'); ?>
                                            <select class="form-control" name="bulan" for="validationCustom01" required>
                                                <?php for ($i=1; $i <= count($array_bulan) ; $i++) {  ?>
                                                    <option value="<?= $i ?>" <?php if($i == date('m')){ echo 'selected'; } ?>><?= $array_bulan[$i]; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>                                        
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="validationCustom01">Tahun</label>
                                            <select class="form-control" name="tahun" id="validationCustom01" required>
                                                <?php for ($i=date('Y'); $i >= date('Y') - 2; $i-=1) { ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="invalid-feedback">Harus diisi</div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary rounded-pill px-4 mt-3 me-2" type="submit">Simpan</button>
                                <a href="<?= base_url('stok')?>" class="btn btn-outline-danger rounded-pill px-4 mt-3" >Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>