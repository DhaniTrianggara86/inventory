<div id="sidebar-inner" class="sidebar sidebar-fixed expandable sidebar-light">
			
				
<?php if ($_SESSION['level'] == 'pemilik'){?>
<?php 



// jika menu konsumen dipilih, menu konsumen aktif
if ($_GET["module"] == "konsumen" || $_GET["module"] == "form_konsumen") { ?>
    <div class="active open hover highlight">
        <a href="?module=konsumen">
            <i class="menu-icon fa fa-user"></i>
            <span class="menu-text"> Kelola Customer </span>
        </a>

        <b class="arrow"></b>
    </div>
<?php
} 
// jika tidak, menu konsumen tidak aktif
else {  ?>
     <div class="hover">
        <a href="?module=konsumen">
            <i class="menu-icon fa fa-user"></i>
            <span class="menu-text"> Kelola Customer </span>
        </a>

        <b class="arrow"></b>
    </div>
<?php
}

// jika menu barang dipilih, menu barang aktif
if ($_GET["module"] == "barang" || $_GET["module"] == "form_barang") { ?>
    <div class="active open hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-folder-o"></i>
            <span class="menu-text"> Kelola Barang  Masuk</span>

         
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="active open hover">
                <a href="?module=barang">
                    <i class="menu-icon fa fa-cube"></i>
                   Kelola  Barang Masuk
                </a>

                <b class="arrow"></b>
            </div>

            <div class="hover">
                <a href="?module=kategori">
                    <i class="menu-icon fa fa-folder-o"></i>
                    Kelola Kategori Barang
                </a>

              
            </div>
        </ul>
    </div>

<?php
}
// jika menu kategori dipilih, menu kategori aktif
elseif ($_GET["module"] == "kategori" || $_GET["module"] == "form_kategori") { ?>
    <div class="active open hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-folder-o"></i>
            <span class="menu-text"> Kelola Barang Masuk</span>

            
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="hover">
                <a href="?module=barang">
                    <i class="menu-icon fa fa-cube"></i>
                   Kelola  Barang Masuk
                </a>

                <b class="arrow"></b>
            </div>

            <div class="active open hover">
                <a href="?module=kategori">
                    <i class="menu-icon fa fa-folder-o"></i>
                    Kelola Kategori Barang
                </a>

               
            </div>
        </ul>
    </div>
<?php
}
// jika tidak, menu barang tidak aktif
else {  ?>
    <div class="hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-folder-o"></i>
            <span class="menu-text"> Kelola Barang Masuk </span>

           
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="hover">
                <a href="?module=barang">
                    <i class="menu-icon fa fa-cube"></i>
                    Kelola  Barang Masuk
                </a>

                <b class="arrow"></b>
            </div>

            <div class="hover">
                <a href="?module=kategori">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Kelola Ketegori Barang
                </a>

               
            </div>
        </ul>
    </div>
<?php
}

// jika menu biaya kirim dipilih, menu biaya kirim aktif
if ($_GET["module"] == "biaya_kirim") { ?>
    <div class="active open hover highlight">
        <a href="?module=biaya_kirim">
            <i class="menu-icon fa fa-truck"></i>
            <span class="menu-text"> Biaya Pengiriman </span>
        </a>

        <b class="arrow"></b>
    </div>
<?php
} 
// jika tidak, menu biaya kirim tidak aktif
else {  ?>
     <div class="hover">
        <a href="?module=biaya_kirim">
            <i class="menu-icon fa fa-truck"></i>
            <span class="menu-text"> Biaya Pengiriman </span>
        </a>

        <b class="arrow"></b>
    </div>
<?php
}

// jika menu pesanan dipilih, menu pesanan aktif
if ($_GET["module"] == "pesanan" || $_GET["module"] == "form_pesanan") { ?>
    <div class="active open hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-shopping-cart"></i>
            <span class="menu-text"> Kelola Request Purchasing </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="active open hover">
                <a href="?module=pesanan">
                    <i class="menu-icon fa fa-sign-out"></i>
                    Kelola Barang Keluar
                </a>

                <b class="arrow"></b>
            </div>

            <div class="hover">
                <a href="?module=konfirmasi">
                    <i class="menu-icon fa fa-check-square-o"></i>
                    Persetujuan Order Barang
                </a>

                <b class="arrow"></b>
            </div>
        </ul>
    </div>
<?php
}
// jika menu konfirmasi dipilih, menu konfirmasi aktif
elseif ($_GET["module"] == "konfirmasi" || $_GET["module"] == "form_konfirmasi") { ?>
    <div class="active open hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-shopping-cart"></i>
            <span class="menu-text"> Kelola Request Purchasing </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="hover">
                <a href="?module=pesanan">
                    <i class="menu-icon fa fa-sign-out"></i>
                   Kelola Barang Keluar 
                </a>

                <b class="arrow"></b>
            </div>

            <div class="active open hover">
                <a href="?module=konfirmasi">
                    <i class="menu-icon fa fa-check-square-o"></i>
                  Persetujuan Order Barang
                </a>

                <b class="arrow"></b>
            </div>
        </ul>
    </div>
<?php
}
// jika tidak, menu barang tidak aktif
else {  ?>
    <div class="hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-shopping-cart"></i>
            <span class="menu-text"> Kelola Request Purchasing</span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="hover">
                <a href="?module=pesanan">
                    <i class="menu-icon fa fa-sign-out"></i>
                    Kelola Barang Keluar
                </a>

                <b class="arrow"></b>
            </div>

            <div class="hover">
                <a href="?module=konfirmasi">
                    <i class="menu-icon fa fa-check-square-o"></i>
                  Persetujuan Order Barang
                </a>

                <b class="arrow"></b>
            </div>
        </ul>
    </div>
<?php
}

// jika menu komentar dipilih, menu komentar aktif
if ($_GET["module"] == "komentar") { ?>
    <div class="active open hover highlight">
        <a href="?module=komentar">
            <i class="menu-icon fa fa-comment"></i>
            <span class="menu-text"> Komentar </span>
        </a>

        <b class="arrow"></b>
    </div>
	

<?php
} 
// jika tidak, menu komentar tidak aktif
else {  ?>
     <div class="hover">
        <a href="?module=komentar">
            <i class="menu-icon fa fa-comment"></i>
            <span class="menu-text"> Komentar </span>
        </a>

        <b class="arrow"></b>
    </div>
	
	
	<?php
}

// jika menu komentar dipilih, menu komentar aktif
if ($_GET["module"] == "admin") { ?>
    <div class="active open hover highlight">
        <a href="?module=admin">
            <i class="menu-icon fa fa-user"></i>
            <span class="menu-text"> Admin </span>
        </a>

        <b class="arrow"></b>
    </div>
	

<?php
} 
// jika tidak, menu komentar tidak aktif
else {  ?>
     <div class="hover">
        <a href="?module=admin">
            <i class="menu-icon fa fa-user"></i>
            <span class="menu-text"> Admin </span>
        </a>

        <b class="arrow"></b>
    </div>
	
	
<?php
}

// jika menu Laporan perhari dipilih, menu Laporan perhari aktif
if ($_GET["module"] == "laporanperhari") { ?>
    <div class="active open hover highlight">
       
            <i class="menu-icon fa fa-file-text-o"></i>
            <span class="menu-text"> Laporan </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="active open hover">
                <a href="?module=laporanperhari">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Perhari
                </a>

                <b class="arrow"></b>
            </div>
			
			<div class="hover">
                <a href="?module=laporanperbulan">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan perbulan
                </a>

                <b class="arrow"></b>
            </div>
			
			<div class="hover">
                <a href="?module=laporanpertahun">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan pertahun
                </a>

                <b class="arrow"></b>
            </div>
			<div class="hover">
                <a href="laporanproduk.php" target="_blank">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Produk
                </a>

                <b class="arrow"></b>
            </div>

            <li class="hover">
                <a href="?module=grafik">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Grafik
                </a>

                <b class="arrow"></b>
            </li>-->
        </ul>
    </div>
<?php
}
// jika menu Laporan perbulan dipilih, menu laporan perbulan aktif
elseif ($_GET["module"] == "laporanperbulan") { ?>
    <div class="active open hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-file-text-o"></i>
            <span class="menu-text"> Laporan </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="hover">
                <a href="?module=laporanperhari">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Perhari
                </a>

                <b class="arrow"></b>
            </div>
			
			<div class="active open hover">
                <a href="?module=laporanperbulan">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan perbulan
                </a>

                <b class="arrow"></b>
            </div>
			
			<div class="hover">
                <a href="?module=laporanpertahun">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan pertahun
                </a>

                <b class="arrow"></b>
            </div>
			<div class="hover">
                <a href="laporanproduk.php" target="_blank">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Produk
                </a>

                <b class="arrow"></b>
            </div>

            <li class="hover">
                <a href="?module=grafik">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Grafik
                </a>

                <b class="arrow"></b>
            </li>-->
        </ul>
    </div>
<?php
}
// jika menu Laporan pertahun dipilih, menu laporan pertahun aktif
elseif ($_GET["module"] == "laporanpertahun") { ?>
    <div class="active open hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-file-text-o"></i>
            <span class="menu-text"> Laporan </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="hover">
                <a href="?module=laporanperhari">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Perhari
                </a>

                <b class="arrow"></b>
            </div>
			
			<div class="hover">
                <a href="?module=laporanperbulan">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan perbulan
                </a>

                <b class="arrow"></b>
            </div>
			
			<div class="active open hover">
                <a href="?module=laporanpertahun">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan pertahun
                </a>

                <b class="arrow"></b>
            </div>
			<div class="hover">
                <a href="laporanproduk.php" target="_blank">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Produk
                </a>

                <b class="arrow"></b>
            </div>


            <li class="hover">
                <a href="?module=grafik">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Grafik
                </a>

                <b class="arrow"></b>
            </li>-->
        </ul>
    </div>
<?php
}
// jika menu grafik dipilih, menu grafik aktif
elseif ($_GET["module"] == "grafik") { ?>
    <div class="active open hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-file-text-o"></i>
            <span class="menu-text"> Laporan </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="hover">
                <a href="?module=laporanperhari">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Perhari
                </a>

                <b class="arrow"></b>
            </div>
			
			<div class="hover">
                <a href="?module=laporanperbulan">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Perbulan
                </a>

                <b class="arrow"></b>
            </div>
			
			<div class="hover">
                <a href="?module=laporanpertahun">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Pertahun
                </a>

                <b class="arrow"></b>
            </div>
			<div class="hover">
                <a href="laporanproduk.php" target="_blank">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Produk
                </a>

                <b class="arrow"></b>
            </div>

            <li class="active open hover">
                <a href="?module=grafik">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Grafik
                </a>

                <b class="arrow"></b>
            </li>-->
        </ul>
    </div>
<?php
}
// jika tidak, menu laporan tidak aktif
else {  ?>
    <div class="hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-file-text-o"></i>
            <span class="menu-text"> Laporan </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="hover">
                <a href="?module=laporanperhari">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Perhari
                </a>

                <b class="arrow"></b>
            </div>
			
			<div class="hover">
                <a href="?module=laporanperbulan">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Perbulan
                </a>

                <b class="arrow"></b>
            </div>
			
			<div class="hover">
                <a href="?module=laporanpertahun">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Pertahun
                </a>

                <b class="arrow"></b>
            </div>
			<div class="hover">
                <a href="laporanproduk.php" target="_blank">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Produk
                </a>

                <b class="arrow"></b>
            </div>

            <li class="hover">
                <a href="?module=grafik">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Grafik
                </a>

                <b class="arrow"></b>
            </li>-->
        </ul>
    </div>
<?php
}



// jika menu password dipilih, menu password aktif
if ($_GET["module"] == "password") { ?>
    <div class="active open hover highlight">
        <a href="?module=password">
            <i class="menu-icon fa fa-lock"></i>
            <span class="menu-text"> Ubah Password </span>
        </a>

        <b class="arrow"></b>
    </div>
<?php
} 
// jika tidak, menu password tidak aktif
else {  ?>
     <div class="hover">
        <a href="?module=password">
            <i class="menu-icon fa fa-lock"></i>
            <span class="menu-text"> Ubah Password </span>
        </a>

        <b class="arrow"></b>
    </div>
<?php
}
}else{
?>
<?php 
// fungsi untuk pengecekan menu aktif
// jika menu beranda dipilih, menu beranda aktif



// jika menu tentang dipilih, menu tentang aktif
if ($_GET["module"] == "tentang") { ?>
    
<?php
}
// jika menu cara beli dipilih, menu cara beli aktif
elseif ($_GET["module"] == "cara_beli") { ?>
   
<?php
}
// jika tidak, menu <li tidak aktif
else {  ?>
    
<?php
}

// jika menu konsumen dipilih, menu konsumen aktif


// jika menu barang dipilih, menu barang aktif
if ($_GET["module"] == "barang" || $_GET["module"] == "form_barang") { ?>
    <div class="active open hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-folder-o"></i>
            <span class="menu-text"> Kelola Barang Masuk</span>

          
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="active open hover">
                <a href="?module=barang">
                    <i class="menu-icon fa fa-cube"></i>
                  Kelola Barang Masuk
                </a>

                <b class="arrow"></b>
            </div>

            <div class="hover">
                <a href="?module=kategori">
                    <i class="menu-icon fa fa-cube"></i>
                   Kelola Kategori Barang
                </a>

                <b class="arrow"></b>
            </div>
        </ul>
    </div>
<?php
}
// jika menu kategori dipilih, menu kategori aktif
elseif ($_GET["module"] == "kategori" || $_GET["module"] == "form_kategori") { ?>
    <div class="active open hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-folder-o"></i>
            <span class="menu-text"> Kelola Barang Masuk </span>

            
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="hover">
                <a href="?module=barang">
                    <i class="menu-icon fa fa-cube"></i>
                   Kelola  Barang Masuk
                </a>

                <b class="arrow"></b>
            </div>

            <div class="active open hover">
                <a href="?module=kategori">
                    <i class="menu-icon fa fa-folder-o"></i>
                    Kelola Kategori Barang
                </a>

           
            </div>
        </ul>
    </div>
<?php
}
// jika tidak, menu barang tidak aktif
else {  ?>
    <div class="hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-folder-o"></i>
            <span class="menu-text"> Kelola Barang Masuk </span>

          
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="hover">
                <a href="?module=barang">
                    <i class="menu-icon fa fa-cube"></i>
                   Kelola  Barang Masuk
                </a>

                <b class="arrow"></b>
            </div>

            <div class="hover">
                <a href="?module=kategori">
                    <i class="menu-icon fa fa-folder-o"></i>
                    Kelola Kategori Barang
                </a>

              
            </div>
        </ul>
    </div>
<?php
}

// jika menu biaya kirim dipilih, menu biaya kirim aktif
if ($_GET["module"] == "biaya_kirim") { ?>
    <div class="active open hover highlight">
        <a href="?module=biaya_kirim">
            <i class="menu-icon fa fa-truck"></i>
            <span class="menu-text"> Biaya Pengiriman </span>
        </a>

        <b class="arrow"></b>
    </div>
<?php
} 
// jika tidak, menu biaya kirim tidak aktif
else {  ?>
     <div class="hover">
        <a href="?module=biaya_kirim">
            <i class="menu-icon fa fa-truck"></i>
            <span class="menu-text"> Biaya Pengiriman </span>
        </a>

        <b class="arrow"></b>
    </div>
<?php
}

// jika menu pesanan dipilih, menu pesanan aktif
if ($_GET["module"] == "pesanan" || $_GET["module"] == "form_pesanan") { ?>
    <div class="active open hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-shopping-cart"></i>
            <span class="menu-text"> Kelola Request Purchasing </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="active open hover">
                <a href="?module=pesanan">
                    <i class="menu-icon fa fa-sign-out"></i>
                   Kelola Barang Keluar
                </a>

                <b class="arrow"></b>
            </div>

            <div class="hover">
                <a href="?module=konfirmasi">
                    <i class="menu-icon fa fa-check-square-o"></i>
                    Persetujuan Order Barang
                </a>

                <b class="arrow"></b>
            </div>
        </ul>
    </div>
<?php
}
// jika menu konfirmasi dipilih, menu konfirmasi aktif
elseif ($_GET["module"] == "konfirmasi" || $_GET["module"] == "form_konfirmasi") { ?>
    <div class="active open hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-shopping-cart"></i>
            <span class="menu-text"> Kelola Request Purchasing </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="hover">
                <a href="?module=pesanan">
                    <i class="menu-icon fa fa-sign-out"></i>
                  Kelola Barang Keluar
                </a>

                <b class="arrow"></b>
            </div>

            <div class="active open hover">
                <a href="?module=konfirmasi">
                    <i class="menu-icon fa fa-check-square-o"></i>
                    Persetujuan Order Barang
                </a>

                <b class="arrow"></b>
            </div>
        </ul>
    </div>
<?php
}
// jika tidak, menu barang tidak aktif
else {  ?>
    <div class="hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-shopping-cart"></i>
            <span class="menu-text"> Kelola Request Purchasing </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="hover">
                <a href="?module=pesanan">
                    <i class="menu-icon fa fa-sign-out"></i>
                   Kelola Barang Keluar 
                </a>

                <b class="arrow"></b>
            </div>

            <div class="hover">
                <a href="?module=konfirmasi">
                    <i class="menu-icon fa fa-check-square-o"></i>
                  Persetujuan Order Barang
                </a>

                <b class="arrow"></b>
            </div>
        </ul>
    </div>
<?php
}

// jika menu komentar dipilih, menu komentar aktif
if ($_GET["module"] == "komentar") { ?>
    <div class="active open hover highlight">
        <a href="?module=komentar">
            <i class="menu-icon fa fa-comment"></i>
            <span class="menu-text"> Komentar </span>
        </a>

        <b class="arrow"></b>
    </div>
<?php
} 
// jika tidak, menu komentar tidak aktif
else {  ?>
     <div class="hover">
        <a href="?module=komentar">
            <i class="menu-icon fa fa-comment"></i>
            <span class="menu-text"> Komentar </span>
        </a>

        <b class="arrow"></b>
    </div>
<?php
}

// jika menu Laporan perhari dipilih, menu Laporan perhari aktif
if ($_GET["module"] == "laporanperhari") { ?>
    
<?php
}
// jika menu Laporan perbulan dipilih, menu laporan perbulan aktif
elseif ($_GET["module"] == "laporanperbulan") { ?>
   
<?php
}
// jika menu Laporan pertahun dipilih, menu laporan pertahun aktif
elseif ($_GET["module"] == "laporanpertahun") { ?>
    
<?php
}
// jika menu grafik dipilih, menu grafik aktif
elseif ($_GET["module"] == "grafik") { ?>
    <div class="active open hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-file-text-o"></i>
            <span class="menu-text"> Laporan </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <div class="hover">
                <a href="?module=laporanperhari">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Perhari
                </a>

                <b class="arrow"></b>
            </div>
			
			<div class="hover">
                <a href="?module=laporanperbulan">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Perbulan
                </a>

                <b class="arrow"></b>
            </div>
			
			<div class="hover">
                <a href="?module=laporanpertahun">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Pertahun
                </a>

                <b class="arrow"></b>
            </div>
			<div class="hover">
                <a href="laporanproduk.php" target="_blank">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Produk
                </a>

                <b class="arrow"></b>
            </div>


            <li class="active open hover">
                <a href="?module=grafik">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Grafik
                </a>

                <b class="arrow"></b>
            </li>-->
        </ul>
    </div>
<?php
}
// jika tidak, menu laporan tidak aktif





// jika menu password dipilih, menu password aktif
 

	
	}
	
	
	



