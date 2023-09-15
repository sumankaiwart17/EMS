



<!doctype html>

<html lang="en">

  <head>

    

    <style>

        .card-box {

            padding: 5px;

            border-radius: 5px;

            background: white;

            color: #b52f21;

        }

        .bg-custom {

            background-color: #176aad!important;

        }

        .jumbotron {

            

        }.jumbotron p{

            letter-spacing: 0px;

            margin-top: 15px;

        }

        a:hover,a:focus{

            text-decoration: none;

            outline: none;

        }

        .tab{ 

            font-family: 'Sora', sans-serif; 

            }

        .tab .nav-tabs{

            background-color: transparent;

            border: none;

        }

        .tab .nav-tabs li{

            width: 25%;

        }

        .tab .nav-tabs li a{

            color: black;

            background: #fafafa;

            font-weight: 600;

            letter-spacing: 1px;

            text-align: center;

            text-transform: uppercase;

            padding: 11px 10px 10px;

            margin: 0 10px 1px 0;

            border: none;

            box-shadow: 0 0 5px rgba(0,0,0,0.1);

            border-radius: 5px;

            overflow: hidden;

            position: relative;

            z-index: 1;

            transition: all 0.3s ease 0s;

        }

        .tab .nav-tabs li:last-child a{ margin-right: 0; }

        .tab .nav-tabs li a:hover,

        .tab .nav-tabs li a.active{

            color: white;

            background: #fa8072;

            border: none;

            

        }

        .tab .nav-tabs li a:before{

            content: '';

            color: white;

            background: #D21818;

            height: 100%;

            width: 100%;

            opacity: 0;

            transform: scale(0.5);

            position: absolute;

            left: 50%;

            top: 0;

            z-index: -1;

            transition: opacity 0.4s ease 0s,left 0.3s ease 0s,transform 0.4s ease 0.2s;

        }

        .tab .nav-tabs li a.active:before,

        .tab .nav-tabs li a:hover:before{

            opacity: 1;

            transform: scale(1.2);

            left: 0;

            color: #fafafa;

        }

        .tab .tab-content{

            color: #333;

            height: 600px;

            overflow: scroll;

            letter-spacing: 1px;

            line-height: 25px;

            padding: 0px;

            position: relative;

        }.tab-content::-webkit-scrollbar {

            display: none;

            }

        

        @media only screen and (max-width: 479px){

            .tab .nav-tabs li{ width: 100%; }

            .tab .nav-tabs li a{ margin: 0 0 10px; }

        }

        

    </style>

    <style>

      * {

        margin: 0;

        padding: 0;

        font-family: "Sofia", sans-serif;

        }



        h2 {

        color: #0a4870;

        font-weight: 500;

        }



        ul {

        display: flex;

        flex-wrap: wrap;

        list-style: none;

        padding: 0;

        padding-left: 15px;

        }

        ul .booking-card {

        position: relative;

        width: 280px;

        display: flex;

        height: 340px;

        flex: 0 0 280px;

        flex-direction: column;

        margin-top: 10px;

        margin-right: 20px;

        margin-bottom: 10px;

        -webkit-border-radius: 10px;

        -moz-border-radius: 10px;

        border-radius: 10px;

        border: .02px ridge #d3d3d3;

        box-shadow: 10px 10px 8px #888888;

        overflow: hidden;

        background-position: center center;

        background-size: cover;

        text-align: center;

        color: #0a4870;

        transition: 0.3s;

        }

        ul .booking-card:hover{

            transform: scale(1.02);

            z-index: 1;

        }

        ul .booking-card::before {

        content: "";

        position: absolute;

        top: 0;

        left: 0;

        right: 0;

        bottom: 0;

        background: rgba(10, 72, 112, 0);

        transition: 0.3s;

        }

        ul .booking-card .book-container {

        height: 100px;

        }

        ul .booking-card .book-container .content {

        position: relative;

        opacity: 0;

        display: flex;

        align-items: center;

        justify-content: center;

        height: 100%;

        width: 100%;

        transform: translateY(-300px);

        transition: 0.3s;

        }

        ul .booking-card .book-container .content .btn {

        border: 3px solid white;

        padding: 10px 15px;

        background: none;

        text-transform: uppercase;

        font-weight: bold;

        font-size: 1.3em;

        color: white;

        cursor: pointer;

        transition: 0.3s;

        }

        ul .booking-card .book-container .content .btn:hover {

        background: white;

        border: 0px solid white;

        color: #0a4870;

        }

        ul .booking-card .informations-container {

        flex: 1 0 auto;

        padding: 20px;

        background: #f0f0f0;

        transform: translateY(106px);

        transition: 0.3s;

        }

        ul .booking-card .informations-container .title {

        position: relative;

        padding-bottom: 10px;

        margin-bottom: 10px;

        font-weight: bold;

        font-size: 1.2em;

        }

        ul .booking-card .informations-container .title::after {

        content: "";

        position: absolute;

        bottom: 0;

        left: 0;

        right: 0;

        height: 3px;

        width: 50px;

        margin: auto;

        background: #0a4870;

        }

        ul .booking-card .informations-container .price {

        display: flex;

        align-items: center;

        justify-content: center;

        margin-top: 10px;

        }

        ul .booking-card .informations-container .price .icon {

        margin-right: 10px;

        }

        ul .booking-card .informations-container .more-information {

        opacity: 0;

        transition: 0.3s;

        }

        ul .booking-card .informations-container .more-information .info-and-date-container {

        display: flex;

        }

        ul .booking-card .informations-container .more-information .info-and-date-container .box {

        flex: 1 0;

        padding: 15px;

        margin-top: 20px;

        -webkit-border-radius: 10px;

        -moz-border-radius: 10px;

        border-radius: 10px;

        background: white;

        font-weight: bold;

        font-size: 0.9em;

        }

        ul .booking-card .informations-container .more-information .info-and-date-container .box .icon {

        margin-bottom: 5px;

        }

        ul .booking-card .informations-container .more-information .info-and-date-container .box.info {

        color: #ec992c;

        margin-right: 10px;

        }

        ul .booking-card .informations-container .more-information .disclaimer {

        margin-top: 20px;

        padding: 0px;

        color: #7d7d7d;

        }

        ul .booking-card:hover::before {

        background: rgba(10, 72, 112, 0.6);

        }

        ul .booking-card:hover .book-container .content {

        opacity: 1;

        transform: translateY(0px);

        }

        ul .booking-card:hover .informations-container {

        transform: translateY(0px);

        }

        ul .booking-card:hover .informations-container .more-information {

        opacity: 1;

        }



        @media (max-width: 768px) {

        ul .booking-card::before {

            background: rgba(10, 72, 112, 0.6);

        }

        ul .booking-card .book-container .content {

            opacity: 1;

            transform: translateY(0px);

        }

        ul .booking-card .informations-container {

            transform: translateY(0px);

        }

        ul .booking-card .informations-container .more-information {

            opacity: 1;

        }

        }

        .credits {

        display: table;

        background: #0a4870;

        color: white;

        line-height: 25px;

        margin: 10px auto;

        padding: 20px;

        -webkit-border-radius: 10px;

        -moz-border-radius: 10px;

        border-radius: 10px;

        text-align: center;

        }

        .credits a {

        color: #e3ebf1;

        }



        h1 {

        margin: 10px 20px;

        }

    </style>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title id="track"> AAHRS </title>

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script>

		addEventListener("load", function () {

			setTimeout(hideURLbar, 0);

		}, false);



		function hideURLbar() {

			window.scrollTo(0, 1);

		}

	</script>

	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>

	<!-- //Meta tag Keywords -->

	

	<link rel="stylesheet" href="<?php echo base_url('css/fontawesome-all.css') ?>">



        <!-- //web fonts -->

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->

  </head>

  <body class="bg-body">

  <?php include 'Users/navbar.php'; ?>

        <div class="container pr-5 mx-auto">

            <div class="row justify-content-center">

                <div class="col-2">

                <div id="sidebar" class="pr-2">

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

                </div>

                <div class="col-10 p-0 col-sm-10 col-md-10 col-lg-10">

                    <div class="jumbotron pt-4 mb-2 pb-3" style="background: #b52f21;">

                        

                                <div class="row">

                                    <!-- <div class="col-2 col-sm-2">

                                    <img src="<?php echo base_url('userUploads/'.$disData['picture']) ?>" alt="disease image" class="img-thumbnail float-left" style="height: 100px; width: 100px; border-radius:10px;">

                                    <button class="btn btn-sm btn-info mt-3 ml-4" type="button"> + Follow</button>

                                    </div> -->

                                    <div class="col-10 col-sm">

                                    <div class="card-box float-right">

                                            <h5 class="text-center"><strong>862</strong><br>Followers</h5>

                                    </div>

                                    

                                        <h2 class="lead text-white"><strong><?php echo $treatData[0]['treat_name'] ?></strong></h2>

                                        <h6 class="text-white mt-4">Description</h6>

                                        <p class="text-white" ><?php echo $treatData[0]['treat_desc'] ?></p>

                                    </div>

                                </div>

                                <!-- <div class="row">

                                    <div class="col col-sm-2">

                                        <div class="card-box">

                                            <h5 class="text-center"><strong>862</strong> Visits</h5>

                                        </div>

                                    </div>

                                    <div class="col col-sm-2">

                                        <div class="card-box">

                                            <h5 class="text-center"><strong>862</strong> Standings</h5>

                                        </div>

                                    </div>

                                    <div class="col col-sm-2">

                                        <div class="card-box">

                                            <h5 class="text-center"><strong>862</strong> Rating</h5>

                                        </div>

                                    </div>

                                </div> -->

                            

                    </div>

                

                    <div class="row">

                        

                        

                                    <div class="col-sm-12">

                                        <div class="tab" role="tabpanel">

                                            <!-- Nav tabs -->

                                            <ul class="nav nav-tabs" role="tablist">

                                                <li role="presentation" class="nav-item"><a class="nav-link active" href="#hospitals" aria-controls="articles" role="tab" data-toggle="tab">Best Hospitals</a></li>

                                                <li role="presentation" class="nav-item"><a class="nav-link" href="#doctors" aria-controls="doctors" role="tab" data-toggle="tab">Best Doctors</a></li>

                                                <li role="presentation" class="nav-item"><a class="nav-link" href="#timeline" aria-controls="timeline" role="tab" data-toggle="tab">Timeline</a></li>

                                                <li role="presentation" class="nav-item"><a class="nav-link" href="#articles" aria-controls="articles" role="tab" data-toggle="tab">Top Articles</a></li>

                                            </ul>

                                            <!-- Tab panes -->

                                            <div class="tab-content tabs">

                                                <div role="tabpanel" class="tab-pane active" id="hospitals">

                                                <?php if(isset($hospitals)): ?>

                                                    <?php if(isset($hospitals[0]['hos_name'])): ?>

                                                        <ul class="revData mt-1">

                                                        <?php foreach($hospitals as $x): ?>

                                                        

                                                            <li class="booking-card" style="background-image: url(<?php echo base_url('userUploads/'.$x['logo']) ?>);background-repeat: no-repeat;background-position: 0px 0px;background-size: 280px 210px;">

                                                                <div class="book-container">

                                                                    <div class="content">

                                                                        <a href="<?php echo site_url('hospital_Controller/recHospital/'.$x['hos_id']) ?>" class="btn">View Details</a>

                                                                    </div>

                                                                </div>

                                                                <div class="informations-container">

                                                                    <h2 class="title"><a href="<?php echo site_url('hospital_Controller/recHospital/'.$x['hos_id']) ?>"><?php echo $x['hos_name'] ?></a> <small><?php echo $x['city'] ?></small></h2>

                                                                    <div class="d-flex pt-2 justify-content-between">

                                                                        <div class="my-auto">

                                                                            <p class="text-center"><?php echo '<strong style="font-size: 20px;">'.$x['totalRate'].' Reviews</strong>' ?></p>

                                                                        </div>

                                                                        <div class="">

                                                                            <p class="text-center mb-1"><?php echo round($x['avr'],1).' out of 5' ?></p>

                                                                            <span class="text-center">

                                                                            <div id="rateYo<?php echo $x['hos_id'] ?>"></div>

                                                                            </span>

                                                                        </div>

                                                                    </div>

                                                                    <div class="more-information row">

                                                                        <p class="sub-title mb-1 col-12"><?php echo $x['treat_name']?> Treatment</p>

                                                                    <p class="price col-12 mt-0">Budget:&nbsp;&nbsp;<svg class="icon" style="width:24px;height:24px" viewBox="0 0 24 24">

                                                                    <path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z" />

                                                                    </svg><?php echo $x['budget'] ?>&nbsp;<i class="fas fa-rupee-sign fa-sm"></i></p>

                                                                        

                                                                        <!-- <div class="info-and-date-container">

                                                                        <div class="box info">

                                                                            <svg class="icon" style="width:24px;height:24px" viewBox="0 0 24 24">

                                                                                <path fill="currentColor" d="M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z" />

                                                                            </svg>

                                                                            <p><?php echo $x['treat_name'] ?></p>

                                                                            <?php if($x['spoc'] != 0): ?>

                                                                                <p class="text-dark">SPOC: <?php echo $x['spoc'].'<br>'.$x['spoc_no'].', '.$x['spoc_email'] ?></p>

                                                                            <?php else: ?>

                                                                                <p class="text-dark">Phone: <?php echo $x['phone'].'<br>Email: '.$x['email_id'] ?></p>

                                                                            <?php endif; ?>

                                                                        </div>

                                                                        <div class="box date">

                                                                            <svg class="icon" style="width:24px;height:24px" viewBox="0 0 24 24">

                                                                                <path fill="currentColor" d="M19,19H5V8H19M16,1V3H8V1H6V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3H18V1M17,12H12V17H17V12Z" />

                                                                            </svg>

                                                                            <p><?php echo 'Timings: '.date("g:i A", strtotime($x['open_at'])).' - '.date("g:i A", strtotime($x['close_at'])) ?></p>

                                                                        </div>

                                                                        </div> -->

                                                                        <div class=" mt-1 mx-auto">

                                                                            <a href="<?php echo site_url('mainController/viewHospital/'.$x['hos_id']) ?>" class="btn btn-sm btn-primary" style="">View Profile</a>

                                                                            <a href="" class="btn btn-sm btn-danger">Book Appointment</a>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </li>

                                                        <?php endforeach; ?>

                                                        </ul>

                                                    <?php endif; ?>

                                                <?php endif; ?>    

                                                </div>

                                                <div role="tabpanel" class="tab-pane fade" id="articles">

                                                <?php foreach($articles as $x): ?>

                                                    <div class="card card-body p-3 mt-3 mb-3">

                                                        <div class="blockquote pl-5 pt-3">

                                                            <h3><?php echo $x['article_title'] ?></h3>

                                                            <p class="wwdtext mb-0"><?php echo $x['article_content'] ?></p>

                                                            <footer class="blockquote-footer pt-2">

                                                            <?php echo $x['article_contributer'] ?>, <cite title="Source Title"><?php echo $x['article_time'] ?></cite>

                                                            </footer>

                                                        </div>

                                                    </div>

                                                <?php endforeach; ?>

                                                </div>

                                                <div role="tabpanel" class="tab-pane fade" id="doctors">

                                                <?php foreach($bstDoctors as $x): ?>

                                                    <div class="card mt-3">

                                                        <div class="card-body p-3">

                                                        <div class="col-9 col-sm">

                                                            <img src="<?php echo $x['picture'] ?>" alt="" class="img-thumbnail float-left mr-4" style="max-height: 120px; max-width: 120px;">

                                                            <div class="inline-group float-right mt-3">

                                                                <h3 class="text-center"><strong><?php echo round($x['avg(doctor_review_user.star_rating)'],1) ?></strong>/5</h3>

                                                            <?php for($i=0; $i < round($x['avg(doctor_review_user.star_rating)']); $i++ ): ?>

                                                                <i class="fas fa-star text-warning" style="font-size: 15px;"></i>

                                                            <?php endfor; ?>

                                                                <h5 class="text-center"><strong>486</strong> Ratings</h5>

                                                            </div>

                                                            <h4 class="text-danger">Dr. <?php echo $x['doc_name'] ?></h4>

                                                            <h6><?php echo $x['specialization'] ?></h6>

                                                            <p style="font-size: 15px;"><?php echo $x['city'].', '.$x['state'] ?></p>

                                                        </div>

                                                    </div>

                                                    </div>

                                                <?php endforeach; ?>

                                                </div>

                                                <div role="tabpanel" class="tab-pane fade" id="timeline">

                                                    <div class="row mt-3 mb-1">

                                                        <div class="col-sm-12">

                                                            <div class="social-timeline">

                                                                 <div class="row timeline-right">

                                                                    <div class="col-12 col-sm-12 col-xl-12">

                                                                        <div class="card">

                                                                            <div class="card-block post-timelines pt-1">

                                                                                <div class="chat-header f-w-600" style="float:left">

                                                                                    <img class="img-radius timeline-icon m-4" src="<?php echo base_url('userUploads/doctor1.jpg') ?>" alt="" style="height: 60px; border-radius: 50px;">

                                                                                </div>

                                                                                <p class="font-weight-normal mt-3" style="font-size: 18px;">Sanjay Dixit</p>

                                                                                <p class="social-time text-muted" style="font-size: 13px;">5 days ago</p>

                                                                            </div>

                                                                            

                                                                            <div class="card-block">

                                                                                <div class="timeline-details pl-3">

                                                                                    <p class="" style="font-size: 15px;">High Court today formed a two-member judicial probe committee to find out the persons who are responsible for failure to prevent mosquito-borne disease dengue.</p>

                                                                                </div>

                                                                                <div class="timeline-photo bg-secondary" style="height: 300px; width: 100%;">

                                                                                    <img src="<?php echo base_url('userUploads/denMos.jpg') ?>" class="img-fluid rounded mx-auto d-block" style="height: 300px;" alt="">

                                                                                </div>

                                                                            </div>

                                                                            <div class="card-block b-b-theme b-t-theme row social-msg mt-3 mb-3">

                                                                                <a href="#" class="text-center col text-dark" style="font-size: 15px;"> <i class="fas fa-thumbs-up text-muted"></i><span class="b-r-muted">&nbsp;Like (5)</span> </a>

                                                                                <a href="#" class="text-center col text-dark" style="font-size: 15px;"> <i class="fas fa-comment text-muted"></i><span class="b-r-muted">&nbsp;Comments (2)</span></a>

                                                                                <a href="#" class="text-center col text-dark" style="font-size: 15px;"> <i class="fas fa-share text-muted"></i><span>&nbsp;Share (1)</span></a>

                                                                            </div>

                                                                            

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="row mt-3 mb-1">

                                                        <div class="col-sm-12">

                                                            <div class="social-timeline">

                                                                 <div class="row timeline-right">

                                                                    <div class="col-12 col-sm-12 col-xl-12">

                                                                        <div class="card">

                                                                            <div class="card-block post-timelines pt-1">

                                                                                <div class="chat-header f-w-600" style="float:left">

                                                                                    <img class="img-radius timeline-icon m-4" src="<?php echo base_url('userUploads/doctor1.jpg') ?>" alt="" style="height: 60px; border-radius: 50px;">

                                                                                </div>

                                                                                <p class="font-weight-normal mt-3" style="font-size: 18px;">Joe Satriani</p>

                                                                                <p class="social-time text-muted" style="font-size: 13px;">8 days ago</p>

                                                                            </div>

                                                                            

                                                                            <div class="card-block">

                                                                                <div class="timeline-details pl-3">

                                                                                    <p class="font-weight-normal" style="font-size: 15px;">Dengue fever is a mosquito-borne tropical disease caused by the dengue virus. Symptoms typically begin 3 to 14 days after infection. The most common symptoms are high fever, headache, vomiting, muscle and joint pain, and a characteristic skin rash.</p>

                                                                                </div>

                                                                                <!-- <div class="timeline-photo bg-secondary" style="height: 300px; width: 100%;">

                                                                                    <img src="<?php echo base_url('userUploads/aa.jpg') ?>" class="img-fluid rounded mx-auto d-block" style="height: 300px;" alt="">

                                                                                </div> -->

                                                                            </div>

                                                                            <div class="card-block b-b-theme b-t-theme row social-msg mt-3 mb-3">

                                                                                <a href="#" class="text-center col text-dark" style="font-size: 15px;"> <i class="fas fa-thumbs-up text-muted"></i><span class="b-r-muted">&nbsp;Like (8)</span> </a>

                                                                                <a href="#" class="text-center col text-dark" style="font-size: 15px;"> <i class="fas fa-comment text-muted"></i><span class="b-r-muted">&nbsp;Comments (5)</span></a>

                                                                                <a href="#" class="text-center col text-dark" style="font-size: 15px;"> <i class="fas fa-share text-muted"></i><span>&nbsp;Share (2)</span></a>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                

                    </div>

                </div>

            </div>

        </div>

    

    <?php// include 'footer.php'; ?>

        <!-- Optional JavaScript; choose one of the two! -->

    <script>

    $(function () {

                <?php foreach ($hospitals as $x): ?>

                    $("#rateYo<?php echo $x['hos_id'] ?>").rateYo({

                        rating: <?php echo round($x['avr'],1) ?>,

                        readOnly: true,

                        starWidth: "15px",

                        spacing: "2px"

                    });

                <?php endforeach; ?>

            });

    </script>

     <!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

