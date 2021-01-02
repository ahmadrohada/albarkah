<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<meta http-equiv="Content-Type" content="text/html;" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="keywords" content="" />
<meta name="author" content="rohada987">
<meta name="description" content="">
<meta name="subject" content="" />



<link rel="icon" type="image/png" href="favicon_png.png" />
<link href="./assets/css/bootstrap.min.css" rel="stylesheet">
<link href="./assets/css/styles.css" rel="stylesheet">
<link href="./assets/css/font-awesome.css"  rel="stylesheet" />
<link href="./assets/css/font-awesome-animation.css"  rel="stylesheet" />
<link href="./assets/css/sweetalert2.css"rel="stylesheet" >


<title>Mustika Dewi</title>


</head>

<body style="padding-top:10px !important;">
<div class="se-pre-con"></div>


<?php

session_start();
if ( !isset($_SESSION['md_user_id'])){ 
?>	
	<div class="col-sm-12 col-lg-12  main">			
		<div id="content" style="margin-top:-10px;">
			<?php include "login.php"; ?>
		</div>
	</div>	<!--/.main-->
<?php } else { ?>
<script>
	//alert("udah");
	window.location.href="home.php?page=dashboard_transaksi";
</script>
<?php } ?>	
	
	
	
<script>
$(document).ready(function () {
	$(".se-pre-con").hide();
});
</script>
	
</body>
</html>
