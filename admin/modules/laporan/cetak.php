<?php
session_start();
ob_start();

// panggil file database.php untuk koneksi ke database
require_once "../../../config/database.php";
// panggil fungsi untuk format tanggal
require_once "../../../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
require_once "../../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");
// ambil data dari submit form
if (isset($_GET['bulan'])) {
    if ($_GET['bulan']=='1') {
        $bulan = "Januari";
    } elseif ($_GET['bulan']=='2') {
        $bulan = "Februari";
    } elseif ($_GET['bulan']=='3') {
        $bulan = "Maret";
    } elseif ($_GET['bulan']=='4') {
        $bulan = "April";
    } elseif ($_GET['bulan']=='5') {
        $bulan = "Mei";
    } elseif ($_GET['bulan']=='6') {
        $bulan = "Juni";
    } elseif ($_GET['bulan']=='7') {
        $bulan = "Juli";
    } elseif ($_GET['bulan']=='8') {
        $bulan = "Agustus";
    } elseif ($_GET['bulan']=='9') {
        $bulan = "September";
    } elseif ($_GET['bulan']=='10') {
        $bulan = "Oktober";
    } elseif ($_GET['bulan']=='11') {
        $bulan = "November";
    } elseif ($_GET['bulan']=='12') {
        $bulan = "Desember";
    }

    $tahun = $_GET['tahun'];
} else {
    $bulan = "";
    $tahun = "";
}

