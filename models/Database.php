<?php
class Database{
    private $connect;
    private $dbName = 'hostel-project';
    private $dbPassword ='';
    private $dbHost='localhost';    
    private $dbUser='root';

    public function __construct(){
      $dbHost = $this->dbHost;
      $dbPassword = $this->dbPassword;
      $dbName = $this->dbName;
      $dbUser = $this->dbUser;
      $dsn = "mysql:host=$dbHost;dbname=$dbName";
      $this->connect = new PDO($dsn,$dbUser,$dbPassword);
      $this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    }
    public function getConnection(){
        try{
            return  $this->connect;
        }
        catch(PDOException $e){
            exit( '....opps...Something Went Wrong'."\n".'Error in Connection'.$e->getMessage());
        }
    }
    }
?>