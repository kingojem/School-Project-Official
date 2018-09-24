<head>
        <title>Home After| Edit HOME PAGE</title>
        <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
        <link rel="icon" href="../images/favicon.png" type="image/x-icon">
            <!-- //title -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content=" Home After Dashboard, Web Page Edit"/>
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
        <script src="assets/ckeditor/ckeditor.js"></script>

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
            
        }
        include_once HELPERS.'/session.php';
        include_once MODELS.'/users.php';
    ?>
        <?php include_once 'header.php';?>
        <?php include_once 'sidebar.php';?>	
        <?php 
            if(isset($_SESSION['users_role_info'])){

                if($_SESSION['users_role_info'] =='admin'){
                    ?>
                        <section id="main-content">
	                        <section class="wrapper">
                                <div class="form-w3layouts">
                                    <div class="row">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                Change Rooms
                                                <span class="tools pull-right">
                                                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                                                </span>
                                            </header>
                                            <div class="panel-body" ><!--id="panel_body"-->
                                            <ul class="uploadViews ">
                        <h4 class='panel-heading'><?php echo 'gold'?>  &nbsp;  <a data-toggle="modal" href="#myModal" class="" title="Edit Slider Caption"><i class="fa fa-edit"></i></a></h4>
                        <form id="upload" method="post" action="../controllers/users.php" enctype="multipart/form-data">
                            <ul class="uploadViews" style="border:none !important;overflow:hidden !important;">
                            <a href="JavaScript:;"><img src="<?php echo '../images/photos/8.jpg'?>"   class= "col-lg-8 col-md-12 col-sm-12 col-xs-12"  title="slide_image" style="margin-left:15px;"></a>
                            
                            </ul>
                            <div id="drop" class="col-lg-3" >
                                <input required="" type="file" name="slide" style="background-color:transparent;" >
                                <a>Image 1</a> <br><br>
                                <input type="hidden" value="slide1_1" name="slide">
                            <button type="submit" name="slide1"  style=" ;"class ="btn btn-lg btn-primary">Upload</button>

                            </div>
                        </form>
                        </ul>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </section>
                        </section>



                        <script src="assets/js/bootstrap.js"></script>
                        <script src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
                        <script src="assets/js/scripts.js"></script>
                        <script src="assets/js/jquery.slimscroll.js"></script>
                        <script src="assets/js/jquery.nicescroll.js"></script>
                        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="assets/js/flot-chart/excanvas.min.js"></script><![endif]-->
                        <!-- <script src="assets/js/jquery.fileupload.js"></script> -->
                        <script src="assets/js/script.js"></script>
                        <script src="assets/js/jquery.scrollTo.js"></script>
                    <?php
                }else{
                    header("location:../index.php");
                }
            }else{
                header("location:../index.php");
            }
        ?>