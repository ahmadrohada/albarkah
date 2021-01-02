<?php 

if(isset($_SESSION['md_user_id'])){
?>

<center><img src="./assets/images/404.png" class="img-responsive"></center>


<?php
}else{
	session_destroy();
	header('Location:index.php');
}
?>