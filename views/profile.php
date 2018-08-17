<?php
session_start();
if($_SESSION['users_role_info'] =='admin'){
    header("location:index.php");
}elseif($_SESSION['users_role_info'] =='user'){
    ?>
<!DOCTYPE html>
<head>
<title>Home After| Dashboard</title>
<link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
<link rel="icon" href="../images/favicon.png" type="image/x-icon">
	<!-- //title -->

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=" Home After Dashboard"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="assets/css/style.css" rel='stylesheet' type='text/css' />
<link href="assets/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="assets/css/font.css" type="text/css"/>
<link href="assets/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="assets/css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="assets/css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="assets/js/jquery2.0.3.min.js"></script>
<script src="assets/js/raphael-min.js"></script>
<script src="assets/js/morris.js"></script>
</head>
<?php
$helpers = '../helpers';
 $controllers = '../controllers';
 $models = '../models';
    define('HELPERS',$helpers);
    define('MODELS',$models);
    
    if((!is_dir($helpers)) || (!is_dir($controllers)) || !is_dir($models)){
        header("location:../error.php");
         exit('A file Assisting This File is Either Damaged Or Tampered, Check To correct This Error');
         //file DAmaged
         include_once HELPERS.'/session.php';
         include_once MODELS.'/users.php';
    }
     ?>
     <body>
            <section id="container">
                <?php include_once 'header.php';?>
	            <?php include_once 'sidebar.php';?>	
                <section id="main-content">
	                <section class="wrapper">
                        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 gallery-grids-left">
						    <div class="gallery-grid">
                            <div class = "rapper" style= "width:100%; height:150px;">
                            <img style="height:280px" src='assets/images/banner1.jpg'>
                        </div>
                            
                            <div>
                                <?php
                                    if($_SESSION['profile_image'] != null){
                                        ?>
                                            <img style ="height:120px; width:120px; border-radius:80px; position:relative; top:-30px;left:60px" src='<?php echo "accounts/". $_SESSION['profile_image'] ?>'>
                                        <?php
                                    }else{
                                        ?>
                                            <img style ="height:120px; width:120px; border-radius:80px;" src='assets/images/2.jpg'>
                                        <?php
                                    }
                                ?>
                                <div  style="float:right; " class="col-md-3 market-update-gd">
                            <div class="market-update-block ch" style="width:15%;height:60px;margin-top:18%;padding:0px;margin-left:55%;">
                                <div class="col-md-4 market-update-right">
                                    <i class="fa fa-pencil" ></i>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class ="">
                        <div class="col-md-3 market-update-gd">
                            <div class="market-update-block clr-block-4 chh">
                                <div class="col-md-4 market-update-right">
                                    <i class="fa fa-bullhorn" ></i>
                                </div>
                                    <div class="col-md-8 market-update-left">
                                        <h4>Subscriptions</h4>
                                        <h3>1,250</h3><br>
                                        <!-- <h3> Status : </h3> -->
                                        <p> <a class= "btn-lg btn-warning disabled">Status: </a></p>
                                    </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        <div class="col-md-3 market-update-gd">
                            <div class="market-update-block clr-block-4 chh ">
                                <div class="col-md-4 market-update-right">
                                    <i class="fa fa-calendar" ></i>
                                </div>
                                    <div class="col-md-8 market-update-left">
                                        <h4>Expires:</h4>
                                        <h3>1,250</h3><br>
                                        <!-- <h3> Status : </h3> -->
                                        <p><a style="cursor:pointer" class= "btn-lg btn-primary"> Renew:</a> </p>
                                    </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                </section>
                <aside style="background-color:red; width:40%; margin-right:2%; float:right;" class="">
dddd
                </aside>
            </section>
    </body>
    <script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="assets/js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="assets/js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->	
    <?php
}else{
    header("location:../login.php");
}
?>