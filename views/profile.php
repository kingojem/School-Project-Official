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
                                    <i class="fa fa-pencil" data-toggle="modal" href="#myModal"></i>
                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                            		<div class="modal-dialog">
                                		<div class="modal-content">
                                    		<div class="modal-header">
                                                <button aria-hidden="true" data-dismiss="modal" class="close" id ="close" type="button">×</button>
                                        		<h4 class="modal-title" style="color:blue;">Update Your Profile</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="../controllers/users.php">
                                                    <div class="form-group">
                                                    <input type ="hidden" class="form-control" name ='thisuser' value='<?php echo $_SESSION['user_id']?>'>
                                                        <label for="update_department"> Department </label><input type="text" required="true" class="form-control" placeholder="Your Department" name="update_department" id="update_department">
                                                        <label for="falculty"></label>
                                                        <select id="falculty" name="faculty" class="form-control" required="true">
                                                            <option value="Faculty">Falculty</option>
                                                            <option value="Science">Science</option>
                                                            <option value="Art">Art</option>
                                                            <option value="Social Science">Social Science</option>
                                                            <option value="Management Science">Management Science</option>
                                                            <option value="Medical Sciences">Medical Sciences</option>
                                                            <option id="falculty_other" value="Other">Other</option>
                                                        </select>
                                                        <hr>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for ="next_of_kin_name">Next Of Kin Name</label><input type="text" required="true" placeholder="Next Of Kin" name="next_of_kin_name" id="next_of_kin_name" class="form-control">
                                                    <label for="next_of_kin_number"> Next Of Kin Number </label> <input type="number" required="true" class="form-control" placeholder="Next Of Kin Number" name="next_of_kin_number" id="next_of_kin_number" >
                                                    <label for="next_of_kin_email"> Next Of Kin Email </label> <input type="email" required="true" class="form-control" placeholder="Next Of Kin Email" name="next_of_kin_email" id="next_of_kin_email" >
                                                    <br>
                                                    <button type="submit" class="btn btn-success form-control" name="update_profile">Update</button>


                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                                </div>
                            </div>
                        </div>
                                    <?php 
                                        include_once '../controllers/Errors_Show.php';
                                        $erorShow = new Errors_Show();
                                    ?>
                        <div aria-hidden ="true" aria-labelledby=myModalLabel role="dialog" tabindex="-1" id="myModal1" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" style="color:red; text-align:center">Profile Update Failed</h3>
                                            </div>
                                            <div class="modal-body">
                                                <span style="margin-left:35%;"><button type="button" style='margin-right:25px' id="open" class="btn btn-primary btn-lg" data-togle="modal" href="#myModal">Retry</button>
                                                    <button type="button" class="btn btn-danger btn-lg" id="closey" data-dismiss="modal" >Skip</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div aria-hidden ="true" aria-labelledby=myModalLabel role="dialog" tabindex="-1" id="myModal11" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" style="color:#40e240; text-align:center">Profile Up To Date</h5>
                                                </div>
                                                <!-- <div class="modal-body">
                                                <button type="button" class="btn btn-danger btn-lg" id="closey" data-dismiss="modal" >Ok</button>
                                                </div> -->

                                            </div>
                                        </div>
                                    </div> 
                                       
                                       <?php
                                           
                                       ?>
                               
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
                </aside>
            </section>
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