<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title>Hospital Profile</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <!--added-->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!--added-->

    <style type="text/css">
        .btn-rev {
            transition: .8s;
        }

        .btn-rev:hover {
            scale: 0.91;

        }

        body {

            background-color: #cccccc;

        }



        .social-wallpaper {

            position: relative;

            height: 300px;

            background: url("images/medica.jpg") no-repeat;

            background-size: cover;

            background-color: #00b5ec;

        }



        .card.social-tabs {

            border-top: none;

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



        .tab-pane form .md-add-on i {

            font-size: 20px;

        }



        .wall-elips {

            position: absolute;

            right: 15px;

        }







        .social-profile {

            position: relative;

            padding-top: 10px;

        }



        .timeline-btn {

            position: absolute;

            bottom: 0;

            right: 30px;

        }



        .nav-tabs.md-tabs.tab-timeline li a {

            padding: 10px;

            color: #666666 !important;

            font-size: 18px;

        }

        .nav-tabs.md-tabs.tab-timeline li a:hover {
            color: #666666 !important;
        }



        .social-timeline-left {

            position: absolute;

            /* top: -200px; */

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

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">



</head>



<body class="bg-light">

    <?php include 'Users/navbar.php'; ?>


    <div class="container">

        <div class="row">
            <div class="col-sm-2">

                <div id="sidebar" class="pr-2">
                    <?php include 'Users/left-sidebar.php'; ?>


                </div>

            </div>

            <div class="col-sm-10">

                <div>

                    <div class="content social-timeline">

                        <div class="">



                            <div class="row">

                                <div class="col-md-12">

                                    <div class="social-wallpaper">

                                        <img src="<?php echo base_url('userUploads/' . $hospitalDet['cover_pic']) ?>" class="img-fuild" width="920px" height="300px"></img>

                                        <!-- <div class="profile-hvr">

                                        <i class="fas fa-edit pr-5"></i>

                                        <i class="fas fa-trash"></i>

                                    </div> -->


                                    </div>




                                </div>

                            </div>



                            <div class="row">

                                <div class="col-12 col-sm-3">

                                    <div class="social-timeline-left">

                                        <!--******************************FIRST ROW************************************-->

                                        <div class="card one  bg-light" style="width:230px;">

                                            <div class="social-profile">

                                                <?php if ($hospitalDet['logo'] !== '') : ?>


                                                    <img class="img-fluid width-100" src="<?php echo base_url('userUploads/' . $hospitalDet['logo']) ?>" style="width:300px;height:200px" alt="">

                                                <?php else : echo "IMG not found" ?>
                                                <?php endif; ?>

                                            </div>

                                            <div class="card-block social-follower">

                                                <h4><?php echo $hospitalDet['hos_name'] ?></h4>

                                                <div class="row follower-counter">

                                                    <div class="col-4">

                                                        <button class="btn btn-primary btn-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="485">

                                                            <i class="fas fa-user"></i>

                                                        </button>

                                                    </div>

                                                    <div class="col-4">

                                                        <button class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="2k">

                                                            <i class="fas fa-heart"></i>

                                                        </button>

                                                    </div>

                                                    <div class="col-4">

                                                        <button class="btn btn-success btn-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="90">

                                                            <i class="fa fa-eye"></i>

                                                        </button>

                                                    </div>

                                                </div>

                                                <div class="">

                                                    <button type="button" class="btn btn-outline-primary waves-effect btn-block"><i class="fas fa-user m-r-10"></i>&nbsp;Follow</button>

                                                </div>

                                            </div>

                                        </div>



                                        <!--****************************************FIRST ROW ENDS*************************************-->

                                        <!--****************************************SECOND ROW START**********************************-->







                                        <!--**********************************************SECOND ROW ENDS**********************************************-->

                                        <!--**********************************************THIRD ROW START*********************************************-->



                                        <div class="card three" style="width:230px;">

                                            <div class="card-header">

                                                <h5 class="card-header-text d-inline-block">Contributors</h5>

                                            </div>

                                            <div class="card-block friend-box">

                                                <!-- <?php if (($reviews)) : ?>
                                                    <?php foreach ($reviews as $x) : ?>

                                                        <img class="media-object img-radius" src="<?php echo $x['picture'] ?>" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="user image">

                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <img src="<?php echo base_url('images/avatar.png') ?>" style="width:70px" />
                                                <?php endif; ?>
                                                <?php foreach ($consultData as $x) : ?>

                                                    <img class="media-object img-radius" src="<?php echo $x['picture'] ?>" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="user image">

                                                <?php endforeach; ?> -->

                                                <br>

                                            </div>



                                        </div>



                                        <!--********************************************************THIRD ROW ENDS*********************************************-->

                                    </div>



                                </div>

                                <div class="col-12 col-sm-9">


                                    <div class="card social-tabs">


                                        <ul class="nav nav-pills mt-1" id="pills-tab" role="tablist" style="gap: 50px;">
                                            <li class="nav-item" role="presentation" style="gap:5px">
                                                <a class="nav-link active  btn-rev" style="border:none;width:120px;background:none;" id="pills-timeline-tab" data-toggle="pill" data-target="#pills-timeline" type="a" role="tab" style="color: black;" aria-controls="pills-timeline" aria-selected="true"><span style='color: black;cursur:pointer'>Timeline</span></a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link btn-rev" style="border: none;width:120px;background:none" id="pills-about-tab" data-toggle="pill" data-target="#pills-about" type="a" role="tab" aria-controls="pills-about" aria-selected="true"><span style="color: black;">About</span></a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link btn-rev " style="border: none;width:120px;background:none" id="pills-review-tab" data-toggle="pill" data-target="#pills-review" type="a" role="tab" aria-controls="pills-review" aria-selected="true"><span style="color: black;">Reviews</span></a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link btn-rev " style="border: none;width:120px;background:none" id="pills-doctors-tab" data-toggle="pill" data-target="#pills-doctors" type="a" role="tab" aria-controls="pills-doctors" aria-selected="true"><span style="color: black;">Doctors</span></a>
                                            </li>

                                            <!-- <li class="nav-item" role="presentation">
                                                <a class="nav-link btn-rev " style="border: none;width:120px;background:none" id="pills-consult-tab" data-toggle="pill" data-target="#pills-consult" type="a" role="tab" aria-controls="pills-consult" aria-selected="true"><span style="color: black;">Consult</span></a>
                                            </li> -->

                                        </ul>

                                    </div>



                                    <div class="tab-content">

                                        <div class="tab-pane fade show active" id="pills-timeline" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                            <div class="tab-pane  scrollable" id="timeline">

                                                <div class="row">

                                                    <div class="col-sm-12">


                                                        <div class="social-timeline">



                                                            <div class="row timeline-right">



                                                                <div class="col-12 col-sm-12 col-xl-12">
                                                                    <?php if ($hospitalPost !== '') : ?>

                                                                        <?php foreach ($hospitalPost as $x) : ?>

                                                                            <div class="card">

                                                                                <div class="card-block post-timelines">

                                                                                    <div class="chat-header f-w-600 mr-2" style="float:left">

                                                                                        <img class="img-radius timeline-icon" src="<?php echo base_url('userUploads/' . $hospitalDet['logo']) ?>" alt="">

                                                                                    </div>



                                                                                    <div class="chat-header f-w-600"><?php echo $hospitalDet['hos_name'] ?> added new <?php echo $x['post_title'] ?></div>

                                                                                    <div class="social-time text-muted"><?php echo $x['post_time'] ?></div>

                                                                                </div>

                                                                                <img src="<?php echo base_url('userUploads/' . $x['image']) ?>" class="img-fluid width-50" alt="">

                                                                                <div class="card-block">

                                                                                    <div class="timeline-details">

                                                                                        <p class="text-muted mb-0 pb-0"><?php echo $x['post_content'] ?></p>

                                                                                    </div>

                                                                                </div>

                                                                                <div class="pb-3 ml-5 row">

                                                                                    <div class="col-sm-8"> <i class="fas fa-heart text-muted "> </i> <span class="b-r-muted"> Like (<?php echo $x['like_count'] ?>)</span> </div>




                                                                                    <div class='col-sm-4'><i class="fas fa-share text-muted"></i> <span>Share (<?php echo $x['share_count'] ?>)</span></div>

                                                                                </div>



                                                                            </div>
                                                                        <?php endforeach; ?>



                                                                    <?php else : echo "No Timeline Posted" ?>

                                                                    <?php endif; ?>



                                                                </div>

                                                            </div>

                                                        </div>


                                                    </div>

                                                </div>



                                            </div>

                                        </div>

                                        <div class="tab-pane fade" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">
                                            <div class="tab-pane" id="about">

                                                <div class="row">

                                                    <div class="col-sm-12">

                                                        <div class="card">

                                                            <div class="card-header">

                                                                <h5 class="card-header-text">Overview</h5>

                                                                <!-- <a id="edit-btn" type="button" class="btn btn-primary waves-effect waves-light f-right">

                    <i class="icofont icofont-edit"></i>

                </button> -->

                                                            </div>

                                                            <div class="card-block">

                                                                <div id="view-info" class="row">

                                                                    <div class="col-lg-12 col-md-12">

                                                                        <p><?php echo $hospitalDet['about'] ?></p>

                                                                    </div>

                                                                </div>



                                                            </div>

                                                        </div>

                                                    </div>



                                                    <div class="col-sm-12">

                                                        <div class="card">

                                                            <div class="card-header">

                                                                <h5 class="card-header-text">Contact Information</h5>



                                                            </div>

                                                            <div class="card-block">

                                                                <div id="contact-info" class="row">

                                                                    <div class="col-lg-12 col-md-12">

                                                                        <table class="table table-responsive m-b-0">

                                                                            <tbody>

                                                                                <tr>

                                                                                    <th class="social-label b-none p-t-0">Phone</th>

                                                                                    <td class="social-user-name b-none p-t-0 text-muted"><?php echo $hospitalDet['phone'] ?></td>

                                                                                </tr>

                                                                                <tr>

                                                                                    <th class="social-label b-none">Email</th>

                                                                                    <td class="social-user-name b-none text-muted"><?php echo $hospitalDet['email_id'] ?></td>

                                                                                </tr>

                                                                                <tr>

                                                                                    <th class="social-label b-none">Address</th>

                                                                                    <td class="social-user-name b-none text-muted"><?php echo $hospitalDet['city'] . ', ' . $hospitalDet['district'] . ', ' . $hospitalDet['state'] . ', ' . $hospitalDet['zip'] ?></td>

                                                                                </tr>

                                                                            </tbody>

                                                                        </table>

                                                                    </div>

                                                                </div>

                                                                <div id="edit-contact-info" class="row" style="display: none;">

                                                                    <div class="col-lg-12 col-md-12">

                                                                        <form>

                                                                            <div class="input-group">

                                                                                <input type="text" class="form-control" placeholder="Mobile number">

                                                                            </div>

                                                                            <div class="input-group">

                                                                                <input type="text" class="form-control" placeholder="Email address">

                                                                            </div>

                                                                            <div class="input-group">

                                                                                <input type="text" class="form-control" placeholder="Twitter id">

                                                                            </div>

                                                                            <div class="input-group">

                                                                                <input type="text" class="form-control" placeholder="Skype id">

                                                                            </div>

                                                                            <div class="text-center m-t-20">

                                                                                <a href="javascript:;" id="contact-save" class="btn btn-primary waves-effect waves-light m-r-20">Save</a>

                                                                                <a href="javascript:;" id="contact-cancel" class="btn btn-default waves-effect waves-light">Cancel</a>

                                                                            </div>

                                                                        </form>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>





                                                </div>

                                            </div>


                                        </div>

                                        <!-- ............................consult section..............................        -->

                                        <div class="tab-pane fade " id="pills-consult" role="tabpanel" aria-labelledby="pills-consult-tab">
                                            <div class="tab-pane " id="">
                                                <div class="row">
                                                    <div class="col-12 col-sm-12">
                                                        <?php foreach ($consultData as $x) : ?>

                                                            <div class="card" style="width: 100%;">

                                                                <div class="card-body">

                                                                    <div class="row">

                                                                        <div class="col-4 col-sm-2"><img src="<?php echo $x['picture'] ?>" class="rounded-circle" style="width:60px; height:60px; padding: 5px;"></div>

                                                                        <div class="col col-sm">

                                                                            <h5 class="card-title"><?php echo $x['consult_title'] ?></h5>z

                                                                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $x['name'] ?></h6>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col-12 col-sm-2">

                                                                        </div>

                                                                        <div class="col-12 col-sm-10">

                                                                            <p class="card-text"><?php echo $x['consult_query'] ?></p>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        <?php endforeach; ?>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <!-- ....................end consult-Section..........................................   -->




                                        <!-- ..................doctor section ....................... -->

                                        <div class="tab-pane fade " id="pills-doctors" role="tabpanel" aria-labelledby="pills-doctors-tab">

                                            <div class="tab-pane scrollable" id="doctors">

                                                <div class="row">

                                                    <?php foreach ($assocDoc as $x) : ?>

                                                        <div class="col-lg-12 col-xl-6 doc">

                                                            <div class="card doc-card">

                                                                <div class="card-block post-timelines">



                                                                    <div class="media bg-white d-flex">

                                                                        <div class="media-left media-middle">

                                                                            <a href="#">

                                                                                <img class="media-object img-thumbnail rounded-square" width="120" src="<?php echo $x['picture'] ?>" alt="">

                                                                            </a>

                                                                        </div>

                                                                        <div class="media-body friend-elipsis">

                                                                            <div class="f-15 f-bold m-b-5"><a href="<?php echo site_url('mainController/viewDoctor/' . $x['doc_id']) ?>"><?php echo $x['doc_name'] ?></a></div>

                                                                            <div class="text-muted social-designation"><?php echo $x['specialization'] ?></div>

                                                                            <div class=" mt-3"><strong class="text-danger"><?php echo round($x['star_rating'], 1) . ' out of 5 Ratings' ?></strong></div>

                                                                            <div id="rateYo<?php echo $x['doc_id'] ?>">

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
                                        <!-- .....................end doctorssection...................... -->


                                        <!-- <*************REVIEW*****************-->
                                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">

                                            <div class="tab-pane scrollable" id="reviews">

                                                <?php if (isset($reviews) && $reviews !== '') : ?>
                                                    <?php $star5 = 0;

                                                    $star4 = 0;

                                                    $star3 = 0;

                                                    $star2 = 0;

                                                    $star1 = 0;
                                                    if (isset($reviews)) {

                                                        foreach ($reviews as $x) {
                                                            //    echo"<pre>";print_r($reviews);

                                                            if ($x['star_rating'] == 5) {

                                                                $star5 = $star5 + 1;
                                                                // echo"<pre>";print_r($star5);die;
                                                            } else if ($x['star_rating'] >= 4) {

                                                                $star4 = $star4 + 1;
                                                                // echo"<pre>";print_r($star4);die;
                                                            } else if ($x['star_rating'] >= 3) {

                                                                $star3 = $star3 + 1;
                                                            } else if ($x['star_rating'] >= 2) {

                                                                $star2 = $star2 + 1;
                                                            } else if ($x['star_rating'] >= 1) {

                                                                $star1 = $star1 + 1;
                                                            }
                                                        }
                                                    }

                                                    $totalReviews = $star1 + $star2 + $star3 + $star4 + $star5;

                                                    $totalRatings = $star1 + ($star2 * 2) + ($star3 * 3) + ($star4 * 4) + ($star5 * 5);

                                                    $avgRating = round($totalRatings / $totalReviews, 1);
                                                    // echo"<pre>";print_r($avgRating);die;
                                                    ?>

                                                    <div class="row">

                                                        <div class="col-12 col-sm">

                                                            <!--******first part start*******-->

                                                            <div class="card">

                                                                <div class="card-body">

                                                                    <h4 class="text-center"><strong>Rating Distribution</strong></h4>

                                                                    <br>

                                                                    <!--*************START************-->

                                                                    <div class="d-flex justify-content-between">

                                                                        <h6>Excellent</h6>

                                                                        <div class="">

                                                                            <i class="fa fa-star text-warning"></i>

                                                                            <i class="fa fa-star text-warning"></i>

                                                                            <i class="fa fa-star text-warning"></i>

                                                                            <i class="fa fa-star text-warning"></i>

                                                                            <i class="fa fa-star text-warning"></i>

                                                                            <span><?php echo $star5 . ' Users' ?></span>

                                                                        </div>

                                                                    </div> <br>

                                                                    <div class="d-flex justify-content-between">

                                                                        <h6>Very Good</h6>

                                                                        <div>

                                                                            <i class="fa fa-star text-warning"></i>

                                                                            <i class="fa fa-star text-warning"></i>

                                                                            <i class="fa fa-star text-warning"></i>

                                                                            <i class="fa fa-star text-warning"></i>

                                                                            <span><?php echo $star4 . ' Users' ?></span>

                                                                        </div>

                                                                    </div> <br>

                                                                    <div class="d-flex justify-content-between">

                                                                        <h6>Good</h6>

                                                                        <div>

                                                                            <i class="fa fa-star text-warning"></i>

                                                                            <i class="fa fa-star text-warning"></i>

                                                                            <i class="fa fa-star text-warning"></i>

                                                                            <span><?php echo $star3 . ' Users' ?></span>

                                                                        </div>

                                                                    </div> <br>

                                                                    <div class="d-flex justify-content-between">

                                                                        <h6>Poor</h6>

                                                                        <div>

                                                                            <i class="fa fa-star text-warning"></i>

                                                                            <i class="fa fa-star text-warning"></i>

                                                                            <span><?php echo $star2 . ' Users' ?></span>

                                                                        </div>

                                                                    </div><br>

                                                                    <div class="d-flex justify-content-between">

                                                                        <h6>Very Poor</h6>

                                                                        <div>

                                                                            <i class="fa fa-star text-warning"></i>

                                                                            <span><?php echo $star1 . ' Users' ?></span>

                                                                        </div>

                                                                    </div>

                                                                    <!--**************END**************-->

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <!--******FIRST PART END*********-->

                                                        <!--**********second part**********-->

                                                        <div class="col-12 col-sm">

                                                            <div class="card">

                                                                <div class="card-body pb-0">

                                                                    <div class="d-flex justify-content-center">

                                                                        <h4><strong>Rating & Reviews</strong></h4>

                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col">

                                                                            <h3 style="text-align: center;"><strong><?php echo $avgRating ?></strong></h3>

                                                                            <p class="text-center"><?php echo $totalRatings ?> Rating & <?php echo $totalReviews ?> Reviews</p>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col">

                                                                            <div class="row justify-content-center">

                                                                                <div class="col">

                                                                                    <p>5 <i class="fa fa-star text-warning"></i></p>

                                                                                </div>

                                                                                <div class="col">

                                                                                    <div class="progress" style="height:10px; margin-top:10px;">

                                                                                        <div class="progress-bar bg-success" style="width:<?php echo ($star5 / 5) * 100 ?>%;"></div>

                                                                                    </div>

                                                                                </div>

                                                                                <div class="col">

                                                                                    <p class="text-right"><?php echo $star5 ?></p>

                                                                                </div>

                                                                            </div>

                                                                            <div class="row">

                                                                                <div class="col">

                                                                                    <p>4 <i class="fa fa-star text-warning"></i></p>

                                                                                </div>

                                                                                <div class="col">

                                                                                    <div class="progress" style="height:10px; margin-top:10px;">

                                                                                        <div class="progress-bar bg-success" style="width:<?php echo ($star4 / 5) * 100 ?>%;"></div>

                                                                                    </div>

                                                                                </div>

                                                                                <div class="col">

                                                                                    <p class="text-right"><?php echo $star4 ?></p>

                                                                                </div>

                                                                            </div>

                                                                            <div class="row">

                                                                                <div class="col">

                                                                                    <p>3 <i class="fa fa-star text-warning"></i></p>

                                                                                </div>

                                                                                <div class="col">

                                                                                    <div class="progress" style="height:10px; margin-top:10px;">

                                                                                        <div class="progress-bar bg-success" style="width:<?php echo ($star3 / 5) * 100 ?>%;"></div>

                                                                                    </div>

                                                                                </div>

                                                                                <div class="col">

                                                                                    <p class="text-right"><?php echo $star3 ?></p>

                                                                                </div>

                                                                            </div>

                                                                            <div class="row">

                                                                                <div class="col">

                                                                                    <p>2 <i class="fa fa-star text-warning"></i></p>

                                                                                </div>

                                                                                <div class="col">

                                                                                    <div class="progress" style="height:10px; margin-top:10px;">

                                                                                        <div class="progress-bar bg-warning" style="width:<?php echo ($star2 / 5) * 100 ?>%;"></div>

                                                                                    </div>

                                                                                </div>

                                                                                <div class="col">

                                                                                    <p class="text-right"><?php echo $star2 ?></p>

                                                                                </div>

                                                                            </div>

                                                                            <div class="row">

                                                                                <div class="col">

                                                                                    <p>1 <i class="fa fa-star text-warning"></i></p>

                                                                                </div>

                                                                                <div class="col">

                                                                                    <div class="progress" style="height:10px; margin-top:10px;">

                                                                                        <div class="progress-bar bg-danger" style="width:<?php echo ($star1 / 5) * 100 ?>%;"></div>

                                                                                    </div>

                                                                                </div>

                                                                                <div class="col">

                                                                                    <p class="text-right"><?php echo $star1 ?></p>

                                                                                </div>

                                                                            </div>

                                                                        </div>



                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <!--***********second part end***********-->

                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-12 col-sm">



                                                            <?php foreach ($reviews as $x) : ?>


                                                                <div class="card">

                                                                    <div class="card-body pb-0">

                                                                        <div class="media mb-0">

                                                                            <div class="row">

                                                                                <div class="col-sm-3 ">

                                                                                    <img src="<?php echo $x['document'] ?>" class="rounded-circle img-thumbnail" style="width:100px; height:100px; margin-left: 18px; margin-top: 10px;">

                                                                                    <!-- <p class="text-success pt-1 text-center"><small><?php echo $x['name'] ?></small></p>

            <p class="text-center"><small><?php echo $x['city'] . ', ' . $x['state'] ?></small></p> -->

                                                                                </div>

                                                                                <div class="col-sm">

                                                                                    <div class="media-body">

                                                                                        <h4 styles="text-align: center;"><?php echo $x['review_title'] ?></h4>

                                                                                        <div class="row">

                                                                                            <div class="col">

                                                                                                <div id="rateYo<?php echo $x['review_id'] ?>"></div>

                                                                                                <span class="pl-2 text-danger"><?php echo round($x['star_rating'], 1) . ' out of 5' ?><img src="<?php echo base_url('images/star.png') ?>" style="width:20px;"></span>

                                                                                            </div>

                                                                                            <div class="col">

                                                                                                <p><?php

                                                                                                    $date = date_create($x['datetime']);

                                                                                                    echo date_format($date, 'd/m/Y'); ?></p>

                                                                                            </div>

                                                                                        </div>

                                                                                        <p class="wwdtext pt-2"><?php echo $x['review_content'] ?></p>

                                                                                        <!-- <div class="row">

                    <div class="col">

                        <i class="far fa-grin"></i>

                        <span><a href="#">Like 0</a></span>

                    </div>

                    <div class="col">

                        <i class="far fa-comments"></i>

                        <span><a href="#">Comments 0</a></span>

                    </div>

                    <div class="col">

                        <i class="fas fa-share-alt-square"></i>

                        <span><a href="#">Share 0</a></span>

                    </div>

                    <div class="col">

                        <i class="fas fa-reply-all"></i>

                        <span><a href="#">Reply as  a brand</a></span>

                    </div>

                </div> -->

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <br>

                                                                    </div>

                                                                </div>

                                                            <?php endforeach; ?>

                                                        <?php else : echo "No Reviews" ?>
                                                        <?php endif; ?>


                                                        </div>



                                                    </div>



                                                    <!--************third part***************-->



                                                    <!--***********third psrt end************-->

                                            </div>

                                        </div>

                                        <!-- 
                                        <div class="tab-pane" id="photos">

                                            <div class="card">



                                                <div class="card-block">

                                                    <div class="demo-gallery">

                                                        <ul id="profile-lightgallery" class="row">

                                                            <li class="col-md-4 col-lg-2 col-sm-6 col-xs-12">

                                                                <a href="#" data-toggle="lightbox" data-title="A random title" data-footer="A custom footer text">

                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-fluid" alt="">

                                                                </a>

                                                            </li>

                                                            <li class="col-md-4 col-lg-2 col-sm-6 col-xs-12">

                                                                <a href="#" data-toggle="lightbox" data-title="A random title" data-footer="A custom footer text">

                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-fluid" alt="">

                                                                </a>

                                                            </li>

                                                            <li class="col-md-4 col-lg-2 col-sm-6 col-xs-12">

                                                                <a href="#" data-toggle="lightbox" data-title="A random title" data-footer="A custom footer text">

                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="img-fluid" alt="">

                                                                </a>

                                                            </li>

                                                            <li class="col-md-4 col-lg-2 col-sm-6 col-xs-12">

                                                                <a href="#" data-toggle="lightbox" data-title="A random title" data-footer="A custom footer text">

                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="img-fluid" alt="">

                                                                </a>

                                                            </li>

                                                        </ul>

                                                    </div>

                                                </div>



                                            </div>

                                        </div> -->



                                        <!-- Consults -->



                                    </div>










                                    <script>
                                        $(function() {

                                            <?php foreach ($reviews as $x) : ?>

                                                $("#rateYo<?php echo $x['review_id'] ?>").rateYo({

                                                    rating: <?php echo $x['star_rating'] ?>,

                                                    readOnly: true,

                                                    starWidth: "20px",

                                                    spacing: "3px"

                                                });

                                            <?php endforeach; ?>

                                            <?php foreach ($assocDoc as $x) : ?>

                                                $("#rateYo<?php echo $x['doc_id'] ?>").rateYo({

                                                    rating: <?php echo $x['star_rating'] ?>,

                                                    readOnly: true,

                                                    starWidth: "20px",

                                                    spacing: "3px"

                                                });

                                            <?php endforeach; ?>

                                        });
                                    </script>

                                    <!-- Latest compiled and minified CSS -->

                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

                                    <!-- Latest compiled and minified JavaScript -->

                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

                                    <!-- <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script> -->

                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


                                    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
                                    <script>
                                        AOS.init({
                                            offset: 130,
                                            duration: 1000,
                                        });
                                    </script>



                                    <script>
                                        $(document).ready(function() {



                                            var defaults = {

                                                containerID: 'toTop', // fading element id

                                                containerHoverID: 'toTopHover', // fading element hover id

                                                scrollSpeed: 1200,

                                                easingType: 'linear'

                                            };



                                            $().UItoTop({

                                                easingType: 'easeOutQuart'

                                            });



                                        });
                                    </script>





                                    <script>
                                        var myDiv = $('.wwdtext');

                                        myDiv.text(myDiv.text().substring(0, 200));
                                    </script>





                                    </script>





</body>

</html>