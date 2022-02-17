<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i style="margin-right:7px" class="ace-icon fa fa-info-circle"></i>
			Cara Pembelian
		</h1>
	</div><!-- /.page-header -->

	<?php
	// fungsi query untuk menampilkan data dari tabel informasi
	$query = mysqli_query($mysqli, "SELECT * FROM tbl_informasi WHERE id_informasi='2'")
									or die('Ada kesalahan pada query tampil data informasi : '.mysqli_error($mysqli));

    $data = mysqli_fetch_assoc($query);
    ?>
	<div class="row">
		<div class="col-xs-12">
	    <?php  
		if (isset($_GET['id'])) { ?>
			<!--PAGE CONTENT BEGINS-->
			<form class="form-horizontal" role="form" action="modules/cara-beli/proses.php" method="POST" />
				
				<input type="hidden" name="id_informasi" value="<?php echo $data['id_informasi']; ?>">

				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" class="col-xs-12 col-sm-12" name="judul" placeholder="Judul Halaman..." autocomplete="off" value="<?php echo $data['judul']; ?>" required />
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<textarea class="col-xs-12 col-sm-12" id="ckeditor" name="keterangan" required><?php echo $data['keterangan']; ?></textarea>
					</div>
				</div>
							
				<div class="clearfix form-actions">
					<div class="col-md-offset-0 col-md-12">
						<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
						&nbsp; &nbsp; 
						<a style="width:100px" href="?module=cara_beli" class="btn">Batal</a>
					</div>
				</div>
			</form>
		<?php
		}
		else {?>
			
			<div style="background:#fff;text-align:justify" class="well">
				<h4 class="blue lighter"><?php echo $data['judul']; ?></h4>
				<?php echo $data['keterangan']; ?>
			</div>

			<div class="clearfix form-actions">
				<div class="col-md-offset-0 col-md-12">
					<a style="width:100px" class="btn btn-primary" href="?module=cara_beli&id=<?php echo $data['id_informasi']; ?>">
						Ubah
					</a>
				</div>
			</div>
		
		<?php
		}
		?>
			<!--PAGE CONTENT ENDS-->
		</div><!--/.span-->
	</div><!--/.row-fluid-->
</div><!-- /.page-content -->