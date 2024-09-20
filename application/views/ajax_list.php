<?php 
$link = $_SERVER['REQUEST_URI']; 
$url = explode('/',$link);

if(!empty($url[2])){ $modul = $url[2]; }else{ $modul = null;}
if(!empty($url[3])){ $function = $url[3]; }else{ $function = null;}
?>

<script type="text/javascript">

<?php if($modul == 'produk' && $function == null){ ?>
$(function(){
    $('#datatables-produk').DataTable({
        "dom": '<"top"iflp<"clear">>',
        "processing": true,
        "responsive": true,
        "serverSide": true,
        "ordering": true, // Set true agar bisa di sorting
        "order": [[ 6, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        "pageLength": 5,
        "displayLength": 10,
        "pagingType": "full_numbers",
        "ajax":
        {
            "url": "<?= base_url('produk/ajax_list');?>", // URL file untuk proses select datanya
            "type": "POST"
        },
        "deferRender": true,
        "aLengthMenu": [[5, 10, 25, 50, 100],[ 5, 10, 25, 50, 100]], // Combobox Limit
        "columns": [
            {"data": 'id',"sortable": false, 
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }  
            },
            { "data": "kategori_produk" },
            { "data": "barcode" },
            { "data": "produk" },
            { "data": "satuan" },
            { "data": "created_by" },
            { "data": "created_at" },
            { "data": "log" },
            { "data": "id",  "sClass": "text-center",
                "render": 
                function( data, type, row, meta ) {
                    return '<a href="<?= base_url("produk/sunting/'+data+'"); ?>" class="btn btn-secondary btn-sm"><i class="ti ti-pencil fs-3"></i></a>';
                }
            },
            { "data": "id",  "sClass": "text-center",
                "render": 
                function( data, type, row, meta ) {
                    return '<a href="<?= base_url("produk/hapus/'+data+'"); ?>" class="btn btn-danger btn-sm confirm"><i class="ti ti-trash fs-3"></i></a>';
                }
            },
        ]
    });
});
<?php } ?>

<?php if($modul == 'daftar_harga' && $function == null){ ?>

$(function(){
    $('#datatables-daftar-harga').DataTable({
        "dom": '<"top"iflp<"clear">>',
        "processing": true,
        "responsive": true,
        "serverSide": true,
        "ordering": true, // Set true agar bisa di sorting
        "order": [[ 0, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        "pageLength": 5,
        "displayLength": 10,
        "pagingType": "full_numbers",
        "ajax":
        {
            "url": "<?= base_url('daftar_harga/ajax_list');?>", // URL file untuk proses select datanya
            "type": "POST"
        },
        "deferRender": true,
        "aLengthMenu": [[5, 10, 25, 50, 100],[ 5, 10, 25, 50, 100]], // Combobox Limit
        "columns": [
            {"data": 'id',"sortable": false, 
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }  
            },
            { "data": "kategori_produk" },
            { "data": "produk" },
            { "data": "nama" },
            { "data": "harga_jual",  "sClass": "text-end"},
            { "data": "jumlah_jual", "sClass": "text-center" },
            { "data": "satuan" },
            { "data": "log" },
            { "data": "id",  "sClass": "text-center",
                "render": 
                function( data, type, row, meta ) {
                    return '<a href="<?= base_url("daftar_harga/sunting/'+data+'"); ?>" class="btn btn-secondary btn-sm"><i class="ti ti-pencil fs-3"></i></a>';
                }
            },
            { "data": "id",  "sClass": "text-center",
                "render": 
                function( data, type, row, meta ) {
                    return '<a href="<?= base_url("daftar_harga/hapus/'+data+'"); ?>" class="btn btn-danger btn-sm confirm"><i class="ti ti-trash fs-3"></i></a>';
                }
            },
        ]
    });
});

<?php } ?>

<?php if($modul == 'barang_masuk' && $function == null){ ?>

$(function(){
    $('#datatables-barang-masuk').DataTable({
        "dom": '<"top"iflp<"clear">>',
        "processing": true,
        "responsive": true,
        "serverSide": true,
        "ordering": true, // Set true agar bisa di sorting
        "order": [[ 6, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        "pageLength": 5,
        "displayLength": 10,
        "pagingType": "full_numbers",
        "ajax":
        {
            "url": "<?= base_url('barang_masuk/ajax_list/'.$bulan.'/'.$tahun);?>", // URL file untuk proses select datanya
            "type": "POST"
        },
        "deferRender": true,
        "aLengthMenu": [[5, 10, 25, 50, 100],[ 5, 10, 25, 50, 100]], // Combobox Limit
        "columns": [
            {"data": 'id',"sortable": false, 
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }  
            },
            { "data": "tanggal" },
            { "data": "pemasok" },
            { "data": "nomor_faktur"},
            { "data": "jumlah_item", "sClass": "text-center" },
            { "data": "modal", "sClass": "text-end" },
            { "data": "log" },
            { "data": "id",  "sClass": "text-center",
                "render": 
                function( data, type, row, meta ) {
                    return '<a href="<?= base_url("barang_masuk/tambah_item/'+data+'"); ?>" class="btn btn-secondary btn-sm"><i class="ti ti-pencil fs-3"></i></a>';
                }
            },
            { "data": "id",  "sClass": "text-center",
                "render": 
                function( data, type, row, meta ) {
                    return '<a href="<?= base_url("barang_masuk/hapus/'+data+'"); ?>" class="btn btn-danger btn-sm confirm"><i class="ti ti-trash fs-3"></i></a>';
                }
            },
        ]
    });
});

<?php } ?>

<?php if($modul == 'stok' && $function == null){ ?>

$(function(){
    $('#datatables-stok').DataTable({
        "dom": '<"top"iflp<"clear">>',
        "processing": true,
        "responsive": true,
        "serverSide": true,
        "ordering": true, // Set true agar bisa di sorting
        "order": [[ 11, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        "pageLength": 10,
        "displayLength": 10,
        "pagingType": "full_numbers",
        "ajax":
        {
            "url": "<?= base_url('stok/ajax_list/'.$bulan.'/'.$tahun);?>", // URL file untuk proses select datanya
            "type": "POST"
        },        
        "deferRender": true,
        "aLengthMenu": [[5, 10, 25, 50, 100],[ 5, 10, 25, 50, 100]], // Combobox Limit
        "columns": [
            {"data": 'id',"sortable": false, 
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }  
            },
            { "data": 'bulan',
                render: function (data) {
                    return '<?= namabulan('+data+'); ?>';
                }  
            },
            { "data": "tahun" },
            { "data": "kategori_produk" },
            { "data": "produk" },
            { "data": "satuan" },
            { "data": "stok_awal" },
            { "data": "stok_masuk" },
            { "data": "stok_keluar" },
            { "data": "stok_opname" },
            { "data": "stok_balance" },
            { "data": "log" },
        ]
    });
});

<?php } ?>

<?php if($modul == 'penjualan' && $function == null){ ?>

$(function(){
    $('#datatables-penjualan').DataTable({
        "dom": '<"top"iflp<"clear">>',
        "processing": true,
        "responsive": true,
        "serverSide": true,
        "ordering": true, // Set true agar bisa di sorting
        "order": [[ 1, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        "pageLength": 10,
        "displayLength": 10,
        "pagingType": "full_numbers",
        "ajax":
        {
            "url": "<?= base_url('penjualan/ajax_list/'.$bulan.'/'.$tahun);?>", // URL file untuk proses select datanya
            "type": "POST"
        },        
        "deferRender": true,
        "aLengthMenu": [[5, 10, 25, 50, 100],[ 5, 10, 25, 50, 100]], // Combobox Limit
        "columns": [
            {"data": 'id',"sortable": false, 
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }  
            },
            { "data": 'bulan',
                render: function (data) {
                    return '<?= namabulan('+data+'); ?>';
                }  
            },
            { "data": "tahun" },
            { "data": "tanggal" },
            { "data": "jam" },
            { "data": "nomor_penjualan" },
            { "data": "jumlah_item",  "sClass": "text-center" },
            { "data": "total",  "sClass": "text-end" },
            { "data": "diskon",  "sClass": "text-end" },
            { "data": "grand_total",  "sClass": "text-end"},
            { "data": "id",  "sClass": "text-center",
                "render": 
                function( data, type, row, meta ) {
                    return '<a href="<?= base_url("penjualan/tambah_item/'+data+'"); ?>" class="btn btn-secondary btn-sm"><i class="ti ti-pencil fs-3"></i></a>';
                }
            },
            { "data": "id",  "sClass": "text-center",
                "render": 
                function( data, type, row, meta ) {
                    return '<a href="<?= base_url("penjualan/hapus/'+data+'"); ?>" class="btn btn-danger btn-sm confirm"><i class="ti ti-trash fs-3"></i></a>';
                }
            },
        ]
    });
});

<?php } ?>

<?php if($modul == 'penjualan' && $function == 'data'){ ?>

$(function(){
    $('#datatables-data-penjualan').DataTable({
        "dom": '<"top"iflp<"clear">>',
        "processing": true,
        "responsive": true,
        "serverSide": true,
        "ordering": true, // Set true agar bisa di sorting
        "order": [[ 1, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        "pageLength": 10,
        "displayLength": 10,
        "pagingType": "full_numbers",
        "ajax":
        {
            "url": "<?= base_url('penjualan/ajax_list_data/'.$bulan.'/'.$tahun);?>", // URL file untuk proses select datanya
            "type": "POST"
        },        
        "deferRender": true,
        "aLengthMenu": [[5, 10, 25, 50, 100],[ 5, 10, 25, 50, 100]], // Combobox Limit
        "columns": [
            {"data": 'id',"sortable": false, 
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }  
            },
            { "data": 'bulan',
                render: function (data) {
                    return '<?= namabulan('+data+'); ?>';
                }  
            },
            { "data": "tahun" },
            { "data": "tanggal" },
            { "data": "jam" },
            { "data": "nomor_penjualan" },
            { "data": "kategori_produk" },
            { "data": "produk" },
            { "data": "nama_item" },
            { "data": "harga", "sClass": "text-end" },
            { "data": "jumlah",  "sClass": "text-end" },
            { "data": "total",  "sClass": "text-end" },
            
        ]
    });
});

<?php } ?>

<?php if($modul == 'barang_masuk' && $function == 'data'){ ?>

$(function(){
    $('#datatables-data-barang-masuk').DataTable({
        "dom": '<"top"iflp<"clear">>',
        "processing": true,
        "responsive": true,
        "serverSide": true,
        "ordering": true, // Set true agar bisa di sorting
        "order": [[ 1, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        "pageLength": 10,
        "displayLength": 10,
        "pagingType": "full_numbers",
        "ajax":
        {
            "url": "<?= base_url('barang_masuk/ajax_list_data/'.$bulan.'/'.$tahun);?>", // URL file untuk proses select datanya
            "type": "POST"
        },        
        "deferRender": true,
        "aLengthMenu": [[5, 10, 25, 50, 100],[ 5, 10, 25, 50, 100]], // Combobox Limit
        "columns": [
            {"data": 'id',"sortable": false, 
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }  
            },
            { "data": 'bulan',
                render: function (data) {
                    return '<?= namabulan('+data+'); ?>';
                }  
            },
            { "data": "tahun" },
            { "data": "tanggal" },
            { "data": "jam" },
            { "data": "nomor_faktur" },
            { "data": "pemasok" },
            { "data": "kategori_produk" },
            { "data": "produk" },
            { "data": "jumlah",  "sClass": "text-end" },
            { "data": "satuan" },
            { "data": "modal", "sClass":"text-end" },
            
        ]
    });
});

<?php } ?>

</script>
