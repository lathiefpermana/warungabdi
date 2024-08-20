<script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
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

<?php $this->load->view('ajax_list'); ?>

<script src="<?= base_url('assets/libs/select2/dist/js/select2.full.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/select2/dist/js/select2.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/forms/select2.init.js'); ?>"></script>

<script src="<?= base_url('assets/js/plugins/bootstrap-validation-init.js'); ?>"></script>

<script src="<?= base_url('assets/libs/jquery.repeater/jquery.repeater.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/jquery-validation/dist/jquery.validate.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/forms/repeater-init.js'); ?>"></script>

<!-- <script src="<?= base_url('assets/libs/apexcharts/dist/apexcharts.min.js'); ?>"></script> -->
<!-- <script src="<?= base_url('assets/js/apex-chart/apex.line.init.js'); ?>"></script> -->
<!-- <script src="<?= base_url('assets/js/dashboards/dashboard.js'); ?>"></script> -->

<script type="text/javascript">
	jQuery(function($){
	    $(document).on('click', 'a.confirm', function(e) {
	        if (!window.confirm('Are you sure you want to continue?')) {
	            e.preventDefault();
	        }
	    });
	});
</script>
