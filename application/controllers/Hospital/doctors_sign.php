<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <title>Doctors</title>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <style>
        .action-icon {
            font-size: 15px !important;
        }

        .avatar>img {
            width: 100%;

            display: block;

            height: 100px !important;
            object-fit: cover !important;
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
                        <div class="row">
                        <div class="col-sm-6">
                        
                            <input type="text"class="form-control mb-3"placeholder="Search patinets" style="width:250px" id="search" >
                          
                            </div>
                            <div class="col-sm-3 pb-3 m-auto" >
                        
        <i class="fa fa-search" aria-hidden="true"></i>                          
                            </div>
                            
                        </div>


                    </div>   
                    
                  
                      
                   

                    <div class="col-sm-8 col-9 text-right m-b-20" data-aos="fade-left">

                        <a href="<?php echo site_url('hospital_Controller/addDoc') ?>" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Doctor</a>

                    </div>

                </div>

                <div class="row doctor-grid">





                    <?php if ($assocDoc !== '') : ?>
                        <?php $modal = 0 ?>
                        <?php
                        foreach ($assocDoc as $x) : ?>

                            <?php $modal = $modal + 1 ?>


                            <div class="col-md-4 col-sm-4  col-lg-3" id="FindDoctors">

                                <div class="profile-widget" data-aos="flip-up">

                                    <div class="doctor-img">

                                        <a class="avatar" data-toggle="modal" data-target="#exampleModalCenter<?php echo $modal ?>">
                                            <img alt="" src="<?php echo $x['picture'] ?>"></a>

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



                                        <div class="modal-body" >

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

                                                </div>

                                                <div class="row">

                                                    <div class="col-12 col-sm-12">

                                                        <h4 class="text-info" style="border-bottom: 2px solid #17a2b8!important">
                                                            Experience</h4>

                                                        <p><?php echo $x['experience'] ?></p>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        <?php endforeach; ?>

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

                    <div class="col-lg-8 offset-lg-2" data-aos="fade-right">

                        <h4 class="page-title">Add Doctor</h4>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form action="<?php echo site_url('hospital_Controller/addDoc') ?>" method="post" enctype="multipart/form-data">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-left">

                                        <label>State Medical Council Registrations Number<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Enter Medical Council Registrations Number" name="registration_num" id="regis_num" type="number" value="<?php echo set_value('registration_num') ?>" required>
                                        <!-- onchange="get_regis()" -->
                                        <!-- <span class="text-danger"><?php echo form_error('registration_num') ?></span> -->
                                        <span class="text-danger" id="regis_error" style="display:none">Registration Number Already Exist</span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>State Medical Council<label style="color:red">*</label></label>

                                        <!-- <input class="form-control" placeholder="Enter State Medical Council" name="state_medical_council"
                                        type="text" value="<?php echo set_value('state_medical_council') ?>" required>

                                    <span class="text-danger"><?php echo form_error('state_medical_council') ?></span> -->
                                        <select class="form-control" id="state_medical_council" name="state_medical_council">
                                            <option value="" selected>Select</option>
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

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>Full Name<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Please Enter Name" name="docName" type="text" value="<?php echo set_value('docName') ?>" required>

                                        <span class="text-danger"><?php echo form_error('docName') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-left">

                                        <label>Email<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Please Enter Email" name="emailId" type="email" value="<?php echo set_value('emailId') ?>" required>

                                        <span class="text-danger"><?php echo form_error('emailId') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>Phone<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Please Enter Mobile Number" name="phone" type="text" value="<?php echo set_value('phone') ?>" required>

                                        <span class="text-danger"><?php echo form_error('phone') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-left">

                                        <label>Adhar No.<label style="color:red">*</label></label>

                                        <input type="number" placeholder="Please Enter Adhar No" name="adhar" class="form-control " value="<?php echo set_value('adhar') ?>" required>

                                        <span class="text-danger"><?php echo form_error('adhar') ?></span>

                                    </div>

                                </div>



                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>Password<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Passsword Atleast 6 Char" name="pass" type="password" value="<?php echo set_value('pass') ?>" required>

                                        <span class="text-danger"><?php echo form_error('pass') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-left">

                                        <label>Confirm Password<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Confirm Password Must Match" name="cpass" type="password" value="<?php echo set_value('cpass') ?>" required>

                                        <span class="text-danger"><?php echo form_error('cpass') ?></span>

                                    </div>

                                </div>



                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>Department<label style="color:red">*</label></label>

                                        <select class="form-control" name="department">

                                            <option value="">Select Department</option>

                                            <option value="Ophthalmologist">Ophthalmologist</option>
                                            <option value="Dermatologist">Dermatologist</option>
                                            <option value="Cardiologist">Cardiologist</option>
                                            <option value="Psychiatrist">Psychiatrist</option>
                                            <option value="Gastroenterologist">Gastroenterologist</option>
                                            <option value="Ear-Nose-Throat (ENT)">Ear-Nose-Throat (ENT)</option>
                                            <option value="Gynecologist / Obstetrician">Gynecologist / Obstetrician</option>
                                            <option value="Neurologist">Neurologist</option>
                                            <option value="Urologist">Urologist</option>
                                            <option value="Dentist">Dentist</option>

                                            <?php if (isset($depts)) : ?>

                                                <?php foreach ($depts as $x) :  ?>


                                                    <option value="<?php echo $x['dept_id'] ?>"><?php echo $x['dept_name'] ?>
                                                    </option>

                                                <?php endforeach; ?>
                                            <?php else : ?>

                                            <?php endif; ?>


                                        </select>

                                        <!-- <span style='color:blue;'>Note:you Need add specilization otherwise you can't add dcoctors</span> -->


                                        <span class="text-danger"><?php echo form_error('department') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>Years of experience<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Please Enter Experience" name="experience" type="number" value="<?php echo set_value('experience') ?>" required>

                                        <span class="text-danger"><?php echo form_error('experience') ?></span>

                                    </div>

                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>Degree<label style="color:red">*</label></label>
                                        <select class="form-control" id="doc_degree" name="degree" required>
                                            <option value="" selected>Select</option>
                                            <option value="UG">UG Degree</option>
                                            <option value="PG">PG Degree</option>
                                            <option value="Super Specialization">Super Specialization</option>
                                            <option value="Other">Other</option>

                                        </select>
                                    </div>



                                </div>



                                <div class="col-sm-6" style="display:none;" id="Other_degree" data-aos="fade-left">

                                    <div class="form-group" data-aos="fade-left">

                                        <label>Other Degree<label style="color:red">*</label></label>

                                        <input class="form-control" placeholder="Please Enter Other Degree" name="Others" type="text" value="<?php echo set_value('Others') ?>">

                                        <span class="text-danger"><?php echo form_error('Others') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6" style="display:none" id="dis_specialization">

                                    <div class="form-group" data-aos="fade-left">

                                        <label>Specialization<label style="color:red">*</label></label>


                                        <select class="form-control" name="specialization" id="doc_specialization" onchange="get_speciality()">
                                            <option value="">Select</option>
                                            <!-- <option value="MBBS">MBBS</option>
                                        <option value="BDS">BDS</option>
                                        <option value="BAMS ">BAMS </option>
                                        <option value="BUMS">BUMS</option>
                                        <option value="BHMS ">BHMS </option>
                                        <option value="BYNS">BYNS</option>
                                        <option value="B.V.Sc & AH">B.V.Sc & AH</option>  -->
                                        </select>
                                        <!-- <select class="form-control" name="specialization1" id="p_degree"  style="display:none">
                                        <option value="" selected>select</option>
                                        <option value="MD">MD</option>
                                        <option value="MS">MS</option>
                                        <option value="DNB">DNB</option>
                                        <option value="Diploma">Diploma</option>
                                    </select>

                                    <select class="form-control" name="specialization2" id="s_degree"  style="display:none">
                                        <option value="" selected>Select</option> 
                                        <option value="DM">DM</option>
                                        <option value="MCH">MCH</option>

                                    </select>

                                    <select class="form-control" name="specialization3" id="always_show">
                                        <option value="">select</option>
                                    </select> -->

                                    </div>

                                </div>



                                <div class="col-sm-6" style="display:none;" id="Other_specialization">

                                    <div class="form-group" data-aos="fade-left">

                                        <label>Other Specialization</label>

                                        <input class="form-control" placeholder="Please Enter Other Specialization" name="Other_specialization" type="text" value="<?php echo set_value('Other_specialization') ?>">

                                        <span class="text-danger"><?php echo form_error('Other_specialization') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6" style="display:none" id="dis_speciality">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>Speciality<label style="color:red">*</label></label>


                                        <select class="form-control" name="speciality" id="doc_speciality">
                                            <option value="">Select</option>
                                        </select>

                                        <!-- <select class="form-control" id ="MD_Speciality" name="speciality"  style="display:none" >
                                        <option value=" " selected>Select</option> 
                                        <option value="Anatomy">MD in Anatomy</option>
                                        <option value="Anesthesia">MD in Anesthesia</option>
                                        <option value="Aerospace">MD in Aerospace MedicineSuper Specialization</option>
                                        <option value="Biochemistry">MD in Biochemistry</option>
                                        <option value="Dermatology">MD in Dermatology</option>  
                                        <option value="ENT" >MD in ENT</option>  
                                        <option value="Medicine" >MD in Forensic Medicine</option>  
                                        <option value="Geriatrics" >MD in Geriatrics</option>  
                                        <option value="General Surgery" >MD in General Surgery</option>  
                                        <option value="Ophthalmology" >MD in Ophthalmology</option>  
                                        <option value="Obstetrics & Gynecology" >MD in Obstetrics & Gynecology</option>  
                                        <option value="Orthopedics" >MD in Orthopedics</option>  
                                    </select>
                                    <select class="form-control" id ="MS_Speciality" name="speciality"  style="display:none" >
                                        <option value="" selected>Select</option> 
                                        <option value="MS Pediatric surgery">MS Pediatric surgery</option>
                                        <option value="MS Plastic surgery">MS Plastic surgery</option>
                                        <option value="MS Cardiothoracic surgery">MS Cardiothoracic surgery</option>
                                        <option value="MS Urology" >MS Urology</option> 
                                        <option value="MS Cardiac surgery" >MS Cardiac surgery</option> 
                                        <option value="MS Cosmetic surgery" >MS Cosmetic surgery</option> 
                                        <option value="MS ENT" >MS ENT</option> 
                                        <option value="MS Ophthalmology" >MS Ophthalmology</option> 
                                        <option value="MS Gynecology" >MS Gynecology</option> 
                                        <option value="MS Obstetrics" >MS Obstetrics</option> 
                                        <option value="MS Orthopedics" >MS Orthopedics</option>  
                                    </select>
                                    <select class="form-control" id ="DNB_Speciality" name="speciality"  style="display:none">
                                        <option value=" " selected>Select</option> 
                                        <option value="DNB (Anaesthesiology)">DNB (Anaesthesiology)</option>
                                        <option value="DNB (Dermatology and VD)">DNB (Dermatology and VD)</option>
                                        <option value="DNB (Nuclear Medicine)">DNB (Nuclear Medicine)</option>
                                        <option value="DNB (OBGY)" >DNB (OBGY)</option> 
                                        <option value="DNB (Ophthalmology)" >DNB (Ophthalmology)</option> 
                                        <option value="DNB (Orthopaedics)" >DNB (Orthopaedics)</option> 
                                        <option value="DNB (Otorhinolaryngology)" >DNB (Otorhinolaryngology)</option> 
                                        <option value="DNB (Paediatrics)" >DNB (Paediatrics)</option> 
                                        <option value="DNB (Psychiatry)" >DNB (Psychiatry)</option> 
                                        <option value="DNB (Radio-Diagnosis)" >DNB (Radio-Diagnosis)</option> 
                                        <option value="DNB (Radio-Therapy)" >DNB (Radio-Therapy)</option> 
                                        <option value="DNB (Respiratory Disease)" >DNB (Respiratory Disease)</option> 
                                        <option value="DNB (Physical Medicine and Rehabilitation" >DNB (Physical Medicine and Rehabilitation</option> 
                                        <option value="DNB (Pathology)">DNB (Pathology)</option>
                                        
                                    </select>
                                    <select class="form-control" id ="Diploma_Speciality" name="speciality"  style="display:none">
                                        <option value=" " selected>Select</option> 
                                        <option value="Allergy & Clinical Immunology">Allergy & Clinical Immunology</option>
                                        <option value="Anesthesiology">Anesthesiology</option>
                                        <option value="Clinical Pathology">Clinical Pathology</option>
                                        <option value="Community Medicine/Public Health">Community Medicine/Public Health</option> 
                                        <option value="Dermatology, Venereology, and Leprosy">Dermatology, Venereology, and Leprosy</option>
                                        <option value="ENT">ENT</option>
                                        <option value="Forensic Medicine">Forensic Medicine</option>
                                        <option value="Health Education">Health Education</option>
                                        <option value="Health Administration">Health Administration</option>
                                        <option value="Immunohematology & Blood Transfusion">Immunohematology & Blood Transfusion</option>
                                        <option value="Obstetrics & Gynaecology">Obstetrics & Gynaecology</option>
                                        <option value="Occupational Health">Occupational Health</option>
                                        <option value="Ophthalmology">Ophthalmology</option>
                                        <option value="Orthopedics">Orthopedics</option>
                                        <option value="Otorhinolaryngology">Otorhinolaryngology</option>
                                        <option value="Pediatrics">Pediatrics</option>
                                        <option value="Psychiatry">Psychiatry</option>
                                        <option value="Physical Medicine & Rehabilitation">Physical Medicine & Rehabilitation</option>
                                        <option value="Pulmonary medicine">Pulmonary medicine</option>
                                        <option value="Radio-diagnosis">Radio-diagnosis</option>
                                        <option value="Radiation Medicine">Radiation Medicine</option>
                                        <option value="Sports Medicine">Sports Medicine</option>
                                        <option value="Tropical medicine">Tropical medicine</option>
                                        <option value="Tuberculosis & Chest Diseases">Tuberculosis & Chest Diseases</option>
                                        <option value="Virology">Virology</option>
                                    </select>
                                    <select class="form-control" id ="Dm_sup_Speciality" name="speciality"  style="display:none">
                                         <option value="Cardiology">Cardiology</option>
                                         <option value="Clinical Haematology">Clinical Haematology</option>
                                         <option value="Clinical Immunology & Rheumatology">Clinical Immunology & Rheumatology</option>
                                         <option value="Endocrinology">Endocrinology</option>
                                         <option value="Geriatric Mental Health">Geriatric Mental Health</option>
                                         <option value="Hepatology">Hepatology</option>
                                         <option value="Infectious Disease">Infectious Disease</option>
                                         <option value="Medical Genetics">Medical Genetics</option>
                                         <option value="Medical Oncology">Medical Oncology</option>
                                         <option value="Neonatology">Neonatology</option>
                                         <option value="Nephrology">Nephrology</option>
                                         <option value="Neuro Radiology">Neuro Radiology</option>
                                         <option value="Interventional Radiology">Interventional Radiology</option>
                                         <option value="Neurology">Neurology</option>
                                         <option value="Onco-Pathology">Onco-Pathology</option>
                                         
                                    </select>
                                    <select class="form-control" id ="Mch_sup_Speciality" name="speciality"  style="display:none">
                                         <option value="Endocrine Surgery">Endocrine Surgery</option>
                                         <option value="Gynaecological Oncology">Gynaecological Oncology</option>
                                         <option value="Hand Surgery">Hand Surgery</option>
                                         <option value="Head and Neck Surgery">Head and Neck Surgery</option>
                                         <option value="Hepato Pancreato Biliary Surgery">Hepato Pancreato Biliary Surgery</option>
                                         <option value="Neurosurgery">Neurosurgery</option>
                                         <option value="Paediatric Cardiothoracic Vascular Surgery">Paediatric Cardiothoracic Vascular Surgery</option>
                                         <option value="Paediatric Surgery">Paediatric Surgery</option>
                                         <option value="Plastic & Reconstructive Surgery">Plastic & Reconstructive Surgery</option>
                                         <option value="Reproductive Medicine & Surgery">Reproductive Medicine & Surgery</option>
                                         <option value="Surgical Gastroenterology/ G.I. Surgery">Surgical Gastroenterology/ G.I. Surgery</option>
                                         <option value="Surgical Oncology">Surgical Oncology</option>
                                         <option value="Thoracic Surgery">Thoracic Surgery</option>
                                         <option value="Urology/Genito-Urinary Surgery">Urology/Genito-Urinary Surgery</option>
                                         <option value="Vascular Surgery">Vascular Surgery</option>
                                    </select> -->
                                    </div>
                                </div>

                                <div class="col-sm-6" style="display:none;" id="Other_speciality">

                                    <div class="form-group" data-aos="fade-left">

                                        <label>Other Speciality</label>

                                        <input class="form-control" placeholder="Please Enter Other Speciality" name="Other_speciality" type="text" value="<?php echo set_value('Other_speciality') ?>" style="margin-top: 10px;">

                                        <span class="text-danger"><?php echo form_error('Other_speciality') ?></span>

                                    </div>

                                </div>


                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-left">

                                        <label>About</label>

                                        <input class="form-control" placeholder="Please Enter About" name="about" type="text" value="<?php echo set_value('about') ?>">

                                        <span class="text-danger"><?php echo form_error('about') ?></span>

                                    </div>

                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>Services</label>

                                        <input class="form-control" placeholder="Please Enter Services" name="services" type="text" value="<?php echo set_value('services') ?>">

                                        <span class="text-danger"><?php echo form_error('services') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-left">

                                        <label>Awards & recognition</label>

                                        <input class="form-control" placeholder="Please Enter Awards" name="awards" type="text" value="<?php echo set_value('awards') ?>">

                                        <span class="text-danger"><?php echo form_error('awards') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>Certifications</label>

                                        <input class="form-control" placeholder="Please Enter Certifications" name="certifications" type="text" value="<?php echo set_value('certifications') ?>">

                                        <span class="text-danger"><?php echo form_error('certifications') ?></span>

                                    </div>

                                </div>


                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>Upload Image</label>

                                        <div class="profile-upload">

                                            <div class="upload-img">

                                                <img alt="" id="prevpic" src="<?php echo base_url('images/user.jpg') ?>">

                                            </div>

                                            <div class="upload-input">

                                                <input type="file" class="form-control" id="propic" name="picture" required>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>Upload Signature</label>

                                        <div class="profile-upload">

                                            <div class="upload-img">

                                                <img alt="" id="prevpic" src="<?php echo base_url('images/user.jpg') ?>">

                                            </div>

                                            <div class="upload-input">

                                                <input type="file" class="form-control" name="signature" required>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-12">

                                    <div class="row">

                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group" data-aos="fade-left">

                                                <label>Country<label style="color:red">*</label></label>

                                                <!-- <input type="text" name="country" class="form-control " placeholder="Enter country"
                                                value="<?php echo set_value('country') ?>" required>

                                            <span class="text-danger"><?php echo form_error('country') ?></span> -->

                                                <select class="form-control" name="country" required>
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

                                            </div>

                                        </div>




                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group" data-aos="fade-right">

                                                <label>City<label style="color:red">*</label></label>

                                                <input type="text" name="city" class="form-control" placeholder="Enter City" value="<?php echo set_value('city') ?>" required>

                                                <span class="text-danger"><?php echo form_error('city') ?></span>

                                            </div>

                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group" data-aos="fade-right">

                                                <label>State/Province<label style="color:red">*</label></label>

                                                <!-- <input type="text" name="state" class="form-control " placeholder="Enter state"
                                                value="<?php echo set_value('state') ?>" required>

                                            <span class="text-danger"><?php echo form_error('state') ?></span> -->

                                                <select name="state" class="form-control" required>
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




                                            </div>

                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group" data-aos="fade-left">

                                                <label>Postal Code<label style="color:red">*</label></label>

                                                <input type="text" name="zip" class="form-control" placeholder="Enter Postal Code" value="<?php echo set_value('zip') ?>" required>

                                                <span class="text-danger"><?php echo form_error('zip') ?></span>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                            </div>

                            <div class="m-t-20 text-center">

                                <button id="submit" class="btn btn-primary submit-btn">Add Doctor</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    <?php elseif ($layout == 2) : ?>

        <!-- Edit Doctor -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <h4 class="page-title">Edit Doctor</h4>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form action="<?php echo site_url('hospital_Controller/editDoc') ?>" method="post" enctype="multipart/form-data">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Avatar</label>

                                        <div class="profile-upload">

                                            <div class="upload-img">

                                                <img alt="" id="prevpic" src="<?php echo $docDet['picture'] ?>">

                                            </div>

                                            <div class="upload-input">

                                                <input type="file" class="form-control" id="propic" name="picture">

                                                <span class="text-danger"><?php if (isset($error)) {

                                                                                echo $error;
                                                                            } ?></span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>State Medical Council Registrations Number</label>

                                        <input class="form-control" name="registration_num" readonly type="text" value="<?php echo $docReg['registration_num'] ?>">

                                        <span class="text-danger"><?php echo form_error('registration_num') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Full Name</label>

                                        <input class="form-control" name="docName" type="text" value="<?php echo $docReg['doc_name'] ?>">

                                        <span class="text-danger"><?php echo form_error('docName') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Specialization</label>

                                        <input type="text" name="specialization" class="form-control " value="<?php echo $docDet['specialization'] ?>">




                                        <span class="text-danger"><?php echo form_error('specialization') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-12">

                                    <div class="form-group">

                                        <label>Email</label>

                                        <input class="form-control" name="emailId" type="email" value="<?php echo $docDet['email_id'] ?>">

                                        <span class="text-danger"><?php echo form_error('emailId') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Adhar No.</label>

                                        <input type="text" name="adhar" class="form-control " value="<?php echo $docReg['adhar'] ?>">

                                        <span class="text-danger"><?php echo form_error('adhar') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Degree</label>

                                        <input type="text" name="degree" class="form-control " value="<?php echo $docDet['degree'] ?>">

                                        <span class="text-danger"><?php echo form_error('degree') ?></span>

                                    </div>

                                </div>


                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Speciality</label>

                                        <input type="text" name="speciality" class="form-control " value="<?php echo $docDet['speciality'] ?>">

                                        <span class="text-danger"><?php echo form_error('speciality') ?></span>

                                    </div>

                                </div>


                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Years of experience</label>

                                        <input type="text" name="experience" class="form-control " value="<?php echo $docDet['experience'] ?>">

                                        <span class="text-danger"><?php echo form_error('experience') ?></span>

                                    </div>

                                </div>


                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>About</label>

                                        <input type="text" name="about" class="form-control " value="<?php echo $docDet['about'] ?>">

                                        <span class="text-danger"><?php echo form_error('about') ?></span>

                                    </div>

                                </div>


                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Services</label>

                                        <input type="text" name="services" class="form-control " value="<?php echo $docDet['services'] ?>">

                                        <span class="text-danger"><?php echo form_error('services') ?></span>

                                    </div>

                                </div>


                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Awards & recognition</label>

                                        <input type="text" name="awards" class="form-control " value="<?php echo $docDet['awards'] ?>">

                                        <span class="text-danger"><?php echo form_error('awards') ?></span>

                                    </div>

                                </div>


                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Certifications</label>

                                        <input type="text" name="certifications" class="form-control " value="<?php echo $docDet['certifications'] ?>">

                                        <span class="text-danger"><?php echo form_error('certifications') ?></span>

                                    </div>

                                </div>



                                <div class="col-sm-12">

                                    <div class="row">

                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group">

                                                <label>Country</label>

                                                <input type="text" name="country" class="form-control " value="<?php echo $docDet['country'] ?>">

                                                <span class="text-danger"><?php echo form_error('country') ?></span>

                                            </div>

                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group">

                                                <label>City</label>

                                                <input type="text" name="city" class="form-control" value="<?php echo $docDet['city'] ?>">

                                                <span class="text-danger"><?php echo form_error('city') ?></span>

                                            </div>

                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group">

                                                <label>State/Province</label>

                                                <input type="text" name="state" class="form-control " value="<?php echo $docDet['state'] ?>">

                                                <span class="text-danger"><?php echo form_error('state') ?></span>

                                            </div>

                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group">

                                                <label>Postal Code</label>

                                                <input type="text" name="zip" class="form-control" value="<?php echo $docDet['zip'] ?>">

                                                <span class="text-danger"><?php echo form_error('zip') ?></span>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                            </div>

                            <div class="m-t-20 text-center">

                                <button class="btn btn-primary submit-btn">Save Changes</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



    <script>
        $("#search").on("keyup", function() {

            var date = $(this).val().toLowerCase();


            console.log(date);
            $("#FindDoctors ").filter(function() {

                $(this).toggle($(this).text().toLowerCase().indexOf(date) > -1)

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

        $('#state_medical_council').change(function() {
            var council = $(this).val();
            var regis = document.getElementById('regis_num').value
            console.log(council);
            console.log(regis);

            $.ajax({
                type: 'POST',
                data: {
                    'council': council,
                    'regis': regis
                },
                url: "<?php echo base_url('hospital_Controller/check_regis_num_councile') ?>",
                success: function(data) {
                    if (data == "success") {

                        jQuery("#regis_num").attr('style', 'border:1px solid #e74c3c');
                        jQuery("#regis_error").attr('style', 'visibility:block');
                    } else {
                        // jQuery("#regis_num").attr('style','border:1px solid black');
                        // jQuery("#regis_error").attr('style','visibility:none');
                    }

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
                    if (data == "error") {
                        document.getElementById('regis_num').removeAttribute('style');
                        //jQuery("#regis_num").attr('style','border:1px solid black');
                        jQuery("#regis_error").attr('style', 'visibility:hidden');
                    } else {

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
                // document.getElementById('doc_specialization').style.display='block';
                // document.getElementById('always_show').style.display='none';
                // document.getElementById('p_degree').style.display='none';
                // document.getElementById('s_degree').style.display='none';
                //console.log(data) ;
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
                $("#doc_specialization").find("option").remove().end().append(
                    selOptn)
                // $('#doc_specialization').append(selOptn);
            }
            if (degree_data == "PG") {
                // document.getElementById('p_degree').style.display='block';
                // document.getElementById('always_show').style.display='none';
                // document.getElementById('s_degree').style.display='none';
                // document.getElementById('doc_specialization').style.display='none';
                // console.log(data) ;
                selOptn =
                    "<option value=''>Select</option>" +
                    "<option value='MD'>MD</option>" +
                    "<option value='MS'>MS</option>" +
                    "<option value='DNB'>DNB</option>" +
                    "<option value='Diploma'>Diploma</option>" +
                    "<option value='Other'>Other</option>"
                // $(this).prev('select').remove();
                //$('#doc_specialization').last().remove();

                $("#doc_specialization").find("option").remove().end().append(
                    selOptn)
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
                $("#doc_specialization").find("option").remove().end().append(
                    selOptn)

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

                $("#doc_specialization").find("option").remove().end().append(
                    selOptn)
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


        // $("#p_degree").change(function() {
        //      var speciliazation_data = $(this).val();
        //     console.log(speciliazation_data);
        //     if(speciliazation_data == "MD")
        //     {
        //          document.getElementById('MD_Speciality').style.display='block';
        //             document.getElementById('doc_speciality').style.display='none';
        //             document.getElementById('MS_Speciality').style.display='none';
        //             document.getElementById('DNB_Speciality').style.display='none';
        //             document.getElementById('Diploma_Speciality').style.display='none';
        //             document.getElementById('Dm_sup_Speciality').style.display='none';
        //             document.getElementById('Mch_sup_Speciality').style.display='none';
        //     }
        //        if(speciliazation_data == "MS")
        //     {
        //          document.getElementById('MD_Speciality').style.display='none';
        //             document.getElementById('doc_speciality').style.display='none';
        //             document.getElementById('MS_Speciality').style.display='block';
        //             document.getElementById('DNB_Speciality').style.display='none';
        //             document.getElementById('Diploma_Speciality').style.display='none';
        //             document.getElementById('Dm_sup_Speciality').style.display='none';
        //             document.getElementById('Mch_sup_Speciality').style.display='none';
        //     }
        //        if(speciliazation_data == "DNB")
        //     {
        //          document.getElementById('MD_Speciality').style.display='none';
        //             document.getElementById('doc_speciality').style.display='none';
        //             document.getElementById('MS_Speciality').style.display='none';
        //             document.getElementById('DNB_Speciality').style.display='block';
        //             document.getElementById('Diploma_Speciality').style.display='none';
        //             document.getElementById('Dm_sup_Speciality').style.display='none';
        //             document.getElementById('Mch_sup_Speciality').style.display='none';
        //     }
        //        if(speciliazation_data == "Diploma")
        //     {
        //          document.getElementById('MD_Speciality').style.display='none';
        //             document.getElementById('doc_speciality').style.display='none';
        //             document.getElementById('MS_Speciality').style.display='none';
        //             document.getElementById('DNB_Speciality').style.display='none';
        //             document.getElementById('Diploma_Speciality').style.display='block';
        //             document.getElementById('Dm_sup_Speciality').style.display='none';
        //             document.getElementById('Mch_sup_Speciality').style.display='none';
        //     }

        // });



        //  $("#s_degree").change(function() {
        //      var super_speciliazation_data = $(this).val();
        //     console.log(super_speciliazation_data);
        //      if(super_speciliazation_data == "DM")
        //     {
        //          document.getElementById('MD_Speciality').style.display='none';
        //             document.getElementById('doc_speciality').style.display='none';
        //             document.getElementById('MS_Speciality').style.display='none';
        //             document.getElementById('DNB_Speciality').style.display='none';
        //             document.getElementById('Diploma_Speciality').style.display='none';
        //             document.getElementById('Dm_sup_Speciality').style.display='block';
        //             document.getElementById('Mch_sup_Speciality').style.display='none';
        //     }
        //       if(super_speciliazation_data == "MCH")
        //     {
        //          document.getElementById('MD_Speciality').style.display='none';
        //             document.getElementById('doc_speciality').style.display='none';
        //             document.getElementById('MS_Speciality').style.display='none';
        //             document.getElementById('DNB_Speciality').style.display='none';
        //             document.getElementById('Diploma_Speciality').style.display='none';
        //             document.getElementById('Dm_sup_Speciality').style.display='none';
        //             document.getElementById('Mch_sup_Speciality').style.display='block';
        //     }
        //  });

        function get_speciality() {
            var special_val = document.getElementById("doc_specialization").value;
            var degree_val = document.getElementById("doc_degree").value;
            // alert(special_val)
            console.log(special_val);
            console.log(degree_val);

            //  "<option value='MBBS'>MBBS</option>"+
            //         "<option value='BDS'>BDS</option>"+
            //         "<option value='BAMS '>BAMS </option>"+
            //         "<option value='BUMS'>BUMS</option>"+
            //         "<option value='BHMS '>BHMS </option>"+
            //         "<option value='BYNS'>BYNS</option>"+
            //         "<option value='B.V.Sc & AH'>B.V.Sc & AH</option>"

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

                $("#doc_speciality").find("option").remove().end().append(selOptn)

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

                $("#doc_speciality").find("option").remove().end().append(selOptn)
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

                $("#doc_speciality").find("option").remove().end().append(selOptn)
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
                $("#doc_speciality").find("option").remove().end().append(selOptn)
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
                $("#doc_speciality").find("option").remove().end().append(selOptn)
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
                $("#doc_speciality").find("option").remove().end().append(selOptn)
            }
        }

        $("#propic").change(function() {

            readURL(this);

        });
    </script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 130,
            duration: 1000,
        });
    </script>
    <!-- <script>
        function clicked(){
            Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Successfully Added',
                        showConfirmButton: false,
                        timer: 1000
                      })
        }
      
        </script>
<?php
if (isset($doctors)) {

?>
    
 
    <script>
     clicked();
     function clicked(){
                     Swal.fire({
                         position: 'top-end',
                         icon: 'error',
                         title: 'Successfully Added',
                         showConfirmButton: false,
                         timer: 1500
                       });
                       
                     };
                     window.location = 'doctors';
                     </script>
                     <?php


                    } else {
                        // $this->load->view('Hospital/schedule', $data);
                    }
                        ?> -->
</body>
<!-- <textarea  id="dosage" rows="3" name="dosage"></textarea> -->


</html>