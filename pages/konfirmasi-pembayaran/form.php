<?php  
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])){
    echo "<script type='text/javascript'>alert('Anda harus login terlebih dahulu!');</script>
          <meta http-equiv='refresh' content='0; url=?page=home'>";
}
// jika user sudah login, maka jalankan perintah untuk ubah password
else { 
    if ($_GET['form']=='add') { ?>
       <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i style="margin-right:6px" class="fa fa-retweet"></i>
                            Kelola Konfirmasi Pembayaran
                        </h3>
                        <ol class="breadcrumb">
                            <li><a href="?page=home">Beranda</a>
                            </li>
                            <li class="active">Konfirmasi Pembayaran</li>
                        </ol>
                    </div>
                </div>
<?php

$sql_edit = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi WHERE id_transaksi='$_GET[transaksi]'");


	    $row =  mysqli_fetch_array($sql_edit);

?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                  <!-- tampilan form hubungi kami -->
                                <form class="form-horizontal" method="POST" action="pages/konfirmasi-pembayaran/proses.php" enctype="multipart/form-data">
                                    
                                    <input type="hidden" name="id_bayar" value="<?php echo $_GET['bayar']; ?>">
                                    <input type="hidden" name="id_transaksi" value="<?php echo $_GET['transaksi']; ?>">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Tanggal Pembayaran</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_bayar" autocomplete="off" required>
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Rekening Asal</label>
                                        <div class="col-sm-4">
                                            <select style="font-color:#555" class="form-control" name="rekening_asal" required>
                                                <option value=""></option>
                                                <option value="BRI">BRI</option>
                                                <option value="BNI">BNI</option>
                                                <option value="Mandiri">Mandiri</option>
                                                <option value="BCA">BCA</option>
                                                <option value="BRI Syariah">BRI Syariah</option>
                                                <option value="Mandiri Syariah">Mandiri Syariah</option>
                                                <option value="BNI Syariah">BNI Syariah</option>
                                                <option value="Muamalat">Muamalat</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">No. Rekening</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="no_rekening_asal" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nama Pemilik Rekening</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="pemilik_rekening" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Rekening Tujuan</label>
                                        <div class="col-sm-4">
                                            <select style="font-color:#555" class="form-control" name="rekening_tujuan" required>
                                                <option value=""></option>
                                                <option value="BNI">BNI</option>
                                                <option value="BCA">BCA</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Jumlah Pembayaran</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp</span>
                                                <input type="text" class="form-control" id="jumlah_pembayaran" name="jumlah_pembayaran" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)"  value="<?php echo $row['total_bayar'];?>"required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Bukti Pembayaran</label>
                                        <div class="col-sm-4">
                                            <input style="margin-top:2px;height:35px" type="file" name="gambar" required> * Max Ukuran Gambar 1 MB
                                        </div>
                                    </div>

                                    <hr/>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <input style="width:100px" type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    <?php
    }
    ?>
<?php
}
?>

