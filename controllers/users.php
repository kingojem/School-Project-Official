<?php
//error_reporting(0);
$helpers = "../helpers";
define('HELPERS',$helpers);
if(!is_dir(HELPERS)){
    header("location:error.php");
    exit('Something Went Wrong With The Helpers Folder, Probably its Damaged or Tanpered,
     Check to Correct This Error');
}
include_once HELPERS."/session.php";
$models = "../models";
define('MODELS',$models);
if(!is_dir(MODELS)){
    header("location:error.php");
    exit('Something Went Wrong With The Models Folder, Probably its Damaged or Tanpered,
    Check to Correct This Error');
}
include_once MODELS."/users.php";
include_once 'Errors.php';
$usersControl = new UsersControl();
 $usersControl->setSess();
class UsersControl{
    private $errors;
    public function __construct(){
        $users = new Session();
        // $this->errors = new Register_Login_Errors();
        
        // $users->__construct();
    }
    public function setSess(){
        if(isset($_SESSION)){
           if(isset($_POST['register'])){
            $register = new userRegisteration();
           }
           if(isset($_POST['login'])){
                $login = new LoginUser();
           }
        }else{
            $flagError = $this->errors->noSession();
        }
    }
}
class userRegisteration{
    private $errors;
    public function __construct(){
        $this->errors = new Register_Login_Errors();
        $username = strtolower(trim($_POST['matric_no']));
        $password = strtolower(trim($_POST['password']));
        $confirmPassword = strtolower(trim($_POST['confirmPassword']));
        $agreeTerms = $_POST['agree'];
        $email = strtolower(trim( $_POST['email']));
        $mobile =  trim($_POST['phoneNumber']);
        $usernameLength = strlen($username);  // i want the right username Length;
        $passwordLength = strlen($password); // i want the right password length; 
        $mobileLength = strlen($mobile);  // right mobile number
        // ... collect @params .... No Needd to Crowd My user ! /
         if(empty($username)){
             echo '<span style ="color:red"> All Fields Are Required </span> ';
             $errorEmpty = true;
         }

        if(empty($username) || empty($password) || empty($confirmPassword) || empty($mobile) || empty($email)){
          $flagError =$this->errors->emptyString();
        }else if((!preg_match("/^[a-zA-Z0-9\/]*$/",$username)) || (!preg_match("/^[a-zA-Z0-9.@]*$/",$password))){
            $flagError = $this->errors-> invalidString();
        }else if(($usernameLength <= 2) || ($passwordLength  <= 5)){
            $flagError = $this->errors-> shortStringLength() ;
        }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $flagError =$this->errors-> invalidEmail() ;
        }else if(($username == $password)){
            $flagError = $this->errors-> sameTypeError();
        }else if(($mobile == $password)){
            $flagError = $this->errors-> sameTypeError2();
        }else if(($agreeTerms !== 'on')){
            $flagError = $this->errors-> agree();
        }else if(($password !== $confirmPassword)){
            $flagError = $this->errors-> passwordConfirm();
        }else if(($mobileLength < 11 || $mobileLength > 13)){
            $flagError = $this->errors-> WrongMobile();
        }else if((!ctype_digit($mobile))){
            $flagError = $this->errors-> WrongMobile();
        }else{
            $users = new Users();
            $sendNewUser = $users->register(['matric-no'=>$username,
            'password'=>$confirmPassword,'email'=>$email,'mobile'=>$mobile ]) ; 
        }

    }
}
class LoginUser{
    private $errors;
    public function __construct(){
        $this->errors = new Register_Login_Errors();
        $username = strtolower(trim($_POST['username']));
        $password = strtolower(trim($_POST['password']));
        $usernameLength = strlen($username);
        $passwordLength = strlen($password);
        if(empty($username)|| empty($password)){
            $flagError = $this->errors->emptyLogin();
        }elseif($username == $password){
            $flagError = $this->errors->sameType();
        }else if(($usernameLength <= 2) || ($passwordLength  <= 5)){
            $flagError = $this->errors-> shortString();
        }else{
            $users = new Users();
            $loginExistingUser = $users->login($username,$password);
        }
    }
}
?>
