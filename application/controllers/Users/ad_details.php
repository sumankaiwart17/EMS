<?php
// echo "<pre>";
// print_r($adDetails);
// die;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('css/cssUser/style.css') ?>">
    <title>AAHRS | Advertisement</title>
    <style>
        .blink {
            animation: color-change 2s infinite;
        }

        @keyframes color-change {
            0% {
                color: yellow;
            }
            25% {
                color: blue;
            }
            50% {
                color: green;
            }

            75% {
                color: blue;

            }



            100% {

                color: yellow;

            }

        }

        .social-wallpaper {
            position: relative;
            height: 300px;
            background: url("images/medica.jpg") no-repeat;
            background-size: cover;
            background-color: #00b5ec;
        }
        .timeline-right .card,

        .timeline-left .card {
            border-top: none;
            box-shadow: 0 0 1px 2px rgba(0, 0, 0, 0.05), 0 -2px 1px -2px rgba(0, 0, 0, 0.04), 0 0 0 -1px rgba(0, 0, 0, 0.05);
            transition: all 180ms linear;

        }
        .timeline-right .card:hover,

        .timeline-left .card:hover {

            box-shadow: 0 0 25px -5px #9e9c9e;

            transition: all 180ms linear;

        }
        .timeline-icon {

            z-index: 1;

        }

        .timeline-btn {

            position: absolute;

            bottom: 0;

            right: 30px;

        }

        .nav-tabs.md-tabs.tab-timeline li a {
            padding: 10px;
            color: #666666;
            font-size: 18px;
        }
        .social-timeline-left {
            position: absolute;
            top: -200px;

        }

        .post-input {
            padding: 10px 10px 10px 5px;
            display: block;
            width: 100%;
            border: none;
            resize: none;
        }
        .user-box .media-object,
        .friend-box .media-object {

            height: 45px;

            width: 45px;

            display: inline-block;

        }

        .friend-box img {

            margin-right: 10px;

            margin-bottom: 10px;

        }

        .user-box .media-left {

            position: relative;

        }



        .chat-header {

            color: #222222;

        }



        .live-status {

            height: 7px;

            width: 7px;

            position: absolute;

            bottom: 0;

            right: 17px;

            border-radius: 100%;

            border: 1px solid;

        }



        .tab-timeline .slide {

            bottom: -1px;

        }



        .image-upload input {

            visibility: hidden;

            max-width: 0;

            max-height: 0

        }



        .file-upload-lbl {

            max-width: 15px;

            padding: 5px 0 0;

        }



        .ellipsis::after {

            top: 15px;

            border: none;

            position: absolute;

            content: '\f142';

            font-family: FontAwesome;

        }



        .elipsis-box {

            box-shadow: 0 0 5px 1px rgba(0, 0, 0, 0.11);

            top: 40px;

            right: -10px;

        }



        .elipsis-box:after {

            content: '';

            height: 13px;

            width: 13px;

            background: #fff;

            position: absolute;

            top: -5px;

            right: 10px;

            -webkit-transform: rotate(45deg);

            -moz-transform: rotate(45deg);

            transform: rotate(45deg);

            box-shadow: -3px -3px 11px 1px rgba(170, 170, 170, 0.22);

        }



        .friend-elipsis {

            left: -10px;

            top: -10px;

        }



        .social-profile:hover .profile-hvr,

        .social-wallpaper:hover .profile-hvr {

            opacity: 1;

            transition: all ease-in-out 0.3s;

        }



        .profile-hvr {

            opacity: 0;

            position: absolute;

            text-align: center;

            width: 100%;

            font-size: 16px;

            padding: 10px;

            top: 0;

            color: #fff;

            background-color: rgba(0, 0, 0, 0.61);

            transition: all ease-in-out 0.3s;

        }



        .social-profile {

            margin: 0 15px;

        }



        .social-follower {

            text-align: center;

        }



        .social-follower h4 {

            font-size: 14px;

            margin-bottom: 10px;

            font-style: normal;

        }



        .social-follower h5 {

            font-size: 10px;

            font-weight: 300;

        }



        .social-follower .follower-counter {

            text-align: center;

            margin-top: 25px;

            margin-bottom: 25px;

            font-size: 10px;

        }



        .social-follower .follower-counter .txt-primary {

            font-size: 20px;

        }



        .timeline-icon {

            height: 45px;

            width: 45px;

            display: block;

            margin: 0 auto;

            border: 4px #fff solid;

        }



        .social-timelines-left:after {

            height: 3px;

            width: 25%;

            position: absolute;

            background: #cccccc;

            top: 20px;

            content: "";

            right: 0;

            z-index: 0;

        }



        .social-timelines:before {

            position: absolute;

            content: ' ';

            width: 3px;

            background: #cccccc;

            left: 4%;

            z-index: 0;

            top: 0;

        }



        .timeline-dot:after,

        .timeline-dot:before {

            content: "";

            position: absolute;

            height: 9px;

            width: 9px;

            background-color: #cccccc;

            left: 3.8%;

            border-radius: 100%;

        }



        .user-box .social-designation,

        .post-timelines .social-time {

            font-size: 10px;

        }



        .social-msg span {

            color: #666;

            padding-left: 10px;

            padding-right: 10px;

            margin-right: 10px;

        }



        .view-info .social-label,

        .contact-info .social-label,

        .work-info .social-label {

            font-size: 15px;

            padding-left: 0;

            padding-top: 0;

        }



        .view-info .social-user-name,

        .contact-info .social-user-name,

        .work-info .social-user-name {

            font-size: 14px;

            padding-left: 0;

        }



        .friend-elipsis .social-designation {

            font-size: 13px;

        }



        .social-client-description {

            padding-bottom: 20px;

        }



        .user-box .media-body {

            padding-top: 6px;

        }



        .timeline-details p {

            padding-top: 10px;

        }



        .timeline-details .chat-header,

        .post-timelines .chat-header {

            font-size: 15px;

        }



        .social-client-description {

            padding-bottom: 20px;

        }



        .social-client-description p {

            margin-top: 5px;

        }



        .social-client-description span {

            font-size: 12px;

            margin-left: 10px;

        }



        .social-client-description .chat-header {

            font-size: 13px;

        }



        .social-tabs a {

            font-size: 18px;

        }



        .timeline-btn a {

            margin-bottom: 20px;

        }



        .profile-hvr i {

            cursor: pointer;

        }



        .social-timelines:before {

            position: absolute;

            content: ' ';

            width: 3px;

            background: #cccccc;

            left: 4%;

            z-index: 0;

            height: 100%;

            top: 0;

        }



        .timeline-dot:after,

        .timeline-dot:before {

            content: "";

            position: absolute;

            height: 9px;

            width: 9px;

            background-color: #cccccc;

            left: 3.8%;

            border-radius: 100%;

        }



        ul#profile-lightgallery {

            display: inline-flex;

        }



        .social-timeline .btn i {

            margin-right: 0;

        }



        .card .card-block {

            padding: 25px;



        }



        .social-follower {

            text-align: center;

        }



        .media-left {

            padding-right: 20px;

        }



        .live-status {

            height: 9px;

            width: 9px;

            position: absolute;

            bottom: 0;

            right: 17px;

            border-radius: 100%;

            border: 1px solid;

            top: 5px;

        }



        .live-status {

            height: 10px;

            width: 10px;

            position: absolute;

            top: 20px;

            right: 20px;

            border-radius: 100%;

            border: 1px solid;

        }



        .bg-danger {

            background-color: #FF5370 !important;

            color: #fff;

        }



        .card {

            border-radius: 5px;

            -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);

            box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);

            border: none;

            margin-bottom: 10px;

            -webkit-transition: all 0.3s ease-in-out;

            transition: all 0.3s ease-in-out;

        }



        .user-box .media-object,

        .friend-box .media-object {

            height: 45px;

            width: 45px;

            display: inline-block;

            cursor: pointer;

        }



        .md-tabs .nav-item {

            width: calc(100%/ 5);

            text-align: center;

        }



        .md-tabs .nav-item .nav-link.active~.slide {

            opacity: 1;

            -webkit-transition: all 0.3s ease-out;

            transition: all 0.3s ease-out;

        }



        .md-tabs .nav-item .nav-link~.slide {

            opacity: 0;

            -webkit-transition: all 0.3s ease-out;

            transition: all 0.3s ease-out;

        }



        .tab-timeline .slide {

            bottom: -1px;

        }



        .scrollable {

            height: 700px;

            overflow: scroll;

        }



        .scrollable::-webkit-scrollBar {

            display: none;

        }



        .nav-tabs .slide {
            background: #4099ff;
            width: calc(100%/ 4);
            height: 4px;
            position: absolute;
            -webkit-transition: left 0.3s ease-out;
            transition: left 0.3s ease-out;
            bottom: 0;
        }

        @media screen and (max-width:767px) {
            .social-timeline-left {
                margin-top: 1500px;
            }
            .one {
                height: 400px;
            }
            .two {
                flex: 100%;
            }

            #timeline {

                margin-left: -65px;

            }



            .doc-card {
                height: 200px;
            }
            .doc {
                margin-top: 20px;
                margin-bottom: 20px;
            }
        }
    </style>



