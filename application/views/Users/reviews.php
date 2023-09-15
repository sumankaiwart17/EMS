<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssUser/style.css') ?>">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <title>AAHRS | Reviews</title>

    <style>
        #rysm {

            margin-bottom: 10px;

        }


        .desk-bar {
            padding: 15px 0px;
            justify-content: space-between !important;

        }

        .fa-lg {
            font-size: 1rem !important;
        }

        .icons {
            color: #d21818 !important;
        }

        @media only screen and (max-width: 991.98px) {

            .mob-bar {
                display: inherit;
                width: 100%;
                padding-bottom: 20px;
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

    <div class="container mt-2 mb-4">

        <div class="row mb-5">

            <!-- left Bar -->

            <?php include('left-sidebar.php'); ?>

            <!-- Reviews -->
         
            <div class="col-sm-12 col-lg-8 bg-body mb-3 revData" data-aos="fade-up">
            <input type="text" name="" id="searchrev" class="form-control" placeholder="search review ">
                <?php if (isset($_SESSION['book_status'])) {

                       if ($_SESSION['book_status'] != 0) {

                           echo $alert;

                           unset($_SESSION['book_status']);
                       }
                   }

                   ?>

                <?php

                   if (isset($_SESSION['review_posted'])) {

                       if ($_SESSION['review_posted']) {

                   ?>

                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                            <strong>Hola!</strong>Review Posted.

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                <span aria-hidden="true">&times;</span>

                            </button>

                        </div>

                    <?php

                       } elseif (!$_SESSION['review_posted']) {

                       ?>

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">

                            <strong>Sorry!</strong>not showing!

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                <span aria-hidden="true">&times;</span>

                            </button>

                        </div>

                <?php

                       }
                   }

                   unset($_SESSION['review_posted']);

                   ?>




                <?php if (isset($reviews)) : ?>
                    <?php  //echo"<pre>";
                       // print_r($reviews);
                       // echo"</pre>";
                       // die;
                       ?>
                    <?php
                       $count = 0;

                       foreach ($reviews as $x) :

                           $count += 1; ?>

                        <?php if ($x['star_rating'] != '') :  ?>

                            <div class="card card-body mt-2 mb-0 pb-2"  id="FindDoctors">

                                <div class="row">

                                    <div class="col-12">

                                        <?php if (isset($reviews) && $x['picture'] == '') : ?>
                                            <img src="<?php echo base_url('images/avatar.png') ?>" class="img-thumbnail ml-3 mr-3 float-left rounded-circle" style="height: 70px; width:70px;" />

                                        <?php else : ?>

                                            <img src="<?php echo $x['picture'] ?>" class="img-thumbnail ml-3 mr-3 float-left rounded-circle" style="height: 70px; width:70px;" alt="">

                                        <?php endif; ?>


                                        <h5 class="pt-2"><a href="<?php echo site_url('userProfile_Controller/myaccount?id=' . $x['email_id'] . '') ?>"><?php echo $x['name'] ?></a>

                                            reviewed

                                            <?php if (isset($x['doc_name'])) : ?>

                                                <a href=""><strong class="rev-sub"><?php echo 'Dr. ' . $x['doc_name'] ?> </strong></a>

                                            <?php elseif (isset($x['hos_name']) && isset($x['dept_name'])) : ?>

                                                <a href=""><strong class="rev-sub"><?php echo $x['dept_name'] . ' dept, ' . $x['hos_name'] ?></strong></a>

                                            <?php elseif (isset($x['hos_name']) && isset($x['treat_name'])) : ?>

                                                <a href=""><strong class="rev-sub"><?php echo $x['hos_name'] . ' , ' . $x['treat_name']; ?>

                                                    </strong></a>

                                            <?php elseif (isset($x['hos_name'])) : ?>

                                                <a href=""><strong class="rev-sub"><?php echo $x['hos_name'] ?> </strong></a>

                                            <?php endif; ?><br>

                                            <small style="font-size:13px;"><?php $date = date_create($x['datetime']);

                                                                           echo date_format($date, 'd/m/y'); ?></small>

                                        </h5>

                                    </div>

                                </div>

                                <div class="row" id="card-body">

                                    <div class="col-9">

                                        <strong class="pl-2 mt-2 text-info" style="font-size: 15px; padding-left:15px"><?php echo $x['review_title'] ?></strong>

                                        <?php if (strlen($x['review_content']) >= 200) : ?>

                                            <p class="pl-2 pt-2 wwdtext">

                                            <div class="revbody"><?php echo substr($x['review_content'], 0, 200) ?><span data-toggle="modal" data-target="#exampleModalCenter<?= $count; ?>" style="cursor : pointer; padding:5px; font-weight:bold; color:#0096FF;"> ...show

                                                    more</span></div>

                                            </p>

                                        <?php else : ?>

                                            <p class="pl-2 pt-2 wwdtext">

                                            <div class="revbody"><?php echo $x['review_content'] ?><span data-toggle="modal" data-target="#exampleModalCenter<?= $count; ?>" style="cursor : pointer; padding:5px; font-weight:bold; color:#0096FF;"> ...show

                                                    star ratings</span></div>

                                            </p>

                                        <?php endif; ?>

                                    </div>



                                    <div class="col-3">

                                        <div class="mt-2">

                                            <h5 class="rate-text text-center"><?php echo $x['star_rating'] ?> out of 5</h5>

                                            <div class="row justify-content-center">

                                                <?php if (isset($x['doc_name'])) : ?>


                                                    

                                                                    <div class="rateYostardoc2<?= $x['review_id'] . $x['doc_id'] ?>">

                                                                    </div>

                                                                

                                                

                                                <?php elseif(isset($x['hos_name'])) : ?>
<div id="rysm" class="rateYostarhos2<?= $x['review_id'] . $x['hos_id'] ?>">

                                                                    </div>

                                                <?php endif; ?>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="row desk-bar">

                                    <div class="col-4 pl-5"><i class="fas fa-thumbs-up icons"></i>&nbsp;Like</div>



                                </div>

                                <div class="row mob-bar justify-content-center">

                                    <div class="col-4 pl-5"><i class="fas fa-thumbs-up icons"></i>&nbsp;</div>




                                </div>

                            </div>

                            <!-- Modal -->

                            <div class="modal fade" id="exampleModalCenter<?= $count; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <div class="modal-title" id="exampleModalLongTitle">



                                                <div class="row">

                                                    <div class="col-12">
                                                        <?php if ($x['picture'] !== '') : ?>
                                                            <img src="<?php echo $x['picture'] ?>" class="img-thumbnail ml-5 mr-3 float-left rounded-circle" style="height: 50px; width:70px;">

                                                        <?php else : ?>

                                                            <img src='<?php echo base_url('images/avatar.png') ?>' class="img-thumbnail ml-5 mr-3 float-left rounded-circle" style="height: 50px; width:70px;" />
                                                        <?php endif; ?>



                                                        <h5 class="pt-2"><a href=""><?php echo $x['name'] ?></a> reviewed

                                                            <?php if (isset($x['doc_name'])) : ?>

                                                                <a href=""><strong class="rev-sub"><?php echo 'Dr. ' . $x['doc_name'] ?>

                                                                    </strong></a>

                                                            <?php elseif (isset($x['hos_name']) && isset($x['treat_name'])) : ?>

                                                                <a href=""><strong class="rev-sub"><?php echo $x['hos_name'] . ' , ' . $x['treat_name'] ?>

                                                                    </strong></a>

                                                            <?php elseif (isset($x['hos_name']) && isset($x['dept_name'])) : ?>

                                                                <a href=""><strong class="rev-sub"><?php echo $x['dept_name'] . ' dept, ' . $x['hos_name'] ?></strong></a>

                                                            <?php elseif (isset($x['hos_name'])) : ?>

                                                                <a href=""><strong class="rev-sub"><?php echo $x['hos_name'] ?>

                                                                    </strong></a>

                                                            <?php endif; ?><br>

                                                            <small style="font-size:13px;"><?php $date = date_create($x['datetime']);

                                                                                           echo date_format($date, 'd/m/y'); ?></small>

                                                        </h5>

                                                    </div>

                                                </div>



                                            </div>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                <span aria-hidden="true">&times;</span>

                                            </button>

                                        </div>

                                        <div class="modal-body m-2">



                                            <div class="col" id="card-body">

                                                <div class="row justify-content-between">

                                                    <strong style="font-size: 25px;">

                                                        <p class="text-info"><?php echo $x['review_title'] ?></p>

                                                    </strong>

                                                    <div class="col-12 col-lg-3 alert alert-warning" style="height: 130px;">

                                                        <div class="mt-2">

                                                            <h5 class="text-center">Overall Rating:</h5>

                                                            <h5 class="text-center"><?php echo $x['star_rating'] ?> out of 5</h5>

                                                            <div class="row justify-content-center">

                                                                <?php if (isset($x['doc_name'])) : ?>

                                                                    <div class="rateYo<?php echo $x['review_id'] . $x['doc_id'] ?>">

                                                                    </div>

                                                                <?php elseif (isset($x['hos_name']) && isset($x['dept_name'])) : ?>

                                                                    <div class="rateYo<?php echo $x['review_id'] . $x['dept_id'] ?>">

                                                                    </div>

                                                                <?php elseif (isset($x['treat_name']) && isset($x['hos_name'])) : ?>

                                                                    <div class="rateYo<?php echo $x['review_id'] . $x['treat_id'] ?>">

                                                                    </div>

                                                                <?php elseif (isset($x['hos_name'])) : ?>

                                                                    <div class="rateYo<?php echo $x['review_id'] . $x['hos_id'] ?>">

                                                                    </div>

                                                                <?php endif; ?>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                                <p class="pl-2 pt-2 wwdtext">

                                                <div class="revbody" style="width:100%; word-break: break-all;">

                                                    <?php echo $x['review_content'] ?></div>

                                                </p>

                                            </div>



                                        </div>



                                        <hr>

                                        <div class="modal_footer m-2 ">

                                            <div class="row pr-3 pl-3">

                                                <?php if (isset($x['doc_name'])) : ?>

                                                    <div class="col m-2">

                                                        <div class="row justify-content-between alert alert-warning">

                                                            <div class="rating-desc">

                                                                <h5>Rating given for Promptness:</h5>

                                                            </div>

                                                            <div class="col">

                                                                <h5 class="text-center"><?php echo $x['star_rating_promptness'] ?> out

                                                                    of 5</h5>

                                                                <div class="row justify-content-center">

                                                                    <div id="rysm" class="rateYostardoc2<?= $x['review_id'] . $x['doc_id'] ?>">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="row justify-content-between alert alert-warning">

                                                            <div class="rating-desc">

                                                                <h5>Rating given for Bedside Manner:</h5>

                                                            </div>

                                                            <div class="col">

                                                                <h5 class="text-center"><?php echo $x['star_rating_bedside_manner'] ?>

                                                                    out of 5</h5>

                                                                <div class="row justify-content-center">

                                                                    <div id="rysm" class="rateYostardoc3<?= $x['review_id'] . $x['doc_id'] ?>">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col m-2">

                                                        <div class="row justify-content-between alert alert-warning">

                                                            <div class="rating-desc">

                                                                <h5>Rating given for On-time visit:</h5>

                                                            </div>

                                                            <div class="col">

                                                                <h5 class="text-center"><?php echo $x['star_rating_ontime'] ?> out of 5

                                                                </h5>

                                                                <div class="row justify-content-center">

                                                                    <div id="rysm" class="rateYostardoc4<?= $x['review_id'] . $x['doc_id'] ?>">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="row justify-content-between alert alert-warning">

                                                            <div class="rating-desc">

                                                                <h5>Rating given for Follow-up after treatment:</h5>

                                                            </div>

                                                            <div class="col">

                                                                <h5 class="text-center"><?php echo $x['star_rating_follow_up'] ?> out

                                                                    of 5</h5>

                                                                <div class="row justify-content-center">

                                                                    <div id="rysm" class="rateYostardoc5<?= $x['review_id'] . $x['doc_id'] ?>">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <script>
                                                        $(function() {

                                                            $(".rateYostardoc2<?= $x['review_id'] . $x['doc_id'] ?>").rateYo({

                                                                rating: <?php echo $x['star_rating_promptness'] ?>,

                                                                readOnly: true,

                                                                starWidth: "20px",

                                                                spacing: "3px"

                                                            });

                                                            $(".rateYostardoc3<?= $x['review_id'] . $x['doc_id'] ?>").rateYo({

                                                                rating: <?php echo $x['star_rating_bedside_manner'] ?>,

                                                                readOnly: true,

                                                                starWidth: "20px",

                                                                spacing: "3px"

                                                            });

                                                            $(".rateYostardoc4<?= $x['review_id'] . $x['doc_id'] ?>").rateYo({

                                                                rating: <?php echo $x['star_rating_ontime'] ?>,

                                                                readOnly: true,

                                                                starWidth: "20px",

                                                                spacing: "3px"

                                                            });

                                                            $(".rateYostardoc5<?= $x['review_id'] . $x['doc_id'] ?>").rateYo({

                                                                rating: <?php echo $x['star_rating_follow_up'] ?>,

                                                                readOnly: true,

                                                                starWidth: "20px",

                                                                spacing: "3px"

                                                            });

                                                        });
                                                    </script>

                                                <?php elseif (isset($x['hos_name']) && isset($x['dept_name'])) : ?>

                                                    <div class="col m-2">

                                                        <div class="row justify-content-between alert alert-warning">

                                                            <div class="rating-desc">

                                                                <h5>Rating given for Doctor's available in the department:</h5>

                                                            </div>

                                                            <div class="col">

                                                                <h5 class="text-center">

                                                                    <?php echo $x['star_rating_dept_doctors_availability'] ?> out of 5

                                                                </h5>

                                                                <div class="row justify-content-center">

                                                                    <div id="rysm" class="rateYostardept2<?= $x['review_id'] . $x['dept_id'] ?>">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="row justify-content-between alert alert-warning">

                                                            <div class="rating-desc">

                                                                <h5>Rating given for Department facilities:</h5>

                                                            </div>

                                                            <div class="col">

                                                                <h5 class="text-center">

                                                                    <?php echo $x['star_rating_department_facilities'] ?> out of 5</h5>

                                                                <div class="row justify-content-center">

                                                                    <div id="rysm" class="rateYostardept3<?= $x['review_id'] . $x['dept_id'] ?>">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col m-2">

                                                        <div class="row justify-content-between alert alert-warning">

                                                            <div class="rating-desc">

                                                                <h5>Rating given for Medicine availability:</h5>

                                                            </div>

                                                            <div class="col">

                                                                <h5 class="text-center">

                                                                    <?php echo $x['star_rating_medicine_availability'] ?> out of 5</h5>

                                                                <div class="row justify-content-center">

                                                                    <div id="rysm" class="rateYostardept4<?= $x['review_id'] . $x['dept_id'] ?>">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <script>
                                                        $(function() {

                                                            $(".rateYostardept2<?= $x['review_id'] . $x['dept_id'] ?>").rateYo({

                                                                rating: <?php echo $x['star_rating_dept_doctors_availability'] ?>,

                                                                readOnly: true,

                                                                starWidth: "20px",

                                                                spacing: "3px"

                                                            });

                                                            $(".rateYostardept3<?= $x['review_id'] . $x['dept_id'] ?>").rateYo({

                                                                rating: <?php echo $x['star_rating_department_facilities'] ?>,

                                                                readOnly: true,

                                                                starWidth: "20px",

                                                                spacing: "3px"

                                                            });

                                                            $(".rateYostardept4<?= $x['review_id'] . $x['dept_id'] ?>").rateYo({

                                                                rating: <?php echo $x['star_rating_medicine_availability'] ?>,

                                                                readOnly: true,

                                                                starWidth: "20px",

                                                                spacing: "3px"

                                                            });

                                                        });
                                                    </script>

                                                <?php elseif (isset($x['treat_name']) && isset($x['hos_name'])) : ?>

                                                    <div class="col m-2">

                                                        <div class="row justify-content-between alert alert-warning">

                                                            <div class="rating-desc">

                                                                <h5>Rating given for Treatment Promptness:</h5>

                                                            </div>

                                                            <div class="col">

                                                                <h5 class="text-center">

                                                                    <?php echo $x['star_rating_treatment_promptness'] ?> out of 5</h5>

                                                                <div class="row justify-content-center">

                                                                    <div id="rysm" class="rateYostartreat2<?= $x['review_id'] . $x['treat_id'] ?>">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="row justify-content-between alert alert-warning">

                                                            <div class="rating-desc">

                                                                <h5>Rating given for Treatment Methodology:</h5>

                                                            </div>

                                                            <div class="col">

                                                                <h5 class="text-center">

                                                                    <?php echo $x['star_rating_treatment_methodology'] ?> out of 5</h5>

                                                                <div class="row justify-content-center">

                                                                    <div id="rysm" class="rateYostartreat3<?= $x['review_id'] . $x['treat_id'] ?>">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col m-2">

                                                        <div class="row justify-content-between alert alert-warning">

                                                            <div class="rating-desc">

                                                                <h5>Rating given for Treatment services:</h5>

                                                            </div>

                                                            <div class="col">

                                                                <h5 class="text-center">

                                                                    <?php echo $x['star_rating_treatment_services'] ?> out of 5</h5>

                                                                <div class="row justify-content-center">

                                                                    <div id="rysm" class="rateYostartreat4<?= $x['review_id'] . $x['treat_id'] ?>">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="row justify-content-between alert alert-warning">

                                                            <div class="rating-desc">

                                                                <h5>Rating given for clinical support given after treatment:</h5>

                                                            </div>

                                                            <div class="col">

                                                                <h5 class="text-center">

                                                                    <?php echo $x['star_rating_treatment_clinical_support'] ?> out of 5

                                                                </h5>

                                                                <div class="row justify-content-center">

                                                                    <div id="rysm" class="rateYostartreat5<?= $x['review_id'] . $x['treat_id'] ?>">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <script>
                                                        $(function() {

                                                            $(".rateYostartreat2<?= $x['review_id'] . $x['treat_id'] ?>").rateYo({

                                                                rating: <?php echo $x['star_rating_treatment_promptness'] ?>,

                                                                readOnly: true,

                                                                starWidth: "25px",

                                                                spacing: "3px"

                                                            });

                                                            $(".rateYostartreat3<?= $x['review_id'] . $x['treat_id'] ?>").rateYo({

                                                                rating: <?php echo $x['star_rating_treatment_methodology'] ?>,

                                                                readOnly: true,

                                                                starWidth: "25px",

                                                                spacing: "3px"

                                                            });

                                                            $(".rateYostartreat4<?= $x['review_id'] . $x['treat_id'] ?>").rateYo({

                                                                rating: <?php echo $x['star_rating_treatment_services'] ?>,

                                                                readOnly: true,

                                                                starWidth: "25px",

                                                                spacing: "3px"

                                                            });

                                                            $(".rateYostartreat5<?= $x['review_id'] . $x['treat_id'] ?>").rateYo({

                                                                rating: <?php echo $x['star_rating_treatment_clinical_support'] ?>,

                                                                readOnly: true,

                                                                starWidth: "25px",

                                                                spacing: "3px"

                                                            });

                                                        });
                                                    </script>

                                                <?php elseif (isset($x['hos_name'])) : ?>

                                                    <div class="col m-2">

                                                        <div class="row justify-content-between alert alert-warning">

                                                            <div class="rating-desc">

                                                                <h5>Rating given for Hospital Cleanliness:</h5>

                                                            </div>

                                                            <div class="col">

                                                                <h5 class="text-center"><?php echo $x['star_rating_cleanliness'] ?> out

                                                                    of 5</h5>

                                                                <div class="row justify-content-center">

                                                                    <div id="rysm" class="rateYostarhos2<?= $x['review_id'] . $x['hos_id'] ?>">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="row justify-content-between alert alert-warning">

                                                            <div class="rating-desc">

                                                                <h5>Rating given for Accommodation:</h5>

                                                            </div>

                                                            <div class="col">

                                                                <h5 class="text-center"><?php echo $x['star_rating_accomodation'] ?>

                                                                    out of 5</h5>

                                                                <div class="row justify-content-center">

                                                                    <div id="rysm" class="rateYostarhos3<?= $x['review_id'] . $x['hos_id'] ?>">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col m-2">

                                                        <div class="row justify-content-between alert alert-warning">

                                                            <div class="rating-desc">

                                                                <h5>Rating given for Doctors Availability:</h5>

                                                            </div>

                                                            <div class="col">

                                                                <h5 class="text-center"><?php echo $x['star_rating_availability'] ?>

                                                                    out of 5</h5>

                                                                <div class="row justify-content-center">

                                                                    <div id="rysm" class="rateYostarhos4<?= $x['review_id'] . $x['hos_id'] ?>">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="row justify-content-between alert alert-warning">

                                                            <div class="rating-desc">

                                                                <h5>Rating given for Facilities given</h5>

                                                            </div>

                                                            <div class="col">

                                                                <h5 class="text-center"><?php echo $x['star_rating_facilities'] ?> out

                                                                    of 5</h5>

                                                                <div class="row justify-content-center">

                                                                    <div id="rysm" class="rateYostarhos5<?= $x['review_id'] . $x['hos_id'] ?>">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <script>
                                                        $(function() {

                                                            $(".rateYostarhos2<?= $x['review_id'] . $x['hos_id'] ?>").rateYo({

                                                                rating: <?php echo $x['star_rating_cleanliness'] ?>,

                                                                readOnly: true,

                                                                starWidth: "25px",

                                                                spacing: "3px"

                                                            });

                                                            $(".rateYostarhos3<?= $x['review_id'] . $x['hos_id'] ?>").rateYo({

                                                                rating: <?php echo $x['star_rating_accomodation'] ?>,

                                                                readOnly: true,

                                                                starWidth: "25px",

                                                                spacing: "3px"

                                                            });

                                                            $(".rateYostarhos4<?= $x['review_id'] . $x['hos_id'] ?>").rateYo({

                                                                rating: <?php echo $x['star_rating_availability'] ?>,

                                                                readOnly: true,

                                                                starWidth: "25px",

                                                                spacing: "3px"

                                                            });

                                                            $(".rateYostarhos5<?= $x['review_id'] . $x['hos_id'] ?>").rateYo({

                                                                rating: <?php echo $x['star_rating_facilities'] ?>,

                                                                readOnly: true,

                                                                starWidth: "25px",

                                                                spacing: "3px"

                                                            });

                                                        });
                                                    </script>

                                                <?php endif; ?>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- Modal -->

                        <?php endif; ?>

                    <?php endforeach; ?>
                <?php else : ?>
                    <?php  ?>
                <?php endif; ?>

            </div>
            <!-- right Bar -->

            <div id="sidebar" class="col-sm-2">

                <div id="recommend" class=" mb-3">

                    <a href="<?php echo site_url('userProfile_Controller/postReview')

                               ?>" class="btn text-white btn-lg font-weight-bold btn-danger">Post a Review</a>

                </div>

                <div id="" class="pl-1 mb-3">

                    <a href="#">

                        <h5 class="sidebar-header">Sort By</h5>

                    </a>

                    <p><a href="">Popularity</a><br>

                        <a href="">Latest</a><br>

                        <a href="">Most Liked</a>

                    </p>

                </div>

                <!-- <div id="" class="pl-1 mb-3">

                    <a href="#">

                        <h5 class="sidebar-header">Filters</h5>

                    </a>

                    <div>

                        <p class="ml-2" style="color: #C55A11;">By Hospital</p>

                        <?php if (isset($filters['hos'])) : ?>
                            <?php $c = 0;

                            foreach ($filters['hos'] as $x) :

                                $c++;

                            ?>



                                <input type="checkbox" class="filterCheck" id="hos_id" value="<?php echo $x['hos_id']

                                                                                                ?>">&nbsp;<label for="<?php echo $x['hos_id']

                                                                                            ?>"><?php echo $x['hos_name']

                                                                                                ?></label><br>

                            <?php if ($c == 4) {

                                    break;
                                }

                            endforeach;

                            ?>
                        <?php else : ?>
                            <?php echo 'Empty' ?>
                        <?php endif; ?>
                        <a href="" data-toggle="modal" data-target="#moreFilter" class="ml-2" style="color: #C55A11;">+more</a>


<br><br>
                    </div>

                    <div>

                        <p class="ml-2" style="color: #C55A11;">By Department</p>

                        <?php if (isset($filters)) : ?>

                            <?php $c = 0;

                               foreach ($filters['depts'] as $x) :

                                   $c++;

                               ?>

                                <input type="checkbox" class="filterCheck" id="dept_id" value="<?php echo $x['dept_id']

                                                                                               ?>">&nbsp;<label for="<?php echo $x['dept_id']

                                                                                                                   ?>"><?php echo $x['dept_name']

                                                                                                                       ?></label><br>

                            <?php //if ($c == 4) {

                               //break;

                               //}

                               endforeach;


                               ?>
                        <?php else : ?>
                            <?php echo "Empty" ?>

                        <?php endif; ?>
                        
                        <a href="" data-toggle="modal" data-target="#moreFilter" class="ml-2" style="color: #C55A11;">+more</a>



                    </div>
<br>
                   

                  

                    <div class="t-s hidden" style="display:none">
                    <a href="javascript:void(0);" class="ml-2 more" style="color: #C55A11;" id="2">+more</a>
                        <input type="text" id="treat_search" style="outline: none;border: 1px solid lightgrey;border-radius: 5px;" placeholder="Search">

                        <div class="hidden2" style="height: 125px; overflow-y: scroll; width: 185px;">

                            <?php $c = 0;

                                   foreach ($filters['treat'] as $x) :

                                       $c++;

                               ?>

                                <p style="margin-bottom:0px;"><input type="checkbox" class="filterCheck filterChecktreat" id="treat_id" value="<?php echo $x['treat_id'] ?>"><?php echo ' ' . $x['treat_name'] ?></p>

                            <?php if ($c == sizeof($filters['treat'])) {

                                           break;
                                       }

                                   endforeach;

                               ?>




                        </div>
                        <a href="javascript:void(0);" class="ml-2 less" style="color: #C55A11;" id="2">-less</a>

                    </div>
              


                </div>

            </div>


        </div> -->

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

                                    <?php foreach ($filters['hos'] as $x) : ?>

                                        <option value="<?php echo $x['hos_name'] ?>">

                                        <?php endforeach; ?>

                                </datalist>

                            </div>

                            <div class="form-group col-4">

                                <h6>Department</h6>

                                <input list="department" class="form-control" name="department">

                                <datalist id="department">

                                    <?php foreach ($filters['depts'] as $x) : ?>

                                        <option value="<?php echo $x['dept_name'] ?>">

                                        <?php endforeach; ?>

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
        var index;

        $('.more').click(function() {

            index = $(this).attr("id");

            $('.all-filters').eq(index).show();

            $('.less').eq(index).show();

            $('.show-filters').eq(index).hide();

            $('.f-s').eq(index).show();

            $(this).hide();

        });

        $('.less').click(function() {

            index = $(this).attr("id");

            $('.all-filters').eq(index).hide();

            $('.more').eq(index).show();

            $('.show-filters').eq(index).show();

            $('.f-s').eq(index).hide();

            $(this).hide();

        });
    </script>



    <script>
        $(document).ready(function() {

            $(".filterCheckhos").each(function() {

                $(this).add(this.nextSibling) // the text

                    .add(this.nextSibling.nextSibling) // the <br>

                    .wrapAll("<label class='hname'></label>")

            });

            $("#hos_search").keyup(function() {

                var re = new RegExp($(this).val(), "i")

                $('.hname').each(function() {

                    var text = $(this).text(),

                        matches = !!text.match(re);

                    $(this).toggle(matches);

                });

            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $(".filterCheckdept").each(function() {

                $(this).add(this.nextSibling) // the text

                    .add(this.nextSibling.nextSibling) // the <br>

                    .wrapAll("<label class='dname'></label>")

            });

            $("#dept_search").keyup(function() {

                var re = new RegExp($(this).val(), "i")

                $('.dname').each(function() {

                    var text = $(this).text(),

                        matches = !!text.match(re);

                    $(this).toggle(matches);

                });

            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $(".filterChecktreat").each(function() {

                $(this).add(this.nextSibling) // the text

                    .add(this.nextSibling.nextSibling) // the <br>

                    .wrapAll("<label class='tname'></label>")

            });

            $("#treat_search").keyup(function() {

                var re = new RegExp($(this).val(), "i")

                $('.tname').each(function() {

                    var text = $(this).text(),

                        matches = !!text.match(re);

                    $(this).toggle(matches);

                });

            });

        });
    </script>



    <script>
        $(document).ready(function() {

            $(".filterCheck").click(function() {



                var action = 'data';

                var hos_id = get_filter_text('hos_id');

                var dept_id = get_filter_text('dept_id');

                var treat_id = get_filter_text('treat_id');

                var doc_id = get_filter_text('doc_id');

                var highRate = get_filter_text('highRate');

                var lowRate = get_filter_text('lowRate');

                console.log(treat_id);

                $.ajax({

                    url: '<?php echo site_url('userProfile_Controller/fetchRev') ?>',

                    method: 'POST',

                    data: {

                        action: action,

                        hos_id: hos_id,

                        dept_id: dept_id,

                        treat_id: treat_id,

                        doc_id: doc_id,

                        lowRate: lowRate,

                        highRate: highRate

                    },

                    success: function(response) {

                        console.log(response);

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


            if (screen.width <= 768) {

                var starwidth = "10px";

                var spacing = "3px";

            } else {

                var starwidth = "20px";

                var spacing = "5px";

            }

            <?php foreach ($reviews as $x) : ?>

                <?php if ($x['star_rating'] != '') : ?>

                    <?php if (isset($x['doc_name'])) : ?>

                        $(".rateYo<?php echo $x['review_id'] . $x['doc_id'] ?>").rateYo({

                            rating: <?php echo $x['star_rating'] ?>,

                            readOnly: true,

                            starWidth: starwidth,

                            spacing: spacing,

                        });

                    <?php elseif (isset($x['hos_name']) && isset($x['dept_name'])) : ?>

                        $(".rateYo<?php echo $x['review_id'] . $x['dept_id'] ?>").rateYo({

                            rating: <?php echo $x['star_rating'] ?>,

                            readOnly: true,

                            starWidth: starwidth,

                            spacing: spacing

                        });

                    <?php elseif (isset($x['treat_name']) && isset($x['hos_name'])) : ?>

                        $(".rateYo<?php echo $x['review_id'] . $x['treat_id'] ?>").rateYo({

                            rating: <?php echo $x['star_rating'] ?>,

                            readOnly: true,

                            starWidth: starwidth,

                            spacing: spacing

                        });

                    <?php elseif (isset($x['hos_name'])) : ?>

                        $(".rateYo<?php echo $x['review_id'] . $x['hos_id'] ?>").rateYo({

                            rating: <?php echo $x['star_rating'] ?>,

                            readOnly: true,

                            starWidth: starwidth,

                            spacing: spacing

                        });
        });

        <?php endif; ?>

        <?php endif; ?>

        <?php endforeach; ?>
    </script>

<script>
                           $("#searchrev").on("keyup", function() {
                               var date = $(this).val().toLowerCase();
                               console.log(date);
                               $("#FindDoctors ").filter(function() {
                                   $(this).toggle($(this).text().toLowerCase().indexOf(date) > -1)
                               });
                           });
                           </script>

    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <!-- Latest compiled and minified JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">

    </script>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">

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