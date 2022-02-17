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
                       Kelola Keranjang Belanja
                    </h3>
                    <ol class="breadcrumb">
                        <li><a href="?page=home">Beranda</a>
                        </li>
                        <li class="active">Keranjang Belanja</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?php  
                    if (empty($_GET['alert'])) {
                        echo "";
                    } 
                    elseif ($_GET['alert'] == 1) { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong><i class="glyphicon glyphicon-ok-circle"></i> Sukses!</strong> produk berhasil ditambahkan.
                        </div>
                    <?php
                    }
                    elseif ($_GET['alert'] == 2) { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong><i class="glyphicon glyphicon-ok-circle"></i> Sukses!</strong> produk berhasil dihapus.
                        </div>
                    <?php
                    }
                    ?>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Gambar</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Jumlah Beli</th>
                                            <th>Jumlah Bayar</th>
                                            <th></th>
                                        </tr>
                                    </thead>   

                                    <tbody>
                                    <?php
                                    $no = 1;
                                    $query = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi_tmp as a INNER JOIN tbl_barang as b
                                                                    ON a.id_barang=b.id_barang 
                                                                    WHERE id_konsumen='$_SESSION[id_konsumen]'")
                                                                    or die('Ada kesalahan pada query tmp transaksi: '.mysqli_error($mysqli));
                                    
                                    $count = mysqli_num_rows($query);

                                    if ($count>0) {
                                        while ($data = mysqli_fetch_assoc($query)) { ?>

                                            <tr>
                                                <td width='40' class='center'><?php echo $no; ?></td>
                                                <td width='60'><img src="images/barang/<?php echo $data['gambar']; ?>" width="150"></td>
                                                <td width='150'><?php echo $data['nama_barang']; ?></td>
                                                <td width='120'>Rp. <?php echo format_rupiah_nol($data['harga']); ?></td>
                                                <td width='100'><?php echo $data['jumlah_beli']; ?></td>
                                                <td width='120'>Rp. <?php echo format_rupiah_nol($data['jumlah_bayar']); ?></td>

                                                <td width='80' class="center">
                                                    <div>
                                                        <a data-toggle="tooltip" data-placement="top" title="Hapus Belanja" class="btn btn-danger btn-sm" href="pages/transaksi/proses_keranjang.php?id_konsumen=<?php echo $data['id_konsumen'];?>&id_barang=<?php echo $data['id_barang'];?>&stok=<?php echo $data['stok'];?>&jumlah_beli=<?php echo $data['jumlah_beli'];?>" onclick="return confirm('Anda yakin ingin menghapus produk <?php echo $data['nama_barang']; ?>?');">
                                                            <i class="glyphicon glyphicon-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                    } else { ?>
                                        <tr><td>Keranjang belanja masih kosong</td></tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>           
                                </table>
                            </div>
                        </div>
                    </div> <!-- /.panel -->

                    <div class="">
                    <?php  
                    if ($count>0) { ?>
                        <a href="?page=home" class="btn btn-primary">Lanjutkan Belanja</a>
                        &nbsp; &nbsp; 
                        <a href="?page=checkout" class="btn btn-primary pull-right">Selesai Belanja</a>
                    <?php
                    }
                    ?>
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div>
    </div>
    <!-- /.row -->
<?php
}
?>

