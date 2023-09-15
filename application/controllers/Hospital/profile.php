<?php

// print_r($postdata);die;


?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">

    <title>Profile</title>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        /* body{

            background-image:url("http://localhost/AAHRS/userUploads<?php echo $hospitalDet['logo'] ?>");

            background-position: center;

            background-repeat: no-repeat;

            background-size: contain;

            background-position-x: 75%;

        } */

        .profile-basic {
            margin-left: 130px !important;
        }

        .profile-info-left {
            padding-top: 24px !important;
        }
    </style>

</head>



<body>


    <!-- Navbar -->

    <?php include('navbar.php'); ?>

    <?php if ($layout == 0) : ?>

        <!-- Profile View -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-sm-7 col-6" data-aos="fade-right">

                        <h4 class="page-title">Profile</h4>

                    </div>

                    <div class="col-sm-5 col-6 text-right m-b-30" data-aos="fade-left">

                        <a href="<?php echo site_url('hospital_Controller/edit_hos_profile') ?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>

                    </div>

                </div>

                <div class="card-box profile-header" data-aos="fade-up">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="profile-view">

                                <div class="profile-img-wrap" style="height: 100px;">

                                    <div class="profile-img">

                                        <a href="#"><img class="avatar" <?php //echo base_url('userUploads' . $hospitalDet['logo']) 
                                                                        ?> src="<?php echo base_url('userUploads/' . $hospitalDet['logo']) ?>" style='width:100px;height:100px' alt=""></a>

                                    </div>

                                </div>

                                <div class="profile-basic">

                                    <div class="row">

                                        <div class="col-md-5">

                                            <div class="profile-info-left">

                                                <h3 class="user-name m-t-0 mb-0"><?php echo $hospitalDet['hos_name'] ?></h3>

                                                <div class="staff-id">Hospital ID : <?php echo $hospitalDet['hos_id'] ?>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-7">

                                            <ul class="personal-info">

                                                <li>

                                                    <span class="title">Phone:</span>

                                                    <span class="text"><a href="#"><?php echo $hospitalDet['phone'] ?></a></span>

                                                </li>

                                                <li>

                                                    <span class="title">Email:</span>

                                                    <span class="text"><a href="#"><?php echo $hospitalDet['email_id'] ?></a></span>

                                                </li>

                                                <li>

                                                    <span class="title">Address:</span>

                                                    <span class="text"><?php echo $hospitalDet['city'] . ', ' . $hospitalDet['state'] ?></span>

                                                </li>

                                                <li>

                                                    <span class="title">About:</span>

                                                    <span class="text"><?php echo $hospitalDet['about'] ?></span>

                                                </li>

                                            </ul>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="profile-tabs" style="top:50px">

                    <!-- <ul class="nav nav-tabs nav-tabs-bottom" style="padding-top: 1.5px" data-aos="fade-up">

                        <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>

                        <li class="nav-item"><a class="nav-link" href="#hosPost" data-toggle="tab">Posts</a></li>

                        <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Followers</a></li>

                    </ul> -->



                    <div class="tab-content">

                        <div class="tab-pane show active" id="timeline">

                            <!-- New Post -->

                            <div class="row">

                                <div class="col-sm-8 m-auto">

                                    <div class="card card-body" data-aos="fade-right">

                                        <form action="<?php echo base_url('hospital_Controller/hosPost') ?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <div class="col-md-4">

                                                    <input type="file" name="image" class="form-control">
                                                    <span class="text-danger"><?php echo form_error('image') ?></span>

                                                </div>
                                            </div>

                                            <textarea class="form-control" name="post_content" id="newpost" cols="65" rows="7" style="width: 100%;" placeholder="Write a new post!!"></textarea>
                                            <span class="text-danger"><?php echo form_error('post_content') ?></span>

                                    </div>
                                    <button type="submit" class="btn btn-dark text-white ml-auto mr-3">Post</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Timeline -->

                        <div class="row">

                            <?php foreach ($post as $x) : ?>




                                <!-- Dynamic post content -->

                                <div class="col-12 col-sm-8 m-auto">

                                    <div class="card card-body" data-aos="fade-left">

                                        <div class="row mb-3">

                                            <div class="col-4 d-flex">

                                                <a href="#"><img class="avatar" <?php //echo base_url('userUploads' . $hospitalDet['logo']) 
                                                                                ?> src="<?php echo base_url('userUploads/' . $hospitalDet['logo']) ?>" style='width:60px;height:60px' alt=""></a>

                                                <h5 class="pt-3">&nbsp;<?php echo $x['hos_name'] ?> Posted</h5>
                                            </div>

                                            <div class="col col-sm-2">





                                            </div>


                                            <div class="col col-sm-6">



                                                <div data-th="Action: " class="text-right">

                                                    <div class="dropdown dropdown-action">

                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                                                        <div class="dropdown-menu dropdown-menu-right">

                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/editPost/' . $x['post_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/delPost/') . $x['post_id'] ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>
                                                        </div>

                                                    </div>



                                                </div>

                                            </div>


                                        </div>

                                        <div class="row">

                                            <div class="col-12 mt-2">

                                                <p class="ml-3"><?php echo $x['post_content'] ?></p>
                                                <?php if ($x['image']) : ?>

                                                    <div class="col-lg-12 mt-1 mb-2"><img src="<?php echo base_url('userUploads/' . $x['image']) ?>" class="img-thumbnail float-center " style="width: 100%;height:300px; object-fit: cover;" alt=""></div>

                                                <?php endif; ?>

                                            </div>



                                        </div>

                                        <div class="row justify-content-center">

                                            <!-- <div class="col-4"><a href=""><i class="fas fa-thumbs-up">&nbsp;(<?php echo $x['like_count'] ?>)</i></a>
                              </div>


                              <div class="col-3"><a href=""><i class="fas fa-share">&nbsp;(<?php echo $x['share_count'] ?>)</i></a>
                              </div> -->

                                        </div>

                                    </div>

                                </div>

                            <?php endforeach; ?>

                        </div>

                    </div>


                </div>

            </div>


        </div>



    <?php elseif ($layout == 2) : ?>

        <!-- Edit Profile -->



        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form action="<?php echo site_url('hospital_Controller/upd_hospital_profile') ?>" method="post" enctype="multipart/form-data">

                            <h3 class="page-title" data-aos="fade-right">Edit Hospital</h3>

                            <?php if (isset($hospitalDet)) : ?>
                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="form-group">

                                            <label>Hospital Name <span class="text-danger">*</span></label>

                                            <input class="form-control" name="hospital_name" type="text" value="<?php echo $hospitalDet['hos_name'] ?>">

                                            <span style="color:red"> <?php echo form_error('hospital_name'); ?></span>

                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control " name="address" value="<?php echo $hospitalDet['address'] ?>" type="text">
                                            <span style="color:red"><?php echo form_error('address') ?></span>
                                        </div>

                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input class="form-control " name="country" value="<?php echo $hospitalDet['country'] ?>" type="text">
                                            <span style="color:red"><?php echo form_error('country') ?></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input class="form-control" name="city" value="<?php echo $hospitalDet['city'] ?>" type="text">
                                            <span style="color:red"><?php echo form_error('city') ?></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>State/Province</label>
                                            <input class="form-control" name="state" value="<?php echo $hospitalDet['state'] ?>" type="text">
                                            <span style="color:red"><?php echo form_error('state') ?></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Postal Code</label>
                                            <input class="form-control" name="zip" value="<?php echo $hospitalDet['zip'] ?>" type="text">
                                            <span style="color:red"><?php echo form_error('zip') ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" value="<?php echo $hospitalDet['email_id'] ?>" type="email">
                                            <span style="color:red"><?php echo form_error('email') ?></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input class="form-control" name="phone" value="<?php echo $hospitalDet['phone'] ?>" type="text">
                                            <span style="color:red"><?php echo form_error('phone') ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Logo</label>
                                            <input type="file" class="form-control" value="<?php echo base_url() . "userUploads/" . $hospitalDet['logo'] ?>" name="picture">
                                            <span style="color:red"><?php echo form_error('logo') ?></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Cover Pic</label>
                                            <input type="file" class="form-control" name="cover_pic" value="">
                                            <span style="color:red"><?php echo form_error('cover_pic') ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>About</label>
                                            <textarea class="form-control" name="about" id="" cols="30" rows="10"><?php echo $hospitalDet['about'] ?></textarea>
                                            <span style="color:red"><?php echo form_error('about') ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 text-center m-t-20">
                                        <button type="submit" class="btn btn-primary submit-btn">Save</button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>







    <?php elseif ($layout == 3) : ?>
        <br><br>

        <div class="row mt-5">

            <div class="col-sm-8 m-auto">
                <div class="card card-body">

                    <form action="<?php echo base_url('hospital_Controller/updpost/' . $this->uri->segment(3)) ?>" method="post" enctype="multipart/form-data">

                        <h1>Edit Post</h1>
                        <?php if ($postdata[0]['image'] !== "") { ?>
                            <div class="form-group">
                                <img src="<?php echo base_url("userUploads/" . $postdata[0]['image']); ?>" style="height:400px;width:100%;">
                            </div>
                        <?php } ?>

                        <div class="form-group row">

                            <div class="col-md-4">
                                <input type="file" name="image" class="form-control">

                            </div>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="post_content" id="newpost" cols="65" rows="7" style="width: 100%;" placeholder="Write a new post!!"><?php echo $postdata[0]['post_content'] ?></textarea>
                            <span class="text-danger"><?php echo form_error('post_content') ?></span>
                        </div>
                        <button type="submit" class="btn btn-dark text-white ml-auto mr-3" name="post">Post</button>
                    </form>
                </div>
            </div>
        </div>

    <?php endif; ?>

    <?php if (isset($_SESSION['success'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Post Added Successfully',
                showConfirmButton: false,
                timer: 2000
            });
        </script>

       <?php unset($_SESSION['success']); ?>    

    <?php endif; ?>

    <?php if (isset($_SESSION['edit'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Profile Updated Successfully',
                showConfirmButton: false,
                timer: 2000
            })
        </script>

    <?php unset($_SESSION['edit']); ?>    

    <?php endif; ?>

    <?php if (isset($_SESSION['editPost'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Post Updated Successfully',
                showConfirmButton: false,
                timer: 2000
            })
        </script>

    <?php unset($_SESSION['editPost']); ?>            

    <?php endif; ?>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
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