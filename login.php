<div class="row tes">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4 text-center">
		<img src="./assets/images/form/logo.png" class="img-responsive center-block">
		
		</div>
		<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading login-header">
					<i class="fa fa-foursquare"></i>
					Log in
				</div>
				<div class="panel-body">
				
					<form>
						
						
							<div class="form-group has-feedback">
								<input class="form-control nama" placeholder="Username"  name="nip" type="text" >
								<span class="glyphicon glyphicon-user form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<input class="form-control nip" autocomplete="off"  autocorrect="off" placeholder="Password"  name="password" type="password" value="">
								<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							</div>
						
						
							<button class="btn btn-info btn-submit  btn-block" >
							<span class="login_default">  Login </span>
							<span class="login_sukses">  Sukses </span>
							<i class="go glyphicon glyphicon-log-in"></i>
							<i class="load fa fa-spinner faa-spin animated"></i>
							<i class="sukses glyphicon glyphicon-ok faa-ring animated"></i>
							
							</button>
							
							
						
					</form>
				</div>
			</div>
			
			<div class="  col-xs-12 text-center " style="margin-top:80px;">
			<p style="margin-top:-90px; color:red; " class="error ">Maaf ,Login gagal</p>
			</div>
			
			
			<div class="  col-xs-12 text-center " >
			<p class="visible-lg visible-md text-muted login-footer" style="font-size:13px; color:#077821;">PD. Mustika Dewi @2020</p>
			<p class="visible-sm visible-xs text-muted login-footer" style="font-size:10px; margin-top:30px; color:#077821;">PD. Mustika Dewi @2020</p>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	

	
	
	<script src="./assets/js/jquery-1.11.1.min.js"></script>
	<script src="./assets/js/bootstrap.min.js"></script>
	<script src="./assets/js/sweetalert2.js"></script>
	<script>
	$(document).ready(function() {
		
		$('.error').hide();
		$('.load').hide();
		$('.go').show();
		$('.sukses').hide();
		$('.login_sukses').hide();
		
		$(document).on('click','.nama, .nip',function(e){
			$('.error').hide();
			
		});  
		
		$(document).on('click','.btn-submit',function(e){
        e.preventDefault();
			
			
			
			
			$('.load').show();
			$('.go').hide();
			
			var data = $('form').serialize();
			
			var 	request = $.ajax({		
										type	: 'POST',
										url		: "./kelas/login_handler.php",
										data	: data,
										cache	: true
					
									}); 
									
			request.done(function() {
						setTimeout(function() {
							
							$('.load').hide();
							$('.go').hide();
							$('.sukses').show();
							$('.login_default').hide();
							$('.login_sukses').show();
							
							setTimeout(function() {
								window.location.assign("index.php");
							}, 300);
							
							
						}, 800);
								
				
			});
			 
			request.fail(function( jqXHR, textStatus ) {
				
					
					
					$('.error').show();
					$('.load').hide();
					$('.go').show();
					$('.login_sukses').hide();
			});
			
		});  
		
	});
	</script>