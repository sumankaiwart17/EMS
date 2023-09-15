<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <title>Profile</title>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- <style>

        body{

            background-image:url("http://localhost/AAHRS/userUploads<?php echo $hospitalDet['logo'] ?>");

            background-position: center;

            background-repeat: no-repeat;

            background-size: contain;

            background-position-x: 75%;

        }

    </style> -->

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

                                <div class="profile-img-wrap">

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

                    <ul class="nav nav-tabs nav-tabs-bottom" style="padding-top: 1.5px" data-aos="fade-up">

                        <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>

                        <li class="nav-item"><a class="nav-link" href="#hosPost" data-toggle="tab">Posts</a></li>

                        <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Followers</a></li>

                    </ul>



                    <div class="tab-content">

                        <div class="tab-pane show active" id="timeline">

                            <!-- New Post -->

                            <div class="row">

                                <div class="col-sm-8 m-auto">

                                    <div class="card card-body" data-aos="fade-right">

                                        <form action="<?php echo base_url('hospital_Controller/hosPost') ?>" method="post" enctype="multipart/form-data">



                                            <div class="form-group row">


                                                <div class="col-md-4">

                                                    <input type="text" name="post_title" placeholder=" Post title" class="form-control" required>

                                                </div>

                                                <div class="col-md-4">

                                                    <input type="file" name="image" class="form-control" required>

                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <textarea name="post_content" id="newpost" cols="65" rows="7" style="width: 100%;" required placeholder="Write a new post!!"></textarea>

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

                                            <div class="row">

                                                <div class="col-3 col-sm-3">

                                                <a href="#"><img class="avatar" <?php //echo base_url('userUploads' . $hospitalDet['logo']) 
                                                                        ?> src="<?php echo base_url('userUploads/' . $hospitalDet['logo'])?>" style='width:100px;height:100px' alt=""></a>


                                                </div>

                                                <div class="col col-sm-3">



                                                    <h5>&nbsp;<?php echo $x['hos_name'] ?> Posted</h5>

                                                </div>

                                            </div>

                                            <div class="row justify-content-center">

                                                <div class="col-10 mt-2">

                                                    <p><?php echo $x['post_content'] ?></p>
                                                    <?php if ($x['image']) : ?>

                                                        <div class="col-lg-10 mt-1 mb-2 ml-3"><img src="<?php echo base_url('userUploads/' . $x['image']) ?>" class="img-thumbnail float-center " style="width: 100%;height:200px" alt=""></div>

                                                    <?php endif; ?>

                                                </div>



                                            </div>

                                            <div class="row justify-content-center">

                                                <div class="col-4"><a href=""><i class="fas fa-thumbs-up">&nbsp;(<?php echo $x['like_count'] ?>)</i></a>
                                                </div>


                                                <div class="col-3"><a href=""><i class="fas fa-share">&nbsp;(<?php echo $x['share_count'] ?>)</i></a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                <?php endforeach; ?>

                            </div>

                        </div>

                        <div class="tab-pane" id="hosPost">

                            <div class="row">

                                <?php foreach ($hospitalPost as $x) : ?>

                                    <div class="col-12 col-sm-7">

                                        <div class="card card-body" data-aos="fade-up">

                                            <div class="row">

                                                <div class="col-3 col-sm-3">

                                                    <img src="<?php echo base_url('userUploads' . $hospitalDet['logo']) ?>" alt="" class="rounded-circle" style="height: 70px; width: 70px;">

                                                </div>

                                                <div class="col col-sm">

                                                    <h4>&nbsp;<?php echo $x['hos_id'] ?><span class="status offline"></span></h4>

                                                    <p>&nbsp;<?php echo $x['post_time'] ?></p>

                                                </div>

                                            </div>

                                            <div class="row justify-content-center">

                                                <div class="col-12 mt-2">

                                                    <p><?php echo $x['post_content'] ?></p>

                                                </div>

                                                <?php if ($x['image']) : ?>

                                                    <div class="col-5 mt-1 mb-2"><img src="<?php echo base_url('userUploads' . $x['image']) ?>" class="img-thumbnail float-center" style="width: 100%;" alt=""></div>

                                                <?php endif; ?>

                                            </div>

                                            <div class="row justify-content-center ">

                                                <div class="col-md-6"><a href=""><i class="fas fa-thumbs-up">&nbsp;(<?php echo $x['like_count'] ?>)</i></a>
                                                </div>



                                                <div class="col-md-6"><a href=""><i class="fas fa-share">&nbsp;(<?php echo $x['share_count'] ?>)</i></a>
                                                </div>

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

        <!-- Edit Profile -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form action="<?php echo site_url('hospital_Controller/upd_hospital_profile') ?>" method="post" enctype="multipart/form-data">

                            <h3 class="page-title" data-aos="fade-right">Edit Hospital</h3>

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label data-aos="fade-up">Hospital Name <span class="text-danger">*</span></label>

                                        <input class="form-control" data-aos="fade-up" name="hospital_name" type="text" value="<?php echo $hospitalDet['hos_name'] ?>">

                                    </div>

                                </div>

                                <!-- <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Contact Person</label>

                                        <input class="form-control " value="Daniel Porter" type="text">

                                    </div>

                                </div> -->

                            </div>

                            <div class="row">

                                <div class="col-sm-12">

                                    <div class="form-group" data-aos="fade-up">

                                        <label>Address</label>

                                        <input class="form-control " name="address" value="<?php echo $hospitalDet['address'] ?>" type="text">

                                    </div>

                                </div>

                                <div class="col-sm-6 col-md-6 col-lg-3">

                                    <div class="form-group" data-aos="fade-left">

                                        <label>Country</label>

                                        <input class="form-control " name="country" value="<?php echo $hospitalDet['country'] ?>" type="text">



                                    </div>

                                </div>

                                <div class="col-sm-6 col-md-6 col-lg-3">

                                    <div class="form-group" data-aos="fade-left">

                                        <label>City</label>

                                        <input class="form-control" name="city" value="<?php echo $hospitalDet['city'] ?>" type="text">

                                    </div>

                                </div>

                                <div class="col-sm-6 col-md-6 col-lg-3">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>State/Province</label>

                                        <input class="form-control" name="state" value="<?php echo $hospitalDet['state'] ?>" type="text">

                                    </div>

                                </div>

                                <div class="col-sm-6 col-md-6 col-lg-3">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>Postal Code</label>

                                        <input class="form-control" name="zip" value="<?php echo $hospitalDet['zip'] ?>" type="text">

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-left">

                                        <label>Email</label>

                                        <input class="form-control" name="email" value="<?php echo $hospitalDet['email_id'] ?>" type="email">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>Phone Number</label>

                                        <input class="form-control" name="phone" value="<?php echo $hospitalDet['phone'] ?>" type="text">

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-left">

                                        <label>Logo</label>

                                        <input type="file" class="form-control" value="<?php echo $hospitalDet['logo'] ?>" name="picture" required>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>Cover Pic</label>

                                        <input type="file" class="form-control" name="cover_pic" value="">

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-12">

                                    <div class="form-group" data-aos="fade-up">

                                        <label>About</label>

                                        <textarea class="form-control" name="about" id="" cols="30" rows="10"><?php echo $hospitalDet['about'] ?></textarea>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-12 text-center m-t-20">

                                    <button type="submit" class="btn btn-primary submit-btn">Save</button>

                                </div>

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

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 130,
            duration: 1000,
        });
    </script>

</body>



</html>