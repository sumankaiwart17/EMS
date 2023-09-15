<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <title>Diagnostic Services</title>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>

    <style>

        .mob-action {

            display: none;

        }

    </style>

</head>



<body>

    <!-- Navbar -->

    <?php include('navbar.php'); ?>

    <?php if ($layout == 0) : ?>

        <!-- View Diagnostic Services -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-sm-5 col-5"data-aos="fade-right">

                        <h4 class="page-title">Diagnostics</h4>
                        <input type="text" placeholder="search diagnostics" class="form-control mb-3" style="max-width: 250px;" id="search">
                    </div>
                   

                    <div class="col-sm-7 col-7 text-right m-b-30"data-aos="fade-left">

                        <a href="<?php echo site_url('hospital_Controller/add_Diagservice') ?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Diagnostic</a>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive"  data-aos='fade-up'>

                            <table class="table table-striped mb-0">

                                <thead id="hideData">

                                    <tr>

                                        <th>#</th>

                                        <th>Diagnostic ID</th>

                                        <th>Diagnostic Name</th>

                                        <th>Diagnostic Details</th>

                                        <th>Pre-Test Info</th>

                                        <th>Visit Type</th>

                                        <th>Service Timings</th>

                                        <th>Report Delivery</th>

                                        <th>Price</th>

                                        <th>Status</th>

                                        <th class="text-right">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php $no = 0;

									if(count($result)):

                                    foreach ($result as $x) : ?>

                                        <tr style="margin-bottom: 5px;">

                                            <td><?php $no = $no + 1;

                                                echo $no; ?></td>

                                            <td data-th="Diagnostic ID:"><?php echo $x['diag_id'] ?></td>

                                            <td data-th="Name:"><?php echo $x['p_name'] ?></td>

                                            <td data-th="Details:"><?php echo $x['p_details'] ?></td>

                                            <td data-th="Pre-Test Info:"><?php echo $x['pre_testinfo'] ?></td>

                                            <td data-th="Visit Type:"><?php echo $x['loc_type'] ?></td>

                                            <td data-th="Timing:"><?php echo $x['avail_hrs'] ?></td>

                                            <td data-th="Delivery:"><?php echo $x['report_delivary'] ?></td>

                                            <td data-th="Price:"><?php echo $x['price'] ?></td>

                                            <?php if ($x['stat']) : ?><td data-th="Status:"><span class="custom-badge status-green">Active</span></td>

                                            <?php else : ?><td data-th="Status:"><span class="custom-badge status-red">Inactive</span></td><?php endif; ?>

                                            <td data-th="Action:" class="text-right">

                                                <div class="dropdown dropdown-action">

                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                                                    <div class="dropdown-menu dropdown-menu-right">

                                                        <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/edit_Diagservice/' . $x['diag_id']) ?>"></i> Edit</a>

                                                        <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/del_Diagservice/' . $x['diag_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                    </div>

                                                </div>

                                                <div class="mob-action text-left">

                                                    <a class="" href="<?php echo site_url('hospital_Controller/edit_Diagservice/' . $x['diag_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                    <a style="padding: 27px;" class="" href="<?php echo site_url('hospital_Controller/del_Diagservice/' . $x['diag_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                </div>

                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                      				<?php else: ?>

                                     <?php echo"<span style='color:red'>No Diagnostics Services Added</span><script>document.getElementById('hideData').style.display='none'</script>"?>
                                        <?php endif; ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    <?php elseif ($layout == 1) : ?>

        <!-- Add Diagnostic Services -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2"data-aos="fade-right">

                        <h4 class="page-title">Add Diagnostic Service</h4>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form method="post" action="<?php echo site_url('hospital_Controller/add_Diagservice') ?>">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group"data-aos="fade-right">

                                        <label>Diagnostic ID: </label>

                                        <input class="form-control" readonly name="diag_id" value="<?php echo uniqid($hos_id); ?>" type="text">

                                        <input readonly name="hos_id" value="<?php echo $hos_id ?>" type="hidden">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group"data-aos="fade-left">

                                        <label>Diagnostic Package Name: <span class="text-danger">*</span></label>

                                        <input class="form-control" required name="p_name" id="p_name" type="text">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group"data-aos="fade-left">

                                        <label>Details: <span class="text-danger">*</span></label>

                                        <input class="form-control" type="text" required name="p_details" id="p_details">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group"data-aos="fade-left">

                                        <label>Visit Type</label>

                                        <select name="loc_type" class="form-control">

                                            <option>Clinic</option>

                                            <option>Home</option>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group"data-aos="fade-left">

                                        <label>Pre-Test Information: </label>

                                        <textarea name="pre_testinfo" class="form-control" value="" id="pre_testinfo" rows="2"></textarea>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group"data-aos="fade-right">

                                        <label>Service Time: <span class="text-danger">*</span><span class="text-info"><small>(Ex: mon-wed, 7pm-9pm)</small></span></label>

                                        <textarea required name="avail_hrs" class="form-control" value="" id="avail_hrs" rows="2"></textarea>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group"data-aos="fade-up">

                                        <label>Report Delivery: <span class="text-danger">*</span></label>

                                        <input class="form-control" type="text" required name="report_delivary" id="report_delivary">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group"data-aos="fade-up">

                                        <label>Price: <span class="text-danger">*</span></label>

                                        <input class="form-control" type="number" min="1" required name="price" id="price">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label class="display-block">Status</label>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="stat" id="employee_active" value="1" checked>

                                            <label class="form-check-label" for="employee_active">

                                                Active

                                            </label>

                                        </div>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="stat" id="employee_inactive" value="0">

                                            <label class="form-check-label" for="employee_inactive">

                                                Inactive

                                            </label>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="m-t-20 text-center">

                                <button type="submit" name="submit" class="btn btn-primary submit-btn">Add Diagnostic</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    <?php elseif ($layout == 2) : ?>

        <!-- Edit Diagnostic Services -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <h4 class="page-title">Edit Diagnostic Service</h4>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form method="post" action="<?php echo site_url('hospital_Controller/edit_Diagservice') ?>">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Diagnostic ID: </label>

                                        <input class="form-control" name="diag_id" value="<?php echo $data[0]['diag_id']; ?>" readonly type="text">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Diagnostic Package Name: <span class="text-danger">*</span></label>

                                        <input class="form-control" value="<?php echo $data[0]['p_name']; ?>" required name="p_name" id="p_name" type="text">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Details: <span class="text-danger">*</span></label>

                                        <input class="form-control" type="text" value="<?php echo $data[0]['p_details']; ?>" required name="p_details" id="p_details">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Visit Type</label>

                                        <select name="loc_type" class="form-control">

                                            <option <?php if ($data[0]['loc_type'] == "Clinic") {

                                                        echo "selected";

                                                    } ?>>Clinic</option>

                                            <option <?php if ($data[0]['loc_type'] == "Home") {

                                                        echo "selected";

                                                    } ?>>Home</option>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Pre-Test Information: </label>

                                        <textarea name="pre_testinfo" class="form-control" id="pre_testinfo" rows="2"><?php echo $data[0]['pre_testinfo']; ?></textarea>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Service Time: <span class="text-danger">*</span><span class="text-info"><small>(Ex: mon-wed, 7pm-9pm)</small></span></label>

                                        <textarea required name="avail_hrs" class="form-control" id="avail_hrs" rows="2"><?php echo $data[0]['avail_hrs']; ?></textarea>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Report Delivery: <span class="text-danger">*</span></label>

                                        <input class="form-control" type="text" value="<?php echo $data[0]['report_delivary']; ?>" required name="report_delivary" id="report_delivary">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Price: <span class="text-danger">*</span></label>

                                        <input class="form-control" type="number" value="<?php echo $data[0]['price']; ?>" min="1" required name="price" id="price">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label class="display-block">Status</label>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="stat" id="employee_active" value="1" <?php if ($data[0]['stat'] == 1) {

                                                                                                                                        echo "checked";

                                                                                                                                    } ?>>

                                            <label class="form-check-label" for="employee_active">

                                                Active

                                            </label>

                                        </div>

                                        <div class="form-check form-check-inline">

                                            <input class="form-check-input" type="radio" name="stat" id="employee_inactive" value="0" <?php if ($data[0]['stat'] == 0) {

                                                                                                                                            echo "checked";

                                                                                                                                        } ?>>

                                            <label class="form-check-label" for="employee_inactive">

                                                Inactive

                                            </label>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="m-t-20 text-center">

                                <button type="submit" name="submit" class="btn btn-primary submit-btn">Save Diagnostic</button>

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

        $("#price").change(function() {

            if ($("#price").val() < 1) {

                $("#price").val("1");

            }

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