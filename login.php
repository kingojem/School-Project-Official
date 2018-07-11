<?php 
$helpers = "helpers";
define('HELPERS',$helpers);
if(!is_dir(HELPERS)){
	header("location:error.php");
	exit('Something Went Wrong With The Helpers Folder, Probably its Damaged or Tampered, 
	Check to Correct This Error');
	//file Not Found.............
}//Helpers file
include_once HELPERS."/session.php"; //starts Sesssion
$controllers = "controllers";
define('CONTROL',$controllers);
if(!is_dir(CONTROL)){
	exit('Something Went Wrong With The Controllers Folder, Probably its Damaged or Tampered, 
	Check to Correct This Error'); // Controllers File
}
$loginUser = new LoginUser();
$loginUser->login();
class LoginUser{
	private $setSession;
 public function __construct(){
	$sessions= new Session();
 }
 public function login(){
	if (isset($_SESSION)){
	?><?php
	include 'header.php';?>
<?php include_once CONTROL.'/errors_show.php'?>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Sign In Now</h2>
		<form action="controllers/users.php" method="post">
			<legend style="color:#64138a"> <br>Welcome! Login To Continue</legend>
			<input type="text" class="ggg" name="username" placeholder="Matric. No./Email/Mobile" required="">
			<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
			<span><div class="check"><span><input type="checkbox" /> Remember Me</span></div></span>
			<h6><a id ="forget-id" href="#">Forgot Password?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Sign In" name="login">
		</form>
		<p>Don't Have an Account ?<a href="registration.php">Create an account</a></p>
</div>
</div>
<?php include 'footer.php';?>
<?php
	}
	else{
		exit('session not set');
	}
}
}
	
