<?php
if (!$_SESSION['doc_id']) {
    header('location:' . site_url('doctorProfile_Controller/docLogin'));
}

// echo "<pre>";print_r($reviewData);die; 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>My Profile</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <style>
        .page-wrapper .card-box {
            padding: 20px 20px 40px 20px;
        }
    </style>
</head>



<body>

    <!-- Navbar -->

    <?php include('navbar.php'); ?>

    <?php if ($layout == 0) : ?>

        <!-- View Profile -->

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6" data-aos="fade-right">
                        <h4 class="page-title">Profile</h4>
                    </div>

                    <div class="col-sm-5 col-6 text-right m-b-30" data-aos="fade-left">

                        <a href="<?php echo site_url('doctorProfile_Controller/edit_doc_profile/' . $doctorData['doc_id']) ?>" class="btn btn-success btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>

                    </div>

                </div>

                <div class="card-box profile-header" data-aos="fade-up">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#">
                                            <img class="avatar border" src="<?php echo $doctorData['picture'] === "" ? base_url("images/avatar.png") : $doctorData['picture']; ?>" alt=""></a>
                                    </div>
                                </div>

                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0"><?php echo $doctorData['doc_name']
                                                                                    ?></h3>
                                                <div class="staff-id">Doctor ID : <?php echo $doctorData['doc_id']

                                                                                    ?></div>

                                            </div>

                                            <div class="mt-2">


                                                <?php 
                                                if(!empty($reviewData)):

                                                if ($reviewData[0]['star_rating'] != 0) : ?>

                                                    <?php echo round($reviewData[0]['star_rating'], 1) . ' out of 5' ?><br>

                                                    <?php for ($i = 0; $i < $reviewData[0]['star_rating']; $i++) : ?>

                                                        <i class="fas fa-star text-warning"></i>

                                                    <?php endfor; ?>

                                                

                                                <?php 
                                                endif;
                                                    else :  echo '<strong>No Reviews</strong>';
                                                endif;
                                                ?>



                                        </div>

                                        </div>
                                    

                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="#"><?php echo $doctorData['phone']
                                                                                    ?></a></span>

                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>

                                                    <span class="text"><a href="#"><?php echo $doctorData['email_id']

                                                                                    ?></a></span>

                                                </li>

                                                <li>

                                                    <span class="title">Address:</span>
                                                    <span class="text"><?php echo $doctorData['city'] . ', ' . $doctorData['state']
                                                                        ?></span>
                                                </li>

                                                <li>
                                                    <span class="title">Experience:</span>
                                                    <span class="text"><?php echo $doctorData['experience']
                                                                        ?></span>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="profile-tabs">

                    <ul class="nav nav-tabs nav-tabs-bottom" data-aos="fade-up">

                        <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>


                    </ul>

                    <div class="tab-content ">

                        <div class="tab-pane show active" id="timeline">

                            <!-- New Post -->

                            <div class="row">

                                <div class="col-sm-12" data-aos="fade-right">

                                    <div class="card card-body">

                                        <form action="">

                                            <div class="form-group">

                                                <textarea name="newpost" id="newpost" cols="65" rows="7" style="width: 100%;">Write a new post!!</textarea>

                                            </div>

                                            <div class="form-group row">

                                                <div class="col-md-3">

                                                    <input type="file" id="image" name="image" class="">

                                                </div>

                                                <button type="submit" class="btn btn-dark text-white ml-auto mr-3">Post</button>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                            <!-- Timeline -->

                            <div class="row">

                                <?php foreach ($postData as $x) :

                                ?>

                                    <!-- Dynamic post content -->

                                    <div class="col-12 col-sm-7">

                                        <div class="card card-body">

                                            <div class="row">

                                                <div class="col-3 col-sm-3">

                                                    <img src="<?php //echo base_url('userUploads/' . $x['logo']) 

                                                                ?>" alt="" class="rounded-circle ml-4" style="height: 70px; width: 70px;">

                                                </div>

                                                <div class="col col-sm">

                                                    <h4><?php //echo $x['hos_name'] 

                                                        ?> <span class="status online"></span></h4>

                                                    <p><?php //echo $x['post_time'] 

                                                        ?></p>

                                                </div>

                                            </div>

                                            <div class="row justify-content-center">

                                                <div class="col-12 mt-2">

                                                    <p><?php //echo $x['post_content'] 

                                                        ?></p>

                                                </div>

                                                <?php //if ($x['image']) : 

                                                ?>

                                                <div class="col-5 mt-1 mb-2"><img src="<?php echo base_url('userUploads/' . $x['image']) ?>" class="img-thumbnail float-center" style="width: 100%;" alt=""></div>

                                                <?php //endif; 

                                                ?>

                                            </div>

                                            <div class="row justify-content-center">

                                                <div class="col-4"><a href=""><i class="fas fa-thumbs-up">&nbsp;(<?php //echo $x['like_count'] 

                                                                                                                    ?>)</i></a></div>

                                                <div class="col-4"><a href=""><i class="fas fa-comment">&nbsp;(<?php //echo $x['comment_count'] 

                                                                                                                ?>)</i></a></div>

                                                <div class="col-4"><a href=""><i class="fas fa-share">&nbsp;(<?php //echo $x['share_count'] 

                                                                                                                ?>)</i></a></div>

                                            </div>

                                        </div>

                                    </div>

                                <?php endforeach; ?>

                            </div>

                        </div>

                        <div class="tab-pane" id="hosPost">

                            <div class="row">

                                <?php foreach ($postData as $x) :

                                ?>

                                    <div class="col-12 col-sm-7">

                                        <div class="card card-body">

                                            <div class="row">

                                                <div class="col-3 col-sm-3">

                                                    <img src="<?php echo $doctorData['picture']

                                                                ?>" alt="" class="rounded-circle ml-4" style="height: 70px; width: 70px;">

                                                </div>

                                                <div class="col col-sm">

                                                    <h4><?php echo $doctorData['doc_name']

                                                        ?><span class="status offline"></span></h4>

                                                    <p><?php echo $x['post_time']

                                                        ?></p>

                                                </div>

                                            </div>

                                            <div class="row justify-content-center">

                                                <div class="col-12 mt-2">

                                                    <p><?php echo $x['post_content']

                                                        ?></p>

                                                </div>

                                                <?php if ($x['image']) : ?>

                                                    <div class="col-5 mt-1 mb-2"><img src="<?php echo base_url('userUploads/' . $x['image'])

                                                                                            ?>" class="img-thumbnail float-center" style="width: 100%;" alt=""></div>

                                                <?php endif; ?>

                                            </div>

                                            <div class="row justify-content-center">

                                                <div class="col"><a href=""><i class="fas fa-thumbs-up">&nbsp;(<?php echo $x['like_count'] ?>)</i></a></div>

                                                <div class="col"><a href=""><i class="fas fa-comment">&nbsp;(<?php echo $x['comment_count']

                                                                                                                ?>)</i></a></div>

                                                <div class="col"><a href=""><i class="fas fa-share">&nbsp;(<?php echo $x['share_count'] ?>)</i></a></div>

                                            </div>

                                        </div>

                                    </div>

                                <?php endforeach; ?>

                            </div>

                        </div>

                        <div class="tab-pane" id="bottom-tab3">

                            Tab content 3

                        </div>

                    </div>

                </div>

            </div>

        </div>

    <?php elseif ($layout == 2) : ?>

        <!-- Edit Profile-->
        <!--  -->
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6 offset-lg-2">
                        <h4 class="page-title">Edit Profile</h4>
                        <form action="<?php echo site_url('doctorProfile_Controller/updateData/' . $editData[0]['hos_id']) ?>" method="post" enctype="multipart/form-data">

                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>State Medical Council Registration Number<label style="color:red">*</label></label>
                                        <input type="number" class="form-control" name="registration_num" placeholder="Enter Medical Council Registration Number" value="<?php echo $editData[0]['registration_num']; ?>">
                                        <span class="text-danger"><?php echo  form_error('registration_num') ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Hospital ID<label style="color:red">*</label></label>
                                        <input type="text" class="form-control" name="hos_id" placeholder="Hos ID" value="<?php echo $editData[0]['hos_id']; ?>">
                                        <span class="text-danger"><?php echo  form_error('hos_id') ?></span>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="">Full Name</label>
                                    <input type="text" class="form-control" name="doc_name" value="<?php echo $editData[0]['doc_name'] ?>">
                                    <span class="text-danger"><?php echo form_error('doc_name') ?></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Email ID</label>
                                    <input type="text" class="form-control" name="email_id" value="<?php echo $editData[0]['email_id'] ?>">
                                    <span class="text-danger"><?php echo form_error('email_id') ?></span>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="">Aadhar No</label>
                                    <input type="text" class="form-control" name="adhar" value="<?php echo $editData[0]['adhar'] ?>">
                                    <span class="text-danger"><?php echo form_error('adhar') ?></span>
                                </div>

                                <div class="col-sm-6">
                                    <label for="">Phone:</label>
                                    <input type="number" class="form-control" name="phone" value="<?php echo $editData[0]['phone'] ?>">
                                    <span class="text-danger"><?php echo form_error('phone') ?></span>
                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-sm-6">
                                    <label for="">Experience:</label>
                                    <input type="number" class="form-control" name="experience" value="<?php echo $editData[0]['experience'] ?>">
                                    <span class="text-danger"><?php echo form_error('experience') ?></span>
                                </div>

                                <div class="col-sm-6">
                                    <label for="">Country:</label>
                                    <input type="text" class="form-control" name="country" value="<?php echo $editData[0]['country'] ?>">
                                    <span class="text-danger"><?php echo form_error('country') ?></span>
                                </div>
                            </div>
                            <br>

                            <div class="row">

                                <div class="col-sm-6">
                                    <label for="">State:</label>
                                    <input type="text" class="form-control" name="state" value="<?php echo $editData[0]['state'] ?>">
                                    <span class="text-danger"><?php echo form_error('state') ?></span>
                                </div>

                                <div class="col-sm-6">
                                    <label for="">Pincode:</label>
                                    <input type="text" class="form-control" name="zip" value="<?php echo $editData[0]['zip'] ?>">
                                    <span class="text-danger"><?php echo form_error('zip') ?></span>
                                </div>
                            </div>


                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Department<label style="color:red">*</label></label>
                                        <select class="form-control" name="department">
                                            <option value="">Select Department</option>
                                            <?php if (isset($depts)) : ?>
                                                <?php foreach ($depts as $x) :  ?>
                                                    <option value="<?php echo $x['dept_name'] ?>" <?php echo $x['dept_name'] === $editData[0]['department'] ? 'selected' : '' ?>><?php echo $x['dept_name'] ?>
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
                                    <div class="form-group">

                                        <label>Degree<label style="color:red">*</label></label>
                                        <select class="form-control" id="doc_degree" name="degree">
                                            <option value="">Select</option>
                                            <option value="UG" <?php echo $editData[0]['degree'] === 'UG' ? 'selected' : '' ?>>UG Degree</option>
                                            <option value="PG" <?php echo $editData[0]['degree'] === 'PG' ? 'selected' : '' ?>>PG Degree</option>
                                            <option value="Super Specialization" <?php echo $editData[0]['degree'] === 'Super Specialization' ? 'selected' : '' ?>>Super Specialization</option>
                                            <option value="Other" <?php echo $editData[0]['degree'] === 'Other' ? 'selected' : '' ?>>Other</option>

                                        </select>
                                        <span class="text-danger"><?php echo form_error('degree'); ?></span>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group" style="display:block" id="dis_specialization">
                                        <label>Specialization<label style="color:red">*</label></label>
                                        <select class="form-control" name="specialization" id="doc_specialization" onchange="get_speciality()">
                                            <option value="">Select</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('specialization'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" style="display: block;" id="dis_speciality">
                                        <label>Speciality<label style="color:red">*</label></label>
                                        <select class="form-control" name="speciality" id="doc_speciality">
                                            <option value="">Select</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('speciality'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group" style="display: none;" id="Other_degree">
                                        <label>Other Degree<label style="color:red">*</label></label>
                                        <input class="form-control" placeholder="Please Enter Other Degree" name="Others" type="text" value="<?php echo set_value('Others') ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" data-aos="fade-left" style="display:none;" id="Other_specialization">
                                        <label>Other Specialization</label>
                                        <input class="form-control" placeholder="Please Enter Other Specialization" name="Other_specialization" type="text" value="">
                                    </div>
                                </div>
                            </div>




                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="">About:</label>
                                    <input type="text" class="form-control" name="about" value="<?php echo $editData[0]['about'] ?>">
                                </div>

                                <div class="col-sm-6">
                                    <label for="">Services:</label>
                                    <input type="text" class="form-control" name="services" value="<?php echo $editData[0]['services'] ?>">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <label for="">Awards & recognition:</label>
                                    <input type="text" class="form-control" name="awards" value="<?php echo $editData[0]['awards'] ?>">
                                </div>

                                <div class="col-sm-6">
                                    <label for="">Certifications:</label>
                                    <input type="text" class="form-control" name="certifications" value="<?php echo $editData[0]['certifications'] ?>">
                                </div>
                            </div>


                            <div class="row mt-4">

                                <div class="col-sm-6">
                                    <label for="">City:</label>
                                    <input type="text" class="form-control" name="city" value="<?php echo $editData[0]['city'] ?>">
                                    <div class="text-danger"><?php echo form_error('city') ?></div>
                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Upload Image</label>

                                        <div class="profile-upload">

                                            <div class="upload-img">

                                                <img alt="" id="prevpic" src="<?php echo isset($editData[0]['picture']) ? $editData[0]['picture'] : ''; ?>" style="border: 1px solid black;">

                                            </div>

                                            <div class="upload-input">

                                                <input type="file" class="form-control" id="propic" name="picture">

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Upload Signature</label>
                                        <div class="profile-upload">
                                            <div class="upload-img">
                                                <img alt="" id="prevsignpic" src="<?php echo isset($editData[0]['signature']) ? $editData[0]['signature'] : ''; ?>" style="border: 1px solid black;">

                                            </div>

                                            <div class="upload-input">

                                                <input type="file" class="form-control" id="signpic" name="signature">

                                            </div>


                                        </div>

                                    </div>

                                </div>
                            </div>

                            <button type="submit" class="mt-3 btn btn-success">Save</button>

                        </form>
                    </div>
                </div>

            </div>

        </div>

    <?php endif; ?>

    <?php if (isset($_SESSION['update'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Profile Update',
                showConfirmButton: false,
                timer: 2000
            });
        </script>

        <?php unset($_SESSION['update']) ?>

    <?php endif; ?>
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


        let degree_data = $('#doc_degree').val();


        if (degree_data == "UG") {

            selOptn =
                "<option value=''>Select</option>" +
                "<option value='MBBS' <?php echo $editData[0]['specialization'] === 'MBBS' ? 'selected' : ''  ?> >MBBS</option>" +
                "<option value='BDS' <?php echo $editData[0]['specialization'] === 'BDS' ? 'selected' : ''  ?>>BDS</option>" +
                "<option value='BAMS ' <?php echo $editData[0]['specialization'] === 'BAMS' ? 'selected' : ''  ?>>BAMS </option>" +
                "<option value='BUMS' <?php echo $editData[0]['specialization'] === 'BUMS' ? 'selected' : ''  ?>>BUMS</option>" +
                "<option value='BHMS ' <?php echo $editData[0]['specialization'] === 'BHMS' ? 'selected' : ''  ?>>BHMS </option>" +
                "<option value='BYNS' <?php echo $editData[0]['specialization'] === 'BYNS' ? 'selected' : ''  ?>>BYNS</option>" +
                "<option value='B.V.Sc & AH' <?php echo $editData[0]['specialization'] === 'B.V.Sc & AH' ? 'selected' : ''  ?>>B.V.Sc & AH</option>" +
                "<option value='Other' <?php echo $editData[0]['specialization'] === 'Other' ? 'selected' : ''  ?>>Other</option>"
            $("#doc_specialization").find("option").remove().end().append(
                selOptn)
            // $('#doc_specialization').append(selOptn);
        }

        if (degree_data == "PG") {

            selOptn =
                "<option value=''>Select</option>" +
                "<option value='MD' <?php echo $editData[0]['specialization'] === 'MD' ? 'selected' : ''  ?>>MD</option>" +
                "<option value='MS' <?php echo $editData[0]['specialization'] === 'MS' ? 'selected' : ''  ?>>MS</option>" +
                "<option value='DNB' <?php echo $editData[0]['specialization'] === 'DNB' ? 'selected' : ''  ?>>DNB</option>" +
                "<option value='Diploma' <?php echo $editData[0]['specialization'] === 'Diploma' ? 'selected' : ''  ?>>Diploma</option>" +
                "<option value='Other' <?php echo $editData[0]['specialization'] === 'Other' ? 'selected' : ''  ?>>Other</option>"
            // $(this).prev('select').remove();
            //$('#doc_specialization').last().remove();

            $("#doc_specialization").find("option").remove().end().append(
                selOptn)
            // $('#doc_specialization').append(selOptn);
        }
        if (degree_data == "Super Specialization") {

            selOptn =
                "<option value=''>Select</option>" +
                "<option value='DM' <?php echo $editData[0]['specialization'] === 'DM' ? 'selected' : ''  ?>>DM</option>" +
                "<option value='MCH' <?php echo $editData[0]['specialization'] === 'MCH' ? 'selected' : ''  ?>>MCH</option>" +
                "<option value='Other' <?php echo $editData[0]['specialization'] === 'MCH' ? 'selected' : ''  ?>>Other</option>"
            $("#doc_specialization").find("option").remove().end().append(
                selOptn)


        }
        //$("#divContent").html(degree_data);
        if (degree_data == " ") {

            selOptn =
                "<option value=''>Select</option>"

            $("#doc_specialization").find("option").remove().end().append(
                selOptn)
        }


        let special_val = $('#doc_specialization').find(":selected").val();

        if (special_val == "MD") {
            selOptn =
                "<option value='Anatomy' <?php echo $editData[0]['speciality'] === 'Anatomy' ? 'selected' : '' ?>>MD in Anatomy</option>" +
                "<option value='Anesthesia' <?php echo $editData[0]['speciality'] === 'Anesthesia' ? 'selected' : '' ?>>MD in Anesthesia</option>" +
                "<option value='Aerospace' <?php echo $editData[0]['speciality'] === 'Aerospace' ? 'selected' : '' ?>>MD in Aerospace Medicine</option>" +
                "<option value='Biochemistry' <?php echo $editData[0]['speciality'] === 'Biochemistry' ? 'selected' : '' ?>>MD in Biochemistry</option>" +
                "<option value='Dermatology' <?php echo $editData[0]['speciality'] === 'Dermatology' ? 'selected' : '' ?>>MD in Dermatology</option>" +
                "<option value='ENT' <?php echo $editData[0]['speciality'] === 'ENT' ? 'selected' : '' ?>>MD in ENT</option>" +
                "<option value='Medicine' <?php echo $editData[0]['speciality'] === 'Medicine' ? 'selected' : '' ?>>MD in Forensic Medicine</option>" +
                "<option value='Geriatrics' <?php echo $editData[0]['speciality'] === 'Geriatrics' ? 'selected' : '' ?>>MD in Geriatrics</option>" +
                "<option value='General Surgery' <?php echo $editData[0]['speciality'] === 'General Surgery' ? 'selected' : '' ?>>MD in General Surgery</option>" +
                "<option value='Ophthalmology' <?php echo $editData[0]['speciality'] === 'Ophthalmology' ? 'selected' : '' ?>>MD in Ophthalmology</option>" +
                "<option value='Obstetrics & Gynecology' <?php echo $editData[0]['speciality'] === 'Obstetrics & Gynecology' ? 'selected' : '' ?>>MD in Obstetrics & Gynecology</option>" +
                "<option value='Orthopedics' <?php echo $editData[0]['speciality'] === 'Orthopedics' ? 'selected' : '' ?>>MD in Orthopedics</option> " +
                "<option value='Other' <?php echo $editData[0]['speciality'] === 'Other' ? 'selected' : '' ?>>Other</option>"

            $("#doc_speciality").find("option").remove().end().append(selOptn)

            //$('#doc_speciality').append(selOptn);
        }
        if (special_val == "MS") {
            selOptn =
                "<option value='MS Pediatric surgery' <?php echo $editData[0]['speciality'] === 'MS Pediatric surgery' ? 'selected' : '' ?>>MS Pediatric surgery</option>" +
                "<option value='MS Plastic surgery' <?php echo $editData[0]['speciality'] === 'MS Plastic surgery' ? 'selected' : '' ?>>MS Plastic surgery</option>" +
                "<option value='MS Cardiothoracic surgery' <?php echo $editData[0]['speciality'] === 'MS Cardiothoracic surgery' ? 'selected' : '' ?>>MS Cardiothoracic surgery</option>" +
                "<option value='MS Urology' <?php echo $editData[0]['speciality'] === 'MS Urology' ? 'selected' : '' ?>>MS Urology</option>" +
                "<option value='MS Cardiac surgery' <?php echo $editData[0]['speciality'] === 'MS Cardiac surgery' ? 'selected' : '' ?>>MS Cardiac surgery</option>" +
                "<option value='MS Cosmetic surgery' <?php echo $editData[0]['speciality'] === 'MS Cosmetic surgery' ? 'selected' : '' ?>>MS Cosmetic surgery</option>" +
                "<option value='MS ENT' <?php echo $editData[0]['speciality'] === 'MS ENT' ? 'selected' : '' ?>>MS ENT</option>" +
                "<option value='MS Ophthalmology' <?php echo $editData[0]['speciality'] === 'MS Ophthalmology' ? 'selected' : '' ?>>MS Ophthalmology</option>" +
                "<option value='MS Gynecology' <?php echo $editData[0]['speciality'] === 'MS Gynecology' ? 'selected' : '' ?>>MS Gynecology</option>" +
                "<option value='MS Obstetrics' <?php echo $editData[0]['speciality'] === 'MS Obstetrics' ? 'selected' : '' ?>>MS Obstetrics</option>" +
                "<option value='MS Orthopedics' <?php echo $editData[0]['speciality'] === 'MS Orthopedics' ? 'selected' : '' ?>>MS Orthopedics</option>" +
                "<option value='Other' <?php echo $editData[0]['speciality'] === 'Other' ? 'selected' : '' ?>>Other</option>"

            $("#doc_speciality").find("option").remove().end().append(selOptn)
        }

        if (special_val == "DNB") {
            selOptn =
                "<option value='DNB (Anaesthesiology' <?php echo $editData[0]['speciality'] === 'DNB (Anaesthesiology' ? 'selected' : '' ?>>DNB (Anaesthesiology)</option>" +
                "<option value='DNB (Dermatology and VD' <?php echo $editData[0]['speciality'] === 'DNB (Dermatology and VD' ? 'selected' : '' ?>>DNB (Dermatology and VD)</option>" +
                "<option value='DNB (Nuclear Medicine' <?php echo $editData[0]['speciality'] === 'DNB (Nuclear Medicine' ? 'selected' : '' ?>>DNB (Nuclear Medicine)</option>" +
                "<option value='DNB (OBGY)' <?php echo $editData[0]['speciality'] === 'DNB (OBGY)' ? 'selected' : '' ?>>DNB (OBGY)</option>" +
                "<option value='DNB (Ophthalmology)' <?php echo $editData[0]['speciality'] === 'DNB (Ophthalmology)' ? 'selected' : '' ?>>DNB (Ophthalmology)</option> " +
                "<option value='DNB (Orthopaedics)' <?php echo $editData[0]['speciality'] === 'DNB (Orthopaedics)' ? 'selected' : '' ?>>DNB (Orthopaedics)</option> " +
                "<option value='DNB (Otorhinolaryngology)' <?php echo $editData[0]['speciality'] === 'DNB (Otorhinolaryngology)' ? 'selected' : '' ?>>DNB (Otorhinolaryngology)</option> " +
                "<option value='DNB (Paediatrics)' <?php echo $editData[0]['speciality'] === 'DNB (Paediatrics)' ? 'selected' : '' ?>>DNB (Paediatrics)</option> " +
                "<option value='DNB (Psychiatry)' <?php echo $editData[0]['speciality'] === 'DNB (Psychiatry)' ? 'selected' : '' ?>>DNB (Psychiatry)</option> " +
                "<option value='DNB (Radio-Diagnosis)' <?php echo $editData[0]['speciality'] === 'DNB (Radio-Diagnosis)' ? 'selected' : '' ?>>DNB (Radio-Diagnosis)</option> " +
                "<option value='DNB (Radio-Therapy)' <?php echo $editData[0]['speciality'] === 'DNB (Radio-Therapy)' ? 'selected' : '' ?>>DNB (Radio-Therapy)</option> " +
                "<option value='DNB (Respiratory Disease)' <?php echo $editData[0]['speciality'] === 'DNB (Respiratory Disease)' ? 'selected' : '' ?>>DNB (Respiratory Disease)</option> " +
                "<option value='DNB (Physical Medicine and Rehabilitation' <?php echo $editData[0]['speciality'] === 'DNB (Physical Medicine and Rehabilitation' ? 'selected' : '' ?>>DNB (Physical Medicine and Rehabilitation</option> " +
                "<option value='DNB (Pathology)' <?php echo $editData[0]['speciality'] === 'DNB (Pathology)' ? 'selected' : '' ?>>DNB (Pathology)</option>" +
                "<option value='Other' <?php echo $editData[0]['speciality'] === 'Other' ? 'selected' : '' ?>>Other</option>"

            $("#doc_speciality").find("option").remove().end().append(selOptn)
        }

        if (special_val == "Diploma") {
            selOptn =
                "<option value='Allergy & Clinical Immunology' <?php echo $editData[0]['speciality'] === 'Allergy & Clinical Immunology' ? 'selected' : '' ?>>Allergy & Clinical Immunology</option>" +
                "<option value='Anesthesiology' <?php echo $editData[0]['speciality'] === 'Anesthesiology' ? 'selected' : '' ?>>Anesthesiology</option>" +
                "<option value='Clinical Pathology' <?php echo $editData[0]['speciality'] === 'Clinical Pathology' ? 'selected' : '' ?>>Clinical Pathology</option>" +
                "<option value='Community Medicine/Public Health' <?php echo $editData[0]['speciality'] === 'Community Medicine/Public Health' ? 'selected' : '' ?>>Community Medicine/Public Health</option> " +
                "<option value='Dermatology, Venereology, and Leprosy' <?php echo $editData[0]['speciality'] === 'Dermatology, Venereology, and Leprosy' ? 'selected' : '' ?>>Dermatology, Venereology, and Leprosy</option>" +
                "<option value='ENT' <?php echo $editData[0]['speciality'] === 'ENT' ? 'selected' : '' ?>>ENT</option>" +
                "<option value='Forensic Medicine' <?php echo $editData[0]['speciality'] === 'Forensic Medicine' ? 'selected' : '' ?>>Forensic Medicine</option>" +
                "<option value='Health Education' <?php echo $editData[0]['speciality'] === 'Health Education' ? 'selected' : '' ?>>Health Education</option>" +
                "<option value='Health Administration' <?php echo $editData[0]['speciality'] === 'Health Administration' ? 'selected' : '' ?>>Health Administration</option>" +
                "<option value='Immunohematology & Blood Transfusion' <?php echo $editData[0]['speciality'] === 'Immunohematology & Blood Transfusion' ? 'selected' : '' ?>>Immunohematology & Blood Transfusion</option>" +
                "<option value='Obstetrics & Gynaecology' <?php echo $editData[0]['speciality'] === 'Obstetrics & Gynaecology' ? 'selected' : '' ?>>Obstetrics & Gynaecology</option>" +
                "<option value='Occupational Health' <?php echo $editData[0]['speciality'] === 'Occupational Health' ? 'selected' : '' ?>>Occupational Health</option>" +
                "<option value='Ophthalmology' <?php echo $editData[0]['speciality'] === 'Ophthalmology' ? 'selected' : '' ?>>Ophthalmology</option>" +
                "<option value='Orthopedics' <?php echo $editData[0]['speciality'] === 'Orthopedics' ? 'selected' : '' ?>>Orthopedics</option>" +
                "<option value='Otorhinolaryngology' <?php echo $editData[0]['speciality'] === 'Otorhinolaryngology' ? 'selected' : '' ?>>Otorhinolaryngology</option>" +
                "<option value='Pediatrics' <?php echo $editData[0]['speciality'] === 'Pediatrics' ? 'selected' : '' ?>>Pediatrics</option>" +
                "<option value='Psychiatry' <?php echo $editData[0]['speciality'] === 'Psychiatry' ? 'selected' : '' ?>>Psychiatry</option>" +
                "<option value='Physical Medicine & Rehabilitation' <?php echo $editData[0]['speciality'] === 'Physical Medicine & Rehabilitation' ? 'selected' : '' ?>>Physical Medicine & Rehabilitation</option>" +
                "<option value='Pulmonary medicine' <?php echo $editData[0]['speciality'] === 'Pulmonary medicine' ? 'selected' : '' ?>>Pulmonary medicine</option>" +
                "<option value='Radio-diagnosis' <?php echo $editData[0]['speciality'] === 'Radio-diagnosis' ? 'selected' : '' ?>>Radio-diagnosis</option>" +
                "<option value='Radiation Medicine' <?php echo $editData[0]['speciality'] === 'Radiation Medicine' ? 'selected' : '' ?>>Radiation Medicine</option>" +
                "<option value='Sports Medicine' <?php echo $editData[0]['speciality'] === 'Sports Medicine' ? 'selected' : '' ?>>Sports Medicine</option>" +
                "<option value='Tropical medicine' <?php echo $editData[0]['speciality'] === 'Tropical medicine' ? 'selected' : '' ?>>Tropical medicine</option>" +
                "<option value='Tuberculosis & Chest Diseases' <?php echo $editData[0]['speciality'] === 'Tuberculosis & Chest Diseases' ? 'selected' : '' ?>>Tuberculosis & Chest Diseases</option>" +
                "<option value='Virology' <?php echo $editData[0]['speciality'] === 'Virology' ? 'selected' : '' ?>>Virology</option>" +
                "<option value='Other' <?php echo $editData[0]['speciality'] === 'Other' ? 'selected' : '' ?>>Other</option>"
            $("#doc_speciality").find("option").remove().end().append(selOptn)
        }

        if (special_val == "DM") {
            selOptn =
                "<option value='Cardiology' <?php echo $editData[0]['speciality'] === 'Cardiology' ? 'selected' : '' ?>>Cardiology</option>" +
                "<option value='Clinical Haematology' <?php echo $editData[0]['speciality'] === 'Clinical Haematology' ? 'selected' : '' ?>>Clinical Haematology</option>" +
                "<option value='Clinical Immunology & Rheumatology' <?php echo $editData[0]['speciality'] === 'Clinical Immunology & Rheumatology' ? 'selected' : '' ?>>Clinical Immunology & Rheumatology</option>" +
                "<option value='Endocrinology' <?php echo $editData[0]['speciality'] === 'Endocrinology' ? 'selected' : '' ?>>Endocrinology</option>" +
                "<option value='Geriatric Mental Health' <?php echo $editData[0]['speciality'] === 'Geriatric Mental Health' ? 'selected' : '' ?>>Geriatric Mental Health</option>" +
                "<option value='Hepatology' <?php echo $editData[0]['speciality'] === 'Hepatology' ? 'selected' : '' ?>>Hepatology</option>" +
                "<option value='Infectious Disease' <?php echo $editData[0]['speciality'] === 'Infectious Disease' ? 'selected' : '' ?>>Infectious Disease</option>" +
                "<option value='Medical Genetics' <?php echo $editData[0]['speciality'] === 'Medical Genetics' ? 'selected' : '' ?>>Medical Genetics</option>" +
                "<option value='Medical Oncology' <?php echo $editData[0]['speciality'] === 'Medical Oncology' ? 'selected' : '' ?>>Medical Oncology</option>" +
                "<option value='Neonatology' <?php echo $editData[0]['speciality'] === 'Neonatology' ? 'selected' : '' ?>>Neonatology</option>" +
                "<option value='Nephrology' <?php echo $editData[0]['speciality'] === 'Nephrology' ? 'selected' : '' ?>>Nephrology</option>" +
                "<option value='Neuro Radiology' <?php echo $editData[0]['speciality'] === 'Neuro Radiology' ? 'selected' : '' ?>>Neuro Radiology</option>" +
                "<option value='Interventional Radiology' <?php echo $editData[0]['speciality'] === 'Interventional Radiology' ? 'selected' : '' ?>>Interventional Radiology</option>" +
                "<option value='Neurology' <?php echo $editData[0]['speciality'] === 'Neurology' ? 'selected' : '' ?>>Neurology</option>" +
                "<option value='Onco-Pathology' <?php echo $editData[0]['speciality'] === 'Onco-Pathology' ? 'selected' : '' ?>>Onco-Pathology</option>" +
                "<option value='Other' <?php echo $editData[0]['speciality'] === 'Other' ? 'selected' : '' ?>>Other</option>"
            $("#doc_speciality").find("option").remove().end().append(selOptn)
        }

        if (special_val == "MCH") {
            selOptn =
                "<option value='Endocrine Surgery' <?php echo $editData[0]['speciality'] === 'Endocrine Surgery' ? 'selected' : '' ?>>Endocrine Surgery</option>" +
                "<option value='Gynaecological Oncology' <?php echo $editData[0]['speciality'] === 'Gynaecological Oncology' ? 'selected' : '' ?>>Gynaecological Oncology</option>" +
                "<option value='Hand Surgery' <?php echo $editData[0]['speciality'] === 'Hand Surgery' ? 'selected' : '' ?>>Hand Surgery</option>" +
                "<option value='Head and Neck Surgery' <?php echo $editData[0]['speciality'] === 'Head and Neck Surgery' ? 'selected' : '' ?>>Head and Neck Surgery</option>" +
                "<option value='Hepato Pancreato Biliary Surgery' <?php echo $editData[0]['speciality'] === 'Hepato Pancreato Biliary Surgery' ? 'selected' : '' ?>>Hepato Pancreato Biliary Surgery</option>" +
                "<option value='Neurosurgery' <?php echo $editData[0]['speciality'] === 'Neurosurgery' ? 'selected' : '' ?>>Neurosurgery</option>" +
                "<option value='Paediatric Cardiothoracic Vascular Surgery' <?php echo $editData[0]['speciality'] === 'Paediatric Cardiothoracic Vascular Surgery' ? 'selected' : '' ?>>Paediatric Cardiothoracic Vascular Surgery</option>" +
                "<option value='Paediatric Surgery' <?php echo $editData[0]['speciality'] === 'Paediatric Surgery' ? 'selected' : '' ?>>Paediatric Surgery</option>" +
                "<option value='Plastic & Reconstructive Surgery' <?php echo $editData[0]['speciality'] === 'Plastic & Reconstructive Surgery' ? 'selected' : '' ?>>Plastic & Reconstructive Surgery</option>" +
                "<option value='Reproductive Medicine & Surgery' <?php echo $editData[0]['speciality'] === 'Reproductive Medicine & Surgery' ? 'selected' : '' ?>>Reproductive Medicine & Surgery</option>" +
                "<option value='Surgical Gastroenterology/ G.I. Surgery' <?php echo $editData[0]['speciality'] === 'Surgical Gastroenterology/ G.I. Surgery' ? 'selected' : '' ?>>Surgical Gastroenterology/ G.I. Surgery</option>" +
                "<option value='Surgical Oncology' <?php echo $editData[0]['speciality'] === 'Surgical Oncology' ? 'selected' : '' ?>>Surgical Oncology</option>" +
                "<option value='Thoracic Surgery' <?php echo $editData[0]['speciality'] === 'Thoracic Surgery' ? 'selected' : '' ?>>Thoracic Surgery</option>" +
                "<option value='Urology/Genito-Urinary Surgery' <?php echo $editData[0]['speciality'] === 'Urology/Genito-Urinary Surgery' ? 'selected' : '' ?>>Urology/Genito-Urinary Surgery</option>" +
                "<option value='Vascular Surgery' <?php echo $editData[0]['speciality'] === 'Vascular Surgery' ? 'selected' : '' ?>>Vascular Surgery</option>" +
                "<option value='Other' <?php echo $editData[0]['speciality'] === 'Other' ? 'selected' : '' ?>>Other</option>"
            $("#doc_speciality").find("option").remove().end().append(selOptn)
        }



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
                $("#doc_specialization").find("option").remove().end().append(
                    selOptn)
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

                $("#doc_specialization").find("option").remove().end().append(
                    selOptn)
                // $('#doc_specialization').append(selOptn);
            }
            if (degree_data == "Super Specialization") {

                selOptn =
                    "<option value=''>Select</option>" +
                    "<option value='DM'>DM</option>" +
                    "<option value='MCH'>MCH</option>" +
                    "<option value='Other'>Other</option>"
                $("#doc_specialization").find("option").remove().end().append(
                    selOptn)


            }
            //$("#divContent").html(degree_data);
            if (degree_data == " ") {

                selOptn =
                    "<option value=''>Select</option>"

                $("#doc_specialization").find("option").remove().end().append(
                    selOptn)
            }

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

        $("#signpic").change(function() {

            readsignURL(this);

        });
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 130,
            duration: 1000,
        });
    </script>

</body>



</html>