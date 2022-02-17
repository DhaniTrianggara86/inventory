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
	if (isset($_GET['id_barang'])) {
		// fungsi query untuk membuat id transaksi
        $sql = mysqli_query($mysqli, "SELECT MAX(id_transaksi) as kode FROM tbl_transaksi
                                      ORDER BY id_transaksi DESC LIMIT 1")
                                      or die('Ada kesalahan pada query id transaksi: '.mysqli_error($mysqli));
        $data = mysqli_fetch_assoc($sql);

        $id_transaksi = $data['kode'] + 1;
        // -------------------------------------------------------------------------------------------------------

		// ambil data hasil submit dari form
		$id_barang        = mysqli_real_escape_string($mysqli, trim($_GET['id_barang']));
		$jumlah_beli      = mysqli_real_escape_string($mysqli, trim($_GET['jumlah_beli']));
		$jumlah_bayar     = mysqli_real_escape_string($mysqli, trim($_GET['jumlah_bayar']));
		$total_pembayaran = mysqli_real_escape_string($mysqli, trim($_GET['total_pembayaran']));
		
		$id_konsumen  = $_SESSION['id_konsumen'];

		// maka jalankan perintah query untuk menyimpan data ke tabel transaksi
		$query = mysqli_query($mysqli, "INSERT INTO tbl_transaksi(	id_transaksi,
																	id_konsumen,
																 	total_bayar)
														  	VALUES('$id_transaksi',
														  	 	   '$id_konsumen',
																   '$total_pembayaran')")	
									or die('Ada kesalahan pada query insert transaksi : '.mysqli_error($mysqli));    
		// cek query
		if ($query) {
			$sql = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi_tmp
                                          WHERE id_konsumen='$id_konsumen'")
                                          or die('Ada kesalahan pada query tampil tmp transaksi : '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($sql)) {
				// maka jalankan perintah query untuk menyimpan data ke tabel transaksi detail
				$query1 = mysqli_query($mysqli, "INSERT INTO tbl_transaksi_detail(id_transaksi,
																				 id_barang,
																		 		 jumlah_beli,
																		 		 jumlah_bayar)
																  		 VALUES('$id_transaksi',
																  	 	   		'$data[id_barang]',
																		   		'$data[jumlah_beli]',
																		   		'$data[jumlah_bayar]')")	
										or die('Ada kesalahan pada query insert transaksi detail : '.mysqli_error($mysqli));    
			}

			// cek query
			if ($query1) {
				// perintah query untuk menghapus data pada tabel tmp transaksi
		        $query2 = mysqli_query($mysqli, "INSERT INTO tbl_pembayaran(id_transaksi)
															  		 VALUES('$id_transaksi')")	
										or die('Ada kesalahan pada query insert pembayaran : '.mysqli_error($mysqli));    

		        // cek hasil query
		        if ($query2) {
					// perintah query untuk menghapus data pada tabel tmp transaksi
			        $query3 = mysqli_query($mysqli, "DELETE FROM tbl_transaksi_tmp WHERE id_konsumen='$id_konsumen'")
			                                        or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

			        // cek hasil query
			        if ($query3) {
						// jika berhasil tampilkan pesan berhasil simpan data
						header("location: ../../main.php?page=pembayaran");
			        }
		        }
			}
		}	
	}	
}
?>