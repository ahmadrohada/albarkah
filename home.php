<?php 
date_default_timezone_set('Asia/Jakarta');
session_start();
if(isset($_SESSION['md_user_id'])){
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PD Mustika Dewi</title>
  <link rel="icon" type="image/png" href="favicon_png.png" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="./assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="./assets/bower_components/Ionicons/css/ionicons.min.css">

  
  <link rel="stylesheet" href="./assets/css/bootstrap-table.css">
  <link rel="stylesheet" href="./assets/css/jquery.datetimepicker.css" />
  <link rel="stylesheet" href="./assets/bower_components/sweetalert2/sweetalert2.css">


  <link rel="stylesheet" href="./assets/css/select2.css">
  <link rel="stylesheet" href="./assets/css/select2-bootstrap.css">
  <link rel="stylesheet" href="./assets/dist/css/AdminLTE.css">
  <link rel="stylesheet" href="./assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="./assets/css/styles.css" >

	<!-- jQuery 3 -->

	<script src="./assets/js/jquery.js"></script>
	<script src="./assets/js/bootstrap.min.js"></script>
	<script src="./assets/js/sweetalert2.js"></script>
	
	
	
	
	
	
	<!-- <script src="js/bootstrap-datepicker.js"></script> -->
	<script src="assets/js/bootstrap-table.js"></script>
	<script src="assets/js/bootstrap3-typeahead.min.js"></script>
  <script src="./assets/js/select2.full.js"></script>
	<script src="assets/js/jquery.datetimepicker.full.min.js"></script>
	
  <script src="assets/js/jquery.validate.js"></script>
  
  <script src="assets/bower_components/jQuery.print-master/dist/jQuery.print.min.js"></script>


	<!-- SlimScroll 
	<script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

	<script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
  -->
	<!-- AdminLTE App -->
	<script src="assets/dist/js/adminlte.js"></script>


</head>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-purple sidebar-collapse sidebar-mini">
<div class="se-pre-con"></div>
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Mustika Dewi</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu hidden">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat logout">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <?php 
			$group=$_SESSION['md_user_group'];
			//echo $group;
			
			if($group=='admin'){
				include "menu_admin.php";
			}
			
			if($group=='pegawai'){
				include "menu_pegawai.php";
			}
		
		?>
      
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include "konten.php";	?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0 <i></i>
    </div>
    <strong>Copyright &copy; PD. Mustika Dewi 2020 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<input type="hidden" value="<?php echo $_SESSION['pare_user_id'] ?>" id="user_id_home"> 
<script>
$(document).ready(function () {
	user_id_home 	= $("#user_id_home").val();
		
	
	$(".se-pre-con").fadeOut(859);
			
	
		
	$(document).on('click','.logout',function(e){
		e.preventDefault();
			
			
			swal({
				title: "Logout",
				text: "keluar dari aplikasi",
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