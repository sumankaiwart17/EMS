<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <title>Doctors</title>

    <style></style>

</head>



<body>

    <!-- Navbar -->

    <?php include('navbar.php'); ?>

    <?php if ($layout == 0) : ?>

        <!-- View Doctors -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-sm-4 col-3">

                        <h4 class="page-title">Doctors</h4>

                    </div>

                    <div class="col-sm-8 col-9 text-right m-b-20">

                        <a href="<?php echo site_url('hospital/add-doctor') ?>" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Doctor</a>

                    </div>

                </div>

                <div class="row doctor-grid">

                    <?php $modal = 0; ?>

                    <?php foreach ($assocDoc as $x) : ?>

                        <?php $modal = $modal + 1; ?>

                        <div class="col-md-4 col-sm-4  col-lg-3">

                            <div class="profile-widget">

                                <div class="doctor-img">

                                    <a class="avatar" data-toggle="modal" data-target="#exampleModalCenter<?php echo $modal ?>" href=""><img alt="" src="<?php echo $x['picture'] ?>"></a>

                                </div>

                                <div class="dropdown profile-action">

                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>

                                    <div class="dropdown-menu dropdown-menu-right">

                                        <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/editDoc/' . $x['doc_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                        <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/delDoc/' . $x['doc_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                    </div>

                                </div>

                                <h4 class="doctor-name text-ellipsis"><a data-toggle="modal" data-target="#exampleModalCenter<?php echo $modal ?>" href="profile.html"><?php echo $x['doc_name'] ?></a></h4>

                                <div class="doc-prof"><?php echo $x['dept_name'] ?></div>

                                <div class="user-country">

                                    <i class="fas fa-map-marker"></i>&nbsp; <?php echo $x['city'] . ', ' . $x['state'] ?>

                                </div>

                                <div class="mt-2">

                                    <?php if ($x['star_rating'] != 0) : ?>

                                        <?php echo round($x['star_rating'], 1) . '/5' ?><br>

                                        <?php for ($i = 0; $i < $x['star_rating']; $i++) : ?>

                                            <i class="fas fa-star text-warning"></i>

                                        <?php endfor; ?>

                                    <?php else :  echo 'No Reviews'; ?>

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

                                                    <h4 class="text-info" style="border-bottom: 4px solid #17a2b8!important">Dr. <?php echo $x['doc_name'] . "'s" ?> Information</h4>

                                                </div>

                                                <div class="col-12 col-sm-6 mt-2">

                                                    <p class="text-info"><strong style="border-bottom: 2px solid #17a2b8!important"> Address:</strong></p>

                                                    <p><?php echo $x['city'] . ', ' . $x['state'] . ', ' . $x['country'] . ',' ?></p>

                                                    <p>Pincode: <?php echo $x['zip'] ?></p>userUploads

                                                </div>

                                                <div class="col-12 col-sm-6 mt-2">

                                                    <p class="text-info"><strong style="border-bottom: 2px solid #17a2b8!important"> Contact:</strong></p>

                                                    <p>Phone: <?php echo $x['phone'] ?></p>

                                                    <p>Email: <?php echo $x['email_id'] ?></p>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-12 col-sm-12">

                                                    <h4 class="text-info" style="border-bottom: 2px solid #17a2b8!important">Experience</h4>

                                                    <p><?php echo $x['experience'] ?></p>

                                                </div>

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

    <?php elseif ($layout == 1) : ?>

        <!-- Add Doctor -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <h4 class="page-title">Add Doctor</h4>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form action="<?php echo site_url('hospital_Controller/addDoc') ?>" method="post" enctype="multipart/form-data">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>License No.</label>

                                        <input class="form-control" name="docId" type="text" value="<?php echo set_value('docId') ?>">

                                        <span class="text-danger"><?php echo form_error('docId') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Full Name</label>

                                        <input class="form-control" name="docName" type="text" value="<?php echo set_value('docName') ?>">

                                        <span class="text-danger"><?php echo form_error('docName') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-12">

                                    <div class="form-group">

                                        <label>Email</label>

                                        <input class="form-control" name="emailId" type="email" value="<?php echo set_value('emailId') ?>">

                                        <span class="text-danger"><?php echo form_error('emailId') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Password</label>

                                        <input class="form-control" name="pass" type="password" value="<?php echo set_value('pass') ?>">

                                        <span class="text-danger"><?php echo form_error('pass') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Confirm Password</label>

                                        <input class="form-control" name="cpass" type="password" value="<?php echo set_value('cpass') ?>">

                                        <span class="text-danger"><?php echo form_error('cpass') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Adhar No.</label>

                                        <input type="text" name="adhar" class="form-control " value="<?php echo set_value('adhar') ?>">

                                        <span class="text-danger"><?php echo form_error('adhar') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Specialization</label>

                                        <input type="text" name="specialization" class="form-control " value="<?php echo set_value('specialization') ?>">

                                        <span class="text-danger"><?php echo form_error('specialization') ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Avatar</label>

                                        <div class="profile-upload">

                                            <div class="upload-img">

                                                <img alt="" id="prevpic" src="<?php echo base_url('images/user.jpg') ?>">

                                            </div>

                                            <div class="upload-input">

                                                <input type="file" class="form-control" id="propic" name="picture">

                                                <!--<span class="text-danger"></span>--->

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-12">

                                    <div class="row">

                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group">

                                                <label>Country</label>

                                                <input type="text" name="country" class="form-control " value="<?php echo set_value('country') ?>">

                                                <span class="text-danger"><?php echo form_error('country') ?></span>

                                            </div>

                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group">

                                                <label>City</label>

                                                <input type="text" name="city" class="form-control" value="<?php echo set_value('city') ?>">

                                                <span class="text-danger"><?php echo form_error('city') ?></span>

                                            </div>

                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group">

                                                <label>State/Province</label>

                                                <input type="text" name="state" class="form-control " value="<?php echo set_value('state') ?>">

                                                <span class="text-danger"><?php echo form_error('state') ?></span>

                                            </div>

                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-3">

                                            <div class="form-group">

                                                <label>Postal Code</label>

                                                <input type="text" name="zip" class="form-control" value="<?php echo set_value('zip') ?>">

                                                <span class="text-danger"><?php echo form_error('zip') ?></span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Phone </label>

                                        <input class="form-control" name="phone" type="text" value="<?php echo set_value('phone') ?>">

                                        <span class="text-danger"><?php echo form_error('phone') ?></span>

                                    </div>

                                </div>

                            </div>

                            <div class="m-t-20 text-center">

                                <button class="btn btn-primary submit-btn">Add Doctor</button>

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

                                        <label>License No.</label>

                                        <input class="form-control" name="docId" readonly type="text" value="<?php echo $docReg['doc_id'] ?>">

                                        <span class="text-danger"><?php echo form_error('docId') ?></span>

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

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Phone </label>

                                        <input class="form-control" name="phone" type="text" value="<?php echo $docDet['phone'] ?>">

                                        <span class="text-danger"><?php echo form_error('phone') ?></span>

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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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



        $("#propic").change(function() {

            readURL(this);

        });

    </script>

</body>



</html>