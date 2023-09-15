<?php

// echo "<pre>";
// print_r($_SESSION);
// die;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/bootstrap-datetimepicker.min.css') ?>">
    <link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
    <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <title>Doctor Schedule</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        .time-icon:after {

            background: transparent url("<?php echo base_url('images/') ?>clock.png") no-repeat scroll 0 0;

            bottom: 0;

            content: "";

            display: block;

            height: 19px;

            margin: auto;

            position: absolute;

            right: 15px;

            top: 0;

            width: 19px;

        }

        .swal2-popup {
            width: 20em !important;
        }

        .swal2-title {
            font-size: 20px;
        }

        .time-icon {

            position: relative;

            width: 100%;

        }



        .mob-action {

            display: none;

        }

        .search-bar {
            position: relative;

        }

        .search-bar i {
            position: absolute;
            top: 13px;
            right: 27px;
        }
    </style>

</head>

<body>
    <!-- Navbar -->

    <?php include('navbar.php'); ?>

    <?php if ($layout == 0) : ?>

        <!-- Doctors' Schedule -->

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3" data-aos="fade-right">
                        <h4 class="page-title">Doctor's Schedule</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20" data-aos="fade-left">
                        <a href="<?php echo site_url('hospital/add-doctor-schedule') ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Schedule</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 search-bar">

                        <input type="text" class="form-control mb-3" placeholder="Search Schedule" id="search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>


                </div>

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive" data-aos="fade-up">

                            <table class="table table-border table-striped custom-table mb-0">

                                <thead id="hideData">

                                    <tr>
                                        <th>#</th>
                                        <th>Doctor Name</th>

                                        <th>Available Days</th>

                                        <th>Available Time</th>

                                        <th>Status</th>

                                        <th class="text-right">Action</th>

                                    </tr>

                                </thead>

                                <tbody>


                                    <?php if (isset($doctors)) {


                                        $n = 0;
                                        foreach ($doctors as $x) : ?>
                                            <tr style="margin-bottom: 5px;">
                                                <td><?php $n = $n + 1;
                                                    echo $n; ?></td>

                                                <td><img width="28" height="28" src="<?php echo $x['picture'] === "" ? base_url("images/avatar.png") : $x['picture'] ?>" class="rounded-circle m-r-5" alt=""> <?php echo $x['doc_name'] ?></td>

                                                <td data-th="Available Days:"><?php echo $x['weekdays'] ?></td>
                                                <td data-th="Available Time:"><?php echo date("g:i A", strtotime($x['strt_time'])) . '-' . date("g:i A", strtotime($x['end_time'])); ?></td>
                                                <td data-th="Status:"><?php if ($x['status'] != 0) : ?><span class="custom-badge status-green">Active</span><?php else : ?><span class="custom-badge status-red">Inactive</span><?php endif; ?></td>
                                                <td data-th="Action:" class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/editSchedule/' . $x['doc_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/delSchedule/' . $x['doc_id']) ?>" id="deleteSchedule" onclick="return confirm('Are you sure you want to delete this schedule ?')"><i class="fas fa-trash m-r-5"></i> Delete</a>
                                                        </div>
                                                    </div>

                                                    <div class="mob-action text-left">
                                                        <a class="" href="<?php echo site_url('hospital_controller/editSchedule/' . $x['doc_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                        <a style="padding: 27px;" class="" href="<?php echo site_url('hospital_controller/delSchedule/' . $x['doc_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php endforeach;
                                    } else {
                                        echo "<span style='color:red'>No Doctor's Schedule</span><script>document.getElementById('hideData').style.display='none'</script>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif ($layout == 1) : ?>
        <!-- Add Doctor Schedule -->
        <div class="page-wrapper" style="padding:50px 0px;">
            <div class="content">
                <?php if (isset($doctors)) : ?>
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2" data-aos="fade-right">
                            <h4 class="page-title">Add Schedule</h4>
                        </div>
                    </div>



                    <div class="row p-3">
                        <div class="col-lg-8 offset-lg-2">
                            <form action="<?php echo site_url('hospital_Controller/addSchedule') ?>" method="post" onsubmit="addData()">
                                <div class="row pt-3 pb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Doctor Name</label>
                                            <select name="doc_id" class="form-control">
                                                <option value="">Select a Doctor</option>
                                                <?php foreach ($doctors as $x) : ?>
                                                    <option value="<?php echo $x['doc_id'] ?>" <?php echo set_value("doc_id") == $x['doc_id'] ? "selected" : ""; ?>><?php echo $x['doc_name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="text-danger"><?php echo form_error('doc_id'); ?></div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-0">

                                            <label>Available Days</label>
                                            <select name="weekdays[]" size="6" id="choices-multiple-remove-button" placeholder="Select Days" multiple>
                                                <option value="Mon">Monday</option>
                                                <option value="Tue">Tuesday</option>
                                                <option value="Wed">Wednesday</option>
                                                <option value="Thur">Thursday</option>
                                                <option value="Fri">Friday</option>
                                                <option value="Sat">Saturday</option>
                                                <option value="Sun">Sunday</option>
                                            </select>


                                        </div>
                                        <div class="text-danger"><?php echo form_error('weekdays[]'); ?></div>

                                    </div>
                                </div>
                                <div class="row pt-3 pb-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Start Time</label>
                                            <div class="time-icon">
                                                <input name="strt_time" type="text" class="form-control" id="datetimepicker3" value="<?php echo set_value("strt_time"); ?>">
                                            </div>
                                            <div class="text-danger"><?php echo form_error('strt_time'); ?></div>
                                        </div>


                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>End Time</label>
                                            <div class="time-icon">
                                                <input name="end_time" type="text" class="form-control" id="datetimepicker4" value="<?php echo set_value("end_time"); ?>">
                                            </div>
                                            <div class="text-danger"><?php echo form_error('end_time'); ?></div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Break Time</label>
                                            <div class="time-icon">
                                                <input name="brk_time" type="text" class="form-control" id="datetimepicker5" value="<?php echo set_value("brk_time"); ?>">
                                            </div>
                                            <div class="text-danger"><?php echo form_error('brk_time'); ?></div>
                                        </div>

                                    </div>

                                </div>

                                <div class="row pt-3 pb-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Appointment Duration <small><strong>(in mins)</strong></small></label>
                                            <div class="">
                                                <input name="appt_dur" type="number" class="form-control" id="brk_dur" value="<?php echo set_value("appt_dur"); ?>">
                                            </div>
                                            <div class="text-danger"><?php echo form_error('appt_dur'); ?></div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Break Duration <small><strong>(in hrs)</strong></small></label>
                                            <div class="">
                                                <input name="brk_dur" type="number" class="form-control" id="brk_dur" value="<?php echo set_value("brk_dur"); ?>">
                                            </div>
                                            <div class="text-danger"><?php echo form_error('brk_dur'); ?></div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Consult fees</label>
                                            <div class="">
                                                <input name="consult_fee" type="number" class="form-control" id="consult_fee" value="<?php echo set_value("consult_fee"); ?>">
                                            </div>
                                            <div class="text-danger"><?php echo form_error('consult_fee'); ?></div>
                                        </div>

                                    </div>

                                </div>



                                <div class="form-group pt-3 pb-3">
                                    <label class="display-block">Schedule Status</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="product_active" value="1" checked>
                                        <label class="form-check-label" for="product_active">
                                            Active
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="product_inactive" value="0">
                                        <label class="form-check-label" for="product_inactive">
                                            Inactive
                                        </label>
                                    </div>
                                </div>

                                <div class="m-t-20 text-center">
                                    <button type="submit" class="btn btn-primary submit-btn">Create Schedule</button>
                                </div>

                            </form>

                        </div>

                    </div>

                <?php else : ?>


                    <script>
                        clicked();

                        function clicked() {
                            Swal.fire({
                                position: 'top-center',
                                icon: 'warning',
                                title: 'All Doctors Schedule/Doctors Not Added',
                                showConfirmButton: false,
                                timer: 2000
                            });

                        };
                        window.setTimeout(function() {
                            window.location = 'doctors-schedule';
                        }, 1900);
                    </script>
                <?php
                endif; ?>


            </div>
        </div>

    <?php elseif ($layout == 2) : ?>

        <!-- Edit -->

        <div class="page-wrapper" style="padding:50px 0px;">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <h4 class="page-title">Edit Schedule</h4>

                    </div>

                </div>

                <?php if (isset($schedule)) : ?>

                    <div class="row p-3">

                        <div class="col-lg-8 offset-lg-2">

                            <form action="<?php echo site_url('hospital_Controller/editSchedule/' . $this->uri->segment(3)) ?>" method="post">

                                <div class="row pt-3 pb-3">

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>Doctor Name</label>

                                            <input type="hidden" name="doc_id" value="<?php echo $schedule[0]['doc_id'] ?>">

                                            <input type="text" name="doc_name" class="form-control" readonly value="<?php echo $schedule[0]['doc_name'] ?>">

                                            <div class="text-danger"><?php echo form_error('doc_id'); ?></div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>Available Days</label><?php $days = explode(',', $schedule[0]['weekdays']) ?>

                                            <select name="weekdays[]" size="6" id="choices-multiple-remove-button" multiple>

                                                <option value="Sun" <?php if (in_array('Sun', $days)) {

                                                                        echo 'selected';
                                                                    } ?>>Sunday</option>npa

                                                <option value="Mon" <?php if (in_array('Mon', $days)) {

                                                                        echo 'selected';
                                                                    } ?>>Monday</option>

                                                <option value="Tue" <?php if (in_array('Tue', $days)) {

                                                                        echo 'selected';
                                                                    } ?>>Tuesday</option>

                                                <option value="Wed" <?php if (in_array('Wed', $days)) {

                                                                        echo 'selected';
                                                                    } ?>>Wednesday</option>

                                                <option value="Thur" <?php if (in_array('Thur', $days)) {

                                                                            echo 'selected';
                                                                        } ?>>Thursday</option>

                                                <option value="Fri" <?php if (in_array('Fri', $days)) {

                                                                        echo 'selected';
                                                                    } ?>>Friday</option>

                                                <option value="Sat" <?php if (in_array('Sat', $days)) {

                                                                        echo 'selected';
                                                                    } ?>>Saturday</option>

                                            </select>

                                            <div class="text-danger"><?php echo form_error('weekdays[]'); ?></div>

                                        </div>

                                    </div>

                                </div>

                                <div class="row pt-3 pb-3">

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>Start Time</label>

                                            <div class="time-icon">

                                                <input name="strt_time" type="text" class="form-control" value="<?php echo $schedule[0]['strt_time'] ?>" id="datetimepicker3">

                                            </div>

                                            <div class="text-danger"><?php echo form_error('strt_time'); ?></div>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>End Time</label>

                                            <div class="time-icon">

                                                <input name="end_time" type="text" class="form-control" value="<?php echo $schedule[0]['end_time'] ?>" id="datetimepicker4">

                                            </div>

                                            <div class="text-danger"><?php echo form_error('end_time'); ?></div>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>Consult Fee</label>

                                            <div>

                                                <input name="consult_fee" type="number" class="form-control" value="<?php echo $schedule[0]['consult_fee'] ?>">

                                            </div>

                                            <div class="text-danger"><?php echo form_error('consult_fee'); ?></div>

                                        </div>

                                    </div>

                                </div>

                                <div class="row pt-3 pb-3">

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>Break Time</label>

                                            <div class="time-icon">

                                                <input name="brk_time" type="text" value="<?php echo $schedule[0]['brk_time'] ?>" class="form-control" id="datetimepicker5">

                                            </div>

                                            <div class="text-danger"><?php echo form_error('brk_time'); ?></div>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>Break Duration <small><strong>(in hrs)</strong></small></label>

                                            <div class="">

                                                <input name="brk_dur" type="number" value="<?php echo $schedule[0]['brk_dur'] ?>" class="form-control" id="brk_dur">

                                            </div>

                                            <div class="text-danger"><?php echo form_error('brk_dur'); ?></div>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>Appointment Duration <small><strong>(in mins)</strong></small></label>

                                            <div class="">

                                                <input name="appt_dur" type="number" value="<?php echo $schedule[0]['consult_duration'] ?>" class="form-control" id="brk_dur">

                                            </div>

                                            <div class="text-danger"><?php echo form_error('appt_dur'); ?></div>

                                        </div>

                                    </div>

                                </div>

                                <div class="form-group pt-3 pb-3">

                                    <label class="display-block">Schedule Status</label>

                                    <div class="form-check form-check-inline">

                                        <input class="form-check-input" type="radio" name="status" id="product_active" value="1" <?php if ($schedule[0]['status'] == 1) {

                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>

                                        <label class="form-check-label" for="product_active">

                                            Active

                                        </label>

                                    </div>

                                    <div class="form-check form-check-inline">

                                        <input class="form-check-input" type="radio" name="status" id="product_inactive" value="0" <?php if ($schedule[0]['status'] == 0) {

                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>

                                        <label class="form-check-label" for="product_inactive">

                                            Inactive

                                        </label>

                                    </div>

                                </div>

                                <div class="m-t-20 text-center">

                                    <button type="submit" class="btn btn-primary submit-btn">Save Schedule</button>

                                </div>

                            </form>

                        </div>

                    </div>

                <?php else : ?>

                <?php endif; ?>

            </div>

        </div>

    <?php endif; ?>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="<?php echo base_url('js/moment.min.js') ?>"></script>

    <script src="<?php echo base_url('js/select2.min.js') ?>"></script>

    <script src="<?php echo base_url('js/bootstrap-datetimepicker.min.js') ?>"></script>

    <script src="<?php echo base_url('js/app.js') ?>"></script>



    <script>
        $("#deleteSchedule").on("click", function() {

            let val = confirm("Are you sure you want to delete this schedule ?");

            if (val) {

                swal.fire({
                    icon: 'success',
                    title: 'Schedule Deleted',

                })

            }

        });

        $(document).ready(function($) {

            $(function() {

                $('#datetimepicker3').datetimepicker({

                    format: 'LT'

                });

                $('#datetimepicker4').datetimepicker({

                    format: 'LT'

                });
                $('#datetimepicker5').datetimepicker({

                    format: 'LT'

                });

                $('#datetimepicker6').datetimepicker({

                    format: 'LT'

                });


            });

        });

        $(document).ready(function() {



            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {

                removeItemButton: true,

                maxItemCount: 6,

                searchResultLimit: 7,

                renderChoiceLimit: 7

            });





        });
    </script>
    <script>
        $("#search").on("keyup", function() {

            var date = $(this).val().toLowerCase();


            console.log(date);
            $(".table tbody tr").filter(function() {

                $(this).toggle($(this).text().toLowerCase().indexOf(date) > -1)

            });

        });
    </script>

    <?php if (isset($_SESSION['success'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Doctor Schedule Added Successfully',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    
    <?php unset($_SESSION['success']); ?>    

    <?php endif; ?>

    <?php if (isset($_SESSION['edit'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Doctor Schedule Updated Successfully',
                showConfirmButton: false,
                timer: 2000
            })
        </script>

    <?php unset($_SESSION['edit']); ?>    

    <?php endif; ?>

    <?php if (isset($_SESSION['delete'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: 'Doctor Schedule Deleted',
                showConfirmButton: false,
                timer: 2000
            })
        </script>

    <?php unset($_SESSION['delete']); ?>    

    <?php endif; ?>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 130,
            duration: 1000,
        });
    </script>



    <!-- <script>
        function clicked(){
            Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Successfully Added',
                        showConfirmButton: false,
                        timer: 1000
                      })
        }
      
        </script> -->

</body>



</html>