<?php
//error_reporting(0);
class Session{
    public function __construct(){
        session_start();
    }
    public function sessionUnset($sess){
        unset($sess);
    }
    public function sessionDestroy(){
        session_destroy();
    }
}
?>