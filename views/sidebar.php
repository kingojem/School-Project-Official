<!--sidebar start-->
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
                                    <!-- <li><a href="glyphicon.html">Rooms &amp; Tarriff</a></li>
                                    <li><a href="grids.html">Grids</a></li> -->
                                </ul>
                            </li>
                            <li>
                                <a href="fontawesome.html">
                                    <i class="fa fa-thumbs-o-up"></i>
                                    <span>Approvals </span>
                                </a>
                            </li>
                        <?php
                    }else{
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
               
                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Data Tables</span>
                    </a>
                    <ul class="sub">
                        <li><a href="basic_table.html">Basic Table</a></li>
                        <li><a href="responsive_table.html">Responsive Table</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Form Components</span>
                    </a>
                    <ul class="sub">
                        <li><a href="form_component.html">Form Elements</a></li>
                        <li><a href="form_validation.html">Form Validation</a></li>
						<li><a href="dropzone.html">Dropzone</a></li>
                    </ul>
                </li> -->
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
                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub">
                        <li><a href="chartjs.html">Chart js</a></li>
                        <li><a href="flot_chart.html">Flot Charts</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="sub">
                        <li><a href="google_map.html">Google Map</a></li>
                        <li><a href="vector_map.html">Vector Map</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-glass"></i>
                        <span>Extra</span>
                    </a>
                    <ul class="sub">
                        <li><a href="gallery.html">Gallery</a></li>
						<li><a href="404.html">404 Error</a></li>
                        <li><a href="registration.html">Registration</a></li>
                    </ul>
                </li> -->
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
                    }else{
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
<!--sidebar end-->