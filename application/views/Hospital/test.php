<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/bootstrap-datetimepicker.min.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/cssUser/') ?>dist/css/pignose.calendar.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />


    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<title>Appointments</title>



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


    .modal-backdrop.show {
        opacity: 0.5 !important;
        background: #000 !important;
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
                        <i class='fa fa-search' style='margin-left:300px'></i>
                        <input type="text" id="search" placeholder="search appointments" class='form-control' > 

                   


                    </div>

                    

                    <div class="col-sm-8 col-9 text-right m-b-20" data-aos="fade-left">

                        <a href="<?php echo site_url('hospital_Controller/addAppointment') ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fas fa-plus"></i> Add
                            Appointment</a>

                        <button type="button" class="btn btn-primary mr-2 btn-rounded" data-toggle="modal" data-target="#Medication">

                            Appointments Slots
                        </button>




                        <div class="modal fade show" id="Medication" tabindex="-1" role="dialog" aria-labelledby="MedicationModal">

                            <div class="modal-dialog modal-lg" role="document">

                                <div class="modal-content" style="max-width:700px">

                                    <div class="modal-header">

                                        <h3 class="modal-title text-center m-auto m-r-5" id="exampleModalLongTitle">
                                            <table>
                                                <div class="container">
                                                    <?php if (isset($slots) && $slots !== '') : ?>
                                                        <?php foreach ($slots as $z) : ?>

                                                            <h4 class="text-center" style='margin:auto;font-family:roboto,'>
                                                                Every Appointments After <?php echo $z['slots'] ?>:00 Miniutes</h4>
                                                        <?php endforeach; ?>

                                                    <?php else : ?>
                                                        <?php echo "" ?>

                                                    <?php endif; ?>
                                                </div>


                                            </table>
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

                                            <form action="<?php echo base_url('hospital_Controller/addslot') ?>" style='display:block' id='add' method="post">
                                                <div class="row pb-5 mdl" style="width:800px;">


                                                    <input type="text" required name="slots" class="form-control w-50 pt-2" placeholder="enter slots Time">


                                                    <div class="col-4">


                                                        <button type='submit' id='add' class="btn btn-block btn-primary">add slots</button>

                                                    </div>


                                                </div>
                                            </form>
                                            <form action="<?php echo base_url('hospital_Controller/editslot') ?>" style='display:none' id='edit' method="post">

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



                                            <div style="display:none" class="medForm mt-2 row p-2 border border-muted">

                                                <form id="add-medicinemsh1632582b8d497f" action="https://projects.dotlinkertech.com/aahrs/hospital_Controller/add_patients_medicine" method="post"></form>

                                                <div class="col-12 form-group">

                                                    <label for="medicine">Medicine Name:</label>

                                                    <input type="text" name="medicine" class="form-control" id="medicine">

                                                </div>

                                                <div class="col-12 form-group">

                                                    <label for="dosage">Dosage:</label>

                                                    <input type="text" name="dosage" class="form-control" id="dosage">

                                                </div>

                                                <div class="col-12 form-group">

                                                    <label for="duration">Duration:</label>

                                                    <input type="number" name="duration" class="form-control" id="duration">

                                                </div>

                                                <div class="col-12 form-group">

                                                    <label for="doctor">Doctor:</label>

                                                    <select class="form-control" name="doc_id" id="doctor">


                                                        <option selected="" value="85">Rohan</option>


                                                        <option value="8">suman</option>


                                                    </select>

                                                </div>

                                                <div class="col-12 form-group">

                                                    <label for="treatment">Treatment:</label>

                                                    <select class="form-control" name="treat_id" id="treatment">


                                                        <option value="trt00Cancer">Cancer</option>


                                                        <option value="trt00covid-19">covid-19</option>


                                                    </select>

                                                </div>

                                                <input type="hidden" name="hos_id" id="hos_id" value="msh1">

                                                <input type="hidden" name="p_id" id="p_id" value="msh1632582b8d497f">

                                                <div class="col-6 form-group">

                                                    <button type="button" onclick="cancel()" class="btn btn-block btn-danger">CANCEL</button>

                                                </div>

                                                <div class="col-6 form-group">

                                                    <button type="submit" class="btn btn-block btn-success">ADD</button>

                                                </div>



                                            </div>



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

                <div class="row filter-row">

                    <div class="row doc">
                   
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

                                            <th>Doctor Name</th>

                                            <th>Department</th>

                                            <th>email</th>

                                            <th>Phone</th>

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

                                        <?php //echo "<pre>";print_r($appointments);die;?>
                                                <tr style="margin-bottom: 5px;">

                                                    <td><?php $n = $n + 1;

                                                        echo $n; ?></td>

                                                    <td data-th="Appointment ID:"><span class="a-id" id="<?php echo $x['appt_id']; ?>"><?php echo $x['appt_id']; ?></span></td>

                                                    <td data-th="Patient Name:">
                                                        <!--<img width="28" height="28" src="<?php //echo base_url('images/summer.jpg') 
                                                                                                ?>" class="rounded-circle m-r-5" alt="">--><?php echo $x['pt_name']; ?>
                                                    </td>
                                                    <script>
                                                        // search

                                                        $(document).ready(function() {

                                                            $(".searchdate").on("change", function() {

                                                                var value = $(this).val().toLowerCase();


                                                                console.log(value);
                                                               

                                                                    $(".table tbody tr ").filter(function() {
                                                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                                                    });

                                                            });
                                                            $(".search").on("keyup", function() {

                                                                var date = $(this).val().toLowerCase();


                                                              console.log(date);
                                                                $(".table tbody tr").filter(function() {

                                                                    $(this).toggle($(this).text().toLowerCase().indexOf(date) > -1)

                                                                });

                                                            });
                                                           

                                                        });
                                                    </script>
                                            

                                                    <td data-th="Doctor Name:" class="doctor"><?php echo $x['doc_name']; ?></td>

                                                    <td data-th="Department:"><?php echo $x['dept_id ']; 
                                                                                ?></td>

                                                    <td data-th="email:"><?php echo $x['user_id']; ?></td>

                                                    <td data-th="phone:"><?php echo $x['phone']; ?></td>

                                                    <td data-th="Appointment Date:"><?php echo $x['appt_datetime']; ?></td>

                                                    <td data-th="Appointment Time:"><?php echo $x['appt_slot_time']; ?></td>

                                                    <?php

                                                    $start_time = $x['appt_slot_time'];

                                                    $end_time = strtotime($start_time) + $x['duration_time'] * 60;

                                                    ?>

                                                    <td data-th="End Time: "><?php echo date('H:i', $end_time) ?></td>

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

                                                                <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/editAppointment/' . $x['appt_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                                <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/delAppointment/' . $x['appt_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

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

                        <form method="POST" action="<?php echo site_url('hospital_Controller/save_appointment_data'); ?>">

                            <div class="row">





                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label class="apptt_on">Appointment On:<span class="text-danger">*</span></label>

                                        <select id="apptt_on" name="appt_on" required class="form-control">

                                            <option value="">Select an option</option>

                                            <option value="Doctor">Doctor</option>

                                            <option value="Treatment">Treatment</option>


                                        </select>

                                    </div>

                                </div>





                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Appointment ID</label>

                                        <input class="form-control" type="text" name="appt_id" value="<?php echo uniqid('APPT'); ?>" readonly>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Patient Name</label>

                                        <input class="form-control" type="text" name="pt_name">

                                    </div>

                                </div>



                                <div class="col-md-6 trt" style="display: none">

                                    <div class="form-group">

                                        <label>Treatment</label>

                                        <select class="form-control" id="treat_id" name="treat_id">

                                            <option value="">Select a Treatment</option>
                                            <?php foreach ($treatData as $y) { ?>


                                                <option value="<?php echo $y['treat_id'] ?>"><?php echo $y['treat_name'] ?>
                                                </option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                </div>



                                <div class="col-md-6 doc" style="display: none">

                                    <div class="form-group">

                                        <label>Department</label>

                                        <select class="form-control" id="dept_id" name="dept_id">

                                            <option value="">Select a Department</option>

                                           <?php foreach ($depts as $x) { ?>

                                                <option value="<?php echo $x['dept_name'] ?>"><?php echo $x['dept_name'] ?>
                                                </option>

                                            <?php } ?>

                                           

                                        </select>

                                    </div>

                                </div>

                                <div class="col-md-6 doc">

                                    <div class="form-group">

                                        <label>Doctor</label>

                                        <select class="form-control" id="doc_id" name="doc_id" onchange="getDocName()">
                                            <option value="">Select a Doctor</option>

                                        </select>



                                    </div>

                                </div>


                                <div class="col-md-6 doc" style="display:none">
                                    <div class="form-group">

                                        <label>Appointment Date</label>
                                        <label id="show_orders"></label>
                                        <?php echo '<script>document.getElementByid("show_orders").value</script>';
                                        ?>
                                        <?php if (isset($doctors)) :


                                            foreach ($doctors as $x) :



                                        ?>
                                                <input type="date" name="date" class="input-calendar<?php echo $x['doc_id'] ?> form-control" id="calendar<?php echo $x['doc_id'] ?>" />
                                            <?php endforeach;
                                        else : ?>
                                            <input type="date" name="date" class="form-control"></label>
                                            <!-- <label style="color:blue;line-height:1">Note::you can't select appointments date because doctors is not schedule </label> -->
                                        <?php endif;
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-6 doc" style="display: none">

                                    <div class="form-group">

                                        <label>Time</label>

                                        <div class="time-icon">

                                            <input type="text" class="form-control" id="datetimepicker3" name="time">

                                        </div>

                                    </div>

                                </div>



                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Patient Email</label>

                                        <input class="form-control" type="email" name="email">

                                    </div>

                                </div>

                                <div class="col-md-6 doc" style="display: none">

                                    <div class="form-group">

                                        <label>Phone Number</label>

                                        <input class="form-control" type="text" name="phone">

                                    </div>

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


                                <div class="col-md-6 trt" style="display:none">


                                    <div class="form-group">

                                        <label>Phone Number</label>

                                        <input class="form-control" type="text" name="contact_no">

                                    </div>



                                </div>


                            </div>
                            <div class="row">





                            </div>

                            <div class="m-t-20 text-center">

                                <button class="btn btn-primary submit-btn" type="submit">Create Appointment</button>

                            </div>

                        </form>


                    </div>

                </div>


            </div>



            <script>
                $(document).ready(function() {

                    $('#doc_id').change(function() {

                        var doc_id = $('#doc_id').val();



                        console.log(doc_id);
                        // return;

                        var xhttp = new XMLHttpRequest();

                        xhttp.onreadystatechange = function() {

                            if (this.readyState == 4 && this.status == 200) {

                                // console.log(this.responseText);

                                document.getElementById("doc_res").innerHTML = this.responseText;

                            }

                        };



                        const d = xhttp.open("GET", "<?php echo site_url() ?>/hospital_Controller/checkDoc?q=" + doc_id,
                            true);
                        console.log(d);
                        //    return;

                        xhttp.send();





                    });

                });
            </script>



            <script>
                $(document).ready(function() {
                    $(':input[type="submit"]').prop('disabled', true);

                    $('#doc_id').click(function() {
                        if ($(this).val()) {
                            $(':input[type="submit"]').prop('disabled', false);
                        } else {
                            $(':input[type="submit"]').prop('disabled', true);
                        }


                    })

                });
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

                    <?php //print_r($departments); 

                    ?>

                    <div class="col-lg-8 offset-lg-2">

                        <form method="POST" action="<?php echo site_url('hospital_Controller/edit_appointment_data'); ?>">

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

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Patient Email</label>

                                        <input class="form-control" type="email" name="email" value="<?php echo  $appointment[0]['user_id']; ?>">

                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Department</label>

                                        <select class="form-control" id="dept_id" name="dept_id">

                                            <option value="">Select a Department</option>

                                            <?php foreach ($departments as $x) { ?>

                                                <?php if ($x['dept_id'] == $dept[0]['dept_id']) { ?>

                                                    <option value="<?php echo $x['dept_id'] ?>" selected>
                                                        <?php echo $x['dept_name'] ?></option>

                                                <?php } ?>

                                                <?php if ($x['dept_id'] != $dept[0]['dept_id']) { ?>

                                                    <option value="<?php echo $x['dept_id'] ?>"><?php echo $x['dept_name'] ?>
                                                    </option>

                                            <?php }
                                            } ?>

                                        </select>

                                    </div>

                                </div>



                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Doctor</label>

                                        <select class="form-control" id="doc_id" name="doc_id">



                                            <option value="">Select a Doctor</option>

                                            <option value="<?php echo $doc[0]['doc_id'] ?>" selected>
                                                <?php echo $doc[0]['doc_name'] ?></option>



                                        </select>
                                        <span id="doc_res"></span>

                                    </div>



                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Date</label>

                                        <div class="cal-icon">

                                            <input type="text" class="form-control input-calendar" name="date" value="<?php echo $appointment[0]['appt_datetime'];; ?>">

                                        </div>

                                    </div>

                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Time</label>

                                        <div class="time-icon">

                                            <input type="text" class="form-control" id="datetimepicker3" name="time" value="<?php echo $appointment[0]['appt_slot_time']; ?>">

                                        </div>

                                        <?php

                                        // print_r($doc_sch);

                                        // echo $doc_sch[0]['slots'];

                                        $slots = explode(",", $doc_sch[0]['slots']);

                                        // print_r($slots);

                                        // die;

                                        ?>

                                        <!-- <select class="form-control" name="time" id="time">

                                    <?php

                                    foreach ($slots as $x) {

                                    ?>

                                        <?php if ($x == $appointment[0]['appt_slot_time']) { ?>

                                            <option value="" selected><?php echo $x; ?></option>

                                        <?php } ?>

                                        <?php if ($x != $appointment[0]['appt_slot_time']) { ?>

                                            <option value=""><?php echo $x; ?></option>

                                        <?php } ?>

                                    <?php } ?>

                                </select> -->

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

                                m
                                <div class="col-md-6">
                                    <label>Phone</label>

                                    <input type="text" class="form-control input-phone" name="phone" value="<?php echo $appointment[0]['phone'];; ?>">
                                </div>


                            </div>




                            <div class="m-t-20 text-center">

                                <button class="btn btn-primary submit-btn" type="submit">Save Appointment</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>



        <script>
            $(document).ready(function() {

                $('#doc_id').change(function() {

                    var doc_id = $('#doc_id').val();



                    // console.log(doc_id);
                    // return;

                    var xhttp = new XMLHttpRequest();

                    xhttp.onreadystatechange = function() {

                        if (this.readyState == 4 && this.status == 200) {

                            // console.log(this.responseText);

                            document.getElementById("doc_res").innerHTML = this.responseText;

                        }

                    };



                    const d = xhttp.open("GET", "<?php echo site_url() ?>/hospital_Controller/checkDoc?q=" + doc_id,
                        true);
                    //    console.log(d);
                    //    return;

                    xhttp.send();





                });

            });
        </script>



    <?php elseif ($layout == 3) : ?>

        <!-- Edit TrtAppointments -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <h4 class="page-title">Edit Appointments</h4>

                    </div>

                </div>

                <div class="row">

                    <?php //print_r($departments); 

                    ?>

                    <div class="col-lg-8 offset-lg-2">

                        <form method="POST" action="<?php echo site_url('hospital_Controller/edit_trtappointment_data'); ?>">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Appointment ID</label>

                                        <input class="form-control" type="text" name="appt_id" value="<?php echo $appointment[0]['appt_id']; ?>">

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Patient Name</label>

                                        <input class="form-control" type="text" name="name" value="<?php echo $appointment[0]['name']; ?>">

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Patient Email</label>

                                        <input class="form-control" type="email" name="email" value="<?php echo $appointment[0]['user_id']; ?>">

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Patient Phone Number</label>

                                        <input class="form-control" type="text" name="contact_no" value="<?php echo $appointment[0]['contact_no']; ?>">

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Treatment</label>

                                        <select class="form-control" id="treat_id" name="treat_id">

                                            <option value="">Select a Treatment</option>

                                            <?php foreach ($treatData as $x) { ?>

                                                <?php if ($x['treat_id'] == $appointment[0]['treat_id']) { ?>

                                                    <option value="<?php echo $x['treat_id'] ?>" selected>
                                                        <?php echo $x['treat_name'] ?></option>

                                                <?php } ?>

                                                <?php if ($x['treat_id'] != $appointment[0]['treat_id']) { ?>

                                                    <option value="<?php echo $x['treat_id'] ?>"><?php echo $x['treat_name'] ?>
                                                    </option>

                                            <?php }
                                            } ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Date</label>

                                        <div class="cal-icon">

                                            <input type="text" class="form-control input-calendar" name="date" value="<?php echo $appointment[0]['appt_datetime']; ?>">

                                        </div>

                                    </div>

                                </div>

                            </div>



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

                            <div class="m-t-20 text-center">

                                <button class="btn btn-primary submit-btn" type="submit">Save Appointment</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    <?php endif; ?>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>



    <script>
        function getDocName() {
            var doc_name = $('#doc_id').val();
            console.log(doc_name);
            $.ajax({
                type: 'POST',
                data: {
                    'doc_name': doc_name
                },
                url: "<?php echo base_url('hospital_Controller/get_doc_degee') ?>",
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

            var appt_id = $('.b-id').eq(index).attr('id');

            var appt_status = $('.b-status').eq(index).attr('id');

            $.ajax({

                url: '<?php echo site_url('hospital_Controller/editAppointmentStatustrt') ?>',

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

                url: '<?php echo site_url('hospital_Controller/editAppointmentStatus') ?>',

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

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- <script src="assets/js/jquery-3.2.1.min.js"></script> -->

    <script src="<?php echo base_url('js/jquery.slimscroll.js') ?>"></script>

    <!-- <script src="<?php echo base_url('js/select2.min.js') ?>"></script> -->

    <script src="<?php echo base_url('js/moment.min.js') ?>"></script>

    <script src="<?php echo base_url('js/bootstrap-datetimepicker.min.js') ?>"></script>

    <script src="<?php echo base_url('js/app.js') ?>"></script>

    <script>

        $(function() {

            $('#datetimepicker3').datetimepicker({

                format: 'H:m'



            });

        });

        $(function() {

            var disabledDate = ['2021-03-24', '2021-03-26', '2021-03-25'];

            $('.datetimepicker').datetimepicker({

                disabledDates: disabledDate

            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $('#dept_id').change(function() {

                var dept_id = $('#dept_id').val();

                // console.log('hello');

                // console.log(dept_id);

                var xhttp = new XMLHttpRequest();

                xhttp.onreadystatechange = function() {

                    if (this.readyState == 4 && this.status == 200) {

                        console.log(this.responseText);

                        document.getElementById("doc_id").innerHTML = this.responseText;

                    }

                };



                xhttp.open("GET", "<?php echo site_url() ?>/hospital_Controller/fetchDoc?q=" + dept_id,
                    true);

                xhttp.send();





            });

        });
    </script>

    


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>



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

        $('.input-calendar<?php echo $x['doc_id'] ?>').pignoseCalendar({

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

							   <br />

							   <br />

							   <strong>Events for this date</strong>

							   <br />

							   <br />

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

                                <br />

                                <strong>Events for this date</strong>

                                <br />

                                <br />

                                <div class="active-dates"></div>`;

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



      // Disabled date settings.

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

    <script type="text/javascript" src="<?php echo base_url('css/cssUser/') ?>dist/js/pignose.calendar.full.min.js">
    </script>




</body>



</html>