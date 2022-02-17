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
                        <i style="margin-right:6px" class="fa fa-shopping-cart"></i>
                        Pembayaran
                    </h3>
                    <ol class="breadcrumb">
                        <li><a href="?page=home">Beranda</a>
                        </li>
                        <li class="active">Pembayaran</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><i class="glyphicon glyphicon-ok-circle"></i> Selamat!</strong> Anda telah berhasil melakukan proses pemesanan. <br>
                        Silahkan lakukan pembayaran ke salah satu rekening kami. Setelah itu lakukan konfirmasi pembayaran melalui menu <strong>Konfirmasi Pembayaran</strong>. Jika pembayaran belum diterima selama 3 hari maka transaksi akan dibatalkan. Terima Kasih
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                        <?php  
                        $query = mysqli_query($mysqli, "SELECT sum(total_bayar) as total FROM tbl_transaksi
                                                        WHERE id_konsumen='$_SESSION[id_konsumen]' AND status='Menunggu Pembayaran'")
                                                        or die('Ada kesalahan pada query total bayar: '.mysqli_error($mysqli));
                              
                        $data = mysqli_fetch_assoc($query);

                        $total_bayar = $data['total'];
                        ?>
                            <h4>Total yang harus dibayar : Rp. <?php echo format_rupiah_nol($total_bayar); ?></h4>
                        </div>
                    </div> <!-- /.panel -->

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4>Rekening Pembayaran</h4>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <strong>Bank Mandiri KCP Cimindi</strong><br>
                                            Nomor rekening: <strong>132-00-1305008-4</strong> <br>
                                            Atas Nama: <strong>Bapak Asep Rahmat</strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
										<strong>Bank Mandiri KCP Cimindi</strong><br>
                                            Nomor rekening: <strong>132-00-1305008-4</strong> <br>
                                            Atas Nama: <strong>Bapak Asep Rahmat</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.panel -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div>
    </div>
    <!-- /.row -->
<?php
}
?>

