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
	if (isset($_POST['id_barang'])) {
		// mengambil data hasil submit dari form
		$id_barang    = mysqli_real_escape_string($mysqli, trim($_POST['id_barang']));
		$stok         = mysqli_real_escape_string($mysqli, trim($_POST['stok']));
		$jumlah_beli  = mysqli_real_escape_string($mysqli, trim($_POST['jumlah_beli']));
		$jumlah_bayar = mysqli_real_escape_string($mysqli, trim($_POST['jumlah_bayar']));
		$sisa_stok    = $stok - $jumlah_beli;
		
		$id_konsumen  = $_SESSION['id_konsumen'];

		// maka jalankan perintah query untuk menyimpan data ke tabel pesan
		$query = mysqli_query($mysqli, "INSERT INTO tbl_transaksi_tmp(id_konsumen,
																	  id_barang,
																 	  jumlah_beli,
																 	  jumlah_bayar)
														  	  VALUES('$id_konsumen',
														  	 		 '$id_barang',
																 	 '$jumlah_beli',
																 	 '$jumlah_bayar')")	
									or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    
		// cek query
		if ($query) {
			// perintah query untuk mengubah data pada tabel transaksi
            $query1 = mysqli_query($mysqli, "UPDATE tbl_barang SET stok   	 = '$sisa_stok'
                                                             WHERE id_barang = '$id_barang'")
                                             or die('Ada kesalahan pada query update stok : '.mysqli_error($mysqli));

            if ($query1) {
				// jika berhasil tampilkan pesan berhasil simpan data
				header("location: ../../main.php?page=keranjang&alert=1");
			}
		}	
	}	
}
?>
