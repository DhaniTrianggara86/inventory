<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i class="ace-icon fa fa-comments"></i> Komentar
		</h1>
	</div><!-- /.page-header -->

<?php
// fungsi untuk menampilkan pesan
// jika alert = "" (kosong)
// tampilkan pesan "" (kosong)
if (empty($_GET['alert'])) {
}
// jika alert = 1
// tampilkan pesan Sukses "komentar berhasil dihapus"
elseif ($_GET['alert'] == 1) { ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
		komentar berhasil dihapus.
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
						Komentar
					</div>
					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Barang</th>
									<th>Nama</th>
									<th class="hidden-480">Email</th>
									<th>Komentar</th>
									<th class="hidden-480">Tanggal</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
							<?php
							$no = 1;
							// fungsi query untuk menampilkan data dari tabel komentar
							$query = mysqli_query($mysqli, "SELECT * FROM tbl_komentar as a INNER JOIN tbl_barang as b INNER JOIN tbl_konsumen as c
															ON a.id_barang=b.id_barang AND a.id_konsumen=c.id_konsumen 
															WHERE a.balas='0' ORDER BY a.id_komentar DESC")
															or die('Ada kesalahan pada query tampil data komentar: '.mysqli_error($mysqli));

                            while ($data = mysqli_fetch_assoc($query)) { 
								$tgl     = substr($data['tanggal'],0,10);
								$exp     = explode('-',$tgl);
								$tanggal = $exp[2]."-".$exp[1]."-".$exp[0];
								
								$jam     = substr($data['tanggal'],11,8);

                            	if ($data['status']=='y') {
                            		$warna = "";
                            	} else {
                            		$warna = "#fcf8e3";
                            	}
                            ?>
                            	<tr style="background:<?php echo $warna; ?>">
									<td width="30" class="center"><?php echo $no; ?></td>
									<td width="150"><?php echo $data['nama_barang']; ?></td>
									<td width="120"><?php echo $data['nama_konsumen']; ?></td>
									<td width="100" class="hidden-480"><?php echo $data['email']; ?></td>
									<td width="240"><?php echo $data['komentar']; ?></td>
									<td width="70" class="hidden-480"><?php echo $tanggal; ?> <?php echo $jam; ?></td>

									<td width="60" class="center">
										<div class="action-buttons">
											<a data-rel="tooltip" data-placement="top" title="Balas" style="margin-right:5px" class="blue tooltip-info" href="?module=form_komentar&form=reply&id=<?php echo $data['id_komentar']; ?>">
												<i class="ace-icon fa fa-reply bigger-130"></i>
											</a>

											<a data-rel="tooltip" data-placement="top" title="Hapus" class="red tooltip-error" href="modules/komentar/proses.php?act=delete&id=<?php echo $data['id_komentar'];?>" onclick="return confirm('Anda yakin ingin menghapus komentar dari <?php echo $data['nama_konsumen']; ?> ?');">
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
