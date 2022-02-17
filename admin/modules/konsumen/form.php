<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
 	<!-- tampilkan form add data -->
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Input Produk
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/konsumen/proses.php?act=insert" method="POST" enctype="multipart/form-data" />
					<div class="row">
						<div style="padding-right: 40px" class="col-xs-12 col-md-8">

<div class="form-group">
								<div class="col-sm-12">
									<input type="text" class="col-xs-12 col-sm-12" name="nama_produk" placeholder="ID Produk.." autocomplete="off" required />
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" class="col-xs-12 col-sm-12" name="nama_barang" placeholder="Nama Produk.." autocomplete="off" required />
								</div>
							</div>
							
							

							<div class="form-group">
								<div class="col-sm-12">
									<textarea class="col-xs-12 col-sm-12" id="ckeditor" name="deskripsi" required></textarea>
								</div>
							</div>

						</div>

						<div class="col-xs-12 col-md-4">

							<div>
								<label style="color:#478fca;font-size:14px;font-weight:bold">Tanggal Masuk</label>
								<div class="input-group">
									<input class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" name="tanggal_masuk" value="<?php echo date("d-m-Y"); ?>" required />
									<span class="input-group-addon">
										<i class="fa fa-calendar bigger-110"></i>
									</span>
								</div>
							</div>

							<br>

							<div>
								<label style="color:#478fca;font-size:14px;font-weight:bold">Kategori</label>
								<div>
									<select class="chosen-select" name="kategori" data-placeholder="Pilih Kategori..." required>
										<option value=""></option>
								<?php  
								$query = mysqli_query($mysqli, "SELECT id_kategori, nama_kategori FROM tbl_kategori
																ORDER BY nama_kategori ASC")
																or die('Ada kesalahan pada query tampil data kategori: '.mysqli_error($mysqli));

	                            while ($data = mysqli_fetch_assoc($query)) {
									echo"<option value=\"$data[id_kategori]\"> $data[nama_kategori] </option>";
								}
								?>	
									</select>
								</div>
							</div>
							
							<hr>
							
							<div>
								<label style="color:#478fca;font-size:14px;font-weight:bold">Harga</label>

								<div class="input-group">
									<span class="input-group-addon">Rp</span>
									<input type="text" class="form-control" name="harga" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required />
								</div>
							</div>

							<br>

							<div>
								<label style="color:#478fca;font-size:14px;font-weight:bold">Stok</label>

								<div>
									<input type="text" class="form-control" name="stok" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required />
								</div>
							</div>

							<hr>

							<div>
								<label style="color:#478fca;font-size:14px;font-weight:bold">Gambar</label>
* Ukuran max 1 MB
								<div>
									<input type="file" id="id-input-file-2" name="gambar" required />
								</div>
							</div>

						</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-0 col-md-12">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp; 
							<a style="width:100px" href="?module=konsumen" class="btn">Batal</a>
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
	    // fungsi query untuk menampilkan data dari tabel konsumen
	    $query = mysqli_query($mysqli, "SELECT * FROM tbl_konsumen as a INNER JOIN tbl_kabkota as b INNER JOIN tbl_provinsi as c 
															ON a.kota=b.id_kabkota AND a.provinsi=c.id_provinsi
															WHERE a.id_konsumen!='0' and
	    								 a.id_konsumen='$_GET[id]'") 
	    								or die('Ada kesalahan pada query tampil data ubah : '.mysqli_error($mysqli));
	    $data  = mysqli_fetch_assoc($query);

		$id_konsumen     = $data['id_konsumen'];
		
		$nama_konsumen = $data['nama_konsumen'];
		
		$tgl           = $data['tanggal_daftar'];
		$exp           = explode('-',$tgl);
		$tanggal_masuk = $exp[2]."-".$exp[1]."-".$exp[0];
		
		$alamat   = $data['alamat'];
		$telepon     = $data['telepon'];
		$email        = $data['email'];
		$kodepos        = $data['kode_pos'];
  	}
?>
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Ubah Customer
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/konsumen/proses.php?act=update" method="POST" enctype="multipart/form-data" />

					<input type="hidden" name="id" value="<?php echo $id_konsumen; ?>" />
					
					<div class="row">
						<div style="padding-right: 40px" class="col-xs-12 col-md-8">

							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" class="col-xs-12 col-sm-12" name="nama_konsumen" placeholder="Nama Konsumen.." autocomplete="off" value="<?php echo $nama_konsumen; ?>" required />
								</div>
							</div>
<div class="form-group">
								<div class="col-sm-12">
									<input type="text" class="col-xs-12 col-sm-12" name="telepon" placeholder="Telepon.." autocomplete="off" value="<?php echo $telepon; ?>" required />
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" class="col-xs-12 col-sm-12" name="email" placeholder="Nama Konsumen.." autocomplete="off" value="<?php echo $email; ?>" required />
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" class="col-xs-12 col-sm-12" name="kodepos" placeholder="Nama Konsumen.." autocomplete="off" value="<?php echo $kodepos; ?>" required />
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<textarea class="col-xs-12 col-sm-12"  name="alamat" required><?php echo $alamat; ?></textarea>
								</div>
							</div>
<div class="form-group">
								<div class="col-sm-12">
<input class="form-control date-picker" type="text" name="tanggal_masuk" value="<?php echo $tgl; ?>" required />
																	
									</div>
							</div>
						</div>

						<div class="col-xs-12 col-md-4">

							

							<br>

							
							
							
							


						</div>
					</div>
								
					<div class="clearfix form-actions">
						<div class="col-md-offset-0 col-md-12">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp; 
							<a style="width:100px" href="?module=konsumen" class="btn">Batal</a>
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
// jika form detail data yang dipilih
elseif ($_GET['form']=='detail') { 
	if (isset($_GET['id'])) {
	    // fungsi query untuk menampilkan data dari tabel konsumen
	    $query = mysqli_query($mysqli, "SELECT * FROM tbl_barang as a INNER JOIN tbl_kategori as b
										ON a.id_kategori=b.id_kategori
	    								WHERE a.id_barang='$_GET[id]'") 
	    								or die('Ada kesalahan pada query tampil data ubah : '.mysqli_error($mysqli));
	    $data  = mysqli_fetch_assoc($query);

		$id_barang     = $data['id_barang'];
		$id_kategori   = $data['id_kategori'];
		$nama_kategori = $data['nama_kategori'];
		
		$tgl           = $data['tanggal_masuk'];
		$exp           = explode('-',$tgl);
		$tanggal_masuk = $exp[2]."-".$exp[1]."-".$exp[0];
		
		$nama_barang   = $data['nama_barang'];
		$deskripsi     = $data['deskripsi'];
		$harga         = $data['harga'];
		$stok          = $data['stok'];
		$gambar        = $data['gambar'];
  	}
?>
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-user"></i>
				Kelola Customer
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<div class="row">
					<div class="col-xs-12 col-sm-3 center">
						<span class="profile-picture">
							<img class="editable img-responsive" alt="Siswa" id="avatar2" src="../images/konsumen/<?php echo $gambar; ?>" width="450" />
						</span>
					</div><!-- /.col -->

					<div class="col-xs-12 col-sm-9">
						<h4 style="font-size:25px;margin-left:14px" class="blue">
							<span style="margin-right:10px" class="middle"><?php echo $nama_barang; ?></span>
						</h4>

						<div style="font-size:14px" class="profile-user-info">
							<div class="profile-info-row">
								<div style="width:170px" class="profile-info-name"> Kategori </div>

								<div class="profile-info-value">
									<span><?php echo $nama_kategori; ?></span>
								</div>
							</div>
						</div>

						<div class="hr hr-8 dotted"></div>

						<div style="font-size:14px" class="profile-user-info">
							<div class="profile-info-row">
								<div style="width:170px" class="profile-info-name"> Deskripsi </div>

								<div class="profile-info-value">
									<span><?php echo $deskripsi; ?></span>
								</div>
							</div>
						</div>

						<div class="hr hr-8 dotted"></div>

						<div style="font-size:14px" class="profile-user-info">

							<div class="profile-info-row">
								<div style="width:170px" class="profile-info-name"> Harga </div>

								<div class="profile-info-value">
									<span>Rp. <?php echo format_rupiah_nol($harga); ?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div style="width:170px" class="profile-info-name"> Stok </div>

								<div class="profile-info-value">
									<span><?php echo $stok; ?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div style="width:170px" class="profile-info-name"> Tanggal Masuk </div>

								<div class="profile-info-value">
									<span><?php echo tgl_eng_to_ind($tanggal_masuk); ?></span>
								</div>
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
				<!--PAGE CONTENT ENDS-->

				<div class="clearfix form-actions">
				<div class="col-md-offset-0 col-md-12">
					<a style="width:100px" href="?module=form_barang&form=edit&id=<?php echo $id_barang; ?>" class="btn btn-primary">Ubah</a>
					&nbsp; &nbsp; 
					<a style="width:100px" href="?module=konsumen" class="btn">Kembali</a>
				</div>
				</div>
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
?>