// fungsi query untuk menampilkan data dari tabel siswa dan kelas
$query = mysqli_query($mysqli, "SELECT a.id_transaksi,a.id_barang,a.jumlah_beli,
                                b.id_transaksi,b.tanggal_transaksi,b.total_bayar,b.status,
                                c.id_barang,c.nama_barang,c.harga
                                FROM tbl_transaksi_detail as a INNER JOIN tbl_transaksi as b INNER JOIN tbl_barang as c
                                ON a.id_transaksi=b.id_transaksi AND a.id_barang=c.id_barang
                                WHERE EXTRACT(MONTH FROM b.tanggal_transaksi)='$_GET[bulan]' AND EXTRACT(YEAR FROM b.tanggal_transaksi)='$_GET[tahun]'
                                GROUP BY c.nama_barang ORDER BY a.id_transaksi ASC")
                                or die('Ada kesalahan pada query tampil data transaksi: '.mysqli_error($mysqli));

$rows = mysqli_num_rows($query);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>LAPORAN JUMLAH PENJUALAN BARANG</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title-perusahaan">
      C.V AMALIA PRATAMA MANUFACTURE AND ENGINEERING
        </div>

        <div id="title-alamat">
            Alamat: Jl Pasir Impun No 9 Mandala Jati Bandung
        </div>

        <div style="margin:-60px 0 0 100px">
            <img src="../../assets/img/cv_amalia.PNG" height="60">
        </div>

        <hr><br>

        <div id="title">
            LAPORAN JUMLAH PENJUALAN BARANG
        </div>

        <div id="title-tanggal">
            Bulan <?php echo $bulan; ?> <?php echo $tahun; ?>
        </div>

        <br>

        <div id="isi">
            <table width="100%" border="0.5" cellpadding="0" cellspacing="0">
                <tr class="tr-title">
                    <th height="25" align="center" valign="middle">No.</th>
                    <th height="25" align="center" valign="middle">Nama Barang</th>
                    <th height="25" align="center" valign="middle">Harga</th>
                    <th height="25" align="center" valign="middle">Jumlah</th>
                    <th height="25" align="center" valign="middle">Total Pembayaran</th>
                </tr>

                <?php
                for($i=1; $i<=$rows; $i++) {
                    $data              = mysqli_fetch_assoc($query);
                    
                    $tanggal           = substr($data['tanggal_transaksi'],0,10);
                    $tgl               = explode('-',$tanggal);
                    $tanggal_transaksi = tgl_eng_to_ind($tgl[2]."-".$tgl[1]."-".$tgl[0]);
                    
                    $nama_barang       = $data['nama_barang'];
                    $harga             = $data['harga'];

                    $query1 = mysqli_query($mysqli, "SELECT a.id_transaksi,a.id_barang,SUM(a.jumlah_beli) as total,
                                b.id_transaksi,b.tanggal_transaksi,b.total_bayar,b.status,
                                c.id_barang,c.nama_barang,c.harga
                                FROM tbl_transaksi_detail as a INNER JOIN tbl_transaksi as b INNER JOIN tbl_barang as c
                                ON a.id_transaksi=b.id_transaksi AND a.id_barang=c.id_barang
                                WHERE c.nama_barang='$nama_barang' AND EXTRACT(MONTH FROM b.tanggal_transaksi)='$_GET[bulan]' AND EXTRACT(YEAR FROM b.tanggal_transaksi)='$_GET[tahun]'")
                                or die('Ada kesalahan pada query tampil data jumlah: '.mysqli_error($mysqli));

                    $data1 = mysqli_fetch_assoc($query1);
                    $jumlah_beli = $data1['total'];
                    $total_bayar = $harga * $jumlah_beli;
                ?>  
                <tr>
                    <td width="50" height="14" align="center" valign="middle"><?=$i?></td>
                    <td style="padding-left:5px;" width="210" height="14" valign="middle"><?=$nama_barang?></td>
                    <td style="padding-right:5px;" width="150" height="14" align="right" valign="middle">Rp. <?=format_rupiah_nol($harga)?></td>
                    <td width="120" height="14" align="center" valign="middle"><?=$jumlah_beli?></td>
                    <td style="padding-right:5px;" width="150" height="14" align="right" valign="middle">Rp. <?=format_rupiah_nol($total_bayar)?></td>
                </tr>
                <?php 
                } 
                    $query2 = mysqli_query($mysqli, "SELECT a.id_transaksi,a.id_barang,SUM(a.jumlah_beli) as total,
                                b.id_transaksi,b.tanggal_transaksi,b.total_bayar,b.status,
                                c.id_barang,c.nama_barang,c.harga
                                FROM tbl_transaksi_detail as a INNER JOIN tbl_transaksi as b INNER JOIN tbl_barang as c
                                ON a.id_transaksi=b.id_transaksi AND a.id_barang=c.id_barang
                                WHERE EXTRACT(MONTH FROM b.tanggal_transaksi)='$_GET[bulan]' AND EXTRACT(YEAR FROM b.tanggal_transaksi)='$_GET[tahun]'")
                                or die('Ada kesalahan pada query tampil data jumlah: '.mysqli_error($mysqli));

                    $data2 = mysqli_fetch_assoc($query2);
                    $total_jumlah_beli = $data2['total'];

                    $query3 = mysqli_query($mysqli, "SELECT a.id_transaksi,a.id_barang,SUM(a.jumlah_bayar) as total,
                                b.id_transaksi,b.tanggal_transaksi,b.total_bayar,b.status,
                                c.id_barang,c.nama_barang,c.harga
                                FROM tbl_transaksi_detail as a INNER JOIN tbl_transaksi as b INNER JOIN tbl_barang as c
                                ON a.id_transaksi=b.id_transaksi AND a.id_barang=c.id_barang
                                WHERE EXTRACT(MONTH FROM b.tanggal_transaksi)='$_GET[bulan]' AND EXTRACT(YEAR FROM b.tanggal_transaksi)='$_GET[tahun]'")
                                or die('Ada kesalahan pada query tampil data jumlah: '.mysqli_error($mysqli));

                    $data3 = mysqli_fetch_assoc($query3);
                    $total_seluruh = $data3['total'];
                ?>
                <tr>
                    <td height="14" align="center" valign="middle" colspan="3"><strong>Jumlah Total</strong></td>
                    <td height="14" align="center" valign="middle"><strong><?=$total_jumlah_beli?></strong></td>
                    <td style="padding-right:5px;" height="14" align="right" valign="middle"><strong>Rp. <?=format_rupiah_nol($total_seluruh)?></strong></td>
                </tr>
            </table>
        </div>

        <div id="footer-tanggal">
           Bandung, <?php echo tgl_eng_to_ind($hari_ini); ?>
        </div>

        <div id="footer-nama">
            Asep Rahmat
        </div>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="LAPORAN JUMLAH PENJUALAN BARANG.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
require_once('../../assets/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(8, 10, 8, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>
