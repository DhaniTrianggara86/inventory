<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i style="margin-right:7px" class="ace-icon fa fa-folder-o"></i>Kelola Kategori Barang
			<a href="?module=form_kategori&form=add">
			
                <button class="btn btn-primary pull-right">
					<i class="ace-icon fa fa-plus"></i> Tambah Kategori
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
// tampilkan pesan "kategori barang berhasil disimpan"
elseif ($_GET['alert'] == 1) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		kategori berhasil disimpan.
		<br>
	</div>
<?php
} 
// jika alert = 2
// tampilkan pesan Sukses "kategori barang berhasil diubah"
elseif ($_GET['alert'] == 2) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		kategori berhasil diubah.
		<br>
	</div>
<?php
}
// jika alert = 3
// tampilkan pesan Sukses "kategori barang berhasil dihapus"
elseif ($_GET['alert'] == 3) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		kategori berhasil dihapus.
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
						Data Kategori Barang
					</div>
					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>		
									<th>No.</th>
									<th>Kategori Barang</th>
									<th>Satuan</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
							<?php
							$no = 1;
							// fungsi query untuk menampilkan data dari tabel kategori
							$query = mysqli_query($mysqli, "SELECT * FROM tbl_kategori ORDER BY id_kategori DESC")
															or die('Ada kesalahan pada query tampil data kategori: '.mysqli_error($mysqli));

                            while ($data = mysqli_fetch_assoc($query)) { 
                            	//$query2 = mysqli_query($mysqli, "SELECT COUNT(id_barang) as jumlah, id_kategori FROM tbl_barang WHERE id_kategori='$data[id_kategori]'")
									//						or die('Ada kesalahan pada query tampil data kategori: '.mysqli_error($mysqli));

                           		//$data2 = mysqli_fetch_assoc($query2);
                            ?>
                            	<tr>
									<td width="50" class="center"><?php echo $no; ?></td>
									<td width="250"><?php echo $data['nama_kategori']; ?></td>
									<td width="250"><?php echo $data['satuan']; ?></td>

									<td width="80" class="center">
										<div class="action-buttons">
											<a data-rel="tooltip" data-placement="top" title="Ubah Kategori" style="margin-right:5px" class="blue tooltip-info" href="?module=form_kategori&form=edit&id=<?php echo $data['id_kategori']; ?>">
												<i class="ace-icon fa fa-edit bigger-130"></i>
											</a>

											<a data-rel="tooltip" data-placement="top" title="Hapus Kategori" class="red tooltip-error" href="modules/kategori/proses.php?act=delete&id=<?php echo $data['id_kategori'];?>" onclick="return confirm('Anda yakin ingin menghapus kategori barang <?php echo $data['nama_kategori']; ?> ?');">
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
