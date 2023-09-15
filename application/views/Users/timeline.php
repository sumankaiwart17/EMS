<?php

if (isset($_SESSION['userLog']) && $_SESSION['userLog'] == true) {

    $userData = $this->db->where('email_id', $_SESSION['email_id'])

        ->get('user_details')
 
        ->result_array();



    // echo "<pre>";

    // print_r($userData);

    // die;

}

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="<?php echo base_url('css/cssUser/style.css') ?>"> -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <title>AAHRS | Timeline</title>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        .comment-section {

            list-style: none;

            max-width: 800px;

            width: 100%;

            margin: 50px auto;

            padding: 10px;

        }


        .btn-primary {
            background-color: #d21818 !important;
            border-color: #d21818 !important;
            padding: 10px 30px !important;
        }

        .panel .form-control {
            width: 90% !important;
            margin-left: 10% !important;
            resize: none !important;
        }

        .comment {

            display: flex;

            border-radius: 3px;

            margin-bottom: 45px;

            flex-wrap: wrap;

        }



        .comment.user-comment {

            color: black;

        }



        .comment.author-comment {

            color: black;

            justify-content: flex-end;

        }



        /* User and time info */

        .card-block .post-timelines img {
            height: 400px !important;
        }

        .comment .info {

            width: 17%;

        }



        .comment.user-comment .info {

            text-align: right;

        }



        .comment.author-comment .info {

            order: 3;

        }





        .comment .info a {

            /* User name */

            display: block;

            text-decoration: none;

            color: #656c71;

            font-weight: bold;

            text-overflow: ellipsis;

            overflow: hidden;

            white-space: nowrap;

            padding: 10px 0 3px 0;

        }



        .comment .info span {

            /* Time */

            font-size: 11px;

            color: #9ca7af;

        }





        /* The user avatar */



        .comment .avatar {

            width: 8%;

        }



        .comment.user-comment .avatar {

            padding: 10px 18px 0 3px;

        }



        .comment.author-comment .avatar {

            order: 2;

            padding: 10px 3px 0 18px;

        }



        .comment .avatar img {

            display: block;

            border-radius: 50%;

        }



        .comment.user-comment .avatar img {

            float: right;

        }











        /* The comment text */



        .comment p {

            line-height: 1.5;

            padding: 18px 22px;

            width: 50%;

            position: relative;

            word-wrap: break-word;

        }



        .comment.user-comment p {

            background-color: #8ec8fc;

        }



        .comment.author-comment p {

            background-color: #f5b920;

            order: 1;

        }



        .user-comment p:after {

            content: '';

            position: absolute;

            width: 15px;

            height: 15px;

            border-radius: 50%;

            background-color: #8fb838;

            border: 2px solid #f3f3f3;

            left: -8px;

            top: 18px;

        }



        .author-comment p:after {

            content: '';

            position: absolute;

            width: 15px;

            height: 15px;

            border-radius: 50%;

            background-color: #8fb838;

            border: 2px solid #e2f8ff;

            right: -8px;

            top: 18px;

        }









        /* Comment form */



        .write-new {

            margin: 80px auto 0;

            width: 50%;

        }



        .write-new textarea {

            color: #444;

            font: inherit;



            outline: 0;

            border-radius: 3px;

            border: 1px solid #cecece;

            background-color: #fefefe;

            box-shadow: 1px 2px 1px 0 rgba(0, 0, 0, 0.06);

            overflow: auto;



            width: 100%;

            min-height: 80px;

            padding: 15px 20px;

        }



        .write-new img {

            border-radius: 50%;

            margin-top: 15px;

        }



        .write-new button {

            float: right;

            background-color: #8fb838;

            box-shadow: 1px 2px 1px 0 rgba(0, 0, 0, 0.12);

            border-radius: 2px;

            border: 0;

            color: #ffffff;

            font-weight: bold;

            cursor: pointer;



            padding: 10px 25px;

            margin-top: 18px;

        }



        @media only screen and (max-width: 991.98px) {
            .emBtn {
                display: block;
                bottom: 25% !important;
                right: 7% !important;
            }

            #show_chat_window {
                bottom: 100px !important;
                right: 20px !important;
            }

        }



        /* Responsive styles */



        @media (max-width: 800px) {



            /* Make the paragraph in the comments take up the whole width,

    forcing the avatar and user info to wrap to the next line*/

            .comment p {

                width: 100%;

            }



            /* Reverse the order of elements in the user comments,

    so that the avatar and info appear after the text. */

            .comment.user-comment .info {

                order: 3;

                text-align: left;

            }



            .comment.user-comment .avatar {

                order: 2;

            }



            .comment.user-comment p {

                order: 1;

            }





            /* Align toward the beginning of the container (to the left)

    all the elements inside the author comments. */

            .comment.author-comment {

                justify-content: flex-start;

            }





            .comment-section {

                margin-top: 10px;

            }



            .comment .info {

                width: auto;

            }



            .comment .info a {

                padding-top: 15px;

            }



            .comment.user-comment .avatar,

            .comment.author-comment .avatar {

                padding: 15px 10px 0 18px;

                width: auto;

            }



            .comment.user-comment p:after,

            .comment.author-comment p:after {

                width: 12px;

                height: 12px;

                top: initial;

                left: 28px;

                bottom: -6px;

            }



            .write-new {

                width: 100%;

            }

        }







        .social-wallpaper {

            position: relative;

            height: 300px;

            background: url("images/medica.jpg") no-repeat;

            background-size: cover;

            background-color: #00b5ec;

        }





        .timeline-right .card,

        .timeline-left .card {

            border-top: none;

            box-shadow: 0 0 1px 2px rgba(0, 0, 0, 0.05), 0 -2px 1px -2px rgba(0, 0, 0, 0.04), 0 0 0 -1px rgba(0, 0, 0, 0.05);

            transition: all 180ms linear;

        }



        .timeline-right .card:hover,

        .timeline-left .card:hover {

            box-shadow: 0 0 25px -5px #9e9c9e;

            transition: all 180ms linear;

        }



        .timeline-icon {

            z-index: 1;

        }



        .timeline-btn {

            position: absolute;

            bottom: 0;

            right: 30px;

        }



        .nav-tabs.md-tabs.tab-timeline li a {

            padding: 10px;

            color: #666666;

            font-size: 18px;

        }



        .social-timeline-left {

            position: absolute;

            top: -200px;

        }



        .post-input {

            padding: 10px 10px 10px 5px;

            display: block;

            width: 100%;

            border: none;

            resize: none;

        }



        .user-box .media-object,

        .friend-box .media-object {

            height: 45px;

            width: 45px;

            display: inline-block;

        }



        .friend-box img {

            margin-right: 10px;

            margin-bottom: 10px;

        }



        .user-box .media-left {

            position: relative;

        }



        .chat-header {

            color: #222222;

        }



        .live-status {

            height: 7px;

            width: 7px;

            position: absolute;

            bottom: 0;

            right: 17px;

            border-radius: 100%;

            border: 1px solid;

        }



        .tab-timeline .slide {

            bottom: -1px;

        }



        .image-upload input {

            visibility: hidden;

            max-width: 0;

            max-height: 0
        }



        .file-upload-lbl {

            max-width: 15px;

            padding: 5px 0 0;

        }



        .ellipsis::after {

            top: 15px;

            border: none;

            position: absolute;

            content: '\f142';

            font-family: FontAwesome;

        }



        .elipsis-box {

            box-shadow: 0 0 5px 1px rgba(0, 0, 0, 0.11);

            top: 40px;

            right: -10px;

        }



        .elipsis-box:after {

            content: '';

            height: 13px;

            width: 13px;

            background: #fff;

            position: absolute;

            top: -5px;

            right: 10px;

            -webkit-transform: rotate(45deg);

            -moz-transform: rotate(45deg);

            transform: rotate(45deg);

            box-shadow: -3px -3px 11px 1px rgba(170, 170, 170, 0.22);

        }



        .friend-elipsis {

            left: -10px;

            top: -10px;

        }



        .social-profile:hover .profile-hvr,

        .social-wallpaper:hover .profile-hvr {

            opacity: 1;

            transition: all ease-in-out 0.3s;

        }



        .profile-hvr {

            opacity: 0;

            position: absolute;

            text-align: center;

            width: 100%;

            font-size: 16px;

            padding: 10px;

            top: 0;

            color: #fff;

            background-color: rgba(0, 0, 0, 0.61);

            transition: all ease-in-out 0.3s;

        }



        .social-profile {

            margin: 0 15px;

        }



        .social-follower {

            text-align: center;

        }



        .social-follower h4 {

            font-size: 14px;

            margin-bottom: 10px;

            font-style: normal;

        }



        .social-follower h5 {

            font-size: 10px;

            font-weight: 300;

        }



        .social-follower .follower-counter {

            text-align: center;

            margin-top: 25px;

            margin-bottom: 25px;

            font-size: 10px;

        }



        .social-follower .follower-counter .txt-primary {

            font-size: 20px;

        }



        .timeline-icon {

            height: 45px;

            width: 45px;

            display: block;

            margin: 0 auto;

            border: 4px #fff solid;

        }



        .social-timelines-left:after {

            height: 3px;

            width: 25%;

            position: absolute;

            background: #cccccc;

            top: 20px;

            content: "";

            right: 0;

            z-index: 0;

        }



        .social-timelines:before {

            position: absolute;

            content: ' ';

            width: 3px;

            background: #cccccc;

            left: 4%;

            z-index: 0;

            top: 0;

        }



        .timeline-dot:after,

        .timeline-dot:before {

            content: "";

            position: absolute;

            height: 9px;

            width: 9px;

            background-color: #cccccc;

            left: 3.8%;

            border-radius: 100%;

        }



        .user-box .social-designation,

        .post-timelines .social-time {

            font-size: 10px;

        }



        .social-msg span {

            color: #666;

            padding-left: 10px;

            padding-right: 10px;

            margin-right: 10px;

        }

        .social-msg a {
            text-decoration: none !important;
        }



        .view-info .social-label,

        .contact-info .social-label,

        .work-info .social-label {

            font-size: 15px;

            padding-left: 0;

            padding-top: 0;

        }



        .view-info .social-user-name,

        .contact-info .social-user-name,

        .work-info .social-user-name {

            font-size: 14px;

            padding-left: 0;

        }



        .friend-elipsis .social-designation {

            font-size: 13px;

        }



        .social-client-description {

            padding-bottom: 20px;

        }



        .user-box .media-body {

            padding-top: 6px;

        }



        .timeline-details p {

            padding-top: 10px;

        }



        .timeline-details .chat-header,

        .post-timelines .chat-header {

            font-size: 15px;

        }



        .social-client-description {

            padding-bottom: 20px;

        }



        .social-client-description p {

            margin-top: 5px;

        }



        .social-client-description span {

            font-size: 12px;

            margin-left: 10px;

        }



        .social-client-description .chat-header {

            font-size: 13px;

        }



        .social-tabs a {

            font-size: 18px;

        }



        .timeline-btn a {

            margin-bottom: 20px;

        }



        .profile-hvr i {

            cursor: pointer;

        }



        .social-timelines:before {

            position: absolute;

            content: ' ';

            width: 3px;

            background: #cccccc;

            left: 4%;

            z-index: 0;

            height: 100%;

            top: 0;

        }



        .timeline-dot:after,

        .timeline-dot:before {

            content: "";

            position: absolute;

            height: 9px;

            width: 9px;

            background-color: #cccccc;

            left: 3.8%;

            border-radius: 100%;

        }



        ul#profile-lightgallery {

            display: inline-flex;

        }



        .social-timeline .btn i {

            margin-right: 0;

        }



        .card .card-block {

            padding: 25px;



        }



        .social-follower {

            text-align: center;

        }



        .media-left {

            padding-right: 20px;

        }



        .live-status {

            height: 9px;

            width: 9px;

            position: absolute;

            bottom: 0;

            right: 17px;

            border-radius: 100%;

            border: 1px solid;

            top: 5px;

        }



        .live-status {

            height: 10px;

            width: 10px;

            position: absolute;

            top: 20px;

            right: 20px;

            border-radius: 100%;

            border: 1px solid;

        }



        .bg-danger {

            background-color: #FF5370 !important;

            color: #fff;

        }



        .card {

            border-radius: 5px;

            -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);

            box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);

            border: none;

            margin-bottom: 10px;

            -webkit-transition: all 0.3s ease-in-out;

            transition: all 0.3s ease-in-out;

        }



        .user-box .media-object,

        .friend-box .media-object {

            height: 45px;

            width: 45px;

            display: inline-block;

            cursor: pointer;

        }



        .md-tabs .nav-item {

            width: calc(100%/ 5);

            text-align: center;

        }



        .md-tabs .nav-item .nav-link.active~.slide {

            opacity: 1;

            -webkit-transition: all 0.3s ease-out;

            transition: all 0.3s ease-out;

        }



        .md-tabs .nav-item .nav-link~.slide {

            opacity: 0;

            -webkit-transition: all 0.3s ease-out;

            transition: all 0.3s ease-out;

        }



        .tab-timeline .slide {

            bottom: -1px;

        }



        .scrollable {

            height: 700px;

            overflow: scroll;

        }



        .scrollable::-webkit-scrollBar {

            display: none;

        }



        .nav-tabs .slide {

            background: #4099ff;

            width: calc(100%/ 4);

            height: 4px;

            position: absolute;

            -webkit-transition: left 0.3s ease-out;

            transition: left 0.3s ease-out;

            bottom: 0;

        }



        @media screen and (max-width:767px) {

            .social-timeline-left {

                margin-top: 1500px;

            }



            .one {

                height: 400px;



            }



            .two {

                flex: 100%;

            }



            #timeline {

                margin-left: -65px;

            }



            .doc-card {

                height: 200px;

            }



            .doc {

                margin-top: 20px;

                margin-bottom: 20px;

            }



            .fixedbutton {

                position: fixed;

                bottom: 50px;

                right: 50px;

            }

        }



        input#input {

            display: none;

        }



        label#label {

            font-size: large;

            padding: 10px 16px;

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

    <!-- Modal -->





    <!-- Button trigger modal -->





    <!-- Modal -->

    <!-- <form method="post" action="<?php echo site_url('emergency_controller/emergency') ?>">

        <div class="modal fade" id="emergencyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Contact us now!</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label>Paitent Name</label>

                            <input type="text" class="form-control" placeholder="Enter Name" name="pname" required>

                        </div>

                        <div class="form-group">

                            <label>Paitent age</label>

                            <input type="text" class="form-control" placeholder="Enter Age" name="page" required>

                        </div>

                        <div class="form-group">

                            <label>Phone number</label>

                            <input type="number" class="form-control" placeholder="Enter Phone number" name="pnum" required>

                        </div>

                        <div class=form-group>

                            <label>Adress</label>

                            <input type="text" class="form-control" placeholder="Enter adress" name="padd" required>

                        </div>

                        <div class="form-check">

                            <input type="checkbox" class="form-check-input" id="exampleCheck1">

                            <label class="form-check-label" for="exampleCheck1">I agree to the terms and conditions*</label>

                        </div>

                        <button type="submit" name="reqamb" class="btn btn-danger">Request for ambulence</button>



                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                    </div>

    </form>

    </div>

    </div>

    </div> -->



    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

        aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">My Preference</h5>

                    <button type="button" class="close" style="outline:none!important;"data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>



                </div>

                <div class="modal-body">

                    <form>

                        <div class="form-group">

                            <label for="treat">Treatment</label>

                            <select class="form-control" id="treat">

                                <option selected disabled>Select Treatment</option>

                                <?php

                                $q = $this->db->select('*')->from('treatments')->get()->result_array();

                                ?>

                                <?php foreach ($q as $x) {

                                    if ($x['treat_name'] == $userData[0]['treatment']) {

                                ?>

                                <option selected><?php echo $x['treat_name'] ?></option>

                                <?php } else { ?>

                                <option><?php echo $x['treat_name'] ?></option>

                                <?php } ?>

                                <?php } ?>

                            </select>

                        </div>

                        <div class="form-group">

                            <label for="disease">Disease</label>

                            <select class="form-control" id="disease">

                                <option selected disabled>Select Disease</option>

                                <?php

                                $q = $this->db->select('*')->from('diseases')->get()->result_array();

                                ?>

                                <?php foreach ($q as $x) {

                                    if ($x['dis_name'] == $userData[0]['disease']) {

                                ?>

                                <option selected><?php echo $x['dis_name'] ?></option>

                                <?php } else { ?>

                                <option><?php echo $x['dis_name'] ?></option>

                                <?php } ?>

                                <?php } ?>

                            </select>

                        </div>

                        <div class="form-group">

                            <label for="dept">Department</label>

                            <select class="form-control" id="dept">

                                <option selected disabled>Select Department</option>

                                <?php

                                $q = $this->db->select('*')->from('departments')->get()->result_array();

                                ?>

                                <?php foreach ($q as $x) {

                                    if ($x['dept_name'] == $userData[0]['department']) {

                                ?>

                                <option selected><?php echo $x['dept_name'] ?></option>

                                <?php } else { ?>

                                <option><?php echo $x['dept_name'] ?></option>

                                <?php } ?>

                                <?php } ?>

                            </select>

                        </div>

                    </form>

                </div>

                <div class="modal-footer mb-3">

                    <button id="my_pref_save" type="button" class="btn btn-primary mt-3">Save changes</button>

                </div>

            </div>

        </div>

    </div> -->

    <div class="container mt-2 mb-5">

        <div class="row">

            <!-- left Bar -->

            <?php include('left-sidebar.php'); ?>

            <div class="col-12 col-sm-12 col-xl-10">

                <?php if (isset($_SESSION['emergency'])) { ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">

                        Help is on the way!

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                        </button>

                    </div>

                <?php }

                unset($_SESSION['emergency']); ?>



                   

                    <div class="col-sm-12">



                        <div class="social-timeline">



                            <div class="row timeline-right">

                                <?php if (isset($hospitalPost)) : ?>

                                    <?php foreach ($hospitalPost as $x) : ?>

                                        <div class="col-12 col-sm-12 col-xl-12">

                                            <div class="card" data-aos="fade-right">

                                                <div class="card-block post-timelines">

                                                    <div class="chat-header f-w-600 mr-2" style="float:left">

                                                        <img class="img-radius timeline-icon" src="<?php echo base_url('userUploads/' . $x['logo'])  ?>" alt="">

                                                    </div>



                                                    <div class="chat-header f-w-600"><?php echo $x['hos_name']

                                                                                        ?> added new

                                                        <?php echo $x['post_title'] ?></div>

                                                    <div class="social-time text-muted">

                                                        <?php $date = date_create($x['post_time']);

                                                        echo date_format($date, 'd/m/y'); ?>

                                                    </div>

                                                </div>

                                             

                                                <div class="card-block mt-0 pt-0">

                                                    <div class="timeline-details">

                                                        <p class="text-muted mb-0 pb-0"><?php echo $x['post_content'] ?></p>

                                                    </div>

                                                </div>

                                                <?php if ($x['image'] != '') : ?>

