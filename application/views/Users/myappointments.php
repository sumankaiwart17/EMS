<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssUser/style.css') ?>">

    <title>AAHRS | My Appointments</title>

    <style>

        @media only screen and (max-width: 991.98px) {

            .trat {

                width: 100% !important;

            }



            .doc {

                width: 100% !important;

            }



            .btn {

                display: inline !important;

            }



            .mob-res {

                margin-bottom: 60px !important;

            }

        }

    </style>

</head>



<body class="bg-body">

    <?php include('navbar.php'); ?>

    <div class="container mt-2">

        <div class="row mob-res">

            <?php include('left-sidebar.php'); ?>

            <?php if ($layout == 0) : ?>

                <!-- View -->

                <div class="col-12 col-sm-12 col-md-8 col-lg-8">

                    <h4>My Appointments</h4><br>



                    <div class="row filter-row" style="margin-right: 14px;">

                        <label style="font-size: 20px; margin-left: 15px; margin-top: 4px;">Appointment On:</label>

                        <div class="col-sm-6 col-md-4">

                            <div class="form-group select-focus">

                                <select id="appt_on" required class="select floating form-control">

                                    <option value="Doctor">Doctor</option>

                                    <option value="Treatment">Treatment</option>

                                    <!-- <option value="">Diagonostics Service</option> -->

                                </select>

                            </div>

                        </div>

                    </div>



                    <div style="width: fit-content;" class="row doc">

                        <div class="col-md-12">

                            <div class="table-responsive">

                                <table class="table table-striped custom-table">

                                    <thead>

                                        <tr>

                                            <th>Appointment ID</th>

                                            <th>Doctor Name</th>

                                            <th>Hospital Name</th>

                                            <th>Appointment On</th>

                                            <th>Slot</th>

                                            <th>View Details</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php foreach ($docappoint as $x) : ?>

                                            <tr style="margin-bottom: 5px;">

                                                <td><?php echo $x['appt_id'] ?></td>

                                                <td data-th="Doctor Name:"><?php echo $x['doc_name'] ?></td>

                                                <td data-th="Hospital Name:"><?php echo $x['hos_name'] ?></td>

                                                <td data-th="Visit Date:"><?php echo $x['appt_datetime'] ?></td>

                                                <td data-th="Slot Time"><?php echo $x['appt_slot_time'] ?></td>

                                                <td data-th="View Details:" class="dbtnd"><a class="btn btn-primary" href="<?php echo site_url('UserProfile_Controller/bookingDoc/' . $x['apt_id']) ?>">Details</a></td>

                                            </tr>

                                        <?php endforeach; ?>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                    <div class="row trat" style="width: fit-content; display: none;">

                        <div class="col-md-12">

                            <div class="table-responsive">

                                <table class="table table-striped custom-table">

                                    <thead>

                                        <tr>

                                            <th>Appointment ID</th>

                                            <th>Treatment</th>

                                            <th>Hospital</th>

                                            <th>Appointment On</th>

                                            <th>View Details</th>

                                        </tr>

                                    </thead>

                                    <tbody>
                                        <?php foreach ($treatappoint as $y) : ?>

                                            <tr style="margin-bottom: 5px;">

                                                <td><?php echo $y['appt_id'] ?></td>

                                                <td data-th="Treatment Name:"><?php echo $y['treat_name'] ?></td>

                                                <td data-th="Hospital Name:"><?php echo $y['hos_name'] ?></td>

                                                <td data-th="Visit Date:"><?php echo $y['appt_datetime'] ?></td>

                                                <td data-th="View Details:" class="dbtnd"><a class="btn btn-primary" href="<?php echo site_url('UserProfile_Controller/bookingTrt/' . $y['apt_id']) ?>">Details</a></td>

                                            </tr>

                                        <?php endforeach; ?>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            <?php elseif ($layout == 11) : ?>

                <!-- view doc appt -->

                <div class="col-12 col-sm-12 col-md-8 col-lg-8">

                    <!-- <?php

                            // echo "<pre>";

                            // print_r($doc);

                            // die;

                            ?> -->

                    <div class="card p-2 card-body">

                        <div class="row">

                            <img src="<?php echo $doc[0]['picture'] ?>" class="card-img-top img-thumbnail rounded-square ml-3" style="height:120px;width:116px; border: inherit;">

                            <div class="col-6">

                                <h5 style="font-size:18px;"><a href="<?php echo site_url('mainController/viewDoctor/' . $doc[0]['doc_id']) ?>" class="text-info">Dr. <?php echo $doc[0]['doc_name'] ?></a> <span class="badge p-1 badge-success position-absolute ml-1 mt-1 text-white font-weight-bold" style="border-radius: 50px; font-size: 8px;"><i class="fas fa-check-circle text-white"></i> verified</span></h5>

                                <p class="m-0 p-0" style="font-size:16px;"><?php echo $doc[0]['dept_name'] ?> <small style="" class="text-muted">over 12 years of experience</small></p>

                                <p class="m-0 p-0" style="font-size:16px;"><?php echo $doc[0]['d_email'] ?></p>

                                <p class="m-0 p-0" style="font-size:16px;"><?php echo $doc[0]['d_phone'] ?></p>

                            </div>

                        </div>

                        <hr>

                        <div class="row">

                            <div class="col-sm-6 pt-2">

                                <div class="form-group">

                                    <h5 style="font-size:18px;">Hospital Name: <a href="<?php echo site_url('hospital_Controller/recHospital/' . $doc[0]['hos_id']) ?>" class="text-info"><?php echo $doc[0]['hos_name'] ?></a>

                                        <br><span style="font-size: 12px;"><?php echo $doc[0]['h_email'] ?></span>

                                        <br><span style="font-size: 12px;"><?php echo $doc[0]['h_phone'] ?></span>

                                        <br><span style="font-size: 12px;"><?php echo $doc[0]['address'] ?></span>

                                    </h5>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-6 pt-2">

                                <div class="form-group">

                                    <h5 style="font-size:16px;">Appointment ID: <?php echo $doc[0]['appt_id'] ?></h5>

                                </div>

                            </div>

                            <div class="col-sm-6 pt-2">

                                <div class="form-group">

                                    <h5 style="font-size:16px;">

                                        Appointment Status: <?php if ($doc[0]['appt_status'] == 0) : ?>

                                            <span class="badge badge-pill p-1 badge-danger position-absolute ml-1 mt-1 text-white font-weight-bold" style="margin: 1px 12px 2px !important; font-size: 12px;">Inactive</span>

                                        <?php elseif ($doc[0]['appt_status'] == 1) : ?>

                                            <span class="badge badge-pill p-1 badge-success position-absolute ml-1 mt-1 text-white font-weight-bold" style="margin: 1px 12px 2px !important; font-size: 12px;"> Active </span>

                                        <?php elseif ($doc[0]['appt_status'] == 2) : ?>

                                            <span class="badge badge-pill p-1 badge-warning position-absolute ml-1 mt-1 text-white font-weight-bold" style="margin: 1px 12px 2px !important; font-size: 12px;">Completed</span>

                                        <?php endif; ?>

                                    </h5>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-6 pt-2">

                                <div class="form-group">

                                    <h5 style="font-size:16px;">Appointment on: <?php echo $doc[0]['appt_datetime'] ?> at <?php echo $doc[0]['appt_slot_time'] ?></h5>

                                </div>

                            </div>

                            <div class="col-sm-6 pt-2">

                                <div class="form-group">

                                    <h5 style="font-size:16px;">Booked on: <?php echo $doc[0]['booking_datetime'] ?> </h5>

                                </div>

                            </div>

                        </div>

                        <div style="<?php if ($doc[0]['appt_status'] == 0 or $doc[0]['appt_status'] == 2) {

                                    } else {

                                        echo "display: none";

                                    }

                                    ?>">

                            <hr>

                            <?php if ($doc[0]['appt_status'] == 0) { ?>



                            <?php } elseif ($doc[0]['appt_status'] == 2) { ?>

                                <a class="btn btn-primary float-right" href="<?php echo site_url('userProfile_Controller/postReview') ?>">Rate Now</a>

                            <?php } ?>

                        </div>

                    </div>

                </div>

            <?php elseif ($layout == 12) : ?>

                <!-- view trt appt -->

                <div class="col-12 col-sm-12 col-md-8 col-lg-8">

                    <div class="card p-2 card-body">

                        <div class="row">

                            <img src="<?php echo base_url('images/' . $trt[0]['logo']) ?>" class="card-img-top img-thumbnail rounded-square ml-3" style="height:125px;width:122px; border: inherit;">

                            <div class="col-6">

                                <h5 style="font-size:18px;"><a href="<?php echo site_url('hospital_Controller/recHospital/' . $trt[0]['hos_id']) ?>" class="text-info"><?php echo $trt[0]['hos_name'] ?></a></h5>

                                <p class="m-0 p-0" style="font-size:16px;"><?php echo $trt[0]['dept_name'] ?> Department</p>

                                <p class="m-0 p-0" style="font-size:16px;"><?php echo $trt[0]['h_email'] ?></p>

                                <p class="m-0 p-0" style="font-size:16px;"><?php echo $trt[0]['h_phone'] ?></p>

                                <p class="m-0 p-0" style="font-size:16px;"><?php echo $trt[0]['address'] ?></p>



                            </div>

                        </div>

                        <hr>

                        <div class="row">

                            <div class="form-group">

                                <h5 style="margin-left: 13px; font-size:16px;">Treatment Name: <?php echo $trt[0]['treat_name'] ?></h5>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-6 pt-2">

                                <div class="form-group">

                                    <h5 style="font-size:16px;">Appointment ID: <?php echo $trt[0]['appt_id'] ?></h5>

                                </div>

                            </div>

                            <div class="col-sm-6 pt-2">

                                <div class="form-group">

                                    <h5 style="font-size:16px;">

                                        Appointment Status: <?php if ($trt[0]['appt_status'] == 0) : ?>

                                            <span class="badge badge-pill p-1 badge-danger position-absolute ml-1 mt-1 text-white font-weight-bold" style="margin: 1px 12px 2px !important; font-size: 12px;">Inactive</span>

                                        <?php elseif ($trt[0]['appt_status'] == 1) : ?>

                                            <span class="badge badge-pill p-1 badge-success position-absolute ml-1 mt-1 text-white font-weight-bold" style="margin: 1px 12px 2px !important; font-size: 12px;"> Active </span>

                                        <?php elseif ($trt[0]['appt_status'] == 2) : ?>

                                            <span class="badge badge-pill p-1 badge-warning position-absolute ml-1 mt-1 text-white font-weight-bold" style="margin: 1px 12px 2px !important; font-size: 12px;">Completed</span>

                                        <?php endif; ?>

                                    </h5>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-6 pt-2">

                                <div class="form-group">

                                    <h5 style="font-size:16px;">Appointment on: <?php echo $trt[0]['appt_datetime'] ?></h5>

                                </div>

                            </div>

                            <div class="col-sm-6 pt-2">

                                <div class="form-group">

                                    <h5 style="font-size:16px;">Booked on: <?php echo $trt[0]['booking_datetime'] ?> </h5>

                                </div>

                            </div>

                        </div>

                        <div style="<?php if ($trt[0]['appt_status'] == 0 or $trt[0]['appt_status'] == 2) {

                                    } else {

                                        echo "display: none";

                                    }

                                    ?>">

                            <hr>

                            <?php if ($trt[0]['appt_status'] == 0) { ?>

                                <a class="btn btn-primary float-right" href="#">Pay Now</a>

                            <?php } elseif ($trt[0]['appt_status'] == 2) { ?>

                                <a class="btn btn-primary float-right" href="<?php echo site_url('userProfile_Controller/postReview') ?>">Rate Now</a>

                            <?php } ?>

                        </div>

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>

        $("#appt_on").change(function() {

            var offer_on = $('#appt_on').val();

            // console.log(offer_on);

            if (offer_on == "Doctor") {

                $('.doc').show();

                $('.trat').hide();

            }

            if (offer_on == "Treatment") {

                $('.doc').hide();

                $('.trat').show();

            }

        });

    </script>



</body>



</html>