<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i style="margin-right:7px" class="ace-icon fa fa-retweet"></i> Kelola Persetujuan Order
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
		<strong><i class="ace-icon fa fa-check-circle"></i> Pembayaran diterima </strong>
		<br>
	</div>
<?php
} 
// jika alert = 2
// tampilkan pesan Sukses "kategori barang berhasil diubah"
elseif ($_GET['alert'] == 2) { ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong><i class="ace-icon fa fa-times-circle"></i> Pembayaran ditolak </strong>
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
					Kelola Persetujuan Order
					</div>
					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Tanggal Pembayaran</th>
									<th>Konsumen</th>
								
									<th>Jumlah Beli</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
							<?php
                            $no = 1;
                            $query = mysqli_query($mysqli, "SELECT DISTINCT a.id_bayar,a.tanggal_bayar,a.id_transaksi,a.status_bayar,
                                                            b.id_transaksi,b.tanggal_transaksi,b.total_bayar,
                                                            c.id_konsumen,c.nama_konsumen,e.jumlah_beli
                                                            FROM tbl_pembayaran as a CROSS JOIN tbl_transaksi as b CROSS JOIN tbl_konsumen as c CROSS JOIN tbl_barang as d inner JOIN tbl_transaksi_detail as e
                                                            ON c.id_konsumen=b.id_konsumen 
                                                            WHERE a.status_bayar!='Menunggu Pembayaran'
                                                            ORDER BY a.id_bayar,a.tanggal_bayar,b.id_konsumen,b.total_bayar, e.jumlah_beli  DESC")
                                                            or die('Ada kesalahan pada query konfirmasi: '.mysqli_error($mysqli));
                      
                            while ($data = mysqli_fetch_array($query)) { 
								
								$tgl           = $data['tanggal_bayar'];
                                $jumlah_beli   = $data['jumlah_beli'];
								$exp           = explode('-',$tgl);
								$tanggal_bayar = tgl_eng_to_ind($exp[2]."-".$exp[1]."-".$exp[0]);
                               
								$query1 = mysqli_query($mysqli, "SELECT COUNT(id_detail) as jumlah_beli FROM tbl_transaksi_detail
								WHERE id_transaksi='$data[id_transaksi]'")
								or die('Ada kesalahan pada query detail: '.mysqli_error($mysqli));

	$data1 = mysqli_fetch_assoc($query1);
                                
                            ?>
                            	<tr>
									<td width="40" class="center"><?php echo $no; ?></td>
									<td width="100" class="center"><?php echo $tanggal_bayar; ?></td>
									<td width="150"><?php echo $data['nama_konsumen']; ?></td>
									<td width="150"><?php echo $data['jumlah_beli']; ?></td>
									<td width="100" align="right">Rp. <?php echo format_rupiah_nol($data['total_bayar']); ?></td>
									<td width="150"><?php echo $data['status_bayar']; ?></td>

									<td width="60" class="center">
										<div class="action-buttons">
											<a data-rel="tooltip" data-placement="top" title="Detail Persetujuan" class="blue tooltip-info" href="?module=form_konfirmasi&form=detail&id=<?php echo $data['id_bayar']; ?>">
												<i class="ace-icon fa fa-search-plus bigger-130"></i>
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
