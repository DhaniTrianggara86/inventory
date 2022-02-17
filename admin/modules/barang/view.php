<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i class="ace-icon fa fa-folder-o"></i> Kelola  Barang Masuk
			<a href="?module=form_barang&form=add">
                <button class="btn btn-primary pull-right">
					<i class="ace-icon fa fa-plus"></i> Tambah Barang
				</button>
            </a>
		</h1>
	</div><!-- /.page-header -->

<?php
// fungsi untuk menampilkan pesan
// jika alert = "" (kosong)
// tampilkan pesan "" (kosong)
if (empty($_GET['alert'])) {
}
// jika alert = 1
// tampilkan pesan "data barang baru berhasil disimpan"
elseif ($_GET['alert'] == 1) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		data baru berhasil disimpan.
		<br>
	</div>
<?php
} 
// jika alert = 2
// tampilkan pesan Sukses "data barang berhasil diubah"
elseif ($_GET['alert'] == 2) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		data berhasil diubah.
		<br>
	</div>
<?php
}
// jika alert = 3
// tampilkan pesan Sukses "barang berhasil dihapus"
elseif ($_GET['alert'] == 3) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		data berhasil dihapus.
		<br>
	</div>
<?php
}
// jika alert = 4
// tampilkan pesan Upload Gagal "pastikan file yang diupload sudah benar"
elseif ($_GET['alert'] == 4) { ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-times-circle"></i> Upload Gagal! </strong><br>
		pastikan file yang diupload sudah benar.
		<br>
	</div>
<?php
}
// jika alert = 5
// tampilkan pesan Upload Gagal "pastikan ukuran foto tidak lebih dari 1MB"
elseif ($_GET['alert'] == 5) { ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-times-circle"></i> Upload Gagal! </strong><br>
		pastikan ukuran foto tidak lebih dari 1MB.
		<br>
	</div>
<?php
} 
// jika alert = 6
// tampilkan pesan Upload Gagal "pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG"
elseif ($_GET['alert'] == 6) { ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-times-circle"></i> Upload Gagal! </strong><br>
		pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG.
		<br>
	</div>
<?php
}
?>

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-xs-12">
					<div class="table-header">
						Data Barang
					</div>
					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th class="hidden-480">Gambar</th>
									<th>Nama Barang</th>
									<th>Harga</th>
									<th>Stok</th>
									<th class="hidden-480">Tanggal Masuk</th>
									<th>Satuan</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
							<?php
							$no = 1;
							// fungsi query untuk menampilkan data dari tabel barang
							$query = mysqli_query($mysqli, "SELECT * FROM tbl_barang as a INNER JOIN tbl_kategori as b
															ON a.id_kategori=b.id_kategori
															ORDER BY a.id_barang DESC")
															or die('Ada kesalahan pada query tampil data barang: '.mysqli_error($mysqli));

                            while ($data = mysqli_fetch_assoc($query)) { 
								$tgl           = $data['tanggal_masuk'];
								$exp           = explode('-',$tgl);
								$tanggal_masuk = $exp[2]."-".$exp[1]."-".$exp[0];
                            ?>
                            	<tr>
									<td width="30" class="center"><?php echo $no; ?></td>
									<td width="70"  class="hidden-480 center">
										<img style="padding:1px" class="profile-picture" src="../images/barang/<?php echo $data['gambar']; ?>" width="120">
									</td>
									<td width="200">
										<a href="?module=form_barang&form=detail&id=<?php echo $data['id_barang']; ?>">
											<?php echo $data['nama_barang']; ?>
											
										</a>
									</td>
									<td width="80" align="right">Rp. <?php echo format_rupiah_nol($data['harga']); ?></td>
									<td width="80" align="right"><?php echo $data['stok']; ?></td>
									<td width="100" class="hidden-480 center"><?php echo $tanggal_masuk; ?></td>
									<td width="80" align="right"><?php echo $data['satuan']; ?></td>
									<td width="60" class="center">
										<div class="action-buttons">
											<a data-rel="tooltip" data-placement="top" title="Ubah Barang" style="margin-right:5px" class="blue tooltip-info" href="?module=form_barang&form=edit&id=<?php echo $data['id_barang']; ?>">
												<i class="ace-icon fa fa-edit bigger-130"></i>
											</a>

											<a data-rel="tooltip" data-placement="top" title="Hapus Barang" class="red tooltip-error" href="modules/barang/proses.php?act=delete&id=<?php echo $data['id_barang'];?>" onclick="return confirm('Anda yakin ingin menghapus barang <?php echo $data['nama_barang']; ?> ?');">
												<i class="ace-icon fa fa-trash-o bigger-130"></i>
											</a>
										</div>
									</td>
								</tr>
							<?php
                            	$no++;
                            } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
