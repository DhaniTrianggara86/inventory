<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i class="ace-icon fa fa-user"></i> Kelola Data Customer
		</h1>
	</div><!-- /.page-header -->

<?php
// fungsi untuk menampilkan pesan
// jika alert = "" (kosong)
// tampilkan pesan "" (kosong)
if (empty($_GET['alert'])) {
}
?>

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-xs-12">
					<div class="table-header">
						Kelola Data Customer
					</div>
					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama konsumen</th>
									<th>Alamat</th>
									<th>Telepon</th>
									<th>Email</th>
									<th class="hidden-480">Tanggal Daftar</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
							<?php
							$no = 1;
							// fungsi query untuk menampilkan data dari tabel konsumen
							$query = mysqli_query($mysqli, "SELECT * FROM tbl_konsumen as a INNER JOIN tbl_kabkota as b INNER JOIN tbl_provinsi as c 
															ON a.kota=b.id_kabkota AND a.provinsi=c.id_provinsi
															WHERE a.id_konsumen!='0'
															ORDER BY a.id_konsumen DESC")
															or die('Ada kesalahan pada query tampil data konsumen: '.mysqli_error($mysqli));

                            while ($data = mysqli_fetch_assoc($query)) { 
								$tgl            = substr($data['tanggal_daftar'],0,10);
								$exp            = explode('-',$tgl);
								$tanggal_daftar = $exp[2]."-".$exp[1]."-".$exp[0];
                            ?>
                            	<tr>
									<td width="30" class="center"><?php echo $no; ?></td>
									<td width="180"><?php echo $data['nama_konsumen']; ?></td>
									<td width="280">
										<?php echo $data['alamat']; ?>, <?php echo $data['nama_kabkota']; ?>, <?php echo $data['nama_provinsi']; ?>, Kode Pos <?php echo $data['kode_pos']; ?>
									</td>
									<td width="60" align="center"><?php echo $data['telepon']; ?></td>
									<td width="100"><?php echo $data['email']; ?></td>
									<td width="110" class="hidden-480 center"><?php echo $tanggal_daftar; ?></td>
									<td width="60" class="center">
										<div class="action-buttons">
											<a data-rel="tooltip" data-placement="top" title="Ubah Customer" style="margin-right:5px" class="blue tooltip-info" href="?module=form_konsumen&form=edit&id=<?php echo $data['id_konsumen']; ?>">
												<i class="ace-icon fa fa-edit bigger-130"></i>
											</a>

											<a data-rel="tooltip" data-placement="top" title="Hapus Customer" class="red tooltip-error" href="modules/konsumen/proses.php?act=delete&id=<?php echo $data['id_konsumen'];?>" onclick="return confirm('Anda yakin ingin menghapus Customer <?php echo $data['nama_konsumen']; ?> ?');">
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
