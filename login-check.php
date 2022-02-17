<?php
// panggil file untuk koneksi ke database
require_once "config/database.php";

// ambil data hasil submit dari form
$email    = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['email'])))));
$password = md5(mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));

// ambil data dari tabel konsumen untuk pengecekan berdasarkan inputan email dan password
$query = mysqli_query($mysqli, "SELECT * FROM tbl_konsumen WHERE email='$email' AND password='$password'")
								or die('Ada kesalahan pada query login: '.mysqli_error($mysqli));
$rows  = mysqli_num_rows($query);

// jika data ada, jalankan perintah untuk membuat session
if ($rows > 0) {
	$data  = mysqli_fetch_assoc($query);

	session_start();
	$_SESSION['id_konsumen']   = $data['id_konsumen'];
	$_SESSION['user_email']         = $data['email'];
	$_SESSION['user_password']      = $data['password'];
	$_SESSION['nama_konsumen'] = $data['nama_konsumen'];
	
	// lalu alihkan ke halaman admin
	header("Location: main.php?page=home");
}

// jika data tidak ada, alihkan ke halaman login dan tampilkan pesan = 1
else {
	// header("Location: index.php?alert=1");
	echo "<script type='text/javascript'>alert('Gagal Login!, email atau password salah, cek kembali email dan password Anda.');</script>
		  <meta http-equiv='refresh' content='0; url=index.php'>";
}
?>