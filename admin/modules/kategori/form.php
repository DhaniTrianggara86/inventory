<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
 	<!-- tampilkan form add data -->
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Input Kategori Barang
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/kategori/proses.php?act=insert" method="POST" />
<div class="form-group">
<input type="hidden" name="id_kategori" value="<?php echo $data['id_kategori']; ?>" />

						<div class="col-sm-9">
					
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Kategori</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="nama_kategori" autocomplete="off" required />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Satuan</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="satuan" autocomplete="off" required />
						</div>
					</div>
					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp; 
							<a style="width:100px" href="?module=kategori" class="btn">Batal</a>
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
	    // fungsi query untuk menampilkan data dari tabel kategori
	    $query = mysqli_query($mysqli, "SELECT * FROM tbl_kategori WHERE id_kategori='$_GET[id]'") 
	    								or die('Ada kesalahan pada query tampil data ubah : '.mysqli_error($mysqli));
	    $data  = mysqli_fetch_assoc($query);
  	}
?>
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Ubah Kategori Barang
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/kategori/proses.php?act=update" method="POST" />

					<input type="hidden" name="id_kategori" value="<?php echo $data['id_kategori']; ?>" />

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Kategori</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="nama_kategori" autocomplete="off" value="<?php echo $data['nama_kategori']; ?>" required />
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Satuan</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="satuan" autocomplete="off" value="<?php echo $data['satuan']; ?>" required />
						</div>
					</div>	
					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp; 
							<a style="width:100px" href="?module=kategori" class="btn">Batal</a>
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
