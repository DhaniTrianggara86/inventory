<?php
// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

if (isset($_POST['daftar'])) {
	// mengambil data hasil submit dari form
	$nama       = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
	$alamat     = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
	$kabkota    = mysqli_real_escape_string($mysqli, trim($_POST['kabkota']));
	$provinsi   = mysqli_real_escape_string($mysqli, trim($_POST['provinsi']));
	$kode_pos   = mysqli_real_escape_string($mysqli, trim($_POST['kode_pos']));
	$no_telepon = mysqli_real_escape_string($mysqli, trim($_POST['no_telepon']));
	$email      = mysqli_real_escape_string($mysqli, trim($_POST['email']));
	$password   = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));

	// perintah query untuk pengecekan email pada tabel konsumen
	$query_email = mysqli_query($mysqli, "SELECT email FROM tbl_konsumen WHERE email='$email'")
										  or die('Ada kesalahan pada query cek email : '.mysqli_error($mysqli));    
	$row_email   = mysqli_num_rows($query_email);

	// jika data email sudah ada
	if ($row_email > 0) {
		// maka alihkan ke halaman form pendaftaran
		header("location: ../../main.php?page=daftar&alert=1");
	}
	// jika data email belum ada
	else {
		// maka jalankan perintah query untuk menyimpan data ke tabel pesan

		 define('ROOT', 'http://localhost/hp/');

		$query = mysqli_query($mysqli, "INSERT INTO tbl_konsumen(nama_konsumen,
															 alamat,
															 kota,
															 provinsi,
															 kode_pos,
															 telepon,
															 email,
															 password)
													  VALUES('$nama',
															 '$alamat',
															 '$kabkota',
															 '$provinsi',
															 '$kode_pos',
															 '$no_telepon',
															 '$email',
															 '$password')")	
									or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));  
									
		$qc=mysqli_query($mysqli,"select * from tbl_konsumen order by id_konsumen desc");
		$cek=mysqli_fetch_array($qc);

		$to     = $_POST['email'];
		$id = $cek['id_konsumen'];
        $judul  = "Aktivasi Akun Anda";
        $dari   = "From: vendry7@gmail.com \n";
        $dari   .= "Content-type: text/html \r\n";
 
        $pesan  = "Klik link berikut untuk mengaktifkan akun: <br />";
        $pesan  .= "mantap";
 
        //$kirim  = mail($to, $judul, $pesan, $dari);
 
       
		// cek query
		if ($query) {
			// jika berhasil tampilkan pesan berhasil simpan data
			header("location: ../../main.php?page=daftar&alert=2");
		}	
	}
}	
?>
