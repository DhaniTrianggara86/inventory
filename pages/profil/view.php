<?php  
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])){
    echo "<script type='text/javascript'>alert('Anda harus login terlebih dahulu!');</script>
          <meta http-equiv='refresh' content='0; url=?page=home'>";
}
// jika user sudah login, maka jalankan perintah untuk ubah password
else {
 
    $query = mysqli_query($mysqli, "SELECT * FROM tbl_konsumen as a INNER JOIN tbl_kabkota as b INNER JOIN tbl_provinsi as c 
                                    ON a.kota=b.id_kabkota AND a.provinsi=c.id_provinsi
                                    ORDER BY a.id_konsumen DESC")
                                    or die('Ada kesalahan pada query tampil data konsumen: '.mysqli_error($mysqli));

    $data = mysqli_fetch_assoc($query);

    $id_konsumen   = $data['id_konsumen'];
    $nama_konsumen = $data['nama_konsumen'];
    $alamat        = $data['alamat'];
    $id_kabkota    = $data['id_kabkota'];
    $nama_kabkota  = $data['nama_kabkota'];
    $id_provinsi   = $data['id_provinsi'];
    $nama_provinsi = $data['nama_provinsi'];
    $kode_pos      = $data['kode_pos'];
    $telepon       = $data['telepon'];
    $email         = $data['email'];
?>
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">
                        <i style="margin-right:6px" class="fa fa-user"></i>
                        Profil
                    </h3>
                    <ol class="breadcrumb">
                        <li><a href="?page=home">Beranda</a>
                        </li>
                        <li class="active">Profil</li>
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
                    // tampilkan pesan Sukses "kelola data user  sudah terdaftar "
                    elseif ($_GET['alert'] == 1) { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong><i class="glyphicon glyphicon-ok-circle"></i> Sukses!</strong> profil berhasil diubah.
                        </div>
                    <?php
                    } 
                    ?>

                    <div class="panel panel-default">
                        <div class="panel-body">
                              <!-- tampilan form hubungi kami -->
                            <form class="form-horizontal" method="POST" action="pages/profil/proses.php">
                                
                                <input type="hidden" name="id_konsumen" value="<?php echo $id_konsumen; ?>" required>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $nama_konsumen; ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" name="alamat" rows="3" required><?php echo $alamat; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kabupaten/Kota</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="kabkota" placeholder="Pilih Kabupaten/Kota" required>
                                        <option value="<?php echo $id_kabkota; ?>"><?php echo $nama_kabkota; ?></option>
                                        <?php
                                        $query = mysqli_query($mysqli, "SELECT * FROM tbl_kabkota order by nama_kabkota ASC");

                                        while($data = mysqli_fetch_assoc($query)) {
                                            echo"<option value=\"$data[id_kabkota]\"> $data[nama_kabkota] </option>";

                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Provinsi</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="provinsi" placeholder="Pilih Provinsi" required>
                                        <option value="<?php echo $id_provinsi; ?>"><?php echo $nama_provinsi; ?></option>
                                        <?php
                                        $query = mysqli_query($mysqli, "SELECT * FROM tbl_provinsi order by nama_provinsi ASC");

                                        while($data = mysqli_fetch_assoc($query)) {
                                            echo"<option value=\"$data[id_provinsi]\"> $data[nama_provinsi] </option>";

                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kode Pos</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="kode_pos" autocomplete="off" maxlength="5" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $kode_pos; ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">No. Telepon</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="telepon" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $telepon; ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-5">
                                        <input type="email" class="form-control" name="email" autocomplete="off" value="<?php echo $email; ?>" required>
                                    </div>
                                </div>

                                <hr/>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan Perubahan">
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
