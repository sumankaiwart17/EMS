 <!DOCTYPE html>

 <html lang="en">



 <head>

     <meta charset="UTF-8">

     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"

         integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <link rel="stylesheet" href="<?php echo base_url('css/cssUser/style.css')

                                    ?>">


<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>



     <title>AAHRS | Recommend Me</title>

     <style>

     .hosData {

         display: flex;

         flex-wrap: wrap;

         list-style: none;

         lis-padding: 0px;

         padding-left: 25px;

         margin: 0 0 3px 0;

         width: 100%;

         /* z-index: 0; */

         /* padding-right: 10px; */

     }

     .btn-danger {
    margin: 30px 0px 0px 0px !important;
}



     ul .booking-card {

         position: relative;

         width: 220px;

         display: flex;

         height: 332px;

         flex: 0 0 220px;

         flex-direction: column;

         margin-top: 5px;

         margin-right: 10px;

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



     ul .booking-card:hover {

         transform: scale(1.02);



     }



     /* ul .booking-card:hover .ribbon-1{

             transform: scaleY(-30);

         } */

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

         padding: 8px 12px;

         background: none;

         text-transform: uppercase;

         font-weight: bold;

         font-size: 1em;

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

         padding-bottom: 10px;

         background: #f0f0f0;

         transform: translateY(106px);

         transition: 0.3s;

     }



     ul .booking-card .informations-container .title {

         position: relative;

         padding-bottom: 10px;

         margin-bottom: 10px;

         font-weight: bold;

         font-size: 1em;

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

         margin-top: 10px;

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

         transform: translateY(-12px);

     }



     ul .booking-card:hover .informations-container {

         transform: translateY(-27px);

     }



     ul .booking-card:hover .informations-container .more-information {

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



     /* advertisement banner  */

     .bc-banner {

         margin-top: 10px !important;

         position: relative;

         border: 1px solid #ccc;

         overflow: hidden;

         background-color: #074F93;

         width: 99%;

         height: 200px;

         margin: 0 0 3px 0;

     }



     .bc-banner a {

         text-decoration: none;

         color: #fff;

     }



     .bc-banner a:hover {

         opacity: 0.8;

         color: white;

     }



     .bc-banner-header {

         background-color: #fff;

         position: relative;

         z-index: 2;

         padding: 1rem;

     }



     .bc-banner-body {

         position: relative;

         z-index: 2;

         padding: 2rem;

     }



     .bc-banner .bc-banner-cover {

         position: absolute;

         opacity: 0.3;

         filter: alpha(opacity=30);

         /* For IE8 and earlier */

         object-fit: cover;

         top: 0;

         z-index: 1;

         height: 100%;

         width: 100%;

     }

     </style>

 </head>

 <?php

    $alert = '';

    $book_status = '';

    if (isset($_SESSION['book_status']))

        $book_status = $_SESSION['book_status'];



    if ($book_status == 0) {

        $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">

                        Booking Unuccessful!!

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                          <span aria-hidden="true">&times;</span>

                        </button>

                    </div>';

    }

    ?>



 <body class="bg-white">

     <?php include('navbar.php'); ?>

     <div class="container mt-2">

         <div class="row">

             <!-- left Bar -->

             <?php include('left-sidebar.php'); ?>

             <!-- Reviews -->

             <div class="col-sm-12 col-lg-10">

                 <div class="row">

                     <?php if ($book_status != '') {

                            echo $alert;

                            unset($_SESSION['book_status']);

                        } ?>

                     <div class="col-12">

                         <div class="row m-1 p-1" data-aos="fade-right" style="width: 100%; border-radius:5px;">

                             <div class="form-group col-12 col-sm-6 col-md-6 col-lg-2 ">

                                 <label for="treatname">Treatment</label> 

                                 <select name="treatname" class="form-control" id="treatname">

                                     <option value="">Select by treatment</option>

                                     <?php foreach ($treats as $x) : ?>

                                     <option

                                         <?php if(isset($preSearch) && $preSearch['treat_id'] == $x['treat_id']){ echo "selected";} ?>

                                         value="<?php echo $x['treat_id'] ?>">

                                         <?php echo $x['treat_name'] ?>

                                     </option>

                                     <?php endforeach; ?>

                                 </select>

                             </div>

                             <div class="form-group  col-12 col-sm-6 col-md-6 col-lg-2">

                                 <label for="budget">Symtoms</label>

                                 <select name="budget" class="form-control" id="symtoms">

                                     <option value="">select a symtoms</option>

                                     <option value="litill">Little illenss</option>

                                     <option value="lomot">Loose motion</option>

                                     <option value="heache">Headache</option>

                                     <option value="heache">Vomating</option>

                                 </select>

                             </div>

                             <div class="form-group col-12 col-sm-6 col-md-6 col-lg-2 ">

                                 <label for="disname">Disease</label>

                                 <select name="disname" class="form-control" id="disname">

                                     <option value="">Select by disease</option>

                                     <?php foreach ($diseases as $x) : ?>

                                     <option value="<?php echo $x['dis_id'] ?>"><?php echo $x['dis_name'] ?></option>

                                     <?php endforeach; ?>

                                 </select>

                             </div>

                             <div class="form-group col-12 col-sm-6 col-md-6 col-lg-2 ">

                                 <label for="budget">Budget</label>

                                 <select name="budget" class="form-control" id="budget">

                                     <option value="">select a budget</option>
                                  
                                   
                                     <option value="10000"

                                         <?php if(isset($preSearch) && $preSearch['budget']>=1 && $preSearch['budget']<=10000){ echo "selected";} ?>>


                                     
                                         Less than 10,000 INR</option>

                                     <option value="25000"

                                         <?php if(isset($preSearch) && $preSearch['budget'] >= 10000 && $preSearch['budget'] <= 25000 ){ echo "selected";} ?>>

                                         10,001 - 25,000 INR</option>

                                     <option value="50000" 

                                         <?php if(isset($preSearch) && $preSearch['budget'] = 25000 &&  $preSearch['budget'] <= 50000 ){ echo "selected";} ?>>

                                         25,001 - 50,000 INR</option>

                                 </select>

                             </div>

                             <div class="form-group col-12 col-sm-12 col-md-12 col-lg-3">

                                 <button class="btn btn-block submit btn-danger">Recommend Me</button>
                             
                             </div>

                         </div>

                     </div>

                     <div class="col-12 bg-white">

                         <div class="row justify-content-center">



                             <!-- <div class="col-4 pb-1">

                                <div class="card card-body p-0" style="height: 400px;border-radius: 20px;">

                                    <span class="fas fa-ribbon rank-card fa-lg"></span>

                                    <img src="<?php echo base_url('images/apollo_hospital.jpg'); ?>" style="border-top-left-radius: 20px;border-top-right-radius: 20px;" class="img-responsive card-img-top" alt="">

                                    <div class="badge badge-sm badge-light rateShw"><span class="" style="font-size:20px;">4.8 <i class="fas fa-star text-warning"></i></span></div>

                                    <div class="recShw p-1">

                                    <h4 class="mt-1 font-weight-bold">APOLLO </h4>

                                    <div class="address">

                                    <small style="font-size: 15px;" class="">Kolkata, WB</small>

                                    </div>

                                    

                                    <div class="descShw">

                                        <p>Apollo Hospitals Enterprise Limited is an Indian hospital chain based in Chennai, India.</p>

                                    </div>

                                    </div>

                                </div>

                            </div> -->

                             <!-- <h1>Advertisement</h1> -->









                             <!-- Advertisement ends here  -->





                             <ul class="hosData">



                                 <li class="card card-body" data-aos="fade-left"

                                     style="max-width: 99%; height:65px; border-radius:0px;border-left: 4px ridge red; box-shadow: 0px 0px 0px">

                                     <blockquote>

                                         <p><strong class="text-danger">Note:</strong> Select from the dropdowns as per

                                             your requirement.</p>

                                     </blockquote>

                                 </li>

                                 <?php $data = $this->hospitalView_Model->fetchAd();

                                    if ($data) : ?>

                                 <li class="bc-banner text-center"data-aos="fade-up">

                                     <a href="#">

                                         <!-- <div class="bc-banner-header">

                                                    <img src="<?php echo base_url('images/AAHRS_logo5.png') ?>" alt="HubSpot Marketing Free" width="100">

                                                </div> -->

                                         <div class="bc-banner-body">

                                             <h2><?php echo $data[0]['ad_title'] ?></h2>

                                             <!-- <p><?php echo $data[0]['ad_desc'] ?></p> -->

                                             <a href="<?php echo site_url('userProfile_Controller/adDetails?id=') . $data[0]['ad_id'] ?>"

                                                 class="btn btn-primary">View Details</a>

                                         </div>

                                         <img src="<?php echo base_url('images/dd.jpg') ?>" alt="aahrs"

                                             class="bc-banner-cover img-responsive">

                                     </a>

                                 </li>

                                 <?php endif; ?>

                             </ul>

                         </div>

                     </div>

                 </div>

             </div>

             <!-- right Bar -->

             <!-- <div id="sidebar" class="col-sm-2">

                

                

            </div> -->

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

         // if($("#treatname").val() != '')



         $(".submit").click(function() {



             var action = 'search';

             var treat_id = $("#treatname").val();

             var budget = $("#budget").val();

              console.log(budget);

            

             $.ajax({

                 url: '<?php echo site_url('userProfile_Controller/recommendMe') ?>',

                 method: 'POST',

                 data: {

                     action: action,

                     treat_id: treat_id,

                     budget: budget,

                 },

                 success: function(response) {

                     console.log(response);

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

     function submit() {

         var action = 'search';

         var treat_id = $("#treatname").val();

         var budget = $("#budget").val();

         //  console.log(treat_id);

         //  die;

         $.ajax({

             url: '<?php echo site_url('userProfile_Controller/recommendMe') ?>',

             method: 'POST',

             data: {

                 action: action,

                 treat_id: treat_id,

                 budget: budget,

             },

             success: function(response) {

                 console.log(response);

                 $(".hosData").html(response);

             }



         });

     }

     <?php if(isset($preSearch)){

                echo 'submit()';

                unset($preSearch);

            } ?>

     </script>

     <!-- Latest compiled and minified CSS -->

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

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