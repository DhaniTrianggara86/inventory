<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])){
    echo "<script type='text/javascript'>alert('Anda harus login terlebih dahulu!');</script>
          <meta http-equiv='refresh' content='0; url=../../index.php'>";
}
// jika user sudah login, maka jalankan perintah untuk ubah password
else {
	if (isset($_GET['id_konsumen']) && isset($_GET['id_barang'])) {
		// ambil data hasil submit dari form
        $id_konsumen = mysqli_real_escape_string($mysqli, trim($_GET['id_konsumen']));
        $id_barang   = mysqli_real_escape_string($mysqli, trim($_GET['id_barang']));
        $stok        = mysqli_real_escape_string($mysqli, trim($_GET['stok']));
        $jumlah_beli = mysqli_real_escape_string($mysqli, trim($_GET['jumlah_beli']));
        $sisa_stok   = $stok + $jumlah_beli;

		// perintah query untuk menghapus data pada tabel tmp transaksi
        $query = mysqli_query($mysqli, "DELETE FROM tbl_transaksi_tmp WHERE id_konsumen='$id_konsumen' AND id_barang='$id_barang'")
                                        or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

        // cek hasil query
        if ($query) {
            // perintah query untuk mengubah data pada tabel transaksi
            $query1 = mysqli_query($mysqli, "UPDATE tbl_barang SET stok      = '$sisa_stok'
                                                             WHERE id_barang = '$id_barang'")
                                             or die('Ada kesalahan pada query update stok : '.mysqli_error($mysqli));

            if ($query1) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?page=keranjang&alert=2");
            }
        }
	}	
}
?>