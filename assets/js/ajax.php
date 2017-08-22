<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

$(document).ready(function () {
                
	$('#datepicker').datepicker({
  	format: "yyyy/mm/dd"
    });  
            
});

	window.onload = function() {
		tampilProduct();
		tampilCategory();
		tampilVip();
		tampilDebit();
		tampilCredit();
		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}


//Product
	function tampilProduct() {
		$.get('<?php echo base_url('Product/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-product').html(data);
			refresh();
		});
	}

	var id_product;
	$(document).on("click", ".konfirmasiHapus-product", function() {
		id_product = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataProduct", function() {
		var id = id_product;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Product/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilProduct();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataProduct", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Product/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-product').modal('show');
		})
	})

	$('#form-tambah-product').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Product/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilProduct();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-product").reset();
				$('#tambah-product').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-product', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Product/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilProduct();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-product").reset();
				$('#update-product').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-product').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-product').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


	//Category
	function tampilCategory() {
		$.get('<?php echo base_url('Category/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-category').html(data);
			refresh();
		});
	}

	var id_category;
	$(document).on("click", ".konfirmasiHapus-category", function() {
		id_category = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataCategory", function() {
		var id = id_category;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Category/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilCategory();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataCategory", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Category/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-category').modal('show');
		})
	})

	$(document).on("click", ".detail-dataCategory", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Category/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-category').modal('show');
		})
	})

	$('#form-tambah-category').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Category/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilCategory();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-category").reset();
				$('#tambah-category').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-category', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Category/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilCategory();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-category").reset();
				$('#update-category').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-category').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-category').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


//Vip
	function tampilVip() {
		$.get('<?php echo base_url('Vip/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-vip').html(data);
			refresh();
		});
	}

	var id_vip;
	$(document).on("click", ".konfirmasiHapus-vip", function() {
		id_vip = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataVip", function() {
		var id = id_vip;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Vip/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilVip();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataVip", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Vip/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-vip').modal('show');
		})
	})

	$(document).on("click", ".detail-dataVip", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Vip/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-vip').modal('show');
		})
	})

	$('#form-tambah-vip').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Vip/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilVip();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-vip").reset();
				$('#tambah-vip').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-vip', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Vip/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilVip();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-vip").reset();
				$('#update-vip').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-vip').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-vip').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})	


//Debit
	function tampilDebit() {
		$.get('<?php echo base_url('Debit/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-debit').html(data);
			refresh();
		});
	}

	var id_debit;
	$(document).on("click", ".konfirmasiHapus-debit", function() {
		id_debit = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataDebit", function() {
		var id = id_debit;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Debit/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilDebit();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataDebit", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Debit/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-debit').modal('show');
		})
	})

	$(document).on("click", ".detail-dataDebit", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Debit/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-debit').modal('show');
		})
	})

	$('#form-tambah-debit').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Debit/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilDebit();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-debit").reset();
				$('#tambah-debit').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-debit', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Debit/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilDebit();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-debit").reset();
				$('#update-debit').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-debit').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-debit').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


//Credit
	function tampilCredit() {
		$.get('<?php echo base_url('Credit/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-credit').html(data);
			refresh();
		});
	}

	var id_credit;
	$(document).on("click", ".konfirmasiHapus-credit", function() {
		id_credit = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataCredit", function() {
		var id = id_credit;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Credit/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilCredit();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataCredit", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Credit/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-credit').modal('show');
		})
	})

	$(document).on("click", ".detail-dataCredit", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Credit/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-credit').modal('show');
		})
	})

	$('#form-tambah-credit').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Credit/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilCredit();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-credit").reset();
				$('#tambah-credit').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-credit', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Credit/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilCredit();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-credit").reset();
				$('#update-credit').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-credit').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-credit').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
</script>