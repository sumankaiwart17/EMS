<?php
// echo "<pre>";
// print_r($departments);
// die;
$doctors = $this->db->where('doc_id', $_SESSION['doc_id'])->get('doctor_details')->result_array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
    </script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/cssUser/') ?>dist/css/pignose.calendar.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<title>Appointments</title>
<style>
    .slots {

        margin-top: 20px;

        padding-left: 20px;

        padding-right: 20px;

    }



    .slots input[type="radio"] {

        opacity: 0;

        position: fixed;

        width: 0;

    }



    .slots label {

        align-items: center;

        display: inline-block;

        background-color: white;

        padding: 10px 10px;

        color: #c20a2b;

        margin-right: 10px;

        font-family: sans-serif, Arial;

        font-size: 16px;

        border: 2px solid #c20a2b;

        border-radius: 4px;

    }



    .slots label:hover {

        background-color: #c20a2b;

        color: white;

    }



    .slots input[type="radio"]:focus+label {

        border: 2px solid #c20a2b;

    }



    .slots input[type="radio"]:checked+label {

        background-color: #c20a2b;

        border-color: #c20a2b;

        color: white;

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

    .modal-backdrop.show {
        opacity: 0.5 !important;
        background: #000 !important;
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

        <!-- View Appointments -->
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3" data-aos="fade-right">
                        <h4 class="page-title">Appointments</h4>
                    </div>


                    <div class="col-sm-8 col-9 text-right m-b-20" data-aos="fade-left">

                        <a href="<?php echo site_url('doctorProfile_Controller/addAppointment') ?>" class="btn btn btn-success btn-rounded float-right"><i class="fas fa-plus"></i> Add
                            Appointment</a>





                        <div class="modal fade show" id="Medication" tabindex="-1" role="dialog" aria-labelledby="MedicationModal">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content" style="max-width:700px">
                                    <div class="modal-header">
                                        <h3 class="modal-title text-center m-auto m-r-5" id="exampleModalLongTitle">

                                        </h3>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                            <span aria-hidden="true">×</span>

                                        </button>
 
                                    </div>

                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row p-2 mb-2 mdl-mob" style="display: none;">
                                            </div>

                                            <div class="row p-2 mb-2 mdl">
                                                <div class="col-12">
                                                </div>
                                            </div>

                                            <div class="row p-2 ">
                                                <div class="col-2 text-center">
                                                </div>
                                            </div>

                                            <form action="<?php echo base_url('doctorProfile_Controller/addslot') ?>" style='display:block' id='add' method="post">
                                                <div class="row pb-5 mdl" style="width:800px;">
                                                    <input type="text" required name="slots" class="form-control w-50 pt-2" placeholder="enter slots Time">
                                                    <div class="col-4">
                                                        <button type='submit' id='add' class="btn btn-block btn-primary">add slots</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <form action="<?php echo base_url('doctorProfile_Controller/editslot') ?>" style='display:none' id='edit' method="post">
                                                <div class="row pb-5 mdl" style="width:800px;">
                                                    <?php foreach ($slots as $z) : ?>
                                                        <input type="text" required name="slots" value="<?php echo $z['slots'] ?>" class="form-control w-50 pt-2" placeholder="enter slots Time">
                                                        <div class="col-4" id='edit'>
                                                            <button type='submit' class="btn btn-block btn-primary">edit slots</button>
                                                        <?php endforeach; ?>
                                                        </div>
                                                </div>
                                            </form>
                                            <script>
                                                <?php if ($slots !== '') : ?>
                                                    document.getElementById('edit').style.display = 'block';
                                                <?php endif; ?>
                                            </script>
                                            <script>
                                                <?php if (!$slots == '') : ?>
                                                    document.getElementById('add').style.display = 'none';
                                                <?php endif; ?>
                                            </script>
                                        </div>
                                    </div>

                                    <!-- <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button>
</div> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row ml-4">
                    <div class="col-lg-4 search-bar pl-0">

                        <input type="text" class="form-control mb-3" placeholder="Search Appointments" id="search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                    <div class="col-lg-1">
                        <span>Search by Date</span>
                    </div>
                    <div class="col-lg-4 search-bar">

                        <input type="date" class="form-control mb-3" placeholder="Search appointments" id="date">

                    </div>





                </div>

                <div class="row filter-row">
                    <div class="row doc ml-1">
                        <div class="col-md-12">
                            <?php //print_r ($appointments) 
                            ?>

                            <div class="table-responsive" data-aos="fade-up">
                                <table class="table table-striped custom-table" id="table">
                                    <thead id="hideData">
                                        <tr>
                                            <th>#</th>
                                            <th>Appointment ID</th>
                                            <th>Patient Name</th>
                                            <th>Doctor Name</th>`
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Fees</th>
                                            <th>Appointment Date</th>
                                            <th>Appointment Time</th>
                                            <th>End Time</th>
                                            <th>Status</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="apptData">
                                        <?php $n = 0;
                                        if (isset($appointments)) :
                                            foreach ($appointments as $x) { ?>
                                                <tr style="margin-bottom: 5px;">
                                                    <td><?php $n = $n + 1;
                                                        echo $n; ?></td>
                                                    <td data-th="Appointment ID:"><span class="a-id" id="<?php echo $x['appt_id']; ?>"><?php echo $x['appt_id']; ?></span></td>
                                                    <td data-th="Patient Name:">
                                                <!--<img width="28" height="28" src="<?php //echo base_url('images/summer.jpg') 
                                                                                                ?>" class="rounded-circle m-r-5" alt="">--><?php echo $x['pt_name']; ?>
                                                    </td>
                                                    <td data-th="Doctor Name:" class="doctor"><?php echo $x['doc_name']; ?></td>
                                                    <td data-th="email:"><?php echo $x['user_id']; ?></td>
                                                    <td data-th="phone:"><?php echo $x['phone']; ?></td>
                                                    <td data-th="Fees:"><?php echo $x['fees'] ?></td>
                                                    <td data-th="Appointment Date:"><?php echo $x['appt_datetime']; ?></td>
                                                    <td data-th="Appointment Time:"><?php echo $x['appt_slot_time']; ?></td>
                                                    <?php
                                                    $start_time = $x['appt_slot_time'];
                                                    $end_time = strtotime($start_time) + $x['duration_time'] * 60;
                                                    ?>

                                                    <td data-th="End Time: "><?php echo date('h:i a', $end_time) ?></td>

                                                    <?php if ($x['appt_status'] == 0) : ?>
                                                        <td data-th="Status: "><span class="custom-badge status-red a-status text-center" id="<?= $x['appt_status'] ?>" style="cursor:pointer;">Inactive</span></td>

                                                    <?php elseif ($x['appt_status'] == 1) : ?>

                                                        <td data-th="Status: "><span class="custom-badge status-green a-status text-center" id="<?= $x['appt_status'] ?>" style="cursor:pointer;">Active</span></td>

                                                    <?php elseif ($x['appt_status'] == 2) : ?>

                                                        <td data-th="Status: "><span class="custom-badge status-orange a-status text-center" id="<?= $x['appt_status'] ?>" style="cursor:pointer; text-align:center;">Completed</span></td>

                                                    <?php endif; ?>

                                                    <td class="text-right" data-th="Action: ">

                                                        <div class="dropdown dropdown-action">

                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>

                                                            <div class="dropdown-menu dropdown-menu-right">

                                                                <a class="dropdown-item" href="<?php echo site_url('doctorProfile_Controller/editAppointment/' . $x['appt_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                                <a class="dropdown-item" href="<?php echo site_url('doctorProfile_Controller/delAppointment/' . $x['appt_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                        <?php else : ?>
                                            <?php echo "<span style='color:red;margin-left:20px'>No Appointments Added</span><script>document.getElementById('hideData').style.display='none'</script>" ?>

                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div id="delete_appointment" class="modal fade delete-modal" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content" style="max-width: 500px!important;">
                                <div class="modal-body text-center">
                                    <img src="assets/img/sent.png" alt="" width="50" height="46">
                                    <h3>Are you sure want to delete this Appointment?</h3>
                                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php elseif ($layout == 1) : ?>

                <!-- Add Appointments -->

                <div class="page-wrapper">
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <h4 class="page-title">Add Appointments</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <form method="POST" action="<?php echo site_url('doctorProfile_Controller/save_appointment_data'); ?>">
                                    <div class="row">
                                    <input type="hidden" name="appt_on" value="Doctor">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Appointment ID</label>
                                                <input class="form-control" type="text" name="appt_id" value="<?php echo uniqid('APPT'); ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Patient Name</label>
                                                <input class="form-control" type="text" name="pt_name" value="<?php echo set_value("pt_name"); ?>">
                                                <div class="text-danger"><?php echo form_error('pt_name'); ?></div>
                                            </div>
                                        </div>


                                        <div class="col-md-6 doc">
                                            <div class="form-group">
                                                <label>Appointment Date</label>
                                                <input type="text" name="date" class="input-calendar<?php echo $_SESSION['doc_id'] ?> form-control" id="calendar<?php echo $_SESSION['doc_id'] ?>" required />
                                                <div class="text-danger"><?php echo form_error('date'); ?></div>
                                            </div>

                                        </div>
                                        <?php
                                        $datestring = '%Y-%m-%d';
                                        $min = '%Y-%m-%d';

                                        $curtime = time();

                                        // echo mdate($datestring, $time)

                                        ?>
                                        <div id="slots<?php echo $_SESSION['doc_id'] ?>" class="slots row justify-content-center">


                                            <p class="validate_msg"></p>
                                        </div>




                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Fees</label>
                                                <input class="form-control" id="fees" type="number" value="<?php echo $fees[0]['consult_fee']?>" name="fees" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Patient Email</label>

                                                <input class="form-control" type="email" name="email" value="<?php echo set_value("email"); ?>">
                                                <div class="text-danger"><?php echo form_error('email'); ?></div>

                                            </div>
                                        </div>

                                        <div class="col-md-6 doc">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input class="form-control" type="text" name="phone" id="checkPhone" value="<?php echo set_value("phone"); ?>">
                                                <div class="text-danger"><?php echo form_error('phone'); ?></div>
                                            </div>
                                            <span id="getres" class="text-danger"> </span>
                                        </div>

                                        <div class="form-group">
                                            <label class="display-block mt-2">Appointment Status</label>
                                            <div class="form-check form-check-inline" style="top: 10px;">
                                                <input class="form-check-input" type="radio" name="status" id="product_active" value="1" checked>
                                                <label class="form-check-label" for="product_active">
                                                    Active
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline" style="top: 10px;">
                                                <input class="form-check-input" type="radio" name="status" id="product_inactive" value="0">
                                                <label class="form-check-label" for="product_inactive">
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="m-t-20 text-center">
                                        <button class="btn btn-primary submit-btn" type="submit">Create Appointment</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
                        var datepicker = new ej.calendars.DatePicker({
                            minDate: '0'
                        });
                        datepicker.appendTo('#datepicker');
                    </script>




                    <!-- block repeat slots booking -->

                    <script>
                        // $(document).ready(function() {
                        //     $(':input[type="submit"]').prop('disabled', true);

                        //     $('#doc_id').click(function() {
                        //         if ($(this).val()) {
                        //             $(':input[type="submit"]').prop('disabled', false);
                        //         } else {
                        //             $(':input[type="submit"]').prop('disabled', true);
                        //         }


                        //     })

                        // });
                    </script>


                </div>

            <?php elseif ($layout == 2) : ?>

                <!-- Edit Appointments -->

                <div class="page-wrapper">
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <h4 class="page-title">Edit Appointments</h4>
                            </div>
                        </div>

                        <div class="row">

                            <?php

                            // print_r($appointment);die; 

                            ?>

                            <div class="col-lg-8 offset-lg-2">

                                <form method="POST" action="<?php echo site_url('doctorProfile_Controller/edit_appointment_data/' . $this->uri->segment(3)); ?>">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Appointment ID</label>
                                                <input class="form-control" type="text" name="appt_id" value="<?php echo $appointment[0]['appt_id']; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Patient Name</label>
                                                <input class="form-control" type="text" name="pt_name" name="pt_name" value="<?php echo  $appointment[0]['pt_name']; ?>">

                                                <span class="text-danger"><?php echo form_error('pt_name'); ?></span>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Patient Email</label>
                                                <input class="form-control" type="email" name="email" value="<?php echo  $appointment[0]['user_id']; ?>">

                                                <span class="text-danger"><?php echo form_error('email'); ?></span>

                                            </div>
                                        </div>
                                  



                                    </div>

                                    <div class="row">

                                      

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label>Date</label>

                                                <div class="cal-icon">

                                                    <input type="text" class="form-control input-calendar" name="date" value="<?php echo $appointment[0]['appt_datetime']; ?>">

                                                </div>

                                                <span class="text-danger"><?php echo form_error('date'); ?></span>

                                            </div>

                                        </div>


                                    </div>



                                    <div class="col-md-6">
                                        <br>
                                        <div class=" form-group">

                                            <label class="display-block">Appointment Status</label>

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
                                    </div>

                                    <div class="col-md-6">
                                        <label>Phone</label>
                                        <input type="text" class="form-control input-phone" name="phone" value="<?php echo $appointment[0]['phone']; ?>">
                                        <span class="text-danger"><?php echo form_error('phone'); ?></span>
                                                </div>
                            </div>

                            <div class="m-t-20 text-center">
                                <button class="btn btn-success submit-btn" type="submit">Save Appointment</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>


        <script>
            $(document).ready(function() {
                $("#calendar<?php echo $_SESSION['doc_id'] ?>").on('keyup', function() {
                    var date = $(this).val();
                    var doc_id = '<?php echo $_SESSION['doc_id'] ?>';
                    console.log(date);
                    $.ajax({
                        url: '<?php echo site_url('appointment_Controller/fetchSlot') ?>',
                        method: 'POST',
                        data: {
                            date: date,
                            doc_id: doc_id,
                        },
                        success: function(response) {
                            console.log(response);
                            $("#slots<?php echo $_SESSION['doc_id'] ?>").html(response);
                        }
                    });
                });

            });

            $('.package-card').click(function() {
                $(this).find('input[type=radio]').prop('checked', true);
                $('.package-card').removeClass('active');
                $(this).addClass('active');
                console.log($('.package-card').find('input[type=radio]:checked').val());

            });

            function nextpage() {
                if ($('.page1').is(':visible') && $(".slots input[type=radio]:checked").val()) {
                    $('.page1').hide();
                    $('.page2').show();
                    $('.slot_time').html($(".slots input[type=radio]:checked").val());
                    // console.log($(".slots input[type=radio]:checked").val());
                } else {
                    $('.validate_msg').html('Please select a slot!!');
                }
            }

            function prevpage() {
                if ($('.page2').is(':visible')) {
                    $('.page2').hide();
                    $('.page1').show();
                    //console.log($(".slots input[type=radio]:checked").val());
                }
            }
        </script>
        <script>
            // search
            $(document).ready(function() {
                $("#date").on("change", function() {
                    var value = $(this).val().toLowerCase();
                    // console.log(value);
                    $(".table tbody tr ").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
                $("#search").on("keyup", function() {
                    var date = $(this).val().toLowerCase();
                    // console.log(date);
                    $(".table tbody tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(date) > -1)

                    });

                });


            });
        </script>
        <script>
            function getDocName() {
                var doc_name = $('#doc_id').val();
                // console.log(doc_name);
                $.ajax({
                    type: 'POST',
                    data: {
                        'doc_name': doc_name
                    },
                    url: "<?php echo site_url('doctorProfile_Controller/get_doc_degee') ?>",
                    success: function(data) {

                        $('#show_orders').html(data);
                        // $('#show_orders').val(data);
                    }

                });

            };

            $("#apptt_on").change(function() {

                var apptt_on = $('#apptt_on').val();

                // console.log(apptt_on);

                if (apptt_on == "Doctor") {
                    $('.trt').removeAttr("required");
                    $('.doc').attr("required", true);
                    $('.doc').show();
                    $('.trt').hide();

                }

                if (apptt_on == "Treatment") {

                    $('.doc').removeAttr("required");

                    $('.doc').hide();

                    $('.trt').attr("required", true);

                    $('.trt').show();

                }

                if (apptt_on == "") {

                    $('.doc').hide();

                    $('.trt').hide();

                }

            });
        </script>
        <script>
            $("#appt_on").change(function() {

                var appt_on = $('#appt_on').val();

                if (appt_on == "Doctor") {

                    $('.doc').show();

                    $('.trt').hide();

                }

                if (appt_on == "Treatment") {

                    $('.doc').hide();

                    $('.trt').show();

                }

            });
        </script>
        <script>
            $('.b-status').on('click', function() {

                var index = $(this).parent().parent().index();

                if ($(this).hasClass('status-red')) {

                    $(this).removeClass('status-red');

                    $(this).html('Active')

                    $(this).addClass('status-green');

                } else if ($(this).hasClass('status-green')) {

                    $(this).removeClass('status-green');

                    $(this).html('Completed')

                    $(this).addClass('status-orange');

                } else {

                    $(this).addClass('status-red');
                    $(this).html('Inactive')
                    $(this).removeClass('status-orange');
                }

            })
        </script>
        <script>
            $('.a-status').on('click', function() {
                var index = $(this).parent().parent().index();

                if ($(this).hasClass('status-red')) {
                    $(this).removeClass('status-red');
                    $(this).html('Active')
                    $(this).addClass('status-green');

                } else if ($(this).hasClass('status-green')) {
                    $(this).removeClass('status-green');
                    $(this).html('Completed')
                    $(this).addClass('status-orange');

                } else {
                    $(this).addClass('status-red');
                    $(this).html('Inactive')
                    $(this).removeClass('status-orange');
                }

                var appt_id = $('.a-id').eq(index).attr('id');
                var appt_status = $('.a-status').eq(index).attr('id');

                $.ajax({
                    url: '<?php echo site_url('doctorProfile_Controller/editAppointmentStatus') ?>',
                    method: 'POST',
                    data: {
                        appt_id: appt_id,
                        appt_status: appt_status
                    },

                    success: function(response) {
                        console.log(response);
                    }
                });
            })

        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>

        <script>
            $(document).ready(function() {
                $('#dept_id').change(function() {
                    var dept_id = $('#dept_id').val();
                    // console.log(dept_id);
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // console.log(this.responseText);
                            document.getElementById("doc_id").innerHTML = this.responseText;
                        }
                    };

                    xhttp.open("GET", "<?php echo site_url() ?>/doctorProfile_Controller/fetchDoc?q=" + dept_id,
                        true);
                    xhttp.send();
                });

            });
        </script>


        <script>
            $(document).ready(function() {
                $("#doc_id").change(function() {
                    var doc_id = $("#doc_id").val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('hospital_controller/checkDoc') ?>",
                        data: {
                            q: doc_id
                        },
                        success: function(data) {
                            if (data) {
                                alert('Doctor not schedule');
                            }
                            //  $('.doc_res').html(data); 
                        }
                    });
                });
            });
        </script>

        <?php if (isset($_SESSION['success'])) : ?>
            <script>
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Appointment Added Successfully',
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
                    title: 'Appointment Updated Successfully',
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
                    title: 'Appointment Deleted Successfully',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>

            <?php unset($_SESSION['delete']); ?>

        <?php endif; ?>



        <script type="text/javascript">
            //<![CDATA[
            $(function() {
                $('#wrapper .version strong').text('v' + $.fn.pignoseCalendar.version);
                function onSelectHandler(date, context) {
                    /**
                     * @date is an array which be included dates(clicked date at first index)
                     * @context is an object which stored calendar interal data.
                     * @context.calendar is a root element reference.
                     * @context.calendar is a calendar element reference.
                     * @context.storage.activeDates is all toggled data, If you use toggle type calendar.
                     * @context.storage.events is all events associated to this date
                     */
                    var $element = context.element;
                    var $calendar = context.calendar;
                    var $box = $element.siblings('.box').show();
                    var text = 'You selected date ';
                    if (date[0] !== null) {
                        text += date[0].format('YYYY-MM-DD');
                    }
                    if (date[0] !== null && date[1] !== null) {
                        text += ' ~ ';
                    } else if (date[0] === null && date[1] == null) {
                        text += 'nothing';
                    }

                    if (date[1] !== null) {
                        text += date[1].format('YYYY-MM-DD');
                    }
                    $box.text(text);
                }



                function onApplyHandler(date, context) {

                    /**

                     * @date is an array which be included dates(clicked date at first index)
                     * @context is an object which stored calendar interal data.
                     * @context.calendar is a root element reference.
                     * @context.calendar is a calendar element reference.
                     * @context.storage.activeDates is all toggled data, If you use toggle type calendar.
                     * @context.storage.events is all events associated to this date
                     */

                    var $element = context.element;
                    var $calendar = context.calendar;
                    var $box = $element.siblings('.box').show();
                    var text = 'You applied date ';



                    if (date[0] !== null) {
                        text += date[0].format('YYYY-MM-DD');
                    }



                    if (date[0] !== null && date[1] !== null) {
                        text += ' ~ ';
                    } else if (date[0] === null && date[1] == null) {
                        text += 'nothing';
                    }



                    if (date[1] !== null) {
                        text += date[1].format('YYYY-MM-DD');
                    }
                    $box.text(text);
                }



                // Default Calendar

                $('.calendar').pignoseCalendar({
                    select: onSelectHandler
                });



                // Input Calendar

                <?php $weekdays = [0 => 'Sun', 1 => 'Mon', 2 => 'Tue', 3 => 'Wed', 4 => 'Thur', 5 => 'Fri', 6 => 'Sat'];
                foreach ($doctors as $x) :
                    $onDays = explode(',', $x['weekdays']);
                    $disabDays = array();
                    foreach ($weekdays as $a => $b) {
                        if (!in_array($b, $onDays)) {
                            array_push($disabDays, $a);
                        }
                    } ?>

                    $('.input-calendar<?php echo $_SESSION['doc_id'] ?>').pignoseCalendar({
                        minDate: moment('<?php echo mdate($datestring, $curtime) ?>'),
                        apply: onApplyHandler,
                        disabledWeekdays: <?php echo '[' . implode(', ', $disabDays) . ']' ?>,
                        buttons: true, // It means you can give bottom button controller to the modal which be opened when you click.
                    });

                <?php endforeach; ?>

                // Calendar modal

                var $btn = $('.btn-calendar').pignoseCalendar({
                    apply: onApplyHandler,
                    modal: true, // It means modal will be showed when you click the target button.
                    buttons: true
                });



                // Color theme type Calendar

                $('.calendar-dark').pignoseCalendar({
                    theme: 'dark', // light, dark, blue
                    select: onSelectHandler
                });



                // Blue theme type Calendar

                $('.calendar-blue').pignoseCalendar({
                    theme: 'blue', // light, dark, blue
                    select: onSelectHandler
                });



                // Schedule Calendar

                $('.calendar-schedules').pignoseCalendar({
                    scheduleOptions: {
                        colors: {
                            holiday: '#2fabb7',
                            seminar: '#5c6270',
                            meetup: '#ef8080'
                        }

                    },

                    schedules: [{
                        name: 'holiday',
                        date: '2017-08-08'
                    }, {
                        name: 'holiday',
                        date: '2017-09-16'
                    }, {
                        name: 'holiday',
                        date: '2017-10-01',
                    }, {
                        name: 'holiday',
                        date: '2017-10-05'
                    }, {
                        name: 'holiday',
                        date: '2017-10-18',
                    }, {
                        name: 'seminar',
                        date: '2017-11-14'
                    }, {
                        name: 'seminar',
                        date: '2017-12-01',
                    }, {
                        name: 'meetup',
                        date: '2018-01-16'
                    }, {
                        name: 'meetup',
                        date: '2018-02-01',
                    }, {
                        name: 'meetup',
                        date: '2018-02-18'
                    }, {
                        name: 'meetup',
                        date: '2018-03-04',
                    }, {
                        name: 'meetup',
                        date: '2018-04-01'
                    }, {
                        name: 'meetup',
                        date: '2018-04-19',
                    }],

                    select: function(date, context) {

                        var message = `You selected ${(date[0] === null ? 'null' : date[0].format('YYYY-MM-DD'))}.
							   <br/>
							   <br/>
							   <strong>Events for this date</strong>
							   <br/> 
							   <br/>
							   <div class="schedules-date"></div>`;

                        var $target = context.calendar.parent().next().show().html(message);



                        for (var idx in context.storage.schedules) {
                            var schedule = context.storage.schedules[idx];
                            if (typeof schedule !== 'object') {
                                continue;
                            }
                            $target.find('.schedules-date').append('<span class="ui label default">' + schedule.name + '</span>');
                        }
                    }
                });



                // Multiple picker type Calendar

                $('.multi-select-calendar').pignoseCalendar({
                    multiple: true,
                    select: onSelectHandler
                });



                // Toggle type Calendar

                $('.toggle-calendar').pignoseCalendar({
                    toggle: true,
                    select: function(date, context) {
                        var message = `You selected ${(date[0] === null ? 'null' : date[0].format('YYYY-MM-DD'))}.
                                <br />
                                <br />  <strong>Events for this date</strong>
                                <br />  
                                <br />   <div class="active-dates"></div>`;
                        var $target = context.calendar.parent().next().show().html(message);



                        for (var idx in context.storage.activeDates) {
                            var date = context.storage.activeDates[idx];
                            if (typeof date !== '<span class="ui label"><i class="fas fa-code"></i>string</span>') {
                                continue;
                            }

                            $target.find('.active-dates').append('<span class="ui label default">' + date + '</span>');
                        }
                    }
                });



                //Disabled date settings.

                (function() {
                    // IIFE Closure
                    var times = 30;
                    var disabledDates = [];
                    for (var i = 0; i < times; /* Do not increase index */ ) {
                        var year = moment().year();
                        var month = 0;
                        var day = parseInt(Math.random() * 364 + 1);
                        var date = moment().year(year).month(month).date(day).format('YYYY-MM-DD');

                        if ($.inArray(date, disabledDates) === -1) {
                            disabledDates.push(date);
                            i++;
                        }
                    }



                    disabledDates.sort();
                    var $dates = $('.disabled-dates-calendar').siblings('.guide').find('.guide-dates');
                    for (var idx in disabledDates) {
                        $dates.append('<span>' + disabledDates[idx] + '</span>');
                    }



                    $('.disabled-dates-calendar').pignoseCalendar({
                        select: onSelectHandler,
                        disabledDates: disabledDates
                    });
                }());



                // Disabled Weekdays Calendar.
                $('.disabled-weekdays-calendar').pignoseCalendar({
                    select: onSelectHandler,
                    disabledWeekdays: [0, 6]
                });



                // Disabled Range Calendar.

                var minDate = moment().set('dates', Math.min(moment().day(), 2 + 1)).format('YYYY-MM-DD');
                var maxDate = moment().set('dates', Math.max(moment().day(), 24 + 1)).format('YYYY-MM-DD');
                $('.disabled-range-calendar').pignoseCalendar({
                    select: onSelectHandler,
                    minDate: minDate,
                    maxDate: maxDate
                });



                // Multiple Week Select

                $('.pick-weeks-calendar').pignoseCalendar({
                    pickWeeks: true,
                    multiple: true,
                    select: onSelectHandler
                });



                // Disabled Ranges Calendar.

                $('.disabled-ranges-calendar').pignoseCalendar({
                    select: onSelectHandler,

                    disabledRanges: [
                        ['2016-10-05', '2016-10-21'],
                        ['2016-11-01', '2016-11-07'],
                        ['2016-11-19', '2016-11-21'],
                        ['2016-12-05', '2016-12-08'],
                        ['2016-12-17', '2016-12-18'],
                        ['2016-12-29', '2016-12-30'],
                        ['2017-01-10', '2017-01-20'],
                        ['2017-02-10', '2017-04-11'],
                        ['2017-07-04', '2017-07-09'],
                        ['2017-12-01', '2017-12-25'],
                        ['2018-02-10', '2018-02-26'],
                        ['2018-05-10', '2018-09-17'],
                    ]
                });



                // I18N Calendar
                $('.language-calendar').each(function() {
                    var $this = $(this);
                    var lang = $this.data('lang');
                    $this.pignoseCalendar({
                        lang: lang
                    });
                });
                // This use for DEMO page tab component.
                $('.menu .item').tab();
            });

            //]]>



            $('#apt_for').on('change', function() {
                var conceptName = $('#apt_for').find(":selected").text();
                console.log(conceptName);

                if (conceptName == 'Others') {
                    $('.hidden').css("display", "block");

                } else {
                    $('.hidden').css("display", "none");
                    $('.hidden2').css("display", "none");
                }
            });



            $('#otp').on('click', function() {
                $('.hidden2').css("display", "block");
            });
        </script>
        <script type="text/javascript" src="<?php echo base_url('css/cssUser/') ?>dist/js/pignose.calendar.full.min.js"></script>

        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                offset: 130,
                duration: 1000,
            });
        </script>

</body>

</html>