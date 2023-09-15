<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssUser/style.css') ?>">

    <title>AAHRS | My Account</title>

    <style>

        @media only screen and (max-width: 991.98px) {

            .text-info1 {

                margin-top: 35px;

            }


/*  */



            .mob-image {

                width: 110px !important;

                height: 95px !important;

            }



            .mob-dtls {

                margin-bottom: 15px !important;

                font-size: 20px !important;

                margin-left: 0px !important;

            }



            .mob-btn {

                margin-right: 17px;

            }

        }

    </style>

</head>



<body class="bg-body">

    <?php include('navbar.php'); ?>

    <div class="container mt-2">

        <div class="row">

            <?php include('left-sidebar.php'); ?>



            <?php if ($layout == 0) : ?>

                <!-- Profile View -->

                <div class="col-12 col-sm-12 col-md-8 col-lg-8 mob-responsive">

                    <div class="udetails">

                        <?php if ($_SESSION['sesid'] == $_SESSION['getid']) : ?>

                            <div class="row">

                                <div class="col-sm-2">

                                     <?php
                                     if(isset($userData[0]['picture']))
                                     {
                                     if($userData[0]['picture']!==''):?>
                              <img src="<?php echo $userData[0]['picture'] ?>" class="img-thumbnail rounded" alt="">
                          <?php else:?>
                            <img src="<?php echo base_url('images/avatar.png')?>" class="img-thumbnail rounded"/>
                            <?php endif;}?>

                                </div>

                                <div class="col-sm-6">

                                    <p class="text-info mob-dtls" style="margin-left: 40px;margin-top: 5px;margin-bottom: 5px;font-size: 22px;"><strong><?php echo $userdata[0]['name'] ?></strong><br>

                                        DOB: <?php $date = date_create($userdata[0]['dob']);

                                                echo date_format($date, "d/m/Y"); ?><br>

                                        Gender: <?php echo $userdata[0]['gender']; ?><br>

                                        Blood Group: <?php echo $userdata[0]['blood_group']; ?>

                                    </p>

                                </div>

                            </div>

                            <a href="javascript:void(0);" class="btn btn-sm float-right btn-dark text-white mob-btn edit">Edit Details</a>

                            <a href="<?php echo site_url('userProfile_Controller/changepass') ?>" style="margin-right: 10px;" class="btn btn-sm btn-danger float-right text-white">Change Password</a>

                            <div style="margin-top: 10px;">

                                <h4 class="text-info text-info1" style="border-bottom: 4px solid #17a2b8!important">Your Information<br></h4>

                            </div>

                            <div class="row">

                                <div class="col-12 col-sm-6 mt-2">

                                    <p class="text-info"><strong> Contact:</strong></p>

                                    <p>Phone: <?php echo $userdata[0]['phone'] ?></p>

                                    <p>Email: <?php echo $userdata[0]['email_id'] ?></p>

                                </div>

                                <div class="col-12 col-sm-6 mt-2">

                                    <p class="text-info"><strong> Address:</strong></p>

                                    <p><?php echo $userdata[0]['city'] . ', ' . $userdata[0]['state'] . ', ' . $userdata[0]['country'] . ',' ?></p>

                                    <p>Pincode: <?php echo $userdata[0]['zip'] ?></p>

                                </div>

                            </div>

                            <br>

                            <div class="row">

                                <div class="col-12 col-sm-12">

                                    <h4 class="text-info" style="border-bottom: 2px solid #17a2b8!important">About</h4>

                                    <p><?php echo $userdata[0]['about'] ?></p>

                                </div>

                            </div>

                        <?php else : ?>

                            <div class="row">

                                <div class="col-sm-2">

                                    <div style="width: 100px; height: 100px;">

                                        <img src="<?php echo $userdata[0]['picture'] ?>" class="img-thumbnail rounded" alt="">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <p class="text-info mob-dtls" style="margin-left: 40px;margin-top: 5px;margin-bottom: 5px;font-size: 22px;"><strong><?php echo $userdata[0]['name'] ?></strong><br>

                                        DOB: <?php $date = date_create($userdata[0]['dob']);

                                                echo date_format($date, "d/m/Y"); ?><br>

                                        Gender: <?php echo $userdata[0]['gender']; ?><br>

                                        Blood Group: <?php echo $userdata[0]['blood_group']; ?>

                                    </p>

                                </div>

                            </div>

                            <div style="margin-top: 10px;">

                                <h4 class="text-info" style="border-bottom: 4px solid #17a2b8!important">User Information<br></h4>

                            </div>

                            <div class="row">

                                <div class="col-12 col-sm-6 mt-2">

                                    <p class="text-info"><strong> Address:</strong></p>

                                    <p><?php echo $userdata[0]['city'] . ', ' . $userdata[0]['state'] . ', ' . $userdata[0]['country'] . ',' ?></p>

                                    <p>Pincode: <?php echo $userdata[0]['zip'] ?></p>

                                </div>

                            </div>

                            <br>

                            <div class="row">

                                <div class="col-12 col-sm-12">

                                    <h4 class="text-info" style="border-bottom: 2px solid #17a2b8!important">About</h4>

                                    <p><?php echo $userdata[0]['about'] ?></p>

                                </div>

                            </div>

                        <?php endif; ?>

                    </div>



                    <div class="udetailsedit" style="display:none">

                        <div class="d-flex justify-content-between">

                            <h4>Edit Details</h4>

                            <button href="javascript:void(0);" class="btn mob-btn btn-primary btn-danger cancel">Cancel</button>

                        </div>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                            <form action="<?php echo site_url('userProfile_Controller/myaccount') ?>" method="post" enctype="multipart/form-data">

                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="form-group">

                                            <label>Avatar</label>

                                            <div class="profile-upload">

                                                <div class="upload-img">

                                                    <img alt='' id="prevpic"  class="img-fluid " style="background-color:transparent;background-position:center;margin:0 0px 20px 0px;border-radius:5px;height: 100px; width: 100px" src="<?php echo $userdata[0]['picture'] ?>">
                                                    
                                                  

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

                                            <label>Full Name</label>

                                            <input class="form-control" required name="name" type="text" value="<?php echo $userdata[0]['name'] ?>">

                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <div class="form-group">

                                            <label>Email</label>

                                            <input class="form-control" name="email_id" type="email" readonly value="<?php echo $userdata[0]['email_id'] ?>">

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="form-group">

                                            <label>DOB </label>

                                            <input class="form-control" required name="dob" type="date" value="<?php echo $userdata[0]['dob'] ?>">

                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <div class="form-group">

                                            <label>Gender </label>

                                            <input class="form-control" required name="gender" type="text" value="<?php echo $userdata[0]['gender'] ?>">

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="form-group">

                                            <label>Phone </label>

                                            <input class="form-control" required name="phone" type="text" value="<?php echo $userdata[0]['phone'] ?>">

                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <div class="form-group">

                                            <label>Blood Group </label>

                                            <input class="form-control" required name="blood_group" type="text" value="<?php echo $userdata[0]['blood_group'] ?>">

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="form-group">

                                            <label>City</label>

                                            <input type="text" required name="city" class="form-control" value="<?php echo $userdata[0]['city'] ?>">

                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <div class="form-group">

                                            <label>State/Province</label>

                                            <input type="text" required name="state" class="form-control " value="<?php echo $userdata[0]['state'] ?>">

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="form-group">

                                            <label>Country</label>

                                            <input type="text" required name="country" class="form-control " value="<?php echo $userdata[0]['country'] ?>">

                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <div class="form-group">

                                            <label>Postal Code</label>

                                            <input type="text" required name="zip" class="form-control" value="<?php echo $userdata[0]['zip'] ?>">

                                        </div>

                                    </div>

                                </div>

                                <div>

                                    <div class="form-group">

                                        <label>About </label>

                                        <textarea rows="4" cols="5" class="form-control" name="about"><?php echo $userdata[0]['about'] ?></textarea>

                                    </div>

                                </div>

                                <div class="m-t-20 text-center">

                                    <button class="btn btn-primary submit-btn">Save Changes</button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            <?php elseif ($layout == 3) : ?>

                <!-- Change Password -->

                <div class="col-12 col-sm-12 col-md-8 col-lg-8 mob-responsive">

                    <h4 style="margin-bottom: revert;">Change Password</h4>

                    <?php if ($userpass[0]['password'] != '') : ?>

                        <div class="n-user">

                            <form action="<?php echo site_url('userProfile_Controller/changepass') ?>" method="post">

                                <div class="form-group row">

                                    <label for="email" class="col-sm-3">Your email: </label>

                                    <div class="col-sm-8">

                                        <input type="email" readonly class="form-control" name="email" id="email" value="<?php echo $userpass[0]['email_id'] ?>">

                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label for="currentpassword" class="col-sm-3">Current Password: </label>

                                    <div class="col-sm-8">

                                        <input type="password" class="form-control" required name="currentpassword" id="currentpassword" placeholder="Enter current password">



                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label for="newpassword" class="col-sm-3">New Password: </label>

                                    <div class="col-sm-8">

                                        <input type="password" class="form-control" required name="newpassword" id="newpassword" placeholder="Enter new password">

                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label for="confpassword" class="col-sm-3">Confirm Password: </label>

                                    <div class="col-sm-8">

                                        <input type="password" class="form-control" required name="password" id="confpassword" placeholder="Enter new password again">

                                    </div>

                                </div>



                                <div class="mt-20 text-center">

                                    <span class="error text-danger"></span><br>

                                    <button id="submitbtn" class="btn btn-primary submit-btn">Save Password</button>

                                </div>

                            </form>

                        </div>

                    <?php else : ?>

                        <div class="g-user">

                            <form action="<?php echo site_url('userProfile_Controller/changepass') ?>" method="post">

                                <div class="form-group row">

                                    <label for="email" class="col-sm-3">Your email: </label>

                                    <div class="col-sm-8">

                                        <input type="email" readonly class="form-control" id="email" name="email" value="<?php echo $userpass[0]['email_id'] ?>">

                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label for="gnewpassword" class="col-sm-3">New Password: </label>

                                    <div class="col-sm-8">

                                        <input type="password" class="form-control" required name="newpassword" id="gnewpassword" placeholder="Enter new password">

                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label for="gconfpassword" class="col-sm-3">Confirm Password: </label>

                                    <div class="col-sm-8">

                                        <input type="password" class="form-control" required name="password" id="gconfpassword" placeholder="Enter new password again">

                                    </div>

                                </div>

                                <div class="mt-20 text-center">

                                    <span class="gerror text-danger"></span><br>

                                    <button id="gsubmitbtn" class="btn btn-primary submit-btn-g">Save Password</button>

                                </div>

                            </form>

                        </div>

                    <?php endif; ?>

                </div>

            <?php endif; ?>

        </div>

    </div>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <script>

        $(document).ready(function() {

            $(".edit").click(function() {

                $(".udetailsedit").show();

                $(".edit").hide();

                $(".udetails").hide();

            });

            $(".cancel").click(function() {

                $(".udetails").show();

                $(".edit").show();

                $(".udetailsedit").hide();

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



        $("#propic").change(function() {

            readURL(this);

        });

    </script>

    <script>

        $(document).ready(function() {

            var oldpass = '';

            var npass = '';

            var cfpass = '';

            var cpass = '<?php echo $userpass[0]['password'] ?>';

            $('#currentpassword').change(function() {

                oldpass = $('#currentpassword').val();

                if (oldpass != cpass) {

                    $('.error').html("Current password doesn't match");

                    $('#submitbtn').attr('disabled', 'disabled');

                } else {

                    $('.error').html("");

                }

                $('#newpassword').change(function() {

                    npass = $('#newpassword').val();

                    $('#confpassword').keyup(function() {

                        cfpass = $('#confpassword').val();

                        if (npass != cfpass) {

                            $('.error').html("New password & Confirm password does't match");

                            $('#submitbtn').attr('disabled', 'disabled');

                        } else {

                            $('.error').html("");

                            $('#submitbtn').removeAttr("disabled");

                        }

                    });

                });



            });

        });

    </script>

    <script>

        $(document).ready(function() {

            var npass = '';

            var cfpass = '';

            $('#gnewpassword').change(function() {

                npass = $('#gnewpassword').val();

                console.log(npass);

                $('#gconfpassword').keyup(function() {

                    cfpass = $('#gconfpassword').val();

                    if (npass != cfpass) {

                        $('.gerror').html("New password & Confirm password does't match");

                        $('#gsubmitbtn').attr('disabled', 'disabled');

                    } else {

                        $('.gerror').html("");

                        $('#gsubmitbtn').removeAttr("disabled");

                    }

                });

            });

        });

    </script>



</body>



</html>