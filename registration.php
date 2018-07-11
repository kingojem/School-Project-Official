<?php 
$helpers = "helpers";
define('HELPERS',$helpers);
if(!is_dir(HELPERS)){
	header("location:error.php");
	exit('Something Went Wrong With The Helpers Folder, Probably its Damaged or Tampered, 
	Check to Correct This Error');
}//Helpers file
include_once HELPERS."/session.php"; //starts Sesssion
$controllers = "controllers";
define('CONTROL',$controllers);
if(!is_dir(CONTROL)){
	header("location:error.php");
	exit('Something Went Wrong With The Controllers Folder, Probably its Damaged or Tampered, 
	Check to Correct This Error'); // Controllers File
}
$registeration = new Registeration();
$registeration->register();
class Registeration{
	private $setSession;
 public function __construct(){
	$sessions= new Session();
	//$this->setSession = $sessions->__construct();
 }
public function register(){
	if (isset($_SESSION)){
		?><?php
include 'header.php';?>
<?php include_once CONTROL.'/errors_show.php'?>
<!-- <div class="alert alert-warning" id="error">...Opps Error ! -- Try Again</div> -->
<div class="reg-w3">
<div class="w3layouts-main">


	<h2>Register Now</h2>
		<form id = "register" action="controllers/users.php" method="post">
			<legend style="color:#64138a"> <br>Login Details</legend>
			<input type="text" class="ggg" name="matric_no" required="" placeholder="Matric. No. / Reg. No." id="register-matric">
			<input type="email" class="ggg" name="email" required="" placeholder="E-MAIL"  id="register-email">
			<input type="number"  pattern = "[0-9]" required="" class="ggg" name="phoneNumber" placeholder="PHONE" id="register-phone">
			<br><input type="password" class="ggg" required="" name="password" placeholder="PASSWORD" id="register-password">
			<input type="password" class="ggg" required="" name="confirmPassword" placeholder="CONFIRM PASSWORD"  id="register-confirm-password">
			<h4 style="color:black;"><input type="checkbox" required="" name="agree"  id="register-policy"/>I agree to the Terms of Service and Privacy Policy</h4>
			
				<div class="clearfix"></div>
				<input type="submit" value="submit" name="register" id="register-submit" >
		</form>
		<p class ="submitted">Already Registered.<a href="login.php">Login</a></p>
</div>

</script>
</div>
<?php include 'footer.php';?>

		<?php
	}
	else{
		exit('session not set');
	}}
}
?>