<img src="<?php echo base_url('userUploads/' . $x['image']) ?>" class="img-fluid width-100" alt="" style="height:400px; object-fit:cover;">

<?php endif; ?>
                                                <div class="card-block desk-bar row b-b-theme mx-0 mt-0 pt-0 b-t-theme social-msg mt-lg-4" >

                                                    <a class="like<?php echo $x['post_id'] ?> col-4 col-sm-4 col-md-4 col-lg-6 text-center" href="javascript:void(0);"> <i id="heart<?php echo $x['post_id'] ?>" class="fas fa-heart text-muted"></i><span class="b-r-muted">Like

                                                            (<span class="p-0 m-0" id="like_count_<?php echo $x['post_id'] ?>"><?php

                                                                                                                                $search = array(

                                                                                                                                    'post_id' => $x['post_id'],

                                                                                                                                    'likes' => 1

                                                                                                                                );

                                                                                                                                $q = $this->db->select('*')->from('post_likes_comment_share')->where($search)->get();

                                                                                                                                echo $q->num_rows();

                                                                                                                                // echo $x['like_count'] 

                                                                                                                                ?></span>)

                                                        </span>

                                                    </a>

                                                    <?php $c = $this->db->select('*')->from('post_likes_comment_share')->where('post_id', $x['post_id'])->get()->num_rows(); ?>
                                                    <!-- 
                                          

                                                    </a>

                                                     <a class="col-4 col-sm-4 col-md-2 col-lg-6 text-center" href="#"> <i class="fas fa-share text-muted"></i> <span>Share
                                                            (<?php echo $x['share_count'] ?>)</span>

                                                    </a> -->

                                                </div>

                                                <div class="card-block mob-bar row b-b-theme mx-0 mt-0 pt-0 b-t-theme social-msg">

                                                    <a class="like<?php echo $x['post_id'] ?> col-4 col-sm-4 col-md-4 col-lg-4 text-center" href="javascript:void(0);">

                                                        <nobr> <i id="heart<?php echo $x['post_id'] ?>" class="fas fa-heart text-muted"></i><span class="b-r-muted">

                                                                (<span class="p-0 m-0" id="like_count_<?php echo $x['post_id'] ?>"><?php

                                                                                                                                    $search = array(

                                                                                                                                        'post_id' => $x['post_id'],

                                                                                                                                        'likes' => 1

                                                                                                                                    );

                                                                                                                                    $q = $this->db->select('*')->from('post_likes_comment_share')->where($search)->get();

                                                                                                                                    echo $q->num_rows();

                                                                                                                                    // echo $x['like_count'] 

                                                                                                                                    ?></span>)

                                                            </span></nobr>

                                                    </a>

                                                    <?php $c = $this->db->select('*')->from('post_likes_comment_share')->where('post_id', $x['post_id'])->get()->num_rows(); ?>

                                                    <a class="comment<?php echo $x['post_id'] ?> col-4 col-sm-4 col-md-4 col-lg-4 text-center" href="javascript:void(0);">

                                                        <nobr> <i class="fas fa-comment text-muted"></i><span class="b-r-muted">

                                                                (<span class="p-0 m-0" id="comments_count_<?php echo $x['post_id'] ?>"><?php echo $c ?></span>)</span>

                                                        </nobr>

                                                    </a>

                                                    <a class="col-4 col-sm-4 col-md-4 col-lg-4 text-center" href="#">

                                                        <nobr> <i class="fas fa-share text-muted"></i> <span>

                                                                (<?php echo $x['share_count'] ?>)</span></nobr>

                                                    </a>

                                                </div>

                                                <ul id="comment-section<?php echo $x['post_id'] ?>" class="comment-section" style="display: none;">

                                                    <div id="prev_comment">

                                                        <?php $p = $this->db->select('*')->from('post_likes_comment_share')->where('post_id', $x['post_id'])->join('user_details', 'user_details.email_id = post_likes_comment_share.email_id')->order_by("comment_time", "asc")->get()->result_array();

                                                        foreach ($p as $y) {

                                                        ?>

                                                            <li class="comment user-comment">



                                                                <div class="info">

                                                                    <a href="#"><?php echo $y['name'] ?></a>

                                                                    <span><small><?php echo $y['comment_time'] ?></small></span>

                                                                </div>



                                                                <a class="avatar" href="#">

                                                                    <?php if ($y['picture'] != '') { ?>

                                                                        <img src="<?php echo $y['picture']

                                                                                    ?>" width="35" height="35" alt="Profile Avatar" title="<?php echo $y['name'] ?>" />

                                                                    <?php } else { ?>

                                                                        <img src="<?php echo base_url('images/avatar.png')

                                                                                    ?>" width="35" alt="Profile Avatar" title="<?php echo $y['name'] ?>" />

                                                                    <?php } ?>

                                                                </a>



                                                                <p><?php echo $y['comment'] ?></p>



                                                            </li>

                                                        <?php } ?>

                                                    </div>





                                                    <!-- <li class="comment author-comment">



                                                    <div class="info">

                                                        <a href="#">Jack Smith</a>

                                                        <span>3 hours ago</span>

                                                    </div>



                                                    <a class="avatar" href="#">

                                                        <img src="<?php echo base_url('images/avatar.png')

                                                                    ?>" width="35" alt="Profile Avatar" title="Jack Smith" />

                                                    </a>



                                                    <p>From author</p>



                                                </li> -->



                                                    <!-- <li class="comment user-comment">



                                                    <div class="info">

                                                        <a href="#">Bradley Jones</a>

                                                        <span>1 hour ago</span>

                                                    </div>



                                                    <a class="avatar" href="#">

                                                        <img src="<?php echo base_url('images/avatar.png')

                                                                    ?>" width="35" alt="Profile Avatar" title="Bradley Jones" />

                                                    </a>



                                                    <p>Suspendisse gravida sem sit amet molestie portitor?</p> -->



                                                    </li>



                                                    <!-- <li class="comment author-comment">



                                                    <div class="info">

                                                        <a href="#">Jack Smith</a>

                                                        <span>1 hour ago</span>

                                                    </div>



                                                    <a class="avatar" href="#">

                                                        <img src="<?php echo base_url('images/avatar.png')

                                                                    ?>" width="35" alt="Profile Avatar" title="Jack Smith" />

                                                    </a>



                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisee gravida sem sit amet molestie

                                                        porttitor.</p>



                                                </li> -->

                                                    <?php if (isset($_SESSION['userLog']) && $_SESSION['userLog'] == true) { ?>

                                                        <li class="write-new">

                                                            <textarea id="new_comment_<?php echo $x['post_id'] ?>" placeholder="Write your comment here" name="comment"></textarea>

                                                            <div>

                                                                <img src="<?php if ($userData[0]['picture'] != '') {

                                                                                echo $userData[0]['picture'];
                                                                            } else {

                                                                                echo base_url('images/avatar.png');
                                                                            } ?>" width="35" height="35" alt="Profile Avatar" title="<?php echo $userData[0]['name'] ?>" />

                                                                <button id="new_comment_btn_<?php echo $x['post_id'] ?>" type="submit">Submit</button>

                                                            </div>

                                                        </li>

                                                    <?php } ?>

                                                </ul>

                                            </div>

                                        </div>

                                    <?php endforeach; ?>


                                <?php else : ?>

                                    <?php echo"<label style='color:red'>No Post Added</label>"
                                    ?>
                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                </div>



            </div>

        </div>

        <!-- Reviews -->

        <!-- <div class="col-sm-8 bg-light revData">

                 <?php if ($book_status != '') {

                        echo $alert;

                        unset($_SESSION['book_status']);
                    }

                    ?>

                 <?php foreach ($reviews as $x) : ?>

                     <div class="mt-3 pb-2" style="border-bottom: 2px ridge #AFABAB;">

                         <div class="row">

                             <div class="col-12">

                                 <img src="<?php echo $x['picture'] ?>" class="img-thumbnail ml-3 mr-3 float-left rounded-circle" style="height: 70px; width:70px;" alt="">



                                 <i class="fas fa-ellipsis-v fa-lg mt-2 float-right"></i>

                                 <h5 class="pt-2"><a href=""><?php echo $x['name'] ?></a> reviewed

                                     <?php if (isset($x['doc_name'])) : ?>

                                         <a href=""><strong class="rev-sub"><?php echo 'Dr. ' . $x['doc_name'] ?> </strong></a>

                                     <?php elseif (isset($x['hos_name']) && isset($x['dept_name'])) : ?>

                                         <a href=""><strong class="rev-sub"><?php echo $x['dept_name'] . ' dept, ' . $x['hos_name'] ?></strong></a>

                                     <?php elseif (isset($x['hos_name'])) : ?>

                                         <a href=""><strong class="rev-sub"><?php echo $x['hos_name'] ?> </strong></a>

                                     <?php endif; ?><br>

                                     <small style="font-size:13px;"><?php $date = date_create($x['datetime']);

                                                                    echo date_format($date, 'd/m/Y'); ?></small>

                                 </h5>



                             </div>

                         </div>

                         <div class="row">

                             <div class="col-9">

                                 <strong class="pl-2 mt-2 text-info" style="font-size: 18px;"><?php echo $x['review_title'] ?></strong>

                                 <p class="pl-2 pt-2 wwdtext"><?php echo $x['review_content'] ?></p>

                             </div>

                             <div class="col-3">

                                 <div class="mt-2">

                                     <h5 class="text-center"><?php echo $x['star_rating'] ?> out of 5</h5>

                                     <div class="row justify-content-center">

                                         <?php if (isset($x['doc_name'])) : ?>

                                             <div id="rateYo<?php echo $x['review_id'] . $x['doc_id'] ?>"></div>

                                         <?php elseif (isset($x['hos_name']) && isset($x['dept_name'])) : ?>

                                             <div id="rateYo<?php echo $x['review_id'] . $x['dept_id'] ?>"></div>

                                         <?php elseif (isset($x['hos_name'])) : ?>

                                             <div id="rateYo<?php echo $x['review_id'] . $x['hos_id'] ?>"></div>

                                         <?php endif; ?>



                                     </div>

                                 </div>

                             </div>

                         </div>

                         <div class="row justify-content-center">

                             <div class="col-4 pl-5"><i class="fas fa-thumbs-up icons"></i>&nbsp;Like</div>

                             <div class="col-4 pl-5"><i class="fas fa-comment icons"></i>&nbsp;Comments</div>

                             <div class="col-4 pl-5"><i class="fas fa-share icons"></i>&nbsp;Share</div>

                         </div>

                     </div>

                 <?php endforeach; ?>

             </div> -->

        <!-- right Bar -->





    </div>

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

                                    <?php //foreach ($filters['hos'] as $x) : 

                                    ?>

                                    <option value="<?php //echo $x['hos_name'] 

                                                    ?>">

                                        <?php //endforeach; 

                                        ?>

                                </datalist>

                            </div>

                            <div class="form-group col-4">

                                <h6>Department</h6>

                                <input list="department" class="form-control" name="department">

                                <datalist id="department">

                                    <?php //foreach ($filters['depts'] as $x) : 

                                    ?>

                                    <option value="<?php //echo $x['dept_name'] 

                                                    ?>">

                                        <?php //endforeach; 

                                        ?>

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
     $(document).ready(function() {
      <?php if (isset($_SESSION['userLog'])) { ?>

                <?php foreach ($hospitalPost as $x) { ?>

                    var email_id = '<?php echo $_SESSION['email_id'] ?>';

                    var post_id = '<?php echo $x['post_id'] ?>';

                    // console.log(post_id);

                    var <?php echo $x['post_id'] ?>like_flag = 0;

                    $.ajax({

                        type: 'post',

                        url: '<?php echo site_url('userProfile_Controller/checkLikes') ?>',

                        data: {

                            'email_id': email_id,

                            'post_id': post_id

                        },

                        success: function(res) {

                            var post_id = '<?php echo $x['post_id'] ?>';

                            // console.log(post_id);

                            // console.log(res);

                            if (res == 'liked') {

                                $('#heart<?php echo $x['post_id'] ?>').removeClass('text-muted');

                                $('#heart<?php echo $x['post_id'] ?>').addClass('text-danger');

                                <?php echo $x['post_id'] ?>like_flag = 1;

                            } else {

                                $('#heart<?php echo $x['post_id'] ?>').removeClass('text-danger');

                                $('#heart<?php echo $x['post_id'] ?>').addClass('text-muted');

                                <?php echo $x['post_id'] ?>like_flag = 0;

                            }

                            $('.like<?php echo $x['post_id'] ?>').click(function() {

                                <?php if (isset($_SESSION['userLog'])) { ?>

                                    if (<?php echo $x['post_id'] ?>like_flag == 0) {

                                        $('#heart<?php echo $x['post_id'] ?>').removeClass('text-muted');

                                        $('#heart<?php echo $x['post_id'] ?>').addClass('text-danger');

                                        $.ajax({

                                            type: 'post',

                                            url: '<?php echo site_url('userProfile_Controller/postLiked') ?>',

                                            data: {

                                                'email_id': email_id,

                                                'post_id': post_id

                                            },

                                            success: function(res) {

                                                var count = parseInt($(

                                                    '#like_count_<?php echo $x['post_id'] ?>'

                                                ).html());

                                                count += 1;

                                                $('#like_count_<?php echo $x['post_id'] ?>')

                                                    .html(count);

                                                // console.log(res);

                                            }

                                        });

                                        <?php echo $x['post_id'] ?>like_flag = 1;

                                    } else if (<?php echo $x['post_id'] ?>like_flag == 1) {

                                        <?php echo $x['post_id'] ?>like_flag = 0;

                                        $('#heart<?php echo $x['post_id'] ?>').removeClass('text-danger');

                                        $('#heart<?php echo $x['post_id'] ?>').addClass('text-muted');

                                        $.ajax({

                                            type: 'post',

                                            url: '<?php echo site_url('userProfile_Controller/postUnLiked') ?>',

                                            data: {

                                                'email_id': email_id,

                                                'post_id': post_id

                                            },

                                            success: function(res) {

                                                var count = parseInt($(

                                                    '#like_count_<?php echo $x['post_id'] ?>'

                                                ).html());

                                                count -= 1;

                                                $('#like_count_<?php echo $x['post_id'] ?>')

                                                    .html(count);

                                                // console.log(res);

                                            }

                                        });

                                        // $('.fa-heart').css('color', 'grey');

                                    }

                                <?php } else { ?>

                                    window.location.href =

                                        "<?php echo site_url('userProfile_Controller') ?>";

                                <?php  } ?>

                            });
                        }
                        
                        });


                <?php } ?>

            <?php } ?>

     });
  </script>



    <script>
        <?php foreach ($hospitalPost as $x) : ?>

            var <?php echo $x['post_id'] ?>comment_flag = 0;

            $('.comment<?php echo $x['post_id'] ?>').click(function() {

                if (<?php echo $x['post_id'] ?>comment_flag == 0) {

                    $('#comment-section<?php echo $x['post_id'] ?>').show();

                    <?php echo $x['post_id'] ?>comment_flag = 1;

                } else if (<?php echo $x['post_id'] ?>comment_flag == 1) {

                    $('#comment-section<?php echo $x['post_id'] ?>').hide();

                    <?php echo $x['post_id'] ?>comment_flag = 0;

                }

            

        <?php endforeach; ?>
    </script>

    <!-- <script>
        // <?php //foreach ($hospitalPost as $x) : ?>

        //     var //<?php //echo $x['post_id'] ?>like_flag = 0;

        //     $('#like<?php //echo $x['post_id'] ?>').click(function() {

        //         <?php if (isset($_SESSION['userLog'])) { ?>

        //         if (<?php //echo $x['post_id'] ?>like_flag == 0) {

        //             $('#heart<?php //echo $x['post_id'] ?>').removeClass('text-muted');

        //             $('#heart<?php //echo $x['post_id'] ?>').addClass('text-danger');

        //             <?php //echo $x['post_id'] ?>like_flag = 1;

        //         } else if (<?php //echo $x['post_id'] ?>like_flag == 1) {

        //             <?php //echo $x['post_id'] ?>like_flag = 0;

        //             $('#heart<?php //echo $x['post_id'] ?>').addClass('text-muted');

        //             // $('.fa-heart').css('color', 'grey');

        //         }

        //         <?php } else { ?>

        //             window.location.href = "<?php echo site_url('userProfile_Controller') ?>";

        //        <?php  } ?>

        //     });

        // <?php //endforeach; ?>
    </script> -->

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



    <?php

    if (isset($_SESSION['userLog']) && $_SESSION['userLog'] == true) {
         if(isset($userData[0]['treatment']) == 1 || isset($userData[0]['disease']) == 1 || isset($userData[0]['department']) == 1)
        {

        if ($userData[0]['treatment'] == "" || $userData[0]['disease'] == "" || $userData[0]['department'] == "") {

    ?>



            <script>
                $(document).ready(function() {

                    $('#exampleModal').modal('show');

                });
            </script>



    <?php }
}
    }

    ?>



    <script>
        $('#my_pref_save').click(function() {

            var email = '<?php echo $_SESSION['email_id'] ?>';

            var treat = $('#treat').val();

            var disease = $('#disease').val();

            var dept = $('#dept').val();

            // console.log(treat);

            // console.log(disease);

            // console.log(dept);

            $.ajax({

                type: 'POST',

                url: '<?php echo site_url('userProfile_Controller/savePreference') ?>',

                data: {

                    'treat': treat,

                    'disease': disease,

                    'dept': dept,

                    'email': email

                },

                success: function(data) {

                    console.log(data);

                    $('#exampleModal').modal('hide');

                    location.reload(true);

                }

            });

        });
    </script>



    <script>
        <?php foreach ($hospitalPost as $x) { ?>

            $('#new_comment_btn_<?php echo $x['post_id'] ?>').click(function() {

                var comment = $('#new_comment_<?php echo $x['post_id'] ?>').val();

                var email_id = '<?php echo $_SESSION['email_id'] ?>';

                var post_id = '<?php echo $x['post_id'] ?>';

                // console.log(comment);

                $.ajax({

                    type: 'POST',

                    url: '<?php echo site_url('userProfile_Controller/saveComment') ?>',

                    data: {

                        'comment': comment,

                        'email_id': email_id,

                        'post_id': post_id

                    },

                    success: function(data) {

                        // console.log(data);

                        var prev_comments = $('#comment-section<?php echo $x['post_id'] ?> #prev_comment')

                            .html();

                        $('#comment-section<?php echo $x['post_id'] ?> #prev_comment').html(prev_comments +

                            data);

                        var comments_count = parseInt($('#comments_count_<?php echo $x['post_id'] ?>')

                            .html()) + 1;

                        $('#comments_count_<?php echo $x['post_id'] ?>').html(comments_count);

                        $('#new_comment_<?php echo $x['post_id'] ?>').val('');

                    }



                });

            });

        <?php } ?>
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