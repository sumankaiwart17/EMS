<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">


    <title>Departments</title>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
    .mob-action {

        display: none;

    }

    .swal2-popup {
        width: 22rem !important;
    }

    @media only screen and (max-width: 991.98px) {

        .table-responsive td {

            text-indent: 50% !important;

        }



        .table-responsive td:nth-child(1) {

            text-align: left !important;

        }


    }
    </style>

</head>



<body>

    <!-- Navbar -->

    <?php include('navbar.php'); ?>

    <?php if ($layout == 0) : ?>

    <!-- View Dapartments -->

    <div class="page-wrapper">

        <div class="content">

            <div class="row">

                <div class="col-sm-5 col-5" data-aos="fade-right">

                    <h4 class="page-title">Departments</h4>

                </div>

                <div class="col-sm-7 col-7 text-right m-b-30" data-aos="fade-left">

                    <a href="<?php echo site_url('hospital/add-department') ?>" class="btn btn-primary btn-rounded"><i
                            class="fa fa-plus"></i> Add Department</a>

                </div>

            </div>

            <input type="text" placeholder="search department" id="search" class="form-control mb-4" style="width:300px">
            <div class="row">

                <div class="col-md-12" data-aos="fade-up">

                    <div class="table-responsive">

                        <table class="table table-striped mb-0">

                            <thead id="hideData">

                                <tr>

                                    <th>#</th>

                                    <th>Department Name</th>

                                    <th>Department Timing</th>

                                    <th>Total Beds</th>

                                    <th>Available Beds</th>

                                    <th>Status</th>

                                    <th>Average Rating</th>

                                    <th class="text-right">Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php $x = 0; ?>


                                <?php if(!$depts==''):?>

                                <?php foreach ($depts as $y) : ?>

                                <?php $x = $x + 1; ?>

                                <tr style="margin-bottom: 5px;">

                                    <td><?php echo $x ?></td>

                                    <td data-th="Department Name:"><a data-toggle="modal"
                                            data-target="#exampleModalCenter<?php echo $y['dept_id'] ?>"
                                            href=""><?php echo $y['dept_name'] ?></a></td>

                                    <td data-th="Timing:">
                                        <?php echo date("g:i A", strtotime($y['open_at'])) . '-' . date("g:i A", strtotime($y['close_at'])) ?>
                                    </td>

                                    <td data-th="Total Beds:"><?php echo $y['total_beds'] ?></td>

                                    <td data-th="Available Beds:"><?php echo $y['available_beds'] ?></td>

                                    <?php if ($y['status']) : ?><td data-th="Status: "><span
                                            class="custom-badge status-green">Active</span></td>

                                    <?php else : ?><td data-th="Status: "><span
                                            class="custom-badge status-red">Inactive</span></td><?php endif; ?>

                                    <td data-th="Average Rating: "><?php if ($y['avr'] > 0) : ?>

                                        <?php echo round($y['avr'], 1) . '/5' ?>&nbsp;

                                        <?php for ($i = 0; $i < round($y['avr']) - 1; $i++) : ?>

                                        <i class="fas fa-star text-warning"></i>

                                        <?php endfor; ?>

                                        <?php else : ?>

                                        <?php echo "No reviews" ?>

                                        <?php endif; ?>

                                    </td>

                                    <td data-th="Action:" class="text-right">

                                        <div class="dropdown dropdown-action">

                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu dropdown-menu-right">

                                                <a class="dropdown-item"
                                                    href="<?php echo site_url('hospital_Controller/editDept/' . $y['dept_id']) ?>"><i
                                                        class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                <a class="dropdown-item"
                                                    href="<?php echo site_url('hospital_Controller/delDept/' . $y['dept_id']) ?>"
                                                    onclick="return confirm('Are you sure, you want to delete it?')"><i
                                                        class="fas fa-trash m-r-5"></i> Delete</a>

                                            </div>

                                        </div>

                                        <div class="mob-action text-left">

                                            <a class=""
                                                href="<?php echo site_url('hospital_controller/editDept/' . $y['dept_id']) ?>"><i
                                                    class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                            <a style="padding: 20px;" class=""
                                                href="<?php echo site_url('hospital_controller/delDept/' . $y['dept_id']) ?>"
                                                onclick="return confirm('Are you sure, you want to delete it?')"><i
                                                    class="fas fa-trash m-r-5"></i> Delete</a>

                                        </div>

                                    </td>

                                </tr>

                                <?php endforeach; ?>

                                <?php else:?>
                                    <?php echo"<span style='color:red'>No Departments Added</span><script>document.getElementById('hideData').style.display='none'</script>";?>
                                <?php endif;?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Department Modal -->

    <?php foreach ($depts as $x) : ?>

    <div class="modal fade" id="exampleModalCenter<?php echo $x['dept_id'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content" style="width:800px;">



                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                    <div class="conatainer-fluid">

                        <div class="row">

                            <div class="col-12 col-sm-9">

                                <h2 class="text-weight-bold text-info"><?php echo $x['dept_name'] ?> Department</h2>

                                <div class="mt-2">

                                    <strong><?php echo round($x['avr'], 1) . ' out of 5' ?></strong><br>

                                    <?php for ($i = 0; $i < $x['avr']; $i++) : ?>

                                    <i class="fas fa-star text-warning"></i>

                                    <?php endfor; ?>

                                </div>

                            </div>

                        </div>

                        <div class="row mt-4 ml-1">

                            <div class="col-6 col-sm-6">

                                <div class="row">

                                    <div class="col-12 col-sm-12">

                                        <h4 class="text-info" style="border-bottom: 2px solid #17a2b8!important">
                                            Description</h4>

                                        <p><?php echo $x['dept_description'] ?></p>

                                    </div>

                                    <div class="col-12 col-sm-12">

                                        <h4 class="text-info" style="border-bottom: 2px solid #17a2b8!important">
                                            Facilities</h4>

                                        <p><?php echo $x['facilities'] ?></p>

                                    </div>

                                    <div class="col-12 col-sm-12">

                                        <h4 class="text-info" style="border-bottom: 2px solid #17a2b8!important">
                                            Services & AddOns'</h4>

                                        <p><?php echo  $x['services'] ?><br><?php echo $x['addon_services'] ?></p>

                                    </div>

                                </div>

                            </div>

                            <div class="col-6 col-sm-6">

                                <div class="row">

                                    <div class="col-12 col-sm-12">

                                        <h4 class="text-info" style="border-bottom: 2px solid #17a2b8!important">Timings
                                        </h4>

                                        <p>Opening Time:
                                            <strong><?php echo  date("g:i A", strtotime($x['open_at'])) ?></strong>
                                        </p>

                                        <p>Closing Time:
                                            <strong><?php echo date("g:i A", strtotime($x['close_at'])) ?></strong>
                                        </p>

                                    </div>

                                    <div class="col-12 col-sm-12">

                                        <h4 class="text-info" style="border-bottom: 2px solid #17a2b8!important">Other
                                            Informations</h4>

                                        <p>Block No: <strong><?php echo $x['block_no'] ?></strong></p>

                                        <p>Floor No: <strong><?php echo $x['floor_no'] ?></strong></p>

                                        <p>Status: &nbsp;<?php if ($x['status']) : ?><span
                                                class="custom-badge status-green">Active</span>

                                            <?php else : ?><span
                                                class="custom-badge status-red">Inactive</span><?php endif; ?></p>

                                        <?php if ($x['spoc']) : ?>

                                        <p>SPOC Name: <strong><?php echo $x['spoc'] ?></strong></p>

                                        <p>SPOC Contact No: <a href="tel:<?php echo $x['spoc_no'] ?>">
                                                <strong><?php echo $x['spoc_no'] ?></strong></p></a>

                                        <p>SPOC Email ID: <a href="mailto:<?php echo $x['spoc_email'] ?>">
                                                <strong><?php echo $x['spoc_email'] ?></strong></p></a>

                                        <?php endif; ?>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <?php endforeach; ?>

    <?php elseif ($layout == 1) : ?>

    <!-- Add Department -->

    <div class="page-wrapper">

        <div class="content">
            
            <div class="row">

                <div class="col-lg-8 offset-lg-2" data-aos="fade-right">

                    <h4 class="page-title">Add Department</h4>

                </div>

            </div>
 
            <div class="row">

                <div class="col-lg-8 offset-lg-2">

                    <form action="<?php echo site_url('hospital_Controller/addDept') ?>" method="post">

                        <div class="form-group" data-aos="fade-up">
 
                            <label>Department Name:</label>

                            <select id="deptName" name="deptName" class="form-control">

                                <?php foreach ($depts as $x) : ?>

                                <option value="<?php echo $x['dept_id'] ?>"><?php echo $x['dept_name'] ?></option>

                                <?php endforeach; ?>

                                <option id='other' value="other">add New-Dept</option>

                            </select>


                            <script>const check=document.getElementById('other').value;
                            if(check==''){
                             document.getElementById('CheckData').style.display='none'

                            }

                        
                        </script>

                            <div data-parent="other" id='CheckData'style=" margin-top: 10px;">

                                <label>Specify the name:</label>

                                <input type="text" name="newDeptName" id="newDeptName" class="form-control">
                                       <?php echo form_error('newDeptName'); ?>
                                <br>

                                <label>Description:</label>

                                <input type="text" name="description" id="description" class="form-control">

                            </div>

                        </div>

                        <div class="form-group row" data-aos="fade-left">

                            <div class="col-6">

                                <label>Opening Time:</label>

                                <input type="time" name="openAt" id="openAt" class="form-control">

                            </div>

                            <div class="col-6">

                                <label>Closing Time:</label>

                                <input type="time" name="closeAt" id="closeAt" class="form-control">

                            </div>

                        </div>

                        <div class="form-group row" data-aos="fade-right">

                            <div class="col-6">

                                <label>Block No:</label>

                                <input type="text" name="block" id="block" class="form-control">

                            </div>

                            <div class="col-6">

                                <label>Floor No:</label>

                                <input type="text" name="floor" id="floor" class="form-control">

                            </div>

                        </div>

                        <div class="form-group row" data-aos="fade-left">

                            <div class="col-6">

                                <label>Total No. of beds:</label>

                                <input type="number" name="total_beds" min="1" id="total_beds" class="form-control">

                            </div>

                            <div class="col-6">

                                <label>Available No. of beds:</label>

                                <input type="number" name="available_beds" min="1" id="available_beds"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="form-group" data-aos="fade-right">

                            <label>Facilities:</label>

                            <textarea cols="30" rows="2" name="facilities" class="form-control"></textarea>

                        </div>

                        <div class="form-group" data-aos="fade-left">

                            <label>Services:</label>

                            <textarea cols="30" rows="2" name="services" class="form-control"></textarea>

                        </div>

                        <div class="form-group" data-aos="fade-right">

                            <label>AddOn Services:</label>

                            <textarea cols="30" rows="2" name="addOns" class="form-control"></textarea>

                        </div>

                        <div class="form-group" data-aos="fade-right">

                            <input type="checkbox" id="spocCheck" name="spocCheck">

                            <label>SPOC Available?</label>

                            <div id="spocDet" style="display: none; margin-top: 20px;">

                                <label>SPOC Name:</label>

                                <input type="text" name="spoc" id="spoc" class="form-control">

                                <br>

                                <label>SPOC Contact No:</label>

                                <input type="text" name="spocNo" id="spocNo" class="form-control">

                                <br>

                                <label>SPOC Email ID:</label>

                                <input type="email" name="spocEmail" id="spocEmail" class="form-control">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="display-block">Department Status:</label>

                            <div class="form-check form-check-inline">

                                <input class="form-check-input" type="radio" name="status" id="product_active" value="1"
                                    checked>

                                <label class="form-check-label" for="product_active">

                                    Active

                                </label>

                            </div>

                            <div class="form-check form-check-inline">

                                <input class="form-check-input" type="radio" name="status" id="product_inactive"
                                    value="0">

                                <label class="form-check-label" for="product_inactive">

                                    Inactive

                                </label>

                            </div>

                        </div>

                        <div class="m-t-20 text-center">

                            <button class="btn btn-primary submit-btn">Add Department</button>

                        </div>

                    </form>

                </div>

            </div>
            <?php ?>
            <!-- <script>
            clicked();

            function clicked() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Already Added',
                    showConfirmButton: false,
                    timer: 1300
                });

            };
            window.setTimeout(function() {
                window.location = 'departments';

            }, 2000);
            </script> -->
            <?php 
			 
		 ?>
        </div>

    </div>

    <?php elseif ($layout == 2) : ?>

    <!-- Edit Department -->

    <div class="page-wrapper">

        <div class="content">

            <div class="row">

                <div class="col-lg-8 offset-lg-2">

                    <h4 class="page-title">Edit Department</h4>

                </div>

            </div>

            <div class="row">

                <div class="col-lg-8 offset-lg-2">

                    <form action="<?php echo site_url('hospital_Controller/editDept') ?>" method="post">

                        <div class="form-group">

                            <label>Department ID</label>

                            <input class="form-control" type="text" name="deptID" readonly
                                value="<?php echo $dept['dept_id'] ?>">

                        </div>

                        <div class="form-group">

                            <label>Department Name</label>

                            <input class="form-control" type="text" name="deptname" readonly
                                value="<?php echo $dept['dept_name'] ?>">

                        </div>

                        <div class="form-group row">

                            <div class="col-6">

                                <label>Opening Time:</label>

                                <input type="time" name="openAt" id="openAt" class="form-control"
                                    value="<?php echo $hosDept['open_at'] ?>">

                            </div>

                            <div class="col-6">

                                <label>Closing Time:</label>

                                <input type="time" name="closeAt" id="closeAt" class="form-control"
                                    value="<?php echo $hosDept['close_at'] ?>">

                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-6">

                                <label>Block No:</label>

                                <input type="text" name="block" id="block" class="form-control"
                                    value="<?php echo $hosDept['block_no'] ?>">

                            </div>

                            <div class="col-6">

                                <label>Floor No:</label>

                                <input type="text" name="floor" id="floor" class="form-control"
                                    value="<?php echo $hosDept['floor_no'] ?>">

                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-6">

                                <label>Total No. of beds:</label>

                                <input type="number" name="total_beds" min="1" id="total_beds" class="form-control"
                                    value="<?php echo $hosDept['total_beds'] ?>">

                            </div>

                            <div class="col-6">

                                <label>Available No. of beds:</label>

                                <input type="number" name="available_beds" min="1" id="available_beds"
                                    class="form-control" value="<?php echo $hosDept['available_beds'] ?>">

                            </div>

                        </div>

                        <div class="form-group">

                            <label>Facilities:</label>

                            <textarea cols="30" rows="4" name="facilities"
                                class="form-control"><?php echo $hosDept['facilities'] ?></textarea>

                        </div>

                        <div class="form-group">

                            <label>Services:</label>

                            <textarea cols="30" rows="2" name="services"
                                class="form-control"><?php echo $hosDept['services'] ?></textarea>

                        </div>

                        <div class="form-group">

                            <label>AddOn Services:</label>

                            <textarea cols="30" rows="2" name="addOns"
                                class="form-control"><?php echo $hosDept['addon_services'] ?></textarea>

                        </div>

                        <?php if (!$hosDept['spoc']) : ?>

                        <div class="form-group">

                            <input type="checkbox" id="spocCheck" name="spocCheck">

                            <label>SPOC Available?</label>

                            <div id="spocDet" style="display: none; margin-top: 20px;">

                                <label>SPOC Name:</label>

                                <input type="text" name="spoc" id="spoc" class="form-control" value="">

                                <br>

                                <label>SPOC Contact No:</label>

                                <input type="text" name="spocNo" id="spocNo" class="form-control" value="">

                                <br>

                                <label>SPOC Email ID:</label>

                                <input type="email" name="spocEmail" id="spocEmail" class="form-control" value="">

                            </div>

                        </div>

                        <?php else : ?>

                        <div class="form-group">



                            <label>SPOC Name:</label>

                            <input type="text" name="spoc" id="spoc" class="form-control"
                                value="<?php echo $hosDept['spoc'] ?>">

                            <br>

                            <label>SPOC Contact No:</label>

                            <input type="text" name="spocNo" id="spocNo" class="form-control"
                                value="<?php echo $hosDept['spoc_no'] ?>">

                            <br>

                            <label>SPOC Email ID:</label>

                            <input type="email" name="spocEmail" id="spocEmail" class="form-control"
                                value="<?php echo $hosDept['spoc_email'] ?>">



                        </div>

                        <?php endif; ?>

                        <div class="form-group">

                            <label class="display-block">Department Status</label>

                            <div class="form-check form-check-inline">

                                <input class="form-check-input" type="radio" name="status" id="product_active" value="1"
                                    <?php if ($hosDept['status'] == 1) : ?> checked <?php endif; ?>>

                                <label class="form-check-label" for="product_active">

                                    Active

                                </label>

                            </div>

                            <div class="form-check form-check-inline">

                                <input class="form-check-input" type="radio" name="status" id="product_inactive"
                                    value="0" <?php if ($hosDept['status'] == 0) : ?> checked <?php endif; ?>>

                                <label class="form-check-label" for="product_inactive">

                                    Inactive

                                </label>

                            </div>

                        </div>

                        <div class="m-t-20 text-center">

                            <button class="btn btn-primary submit-btn">Save Department</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
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

    <script>
    $(function() {

        $("select").on("change", function() {

            if ($(this).val() === "other") {

                $("div[data-parent='" + $(this).val() + "']").show().siblings("[data-parent]").hide();



            } else {

                $("[data-parent]").hide();

            }

        });

    });

    $(document).ready(function() {

        $('#spocCheck').click(function() {

            if (this.checked)

                $('#spocDet').show();

            else

                $('#spocDet').hide();

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