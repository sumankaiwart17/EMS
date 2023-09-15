<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


    <title></title>

    <style>

        .mob-navitem {

            display: none;

        }


        .sidebar-menu li.active a{
            background-color: #e1e1e1;
        }

        .page-wrapper{
            background: #F2F2F2;
        }

        
        .form-control{
            box-shadow: 0 4px 24px 0 rgb(34 41 47 / 10%);

        }

.bg-primary {
    background-color: #777777 !important;
}
        
        

        .sidebar-menu  li:hover a{
            transform: translateX(10px);
        }

        .sidebar-menu li.active a {
            transform:inherit;
        }

        .dash-widget-bg1,.dash-widget-bg2,.dash-widget-bg3,.dash-widget-bg4{
            font-size:30px;
        }

        .dash-widget-info span i{
            line-height:18px;
        }


        .hidesb {

            margin-left: 0px;

        }

        .navbar-dark .navbar-nav .nav-link,.navbar-dark .navbar-nav .nav-link:hover{
            color:#fff;
        }

    </style>

</head>



<body>

    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">

        <button id="mobile_btn" class="navbar-toggler mobile_btn" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle sidebar">

            <span class="fa fa-bars"></span>

        </button>

        <a class="navbar-brand ml-3" href="#"><img src="<?php echo base_url('images/AAHRS_logo5.png') ?>" class="" style="height: 30px;" alt="logo"></a>



        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <span class="fa fa-ellipsis-v"></span>

        </button> -->

        <!-- <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>

            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a> -->

        <div class="mob-navitem">

            <ul class="navbar-nav ml-auto mr-4">

                <li class="nav-item">

                    <div class="row">

                        <a style="padding-right: 10px;padding-top: 3px;" class="nav-link" href="#"><i class="fas fa-bell"></i></a>

                        <a style="padding-right: 12px;padding-top: 3px;" class="nav-link" href="#"><i class="fas fa-comment"></i></a>

                        <a style="padding-top: 3px;" class="nav-link" href="<?php echo site_url('hospital/logout') ?>"><i class="fas fa-sign-out-alt"></i></a>

                    </div>

                </li>

            </ul>

        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto mr-4">

                <li class="nav-item">

                    <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>

                </li>

                <li class="nav-item cmnt">

                    <a class="nav-link cmnt" href="#"><i class="fas fa-comment"></i></a>

                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle nvdrp" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                     <?php if(isset($_SESSION)):?>   <?php echo $_SESSION['admin_name'] ?>
                        
                        <?php endif;?>

                    </a>

                    <div class="dropdown-menu mt-2" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="<?php echo site_url('') ?>">View Profile</a>

                        <a class="dropdown-item" href="<?php echo site_url('') ?>">Edit Profile</a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="<?php echo site_url('Admin/logout') ?>">Log Out</a>

                    </div>

                </li>

            </ul>

        </div>

    </nav>

    <!-- side nav -->

    <div class="sidebar mt-2" id="sidebar">

        <div class="sidebar-inner slimscroll">

            <div id="sidebar-menu" class="sidebar-menu">

                <ul style=" height: 100vh; overflow: auto;">

                    <li <?php if ($this->uri->segment(2) == 'dashboard') : ?> class="active" <?php endif; ?>>

                        <a href="<?php echo site_url('Admin/dashboard') ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>

                    </li>

                    

                    <li <?php if ($this->uri->segment(2) == 'departments') : ?> class="active" <?php endif; ?>>

                        <a href="<?php echo site_url('Admin/departments') ?>"><i class="fas fa-hospital"></i> <span>Departments</span></a>

                    </li>
                    
                </ul>

            </div>

        </div>

    </div>



    <!-- 

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

     -->



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="<?php echo base_url() ?>css/assets/js/jquery-3.2.1.min.js"></script>

    <!--

    <script src="<?php echo base_url() ?>css/assets/js/popper.min.js"></script>

    <script src="<?php echo base_url() ?>css/assets/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url() ?>css/assets/js/jquery.slimscroll.js"></script>

    <script src="<?php echo base_url() ?>css/assets/js/select2.min.js"></script>

	<script src="<?php echo base_url() ?>css/assets/js/moment.min.js"></script>

	<script src="<?php echo base_url() ?>css/assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="<?php echo base_url() ?>css/assets/js/app.js"></script>

     -->

    <!-- <script src="<?php echo base_url() ?>css/assets/js/app.js"></script>

    <script src="<?php echo base_url() ?>css/assets/js/jquery-3.2.1.min.js"></script> -->

    <script>

        var drop_flag = 0;

        $(".submenu").click(function() {

            if (drop_flag == 0) {

                $(".drop_emp").show();

                drop_flag = 1;

            } else {

                $(".drop_emp").hide();

                drop_flag = 0;

            }

        })

    </script>

    <script>

        var drop_flag = 0;

        $(".submenu1").click(function() {

            console.log("click");

            if (drop_flag == 0) {

                $(".drop_offer").show();

                drop_flag = 1;

            } else {

                $(".drop_offer").hide();

                drop_flag = 0;

            }

        })

    </script>

    <script>

        $(".mobile_btn").click(function() {

            if ($("#sidebar").hasClass("hidesb")) {

                $("#sidebar").removeClass("hidesb");

            } else {

                $("#sidebar").addClass("hidesb");

            }

        })

    </script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
      offset: 130,
      duration: 1000,
      });
  </script>

</body>



</html>