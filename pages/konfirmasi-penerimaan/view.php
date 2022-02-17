<?php  
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])){
    echo "<script type='text/javascript'>alert('Anda harus login terlebih dahulu!');</script>
          <meta http-equiv='refresh' content='0; url=?page=home'>";
}
// jika user sudah login, maka jalankan perintah untuk ubah password
else { ?>
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">
                        <i style="margin-right:6px" class="fa fa-retweet"></i>
                       Kelola  Konfirmasi Penerimaan
                    </h3>
                    <ol class="breadcrumb">
                        <li><a href="?page=home">Beranda</a>
                        </li>
                        <li class="active">Konfirmasi Penerimaan</li>
                    </ol>
                </div>
            </div>
        <?php  
        // fungsi untuk menampilkan pesan
        // jika alert = "" (kosong)
        // tampilkan pesan "" (kosong) 
        if (empty($_GET['alert'])) { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr > 
                                            <th>No.</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Jumlah</th>
                                            <th>Total Pembayaran</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>   

                                    <tbody>
                                    <?php
                                    $no = 1;
                                    $query = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi
                                                                    WHERE id_konsumen='$_SESSION[id_konsumen]' AND status='Proses Pengiriman'
                                                                    ORDER BY id_transaksi DESC")
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
                                            <td width='30' class='center'><?php echo $no; ?></td>
                                            <td width='100'><?php echo $tanggal_transaksi; ?></td>
                                            <td width='80'><?php echo $data1['jumlah']; ?> Barang</td>
                                            <td width='100' >Rp. <?php echo format_rupiah_nol($data['total_bayar']); ?></td>
                                            <td width='120'><?php echo $data['status']; ?></td>
                                            <td width='50' class="center">
                                                <div>
                                                    <a data-toggle="tooltip" data-placement="top" title="Konfirmasi Penerimaan" class="btn btn-primary btn-sm" href="pages/konfirmasi-penerimaan/proses.php?id=<?php echo $data['id_transaksi']; ?>">
                                                        Konfirmasi Penerimaan
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                    </tbody>           
                                </table>
                            </div>
                        </div>
                    </div> <!-- /.panel -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        <?php
        } 
        // jika alert = 1
        // tampilkan pesan Sukses "konfirmasi pembayaran Anda berhasil"
        elseif ($_GET['alert'] == 1) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><i class="glyphicon glyphicon-ok-circle"></i> Sukses!</strong> terima kasih sudah melakukan konfirmasi penerimaan barang.
            </div>
        <?php
        } 
        ?>
        </div>
    </div>
    <!-- /.row -->
<?php
}
?>