<!-- Latest compiled and minified JavaScript -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

   <!--  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script src="https://www.solodev.com/assets/password/strength.js"></script>

	<!-- js-files -->

	<!-- jquery -->

	<script src="<?php// echo base_url('js/jquery-2.2.3.min.js') ?>"></script>

	<!-- //jquery -->



	<!-- nav smooth scroll -->

	<script>

		$(document).ready(function () {

			$(".dropdown").hover(

				function () {

					$('.dropdown-menu', this).stop(true, true).slideDown("fast");

					$(this).toggleClass('open');

				},

				function () {

					$('.dropdown-menu', this).stop(true, true).slideUp("fast");

					$(this).toggleClass('open');

				}

			);

		});

	</script>

	<!-- //nav smooth scroll -->



	<!-- popup modal (for location)-->

	<script src="<?php echo base_url('js/jquery.magnific-popup.js') ?>"></script>

	<script>

		$(document).ready(function () {

			$('.popup-with-zoom-anim').magnificPopup({

				type: 'inline',

				fixedContentPos: false,

				fixedBgPos: true,

				overflowY: 'auto',

				closeBtnInside: true,

				preloader: false,

				midClick: true,

				removalDelay: 300,

				mainClass: 'my-mfp-zoom-in'

			});



		});

	</script>

	<!-- //popup modal (for location)-->



	<!-- cart-js -->

	<script src="<?php echo base_url('js/minicart.js') ?>"></script>

    <script>

    document.title = "AAHRS";

    </script>

	

	<!-- //cart-js -->



	

	<!-- //password-script -->

	

	<!-- scroll seller -->

	<script src="<?php echo base_url('js/scroll.js') ?>"></script>

	<!-- //scroll seller -->



	<!-- smoothscroll -->

	<script src="<?php echo base_url('js/SmoothScroll.min.js') ?>"></script>

	<!-- //smoothscroll -->



	<!-- start-smooth-scrolling -->

	<script src="<?php echo base_url('js/move-top.js') ?>"></script>

	<script src="<?php echo base_url('js/easing.js') ?>"></script>

	<script>

		jQuery(document).ready(function ($) {

			$(".scroll").click(function (event) {

				event.preventDefault();



				$('html,body').animate({

					scrollTop: $(this.hash).offset().top

				}, 1000);

			});

		});

	</script>

	<!-- //end-smooth-scrolling -->



	<!-- smooth-scrolling-of-move-up -->

	<script>

		$(document).ready(function () {

			/*

			var defaults = {

				containerID: 'toTop', // fading element id

				containerHoverID: 'toTopHover', // fading element hover id

				scrollSpeed: 1200,

				easingType: 'linear' 

			};

			*/

			$().UItoTop({

				easingType: 'easeOutQuart'

			});



		});

	</script>

	<script type="text/javascript">

	$(document).ready(function($) {

	$('#password1').strength({

	            strengthClass: 'strength',

	            strengthMeterClass: 'strength_meter',

	            strengthButtonClass: 'button_strength',

	            strengthButtonText: 'Show Password',

	            strengthButtonTextToggle: 'Hide Password'

	        });

	});

	</script>

	<script>

    var myDiv = $('.wwdtext');

    myDiv.text(myDiv.text().substring(0,210));

    </script>



	<!-- for bootstrap working -->

	<script src="<?php echo base_url('js/bootstrap.js') ?>"></script>

	<!-- //for bootstrap working -->

    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script> -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<!-- //js-files -->

	

  </body>

</html>