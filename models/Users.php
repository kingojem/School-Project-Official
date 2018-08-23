<?php
// error_reporting(0);
    include ('database.php');
    $helpers = "../helpers";
    $controllers = "../../controllers/";
    define('CONTROLLERS',$controllers);
    // define('HELPERS',$helpers);
        if(!is_dir(HELPERS) && !is_dir(CONTROLLERS)){
            header("location:error.php");
            exit('Something Went Wrong With The Helpers Folder, Probably its Damaged or Tampered,
            Check to Correct This Error');
        }else{
            include_once HELPERS."/session.php";
            // include '../../controllers/Errors.php';
            // include_once CONTROLLERS."Errors.php";
           
            // include_once CONTROLLERS. "/errors_show.php";
           
            class Users{
                private $database;
                private $matricNo;
                private $password;
                private $email;
                private $mobile;
                private $firstName;
                private $lastName;
                private $avartar;
                private $gender;
                private $age;
                private $d_o_b;
                    public function __construct(){
                        //$session = new Session;
                    $database = new Database;
                        $this->database = $database->getConnection();
                    }
                    public function login($matricNo,$password){
                        $this->MatricNo = $matricNo;
                        $this->password = $password;
                        $sql = "SELECT * FROM tenant where matric_no = ? or mobile = ? or email = ?";
                        $stmt = $this->database->prepare($sql);
                        $stmt->execute([$this->MatricNo, $this->MatricNo, $this->MatricNo]);
                        $checkIfExist = $stmt->rowCount();
                        if($checkIfExist == 1){
                                $sql = "SELECT * FROM tenant where matric_no = ? or mobile = ? or email = ?";
                                $stmt = $this->database->prepare($sql);
                                $stmt->execute([$this->MatricNo, $this->MatricNo, $this->MatricNo]);
                                $rows = $stmt->fetchAll();
                                foreach($rows as $rows => $v){
                                   $getPass = password_verify($this->password,$v['password']);
                                   if($getPass == false){
                                        $error = new Register_Login_Errors;
                                        $flagError = $error->wrongPassword();
                                    }else{
                                         $_SESSION =$v ;
                                        if($_SESSION['users_role_info'] =='admin'){
                                            header("location:../views/"); //this formally bear admin page, corrected; prevent unnnecesssary files
                                        }else{
                                            if($_SESSION['users_role_info']=='user'){
                                                if($_SESSION['first_name']==null){
                                                    header("location:../views/");
                                                }else{
                                                    header("location:../views/profile.php");

                                                }
                                            }
                                        }
                                    }
                                }
                        }else{
                                $error = new Register_Login_Errors;
                                $flagError = $error->noUser();
                            }
                    }
                    public function register($data=[]){
                        $status = false;
                        $this->matricNo = $data['matric-no'];
                        $this->password = password_hash($data['password'],PASSWORD_BCRYPT);
                        $this->email = $data['email'];
                        $this->mobile = $data['mobile'];
                            $sql = "SELECT * FROM tenant where matric_no = ? or mobile = ? or email = ?";
                            $stmt = $this->database->prepare($sql);
                            $stmt->execute([$this->matricNo, $this->mobile, $this->email]);
                            $checkIfExist = $stmt->rowCount();
                            
                            if($checkIfExist == 0){
                             $sql = "INSERT INTO tenant (matric_no,mobile,email,password) VALUES(?,?,?,?)";
                             $stmt = $this->database->prepare($sql);
                             $stmt->execute(array("$this->matricNo","$this->mobile","$this->email","$this->password"));
                            //   //this is  bad mvc practice
                                if($stmt == true){
                                    $status = true; 
                                }
                            }else{
                                $status = false;
                            }
                            return $status;
                    }
                    public function getUsers($bookings=true ){
                        if($bookings){
                            return $this->approved(); 
                        }else{
                            $sql = "SELECT * from tenant ";
                            $stmt=$this->database->prepare($sql);
                            $stmt->execute();
                           return $count = $stmt->rowCount() ;
                        }
                    }
                        private function approved(){
                            $sql ="SELECT * FROM bookings where status= ?";
                            $stmt = $this->database->prepare($sql);
                            $stmt->execute(['approved']);
                            if($stmt == true){
                                return $state = $stmt->rowCount();
                            }
                        }
                    public function updateUser($data=[]){
                        $status = false;
                        $user = $_SESSION['matric_no'];
                        $this->firstName = $data['firstName'];
                        $this->lastName = $data['lastName'];
                        $this->d_o_b = $data['dateOfBirth'];
                        $this ->age = $data['age'];
                        $this->avartar = $data['user_avartar'];
                        $this->gender = $data['gender'];

                            $sql = "UPDATE tenant SET `first_name` = ? ,`age`= ?, `sex` = ?, `last_name` = ? , `d.o.b` = ? ,`profile_image` = ? WHERE matric_no = ? "  or die('Error : User Details Uncaught');
                            $stmt = $this->database ->prepare($sql) ;
                            $stmt->execute([$this->firstName,$this->age,$this->gender,$this->lastName,$this->d_o_b,$this->avartar,$user]) or die('Error : Couldnt Update User Details') ;

                                if($stmt == true){
                                    $status = true;
                                }
                            return $status;
                    }
                    public function makePayment($data=[]){
                
                    }

                    #@params function by admin only

                    public function updateUserView($data =[]){
                            $img = $data['image'];
                            $txt = $data['text'];
                            $txt1 = $data['text1'];
                            $status = false;
                            $sql="INSERT into hostel_website_view (`image`) values(?)";
                            $stmt=$this->database->prepare($sql);
                            $stmt->execute([$img]);
                            if($stmt == true){
                                $sql = "UPDATE `hostel_website_view` SET `post1`= ?,`post2`=? where `image`=?";
                                $stmt=$this->database->prepare($sql);
                                $stmt->execute([$txt,$txt1,$img]);
                                if($stmt == true){
                                    $status = true;
                                }
                            }
                            return $status;
                        }
                        
                    #@params by admin to display content following the image being displayed;
                    public function displayInfo($data){
                        if($data =="image"){
                            $sql= "SELECT * FROM hostel_website_view where `image`= ? ";
                            $stmt=$this->database->prepare($sql);
                                $stmt->execute(['banner.jpg']);
                                if($stmt == true){
                                     $img = $stmt->fetch();
                                    return  $img['image'];
                                }
                        }if($data == "bannertext1"){
                            $sql= "SELECT * FROM hostel_website_view where `image`= ? ";
                            $stmt=$this->database->prepare($sql);
                                $stmt->execute(['banner.jpg']);
                                if($stmt == true){
                                     $txt = $stmt->fetch();
                                    return  $txt['post1'];
                                }
                        }
                        if($data == "bannertext2"){
                            $sql= "SELECT * FROM hostel_website_view where `image`= ? ";
                            $stmt=$this->database->prepare($sql);
                                $stmt->execute(['banner.jpg']);
                                if($stmt == true){
                                     $txt = $stmt->fetch();
                                    return  $txt['post2'];
                                }
                        }
                       
                    }
            }
        }

?>