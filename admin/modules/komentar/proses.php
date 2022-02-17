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
        if (isset($_POST['balas'])) {
            // ambil data hasil submit dari form
            $id_barang   = mysqli_real_escape_string($mysqli, trim($_POST['id_barang']));
            $id_konsumen = "0";
            $komentar    = mysqli_real_escape_string($mysqli, trim($_POST['komentar']));
            $status      = "y";
            $id_komentar = mysqli_real_escape_string($mysqli, trim($_POST['id_komentar']));

            // perintah query untuk menyimpan data ke tabel komentar
            $query = mysqli_query($mysqli, "INSERT INTO tbl_komentar(id_barang,id_konsumen,komentar,status,balas)
                                            VALUES('$id_barang','$id_konsumen','$komentar','$status','$id_komentar')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // perintah query untuk mengubah data pada tabel komentar
                $query2 = mysqli_query($mysqli, "UPDATE tbl_komentar SET status       = '$status'
                                                                   WHERE id_komentar  = '$id_komentar'")
                                                or die('Ada kesalahan pada query update status : '.mysqli_error($mysqli));

                // cek query
                if ($query2) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=form_komentar&form=reply&id=$id_komentar");
                }
            }   
        }   
    }

    elseif ($_GET['act']=='update_status') {
        if (isset($_GET['id'])) {
            // ambil data hasil submit dari form
            $id_komentar = mysqli_real_escape_string($mysqli, trim($_GET['id']));
            $status      = "y";

            // perintah query untuk mengubah data pada tabel komentar
            $query = mysqli_query($mysqli, "UPDATE tbl_komentar SET status       = '$status'
                                                              WHERE id_komentar  = '$id_komentar'")
                                            or die('Ada kesalahan pada query update status : '.mysqli_error($mysqli));
            
            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil update data
                header("location: ../../main.php?module=komentar");
            }       
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_komentar = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel komentar
            $query = mysqli_query($mysqli, "DELETE FROM tbl_komentar WHERE id_komentar='$id_komentar'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=komentar&alert=1");
            }
        }
    }       
}       
?>