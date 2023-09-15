<?php

if (!$_SESSION['doc_id']) {

    header('location:' . site_url('doctorProfile_Controller/docLogin'));

}

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

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
       .page-wrapper .card-box{
           padding:20px 20px 40px 20px;
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

                    <div class="col-sm-7 col-6"data-aos="fade-right" >

                        <h4 class="page-title">Profile</h4>

                    </div>



                    <div class="col-sm-5 col-6 text-right m-b-30"data-aos="fade-left" >

                        <a href="<?php echo site_url('doctorProfile_Controller/edit_doc_profile') ?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>

                    </div>

                </div>

                <div class="card-box profile-header"data-aos="fade-up" >

                    <div class="row">

                        <div class="col-md-12">

                            <div class="profile-view">

                                <div class="profile-img-wrap">

                                    <div class="profile-img">

                                    <a href="#"><img class="avatar" src="https://localhost/aahrs/userUploads/medical.png" alt=""></a>

                                    </div>

                                </div>

                                <div class="profile-basic">

                                    <div class="row">

                                        <div class="col-md-5">

                                            <div class="profile-info-left">

                                                <h3 class="user-name m-t-0 mb-0"><?php echo $doctorData['doc_name']

                                                                                    ?></h3>

                                                <div class="staff-id">Hospital ID : <?php echo $doctorData['doc_id']

                                                                                    ?></div>

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

                    <ul class="nav nav-tabs nav-tabs-bottom"data-aos="fade-up" >

                        <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>

                        <li class="nav-item"><a class="nav-link" href="#hosPost" data-toggle="tab">Posts</a></li>

                        <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Followers</a></li>

                    </ul>

                    <div class="tab-content ">

                        <div class="tab-pane show active" id="timeline">

                            <!-- New Post -->

                            <div class="row">

                                <div class="col-sm-12"data-aos="fade-right" >

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

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-sm-7 col-6">

                        <h4 class="page-title">Edit Profile</h4>

                    </div>

                </div>

            </div>

        </div>

    <?php endif; ?>



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