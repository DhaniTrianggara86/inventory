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
    if ($_GET['act']=='insert') {
        if (isset($_POST['submit'])) {
            // ambil data hasil submit dari form
            $id_barang   = mysqli_real_escape_string($mysqli, trim($_POST['id_barang']));
            $id_konsumen = mysqli_real_escape_string($mysqli, trim($_POST['id_konsumen']));
            $komentar    = mysqli_real_escape_string($mysqli, trim($_POST['komentar']));
            $rating    = mysqli_real_escape_string($mysqli, trim($_POST['rating']));

            // perintah query untuk menyimpan data ke tabel komentar
            $query = mysqli_query($mysqli, "INSERT INTO tbl_komentar(id_barang,id_konsumen,komentar,rating)
                                            VALUES('$id_barang','$id_konsumen','$komentar','$rating')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?page=detail&produk=$id_barang");
            }   
        }   
    }   
} 
?>