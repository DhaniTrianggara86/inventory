<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
 	<!-- tampilkan form add data -->
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Tambah Admin
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/admin/proses.php?act=insert" method="POST" />

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Username</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="username" autocomplete="off" required />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Password</label>

						<div class="col-sm-9">
							<input type="password" class="col-xs-12 col-sm-5" name="password" autocomplete="off" required />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Admin</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="nama_admin" autocomplete="off" required />
						</div>
					</div>
					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp; 
							<a style="width:100px" href="?module=admin" class="btn">Batal</a>
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
	    // fungsi query untuk menampilkan data dari tabel admin
	    $query = mysqli_query($mysqli, "SELECT * FROM tbl_admin WHERE id_admin='$_GET[id]'") 
	    								or die('Ada kesalahan pada query tampil data ubah : '.mysqli_error($mysqli));
	    $data  = mysqli_fetch_assoc($query);
  	}
?>
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Ubah Admin
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/admin/proses.php?act=update" method="POST" />

					<input type="hidden" name="id_admin" value="<?php echo $data['id_admin']; ?>" />

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Username</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="username" autocomplete="off" value="<?php echo $data['username']; ?>" required />
						</div>
					</div>
							
<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Password</label>

						<div class="col-sm-9">
							<input type="password" class="col-xs-12 col-sm-5" name="password" autocomplete="off" value="<?php echo $data['password']; ?>" required />
						</div>
					</div>
					
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Admin</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="nama_admin" autocomplete="off" value="<?php echo $data['nama_admin']; ?>" required />
						</div>
					</div>
							
					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp; 
							<a style="width:100px" href="?module=admin" class="btn">Batal</a>
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
