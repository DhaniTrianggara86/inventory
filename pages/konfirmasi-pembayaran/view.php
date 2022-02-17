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
                      Kelola  Konfirmasi Pembayaran
                    </h3>
                    <ol class="breadcrumb">
                        <li><a href="?page=home">Beranda</a>
                        </li>
                        <li class="active">Konfirmasi Pembayaran</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?php  
                    // fungsi untuk menampilkan pesan
                    // jika alert = "" (kosong)
                    // tampilkan pesan "" (kosong) 
                    if (empty($_GET['alert'])) {
                      echo "";
                    } 
                    // jika alert = 1
                    // tampilkan pesan Sukses "konfirmasi pembayaran Anda berhasil"
                    elseif ($_GET['alert'] == 1) { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong><i class="glyphicon glyphicon-ok-circle"></i> Sukses!</strong> konfirmasi pembayaran Anda berhasil.
                        </div>
                    <?php
                    } 
                    // jika alert = 2
                    // tampilkan pesan Upload Gagal "pastikan file yang diupload sudah benar"
                    elseif ($_GET['alert'] == 2) { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong><i class="glyphicon glyphicon-alert"></i> Upload Gagal!!</strong> pastikan file bukti pembayaran yang diupload sudah benar.
                        </div>
                    <?php
                    } 
                    // jika alert = 3
                    // tampilkan pesan Upload Gagal "pastikan ukuran file bukti pembayaran tidak lebih dari 1MB"
                    elseif ($_GET['alert'] == 3) { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong><i class="glyphicon glyphicon-alert"></i> Upload Gagal!!</strong> pastikan ukuran file bukti pembayaran tidak lebih dari 1MB.
                        </div>
                    <?php
                    } 
                    // jika alert = 4
                    // tampilkan pesan Upload Gagal "pastikan file bukti pembayaran yang diupload bertipe *.JPG, *.JPEG, *.PNG"
                    elseif ($_GET['alert'] == 4) { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong><i class="glyphicon glyphicon-alert"></i> Upload Gagal!!</strong> pastikan file bukti pembayaran yang diupload bertipe *.JPG, *.JPEG, *.PNG.
                        </div>
                    <?php
                    } 
                    ?>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr > 
                                            <th>No.</th>
                                            <th>Tanggal Transaksi</th>
                                       
                                            <th>Total Pembayaran</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>   

                                    <tbody>
                                    <?php
                                    $no = 1;
                                    $query = mysqli_query($mysqli, "SELECT a.id_bayar,a.id_transaksi,a.status_bayar,
                                                                    b.id_transaksi,b.tanggal_transaksi,b.id_konsumen,b.total_bayar
                                                                    FROM tbl_pembayaran as a INNER JOIN tbl_transaksi as b
                                                                    ON a.id_transaksi=b.id_transaksi
                                                                    WHERE b.id_konsumen='$_SESSION[id_konsumen]'
                                                                    ORDER BY a.id_bayar DESC")
                                                                    or die('Ada kesalahan pada query konfirmasi: '.mysqli_error($mysqli));
                              
                                    while ($data = mysqli_fetch_assoc($query)) { 
                                        $tgl               = substr($data['tanggal_transaksi'],0,10);
                                        $exp               = explode('-',$tgl);
                                        $tanggal_transaksi = tgl_eng_to_ind($exp[2]."-".$exp[1]."-".$exp[0]);

                                        $query1 = mysqli_query($mysqli, "SELECT COUNT(id_detail) as jumlah_beli FROM tbl_transaksi_detail
                                                                    WHERE id_transaksi='$data[id_transaksi]'")
                                                                    or die('Ada kesalahan pada query detail: '.mysqli_error($mysqli));
                              
                                        $data1 = mysqli_fetch_assoc($query1);
                                    ?>
                                        <tr>
                                            <td width='30' class='center'><?php echo $no; ?></td>
                                            <td width='100'><?php echo $tanggal_transaksi; ?></td>
                                         
                                            <td width='100' >Rp. <?php echo format_rupiah_nol($data['total_bayar']); ?></td>
                                            <td width='140'><?php echo $data['status_bayar']; ?></td>
                                            <td width='50' class="center">
                                            <?php  
                                            if ($data['status_bayar']=='Menunggu Pembayaran') { ?>
                                                <div>
                                                    <a data-toggle="tooltip" data-placement="top" title="Konfirmasi" class="btn btn-primary btn-sm" href="?page=form_konfirmasi&form=add&bayar=<?php echo $data['id_bayar']; ?>&transaksi=<?php echo $data['id_transaksi']; ?>">
                                                        Konfirmasi Pembayaran
                                                    </a>
                                                </div>
                                            <?php
                                            }

                                            if ($data['status_bayar']=='Pembayaran Ditolak') { ?>
                                                <div>
                                                    <a data-toggle="tooltip" data-placement="top" title="Konfirmasi" class="btn btn-primary btn-sm" href="?page=form_konfirmasi&form=add&bayar=<?php echo $data['id_bayar']; ?>&transaksi=<?php echo $data['id_transaksi']; ?>">
                                                        Konfirmasi Ulang
                                                    </a>
                                                </div>
                                            <?php
                                            }
                                            ?>
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
        </div>
    </div>
    <!-- /.row -->
<?php
}
?>

