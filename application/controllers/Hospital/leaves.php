<?php

// echo "<pre>";
// print_r($result);
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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <title>Leaves</title>

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
    </style>

</head>



<body>

    <!-- Navbar -->

    <?php include('navbar.php'); ?>



    <?php if ($layout == 0) : ?>

        <!-- View leaves -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-sm-4 col-3">

                        <h4 class="page-title">Leaves</h4>

                    </div>

                    <div class="col-sm-8 col-9 text-right m-b-20">

                        <a href="<?php echo site_url('Hospital_Controller/addLeaves') ?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Leave</a>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table class="table table-striped custom-table mb-0 datatable">

                                <thead id='hideData'>

                                    <tr>

                                        <th>#</th>

                                        <th>Employee</th>

                                        <th>Leave Type</th>

                                        <th>From</th>

                                        <th>To</th>

                                        <th>No of Days</th>

                                        <th>Reason</th>

                                        <th>Status</th>

                                        <th class="text-right">Actions</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php $no = 0;

                                    if (count($leaves)) :

                                        foreach ($leaves as $x) : ?>

                                            <?php $no = $no + 1; ?>

                                            <tr style="margin-bottom: 5px;">

                                                <td><?php echo $no ?></td>

                                                <td data-th="Employee Name:"><?php echo $x['emp_name'] ?></td>

                                                <td data-th="Leave Type:"><?php echo $x['leave_type'] ?></td>

                                                <td data-th="From:"><?php echo $x['from_date'] ?></td>

                                                <td data-th="To:"><?php echo $x['to_date'] ?></td>

                                                <td data-th="No of Days:"><?php echo $x['no_days'] ?></td>

                                                <td data-th="Reason:"><?php echo $x['reason'] ?></td>

                                                <?php if ($x['stat']) : ?><td data-th="Status:"><span class="custom-badge status-green">Active</span></td>

                                                <?php else : ?><td data-th="Status:"><span class="custom-badge status-red">Inactive</span></td><?php endif; ?>

                                                <td data-th="Action:" class="text-right">

                                                    <div class="dropdown dropdown-action">

                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                                                        <div class="dropdown-menu dropdown-menu-right">

                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/editLeave/' . $x['id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/delLeave/' . $x['id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                        </div>

                                                    </div>

                                                    <div class="mob-action text-left">

                                                        <a class="" href="<?php echo site_url('hospital_controller/editLeave/' . $x['id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                        <a style="padding: 25px;" class="" href="<?php echo site_url('hospital_controller/delLeave/' . $x['id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                    </div>

                                                </td>

                                            </tr>

                                        <?php endforeach; ?>

                                    <?php else : ?>

                                        <?php echo "<span style='color:red'>No Leaves Add</span><script>document.getElementById('hideData').style.display='none'</script>" ?>

                                    <?php endif; ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    <?php elseif ($layout == 1) : ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Leave</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" action="<?php echo site_url('hospital_Controller/addLeavesdata') ?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Employee: <span class="text-danger">*</span></label>
                                        <select id="emp_id" name="emp_id" class="form-control">
                                            <option value="">Select a Employee</option>
                                            <?php foreach ($result as $x) : ?>
                                                <option value="<?php echo $x['emp_id'] ?>" <?php echo set_value('emp_id') == $x['emp_id'] ? "selected" : ""; ?>><?php echo $x['emp_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                        <span class="text-danger"><?php echo form_error('emp_id'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Leave Type</label>
                                        <select name="leave_type" class="form-control">
                                            <option>Casual Leave</option>
                                            <option>Medical Leave</option>
                                            <option>Loss of Pay</option>
                                            <option>Other</option>
                                        </select>

                                        <span class="text-danger"><?php echo form_error('leave_type'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>From: <span class="text-danger">*</span></label>
                                        <!-- <div class="cal-icon"> -->
                                        <input type="date" class="form-control" name="from_date" id="from_date" value="<?php echo set_value('from_date'); ?>">
                                        <span class="text-danger"><?php echo form_error('from_date'); ?></span>
                                        <!-- </div> -->

                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>To: <span class="text-danger">*</span></label>
                                        <!-- <div class="cal-icon"> -->
                                        <input type="date" class="form-control" name="to_date" id="to_date" value="<?php echo set_value('to_date'); ?>">
                                        <span class="text-danger"><?php echo form_error('to_date'); ?></span>
                                        <!-- </div> -->
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Number of Days:</label>
                                        <input class="form-control" type="text" id="no_days" name="no_days" value="<?php echo set_value('no_days'); ?>">
                                        <span class="text-danger"><?php echo form_error('no_days'); ?></span>
                                    </div>

                                </div>

                                <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Remaining Leaves:</label>
                                    <input class="form-control" readonly="" type="text" id="rem_leaves"
                                        name="rem_leaves"></!-- fatch and store to employee_details -->

                                <!-- </div>

                            </div> -->

                            </div>

                            <div>

                                <div class="form-group">
                                    <label>Leave Reason:<span class="text-danger">*</span></label>
                                    <textarea rows="4" cols="5" class="form-control" name="reason" id="reason"><?php echo set_value('no_days'); ?></textarea>
                                    <span class="text-danger"><?php echo form_error('reason'); ?></span>
                                </div>
                            </div>

                            <div class="m-t-20 text-center">

                                <button type="submit" id="submitbtn" name="submit" class="btn btn-primary submit-btn">Send
                                    Leave Request</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    <?php elseif ($layout == 2) : ?>

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <h4 class="page-title">Edit Leave</h4>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form method="post" action="<?php echo site_url('hospital_Controller/editLeave/' . $this->uri->segment(3)) ?>">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Employee Name</label>

                                        <input class="form-control" readonly="" type="text" name="emp_name" value="<?php echo $leaveData[0]['emp_name']; ?>">

                                        <span class="text-danger"><?php echo form_error('emp_name'); ?></span>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Employee id</label>

                                        <input class="form-control" readonly="" type="text" id="emp_id" name="emp_id" value="<?php echo $leaveData[0]['emp_id']; ?>">
                                        <span class="text-danger"><?php echo form_error('emp_id'); ?></span>


                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Leave Type</label>

                                        <select name="leave_type" class="form-control">

                                            <option value="<?php echo $leaveData[0]['leave_type']; ?>" selected>
                                                <?php echo $leaveData[0]['leave_type']; ?></option>

                                            <!-- <option>Casual Leave</option>-->
                                            <?php if ($leaveData[0]['leave_type'] == 'Medical Leave') {
                                            ?>


                                                <option>Casual Leave</option>

                                                <option>Loss of Pay</option>

                                                <option>Other</option>
                                            <?php   } ?>
                                            <?php if ($leaveData[0]['leave_type'] == 'Casual Leave') {
                                            ?>


                                                <option>Medical Leave</option>

                                                <option>Loss of Pay</option>

                                                <option>Other</option>
                                            <?php   } ?>

                                            <?php if ($leaveData[0]['leave_type'] == 'Loss of Pay') {
                                            ?>


                                                <option>Medical Leave</option>

                                                <option>Casual Leave</option>

                                                <option>Other</option>
                                            <?php   } ?>
                                            <?php if ($leaveData[0]['leave_type'] == 'Other') {
                                            ?>


                                                <option>Medical Leave</option>

                                                <option>Casual Leave</option>

                                                <option>Loss of Pay</option>
                                            <?php   } ?>

                                        </select>

                                    </div>

                                </div>

                                <input name="id" type="text" style="display: none;" value="<?php echo $leaveData[0]['id']; ?>">

                            </div>

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>From: <span class="text-danger">*</span></label>

                                        <!-- <div class="cal-icon"> -->

                                        <input type="date" class="form-control" name="from_date" value="<?php echo $leaveData[0]['from_date']; ?>" id="efrom_date">

                                        <span class="text-danger"><?php echo form_error('from_date'); ?></span>


                                        <!-- </div> -->

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>To: <span class="text-danger">*</span></label>

                                        <!-- <div class="cal-icon"> -->

                                        <input type="date" class="form-control" name="to_date" value="<?php echo $leaveData[0]['to_date']; ?>" id="eto_date">

                                        <span class="text-danger"><?php echo form_error('to_date'); ?></span>


                                        <!-- </div> -->

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Number of Days:</label>

                                        <input class="form-control" readonly="" type="text" id="eno_days" value="<?php echo $leaveData[0]['no_days']; ?>" name="no_days">

                                        <span class="text-danger"><?php echo form_error('no_days'); ?></span>


                                    </div>

                                </div>

                                <!-- <div class="col-sm-6">

                                <div class="form-group">

                                    <label>Remaining Leaves:</label>

                                    <input class="form-control" readonly="" value="" type="text" id="erem_leaves"
                                        name="rem_leaves">

                                </div>

                            </div> -->

                            </div>

                            <div>

                                <div class="form-group">

                                    <label>Leave Reason:<span class="text-danger">*</span></label>

                                    <textarea rows="4" cols="5" class="form-control" name="reason" id="reason"><?php echo $leaveData[0]['reason']; ?></textarea>

                                    <span class="text-danger"><?php echo form_error('reason'); ?></span>


                                </div>

                            </div>

                            <div class="m-t-20 text-center">

                                <button type="submit" id="submitbtn" name="submit" class="btn btn-primary submit-btn">Send
                                    Leave Request</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    <?php endif; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="<?php echo base_url('js/jquery.slimscroll.js') ?>"></script>

    <script src="<?php echo base_url('js/select2.min.js') ?>"></script>

    <script src="<?php echo base_url('js/moment.min.js') ?>"></script>

    <script src="<?php echo base_url('js/bootstrap-datetimepicker.min.js') ?>"></script>

    <script src="<?php echo base_url('js/app.js') ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <script>
        function parseDate(input) {

            var parts = input.match(/(\d+)/g);

            // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])

            return new Date(parts[0], parts[1] - 1, parts[2]); // months are 0-based

        }



        let workingDaysBetweenDates = (d0, d1) => {

            /* Two working days and an sunday (not working day) */

            var holidays = [];

            <?php foreach ($holiday as $x) { ?>

                holidays.push('<?php echo $x['holiday_date'] ?>')

            <?php } ?>

            // console.log(holidays);

            var startDate = parseDate(d0);

            var endDate = parseDate(d1);



            // Validate input

            if (endDate < startDate) {

                return 0;

            }



            // Calculate days between dates

            var millisecondsPerDay = 86400 * 1000; // Day in milliseconds

            startDate.setHours(0, 0, 0, 1); // Start just after midnight

            endDate.setHours(23, 59, 59, 999); // End just before midnight

            var diff = endDate - startDate; // Milliseconds between datetime objects    

            var days = Math.ceil(diff / millisecondsPerDay);



            // Subtract two weekend days for every week in between

            var weeks = Math.floor(days / 7);

            days -= weeks * 2;



            // Handle special cases

            var startDay = startDate.getDay();

            var endDay = endDate.getDay();



            // Remove weekend not previously removed.   

            if (startDay - endDay > 1) {

                days -= 2;

            }

            // Remove start day if span starts on Sunday but ends before Saturday

            if (startDay == 0 && endDay != 6) {

                days--;

            }

            // Remove end day if span ends on Saturday but starts after Sunday

            if (endDay == 6 && startDay != 0) {

                days--;

            }

            /* Here is the code */

            holidays.forEach(day => {

                if ((day >= d0) && (day <= d1)) {

                    /* If it is not saturday (6) or sunday (0), substract it */

                    if ((parseDate(day).getDay() % 6) != 0) {

                        days--;

                    }

                }

            });

            return days;

        }

        $(window).ready(function() {

            var no_days = 0;

            var rem_leaves = 0;

            $('#to_date, #from_date').change(function() {

                if ($('#from_date').val() != '' && $('#to_date').val() != '') {

                    // console.log($('#from_date').val());

                    // console.log($('#to_date').val());

                    var date2 = $('#to_date').val();

                    var date1 = $('#from_date').val();

                    // var Difference_In_Time = date2.getTime() - date1.getTime();

                    // var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

                    no_days = workingDaysBetweenDates(date1, date2);

                    $('#no_days').val(no_days);

                    //console.log(no_days);

                }

            });

            $('#emp_id').change(function() {

                var emp_id = $('#emp_id').val();

                // console.log(emp_id);

                var xhttp = new XMLHttpRequest();

                xhttp.onreadystatechange = function() {
                    // console.log('Thisresponse', this.response);

                    if (this.readyState == 4 && this.status == 200) {

                        rem_leaves = this.responseText;

                        console.log('5', rem_leaves);

                        $('#rem_leaves').val(rem_leaves);

                        if (rem_leaves < 0) {

                            $('#submitbtn').attr('disabled', 'disabled');

                        }

                    }

                };

                xhttp.open("GET", "<?php echo site_url() ?>/hospital_Controller/fetchEmpleves?q=" + emp_id,
                    true);

                xhttp.send();

            })

            $('#to_date').change(function() {

                var reml = rem_leaves - no_days;

                console.log('4', reml);

                $('#rem_leaves').val(reml);

                if (reml < 0) {

                    $('#submitbtn').attr('disabled', 'disabled');

                }

            })

        });
    </script>



    <script>
        function parseDate(input) {

            var parts = input.match(/(\d+)/g);

            // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])

            return new Date(parts[0], parts[1] - 1, parts[2]); // months are 0-based

        }



        let workingDaysBetweenDates2 = (d0, d1) => {

            /* Two working days and an sunday (not working day) */

            var holidays = [];

            <?php foreach ($holiday as $x) { ?>

                holidays.push('<?php echo $x['holiday_date'] ?>')

            <?php } ?>

            // console.log(holidays);

            var startDate = parseDate(d0);

            var endDate = parseDate(d1);



            // Validate input

            if (endDate < startDate) {

                return 0;

            }



            // Calculate days between dates

            var millisecondsPerDay = 86400 * 1000; // Day in milliseconds

            startDate.setHours(0, 0, 0, 1); // Start just after midnight

            endDate.setHours(23, 59, 59, 999); // End just before midnight

            var diff = endDate - startDate; // Milliseconds between datetime objects    

            var days = Math.ceil(diff / millisecondsPerDay);



            // Subtract two weekend days for every week in between

            var weeks = Math.floor(days / 7);

            days -= weeks * 2;



            // Handle special cases

            var startDay = startDate.getDay();

            var endDay = endDate.getDay();



            // Remove weekend not previously removed.   

            if (startDay - endDay > 1) {

                days -= 2;

            }

            // Remove start day if span starts on Sunday but ends before Saturday

            if (startDay == 0 && endDay != 6) {

                days--;

            }

            // Remove end day if span ends on Saturday but starts after Sunday

            if (endDay == 6 && startDay != 0) {

                days--;

            }

            /* Here is the code */

            holidays.forEach(day => {

                if ((day >= d0) && (day <= d1)) {

                    /* If it is not saturday (6) or sunday (0), substract it */

                    if ((parseDate(day).getDay() % 6) != 0) {

                        days--;

                    }

                }

            });

            return days;

        }

        $(window).ready(function() {

            var no_days = 0;

            var oldn_days = <?php echo $leaveData[0]['no_days'] ?>;

            //console.log(oldn_days);

            var rem_leaves = 0;

            var emp_id = $('#emp_id').val();

            console.log('3', emp_id);

            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {

                    rem_leaves = parseInt(this.responseText);

                    $('#erem_leaves').val(rem_leaves);

                    if (rem_leaves < 0) {

                        $('#submitbtn').attr('disabled', 'disabled');

                    }

                    rem_leaves = rem_leaves + parseInt(oldn_days);

                    console.log('2', rem_leaves);

                }

            };

            xhttp.open("GET", "<?php echo site_url() ?>/hospital_Controller/fetchEmpleves?q=" + emp_id, true);

            xhttp.send();





            $('#eto_date, #efrom_date').change(function() {

                if ($('#efrom_date').val() != '' && $('#eto_date').val() != '') {

                    // console.log($('#from_date').val());

                    // console.log($('#to_date').val());

                    var date2 = $('#eto_date').val();

                    var date1 = $('#efrom_date').val();

                    no_days = parseInt(workingDaysBetweenDates2(date1, date2));

                    $('#eno_days').val(no_days);

                    //console.log(no_days);

                }

            });

            $('#eto_date').change(function() {

                var reml = rem_leaves - no_days;

                console.log('1', reml)

                $('#erem_leaves').val(reml);

                if (reml < 0) {

                    $('#submitbtn').attr('disabled', 'disabled');

                }

            });

        })
    </script>

    <?php if (isset($_SESSION['success'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Leave Added Successfully',
                showConfirmButton: false,
                timer: 2000
            });
        </script>

        <?php unset($_SESSION['success']); ?>

    <?php endif; ?>

    <?php if (isset($_SESSION['edit'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Leave Updated Successfully',
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
                title: 'Leave Deleted',
                showConfirmButton: false,
                timer: 2000
            })
        </script>

        <?php unset($_SESSION['delete']); ?>

    <?php endif; ?>


</body>


<!-- <?php
        $test = '<script>
public myFunction(){
var e = document.getElementById("doc_degree");
var value = e.value;
}
</script>';

        echo $test;
        ?> -->

<!-- <?php
        $data = $_COOKIE['d_name'];
        echo $data;
        ?> -->

<!-- <?php
        if (isset($degree_name)) {
            echo $degree_name;
        }
        ?> -->

</html>