<?php  
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])){
    echo "<script type='text/javascript'>alert('Anda harus login terlebih dahulu!');</script>
          <meta http-equiv='refresh' content='0; url=?page=home'>";
}
// jika user sudah login, maka jalankan perintah untuk ubah password
else { ?>
 
    <script type="text/javascript">
    function cek_stok(input) {
        stk = document.frmBeli.stok.value;
        jml = document.frmBeli.jumlah_beli.value;
        var num = input.value;
        var stok = eval(stk);
        var jumlah = eval(jml);
        if(stok < jumlah){
            alert('Jumlah Stok barang  Tidak Memenuhi, Kurangi Jumlah Beli');
            input.value = input.value.substring(0,input.value.length-1);
        }
    }

    function hitung_jumlah_bayar() {
        bil1 = document.frmBeli.harga.value;
        bil2 = document.frmBeli.jumlah_beli.value;
        if (bil2=='') {
            var hasil = 0;
        } 
        else {
            var hasil = eval(bil1) * eval(bil2);
        };
        document.frmBeli.jumlah_bayar1.value="Rp. " + (hasil);
        document.frmBeli.jumlah_bayar.value=(hasil);
    }
    </script>

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">
                        <i style="margin-right:6px" class="fa fa-shopping-cart"></i>
                        Kelola Pembelian
                    </h3>
                    <ol class="breadcrumb">
                        <li><a href="?page=home">Beranda</a>
                        </li>
                        <li class="active">Pembelian</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    
                    <?php
                    $query = mysqli_query($mysqli, "SELECT * FROM tbl_barang WHERE id_barang='$_GET[produk]'")
                                                or die('Ada kesalahan pada query tampil data barang : '.mysqli_error($mysqli));

                    $data = mysqli_fetch_assoc($query);
                        $deskripsi = $data['deskripsi'];
                    ?>
                    <div class="col-md-4">
                        <img style="border:1px solid #eee;border-radius:2px" class="img-responsive img-hover" src="images/barang/<?php echo $data['gambar']; ?>" width="400" alt="">
                    </div>

                    <div class="col-lg-8">

                        <div class="panel panel-default">
                            <div class="panel-body">
                                  <!-- tampilan form hubungi kami -->
                                <form class="form-horizontal" method="POST" action="pages/transaksi/proses_beli.php" name="frmBeli">

                                    <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nama Barang</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $data['nama_barang']; ?>" readonly required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Harga</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="harga_tampil" autocomplete="off" value="Rp. <?php echo format_rupiah_nol($data['harga']); ?>" readonly required>

                                            <input type="hidden" id="harga" name="harga" value="<?php echo $data['harga']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Stok</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="stok" name="stok" autocomplete="off" value="<?php echo $data['stok']; ?>" readonly required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Jumlah Beli</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="jumlah_beli" name="jumlah_beli" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="cek_stok(this)&hitung_jumlah_bayar(this)" required>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-sm-3 control-label">Jumlah Bayar</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="jumlah_bayar1" name="jumlah_bayar1" readonly required>
                                            <input type="hidden" id="jumlah_bayar" name="jumlah_bayar">
                                        </div>
                                    </div>

                                    <hr/>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <input style="width:100px" type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                                            &nbsp; &nbsp; 
                                            <a style="width:100px" href="?page=home" class="btn btn-default">Batal</a>
                                        </div>
                                    </div>
 	
					
				
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->

								<br>
                                  
                                </form>
                            </div>
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
