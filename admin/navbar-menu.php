
<ul class="nav nav-list"> 
<?php if ($_SESSION['level'] == 'manager'){?>
<?php 
// fungsi untuk pengecekan menu aktif
// jika menu beranda dipilih, menu beranda aktif
// jika tidak, menu beranda tidak aktif
 
// jika menu konsumen dipilih, menu konsumen aktif
if ($_GET["module"] == "Barang masuk keluar" || $_GET["module"] == "view_Barang masuk keluar") { ?>
    <li class="active open hover highlight">
        <a href="?module=konsumen">
            <i class="menu-icon fa fa-folder-o"></i>
            <span class="menu-text"> Kelola Barang Keluar </span>
        </a>

        <b class="arrow"></b>
    </li>
<?php
} 
// jika tidak, menu konsumen tidak aktif
else {  ?>
     <li class="hover">
        <a href="?module=Barang masuk keluar">
            <i class="menu-icon fa fa-folder-o"></i>
            <span class="menu-text"> Kelola  Barang Keluar </span>
        </a>

        <b class="arrow"></b>
    </li>
<?php
}

// jika menu barang dipilih, menu barang aktif
if ($_GET["module"] == "barang" || $_GET["module"] == "form_barang") { ?>
    <li class="active open hover highlight">
        
            <li class="active open hover">
                <a href="?module=barang">
                    <i class="menu-icon fa fa-cube"></i>
                   Kelola  Barang Masuk
                </a>

                <b class="arrow"></b>
            </li>

            <li class="hover">
                <a href="?module=kategori">
                    <i class="menu-icon fa fa-cube"></i>
                    Kelola Kategori Barang
                </a>

                <b class="arrow"></b>
            </li>

<?php
}
// jika menu kategori dipilih, menu kategori aktif
elseif ($_GET["module"] == "kategori" || $_GET["module"] == "form_kategori") { ?>
    <li class="active open hover highlight">
     
      
            <li class="hover">
                <a href="?module=barang">
                    <i class="menu-icon fa fa-cube"></i>
                   Kelola  Barang Masuk
               </a>

                <b class="arrow"></b>
            </li>

            <li class="active open hover">
                <a href="?module=kategori">
                    <i class="menu-icon fa fa-cube"></i>
                   Kelola Kategori Barang
                </a>

                <b class="arrow"></b>
            </li>
     
<?php
}
// jika tidak, menu barang tidak aktif
else {  ?>
    <li class="hover highlight">
      
            <li class="hover">
                <a href="?module=barang">
                    <i class="menu-icon fa fa-cube"></i>
                    Kelola  Barang Masuk
                </a>

                <b class="arrow"></b>
            </li>

            <li class="hover">
                <a href="?module=kategori">
                    <i class="menu-icon fa fa-cube"></i>
                    Kelola Ketegori Barang
                </a>

                <b class="arrow"></b>
            </li>
       
<?php
}

// jika menu pesanan dipilih, menu pesanan aktif
if ($_GET["module"] == "pesanan" || $_GET["module"] == "form_pesanan") { ?>
     <li class="active open hover highlight">
            <li class="active open hover">
                <a href="?module=pesanan">
                    <i class="menu-icon fa fa-sign-out"></i>
                    Kelola Data Pesanan
                </a>

                <b class="arrow"></b>
            </li>

            <li class="hover">
                <a href="?module=konfirmasi">
                    <i class="menu-icon fa fa-check-square"></i>
                     Kelola Persetujuan Order 
                </a>

                <b class="arrow"></b>
            </li>
     
<?php
}
// jika menu konfirmasi dipilih, menu konfirmasi aktif
elseif ($_GET["module"] == "konfirmasi" || $_GET["module"] == "form_konfirmasi") { ?>
	<li class="active open hover highlight">
            <li class="hover">
                <a href="?module=pesanan">
                    <i class="menu-icon fa fa-sign-out"></i>
                   Kelola Data Pesanan
                </a>

                <b class="arrow"></b>
            </li>

            <li class="active open hover">
                <a href="?module=konfirmasi">
                    <i class="menu-icon fa fa-check-square"></i>
                Kelola  Persetujuan Order 
                </a>

                <b class="arrow"></b>
            </li>
      
<?php
}
// jika tidak, menu barang tidak aktif
else {  ?>
     <li class="active open hover highlight">
      
            <li class="hover">
                <a href="?module=pesanan">
                    <i class="menu-icon fa fa-sign-out"></i>
                    Kelola Data Pesanan
                </a>

                <b class="arrow"></b>
            </li>

            <li class="hover">
                <a href="?module=konfirmasi">
                    <i class="menu-icon fa fa-check-square"></i>
                 Kelola Persetujuan Order 
                </a>

                <b class="arrow"></b>
            </li>
      
	<?php
}

// jika menu komentar dipilih, menu komentar aktif
if ($_GET["module"] == "admin") { ?>
    <li class="active open hover highlight">
	
        <a href="?module=admin">
            <i class="menu-icon fa fa-user"></i>
            <span class="menu-text"> Kelola Admin </span>
        </a>

        <b class="arrow"></b>

	
	

<?php
} 
// jika tidak, menu komentar tidak aktif
else {  ?>
     <li class="hover">
        <a href="?module=admin">
            <i class="menu-icon fa fa-user"></i>
            <span class="menu-text"> Kelola Admin </span>
        </a>

        <b class="arrow"></b>
    </li>
	
	
<?php
}
// jika menu Laporan perhari dipilih, menu Laporan perhari aktif
if ($_GET["module"] == "laporanperhari") { ?>
    <li class="active open hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-file-text-o"></i>
            <span class="menu-text"> Laporan </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
          
			
		
			<li class="hover">
                <a href="laporanproduk.php" target="_blank">
                    <i class="menu-icon fa fa-caret-right"></i>
					Kelola Laporan 
                </a>

                <b class="arrow"></b>
            </li>

            <li class="hover">
                <a href="?module=grafik">
                    <i class="menu-icon fa fa-caret-right"></i>
                   Kelola Grafik
                </a>

                <b class="arrow"></b>
            </li>
        </ul>
    </li>
<?php
}
// jika menu Laporan perbulan dipilih, menu laporan perbulan aktif
elseif ($_GET["module"] == "laporanperbulan") { ?>
    <li class="active open hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-file-text-o"></i>
            <span class="menu-text"> Laporan </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            
		
			<li class="hover">
                <a href="laporanproduk.php" target="_blank">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Laporan Produk
                </a>

                <b class="arrow"></b>
            </li>

            <li class="hover">
                <a href="?module=grafik">
                    <i class="menu-icon fa fa-caret-right"></i>
                   Kelola Grafik
                </a>

                <b class="arrow"></b>
            </li>
        </ul>
    </li>
<?php
}
// jika menu Laporan pertahun dipilih, menu laporan pertahun aktif
elseif ($_GET["module"] == "laporanpertahun") { ?>
    <li class="active open hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-file-text-o"></i>
            <span class="menu-text"> Laporan </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
           
		
			<li class="hover">
                <a href="laporanproduk.php" target="_blank">
                    <i class="menu-icon fa fa-caret-right"></i>
					Kelola Laporan 
                </a>

                <b class="arrow"></b>
            </li>

            <li class="hover">
                <a href="?module=grafik">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Kelola Grafik
                </a>

                <b class="arrow"></b>
            </li>
        </ul>
    </li>
<?php
}
// jika menu grafik dipilih, menu grafik aktif
elseif ($_GET["module"] == "grafik") { ?>
    <li class="active open hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-file-text-o"></i>
            <span class="menu-text">Kelola Laporan  </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
           
		
			<li class="hover">
                <a href="laporanproduk.php" target="_blank">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Kelola Laporan 
                </a>

                <b class="arrow"></b>
            </li>

            <li class="active open hover">
                <a href="?module=grafik">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Kelola Grafik
                </a>

                <b class="arrow"></b>
            </li>
        </ul>
    </li>
<?php
}
// jika tidak, menu laporan tidak aktif
else {  ?>
    <li class="hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-file-text-o"></i>
            <span class="menu-text"> Kelola Laporan </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
          
			
			
			<li class="hover">
                <a href="laporanproduk.php" target="_blank">
                    <i class="menu-icon fa fa-caret-right"></i>
					Kelola Laporan
                </a>

                <b class="arrow"></b>
            </li>

            <li class="hover">
                <a href="?module=grafik">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Kelola Grafik
                </a>

                <b class="arrow"></b>
            </li>
        </ul>
    </li>
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
// jika tidak, menu informasi tidak aktif
else {  ?>
    
<?php
}

// jika menu konsumen dipilih, menu konsumen aktif


// jika menu barang dipilih, menu barang aktif
if ($_GET["module"] == "barang" || $_GET["module"] == "form_barang") { ?>
   

        <ul class="submenu">
            <li class="active open hover">
                <a href="?module=barang">
                    <i class="menu-icon fa fa-cube"></i>
                  Kelola Barang Masuk
                </a>

                <b class="arrow"></b>
            </li>

            <li class="hover">
                <a href="?module=kategori">
                    <i class="menu-icon fa fa-cube"></i>
                   Kelola Kategori Barang
                </a>

                <b class="arrow"></b>
            </li>
      
<?php
}
// jika menu kategori dipilih, menu kategori aktif
elseif ($_GET["module"] == "kategori" || $_GET["module"] == "form_kategori") { ?>
    <li class="active open hover highlight">
   
            <li class="hover">
                <a href="?module=barang">
                    <i class="menu-icon fa fa-caret-right"></i>
                   Kelola  Barang Masuk
                </a>

                <b class="arrow"></b>
            </li>

            <li class="active open hover">
                <a href="?module=kategori">
                    <i class="menu-icon fa fa-cube"></i>
                   Kelola Kategori Barang
                </a>

                <b class="arrow"></b>
            </li>
     
<?php
}
// jika tidak, menu barang tidak aktif
else {  ?>
    <li class="hover highlight">
       

        <ul class="submenu">
            <li class="hover">
                <a href="?module=barang">
                    <i class="menu-icon fa fa-caret-right"></i>
                   Kelola Barang Masuk
                </a>

                <b class="arrow"></b>
            </li>

            <li class="hover">
                <a href="?module=kategori">
                    <i class="menu-icon fa fa-cube"></i>
                    Kelola Kategori Barang
                </a>

                <b class="arrow"></b>
            </li>
        </ul>
    </li>
<?php
}

// jika menu biaya kirim dipilih, menu biaya kirim aktif
if ($_GET["module"] == "biaya_kirim") { ?>
    <li class="active open hover highlight">
        <a href="?module=biaya_kirim">
            <i class="menu-icon fa fa-truck"></i>
            <span class="menu-text">Kelola  Biaya Pengiriman </span>
        </a>

        <b class="arrow"></b>
    </li>
<?php
} 
// jika tidak, menu biaya kirim tidak aktif


// jika menu pesanan dipilih, menu pesanan aktif
if ($_GET["module"] == "pesanan" || $_GET["module"] == "form_pesanan") { ?>
    
	<li class="active open hover highlight">
     
            <li class="active open hover">
                <a href="?module=pesanan">
                    <i class="menu-icon fa fa-sign-out"></i>
                   Kelola Data Pesanan
                </a>

                <b class="arrow"></b>
            </li>

            <li class="hover">
                <a href="?module=konfirmasi">
                    <i class="menu-icon fa fa-check-square"></i>
                   Kelola Persetujuan Order 
                </a>

                <b class="arrow"></b>
            </li>
      
<?php
}
// jika menu konfirmasi dipilih, menu konfirmasi aktif
elseif ($_GET["module"] == "konfirmasi" || $_GET["module"] == "form_konfirmasi") { ?>
   
	<li class="active open hover highlight">
        
            <li class="hover">
                <a href="?module=pesanan">
                    <i class="menu-icon fa fa-sign-out"></i>
                  Kelola Data Pesanan
                </a>

                <b class="arrow"></b>
            </li>

            <li class="active open hover">
                <a href="?module=konfirmasi">
                    <i class="menu-icon fa fa-check-square"></i>
                    Kelola Persetujuan Order 
                </a>

                <b class="arrow"></b>
            </li>
       
<?php
}
// jika tidak, menu barang tidak aktif
else {  ?>
    
	<li class="active open hover highlight">
            <li class="hover">
                <a href="?module=pesanan">
                    <i class="menu-icon fa fa-sign-out"></i>
                   Kelola Data Pesanan
                </a>

                <b class="arrow"></b>
            </li>

            <li class="hover">
                <a href="?module=konfirmasi">
                    <i class="menu-icon fa fa-check-square"></i>
                  Kelola Persetujuan Order 
                </a>

                <b class="arrow"></b>
            </li>
       
<?php
}


// jika menu komentar dipilih, menu komentar aktif
if ($_GET["module"] == "konsumen" || $_GET["module"] == "form_konsumen") { ?>
    <li class="active open hover highlight">
        <a href="?module=konsumen">
            <i class="menu-icon fa fa-user"></i>
            <span class="menu-text"> Kelola Customer </span>
        </a>

        <b class="arrow"></b>
    </li>
<?php
} 
// jika tidak, menu konsumen tidak aktif
else {  ?>
     <li class="hover">
        <a href="?module=konsumen">
            <i class="menu-icon fa fa-user"></i>
            <span class="menu-text"> Kelola  Customer </span>
        </a>

        <b class="arrow"></b>
    </li>
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
    <li class="active open hover highlight">
        <a href="javascript:void(0);" class="dropdown-toggle">
            <i class="menu-icon fa fa-file-text-o"></i>
            <span class="menu-text"> Laporan </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>
        <ul class="submenu">
			<li class="hover">
                <a href="laporanproduk.php" target="_blank">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Kelola Laporan 
                </a>

                <b class="arrow"></b>
            </li>

            <li class="active open hover">
                <a href="?module=grafik">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Kelola Grafik
                </a>

                <b class="arrow"></b>
            </li>
        </ul>
    </li>
<?php
}
// jika tidak, menu laporan tidak aktif
?>
<?php





	}
	?>
	
	
	
	