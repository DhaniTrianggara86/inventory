<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $provinsi = mysqli_real_escape_string($mysqli, trim($_POST['provinsi']));
            $kabkota  = mysqli_real_escape_string($mysqli, trim($_POST['kabkota']));
            $biaya    = mysqli_real_escape_string($mysqli, trim($_POST['biaya']));
            
            // perintah query untuk menyimpan data ke tabel biaya kirim
            $query = mysqli_query($mysqli, "INSERT INTO tbl_biaya_kirim(provinsi,kabkota,biaya)
                                            VALUES('$provinsi','$kabkota','$biaya')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=biaya_kirim&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_biaya'])) {
                // ambil data hasil submit dari form
                $id_biaya = mysqli_real_escape_string($mysqli, trim($_POST['id_biaya']));
                $provinsi = mysqli_real_escape_string($mysqli, trim($_POST['provinsi']));
                $kabkota  = mysqli_real_escape_string($mysqli, trim($_POST['kabkota']));
                $biaya    = mysqli_real_escape_string($mysqli, trim($_POST['biaya']));


                // perintah query untuk mengubah data pada tabel biaya kirim
                $query = mysqli_query($mysqli, "UPDATE tbl_biaya_kirim SET  provinsi = '$provinsi',
                                                                            kabkota  = '$kabkota',
                                                                            biaya    = '$biaya'
                                                                     WHERE  id_biaya = '$id_biaya'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=biaya_kirim&alert=2");
                }
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_biaya = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel biaya kirim
            $query = mysqli_query($mysqli, "DELETE FROM tbl_biaya_kirim WHERE id_biaya='$id_biaya'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=biaya_kirim&alert=3");
            }
        }
    }       
}       
?>