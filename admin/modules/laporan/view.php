<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i class="ace-icon fa fa-file-text-o"></i>
			Laporan
		</h1>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!--PAGE CONTENT BEGINS-->
			<form class="form-horizontal" role="form" action="modules/laporan/cetak.php" method="GET" target="_blank" />
				<div class="form-group">
					<label class="col-sm-1 control-label no-padding-right">Filter</label>

					<div class="col-sm-3">
						<select class="chosen-select" name="bulan" data-placeholder="Bulan..." required>
							<option value=""></option>
							<option value="1">Januari</option>
							<option value="2">Februari</option>
							<option value="3">Maret</option>
							<option value="4">April</option>
							<option value="5">Mei</option>
							<option value="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>
					</div>

					<div class="col-sm-2">
						<select class="chosen-select" name="tahun" data-placeholder="Tahun..." required>
							<option value=""></option>
							<?php
							$query1 = mysqli_query($mysqli, "SELECT EXTRACT(YEAR FROM tanggal_transaksi) as tahun
 															FROM tbl_transaksi GROUP BY EXTRACT(YEAR FROM tanggal_transaksi)")
															or die('Ada kesalahan pada query tampil tahun: '.mysqli_error($mysqli));

							while($data1 = mysqli_fetch_assoc($query1)) { ?>
								<option value="<?php echo $data1['tahun']; ?>"><?php echo $data1['tahun']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<div class="clearfix form-actions">
						<div class="col-md-offset-1 col-md-11">
							<button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-print"></i> Cetak</button>
						</div>
					</div>
				</div>
			</form>
			<!--PAGE CONTENT ENDS-->
		</div><!--/.span-->
	</div><!--/.row-fluid-->
</div><!--/.page-content-->
