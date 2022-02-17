<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk update
else {
    if ($_GET['act']=='terima') {
        if (isset($_GET['bayar'])) {
            // ambil data hasil submit dari form
            $id_bayar     = mysqli_real_escape_string($mysqli, trim($_GET['bayar']));
            $id_transaksi = mysqli_real_escape_string($mysqli, trim($_GET['transaksi']));
            $id_barang    = mysqli_real_escape_string($mysqli, trim($_GET['barang']));
			$nama_barang = mysqli_real_escape_string($msqli, trim($GET['nama_barang']));
            $terjual      = mysqli_real_escape_string($mysqli, trim($_GET['terjual']))-  mysqli_real_escape_string($mysqli, trim($_GET['stok']));
            $jumlah_beli      = mysqli_real_escape_string($mysqli, trim($_GET['jumlah_beli']));
           
			$status_bayar = 'Pembayaran Diterima';
            $status       = 'Proses Pengiriman';

            // perintah query untuk mengubah data pada tabel pembayaran
            $query = mysqli_query($mysqli, "UPDATE tbl_pembayaran SET status_bayar  = '$status_bayar'
                                                                WHERE id_bayar      = '$id_bayar'")
                                                        or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

            // cek query
            if ($query) {
                // perintah query untuk mengubah data pada tabel transaksi
                $query1 = mysqli_query($mysqli, "UPDATE tbl_transaksi SET status        = '$status'
                                                                    WHERE id_transaksi  = '$id_transaksi'")
                                                            or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                if ($query1) {
                    // perintah query untuk mengubah data pada tabel transaksi
                    $query2 = mysqli_query($mysqli, "UPDATE tbl_barang SET terjual   = '$terjual'
                                                                     WHERE id_barang = '$id_barang'")
                                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    if ($query2) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=konfirmasi&alert=1");
                    }   
                } 
            }       
        }
    }

    elseif ($_GET['act']=='tolak') {
        if (isset($_GET['bayar'])) {
            // mengambil data hasil submit dari form
            $id_bayar     = mysqli_real_escape_string($mysqli, trim($_GET['bayar']));
            $id_transaksi = mysqli_real_escape_string($mysqli, trim($_GET['transaksi']));
            
            $status       = 'Pembayaran Ditolak';

            // perintah query untuk mengubah data pada tabel pembayaran
            $query = mysqli_query($mysqli, "UPDATE tbl_pembayaran SET status_bayar  = '$status'
                                                                WHERE id_bayar      = '$id_bayar'")
                                                        or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

            // cek query
            if ($query) {
                // perintah query untuk mengubah data pada tabel transaksi
                $query1 = mysqli_query($mysqli, "UPDATE tbl_transaksi SET status        = '$status'
                                                                    WHERE id_transaksi  = '$id_transaksi'")
                                                            or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                if ($query1) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=konfirmasi&alert=2");
                } 
            }       
        }
    }       
}       
?>
