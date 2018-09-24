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
        
<!--main content start-->
    <?php
        if(isset($_SESSION['users_role_info'])){

            if($_SESSION['users_role_info'] =='admin'){
                ?>
                <section id="main-content">
	<section class="wrapper">
    <?php 
            include_once '../controllers/Errors_Show.php';
            $errors = new Errors_Show();
           
                ?>
		<div class="form-w3layouts">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                 </div>
                <section class="panel">
                    <header class="panel-heading">
                        Change Front-Page Banner 
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-up"></a>
                        </span>
                    </header>
                    <div class="panel-body  panel_body" >
                    
                        <form id="upload" method="post" action="../controllers/users.php" enctype="multipart/form-data">
                            <div id="drop"  class= "col-lg-4">
                                 <input required="" type="file" name="image" style="background-color:transparent;" >
                                 <!-- <button type="upload" class="btn btn-danger">Upload Here </button> -->
                                 <a>Upload</a> (Max width = 1900 &amp; Max height = 849)
                            </div> 
                            <ul class="uploadViews">
                                <!-- The file uploads will be shown here -->
                                <?php
                                 $modelLink = new Users;
                                 ?>
                                <a href="JavaScript:;"><img src="<?php echo '../images/photos/'.$currentImage =  $modelLink->displayInfo($data="image")?>" class= "col-lg-12 col-md-12 col-sm-12 col-xs-12" title="Current Banner"></a>
                              
                            </ul><br>
                            <textarea  name="description" id="description" row="10"  cols="80">
                                <h1  class="animated fadeInDown">(image is required to submit) This h1 with two class named ANIMATED &amp; FADEINDOWN,click source to add Style or class for proper edit    </h1>
                        
                            </textarea>
                            <textarea name="description1" id="description1" row="10"  cols="80">
                            <p class="animated fadeInUp"> (image is required to submit) This p with two class named ANIMATED &amp; FADEINDOWN, click source to add Style or class for proper edit</p>
                            </textarea>
                            <script>
                                CKEDITOR.replace('description');
                                CKEDITOR.replace('description1');
                            </script><br>
                            <button type="submit" name="upload"  style=" float:right;"class ="btn btn-lg btn-primary">Upload</button>
                        </form>
                        </div>
                </section> 
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                            	<div class="modal-dialog">
                                	<div class="modal-content">
                                        <div class="modal-header">
                                            <button aria-hidden="true" data-dismiss="modal" class="close" id ="close" type="button">×</button>
                                            <h4 class="modal-title" style="color:blue;">Change Caption</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="action="../controllers/users.php"" method="post">
                                                <select name="slide_picker" id="slide_picker" class="form-control">
                                                    <option value="slide_caption_?">Choose Caption</option>
                                                    <option value="slide_caption_a"> Slide 1 Currently (<?php echo  $currentImage =  $modelLink->displayInfo($data="slide_caption_a")?>)</option>
                                                    <option value="slide_caption_b">Slide 2 Currently (<?php echo  $currentImage =  $modelLink->displayInfo($data="slide_caption_b")?>)</option>
                                                    <option value="slide_caption_c">Slide 3 Currently (<?php echo  $currentImage =  $modelLink->displayInfo($data="slide_caption_c")?>)</option>
                                                </select>
                                             <textarea name="caption" id="caption" cols="30" rows="10" aria-resizable="false" class="form-control"></textarea><br>
                                             <button type="submit" name="slide_caption"  style=" ;"class ="btn btn-lg btn-success">Change</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <section class="panel">
                    <header class="panel-heading">
                        Change Slides 
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-up"></a>
                        </span>
                    </header>
                    <div class="panel-body panel_body" ><!--id="panel_body"-->
                    <ul class="uploadViews ">
                        <h4 class='panel-heading'><?php echo strtoupper( $currentImage =  $modelLink->displayInfo($data="slide_caption_a"))?>  &nbsp;  <a data-toggle="modal" href="#myModal" class="" title="Edit Slider Caption"><i class="fa fa-edit"></i></a></h4>
                        <form id="upload" method="post" action="../controllers/users.php" enctype="multipart/form-data">
                            <ul class="uploadViews" style="border:none !important;overflow:hidden !important;">
                            <a href="JavaScript:;"><img src="<?php echo '../images/photos/'.$currentImage =  $modelLink->displayInfo($data="slide1_1")?>"   class= "col-lg-8 col-md-12 col-sm-12 col-xs-12"  title="slide_image" style="margin-left:15px;"></a>
                            
                            </ul>
                            <div id="drop" class="col-lg-3" >
                                <input required="" type="file" name="slide" style="background-color:transparent;" >
                                <a>Image 1</a> <br><br>
                                <input type="hidden" value="slide1_1" name="slide">
                            <button type="submit" name="slide1"  style=" ;"class ="btn btn-lg btn-primary">Upload</button>

                            </div>
                        </form>
                        <form id="upload" method="post" action="../controllers/users.php" enctype="multipart/form-data">
                        <ul class="uploadViews" style="border:none !important;overflow:hidden !important;">
                        <a href="JavaScript:;"><img src="<?php echo '../images/photos/'.$currentImage =  $modelLink->displayInfo($data="slide1_2")?>" class= "col-lg-10 col-md-12 col-sm-12 col-xs-12" title="slide_image" style="margin-left:15px;"></a>
                        </ul>
                            <div id="drop"  class="col-lg-3">
                                <input required="" type="file" name="slide" style="background-color:transparent;" >
                                <a>Image 2</a> <br><br>
                                <input type="hidden" value="slide1_2" name="slide">
                            <button type="submit" name="slide1"  style=" ;"class ="btn btn-lg btn-primary">Upload</button>

                            </div>
                        </form>
                        <form id="upload" method="post" action="../controllers/users.php" enctype="multipart/form-data">
                        <ul class="uploadViews" style="border:none !important;overflow:hidden !important;">
                        <a href="JavaScript:;"><img src="<?php echo '../images/photos/'.$currentImage =  $modelLink->displayInfo($data="slide1_3")?>" class= "col-lg-10 col-md-12 col-sm-12 col-xs-12" title="slide_image"></a>

                        </ul>
                            <div id="drop"  class="col-lg-3">
                                <input required="" type="file" name="slide" style="background-color:transparent;" >
                                <a>Image 3</a> <br><br>
                                <input type="hidden" value="slide1_3" name="slide">
                            <button type="submit" name="slide1"  style=" ;"class ="btn btn-lg btn-primary">Upload</button>

                            </div>
                            <div id="drop" class="col-lg-4" style="margin:40px;">(Max width = 1000 X Max height = 625)</div>
                        </form>
                    
                        </ul>
                        <ul class="uploadViews" style="border:none !important;overflow:hidden !important;" >
                            <h4  class='panel-heading'> <?php echo strtoupper( $currentImage =  $modelLink->displayInfo($data="slide_caption_b"))?>  &nbsp;  <a data-toggle="modal" href="#myModal" class="" title="Edit Slider Caption"><i class="fa fa-edit"></i></a></h4>
                            <form id="upload" method="post" action="../controllers/users.php" enctype="multipart/form-data">
                            <ul class="uploadViews" style="border:none !important;overflow:hidden !important;">
                            <a href="JavaScript:;"><img src="<?php echo '../images/photos/'.$currentImage =  $modelLink->displayInfo($data="slide2_1")?>" class= "col-md-12 col-lg-8 col-sm-12 col-xs-12 " title="slide_image"></a>
                            </ul>
                            <div id="drop" class="col-lg-3">
                                <input required="" type="file" name="slide" style="background-color:transparent;" >
                                <a>Image 1</a> <br><br>
                                <input type="hidden" value="slide2_1" name="slide">
                            <button type="submit" name="slide2"  style=" ;"class ="btn btn-lg btn-primary">Upload</button>

                            </div>
                           
                        </form>
                        <form id="upload" method="post" action="../controllers/users.php" enctype="multipart/form-data">
                        
                            <ul class="uploadViews " style="border:none !important;overflow:hidden !important;">
                            <a href="JavaScript:;"><img src="<?php echo '../images/photos/'.$currentImage = $modelLink->displayInfo($data="slide2_2")?>" class= "col-lg-10 col-md-12 col-sm-12 col-xs-12" title="slide_image"></a>
                            </ul>
                            <div id="drop" class="col-lg-3">
                                <input required="" type="file" name="slide" style="background-color:transparent;" >
                                <a>Image 2</a> <br><br>
                                <input type="hidden" value="slide2_2" name="slide">
                            <button type="submit" name="slide2"  style=" ;"class ="btn btn-lg btn-primary">Upload</button>

                            </div>
                        </form>
                        <form id="upload" method="post" action="../controllers/users.php" enctype="multipart/form-data">
                            <ul class="uploadViews" style="border:none !important;overflow:hidden !important;">
                            <a href="JavaScript:;"><img src="<?php echo '../images/photos/'.$currentImage =  $modelLink->displayInfo($data="slide2_3")?>" class= "col-lg-10 col-md-12 col-sm-12 col-xs-12" title="slide_image"></a>
                            
                            </ul>
                            <div id="drop" class="col-lg-3">
                                <input required="" type="file" name="slide" style="background-color:transparent;" >
                                <a>Image 3</a> <br><br>
                                <input type="hidden" value="slide2_3" name="slide">
                            <button type="submit" name="slide2"  style=" ;"class ="btn btn-lg btn-primary">Upload</button>
                            </div>

                            <div id="drop" class="col-lg-4" style="margin:40px;">(Max width = 1000 X Max height = 625)</div>

                        </form> 
                        </ul> <br>

                        <ul class="uploadViews " >
                            <h4  class='panel-heading'data-toggle="modal" href="myModal"> <?php echo  strtoupper( $currentImage =  $modelLink->displayInfo($data="slide_caption_b"))?>   &nbsp;  <a data-toggle="modal" href="#myModal" class="" title="Edit Slider Caption"><i class="fa fa-edit"></i></a></h4>
                            <!-- Slide 1 -->
                            <form id="upload" method="post" action="../controllers/users.php" enctype="multipart/form-data">
                            <ul class="uploadViews" style="border:none!important;overflow:hidden !important;">
                            <a href="JavaScript:;"><img src="<?php echo '../images/photos/'.$currentImage =  $modelLink->displayInfo($data="slide3_1")?>" class= "col-lg-8 col-md-12 col-sm-12 col-xs-12" title="slide_image"></a>

                            </ul>
                            <div id="drop" class="col-lg-3">
                                <input required="" type="file" name="slide" style="background-color:transparent;" >
                                <a>Image 1</a> <br><br>
                                <input type="hidden" value="slide3_1" name="slide">
                            <button type="submit" name="slide3"  style=" ;"class ="btn btn-lg btn-primary">Upload</button>

                            </div>
                        </form>
                        <!-- Slide 2 -->
                        <form id="upload" method="post" action="../controllers/users.php" enctype="multipart/form-data">
                            <ul class="uploadViews" style="border:none !important;overflow:hidden !important;">
                            <a href="JavaScript:;"><img src="<?php echo '../images/photos/'.$currentImage =  $modelLink->displayInfo($data="slide3_2")?>" class= "col-lg-10 col-md-12 col-sm-12 col-xs-12" title="slide_image"></a>

                            </ul>
                            <div id="drop" class="col-lg-3">
                                <input required="" type="file" name="slide" style="background-color:transparent;" >
                                <a>Image 2</a> <br><br>
                                <input type="hidden" value="slide3_2" name="slide">
                            <button type="submit" name="slide2"  style=" ;"class ="btn btn-lg btn-primary">Upload</button>

                            </div>
                        </form>  
                        <!-- Slide 3 -->
                        <form id="upload" method="post" action="../controllers/users.php" enctype="multipart/form-data">
                        <ul class="uploadViews" style="border:none !important;overflow:hidden !important;">
                        <a href="JavaScript:;"><img src="<?php echo '../images/photos/'.$currentImage =  $modelLink->displayInfo($data="slide3_3")?>" class= "col-lg-10 col-md-12 col-sm-12 col-xs-12" title="slide_image"></a>
                        </ul>
                            <div id="drop" class="col-lg-3">
                                <input required="" type="file" name="slide" style="background-color:transparent;" >
                                <a>Image 3</a> <br><br>
                                <input type="hidden" value="slide3_3" name="slide">
                            <button type="submit" name="slide1"  style=" ;"class ="btn btn-lg btn-primary">Upload</button>

                            </div>
                            <div id="drop" class="col-lg-4" style="margin:40px;">(Max width = 1000 X Max height = 625)</div>
                        </form>
                            </ul>
                            
                    </div>
                                
                                
                                    
                               
                        <!-- </ul><br> -->
                        
                        <!-- Ends the section for user to change the slides found in -->


                        
                   
                </section>

                <section class="panel">
                    <header class="panel-heading">
                        Change Web Logo
                        <span class="tools pull-right">
                            <a id="panel_down" href="javascript:;" class="fa fa-chevron-up"></a>
                        </span>
                    </header>
                    <div class="panel-body panel_body" >
                    <ul class="uploadViews ">
                        <h4 class='panel-heading'>Change Logo</h4>
                        <form id="upload" method="post" action="../controllers/users.php" enctype="multipart/form-data">
                            <ul class="uploadViews" style="border:none !important;overflow:hidden !important;">
                            <a  href="JavaScript:;"><img src="<?php echo '../images/'.$currentImage =  $modelLink->displayInfo($data="logo1_1")?>"   class= "col-lg-4 col-md-4 col-sm-12 col-xs-12"  title="logo" style="margin-left:15px;"></a>

                            </ul>
                            <div id="drop" class="col-lg-4">
                                <input required="" type="file" name="slide" style="background-color:transparent;" >
                                <a>Image 1</a> <br><br>
                                <input type="hidden" value="logo1_1" name="slide">
                            <button type="submit" name="logo"  style=" "class ="btn btn-lg btn-primary">Upload</button>

                            </div>
                            <div id="drop" class="col-lg-4" style="margin:40px;">( logo RECOMMENDED width = 154 X Max height = 53)</div>
                        </form>
                    </ul>
                    </div>
                    </section>
                
            </div>
        </div>
        <!-- page end-->
        </div>
</section>
   
</section>

<!--main content end-->
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

</body>
</html>
               <?php
             }else{
                header("location:../index.php");
             }

        }else{
            header("location:../index.php");
        }
?>