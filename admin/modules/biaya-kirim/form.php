<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
 	<!-- tampilkan form add data -->
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Input Biaya Pengiriman
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/biaya-kirim/proses.php?act=insert" method="POST" />

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Provinsi</label>

						<div class="col-sm-4">
							<select class="chosen-select" name="provinsi" data-placeholder="Pilih Provinsi..." required>
								<option value=""></option>
						<?php  
						$query = mysqli_query($mysqli, "SELECT * FROM tbl_provinsi
														ORDER BY nama_provinsi ASC")
														or die('Ada kesalahan pada query tampil data Provinsi: '.mysqli_error($mysqli));

                        while ($data = mysqli_fetch_assoc($query)) {
							echo"<option value=\"$data[id_provinsi]\"> $data[nama_provinsi] </option>";
						}
						?>	
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Kabupaten/Kota</label>

						<div class="col-sm-4">
							<select class="chosen-select" name="kabkota" data-placeholder="Pilih Kabupaten/Kota..." required>
								<option value=""></option>
						<?php  
						$query = mysqli_query($mysqli, "SELECT * FROM tbl_kabkota
														ORDER BY nama_kabkota ASC")
														or die('Ada kesalahan pada query tampil data Kabupaten/Kota: '.mysqli_error($mysqli));

                        while ($data = mysqli_fetch_assoc($query)) {
							echo"<option value=\"$data[id_kabkota]\"> $data[nama_kabkota] </option>";
						}
						?>	
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Biaya</label>

						<div class="col-sm-4">
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" class="form-control" name="biaya" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required />
							</div>
						</div>
					</div>
					
					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp; 
							<a style="width:100px" href="?module=biaya_kirim" class="btn">Batal</a>
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
// jika form edit data yang dipilih
elseif ($_GET['form']=='edit') { 
	if (isset($_GET['id'])) {
	    // fungsi query untuk menampilkan data dari tabel biaya kirim
	    $query = mysqli_query($mysqli, "SELECT * FROM tbl_biaya_kirim as a INNER JOIN tbl_provinsi as b INNER JOIN tbl_kabkota as c 
										ON a.provinsi=b.id_provinsi AND a.kabkota=c.id_kabkota
										WHERE id_biaya='$_GET[id]'") 
	    								or die('Ada kesalahan pada query tampil data ubah : '.mysqli_error($mysqli));
	    $data  = mysqli_fetch_assoc($query);

	    $id_biaya = $data['id_biaya'];
	    $id_provinsi = $data['id_provinsi'];
	    $nama_provinsi = $data['nama_provinsi'];
	    $id_kabkota = $data['id_kabkota'];
	    $nama_kabkota = $data['nama_kabkota'];
	    $biaya = $data['biaya'];
  	}
?>
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Ubah Biaya Pengiriman
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/biaya-kirim/proses.php?act=update" method="POST" />

					<input type="hidden" name="id_biaya" value="<?php echo $id_biaya; ?>" />

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Provinsi</label>

						<div class="col-sm-4">
							<select class="chosen-select" name="provinsi" data-placeholder="Pilih Provinsi..." required>
								<option value="<?php echo $id_provinsi; ?>"><?php echo $nama_provinsi; ?></option>
						<?php  
						$query = mysqli_query($mysqli, "SELECT * FROM tbl_provinsi
														ORDER BY nama_provinsi ASC")
														or die('Ada kesalahan pada query tampil data Provinsi: '.mysqli_error($mysqli));

                        while ($data = mysqli_fetch_assoc($query)) {
							echo"<option value=\"$data[id_provinsi]\"> $data[nama_provinsi] </option>";
						}
						?>	
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Kabupaten/Kota</label>

						<div class="col-sm-4">
							<select class="chosen-select" name="kabkota" data-placeholder="Pilih Kabupaten/Kota..." required>
								<option value="<?php echo $id_kabkota; ?>"><?php echo $nama_kabkota; ?></option>
						<?php  
						$query = mysqli_query($mysqli, "SELECT * FROM tbl_kabkota
														ORDER BY nama_kabkota ASC")
														or die('Ada kesalahan pada query tampil data Kabupaten/Kota: '.mysqli_error($mysqli));

                        while ($data = mysqli_fetch_assoc($query)) {
							echo"<option value=\"$data[id_kabkota]\"> $data[nama_kabkota] </option>";
						}
						?>	
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Biaya</label>

						<div class="col-sm-4">
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" class="form-control" name="biaya" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $biaya; ?>" required />
							</div>
						</div>
					</div>
								
					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp; 
							<a style="width:100px" href="?module=biaya_kirim" class="btn">Batal</a>
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
?>