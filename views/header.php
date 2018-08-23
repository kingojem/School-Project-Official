<?php
 session_start();
    $asset = 'assets/';
    $account = 'accounts/';
    define('ASSET',$asset);
    define('ACCOUNT',$account) ;
        if((!is_dir(ASSET)) || (!is_dir(ACCOUNT))){
            header('location:../error.php');
        }else{
        include_once MODELS."/database.php";
           ?>
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="../" class="logo">
	<span class="glyphicon glyphicon-home" title="Home" aria-hidden="true"></span>
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars" title="Menu"></div>
    </div>
</div>
<!--logo end-->

        <?php
    if($_SESSION['first_name']==null){
        ?>
        <script>
            (function($){
                $(document).ready(function(){
                    $('#sidebar').toggleClass('hide-left-bar');
                    $('#main-content').toggleClass('merge-left');
                    $('.sidebar-toggle-box .fa-bars').click(function (e) {
                        $('#sidebar').toggleClass('hide-left-bar');
                        $('#main-content').toggleClass('merge-left');
                   })
                })
            })(jQuery)
        </script>
        <?php
    }else{
        $database = new Database();
        $connect = $database->getConnection();
        ?>
        <div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->
        <?php 
            if($_SESSION['users_role_info']=='admin'){
                ?>
                <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="fa fa-tasks"></i>
                                <span class="badge bg-success">8</span>
                            </a>
                            <ul class="dropdown-menu extended tasks-bar">
                                <li>
                                    <p class="">You have 8 pending tasks</p>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info clearfix">
                                            <div class="desc pull-left">
                                                <h5>Target Sell</h5>
                                                <p>25% , Deadline  12 June’13</p>
                                            </div>
                                                    <span class="notification-pie-chart pull-right" data-percent="45">
                                            <span class="percent"></span>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info clearfix">
                                            <div class="desc pull-left">
                                                <h5>Product Delivery</h5>
                                                <p>45% , Deadline  12 June’13</p>
                                            </div>
                                                    <span class="notification-pie-chart pull-right" data-percent="78">
                                            <span class="percent"></span>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info clearfix">
                                            <div class="desc pull-left">
                                                <h5>Payment collection</h5>
                                                <p>87% , Deadline  12 June’13</p>
                                            </div>
                                                    <span class="notification-pie-chart pull-right" data-percent="60">
                                            <span class="percent"></span>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info clearfix">
                                            <div class="desc pull-left">
                                                <h5>Target Sell</h5>
                                                <p>33% , Deadline  12 June’13</p>
                                            </div>
                                                    <span class="notification-pie-chart pull-right" data-percent="90">
                                            <span class="percent"></span>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                
                                <li class="external">
                                    <a href="#">See All Tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Tasks end -->
                        <?php
            }
        ?>
        <!-- inbox dropdown start-->
        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-important">4</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    <p class="red">You have 4 Mails</p>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="../assets/images/2.png"></span>
                                <span class="subject">
                                <span class="from">Jonathan Smith</span>
                                <span class="time">Just now</span>
                                </span>
                                <span class="message">
                                    Hello, this is an example msg.
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="../assets/images/2.png"></span>
                                <span class="subject">
                                <span class="from">Jane Doe</span>
                                <span class="time">2 min ago</span>
                                </span>
                                <span class="message">
                                    Nice admin template
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="../assets/images/2.png"></span>
                                <span class="subject">
                                <span class="from">Tasi sam</span>
                                <span class="time">2 days ago</span>
                                </span>
                                <span class="message">
                                    This is an example msg.
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="../assets/images/2.png"></span>
                                <span class="subject">
                                <span class="from">Mr. Perfect</span>
                                <span class="time">2 hour ago</span>
                                </span>
                                <span class="message">
                                    Hi there, its a test
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">See all messages</a>
                </li>
            </ul>
        </li>
        <!-- inbox dropdown end -->
        <?php 
            if($_SESSION['users_role_info']=='admin'){
                ?>
<!-- notification dropdown start-->
<li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning">3</span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
                <li>
                    <div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #1 overloaded.</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-danger clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #2 overloaded.</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-success clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #3 overloaded.</a>
                        </div>
                    </div>
                </li>

            </ul>
        </li>
        <!-- notification dropdown end -->
                <?php
            }
        ?>
        
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix"> 
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <?php 
            if($_SESSION['users_role_info']=='admin'){
                ?>
                 <li>
                    <input type="text" class="form-control search " placeholder=" Search Users">
                </li>
                <?php
            }
        ?>
       
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <?php
                    if($_SESSION['profile_image'] != null){
                        ?>
                            <img src='<?php echo "accounts/". $_SESSION['profile_image']?>'>
                        <?php
                    }else{
                        ?>
                            <img src='assets/images/2.jpg'>
                        <?php
                    }
                ?>
                <span class="username"><?php echo ucfirst($_SESSION['first_name']) . " ".ucfirst($_SESSION['last_name']) ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <?php 
                $url = 'profile.php'; 
                    if($_SESSION['users_role_info'] == 'user'){
                        ?>
                            <li><a href="<?php echo $url ?>" id = "profile" class="btn-link"><i id = "profile"  class=" fa fa-suitcase"></i>Profile</a></li>
                        <?php
                    }
                ?>
                <li><a href="#" class="btn-link"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="../logout.php" class="btn-link"><i id = "logout" class="fa fa-power-off"></i> Log Out</a></li>
                <!-- <a href=""> -->
                </ul>
        </li>
        <!-- user login dropdown end -->
                     
    </ul>
    <!--search & user info end-->
</div>
        <?php
    }
?>
      
</header>
<!--header end-->
            <?php
        }
?>
        