<?php  
// fungsi untuk pengecekan tampilan form
// jika form detail data yang dipilih
if ($_GET['form']=='detail') { 
	$query = mysqli_query($mysqli, "SELECT a.id_bayar,a.tanggal_bayar,a.id_transaksi,a.rekening_asal,a.no_rekening_asal,a.pemilik_rekening,a.rekening_tujuan,a.jumlah_bayar,a.bukti_bayar,a.status_bayar,
                                    b.id_transaksi,b.tanggal_transaksi,b.id_konsumen,b.total_bayar,
                                    c.id_konsumen,c.nama_konsumen, d.jumlah_beli,  f.id_barang, f.nama_barang
                                    FROM tbl_pembayaran as a INNER JOIN tbl_transaksi as b INNER JOIN tbl_konsumen as c INNER JOIN tbl_transaksi_detail as  d INNER JOIN tbl_transaksi as e INNER JOIN tbl_barang as f
                                    ON a.id_transaksi=b.id_transaksi AND b.id_konsumen=c.id_konsumen AND  d.id_barang=f.id_barang AND f.nama_barang=f.nama_barang AND d.jumlah_beli=d.jumlah_beli
                                    WHERE a.id_bayar  ='$_GET[id]'")
                                    or die('Ada kesalahan pada query tampil data konfirmasi: '.mysqli_error($mysqli));

    $data = mysqli_fetch_assoc($query);

	$id_bayar          = $data['id_bayar'];
    $id_barang 		   = $data['id_barang'];
	$nama_barang 	   = $data['nama_barang'];
	$tgl               = $data['tanggal_bayar'];
	$exp               = explode('-',$tgl);
	$tanggal_bayar     = tgl_eng_to_ind($exp[2]."-".$exp[1]."-".$exp[0]);
	
	$id_transaksi      = $data['id_transaksi'];
	
	$tgl               = substr($data['tanggal_transaksi'],0,10);
	$exp               = explode('-',$tgl);
	$tanggal_transaksi = tgl_eng_to_ind($exp[2]."-".$exp[1]."-".$exp[0]);
	
	$total_bayar       = $data['total_bayar'];
	
	$rekening_asal     = $data['rekening_asal'];
	$no_rekening_asal  = $data['no_rekening_asal'];
	$pemilik_rekening  = $data['pemilik_rekening'];
	$rekening_tujuan   = $data['rekening_tujuan'];
	$jumlah_bayar      = $data['jumlah_bayar'];
    $jumlah_beli	   = $data['jumlah_beli'];
	$bukti_bayar       = $data['bukti_bayar'];
	$status_bayar      = $data['status_bayar'];
	$id_konsumen       = $data['id_konsumen'];
	$nama_konsumen     = $data['nama_konsumen'];
	
?>
 	<!-- tampilkan form detail data -->
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Detail Pembayaran
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<div class="row">
					<div class="col-xs-12 col-sm-4 center">
						<span class="profile-picture">
							<img class="editable img-responsive" alt="Bukti Pembayaran" id="avatar2" src="../images/konfirmasi/<?php echo $bukti_bayar; ?>" width="365" />
						</span>
					</div><!-- /.col -->

		
					<div class="col-xs-12 col-sm-8">
						<div style="font-size:14px" class="profile-user-info">
							<div class="profile-info-row">
								<div style="width:190px" class="profile-info-name"> Nama Konsumen </div>

								<div class="profile-info-value">
									<span><?php echo $nama_konsumen; ?></span>
								</div>
							</div>
							<div class="col-xs-12 col-sm-8">
						<div style="font-size:14px" class="profile-user-info">
							<div class="profile-info-row">
								<div style="width:190px" class="profile-info-name"> Nama Barang</div>

								<div class="profile-info-value">
									<span><?php echo $nama_barang; ?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div style="width:190px" class="profile-info-name"> Tanggal Transaksi </div>

								<div class="profile-info-value">
									<span><?php echo $tanggal_transaksi; ?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div style="width:190px" class="profile-info-name"> Total yang harus dibayar </div>

								<div class="profile-info-value">
									<span>Rp. <?php echo format_rupiah_nol($total_bayar); ?></span>
								</div>
							</div>
						</div>

						<div class="hr hr-8 dotted"></div>

						<div style="font-size:14px" class="profile-user-info">
							<div class="profile-info-row">
								<div style="width:190px" class="profile-info-name"> Tanggal Bayar </div>

								<div class="profile-info-value">
									<span><?php echo $tanggal_bayar; ?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div style="width:190px" class="profile-info-name"> Rekening Asal </div>

								<div class="profile-info-value">
									<span><?php echo $rekening_asal; ?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div style="width:190px" class="profile-info-name"> No. Rekening Asal </div>

								<div class="profile-info-value">
									<span><?php echo $no_rekening_asal; ?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div style="width:190px" class="profile-info-name"> Pemilik Rekening </div>

								<div class="profile-info-value">
									<span><?php echo $pemilik_rekening; ?></span>
								</div>
							</div>
						</div>

						<div class="hr hr-8 dotted"></div>


						<div style="font-size:14px" class="profile-user-info">
							<div class="profile-info-row">
								<div style="width:190px" class="profile-info-name"> Rekening Tujuan </div>

								<div class="profile-info-value">
									<span><?php echo $rekening_tujuan; ?></span>
								</div>
							</div>
						
							<div class="profile-info-row">
								<div style="width:190px" class="profile-info-name"> Jumlah Pembayaran </div>

								<div class="profile-info-value">
									<span>Rp. <?php echo format_rupiah_nol($jumlah_bayar); ?></span>
								</div>
							</div>
						</div>

						<div class="hr hr-8 dotted"></div>

						<div style="font-size:14px" class="profile-user-info">
							<div class="profile-info-row">
								<div style="width:190px" class="profile-info-name"> Status </div>

								<div class="profile-info-value">
									<span><?php echo $status_bayar; ?></span>
								</div>
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
				
				<div class="clearfix form-actions">
					<div class="col-md-offset-0 col-md-12">
					<?php  
					if ($status_bayar=='Menunggu Verifikasi Pembayaran') { 
						$query1 = mysqli_query($mysqli, "SELECT COUNT(id_detail) as jumlah_beli FROM tbl_transaksi_detail
                                                        WHERE id_transaksi='$id_transaksi'")
                                                        or die('Ada kesalahan pada query detail: '.mysqli_error($mysqli));
                      
                        $data1 = mysqli_fetch_assoc($query1);
                        $jumlah_beli = $data1['jumlah_beli'];

                        $query2 = mysqli_query($mysqli, "SELECT a.id_transaksi,a.id_barang,b.id_barang,b.nama_barang,b.stok,b.terjual FROM tbl_transaksi_detail as a INNER JOIN tbl_barang as b INNER JOIN tbl_transaksi
															ON a.id_barang=b.id_barang AND a.id_transaksi=b.id_transaksi
															WHERE a.id_transaksi='$id_transaksi'")
															or die('Ada kesalahan pada query tampil data barang: '.mysqli_error($mysqli));
						$data2     = mysqli_fetch_assoc($query2);
						$id_barang = $data2['id_barang'];
                        $nama_barang= $data2['nama_barang'];
						$stok      = $data2['stok'];
						$terjual   = $data2['terjual'];
					?>
						<a style="width:100px" href="modules/konfirmasi/proses.php?act=terima&bayar=<?php echo $id_bayar; ?>&transaksi=<?php echo $id_transaksi; ?>&jumlah_beli=<?php echo $jumlah_beli; ?>&barang=<?php echo $id_barang; ?>&stok=<?php echo $stok; ?>&terjual=<?php echo $terjual; ?>" class="btn btn-primary">Terima</a>
						&nbsp; &nbsp;
						<a style="width:100px" href="modules/konfirmasi/proses.php?act=tolak&bayar=<?php echo $id_bayar; ?>&transaksi=<?php echo $id_transaksi; ?>" class="btn btn-danger">Tolak</a>
						&nbsp; &nbsp;
					<?php
					}
					?>
						<a style="width:100px" href="?module=konfirmasi" class="btn">Kembali</a>
					</div>
				</div>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
?>
