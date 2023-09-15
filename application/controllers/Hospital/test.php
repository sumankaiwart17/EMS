<?php

// echo "<pre>";
// print_r($tests);
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <title>Test</title>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

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



        a:link {

            color: blue;

            background-color: transparent;

            text-decoration: none;

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

    <?php if ($layout == 0) : ?>

        <!-- View Offers -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-sm-4 col-3" data-aos="fade-right">

                        <h4 class="page-title">Our Tests</h4>

                    </div>

                    <div class="col-sm-8 col-9 text-right m-b-20" data-aos="fade-left">

                        <a href="<?php echo site_url('hospital_Controller/addTest') ?>" class="btn btn-primary btn-rounded float-right" style="background:#009efb; color:#fff;"><i class="fa fa-plus"></i> Add Test</a>

                    </div>

                </div>

                <div class="row filter-row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group select-focus">
                            <input type="text" id="search" class="form-control" placeholder="Search Test">
                        </div>
                    </div>
                </div>

                <div class="row doc">
                    <div class="col-md-12">
                        <div class="table-responsive" data-aos="fade-up">
                            <table class="table table-striped custom-table">
                                <thead id="hideData">
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Test</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n = 0 ?>
                                    <?php if (!isset($error) && isset($tests)) :  ?>

                                        <?php foreach ($tests as $x) : ?>

                                            <tr style="margin-bottom: 5px;">

                                                <td><?php echo $n = $n + 1 ?></td>

                                                <td data-th="Code:"><?php echo $x['test_code'] ?></td>

                                                <td data-th="Test:"><?php echo $x['test_name'] ?></td>

                                                <td data-th="Price:"><?php echo $x['test_price'] ?></td>

                                                <td data-th="Action:" class="">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/editTest/' . $x['id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/delTest/' . $x['id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>
                                                        </div>
                                                    </div>

                                                    <div class="mob-action text-left">
                                                        <a class="" href="<?php echo site_url('hospital_Controller/editTest/' . $x['id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                        <a style="padding: 27px;" class="" href="<?php echo site_url('hospital_Controller/delTest/' . $x['id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php endforeach; ?>

                                    <?php else : ?>

                                        <?php echo "<span style='color:red'>No tests Added</span><script>document.getElementById('hideData').style.display='none'</script>" ?>

                                    <?php endif; ?>
                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>


            </div>

        </div>

    <?php elseif ($layout == 1) : ?>

        <!-- Add Offers -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2 pt-5">

                        <h4 class="page-title">Add Test</h4>

                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2 pt-3">
                        <form method="post" action="<?php echo site_url('hospital_Controller/addTest/') ?>">
                            <div class="row">

                                <div class="col-sm-6 pt-2 adoc">
                                    <div class="form-group">
                                        <label>Test Code: <span class="text-danger">*</span></label>
                                        <input class="form-control" name="test_code" style="text-transform: uppercase;" id="test_code" type="text" value="<?php echo uniqid('TEST'); ?>" readonly>
                                        <span class="text-danger"><?php echo form_error('test_code'); ?></span>
                                    </div>

                                </div>

                                <div class="col-sm-6 pt-2 adoc">
                                    <div class="form-group">
                                        <label>Test Name: <span class="text-danger">*</span></label>
                                        <input class="form-control" name="test_name" style="text-transform: uppercase;" id="test_name" type="text" value="<?php echo set_value('test_name'); ?>">
                                        <span class="text-danger"><?php echo form_error('test_name'); ?></span>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6 pt-2">

                                    <div class="form-group">
                                        <label>Price: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" min="1" name="test_price" value="<?php echo set_value('test_price'); ?>">
                                        <span class="text-danger"><?php echo form_error('test_price'); ?></span>
                                    </div>

                                </div>


                            </div>


                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary submit-btn">Add Test</button>
                            </div>

                    </div>


                    </form>
                </div>
            </div>
        </div>


    <?php elseif ($layout == 2) : ?>
        <!-- Edit Offers on Doctor -->
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 pt-5">
                        <h4 class="page-title">Edit Test</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 pt-3">
                        <form method="post" action="<?php echo site_url('hospital_Controller/editTest/' . $this->uri->segment(3)) ?>">
                            <div class="row">

                                <div class="col-sm-6 pt-2 adoc">
                                    <div class="form-group">
                                        <label>Test Code: <span class="text-danger">*</span></label>
                                        <input class="form-control" name="test_code" style="text-transform: uppercase;" id="test_code" type="text" value="<?php echo $test[0]['test_code']; ?>" readonly>
                                        <span class="text-danger"><?php echo form_error('test_code'); ?></span>
                                    </div>

                                </div>

                                <div class="col-sm-6 pt-2 adoc">
                                    <div class="form-group">
                                        <label>Test Name: <span class="text-danger">*</span></label>
                                        <input class="form-control" name="test_name" style="text-transform: uppercase;" id="test_name" type="text" value="<?php echo $test[0]['test_name']; ?>">
                                        <span class="text-danger"><?php echo form_error('test_name'); ?></span>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6 pt-2">

                                    <div class="form-group">
                                        <label>Price: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" min="1" name="test_price" value="<?php echo $test[0]['test_price']; ?>">
                                        <span class="text-danger"><?php echo form_error('test_price'); ?></span>
                                    </div>

                                </div>


                            </div>


                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary submit-btn">Edit Test</button>
                            </div>

                    </div>


                    </form>
                </div>

            </div>
        </div>

    <?php endif; ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('js/jquery.slimscroll.js') ?>"></script>
    <script src="<?php echo base_url('js/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('js/bootstrap-datetimepicker.min.js') ?>"></script>
    <script src="<?php echo base_url('js/app.js') ?>"></script>

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
                title: 'Test Added Successfully',
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
                title: 'Test Updated Successfully',
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
                title: 'Test Deleted',
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
</body>

</html>