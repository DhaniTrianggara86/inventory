<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";
// panggil fungsi untuk format tanggal
require_once "config/fungsi_tanggal.php";
/* panggil file untuk format nama hari */
require_once "config/fungsi_nama_hari.php";
// panggil fungsi untuk format rupiah
require_once "config/fungsi_rupiah.php";

// fungsi untuk pemanggilan file halaman konten
// jika halaman konten yang dipilih home, panggil file view home
if ($_GET['page'] == 'home') {
	include "pages/home/view.php";
}

// jika halaman konten yang dipilih produk terbaru, panggil file terbaru
if ($_GET['page'] == 'terbaru') {
	include "pages/produk/terbaru.php";
}

// jika halaman konten yang dipilih produk terlaris, panggil file terlaris
if ($_GET['page'] == 'terlaris') {
	include "pages/produk/terlaris.php";
}

// jika halaman konten yang dipilih kategori produk, panggil file kategori
if ($_GET['page'] == 'kategori') {
	include "pages/produk/kategori.php";
}

// jika halaman konten yang dipilih detail produk, panggil file detail
if ($_GET['page'] == 'detail') {
	include "pages/produk/detail.php";
}

// jika halaman konten yang dipilih cari produk, panggil file cari
if ($_GET['page'] == 'cari') {
	include "pages/produk/cari.php";
}

// jika halaman konten yang dipilih tentang, panggil file view tentang
if ($_GET['page'] == 'tentang') {
	include "pages/tentang/view.php";
}

// jika halaman konten yang dipilih cara beli, panggil file view cara beli
if ($_GET['page'] == 'cara_beli') {
	include "pages/cara-beli/view.php";
}

// jika halaman konten yang dipilih daftar, panggil file view daftar
if ($_GET['page'] == 'daftar') {
	include "pages/daftar/view.php";
}

// jika halaman konten yang dipilih profil, panggil file view profil
if ($_GET['page'] == 'profil') {
	include "pages/profil/view.php";
}

// jika halaman konten yang dipilih password, panggil file view password
if ($_GET['page'] == 'password') {
	include "pages/password/view.php";
}

// jika halaman konten yang dipilih beli, panggil file beli
if ($_GET['page'] == 'beli') {
	include "pages/transaksi/beli.php";
}

// jika halaman konten yang dipilih keranjang, panggil file keranjang
if ($_GET['page'] == 'keranjang') {
	include "pages/transaksi/keranjang.php";
}

// jika halaman konten yang dipilih checkout, panggil file checkout
if ($_GET['page'] == 'checkout') {
	include "pages/transaksi/checkout.php";
}

// jika halaman konten yang dipilih pembayaran, panggil file pembayaran
if ($_GET['page'] == 'pembayaran') {
	include "pages/transaksi/pembayaran.php";
}

// jika halaman konten yang dipilih pembelian, panggil file view pembelian
if ($_GET['page'] == 'pembelian') {
	include "pages/data-pembelian/view.php";
}

// jika halaman konten yang dipilih konfirmasi, panggil file view konfirmasi
if ($_GET['page'] == 'konfirmasi') {
	include "pages/konfirmasi-pembayaran/view.php";
}

if ($_GET['page'] == 'form_konfirmasi') {
	include "pages/konfirmasi-pembayaran/form.php";
}

// jika halaman konten yang dipilih penerimaan, panggil file view penerimaan
if ($_GET['page'] == 'penerimaan') {
	include "pages/konfirmasi-penerimaan/view.php";
}

// jika halaman konten yang dipilih login, panggil file view login
if ($_GET['page'] == 'login') {
	include "pages/login/view.php";
}
?>