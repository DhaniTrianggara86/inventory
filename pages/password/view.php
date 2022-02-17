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
                        <i style="margin-right:6px" class="fa fa-lock"></i>
                        Ubah Password
                    </h3>
                    <ol class="breadcrumb">
                        <li><a href="?page=home">Beranda</a>
                        </li>
                        <li class="active">Ubah Password</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <?php  
                    // fungsi untuk menampilkan pesan
                    // jika alert = "" (kosong)
                    // tampilkan pesan "" (kosong) 
                    if (empty($_GET['alert'])) {
                      echo "";
                    } 
                    // jika alert = 1
                    // tampilkan pesan Gagal "paswword lama Anda salah"
                    elseif ($_GET['alert'] == 1) { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <strong><i class="glyphicon glyphicon-alert"></i> Gagal!</strong> paswword lama Anda salah.
                            </div>
                    <?php
                    } 
                    // jika alert = 2
                    // tampilkan pesan Gagal "password baru dan ulangi password baru tidak cocok"
                    elseif ($_GET['alert'] == 2) { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <strong><i class="glyphicon glyphicon-alert"></i> Gagal!</strong> password baru dan ulangi password baru tidak cocok.
                            </div>
                    <?php
                    } 
                    // jika alert = 3
                    // tampilkan pesan Sukses "NISN sudah terpassword"
                    elseif ($_GET['alert'] == 3) { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong><i class="glyphicon glyphicon-ok-circle"></i> Sukses!</strong> password berhasil diubah.
                        </div>
                    <?php
                    } 
                    ?>

                    <div class="panel panel-default">
                        <div class="panel-body">
                              <!-- tampilan form hubungi kami -->
                            <form class="form-horizontal" method="POST" action="pages/password/proses.php">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Password Lama</label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" name="old_pass" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Password Baru</label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" name="new_pass" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Ulangi Password Baru</label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" name="retype_pass" autocomplete="off" required>
                                    </div>
                                </div>

                                <hr/>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
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
