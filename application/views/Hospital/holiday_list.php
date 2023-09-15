<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/bootstrap-datetimepicker.min.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <title>Holiday</title>

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

            .table-responsive td {

                text-indent: 0.01% !important;

                text-align: center !important;

            }



        }

    </style>

</head>



<body>

    <!-- Navbar -->

    <?php include('navbar.php'); ?>

    <?php if ($layout == 0) : ?>

        <!-- view holidays -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-sm-5 col-5">

                        <h4 class="page-title">Holidays</h4>

                    </div>

                    <div class="col-sm-7 col-7 text-right m-b-30">

                        <a href="<?php echo site_url('hospital_Controller/add_holiday') ?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Holiday</a>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table class="table table-striped custom-table mb-0">

                                <thead>

                                    <tr id='hideData'>

                                        <th>#</th>

                                        <th>Title </th>

                                        <th>Holiday Date</th>

                                        <th>Day</th>
                                        <th>Action</th>

                                    </tr>

                                </thead>

                                
                                <?php if(isset($result)):?>
                                    <?php $n=0?>
                                <?php 
                            
                       
                                foreach ($result as $r) : ?>
                       
               
                                    <tbody>

                                        <tr class="<?php if ($r['holiday_date'] >= date('Y-m-d')) { ?>holiday-upcoming <?php } else { ?> holiday-completed<?php } ?>">

                                        <td><?php $n = $n + 1;

                                    echo $n; ?></td>

                                            <td><?= $r['holiday_name'] ?></td>

                                            <td><?= $r['holiday_date'] ?></td>

                                            <td><?= date('D', strtotime($r['holiday_date'])); ?></td>

                                            <?php if ($r['holiday_date'] >= date('Y-m-d')) { ?>

                                                <td class="text-right">

                                                    <div class="dropdown dropdown-action">

                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                                                        <div class="dropdown-menu dropdown-menu-right">

                                                            <a class="dropdown-item" href="<?= site_url('hospital_Controller/edit_holiday/' . $r['id']) ?>"><i class="fas fa-pencil-alt"></i> Edit</a>

                                                            <a class="dropdown-item" href="<?= site_url('hospital_Controller/delholiday/' . $r['id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash"></i> Delete</a>

                                                        </div>

                                                    </div>

                                                    <div class="mob-action text-left">

                                                        <a class="" href="<?php echo site_url('hospital_controller/edit_holiday/' . $r['id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                        <a style="float: right;" class="" href="<?php echo site_url('hospital_controller/delholiday/' . $r['id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                    </div>

                                                </td>

                                            <?php } ?>

                                        </tr>



                                    </tbody>
<?php endforeach;?>
                                    <?php else:?>
                                        
                                        <?php echo"<script>document.getElementById('hideData').style.display='none' </script>"?>

                              <?php endif;?>
                              
                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    <?php elseif ($layout == 1) : ?>

        <!-- Add holidays -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <h4 class="page-title">Add Holiday</h4>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form action="<?php echo site_url('hospital_Controller/add_holiday') ?>" method="post">

                            <div class="form-group">

                                <label>Holiday Name <span class="text-danger">*</span></label>

                                <input class="form-control" name="holiday_name" type="text">

                            </div>

                            <div class="form-group">

                                <label>Holiday Date <span class="text-danger">*</span></label>

                                <!-- <div class="cal-icon"> -->

                                <input class="form-control" input="calendar" name="holiday_date" type="date">

                                <!-- </div> -->

                            </div>

                            <div class="m-t-20 text-center">

                                <button type="submit" class="btn btn-primary submit-btn">Create Holiday</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <div class="notification-box">

                <div class="msg-sidebar notifications msg-noti">

                    <div class="topnav-dropdown-header">

                        <span>Messages</span>

                    </div>

                </div>

            </div>

        </div>

    <?php elseif ($layout == 2) : ?>

        <!-- Edit holidays -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <h4 class="page-title">Edit Holiday</h4>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form action="<?php echo site_url('hospital_Controller/edit_holiday') ?>" method="post">

                            <div class="form-group">

                                <label>Holiday Name <span class="text-danger">*</span></label>

                                <input value="<?php echo $holiday[0]['holiday_name'] ?>" class="form-control" name="holiday_name" type="text">

                            </div>

                            <div class="form-group">

                                <label>Holiday Date <span class="text-danger">*</span></label>

                                <div class="cal-icon">

                                    <input value="<?php echo $holiday[0]['holiday_date'] ?>" class="form-control datetimepicker" name="holiday_date" type="date">

                                </div>

                            </div>

                            <input value="<?php echo $holiday[0]['id'] ?>" class="form-control" style="display: none" ; type="data" name="id">

                            <div class="m-t-20 text-center">

                                <button type="submit" class="btn btn-primary submit-btn">Edit Holiday</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    <?php endif; ?>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="<?php echo base_url('js/jquery.slimscroll.js') ?>"></script>

    <script src="<?php echo base_url('js/moment.min.js') ?>"></script>

    <script src="<?php echo base_url('js/bootstrap-datetimepicker.min.js') ?>"></script>

    <script src="<?php echo base_url('js/app.js') ?>"></script>

</body>



</html>