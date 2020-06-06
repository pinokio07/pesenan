<!DOCTYPE html>
<html>
<head>
	<title>New Data</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<!-- Datatable -->
	<link rel="stylesheet" type="text/css" href="assets/datatable/datatables.min.css">
	<!-- Select2 -->
  <link rel="stylesheet" href="assets/select2/css/select2.min.css">
  <link rel="stylesheet" href="assets/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body style="background-color: #e9ecef;">
<div class="container">
	<div class="row">
		<div class="col-12 mt-2">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Data Anggota</h5>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12 mb-2">
							<button id="tambah" type="button" class="btn btn-info shadow-sm" data-toggle="modal" data-target="#modalTambah">Tambah</button>
						</div>
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered table-sm" id="dataTable" style="width: 100%;">
									<thead>
										<tr class="text-center">
											<th>No</th>
											<th>Nama Mubayin</th>
											<th>Badan</th>
											<th>Wilayah</th>
											<th>Cabang</th>											
											<th>Telpon</th>
											<th>Hapus</th>
										</tr>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="post.php" method="POST" class="form-php">
	        	<div class="form-group row">
					    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="nama" name="nama" required="required" minlength="4">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="badan" class="col-sm-2 col-form-label">Badan</label>
					    <div class="col-sm-8">
					    	<select class="custom-select" id="badan" name="badan" required="required">
					    		<option selected="selected" disabled="disabled">Pilih...</option>
					    		<option value="Anshorulloh">Anshorulloh</option>
					    		<option value="Khuddam">Khuddam</option>
					    		<option value="Lajnah Imaillah">Lajnah Imaillah</option>
					    	</select>					      
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="wilayah" class="col-sm-2 col-form-label">Wilayah</label>
					    <div class="col-sm-8">
					    	<select class="select2bs4" id="wilayah" name="wilayah" style="width: 100%;" required="required"></select>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="cabang" class="col-sm-2 col-form-label">Cabang</label>
					    <div class="col-sm-8">
					    	<select class="select2bs4" id="cabang" name="cabang" style="width: 100%;" required="required"></select>
					    </div>					    
					  </div>
					  <div class="form-group row">
					    <label for="telp" class="col-sm-2 col-form-label">Telepon</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="telp" name="telp" required="required">
					      <small id="phoneCek" class="form-text text-danger phone-check"></small>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
					    <div class="col-sm-10">
					    	<textarea class="form-control" id="ket" name="ket" cols="3"></textarea>					      
					      <small id="phoneHelp" class="form-text text-danger info-message"></small>
					    </div>
					  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        <button type="submit" class="btn btn-primary simpan">Simpan</button>
	      </div>
	      	</form>
	    </div>
	  </div>
	</div>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/datatable/datatables.min.js"></script>
<!-- Select2 -->
<script src="assets/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		var table = $('#dataTable').DataTable({
			//responsive: true,
			pageLength: 25,
			processing: true,
			serverside: true,
			stateSave: true,
			ajax: "get.php",
			columns: [
				{data:'no',name:'no'},
				{data:'nama',name:'nama'},
				{data:'badan',name:'badan'},
				{data:'wilayah',name:'wilayah'},
				{data:'cabang',name:'cabang'},
				{data:'telp',name:'telp'},
				{data:'hapus',name:'hapus'},				
			],
			columnDefs: [
		    { className: "text-center", targets: [0] },
		  ],
		});

		//Initialize Select2 Elements
    $('.select2').select2();    
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

    function wilayahall(){
    	$.ajax({
				url: 'wilayahall.php',
				type: 'GET',
				success:function(data){
					// $('#hasil').html(data);
					$('#wilayah').html(data);					
				}
			});
    }

    function cabangall(){
    	$.ajax({
				url: 'cabangall.php',
				type: 'GET',						
				success:function(data){
					// $('#hasil').html(data);
					$('#cabang').html(data);					     
				}
			});
    }

		$('#tambah').click(function(){
			wilayahall();
			cabangall();
		});

		$('#wilayah').change(function(){
			var cabang = $('#cabang').val();
			var val = $(this).val();

			if (val != 'Pilih...') {
				$.ajax({
					url: 'cabang.php',
					type: 'POST',
					data:{
						val:val,
					},
					success:function(data){
						$('#cabang').html(data);
					}
				});
			} else {
				cabangall();
				wilayahall();
			}			
		});

		$('#cabang').change(function(){
			var wil = $('#wilayah').val();
			var val = $(this).val();	

			if (val != 'Pilih...') {
				$.ajax({
					url: 'wilayah.php',
					type: 'POST',
					data:{
						val:val,
					},
					success:function(data){
						if(wil === 'Pilih...'){
							$('#wilayah').html(data);							
						}
					}
				});
			}			
		});

		$('#telp').on('keyup keypress blur', function(){
			var val = $(this).val();

			$.ajax({
				url: 'cektelp.php',
				type: 'POST',
				data: {
					val:val,
				},
				success:function(msg){
					if (msg === "GAGAL") {
						$('.phone-check').slideDown().html('Nomor yang anda masukkan sudah dipakai');
					} else {
						$('.phone-check').slideUp();
					}
				}
			});
		});

		$('form.form-php').submit(function(e){
			e.preventDefault();
			var str = $(this).serialize();
			var this_form = $(this);
			var action = $(this).attr('action');

			$.ajax({
	    	type: "POST",
	    	url: action,
	    	data: str,
	    	success:function(msg){	    		
	    		var hasil = JSON.parse(msg);
	    		if (hasil.success === 'OK') {
	    			table.ajax.reload( null, false );
	    			$('#modalTambah').modal('hide');
	    		} else {
	    			this_form.find('.info-message').slideDown().html(hasil.gagal);
	    		}
	    	}
	    });
		});

		$(document).on('click', '.hapus', function(e){
			e.preventDefault();			
			var id = $(this).data('id');

			if(confirm('Yakin hapus data?')){
				$.ajax({
					url: 'hapus.php',
					type: 'POST',
					data:{
						id:id,
					},
					success:function(msg){
						table.ajax.reload( null, false );
					}
				});
			}			
		});

	});
</script>
</body>
</html>