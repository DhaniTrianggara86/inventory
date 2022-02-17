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
	if (isset($_POST['simpan'])) {
		// ambil data hasil submit dari form
        $id_bayar           = mysqli_real_escape_string($mysqli, trim($_POST['id_bayar']));
        $id_transaksi       = mysqli_real_escape_string($mysqli, trim($_POST['id_transaksi']));
        
        $tgl                = $_POST['tanggal_bayar'];
        $exp                = explode('-',$tgl);
        $tanggal_bayar      = $exp[2]."-".$exp[1]."-".$exp[0];
        
        $rekening_asal      = mysqli_real_escape_string($mysqli, trim($_POST['rekening_asal']));
        $no_rekening_asal   = mysqli_real_escape_string($mysqli, trim($_POST['no_rekening_asal']));
        $pemilik_rekening   = mysqli_real_escape_string($mysqli, trim($_POST['pemilik_rekening']));
        $rekening_tujuan    = mysqli_real_escape_string($mysqli, trim($_POST['rekening_tujuan']));
        $jumlah_bayar       = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['jumlah_pembayaran'])));
        
        $status_bayar       = 'Menunggu Verifikasi Pembayaran';
        
        $nama_file          = $_FILES['gambar']['name'];
        $ukuran_file        = $_FILES['gambar']['size'];
        $tipe_file          = $_FILES['gambar']['type'];
        $tmp_file           = $_FILES['gambar']['tmp_name'];
        
        // tentuka extension yang diperbolehkan
        $allowed_extensions = array('JPG','JPEG','PNG','jpg','png');
        
        // Set path folder tempat menyimpan gambarnya
        $path               = "../../images/konfirmasi/".$nama_file;
        
        // check extension
        $file               = explode(".", $nama_file);
        $extension          = array_pop($file);

        // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
        if(in_array($extension, $allowed_extensions)) {
            // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
            if($ukuran_file <= 30000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 30 mb
                // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                // Proses upload
                if(move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
                    // Jika gambar berhasil diupload, Lakukan : 
                    // perintah query untuk mengubah data pada tabel pembayaran
                    $query = mysqli_query($mysqli, "UPDATE tbl_pembayaran SET   tanggal_bayar       = '$tanggal_bayar',
                                                                                rekening_asal       = '$rekening_asal',
                                                                                no_rekening_asal    = '$no_rekening_asal',
                                                                                pemilik_rekening    = '$pemilik_rekening',
                                                                                rekening_tujuan     = '$rekening_tujuan',
                                                                                jumlah_bayar        = '$jumlah_bayar',
                                                                                bukti_bayar         = '$nama_file',
                                                                                status_bayar        = '$status_bayar'
                                                                       WHERE    id_bayar            = '$id_bayar'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // perintah query untuk mengubah data pada tabel pembayaran
                        $query2 = mysqli_query($mysqli, "UPDATE tbl_transaksi SET status        = '$status_bayar'
                                                                            WHERE id_transaksi  = '$id_transaksi'")
                                                        or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));
                        
                        // cek query
                        if ($query2) {
                            // jika berhasil tampilkan pesan berhasil update data
                            header("location: ../../main.php?page=konfirmasi&alert=1");
                        }
                    }
                } else {
                    // Jika gambar gagal diupload, tampilkan pesan gagal upload
                    header("location: ../../main.php?page=konfirmasi&alert=2");
                }
            } else {
                // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
                header("location: ../../main.php?page=konfirmasi&alert=3");
            }
        } else {
            // Jika tipe file yang diupload bukan JPG / JPEG / PNG, tampilkan pesan gagal upload
            header("location: ../../main.php?page=konfirmasi&alert=4");
        } 	
	}	
}
?>
