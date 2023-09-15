<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->

    <!--  All snippets are MIT license http://bootdey.com/license -->

    <title>AAHRS | Doctor Profile</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">

<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">

<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css"> -->

    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>

    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>



    <style type="text/css">
        body {

            background-color: #f3f6f8;

            margin-top: 10px;

        }

        .thumb-lg {

            height: 88px;

            width: 88px;

        }

        .profile-user-box {

            position: relative;

            border-radius: 5px;

        }

        .bg-custom {

            background-color: #02c0ce !important;

        }

        .profile-user-box {

            position: relative;

            border-radius: 5px;

        }



        .card-box {

            padding: 10px;

            border-radius: 3px;

            margin-bottom: 10px;

            background-color: #fff;

        }

        .inbox-widget .inbox-item img {

            width: 40px;

        }

        .text-mahagony {

            color: #7c0a02 !important;

        }

        .inbox-widget .inbox-item {

            border-bottom: 1px solid #f3f6f8;

            overflow: hidden;

            padding: 10px 0;

            position: relative
        }



        .inbox-widget .inbox-item .inbox-item-img {

            display: block;

            float: left;

            margin-right: 15px;

            width: 40px
        }



        .inbox-widget .inbox-item img {

            width: 40px
        }



        .inbox-widget .inbox-item .inbox-item-author {

            color: #313a46;

            display: block;

            margin: 0
        }



        .inbox-widget .inbox-item .inbox-item-text {

            color: #98a6ad;

            display: block;

            font-size: 14px;

            margin: 0
        }



        .inbox-widget .inbox-item .inbox-item-date {

            color: #98a6ad;

            font-size: 11px;

            position: absolute;

            right: 7px;

            top: 12px
        }



        .comment-list .comment-box-item {

            position: relative
        }



        .comment-list .comment-box-item .commnet-item-date {

            color: #98a6ad;

            font-size: 11px;

            position: absolute;

            right: 7px;

            top: 2px
        }



        .comment-list .comment-box-item .commnet-item-msg {

            color: #313a46;

            display: block;

            margin: 10px 0;

            font-weight: 400;

            font-size: 15px;

            line-height: 24px
        }



        .comment-list .comment-box-item .commnet-item-user {

            color: #98a6ad;

            display: block;

            font-size: 14px;

            margin: 0
        }



        .comment-list a+a {

            margin-top: 15px;

            display: block
        }



        .ribbon-box .ribbon-primary {

            background: #cc5500;

        }



        .ribbon-box .ribbon {

            position: relative;

            float: left;

            clear: both;

            padding: 5px 12px 5px 12px;

            margin-left: -30px;

            margin-bottom: 15px;

            font-family: Rubik, sans-serif;

            -webkit-box-shadow: 2px 5px 10px rgba(49, 58, 70, .15);

            -o-box-shadow: 2px 5px 10px rgba(49, 58, 70, .15);

            box-shadow: 2px 5px 10px rgba(49, 58, 70, .15);

            color: #fff;

            font-size: 13px;

        }

        .text-custom {

            color: #02c0ce !important;

        }



        .badge-custom {

            background: #02c0ce;

            color: #fff;

        }

        .badge {

            font-family: Rubik, sans-serif;

            -webkit-box-shadow: 0 0 24px 0 rgba(0, 0, 0, .06), 0 1px 0 0 rgba(0, 0, 0, .02);

            box-shadow: 0 0 24px 0 rgba(0, 0, 0, .06), 0 1px 0 0 rgba(0, 0, 0, .02);

            padding: .35em .5em;

            font-weight: 500;

        }

        .text-muted {

            color: #98a6ad !important;

        }



        .font-13 {

            font-size: 13px !important;

        }



        body {

            overflow-x: hidden;

        }



        .container-fluid {

            background-image: linear-gradient(to right, #7B1FA2, #E91E63)
        }



        .sm-text {

            font-size: 10px;

            letter-spacing: 1px
        }



        .sm-text-1 {

            font-size: 14px
        }



        .green-tab {

            background-color: #00C853;

            color: #fff;

            border-radius: 5px;

            padding: 5px 3px 5px 3px
        }



        .btn-red {

            background-color: #E64A19;

            color: #fff;

            border-radius: 20px;

            border: none;

            outline: none
        }



        .btn-red:hover {

            background-color: #BF360C
        }



        .btn-red:focus {

            -moz-box-shadow: none !important;

            -webkit-box-shadow: none !important;

            box-shadow: none !important;

            outline-width: 0
        }



        .round-icon {

            font-size: 40px;

            padding-bottom: 10px
        }



        .fa-circle {

            font-size: 10px;

            color: #EEEEEF
        }



        .green-dot {

            color: #4CAF50
        }



        .red-dot {

            color: #E64A19
        }



        .yellow-dot {

            color: #FFD54F
        }



        .grey-text {

            color: #BDBDBD
        }



        .green-text {

            color: #4CAF50
        }

        .scrollable {

            height: 800px;

            overflow: scroll;

        }

        .scrollable::-webkit-scrollbar {

            display: none;

        }

        .block {

            border-right: 1px solid #F5EEEE;

            border-top: 1px solid #F5EEEE;

            border-bottom: 1px solid #F5EEEE
        }



        .profile-pic img {

            border-radius: 50%
        }



        .rating-dot {

            letter-spacing: 5px
        }



        .via {

            border-radius: 20px;

            height: 28px
        }





        .ratings {

            background-color: #fff;

            padding: 54px;

            border: 1px solid rgba(0, 0, 0, 0.1);

            box-shadow: 0px 10px 10px #E0E0E0
        }



        .product-rating {

            font-size: 20px
        }



        .stars i {

            font-size: 18px;

            color: #28a745
        }



        .rating-text {

            margin-top: 10px
        }

        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

        .bg-lgreen {

            background-color: #90ee90 !important;

        }

        body {

            margin: 0;

            font-family: 'Open Sans', serif;

            background: #eee
        }
    </style>

</head>



<body>



    <div class="content">

        <?php include 'Users/navbar.php'; ?>

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-sm-2">

                    <?php include 'Users/left-sidebar.php'; ?>
                </div>


                <div class="col-sm-10">

                    <!-- meta -->

                    <div class="profile-user-box card-box bg-flor">

                        <div class="row">

                            <div class="col-sm-6"><span class="float-left mr-3"><img src="<?php echo $doctorData['picture'] ?>" alt="" class="thumb-lg rounded-circle"></span>

                                <div class="media-body text-white">

                                    <h4 class="mt-1 mb-1 font-18"><?php echo $doctorData['doc_name'] ?></h4>

                                    <p class="font-13 text-light"><?php echo $doctorData['specialization'] ?></p>

                                    <p class="text-light mb-0"><?php echo $doctorData['city'] . ', ' . $doctorData['state'] . ', ' . $doctorData['country'] ?></p>

                                </div>

                                <button type="button" class="ribbon ribbon-white" style="background:white;border:none;border-radius:4px" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Consult</button>

                            </div>

                            <!-- <div class="col-sm-6">

                            <div class="text-right">

                                <button type="button" class="btn btn-light waves-effect"><i class="mdi mdi-account-settings-variant mr-1"></i> Edit Profile</button>

                            </div>

                        </div> -->

                        </div>

                    </div>

                    <!--/ meta -->

                    <div class="row">

                        <div class="col-sm-4">

                            <!-- Personal-Information -->

                            <div class="card-box  bg-light">

                                <h4 class="header-title text-mahagony mt-0">Professional Experience</h4>

                                <div class="panel-body">

                                    <p class="text-muted font-13"><?php echo $doctorData['experience'] ?></p>

                                    <hr>

                                    <div class="text-left">

                                        <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15"><?php echo $doctorData['doc_name'] ?></span></p>

                                        <!-- <p class="text-muted font-13"><strong>Mobile :</strong> <span class="m-l-15"><?php echo $doctorData['phone'] ?></span></p>

                            <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15"><?php echo $doctorData['email_id'] ?></span></p> -->

                                        <p class="text-muted font-13"><strong>Location :</strong> <span class="m-l-15"><?php echo $doctorData['state'] . ', ' . $doctorData['country'] ?></span></p>

                                        <!-- <p class="text-muted font-13"><strong>Languages :</strong> <span class="m-l-5">

                            <span class="flag-icon flag-icon-us m-r-5 m-t-0" title="us"></span><span>English</span> </span>

                            <span class="m-l-5">

                            <span class="flag-icon flag-icon-fr m-r-5" title="fr"></span> <span>Hindi</span></span>

                            </p> -->

                                    </div>

                                    <ul class="social-links list-inline mt-4 mb-0">

                                        <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>

                                        <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>

                                        <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>

                                    </ul>

                                </div>

                            </div>

                            <!-- Personal-Information -->

                            <div class="card-box ribbon-box  bg-light">

                                <div class="clearfix"></div>

                                <div class="inbox-widget">


                                </div>

                            </div>

                        </div>

                        <div class="col-sm-8 scrollable">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="card-box tilebox-one bg-light">
                                        <h6 class="text-muted text-uppercase mt-0"><strong>Consult</strong></h6>

                                        <div class="inbox-widget">

                                            <?php foreach ($consultData as $x) : ?>

                                                <span>

                                                    <div class="inbox-item">

                                                        <div class="inbox-item-img"><img src="<?php echo $x['picture'] ?>" class="rounded-circle" style="height: 50px;width:50px;" alt=""></div>

                                                        <p class="inbox-item-author"><?php echo $x['name'] ?></p>

                                                        <p class="inbox-item-text"><?php echo $x['consult_title'] ?></p>

                                                        <p class="inbox-item-date">


                                                            <a href="<?php echo site_url('mainController/docConsult/' . $x['id']) ?>" class="btn btn-success ml-5">View</a>





                                                        </p>

                                                    </div>

                                                </span>

                                            <?php endforeach; ?>

                                        </div>

                                    </div>

                                </div>

                                <!-- end col -->



                                <!-- end col -->

                                <?php

                                $reviewCount = 0;

                                $reviewStar = 0;

                                $starCount = 0;

                                $positiveStar = 0;

                                foreach ($reviewData as $x) {

                                    $reviewCount = $reviewCount + 1;

                                    if ($x['star_rating']) {

                                        $reviewStar = $reviewStar + 1;

                                        if ($x['star_rating'] >= 3) {

                                            $positiveStar = $positiveStar + 1;

                                            $starCount = $starCount + $x['star_rating'];
                                        } else {

                                            $starCount = $starCount + $x['star_rating'];
                                        }
                                    }
                                }

                                if (isset($positiveReview)) {
                                    $positiveReview = round(($positiveStar / $reviewStar) * 100, 1);
                                    $avgReview = round($starCount / $reviewStar, 1);
                                }

                                ?>

                                <div class="col-sm-6">

                                    <div class="card-box tilebox-one bg-light">

                                        <h6 class="text-muted text-uppercase mt-0"><strong>Reviews</strong></h6>

                                     
                                <?php foreach ($reviewData as $x) : ?>

<div class="pb-0 review p-3 m-3 mt-1 mb-0 " >

    <div class="row d-flex">

        <?php if ($x['picture'] !== '') : ?>

            <div class="profile-pic"><img src="<?php echo $x['picture'] ?>" width="60px" height="60px"></div>


        <?php else : ?>
            <div class="profile-pic"><img src="<?php echo base_url('images/avatar.png') ?>" style="border-radius:20px;width:50px;height:50px" /></div>

        <?php endif; ?>
        <div class="d-flex flex-column pl-3">

            <h5><?php echo $x['name'] ?></h5>
            <p class="grey-text"><?php $date = date_create($x['datetime']);

                                    echo date_format($date, 'd/m/Y'); ?></p>

        </div>

    </div>

    <div class="float-right">

        <div id="rateYo<?php echo $x['review_id'] ?>"></div>



        <div class="green-text">

            <span class="product-rating mb-0 pl-3"><?php echo $x['star_rating'] ?> out of 5</span>

        </div>

    </div>

    <div class="row pb-0 mb-0">

        <h6 class="text-info"><?php echo $x['review_title'] ?></h6>

        <p class="mb-0"><?php echo $x['review_content'] ?></p>

    </div>



</div>

<?php endforeach; ?>


                                    </div>

                                </div>

                                <!-- end col -->

                            </div>

                            <!-- end row -->

                            <div class="card-box bg-light">

                                <h4 class="header-title text-mahagony mt-0 mb-3"></h4>

                                <div class="">

                                    <?php foreach ($expData as $x) : ?>

                                        <div class="">

                                            <h5 class="text-info"><?php echo $x['exp_title'] ?></h5>

                                            <p class="mb-0"><?php echo $x['hos_name'] ?></p>

                                            <p><b><?php echo $x['exp_duration'] ?></b></p>

                                            <p class="text-muted font-13 mb-0"><?php echo $x['exp_message'] ?></p>

                                        </div>

                                        <hr>

                                    <?php endforeach; ?>

                                </div>

                            </div>

                            <div class="card-box bg-light p-3">

                                <div class="d-flex row justify-content-between p-2 bg-light">


                                    <div class="bg-white col-3 p-2 text-muted">
                                        <!-- 
                            <p class="sm-text mb-0">ALL REVIEWS</p>

                            <h4><?php echo $reviewCount ?></h4> -->

                                    </div>


                                </div>


                            </div>

                        </div>

                        <!-- end col -->

                    </div>

                </div>

            </div>

            <!-- end row -->



            <!-- end row -->

        </div>

        <!-- container -->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Consultation Form</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <form method="post" action="<?php echo site_url('mainController/addConsultaion') ?>">

                            <div class="form-group">

                                <label for="recipient-name" class="col-form-label">Title :</label>

                                <input type="text" class="form-control" id="title" name="title">

                                <input type="hidden" name="doc_id" value="<?php echo $this->uri->segment(3) ?>">

                            </div>

                            <div class="form-group">

                                <label for="message-text" class="col-form-label">Query :</label>

                                <textarea class="form-control" id="query" name="query"></textarea>

                            </div>



                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-danger">Send message</button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>





    <script>
        $(function() {

            <?php foreach ($reviewData as $x) : ?>

                $("#rateYo<?php echo $x['review_id'] ?>").rateYo({

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

    <script src="http://netdna.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



</body>

</html>