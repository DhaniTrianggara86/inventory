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
            $nama_kategori = mysqli_real_escape_string($mysqli, trim($_POST['nama_kategori']));
			$satuan = mysqli_real_escape_string($mysqli, trim($_POST['satuan']));
            // perintah query untuk menyimpan data ke tabel kategori
            $query = mysqli_query($mysqli, "INSERT INTO tbl_kategori(satuan,nama_kategori)
                                            VALUES('$satuan','$nama_kategori')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=kategori&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_kategori'])) {
                // ambil data hasil submit dari form
                $id_kategori   = mysqli_real_escape_string($mysqli, trim($_POST['id_kategori']));
                $nama_kategori = mysqli_real_escape_string($mysqli, trim($_POST['nama_kategori']));
				$satuan = mysqli_real_escape_string($mysqli, trim($_POST['satuan']));

                // perintah query untuk mengubah data pada tabel kategori
                $query = mysqli_query($mysqli, "UPDATE tbl_kategori SET nama_kategori = 
				'$nama_kategori', 
				satuan = '$satuan'
				
                                                                  WHERE id_kategori   = '$id_kategori'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=kategori&alert=2");
                }       
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_kategori = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel kategori
            $query = mysqli_query($mysqli, "DELETE FROM tbl_kategori WHERE id_kategori='$id_kategori'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=kategori&alert=3");
            }
        }
    }       
}       
?>
