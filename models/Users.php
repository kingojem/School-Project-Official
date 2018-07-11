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
            include_once CONTROLLERS."Errors.php";
            // include_once CONTROLLERS. "/errors_show.php";
            class Users{
                private $database;
                private $matricNo;
                private $password;
                private $email;
                private $mobile;
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
                                   if($getPass== false){
                                        $error = new Register_Login_Errors;
                                        $flagError = $error->wrongPassword();
                                    }else{
                                         $_SESSION =$v ;
                                        if($_SESSION['users_role_info'] =='admin'){
                                            header("location:../views/admin/");
                                        }else{
                                            if($_SESSION['users_role_info']=='user'){
                                                header("location:../views/user/");
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
                             header("location:../login.php");
                            }else{
                                $error = new Register_Login_Errors;
                                $flagError = $error->userExist();
                            }
                    }
                    public function getUsers($data=[]){
                
                    }
                    public function updateUser(){
                
                    }
                    public function makePayment(){
                
                    }
            }
        }

?>