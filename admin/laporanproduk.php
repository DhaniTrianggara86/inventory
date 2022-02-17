<?php include "../config/database.php" ;
//include "../../tglindo.php" ;
$tgl = date('M Y');
?>
<body onLoad="javascript:print()"> 
<style type="text/css">
<!--
.style3 {font-size: 12px}
-->
.style5 {font-size: 24px}
</style>
<div style="margin:25px 0 0 150px">
            <center><img  src="../assets/img/logo3.JPG" height="60"></center>
</div>
<div class="panel-heading">
                            <table width="100%">
							<tr>
							<td><div align="center">
							<div align="center">
							C.V AMALIA PRATAMA MANUFACTURE AND ENGINEERING<br>Laporan Data Penjualan<br><hr>Tahun Penjualan Barang CV Amalia Pratama : <?php echo " $tgl";?></div>
							 </td>
							</tr>
							</table>
</div>
</table>
</div>


<table id='theList' border=1 width='100%' class='table table-bordered table-striped' cellspacing="0">
				<tr><th >No.</th>
				<th>Id Produk</th>
				<th>Nama Produk</th>
				<th>Harga</th>
				<th>Stok</th>
				<th>Tanggal Masuk</th>
				<th>Tanggal Keluar</th>
				<th>Di Beli</th>
</tr>
<?php
$sql = mysqli_query($mysqli,"SELECT * FROM tbl_barang as a INNER JOIN tbl_kategori as b INNER JOIN tbl_transaksi as c
															ON a.id_kategori=b.id_kategori
															ORDER BY a.id_barang ASC");
$no=1;
while($r = mysqli_fetch_array($sql)){

?>
<tr>
	<td class='td' align='center'><span class="style3"><?php echo $no; ?></span></td>

					<td align="center">B00-<?php echo $r['id_barang']; ?></td>
					<td><?php echo $r['nama_barang']; ?></td>
					
					<td align="right">Rp.    <?php echo number_format($r['harga'], 2, ".", ","); ?></td>
					<td align="center"><?php echo $r['stok']; ?></td>
					<td align="center"><?php echo $r['tanggal_masuk']; ?></td>
					<td align="center"><?php echo $r['tanggal_transaksi']; ?></td>
					<td align="center"><?php echo $r['terjual']; ?></td>
</tr>
<?php
$no++;
}
?>
</table>
<br>


<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
<tr>
<td width="63%" bgcolor="#FFFFFF">
<p align="center"><br/>
</td>
 <td width="37%" bgcolor="#FFFFFF"><div align="center"> <?php $tgl = date('d M Y');
echo " $tgl";?><br/>
Pemilik
<br/>
<br/>
<br/>
Asep Rahmat
<br/><br/>
<br/><br/>
(...............................)
<br/>
</div>
</td>
</tr></table> 
