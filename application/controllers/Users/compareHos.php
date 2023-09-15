<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="<?php echo base_url('css/assets/css/style.css') ?>"> -->
    <link rel="stylesheet" href="<?php echo base_url('css/assets/css/reset.css') ?>"> <!-- CSS reset -->
    <link rel="stylesheet" href="<?php echo base_url('css/style.css') ?>"> <!-- Resource style -->
    <script src="<?php echo base_url('css/assets/js/modernizr.js')
                    ?>"></script> <!-- Modernizr -->
    <title>AAHRS | Compare</title>
    <style>
        .card-body {
            padding: 0px !important;
        }

        body {
            padding-bottom: 10%;
        }

        body::-webkit-scrollbar {
            display: none;
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
            <div class="col-sm-10 bg-body">
                <div class="row header">
                    <div class="col-2 text-center border pt-2">
                        <h2 class=" mt-5 pt-4">Hospitals</h2>
                    </div>
                    <?php foreach ($overview as $x) : ?>
                        <div class="col text-center border pt-2">
                            <img src="<?php echo $x['logo'] == "" ? base_url('images/hos.png') : base_url('userUploads/' . $x['logo']) ?>" class="img-thumbnail rounded-square" style="height:150px; width:150px;" alt="">
                            <h4><?php echo $x['hos_name'] ?></h4>
                        </div>
                    <?php endforeach; ?>

                </div>
                <div id="accordion">
                    <div class="card" style="width: 102%; margin-left:-1%;">
                        <div class="card-header" id="headingOne">

                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h4 class="mb-0"> Overview </h4>
                            </button>

                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-2 text-center p-3 pt border-bottom">
                                        <h5>Distance</h5>
                                    </div>
                                    <?php foreach ($distance as $x) : ?>
                                        <div class="col text-center p-3 border-left border-bottom">
                                            <h6 style="font-size: 20px;"><?php echo $x ?></h6>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                                <div class="row">
                                    <div class="col-2 text-center p-3 border-bottom">
                                        <h5>Overall Rating</h5>
                                    </div>
                                    <?php foreach ($overview as $x) : ?>
                                        <div class="col text-center p-3 border-left border-bottom">
                                            <div class="mx-auto" id="rateYo<?php echo $x['hos_id'] ?>"></div>
                                            <p style="font-size: 20px;" class="text-center mb-1"><?php echo round($x['star_rating'], 1) ?> out of 5</p>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                                <div class="row">
                                    <div class="col-2 text-center p-3  border-bottom">
                                        <h5>Emergency Service</h5>
                                    </div>
                                    <?php foreach ($emc as $x) : ?>
                                        <div class="col text-center p-3 border-left border-bottom">
                                            <h6>
                                                <?php if ($x['emc']) {
                                                    echo '<i class="fas fa-check fa-lg text-success"></i>';
                                                } else {
                                                    echo '<i class="fas fa-times fa-lg text-danger"></i>';
                                                }
                                                ?>
                                            </h6>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="row">
                                    <div class="col-2 text-center p-3 border-bottom">
                                        <h5>Total Departments</h5>
                                    </div>

                                    <?php foreach ($overview as $x) : ?>
                                        <div class="col text-center p-3 border-left border-bottom">
                                            <?php if (array_key_exists('total_dept', $x)) : ?>
                                                <h6 style="font-size: 20px;"><?php echo $x['total_dept'] == 0 ? 0 : $x['total_dept']; ?></h6>
                                            <?php else : ?>
                                                <h6 style="font-size: 20px;">0</h6>
                                            <?php endif; ?>
                                        </div>

                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="width: 102%; margin-left:-1%;">
                        <div class="card-header" id="headingTwo">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h4 class="mb-0">Overall Ratings</h4>
                            </button>

                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-2 text-center p-3 border-bottom">
                                        <h5 class="pt-3">Average Rating</h5>
                                    </div>
                                    <?php foreach ($overallRating as $x) : ?>
                                        <div class="col text-center p-3 border-left border-bottom">
                                            <div class="mx-auto" id="rate-Yo<?php echo $x['hos_id'] ?>"></div>
                                            <p style="font-size: 20px;" class="text-center mb-1"><?php echo round($x['star_rating'], 1) ?> out of 5</p>

                                            <span style="width: 20px;"><img src="<?php echo base_url('images/star.png') ?>" alt="" style="width:20px"></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card" style="width: 102%; margin-left:-1%;">
                        <div class="card-header" id="headingFour">

                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <h4 class="mb-0">Departments</h4>
                            </button>

                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body ">
                                <?php foreach ($departments as $y) : ?>
                                    <div class="row">
                                        <div class="col-2 text-center p-3 border-bottom">

                                            <h5><?php echo $y['dept_name'] ?></h5>
                                        </div>

                                        <?php foreach ($overview as $x) : ?>

                                            <div class="col text-center p-3 border-left border-bottom">

                                                <?php $search = array('hos_id' => $x['hos_id'], 'dept_name' => $y['dept_name']);
                                                $data = $this->db->where($search)->get('hospital_departments'); ?>
                                                <h6>
                                                    <?php if ($data->num_rows()) : ?>
                                                       <?php echo '<i class="fas fa-check fa-lg text-success"></i>';?>
                                      

                                                    <?php else : ?>
                                                      
                                                   <?php echo '<i class="fas fa-times fa-lg text-danger"></i>';?>
                                                    <?php endif; ?>

                                                </h6>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                <?php endforeach; ?>


                            </div>
                        </div>
                    </div>

                    <div class="card" style="width: 102%; margin-left:-1%;">
                        <div class="card-header" id="headingFive">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <h4 class="mb-0">Treatments</h4>
                            </button>

                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-2 text-center p-3 border-bottom">
                                        <h5 class="pt-2">Treatments</h5>
                                    </div>
                                    <?php foreach ($treatments as $x) { ?>
                                        <div class="col text-center p-3 border-left border-bottom">
                                            <h6>
                                                <h6><?php echo $x['treat_id'] ?></h6>
                                            </h6>
                                        </div>
                                    <?php } ?>
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="card" style="width: 102%; margin-left:-1%;">
                        <div class="card-header" id="headingSix">

                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                <h4 class="mb-0">Emergency Services</h4>
                            </button>

                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                            <div class="card-body ">
                                <!-- <div class="row">
                                     <div class="col-2 text-center p-3 border-bottom">
                                         <h5>Emergency Services </h5>
                                     </div>
                                     <?php foreach ($emc as $x) : ?>
                                         <div class="col text-center p-3 border-left border-bottom">
                                             <h6>
                                                 <?php if ($x['emc']) {
                                                        echo '<i class="fas fa-check fa-lg text-success"></i>';
                                                    } else {
                                                        echo '<i class="fas fa-times fa-lg text-danger"></i>';
                                                    }
                                                    ?>
                                             </h6>
                                         </div>
                                     <?php endforeach; ?>
                                 </div> -->
                                <div class="row">
                                    <div class="col-2 text-center p-3 border-bottom">
                                        <h5>Cardiac Arrest </h5>
                                    </div>
                                    <?php foreach ($emc as $x) : ?>
                                        <div class="col text-center p-3 border-left border-bottom">
                                            <h6>
                                                <?php if ($x['emc']) {
                                                    echo '<i class="fas fa-check fa-lg text-success"></i>';
                                                } else {
                                                    echo '<i class="fas fa-times fa-lg text-danger"></i>';
                                                }
                                                ?>
                                            </h6>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="row">
                                    <div class="col-2 text-center p-3 border-bottom">
                                        <h5>Burn Unit </h5>
                                    </div>
                                    <?php foreach ($emc as $x) : ?>
                                        <div class="col text-center p-3 border-left border-bottom">
                                            <h6>
                                                <?php if ($x['emc']) {
                                                    echo '<i class="fas fa-check fa-lg text-success"></i>';
                                                } else {
                                                    echo '<i class="fas fa-times fa-lg text-danger"></i>';
                                                }
                                                ?>
                                            </h6>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="row">
                                    <div class="col-2 text-center p-3 border-bottom">
                                        <h5>Physical trauma </h5>
                                    </div>
                                    <?php foreach ($emc as $x) : ?>
                                        <div class="col text-center p-3 border-left border-bottom">
                                            <h6>
                                                <?php if ($x['emc']) {
                                                    echo '<i class="fas fa-check fa-lg text-success"></i>';
                                                } else {
                                                    echo '<i class="fas fa-times fa-lg text-danger"></i>';
                                                }
                                                ?>
                                            </h6>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="row">
                                    <div class="col-2 text-center p-3 border-bottom">
                                        <h5>Asthma and COPD </h5>
                                    </div>
                                    <?php foreach ($emc as $x) : ?>
                                        <div class="col text-center p-3 border-left border-bottom">
                                            <h6>
                                                <?php if ($x['emc']) {
                                                    echo '<i class="fas fa-check fa-lg text-success"></i>';
                                                } else {
                                                    echo '<i class="fas fa-times fa-lg text-danger"></i>';
                                                }
                                                ?>
                                            </h6>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="width: 102%; margin-left:-1%;">
                        <div class="card-header" id="headingSeven">

                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                <h4 class="mb-0">Value of Care</h4>
                            </button>

                        </div>
                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
                            <div class="card-body ">
                                <div class="row">

                                    <div class="col-2 text-center p-3 border-bottom">
                                        <h5 class="pt-3">Cleanliness</h5>
                                    </div>
                                    <?php foreach ($cleanRating as $x) : ?>
                                        <div class="col text-center p-3 border-left border-bottom">
                                            <div class="mx-auto" id="rateCl<?php echo $x['hos_id'] ?>"></div>
                                            <p style="font-size: 20px;" class="text-center mb-1"><?php echo round($x['clean_rating'], 1) ?> out of 5</p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="row">

                                    <div class="col-2 text-center p-3 border-bottom">
                                        <h5 class="pt-3">Accomodation</h5>
                                    </div>
                                    <?php foreach ($accomoRating as $x) : ?>
                                        <div class="col text-center p-3 border-left border-bottom">
                                            <div class="mx-auto" id="rateAc<?php echo $x['hos_id'] ?>"></div>
                                            <p style="font-size: 20px;" class="text-center mb-1"><?php echo round($x['accomo_rating'], 1) ?> out of 5</p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="row">

                                    <div class="col-2 text-center p-3 border-bottom">
                                        <h5 class="pt-3">Availability</h5>
                                    </div>
                                    <?php foreach ($availRating as $x) : ?>
                                        <div class="col text-center p-3 border-left border-bottom">
                                            <div class="mx-auto" id="rateAv<?php echo $x['hos_id'] ?>"></div>
                                            <p style="font-size: 20px;" class="text-center mb-1"><?php echo round($x['avail_rating'], 1) ?> out of 5</p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="row">

                                    <div class="col-2 text-center p-3 border-bottom">
                                        <h5 class="pt-3">Facilities</h5>
                                    </div>
                                    <?php foreach ($facilitieRating as $x) : ?>
                                        <div class="col text-center p-3 border-left border-bottom">
                                            <div class="mx-auto" id="rateFa<?php echo $x['hos_id'] ?>"></div>
                                            <p style="font-size: 20px;" class="text-center mb-1"><?php echo round($x['facil_rating'], 1) ?> out of 5</p>
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

    <!-- <script>
    var myDiv = $('.wwdtext');
    myDiv.text(myDiv.text().substring(0,200));
    </script> -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
 <script>
        $(document).ready(function() {
            $(".filterCheck").click(function() {
                var action = 'data';
                var hos_id = get_filter_text('hos_id');
                var dept_id = get_filter_text('dept_id');
                var doc_id = get_filter_text('doc_id');
                var highRate = get_filter_text('highRate');
                var lowRate = get_filter_text('lowRate');
                $.ajax({
                    url: '<?php echo site_url('userProfile_Controller/fetchRev') ?>',
                    method: 'POST',
                    data: {
                        action: action,
                        hos_id: hos_id,
                        dept_id: dept_id,
                        doc_id: doc_id,
                        lowRate: lowRate,
                        highRate: highRate
                    },
                    success: function(response) {
                        console.log(response);
                        $(".revData").html(response);
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
            <?php foreach ($overview as $x) : ?>

                $("#rateYo<?php echo $x['hos_id'] ?>").rateYo({
                    rating: <?php echo $x['star_rating'] ?>,
                    readOnly: true,
                    starWidth: "20px",
                    spacing: "5px"
                });

            <?php endforeach; ?>
            <?php foreach ($overallRating as $x) : ?>

                $("#rate-Yo<?php echo $x['hos_id'] ?>").rateYo({
                    rating: <?php echo $x['star_rating'] ?>,
                    readOnly: true,
                    starWidth: "20px",
                    spacing: "5px"
                });

            <?php endforeach; ?>
            <?php foreach ($departments['overall'] as $x) : ?>

                $("#rate-dept<?php echo $x['hos_id'] ?>").rateYo({
                    rating: <?php echo $x['star_rating'] ?>,
                    readOnly: true,
                    starWidth: "20px",
                    spacing: "5px"
                });

            <?php endforeach; ?>
            <?php foreach ($cleanRating as $x) : ?>

                $("#rateCl<?php echo $x['hos_id'] ?>").rateYo({
                    rating: <?php echo $x['clean_rating'] ?>,
                    readOnly: true,
                    starWidth: "20px",
                    spacing: "5px"
                });

            <?php endforeach; ?>
            <?php foreach ($accomoRating as $x) : ?>

                $("#rateAc<?php echo $x['hos_id'] ?>").rateYo({
                    rating: <?php echo $x['accomo_rating'] ?>,
                    readOnly: true,
                    starWidth: "20px",
                    spacing: "5px"
                });

            <?php endforeach; ?>
            <?php foreach ($availRating as $x) : ?>

                $("#rateAv<?php echo $x['hos_id'] ?>").rateYo({
                    rating: <?php echo $x['avail_rating'] ?>,
                    readOnly: true,
                    starWidth: "20px",
                    spacing: "5px"
                });

            <?php endforeach; ?>
            <?php foreach ($facilitieRating as $x) : ?>

                $("#rateFa<?php echo $x['hos_id'] ?>").rateYo({
                    rating: <?php echo $x['facil_rating'] ?>,
                    readOnly: true,
                    starWidth: "20px",
                    spacing: "5px"
                });

            <?php endforeach; ?>

        });
    </script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('css/assets/js/main.js') ?>"></script> <!-- Resource jQuery -->

    <script type="text/javascript">
        $(document).ready(function() {
            window.history.pushState(null, "", window.location.href);
            window.onpopstate = function() {
                window.history.pushState(null, "", window.location.href);
            };
        });
    </script>
</body>

</html>