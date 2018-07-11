<?php
 $helpers = '../../helpers';
 $controllers = '../../controllers';
 $models = '../../models';
    define('HELPERS',$helpers);
    define('MODELS',$models);
     if((!is_dir($helpers)) || (!is_dir($controllers)) || !is_dir($models)){
        header("location:error.php");
         exit('A file Assisting This File is Either Damaged Or Tampered, Check To correct This Error');
         //file DAmaged
     }
     include_once HELPERS.'/session.php';
     include_once MODELS.'/users.php';
     $sessionCall = new Session;
     if(isset($_SESSION['matric_no'])){
        echo 'This is admin';
        ?>
        <script>
        alert('Welcome <?php echo $_SESSION['matric_no'] . ' '. '('.$_SESSION['users_role_info'].')';?>')
        </script>
        <?php
        echo $_SESSION['matric_no'];
     }
    
   
?>