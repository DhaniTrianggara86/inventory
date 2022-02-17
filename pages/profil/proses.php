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
	if (isset($_POST['simpan'])) {
		// ambil data hasil submit dari form
		$id_konsumen   = mysqli_real_escape_string($mysqli, trim($_POST['id_konsumen']));
		$nama_konsumen = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
		$alamat        = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
		$kabkota       = mysqli_real_escape_string($mysqli, trim($_POST['kabkota']));
		$provinsi      = mysqli_real_escape_string($mysqli, trim($_POST['provinsi']));
		$kode_pos      = mysqli_real_escape_string($mysqli, trim($_POST['kode_pos']));
		$telepon       = mysqli_real_escape_string($mysqli, trim($_POST['telepon']));
		$email         = mysqli_real_escape_string($mysqli, trim($_POST['email']));

		// maka jalankan perintah query untuk mengubah data pada tabel konsumen
		$query = mysqli_query($mysqli, "UPDATE tbl_konsumen SET nama_konsumen   = '$nama_konsumen',
	                                                            alamat   		= '$alamat',
	                                                            kota     		= '$kabkota',
	                                                            provinsi       	= '$provinsi',
	                                                            kode_pos        = '$kode_pos',
	                                                            telepon         = '$telepon',
	                                                            email           = '$email'
	                                                   WHERE    id_konsumen     = '$id_konsumen'")
	                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

        // cek query
        if ($query) {
            // jika berhasil tampilkan pesan berhasil update data
            header("location: ../../main.php?page=profil&alert=1");
        } 
	}	
}
?>