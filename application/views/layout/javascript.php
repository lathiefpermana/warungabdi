<script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/jquery/dist/jquery-3.7.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/jquery-ui-1.14.0/jquery-ui.js'); ?>"></script>
<script src="<?= base_url('assets/js/app.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/app.init.js'); ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/simplebar/dist/simplebar.min.js'); ?>"></script>

<script src="<?= base_url('assets/js/sidebarmenu'); ?>.js"></script>
<script src="<?= base_url('assets/js/theme.js'); ?>"></script>

<script src="<?= base_url('assets/libs/owl.carousel/dist/owl.carousel.min.js'); ?>"></script>

<script src="<?= base_url('assets/libs/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/datatable/datatable-basic.init.js'); ?>"></script>
<script src="<?= base_url('assets/js/datatable/datatable-advanced.init.js'); ?>"></script>
<script src="<?= base_url('assets/js/datatable/datatable-api.init.js'); ?>"></script>

<script src="<?= base_url('assets/libs/select2/dist/js/select2.full.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/select2/dist/js/select2.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/forms/select2.init.js'); ?>"></script>

<script src="<?= base_url('assets/js/plugins/bootstrap-validation-init.js'); ?>"></script>

<script src="<?= base_url('assets/libs/jquery-validation/dist/jquery.validate.min.js'); ?>"></script>

<script type="text/javascript">
	jQuery(function($){
	    $(document).on('click', 'a.confirm', function(e) {
	        if (!window.confirm('Are you sure you want to continue?')) {
	            e.preventDefault();
	        }
	    });
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
			$( "#nama_produk" ).autocomplete({
			autoFocus: true,
			source: "<?php echo site_url('barang_masuk/get_autocomplete/?');?>"
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
			$( "#nama_produk_stok" ).autocomplete({
			autoFocus: true,
			source: "<?php echo site_url('daftar_harga/get_autocomplete/?');?>"
		});
	});
</script>

<script>
	$(document).ready(function(){
		$('#nama_produk_stok').change(function(){
		var produk = $(this).val();

			$.ajax({
				type : 'POST',
				url : '<?= site_url('daftar_harga/getsatuanstok');?>',
				data : 'produk='+produk,
				success: function(respone){
				$('#satuanstok').html(respone);
			}

			})
		})

	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
			$( "#harga_produk" ).autocomplete({
			autoFocus: true,
			source: "<?php echo site_url('penjualan/get_autocomplete/?');?>"
		});
	});
</script>

<?php $this->load->view('ajax_list'); ?>