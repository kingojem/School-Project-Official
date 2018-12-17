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
        include_once MODELS.'/Users.php';
    ?>
        <?php include_once 'header.php';?>
        <?php include_once 'sidebar.php';?>	
        <?php 
            if(isset($_SESSION['users_role_info'])){

                if($_SESSION['users_role_info'] =='admin'){
                    include_once '../controllers/Errors_Show.php';
                    $errors = new Errors_Show();
                    $modelLink = new Users;
                                
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
                                            <?php
    if(isset($_POST['select_category'])):
        $category = $_POST['change_category'];
            
        else: $category = "<span style = color:red;font-weight:bold>Select The Category To Upload</span>";
    endif;
    // $errors = new Errors_Show();
?>
    
                        <h4 class='panel-heading'><?php echo $category;?>  &nbsp;  <a data-toggle="modal" href="#myModal" class=""  title="Change Room Category"><i class="fa fa-edit"></i></a></h4>
                        <form id="upload" method="post" action="../controllers/users.php" enctype="multipart/form-data">
                            <ul class="uploadViews" style="border:none !important;overflow:hidden !important;">
                            <a href="JavaScript:;">
                                            <!-- <img src="<?php #echo '../images/photos/8.jpg'?>"   class= "col-lg-8 col-md-12 col-sm-12 col-xs-12"  title="slide_image" style="margin-left:15px;"> -->

                                <div id="RoomDetails" class="carousel slide" style="width:auto; height:auto" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="item active"><img src="../images/photos/8.jpg" class="col-lg-8 col-md-12 col-sm-12 col-xs-12 img-responsive" alt="slide"  title="slide_image" style="margin-left:15px;"></div>
                                        <div class="item  height-full"><img src="../images/photos/7.jpg"  class="col-lg-8 col-md-12 col-sm-12 col-xs-12 img-responsive" alt="slide" title="slide_image" style="margin-left:15px;"></div>
                                        <div class="item  height-full"><img src="../images/photos/81.jpg"  class=" col-lg-8 col-md-12 col-sm-12 col-xs-12 img-responsive" alt="slide" title="slide_image" style="margin-left:15px;"></div>

                                        <!-- <a class="left carousel-control" href="#RoomDetails" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                        <a class="right carousel-control" href="#RoomDetails" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>  -->

                                    </div>
                                    <!-- Controls -->
                                </div>
                                <div style="position:absolute;top:40%;left:60% ; background-color:black; height:5%;padding:4px; color:red " class="">Gold Image 23</div>
                            </a>

                                <span style="color:red"> <br><br>* These is a 3 image slide by Selected  Sub category, our Current selected Category is 
                                <?php if (!isset($_POST['select_category']) ): echo '<span style="color: blue"> Unknown, Please  </span>'; 
                                        endif;
                                ?> <span style="color: blue"><?php echo $category?></span>
                        
                           
                            </ul> 
                                <?php 
                                    if(isset($_POST['select_category'])){
                                ?>
                                        <div  style="margin-top:25px;margin-left:10%; width:60%;">
                                            <select  class = "form-control " name="rooms_category" id="rooms_category">
                                                <option value="null">Select Sub Category</option>
                                                <?php 
                                                    
                                                ?>
                                                <option value="null"><?php echo  $currentImage =  $modelLink->displayInfo($data="room_subcategory")?></option>
                                                <!-- <option value="gold_single">Gold Single</option>
                                                <option value="gold_double">Gold Double(Me + 1)</option>
                                                <option value="silver_single">Gold Single</option> -->

                                            </select><br>
                                            <select  class = "form-control " name="rooms_category" id="rooms_category">
                                                <option value="null">Select Image Number</option>
                                                <option value="image_1">Image 1</option>
                                                <option value="image_2">Image 2</option>
                                                <option value="image_3">Image 3</option>
                                            </select>
                                        </div>

                                        <div id="drop" class="col-lg-3" >
                                            <input required="" type="file" name="slide" style="background-color:transparent;" >
                                            <a>Pick Image</a> <br><br>
                                            <!-- <input type="hidden" value="" name="slide"> -->
                                            <button type="submit" name="slide1"  style=" ;"class ="btn btn-lg btn-primary">Upload</button>
                                        </div>
                                <?php
                                    }
                                ?>
                            
                            
                        </form>
                        </ul>
                                            </div>
                                        </section>

                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" id ="close" type="button">×</button>
                                        <h4 class="modal-title" style="color:blue;">Change Category</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
                                        <select name="change_category" id="slide_picker" class="form-control">
                                                <!-- <option>Select Category</option> -->
                                                <option value="<?php echo  $currentImage =  $modelLink->displayInfo($data="room_category_a")?>">  <?php echo  $currentImage =  $modelLink->displayInfo($data="room_category_a")?></option>
                                                <option value="<?php echo  $currentImage =  $modelLink->displayInfo($data="room_category_b")?>"> <?php echo  $currentImage =  $modelLink->displayInfo($data="room_category_b")?></option>
                                                <option value="<?php echo  $currentImage =  $modelLink->displayInfo($data="room_category_c")?>"> <?php echo  $currentImage =  $modelLink->displayInfo($data="room_category_c")?></option>
                                            </select> <br>
                                            <button type="submit" name="select_category"  style=" "class ="btn btn-md btn-success">Ok</button>

                                        </form>
                                        <hr>
                                        <form action="../controllers/users.php" method="post">
                                            <select name="room_picker" id="room_picker" class="form-control">
                                                <option value="room_category_?">Change Category Name</option>
                                                <option value="room_category_a"> Slide 1 Currently (<?php echo  $currentImage =  $modelLink->displayInfo($data="room_category_a")?>)</option>
                                                <option value="room_category_b">Slide 2 Currently (<?php echo  $currentImage =  $modelLink->displayInfo($data="room_category_b")?>)</option>
                                                <option value="room_category_c">Slide 3 Currently (<?php echo  $currentImage =  $modelLink->displayInfo($data="room_category_c")?>)</option>
                                            </select> <br><br>
                                            <textarea name="caption" id="caption" cols="30" rows="10" aria-resizable="false" class="form-control"></textarea><br>
                                            <button type="submit" name="room_category"  style=" ;"class ="btn btn-lg btn-success">Change</button>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        </div>
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