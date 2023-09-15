<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/bootstrap-datetimepicker.min.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <title>Employees</title>
    
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>

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



        .time-icon {

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

        <!-- View employees -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-sm-5 col-5" data-aos="fade-right">

                        <h4 class="page-title">Employees</h4>

                    </div>

                    <div class="col-sm-7 col-7 text-right m-b-30" data-aos="fade-left">

                        <a href="<?php echo site_url('Hospital_Controller/addEmp') ?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Employees</a>

                    </div>

                </div>

                <!-- Search -->

                <div class="row filter-row">

                    <div class="col-sm-6 col-md-4">

                        <div class="form-group">

                            <!-- <label class="focus-label">Employee ID</label> -->

                            <input id="emp_src" type="text" class="form-control floating" placeholder="Search">

                        </div>

                    </div>

                    <div class="col-sm-6 col-md-4">

                        <div class="form-group select-focus">

                            <!-- <label class="focus-label">Role</label> -->

                            <select id="emp_role" class="select floating form-control">

                                <option selected disabled>Select Role</option>

                                <option>Nurse</option>

                                <option>Pharmacist</option>

                                <option>Laboratorist</option>

                                <option>Accountant</option>

                                <option>Receptionist</option>

                            </select>

                        </div>

                    </div>

                </div>

                <!-- Search end -->

                <div id="res_emp_role">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="table-responsive" data-aos="fade-up">

                                <table class="table table-striped mb-0">

                                    <thead id="hideData">

                                        <tr>

                                            <th>#</th>

                                            <th>Name</th>

                                            <th>Employee ID</th>

                                            <th>Email</th>

                                            <th>Mobile</th>

                                            <th>Join Date</th>

                                            <th>Role</th>

                                            <th>Status</th>

                                            <th class="text-center">Action</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php $x = 0; ?>

                                        <?php if(count($result)) : ?>

                                           <?php foreach ($result as $emp) : ?>

                                            <?php $x = $x + 1; ?>

                                            <tr style="margin-bottom: 5px;">

                                                <td><?php echo $x ?></td>

                                                <td data-th="Name:"><?= $emp['emp_name'] ?></td>

                                                <td data-th="Employee ID:"><?= $emp['emp_id'] ?></td>

                                                <td data-th="Email:"><?= $emp['email'] ?></td>

                                                <td data-th="Mobile:"><?= $emp['mobile'] ?></td>

                                                <td data-th="Join Date:"><?= $emp['join_date']; ?></td>

                                                <td data-th="Role:"><?= $emp['role']; ?></td>

                                                <?php if ($emp['stat']) : ?><td data-th="Status:"><span class="custom-badge status-green">Active</span></td>

                                                <?php else : ?><td data-th="Status:"><span class="custom-badge status-red">Inactive</span></td><?php endif; ?>

                                                <td data-th="Action:" class="text-right">

                                                    <div class="dropdown dropdown-action">

                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                                                        <div class="dropdown-menu dropdown-menu-right">

                                                            <a class="dropdown-item" href="<?php echo site_url('Hospital_Controller/editEmp/' . $emp['emp_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/delEmp/' .  $emp['emp_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                        </div>

                                                    </div>

                                                    <div class="mob-action text-left">

                                                        <a class="" href="<?php echo site_url('Hospital_Controller/editEmp/' . $emp['emp_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                        <a style="padding: 25px;" class="" href="<?php echo site_url('hospital_controller/delEmp/' .  $emp['emp_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                    </div>

                                                </td>

                                            </tr>

                                        <?php endforeach; ?>

                                    <?php else: ?>

                                         <?php
                                            echo"<span style='color:red'>No Employee's Adds </span><script>document.getElementById('hideData').style.display='none'</script>"
                                            ?>

                                        <?php endif; ?>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div id="delete_appointment" class="modal fade delete-modal" role="dialog">

                <div class="modal-dialog modal-dialog-centered">

                    <div class="modal-content">

                        <div class="modal-body text-center">

                            <img src="assets/img/sent.png" alt="" width="50" height="46">

                            <h3>Are you sure want to delete this Employee?</h3>

                            <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>

                                <button type="submit" class="btn btn-danger">Delete</button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    <?php elseif ($layout == 1) : ?>

        <!-- Add employees -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <h4 class="page-title">Add Employee</h4>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form method="post" action="<?php echo site_url('hospital_Controller/addEmpp') ?>">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Full Name: <span class="text-danger">*</span></label>

                                        <input class="form-control" required name="emp_name" id="emp_name" type="text">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Email ID: <span class="text-danger">*</span></label>

                                        <input class="form-control" required type="email" name="email" id="email">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Employee ID: </label>

                                        <input class="form-control" readonly name="emp_id" value="<?php echo uniqid($hos_id); ?>" type="text">

                                        <input readonly name="hos_id" value="<?php echo $hos_id ?>" type="hidden">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Join Date: <span class="text-danger">*</span></label>

                                        <div class="cal-icon">

                                            <input type="date" required class="form-control datetimepicker" name="join_date" id="join_date">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Phone No.: <span class="text-danger">*</span></label>

                                        <input class="form-control" required type="text" name="phone" id="phone">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Role</label>

                                        <select name="role" class="form-control">

                                            <option>Admin</option>

                                            <option >Doctor</option>

                                            <option>Nurse</option>

                                            <option>Laboratorist</option>

                                            <option>Pharmacist</option>

                                            <option>Accountant</option>

                                            <option>Receptionist</option>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label class="display-block">Status</label>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="status" id="employee_active" value="1" checked>

                                            <label class="form-check-label" for="employee_active">

                                                Active

                                            </label>

                                        </div>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="status" id="employee_inactive" value="0">

                                            <label class="form-check-label" for="employee_inactive">

                                                Inactive

                                            </label>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="m-t-20 text-center">

                                <button type="submit" name="submit" class="btn btn-primary submit-btn">Add Employee</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    <?php elseif ($layout == 2) : ?>

        <!-- Edit Employees -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-sm-4">

                        <h4 class="page-title">Edit Employee</h4>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form method="POST" action="<?php echo site_url('hospital_Controller/editEmp'); ?>">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Employee ID</label>

                                        <input class="form-control" type="text" name="emp_id" value="<?php echo $empData[0]['emp_id']; ?>" readonly>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Employee Name</label>

                                        <input class="form-control" type="text" required name="emp_name" value="<?php echo $empData[0]['emp_name']; ?>">

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Email ID</label>

                                        <input class="form-control" type="email" required name="email" value="<?php echo $empData[0]['email']; ?>">

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Phone Number</label>

                                        <input class="form-control" type="text" required name="mobile" value="<?php echo $empData[0]['mobile']; ?>">

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Join Date</label>

                                        <div class="cal-icon">

                                            <input type="text" required class="form-control datetimepicker" name="join_date" value="<?php echo $empData[0]['join_date']; ?>">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Role</label>

                                        <select name="role" class="form-control">

                                            <option>Admin</option>

                                            <option >Doctor</option>

                                            <option>Nurse</option>

                                            <option>Laboratorist</option>

                                            <option>Pharmacist</option>

                                            <option>Accountant</option>

                                            <option>Receptionist</option>

                                        </select>

                                    </div>

                                </div>

                            </div>

                            <div class=" form-group">

                                <label class="display-block">Status</label>

                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="stat" id="product_active" value="1" checked>

                                    <label class="form-check-label" for="product_active">

                                        Active

                                    </label>

                                </div>

                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="stat" id="product_inactive" value="0">

                                    <label class="form-check-label" for="product_inactive">

                                        Inactive

                                    </label>

                                </div>

                            </div>

                            <div class="m-t-20 text-center">

                                <button class="btn btn-primary submit-btn" type="submit">Save Employee</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    <?php endif; ?>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="<?php echo base_url('js/jquery.slimscroll.js') ?>"></script>

    <script src="<?php echo base_url('js/moment.min.js') ?>"></script>

    <script src="<?php echo base_url('js/bootstrap-datetimepicker.min.js') ?>"></script>

    <!-- <script src="<?php echo base_url('js/app.js') ?>"></script> -->



    <script>

        $('#emp_role').change(function() {

            var emp_role = $('#emp_role').val();

            var hos_id = "<?php echo $_SESSION['email_id']; ?>";

            var emp_id = $('#emp_id').val();

            var emp_name = $('#emp_name').val();

            $.ajax({

                type: 'POST',

                url: "<?php echo site_url('hospital_Controller/fetchByEmpRole') ?>",

                data: {

                    'hos_id': hos_id,

                    'emp_role': emp_role,

                    'emp_id': emp_id,

                    'emp_name': emp_name

                },

                success: function(data) {

                    console.log(data);

                    $('#res_emp_role').html(data);

                }

            })

            // console.log(hos_id);

            // console.log(emp_role);

        })

    </script>

    <script>

        // search

        $(document).ready(function() {

            $("#emp_src").on("keyup", function() {

                var value = $(this).val().toLowerCase();

                $(".table tbody tr").filter(function() {

                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

                });

            });

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