</head>


<?php
$alert = '';

$book_status = '';

if (isset($_SESSION['book_status']))

    $book_status = $_SESSION['book_status'];

if ($book_status != 0) {

    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Booking Successful!! Your Booking ID is ' . $book_status . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

                    </div>';

}

?>



<body class="bg-body">
    <?php include('navbar.php'); ?>
    <div class="container mt-2">
        <div class="row">

            <!-- left Bar -->

            <?php include('left-sidebar.php'); ?>
            <div class="col-10 col-sm-10 col-xl-10">
                <div class="row">
                    <div class="col-sm-12">
                        <?php

                        if(isset($nodata))
                            echo "<h1>No Details Found</h1>";
                        if(isset($hosDetails))
                        
        
                        foreach ($hosDetails as $x) : ?>


                            <div class="social-timeline">
                                <div class="row timeline-right">
                                    <div class="col-12 col-sm-12 col-xl-12">
                                        <div class="card">
                                            <div class="card-block post-timelines" style="height:290px;background-image: url('<?php echo empty($adDetails[0]['image']) ? base_url('images/dd.jpg') : $adDetails[0]['image'] ?>'); background-repeat: no-repeat; background-position: center; background-size:cover;">

                                            <div class="px-5 pt-5 pb-3">
                                            <div class="row">
                                                    <div class="col-12">
                                                        
                                                        <img class="img-radius" height="100px" width="100px" style="border-radius:100%; margin-top: 50px; border:4px solid #fff" src="<?php echo base_url('userUploads/' . $x['logo'])?>" alt="">
                                                        
                                                        <form  class="d-flex justify-content-end" action="<?php echo site_url('appointment_Controller/hosAppointment/'. $x['hos_id']) ?>" method="POST">
                                                        <a href="<?php echo site_url('mainController/viewHospital/' . $x['hos_id']) ?>" class="btn btn-primary">View Profile</a>
                                                    <button type="submit" name="submit" class="btn btn-danger ml-2">Book Appointment</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>

                                            </div>
                                            <br>                                          
                                            
                                            <h2 class="pl-5"><?php echo $adDetails[0]['ad_title']

                                                         ?></h2>
                                                    <!-- <h2 class="blink rounded p-2 mt-3" style="width:fit-content; color:#fff;">
                                                        </h2> -->


                                      

                                            <div class="card-block mt-0 pt-0">
                                                <div class="timeline-details">
                                                    <p class="mb-4 pl-4 pb-0"><?php echo $adDetails[0]['ad_desc']
                                                                            ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>




    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>


</html>


