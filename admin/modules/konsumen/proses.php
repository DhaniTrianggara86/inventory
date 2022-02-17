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
            $id_kategori        = mysqli_real_escape_string($mysqli, trim($_POST['kategori']));

            $tgl                = $_POST['tanggal_masuk'];
            $exp                = explode('-',$tgl);
            $tanggal_masuk      = $exp[2]."-".$exp[1]."-".$exp[0];
            
            $nama_konsumen        = mysqli_real_escape_string($mysqli, trim($_POST['nama_konsumen']));
            $deskripsi          = mysqli_real_escape_string($mysqli, trim($_POST['deskripsi']));
            $harga              = mysqli_real_escape_string($mysqli, trim($_POST['harga']));
            $stok               = mysqli_real_escape_string($mysqli, trim($_POST['stok']));
            
           
            // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
           
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id'])) {
                // ambil data hasil submit dari form
                $id_konsumen          = mysqli_real_escape_string($mysqli, trim($_POST['id']));
                
                $tgl                = $_POST['tanggal_masuk'];
                $exp                = explode('-',$tgl);
                $tanggal_masuk      = $exp[2]."-".$exp[1]."-".$exp[0];
                
                $nama_konsumen        = mysqli_real_escape_string($mysqli, trim($_POST['nama_konsumen']));
                $alamat          = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
                $email              = mysqli_real_escape_string($mysqli, trim($_POST['email']));
                $telepon              = mysqli_real_escape_string($mysqli, trim($_POST['telepon']));
                $kode_pos              = mysqli_real_escape_string($mysqli, trim($_POST['kodepos']));
                

                // jika gambar tidak diubah
                
                    // perintah query untuk mengubah data pada tabel konsumen
                    $query = mysqli_query($mysqli, "UPDATE tbl_konsumen SET  
                                                                            tanggal_daftar   = '$tgl',
                                                                            nama_konsumen     = '$nama_konsumen',
                                                                            email       = '$email',
                                                                            telepon          = '$telepon',
																			 kode_pos          = '$kode_pos',
                                                                            alamat            = '$alamat'
                                                                   WHERE    id_konsumen       = '$id_konsumen'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=konsumen&alert=2");
                    } 
                
                // jika gambar diubah
                      
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_konsumen = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel konsumen
            $query = mysqli_query($mysqli, "DELETE FROM tbl_konsumen WHERE id_konsumen='$id_konsumen'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=konsumen&alert=3");
            }
        }
    }       
}       
?>