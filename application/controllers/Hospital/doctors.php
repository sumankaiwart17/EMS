<?php
// echo "<pre>";
// print_r($_SESSION);
// die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/bootstrap-datetimepicker.min.css') ?>">
    <link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
    <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">

    <title>Doctors</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        .time-icon:after {

            background: transparent url("<?php echo base_url('images/') ?>clock.png") no-repeat scroll 0 0;

            bottom: 0;

            content: "";

            display: block;

            height: 19px;

            margin: auto;

            position: absolute;

            right: 15px;

            top: 0;

            width: 19px;

        }

        .time-icon {

            position: relative;

            width: 100%;

        }

        .action-icon {
            font-size: 15px !important;
        }

        .avatar>img {
            width: 100%;

            display: block;

            height: 100px !important;
            object-fit: cover !important;
        }

        .mob-action {

            display: none;

        }

        .search-bar {
            position: relative;

        }

        .search-bar i {
            position: absolute;
            top: 13px;
            right: 27px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php include('navbar.php'); ?>
    <?php if ($layout == 0) : ?>
        <!-- View Doctors -->
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3" data-aos="fade-right">
                        <h4 class="page-title">Doctors</h4>
                    </div>

                    <div class="col-sm-8 col-9 text-right m-b-20" data-aos="fade-left">
                        <a href="<?php echo site_url('hospital_Controller/addDoc') ?>" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Doctor</a>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4 search-bar">
                        <input type="text" class="form-control mb-3" placeholder="Search Doctors" id="search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="row doctor-grid">
                    <?php
                    // print_r($assocDoc);
                    // die;

                    if ($assocDoc !== '') : ?>
                        <?php
                        $modal = 0;
                        $index = 0;
                        ?>
                        <?php
                        foreach ($assocDoc as $x) : ?>

                            <?php

                            $modal = $modal + 1;

                            ?>


                            <div class="col-md-4 col-sm-4 col-lg-3 doc searchDoc">

                                <div class="profile-widget " data-aos="flip-up">

                                    <div class="doctor-img">

                                        <a class="avatar" data-toggle="modal" data-target="#exampleModalCenter<?php echo $modal ?>">
                                            <img alt="" src="<?php echo $x['picture'] === "" ? base_url("images/avatar.png") : $x['picture'] ?>"></a>
                                    </div>

                                    <div class="dropdown profile-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/editDoc/' . $x['doc_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/delDoc/' . $x['doc_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                        </div>

                                    </div>

                                    <h4 class="doctor-name text-ellipsis"><a data-toggle="modal" data-target="#exampleModalCenter<?php echo $modal ?>" href="profile.html"><?php echo $x['doc_name'] ?></a></h4>

                                    <div class="doc-prof"><?php echo $x['specialization'] //$x['dept_name'] 
                                                            ?></div>

                                    <div class="user-country">

                                        <i class="fas fa-map-marker"></i>&nbsp; <?php echo $x['city'] . ', ' . $x['state'] ?>

                                    </div>

                                    <div class="mt-2">

                                        <?php if ($x['star_rating'] != 0) : ?>

                                            <?php echo round($x['star_rating'], 1) . '/5' ?><br>

                                            <?php for ($i = 0; $i < $x['star_rating']; $i++) : ?>

                                                <i class="fas fa-star text-warning"></i>



                                            <?php endfor; ?>

                                        <?php else :  echo '<label>no reviews</label>'; ?>

                                        <?php endif; ?>



                                    </div>



                                </div>

                            </div>





                            <div class="modal fade" id="exampleModalCenter<?php echo $modal ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                                <div class="modal-dialog modal-dialog-centered" role="document">

                                    <div class="modal-content">



                                        <div class="modal-body">

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                <span aria-hidden="true">&times;</span>

                                            </button>

                                            <div class="conatainer-fluid">

                                                <div class="row">

                                                    <div class="col-12 col-sm-4">

                                                        <img src="<?php echo $x['picture'] ?>" class="img-thumbnail rounded-square" alt="">

                                                    </div>

                                                    <div class="col-12 col-sm-8">

                                                        <h3><?php echo $x['doc_name'] ?></h3>

                                                        <p><?php echo $x['specialization'] ?></p>

                                                        <div class="mt-2">

                                                            <strong><?php echo round($x['star_rating'], 1) . ' out of 5' ?></strong><br>

                                                            <?php for ($i = 0; $i < round($x['star_rating']); $i++) : ?>

                                                                <i class="fas fa-star text-warning"></i>

                                                            <?php endfor; ?>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="row-header mt-5 ml-3">

                                                        <h4 class="text-info" style="border-bottom: 4px solid #17a2b8!important">Dr.
                                                            <?php echo $x['doc_name'] . "'s" ?> Information</h4>

                                                    </div>

                                                    <div class="col-12 col-sm-6 mt-2">

                                                        <p class="text-info"><strong style="border-bottom: 2px solid #17a2b8!important">
                                                                Address:</strong></p>

                                                        <p><?php echo $x['city'] . ', ' . $x['state'] . ', ' . $x['country'] . ',' ?>
                                                        </p>

                                                        <p>Pincode: <?php echo $x['zip'] ?></p>

                                                    </div>

                                                    <div class="col-12 col-sm-6 mt-2">

                                                        <p class="text-info"><strong style="border-bottom: 2px solid #17a2b8!important">
                                                                Contact:</strong></p>

                                                        <p>Phone: <?php echo $x['phone'] ?></p>

                                                        <p>Email: <?php echo $x['email_id'] ?></p>

                                                    </div>


                                                    <div class="col-12 col-sm-6 mt-2">

                                                        <p class="text-info"><strong style="border-bottom: 2px solid #17a2b8!important">
                                                                Available Days:</strong></p>

                                                        <p><?php echo $schedule[$index]['weekdays'] ?></p>


                                                    </div>

                                                    <div class="col-12 col-sm-6 mt-2">

                                                        <p class="text-info"><strong style="border-bottom: 2px solid #17a2b8!important">
                                                                Fees:</strong></p>

                                                        <p><?php echo $schedule[$index]['consult_fee'] ?></p>


                                                    </div>



                                                </div>

                                                <div class="row">

                                                    <div class="col-12 col-sm-12">

                                                        <h4 class="text-info" style="border-bottom: 2px solid #17a2b8!important">
                                                            Experience</h4>

                                                        <p><?php echo $x['experience'] . " Years" ?></p>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        <?php
                            $index = $index + 1;
                        endforeach; ?>

                    <?php else : ?>

                        <?php echo "<label style='color:red' data-aos='fade-up'>No Doctors Added</label>" ?>

                    <?php endif; ?>



                </div>

            </div>

        </div>

    <?php elseif ($layout == 1) : ?>

        <!-- Add Doctor -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-6 offset-lg-2">

                        <h4 class="page-title">Add Doctor</h4>

                    </div>


                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form action="<?php echo site_url('hospital_Controller/addDoc') ?>" method="post" enctype="multipart/form-data">

                            <div class="row">



                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>State Medical Council<label style="color:red">*</label></label>

                                        <!-- <input class="form-control" placeholder="Enter State Medical Council" name="state_medical_council"
                                        type="text" value="<?php echo set_value('state_medical_council') ?>" required>
                                        -->



                                        <select class="form-control" id="state_medical_council" name="state_medical_council">
                                            <option value="" selected>Select</option>
                                            <option value="Andhra Pradesh Medical Council" <?php echo set_select('state_medical_council', 'Andhra Pradesh Medical Council'); ?>>Andhra Pradesh Medical Council</option>
                                            <option value="Arunachal Pradesh Medical Council" <?php echo set_select('state_medical_council', 'Arunachal Pradesh Medical Council'); ?>>Arunachal Pradesh Medical Council</option>
                                            <option value="Assam Medical Council" <?php echo set_select('state_medical_council', 'Assam Medical Council'); ?>>Assam Medical Council</option>
                                            <option value="Bhopal Medical Council" <?php echo set_select('state_medical_council', 'Bhopal Medical Council'); ?>>Bhopal Medical Council</option>
                                            <option value="Bihar Medical Council" <?php echo set_select('state_medical_council', 'Bihar Medical Council'); ?>>Bihar Medical Council</option>
                                            <option value="Bombay Medical Council" <?php echo set_select('state_medical_council', 'Bombay Medical Council'); ?>>Bombay Medical Council</option>
                                            <option value="Chandigarh Medical Council" <?php echo set_select('state_medical_council', 'Chandigarh Medical Council'); ?>>Chandigarh Medical Council</option>
                                            <option value="Chattisgarh Medical Council" <?php echo set_select('state_medical_council', 'Chattisgarh Medical Council'); ?>>Chattisgarh Medical Council</option>
                                            <option value="Delhi Medical Council" <?php echo set_select('state_medical_council', 'Delhi Medical Council'); ?>>Delhi Medical Council</option>
                                            <option value="Goa Medical Council" <?php echo set_select('state_medical_council', 'Goa Medical Council'); ?>>Goa Medical Council</option>
                                            <option value="Gujarat Medical Council" <?php echo set_select('state_medical_council', 'Gujarat Medical Council'); ?>>Gujarat Medical Council</option>
                                            <option value="Haryana Medical Council" <?php echo set_select('state_medical_council', 'Haryana Medical Council'); ?>>Haryana Medical Council</option>
                                            <option value="Himachal Pradesh Medical Council" <?php echo set_select('state_medical_council', 'Himachal Pradesh Medical Council'); ?>>Himachal Pradesh Medical Council</option>
                                            <option value="Hyderabad Medical Council" <?php echo set_select('state_medical_council', 'Hyderabad Medical Council'); ?>>Hyderabad Medical Council</option>
                                            <option value="Jammu &amp; Kashmir Medical Council" <?php echo set_select('state_medical_council', 'Jammu &amp; Kashmir Medical Council'); ?>>Jammu &amp; Kashmir Medical Council</option>
                                            <option value="Jharkhand Medical Council" <?php echo set_select('state_medical_council', 'Jharkhand Medical Council'); ?>>Jharkhand Medical Council</option>
                                            <option value="Karnataka Medical Council" <?php echo set_select('state_medical_council', 'Karnataka Medical Council'); ?>>Karnataka Medical Council</option>
                                            <option value="Madhya Pradesh Medical Council" <?php echo set_select('state_medical_council', 'Madhya Pradesh Medical Council'); ?>>Madhya Pradesh Medical Council</option>
                                            <option value="Madras Medical Council" <?php echo set_select('state_medical_council', 'Madras Medical Council'); ?>>Madras Medical Council</option>
                                            <option value="Mahakoshal Medical Council" <?php echo set_select('state_medical_council', 'Mahakoshal Medical Council'); ?>>Mahakoshal Medical Council</option>
                                            <option value="Maharashtra Medical Council" <?php echo set_select('state_medical_council', 'Maharashtra Medical Council'); ?>>Maharashtra Medical Council</option>
                                            <option value="Manipur Medical Council" <?php echo set_select('state_medical_council', 'Manipur Medical Council'); ?>>Manipur Medical Council</option>
                                            <option value="Medical Council of India" <?php echo set_select('state_medical_council', 'Medical Council of India'); ?>>Medical Council of India</option>
                                            <option value="Medical Council of Tanganyika" <?php echo set_select('state_medical_council', 'Medical Council of Tanganyika'); ?>>Medical Council of Tanganyika</option>
                                            <option value="Mizoram Medical Council" <?php echo set_select('state_medical_council', 'Mizoram Medical Council'); ?>>Mizoram Medical Council</option>
                                            <option value="Mysore Medical Council" <?php echo set_select('state_medical_council', 'Mysore Medical Council'); ?>>Mysore Medical Council</option>
                                            <option value="Nagaland Medical Council" <?php echo set_select('state_medical_council', 'Nagaland Medical Council'); ?>>Nagaland Medical Council</option>
                                            <option value="Orissa Council of Medical Registration" <?php echo set_select('state_medical_council', 'Orissa Council of Medical Registration'); ?>>Orissa Council of Medical Registration</option>
                                            <option value="Pondicherry Medical Council" <?php echo set_select('state_medical_council', 'Pondicherry Medical Council'); ?>>Pondicherry Medical Council</option>
                                            <option value="Punjab Medical Council" <?php echo set_select('state_medical_council', 'Punjab Medical Council'); ?>>Punjab Medical Council</option>
                                            <option value="Rajasthan Medical Council" <?php echo set_select('state_medical_council', 'Rajasthan Medical Council'); ?>>Rajasthan Medical Council</option>
                                            <option value="Sikkim Medical Council" <?php echo set_select('state_medical_council', 'Sikkim Medical Council'); ?>>Sikkim Medical Council</option>
                                            <option value="Tamil Nadu Medical Council" <?php echo set_select('state_medical_council', 'Tamil Nadu Medical Council'); ?>>Tamil Nadu Medical Council</option>
                                            <option value="Telangana State Medical Council" <?php echo set_select('state_medical_council', 'Telangana State Medical Council'); ?>>Telangana State Medical Council</option>
                                            <option value="Travancore Cochin Medical Council, Trivandrum" <?php echo set_select('state_medical_council', 'Travancore Cochin Medical Council, Trivandrum'); ?>>Travancore Cochin Medical Council, Trivandrum</option>
                                            <option value="Tripura State Medical Council" <?php echo set_select('state_medical_council', 'Tripura State Medical Council'); ?>>Tripura State Medical Council </option>
                                            <option value="Uttar Pradesh Medical Council" <?php echo set_select('state_medical_council', 'Uttar Pradesh Medical Council'); ?>>Uttar Pradesh Medical Council</option>
                                            <option value="Uttarakhand Medical Council" <?php echo set_select('state_medical_council', 'Uttarakhand Medical Council'); ?>>Uttarakhand Medical Council</option>
                                            <option value="Vidharba Medical Council" <?php echo set_select('state_medical_council', 'Vidharba Medical Council'); ?>>Vidharba Medical Council</option>
                                            <option value="West Bengal Medical Council" <?php echo set_select('state_medical_council', 'West Bengal Medical Council'); ?>>West Bengal Medical Council</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('state_medical_council') ?></span>
                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Registration No<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Enter Medical Council Registration Number" name="registration_num" id="regis_num" type="text" value="<?php echo set_value('registration_num') ?>">
                                        <!-- onchange="get_regis()" -->
                                        <span class="text-danger"><?php echo form_error('registration_num') ?></span>
                                        <span class="text-danger" id="regis_error" style="display:none">Registration Number Already Exist</span>

                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Full Name<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Please Enter Name" name="docName" type="text" value="<?php echo set_value('docName') ?>">

                                        <span class="text-danger"><?php echo form_error('docName') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Email<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Please Enter Email" name="emailId" type="email" id="email" value="<?php echo set_value('emailId') ?>">

                                        <span class="text-danger"><?php echo form_error('emailId') ?></span>

                                    </div>
                                    <span id="email_res"></span>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Phone<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Please Enter Mobile Number" name="phone" type="text" value="<?php echo set_value('phone') ?>">

                                        <span class="text-danger"><?php echo form_error('phone') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Aadhaar No.<label style="color:red">*</label></label>

                                        <input type="number" placeholder="Please Enter Aadhar No" name="adhar" class="form-control " value="<?php echo set_value('adhar') ?>">

                                        <span class="text-danger"><?php echo form_error('adhar') ?></span>

                                    </div>

                                </div>



                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Password<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Password Atleast 6 Char" name="pass" type="password" value="">

                                        <span class="text-danger"><?php echo form_error('pass') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Confirm Password<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Confirm Password Must Match" name="cpass" type="password" value="">

                                        <span class="text-danger"><?php echo form_error('cpass') ?></span>

                                    </div>

                                </div>



                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Department<label style="color:red">*</label></label>

                                        <select class="form-control" name="department">

                                            <option value="">Select Department</option>


                                            <?php if (isset($depts)) : ?>

                                                <?php foreach ($depts as $x) :  ?>


                                                    <option value="<?php echo $x['dept_name'] ?>" <?php echo set_select('department', $x['dept_name']); ?>><?php echo $x['dept_name'] ?>
                                                    </option>

                                                <?php endforeach; ?>
                                            <?php else : ?>

                                            <?php endif; ?>


                                        </select>

                                        <!-- <span style='color:blue;'>Note:you Need add specilization otherwise you can't add dcoctors</span> -->


                                        <span class="text-danger"><?php echo form_error('department') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Years of experience<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Please Enter Experience" name="experience" type="number" value="<?php echo set_value('experience') ?>">

                                        <span class="text-danger"><?php echo form_error('experience') ?></span>

                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Degree<label style="color:red">*</label></label>
                                        <select class="form-control" id="doc_degree" name="degree">
                                            <option value="" selected>Select</option>
                                            <option value="UG">UG Degree</option>
                                            <option value="PG">PG Degree</option>
                                            <option value="Super Specialization">Super Specialization</option>
                                            <option value="Other">Other</option>

                                        </select>
                                        <span class="text-danger"><?php echo form_error('degree') ?></span>
                                    </div>





                                </div>



                                <div class="col-sm-4" style="display:none;" id="Other_degree">

                                    <div class="form-group">

                                        <label>Other Degree<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Please Enter Other Degree" name="Others" type="text" value="<?php echo set_value('Others') ?>">

                                        <span class="text-danger"><?php echo form_error('Others') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-4" style="display:none" id="dis_specialization">

                                    <div class="form-group">

                                        <label>Specialization<label style="color:red">*</label></label>


                                        <select class="form-control" name="specialization" id="doc_specialization" onchange="get_speciality()">
                                            <option value="">Select</option>

                                        </select>



                                        <span class="text-danger"><?php echo form_error('specialization') ?></span>

                                    </div>

                                </div>



                                <div class="col-sm-4" style="display:none;" id="Other_specialization">

                                    <div class="form-group">

                                        <label>Other Specialization</label>

                                        <input class="form-control" placeholder="Please Enter Other Specialization" name="Other_specialization" type="text" value="<?php echo set_value('Other_specialization') ?>">

                                        <span class="text-danger"><?php echo form_error('Other_specialization') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-4" style="display:none" id="dis_speciality">

                                    <div class="form-group">

                                        <label>Speciality<label style="color:red">*</label></label>


                                        <select class="form-control" name="speciality" id="doc_speciality">
                                            <option value="">Select</option>
                                            <?php if (set_value('speciality') !== "") : ?>

                                                <option value="<?php echo set_value('speciality') ?>" selected><?php echo set_value('speciality') ?></option>

                                            <?php endif; ?>

                                        </select>
                                        <span class="text-danger"><?php echo form_error('speciality') ?></span>

                                    </div>
                                </div>

                                <div class="col-sm-4" style="display:none;" id="Other_speciality">

                                    <div class="form-group">

                                        <label>Other Speciality</label>

                                        <input class="form-control" placeholder="Please Enter Other Speciality" name="Other_speciality" type="text" value="<?php echo set_value('Other_speciality') ?>" style="margin-top: 10px;">

                                        <span class="text-danger"><?php echo form_error('Other_speciality') ?></span>

                                    </div>

                                </div>


                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>About</label>

                                        <input class="form-control" placeholder="Please Enter About" name="about" type="text" value="<?php echo set_value('about') ?>">



                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Services</label>

                                        <input class="form-control" placeholder="Please Enter Services" name="services" type="text" value="<?php echo set_value('services') ?>">



                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Awards & recognition</label>

                                        <input class="form-control" placeholder="Please Enter Awards" name="awards" type="text" value="<?php echo set_value('awards') ?>">



                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Certifications</label>

                                        <input class="form-control" placeholder="Please Enter Certifications" name="certifications" type="text" value="<?php echo set_value('certifications') ?>">



                                    </div>

                                </div>

                                <div class="col-sm-12">

                                    <div class="row">

                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group">

                                                <label>Country<label style="color:red">*</label></label>

                                                <!-- <input type="text" name="country" class="form-control " placeholder="Enter country"
                                                value="<?php echo set_value('country') ?>" required>
                                            -->


                                                <select class="form-control" name="country">
                                                    <option value="" selected>Select</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="American Samoa">American Samoa</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antartica">Antarctica</option>
                                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Bouvet Island">Bouvet Island</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cape Verde">Cape Verde</option>
                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                    <option value="Central African Republic">Central African Republic</option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="China">China</option>
                                                    <option value="Christmas Island">Christmas Island</option>
                                                    <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Congo">Congo, the Democratic Republic of the</option>
                                                    <option value="Cook Islands">Cook Islands</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                                    <option value="Croatia">Croatia (Hrvatska)</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czech Republic">Czech Republic</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="East Timor">East Timor</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="France">France</option>
                                                    <option value="France Metropolitan">France, Metropolitan</option>
                                                    <option value="French Guiana">French Guiana</option>
                                                    <option value="French Polynesia">French Polynesia</option>
                                                    <option value="French Southern Territories">French Southern Territories</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Greenland">Greenland</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                                    <option value="Holy See">Holy See (Vatican City State)</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong">Hong Kong</option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Iran">Iran (Islamic Republic of)</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                                                    <option value="Korea">Korea, Republic of</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option value="Lao">Lao People's Democratic Republic</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macau">Macau</option>
                                                    <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malta">Malta</option>
                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Micronesia">Micronesia, Federated States of</option>
                                                    <option value="Moldova">Moldova, Republic of</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Namibia">Namibia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherlands">Netherlands</option>
                                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                    <option value="New Caledonia">New Caledonia</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau">Palau</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Pitcairn">Pitcairn</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Reunion">Reunion</option>
                                                    <option value="Romania">Romania</option>
                                                    <option value="Russia">Russian Federation</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                    <option value="Saint LUCIA">Saint LUCIA</option>
                                                    <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="San Marino">San Marino</option>
                                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                                    <option value="Slovenia">Slovenia</option>
                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                                    <option value="Span">Spain</option>
                                                    <option value="SriLanka">Sri Lanka</option>
                                                    <option value="St. Helena">St. Helena</option>
                                                    <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syria">Syrian Arab Republic</option>
                                                    <option value="Taiwan">Taiwan, Province of China</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Tanzania">Tanzania, United Republic of</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tokelau">Tokelau</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="United States">United States</option>
                                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Vietnam">Viet Nam</option>
                                                    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                    <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                                    <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                                    <option value="Western Sahara">Western Sahara</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Serbia">Serbia</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>

                                                <span class="text-danger"><?php echo form_error('country') ?></span>

                                            </div>



                                        </div>




                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group">

                                                <label>City<label style="color:red">*</label></label>

                                                <input type="text" name="city" class="form-control" placeholder="Enter City" value="<?php echo set_value('city') ?>">

                                                <span class="text-danger"><?php echo form_error('city') ?></span>

                                            </div>

                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group">

                                                <label>State/Province<label style="color:red">*</label></label>

                                                <!-- <input type="text" name="state" class="form-control " placeholder="Enter state"
                                                value="<?php echo set_value('state') ?>" required>

                                            <span class="text-danger"><?php echo form_error('state') ?></span> -->

                                                <select name="state" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                    <option value="Assam">Assam</option>
                                                    <option value="Bihar">Bihar</option>
                                                    <option value="Chandigarh">Chandigarh</option>
                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                    <option value="Daman and Diu">Daman and Diu</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Lakshadweep">Lakshadweep</option>
                                                    <option value="Puducherry">Puducherry</option>
                                                    <option value="Goa">Goa</option>
                                                    <option value="Gujarat">Gujarat</option>
                                                    <option value="Haryana">Haryana</option>
                                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                    <option value="Jharkhand">Jharkhand</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                    <option value="Maharashtra">Maharashtra</option>
                                                    <option value="Manipur">Manipur</option>
                                                    <option value="Meghalaya">Meghalaya</option>
                                                    <option value="Mizoram">Mizoram</option>
                                                    <option value="Nagaland">Nagaland</option>
                                                    <option value="Odisha">Odisha</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Rajasthan">Rajasthan</option>
                                                    <option value="Sikkim">Sikkim</option>
                                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                                    <option value="Telangana">Telangana</option>
                                                    <option value="Tripura">Tripura</option>
                                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                    <option value="Uttarakhand">Uttarakhand</option>
                                                    <option value="West Bengal">West Bengal</option>
                                                </select>

                                                <span class="text-danger"><?php echo form_error('state') ?></span>


                                            </div>

                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group">

                                                <label>Postal Code<label style="color:red">*</label></label>

                                                <input type="text" name="zip" class="form-control" placeholder="Enter Postal Code" value="<?php echo set_value('zip') ?>">

                                                <span class="text-danger"><?php echo form_error('zip') ?></span>

                                            </div>

                                        </div>

                                        <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Consult fees</label>
                                                        <div class="">
                                                            <input name="consult_fee" type="number" class="form-control" value="">
                                                            <div class="text-danger"><?php echo form_error('consult_fee'); ?></div>
                                                        </div>
                                                    </div>

                                                </div>



                                        <div class="col-sm-4">

                                            <div class="form-group">

                                                <label>Upload Image</label>

                                                <div class="profile-upload">

                                                    <div class="upload-img">

                                                        <img alt="" id="prevpic" src="<?php echo base_url('images/user.jpg') ?>">

                                                    </div>

                                                    <div class="upload-input">

                                                        <input type="file" class="form-control" id="propic" name="picture">

                                                        <span class="text-danger"><?php echo form_error('picture') ?></span>


                                                    </div>


                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-4">

                                            <div class="form-group">

                                                <label>Upload Signature</label>

                                                <div class="profile-upload">

                                                    <div class="upload-img">

                                                        <img alt="" id="prevpic" src="<?php echo base_url('images/user.jpg') ?>">

                                                    </div>

                                                    <div class="upload-input">

                                                        <input type="file" class="form-control" id="propic" name="signature">

                                                        <span class="text-danger"><?php echo form_error('signature') ?></span>


                                                    </div>



                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-sm-4 mt-4">
                                            <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">
                                                + Add Time Slots
                                            </button>
                                        </div>

                                    </div>


                                </div>

                            </div>

                            <input type="hidden" id="slotid" value="">


                            <div class="m-t-20 text-center">

                                <button id="submit" class="btn btn-primary submit-btn" id="addDoc">Add Doctor</button>

                            </div>

                        </form>

                    </div>

                </div>

                <!-- slot modal -->

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form>
                            <div class="modal-content" style="width:700px;">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Time Slots</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">

                                    <div class="col">


                                        <div class="form-group mb-0">

                                        <input type="hidden" id="slotid" value="">

                                            <label>Available Days</label>
                                            <div class="form-check">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="checkbox" class="form-check-input" id="Mon" value="Mon" name="weekdays[]"><label>Monday</label>
                                                    </div>

                                                    <div class="col">
                                                        <input type="checkbox" class="form-check-input" id="Tue" value="Tue" name="weekdays[]"><label>Tuesday</label>
                                                    </div>

                                                    <div class="col">
                                                        <input type="checkbox" class="form-check-input" id="Wed" value="Wed" name="weekdays[]"><label>Wednesday</label>
                                                    </div>

                                                    <div class="col">
                                                        <input type="checkbox" class="form-check-input" id="Thur" value="Thur" name="weekdays[]"><label>Thursday</label>
                                                    </div>

                                                    <div class="col">
                                                        <input type="checkbox" class="form-check-input" id="Fri" value="Fri" name="weekdays[]"><label>Friday</label>
                                                    </div>

                                                    <div class="col">
                                                        <input type="checkbox" class="form-check-input" id="Sat" value="Sat" name="weekdays[]"><label>Saturday</label>
                                                    </div>

                                                    <div class="col">
                                                        <input type="checkbox" class="form-check-input" id="Sun" value="Sun" name="weekdays[]"><label>Sunday</label>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>




                                        <div id="Monday" style="display: none;">
                                            <span class="text-danger font-weight-bold">Monday</span>
                                            <hr>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Start Time</label>
                                                        <div class="time-icon">
                                                            <input name="strt_time1" type="text" class="form-control" id="strt_time1" value="">
                                                        </div>
                                                        <div id="strt_timeerr1" class="text-danger"></div>
                                                    </div>


                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>End Time</label>
                                                        <div class="time-icon">
                                                            <input name="end_time1" type="text" class="form-control" id="end_time1" value="">
                                                        </div>
                                                        <div id="end_timeerr1" class="text-danger"></div>
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Break Time</label>
                                                        <div class="time-icon">
                                                            <input name="brk_time1" type="text" class="form-control" id="brk_time1" value="">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Appointment Duration <small><strong>(in mins)</strong></small></label>
                                                        <div class="">
                                                            <input name="appt_dur1" type="number" class="form-control" id="appt_dur1" value="">
                                                        </div>
                                                        <div id="appt_durerr1" class="text-danger"></div>
                                                    </div>

                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Break Duration <small><strong>(in hrs)</strong></small></label>
                                                        <div class="">
                                                            <input name="brk_dur1" type="number" class="form-control" id="brk_dur1" value="">
                                                        </div>
                                                    </div>

                                                </div>
                                                
                                            </div>
                                            <hr>
                                        </div>

                                        <div id="Tuesday" style="display: none;">
                                            <span class="text-danger font-weight-bold">Tuesday</span>
                                            <hr>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Start Time</label>
                                                        <div class="time-icon">
                                                            <input name="strt_time2" type="text" class="form-control" id="strt_time2" value="">
                                                        </div>
                                                        <div id="strt_timeerr2" class="text-danger"></div>
                                                    </div>


                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>End Time</label>
                                                        <div class="time-icon">
                                                            <input name="end_time2" type="text" class="form-control" id="end_time2" value="">
                                                        </div>
                                                        <div id="end_timeerr2" class="text-danger"></div>
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Break Time</label>
                                                        <div class="time-icon">
                                                            <input name="brk_time2" type="text" class="form-control" id="brk_time2" value="">
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Appointment Duration <small><strong>(in mins)</strong></small></label>
                                                        <div class="">
                                                            <input name="appt_dur2" type="number" class="form-control" id="appt_dur2" value="">
                                                        </div>
                                                        <div id="appt_durerr2" class="text-danger"></div>
                                                    </div>

                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Break Duration <small><strong>(in hrs)</strong></small></label>
                                                        <div class="">
                                                            <input name="brk_dur2" type="number" class="form-control" id="brk_dur2" value="">
                                                        </div>
                                                       
                                                    </div>

                                                </div>
                                              
                                            </div>
                                            <hr>
                                        </div>

                                        <div id="Wednesday" style="display: none;">
                                            <span class="text-danger font-weight-bold">Wednesday</span>
                                            <hr>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Start Time</label>
                                                        <div class="time-icon">
                                                            <input name="strt_time3" type="text" class="form-control" id="strt_time3" value="">
                                                        </div>
                                                        <div id="strt_timeerr3" class="text-danger"></div>
                                                    </div>


                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>End Time</label>
                                                        <div class="time-icon">
                                                            <input name="end_time3" type="text" class="form-control" id="end_time3" value="">
                                                        </div>
                                                        <div id="end_timeerr3" class="text-danger"></div>
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Break Time</label>
                                                        <div class="time-icon">
                                                            <input name="brk_time3" type="text" class="form-control" id="brk_time3" value="">
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Appointment Duration <small><strong>(in mins)</strong></small></label>
                                                        <div class="">
                                                            <input name="appt_dur3" type="number" class="form-control" id="appt_dur3" value="">
                                                        </div>
                                                        <div id="appt_durerr3" class="text-danger"></div>
                                                    </div>

                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Break Duration <small><strong>(in hrs)</strong></small></label>
                                                        <div class="">
                                                            <input name="brk_dur3" type="number" class="form-control" id="brk_dur3" value="">
                                                        </div>
                                                       
                                                    </div>

                                                </div>
                                               
                                            </div>
                                            <hr>
                                        </div>

                                        <div id="Thursday" style="display: none;">
                                            <span class="text-danger font-weight-bold">Thursday</span>
                                            <hr>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Start Time</label>
                                                        <div class="time-icon">
                                                            <input name="strt_time4" type="text" class="form-control" id="strt_time4" value="">
                                                        </div>
                                                        <div id="strt_timeerr4" class="text-danger"></div>
                                                    </div>


                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>End Time</label>
                                                        <div class="time-icon">
                                                            <input name="end_time4" type="text" class="form-control" id="end_time4" value="">
                                                        </div>
                                                        <div id="end_timeerr4" class="text-danger"></div>
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Break Time</label>
                                                        <div class="time-icon">
                                                            <input name="brk_time4" type="text" class="form-control" id="brk_time4" value="">
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Appointment Duration <small><strong>(in mins)</strong></small></label>
                                                        <div class="">
                                                            <input name="appt_dur4" type="number" class="form-control" id="appt_dur4" value="">
                                                        </div>
                                                        <div id="appt_durerr4" class="text-danger"></div>
                                                    </div>

                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Break Duration <small><strong>(in hrs)</strong></small></label>
                                                        <div class="">
                                                            <input name="brk_dur4" type="number" class="form-control" id="brk_dur4" value="">
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                               
                                                <hr>
                                            </div>
                                        </div>

                                        <div id="Friday" style="display: none;">
                                            <span class="text-danger font-weight-bold">Friday</span>
                                            <hr>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Start Time</label>
                                                        <div class="time-icon">
                                                            <input name="strt_time5" type="text" class="form-control" id="strt_time5" value="">
                                                        </div>
                                                        <div id="strt_timeerr5" class="text-danger"></div>
                                                    </div>


                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>End Time</label>
                                                        <div class="time-icon">
                                                            <input name="end_time5" type="text" class="form-control" id="end_time5" value="">
                                                        </div>
                                                        <div id="end_timeerr5" class="text-danger"></div>
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Break Time</label>
                                                        <div class="time-icon">
                                                            <input name="brk_time5" type="text" class="form-control" id="brk_time5" value="">
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Appointment Duration <small><strong>(in mins)</strong></small></label>
                                                        <div class="">
                                                            <input name="appt_dur5" type="number" class="form-control" id="appt_dur5" value="">
                                                        </div>
                                                        <div id="appt_durerr5" class="text-danger"></div>
                                                    </div>

                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Break Duration <small><strong>(in hrs)</strong></small></label>
                                                        <div class="">
                                                            <input name="brk_dur5" type="number" class="form-control" id="brk_dur5" value="">
                                                        </div>
                                                       
                                                    </div>

                                                </div>
                                                
                                                <hr>
                                            </div>
                                        </div>

                                        <div id="Saturday" style="display: none;">
                                            <span class="text-danger font-weight-bold">Saturday</span>
                                            <hr>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Start Time</label>
                                                        <div class="time-icon">
                                                            <input name="strt_time6" type="text" class="form-control" id="strt_time6" value="">
                                                        </div>
                                                        <div id="strt_timeerr6" class="text-danger"></div>
                                                    </div>


                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>End Time</label>
                                                        <div class="time-icon">
                                                            <input name="end_time6" type="text" class="form-control" id="end_time6" value="">
                                                        </div>
                                                        <div id="end_timeerr6" class="text-danger"></div>
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Break Time</label>
                                                        <div class="time-icon">
                                                            <input name="brk_time6" type="text" class="form-control" id="brk_time6" value="">
                                                        </div>
                                                       
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Appointment Duration <small><strong>(in mins)</strong></small></label>
                                                        <div class="">
                                                            <input name="appt_dur6" type="number" class="form-control" id="appt_dur6" value="">
                                                        </div>
                                                        <div id="appt_durerr6" class="text-danger"></div>
                                                    </div>

                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Break Duration <small><strong>(in hrs)</strong></small></label>
                                                        <div class="">
                                                            <input name="brk_dur6" type="number" class="form-control" id="brk_dur6" value="">
                                                        </div>
                                                       
                                                    </div>

                                                </div>
                                               
                                            </div>
                                            <hr>
                                        </div>

                                        <div id="Sunday" style="display: none;">
                                            <span class="text-danger font-weight-bold">Sunday</span>
                                            <hr>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Start Time</label>
                                                        <div class="time-icon">
                                                            <input name="strt_time7" type="text" class="form-control" id="strt_time7" value="">
                                                        </div>
                                                        <div id="strt_timeerr7" class="text-danger"></div>
                                                    </div>


                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>End Time</label>
                                                        <div class="time-icon">
                                                            <input name="end_time7" type="text" class="form-control" id="end_time7" value="">
                                                        </div>
                                                        <div id="end_timeerr7" class="text-danger"></div>
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Break Time</label>
                                                        <div class="time-icon">
                                                            <input name="brk_time7" type="text" class="form-control" id="brk_time7" value="">
                                                        </div>
                                                       
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Appointment Duration <small><strong>(in mins)</strong></small></label>
                                                        <div class="">
                                                            <input name="appt_dur7" type="number" class="form-control" id="appt_dur7" value="">
                                                        </div>
                                                        <div id="appt_durerr7" class="text-danger"></div>
                                                    </div>

                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Break Duration <small><strong>(in hrs)</strong></small></label>
                                                        <div class="">
                                                            <input name="brk_dur7" type="number" class="form-control" id="brk_dur7" value="">
                                                        </div>
                                                       
                                                    </div>

                                                </div>
                                                
                                            </div>
                                        </div>



                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="save">Save changes</button>
                                        </div>


                        </form>
                    </div>
                </div>
            </div>

        </div>

        </div>

    <?php elseif ($layout == 2) : ?>

        <!-- Edit Doctor -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2" data-aos="fade-right">

                        <h4 class="page-title">Edit Doctor</h4>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form action="<?php echo site_url('hospital_Controller/editDoc/' . $this->uri->segment(3)) ?>" method="post" enctype="multipart/form-data">

                            <div class="row">



                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>State Medical Council<label style="color:red">*</label></label>

                                        <!-- <input class="form-control" placeholder="Enter State Medical Council" name="state_medical_council"
                                type="text" value="<?php echo set_value('state_medical_council') ?>" required> -->

                                        <span class="text-danger"><?php echo form_error('state_medical_council') ?></span>
                                        <select class="form-control" id="state_medical_council" name="state_medical_council">
                                            <option value="<?php echo $docDet['state_medical_council'] ?>" selected><?php echo $docDet['state_medical_council'] ?></option>
                                            <option value="Andhra Pradesh Medical Council">Andhra Pradesh Medical Council</option>
                                            <option value="Arunachal Pradesh Medical Council">Arunachal Pradesh Medical Council</option>
                                            <option value="Assam Medical Council">Assam Medical Council</option>
                                            <option value="Bhopal Medical Council">Bhopal Medical Council</option>
                                            <option value="Bihar Medical Council">Bihar Medical Council</option>
                                            <option value="Bombay Medical Council">Bombay Medical Council</option>
                                            <option value="Chandigarh Medical Council">Chandigarh Medical Council</option>
                                            <option value="Chattisgarh Medical Council">Chattisgarh Medical Council</option>
                                            <option value="Delhi Medical Council">Delhi Medical Council</option>
                                            <option value="Goa Medical Council">Goa Medical Council</option>
                                            <option value="Gujarat Medical Council">Gujarat Medical Council</option>
                                            <option value="Haryana Medical Council">Haryana Medical Council</option>
                                            <option value="Himachal Pradesh Medical Council">Himachal Pradesh Medical Council</option>
                                            <option value="Hyderabad Medical Council">Hyderabad Medical Council</option>
                                            <option value="Jammu &amp; Kashmir Medical Council">Jammu &amp; Kashmir Medical Council</option>
                                            <option value="Jharkhand Medical Council">Jharkhand Medical Council</option>
                                            <option value="Karnataka Medical Council">Karnataka Medical Council</option>
                                            <option value="Madhya Pradesh Medical Council">Madhya Pradesh Medical Council</option>
                                            <option value="Madras Medical Council">Madras Medical Council</option>
                                            <option value="Mahakoshal Medical Council">Mahakoshal Medical Council</option>
                                            <option value="Maharashtra Medical Council">Maharashtra Medical Council</option>
                                            <option value="Manipur Medical Council">Manipur Medical Council</option>
                                            <option value="Medical Council of India">Medical Council of India</option>
                                            <option value="Medical Council of Tanganyika">Medical Council of Tanganyika</option>
                                            <option value="Mizoram Medical Council">Mizoram Medical Council</option>
                                            <option value="Mysore Medical Council">Mysore Medical Council</option>
                                            <option value="Nagaland Medical Council">Nagaland Medical Council</option>
                                            <option value="Orissa Council of Medical Registration">Orissa Council of Medical Registration</option>
                                            <option value="Pondicherry Medical Council">Pondicherry Medical Council</option>
                                            <option value="Punjab Medical Council">Punjab Medical Council</option>
                                            <option value="Rajasthan Medical Council">Rajasthan Medical Council</option>
                                            <option value="Sikkim Medical Council">Sikkim Medical Council</option>
                                            <option value="Tamil Nadu Medical Council">Tamil Nadu Medical Council</option>
                                            <option value="Telangana State Medical Council">Telangana State Medical Council</option>
                                            <option value="Travancore Cochin Medical Council, Trivandrum">Travancore Cochin Medical Council, Trivandrum</option>
                                            <option value="Tripura State Medical Council">Tripura State Medical Council </option>
                                            <option value="Uttar Pradesh Medical Council">Uttar Pradesh Medical Council</option>
                                            <option value="Uttarakhand Medical Council">Uttarakhand Medical Council</option>
                                            <option value="Vidharba Medical Council">Vidharba Medical Council</option>
                                            <option value="West Bengal Medical Council">West Bengal Medical Council</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Registration Number<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Enter Medical Council Registration Number" name="registration_num" id="regis_num" type="text" value="<?php echo $docDet['registration_num'] ?>">

                                        <span class="text-danger"><?php echo form_error('registration_num') ?></span>
                                        <span class="text-danger" id="regis_error" style="display:none">Registration Number Already Exist</span>

                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Full Name<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Please Enter Name" name="docName" type="text" value="<?php echo $docDet['doc_name'] ?>">

                                        <span class="text-danger"><?php echo form_error('docName') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Email<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Please Enter Email" name="emailId" type="email" value="<?php echo $docDet['email_id'] ?>">

                                        <span class="text-danger"><?php echo form_error('emailId') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Phone<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Please Enter Mobile Number" name="phone" type="text" value="<?php echo $docDet['phone'] ?>">

                                        <span class="text-danger"><?php echo form_error('phone') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Aadhaar No.<label style="color:red">*</label></label>

                                        <input type="number" placeholder="Please Enter Aadhar No" name="adhar" class="form-control " value="<?php echo $docReg['adhar'] ?>">

                                        <span class="text-danger"><?php echo form_error('adhar') ?></span>

                                    </div>

                                </div>



                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Password<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Password Atleast 6 Char" name="pass" type="password" value="<?php echo $docReg['password'] ?>">

                                        <span class="text-danger"><?php echo form_error('pass') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Confirm Password<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Confirm Password Must Match" name="cpass" type="password" value="<?php echo $docReg['password']  ?>">

                                        <span class="text-danger"><?php echo form_error('cpass') ?></span>

                                    </div>

                                </div>



                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Department<label style="color:red">*</label></label>

                                        <select class="form-control" name="department">

                                            <option value="<?php echo $docDet['department'] ?>"><?php echo $docDet['department'] ?></option>


                                            <?php if (isset($depts)) : ?>

                                                <?php foreach ($depts as $x) :  ?>


                                                    <option value="<?php echo $x['dept_name'] ?>"><?php echo $x['dept_name'] ?>
                                                    </option>

                                                <?php endforeach; ?>
                                            <?php else : ?>

                                            <?php endif; ?>


                                        </select>

                                        <!-- <span style='color:blue;'>Note:you Need add specilization otherwise you can't add dcoctors</span> -->


                                        <!-- <span class="text-danger"><?php echo form_error('department') ?></span> -->

                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Years of experience<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Please Enter Experience" name="experience" type="number" value="<?php echo $docDet['experience'] ?>">

                                        <span class="text-danger"><?php echo form_error('experience') ?></span>

                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Degree<label style="color:red">*</label></label>
                                        <select class="form-control" id="doc_degree" name="degree">

                                            <option value="UG" <?php echo $docDet['degree'] === "UG" ? 'selected' : '';  ?>>UG Degree</option>
                                            <option value="PG" <?php echo $docDet['degree'] === "PG" ? 'selected' : '';  ?>>PG Degree</option>
                                            <option value="Super Specialization" <?php echo $docDet['degree'] === "Super Specialization" ? 'selected' : '';  ?>>Super Specialization</option>
                                            <option value="Other" <?php echo $docDet['degree'] === "Other" ? 'selected' : '';  ?>>Other</option>

                                        </select>
                                    </div>



                                </div>



                                <div class="col-sm-4" style="display:none;" id="Other_degree">

                                    <div class="form-group">

                                        <label>Other Degree<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Please Enter Other Degree" name="Others" type="text" value="<?php echo set_value('Others') ?>">

                                        <span class="text-danger"><?php echo form_error('Others') ?></span>

                                    </div>

                                </div>


                                <div class="col-sm-4" style="display:none" id="dis_specialization">

                                    <div class="form-group">

                                        <label>Specialization<label style="color:red">*</label></label>

                                        <select class="form-control" name="specialization" id="doc_specialization" onchange="get_speciality()">
                                            <option value="">Select</option>
                                        </select>
                                    </div>

                                    <span class="text-danger"><?php echo form_error('specialization') ?></span>

                                </div>



                                <div class="col-sm-4" style="display:none;" id="Other_specialization">

                                    <div class="form-group">

                                        <label>Other Specialization</label>

                                        <input class="form-control" placeholder="Please Enter Other Specialization" name="Other_specialization" type="text" value="<?php echo set_value('Other_specialization') ?>">

                                        <span class="text-danger"><?php echo form_error('Other_specialization') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-4" style="display:none" id="dis_speciality">

                                    <div class="form-group">

                                        <label>Speciality<label style="color:red">*</label></label>


                                        <select class="form-control" name="speciality" id="doc_speciality">
                                            <option value="">Select</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('speciality') ?></span>


                                    </div>
                                </div>

                                <div class="col-sm-4" style="display:none;" id="Other_speciality">

                                    <div class="form-group">

                                        <label>Other Speciality</label>

                                        <input class="form-control" placeholder="Please Enter Other Speciality" name="Other_speciality" type="text" value="<?php echo set_value('Other_speciality') ?>" style="margin-top: 10px;">

                                        <span class="text-danger"><?php echo form_error('Other_speciality') ?></span>

                                    </div>

                                </div>


                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>About</label>

                                        <input class="form-control" placeholder="Please Enter About" name="about" type="text" value="<?php echo $docDet['about'] ?>">

                                        <span class="text-danger"><?php echo form_error('about') ?></span>

                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Services</label>

                                        <input class="form-control" placeholder="Please Enter Services" name="services" type="text" value="<?php echo $docDet['services'] ?>">



                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Awards & recognition</label>

                                        <input class="form-control" placeholder="Please Enter Awards" name="awards" type="text" value="<?php echo $docDet['awards'] ?>">



                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Certifications</label>

                                        <input class="form-control" placeholder="Please Enter Certifications" name="certifications" type="text" value="<?php echo $docDet['certifications'] ?>">



                                    </div>

                                </div>

                                <div class="col-sm-12">

                                    <div class="row">

                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group">

                                                <label>Country<label style="color:red">*</label></label>

                                                <!-- <input type="text" name="country" class="form-control " placeholder="Enter country"
                                        value="<?php echo set_value('country') ?>" required> -->

                                                <span class="text-danger"><?php echo form_error('country') ?></span>

                                                <select class="form-control" name="country" required>
                                                    <option value="<?php echo $docDet['country'] ?>" selected><?php echo $docDet['country'] ?></option>

                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="American Samoa">American Samoa</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antartica">Antarctica</option>
                                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Bouvet Island">Bouvet Island</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cape Verde">Cape Verde</option>
                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                    <option value="Central African Republic">Central African Republic</option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="China">China</option>
                                                    <option value="Christmas Island">Christmas Island</option>
                                                    <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Congo">Congo, the Democratic Republic of the</option>
                                                    <option value="Cook Islands">Cook Islands</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                                    <option value="Croatia">Croatia (Hrvatska)</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czech Republic">Czech Republic</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="East Timor">East Timor</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="France">France</option>
                                                    <option value="France Metropolitan">France, Metropolitan</option>
                                                    <option value="French Guiana">French Guiana</option>
                                                    <option value="French Polynesia">French Polynesia</option>
                                                    <option value="French Southern Territories">French Southern Territories</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Greenland">Greenland</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                                    <option value="Holy See">Holy See (Vatican City State)</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong">Hong Kong</option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Iran">Iran (Islamic Republic of)</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                                                    <option value="Korea">Korea, Republic of</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option value="Lao">Lao People's Democratic Republic</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macau">Macau</option>
                                                    <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malta">Malta</option>
                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Micronesia">Micronesia, Federated States of</option>
                                                    <option value="Moldova">Moldova, Republic of</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Namibia">Namibia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherlands">Netherlands</option>
                                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                    <option value="New Caledonia">New Caledonia</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau">Palau</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Pitcairn">Pitcairn</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Reunion">Reunion</option>
                                                    <option value="Romania">Romania</option>
                                                    <option value="Russia">Russian Federation</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                    <option value="Saint LUCIA">Saint LUCIA</option>
                                                    <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="San Marino">San Marino</option>
                                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                                    <option value="Slovenia">Slovenia</option>
                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                                    <option value="Span">Spain</option>
                                                    <option value="SriLanka">Sri Lanka</option>
                                                    <option value="St. Helena">St. Helena</option>
                                                    <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syria">Syrian Arab Republic</option>
                                                    <option value="Taiwan">Taiwan, Province of China</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Tanzania">Tanzania, United Republic of</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tokelau">Tokelau</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="United States">United States</option>
                                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Vietnam">Viet Nam</option>
                                                    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                    <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                                    <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                                    <option value="Western Sahara">Western Sahara</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Serbia">Serbia</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>

                                            </div>

                                        </div>




                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group">

                                                <label>City<label style="color:red">*</label></label>

                                                <input type="text" name="city" class="form-control" placeholder="Enter City" value="<?php echo $docDet['city'] ?>">

                                                <span class="text-danger"><?php echo form_error('city') ?></span>

                                            </div>

                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group">

                                                <label>State/Province<label style="color:red">*</label></label>

                                                <!-- <input type="text" name="state" class="form-control " placeholder="Enter state"
                                        value="<?php echo set_value('state') ?>" required> -->

                                                <span class="text-danger"><?php echo form_error('state') ?></span>

                                                <select name="state" class="form-control" required>
                                                    <option value="<?php echo $docDet['state'] ?>"><?php echo $docDet['state'] ?></option>
                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                    <option value="Assam">Assam</option>
                                                    <option value="Bihar">Bihar</option>
                                                    <option value="Chandigarh">Chandigarh</option>
                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                    <option value="Daman and Diu">Daman and Diu</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Lakshadweep">Lakshadweep</option>
                                                    <option value="Puducherry">Puducherry</option>
                                                    <option value="Goa">Goa</option>
                                                    <option value="Gujarat">Gujarat</option>
                                                    <option value="Haryana">Haryana</option>
                                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                    <option value="Jharkhand">Jharkhand</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                    <option value="Maharashtra">Maharashtra</option>
                                                    <option value="Manipur">Manipur</option>
                                                    <option value="Meghalaya">Meghalaya</option>
                                                    <option value="Mizoram">Mizoram</option>
                                                    <option value="Nagaland">Nagaland</option>
                                                    <option value="Odisha">Odisha</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Rajasthan">Rajasthan</option>
                                                    <option value="Sikkim">Sikkim</option>
                                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                                    <option value="Telangana">Telangana</option>
                                                    <option value="Tripura">Tripura</option>
                                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                    <option value="Uttarakhand">Uttarakhand</option>
                                                    <option value="West Bengal">West Bengal</option>
                                                </select>




                                            </div>

                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group">

                                                <label>Postal Code<label style="color:red">*</label></label>

                                                <input type="text" name="zip" class="form-control" placeholder="Enter Postal Code" value="<?php echo $docDet['zip'] ?>">

                                                <span class="text-danger"><?php echo form_error('zip') ?></span>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <div class="col-md-4">
                                    <div class="form-group mb-0">

                                        <label>Available Days</label><?php $days = explode(',', $schedule[0]['weekdays']) ?>
                                        <select name="weekdays[]" size="6" id="choices-multiple-remove-button" placeholder="Select Days" multiple>
                                            <option value="Sun" <?php if (in_array('Sun', $days)) {

                                                                    echo 'selected';
                                                                } ?>>Sunday</option>npa

                                            <option value="Mon" <?php if (in_array('Mon', $days)) {

                                                                    echo 'selected';
                                                                } ?>>Monday</option>

                                            <option value="Tue" <?php if (in_array('Tue', $days)) {

                                                                    echo 'selected';
                                                                } ?>>Tuesday</option>

                                            <option value="Wed" <?php if (in_array('Wed', $days)) {

                                                                    echo 'selected';
                                                                } ?>>Wednesday</option>

                                            <option value="Thur" <?php if (in_array('Thur', $days)) {

                                                                        echo 'selected';
                                                                    } ?>>Thursday</option>

                                            <option value="Fri" <?php if (in_array('Fri', $days)) {

                                                                    echo 'selected';
                                                                } ?>>Friday</option>

                                            <option value="Sat" <?php if (in_array('Sat', $days)) {

                                                                    echo 'selected';
                                                                } ?>>Saturday</option>

                                        </select>


                                    </div>

                                    <div class="text-danger"><?php echo form_error('weekdays[]'); ?></div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Start Time</label>
                                        <div class="time-icon">
                                            <input name="strt_time" type="text" class="form-control" value="<?php echo $schedule[0]['strt_time'] ?>" id="datetimepicker3">
                                        </div>
                                        <div class="text-danger"><?php echo form_error('strt_time'); ?></div>
                                    </div>


                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>End Time</label>
                                        <div class="time-icon">
                                            <input name="end_time" type="text" class="form-control" value="<?php echo $schedule[0]['end_time'] ?>" id="datetimepicker4">
                                        </div>
                                        <div class="text-danger"><?php echo form_error('end_time'); ?></div>
                                    </div>

                                </div>
                            </div>
                            <div class="row pt-3 pb-3">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Break Time</label>
                                        <div class="time-icon">
                                            <input name="brk_time" type="text" value="<?php echo $schedule[0]['brk_time'] ?>" class="form-control" id="datetimepicker5">
                                        </div>
                                        <div class="text-danger"><?php echo form_error('brk_time'); ?></div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Appointment Duration <small><strong>(in mins)</strong></small></label>
                                        <div class="">
                                            <input name="appt_dur" type="number" value="<?php echo $schedule[0]['consult_duration'] ?>" class="form-control" id="brk_dur">
                                        </div>
                                        <div class="text-danger"><?php echo form_error('appt_dur'); ?></div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Break Duration <small><strong>(in hrs)</strong></small></label>
                                        <div class="">
                                            <input name="brk_dur" type="number" value="<?php echo $schedule[0]['brk_dur'] ?>" class="form-control" id="brk_dur">
                                        </div>
                                        <div class="text-danger"><?php echo form_error('brk_dur'); ?></div>
                                    </div>

                                </div>

                            </div>

                            <div class="row pt-3 pb-3">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Consult fees</label>
                                        <div class="">
                                            <input name="consult_fee" type="number" class="form-control" value="<?php echo $schedule[0]['consult_fee'] ?>">
                                        </div>
                                        <div class="text-danger"><?php echo form_error('consult_fee'); ?></div>
                                    </div>

                                </div>

                                <div class="col-sm-4">

                                    <div class="form-group">

                                        <label>Upload Image</label>

                                        <div class="profile-upload">

                                            <div class="upload-img">

                                                <img alt="" id="prevpic" src="<?php echo isset($docDet['picture']) ? $docDet['picture'] : base_url('images/user.jpg'); ?>" style="border: 1px solid black;">

                                            </div>

                                            <div class="upload-input">

                                                <input type="file" class="form-control" id="propic" name="picture">

                                                <span class="text-danger"><?php echo form_error('picture') ?></span>


                                            </div>


                                        </div>

                                    </div>

                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Upload Signature</label>
                                        <div class="profile-upload">
                                            <div class="upload-img">
                                                <img alt="" id="prevsignpic" src="<?php echo isset($docDet['signature']) ? $docDet['signature'] : ''; ?>" style="border: 1px solid black;">

                                            </div>

                                            <div class="upload-input">

                                                <input type="file" class="form-control" id="signpic" name="signature">

                                            </div>


                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="m-t-20 text-center">

                                <button id="submit" class="btn btn-primary submit-btn">Edit Doctor</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>


    <?php endif; ?>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"> </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="<?php echo base_url('js/moment.min.js') ?>"></script>

    <script src="<?php echo base_url('js/select2.min.js') ?>"></script>

    <script src="<?php echo base_url('js/bootstrap-datetimepicker.min.js') ?>"></script>

    <script src="<?php echo base_url('js/app.js') ?>"></script>

    <?php if ($layout == 1 || $layout == 2) : ?>

        <script>

            const weekdays = [];

        
                $('#Mon').on('click', function() {

                    if ($('#Monday').is(':visible')) {

                        document.getElementById('Monday').style.display = 'none';
                        weekdays.splice(0,1);

                    } else {
                        document.getElementById('Monday').style.display = 'block';
                        weekdays.push('Monday');

                    }

                });

                $('#Tue').on('click', function() {

                    if ($('#Tuesday').is(':visible')) {
                        document.getElementById('Tuesday').style.display = 'none';
                        weekdays.splice(1,1);
                    } else {
                        document.getElementById('Tuesday').style.display = 'block';
                        weekdays.push('Tuesday');
                    }

                   

                });

                $('#Wed').on('click', function() {

                    if ($('#Wednesday').is(':visible')) {
                        document.getElementById('Wednesday').style.display = 'none';
                        weekdays.splice(2,1);
                    } else {
                        document.getElementById('Wednesday').style.display = 'block';
                        weekdays.push('Wednesday');
                    }

                    

                });

                $('#Thur').on('click', function() {

                    if ($('#Thursday').is(':visible')) {
                        document.getElementById('Thursday').style.display = 'none';
                        weekdays.splice(3,1);
                    } else {
                        document.getElementById('Thursday').style.display = 'block';
                        weekdays.push('Thursday');
                    }

                    

                });

                $('#Fri').on('click', function() {

                    if ($('#Friday').is(':visible')) {
                        document.getElementById('Friday').style.display = 'none';
                        weekdays.splice(4,1);
                    } else {
                        document.getElementById('Friday').style.display = 'block';
                        weekdays.push('Friday');
                    }

                    
                });

                $('#Sat').on('click', function() {

                    if ($('#Saturday').is(':visible')) {
                        document.getElementById('Saturday').style.display = 'none';
                        weekdays.splice(5,1);
                    } else {
                        document.getElementById('Saturday').style.display = 'block';
                        weekdays.push('Saturday');
                    }

                    

                });

                $('#Sun').on('click', function() {

                    if ($('#Sunday').is(':visible')) {
                        document.getElementById('Sunday').style.display = 'none';
                        weekdays.splice(6,1);
                    } else {
                        document.getElementById('Sunday').style.display = 'block';
                        weekdays.push('Sunday');
                    }

                    

                });

            
                $('#save').on('click', function() {

                // monday
                let strt_time1 = $('#strt_time1').val();
                let end_time1 = $('#end_time1').val();
                let brk_time1 = $('#brk_time1').val();
                let appt_dur1 = $('#appt_dur1').val();
                let brk_dur1 = $('#brk_dur1').val();

                // tuesday
                let strt_time2 = $('#strt_time2').val();
                let end_time2 = $('#end_time2').val();
                let brk_time2 = $('#brk_time2').val();
                let appt_dur2 = $('#appt_dur2').val();
                let brk_dur2 = $('#brk_dur2').val();


                // wednesday
                let strt_time3 = $('#strt_time3').val();
                let end_time3 = $('#end_time3').val();
                let brk_time3 = $('#brk_time3').val();
                let appt_dur3 = $('#appt_dur3').val();
                let brk_dur3 = $('#brk_dur3').val();


                // thursday
                let strt_time4 = $('#strt_time4').val();
                let end_time4 = $('#end_time4').val();
                let brk_time4 = $('#brk_time4').val();
                let appt_dur4 = $('#appt_dur4').val();
                let brk_dur4 = $('#brk_dur4').val();


                // friday
                let strt_time5 = $('#strt_time5').val();
                let end_time5 = $('#end_time5').val();
                let brk_time5 = $('#brk_time5').val();
                let appt_dur5 = $('#appt_dur5').val();
                let brk_dur5 = $('#brk_dur5').val();


                // saturday
                let strt_time6 = $('#strt_time6').val();
                let end_time6 = $('#end_time6').val();
                let brk_time6 = $('#brk_time6').val();
                let appt_dur6 = $('#appt_dur6').val();
                let brk_dur6 = $('#brk_dur6').val();


                // sunday
                let strt_time7 = $('#strt_time7').val();
                let end_time7 = $('#end_time7').val();
                let brk_time7 = $('#brk_time7').val();
                let appt_dur7 = $('#appt_dur7').val();
                let brk_dur7 = $('#brk_dur7').val();


                // validation

                if ($('#Mon').is(":checked")) {
                    if (strt_time1 === '' && end_time1 === '' && appt_dur1 === '') {
                        $('#strt_timeerr1').html('Start Time is required');
                        $('#end_timeerr1').html('End Time is required');
                        $('#appt_durerr1').html('Appointment Duration is required');
                    
                    }
                }


                if ($('#Tue').is(":checked")) {
                    if (strt_time2 === '' && end_time2 === '' && appt_dur2 === '') {
                        $('#strt_timeerr2').html('Start Time is required');
                        $('#end_timeerr2').html('End Time is required');
                        $('#appt_durerr2').html('Appointment Duration is required');
                    
                    }
                }

                if ($('#Wed').is(":checked")) {
                    if (strt_time3 === '' && end_time3 === ''  && appt_dur3 === '') {
                        $('#strt_timeerr3').html('Start Time is required');
                        $('#end_timeerr3').html('End Time is required');
                        $('#appt_durerr3').html('Appointment Duration is required');
                    
                    }
                }

                if ($('#Thur').is(":checked")) {
                    if (strt_time4 === '' && end_time4 === '' && appt_dur4 === '') {
                        $('#strt_timeerr4').html('Start Time is required');
                        $('#end_timeerr4').html('End Time is required');
                        $('#appt_durerr4').html('Appointment Duration is required');
                        
                    }
                }

                if ($('#Fri').is(":checked")) {
                    if (strt_time5 === '' && end_time5 === '' && appt_dur5 === '') {
                        $('#strt_timeerr5').html('Start Time is required');
                        $('#end_timeerr5').html('End Time is required');
                        $('#appt_durerr5').html('Appointment Duration is required');

                    }
                }

                if ($('#Sat').is(":checked")) {
                    if (strt_time6 === '' && end_time6 === '' && appt_dur6 === '') {
                        $('#strt_timeerr6').html('Start Time is required');
                        $('#end_timeerr6').html('End Time is required');
                        $('#appt_durerr6').html('Appointment Duration is required');
                        
                    }
                }

                if ($('#Sun').is(":checked")) {
                    if (strt_time7 === '' && end_time7 === '' && appt_dur7 === '') {
                        $('#strt_timeerr7').html('Start Time is required');
                        $('#end_timeerr7').html('End Time is required');
                        $('#appt_durerr7').html('Appointment Duration is required');
                        
                    }
                }

                if (strt_time1 !== '' && end_time1 !== '' && appt_dur1 !== '' || strt_time2 !== '' && end_time2 !== '' && appt_dur2 !== ''  || strt_time3 !== '' && end_time3 !== '' && appt_dur3 !== '' || strt_time4 !== '' && end_time4 !== '' && appt_dur4 !== '' ||
                    strt_time5 !== '' && end_time5 !== '' && appt_dur5 !== ''  || strt_time6 !== '' && end_time6 !== '' && appt_dur6 !== '' || strt_time7 !== '' && end_time7 !== '' && appt_dur7 !== '' ) {

                        let id;

                        if($('#slotid').val() !== '')
                        {
                            id = $('#slotid').val();
                        }

                        else
                        {
                            id = '';
                        }
                        

                    // ajax code to add slot to database

                    $.ajax({

                        url: '<?php echo site_url('hospital_Controller/addTimeSlots') ?>',

                        method: 'POST',

                        data: {

                           slotid: id,  

                           weekdays: weekdays,

                            strt_time1: strt_time1,
                            end_time1: end_time1,
                            appt_dur1: appt_dur1,
                            brk_time1: brk_time1,
                            brk_dur1: brk_dur1,
                            


                            strt_time2: strt_time2,
                            end_time2: end_time2,
                            appt_dur2: appt_dur2,
                            brk_time2: brk_time2,
                            brk_dur2: brk_dur2,



                            strt_time3: strt_time3,
                            end_time3: end_time3,
                            appt_dur3: appt_dur3,
                            brk_time3: brk_time3,
                            brk_dur3: brk_dur3,



                            strt_time4: strt_time4,
                            end_time4: end_time4,
                            appt_dur4: appt_dur4,
                            brk_time4: brk_time4,
                            brk_dur4: brk_dur4,



                            strt_time5: strt_time5,
                            end_time5: end_time5,
                            appt_dur5: appt_dur5,
                            brk_time5: brk_time5,
                            brk_dur5: brk_dur5,

                    

                            strt_time6: strt_time6,
                            end_time6: end_time6,
                            appt_dur6: appt_dur6,
                            brk_time6: brk_time6,
                            brk_dur6: brk_dur6,



                            strt_time7: strt_time7,
                            end_time7: end_time7,
                            appt_dur7: appt_dur7,
                            brk_time7: brk_time7,
                            brk_dur7: brk_dur7,

                
                        },

                        success: function(response) {

                            if (response !== "") {
                                Swal.fire({
                                    position: 'top-center',
                                    icon: 'success',
                                    title: 'Slots added Successfully',
                                    showConfirmButton: false,
                                    timer: 2000
                                });

                                $("#slotid").val(response);

                                console.log(response);

                            }

                            else
                            {

                                Swal.fire({
                                    position: 'top-center',
                                    icon: 'success',
                                    title: 'Slots Updated Successfully',
                                    showConfirmButton: false,
                                    timer: 2000
                                });

                            }

                            }

                        });
                    }

                    });
       
        </script>

        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#prevpic').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function readsignURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#prevsignpic').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

        <script>
            $(document).ready(function() {

                var seletedDegree = $('#doc_degree option:selected').val();

                if (seletedDegree !== "") {
                    document.getElementById('dis_specialization').style.display = "block";

                    if (seletedDegree === "UG") {

                        selOptn =
                            "<option value=''>Select</option>" +
                            "<option value='MBBS' <?php echo $docDet['specialization'] === 'MBBS' ? 'selected' : '';  ?>>MBBS</option>" +
                            "<option value='BDS'  <?php echo $docDet['specialization'] === 'BDS' ? 'selected' : '';  ?>>BDS</option>" +
                            "<option value='BAMS'  <?php echo $docDet['specialization'] === 'BAMS' ? 'selected' : '';  ?>>BAMS </option>" +
                            "<option value='BUMS'  <?php echo $docDet['specialization'] === 'BUMS' ? 'selected' : '';  ?>>BUMS</option>" +
                            "<option value='BHMS'  <?php echo $docDet['specialization'] === 'BHMS' ? 'selected' : '';  ?>>BHMS </option>" +
                            "<option value='BYNS'  <?php echo $docDet['specialization'] === 'BYNS' ? 'selected' : '';  ?>>BYNS</option>" +
                            "<option value='B.V.Sc & AH'  <?php echo $docDet['specialization'] === 'B.V.Sc & AH' ? 'selected' : '';  ?>>B.V.Sc & AH</option>" +
                            "<option value='Other'  <?php echo $docDet['specialization'] === 'Other' ? 'selected' : '';  ?>>Other</option>"
                        $("#doc_specialization").find("option").remove().end().append(selOptn);
                        // $('#doc_specialization').append(selOptn);
                    }
                    if (seletedDegree === "PG") {

                        selOptn =
                            "<option value=''>Select</option>" +
                            "<option value='MD' <?php echo $docDet['specialization'] === 'MD' ? 'selected' : '';  ?>>MD</option>" +
                            "<option value='MS' <?php echo $docDet['specialization'] === 'MS' ? 'selected' : '';  ?>>MS</option>" +
                            "<option value='DNB' <?php echo $docDet['specialization'] === 'DNB' ? 'selected' : '';  ?>>DNB</option>" +
                            "<option value='Diploma' <?php echo $docDet['specialization'] === 'Diploma' ? 'selected' : '';  ?>>Diploma</option>" +
                            "<option value='Other' <?php echo $docDet['specialization'] === 'Other' ? 'selected' : '';  ?>>Other</option>"
                        // $(this).prev('select').remove();
                        //$('#doc_specialization').last().remove();

                        $("#doc_specialization").find("option").remove().end().append(selOptn);
                        // $('#doc_specialization').append(selOptn);
                    }
                    if (seletedDegree === "Super Specialization") {
                        // document.getElementById('s_degree').style.display='block';
                        // document.getElementById('always_show').style.display='none';
                        // document.getElementById('doc_specialization').style.display='none';
                        // document.getElementById('p_degree').style.display='none';
                        //console.log(data) ;
                        selOptn =
                            "<option value=''>Select</option>" +
                            "<option value='DM' <?php echo $docDet['specialization'] === 'DM' ? 'selected' : '';  ?>>DM</option>" +
                            "<option value='MCH' <?php echo $docDet['specialization'] === 'MCH' ? 'selected' : '';  ?>>MCH</option>" +
                            "<option value='Other' <?php echo $docDet['specialization'] === 'Other' ? 'selected' : '';  ?>>Other</option>"
                        $("#doc_specialization").find("option").remove().end().append(selOptn);

                        //$('#doc_specialization').append(selOptn);
                    }

                    if (seletedDegree === "Other") {
                        document.getElementById('Other_degree').style.display = "block";
                    }

                    var special_val = $('#dis_specialization option:selected').val()

                    console.log(special_val);

                    if (special_val === "MBBS" || special_val === "BAMS " || special_val === "BHMS " ||
                        special_val === "" || special_val === "BDS" || special_val === "BUMS" ||
                        special_val === "BYNS" || special_val === "B.V.Sc & AH" || special_val === "Other") {
                        document.getElementById('dis_speciality').style.display = 'none';
                    } else {
                        document.getElementById('dis_speciality').style.display = 'block';
                    }



                    if (special_val === "Other") {

                        document.getElementById('Other_specialization').style.display = 'block';
                    } else {
                        document.getElementById('Other_specialization').style.display = 'none';
                    }



                    if (special_val === "MD") {
                        selOptn =
                            "<option value='Anatomy' <?php echo $docDet['speciality'] === 'Anatomy' ? 'selected' : '';  ?>>MD in Anatomy</option>" +
                            "<option value='Anesthesia' <?php echo $docDet['speciality'] === 'Anesthesia' ? 'selected' : '';  ?>>MD in Anesthesia</option>" +
                            "<option value='Aerospace' <?php echo $docDet['speciality'] === 'Aerospace' ? 'selected' : '';  ?>>MD in Aerospace Medicine</option>" +
                            "<option value='Biochemistry' <?php echo $docDet['speciality'] === 'Biochemistry' ? 'selected' : '';  ?>>MD in Biochemistry</option>" +
                            "<option value='Dermatology' <?php echo $docDet['speciality'] === 'Dermatology' ? 'selected' : '';  ?>>MD in Dermatology</option>" +
                            "<option value='ENT' <?php echo $docDet['speciality'] === 'ENT' ? 'selected' : '';  ?>>MD in ENT</option>" +
                            "<option value='Medicine' <?php echo $docDet['speciality'] === 'Medicine' ? 'selected' : '';  ?>>MD in Forensic Medicine</option>" +
                            "<option value='Geriatrics' <?php echo $docDet['speciality'] === 'Geriatrics' ? 'selected' : '';  ?>>MD in Geriatrics</option>" +
                            "<option value='General Surgery' <?php echo $docDet['speciality'] === 'General Surgery' ? 'selected' : '';  ?>>MD in General Surgery</option>" +
                            "<option value='Ophthalmology' <?php echo $docDet['speciality'] === 'Ophthalmology' ? 'selected' : '';  ?>>MD in Ophthalmology</option>" +
                            "<option value='Obstetrics & Gynecology' <?php echo $docDet['speciality'] === 'Obstetrics & Gynecology' ? 'selected' : '';  ?>>MD in Obstetrics & Gynecology</option>" +
                            "<option value='Orthopedics' <?php echo $docDet['speciality'] === 'Orthopedics' ? 'selected' : '';  ?>>MD in Orthopedics</option> " +
                            "<option value='Other' <?php echo $docDet['speciality'] === 'Other' ? 'selected' : '';  ?>>Other</option>"

                        $("#doc_speciality").find("option").remove().end().append(selOptn);

                        //$('#doc_speciality').append(selOptn);
                    }
                    if (special_val === "MS") {
                        selOptn =
                            "<option value='MS Pediatric surgery' <?php echo $docDet['speciality'] === 'MS Pediatric surgery' ? 'selected' : '';  ?>>MS Pediatric surgery</option>" +
                            "<option value='MS Plastic surgery' <?php echo $docDet['speciality'] === 'MS Plastic surgery' ? 'selected' : '';  ?>>MS Plastic surgery</option>" +
                            "<option value='MS Cardiothoracic surgery' <?php echo $docDet['speciality'] === 'MS Cardiothoracic surgery' ? 'selected' : '';  ?>>MS Cardiothoracic surgery</option>" +
                            "<option value='MS Urology' <?php echo $docDet['speciality'] === 'MS Urology' ? 'selected' : '';  ?>>MS Urology</option>" +
                            "<option value='MS Cardiac surgery' <?php echo $docDet['speciality'] === 'MS Cardiac surgery' ? 'selected' : '';  ?>>MS Cardiac surgery</option>" +
                            "<option value='MS Cosmetic surgery' <?php echo $docDet['speciality'] === 'MS Cosmetic surgery' ? 'selected' : '';  ?>>MS Cosmetic surgery</option>" +
                            "<option value='MS ENT' <?php echo $docDet['speciality'] === 'MS ENT' ? 'selected' : '';  ?>>MS ENT</option>" +
                            "<option value='MS Ophthalmology' <?php echo $docDet['speciality'] === 'MS Ophthalmology' ? 'selected' : '';  ?>>MS Ophthalmology</option>" +
                            "<option value='MS Gynecology' <?php echo $docDet['speciality'] === 'MS Gynecology' ? 'selected' : '';  ?>>MS Gynecology</option>" +
                            "<option value='MS Obstetrics' <?php echo $docDet['speciality'] === 'MS Obstetrics' ? 'selected' : '';  ?>>MS Obstetrics</option>" +
                            "<option value='MS Orthopedics' <?php echo $docDet['speciality'] === 'MS Orthopedics' ? 'selected' : '';  ?>>MS Orthopedics</option>" +
                            "<option value='Other' <?php echo $docDet['speciality'] === 'Other' ? 'selected' : '';  ?>>Other</option>"

                        $("#doc_speciality").find("option").remove().end().append(selOptn);
                    }

                    if (special_val === "DNB") {
                        selOptn =
                            "<option value='DNB (Anaesthesiology' <?php echo $docDet['speciality'] === 'DNB (Anaesthesiology' ? 'selected' : '';  ?>>DNB (Anaesthesiology)</option>" +
                            "<option value='DNB (Dermatology and VD' <?php echo $docDet['speciality'] === 'DNB (Dermatology and VD' ? 'selected' : '';  ?>>DNB (Dermatology and VD)</option>" +
                            "<option value='DNB (Nuclear Medicine' <?php echo $docDet['speciality'] === 'DNB (Nuclear Medicine' ? 'selected' : '';  ?>>DNB (Nuclear Medicine)</option>" +
                            "<option value='DNB (OBGY)' <?php echo $docDet['speciality'] === 'DNB (OBGY)' ? 'selected' : '';  ?>>DNB (OBGY)</option>" +
                            "<option value='DNB (Ophthalmology)' <?php echo $docDet['speciality'] === 'DNB (Ophthalmology)' ? 'selected' : '';  ?>>DNB (Ophthalmology)</option> " +
                            "<option value='DNB (Orthopaedics)' <?php echo $docDet['speciality'] === 'DNB (Orthopaedics)' ? 'selected' : '';  ?>>DNB (Orthopaedics)</option> " +
                            "<option value='DNB (Otorhinolaryngology)' <?php echo $docDet['speciality'] === 'DNB (Otorhinolaryngology)' ? 'selected' : '';  ?>>DNB (Otorhinolaryngology)</option> " +
                            "<option value='DNB (Paediatrics)' <?php echo $docDet['speciality'] === 'DNB (Paediatrics)' ? 'selected' : '';  ?>>DNB (Paediatrics)</option> " +
                            "<option value='DNB (Psychiatry)' <?php echo $docDet['speciality'] === 'DNB (Psychiatry)' ? 'selected' : '';  ?>>DNB (Psychiatry)</option> " +
                            "<option value='DNB (Radio-Diagnosis)' <?php echo $docDet['speciality'] === 'DNB (Radio-Diagnosis)' ? 'selected' : '';  ?>>DNB (Radio-Diagnosis)</option> " +
                            "<option value='DNB (Radio-Therapy)' <?php echo $docDet['speciality'] === 'DNB (Radio-Therapy)' ? 'selected' : '';  ?>>DNB (Radio-Therapy)</option> " +
                            "<option value='DNB (Respiratory Disease)' <?php echo $docDet['speciality'] === 'DNB (Respiratory Disease)' ? 'selected' : '';  ?>>DNB (Respiratory Disease)</option> " +
                            "<option value='DNB (Physical Medicine and Rehabilitation' <?php echo $docDet['speciality'] === 'DNB (Physical Medicine and Rehabilitation' ? 'selected' : '';  ?>>DNB (Physical Medicine and Rehabilitation</option> " +
                            "<option value='DNB (Pathology)' <?php echo $docDet['speciality'] === 'DNB (Pathology)' ? 'selected' : '';  ?>>DNB (Pathology)</option>" +
                            "<option value='Other' <?php echo $docDet['speciality'] === 'Other' ? 'selected' : '';  ?>>Other</option>"

                        $("#doc_speciality").find("option").remove().end().append(selOptn);
                    }

                    if (special_val === "Diploma") {
                        selOptn =
                            "<option value='Allergy & Clinical Immunology' <?php echo $docDet['speciality'] === 'Allergy & Clinical Immunology' ? 'selected' : '';  ?>>Allergy & Clinical Immunology</option>" +
                            "<option value='Anesthesiology' <?php echo $docDet['speciality'] === 'Anesthesiology' ? 'selected' : '';  ?>>Anesthesiology</option>" +
                            "<option value='Clinical Pathology' <?php echo $docDet['speciality'] === 'Clinical Pathology' ? 'selected' : '';  ?>>Clinical Pathology</option>" +
                            "<option value='Community Medicine/Public Health' <?php echo $docDet['speciality'] === 'Community Medicine/Public Health' ? 'selected' : '';  ?>>Community Medicine/Public Health</option> " +
                            "<option value='Dermatology, Venereology, and Leprosy' <?php echo $docDet['speciality'] === 'Dermatology, Venereology, and Leprosy' ? 'selected' : '';  ?>>Dermatology, Venereology, and Leprosy</option>" +
                            "<option value='ENT' <?php echo $docDet['speciality'] === 'ENT' ? 'selected' : '';  ?>>ENT</option>" +
                            "<option value='Forensic Medicine' <?php echo $docDet['speciality'] === 'Forensic Medicine' ? 'selected' : '';  ?>>Forensic Medicine</option>" +
                            "<option value='Health Education' <?php echo $docDet['speciality'] === 'Health Education' ? 'selected' : '';  ?>>Health Education</option>" +
                            "<option value='Health Administration' <?php echo $docDet['speciality'] === 'Health Administration' ? 'selected' : '';  ?>>Health Administration</option>" +
                            "<option value='Immunohematology & Blood Transfusion' <?php echo $docDet['speciality'] === 'Immunohematology & Blood Transfusion' ? 'selected' : '';  ?>>Immunohematology & Blood Transfusion</option>" +
                            "<option value='Obstetrics & Gynaecology' <?php echo $docDet['speciality'] === 'Obstetrics & Gynaecology' ? 'selected' : '';  ?>>Obstetrics & Gynaecology</option>" +
                            "<option value='Occupational Health' <?php echo $docDet['speciality'] === 'Occupational Health' ? 'selected' : '';  ?>>Occupational Health</option>" +
                            "<option value='Ophthalmology' <?php echo $docDet['speciality'] === 'Ophthalmology' ? 'selected' : '';  ?>>Ophthalmology</option>" +
                            "<option value='Orthopedics' <?php echo $docDet['speciality'] === 'Orthopedics' ? 'selected' : '';  ?>>Orthopedics</option>" +
                            "<option value='Otorhinolaryngology' <?php echo $docDet['speciality'] === 'Otorhinolaryngology' ? 'selected' : '';  ?>>Otorhinolaryngology</option>" +
                            "<option value='Pediatrics' <?php echo $docDet['speciality'] === 'Pediatrics' ? 'selected' : '';  ?>>Pediatrics</option>" +
                            "<option value='Psychiatry' <?php echo $docDet['speciality'] === 'Psychiatry' ? 'selected' : '';  ?>>Psychiatry</option>" +
                            "<option value='Physical Medicine & Rehabilitation' <?php echo $docDet['speciality'] === 'Physical Medicine & Rehabilitation' ? 'selected' : '';  ?>>Physical Medicine & Rehabilitation</option>" +
                            "<option value='Pulmonary medicine' <?php echo $docDet['speciality'] === 'Pulmonary medicine' ? 'selected' : '';  ?>>Pulmonary medicine</option>" +
                            "<option value='Radio-diagnosis' <?php echo $docDet['speciality'] === 'Radio-diagnosis' ? 'selected' : '';  ?>>Radio-diagnosis</option>" +
                            "<option value='Radiation Medicine' <?php echo $docDet['speciality'] === 'Radiation Medicine' ? 'selected' : '';  ?>>Radiation Medicine</option>" +
                            "<option value='Sports Medicine' <?php echo $docDet['speciality'] === 'Sports Medicine' ? 'selected' : '';  ?>>Sports Medicine</option>" +
                            "<option value='Tropical medicine' <?php echo $docDet['speciality'] === 'Tropical medicine' ? 'selected' : '';  ?>>Tropical medicine</option>" +
                            "<option value='Tuberculosis & Chest Diseases' <?php echo $docDet['speciality'] === 'Tuberculosis & Chest Diseases' ? 'selected' : '';  ?>>Tuberculosis & Chest Diseases</option>" +
                            "<option value='Virology' <?php echo $docDet['speciality'] === 'Virology' ? 'selected' : '';  ?>>Virology</option>" +
                            "<option value='Other' <?php echo $docDet['speciality'] === 'Other' ? 'selected' : '';  ?>>Other</option>"
                        $("#doc_speciality").find("option").remove().end().append(selOptn);
                    }

                    if (special_val === "DM") {
                        selOptn =
                            "<option value='Cardiology'  <?php echo $docDet['speciality'] === 'Cardiology' ? 'selected' : '';  ?>>Cardiology</option>" +
                            "<option value='Clinical Haematology'  <?php echo $docDet['speciality'] === 'Clinical Haematology' ? 'selected' : '';  ?>>Clinical Haematology</option>" +
                            "<option value='Clinical Immunology & Rheumatology'  <?php echo $docDet['speciality'] === 'Clinical Immunology & Rheumatology' ? 'selected' : '';  ?>>Clinical Immunology & Rheumatology</option>" +
                            "<option value='Endocrinology'  <?php echo $docDet['speciality'] === 'Endocrinology' ? 'selected' : '';  ?>>Endocrinology</option>" +
                            "<option value='Geriatric Mental Health'  <?php echo $docDet['speciality'] === 'Geriatric Mental Health' ? 'selected' : '';  ?>>Geriatric Mental Health</option>" +
                            "<option value='Hepatology'  <?php echo $docDet['speciality'] === 'Hepatology' ? 'selected' : '';  ?>>Hepatology</option>" +
                            "<option value='Infectious Disease'  <?php echo $docDet['speciality'] === 'Infectious Disease' ? 'selected' : '';  ?>>Infectious Disease</option>" +
                            "<option value='Medical Genetics'  <?php echo $docDet['speciality'] === 'Medical Genetics' ? 'selected' : '';  ?>>Medical Genetics</option>" +
                            "<option value='Medical Oncology'  <?php echo $docDet['speciality'] === 'Medical Oncology' ? 'selected' : '';  ?>>Medical Oncology</option>" +
                            "<option value='Neonatology'  <?php echo $docDet['speciality'] === 'Neonatology' ? 'selected' : '';  ?>>Neonatology</option>" +
                            "<option value='Nephrology'  <?php echo $docDet['speciality'] === 'Nephrology' ? 'selected' : '';  ?>>Nephrology</option>" +
                            "<option value='Neuro Radiology'  <?php echo $docDet['speciality'] === 'Neuro Radiology' ? 'selected' : '';  ?>>Neuro Radiology</option>" +
                            "<option value='Interventional Radiology'  <?php echo $docDet['speciality'] === 'Interventional Radiology' ? 'selected' : '';  ?>>Interventional Radiology</option>" +
                            "<option value='Neurology'  <?php echo $docDet['speciality'] === 'Neurology' ? 'selected' : '';  ?>>Neurology</option>" +
                            "<option value='Onco-Pathology'  <?php echo $docDet['speciality'] === 'Onco-Pathology' ? 'selected' : '';  ?>>Onco-Pathology</option>" +
                            "<option value='Other'  <?php echo $docDet['speciality'] === 'Other' ? 'selected' : '';  ?>>Other</option>"
                        $("#doc_speciality").find("option").remove().end().append(selOptn);
                    }

                    if (special_val === "MCH") {
                        selOptn =
                            "<option value='Endocrine Surgery'  <?php echo $docDet['speciality'] === 'Endocrine Surgery' ? 'selected' : '';  ?>>Endocrine Surgery</option>" +
                            "<option value='Gynaecological Oncology'  <?php echo $docDet['speciality'] === 'Gynaecological Oncology' ? 'selected' : '';  ?>>Gynaecological Oncology</option>" +
                            "<option value='Hand Surgery'  <?php echo $docDet['speciality'] === 'Hand Surgery' ? 'selected' : '';  ?>>Hand Surgery</option>" +
                            "<option value='Head and Neck Surgery'  <?php echo $docDet['speciality'] === 'Head and Neck Surgery' ? 'selected' : '';  ?>>Head and Neck Surgery</option>" +
                            "<option value='Hepato Pancreato Biliary Surgery'  <?php echo $docDet['speciality'] === 'Hepato Pancreato Biliary Surgery' ? 'selected' : '';  ?>>Hepato Pancreato Biliary Surgery</option>" +
                            "<option value='Neurosurgery'  <?php echo $docDet['speciality'] === 'Neurosurgery' ? 'selected' : '';  ?>>Neurosurgery</option>" +
                            "<option value='Paediatric Cardiothoracic Vascular Surgery'  <?php echo $docDet['speciality'] === 'Paediatric Cardiothoracic Vascular Surgery' ? 'selected' : '';  ?>>Paediatric Cardiothoracic Vascular Surgery</option>" +
                            "<option value='Paediatric Surgery'  <?php echo $docDet['speciality'] === 'Paediatric Surgery' ? 'selected' : '';  ?>>Paediatric Surgery</option>" +
                            "<option value='Plastic & Reconstructive Surgery'  <?php echo $docDet['speciality'] === 'Plastic & Reconstructive Surgery' ? 'selected' : '';  ?>>Plastic & Reconstructive Surgery</option>" +
                            "<option value='Reproductive Medicine & Surgery'  <?php echo $docDet['speciality'] === 'Reproductive Medicine & Surgery' ? 'selected' : '';  ?>>Reproductive Medicine & Surgery</option>" +
                            "<option value='Surgical Gastroenterology/ G.I. Surgery'  <?php echo $docDet['speciality'] === 'Surgical Gastroenterology/ G.I. Surgery' ? 'selected' : '';  ?>>Surgical Gastroenterology/ G.I. Surgery</option>" +
                            "<option value='Surgical Oncology'  <?php echo $docDet['speciality'] === 'Surgical Oncology' ? 'selected' : '';  ?>>Surgical Oncology</option>" +
                            "<option value='Thoracic Surgery'  <?php echo $docDet['speciality'] === 'Thoracic Surgery' ? 'selected' : '';  ?>>Thoracic Surgery</option>" +
                            "<option value='Urology/Genito-Urinary Surgery'  <?php echo $docDet['speciality'] === 'Urology/Genito-Urinary Surgery' ? 'selected' : '';  ?>>Urology/Genito-Urinary Surgery</option>" +
                            "<option value='Vascular Surgery'  <?php echo $docDet['speciality'] === 'Vascular Surgery' ? 'selected' : '';  ?>>Vascular Surgery</option>" +
                            "<option value='Other'  <?php echo $docDet['speciality'] === 'Other' ? 'selected' : '';  ?>>Other</option>"
                        $("#doc_speciality").find("option").remove().end().append(selOptn);
                    }



                }

            });
        </script>

    <?php endif; ?>

    <script>
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".doc.searchDoc").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();



                reader.onload = function(e) {

                    $('#prevpic').attr('src', e.target.result);

                }



                reader.readAsDataURL(input.files[0]);

            }

        }

        $("#email").keyup(function() {

            var email = $("#email").val();
            console.log(email);


            $.ajax({

                url: '<?php echo site_url('hospital_Controller/checkEmail') ?>',

                method: 'POST',

                data: {
                    email: email,

                },

                success: function(response) {

                    //  console.log(response);
                    const data = $('#email_res').html(response)

                    //  if(data){
                    // document.getElementById('addDoc').disabled = true;
                    //  }
                    //  else{
                    //     document.getElementById('addDoc').disabled = false;
                    //  }
                }



            });

        });



        $("#regis_num").keyup(function() {
            //  function get_regis(){

            var council = document.getElementById('state_medical_council').value
            var regis = document.getElementById('regis_num').value
            console.log(council);
            console.log(regis);

            $.ajax({
                type: 'POST',
                data: {
                    'council': council,
                    'regis': regis
                },
                url: "<?php echo base_url('hospital_Controller/check_regis_num') ?>",
                success: function(data) {
                    if (data == "success") {

                        jQuery("#regis_num").attr('style', 'border:1px solid #e74c3c');
                        jQuery("#regis_error").attr('style', 'visibility:block');
                    }
                    if (data == "error") {
                        document.getElementById('regis_num').removeAttribute('style');
                        jQuery("#regis_error").attr('style', 'visibility:hidden');
                    }

                }
            });

        });

        $('#doc_speciality').change(function() {
            var speciality = $(this).val();

            console.log(speciality);

            if (speciality == "Other") {

                document.getElementById('Other_speciality').style.display = 'block';
            } else {
                document.getElementById('Other_speciality').style.display = 'none';
            }
        });

        $('#doc_degree').change(function() {

            //alert($(this).val());

            var degree_data = $(this).val();
            console.log(degree_data);
            if (degree_data == "" || degree_data == "Other") {
                document.getElementById('dis_specialization').style.display = 'none';
            } else {
                document.getElementById('dis_specialization').style.display = 'block';
            }

            if (degree_data == "Other") {
                document.getElementById('Other_degree').style.display = 'block';
            } else {
                document.getElementById('Other_degree').style.display = 'none';
            }


            // $.ajax({
            // type: 'POST', 
            // data: {'degree_name': degree_data },       
            // url: "<?php echo base_url('hospital_Controller/get_doc_degee') ?>", 
            // success: function (data) {

            //$('#doc_specialization').val(data);
            if (degree_data == "UG") {

                selOptn =
                    "<option value=''>Select</option>" +
                    "<option value='MBBS'>MBBS</option>" +
                    "<option value='BDS'>BDS</option>" +
                    "<option value='BAMS '>BAMS </option>" +
                    "<option value='BUMS'>BUMS</option>" +
                    "<option value='BHMS '>BHMS </option>" +
                    "<option value='BYNS'>BYNS</option>" +
                    "<option value='B.V.Sc & AH'>B.V.Sc & AH</option>" +
                    "<option value='Other'>Other</option>"
                $("#doc_specialization").find("option").remove().end().append(selOptn);
                // $('#doc_specialization').append(selOptn);
            }
            if (degree_data == "PG") {

                selOptn =
                    "<option value=''>Select</option>" +
                    "<option value='MD'>MD</option>" +
                    "<option value='MS'>MS</option>" +
                    "<option value='DNB'>DNB</option>" +
                    "<option value='Diploma'>Diploma</option>" +
                    "<option value='Other'>Other</option>"
                // $(this).prev('select').remove();
                //$('#doc_specialization').last().remove();

                $("#doc_specialization").find("option").remove().end().append(selOptn);
                // $('#doc_specialization').append(selOptn);
            }
            if (degree_data == "Super Specialization") {
                // document.getElementById('s_degree').style.display='block';
                // document.getElementById('always_show').style.display='none';
                // document.getElementById('doc_specialization').style.display='none';
                // document.getElementById('p_degree').style.display='none';
                //console.log(data) ;
                selOptn =
                    "<option value=''>Select</option>" +
                    "<option value='DM'>DM</option>" +
                    "<option value='MCH'>MCH</option>" +
                    "<option value='Other'>Other</option>"
                $("#doc_specialization").find("option").remove().end().append(selOptn);

                //$('#doc_specialization').append(selOptn);
            }
            //$("#divContent").html(degree_data);
            if (degree_data == " ") {
                // document.getElementById('s_degree').style.display='none';
                // document.getElementById('always_show').style.display='block';
                // document.getElementById('doc_specialization').style.display='none';
                // document.getElementById('p_degree').style.display='none';
                //console.log(data) ;
                selOptn =
                    "<option value=''>Select</option>"

                $("#doc_specialization").find("option").remove().end().append(selOptn);
            }


            //  if(data == "UG" )
            //  {
            //     selOptn = 
            //     "<option value='MBBS'>MBBS</option>"+
            //     "<option value='MBBS'>MBBS</option>"+
            //     "<option value='MBBS'>MBBS</option>"

            //  }
            //  $('#doc_specialization').append(selOptn);
            // }

            //     });
        });



        function get_speciality() {
            var special_val = document.getElementById("doc_specialization").value;
            var degree_val = document.getElementById("doc_degree").value;
            // alert(special_val)
            console.log(special_val);
            console.log(degree_val);


            if (special_val == "MBBS" || special_val == "BAMS " || special_val == "BHMS " ||
                special_val == "" || special_val == "BDS" || special_val == "BUMS" ||
                special_val == "BYNS" || special_val == "B.V.Sc & AH" || special_val == "Other") {
                document.getElementById('dis_speciality').style.display = 'none';
            } else {
                document.getElementById('dis_speciality').style.display = 'block';
            }

            //  degree has value then not show specializaiton && degree_val != ""

            if (special_val == "Other") {

                document.getElementById('Other_specialization').style.display = 'block';
            } else {
                document.getElementById('Other_specialization').style.display = 'none';
            }



            if (special_val == "MD") {
                selOptn =
                    "<option value='Anatomy'>MD in Anatomy</option>" +
                    "<option value='Anesthesia'>MD in Anesthesia</option>" +
                    "<option value='Aerospace'>MD in Aerospace Medicine</option>" +
                    "<option value='Biochemistry'>MD in Biochemistry</option>" +
                    "<option value='Dermatology'>MD in Dermatology</option>" +
                    "<option value='ENT' >MD in ENT</option>" +
                    "<option value='Medicine' >MD in Forensic Medicine</option>" +
                    "<option value='Geriatrics' >MD in Geriatrics</option>" +
                    "<option value='General Surgery' >MD in General Surgery</option>" +
                    "<option value='Ophthalmology' >MD in Ophthalmology</option>" +
                    "<option value='Obstetrics & Gynecology' >MD in Obstetrics & Gynecology</option>" +
                    "<option value='Orthopedics' >MD in Orthopedics</option> " +
                    "<option value='Other'>Other</option>"

                $("#doc_speciality").find("option").remove().end().append(selOptn);

                //$('#doc_speciality').append(selOptn);
            }
            if (special_val == "MS") {
                selOptn =
                    "<option value='MS Pediatric surgery'>MS Pediatric surgery</option>" +
                    "<option value='MS Plastic surgery'>MS Plastic surgery</option>" +
                    "<option value='MS Cardiothoracic surgery'>MS Cardiothoracic surgery</option>" +
                    "<option value='MS Urology'>MS Urology</option>" +
                    "<option value='MS Cardiac surgery'>MS Cardiac surgery</option>" +
                    "<option value='MS Cosmetic surgery'>MS Cosmetic surgery</option>" +
                    "<option value='MS ENT'>MS ENT</option>" +
                    "<option value='MS Ophthalmology'>MS Ophthalmology</option>" +
                    "<option value='MS Gynecology'>MS Gynecology</option>" +
                    "<option value='MS Obstetrics'>MS Obstetrics</option>" +
                    "<option value='MS Orthopedics'>MS Orthopedics</option>" +
                    "<option value='Other'>Other</option>"

                $("#doc_speciality").find("option").remove().end().append(selOptn);
            }

            if (special_val == "DNB") {
                selOptn =
                    "<option value='DNB (Anaesthesiology'>DNB (Anaesthesiology)</option>" +
                    "<option value='DNB (Dermatology and VD'>DNB (Dermatology and VD)</option>" +
                    "<option value='DNB (Nuclear Medicine'>DNB (Nuclear Medicine)</option>" +
                    "<option value='DNB (OBGY)'>DNB (OBGY)</option>" +
                    "<option value='DNB (Ophthalmology)'>DNB (Ophthalmology)</option> " +
                    "<option value='DNB (Orthopaedics)'>DNB (Orthopaedics)</option> " +
                    "<option value='DNB (Otorhinolaryngology)'>DNB (Otorhinolaryngology)</option> " +
                    "<option value='DNB (Paediatrics)'>DNB (Paediatrics)</option> " +
                    "<option value='DNB (Psychiatry)'>DNB (Psychiatry)</option> " +
                    "<option value='DNB (Radio-Diagnosis)'>DNB (Radio-Diagnosis)</option> " +
                    "<option value='DNB (Radio-Therapy)'>DNB (Radio-Therapy)</option> " +
                    "<option value='DNB (Respiratory Disease)'>DNB (Respiratory Disease)</option> " +
                    "<option value='DNB (Physical Medicine and Rehabilitation'>DNB (Physical Medicine and Rehabilitation</option> " +
                    "<option value='DNB (Pathology)'>DNB (Pathology)</option>" +
                    "<option value='Other'>Other</option>"

                $("#doc_speciality").find("option").remove().end().append(selOptn);
            }

            if (special_val == "Diploma") {
                selOptn =
                    "<option value='Allergy & Clinical Immunology'>Allergy & Clinical Immunology</option>" +
                    "<option value='Anesthesiology'>Anesthesiology</option>" +
                    "<option value='Clinical Pathology'>Clinical Pathology</option>" +
                    "<option value='Community Medicine/Public Health'>Community Medicine/Public Health</option> " +
                    "<option value='Dermatology, Venereology, and Leprosy'>Dermatology, Venereology, and Leprosy</option>" +
                    "<option value='ENT'>ENT</option>" +
                    "<option value='Forensic Medicine'>Forensic Medicine</option>" +
                    "<option value='Health Education'>Health Education</option>" +
                    "<option value='Health Administration'>Health Administration</option>" +
                    "<option value='Immunohematology & Blood Transfusion'>Immunohematology & Blood Transfusion</option>" +
                    "<option value='Obstetrics & Gynaecology'>Obstetrics & Gynaecology</option>" +
                    "<option value='Occupational Health'>Occupational Health</option>" +
                    "<option value='Ophthalmology'>Ophthalmology</option>" +
                    "<option value='Orthopedics'>Orthopedics</option>" +
                    "<option value='Otorhinolaryngology'>Otorhinolaryngology</option>" +
                    "<option value='Pediatrics'>Pediatrics</option>" +
                    "<option value='Psychiatry'>Psychiatry</option>" +
                    "<option value='Physical Medicine & Rehabilitation'>Physical Medicine & Rehabilitation</option>" +
                    "<option value='Pulmonary medicine'>Pulmonary medicine</option>" +
                    "<option value='Radio-diagnosis'>Radio-diagnosis</option>" +
                    "<option value='Radiation Medicine'>Radiation Medicine</option>" +
                    "<option value='Sports Medicine'>Sports Medicine</option>" +
                    "<option value='Tropical medicine'>Tropical medicine</option>" +
                    "<option value='Tuberculosis & Chest Diseases'>Tuberculosis & Chest Diseases</option>" +
                    "<option value='Virology'>Virology</option>" +
                    "<option value='Other'>Other</option>"
                $("#doc_speciality").find("option").remove().end().append(selOptn);
            }

            if (special_val == "DM") {
                selOptn =
                    "<option value='Cardiology'>Cardiology</option>" +
                    "<option value='Clinical Haematology'>Clinical Haematology</option>" +
                    "<option value='Clinical Immunology & Rheumatology'>Clinical Immunology & Rheumatology</option>" +
                    "<option value='Endocrinology'>Endocrinology</option>" +
                    "<option value='Geriatric Mental Health'>Geriatric Mental Health</option>" +
                    "<option value='Hepatology'>Hepatology</option>" +
                    "<option value='Infectious Disease'>Infectious Disease</option>" +
                    "<option value='Medical Genetics'>Medical Genetics</option>" +
                    "<option value='Medical Oncology'>Medical Oncology</option>" +
                    "<option value='Neonatology'>Neonatology</option>" +
                    "<option value='Nephrology'>Nephrology</option>" +
                    "<option value='Neuro Radiology'>Neuro Radiology</option>" +
                    "<option value='Interventional Radiology'>Interventional Radiology</option>" +
                    "<option value='Neurology'>Neurology</option>" +
                    "<option value='Onco-Pathology'>Onco-Pathology</option>" +
                    "<option value='Other'>Other</option>"
                $("#doc_speciality").find("option").remove().end().append(selOptn);
            }

            if (special_val == "MCH") {
                selOptn =
                    "<option value='Endocrine Surgery'>Endocrine Surgery</option>" +
                    "<option value='Gynaecological Oncology'>Gynaecological Oncology</option>" +
                    "<option value='Hand Surgery'>Hand Surgery</option>" +
                    "<option value='Head and Neck Surgery'>Head and Neck Surgery</option>" +
                    "<option value='Hepato Pancreato Biliary Surgery'>Hepato Pancreato Biliary Surgery</option>" +
                    "<option value='Neurosurgery'>Neurosurgery</option>" +
                    "<option value='Paediatric Cardiothoracic Vascular Surgery'>Paediatric Cardiothoracic Vascular Surgery</option>" +
                    "<option value='Paediatric Surgery'>Paediatric Surgery</option>" +
                    "<option value='Plastic & Reconstructive Surgery'>Plastic & Reconstructive Surgery</option>" +
                    "<option value='Reproductive Medicine & Surgery'>Reproductive Medicine & Surgery</option>" +
                    "<option value='Surgical Gastroenterology/ G.I. Surgery'>Surgical Gastroenterology/ G.I. Surgery</option>" +
                    "<option value='Surgical Oncology'>Surgical Oncology</option>" +
                    "<option value='Thoracic Surgery'>Thoracic Surgery</option>" +
                    "<option value='Urology/Genito-Urinary Surgery'>Urology/Genito-Urinary Surgery</option>" +
                    "<option value='Vascular Surgery'>Vascular Surgery</option>" +
                    "<option value='Other'>Other</option>"
                $("#doc_speciality").find("option").remove().end().append(selOptn);
            }
        }

        $("#propic").change(function() {

            readURL(this);

        });

        $("#signpic").change(function() {

            readsignURL(this);

        });
    </script>

    <script>
        $(document).ready(function($) {

            $(function() {

                $('#strt_time1').datetimepicker({

                    format: 'LT'

                });

                $('#end_time1').datetimepicker({

                    format: 'LT'

                });
                $('#brk_time1').datetimepicker({

                    format: 'LT'

                });





                $('#strt_time2').datetimepicker({

                    format: 'LT'

                });

                $('#end_time2').datetimepicker({

                    format: 'LT'

                });
                $('#brk_time2').datetimepicker({

                    format: 'LT'

                });





                $('#strt_time3').datetimepicker({

                    format: 'LT'

                });

                $('#end_time3').datetimepicker({

                    format: 'LT'

                });
                $('#brk_time3').datetimepicker({

                    format: 'LT'

                });





                $('#strt_time4').datetimepicker({

                    format: 'LT'

                });

                $('#end_time4').datetimepicker({

                    format: 'LT'

                });
                $('#brk_time4').datetimepicker({

                    format: 'LT'

                });






                $('#strt_time5').datetimepicker({

                    format: 'LT'

                });

                $('#end_time5').datetimepicker({

                    format: 'LT'

                });
                $('#brk_time5').datetimepicker({

                    format: 'LT'

                });





                $('#strt_time6').datetimepicker({

                    format: 'LT'

                });

                $('#end_time6').datetimepicker({

                    format: 'LT'

                });
                $('#brk_time6').datetimepicker({

                    format: 'LT'

                });






                $('#strt_time7').datetimepicker({

                    format: 'LT'

                });

                $('#end_time7').datetimepicker({

                    format: 'LT'

                });
                $('#brk_time7').datetimepicker({

                    format: 'LT'

                });






            });

        });

        $(document).ready(function() {



            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {

                removeItemButton: true,

                maxItemCount: 6,

                searchResultLimit: 7,

                renderChoiceLimit: 7

            });
        });
    </script>

    <?php if (isset($_SESSION['success'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Doctor Added Successfully',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['edit'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Doctor Updated Successfully',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
        <?php unset($_SESSION['edit']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['delete'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: 'Doctor Deleted Successfully',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
        <?php unset($_SESSION['delete']); ?>
    <?php endif; ?>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 130,
            duration: 1000,
        });
    </script>

    <?php
    if (isset($doctors)) {

    ?>


        </script>


    <?php


    } else {
        // $this->load->view('Hospital/schedule', $data);
    }
    ?>
</body>
<!-- <textarea  id="dosage" rows="3" name="dosage"></textarea> -->


</html>