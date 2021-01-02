<?php 
session_start();
if(isset($_SESSION['pare_user_id'])){
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<meta http-equiv="Content-Type" content="text/html;" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="keywords" content="pare , aplikasi PARE karawang" />
<meta name="author" content="Badan Kepegawaian dan Pengembangan Sumber Daya Manusia">
<meta name="description" content="Aplikasi Berbasi web untuk mengolah data SKP PNS di Kabupaten Karawang">
<meta name="subject" content="" />



<title>Toko Beras Mustika Dewi</title>


<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<!-- <link href="css/datepicker3.css" rel="stylesheet"> -->
<link href="assets/css/styles.css" rel="stylesheet">

<link href="assets/css/font-awesome.css"  rel="stylesheet" />

<link href="assets/css/font-awesome-animation.css"  rel="stylesheet" />

<link href="assets/css/select2.css"rel="stylesheet" >


<link href="assets/css/sweetalert2.css"rel="stylesheet" >
<link href="assets/css/bootstrap-table.css"rel="stylesheet" >
<link href="assets/css/jquery.datetimepicker.css" rel="stylesheet"/>


	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/lumino.glyphs.js"></script>
	<script src="assets/js/sweetalert2.js"></script>
	
	
	<script src="assets/js/select2.js"></script>
	
	
	
	<!-- <script src="js/bootstrap-datepicker.js"></script> -->
	<script src="assets/js/bootstrap-table.js"></script>
	<script src="assets/js/bootstrap3-typeahead.min.js"></script>

	<script src="assets/js/jquery.datetimepicker.full.min.js"></script>
	
	<script src="assets/js/jquery.validate.js"></script>
	
	
</head>

<body>
	<div class="se-pre-con"></div>
	
	
	<!-- ini salam sambutan Bupati saat launching -->
	<div class="salam_bupati" hidden>
		<?php include "launching.php";?>
	</div>
	<!-- END ini salam sambutan Bupati saat launching -->
	
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
			
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse" data-offset="50">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
				
				<a class="navbar-brand" href="#">
				
					<span>
						<img src="images/form/logo.png" width="40" height="35" style="margin-top:-8px;" class="hidden-xs" >
					</span>
					<span class="hidden-xs header-title"> PARE Karawang</span>
					<span class="visible-xs header-title" style="font-size:11px !important; width:225px;"><marquee behavior="scroll" direction="left" speed="50"><?php echo $_SESSION['pare_nama_user']; ?></marquee></span>
				</a>
				
				
				
				<ul class="user-menu">
					<li class="dropdown pull-right ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><span class="hidden-xs header-title" style="color:#fff; font-size:11pt;" id="nama_user"><?php echo $_SESSION['pare_nama_user']; ?></span><span class="caret"></span></a>
						<ul class="dropdown-menu " role="menu">
							
							<li><a href="#" class="profile"><svg class="glyph stroked male-user "><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							
							<li><a href="home.php?page=setting"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							
							<li class="logout"><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse"  class="col-sm-3 col-lg-2 sidebar" >
	
    <!--Logo Pare-->
	<div class="">
		<img src="images/form/logo.png" width="100" height="94" class="hidden-xs img-responsive center-block" alt="logo pare">
	</div>
	
		<?php 
			$group=$_SESSION['pare_user_group'];
			//echo $group;
			
			if($group=='admin'){
				include "menu_admin.php";
			}
			
			if($group=='skpd'){
				include "menu_pegawai.php";
			}
			
			if($group=='unit_kerja'){
				include "menu_pegawai.php";
			}
			
			if($group=='pegawai'){
				include "menu_pegawai.php";
			}
			
			if($group=='verifikator'){
				include "menu_verifikator.php";
			}
		?>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		

		
		<div id="content">
			<?php 
				//echo $_COOKIE['cookielogin']['nip'];
				include "konten.php"; 
			?>
		</div>
		
		<!--  =============================================================== -->
		<!--  ================= MODAL DETAIL PEGAWAI ======================== -->
		<!--  =============================================================== -->

		<div class="modal modal-detail-pegawai-home fade"  aria-hidden="true" role="dialog" style="padding-right:0px;">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title">Detail Pegawai</h5>
			</div>
			
			<div class="modal-body" style="padding:10px 30px 40px 30px;">
			   
			   <div class="row">
					<div class="col-md-12">
						<span class="round photo center-block"></span>
					</div>
					
				</div>
			   
				
				<div class="row" style="margin-top:40px;">
					<div class="col-md-4">
						<label>Nama Pegawai</label>
					</div>
								
					<div class="col-md-8">
						<input type="text" class="nama_pegawai " id="detail-field">
					</div>
				</div>

				<div class="row" style="margin-top:10px;">
					<div class="col-md-4">
						<label>NIP Pegawai</label>
					</div>
								
					<div class="col-md-8">
						<input type="text" class="nip " id="detail-field" >
					</div>
				</div>
				

				<div class="row" style="margin-top:10px;">
					<div class="col-md-4">
						<label>Golongan</label>
					</div>
								
					<div class="col-md-8">
						<input type="text" class="golongan " id="detail-field" >
					</div>
				</div>
				
				<div class="row" style="margin-top:10px;">
					<div class="col-md-4">
						<label>Eselon</label>
					</div>
								
					<div class="col-md-8">
						<input type="text" class="eselon " id="detail-field" >
					</div>
				</div>
				
				<div class="row" style="margin-top:10px;">
					<div class="col-md-4">
						<label>Jabatan</label>
					</div>
								
					<div class="col-md-8">
						<textarea class="jabatan" id="detail-field" style="resize:none;" ></textarea>
					</div>
				</div>
				
				
				<div class="row" style="margin-top:10px;">
					<div class="col-md-4">
						<label>SKPD</label>
					</div>
								
					<div class="col-md-8">
						<textarea class="skpd"  id="detail-field"  style="resize:none;" ></textarea>
					</div>
				</div>
				
				<div class="row" style="margin-top:10px;">
					<div class="col-md-4">
						<label>Unit Kerja</label>
					</div>
								
					<div class="col-md-8">
						<textarea class="unit_kerja"  id="detail-field" style="resize:none; " ></textarea>
					</div>
				</div>
				
			</div>
			
			<div class="modal-footer visible-xs" style="text-align:center !important; " data-dismiss="modal" aria-label="Close">
				[ tutup ]
			</div>
			
			
			</div>
		  </div>
		</div>
		
	</div>	<!--/.main-->
	<input type="hidden" value="<?php echo $_SESSION['pare_user_id'] ?>" id="user_id_home"> 
	
	
<script>
$(document).ready(function () {
	user_id_home 	= $("#user_id_home").val();
	
    $(window).on('popstate', function() {
			swal.close();
    });

  
	
	
	$(".se-pre-con").fadeOut(350);
		
	$(document).on('click','.collapsed',function(e){
		$("html, body").animate({ scrollTop: 0 }, "slow");
		
	});	
	
	$(document).on('click','.logout',function(e){
		e.preventDefault();
		
		
		
		swal({
			title: "Logout",
			text: "keluar dari aplikasi PARE",
			type: "question",
			showCancelButton: true,
			confirmButtonText: "Ya",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}).then (function(){
			$.ajax({
			type: 'POST',
			url:"./kelas/login_handler.php",
			data: {logout:'1'},
			cache: false,
			success: function(e) {
				
				
				swal({
					title: "",
			        text: "Sukses",
			        type: "success",
					width: "200px",
					showConfirmButton: false,
					allowOutsideClick : false,
					timer: 1200
				}).then(function () {
					window.location.assign("index.php");
					
				},
					// handling the promise rejection
					function (dismiss) {
						if (dismiss === 'timer') {
							window.location.assign("index.php");
						}
					}
				)
				
				
				
			},
			    error: function(data) {  
					swal({
						title: "Error",
			        	text: "Terjadi kesalahan saat logout",
			        	type: "error"
			        }).then (function(){
						
			        });
			    }
		    });
			});
	
	});
	
	
	/** ===================== ---------------- ==================== **/	
	/** ===================== LIHAT PEGAWAI    ==================== **/
	/** ===================== ---------------- ==================== **/
	
	$(document).on('click', '.profile', function(){
		$(".photo").html('<img src="images/form/sample.jpg" class="round"/>');
		
		$.ajax({
			type: "GET",
			url:"./kelas/detail.php",
			data:{op:"detail_user_skpd",user_id:user_id_home},
			dataType    : "json",
			cache:false,
			success:function(data){
				$(".nip").val(data['nip']);
				$(".nama").val(data['nama']);
				$('.nama_pegawai').val(data['nama']);
				$(".jabatan").val(data['jabatan']);
				$(".golongan").val(data['golongan']);
				$(".eselon").val(data['eselon']);
				$(".skpd").val(data['skpd']);
				$(".unit_kerja").val(data['unit_kerja']);
			
					$.ajax({
						type: "GET",
						url:"./api/get_data.php",
						data:{request:"foto_pegawai",nipbaru:data['nip']},
						dataType    : "json",
						cache:false,
						success:function(data){
							$(".photo").html(data['foto']);
							
						}
					});
			
				$('.modal-detail-pegawai-home').modal('show');
			}
		});
		
		
		
		
		
    });
	
	
	
	//CEK MUTASI PEGAWAI,, jika dia sudah mutasi maka harus ada alert
	
	

	
	
});
</script>
	
	
	
</body>
</html>

<?php
}else{
	session_destroy();
	header('Location:index.php');
}
?>	