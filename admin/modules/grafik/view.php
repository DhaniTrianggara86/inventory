<?php  
if (isset($_POST['tahun'])) {
	$tahun = $_POST['tahun'];
} else {
	$tahun = "";
}

$query1 = mysqli_query($mysqli, "SELECT a.id_transaksi,SUM(a.jumlah_beli) as jumlah,b.id_transaksi,b.tanggal_transaksi,b.total_bayar,b.status
								FROM tbl_transaksi_detail as a INNER JOIN tbl_transaksi as b
								ON a.id_transaksi=b.id_transaksi
								WHERE EXTRACT(MONTH FROM b.tanggal_transaksi)='1' AND EXTRACT(YEAR FROM b.tanggal_transaksi)='$tahun'")
								or die('Ada kesalahan pada query tampil jumlah pesanan: '.mysqli_error($mysqli));

$data1 = mysqli_fetch_assoc($query1);
if ($data1['jumlah']=='') {
	$pesanan1 = 0;
} else {
	$pesanan1 = $data1['jumlah'];
}

$query2 = mysqli_query($mysqli, "SELECT a.id_transaksi,SUM(a.jumlah_beli) as jumlah,b.id_transaksi,b.tanggal_transaksi,b.total_bayar,b.status
								FROM tbl_transaksi_detail as a INNER JOIN tbl_transaksi as b
								ON a.id_transaksi=b.id_transaksi
								WHERE EXTRACT(MONTH FROM b.tanggal_transaksi)='2' AND EXTRACT(YEAR FROM b.tanggal_transaksi)='$tahun'")
								or die('Ada kesalahan pada query tampil jumlah pesanan: '.mysqli_error($mysqli));

$data2 = mysqli_fetch_assoc($query2);
if ($data2['jumlah']=='') {
	$pesanan2 = 0;
} else {
	$pesanan2 = $data2['jumlah'];
}

$query3 = mysqli_query($mysqli, "SELECT a.id_transaksi,SUM(a.jumlah_beli) as jumlah,b.id_transaksi,b.tanggal_transaksi,b.total_bayar,b.status
								FROM tbl_transaksi_detail as a INNER JOIN tbl_transaksi as b
								ON a.id_transaksi=b.id_transaksi
								WHERE EXTRACT(MONTH FROM b.tanggal_transaksi)='3' AND EXTRACT(YEAR FROM b.tanggal_transaksi)='$tahun'")
								or die('Ada kesalahan pada query tampil jumlah pesanan: '.mysqli_error($mysqli));

$data3 = mysqli_fetch_assoc($query3);
if ($data3['jumlah']=='') {
	$pesanan3 = 0;
} else {
	$pesanan3 = $data3['jumlah'];
}

$query4 = mysqli_query($mysqli, "SELECT a.id_transaksi,SUM(a.jumlah_beli) as jumlah,b.id_transaksi,b.tanggal_transaksi,b.total_bayar,b.status
								FROM tbl_transaksi_detail as a INNER JOIN tbl_transaksi as b
								ON a.id_transaksi=b.id_transaksi
								WHERE EXTRACT(MONTH FROM b.tanggal_transaksi)='4' AND EXTRACT(YEAR FROM b.tanggal_transaksi)='$tahun'")
								or die('Ada kesalahan pada query tampil jumlah pesanan: '.mysqli_error($mysqli));

$data4 = mysqli_fetch_assoc($query4);
if ($data4['jumlah']=='') {
	$pesanan4 = 0;
} else {
	$pesanan4 = $data4['jumlah'];
}

$query5 = mysqli_query($mysqli, "SELECT a.id_transaksi,SUM(a.jumlah_beli) as jumlah,b.id_transaksi,b.tanggal_transaksi,b.total_bayar,b.status
								FROM tbl_transaksi_detail as a INNER JOIN tbl_transaksi as b
								ON a.id_transaksi=b.id_transaksi
								WHERE EXTRACT(MONTH FROM b.tanggal_transaksi)='5' AND EXTRACT(YEAR FROM b.tanggal_transaksi)='$tahun'")
								or die('Ada kesalahan pada query tampil jumlah pesanan: '.mysqli_error($mysqli));

$data5 = mysqli_fetch_assoc($query5);
if ($data5['jumlah']=='') {
	$pesanan5 = 0;
} else {
	$pesanan5 = $data5['jumlah'];
}

$query6 = mysqli_query($mysqli, "SELECT a.id_transaksi,SUM(a.jumlah_beli) as jumlah,b.id_transaksi,b.tanggal_transaksi,b.total_bayar,b.status
								FROM tbl_transaksi_detail as a INNER JOIN tbl_transaksi as b
								ON a.id_transaksi=b.id_transaksi
								WHERE EXTRACT(MONTH FROM b.tanggal_transaksi)='6' AND EXTRACT(YEAR FROM b.tanggal_transaksi)='$tahun'")
								or die('Ada kesalahan pada query tampil jumlah pesanan: '.mysqli_error($mysqli));

$data6 = mysqli_fetch_assoc($query6);
if ($data6['jumlah']=='') {
	$pesanan6 = 0;
} else {
	$pesanan6 = $data6['jumlah'];
}

$query7 = mysqli_query($mysqli, "SELECT a.id_transaksi,SUM(a.jumlah_beli) as jumlah,b.id_transaksi,b.tanggal_transaksi,b.total_bayar,b.status
								FROM tbl_transaksi_detail as a INNER JOIN tbl_transaksi as b
								ON a.id_transaksi=b.id_transaksi
								WHERE EXTRACT(MONTH FROM b.tanggal_transaksi)='7' AND EXTRACT(YEAR FROM b.tanggal_transaksi)='$tahun'")
								or die('Ada kesalahan pada query tampil jumlah pesanan: '.mysqli_error($mysqli));

$data7 = mysqli_fetch_assoc($query7);
if ($data7['jumlah']=='') {
	$pesanan7 = 0;
} else {
	$pesanan7 = $data7['jumlah'];
}

$query8 = mysqli_query($mysqli, "SELECT a.id_transaksi,SUM(a.jumlah_beli) as jumlah,b.id_transaksi,b.tanggal_transaksi,b.total_bayar,b.status
								FROM tbl_transaksi_detail as a INNER JOIN tbl_transaksi as b
								ON a.id_transaksi=b.id_transaksi
								WHERE EXTRACT(MONTH FROM b.tanggal_transaksi)='8' AND EXTRACT(YEAR FROM b.tanggal_transaksi)='$tahun'")
								or die('Ada kesalahan pada query tampil jumlah pesanan: '.mysqli_error($mysqli));

$data8 = mysqli_fetch_assoc($query8);
if ($data8['jumlah']=='') {
	$pesanan8 = 0;
} else {
	$pesanan8 = $data8['jumlah'];
}

$query9 = mysqli_query($mysqli, "SELECT a.id_transaksi,SUM(a.jumlah_beli) as jumlah,b.id_transaksi,b.tanggal_transaksi,b.total_bayar,b.status
								FROM tbl_transaksi_detail as a INNER JOIN tbl_transaksi as b
								ON a.id_transaksi=b.id_transaksi
								WHERE EXTRACT(MONTH FROM b.tanggal_transaksi)='9' AND EXTRACT(YEAR FROM b.tanggal_transaksi)='$tahun'")
								or die('Ada kesalahan pada query tampil jumlah pesanan: '.mysqli_error($mysqli));

$data9 = mysqli_fetch_assoc($query9);
if ($data9['jumlah']=='') {
	$pesanan9 = 0;
} else {
	$pesanan9 = $data9['jumlah'];
}

$query10 = mysqli_query($mysqli, "SELECT a.id_transaksi,SUM(a.jumlah_beli) as jumlah,b.id_transaksi,b.tanggal_transaksi,b.total_bayar,b.status
								FROM tbl_transaksi_detail as a INNER JOIN tbl_transaksi as b
								ON a.id_transaksi=b.id_transaksi
								WHERE EXTRACT(MONTH FROM b.tanggal_transaksi)='10' AND EXTRACT(YEAR FROM b.tanggal_transaksi)='$tahun'")
								or die('Ada kesalahan pada query tampil jumlah pesanan: '.mysqli_error($mysqli));

$data10 = mysqli_fetch_assoc($query10);
if ($data10['jumlah']=='') {
	$pesanan10 = 0;
} else {
	$pesanan10 = $data10['jumlah'];
}

$query11 = mysqli_query($mysqli, "SELECT a.id_transaksi,SUM(a.jumlah_beli) as jumlah,b.id_transaksi,b.tanggal_transaksi,b.total_bayar,b.status
								FROM tbl_transaksi_detail as a INNER JOIN tbl_transaksi as b
								ON a.id_transaksi=b.id_transaksi
								WHERE EXTRACT(MONTH FROM b.tanggal_transaksi)='11' AND EXTRACT(YEAR FROM b.tanggal_transaksi)='$tahun'")
								or die('Ada kesalahan pada query tampil jumlah pesanan: '.mysqli_error($mysqli));

$data11 = mysqli_fetch_assoc($query11);
if ($data11['jumlah']=='') {
	$pesanan11 = 0;
} else {
	$pesanan11 = $data11['jumlah'];
}

$query12 = mysqli_query($mysqli, "SELECT a.id_transaksi,SUM(a.jumlah_beli) as jumlah,b.id_transaksi,b.tanggal_transaksi,b.total_bayar,b.status
								FROM tbl_transaksi_detail as a INNER JOIN tbl_transaksi as b
								ON a.id_transaksi=b.id_transaksi
								WHERE EXTRACT(MONTH FROM b.tanggal_transaksi)='12' AND EXTRACT(YEAR FROM b.tanggal_transaksi)='$tahun'")
								or die('Ada kesalahan pada query tampil jumlah pesanan: '.mysqli_error($mysqli));

$data12 = mysqli_fetch_assoc($query12);
if ($data12['jumlah']=='') {
	$pesanan12 = 0;
} else {
	$pesanan12 = $data12['jumlah'];
}
// --------------------------------------------------------------------------------------------------------------------------------------------

?>

<script src="assets/plugins/highcharts/jquery.min.js"></script>
<script src="assets/plugins/highcharts/highcharts.js"></script>

<script type="text/javascript">
var chart1; // globally available
$(document).ready(function() {
    chart1 = new Highcharts.Chart({
        chart: {
            renderTo: 'grafik',
            type: 'column'
        },   
        title: {
            text: 'Grafik Jumlah Penjualan Barang<br> Tahun <?php echo $tahun; ?>'
        },
        xAxis: {
            categories: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']
        },
        yAxis: {
            title: {
               text: 'Jumlah Penjualan'
            }
        },
        tooltip: { 
            //fungsi tooltip, ini opsional, kegunaan dari fungsi ini 
            //akan menampikan data di titik tertentu di grafik saat mouseover
            formatter: function() {
                    return '<b>Bulan: '+ this.x +'</b><br/>'+'Jumlah Penjualan: '+ this.y +' Barang';
            }
        },
            series:             
            [{
                name: 'Barang',
                data: [<?php echo $pesanan1; ?>,<?php echo $pesanan2; ?>,<?php echo $pesanan3; ?>,<?php echo $pesanan4; ?>,<?php echo $pesanan5; ?>,<?php echo $pesanan6; ?>,<?php echo $pesanan7; ?>,<?php echo $pesanan8; ?>,<?php echo $pesanan9; ?>,<?php echo $pesanan10; ?>,<?php echo $pesanan11; ?>,<?php echo $pesanan12; ?>]
            }
            ]
      });
   });	
</script>

<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i class="ace-icon fa fa-bar-chart"></i>
			Kelola Grafik Penjualan
		</h1> 
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!--PAGE CONTENT BEGINS-->
			<form class="form-horizontal" role="form" action="?module=grafik" method="POST" />
				<div class="form-group">
					<label class="col-sm-1 control-label no-padding-right">Tahun</label>

					<div class="col-sm-2">
						<select class="chosen-select" id="tahun" name="tahun" data-placeholder="Pilih Tahun..." required>
							<option value="<?php echo $tahun; ?>"><?php echo $tahun; ?></option>
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
							
				<div class="clearfix form-actions">
					<div class="col-md-offset-1 col-md-11">
						<input style="width:100px" type="submit" class="btn btn-primary" name="tampil" value="Tampilkan" />
					</div>
				</div>
			</form>

			<div class="row">
			<?php
			if (isset($_POST['tahun'])) { ?>
				<div style="margin-bottom:20px" class="col-xs-12">
					<div class="widget-box">
						<div class="widget-body">
							<div class="widget-main">
								<div id="grafik" style="max-width:95%;"></div>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			?>
			</div><!-- PAGE CONTENT ENDS -->
			<!--PAGE CONTENT ENDS-->
		</div><!--/.span-->
	</div><!--/.row-fluid-->
</div><!--/.page-content-->

