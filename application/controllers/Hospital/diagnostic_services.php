<?php
//echo "<pre>";
//print_r($data);
//die;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
    <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <title>Diagnostic Services</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <style>
        .search-bar {
            position: relative; 
        }

        .search-bar i {
            position: absolute;
            top: 13px;
            right: 27px;}

        .mob-action {
            display: none;}

        .table-striped tr {
            background-color: #fff;
            box-shadow: 0 0 3px #e5e5e5;
        }

        .table-striped>tbody>tr:nth-of-type(2n + 1) {
            background-color: #f6f6f6;
        }

        .page-wrapper .content {
            height: auto;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <?php include('navbar.php'); ?>
    <?php if ($layout == 0) : ?>

        <!-- View Diagnostic Services -->
        <div class="page-wrapper" style="padding:50px 0px;">
            <div class="content">

                <div class="row">
                    <div class="col-sm-5 col-5" data-aos="fade-right">
                        <h4 class="page-title">Diagnostic Services</h4>
                    </div>

                    <div class="col-sm-7 col-7 text-right m-b-30" data-aos="fade-left">
                        <a href="<?php echo site_url('hospital_Controller/add_Diagservice') ?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Diagnostic</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 search-bar">
                        <input type="text" class="form-control mb-3" placeholder="Search Diagnostics" id="search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive " data-aos='fade-up'>
                            <table class="table table-striped mb-0 ">
                                <thead id="hideData">
                                    <tr>
                                        <th>#</th>
                                        <th>Patient ID</th>
                                        <th>Patient Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Phone No</th>
                                        <th>Email</th>
                                        <th>Test</th>
                                        <th>Price</th>
                                        <th>Referral</th>
                                        <th>Add Result</th>
                                        <th>Billing Receipt</th>
                                        <th>Diagnostic Tets</th>

                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php $no = 0;
                                    if (count($result)) :
                                        foreach ($result as $x) : ?>
                                            <tr style="margin-bottom: 5px;">
                                                <td><?php $no = $no + 1; echo $no; ?></td>

                                                <td data-th="patient ID:"><?php echo $x['patient_id'] ?></td>
                                                <td data-th="patient_name:"><?php echo $x['patient_name'] ?></td>
                                                <td data-th="age:"><?php echo $x['age'] ?></td>
                                                <td data-th="gender:"><?php echo $x['gender'] ?></td>
                                                <td data-th="address"><?php echo $x['address'] ?></td>
                                                <td data-th="Conatct No"><?php echo $x['contact'] ?></td>
                                                <td data-th="Email Id"><?php echo $x['email_id'] ?>></td>
                                                <td data-th="test:"><?php echo $x['test'] ?></td>
                                                <td data-th="Price:"><?php echo $x['price'] ?></td>
                                                <td data-th="refarellby:"><?php echo $x['refarellby'] ?></td>

                                                <td data-th="Result:"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                        Add Result
                                                    </button></td>

                                                <td data-th="billing recipt:"> <a href="<?php echo site_url('diagnostic_controller/details/' . $x['patient_id']) ?>"><i class="fa fa-file-pdf-o" style="font-size:30px;color:red"></i></a></td>
                                                <td data-th="billing recipt:"> <a href="<?php echo site_url('diagnostic_controller/diag_test/' . $x['patient_id']) ?>"><i class="fa fa-file-pdf-o" style="font-size:30px;color:red"></i></a></td>

                                                <td data-th="Action:" class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/edit_Diagservice/' . $x['patient_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/del_Diagservice/' . $x['patient_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>
                                                        </div>
                                                    </div>

                                                    <div class="mob-action text-left">
                                                        <a class="" href="<?php echo site_url('hospital_Controller/edit_Diagservice/' . $x['patient_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                        <a style="padding: 27px;" class="" href="<?php echo site_url('hospital_Controller/del_Diagservice/' . $x['patient_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">

                                                                <form method="post" action="<?php echo site_url('diagnostic_controller/addresult/' . $x['patient_id']) ?>" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Test Name <span class="text-danger">*</span></label>
                                                                                <input class="form-control" id="test_name" name="test_name" required type="text" placeholder="Enter Test Name" value="<?php echo set_value('test_name'); ?>">
                                                                                <span class="text-danger"><?php echo form_error('test_name'); ?></span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Test Result: <span class="text-danger">*</span></label>
                                                                                <input class="form-control" type="text" required name="test_result" placeholder="Enter Test Result" value="<?php echo set_value('test_result'); ?>">
                                                                                <span class="text-danger"><?php echo form_error('test_result'); ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Normal Value: <span class="text-danger">*</span></label>
                                                                                <input class="form-control" required type="number" name="normal_value" placeholder="Enter Normal Value" value="<?php echo set_value('normal_value'); ?>">
                                                                                <span class="text-danger"><?php echo form_error('normal_value'); ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save Data</button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endforeach; ?>
                                        <?php else : ?>
                                        <?php echo "<span style='color:red'>No Diagnostics Services Added</span><script>document.getElementById('hideData').style.display='none'</script>" ?>
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
        <div class="page-wrapper" style="padding:50px 0px;">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Diagnostic Service</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" action="<?php echo site_url('hospital_Controller/add_Diagservice') ?>" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Patient ID: </label>
                                        <input class="form-control" value="<?php echo 'PATIENT ' . rand() ?>" name="patient_id" id="p_id" type="text">
                                        <input readonly name="hos_id" value="<?php echo $hos_id ?>" type="hidden">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Patient Name: <span class="text-danger">*</span></label>
                                        <input class="form-control" id="p_name" name="patient_name" type="text" placeholder="Enter Patient Name" value="<?php echo set_value('patient_name'); ?>">
                                        <span class="text-danger"><?php echo form_error('patient_name'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Age: <span class="text-danger">*</span></label>
                                        <input class="form-control" id="age" type="text" name="age" placeholder="Enter Patient Age" value="<?php echo set_value('age'); ?>">
                                        <span class="text-danger"><?php echo form_error('age'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>D.O.B <span class="text-danger">*</span></label>
                                        <input type="date" id="dob" name="dob" class="form-control" placeholder="Enter Patient  D.O.B" value="<?php echo set_value('dob'); ?>">
                                        <span class="text-danger"><?php echo form_error('dob'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Gender: <span class="text-danger">*</span> </label>
                                        <select name="gender" class="form-control" id="gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male">male</option>
                                            <option value="Female">female</option>
                                        </select>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('gender'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Address: <span class="text-danger">*</span> </label>
                                        <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" value="<?php echo set_value('address'); ?>">
                                        <span class="text-danger"><?php echo form_error('address'); ?></span>
                                    </div>
                                </div>

                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email Id: <span class="text-danger">*</span> </label>
                                        <input type="text" id='email_id' name="email" class="form-control" placeholder="Enter Email" value="<?php echo set_value('email'); ?>">
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Contact No: <span class="text-danger">*</span> </label>
                                        <input type="text" id="phone" name="contact" class="form-control" placeholder="Enter Contact no" value="<?php echo set_value('contact'); ?>">
                                        <span class="text-danger"><?php echo form_error('contact'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Blood Group <span class="text-danger"> </span></label>
                                        <select type="text" name="bloodgroup" class="form-control">
                                            <option value="">Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="B+">B+</option>
                                            <option value="AB">AB</option>
                                            <option value="O-">O-</option>
                                            <option value="O+">O+</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('bloodgroup'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Document<span class="text-danger"></span></label>
                                        <input type="file" name="documents" class="form-control" multiple>
                                        <span class="text-danger"><?php echo form_error('documents'); ?></span>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group mb-0">
                                        <label>Test <span class="text-danger">*</span></label>
                                        <select class="form-control" name="test[]" placeholder="Select Test" id="choices-multiple-remove-button" size="6" multiple>
                                            <?php foreach ($gettest as $x) : ?>
                                                <option value="<?php echo $x['test_name'] ?>"><?php echo $x['test_name'] ?> ₹<?php echo $x['test_price'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <span class="text-danger"><?php echo form_error('test[]'); ?></span>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Discount Type<span class="text-danger"> </span></label>
                                        <select name="dis_type" id="Dis_type" class="form-control">
                                            <option value="">Select Discount Type</option>
                                            <option value="bypercentage">By Percentage</option>
                                            <option value="flatamount">Flat amount</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('discount'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6" id='by_percentage' style="display: none;">
                                    <div class="form-group">
                                        <label>By Percentage<span class="text-danger"> </span></label>
                                        <input class="form-control" type="number" min="1" name="discount" id="discount" placeholder="Enter Price" value="<?php echo set_value('discount'); ?>">
                                        <span class="text-danger"><?php echo form_error('discount'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6" id='by_amount' style="display: none;">
                                    <div class="form-group">
                                        <label>Flat amount <span class="text-danger"> </span></label>
                                        <input class="form-control" type="number" min="1" name="discount" id="discount" placeholder="Enter Price" value="<?php echo set_value('discount'); ?>">
                                        <span class="text-danger"><?php echo form_error('discount'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Price <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" min="1" name="price" id="price" placeholder="Enter Price" value="<?php echo set_value('price'); ?>">
                                        <span class="text-danger"><?php echo form_error('price'); ?></span>

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Referral By <span class="text-danger">*</span> </label>
                                        <input class="form-control" type="text" name="refarellby" placeholder="Enter Referral Doctor Name" value="<?php echo set_value('refarellby'); ?>">
                                        <span class="text-danger"><?php echo form_error('refarellby'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5 text-center">
                                <button type="submit" name="submit" class="btn btn-primary submit-btn">Add Diagnostic</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

       <?php elseif ($layout == 2) : ?>
       
        <!--Edit Diagnostic Services -->
        <div class="page-wrapper" style="padding:50px 0px;">
            <div class="content" style="height:100vh;">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Diagnostic Service</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" action="<?php echo site_url('hospital_Controller/edit_Diagservice/' . $this->uri->segment(3)); ?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Patient ID: </label>
                                        <input type="text" class="form-control" name="patient_id" value="<?php echo $diagData[0]['patient_id'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Patient Name: <span class="text-danger">*</span></label>
                                        <input class="form-control" name="patient_name" value="<?php echo $diagData[0]['patient_name'] ?>" type="text" placeholder="Enter Patient Name">
                                        <span class="text-danger"><?php echo form_error('patient_name'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Age: <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="<?php echo $diagData[0]['age'] ?>" name="age" placeholder="Enter Patient Age">
                                        <span class="text-danger"><?php echo form_error('age'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>D.O.B <span class="text-danger">*</span></label>
                                        <input type="date" name="dob" value="<?php echo $diagData[0]['dob'] ?>" class="form-control" placeholder="Enter Patinet  D.O.B">
                                        <span class="text-danger"><?php echo form_error('dob'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Contact: <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="contact" value="<?php echo $diagData[0]['contact'] ?>">
                                        <span class="text-danger"><?php echo form_error('contact'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email: <span class="text-danger">*</span> </label>
                                        <input type="text" name="email" class="form-control" value="<?php echo $diagData[0]['email_id'] ?>">
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Address: <span class="text-danger">*</span> </label>
                                        <input type="text" name="address" class="form-control" value="<?php echo $diagData[0]['address'] ?>">
                                        <span class="text-danger"><?php echo form_error('address'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Gender: <span class="text-danger">*</span> </label>
                                        <select name="gender" class="form-control">
                                            <option value="Male" <?php echo $diagData[0]['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
                                            <option value="Female" <?php echo $diagData[0]['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('gender'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Blood Group </label>
                                        <select type="text" name="bloodgroup" class="form-control">
                                            <option value="<?php echo $diagData[0]['bloodgroup'] ?>"><?php echo $diagData[0]['bloodgroup'] ?></option>
                                            <option value="A+">A+</option>
                                            <option value="B+">B+</option>
                                            <option value="AB">AB</option>
                                            <option value="O-">O-</option>
                                            <option value="O+">O+</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('bloodgroup'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mb-0">
                                        <label>Test <span class="text-danger">*</span></label><?php $test = explode(',', $diagData[0]['test']) ?>
                                        <select class="form-control" name="test[]" multiple id="choices-multiple-remove-button" size="6">
                                            <option value="X-rays" <?php if (in_array('X-rays', $test)) {
                                                                        echo 'selected';
                                                                    } ?>>X-rays</option>
                                            <option value="CT scan" <?php if (in_array('CT scan', $test)) {
                                                                        echo 'selected';
                                                                    } ?>>CT scan</option>
                                            <option value="ENT" <?php if (in_array('ENT', $test)) {
                                                                    echo 'selected';
                                                                } ?>>ENT</option>
                                            <option value="MRI" <?php if (in_array('MRI', $test)) {
                                                                    echo 'selected';
                                                                } ?>>MRI</option>
                                            <option value="Blood test" <?php if (in_array('Blood test', $test)) {
                                                                            echo 'selected';
                                                                        } ?>>Blood test</option>
                                            <option value="Mammogram" <?php if (in_array('Mammogram', $test)) {
                                                                            echo 'selected';
                                                                        } ?>>Mammogram</option>
                                            <option value="Ultrasound" <?php if (in_array('Ultrasound', $test)) {
                                                                            echo 'selected';
                                                                        } ?>>Ultrasound</option>
                                            <option value="PET scans" <?php if (in_array('PET scans', $test)) {
                                                                            echo 'selected';
                                                                        } ?>>PET scans</option>
                                            <option value="Pathology test" <?php if (in_array('Pathology test', $test)) {
                                                                                echo 'selected';
                                                                            } ?>>Pathology test</option>


                                        </select>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('test[]'); ?></span>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Price <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" value="<?php echo $diagData[0]['price'] ?>" name="price" id="price" placeholder="Enter Price">
                                        <span class="text-danger"><?php echo form_error('price'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Referral By <span class="text-danger">*</span> </label>
                                        <input class="form-control" value="<?php echo $diagData[0]['refarellby'] ?>" type="text" name="refarellby" placeholder="Enter Referral Doctor Name">
                                        <span class="text-danger"><?php echo form_error('refarellby'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Discount Type<span class="text-danger"> </span></label>
                                        <select name="dis_type" id="Dis_type" class="form-control">
                                            <option value="">Select Discount Type</option>
                                            <option value="bypercentage">By Percentage</option>
                                            <option value="flatamount">Flat amount</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('discount'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-6" id='by_percentage' style="display: none;">
                                    <div class="form-group">
                                        <label>By Percentage<span class="text-danger"> </span></label>
                                        <input class="form-control" type="number" min="1" name="discount" id="discount" placeholder="Enter Price" value="<?php echo set_value('discount'); ?>">
                                        <span class="text-danger"><?php echo form_error('discount'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6" id='by_amount' style="display: none;">
                                    <div class="form-group">
                                        <label>Flat amount <span class="text-danger"> </span></label>
                                        <input class="form-control" type="number" min="1" name="discount" id="discount" placeholder="Enter Price" value="<?php echo set_value('discount'); ?>">
                                        <span class="text-danger"><?php echo form_error('discount'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="m-t-20 text-center">
                                <button type="submit" name="submit" class="btn btn-primary submit-btn">Edit Diagnostic</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    <?php endif; ?>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
                maxItemCount: 100,
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#p_id').keyup(function() {
                var p_id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('hospital_Controller/getInfo'); ?>",
                    method: "POST",
                    data: {
                        p_id: p_id
                    },
                    success: function(response) {
                        alert(response);
                        const obj = JSON.parse(response);
                        $('#p_name').val(obj.p_name);
                        $('#age').val(obj.age);
                        $('#email_id').val(obj.email_id);
                        $('#address').val(obj.address);
                        $('#phone').val(obj.phone);
                        $('#gender').val(obj.gender);
                        $('#provisional').val(obj.provisional);
                        $('#whatsapp').val(obj.whatsapp);
                        $('#pincode').val(obj.pincode);
                        $('#city').val(obj.city);
                        $('#dob').val(obj.dob);
                        $('#house_no').val(obj.house_no);
                    }
                });
            });
        });
    </script>

    <?php if (isset($_SESSION['errorres'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: 'Test Result Not Added',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
        <?php unset($_SESSION['errorres']); ?>
    <?php endif; ?>


    <?php if (isset($_SESSION['result'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Test Result Added Successfully',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
        <?php unset($_SESSION['result']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])) : ?>
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Diagnostics Added Successfully',
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
                title: 'Diagnostics Updated Successfully',
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
                title: 'Diagnostics Deleted',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
        <?php unset($_SESSION['delete']); ?>
    <?php endif; ?>

    <script>
        $("#Dis_type").on("change", function() {
            var dis_type = $(this).val();

            if (dis_type === 'flatamount') {
                $('#by_amount').show();
                $('#by_percentage').hide()

            } else if (dis_type === 'bypercentage') {
                $('#by_percentage').show();
                $('#by_amount').hide();
            } else if (dis_type === '') {

                $('#by_amount').hide();
                $('#by_percentage').hide()
            }

        });


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