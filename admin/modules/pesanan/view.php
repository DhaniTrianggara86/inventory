<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i style="margin-right:7px" class="ace-icon fa fa-shopping-cart"></i> Kelola Data Pesanan
		</h1>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-xs-12">
					<div class="table-header">
						Data Pesanan Barang
					</div>
					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Tanggal Transaksi</th>
									<th>Konsumen</th>
								
                                    <th>Total Pembayaran</th>
                                    <th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
							<?php
                            $no = 1;
                            $query = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi as a INNER JOIN tbl_konsumen as b 
                            								ON a.id_konsumen=b.id_konsumen 
                            								ORDER BY a.id_transaksi DESC")
                                                            or die('Ada kesalahan pada query transaksi: '.mysqli_error($mysqli));
                      
                            while ($data = mysqli_fetch_assoc($query)) { 
                                $tgl               = substr($data['tanggal_transaksi'],0,10);
                                $exp               = explode('-',$tgl);
                                $tanggal_transaksi = tgl_eng_to_ind($exp[2]."-".$exp[1]."-".$exp[0]);

								$query1 = mysqli_query($mysqli, "SELECT COUNT(id_detail) as jumlah FROM tbl_transaksi_detail
								WHERE id_transaksi='$data[id_transaksi]'")
								or die('Ada kesalahan pada query detail: '.mysqli_error($mysqli));

	$data1 = mysqli_fetch_assoc($query1);
                                
                               
                            ?>
                            	<tr>
									<td width="40" class="center"><?php echo $no; ?></td>
									<td width="100" class="center"><?php echo $tanggal_transaksi; ?></td>
									<td width="150"><?php echo $data['nama_konsumen']; ?></td>
									
								
									<td width="100" align="right">Rp. <?php echo format_rupiah_nol($data['total_bayar']); ?></td>
									<td width="150"><?php echo $data['status']; ?></td>

									<td width="60" class="center">
										<div class="action-buttons">
											<a data-rel="tooltip" data-placement="top" title="Detail Pesanan" class="blue tooltip-info" href="?module=form_pesanan&form=detail&id=<?php echo $data['id_transaksi']; ?>&id_konsumen=<?php echo $data['id_konsumen']; ?>">
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
