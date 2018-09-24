<!--sidebar start-->
<?php 
if(isset($_SESSION['users_role_info'])){
    ?>
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <?php 
                 if( $_SESSION['users_role_info'] == 'admin'){
                    ?>
                    <li>
                    <a class="active" href="index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php
                 }
                 ?>
                <?php 
                    if( $_SESSION['users_role_info'] == 'admin'){
                        ?>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span>UI Elements || Edits &amp; Uploads</span>
                                </a>
                                <ul class="sub">
                                    <li><a href="ed_home.php">Home Page</a></li>
                                    <li><a href="ed_room.php">Rooms &amp; Tarriff</a></li>
                                    <!-- <li><a href="grids.html">Grids</a></li> --> 
                                </ul>
                            </li>
                            <li>
                                <a href="fontawesome.html">
                                    <i class="fa fa-thumbs-o-up"></i>
                                    <span>Approvals </span>
                                </a>
                            </li>
                        <?php
                    }if( $_SESSION['users_role_info'] == 'user'){
                        ?>
                           <li>
                                <a href="fontawesome.html">
                                    <i class="fa fa-credit-card"></i>
                                    <span> Rental Payment &amp; Subscriptions </span>
                                </a>
                            </li> 
                        <?php
                    }
                ?>
               
              
                <?php
                    if(( $_SESSION['users_role_info'] == 'admin') || ( $_SESSION['users_role_info'] == 'user') ){
                        ?>
                            <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-envelope"></i>
                        <span>Mail </span>
                    </a>
                    <ul class="sub">
                        <li><i class = ""></i><a href="mail.html">Inbox</a></li>
                        <li><a href="mail_compose.html">Compose Mail</a></li>
                    </ul>
                </li>
                        <?php
                    }
                ?>
                
                
                <?php 
                    if( $_SESSION['users_role_info'] == 'admin'){
                        ?>
                             <li>
                                <a href="#">
                                    <i class="fa fa-info"></i>
                                    <span>Create Advert</span>
                                </a>
                            </li>
                        <?php
                    }if( $_SESSION['users_role_info'] == 'user'){
                        ?>
                           <li>
                                <a href="#">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Sell My Space</span>
                                </a>
                            </li> 
                        <?php
                    }
                ?>
               
            </ul>            
        </div>
         <!-- sidebar menu end-->
    </div>
</aside>
    <?php
}
?>

<!--sidebar end-->