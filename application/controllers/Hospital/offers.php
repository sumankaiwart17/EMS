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

    <title>Offers</title>

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

                        <h4 class="page-title">Our Offers</h4>

                    </div>

                    <div class="col-sm-8 col-9 text-right m-b-20" data-aos="fade-left">

                        <a href="<?php echo site_url('hospital_Controller/addOffer') ?>" class="btn btn-primary btn-rounded float-right" style="background:#009efb; color:#fff;"><i class="fa fa-plus"></i> Add Offer</a>

                    </div>

                </div>

                <div class="row filter-row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group select-focus">
                            <input type="text" id="search" class="form-control" placeholder="Search Offers">
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
                                        <th>Coupon Title</th>

                                        <th>Coupon Code</th>

                                        <th>Doctor Name</th>

                                        <th>Discount %</th>
                                        <th style="min-width: 110px;">Validity</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n = 0 ?>
                                    <?php if (!isset($error) && isset($offers)) :  ?>

                                        <?php foreach ($offers as $x) : ?>

                                            <tr style="margin-bottom: 5px;">

                                                <td><?php echo $n = $n + 1 ?></td>

                                                <td><?php echo $x['coupon_title'] ?></td>

                                                <td data-th="Title:"><?php echo $x['coupon_code'] ?></td>

                                                <td data-th="Coupon Code:"><?php echo $x['doc_name'] ?></td>

                                                <td data-th="Doctor Name:"><?php echo $x['discount'] ?></td>

                                                <td data-th="Discount:"><?php echo $x['valid_till'] ?></td>

                                                <td data-th="Validity:">

                                                    <?php if ($x['status'] == 1) {

                                                        echo '<span class="custom-badge status-green">Active</span>';
                                                    } else {

                                                        echo '<span class="custom-badge status-red">Inactive</span>';
                                                    } ?>

                                                </td>

                                                <!-- <td><button  href="<?php echo site_url('Hospital_Controller/booster') ?>"  type="submit" class="btn btn btn-primary btn-rounded">Boost</button></td> -->

                                                <!-- <td><a href="<?php echo site_url('Hospital_controller/booster') ?>"  class="btn btn-primary btn-rounded">boost</a></td> -->
                                                <td data-th="Action:" class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/editOffer/' . $x['coupon_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/delOffer/' . $x['coupon_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>
                                                        </div>
                                                    </div>

                                                    <div class="mob-action text-left">
                                                        <a class="" href="<?php echo site_url('hospital_Controller/editOffer/' . $x['coupon_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                        <a style="padding: 27px;" class="" href="<?php echo site_url('hospital_Controller/delOffer/' . $x['coupon_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php endforeach; ?>

                                    <?php else : ?>

                                        <?php echo "<span style='color:red'>No offers Added</span><script>document.getElementById('hideData').style.display='none'</script>" ?>

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

                                <thead id='hideData1'>

                                    <tr>
                                        <th>#</th>
                                        <th>Coupon Title</th>

                                        <th>Coupon Code</th>

                                        <th>Treatment Name</th>

                                        <th>Discount %</th>

                                        <th style="min-width: 110px;">Validity</th>

                                        <th>Status</th>

                                        <th>Booster</th>

                                        <th class="text-right">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php if (!isset($error) && isset($toffers)) :  ?>
                                        <?php $n = 0 ?>


                                        <?php foreach ($toffers as $y) : ?>

                                            <tr style="margin-bottom: 5px;">
                                                <td><?php echo $n = $n + 1 ?></td>

                                                <td><?php echo $y['coupon_title'] ?></td>

                                                <td data-th="Title:"><?php echo $y['coupon_code'] ?></td>

                                                <td data-th="Coupon Code:"><?php echo $y['treat_name'] ?></td>

                                                <td data-th="Treatment Name:"><?php echo $y['discount'] ?></td>

                                                <td data-th="Discount:"><?php echo $y['valid_till'] ?></td>

                                                <td data-th="Validity:">

                                                    <?php if ($y['status'] == 1) {

                                                        echo '<span class="custom-badge status-green">Active</span>';
                                                    } else {

                                                        echo '<span class="custom-badge status-red">Inactive</span>';
                                                    } ?>

                                                </td>

                                                <td data-th="Booster:"><a href="<?php echo site_url('Hospital_controller/booster') ?>" class="btn btn btn-primary btn-rounded ">Boost</a></td>

                                                <td data-th="Action:" class="text-right">

                                                    <div class="dropdown dropdown-action">

                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                                                        <div class="dropdown-menu dropdown-menu-right">

                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/editOfferTreat/' . $y['coupon_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/delOffer/' . $y['coupon_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                        </div>

                                                    </div>

                                                    <div class="mob-action text-left">

                                                        <a class="" href="<?php echo site_url('hospital_Controller/editOfferTreat/' . $x['coupon_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                        <a style="padding: 27px;" class="" href="<?php echo site_url('hospital_Controller/delOffer/' . $x['coupon_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                    </div>

                                                </td>

                                            </tr>

                                        <?php endforeach; ?>

                                    <?php else : ?>

                                        <?php echo "<span style='color:red'>No Patient Added</span><script>document.getElementById('hideData1').style.display='none'</script>" ?>


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

                        <h4 class="page-title">Add Offer</h4>

                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2 pt-3">
                        <form method="post" action="<?php echo site_url('hospital_Controller/addOffer') ?>">
                            <div class="row">
                                <div class="col-sm-6 pt-2">
                                    <div class="form-group">
                                        <label>Doctor: <span class="text-danger">*</span></label>
                                        <select name="doc_id" class="form-control rdoc">
                                            <option value="">Select a Doctor</option>
                                            <?php foreach ($docs as $x) : ?>
                                                <option value="<?php echo $x['doc_id'] ?>"><?php echo 'Dr. ' . $x['doc_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('doc_id'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6 pt-2 adoc">
                                    <div class="form-group">
                                        <label>Coupon Code: <span class="text-danger">*</span></label>
                                        <input class="form-control" name="coupon_code" style="text-transform: uppercase;" id="coupon_code" type="text" value="<?php echo set_value('coupon_code'); ?>">
                                        <span class="text-danger"><?php echo form_error('coupon_code'); ?></span>
                                    </div>

                                </div>


                                <div class="col-sm-6 pt-2">

                                    <div class="form-group">
                                        <label>Discount: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" min="1" name="discount" value="<?php echo set_value('discount'); ?>">
                                        <span class="text-danger"><?php echo form_error('discount'); ?></span>
                                    </div>

                                </div>

                                <div class="col-sm-6 pt-2">
                                    <div class="form-group">
                                        <label>Coupon Title: <span class="text-danger">*</span></label>
                                        <input class="form-control" name="coupon_title" id="coupon_title" type="text" value="<?php echo set_value('coupon_title'); ?>">
                                        <span class="text-danger"><?php echo form_error('coupon_title'); ?></span>

                                    </div>
                                </div>

                                <div class="col-sm-6 pt-2">
                                    <div class="form-group">
                                        <label>Description: <span class="text-danger">*</span></label>
                                        <textarea name="coupon_desc" class="form-control" id="" rows="2"><?php echo set_value('coupon_desc'); ?></textarea>
                                        <span class="text-danger"><?php echo form_error('coupon_desc'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6 pt-2">
                                    <div class="form-group">
                                        <label>Valid Till: <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="valid_till" id="valid_till" value="<?php echo set_value('valid_till'); ?>">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('valid_till'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6 pt-2">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Status: <span class="text-danger">*</span></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="status" value="1" checked class="form-check-input">Active
                                            </label>
                                        </div>

                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="status" value="0" class="form-check-input">Inactive
                                            </label>
                                        </div>

                                        <span class="text-danger"><?php echo form_error('status'); ?></span>

                                    </div>
                                </div>


                            </div>

                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary submit-btn">Add Coupon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif ($layout == 21) : ?>
        <!-- Edit Offers on Doctor -->
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 pt-5">
                        <h4 class="page-title">Edit Offer On Doctor</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 pt-3">
                        <form method="post" action="<?php echo site_url('hospital_Controller/editOffer/' . $this->uri->segment(3)) ?>">
                            <div class="row">
                                <div class="col-sm-6 pt-2">
                                    <div class="form-group">
                                        <input type="hidden" name="coupon_id" value="<?php echo $offer[0]['coupon_id'] ?>">
                                        <label>Doctor: <span class="text-danger">*</span></label>
                                        <select name="doc_id" class="form-control">
                                            <option value="">Select a Doctor</option>
                                            <?php foreach ($docs as $x) : ?>
                                                <option <?php if ($offer[0]['doc_id'] == $x['doc_id']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $x['doc_id'] ?>"><?php echo 'Dr. ' . $x['doc_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('doc_id'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6 pt-2">
                                    <div class="form-group">
                                        <label>Coupon Code: <span class="text-danger">*</span></label>
                                        <input class="form-control" name="coupon_code" value="<?php echo $offer[0]['coupon_code'] ?>" style="text-transform: uppercase;" id="coupon_code" type="text">
                                        <span class="text-danger"><?php echo form_error('coupon_code'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6 pt-2">
                                    <div class="form-group">
                                        <label>Coupon Title: <span class="text-danger">*</span></label>
                                        <input class="form-control" name="coupon_title" value="<?php echo $offer[0]['coupon_title'] ?>" id="coupon_title" type="text">
                                        <span class="text-danger"><?php echo form_error('coupon_title'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6 pt-2">
                                    <div class="form-group">
                                        <label>Description: <span class="text-danger">*</span></label>
                                        <textarea name="coupon_desc" class="form-control" value="" id="" rows="2"><?php echo $offer[0]['coupon_desc'] ?></textarea>
                                        <span class="text-danger"><?php echo form_error('coupon_desc'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6 pt-2">
                                    <div class="form-group">
                                        <label>Valid Till: <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" value="<?php echo $offer[0]['valid_till'] ?>" name="valid_till" id="valid_till">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('valid_till'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6 pt-2">
                                    <div class="form-group">
                                        <label>Discount: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" value="<?php echo $offer[0]['discount'] ?>" min="1" max="100" name="discount" id="discount">
                                        <span class="text-danger"><?php echo form_error('discount'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6 pt-2">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Status: <span class="text-danger">*</span></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="status" value="1" <?php if ($offer[0]['status'] == 1) {

                                                                                                echo 'checked';
                                                                                            } ?> class="form-check-input">Active

                                            </label>
                                        </div>

                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="status" value="0" <?php if ($offer[0]['status'] == 0) {
                                                                                                echo 'checked';
                                                                                            } ?> class="form-check-input">Inactive
                                            </label>
                                        </div>
                                        <span class="text-danger"><?php echo form_error('status'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary submit-btn">Save Coupon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif ($layout == 22) : ?>
        <!-- Edit Offers on Treatment -->
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 pt-5">
                        <h4 class="page-title">Edit Offer On Treatment</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 pt-3">
                        <form method="post" action="<?php echo site_url('hospital_Controller/editOfferTreat') ?>">
                            <div class="row">
                                <div class="col-sm-6 pt-2">
                                    <div class="form-group">
                                        <input type="hidden" name="coupon_id" value="<?php echo $offer[0]['coupon_id'] ?>">
                                        <label>Treatment: <span class="text-danger">*</span></label>
                                        <select name="treat_id" required class="form-control">
                                            <option value="">Select a Treatment</option>

                                            <?php foreach ($treats as $x) : ?>
                                                <option <?php if ($offer[0]['treat_id'] == $x['treat_id']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $x['treat_id'] ?>"><?php echo $x['treat_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 pt-2">
                                    <div class="form-group">
                                        <label>Coupon Code: <span class="text-danger">*</span></label>
                                        <input class="form-control" required name="coupon_code" value="<?php echo $offer[0]['coupon_code'] ?>" style="text-transform: uppercase;" id="coupon_code" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6 pt-2">
                                    <div class="form-group">
                                        <label>Coupon Title: <span class="text-danger">*</span></label>
                                        <input class="form-control" required name="coupon_title" value="<?php echo $offer[0]['coupon_title'] ?>" id="coupon_title" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6 pt-2">
                                    <div class="form-group">
                                        <label>Description: <span class="text-danger">*</span></label>
                                        <textarea name="coupon_desc" class="form-control" value="" id="" rows="2"><?php echo $offer[0]['coupon_desc'] ?></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-6 pt-2">
                                    <div class="form-group">
                                        <label>Valid Till: <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="text" required class="form-control datetimepicker" value="<?php echo $offer[0]['valid_till'] ?>" name="valid_till" id="valid_till">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 pt-2">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Status: <span class="text-danger">*</span></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" required name="status" value="1" <?php if ($offer[0]['status'] == 1) {

                                                                                                            echo 'checked';
                                                                                                        } ?> class="form-check-input">Active

                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" required name="status" value="0" <?php if ($offer[0]['status'] == 0) {

                                                                                                            echo 'checked';
                                                                                                        } ?> class="form-check-input">Inactive

                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 pt-2">
                                    <div class="form-group">
                                        <label>Discount: <span class="text-danger">*</span></label>
                                        <input class="form-control" required type="number" value="<?php echo $offer[0]['discount'] ?>" min="1" max="100" name="discount" id="discount">
                                    </div>
                                </div>
                            </div>

                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary submit-btn">Save Coupon</button>
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

    <script>
        $(document).ready(function() {
            if ($('#aoffer_on').val() != '') {
                var offer_on = $('#aoffer_on').val();
                // console.log(offer_on);
                if (offer_on == "Doctor") {
                    $('.rtrat').removeAttr("required");
                    $('.rdoc').attr("required", true);
                    $('.adoc').show();
                    $('.atrat').hide();
                }

                if (offer_on == "Treatment") {
                    $('.rdoc').removeAttr("required");
                    $('.adoc').hide();
                    $('.rtrat').attr("required", true);
                    $('.atrat').show();
                }
            }
        });

        $("#aoffer_on").change(function() {
            var offer_on = $('#aoffer_on').val();
            if (offer_on == "Doctor") {
                $('.rtrat').removeAttr("required");
                $('.rdoc').attr("required", true);
                $('.adoc').show();
                $('.atrat').hide();
            }

            if (offer_on == "Treatment") {
                $('.rdoc').removeAttr("required");
                $('.adoc').hide();
                $('.rtrat').attr("required", true);
                $('.atrat').show();
            }
        });
    </script>

    <?php if (isset($_SESSION['success'])) : ?>

        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Offer Added Successfully',
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
                title: 'Offer Updated Successfully',
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
                title: 'Offer Deleted',
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