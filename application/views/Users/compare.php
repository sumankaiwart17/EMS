 <!DOCTYPE html>

 <html lang="en">



 <head>

     <meta charset="UTF-8">

     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"

         integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <link rel="stylesheet" href="<?php echo base_url('css/cssUser/style.css') ?>">

     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

     <title>AAHRS | Compare</title>

     <style>

     .hosData {

         display: flex;

         flex-wrap: wrap;

         list-style: none;

         padding: 0;

         /* padding-left: 25px; */

         /* z-index: 0; */

         /* padding-right: 10px; */

     }



     .hosData .booking-card {

         position: relative;

         width: 220px;

         display: flex;

         height: 332px;

         flex: 0 0 210px;

         flex-direction: column;

         margin-top: 20px;

         margin-right: 6px;

         /* margin-left: 20px; */

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

         /* z-index: 1; */

     }



     .hosData .booking-card:hover {

         transform: scale(1.02);



     }



     /* .hosData .booking-card:hover .ribbon-1{

             transform: scaleY(-30);

         } */

     .hosData .booking-card::before {

         content: "";

         position: absolute;

         top: 0;

         left: 0;

         right: 0;

         bottom: 0;

         background: rgba(10, 72, 112, 0);

         transition: 0.3s;

     }



     .hosData .booking-card .book-container {

         height: 100px;

     }



     .hosData .booking-card .book-container .content {

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



     .hosData .booking-card .book-container .content .btn {

         border: 3px solid white;

         padding: 8px 12px;

         background: none;

         text-transform: uppercase;

         font-weight: bold;

         font-size: 1em;

         color: white;

         cursor: pointer;

         transition: 0.3s;

     }



     .hosData .booking-card .book-container .content .btn:hover {

         background: white;

         border: 0px solid white;

         color: #0a4870;

     }



     .hosData .booking-card .informations-container {

         flex: 1 0 auto;

         padding: 20px;

         padding-bottom: 10px;

         background: #f0f0f0;

         transform: translateY(106px);

         transition: 0.3s;

     }



     .hosData .booking-card .informations-container .title {

         position: relative;

         padding-bottom: 10px;

         margin-bottom: 10px;

         font-weight: bold;

         font-size: 1em;

     }



     .hosData .booking-card .informations-container .title::after {

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



     .hosData .booking-card .informations-container .price {

         display: flex;

         align-items: center;

         justify-content: center;

         margin-top: 10px;

     }



     .hosData .booking-card .informations-container .price .icon {

         margin-right: 10px;

     }



     .hosData .booking-card .informations-container .more-information {

         opacity: 0;

         transition: 0.3s;

     }



     .hosData .booking-card .informations-container .more-information .info-and-date-container {

         display: flex;

     }



     .hosData .booking-card .informations-container .more-information .info-and-date-container .box {

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



     .hosData .booking-card .informations-container .more-information .info-and-date-container .box .icon {

         margin-bottom: 5px;

     }



     .hosData .booking-card .informations-container .more-information .info-and-date-container .box.info {

         color: #ec992c;

         margin-right: 10px;

     }



     .hosData .booking-card .informations-container .more-information .disclaimer {

         margin-top: 20px;

         padding: 0px;

         color: #7d7d7d;

     }



     .hosData .booking-card:hover::before {

         background: rgba(10, 72, 112, 0.6);

     }



     .hosData .booking-card:hover .book-container .content {

         opacity: 1;

         transform: translateY(-12px);

     }



     .hosData .booking-card:hover .informations-container {

         transform: translateY(-27px);

     }



     .hosData .booking-card:hover .informations-container .more-information {

         opacity: 1;



     }



     [class^=ribbon-] {

         position: relative;

         margin-bottom: 80px;

     }



     [class^=ribbon-]:before,

     [class^=ribbon-]:after {

         content: "";

         position: absolute;

     }



     <?php for ($i=1; $i <=10; $i++) {

         echo '

.ribbon-' . $i . ' {

             position: absolute;

             width: 34px;

             height: 50px;

             padding-top: 20px;

             background: #0062cc;

             top: -4px;

             left: 2px;

             color: white;

             font-size: 15px;

             font-weight: bold;

             z-index: 2;

         }



         .ribbon-' . $i . ':before {

             height: 0;

             width: 0;

             border-bottom: 6px solid #ca3011;

             border-right: 6px solid transparent;

             right: -6px;

             top: -15px;

         }



         .ribbon-' . $i . ':after {

             height: 0;

             width: 0;

             border-left: 17px solid #0062cc;

             border-right: 17px solid #0062cc;

             border-bottom: 17px solid transparent;

             bottom: -16px;

             left: 0px;

         }



         ';



     }



     ?>@media (max-width: 768px) {

         ul .booking-card::before {

             background: rgba(10, 72, 112, 0.6);

         }

         .hosData{
         display:inherit;
         padding-left: 20px;
     }

     .hosData .booking-card{
         width:270px;
         
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



     .label__checkbox {

         display: none;

     }



     .label__check {

         position: absolute;

         z-index: 1;

         display: inline-block;

         border-radius: 50%;

         border: 5px solid rgba(0, 0, 0, 0.1);

         background: white;

         vertical-align: middle;

         margin-top: 4px;

         margin-left: 4px;

         width: 2em;

         height: 2em;

         cursor: pointer;

         display: flex;

         align-items: center;

         justify-content: center;

         transition: border .3s ease;


     }
         i.icon {

             opacity: 0.2;

             font-size: ~'calc(1rem + 1vw)';

             color: transparent;

             transition: opacity .3s .1s ease;

             -webkit-text-stroke: 3px rgba(0, 0, 0, .5);

         }



         &:hover {

             border: 5px solid rgba(0, 0, 0, 0.2);

         }

     }



     .label__checkbox:checked+.label__text .label__check {

         animation: check .5s cubic-bezier(0.895, 0.030, 0.685, 0.220) forwards;



         .icon {

             opacity: 1;

             transform: scale(0);

             color: white;

             -webkit-text-stroke: 0;

             animation: icon .3s cubic-bezier(1.000, 0.008, 0.565, 1.650) .1s 1 forwards;

         }

     }



     .center {

         position: absolute;

         top: 50%;

         left: 50%;

         transform: translate(-50%, -50%);

     }



     @keyframes icon {

         from {

             opacity: 0;

             transform: scale(0.3);

         }



         to {

             opacity: 1;

             transform: scale(1)

         }

     }



     @keyframes check {

         0% {

             width: 1.5em;

             height: 1.5em;

             border-width: 5px;

         }



         10% {

             width: 1.5em;

             height: 1.5em;

             opacity: 0.1;

             background: rgba(0, 0, 0, 0.2);

             border-width: 15px;

         }



         12% {

             width: 1.5em;

             height: 1.5em;

             opacity: 0.4;

             background: rgba(0, 0, 0, 0.1);

             border-width: 0;

         }



         50% {

             width: 2em;

             height: 2em;

             background: blue;

             color: white;

             border: 0;

             opacity: 0.6;

         }



         100% {

             width: 2em;

             height: 2em;

             color: white;

             background: blue;

             border: 0;

             opacity: 1;

         }

     }

    

     .sidebar {

         margin-left: 1000px;

         margin-right: 300px;

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

     <div class="container-fluid mt-2">

         <div class="row ml-1">

             <!-- left Bar -->

             <?php include('left-sidebar.php'); ?>



             <!-- Comparison Body -->

             <div class="col-sm-8 bg-body">

                 <h5>Compare Hospitals</h5>

                 <form action="<?php echo site_url('userProfile_Controller/compareSelected') ?>" method="post">

                     <div class="searchBar row mt-3"> 

                         <div class="col-12 col-sm-12 col-lg-3 order-last">

                             <input type="text" name="location" id="location" class="form-control" <?php if (isset($userAddress)) {

                                                                                                        echo 'value="' . $userAddress . '"';

                                                                                                    } ?>

                                 placeholder="Location">

                         </div>

                         <div class="col-12 col-sm-12 col-lg-3 order-last">

                             <input type="text" name="zip" id="zip" class="form-control"

                                 placeholder="Enter Zip Code(optional)">

                         </div>

                         <div class="col-12 col-sm-12 col-lg-3">

                             <input type="text" name="search" id="search" class="form-control" value=""

                                 placeholder="Search Hospitals">

                         </div>

                         <div class="col-12 col-sm-12 col-lg-3">

                             <!-- <input type="text" name="search" id="search" class="form-control" value="" placeholder="Search Treatment"> -->

                             <select class="form-control" name="" id="treat">

                                 <option value="" selected disabled>Select Treatment</option>

                                 <?php

                                    $q = $this->db->select('treat_id, treat_name')->from('treatments')->get()->result_array();

                                    ?>

                                 <?php foreach ($q as $x) { ?>

                                 <option value="<?php echo $x['treat_id'] ?>"><?php echo $x['treat_name'] ?></option>

                                 <?php } ?>

                             </select>

                         </div>

                     </div>

                     <div class="row compareData mt-3">

                         <div class="col-12 col-lg-8 mt-2">

                             <h3>Select up to 5 Hospitals to compare

                                 <span class="badge badge-rounded badge-white selected float-right"

                                     style="border: 2px solid green;">0/5 selected</span>

                             </h3>

                         </div>

                         <div class="col-12 col-lg-4">

                             <input type="hidden" name="hospitals" class="hosInput" value="" id="main">

                             <input type="hidden" name="temp" class="hosInputTemp" value="" id="temp">

                             <button type="submit" disabled class="btn btn-secondary compare-btn btn-lg btn-block ">

                                 <p class="text-weight-bolder p-0 m-0"> Compare</p>

                             </button></a>

                 </form>

             </div>

         </div>

         <ul class="hosData mt-3 pb-5"data-aos="fade-left">




            <?php if(isset($topHos)):?>


             <?php foreach ($topHos as $x) : ?>


             <li class="booking-card"

<?php //echo base_url('userUploads' . $x['logo']) ?>
                 style="background-image: url(<?php echo base_url('userUploads/' . $x['logo']) ?>);background-repeat: no-repeat;background-position: 0px 0px;background-size: 210px 210px;">
<!-- echo $x['logo'] -->
                 <label class="label">

                     <input class="label__checkbox" name="hosCard" value="<?php echo $x['hos_id'] ?>" type="checkbox" />

                     <span class="label__text">

                         <span class="label__check">

                             <i class="fa fa-check icon"></i>

                         </span>

                     </span>

                 </label>

                 <div class="book-container">

                     <!-- <div class="content">

                                     <a href="<?php echo site_url('hospital_Controller/recHospital/') ?>" class="btn">View Details</a>

                            </div> -->

                 </div>

                 <div class="informations-container">

                     <h2 class="title"><a

                             href="<?php echo site_url('hospital_Controller/recHospital/' . $x['hos_id']) ?>"><?php echo $x['hos_name'] ?></a>



                     </h2>

                     <div class="d-flex pt-2 justify-content-between">

                         <div class="my-auto">

                             <p class="text-center"><strong style="font-size: 13px;"><?php echo $x['review_count'] ?>

                                     Reviews</strong></p>

                         </div>

                         <div class="">

                             <span class="text-center">

                                 <div id="rateYo<?php echo $x['hos_id'] ?>"></div>

                             </span>

                             <p class="text-center mb-1"><?php echo round($x['star_rating'], 1) ?> out of 5</p>

                         </div>

                     </div>

                     <div class="more-information row">

                         <p class="sub-title mb-1 col-12">Address: <?php echo $x['city'] ?></p>

                         <p class="price col-12 mt-0" style="font-size: 15px;">Contact: <?php echo $x['phone'] ?></p>

                         <div class=" mt-0 mx-auto">

                             <!-- <form action="<?php echo site_url('appointment_Controller/hosAppointment') ?>" method="post">

                                             <a href="<?php echo site_url('mainController/viewHospital/') ?>" class="btn btn-sm mb-1 btn-primary btn-block" style="">View Profile</a>

                                             <button type="submit" name="submit" class="btn btn-sm btn-danger btn-block">Book Appointment</button>

                                         </form> -->

                         </div>

                     </div>

                 </div>

             </li>

             <?php endforeach; ?>


             <?php else:echo"No hospital added/something going Wrong"?>
             <?php endif; ?>

         </ul>

     </div>



     <!-- right Bar -->

     <div id="sidebar" class="col-sm-2">

         <div id="recommend" class=" mb-3">

             <a href="<?php echo site_url('userProfile_Controller/postReview') ?>"

                 class="btn text-white btn-md font-weight-bold btn-danger">Post a Review</a>

         </div>

         <div id="" class=" mb-3">

             <a href="#">

                 <h5 class="sidebar-header">Sort By</h5>

             </a>

             <p><input type="radio" class="filterCheck" name="sort" id="" checked value="">&nbsp;<label

                     for="">All</label><br>

                 <input type="radio" class="filterCheck" name="sort" id="highRate" value="highRate">&nbsp;<label

                     for="highRate">Higest Rating</label><br>

                 <input type="radio" class="filterCheck" name="sort" id="lowRate" value="highRate">&nbsp;<label

                     for="lowRate">Lowest Rating</label><br>

             </p>

         </div>

         <div id="" class=" mb-3">

             <a href="#">

                 <h5 class="sidebar-header">Filters</h5>

             </a>

             <div class="mb-2">

                 <input type="checkbox" class="filterCheck" id="emc" value="emc">&nbsp;<label for="emc">Emergency

                     Service</label><br>

             </div>

             <div>

                 <p class="ml-2" style="color: #C55A11;">By Rating</p>





                 <input type="checkbox" class="filterCheck" id="star_rate" value="5">&nbsp;<label for="5"><i

                         class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i

                         class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i

                         class="fas fa-star text-warning"></i></label><br>

                 <input type="checkbox" class="filterCheck" id="star_rate" value="4">&nbsp;<label for="4"><i

                         class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i

                         class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></label><br>

                 <input type="checkbox" class="filterCheck" id="star_rate" value="3">&nbsp;<label for="3"><i

                         class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i

                         class="fas fa-star text-warning"></i></label><br>

                 <input type="checkbox" class="filterCheck" id="star_rate" value="2">&nbsp;<label for="2"><i

                         class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></label><br>

                 <input type="checkbox" class="filterCheck" id="star_rate" value="1">&nbsp;<label for="1"><i

                         class="fas fa-star text-warning"></i></label><br>





             </div>

             <div>

                 <p class="ml-2" style="color: #C55A11;">By Department</p>

                 <?php $c = 0;
if(isset($filters))
{
             foreach ($filters['depts'] as $x) :

                        $c++;

                    ?>

                 <input type="checkbox" class="filterCheck" id="dept_id" value="<?php echo $x['dept_id']

                                                                                    ?>">&nbsp;<label

                     for="<?php echo $x['dept_id']

                                                                                                            ?>"><?php echo $x['dept_name']

                                                                                                                ?></label><br>

                 <?php if ($c == 4) {

                            break;

                        }

                    endforeach ;

                    ?>

                 <a href="" data-toggle="modal" data-target="#moreFilter" class="ml-2" style="color: #C55A11;">+more</a>



             </div>

             <div>

                 <p class="ml-2" style="color: #C55A11;">By Treatment</p>

                 <?php $c = 0;

                    foreach ($filters['treat'] as $x) :

                        $c++;

                    ?>

                 <input type="checkbox" class="filterCheck" id="treat_id" value="<?php echo $x['treat_id']

                                                                                        ?>">&nbsp;<label

                     for="<?php echo $x['treat_id']

                                                                                                                ?>"><?php echo $x['treat_name']

                                                                                                                    ?></label><br>

                 <?php if ($c == 4) {

                            break;

                        }

                    endforeach; }

                    ?>

                 <a href="" data-toggle="modal" data-target="#moreFilter" class="ml-2" style="color: #C55A11;">+more</a>



             </div>



         </div>

     </div>

     </div>

     </div>

     <div class="modal fade" id="moreFilter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"

         aria-hidden="true">

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

                                     <?php foreach ($filters['hos'] as $x) : ?>

                                     <option value="<?php echo $x['hos_name'] ?>">

                                         <?php endforeach; ?>

                                 </datalist>

                             </div>

                             <div class="form-group col-4">

                                 <h6>Department</h6>

                                 <input list="department" class="form-control" name="department">

                                 <datalist id="department">

                                     <?php foreach ($filters['depts'] as $x) : ?>

                                     <option value="<?php echo $x['dept_name'] ?>">

                                         <?php endforeach; ?>

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

     <script src="https://code.jquery.com/jquery-3.5.1.js"

         integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

     <script>

     $(document).ready(function() {

         if ($("#location").val() != '') {

             var action = 'data';

             var selectedHos = $('.hosInput').val();

             var location = $("#location").val();

             console.log(location);





             $.ajax({

                 url: '<?php echo site_url('userProfile_Controller/fetchCompHos') ?>',

                 method: 'POST',

                 data: {

                     action: action,

                     selectedHos: selectedHos,

                     location: location,

                 },

                 success: function(response) {

                     //  console.log(response);

                     $(".hosData").html(response);

                 }



             });

         }

         $(".filterCheck").click(function() {



             var action = 'data';

             var selectedHos = $('.hosInput').val();

             var treat_id = get_filter_text('treat_id');

             var dept_id = get_filter_text('dept_id');

             var emc = get_filter_text('emc');

             var highRate = get_filter_text('highRate');

             var lowRate = get_filter_text('lowRate');

             var star_rate = get_filter_text('star_rate');







             $.ajax({

                 url: '<?php echo site_url('userProfile_Controller/fetchCompHos') ?>',

                 method: 'POST',

                 data: {

                     action: action,

                     dept_id: dept_id,

                     treat_id: treat_id,

                     selectedHos: selectedHos,

                     star_rate: star_rate,

                     emc: emc,

                     lowRate: lowRate,

                     highRate: highRate

                 },

                 success: function(response) {

                     //  console.log(response);

                     $(".hosData").html(response);

                 }



             });

         });

         $("#search").keyup(function() {



             var action = 'data';

             var selectedHos = $('.hosInput').val();

             var search = $("#search").val();

            //  console.log(search);





             $.ajax({

                 url: '<?php echo site_url('userProfile_Controller/fetchCompHos') ?>',

                 method: 'POST',

                 data: {

                     action: action,

                     selectedHos: selectedHos,

                     search: search,

                 },

                 success: function(response) {

                      console.log(response);

                     $(".hosData").html(response);

                 }



             });

         });



         $("#treat").on('change', function() {

             //  console.log($("#treat").val());

             var treat = $("#treat").val();

             $.ajax({

                 url: '<?php echo site_url('userProfile_Controller/fetchCompHos') ?>',

                 method: 'POST',

                 data: {

                     'action': 'action',

                     'selectedHos': selectedHos,

                     'treat_id': treat,

                 },

                 success: function(response) {

                     console.log(response);

                     $(".hosData").html(response);

                 }



             });

         });



         $("#location").keyup(function location() {



             var action = 'data';

             var selectedHos = $('.hosInput').val();

             var location = $("#location").val();

             console.log(location);





             $.ajax({

                 url: '<?php echo site_url('userProfile_Controller/fetchCompHos') ?>',

                 method: 'POST',

                 data: {

                     action: action,

                     selectedHos: selectedHos,

                     location: location,

                 },

                 success: function(response) {

                     //  console.log(response);

                     $(".hosData").html(response);

                 }



             });

         });









         function get_filter_text(text_id) {



             var filterData = [];

             $('#' + text_id + ':checked').each(function() {

                 filterData.push($(this).val());

             });



             return filterData;

         }

     });

     </script>

     <script>

     var selHos = [];

     $('.label__checkbox').on('change', function() {



         if ($('.label__checkbox:checked').length > 5) {

             this.checked = false;

         }

         if ($('.label__checkbox').is(':checked')) {

             selHos.push($(this).val());



         } else if ($('.label__checkbox').not(':checked')) {

             var index = selHos.indexOf($(this).val());

             console.log(index);

             selHos.splice(index, 1);

         }



         $('.hosInput').val(selHos.toString());

         $('.selected').html($('.label__checkbox:checked').length + '/5 selected');



         if ($('.label__checkbox:checked').length == 5) {

             $('.selected').addClass('text-success');

         } else {

             $('.selected').removeClass('text-success');

         }



         if ($('.label__checkbox:checked').length < 2) {

             $('.compare-btn').attr('disabled', true);

             $('.compare-btn').removeClass('btn-success');

             $('.compare-btn').addClass('btn-secondary');

         } else {

             $('.compare-btn').attr('disabled', false);

             $('.compare-btn').removeClass('btn-secondary');

             $('.compare-btn').addClass('btn-success');

         }

         //  console.log(selHos);

     });

     </script>

     <script>

     $(function() {

         <?php foreach ($topHos as $x) : ?>



         $("#rateYo<?php echo $x['hos_id'] ?>").rateYo({

             rating: <?php echo $x['star_rating'] ?>,

             readOnly: true,

             starWidth: "15px",

             spacing: "2px"

         });



         <?php endforeach; ?>

     });

     </script>

     <script>

     $(document).on({

         ajaxStart: function() {

             var selected = $('.hosInput').val();

             $('.hosInputTemp').val(selected);

             /* selected = selected.split(',');

             console.log(selected);

             $.each(selected, function(index, value) {

                 $("input[type=checkbox][value="+value+"]").prop("checked", true);

             }); */

         },



         ajaxStop: function() {

             var selected = $('.hosInputTemp').val();



             selected = selected.split(',');

             //  console.log(selected);

             $.each(selected, function(index, value) {

                 $("input[type=checkbox][value=" + value + "]").prop("checked", true);

                 $('.hosInput').val(selected.toString());

             });

         }

     });

     </script>

     <!-- <script>

        $(".chb").change(function() {

        $(".chb").prop('checked', false);

        $(this).prop('checked', true);

    });

    $(".chb").change(function() {

    $(".chb").not(this).prop('checked', false);

});

    </script> -->

     <!-- Latest compiled and minified CSS -->

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

     <script>

     $(function() {



         $("#rateYo").rateYo({

             rating: 3.8,

             readOnly: true,

             starWidth: "15px",

             spacing: "2px"

         });

         $("#rateYo1").rateYo({

             rating: 3.8,

             readOnly: true,

             starWidth: "15px",

             spacing: "2px"

         });

         $("#rateYo2").rateYo({

             rating: 3.8,

             readOnly: true,

             starWidth: "15px",

             spacing: "2px"

         });

         $("#rateYo3").rateYo({

             rating: 3.8,

             readOnly: true,

             starWidth: "15px",

             spacing: "2px"

         });

         $("#rateYo4").rateYo({

             rating: 3.8,

             readOnly: true,

             starWidth: "15px",

             spacing: "2px"

         });



     });

     </script>

     <!-- Latest compiled and minified JavaScript -->

     <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"

         integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">

     </script>

     <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

 -->

     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"

         integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">

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