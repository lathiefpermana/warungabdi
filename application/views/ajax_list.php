<script type="text/javascript">
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
            { "data": "nama_produk" },
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

</script>