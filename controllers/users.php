<?php
//error_reporting(0);
$helpers = "../helpers";
$models = "../models";
$images = "../images/";
$photos = "../images/photos";
define('HELPERS',$helpers);
define('MODELS',$models);
define('IMAGES',$images);
define('PHOTOS',$photos);
if(!is_dir(HELPERS) || !is_dir(MODELS) || !is_dir(IMAGES) || !is_dir(PHOTOS)){
    header("location:errors.php");
    exit('Something Went Wrong With A Folder, Probably its Damaged or Tanpered,
     Check to Correct This Error');
}
include_once HELPERS."/session.php";
require_once 'Errors.php';
require_once MODELS."/users.php";

$usersControl = new UsersControl();
 $usersControl->setSess();
class UsersControl{
    private $errors;
    public function __construct(){
        $users = new Session();
        $this->errors = new Register_Login_Errors();
    }
    public function setSess(){
        if(isset($_SESSION)){
           if(isset($_POST['register'])){
            $register = new userRegisteration();
           }
           if(isset($_POST['login'])){
                $login = new LoginUser();
           }
           if(isset($_POST['update'])){
              $update = new updateUser();
            }
            if(isset($_POST['update_profile'])){
                $update = new UpdateProfile();
            }
            if(isset($_POST['upload'])){
                $upload = new Uploads();
                $upload->banner();
            }
            if(isset($_POST['slide1'])){
               
                $upload = new Uploads();
                $upload->slides();
                
            }if(isset($_POST['slide2'])){
                $upload = new Uploads();
                $upload->slides();
                
            }if(isset($_POST['slide3'])){
                $upload = new Uploads();
                $upload->slides();
                
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
            if($users->register(['matric-no'=>$username,
            'password'=>$confirmPassword,'email'=>$email,'mobile'=>$mobile ]) == true){
                header("location:../login.php"); //After registeration, login your details; this ensure the user keeps memory of his/her details
            }else{
                $flagError = $this->errors->userExist(); // Tells the user, there is someone with his details
            }
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

class updateUser{
    private $errors;
    public function __construct(){
        $this->errors = new Update_User_Errors();
        $firstName = htmlentities((strtolower(trim($_POST['first_name']))));
        $lastName = htmlentities(strtolower(trim($_POST['last_name'])));
        $dateOfBirth = htmlentities(strtolower(trim($_POST['user_dob'])));
        $gender = htmlentities(strtolower(trim($_POST['user_sex'])));
        $avartar = $_FILES['user_avartar'];
            $date =  Date('Y');
            $getYear=explode('-',$dateOfBirth) or explode('/',$dateOfBirth) or explode('.',$dateOfBirth);
            if(strlen($getYear[0]) == 4){
                $year = $getYear[0];
            }else if (strlen($getYear[1]) == 4){
                $year = $getYear[1];
            }else{
                if(strlen($getYear[2]) == 4){
                    $year = $getYear[2];
                }
            }
            $age = $date - $year;
        if(empty($firstName) || empty($lastName)|| empty($dateOfBirth)){
            $flagError = $this->errors->error1(); 
        }else if(strlen($firstName) < 3|| strlen($lastName) < 3 || strlen($dateOfBirth)< 10){
            $flagError = $this->errors->error1();
        }else if( $age < 16 || $age > 25){
            $flagError = $this->errors->error1();
        }else if($gender == 'gender'){
            $flagError = $this->errors->error1();
        }else{
            $avartarName = $avartar['name'];
            $avartarSize = $avartar['size'];
            $avartarTempName = $avartar['tmp_name'];
            $avartarType = $avartar['type'];
            $avartarError = $avartar['error'];
            $fileExtention = explode('.',$avartarName);
            $actualFileExtention = strtolower(end($fileExtention));
            $fileExtentionAllowed = array('jpg','jpeg','png');

            if(!in_array($actualFileExtention,$fileExtentionAllowed)){
                 $flagError = $this->errors->error2();
            }else{
                if($avartarError != 0){
                    $flagError = $this->errors->error2();
                }else{
                    if($avartarSize > 0 && $avartarSize <= 1000000){
                        $thisUserNumber = $_SESSION['mobile'];
                        $thisUserName = $_SESSION['matric_no'];
                        $newFileName = $thisUserNumber.".".$actualFileExtention;
                        $destination = '../views/accounts/'.$newFileName;
                        move_uploaded_file($avartarTempName, $destination ) or exit('error');
                    }else{
                        $flagError = $this->errors->error2();
                    }
                }
            }
                $users = new Users();
                    if($users->updateUser(['firstName'=>$firstName,'lastName'=>$lastName,'dateOfBirth'=>$dateOfBirth,'age'=>$age,'gender'=>$gender,'user_avartar'=>$newFileName]) == true){
                        header("location:../views/".$_SESSION['users_role_info']."/");
                    }else{
                        echo "Couldn't Update User";
                    }
                // if ()
                        //   header("../views/".$_SESSION['users_role_info']);
                        // echo 'here';

            // }
        }
    }
}

class UpdateProfile{
    private $errors;

    public function __construct(){
        $this->errors = new Update_User_Errors();
        $thisUser = htmlentities((strtolower(trim($_POST['thisuser']))));
        $department = htmlentities((strtolower(trim($_POST['update_department']))));
        $falculty = htmlentities((strtolower(trim($_POST['faculty']))));
        $next_of_kin_name = htmlentities((strtolower(trim($_POST['next_of_kin_name']))));
        $next_of_kin_number = htmlentities((strtolower(trim($_POST['next_of_kin_number']))));
        $next_of_kin_mail = htmlentities((strtolower(trim($_POST['next_of_kin_email']))));
        
        if(empty($department)|| empty($next_of_kin_mail || empty($next_of_kin_name || empty($next_of_kin_number)))){
                $flagError =$this->errors->error3();
        }else if(strlen($department) < 3 || $falculty =='faculty'){
                $flagError=$this->errors->error3();
        }else if(strlen($next_of_kin_name)< 3 || !ctype_digit($next_of_kin_number)){
                $flagError = $this->errors->error3();
        }else{
                $users = new Users();
                if($users->profileUpdate(['user'=>$thisUser,'department'=>$department,'falculty'=>$falculty,'next_of_kin_name'=>$next_of_kin_name,'next_of_kin_mail'=>$next_of_kin_mail,'next_of_kin_number'=>$next_of_kin_number]) == true){
                    header("location:../views/profile.php");
                }else{
                    $flagError = $this->errors->error3();
                }
            }
        }
    }


class Uploads{
    private $errors;
        public function banner(){
            $errors = new Web_Edit_Error;
            $text = $_POST['description'];
            $text1 = $_POST['description1'];
            
            $picture = $_FILES['image'];
            $pictureName = $picture['name'];
            $pictureType = $picture['type'];
            $pictureSize = $picture['size'];
            $pictureError = $picture['error'];
            $pictureTemp = $picture['tmp_name'];
            list($width, $height, $type, $attr) = getImageSize($pictureTemp);
            $fileExtention = explode('.',$pictureName);
            $actualFileExtention =strtolower(end($fileExtention));
            $actualFileName = $fileExtention[0];
            $fileExtentionAllowed = array('png','jpg','jpeg');

           if(!in_array($actualFileExtention,$fileExtentionAllowed)){
                $errors->notice();
           }else{
               if($pictureError != 0){
                $errors->notice();
               }else{
                   if($width < 1900 || $height < 849){
                    $errors->notice(); 
                   }else{
                    $newFileName = "banner".".".$actualFileExtention;
                    $handle = "../images/photos/";
                    if(unlink($handle."banner.jpg") || unlink($handle."banner.png") || unlink($handle."banner.jpeg") ){
                        $destination = '../images/photos/'.$newFileName;
                        move_uploaded_file($pictureTemp, $destination ) or exit('error');
                                //Files Uploaded, Time to move to dbase

                                $users = new Users();
                               if($users->updateUserView(['image'=>$newFileName,'text'=>$text,'text1'=>$text1])==true){
                                header("location:../views/ed_home.php");
                                } 

                    }else{
                        header("location:errors.php");
                    }
                   }
               }
           }

        }

        public function slides(){
            $errors = new Web_Edit_Error;
            $slide = $_POST['slide'];
           
            $picture = $_FILES['slide'];
            $pictureName = $picture['name'];
            $pictureType = $picture['type'];
            $pictureSize = $picture['size'];
            $pictureError = $picture['error'];
            $pictureTemp = $picture['tmp_name'];
            list($width, $height, $type, $attr) = getImageSize($pictureTemp);
            $fileExtention = explode('.',$pictureName);
            $actualFileName = $fileExtention[0];
            $actualFileExtention =strtolower(end($fileExtention));
            $fileExtentionAllowed = array('png','jpg','jpeg');
            if(!in_array($actualFileExtention,$fileExtentionAllowed)){
                $errors->notice();
           }else{
               if($pictureError != 0){
                    $errors->notice();
                }else{
                   if($width < 1000 || $height < 625){
                        $errors->notice(); 
                    }else{
                        $newFileName = "$actualFileName".".".$actualFileExtention;
                        $handle = "../images/photos/";
                        
                    if(unlink($handle."$newFileName") || unlink($handle."$actualFileName".'.'.'png') || unlink($handle."$actualFileName".'.'.'jpeg') ){
                        $destination = '../images/photos/'.$newFileName;
                        move_uploaded_file($pictureTemp, $destination ) or exit('error');
                            
                        $users = new Users();
                        if($slide == 'slide1_1'){
                           
                            if($users->updateUserView2($data='slide1_1',$newFileName) == true){
                               
                                header("location:../views/ed_home.php");
                            }
                            die();
                        }else if($slide == 'slide1_2'){
                            
                            if($users->updateUserView2($data='slide1_2',$newFileName)== true){
                                header("location:../views/ed_home.php");
                            }
                            die();
                        }else if($slide =='slide1_3'){
                            if($users->updateUserView2($data='slide1_3',$newFileName)== true){
                                header("location:../views/ed_home.php");
                            }
                            die();
                        }else if($slide =='slide2_1'){
                            if($users->updateUserView2($data='slide2_1',$newFileName)== true){
                                header("location:../views/ed_home.php");
                            }
                            die();
                        }else if($slide =='slide2_2'){
                            if($users->updateUserView2($data='slide2_2',$newFileName)== true){
                                header("location:../views/ed_home.php");
                            }
                            die();
                        }else if($slide =='slide2_3'){
                            if($users->updateUserView2($data='slide2_3',$newFileName)== true){
                                header("location:../views/ed_home.php");
                            }
                            die();
                        }else if($slide =='slide3_1'){
                            if($users->updateUserView2($data='slide3_1',$newFileName)== true){
                                header("location:../views/ed_home.php");
                            }
                            die();
                        }else if($slide =='slide3_2'){
                            if($users->updateUserView2($data='slide3_2',$newFileName)== true){
                                header("location:../views/ed_home.php");
                            }
                            die();
                        }else if($slide =='slide3_3'){
                            if($users->updateUserView2($data='slide3_3',$newFileName)== true){
                                header("location:../views/ed_home.php");
                            }
                            die();
                        }
                    }
                    }
                }
            }
            
        }
}
?>
