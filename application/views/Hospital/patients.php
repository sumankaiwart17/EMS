<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/bootstrap-datetimepicker.min.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />


    <title>Patients</title>

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

                    <div class="col-sm-4 col-3" data-aos="fade-right">

                        <h4 class="page-title">Patients</h4>


                        <div class="row">
                        <div class="col-sm-4">
                        
                            <input type="text"class="form-control mb-3"placeholder="Search patinets" style="width:250px" id="search" >
                          
                            </div>
                            <div class="col-sm-2 pb-3 m-auto" >
                        
<i class="fa fa-search" aria-hidden="true"></i>                          
                            </div>
                            
                        </div>
                      
                    
                     
                </div>
                       

                  

                    <div class="col-sm-8 col-9 text-right m-b-20" data-aos="fade-left">

                        <a href="<?php echo site_url('hospital_Controller/addPatient') ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Patient</a>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive" data-aos="fade-up">

                            <table class="table table-border table-striped custom-table  mb-0">

                                <thead id="hideData">

                               
                                    <tr style="margin-bottom: 5px;">

                                        <th>#</th>

                                        <th>Name</th>

                                        <th>Age</th>

                                        <th>Address</th>

                                        <th>WhatsApp</th>

                                        <th>Phone</th>

                                        <th>Email</th>

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
                                            <tr style="margin-bottom: 5px;">
                                           
                                                <td><?php $n = $n + 1;

                                                    echo $n; ?></td>

                                                <td data-th="Name: "><?php echo $x['p_name'] ?></td>

                                                <td data-th="Age: "><?php echo (date('Y') - date("Y", strtotime($x['dob']))) ?></td>

                                                <td data-th="Address: "><?php echo $x['address'] ?></td>

                                                <td data-th="WhatsApp: "><?php echo $x['whatsapp'] ?></td>

                                                <td data-th="Phone: "><?php echo $x['phone'] ?></td>

                                                <td data-th="Email: "><?php echo $x['email_id'] ?></td>

                                                <td data-th="Action: " class="text-right">

                                                    <div class="dropdown dropdown-action">

                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                                                        <div class="dropdown-menu dropdown-menu-right">

                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/editPatient/' . $x['p_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/delPatient/' . $x['p_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                        </div>

                                                    </div>

                                                    <div class="mob-action text-left">

                                                        <a class="" href="<?php echo site_url('hospital_controller/editPatient/' . $x['p_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                        <a style="padding: 27px;" class="" href="<?php echo site_url('hospital_controller/delPatient/' . $x['p_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                    </div>

                                                </td>

                                            </tr>

                                        <?php endforeach; ?>

                                    <?php else : ?>

                                        <?php echo "<span style='color:red'>No Patient Added</span><script>document.getElementById('hideData').style.display='none'</script>"?>

                                       
                                    <?php endif; ?>

                                </tbody>

                                <script></script>
                                


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

                        <form method="post" action="<?php echo site_url('hospital_Controller/addPatient') ?>">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-left">

                                        <label>Patient ID: </label>

                                        <input class="form-control" readonly name="p_id" value="<?php echo $hos_id.random_int(100000, 999999); ?>" type="text">

                                        <input readonly name="hos_id" value="<?php echo $hos_id ?>" type="hidden">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>Doctor: <span class="text-danger">*</span></label>

                                        <select name="doc_id" required class="form-control">

                                            <option value="">Select a Doctor</option>

                                            <?php foreach ($docs as $x) : ?>

                                                <option value="<?php echo $x['doc_id'] ?>"><?php echo 'Dr. ' . $x['doc_name'] ?></option>

                                            <?php endforeach; ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-right">

                                        <label>Full Name: <span class="text-danger">*</span></label>

                                        <input class="form-control" required name="p_name" id="p_name" type="text">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-left">

                                        <label>Email ID: <span class="text-danger">*</span></label>

                                        <input class="form-control" required type="email" name="email_id" id="email_id">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-left">

                                        <label>Date of Birth: <span class="text-danger">*</span></label>



                                        <input type="date" required="" class="form-control" name="dob" id="from_date">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group gender-select" data-aos="fade-right">

                                        <label class="gen-label">Gender: <span class="text-danger">*</span></label>

                                        <div class="form-check-inline">

                                            <label class="form-check-label">

                                                <input type="radio" required name="gender" value="male" class="form-check-input">Male

                                            </label>

                                        </div>

                                        <div class="form-check-inline">

                                            <label class="form-check-label">

                                                <input type="radio" required name="gender" value="female" class="form-check-input">Female

                                            </label>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-12">

                                    <div class="row">

                                        <div class="col-sm-6">

                                            <div class="form-group" data-aos="fade-up">

                                                <label>Address <span class="text-danger">*</span></label>

                                                <input type="text" required class="form-control " name="address" id="address">

                                            </div>

                                        </div>
                                        <div class="col-sm-6">

                                            <div class="form-group">

                                                <label>WhatsApp.: <span class="text-danger">*</span></label>

                                                <input class="form-control" required type="number" name=" whatsapp" id="whatsapp">

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group" data-aos="fade-down">

                                        <label>Phone No.: <span class="text-danger">*</span></label>

                                        <input class="form-control" required type="text" name="phone" id="phone">

                                    </div>

                                </div>

                            </div>



                            <div class="m-t-20 text-center">

                                <button type="submit" class="btn btn-primary submit-btn">Add Patient</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

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

                        <form method="post" action="<?php echo site_url('hospital_Controller/editPatient') ?>">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Patient ID: </label>

                                        <input class="form-control" readonly name="p_id" value="<?php echo $pData[0]['p_id'] ?>" type="text">



                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Doctor: <span class="text-danger">*</span></label>

                                        <select name="doc_id" required class="form-control">

                                            <option value="">Select a Doctor</option>

                                            <?php foreach ($docs as $x) : ?>



                                                <option <?php if ($x['doc_id'] == $pData[0]['doc_id']) {

                                                            echo 'selected';
                                                        } ?> value="<?php echo $x['doc_id'] ?>"><?php echo 'Dr. ' . $x['doc_name'] ?></option>

                                            <?php endforeach; ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Full Name: <span class="text-danger">*</span></label>

                                        <input class="form-control" required name="p_name" id="p_name" value="<?php echo $pData[0]['p_name'] ?>" type="text">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Email ID: <span class="text-danger">*</span></label>

                                        <input class="form-control" required type="email" name="email_id" value="<?php echo $pData[0]['email_id'] ?>" id="email_id">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Date of Birth: <span class="text-danger">*</span></label>

                                        <div class="cal-icon">

                                            <input type="text" required value="<?php echo $pData[0]['dob'] ?>" class="form-control datetimepicker" name="dob" id="dob">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group gender-select">

                                        <label class="gen-label">Gender: <span class="text-danger">*</span></label>

                                        <div class="form-check-inline">

                                            <label class="form-check-label">

                                                <input type="radio" required name="gender" <?php if ($pData[0]['gender'] == 'male') {

                                                                                                echo 'checked';
                                                                                            } ?> value="male" class="form-check-input">Male

                                            </label>

                                        </div>

                                        <div class="form-check-inline">

                                            <label class="form-check-label">

                                                <input type="radio" required name="gender" <?php if ($pData[0]['gender'] == 'female') {

                                                                                                echo 'checked';
                                                                                            } ?> value="female" class="form-check-input">Female

                                            </label>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-12">

                                    <div class="row">

                                        <div class="col-sm-12">

                                            <div class="form-group">

                                                <label>Address <span class="text-danger">*</span></label>

                                                <input type="text" required value="<?php echo $pData[0]['address'] ?>" class="form-control" name="address" id="address">

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Phone No.: <span class="text-danger">*</span></label>

                                        <input class="form-control" required type="text" value="<?php echo $pData[0]['phone'] ?>" name="phone" id="phone">

                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>WhatsApp.: <span class="text-danger">*</span></label>

                                        <input class="form-control" required type="text" value="<?php echo $pData[0]['whatsapp'] ?>" name="whatsapp" id="whatsapp">

                                    </div>

                                </div>
                            </div>
                            <div class="m-t-20 text-center">

                                <button type="submit" class="btn btn-primary submit-btn">Save Patient</button>

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

    <script src="<?php echo base_url('js/select2.min.js') ?>"></script>

    <script src="<?php echo base_url('js/moment.min.js') ?>"></script>

    <script src="<?php echo base_url('js/bootstrap-datetimepicker.min.js') ?>"></script>

    <script src="<?php echo base_url('js/app.js') ?>"></script>


<script>
    $(document).ready(function(){
  // select notFound row
  var notFound = $("#notFound")
  // make it hidden by default
  notFound.hide()
  
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

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 130,
            duration: 1000,
        });
    </script>


</body>



</html>