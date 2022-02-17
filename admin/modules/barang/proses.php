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
            
            $nama_barang        = mysqli_real_escape_string($mysqli, trim($_POST['nama_barang']));
            $deskripsi          = mysqli_real_escape_string($mysqli, trim($_POST['deskripsi']));
            $harga              = mysqli_real_escape_string($mysqli, trim($_POST['harga']));
            $stok               = mysqli_real_escape_string($mysqli, trim($_POST['stok']));
			$satuan             = mysqli_real_escape_string($mysqli, trim($_POST['satuan']));
            $nama_file          = $_FILES['gambar']['name'];
            $ukuran_file        = $_FILES['gambar']['size'];
            $tipe_file          = $_FILES['gambar']['type'];
            $tmp_file           = $_FILES['gambar']['tmp_name'];
            
            // tentuka extension yang diperbolehkan
            $allowed_extensions = array('jpg','jpeg','png');
            
            // Set path folder tempat menyimpan gambarnya
            $path               = "../../../images/barang/".$nama_file;
            
            // check extension
            $file               = explode(".", $nama_file);
            $extension          = array_pop($file);

            // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
            if(in_array($extension, $allowed_extensions)) {
                // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                if($ukuran_file <= 5000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                    // Proses upload
                    if(move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
                        // Jika gambar berhasil diupload, Lakukan : 
                        // perintah query untuk menyimpan data ke tabel barang
                        $query = mysqli_query($mysqli, "INSERT INTO tbl_barang(id_kategori,tanggal_masuk,nama_barang,deskripsi,harga,stok,satuan,gambar)
                                                        VALUES('$id_kategori','$tanggal_masuk','$nama_barang','$deskripsi','$harga','$stok','$satuan','$nama_file')")
                                                        or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

                        // cek query
                        if ($query) {
                            // jika berhasil tampilkan pesan berhasil simpan data
                            header("location: ../../main.php?module=barang&alert=1");
                        }   
                    } else {
                        // Jika gambar gagal diupload, tampilkan pesan gagal upload
                        header("location: ../../main.php?module=barang&alert=4");
                    }
                } else {
                    // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
                    header("location: ../../main.php?module=barang&alert=5");
                }
            } else {
                // Jika tipe file yang diupload bukan JPG / JPEG / PNG, tampilkan pesan gagal upload
                header("location: ../../main.php?module=barang&alert=6");
            }  
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id'])) {
                // ambil data hasil submit dari form
                $id_barang          = mysqli_real_escape_string($mysqli, trim($_POST['id']));
                $id_kategori        = mysqli_real_escape_string($mysqli, trim($_POST['kategori']));
                
                $tgl                = $_POST['tanggal_masuk'];
                $exp                = explode('-',$tgl);
                $tanggal_masuk      = $exp[2]."-".$exp[1]."-".$exp[0];
                
                $nama_barang        = mysqli_real_escape_string($mysqli, trim($_POST['nama_barang']));
                $deskripsi          = mysqli_real_escape_string($mysqli, trim($_POST['deskripsi']));
                $harga              = mysqli_real_escape_string($mysqli, trim($_POST['harga']));
                $stok               = mysqli_real_escape_string($mysqli, trim($_POST['stok']));
				$satuan             = mysqli_real_escape_string($mysqli, trim($_POST['satuan']));
                $nama_file          = $_FILES['gambar']['name'];
                $ukuran_file        = $_FILES['gambar']['size'];
                $tipe_file          = $_FILES['gambar']['type'];
                $tmp_file           = $_FILES['gambar']['tmp_name'];
                
                // tentuka extension yang diperbolehkan
                $allowed_extensions = array('jpg','jpeg','png','JPG','PNG');
                
                // Set path folder tempat menyimpan gambarnya
                $path               = "../../../images/barang/".$nama_file;
                
                // check extension
                $file               = explode(".", $nama_file);
                $extension          = array_pop($file);

                // jika gambar tidak diubah
                if (empty($nama_file)) {
                    // perintah query untuk mengubah data pada tabel barang
                    $query = mysqli_query($mysqli, "UPDATE tbl_barang SET   id_kategori     = '$id_kategori',
                                                                            tanggal_masuk   = '$tanggal_masuk',
                                                                            nama_barang     = '$nama_barang',
                                                                            deskripsi       = '$deskripsi',
                                                                            harga           = '$harga',
                                                                            stok            = '$stok',
																			satuan          = '$satuan'
                                                                   WHERE    id_barang       = '$id_barang'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=barang&alert=2");
                    } 
                }
                // jika gambar diubah
                else {
                    // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
                    if(in_array($extension, $allowed_extensions)) {
                        // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                        if($ukuran_file <= 1000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                            // Proses upload
                            if(move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
                                // Jika gambar berhasil diupload, Lakukan : 
                                // perintah query untuk mengubah data pada tabel barang
                                $query = mysqli_query($mysqli, "UPDATE tbl_barang SET   id_kategori     = '$id_kategori',
                                                                                        tanggal_masuk   = '$tanggal_masuk',
                                                                                        nama_barang     = '$nama_barang',
                                                                                        deskripsi       = '$deskripsi',
                                                                                        harga           = '$harga',
                                                                                        stok            = '$stok',
																						satuan          = '$satuan',
                                                                                        gambar          = '$nama_file'
                                                                               WHERE    id_barang       = '$id_barang'")
                                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                                // cek query
                                if ($query) {
                                    // jika berhasil tampilkan pesan berhasil update data
                                    header("location: ../../main.php?module=barang&alert=2");
                                }
                            } else {
                                // Jika gambar gagal diupload, tampilkan pesan gagal upload
                                header("location: ../../main.php?module=barang&alert=4");
                            }
                        } else {
                            // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
                            header("location: ../../main.php?module=barang&alert=5");
                        }
                    } else {
                        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, tampilkan pesan gagal upload
                        header("location: ../../main.php?module=barang&alert=6");
                    } 
                }      
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_barang = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel barang
            $query = mysqli_query($mysqli, "DELETE FROM tbl_barang WHERE id_barang='$id_barang'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // pengecekan hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=barang&alert=3");
            }
        }
    }       
}       
?>
