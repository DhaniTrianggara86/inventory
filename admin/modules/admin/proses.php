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
            $username = mysqli_real_escape_string($mysqli, trim($_POST['username']));
			
            $password = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
            $nama_admin = mysqli_real_escape_string($mysqli, trim($_POST['nama_admin']));

            // perintah query untuk menyimpan data ke tabel kategori
            $query = mysqli_query($mysqli, "INSERT INTO tbl_admin
                                            VALUES('','$username','$password','$nama_admin','admin')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=admin&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_admin'])) {
                // ambil data hasil submit dari form
                 $username = mysqli_real_escape_string($mysqli, trim($_POST['username']));
			$id_admin= mysqli_real_escape_string($mysqli, trim($_POST['id_admin']));
            $password = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
            $nama_admin = mysqli_real_escape_string($mysqli, trim($_POST['nama_admin']));

                // perintah query untuk mengubah data pada tabel admin
                $query = mysqli_query($mysqli, "UPDATE tbl_admin SET username = '$username',
				password = '$password',
				nama_admin = '$nama_admin'
                                                                  WHERE id_admin   = '$id_admin'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query modul Kelola admin
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=admin&alert=2");
                }       
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_admin = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel kategori
            $query = mysqli_query($mysqli, "DELETE FROM tbl_admin WHERE id_admin='$id_admin'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=admin&alert=3");
            }
        }
    }       
}       
?>
