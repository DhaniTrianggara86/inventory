<ul class="nav navbar-nav navbar-right">
<?php   
// fungsi untuk pengecekan menu aktif
// jika menu home dipilih, menu home aktif
if ($_GET["page"]=="home") { ?>
	<li class="active">
	    <a href="?page=home">Kelola Beranda </a>
	</li>
<?php
}
// jika tidak, menu home tidak aktif
else { ?>
	<li>
      <a href="?page=home">Kelola Beranda </a>
  </li>
<?php
}

// jika menu tentang dipilih, menu tentang aktif
if ($_GET["page"]=="tentang") { ?>
	<li class="active">
      <a href="?page=tentang">Kelola Profil </a>
  </li>
<?php
}
// jika tidak, menu tentang tidak aktif
else { ?>
	<li>
      <a href="?page=tentang">Kelola Profil </a>
  </li>
<?php
}     

  

if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])) { 
  // jika menu daftar dipilih, menu daftar aktif
  if ($_GET["page"]=="daftar") { ?>
    <li class="active">
        <a href="?page=daftar"> Kelola Daftar </a>
    </li>
  <?php
  }
  // jika tidak, menu daftar tidak aktif
  else { ?>
    <li>
        <a href="?page=daftar">Kelola Daftar </a>
    </li>
  <?php
  }        

  // jika menu cara login, menu login aktif
  if ($_GET["page"]=="login") { ?>
      <li class="dropdown active">
          <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Login
          </a>
          <ul style="padding:30px 20px 10px 20px;min-width:350px" class="dropdown-menu">
              <li>
                  <form class="" method="POST" action="login-check.php">
                      <div class="form-group">
                          <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required>
                      </div>
                      <div style="margin-bottom:25px"></div>
                      <div class="form-group">
                          <input type="submit" class="btn btn-primary btn-block" name="login" value="Login">
                      </div>
                  </form>
              </li>
          </ul>
      </li>
  <?php
  }
  // jika tidak, menu cara beli tidak aktif
  else { ?>
    <li class="dropdown">
          <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Login
          </a>
          <ul style="padding:30px 20px 10px 20px;min-width:350px" class="dropdown-menu">
              <li>
                  <form class="" method="POST" action="login-check.php">
                      <div class="form-group">
                          <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required>
                      </div>
                      <div style="margin-bottom:25px"></div>
                      <div class="form-group">
                          <input type="submit" class="btn btn-primary btn-block" name="login" value="Login">
                      </div>
                  </form>
              </li>
          </ul>
      </li>
  <?php
  }    
} else {
  // jika menu keranjang dipilih, menu keranjang aktif
  if ($_GET["page"]=="keranjang") { ?>
    <li class="dropdown active">
          <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-shopping-cart"></i> Kelola Pembelian <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
              <li class="active">
                <a href="?page=keranjang"><i class="fa fa-caret-right"></i> Kelola Keranjang Belanja</a>
              </li>

              <li role="separator" class="divider"></li>
              
              <li>
                <a href="?page=pembelian&form=view"><i class="fa fa-caret-right"></i> Kelola Daftar Pembelian</a>
              </li>

              <li role="separator" class="divider"></li>

              <li>
                <a href="?page=konfirmasi"><i class="fa fa-caret-right"></i> Kelola Konfirmasi Pembayaran</a>
              </li>

              <li role="separator" class="divider"></li>

              <li>
                <a href="?page=penerimaan"><i class="fa fa-caret-right"></i> Kelola Konfirmasi Penerimaan</a>
              </li>
          </ul>
      </li>
  <?php
  }
  // jika menu pembelian dipilih, menu pembelian aktif
  elseif ($_GET["page"]=="pembelian") { ?>
    <li class="dropdown active">
          <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-shopping-cart"></i> Kelola Pembelian <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
              <li>
                <a href="?page=keranjang"><i class="fa fa-caret-right"></i> Kelola Keranjang Belanja</a>
              </li>

              <li role="separator" class="divider"></li>

              <li class="active">
                <a href="?page=pembelian&form=view"><i class="fa fa-caret-right"></i> Kelola Daftar Pembelian</a>
              </li>

              <li role="separator" class="divider"></li>

              <li>
                <a href="?page=konfirmasi"><i class="fa fa-caret-right"></i> Kelola Konfirmasi Pembayaran</a>
              </li>

              <li role="separator" class="divider"></li>

              <li>
                <a href="?page=penerimaan"><i class="fa fa-caret-right"></i>  Kelola Konfirmasi Penerimaan</a>
              </li>
          </ul>
      </li>
  <?php
  }
  // jika menu konfirmasi dipilih, menu konfirmasi aktif
  elseif ($_GET["page"]=="konfirmasi") { ?>
    <li class="dropdown active">
          <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-shopping-cart"></i> Kelola Pembelian <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
              <li>
                <a href="?page=keranjang"><i class="fa fa-caret-right"></i> Kelola Keranjang Belanja</a>
              </li>

              <li role="separator" class="divider"></li>

              <li>
                <a href="?page=pembelian&form=view"><i class="fa fa-caret-right"></i> Kelola Daftar Pembelian</a>
              </li>

              <li role="separator" class="divider"></li>

              <li class="active">
                <a href="?page=konfirmasi"><i class="fa fa-caret-right"></i> Kelola Konfirmasi Pembayaran</a>
              </li>

              <li role="separator" class="divider"></li>

              <li>
                <a href="?page=penerimaan"><i class="fa fa-caret-right"></i> Kelola Konfirmasi Penerimaan</a>
              </li>
          </ul>
      </li>
  <?php
  }
  // jika menu konfirmasi dipilih, menu konfirmasi aktif
  elseif ($_GET["page"]=="penerimaan") { ?>
    <li class="dropdown active">
          <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-shopping-cart"></i> Kelola Pembelian <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
              <li>
                <a href="?page=keranjang"><i class="fa fa-caret-right"></i> Kelola Keranjang Belanja</a>
              </li>

              <li role="separator" class="divider"></li>

              <li>
                <a href="?page=pembelian&form=view"><i class="fa fa-caret-right"></i> Kelola Daftar Pembelian</a>
              </li>

              <li role="separator" class="divider"></li>

              <li>
                <a href="?page=konfirmasi"><i class="fa fa-caret-right"></i> Kelola Konfirmasi Pembayaran</a>
              </li>

              <li role="separator" class="divider"></li>

              <li class="active">
                <a href="?page=penerimaan"><i class="fa fa-caret-right"></i> Kelola Konfirmasi Penerimaan</a>
              </li>
          </ul>
      </li>
  <?php
  }
  else { ?>
    <li class="dropdown">
          <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-shopping-cart"></i> Kelola Pembelian <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
              <li>
                <a href="?page=keranjang"><i class="fa fa-caret-right"></i> Kelola Keranjang Belanja</a>
              </li>

              <li role="separator" class="divider"></li>

              <li>
                <a href="?page=pembelian&form=view"><i class="fa fa-caret-right"></i> Kelola Daftar Pembelian</a>
              </li>

              <li role="separator" class="divider"></li>

              <li>
                <a href="?page=konfirmasi"><i class="fa fa-caret-right"></i> Kelola Konfirmasi Pembayaran</a>
              </li>

              <li role="separator" class="divider"></li>

              <li>
                <a href="?page=penerimaan"><i class="fa fa-caret-right"></i> Kelola Konfirmasi Penerimaan</a>
              </li>
          </ul>
      </li>
  <?php
  }

  // jika menu profil dipilih, menu profil aktif
  if ($_GET["page"]=="profil") { ?>
    <li class="dropdown active">
          <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user"></i> <?php echo $_SESSION['nama_konsumen']; ?> <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
              <li class="active">
                <a href="?page=profil"><i class="fa fa-caret-right"></i> Kelola Profil</a>
              </li>

              <li role="separator" class="divider"></li>

              <li>
                <a href="?page=password"><i class="fa fa-caret-right"></i> Ubah Password</a>
              </li>

              <li role="separator" class="divider"></li>

              <li>
                <a href="logout.php"><i class="fa fa-caret-right"></i> Logout</a>
              </li>
          </ul>
      </li>
  <?php
  }
  // jika menu password dipilih, menu password aktif
  elseif ($_GET["page"]=="password") { ?>
    <li class="dropdown active">
          <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user"></i> <?php echo $_SESSION['nama_konsumen']; ?> <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
              <li>
                <a href="?page=profil"><i class="fa fa-caret-right"></i> Kelola Profil</a>
              </li>

              <li role="separator" class="divider"></li>

              <li class="active">
                <a href="?page=password"><i class="fa fa-caret-right"></i> Ubah Password</a>
              </li>

              <li role="separator" class="divider"></li>

              <li>
                <a href="logout.php"><i class="fa fa-caret-right"></i> Logout</a>
              </li>
          </ul>
      </li>
  <?php
  }
  else { ?>
    <li class="dropdown">
          <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user"></i> <?php echo $_SESSION['nama_konsumen']; ?> <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
              <li>
                <a href="?page=profil"><i class="fa fa-caret-right"></i> Kelola Profil</a>
              </li>

              <li role="separator" class="divider"></li>

              <li>
                <a href="?page=password"><i class="fa fa-caret-right"></i> Ubah Password</a>
              </li>

              <li role="separator" class="divider"></li>

              <li>
                <a href="logout.php"><i class="fa fa-caret-right"></i> Logout</a>
              </li>
          </ul>
      </li>
  <?php
  }
}
                  
?>
</ul>
