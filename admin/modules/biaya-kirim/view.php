<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i style="margin-right:7px" class="ace-icon fa fa-truck"></i>Kelola Biaya Pengiriman
			<a href="?module=form_biaya_kirim&form=add">
                <button class="btn btn-primary pull-right">
					<i class="ace-icon fa fa-plus"></i> Tambah
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
// tampilkan pesan "biaya pengiriman berhasil disimpan"
elseif ($_GET['alert'] == 1) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		biaya pengiriman berhasil disimpan.
		<br>
	</div>
<?php
} 
// jika alert = 2
// tampilkan pesan Sukses "biaya pengiriman berhasil diubah"
elseif ($_GET['alert'] == 2) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		biaya pengiriman berhasil diubah.
		<br>
	</div>
<?php
}
// jika alert = 3
// tampilkan pesan Sukses "biaya pengiriman berhasil dihapus"
elseif ($_GET['alert'] == 3) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		biaya pengiriman berhasil dihapus.
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
						Data Biaya Pengiriman
					</div>
					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Provinsi</th>
									<th>Kabupaten/Kota</th>
									<th>Biaya Pengiriman</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
							<?php
							$no = 1;
							// fungsi query untuk menampilkan data dari tabel biaya_kirim
							$query = mysqli_query($mysqli, "SELECT * FROM tbl_biaya_kirim as a INNER JOIN tbl_provinsi as b INNER JOIN tbl_kabkota as c 
															ON a.provinsi=b.id_provinsi AND a.kabkota=c.id_kabkota
															ORDER BY a.id_biaya DESC")
															or die('Ada kesalahan pada query tampil data biaya kirim: '.mysqli_error($mysqli));

                            while ($data = mysqli_fetch_assoc($query)) { ?>
                            	<tr>
									<td width="50" class="center"><?php echo $no; ?></td>
									<td width="200"><?php echo $data['nama_provinsi']; ?></td>
									<td width="200"><?php echo $data['nama_kabkota']; ?></td>
									<td width="100" align="right">Rp. <?php echo format_rupiah_nol($data['biaya']); ?></td>

									<td width="80" class="center">
										<div class="action-buttons">
											<a data-rel="tooltip" data-placement="top" title="Ubah" style="margin-right:5px" class="blue tooltip-info" href="?module=form_biaya_kirim&form=edit&id=<?php echo $data['id_biaya']; ?>">
												<i class="ace-icon fa fa-edit bigger-130"></i>
											</a>

											<a data-rel="tooltip" data-placement="top" title="Hapus" class="red tooltip-error" href="modules/biaya-kirim/proses.php?act=delete&id=<?php echo $data['id_biaya'];?>" onclick="return confirm('Anda yakin ingin menghapus biaya pengiriman?');">
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
