<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i class="ace-icon fa fa-book"></i> Kelola Barang Keluar
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
		Barang Masuk Dan Keluar Berhasil dihapus.
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
				Kelola Barang Keluar
					</div>
					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama Barang</th>
									<th>Stock</th>
									<th>Terjual</th>
									<th>Tanggal Masuk</th>
									<th class="hidden-480">Tanggal Keluar</th>
								</tr>
							</thead>

							<tbody>
							<?php
							$no = 1;
							// fungsi query untuk menampilkan data dari tabel komentar
							$query = mysqli_query($mysqli, "SELECT * FROM tbl_barang, tbl_transaksi, tbl_transaksi_detail WHERE tbl_barang.id_barang=tbl_transaksi_detail.id_barang AND tbl_transaksi.id_transaksi=tbl_transaksi_detail.id_transaksi ORDER BY tbl_transaksi_detail.id_transaksi")
															or die('Ada kesalahan pada query tampil data komentar: '.mysqli_error($mysqli));

                            while ($data = mysqli_fetch_assoc($query)) { 
								$tgl     = substr($data['tanggal_masuk'],0,10);
								$exp     = explode('-',$tgl);
								$tanggal = $exp[2]."-".$exp[1]."-".$exp[0];


								$tglkeluar     = substr($data['tanggal_transaksi'],0,10);
								$expkeluar     = explode('-',$tglkeluar);
								$tanggalkeluar = $expkeluar[2]."-".$expkeluar[1]."-".$expkeluar[0];
								$jam     = substr($data['tanggal_transaksi'],11,8);
                            ?>
                            	<tr style="background:<?php echo $warna; ?>">
									<td width="30" class="center"><?php echo $no; ?></td>
									<td width="150"><?php echo $data['nama_barang']; ?></td>
									<td width="150"><?php echo $data['stok']; ?></td>
									<td width="150"><?php echo $data['terjual']?></td>
									<td width="120" align="center"><?php echo $tanggal; ?></td>
									<td width="120" align="center"><?php echo $tanggalkeluar; ?> <?php echo $jam ?></td>
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
