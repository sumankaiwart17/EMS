<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/bootstrap-datetimepicker.min.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <style>

        .mob-action {

            display: none;

        }



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



        .card-margin {

            margin-bottom: 1.875rem;

        }



        .card {

            border: 0;

            box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);

            -webkit-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);

            -moz-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);

            -ms-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);

        }



        .card {

            position: relative;

            display: flex;

            flex-direction: column;

            min-width: 0;

            word-wrap: break-word;

            background-color: #ffffff;

            background-clip: border-box;

            border: 1px solid #e6e4e9;

            border-radius: 8px;

            cursor: pointer;

        }



        .card-active {

            outline: none;

            border-color: #9ecaed;

            box-shadow: 0 0 10px #9ecaed;

        }



        .card:hover {

            outline: none;

            border-color: #9ecaed;

            box-shadow: 0 0 10px #9ecaed;

        }



        .card .card-header.no-border {

            border: 0;

        }



        .card .card-header {

            background: none;

            padding: 0 0.9375rem;

            font-weight: 500;

            display: flex;

            align-items: center;

            min-height: 50px;

        }



        .card-header:first-child {

            border-radius: calc(8px - 1px) calc(8px - 1px) 0 0;

        }



        .widget-49 .widget-49-title-wrapper {

            display: flex;

            align-items: center;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-primary {

            display: flex;

            align-items: center;

            justify-content: center;

            flex-direction: column;

            background-color: #edf1fc;

            width: 4rem;

            height: 4rem;

            border-radius: 50%;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-primary .widget-49-date-day {

            color: #4e73e5;

            font-weight: 500;

            font-size: 1.5rem;

            line-height: 1;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-primary .widget-49-date-month {

            color: #4e73e5;

            line-height: 1;

            font-size: 1rem;

            text-transform: uppercase;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-secondary {

            display: flex;

            align-items: center;

            justify-content: center;

            flex-direction: column;

            background-color: #fcfcfd;

            width: 4rem;

            height: 4rem;

            border-radius: 50%;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-day {

            color: #dde1e9;

            font-weight: 500;

            font-size: 1.5rem;

            line-height: 1;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-month {

            color: #dde1e9;

            line-height: 1;

            font-size: 1rem;

            text-transform: uppercase;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-success {

            display: flex;

            align-items: center;

            justify-content: center;

            flex-direction: column;

            background-color: #e8faf8;

            width: 4rem;

            height: 4rem;

            border-radius: 50%;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-day {

            color: #17d1bd;

            font-weight: 500;

            font-size: 1.5rem;

            line-height: 1;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-month {

            color: #17d1bd;

            line-height: 1;

            font-size: 1rem;

            text-transform: uppercase;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-info {

            display: flex;

            align-items: center;

            justify-content: center;

            flex-direction: column;

            background-color: #ebf7ff;

            width: 4rem;

            height: 4rem;

            border-radius: 50%;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-day {

            color: #36afff;

            font-weight: 500;

            font-size: 1.5rem;

            line-height: 1;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-month {

            color: #36afff;

            line-height: 1;

            font-size: 1rem;

            text-transform: uppercase;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-warning {

            display: flex;

            align-items: center;

            justify-content: center;

            flex-direction: column;

            background-color: floralwhite;

            width: 4rem;

            height: 4rem;

            border-radius: 50%;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-day {

            color: #FFC868;

            font-weight: 500;

            font-size: 1.5rem;

            line-height: 1;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-month {

            color: #FFC868;

            line-height: 1;

            font-size: 1rem;

            text-transform: uppercase;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-danger {

            display: flex;

            align-items: center;

            justify-content: center;

            flex-direction: column;

            background-color: #feeeef;

            width: 4rem;

            height: 4rem;

            border-radius: 50%;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-day {

            color: #F95062;

            font-weight: 500;

            font-size: 1.5rem;

            line-height: 1;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-month {

            color: #F95062;

            line-height: 1;

            font-size: 1rem;

            text-transform: uppercase;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-light {

            display: flex;

            align-items: center;

            justify-content: center;

            flex-direction: column;

            background-color: #fefeff;

            width: 4rem;

            height: 4rem;

            border-radius: 50%;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-day {

            color: #f7f9fa;

            font-weight: 500;

            font-size: 1.5rem;

            line-height: 1;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-month {

            color: #f7f9fa;

            line-height: 1;

            font-size: 1rem;

            text-transform: uppercase;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-dark {

            display: flex;

            align-items: center;

            justify-content: center;

            flex-direction: column;

            background-color: #ebedee;

            width: 4rem;

            height: 4rem;

            border-radius: 50%;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-day {

            color: #394856;

            font-weight: 500;

            font-size: 1.5rem;

            line-height: 1;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-month {

            color: #394856;

            line-height: 1;

            font-size: 1rem;

            text-transform: uppercase;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-base {

            display: flex;

            align-items: center;

            justify-content: center;

            flex-direction: column;

            background-color: #f0fafb;

            width: 4rem;

            height: 4rem;

            border-radius: 50%;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-day {

            color: #68CBD7;

            font-weight: 500;

            font-size: 1.5rem;

            line-height: 1;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-month {

            color: #68CBD7;

            line-height: 1;

            font-size: 1rem;

            text-transform: uppercase;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-meeting-info {

            display: flex;

            flex-direction: column;

            margin-left: 1rem;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-pro-title {

            color: #3c4142;

            font-size: 20px;

        }



        .widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-meeting-time {

            color: #B1BAC5;

            font-size: 13px;

        }



        .widget-49 .widget-49-meeting-points {

            font-weight: 400;

            font-size: 13px;

            margin-top: .5rem;

        }



        .widget-49 .widget-49-meeting-points .widget-49-meeting-item {

            display: list-item;

            color: #727686;

        }



        .widget-49 .widget-49-meeting-points .widget-49-meeting-item span {

            margin-left: .5rem;

        }



        .widget-49 .widget-49-meeting-action {

            text-align: right;

        }



        .widget-49 .widget-49-meeting-action a {

            text-transform: uppercase;

        }



        .price {

            font-size: 20px !important;

        }



        .package-select {

            font-size: 18px !important;

            cursor: pointer;

        }



        .package-select:hover {

            background: #fff;

            color: black;

            border: 1px ridge black;

        }

    </style>

    <title>Advertisements</title>

</head>



<body>

    <!-- Navbar -->

    <?php include('navbar.php'); ?>

    <?php if ($layout == 0) : ?>

        <!-- View Advertisements -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-sm-4 col-3" data-aos="fade-right">

                        <h4 class="page-title">Advertises</h4>

                        <input type="text" style="width: 250px;" id="search" class="form-control mb-3" placeholder="Search Advertise">

                    </div>

                    <div class="col-sm-8 col-9 text-right m-b-20" data-aos="fade-left">

                        <a href="<?php echo site_url('hospital_Controller/addAdvertise') ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Advertisement</a>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive" data-aos="fade-up">

                            <table class="table table-striped custom-table">

                                <thead id='hideData'>

                                    <tr>

                                        <th style="min-width:10px">#</th>

                                        <th style="min-width:150px;">Ad Title</th>

                                        <th style="min-width:200px;">Ad Desc</th>

                                        <th>Created On</th>

                                        <th>Status</th>

                                        <th class="text-right">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php if (isset($ads)) :

                                        $i = 1; ?>

                                        <?php foreach ($ads as $x) : ?>

                                            <tr style="margin-bottom: 5px;">

                                                <td><?php echo $i ?></td>

                                                <td data-th="Title:"><?php echo $x['ad_title'] ?></td>

                                                <td data-th="Description:"><?php echo $x['ad_desc'] ?></td>

                                                <td data-th="Created On:"><?php echo date("d/m/y g:i A", strtotime($x['datetime'])) ?></td>

                                                <td data-th="Status:">

                                                    <?php if ($x['status'] == 1) {

                                                        echo '<span class="custom-badge status-green">Active</span>';

                                                    } else {

                                                        echo '<span class="custom-badge status-red">Inactive</span>';

                                                    } ?>

                                                </td>

                                                <td data-th="Action:" class="text-right">

                                                    <div class="dropdown dropdown-action">

                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                                                        <div class="dropdown-menu dropdown-menu-right">

                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/editAdvertise/' . $x['ad_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/delAdvertise/' . $x['ad_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                        </div>

                                                    </div>

                                                    <div class="mob-action text-left">

                                                        <a class="" href="<?php echo site_url('hospital_Controller/editAdvertise/' . $x['ad_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                        <a style="padding: 27px;" class="" href="<?php echo site_url('hospital_Controller/delAdvertise/' . $x['ad_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                    </div>

                                                </td>

                                            </tr>

                                        <?php $i++;

                                        endforeach; ?>

                                    <?php else : ?>

                                      
                                        <?php echo"<span style='color:red'>No Advertises</span><script>document.getElementById('hideData').style.display='none'</script>"?>
                                    <?php endif; ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    <?php elseif ($layout == 1) : ?>

        <!-- Add Advertisements -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2 pt-5">

                        <h4 class="page-title">Add Advertisement</h4>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2 pt-3">

                        <form method="post" action="<?php echo site_url('hospital_Controller/addAdvertise') ?>">

                            <div class="row">



                                <div class="col-sm-6 pt-2">

                                    <div class="form-group">

                                        <label>Ad Title: <span class="text-danger">*</span></label>

                                        <input class="form-control" required name="ad_title" id="ad_title" type="text">

                                    </div>

                                </div>

                                <div class="col-sm-6 pt-2">

                                    <div class="form-group">

                                        <label>Ad Description: <span class="text-danger">*</span></label>

                                        <input class="form-control" required name="ad_desc" id="ad_desc" type="text">

                                    </div>

                                </div>

                                <div class="col-sm-6 pt-2">

                                    <div class="form-group gender-select">

                                        <label class="gen-label">Status: <span class="text-danger">*</span></label>

                                        <div class="form-check-inline">

                                            <label class="form-check-label">

                                                <input type="radio" required name="status" value="1" checked class="form-check-input">Active

                                            </label>

                                        </div>

                                        <div class="form-check-inline">

                                            <label class="form-check-label">

                                                <input type="radio" required name="status" value="0" class="form-check-input">Inactive

                                            </label>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-12">

                                    <div class="row">

                                        <div class="form-group col-sm-6">

                                            <div class="card card-margin package-card">

                                                <div class="card-header no-border">

                                                    <h5 class="card-title text-primary">Basic Plan</h5><span class="price p-3 badge badge-primary ml-auto"><i class="fas fa-rupee-sign"></i> 500</span>

                                                </div>

                                                <div class="card-body pt-0">

                                                    <div class="widget-49">

                                                        <div class="widget-49-title-wrapper">

                                                            <div class="widget-49-date-primary">

                                                                <span class="widget-49-date-day"><i class="fas fa-shield-alt fa-3x"></i></span>

                                                            </div>

                                                            <div class="widget-49-meeting-info">

                                                                <span class="widget-49-pro-title">Pay once and get following priviledges</span>

                                                            </div>

                                                        </div>

                                                        <ul class="widget-49-meeting-points">

                                                            <li class="widget-49-meeting-item"><span>This AD will be featured on Recommend Me page only</span></li>

                                                            <li class="widget-49-meeting-item"><span>Minimum Publicity</span></li>



                                                        </ul>

                                                        <div class="widget-49-meeting-action">

                                                            <input type="radio" style="display:none;" name="package" value="basic" id="package">

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group col-sm-6">

                                            <div class="card card-margin package-card">

                                                <div class="card-header no-border">

                                                    <h5 class="card-title text-warning">Premium Plan </h5><span class="price p-3 text-light badge badge-warning ml-auto"><i class="fas fa-rupee-sign"></i> 5000</span>

                                                </div>

                                                <div class="card-body pt-0">

                                                    <div class="widget-49">

                                                        <div class="widget-49-title-wrapper">

                                                            <div class="widget-49-date-warning">

                                                                <span class="widget-49-date-day"><i class="fas fa-shield-alt fa-3x"></i></span>

                                                            </div>

                                                            <div class="widget-49-meeting-info">

                                                                <span class="widget-49-pro-title">Pay once and get following priviledges</span>

                                                            </div>

                                                        </div>

                                                        <ul class="widget-49-meeting-points">

                                                            <li class="widget-49-meeting-item"><span>This AD will be featured on multiple Pages</span></li>

                                                            <li class="widget-49-meeting-item"><span>Special recommend on User Interest</span></li>

                                                            <li class="widget-49-meeting-item"><span>Maximum Publicity</span></li>

                                                        </ul>

                                                        <div class="widget-49-meeting-action">

                                                            <input type="radio" style="display:none;" name="package" value="premium" id="package">

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>



                                </div>

                            </div>

                            <div class="m-t-20 text-center">

                                <button type="submit" class="btn btn-primary submit-btn">Add Advertisement</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>



        </div>

    <?php elseif ($layout == 2) : ?>

        <!-- Edit Advertisements -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2 pt-5">

                        <h4 class="page-title">Edit Advertisement</h4>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2 pt-3">

                        <form method="post" action="<?php echo site_url('hospital_Controller/editAdvertise') ?>">

                            <div class="row">

                                <input type="hidden" name="ad_id" value="<?php echo $ad[0]['ad_id'] ?>">

                                <div class="col-sm-6 pt-2">

                                    <div class="form-group">

                                        <label>Ad Title: <span class="text-danger">*</span></label>

                                        <input class="form-control" required name="ad_title" id="ad_title" type="text" value="<?php echo $ad[0]['ad_title'] ?>">

                                    </div>

                                </div>

                                <div class="col-sm-6 pt-2">

                                    <div class="form-group">

                                        <label>Ad Description: <span class="text-danger">*</span></label>

                                        <input class="form-control" required name="ad_desc" id="ad_desc" type="text" value="<?php echo $ad[0]['ad_desc'] ?>">

                                    </div>

                                </div>

                                <div class="col-sm-6 pt-2">

                                    <div class="form-group gender-select">

                                        <label class="gen-label">Status: <span class="text-danger">*</span></label>

                                        <div class="form-check-inline">

                                            <label class="form-check-label">

                                                <input type="radio" required name="status" value="1" <?php if ($ad[0]['status'] == 1) {

                                                                                                            echo 'checked';

                                                                                                        } ?> class="form-check-input">Active

                                            </label>

                                        </div>

                                        <div class="form-check-inline">

                                            <label class="form-check-label">

                                                <input type="radio" required name="status" value="0" <?php if ($ad[0]['status'] == 0) {

                                                                                                            echo 'checked';

                                                                                                        } ?> class="form-check-input">Inactive

                                            </label>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="m-t-20 text-center">

                                <button type="submit" class="btn btn-primary submit-btn">Save Advertisement</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="<?php echo base_url('js/jquery.slimscroll.js') ?>"></script>

    <script src="<?php echo base_url('js/select2.min.js') ?>"></script>

    <script src="<?php echo base_url('js/moment.min.js') ?>"></script>

    <script src="<?php echo base_url('js/bootstrap-datetimepicker.min.js') ?>"></script>

    <script src="<?php echo base_url('js/app.js') ?>"></script>

    <script>
        $("#search").on("keyup", function() {

            var date = $(this).val().toLowerCase();


            console.log(date);
            $(".table tbody tr ").filter(function() {

                $(this).toggle($(this).text().toLowerCase().indexOf(date) > -1)

            });

        });
    </script>


    <script>

        function readURL(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();



                reader.onload = function(e) {

                    $('#prevpic').attr('src', e.target.result);

                }



                reader.readAsDataURL(input.files[0]);

            }

        }



        $("#propic").change(function() {

            readURL(this);

        });

        $('.package-card').click(function() {

            $('.package-card').removeClass('card-active');

            $(this).addClass('card-active');

            $(this).find('input[type=radio]').prop('checked', true);

        });

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