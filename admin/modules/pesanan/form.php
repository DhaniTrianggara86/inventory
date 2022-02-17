<?php  
// fungsi untuk pengecekan tampilan form
// jika form detail data yang dipilih
if ($_GET['form']=='detail') { 
	 $query = mysqli_query($mysqli, "SELECT * FROM tbl_konsumen as a INNER JOIN tbl_kabkota as b INNER JOIN tbl_provinsi as c 
                                    ON a.kota=b.id_kabkota AND a.provinsi=c.id_provinsi
                                    WHERE id_konsumen='$_GET[id_konsumen]'")
                                    or die('Ada kesalahan pada query tampil data konsumen: '.mysqli_error($mysqli));

    $data = mysqli_fetch_assoc($query);

    $id_konsumen   = $data['id_konsumen'];
    $nama_konsumen = $data['nama_konsumen'];
    $alamat        = $data['alamat'];
    $id_kabkota    = $data['id_kabkota'];
    $nama_kabkota  = $data['nama_kabkota'];
    $id_provinsi   = $data['id_provinsi'];
    $nama_provinsi = $data['nama_provinsi'];
    $kode_pos      = $data['kode_pos'];
    $telepon       = $data['telepon'];
    $email         = $data['email'];
?>
 	<!-- tampilkan form detail data -->
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Detail Pesanan
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<div class="timeline-item clearfix">
					<div style="margin-left:0" class="widget-box transparent">
						<div class="widget-header widget-header-small">
							<h5 class="widget-title smaller">
								<span class="blue">Alamat Tujuan</span>
							</h5>
						</div>

						<div class="widget-body">
							<div class="widget-main">
								<p>
                                    <i style="margin-right:7px" class="fa fa-user"></i>
                                    <?php echo $nama_konsumen; ?>
                                </p>
                                <p>
                                    <i style="margin-right:7px" class="fa fa-map-marker"></i>
                                    <?php echo $alamat; ?>, <?php echo $nama_kabkota; ?>, <?php echo $nama_provinsi; ?>, <?php echo $kode_pos; ?>
                                </p>
                                <p>
                                    <i style="margin-right:7px" class="fa fa-phone"></i>
                                    <?php echo $telepon; ?>
                                </p>
							</div>
						</div>
					</div>
				</div>

				<br>

				<div class="row">
					<div class="col-xs-12">
						<div>
							<table id="simple-table" class="table table-striped table-bordered table-hover">
								<thead>
	                                <tr > 
	                                    <th>No.</th>
	                                    <th>Gambar</th>
	                                    <th>Nama Barang</th>
	                                    <th>Harga</th>
	                                    <th>Jumlah Beli</th>
	                                    <th>Jumlah Bayar</th>
	                                </tr>
	                            </thead>   

	                            <tbody>
	                            <?php
	                            $no = 1;
	                            $query = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi_detail as a INNER JOIN tbl_barang as b INNER JOIN tbl_transaksi as c
	                                                            ON a.id_barang=b.id_barang AND a.id_transaksi=c.id_transaksi
	                                                            WHERE c.id_transaksi='$_GET[id]'");
	                      
	                            while ($data = mysqli_fetch_assoc($query)) { 
	                                $id_barang    = $data['id_barang'];
	                                $jumlah_beli  = $data['jumlah_beli'];
									$jumlah_bayar = $data['jumlah_bayar'];
                                   
								
	                            ?>
	                        
	                                <tr>
	                                    <td width='40' class='center'><?php echo $no; ?></td>
	                                    <td width='60' class="center"><img src="../images/barang/<?php echo $data['gambar']; ?>" width="100"></td>
	                                    <td width='180'><?php echo $data['nama_barang']; ?></td>
	                                    <td width='120' align="right">Rp. <?php echo format_rupiah_nol($data['harga']); ?></td>
	                                    <td width='100' class="center"><?php echo $jumlah_beli; ?></td>
	                                    <td width='120' align="right">Rp. <?php echo format_rupiah_nol($jumlah_bayar); ?></td>
	                                </tr>
	                            <?php
	                                $no++;
	                            }

	                            

	                        

	                            $total_pembayaran = $jumlah_bayar;
	                            ?>
	                                <tr>
	                                    <td align="right" colspan="5"><strong>Total Harga</strong></td>
	                                    <td align="right"><strong>Rp. <?php echo $jumlah_bayar; ?></strong></td>
	                                </tr><tr>
	                                 
	                                <tr>
	                                    <td align="right" colspan="5"><strong>Total Pembayaran</strong></td>
	                                    <td align="right"><strong>Rp. <?php echo $total_pembayaran; ?></strong></td>
	                                </tr>
	                            </tbody>
							</table>
						</div>
					</div>
				</div><!-- PAGE CONTENT ENDS -->
				
				<div class="clearfix form-actions">
					<div class="col-md-offset-0 col-md-12">
						<a style="width:100px" href="?module=pesanan" class="btn">Kembali</a>
					</div>
				</div>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
?>
