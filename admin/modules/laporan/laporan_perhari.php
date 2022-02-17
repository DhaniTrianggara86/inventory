<?php 
$hari_ini=date("Y-m-d");
	?>

<h3 align="center"><span class="fa fa-file-text-o"></span>  Laporan Pemesanan Perhari</h3>
 <div class="row">
                <div class="col-md-4" style="margin-left: 10px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
						<form name="f1" method=post action="modules/laporan/cetakperhari.php" target="_blank">
						<input type="date" name="hari" class="form-control" value="<?php echo $hari_ini;?>">

						<input type="submit" name="simpan" value="Print" class="btn btn-success" style="width: 70px; margin-top: 10px; ">
						</form>
						</div>
                        <!-- /.panel-heading -->
                       
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tgl").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>
	