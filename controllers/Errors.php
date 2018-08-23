<?php 
$index = '../';
    define('INDEX',$index);
    class Register_Login_Errors{
        public function noSession(){
            header("location:".INDEX."registration.php?msg=oopser21%?");
            //error is not set
        }
        public function emptyString(){
            header("location:".INDEX."registration.php?msg=error1");
            //none empty fields, field cannot be empty.
        }
        public function invalidString(){
            header("location:".INDEX."registration.php?msg=error1567%");
        }
        public function invalidEmail(){
            header("location:".INDEX."registration.php?msg=error3467%");
        }
        public function shortStringLength(){
            header("location:".INDEX."registration.php?msg=error12");
        }
        public function sameTypeError(){
            header("location:".INDEX."registration.php?msg=passerr_6e%");
        }
        public function sameTypeError2(){
            header("location:".INDEX."registration.php?msg=passerr_634%");
        }
        public function agree(){
            header("location:".INDEX."registration.php?msg=policy\"21321ef76%");
        }
        public function passwordConfirm(){
            header("location:".INDEX."registration.php?msg=password\"21321ef76%");
        }
        public function WrongMobile(){
            header("location:".INDEX."registration.php?msg=num21321ef76%");
        }
        public function userExist(){
            header("location:".INDEX."registration.php?msg=registerERR?");
        }

        //// Login Errors Starts Here ....

        public function emptyLogin(){
            header("location:".INDEX."login.php?msg=error1");
            //none empty fields, field cannot be empty.
        }
        public function sameType(){
            header("location:".INDEX."login.php?msg=passerr_6e%");
        }
        public function shortString(){
            header("location:".INDEX."login.php?msg=error12");
        }
        public function noUser(){
            header("location:".INDEX."login.php?msg=logERR?");
        }
        public function wrongPassword(){
            header("location:".INDEX."login.php?msg=passwERR?");
        }
    }
    
    /// error while updating profle

    class Update_User_Errors{
        public function error1(){
            //this error is flagged when the user frstnamme and or last name is short in string
            $header = header("location:../views/?error");
        }
        public function error2(){
            $header = header("location:../views/?error1");
        }
        public function error3(){
            $header = header("location:../views/profile.php?error");
        }
    }

    class Web_Edit_Error{
         public function notice(){
             header("location:../views/ed_home.php?msg=err56%4");

            //  $status= true;
            // return $status. $mssg='';     
        }
    }
    
?>