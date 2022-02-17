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
	if (isset($_GET['id'])) {
		// ambil data hasil submit dari form
        $id_transaksi       = mysqli_real_escape_string($mysqli, trim($_GET['id']));

        $status = 'Transaksi Selesai';

        // perintah query untuk mengubah data pada tabel pembayaran
        $query = mysqli_query($mysqli, "UPDATE tbl_transaksi SET status       = '$status'
                                                           WHERE id_transaksi = '$id_transaksi'")
                                        or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));
        
        // cek query
        if ($query) {
            // jika berhasil tampilkan pesan berhasil update data
            header("location: ../../main.php?page=penerimaan&alert=1");
        }

	}	
}
?>