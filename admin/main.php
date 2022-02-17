<?php
session_start();      // memulai session
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="assets/img/cv_amalia.PNG">
		<title>Admin Panel | Sistem Inventory Dan Penjualan Barang  </title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	    <meta name="description" content="TokoTioFashion" />
	    <meta name="author" content="TioFashion" />

		<meta name="description" content="top menu &amp; navigation" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		 <!-- favicon -->
    	<!-- <link rel="shortcut icon" href="assets/img/favicon.png"> -->

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" />
		
		<!-- page specific plugin styles -->
		<link rel="stylesheet" type="text/css" href="assets/plugins/chosen/css/chosen.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/plugins/datepicker/css/datepicker.min.css" />

		<!--fonts-->
		<link rel="stylesheet" type="text/css" href="assets/fonts/fonts.googleapis.com.css" />

		<!--ace styles-->
		<link rel="stylesheet" type="text/css" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" type="text/css" href="assets/js/ace-extra.min.js" />

		<!-- custom css -->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" />

		<!-- Fungsi untuk membatasi karakter yang diinputkan -->
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

    	<script type="text/javascript">
	    function radio_option(){
	      var val = 0;
	      for(i = 0; i < document.frmFilter.filter.length; i++ ){
	        if( document.frmFilter.filter[i].checked == true ){
	          val = document.frmFilter.filter[i].value;
	          if(val=='bulan'){   
	            document.frmFilter.bulan.disabled = false;  
	            document.frmFilter.tahun1.disabled = false;  
	            document.frmFilter.tahun2.disabled = true;  
	          }
	          else if(val=='tahun'){
	            document.frmFilter.bulan.disabled = true;   
	            document.frmFilter.tahun1.disabled = true;  
	            document.frmFilter.tahun2.disabled = false; 
	          }
	        }
	      }
	    }
	    </script>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default navbar-collapse h-navbar navbar-fixed-top">
			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
				
					<small>
						
				
						
					<img src="assets/img/amalia.png"/>	
						Sistem Inventory Dan Penjualan Barang C.V Amalia Pratama Pratama 
						</small>
						</div>
								
					</a>

					<button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
						<span class="sr-only">Toggle user menu</span>
					</button>

					<button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
						<span class="sr-only">Toggle sidebar</span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<i class="ace-icon fa fa-user"></i>
								<span class="user-info">
									<?php echo $_SESSION['nama_admin']; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="?module=password">
										<i class="ace-icon fa fa-lock"></i>
										Ubah Password
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a data-toggle="modal" href="#logout">
										<i class="ace-icon fa fa-power-off"></i>
										Keluar
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<div id="sidebar" class="sidebar h-sidebar navbar-collapse collapse sidebar-fixed">
				
				<!-- panggil file "navbar-menu.php" untuk menampilkan menu -->
				
              	<?php include "navbar-menu.php"; ?>

			</div>

			<div class="main-content">
				<div class="main-content-inner">
				
					<!-- panggil file "content.php" untuk menampilkan halaman konten-->
              		<?php include "content.php"; ?>

					<!-- Modal Logout -->
					<div class="modal fade" id="logout">
						<div class="modal-dialog">
						  	<div class="modal-content">
						    	<div class="modal-header">
						      		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						      		<h4 class="modal-title"><i class="ace-icon fa fa-sign-out"> Logout</i></h4>
						    	</div>
						    	<div class="modal-body">
						      		<p>Apakah Anda yakin ingin logout? </p>
						    	</div>
						    	<div class="modal-footer">
						      		<a type="button" class="btn btn-danger" href="logout.php">Ya, Logout</a>
						      		<button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
						    	</div>
						  	</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">Copyright Sistem Inventory Dan Penjualan Barang
							&copy; 2021
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>
		<!-- <![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<!-- <![endif]-->
		
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/plugins/chosen/js/chosen.jquery.min.js"></script>
		<script src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>

		<script src="assets/plugins/dataTables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/dataTables/jquery.dataTables.bootstrap.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				if(!ace.vars['touch']) {
					// chosen select
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}

				// tooltip
        		$('[data-rel=tooltip]').tooltip();

        		// input mask
				$('.input-mask-pukul').mask('99:99');

				// datepicker plugin
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})

				// initiate dataTables plugin
				var oTable1 = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aaSorting": [[ 0, "asc" ]],
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			    } );

			    $('#data-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aaSorting": [[ 0, "asc" ]],
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					"sScrollX": "100%",
					"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			    } );
				//oTable1.fnAdjustColumnSizing();
				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'Tidak ada file ...',
					btn_choose:'Browse',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false, //| true | large
					whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
				
				$('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				//if($(e.target).attr('href') == "#home") doSomethingNow();
				})

			 	var $sidebar = $('.sidebar').eq(0);
			 	if( !$sidebar.hasClass('h-sidebar') ) return;
			
			 	$(document).on('settings.ace.top_menu' , function(ev, event_name, fixed) {
				if( event_name !== 'sidebar_fixed' ) return;
			
				var sidebar = $sidebar.get(0);
				var $window = $(window);
			
				//return if sidebar is not fixed or in mobile view mode
				var sidebar_vars = $sidebar.ace_sidebar('vars');
				if( !fixed || ( sidebar_vars['mobile_view'] || sidebar_vars['collapsible'] ) ) {
					$sidebar.removeClass('lower-highlight');
					//restore original, default marginTop
					sidebar.style.marginTop = '';
			
					$window.off('scroll.ace.top_menu')
					return;
				}
			
			
				var done = false;
				$window.on('scroll.ace.top_menu', function(e) {
			
					var scroll = $window.scrollTop();
					scroll = parseInt(scroll / 4);//move the menu up 1px for every 4px of document scrolling
					if (scroll > 2) scroll = 2;
			
			
					if (scroll > 1) {			
						if(!done) {
							$sidebar.addClass('lower-highlight');
							done = true;
						}
					}
					else {
						if(done) {
							$sidebar.removeClass('lower-highlight');
							done = false;
						}
					}
			
					sidebar.style['marginTop'] = (2-scroll)+'px';
				 }).triggerHandler('scroll.ace.top_menu');
			
			 	}).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
			
			 	$(window).on('resize.ace.top_menu', function() {
				$(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
			 	});
			});
		</script>

		<script src="assets/plugins/ckeditor/ckeditor.js"></script>

		<script>
		    var roxyFileman = 'assets/plugins/ckeditor/plugins/fileman/index.html';
		    $(function () {
		        CKEDITOR.replace('ckeditor', {filebrowserBrowseUrl: roxyFileman,
		            filebrowserImageBrowseUrl: roxyFileman + '?type=image',
		            removeDialogTabs: 'link:upload;image:upload'});
		    });
		</script>
	</body>
</html>
