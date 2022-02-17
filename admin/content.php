<?php
// panggil file database.php untuk koneksi ke database
require_once "../config/database.php";
// panggil fungsi untuk format tanggal
require_once "../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
require_once "../config/fungsi_rupiah.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih beranda, panggil file view beranda
	if ($_GET['module']=='beranda') {
		include "modules/beranda/view.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih tentang, panggil file view tentang
	if ($_GET['module']=='tentang') {
		include "modules/tentang/view.php";
	}
	// ---------------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih cara beli, panggil file view cara beli
	if ($_GET['module']=='cara_beli') {
		include "modules/cara-beli/view.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih konsumen, panggil file view konsumen
	elseif ($_GET['module']=='konsumen') {
		include "modules/konsumen/view.php";
	}

	// jika halaman konten yang dipilih form konsumen, panggil file form konsumen
	elseif ($_GET['module']=='form_konsumen') {
		include "modules/konsumen/form.php";
	}
	// ---------------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih barang, panggil file view barang
	elseif ($_GET['module']=='barang') {
		include "modules/barang/view.php";
	}

	// jika halaman konten yang dipilih form barang, panggil file form barang
	elseif ($_GET['module']=='form_barang') {
		include "modules/barang/form.php";
	}
	// ---------------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih kategori, panggil file view kategori
	elseif ($_GET['module']=='kategori') {
		include "modules/kategori/view.php";
	}

	// jika halaman konten yang dipilih form kategori, panggil file form kategori
	elseif ($_GET['module']=='form_kategori') {
		include "modules/kategori/form.php";
	}
	
	elseif ($_GET['module']=='admin') {
		include "modules/admin/view.php";
	}

	// jika halaman konten yang dipilih form kategori, panggil file form kategori
	elseif ($_GET['module']=='form_admin') {
		include "modules/admin/form.php";
	}
	
	// ---------------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih biaya kirim, panggil file view biaya kirim
	elseif ($_GET['module']=='biaya_kirim') {
		include "modules/biaya-kirim/view.php";
	}

	// jika halaman konten yang dipilih form biaya kirim, panggil file form biaya kirim
	elseif ($_GET['module']=='form_biaya_kirim') {
		include "modules/biaya-kirim/form.php";
	}
	// ---------------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih pesanan, panggil file view pesanan
	elseif ($_GET['module']=='pesanan') {
		include "modules/pesanan/view.php";
	}

	// jika halaman konten yang dipilih form pesanan, panggil file form pesanan
	elseif ($_GET['module']=='form_pesanan') {
		include "modules/pesanan/form.php";
	}
	// ---------------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih konfirmasi, panggil file view konfirmasi
	elseif ($_GET['module']=='konfirmasi') {
		include "modules/konfirmasi/view.php";
	}

	// jika halaman konten yang dipilih form konfirmasi, panggil file form konfirmasi
	elseif ($_GET['module']=='form_konfirmasi') {
		include "modules/konfirmasi/form.php";
	}
	// ---------------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih komentar, panggil file view komentar
	elseif ($_GET['module']=='komentar') {
		include "modules/komentar/view.php";
	}

	// jika halaman konten yang dipilih form komentar, panggil file form komentar
	elseif ($_GET['module']=='form_komentar') {
		include "modules/komentar/form.php";
	}
	// ---------------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih laporan, panggil file view laporan
	elseif ($_GET['module']=='laporanperhari') {
		include "modules/laporan/laporan_perhari.php";
	}
	
	// jika halaman konten yang dipilih laporan, panggil file view laporan
	elseif ($_GET['module']=='laporanperbulan') {
		include "modules/laporan/laporan_perbulan.php";
	}
	
	// jika halaman konten yang dipilih laporan, panggil file view laporan
	elseif ($_GET['module']=='laporanpertahun') {
		include "modules/laporan/laporan_pertahun.php";
	}

	// jika halaman konten yang dipilih grafik, panggil file view grafik
	elseif ($_GET['module']=='grafik') {
		include "modules/grafik/view.php";
	}

	// jika halaman konten yang dipilih fifo, panggil file view fifo
	elseif ($_GET['module']=='Barang masuk keluar') {
		include "modules/Barang masuk keluar/view.php";
	}

	// jika halaman konten yang dipilih password, panggil file view password
	elseif ($_GET['module']=='password') {
		include "modules/password/view.php";
	}
}
?>
