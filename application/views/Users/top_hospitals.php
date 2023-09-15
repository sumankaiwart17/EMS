<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssUser/style.css') ?>">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <title>AAHRS | Top Hospitals</title>

    <style>
        .hosData {

            display: flex;

            flex-wrap: wrap;

            list-style: none;

            padding: 0;

            padding-left: 25px;

            /* z-index: 0; */

            /* padding-right: 10px; */

        }



        ul .booking-card {

            position: relative;

            width: 220px;

            display: flex;

            height: 332px;

            flex: 0 0 220px;

            flex-direction: column;

            margin-top: 20px;

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



        <?php for ($i = 1; $i <= 10; $i++) {

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



        /* ul .booking-card:hover .expandable {

 background: #ee583a;

 overflow: hidden;

 color: white;   

 line-height: 20px;



 transition: all .5s ease-in-out;

 height: 100px;

}ul .booking-card:hover .expandable:after{

   transition: all .5s ease-in-out;

   overflow:hidden;

} */



        /* .expandable:target {

 height: 100px;

} */

        @media only screen and (max-width: 991.98px) {
            .hosData {
                display: inherit;
                padding-left: 40px;
            }

            ul .booking-card {
                width: 270px;
            }
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

    <div class="container mt-2">

        <div class="row mb-5">

            <!-- left Bar -->

            <?php include('left-sidebar.php'); ?>

            <?php

            // echo '<pre>';

            // print_r($topHos);

            // die;

            ?>

            <!-- top hospitals -->

            <div class="col-12 col-sm-12 col-md-8 col-lg-8">

                <div class="card card-body pb-0" data-aos="fade-left" style="width: 100%; border-radius:0px;border-left: 4px ridge red;">

                    <blockquote>

                        <p><strong class="text-danger">Note:</strong> Top Hospitals according to user reviews and

                            ratings.</p>

                    </blockquote>

                </div>



                <!-- <h4>Top Hospitals</h4> -->

                <ul class="hosData">
                    <?php if (isset($topHos)) : ?>
                        <?php $rank = 1;

                        $sup = '';

                        foreach ($topHos as $x) :

                            if ($rank == 1) {

                                $sup = 'st';
                            } else if ($rank == 2) {

                                $sup = 'nd';
                            } else if ($rank == 3) {

                                $sup = 'rd';
                            } else if ($rank <= 10) {

                                $sup = 'th';
                            }

                        ?>
 


                            <li class="booking-card" data-aos="fade-right" style="background-image: url(<?php echo base_url('userUploads/' . $x['logo']) ?>);background-repeat: no-repeat;background-position: 0px 0px;background-size: 220px 220px;">

                                <?php if ($rank <= 10) : ?><div style="font-style: italic; font-family: Trebuchet MS; font-size:large;" class="ribbon-<?php echo $rank ?> expandable">

                                        <?php echo $rank . '<sup>' . $sup . '</sup>'; ?></div><?php endif; ?>



                                <div class="book-container">

                                    <div class="content">

                                        <a href="<?php echo site_url('hospital_Controller/recHospital/' . $x['hos_id']) ?>" class="btn">View Details</a>

                                    </div>

                                </div>

                                <div class="informations-container">

                                    <h2 class="title"><a href="<?php echo site_url('hospital_Controller/recHospital/' . $x['hos_id']) ?>"><?php echo $x['hos_name'] ?></a>

                                    </h2>

                                    <div class="d-flex pt-2 justify-content-between">

                                        <div class="my-auto">

                                            <p class="text-center">

                                                <?php echo '<strong style="font-size: 15px;">' . $x['review_count'] . ' Reviews</strong>' ?>

                                            </p>

                                        </div>

                                        <div class="">

                                            <span class="text-center">

                                                <div id="rateYo<?php echo $x['hos_id'] ?>"></div>

                                            </span>

                                            <p class="text-center mb-1"><?php echo round($x['star_rating'], 1) . ' out of 5' ?>

                                            </p>

                                        </div>

                                    </div>

                                    <div class="more-information row">

                                        <p class="sub-title mb-1 col-12">Address: <?php echo $x['city']; ?></p>

                                        <p class="price col-12 mt-0">Contact: <?php echo $x['phone'] ?></p>

                                        <div class=" mt-0 mx-auto">

                                            <form action="<?php echo site_url('appointment_Controller/hosAppointment') ?>" method="post">

                                                <a href="<?php echo site_url('mainController/viewHospital/'.$x['hos_id']) ?>" class="btn btn-sm mb-1 btn-primary btn-block" style="">View Profile</a>

                                                <button type="submit" name="submit" class="btn btn-sm btn-danger btn-block">Book Appointment</button>

                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </li>

                        <?php $rank++;

                        endforeach; ?>

                </ul> <?php endif; ?>

            </div>

            <!-- Reviews -->



            <!-- right Bar -->

            <div id="sidebar" class="col-sm-2">

                <div id="recommend" class=" mb-3">

                    <a href="<?php echo site_url('userProfile_Controller/postReview')

                                ?>" class="btn text-white btn-lg font-weight-bold btn-danger">Post a Review</a>

                </div>



                <div id="" class="pl-1 mb-3">

                    <a href="#">

                        <h5 class="sidebar-header">Filters</h5>

                    </a>

                    <div>

                        <p class="ml-2" style="color: #C55A11;">By Hospital</p>

                        <?php if (isset($filters['hos'])) : ?>
                            <?php $c = 0;

                            foreach ($filters['hos'] as $x) :

                                $c++;

                            ?>



                                <input type="checkbox" class="filterCheck" id="hos_name" value="<?php echo $x['hos_name']

                                                                                                ?>">&nbsp;<label for="<?php echo $x['hos_name']

                                                                                            ?>"><small><?php echo $x['hos_name']

                                                                                            ?></small></label><br>

                            <?php if ($c == 4) {

                                    break;
                                }

                            endforeach;

                            ?>
                        <?php else : ?>
                            <?php echo 'Empty' ?>
                        <?php endif; ?>
                        <a href="" data-toggle="modal" data-target="#moreFilter" class="ml-2" style="color: #C55A11;">+more</a>


<br><br>
                    </div>

                    <div>

                        <p class="ml-2" style="color: #C55A11;">By Department</p>


                        <?php if (isset($filters)) : ?>
                            <?php $c = 0;

                            foreach ($filters['depts'] as $x) :

                                $c++;

                            ?>

                                <input type="checkbox" class="filterCheck" id="dept_id" value="<?php echo $x['dept_id']

                                                                                                ?>">&nbsp;<label for="<?php echo $x['dept_id']

                                                                                                                    ?>"><small><?php echo $x['dept_name']

                                                                                                                    ?></small></label><br>

                            <?php //if ($c == 4) {

                            //break;

                            //}

                            endforeach;

                            ?>

                        <?php else : ?>

                            <?php echo "Empty " ?> <br>
                        <?php endif; ?>
                        <a href="" data-toggle="modal" data-target="#moreFilter" class="ml-2" style="color: #C55A11;">+more</a>

<br><br>

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

        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function() {

                $(".filterCheck").click(function() {



                    var action = 'data';

                    var dept_id = get_filter_text('dept_id');

                    var hos_name = get_filter_text('hos_name');

                    // console.log(dept_id+''+hos_name);



                    $.ajax({

                        url: '<?php echo site_url('userProfile_Controller/fetchTopHos') ?>',

                        method: 'POST',

                        data: {

                            action: action,

                            dept_id: dept_id,

                            hos_name:hos_name

                        },

                        success: function(response) {

                            // console.log(response);

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


        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                offset: 130,
                duration: 1000,
            });
        </script>

</body>



</html>