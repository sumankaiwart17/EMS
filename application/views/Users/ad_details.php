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
userUploads
            padding-right: 10px;

            margin-right: 10px;userUploads

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

            font-size: 14px;userUploads

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

                                            <div class="card-block post-timelines p-0" style="height: 250px ;background-image: url('<?php echo base_url('images/' . $x['cover_pic']) ?>'); background-repeat: no-repeat; background-position: center; background-size:cover;">

                                                <div class="row">

                                                    <div class="col-6" style="margin-top: 90px;">

                                                        <img class="img-radius ml-2" height="150px" width="150px" src="<?php echo base_url('images/' . $x['logo'])

                                                                                                                        ?>" alt="">

                                                    </div>

                                                    <div class="col-3" style="margin-top: 200px;">

                                                        <a href="<?php echo site_url('mainController/viewHospital/' . $x['hos_id']) ?>" class="btn btn-primary" style="float:right;">View Profile</a>

                                                    </div>



                                                    <div class="col-3" style="margin-top: 200px;">

                                                        <form action="<?php echo site_url('appointment_Controller/hosAppointment') ?>" method="POST">

                                                            <button type="submit" name="submit" class="btn btn-danger">Book Appointment</button>

                                                        </form>

                                                    </div>

                                                </div>

                                            </div>

                                            <br>

                                            <center>

                                                <h2><?php echo $adDetails[0]['ad_title']

                                                    ?></h2>

                                                <h2 class="blink rounded p-2 mt-3" style="width:fit-content; color:#fff;">

                                                    <strong>

                                                        <?php echo $adDetails[0]['offer']

                                                        ?>

                                                    </strong>

                                                </h2>

                                            </center>



                                            <?php //if ($x['image'] != '') : 

                                            ?>

                                            <img src="<?php //echo base_url('images/' . $x['cover_pic'])

                                                        ?>" class="img-fluid width-100" alt="">

                                            <?php //endif; 

                                            ?>

                                            <div class="card-block mt-0 pt-0">

                                                <div class="timeline-details">

                                                    <p class="mb-0 pb-0"><?php echo $adDetails[0]['ad_desc']

                                                                            ?></p>

                                                </div>

                                            </div>

                                            <!-- <div class="row mb-3">

                                                <div class="col-6">

                                                    <a href="<?php echo site_url('mainController/viewHospital/' . $x['hos_id']) ?>" class="btn btn-primary" style="float: right;">View Profile</a>

                                                </div>

                                                <div class="col-6">

                                                    <form action="<?php echo site_url('appointment_Controller/hosAppointment') ?>" method="POST">

                                                        <button type="submit" name="submit" class="btn btn-danger">Book Appointment</button>

                                                    </form>

                                                </div>

                                            </div> -->

                                            <!-- <div class="card-block row b-b-theme mx-0 mt-0 pt-0 b-t-theme social-msg">

                                                <a class="col-4 col-sm-4 col-md-4 col-lg-4 text-center" href="#"> <i class="fas fa-heart text-muted"></i><span class="b-r-muted">Like (<?php echo $x['like_count'] ?>)</span> </a>

                                                <a class="col-4 col-sm-4 col-md-4 col-lg-4 text-center" href="#"> <i class="fas fa-comment text-muted"></i> <span class="b-r-muted">Comments (<?php echo $x['comment_count'] ?>)</span>

                                                    <a class="col-4 col-sm-4 col-md-4 col-lg-4 text-center" href="#"> <i class="fas fa-share text-muted"></i> <span>Share (<?php echo $x['share_count'] ?>)</span></a>

                                            </div> -->



                                        </div>

                                    </div>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>



            </div>

        </div>

        <!-- Reviews -->

        <!-- <div class="col-sm-8 bg-light revData">

                 <?php if ($book_status != '') {

                        echo $alert;

                        unset($_SESSION['book_status']);

                    }

                    ?>

                 <?php foreach ($reviews as $x) : ?>

                     <div class="mt-3 pb-2" style="border-bottom: 2px ridge #AFABAB;">

                         <div class="row">

                             <div class="col-12">

                                 <img src="<?php echo $x['picture'] ?>" class="img-thumbnail ml-3 mr-3 float-left rounded-circle" style="height: 70px; width:70px;" alt="">



                                 <i class="fas fa-ellipsis-v fa-lg mt-2 float-right"></i>

                                 <h5 class="pt-2"><a href=""><?php echo $x['name'] ?></a> reviewed

                                     <?php if (isset($x['doc_name'])) : ?>

                                         <a href=""><strong class="rev-sub"><?php echo 'Dr. ' . $x['doc_name'] ?> </strong></a>

                                     <?php elseif (isset($x['hos_name']) && isset($x['dept_name'])) : ?>

                                         <a href=""><strong class="rev-sub"><?php echo $x['dept_name'] . ' dept, ' . $x['hos_name'] ?></strong></a>

                                     <?php elseif (isset($x['hos_name'])) : ?>

                                         <a href=""><strong class="rev-sub"><?php echo $x['hos_name'] ?> </strong></a>

                                     <?php endif; ?><br>

                                     <small style="font-size:13px;"><?php $date = date_create($x['datetime']);

                                                                    echo date_format($date, 'd/m/Y'); ?></small>

                                 </h5>



                             </div>

                         </div>

                         <div class="row">

                             <div class="col-9">

                                 <strong class="pl-2 mt-2 text-info" style="font-size: 18px;"><?php echo $x['review_title'] ?></strong>

                                 <p class="pl-2 pt-2 wwdtext"><?php echo $x['review_content'] ?></p>

                             </div>

                             <div class="col-3">

                                 <div class="mt-2">

                                     <h5 class="text-center"><?php echo $x['star_rating'] ?> out of 5</h5>

                                     <div class="row justify-content-center">

                                         <?php if (isset($x['doc_name'])) : ?>

                                             <div id="rateYo<?php echo $x['review_id'] . $x['doc_id'] ?>"></div>

                                         <?php elseif (isset($x['hos_name']) && isset($x['dept_name'])) : ?>

                                             <div id="rateYo<?php echo $x['review_id'] . $x['dept_id'] ?>"></div>

                                         <?php elseif (isset($x['hos_name'])) : ?>

                                             <div id="rateYo<?php echo $x['review_id'] . $x['hos_id'] ?>"></div>

                                         <?php endif; ?>



                                     </div>

                                 </div>

                             </div>

                         </div>

                         <div class="row justify-content-center">

                             <div class="col-4 pl-5"><i class="fas fa-thumbs-up icons"></i>&nbsp;Like</div>

                             <div class="col-4 pl-5"><i class="fas fa-comment icons"></i>&nbsp;Comments</div>

                             <div class="col-4 pl-5"><i class="fas fa-share icons"></i>&nbsp;Share</div>

                         </div>

                     </div>

                 <?php endforeach; ?>

             </div> -->

        <!-- right Bar -->





    </div>

    </div>

    </div>

    </div>

    <div class="modal fade" id="moreFilter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content" style="border-radius: 10px;">

                <div class="modal-header bg-flor">

                    <h4 class="modal-title text-white" id="exampleModalLongTitle">Filter</h4>

                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <form>

                        <div class="row">

                            <div class="form-group col-4">

                                <h6>Hospitals</h6>

                                <input list="hospital" class="form-control" name="hospital">

                                <datalist id="hospital">

                                    <?php //foreach ($filters['hos'] as $x) : 

                                    ?>

                                    <option value="<?php //echo $x['hos_name'] 

                                                    ?>">

                                        <?php //endforeach; 

                                        ?>

                                </datalist>

                            </div>

                            <div class="form-group col-4">

                                <h6>Department</h6>

                                <input list="department" class="form-control" name="department">

                                <datalist id="department">

                                    <?php //foreach ($filters['depts'] as $x) : 

                                    ?>

                                    <option value="<?php //echo $x['dept_name'] 

                                                    ?>">

                                        <?php //endforeach; 

                                        ?>

                                </datalist>

                            </div>

                            <div class="form-group col-4">

                                <h6>Treatment</h6>

                                <input list="treatment" class="form-control" name="treatment">

                                <datalist id="treatment">

                                    <option value="Cosmetic Surgery">

                                    <option value="Bypass Surgery">

                                    <option value="Ear Infection">

                                    <option value="Angioplast">

                                </datalist>

                            </div>

                        </div>

                    </form>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-danger">OK</button>

                </div>

            </div>

        </div>

    </div>

    <!-- <script>

    var myDiv = $('.wwdtext');

    myDiv.text(myDiv.text().substring(0,200));

    </script> -->

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script>

        $(document).ready(function() {

            $(".filterCheck").click(function() {



                var action = 'data';

                var hos_id = get_filter_text('hos_id');

                var dept_id = get_filter_text('dept_id');

                var doc_id = get_filter_text('doc_id');



                $.ajax({

                    url: '<?php echo site_url('userProfile_Controller/fetchRev') ?>',

                    method: 'POST',

                    data: {

                        action: action,

                        hos_id: hos_id,

                        dept_id: dept_id,

                        doc_id: doc_id,

                    },

                    success: function(response) {

                        //console.log(response);

                        $(".revData").html(response);

                    }



                });

            });





            function get_filter_text(text_id) {



                var filterData = [];

                $('#' + text_id + ':checked').each(function() {

                    filterData.push($(this).val());

                });



                return filterData;

            }

        });

    </script>

    <script>

        $(function() {

            <?php foreach ($reviews as $x) : ?>

                <?php if (isset($x['doc_name'])) : ?>

                    $("#rateYo<?php echo $x['review_id'] . $x['doc_id'] ?>").rateYo({

                        rating: <?php echo $x['star_rating'] ?>,

                        readOnly: true,

                        starWidth: "20px",

                        spacing: "3px"

                    });

                <?php elseif (isset($x['hos_name']) && isset($x['dept_name'])) : ?>

                    $("#rateYo<?php echo $x['review_id'] . $x['dept_id'] ?>").rateYo({

                        rating: <?php echo $x['star_rating'] ?>,

                        readOnly: true,

                        starWidth: "20px",

                        spacing: "3px"

                    });

                <?php elseif (isset($x['hos_name'])) : ?>

                    $("#rateYo<?php echo $x['review_id'] . $x['hos_id'] ?>").rateYo({

                        rating: <?php echo $x['star_rating'] ?>,

                        readOnly: true,

                        starWidth: "20px",

                        spacing: "3px"

                    });

                <?php endif; ?>

            <?php endforeach; ?>

        });

    </script>

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