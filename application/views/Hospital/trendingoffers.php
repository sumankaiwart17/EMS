<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/bootstrap-datetimepicker.min.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <title>Trending Offers</title>

    <style>

        .cal-icon:after {

            background: transparent url("<?php echo base_url('images/') ?>calander.png") no-repeat scroll 0 0;

            bottom: 0;

            content: "";

            display: block;

            height: 19px;

            margin: auto;
        
            position: absolute;

            right: 15px;

            top: 0;

            width: 17px;

        }



        .cal-icon {

            position: relative;

            width: 100%;

        }



        .mob-action {

            display: none;

        }



        @media only screen and (max-width: 991.98px) {



            .btn {

                display: initial !important;

            }

        }

    </style>

</head>



<body>

    <!-- Navbar -->

    <?php include('navbar.php'); ?>

    <!-- View trendingOffers -->

    <div class="page-wrapper" style="margin-right: 20px;
">

        <div class="content">

            <div class="row">

                <div class="col-sm-4">

                    <h4 class="page-title">Trending Offers</h4>

                </div>

            </div>

        </div>

        <div class="row doc">

            <div class="col-md-12" style="padding:0px 35px">

                <div class="table-responsive">

                    <table class="table table-striped custom-table">

                        <thead>

                            <tr style="margin-bottom: 5px;">


                              <th>#</th>

                                <th>Coupon Title</th>

                                <th>Offer On</th>

                                <th>Hospital name</th>

                                <th>Discount %</th>

                                <th style="min-width: 110px;">Total Avails</th>

                                <th> Actions</th>

                            </tr>

                        </thead>

                        <tbody>
                             <?php $n=0;?>
                            <?php if (!isset($error)) :  ?>

                                <?php foreach ($offers as $x) : ?>

                                    <tr>
                                        <td><?php echo $n=$n+1?></td>
                                        <td>

                                            <?php echo $x['coupon_title'] ?>

                                        </td>

                                        <td data-th="Offer On:"><?php echo $x['offer_on'] ?></td>

                                        <td data-th="Hospital Name:"><?php echo $x['hos_name'] ?></td>

                                        <td data-th="Discount:"><?php echo $x['discount'] ?></td>

                                        <td data-th="Total Avails:"><?php echo $x['avail_count'] ?></td>



                                        <?php if ($x['hos_id'] != $_SESSION['email_id']) : ?>

                                            <td data-th="Action:">

                                                <a href="<?= site_url('hospital_controller/addOffer/' . $x['coupon_id']) ?>" class="btn btn btn-primary btn-rounded">Add Simillar Offer</a>

                                            </td>

                                        <?php endif; ?>



                                    </tr>

                                <?php endforeach; ?>

                            <?php else : ?>

                                <center>

                                    <p class="text-danger"><?php echo $error; ?></p>

                                </center>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <div class="row trat" style="display: none">

            <div class="col-md-12">

                <div class="table-responsive">

                    <table class="table table-striped custom-table">

                        <thead>

                            <tr>

                                <th style="min-width:auto">Coupon Title</th>

                                <th>Coupon Code</th>

                                <th>Treatment Name</th>

                                <th>Discount %</th>

                                <th style="min-width: 110px;">Validity</th>

                                <th>Status</th>

                                <th class="text-right">Action</th>

                            </tr>

                        </thead>

                    </table>

                </div>

            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="<?php echo base_url('js/jquery.slimscroll.js') ?>"></script>

    <script src="<?php echo base_url('js/select2.min.js') ?>"></script>

    <script src="<?php echo base_url('js/moment.min.js') ?>"></script>

    <script src="<?php echo base_url('js/bootstrap-datetimepicker.min.js') ?>"></script>

    <script src="<?php echo base_url('js/app.js') ?>"></script>

    <script>

        $("#offer_on").change(function() {

            var offer_on = $('#offer_on').val();

            // console.log(offer_on);

            if (offer_on == "Doctor") {

                $('.doc').show();

                $('.trat').hide();

            }

            if (offer_on == "Treatment") {

                $('.doc').hide();

                $('.trat').show();

            }

        });

    </script>

</body>



</html>