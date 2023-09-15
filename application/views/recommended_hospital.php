<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>

    <title><?php echo $hospitalDet['hos_name'] ?></title>

    <style>

        *{

            margin: 0px;

            padding: 0px;

            text-decoration: none;

        }

    body{

    margin-top:20px;

    color: #1a202c;

    text-align: left;

    background-color: #e2e8f0;    

}

.main-body {

    padding: 15px;

}

.card {

    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);

}



.card {

    position: relative;

    display: flex;

    flex-direction: column;

    min-width: 0;

    word-wrap: break-word;

    background-color: #fff;

    background-clip: border-box;

    border: 0 solid rgba(0,0,0,.125);

    border-radius: .25rem;

}



.card-body {

    flex: 1 1 auto;

    min-height: 1px;

    padding: 1rem;

}



.gutters-sm {

    margin-right: -8px;

    margin-left: -8px;

}



.gutters-sm>.col, .gutters-sm>[class*=col-] {

    padding-right: 8px;

    padding-left: 8px;

}

.mb-3, .my-3 {

    margin-bottom: 1rem!important;

}



.bg-gray-300 {

    background-color: #e2e8f0;

}

.h-100 {

    height: 100%!important;

}

.shadow-none {

    box-shadow: none!important;

}

body{

    background:#eee;    

}



.social-wallpaper {

    position: relative;

    height:300px;

background: url("images/medica.jpg") no-repeat;

    background-size: cover;

    background-color:#00b5ec;

}



.card.social-tabs {

    border-top: none;

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



.tab-pane form .md-add-on i {

    font-size: 20px;

}



.wall-elips {

    position: absolute;

    right: 15px;

}







.social-profile {

    position: relative;

    padding-top: 15px;

}



.timeline-btn {

    position: absolute;

    bottom: 0;

    right: 30px;

}



.nav-tabs.md-tabs.tab-timeline li a {

    padding: 20px 0 10px;

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

    font-size: 20px;

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

    font-size: 18px;

    margin-bottom: 10px;

    font-style: normal;

}



.social-follower h5 {

    font-size: 14px;

    font-weight: 300;

}



.social-follower .follower-counter {

    text-align: center;

    margin-top: 25px;

    margin-bottom: 25px;

    font-size: 13px;

}



.social-follower .follower-counter .txt-primary {

    font-size: 24px;

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



.user-box .social-designation,

.post-timelines .social-time {

    font-size: 13px;

}



.social-msg span {

    color: #666;

    padding-left: 10px;

    padding-right: 10px;

    margin-right: 10px;

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

    background-color: #FF5370!important;

    color: #fff;

}



.card {

    border-radius: 5px;

    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);

    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);

    border: none;

    margin-bottom: 30px;

    -webkit-transition: all 0.3s ease-in-out;

    transition: all 0.3s ease-in-out;

}



.user-box .media-object, .friend-box .media-object {

    height: 45px;

    width: 45px;

    display: inline-block;

    cursor: pointer;

}

.card:hover{

    transform: none;

}

.md-tabs .nav-item {

    width: calc(100%/ 4);

    text-align: center;

}
.nav-item:hover{

    color:black;


}



.scrollable{

    position: absolute;

    overflow: scroll;

}

.scrollable::-webkit-scrollbar {

  display: none;

}



/* Hide scrollbar for IE, Edge and Firefox */

