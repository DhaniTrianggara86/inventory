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
                                    WHERE id_konsumen='$_SESSION[id_konsumen]'")
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
                        <i style="margin-right:6px" class="fa fa-shopping-cart"></i>
                       Kelola Proses Order
                    </h3>
                    <ol class="breadcrumb">
                        <li><a href="?page=home">Beranda</a>
                        </li>
                        <li class="active">Proses Order</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">    
                            <h4>Alamat Tujuan</h3>
                            <p>
                                <i style="margin-right:7px" class="fa fa-user"></i>
                                <?php echo $nama_konsumen; ?>
                            </p>
                            <p>
                                <i style="margin-right:7px" class="fa fa-map-marker"></i>
                                <?php echo $alamat; ?>, <?php echo $nama_kabkota; ?>, <?php echo $nama_provinsi; ?>, <?php echo $kode_pos; ?>
                            </p>
                            <p>
                                <i style="margin-right:7px" class="fa fa-phone"></i>
                                <?php echo $telepon; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr > 
                                            <th>No.</th>
                                            <th>Gambar</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Jumlah Beli</th>
                                            <th>Jumlah Bayar</th>
                                        </tr>
                                    </thead>   

                                    <tbody>
                                    <?php
                                    $no = 1;
                                    $query = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi_tmp as a INNER JOIN tbl_barang as b
                                                                    ON a.id_barang=b.id_barang 
                                                                    WHERE id_konsumen='$_SESSION[id_konsumen]'")
                                                                    or die('Ada kesalahan pada query tmp transaksi: '.mysqli_error($mysqli));
                              
                                    while ($data = mysqli_fetch_assoc($query)) { 
                                        $id_barang    = $data['id_barang'];
                                        $jumlah_beli  = $data['jumlah_beli'];
                                        $jumlah_bayar = $data['jumlah_bayar'];
                                    ?>
                                        <tr>
                                            <td width='40' class='center'><?php echo $no; ?></td>
                                            <td width='60'><img src="images/barang/<?php echo $data['gambar']; ?>" width="150"></td>
                                            <td width='150'><?php echo $data['nama_barang']; ?></td>
                                            <td width='120' >Rp. <?php echo format_rupiah_nol($data['harga']); ?></td>
                                            <td width='100'><?php echo $jumlah_beli; ?></td>
                                            <td width='120'>Rp. <?php echo format_rupiah_nol($jumlah_bayar); ?></td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }

                                    $query1 = mysqli_query($mysqli, "SELECT sum(jumlah_bayar) as total FROM tbl_transaksi_tmp
                                                                    WHERE id_konsumen='$_SESSION[id_konsumen]'")
                                                                    or die('Ada kesalahan pada query total bayar: '.mysqli_error($mysqli));
                              
                                    $data1 = mysqli_fetch_assoc($query1);
                                    $total_bayar = $data1['total'];

                                 
                                    $total_pembayaran = $total_bayar ;
                                    ?>
                                        <tr>
                                            <td align="right" colspan="5"><strong>Total Harga</strong></td>
                                            <td align="right"><strong>Rp. <?php echo format_rupiah_nol($total_bayar); ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td align="right" colspan="5"><strong>Total Pembayaran</strong></td>
                                            <td align="right"><strong>Rp. <?php echo format_rupiah_nol($total_pembayaran); ?></strong></td>
                                        </tr>
                                    </tbody>           
                                </table>
                            </div>
                        </div>
                    </div> <!-- /.panel -->

                    <div class="">
                        <a style="width:110px" href="?page=keranjang" class="btn btn-primary">Kembali</a>
                        &nbsp; &nbsp; 
                        <a href="pages/transaksi/proses_order.php?id_barang=<?php echo $id_barang; ?>&jumlah_beli=<?php echo $jumlah_beli; ?>&jumlah_bayar=<?php echo $jumlah_bayar; ?>&total_pembayaran=<?php echo $total_pembayaran; ?>" class="btn btn-primary pull-right">Proses Order</a>
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div>
    </div>
    <!-- /.row -->
<?php
}
?>

