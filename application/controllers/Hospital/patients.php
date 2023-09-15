<?php
// echo "<pre>";
// print_r($patients);
// die;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/bootstrap-datetimepicker.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <title>Patients</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        .old {
            background-color: yellow;
            color: black;
            text-align: center;
            padding: 5px;
            border-radius: 20px;
        }

        .new {
            background-color: #009efb;
            color: white;
            text-align: center;
            padding: 5px;
            border-radius: 20px;
        }

        .coming-soon {

            color: black;
            text-align: center;


        }

        .wrap {
            width: 100%;
            height: 188px;
            position: absolute;
            top: -8px;
            left: 8px;
            overflow: hidden;
        }

        .wrap:before,
        .wrap:after {
            content: "";
            position: absolute;
        }

        .wrap:before {
            width: 40px;
            height: 8px;
            right: 100px;
            background: #4D6530;
            border-radius: 8px 8px 0px 0px;
        }

        .wrap:after {
            width: 8px;
            height: 40px;
            right: 0px;
            top: 100px;
            background: #4D6530;
            border-radius: 0px 8px 8px 0px;
        }

        /* @media (min-width: 500px) {
            .ribbons-wrapper {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .ribbon {
                width: 48%;
            }
        } */

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
        <!-- Patients List -->
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Patients</h4>
                    </div>

                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="<?php echo site_url('Hospital_Controller/addPatient') ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Patient</a>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-4 search-bar">
                        <input type="text" class="form-control mb-3" placeholder="Search Patients" id="search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped custom-table  mb-0">
                                <thead id="hideData">
                                    <tr style="margin-bottom: 5px;">
                                        <th>#</th>
                                        <th>patient Id</th>
                                        <th>Label</th>
                                        <th>Name</th>
                                        <!-- <th>Age</th> -->
                                        <!-- <th>Gender</th> -->
                                        <!-- <th>Address</th> -->
                                        <!-- <th>WhatsApp</th> -->
                                        <th>Phone</th>
                                        <!-- <th>Email</th> -->
                                        <th class="text-center">Send</th>
                                        <th>Medications</th>
                                        <th>View Details</th>
                                        <th>Prescription</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $time = time();
                                    $year = "YYYY" ?>
                                    <?php $n = 0;

                                    if (count($patients)) :
                                        foreach ($patients as $x) : ?>
                                            <!-- <tr id="notFound" style="display:none"><td colspan="3" >Not Found</td></tr> -->
                        </div>

                        <tr style="margin-bottom: 5px;">
                            <td>
                                <?php
                                            $n = $n + 1;
                                            echo $n;
                                ?>
                            </td>
                            <td data-th="patient Id"> <?php echo $x['p_id'] ?></td>
                            <td>
                                <?php if ($x['label'] == 'old') : ?>
                                    <div class="old">
                                        Old Patient
                                    </div>
                                <?php else : ?>

                                    <div class="new">
                                        New Patient
                                    </div>
                                <?php endif; ?>
                            </td>

                            <td data-th="Name:">
                                <?php echo $x['p_name'] ?>
                            </td>
                            <!-- <td data-th="Age: "><?php echo (date('Y') - date("Y", strtotime($x['dob']))) ?></td>
                            <td data-th="Gender: "><?php echo $x['gender'] ?></td>
                            <td data-th="Address: "><?php echo $x['address'] ?></td>
                            <td data-th="WhatsApp: "><?php echo $x['whatsapp'] ?></td> -->
                            <td data-th="Phone: "><?php echo $x['phone'] ?></td>
                            <!-- <td data-th="Email: "><?php echo $x['email_id'] ?></td> -->
                            <td data-th="Share Medication:">

                                <div class="coming-soon">Coming Soon</div>

                                <!-- <div class="col-2 text-center"> -->
                                <!-- <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" style="padding: 0px !important;" aria-expanded="false"><i class="fa fa-share-alt"> share</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="<?php echo site_url('Hospital_Controller/sendPdfEmail?pid=' . $x['p_id'] . '') ?>" id="#"><i class="fas fa-share" style="font-size: 25px;"></i><span style="color:red; font-size: 35px; padding: 0px 15px; cursor: pointer;">&#x2709;</span></i></a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-share" style="font-size: 25px;"></i></i><i class="fab fa-whatsapp-square" style="color:green; font-size: 35px; padding: 0px 15px; cursor: pointer;"></i></a>
                                        </div>
                                    </div> -->
                                <!-- </div> -->

                                <div class="mob-action text-left">
                                    <a href="<?php echo site_url('Hospital_Controller/sendPdfEmail?pid=' . $x['p_id'] . '') ?>" id="#"><i class="fas fa-share" style="font-size: 25px;"></i><span style="color:red; font-size: 35px; padding: 0px 15px; cursor: pointer;">&#x2709;</span></i></a>
                                    <a href="#"><i class="fas fa-share" style="font-size: 25px;"></i></i><i class="fab fa-whatsapp-square" style="color:green; font-size: 35px; padding: 0px 15px; cursor: pointer;"></i></a>
                                </div>

                            </td>

                            <td data-th="View Medication:"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MedicationModal<?php echo $x['p_id']; ?>">
                                    View Medications
                                </button></td>

                            <td data-th="Send History:"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $x['p_id']; ?>exampleModalLong">
                                    View History
                                </button></td>

                            <td data-th="E-Prescription:"> <a href="<?php echo site_url('Medications_pdf_controller/generatePdf/' . $x['p_id']) ?>" target="_blank"><i class="fa fa-file-pdf-o" style="font-size:30px;color:red"></i></a></td>



                            <td data-th="Action: " class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="<?php echo site_url('Hospital_Controller/editPatient/' . $x['p_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="<?php echo site_url('Hospital_Controller/delPatient/' . $x['p_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>
                                    </div>
                                </div>

                                <div class="mob-action text-left">
                                    <a class="" href="<?php echo site_url('Hospital_Controller/editPatient/' . $x['p_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                    <a style="padding: 27px;" class="" href="<?php echo site_url('Hospital_Controller/delPatient/' . $x['p_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal -->

                        <div class="modal fade" id="<?php echo $x['p_id']; ?>exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Patient History</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row p-2">
                                                <div class="col-12">
                                                    <h4><strong>Patient Name: </strong><?php echo $x['p_name'] ?></h4>
                                                </div>
                                            </div>

                                            <?php
                                            foreach ($treat_history as $y) :

                                                if ($x['p_id'] == $y['p_id']) { ?>

                                                    <div class="row">
                                                        <div class="col"><strong>Department</strong></div>
                                                        <div class="col"><strong>Treatment</strong></div>
                                                        <div class="col"><strong>From Date</strong></div>
                                                        <div class="col"><strong>To Date</strong></div>
                                                    </div>

                                                    <div class="row">

                                                        <form id="add-details<?php echo $y['tret_id']; ?>" action="<?php echo site_url('Hospital_Controller/updateHosTreat') ?>" method="post">
                                                            <?php echo '<div class="col">' . $y['dept_name'] . '</div>' ?>
                                                            <?php echo '<div class="col">' . $y['treat_name'] . '</div>' ?>
                                                            <?php echo '<div class="col">' . $y['from_date'] . '</div>' ?>
                                                            <?php echo '<div class="col">' . $y['to_date'] . '</div>' ?>
                                                    </div>

                                                    <small class="hide" style="display: none;"> From Date - </small>
                                                    <input type="date" class="form-control my-1" id="f_d<?php echo $y['tret_id']; ?>" style="display: none;" name="f_d" value="<?php echo $y['from_date'] ?>">
                                                    <small class="hide" style="display: none;"> To Date - </small>
                                                    <input type="date" class="form-control" id="t_d<?php echo $y['tret_id']; ?>" style="display: none;" name="t_d" value="<?php echo $y['to_date'] ?>">



                                                    <hr>

                                                    <div class="row">

                                                        <div class="col-12"><strong>Details : </strong>

                                                            <p id="details<?php echo $y['tret_id']; ?>"><?php echo $y['details']; ?></p>



                                                            <input type="hidden" id="p_id" name="treat_id" value="<?php echo $y['tret_id']; ?>">

                                                            <textarea style="display:none" name="details" class="form-control" name="" id="edit-details<?php echo $y['tret_id']; ?>" cols="10" rows="2"><?php echo $y['details']; ?></textarea>

                                                            <a href="javascript:void(0)" id="edit-btn<?php echo $y['tret_id']; ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit Details</a>

                                                            <button type="submit" class="btn-small btn-success my-1" style="display: none; float:right" id="save-btn<?php echo $y['tret_id']; ?>"> Save</button>

                                                            </form>

                                                        </div>

                                                    </div>

                                                    <hr>

                                            <?php }

                                            endforeach; ?>



                                        </div>

                                    </div>

                                    <!-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="modal sharemodal" id="ShareModal<?php echo $x['p_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>Share Medication</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="container col">
                                            <h4>Share via:</h4>
                                            <div style="display: flex; height: 140px; justify-content: flex-start; align-items: center; align-content: center;">

                                                <a href="#" style="margin: 10px; text-align: center;">
                                                    <h2 style="border: 1px solid transparent; background-color: #25D366; color: white; padding: 8px 16px;border-radius: 50%;font-size: 50px;"><i class="fab fa-whatsapp"></i></h2>

                                                    <span>Whatsapp</span>

                                                </a>

                                                <a href="<?php echo site_url('Hospital_Controller/sendPdfEmail?pid=' . $x['p_id'] . '') ?>" style="margin: 10px; text-align: center;">
                                                    <h2 style="border: 1px solid transparent; background-color: #BB001B; color: white; padding: 10px 18px;border-radius: 50%;font-size: 45px;margin: 10px;"><i class="far fa-envelope"></i></i></h2>
                                                    <span>Email</span>
                                                </a>

                                                <a href="<?php echo site_url('Hospital_Controller/viewMedication?pid=' . $x['p_id'] . '') ?>" style="margin: 10px; text-align: center;">

                                                    <h2 style="border: 1px solid transparent; background-color: grey; color: white; padding: 10px 18px;border-radius: 50%;font-size: 45px;margin: 10px;"><i class="fa fa-print" aria-hidden="true"></i></i></h2>
                                                    <span>Print</span>
                                                </a>
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



                        <div class="modal fade" id="exampleModal<?php echo $x['p_id']; ?>" tabindex="-100" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">

                                <div class="modal-content" style="margin-right:200px!important;width:600px;max-height:100vh;">
                                    <form method="POST" action="<?php echo base_url('Hospital_Controller/addSymptoms') ?>">
                                        <h3 class="text-center">Add
                                            <button type="button" class="btn btn" onclick="showpage()" style="margin-left:250px" data-dismiss="modal">X</button>
                                        </h3>

                                        <div class="modal-body">

                                            <input type="hidden" name="p_id" value="<?php echo $x['p_id'] ?>">
                                            Symptoms <input type="text" name="symptoms" class="form-control">
                                            Provisional Diagnosis <input type="text" name='provisional' class="form-control" required>


                                        </div>
                                        <div class="modal-footer">

                                            <button type="submit" class="btn btn-primary">Add Symptom</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>






                        <div class="modal fade" id="exampleModal1<?php echo $x['p_id']; ?>" tabindex="-100" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">

                                <div class="modal-content" style="margin-right:200px!important;width:600px;max-height:100vh;">
                                    
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <h3 class="mt-3">Add advice</h3>
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button" class="btn btn" onclick="showpage()" data-dismiss="modal">X</button>

                                                </div>
                                            </div>

                                        </div>


                                        <div class="modal-body">
                                        <form action="<?php echo base_url('hospital_Controller/add_advice/'.$x['p_id'])?>" method="POST">
                                    
                                    <input type="hidden" name="p_id" value="<?php echo $x['p_id'] ?>">
                                       <label>Advice</label>
                                       <input type="text" name="advice[]" placeholder="write advice" class="form-control">
                                       <br>
                                       <input type="text" name="advice[]" placeholder="write advice" class="form-control">

                                       <fieldset id="buildyourform">
                                           
                                       </fieldset>
                                    
                                       <br>
                                       <button class="btn btn-primary" id="add">Add more Advice +</button>
                                       <div class="modal-footer">
                                       <button type="submit" class="btn btn-primary">Add Advice</button>
                                   </div>    
                                   </form>
                                        
                                    </div>

                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $("#add").click(function(event) {

                                                    var lastField = $("#buildyourform div:last");
                                                    var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                                                    var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
                                                    fieldWrapper.data("idx", intId);
                                                    var fName = $("<br><input type=\"text\"  value='ss' name=\"advice[]\" placeholder=' write Advice' class=\"fieldname form-control \" />");
                                                    
                                                    var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" style='margin-left:543px;marfin-top:20px' />");
                                                    removeButton.click(function() {
                                                        $(this).parent().remove();
                                                    });
                                                    fieldWrapper.append(fName);
                                                   
                                                    fieldWrapper.append(removeButton);

                                                    $("#buildyourform").append(fieldWrapper);


                                                    event.preventDefault();
                                                });

                                            });
                                        </script>

                                  

                                </div>
                            </div>
                        </div>



                        <!-- Modal -->
                        <div class="modal fade" id="MedicationModal<?php echo $x['p_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="MedicationModal" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content" id="hidetreat">
                                    <div class="modal-header">
                                        <h3 class="modal-title text-center" id="exampleModalLongTitle">Prescribed Medications</h3>
                                        <div>
                                            <!-- Button trigger modal -->
                                            <button type="button" data-dismiss="modal" aria-label="close" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $x['p_id']; ?>">
                                                symptoms
                                            </button>

                                            <button type="button" data-dismiss="modal" aria-label="close" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1<?php echo $x['p_id']; ?>">
                                                Advice
                                            </button>



                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    </div>

                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row p-2 mb-2 mdl-mob" style="display: none;">
                                                <div class="col-12">
                                                    <h4 class="text-dark">Patient Name:&nbsp;&nbsp;<strong><?php echo $x['p_name'] ?></strong></h4>
                                                    <?php foreach ($medicines as $z) : ?>
                                                        <?php if ($z['p_id'] != $x['p_id']) {
                                                            continue;
                                                        } ?>

                                                        <div class="p-2 border-top border-bottom" style="white-space: nowrap;">

                                                            <p><strong>Medicine Name: </strong>&emsp;&emsp;&ensp;<?php echo $z['medicine'] ?></p>
                                                            <p><strong>Dosage: </strong>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<?php echo $z['dosage'] ?> </p>
                                                            <p><strong>Prescribed Date: </strong>&emsp;&emsp;<?php echo date("d/m/Y", strtotime($z['created_at'])) ?></p>

                                                            <p><strong>Prescribed Time: </strong>&emsp;&emsp;<?php echo date("g:i A", strtotime($z['created_at'])) ?></p>

                                                            <p><strong>Duration<small>(in days)</small>: </strong>&emsp;&emsp;&ensp;<?php echo $z['duration'] ?></p>

                                                            <!-- <p><strong>Assigned Doctor: </strong>&emsp;&ensp;&nbsp;<?php echo $z['doc_name'] ?></p> -->

                                                        </div>

                                                    <?php endforeach; ?>

                                                </div>

                                            </div>

                                            <div class="row p-2 mb-2 mdl">

                                                <div class="col-12">

                                                    <h4 class="text-dark">Patient Name:&nbsp;&nbsp;<strong><?php echo $x['p_name'] ?></strong></h4>

                                                </div>

                                            </div>

                                            <div class="row p-2 border-top border-bottom mdl">

                                                <div class="col text-center">

                                                    <h4>Medicine Name</h4>

                                                </div>

                                                <div class="col text-center">

                                                    <h4>Dosage</h4>

                                                </div>

                                                <!-- <div class="col-4 text-center">

                                                <h4>Prescribed <nobr>Date & Time</nobr>

                                                </h4>

                                                </div> -->

                                                <div class="col text-center">

                                                    <h4>Duration <br><small>(in days)</small></h4>

                                                </div>

                                                <div class="col text-center">

                                                    <h4>Medicine Time</h4>

                                                </div>

                                                <!--<div class="col-2 text-center">
                                                <h4>Assigned Doctor</h4>
                                                </div> -->

                                                <!-- <div class="col-1 text-center">
                                                    <h4>E-perception </h4>    
                                                </div> -->

                                                <div class="col text-center">

                                                    <h4>Action</h4>

                                                </div>

                                            </div>

                                            <?php foreach ($medicines as $z) : ?>

                                                <?php if ($z['p_id'] != $x['p_id']) {

                                                    continue;
                                                } ?>

                                                <div id="dataShow<?php echo $z['id'] ?>" class="row p-2 border-bottom mdl">

                                                    <div id="medShw<?php echo $z['id'] ?>" class="col text-center"><?php echo $z['medicine'] ?></div>

                                                    <div id="dosShw<?php echo $z['id'] ?>" class="col text-center"><?php echo $z['dosage'] ?> </div>

                                                    <div id="durShw<?php echo $z['id'] ?>" class="col text-center"><?php echo $z['duration'] ?></div>

                                                    <!-- <div class="col text-center"><?php echo date("d/m/Y", strtotime($z['created_at'])) . ' ' . date("g:i A", strtotime($z['created_at'])) ?></div> -->

                                                    <div class="col text-center"><?php echo $z['medicine_time'] ?></div>

                                                    <!--<div class="col-2 text-center"><?php echo $z['doc_name'] ?></div> -->

                                                    <!-- <div class="col-1 text-center">   <a href="<?php echo site_url('Medications_pdf_controller/generatePdf/' . $z['id']) ?>"
                                                    target="_blank"><i class="fa fa-file-pdf-o"
                                                    style="font-size:30px;color:red"></i></a></div> -->



                                                    <div class="col text-center">

                                                        <div class="dropdown dropdown-action">

                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                                                            <div class="dropdown-menu dropdown-menu-right">

                                                                <a class="dropdown-item" id="edit<?php echo $z['id'] ?>" href="javascript:void(0)"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                                <a class="dropdown-item" href="<?php echo site_url('Hospital_Controller/delete_patients_medicine/' . $z['id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div id="dataEdit<?php echo $z['id'] ?>" style="display:none;" class="row p-2 border-bottom">
                                                    <form id="medForm<?php echo $z['id'] ?>" action="<?php echo site_url('Hospital_Controller/edit_patients_medicine/' . $z['id']) ?>" method="POST">
                                                        <input type="hidden" name="hos_id" id="hos_id" value="<?php echo $x['hos_id']; ?>">
                                                        <input type="hidden" name="p_id" id="p_id" value="<?php echo $x['p_id']; ?>">
                                                        <div class="col-3 "><input type="text" name="medicine" class="form-control" value="<?php echo $z['medicine'] ?>" id="medicine" required></div>
                                                        <div class="col-2 ">
                                                            <textarea rows="3" name="dosage" class="form-control" value="<?php echo $z['dosage'] ?>" id="dosage" required><?php echo $z['dosage']; ?></textarea>
                                                        </div>

                                                        <div class="col-2">
                                                            <input type="number" name="duration" class="form-control" value="<?php echo $z['duration'] ?>" id="duration" required>
                                                        </div>

                                                        <!-- <div class="col-3 "><?php echo date("d/m/Y", strtotime($z['created_at'])) . ' ' . date("g:i A", strtotime($z['created_at'])) ?></div> -->

                                                        <div class="col">

                                                            <select name="medicine_time" class="form-control" required>
                                                                <option value="After Food" <?php echo $z['medicine_time'] === 'After Food' ? 'selected' : ''; ?>>After Food</option>
                                                                <option value="Before Food" <?php echo $z['medicine_time'] === 'Before Food' ? 'selected' : ''; ?>>Before Food</option>
                                                                <option value="Empty Stomach" <?php echo $z['medicine_time'] === 'Empty Stomach' ? 'selected' : ''; ?>>Empty Stomach</option>
                                                            </select>

                                                        </div>


                                                        <div class="col mr-3"><button type="submit" class="btn btn-block btn-success btn-lg"> SAVE</button></div>
                                                    </form>
                                                </div>
                                            <?php endforeach; ?>

                                            <div class="row add_btn justify-content-center p-2">
                                                <div class="col-5">
                                                    <button onclick="add()" class="btn btn-block btn-primary">Add Medicine</button>
                                                </div>
                                            </div>

                                            <div style="display:none" class="medForm mt-2 row p-2 border border-muted">
                                                <form id="add-medicine<?php echo $x['p_id'] ?>" action="<?php echo site_url('Hospital_Controller/add_patients_medicine') ?>" method="post">

                                                    <div class="col-12 form-group">

                                                        <label for="medicine">Medicine Name:</label>

                                                        <input type="text" name="medicine" class="form-control" id="medicine" required>

                                                    </div>


                                                    <div class="col-12 form-group">

                                                        <label for="duration">Duration <small>(in days)</small> :</label>

                                                        <input type="number" name="duration" class="form-control" id="duration" required>

                                                    </div>

                                                    <div class="col-12 form-group">

                                                        <label for="dosage">Dosage:</label><br>
                                                        <!-- <textarea rows="3" name="dosage" class="form-control" id="dosage"></textarea> -->
                                                        <!-- <input type="checkbox" name="dosage[]" class="mr-2 ml-2"  style ="" value = "1 Morning"><label>1 - Morning</label>
                                                        <input type="checkbox" name="dosage[]" class="mr-2 ml-2"  style ="" value = "1 Aft"><label>1 - Afternoon</label>
                                                        <input type="checkbox" name="dosage[]" class="mr-2 ml-2"  style ="" value = "1 Eve"><label>1 - Evening</label>
                                                        <input type="checkbox" name="dosage[]" class="mr-2 ml-2" style ="" value = "1 Night"><label>1 - Night</label> -->
                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <input type="checkbox" name="dosage[]" class="mr-2 ml-2" id="morning">
                                                                <label>Morning <input type="radio" name="mor_dosage" class="mr-2 ml-2" value="1">1
                                                                    <input type="radio" name="mor_dosage" class="mr-2 ml-2" value="1/2"></label>1/2
                                                            </div>

                                                            <div class="mr-5">
                                                                <input type="checkbox" name="dosage[]" class="mr-2 ml-2" id="aft">
                                                                <label>Afternoon <input type="radio" name="aft_dosage" class="mr-2 ml-2" value="1">1
                                                                    <input type="radio" name="aft_dosage" class="mr-2 ml-2" value="1/2"></label>1/2 <br>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <input type="checkbox" name="dosage[]" class="mr-2 ml-2" id="eve">
                                                                <label>Evening <input type="radio" name="eve_dosage" class="mr-2 ml-2" value="1">1
                                                                    <input type="radio" name="eve_dosage" class="mr-2 ml-2" value="1/2"></label>1/2

                                                            </div>
                                                            <div class="" style="margin-right:80px;">
                                                                <input type="checkbox" name="dosage[]" class="mr-2 ml-2" id="night">
                                                                <label>Night <input type="radio" name="nit_dosage" class="mr-2 ml-2" value="1">1
                                                                    <input type="radio" name="nit_dosage" class="mr-2 ml-2" value="1/2"></label>1/2 <br>
                                                            </div>

                                                        </div>


                                                    </div>

                                                    <div class="col-12 form-group">

                                                        <label for="dosage">Medicine Time:</label><br>
                                                        <!-- <textarea rows="3" name="dosage" class="form-control" id="dosage"></textarea> -->
                                                        <input type="radio" name="medicine_time" class="mr-2 ml-2" style="" value="Before Food" required><label>Before Food</label>
                                                        <input type="radio" name="medicine_time" class="mr-2 ml-2" style="" value="After Food" required><label>After Food</label>
                                                        <input type="radio" name="medicine_time" class="mr-2 ml-2" style="" value="Empty Stomach" required><label>Empty Stomach</label>
                                                    </div>




                                                    <!-- <div class="col-12 form-group">

                            <label for="doctor">Doctor:</label>

                            <select class="form-control" name="doc_id" id="doctor">

                                <?php foreach ($doctors as $d) : ?>

                                    <option <?php if ($d['doc_id'] == $x['doc_id']) {

                                                    echo 'selected';
                                                } ?> value="<?php echo $d['doc_id'] ?>"><?php echo $d['doc_name'] ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div> -->

                                                    <!-- <div class="col-12 form-group">
                            <label for="treatment">Treatment:</label>
                            <select class="form-control" name="treat_id" id="treatment">
                                <?php foreach ($treatments as $t) : ?>
                                    <option <?php //if($t['treat_id'] == $x['treat_id']){ echo 'selected';} 
                                            ?> value="<?php echo $t['treat_id'] ?>"><?php echo $t['treat_name'] ?></option>
                                <?php endforeach; ?>

                            </select>

                        </div> -->

                                                    <input type="hidden" name="hos_id" id="hos_id" value="<?php echo $x['hos_id']; ?>">
                                                    <input type="hidden" name="p_id" id="p_id" value="<?php echo $x['p_id']; ?>">
                                                    <div class="col-6 form-group">
                                                        <button type="button" onclick="cancel()" class="btn btn-block btn-danger">CANCEL</button>
                                                    </div>
                                                    <div class="col-6 form-group">
                                                        <button type="submit" class="btn btn-block btn-success">ADD</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> -->
                                </div>

                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php else : ?>
                    <?php echo "<span style='color:red'>No Patient Added</span><script>document.getElementById('hideData').style.display='none'</script>" ?>
                <?php endif; ?>
                </tbody>

                </table>

                    </div>
                </div>
            </div>
        </div>
        </div>


    <?php elseif ($layout == 1) : ?>
        <!-- Add Patient -->
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Patient</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" action="<?php echo site_url('Hospital_Controller/addPatient') ?>">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Patient ID: </label>
                                        <input class="form-control" readonly name="p_id" value="<?php echo $hos_id . random_int(100000, 999999); ?>" type="text">
                                        <input readonly name="hos_id" value="<?php echo $hos_id ?>" type="hidden">
                                        <input type="hidden" name="label" id="label">
                                    </div>

                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Doctor: <span class="text-danger">*</span></label>
                                        <select name="doc_id" class="form-control">
                                            <option value="">Select a Doctor</option>
                                            <?php foreach ($docs as $x) : ?>
                                                <option value="<?php echo $x['doc_id'] ?>" <?php echo set_value("doc_id") == $x['doc_id'] ? "selected" : ""; ?>> <?php echo 'Dr. ' . $x['doc_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('doc_id') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Full Name: <span class="text-danger">*</span></label>
                                        <input class="form-control" name="p_name" id="p_name" type="text" value="<?php echo set_value("p_name"); ?>">
                                        <span class="text-danger"><?php echo form_error('p_name') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Email ID: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email_id" id="email_id" value="<?php echo set_value("email_id"); ?>">
                                        <span class="text-danger"><?php echo form_error('email_id') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Date of Birth: <span class="text-danger"></span></label>
                                        <input type="date" class="form-control" name="dob" id="from_date" value="<?php echo set_value("dob"); ?>">
                                        <span class="text-danger"><?php echo form_error('dob') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label> Age: <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="age" id="from_date" value="<?php echo set_value("age"); ?>">
                                        <span class="text-danger"><?php echo form_error('age') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Gender: <span class="text-danger">*</span></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" value="male" class="form-check-input" <?php echo set_value('gender') == "male" ? "checked" : ""; ?>>Male
                                            </label>
                                        </div>

                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" value="female" class="form-check-input" <?php echo set_value('gender') == "female" ? "checked" : ""; ?>>Female
                                            </label>
                                        </div>
                                        <span class="text-danger mt-4"><?php echo form_error('gender') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>House No : <span class="text-danger"></span></label>
                                        <input class="form-control" type="number" name="house_no" id="House_no" value="<?php echo set_value("House_no"); ?>">
                                        <span class="text-danger"><?php echo form_error('House_no') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Phone No : <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="phone" id="phone" value="<?php echo set_value("phone"); ?>">
                                        <span class="text-danger"><?php echo form_error('phone') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>WhatsApp: <span class="text-danger"></span></label>
                                        <input class="form-control" type="number" name="whatsapp" id="whatsapp" value="<?php echo set_value("whatsapp"); ?>">
                                        <span class="text-danger"><?php echo form_error('whatsapp') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="address" id="address" value="<?php echo set_value("address"); ?>">
                                        <span class="text-danger"><?php echo form_error('address') ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>City <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="city" id="city" value="<?php echo set_value("city"); ?>">
                                        <span class="text-danger"><?php echo form_error('city') ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>State <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="state" id="state" value="<?php echo set_value("state"); ?>">
                                        <span class="text-danger"><?php echo form_error('state') ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Pincode <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="pincode" id="pincode" value="<?php echo set_value("pincode"); ?>">
                                        <span class="text-danger"><?php echo form_error('pincode') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Loyalty Card No : <span class="text-danger"></span></label>
                                        <input class="form-control" type="number" name="Loyalty_card_No" id="Loyalty_card_No" value="<?php echo set_value("Loyalty_card_No"); ?>">
                                        <span class="text-danger"><?php echo form_error('Loyalty_card_No') ?></span>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Visit Type: <span class="text-danger"></span></label>
                                        <select name="visit_type" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Centre visit">Centre visit</option>
                                            <option value="home collection">home collection</option>
                                        </select>

                                        <span class="text-danger"><?php echo form_error('visit_type') ?></span>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Remarks : <span class="text-danger"></span></label>
                                        <input class="form-control" type="number" name="remarks" id="remarks" value="<?php echo set_value("remarks"); ?>">
                                        <span class="text-danger"><?php echo form_error('remarks') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Passport No : <span class="text-danger"></span></label>
                                        <input class="form-control" type="number" name="Passport_no" id="passport_no" value="<?php echo set_value("Passport_no"); ?>">
                                        <span class="text-danger"><?php echo form_error('Passport_no') ?></span>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Report Dispatch Mode: <span class="text-danger"></span></label>

                                        <select name="report_dispatch_mode" class="form-control">
                                            <option value="">Select </option>
                                            <option value="Hard copy">Hard copy</option>
                                            <option value="Email ">Email </option>
                                            <option value="WhatsApp ">WhatsApp </option>
                                        </select>

                                        <span class="text-danger"><?php echo form_error('eport dispatch mode') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>SRF ID: <span class="text-danger"></span></label>
                                        <input type="text" name="srf_id" class="form-control">

                                        <span class="text-danger"><?php echo form_error('srf_id') ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Prebooking Reference No: <span class="text-danger"></span></label>
                                        <input type="text" name="prebooking_reference_no" class="form-control">

                                        <span class="text-danger"><?php echo form_error('prebooking_reference_no') ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sample Collection Time: <span class="text-danger">*</span></label>
                                        <input type="time" name="sample_col_time" class="form-control">

                                        <span class="text-danger"><?php echo form_error('sample_col_time') ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Barcode: <span class="text-danger"></span></label>
                                        <input type="text" name="barcode" class="form-control">
                                        <span class="text-danger"><?php echo form_error('barcode') ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Upload Attachment: <span class="text-danger"></span></label>
                                        <input type="file" name="attachment" class="form-control">

                                        <span class="text-danger"><?php echo form_error('attachment') ?></span>
                                    </div>
                                </div>


                                <div class="m-t-20 text-center">
                                    <button type="submit" onclick="clicked()" class="btn btn-primary submit-btn">Add Patient</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--.......Edit Patient....... -->
    <?php elseif ($layout == 2) : ?>
        <!-- Edit Patient -->
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Patient</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" action="<?php echo site_url('hospital_Controller/editPatient/' . $this->uri->segment(3)) ?>">
                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Patient ID: </label>
                                        <input class="form-control" readonly name="p_id" value="<?php echo $pData[0]['p_id'] ?>" type="text">

                                        <input type="hidden" name="label" id="label">
                                    </div>

                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Doctor: <span class="text-danger">*</span></label>
                                        <select name="doc_id" class="form-control">
                                            <option value="<?php echo $pData[0]['doc_name'] ?>"><?php echo "Dr." . $pData[0]['doc_name'] ?></option>
                                            <?php foreach ($docs as $x) : ?>
                                                <option value="<?php echo $x['doc_id'] ?>" <?php echo set_value("doc_id") == $x['doc_id'] ? "selected" : ""; ?>> <?php echo 'Dr. ' . $x['doc_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('doc_id') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Full Name: <span class="text-danger">*</span></label>
                                        <input class="form-control" name="p_name" id="p_name" type="text" value="<?php echo $pData[0]['p_name']; ?>">
                                        <span class="text-danger"><?php echo form_error('p_name') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Email ID: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email_id" id="email_id" value="<?php echo $pData[0]['email_id']; ?>">
                                        <span class="text-danger"><?php echo form_error('email_id') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Date of Birth: <span class="text-danger"></span></label>
                                        <input type="date" class="form-control" name="dob" id="from_date" value="<?php echo $pData[0]['dob']; ?>">
                                        <span class="text-danger"><?php echo form_error('dob') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label> Age: <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="age" id="from_date" value="<?php echo $pData[0]['age']; ?>">
                                        <span class="text-danger"><?php echo form_error('age') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Gender: <span class="text-danger">*</span></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" value="male" class="form-check-input" <?php echo set_value('gender') == "male" ? "checked" : ""; ?>>Male
                                            </label>
                                        </div>

                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" value="female" class="form-check-input" <?php echo set_value('gender') == "female" ? "checked" : ""; ?>>Female
                                            </label>
                                        </div>
                                        <span class="text-danger mt-4"><?php echo form_error('gender') ?></span>
                                    </div>
                                </div>



                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Phone No : <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="phone" id="phone" value="<?php echo $pData[0]["phone"]; ?>">
                                        <span class="text-danger"><?php echo form_error('phone') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>WhatsApp: <span class="text-danger"></span></label>
                                        <input class="form-control" type="number" name="whatsapp" id="whatsapp" value="<?php echo $pData[0]['whatsapp']; ?>">
                                        <span class="text-danger"><?php echo form_error('whatsapp') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="address" id="address" value="<?php echo $pData[0]['address']; ?>">
                                        <span class="text-danger"><?php echo form_error('address') ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>City <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="city" id="city" value="<?php echo $pData[0]['city']; ?>">
                                        <span class="text-danger"><?php echo form_error('city') ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>State <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="state" id="state" value="<?php echo $pData[0]['state']; ?>">
                                        <span class="text-danger"><?php echo form_error('state') ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Pincode <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="pincode" id="pincode" value="<?php echo $pData[0]['pincode'] ?>">
                                        <span class="text-danger"><?php echo form_error('pincode') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>House No : <span class="text-danger"></span></label>
                                        <input class="form-control" type="number" name="house_no" id="House_no" value="<?php echo $pData[0]['house_no'] ?>">
                                        <span class="text-danger"><?php echo form_error('House_no') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Loyalty Card No : <span class="text-danger"></span></label>
                                        <input class="form-control" type="number" name="Loyalty_card_No" id="Loyalty_card_No" value="<?php echo $typedata[0]["loyalty_card_No"]; ?>">
                                        <span class="text-danger"><?php echo form_error('Loyalty_card_No') ?></span>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Visit Type: <span class="text-danger"></span></label>
                                        <select name="visit_type" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Centre visit">Centre visit</option>
                                            <option value="home collection">home collection</option>
                                        </select>

                                        <span class="text-danger"><?php echo form_error('visit_type') ?></span>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Remarks : <span class="text-danger"></span></label>
                                        <input class="form-control" type="number" name="remarks" id="remarks" value="<?php echo $typedata[0]["remarks"]; ?>">
                                        <span class="text-danger"><?php echo form_error('remarks') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Passport No : <span class="text-danger"></span></label>
                                        <input class="form-control" type="number" name="Passport_no" id="passport_no" value="<?php $typedata[0]["passport_no"]; ?>">
                                        <span class="text-danger"><?php echo form_error('Passport_no') ?></span>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Report Dispatch Mode: <span class="text-danger"></span></label>

                                        <select name="report_dispatch_mode" class="form-control">
                                            <option value="">Select </option>
                                            <option value="Hard copy">Hard copy</option>
                                            <option value="Email ">Email </option>
                                            <option value="WhatsApp ">WhatsApp </option>
                                        </select>

                                        <span class="text-danger"><?php echo form_error('eport dispatch mode') ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>SRF ID: <span class="text-danger"></span></label>
                                        <input type="text" name="srf_id" class="form-control" value="<?php echo $typedata[0]['srf_id'] ?>">

                                        <span class="text-danger"><?php echo form_error('srf_id') ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Prebooking Reference No: <span class="text-danger"></span></label>
                                        <input type="text" name="prebooking_reference_no" class="form-control" value="<?php echo $typedata[0]['prebooking_reference_no'] ?>">

                                        <span class="text-danger"><?php echo form_error('prebooking_reference_no') ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sample Collection Time: <span class="text-danger"></span></label>
                                        <input type="time" value="<?php echo $typedata[0]['sample_col_time'] ?>" name="sample_col_time" class="form-control">

                                        <span class="text-danger"><?php echo form_error('sample_col_time') ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Barcode: <span class="text-danger"></span></label>
                                        <input type="text" value="<?php echo $typedata[0]['barcode'] ?>" name="barcode" class="form-control">
                                        <span class="text-danger"><?php echo form_error('barcode') ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Upload Attachment: <span class="text-danger"></span></label>
                                        <input type="file" name="attachment" class="form-control">

                                        <span class="text-danger"><?php echo form_error('attachment') ?></span>
                                    </div>
                                </div>


                                <div class="m-t-20 text-center">
                                    <button type="submit" onclick="clicked()" class="btn btn-primary submit-btn">Edit Patient</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('js/jquery.slimscroll.js') ?>"></script>
    <script src="<?php echo base_url('js/select2.min.js') ?>"></script>
    <script src="<?php echo base_url('js/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('js/bootstrap-datetimepicker.min.js') ?>"></script>
    <script src="<?php echo base_url('js/app.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



    <script>
        $(document).ready(function() {
            // select notFound row
            var notFound = $("#notFound")
            // make it hidden by default
            notFound.hide()
            $('input[name="mor_dosage"]').on("click", function() {
                var data = $('input[name="mor_dosage"]:checked').val();
                // alert(data);

                document.getElementById("morning").setAttribute("value", data + " Morning");
            });

            $('input[name="aft_dosage"]').on("click", function() {
                var data = $('input[name="aft_dosage"]:checked').val();
                // alert(data);

                document.getElementById("aft").setAttribute("value", data + " Aft");
            });

            $('input[name="eve_dosage"]').on("click", function() {
                var data = $('input[name="eve_dosage"]:checked').val();
                // alert(data);

                document.getElementById("eve").setAttribute("value", data + " Eve");
            });

            $('input[name="nit_dosage"]').on("click", function() {
                var data = $('input[name="nit_dosage"]:checked').val();
                // alert(data);

                document.getElementById("night").setAttribute("value", data + " Night");
            });

            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase()
                // select all items
                var allItems = $(".table tbody tr ")

                // get list of matched items, (do not toggle them)
                var matchedItems = $(".table tbody tr").filter(function() {
                    return $(this).text().toLowerCase().indexOf(value) > -1
                });
                // hide all items first
                allItems.toggle(false)
                // then show matched items
                matchedItems.toggle(true)
                // if no item matched then show notFound row, otherwise hide it
                if (matchedItems.length == 0) notFound.show()
                else notFound.hide().allItems;
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            var flag = 1;

            <?php foreach ($treat_history as $y) : ?>

                $("#edit-btn<?php echo $y['tret_id'] ?>").click(

                    function() {



                        if (flag == 1) {

                            $("#details<?php echo $y['tret_id']; ?>").hide();
                            $("#edit-details<?php echo $y['tret_id']; ?>").show();
                            $("#f_d<?php echo $y['tret_id']; ?>").show();
                            $("#t_d<?php echo $y['tret_id']; ?>").show();
                            $("#save-btn<?php echo $y['tret_id']; ?>").show();
                            $(".hide").show();
                            flag = 0;
                        } else {
                            $("#details<?php echo $y['tret_id']; ?>").show();
                            $("#edit-details<?php echo $y['tret_id']; ?>").hide();
                            $("#f_d<?php echo $y['tret_id']; ?>").hide();
                            $("#t_d<?php echo $y['tret_id']; ?>").hide();
                            $("#save-btn<?php echo $y['tret_id']; ?>").hide();
                            $(".hide").hide();
                            flag = 1;

                        }

                    }

                )



                $("#add-details<?php echo $y['tret_id']; ?>").submit(function(event) {



                    var formData = {
                        treat_id: <?php echo $y['tret_id']; ?>,
                        details: $("#edit-details<?php echo $y['tret_id']; ?>").val(),
                    };

                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('doctorProfile_Controller/updateDocTreat') ?>",
                        data: formData,
                        dataType: "json",
                        encode: true,

                    }).done(function(data) {
                        console.log(data);
                    });

                    event.preventDefault();
                });
            <?php endforeach; ?>

            <?php foreach ($medicines as $z) : ?>
                $('#edit<?php echo $z['id'] ?>').click(function() {
                    $('#dataShow<?php echo $z['id'] ?>').hide();
                    $('#dataEdit<?php echo $z['id'] ?>').show();
                });

                $('#medForm<?php echo $z['id'] ?>').submit(function(event) {
                    var data = $('#medForm<?php echo $z['id'] ?>').serialize();
                    var form_action = $('#medForm<?php echo $z['id'] ?>').prop('action');
                    // console.log(data);
                    event.preventDefault();

                    $.ajax({
                        type: "POST",
                        url: form_action,
                        data: data,

                    }).done(function(response) {
                        var data = response.split(",");
                        // console.log(data);

                        $('#medShw<?php echo $z['id'] ?>').html(data[0]);
                        $('#dosShw<?php echo $z['id'] ?>').html(data[1]);
                        $('#durShw<?php echo $z['id'] ?>').html(data[2]);
                        $('#dataShow<?php echo $z['id'] ?>').show();
                        $('#dataEdit<?php echo $z['id'] ?>').hide();
                    });

                });
            <?php endforeach; ?>
        });
    </script>
    <script>
        function add() {
            $('.medForm').show();
            $('.add_btn').hide();
        }

        function cancel() {
            $('.medForm').hide();
            $('.add_btn').show();
        }

        function addMedicine(id) {

            //

        }
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#prevpic').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#propic").change(function() {

            readURL(this);

        });
    </script>

    <?php if (isset($_SESSION['success'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Patient Added Successfully',
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
                title: 'Patient Updated Successfully',
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
                title: 'Patient Deleted',
                showConfirmButton: false,
                timer: 2000
            })
        </script>

        <?php unset($_SESSION['delete']); ?>

    <?php endif; ?>

    <script>
        $(document).ready(function() {
            $('#phone').keyup(function() {
                var getName = $('#phone').val();
                // console.log(getName);
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText) {
                            document.getElementById("label").value = 'old';

                        } else {
                            document.getElementsByClassName('ribbon').style.display = "none";
                        }
                    }
                }

                const d = xhttp.open("GET", "<?php echo site_url() ?>/Hospital_Controller/checkName?getName=" + getName,
                    true);
                // console.log(d);//return;
                xhttp.send();
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