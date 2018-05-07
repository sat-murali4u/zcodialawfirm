<?php
$title = $fav_image = $logo_title = $logo_href = $logo_image = $logo_retina_image = '';
$logo_alt_text = $logo_sticky_image = $logo_sticky_retina_image = $logo_sticky_alt_text = '';
$logo_mobile_image = $logo_mobile_retina_image = $logo_mobile_retina_alt_text = $logo_mobile_sticky_image = '';
$logo_mobile_sticky_retina_image = $logo_mobile_sticky_retina_alt_text = $logo_data_height = $logo_data_height = '';
$logo_data_padding = $logo_main_data_height = $logo_sticky_data_height = $logo_mobile_data_height = $logo_mobile_sticky_data_height = '';

if (isset($logo_details) && isset($logo_details)) {

    $title = $logo_details[0]['title'];
    $fav_image = $logo_details[0]['fav_image'];
    $logo_title = $logo_details[0]['logo_title'];
    $logo_href = $logo_details[0]['logo_href'];
    $logo_image = $logo_details[0]['logo_image'];
    $logo_alt_text = $logo_details[0]['logo_alt_text'];
    $logo_data_height = $logo_details[0]['logo_data_height'];
    $logo_data_padding = $logo_details[0]['logo_data_padding'];
    $logo_main_data_height = $logo_details[0]['logo_main_data_height'];
    $logo_sticky_data_height = $logo_details[0]['logo_sticky_data_height'];
    $logo_mobile_data_height = $logo_details[0]['logo_mobile_data_height'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin - <?php echo $this->config->item('website_name', 'tank_auth'); ?></title>
        <base href="<?php echo base_url(); ?>">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo $fav_image; ?>" type="image/x-icon">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="themes/backend/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="themes/backend/assets/bower_components/font-awesome/css/font-awesome.min.css">

        <!-- Ionicons -->
        <link rel="stylesheet" href="themes/backend/assets/bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="themes/backend/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="themes/backend/assets/bower_components/jvectormap/jquery-jvectormap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="themes/backend/assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="themes/backend/assets/dist/css/skins/_all-skins.min.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="themes/backend/assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="themes/backend/assets/dist/css/custom.css" type="text/css">

        <!--link href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"-->
        <link href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <!-- iCheck -->
        <link rel="stylesheet" href="themes/backend/assets/plugins/iCheck/square/blue.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="themes/backend/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="themes/backend/assets/dist/css/select2.css">
        <link rel="stylesheet" href="themes/backend/assets/dist/css/flaticon.css">
        <link rel="stylesheet" href="themes/backend/assets/bower_components/select2/dist/css/select2.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>
            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
            }

            .switch input {display:none;}

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: .4s;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }

            input:checked + .slider {
                background-color: #337ab7;
            }

            input:focus + .slider {
                box-shadow: 0 0 1px #337ab7;
            }

            input:checked + .slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
                border-radius: 34px;
            }

            .slider.round:before {
                border-radius: 50%;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini register-page">

        <?php
        if (@$menu) {
            
        } else {
            ?> 
            <div class="wrapper">
                <header class="main-header">

                    <!-- Logo -->
                    <a href="javascript:void(0);" class="logo">
                        <!-- mini logo for sidebar mini 50x50 pixels -->
                        <span class="logo-mini"><b>A</b>LT</span>
                        <!-- logo for regular state and mobile devices -->
                        <span class="logo-lg"><b>Admin</b>LTE</span>
                    </a>

                    <!-- Header Navbar: style can be found in header.less -->
                    <nav class="navbar navbar-static-top">
                        <!-- Sidebar toggle button-->
                        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                            <span class="sr-only">Toggle navigation</span>
                        </a>
                        <!-- Navbar Right Menu -->
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="themes/backend/assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                        <span class="hidden-xs"><?php echo (isset($username) && !empty($username)) ? ucfirst($username) : ''; ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- User image -->
                                        <li class="user-header">
                                            <img src="themes/backend/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                            <p>
                                                <?php echo (isset($username) && !empty($username)) ? ucfirst($username) : ''; ?>
                                                <small>Member since Nov. 2012</small>
                                            </p>
                                        </li>

                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                            </div>
                                            <div class="pull-right">
                                                <a href="admin.php/auth/logout" class="btn btn-default btn-flat">Sign out</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>

                    </nav>
                </header>
                <aside class="main-sidebar">
                    <!-- sidebar: style can be found in sidebar.less -->
                    <section class="sidebar">
                        <!-- Sidebar user panel -->
                        <div class="user-panel">
                            <div class="pull-left image">
                                <img src="themes/backend/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            </div>
                            <div class="pull-left info">
                                <p><?php echo (isset($username) && !empty($username)) ? ucfirst($username) : ''; ?></p>
                                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                            </div>
                        </div>

                        <!-- sidebar menu: : style can be found in sidebar.less -->
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="header hide">MAIN NAVIGATION</li>
                            <li class="treeview <?php
                            if ($this->uri->segment(1) == "dashboard") {
                                echo "active menu-open";
                            }
                            ?>">
                                <a href="#">
                                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/dashboard"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                                </ul>
                            </li>
                            <li class="treeview <?php
                            if ($this->uri->segment(1) == "header") {
                                echo "active menu-open";
                            }
                            ?>">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-book"></i> <span>Header</span><i class="fa fa-angle-left pull-right"></i>
                                </a> 
                                <ul class="treeview-menu">
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "appointment") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/header/appointment"><i class="fa fa-angle-double-right"></i>Appointment</a></li>
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "logo") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/header/logo"><i class="fa fa-angle-double-right"></i>Logo</a></li>
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "menu") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/header/menu"><i class="fa fa-angle-double-right"></i>Menu</a></li>
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "seo") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/header/seo"><i class="fa fa-angle-double-right"></i>SEO</a></li>
                                </ul>
                            </li>
                            <li class="header">PAGES</li>
                            <li class="treeview <?php
                            if ($this->uri->segment(1) == "home") {
                                echo "active menu-open";
                            }
                            ?>">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-book"></i> <span>Home Page</span><i class="fa fa-angle-left pull-right"></i>
                                </a> 
                                <ul class="treeview-menu">
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "consultation") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/home/consultation"><i class="fa fa-angle-double-right"></i>Consultation</a></li>
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "counter_part") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/home/counter_part"><i class="fa fa-angle-double-right"></i>Counter Part</a></li>
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "disclaimer") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/home/disclaimer"><i class="fa fa-angle-double-right"></i>Disclaimer</a></li>
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "slider") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/home/slider"><i class="fa fa-angle-double-right"></i>Slider</a></li>
                                    <li class="hide <?php
                                    if ($this->uri->segment(2) == "slider_box") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/home/slider_box"><i class="fa fa-angle-double-right"></i>Slider Box</a></li>
                                    <li class="hide <?php
                                    if ($this->uri->segment(2) == "specialization") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/home/specialization"><i class="fa fa-angle-double-right"></i>Specialization</a></li>                                    
                                    <li class="hide <?php
                                    if ($this->uri->segment(2) == "specializationItems") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/home/specializationItems"><i class="fa fa-angle-double-right"></i>Specialization Items</a></li>                                    
                                    <li class=" hide <?php
                                    if ($this->uri->segment(2) == "testimonials") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/home/testimonials"><i class="fa fa-angle-double-right"></i>Testimonials</a></li> 
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "testimonialSlider") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/home/testimonialSlider"><i class="fa fa-angle-double-right"></i>Testimonial Slider</a></li> 
                                </ul>
                            </li>
                            <li class="treeview <?php
                            if ($this->uri->segment(1) == "about") {
                                echo "active menu-open";
                            }
                            ?>">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-book"></i> <span>About</span><i class="fa fa-angle-left pull-right"></i>
                                </a> 
                                <ul class="treeview-menu">
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "attorney") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/about/attorney"><i class="fa fa-angle-double-right"></i>About Attorney</a></li>
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "attorney_breadcrumb") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/about/attorney_breadcrumb"><i class="fa fa-angle-double-right"></i>Attorney Breadcrumb</a></li>
                                    <li class=" hide <?php
                                    if ($this->uri->segment(2) == "myself") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/about/myself"><i class="fa fa-angle-double-right"></i>About Me</a></li>                                    
                                    <li class="hide <?php
                                    if ($this->uri->segment(2) == "items") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/about/items"><i class="fa fa-angle-double-right"></i>About Me Items</a></li>    
                                    <li class="hide <?php
                                    if ($this->uri->segment(2) == "slider") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/about/slider"><i class="fa fa-angle-double-right"></i>Slider</a></li>


                                    <li class="<?php
                                    if ($this->uri->segment(2) == "attorney_skills") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/about/attorney_skills"><i class="fa fa-angle-double-right"></i>Attorney Skills</a></li>
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "attorney_skills_category") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/about/attorney_skills_category"><i class="fa fa-angle-double-right"></i>Attorney Skills Category</a></li>
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "attorney_details") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/about/attorney_details"><i class="fa fa-angle-double-right"></i>Attorney Details</a></li> 
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "attorney_social") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/about/attorney_social"><i class="fa fa-angle-double-right"></i>Attorney Social Details</a></li> 

                                    <li class="<?php
                                    if ($this->uri->segment(2) == "our_experience") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/about/our_experience"><i class="fa fa-angle-double-right"></i>Our Experience</a></li>
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "timeline") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/about/timeline"><i class="fa fa-angle-double-right"></i>Timeline</a></li> 
                                    <li class="hide <?php
                                    if ($this->uri->segment(2) == "parallax") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/about/parallax"><i class="fa fa-angle-double-right"></i>Parallax</a></li> 
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "why_us") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/about/why_us"><i class="fa fa-angle-double-right"></i>Why Choose Us</a></li>
                                </ul>
                            </li>
                            <li class="treeview <?php
                            if ($this->uri->segment(1) == "practice") {
                                echo "active menu-open";
                            }
                            ?>">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-book"></i> <span>Practice Areas</span><i class="fa fa-angle-left pull-right"></i>
                                </a> 
                                <ul class="treeview-menu">
                                    <li class="hide <?php
                                    if ($this->uri->segment(2) == "slider") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/practice/slider"><i class="fa fa-angle-double-right"></i>Slider</a></li>
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "about") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/practice/about"><i class="fa fa-angle-double-right"></i>About Practice</a></li>                                    
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "items") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/practice/items"><i class="fa fa-angle-double-right"></i>Practice Items</a></li>                                    
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "details") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/practice/details"><i class="fa fa-angle-double-right"></i>Practice Details</a></li>                                    
                                    <li class="hide <?php
                                    if ($this->uri->segment(2) == "parallax") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/practice/parallax"><i class="fa fa-angle-double-right"></i>Parallax</a></li> 
                                </ul>
                            </li>
                            <li class="treeview <?php
                            if ($this->uri->segment(1) == "faq") {
                                echo "active menu-open";
                            }
                            ?>">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-book"></i> <span>Question & Answer</span><i class="fa fa-angle-left pull-right"></i>
                                </a> 
                                <ul class="treeview-menu">
                                    <li class="hide <?php
                                    if ($this->uri->segment(2) == "slider") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/faq/slider"><i class="fa fa-angle-double-right"></i>Slider</a></li>
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "category") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/faq/category"><i class="fa fa-angle-double-right"></i>FAQ Categories</a></li>                                    
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "questions") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/faq/questions"><i class="fa fa-angle-double-right"></i>Category QA</a></li>                                    
                                </ul>
                            </li>
                            <li class="treeview  <?php
                            if ($this->uri->segment(1) == "contact") {
                                echo "active menu-open";
                            }
                            ?>">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-book"></i> <span>Footer</span><i class="fa fa-angle-left pull-right"></i>
                                </a> 
                                <ul class="treeview-menu">
                                    <li class="hide <?php
                                    if ($this->uri->segment(2) == "slider") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/contact/slider"><i class="fa fa-angle-double-right"></i>Slider</a></li>
                                    <li class="<?php
                                    if ($this->uri->segment(2) == "content") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/contact/content"><i class="fa fa-angle-double-right"></i>Contact Us</a></li>                                    
                                    <li class=" <?php
                                    if ($this->uri->segment(2) == "google_maps") {
                                        echo "active";
                                    }
                                    ?>"><a href="admin.php/contact/google_maps"><i class="fa fa-angle-double-right"></i>GMap Key Entry</a></li>                                    
                                </ul>
                            </li>

                        </ul>
                    </section>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">

                <?php } ?>
                    
