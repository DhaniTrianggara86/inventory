<?php
session_start();      // memulai session
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="TioFashion">
        <meta name="author" content="TokoTioFashion">

        <title>Sistem Inventory Dan Penjualan Barang</title>

        <!-- favicon -->
      

        <!-- Bootstrap Core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- datepicker css -->
        <link href="assets/css/datepicker.min.css" rel="stylesheet" type="text/css">

        <!-- Custom CSS -->
        <link href="assets/css/modern-business.css" rel="stylesheet" type="text/css">

        <!-- Custom Fonts -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Custom CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

        <script language="javascript">
            function getkey(e)
            {
                if (window.event)
                    return window.event.keyCode;
                else if (e)
                    return e.which;
                else
                    return null;
            }

            function goodchars(e, goods, field)
            {
                var key, keychar;
                key = getkey(e);
                if (key == null) return true;
               
                keychar = String.fromCharCode(key);
                keychar = keychar.toLowerCase();
                goods = goods.toLowerCase();
               
                // check goodkeys
                if (goods.indexOf(keychar) != -1)
                    return true;
                // control keys
                if ( key==null || key==0 || key==8 || key==9 || key==27 )
                    return true;
                  
                if (key == 13) {
                    var i;
                    for (i = 0; i < field.form.elements.length; i++)
                        if (field == field.form.elements[i])
                            break;
                    i = (i + 1) % field.form.elements.length;
                    field.form.elements[i].focus();
                    return false;
                    };
                // else return false
                return false;
            }
        </script>
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="?page=home">
                       
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <form style="margin-top:14px" class="navbar-form navbar-left" action="?page=cari" method="POST">
                        <div class="form-group">
                        <?php  
                        if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])) { ?>
                            <input style="width:400px" type="text" class="form-control" name="produk" placeholder="Cari Produk" autocomplete="off" required>
                        <?php
                        } else { ?>
                            <input style="width:300px" type="text" class="form-control" name="produk" placeholder="Cari Produk" autocomplete="off" required>
                        <?php
                        }
                        ?>
                        </div>
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </form>
                    <!-- panggil file "navbar-menu.php" untuk menampilkan menu -->
                    <?php include "navbar-menu.php" ?>

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    
    <?php  
    if ($_GET['page']=='home') { 
        // panggil file "carousel.php" untuk menampilkan slide show
        include "carousel.php";
    }
    ?>
        <!-- Page Content -->
        <div style="min-height:540px" class="container">
        
            <!-- panggil file "content.php" untuk menampilkan halaman konten-->
            <?php include "content.php"; ?>

        </div>
        <!-- /.container -->

        <!-- Footer -->
        <footer style="margin-bottom:0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright Kerja Praktik CV Amalia Pratama &copy; 2021  <a href="?module=home"></a></p>
                    </div>
                </div>
            </div>
        </footer> 

        <!-- jQuery -->
        <script type="text/javascript" src="assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.maskMoney.min.js"></script>

        <!-- Script to Activate the Carousel -->
        <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })
        </script>

        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function($) {
                //datepicker plugin
                $('.date-picker').datepicker({
                  autoclose: true,
                  todayHighlight: true
                });

                // toolip
                $('[data-toggle="tooltip"]').tooltip();
                
                // mask
                $('#jumlah_pembayaran').maskMoney({thousands:'.', decimal:',', precision:0});
            });
        </script>
    </body>
</html>
