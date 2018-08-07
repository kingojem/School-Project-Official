<?php
    session_start();
    $destroySession = new Logout();

    class Logout{
        // private $logout;
        public function __construct(){
            session_destroy();
            header("location: index.php");
            exit();
        }
    }
?>