.scrollable {

  -ms-overflow-style: none;  /* IE and Edge */

  scrollbar-width: none;  /* Firefox */

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

.tab-content::-webkit-scrollbar {

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

    </style>

</head>



<body>

<?php include 'Users/navbar.php' ;?>

<div class="container">

<div class="row">

<div id="sidebar" class="col-md-2 pr-5 pt-4 mt-2">

                <div id="recommend" class=" mb-3">

                    <a href="<?php echo site_url('userProfile_Controller/recommendMe') ?>" class="btn text-white btn-lg btn-danger font-weight-bold" >Recommend Me</a>

                    <p class="ml-2"><a href="">Dentistry</a><br>

                    <a href="">Past Searches</a></p>

                </div>

                <div id="" class="pl-1 mb-3">

                    <a href="#"><h5 class="sidebar-header">Consults</h5></a>

                    <p><a href="">Cardio Exercises</a><br>

                    <a href="">Root Canal - Dentistry</a></p>

                </div>

                <div id="" class="pl-1 mb-3">

                    <a href="#"><h5 class="sidebar-header">Articles</h5></a>

                </div>

                <div id="" class="pl-1 mb-3">

                    <a href="#"><h5 class="sidebar-header">My Preferences</h5><a>                                                                                                                    <p><a href="">Cancer</a><br>

                    <a href="">Dental Practices</a></p>

                </div>

                <div id="" class="pl-1 mb-3">

                    <a href="#"><h5 class="sidebar-header">Most Searched</h5></a>

                    <a href=""><span class="badge badge-pill badge-secondary">Cancer</span></a>

                    <a href=""><span class="badge badge-pill badge-secondary">dental</span></a>

                    <a href=""><span class="badge badge-pill badge-secondary">Apollo</span></a>

                    <a href=""><span class="badge badge-pill badge-secondary">gingivitis</span></a>

                    <a href=""><span class="badge badge-pill badge-secondary">hypothermia</span></a>

                </div>

                <div id="" class="pl-1 mb-3">

                    <a href="#"><h5 class="sidebar-header">Offers</h5></a>

                    <p><a href=""><span class="text-danger font-weight-bold">20% OFF-AMRI</span>&nbsp;full body Check up</a><br>

                    <a href=""><span class="text-danger font-weight-bold">COMBO OFFER-Apollo</span>&nbsp;Cardio Check up</a><br>

                    <a href=""><span class="text-danger font-weight-bold">@2599-Woodlands</span>&nbsp;Cardio Check up</a></p>

                </div>

            </div>

        <div class="main-body col-md-10 mt-3">

    

          <div class="row gutters-sm">

            <div class="col-md-4 mb-3">

              <div class="card">

                <div class="card-body">

                  <div class="d-flex flex-column align-items-center text-center">

                    <img src="<?php echo $hospitalDet['logo'] ?>" alt="Admin" class="img-fluid width-100" width="150">

                    <div class="mt-3">

                      <h4><?php echo $hospitalDet['hos_name'] ?></h4>

                      <p class="text-muted font-size-sm"><?php echo $hospitalDet['city'].', '.$hospitalDet['state'] ?></p>

                      <button class="btn btn-primary"><a style="color:white" href="<?php echo site_url('mainController/viewHospital/'.$hospitalDet['hos_id']) ?>">Visit Profile</a></button>

                      <button class="btn btn-outline-primary">Direction</button>

                    </div>

                  </div>

                </div>

              </div>

              <div class="card mt-3">

              <div class="card-header">

                                                    <h5 class="card-header-text">Overview</h5>

                                                    <!-- <button id="edit-btn" type="button" class="btn btn-primary waves-effect waves-light f-right">

                                                        <i class="icofont icofont-edit"></i>

                                                    </button> -->

                                                </div>

                                                <div class="card-block">

                                                    <div id="view-info" class="row">

                                                        <div class="col-lg-12 col-md-12">

                                                        <p style="color:black"><?php echo $hospitalDet['about'] ?></p>



                                                        </div>

                                                    </div>

                                                    

                                                </div>

              </div>

            </div>

            <div class="col-md-8">

              

              <div class="row gutters-sm">

                <div class="col-sm-6">

                  <div class="card">

                    <div class="card-body">

                      <h5 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Top Departments</i></h5>

                      <?php $c=0; ?>

                      <?php foreach($depts as $x): ?>

                        <?php $c+=1; ?>

                      <small>Department of <?php echo $x['dept_name'] ?></small>

                      <div class="progress mb-3" style="height: 5px">

                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo round(($x['avr']/5)*100).'%' ?>" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>

                      </div>

                      <?php if($c==3){break;} ?>

                      <?php endforeach; ?>

                      

                    </div>

                  </div>

                </div>

                <div class="col-sm-6">

                  <div class="card">

                    <div class="card-body">

                      <h5 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Healthcare Facilities</i></h5>

                      <small>Burn Patient Units</small>

                      <div class="progress mb-3" style="height: 5px">

                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>

                      </div>

                      <small>Ambulatory Surgical Centers</small>

                      <div class="progress mb-3" style="height: 5px">

                        <div class="progress-bar bg-primary" role="progressbar" style="width: 77%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>

                      </div>

                      <small>Blood Banks</small>

                      <div class="progress mb-3" style="height: 5px">

                        <div class="progress-bar bg-primary" role="progressbar" style="width: 69%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>

                      </div>

                      <!-- <small>Imaging and radiology centers</small>

                      <div class="progress mb-3" style="height: 5px">

                        <div class="progress-bar bg-primary" role="progressbar" style="width: 62%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>

                      </div>

                      <small>Mediclaim Acceptance Department Wise</small>

                      <div class="progress mb-3" style="height: 5px">

                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>

                      </div> -->

                    </div>

                  </div>

                  

                </div>

     

              

            </div>

            



                <!-- Nav tabs -->

                <ul class="nav nav-tabs" role="tablist">

                    <li class="nav-item"><a href="#reviews" class="nav-link active" aria-controls="reviews" role="tab" data-toggle="tab">Top Reviews</a></li>

                    <li class="nav-item"><a href="#doctors" class="nav-link" aria-controls="doctors" style="color:black" role="tab" data-toggle="tab">Best Doctors</a></li>

                </ul>



                <!-- Tab panes -->

                <div class="tab-content" style="height: 600px; overflow:scroll;">

                    <div role="tabpanel" class="tab-pane active" id="reviews">

                        <div class="row mt-3">

                                                <?php $star5 = 0;

                                                    $star4 = 0;

                                                    $star3 = 0;

                                                    $star2 = 0;

                                                    $star1 = 0;

                                                    foreach($reviews as $x){

                                                        if($x['star_rating'] == 5){

                                                            $star5 = $star5 + 1;

                                                        }else if($x['star_rating'] == 4){

                                                            $star4 = $star4 + 1;

                                                        }else if($x['star_rating'] == 3){

                                                            $star3 = $star3 + 1;

                                                        }else if($x['star_rating'] == 2){

                                                            $star2 = $star2 + 1;

                                                        }else if($x['star_rating'] == 1){

                                                            $star1 = $star1 + 1;

                                                        }

                                                    }

                                                    $totalReviews = $star1+$star2+$star3+$star4+$star5;
                                                 
                                                    $totalRatings = $star1+($star2*2)+($star3*3)+($star4*4)+($star5*5);
                                              // $avgRating = round($totalRatings/$totalReviews,1);
                                                    // if(isset($avgRating)){
                                                    // $avgRating = round($totalRatings/$totalReviews,1);

                                                    // }
                                                    // else{
                                                    //     echo"No Reviews";
                                                    // }
                                                ?>

                            <div class="col-12 col-sm-6"><div class="card">

                                            <div class="card-body">

                                                <div class="d-flex justify-content-center">

                                                    <h4><strong>Overall Rating</strong></h4>

                                                </div>

                                                <div class="row">

                                                    <div class="col">

                                                        <h3 style="text-align: center;"><strong><?php //echo $avgRating ?></strong></h3>

                                                        <p class="text-center"><?php echo $totalRatings ?> Rating & <?php echo $totalReviews ?> Reviews</p>

                                                    </div>

                                                </div>

                                                <div class="row">    

                                                    <div class="col">

                                                        <div class="row justify-content-center">

                                                            <div class="col">

                                                                <p>5 <i class="fa fa-star text-warning"></i></p>

                                                            </div>

                                                            <div class="col">

                                                                <div class="progress" style="height:10px; margin-top:10px;">

                                                                    <div class="progress-bar bg-success" style="width:<?php echo ($star5/5)*100 ?>%;"></div>

                                                                </div>

                                                            </div>

                                                            <div class="col">

                                                                <p class="text-right"><?php echo $star5?></p>

                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col">

                                                                <p>4 <i class="fa fa-star text-warning"></i></p>

                                                            </div>

                                                            <div class="col">

                                                                <div class="progress" style="height:10px; margin-top:10px;">

                                                                    <div class="progress-bar bg-success" style="width:<?php echo ($star4/5)*100 ?>%;"></div>

                                                                </div>

                                                            </div>

                                                            <div class="col">

                                                                <p class="text-right"><?php echo $star4?></p>

                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col">

                                                                <p>3 <i class="fa fa-star text-warning"></i></p>

                                                                </div>

                                                            <div class="col">

                                                                <div class="progress" style="height:10px; margin-top:10px;">

                                                                    <div class="progress-bar bg-success" style="width:<?php echo ($star3/5)*100 ?>%;"></div>

                                                                </div>

                                                                </div>

                                                            <div class="col">

                                                                <p class="text-right"><?php echo $star3?></p>

                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col">

                                                                <p>2 <i class="fa fa-star text-warning"></i></p>

                                                                </div>

                                                            <div class="col">

                                                                <div class="progress" style="height:10px; margin-top:10px;">

                                                                    <div class="progress-bar bg-warning" style="width:<?php echo ($star2/5)*100 ?>%;"></div>

                                                                </div>

                                                                </div>

                                                            <div class="col">

                                                                <p class="text-right"><?php echo $star2?></p>

                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col">

                                                                <p>1 <i class="fa fa-star text-warning"></i></p>

                                                                </div>

                                                            <div class="col">

                                                                <div class="progress" style="height:10px; margin-top:10px;">

                                                                    <div class="progress-bar bg-danger" style="width:<?php echo ($star1/5)*100 ?>%;"></div>

                                                                </div>

                                                                </div>

                                                            <div class="col">

                                                                <p class="text-right"><?php echo $star1?></p>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    

                                                </div>

                                            </div>

                                        </div></div>

                                        <div class="col-12 col-sm-6"><div class="card">

                                            <div class="card-body">

                                                <h4 class="text-center"><strong>Rating Distribution</strong></h4>

                                                <br>

                                                <!--*************START************-->

                                                <div class="d-flex justify-content-between">

                                                    <p>Excellent</p>

                                                    <div class="ml-auto">

                                                        <i class="fa fa-star text-warning"></i>

                                                        <i class="fa fa-star text-warning"></i>

                                                        <i class="fa fa-star text-warning"></i>

                                                        <i class="fa fa-star text-warning"></i>

                                                        <i class="fa fa-star text-warning"></i>

                                                        

                                                    </div>

                                                    <p><?php echo $star5.' Users' ?></p>

                                                </div>  <br>

                                                <div class="d-flex justify-content-between">

                                                    <p>Very Good</p>

                                                    <div>

                                                        <i class="fa fa-star text-warning"></i>

                                                        <i class="fa fa-star text-warning"></i>

                                                        <i class="fa fa-star text-warning"></i>

                                                        <i class="fa fa-star text-warning"></i>

                                                        <span><?php echo $star4.' Users' ?></span>

                                                    </div>

                                                </div> <br>

                                                <div class="d-flex justify-content-between">

                                                    <p>Good</p>

                                                    <div>

                                                        <i class="fa fa-star text-warning"></i>

                                                        <i class="fa fa-star text-warning"></i>

                                                        <i class="fa fa-star text-warning"></i>

                                                        <span><?php echo $star3.' Users' ?></span>

                                                    </div>

                                                </div> <br>

                                                <div class="d-flex justify-content-between">

                                                    <p>Poor</p>

                                                    <div>

                                                        <i class="fa fa-star text-warning"></i>

                                                        <i class="fa fa-star text-warning"></i>

                                                        <span><?php echo $star2.' Users' ?></span>

                                                    </div>

                                                </div><br>

                                                <div class="d-flex justify-content-between">

                                                    <p>Very Poor</p>

                                                    <div>

                                                        <i class="fa fa-star text-warning"></i>

                                                        <span><?php echo $star1.' Users' ?></span>

                                                    </div>

                                                </div>

                                                <!--**************END**************-->

                                            </div> 

                                        </div></div>

                                        <div class="col-12 col-sm-12">

                                        <?php foreach($reviews as $x): ?>

                                        <div class="card">

                                            <div class="card-body">

                                                <div class="media">

                                                    <div class="row">

                                                        <div class="col-sm-3 ">

                                                    <?php if($x['picture']!==''):?>

                                                            <img src="<?php echo $x['picture'] ?>" class="rounded-circle" style="width:70px; height:70px; margin-left: 18px; margin-top: 10px;">

                                                            <?php else:?>
                                                                <img src="<?php echo base_url('images/avatar.png')?>" style='width:50px;'/> 
                                                            <?php  endif;?>
                                                            <p class="text-success pt-1 text-center"><small><?php echo $x['name'] ?></small></p>

                                                            

                                                        </div>

                                                        <div class="col-sm">

                                                            <div class="media-body">

                                                                <h4 styles="text-align: center;"><?php echo $x['review_title'] ?></h4>

                                                                <div class="row">

                                                                    <div class="col">

                                                                    <div id="rateYo<?php echo $x['review_id'] ?>" class=""></div>

                                                                    <span class="pl-2 text-danger"><?php echo round($x['star_rating'],1).' out of 5' ?></span>

                                                                    </div>

                                                                    <div class="col ">

                                                                        <p><?php 

                                                                        $date = date_create($x['datetime']);

                                                                        echo date_format($date,'d/m/Y'); ?></p>

                                                                    </div>

                                                                </div>

                                                                <p class="wwdtext pt-2"><?php echo $x['review_content'] ?></p>

                                                                

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                                <br>

                                            </div>    

                                        </div>

                                        <?php endforeach; ?>

                                        </div>

                        </div>

                    </div>

                    <div role="tabpanel" class="tab-pane" id="doctors">

                    <div class="row mt-2">

                                    <?php foreach($assocDoc as $x): ?>

                                        <div class="col-lg-12 col-xl-6 doc">

                                            <div class="card doc-card">

                                                <div class="card-block post-timelines">

                                                    

                                                    <div class="media bg-white d-flex">

                                                        <div class="media-left media-middle">

                                                            <a href="#">

                                                                <img class="media-object" width="120" src="<?php echo $x['picture'] ?>" style="height: 120px; width: 100px;" alt="">

                                                            </a>

                                                        </div>

                                                        <div class="media-body friend-elipsis">

                                                            <div class="f-15 f-bold m-b-5"><a href="doctor_profile_view.php" class="text-danger"><?php echo $x['doc_name'] ?></a></div>

                                                            <div class="text-muted social-designation"><?php echo $x['specialization'] ?></div>

                                                            <div><div class="mt-3 ml-2" id="rateYo<?php echo $x['doc_id'] ?>"></div><p class="text-danger text-center mt-2"><strong><?php echo $x['star_rating'] ?></strong> out of 5 Ratings</p>

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



            

            

            

          </div>

          </div>

        </div>

</div>

            

    </div>

    <script>

    $(function () {

                <?php foreach ($reviews as $x): ?>

                    $("#rateYo<?php echo $x['review_id'] ?>").rateYo({

                        rating: <?php echo $x['star_rating'] ?>,

                        readOnly: true,

                        starWidth: "20px",

                        spacing: "3px"

                    });

                <?php endforeach; ?>

                <?php foreach($assocDoc as $x): ?>

                    $("#rateYo<?php echo $x['doc_id'] ?>").rateYo({

                        rating: <?php echo $x['star_rating'] ?>,

                        readOnly: true,

                        starWidth: "16px",

                        spacing: "3px"

                    });

                <?php endforeach; ?>

            });

    </script>

           <!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

<!-- Latest compiled and minified JavaScript -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>

    var myDiv = $('.wwdtext');

    myDiv.text(myDiv.text().substring(0,100));

    </script>

</body>

</html>