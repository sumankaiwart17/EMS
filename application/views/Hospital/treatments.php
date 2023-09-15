<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <title>Treatments</title>

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

        <!-- View Treatments -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-sm-5 col-5"data-aos="fade-right">

                        <h4 class="page-title">Treatments</h4>
 <input type="text" name="" id="search" placeholder="search treatment" class="form-control mb-2" style="max-width:300px">
                    </div>

                    <div class="col-sm-7 col-7 text-right m-b-30"data-aos="fade-left">

                        <a href="<?php echo site_url('hospital_Controller/addTreat') ?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Treatment</a>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12" data-aos="fade-up">

                        <div class="table-responsive">

                            <table class="table table-border table-striped custom-table datatable mb-0">

                                <thead id="hideData">

                                    <tr>

                                        <th>#</th>

                                        <th>Treatment Name</th>

                                        <th>Department Name</th>

                                        <th>Budget</th>

                                        <th>Duration</th>

                                        <th class="text-right">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php if (isset($treatData)) : ?>

                                        <?php $x = 0; ?>

                                        <?php foreach ($treatData as $y) : ?>

                                            <?php $x = $x + 1; ?>

                                            <tr style="margin-bottom: 5px;">

                                                <td><?php echo $x ?></td>

                                                <td data-th="Treatment Name:"><a data-toggle="modal" data-target="#exampleModalCenter<?php echo $y['treat_id'] ?>" href=""><?php echo $y['treat_name'] ?></a></td>

                                                <td data-th="Department Name:"><?php echo $y['dept_name'] ?></td>

                                                <td data-th="Budget:"><?php echo $y['budget'] . " INR" ?></td>

                                                <td data-th="Duration:"><?php echo $y['duration'] . " Days" ?></td>

                                                <td data-th="Action:" class="text-right">

                                                    <div class="dropdown dropdown-action">

                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                                                        <div class="dropdown-menu dropdown-menu-right">

                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/editTreat/' . $y['treat_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                            <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/delTreat/' . $y['treat_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                        </div>

                                                    </div>

                                                    <div class="mob-action text-left">

                                                        <a class="" href="<?php echo site_url('hospital_Controller/editTreat/' . $y['treat_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                                        <a style="padding: 27px;" class="" href="<?php echo site_url('hospital_Controller/delTreat/' . $y['treat_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                    </div>

                                                </td>

                                            </tr>

                                        <?php endforeach; ?>

                                    <?php else : ?>

                                     <?php echo"<span style='color:red'>No Treatment's Package Added</span><script>document.getElementById('hideData').style.display='none'</script>"?>
                                    <?php endif; ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Department Modal -->

        <?php if (isset($treatData)) : ?>

            <?php foreach ($treatData as $x) : ?>

                <div class="modal fade" id="exampleModalCenter<?php echo $x['treat_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                        <div class="modal-content" style="width:800px;">



                            <div class="modal-body">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                                <div class="conatainer-fluid">

                                    <div class="row">

                                        <div class="col-12 col-sm-12 mb-3">

                                            <h2 class="text-info" style="border-bottom: 4px solid #17a2b8!important"><?php echo $x['treat_name'] ?> Treatment</h2>

                                        </div>

                                    </div>

                                    <div class="row mt-3">

                                        <div class="col-12 col-sm-6 ml-3">

                                            <h4 class="text-info" style="border-bottom: 2px solid #17a2b8!important">Description</h4>

                                            <p><?php echo $x['treat_desc'] ?></p>

                                        </div>

                                        <div class="col-12 col-sm-5">

                                            <?php if ($x['spoc']) : ?>

                                                <h4 class="text-info" style="border-bottom: 2px solid #17a2b8!important">SPOC <span class="custom-badge float-right status-blue">Available</span></h4>

                                                <p>SPOC Name: <strong><?php echo $x['spoc'] ?></strong></p>

                                                <p>SPOC Contact No.: <strong><a href="tel:<?php echo $x['spoc_no'] ?>"><?php echo $x['spoc_no'] ?></a></strong></p>

                                                <p>SPOC Email ID: <strong><a href="mailto:<?php echo $x['spoc_email'] ?>"><?php echo $x['spoc_email'] ?></a></strong></p>

                                            <?php else : ?>

                                                <h4 class="text-info" style="border-bottom: 2px solid #17a2b8!important">SPOC <span class="custom-badge float-right status-grey">Unavailable</span></h4>

                                                <div class="alert alert-danger text-center" role="alert">

                                                    Please add SPOC !!

                                                </div>

                                            <?php endif; ?>

                                        </div>

                                    </div>

                                    <div class="row mt-3">

                                        <div class="col-12 col-sm-12 ">

                                            <div class="card">

                                                <h4 class="card-header bg-info text-white">Other Informations</h3>

                                                    <div class="card-body">

                                                        <dl class="row">

                                                            <dt class="col-6">Department</dt>

                                                            <dd class="col-6"><?php echo $x['dept_name'] ?></dd>

                                                            <dt class="col-6">Duration</dt>

                                                            <dd class="col-6"><?php echo $x['duration'] . " days" ?></dd>

                                                            <dt class="col-6">Budget <small>(in INR)</small></dt>

                                                            <dd class="col-6"><?php echo $x['budget'] ?></dd>

                                                            <dt class="col-6">Department Timings</dt>

                                                            <dd class="col-6"><?php echo date("g:i A", strtotime($x['open_at'])) . '-' . date("g:i A", strtotime($x['close_at'])) ?></dd>

                                                            <dt class="col-6">Block No.</dt>

                                                            <dd class="col-6"><?php echo $x['block_no'] ?></dd>

                                                            <dt class="col-6">Floor No.</dt>

                                                            <dd class="col-6"><?php echo $x['block_no'] ?></dd>

                                                        </dl>

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

        <?php endif; ?>

    <?php elseif ($layout == 1) : ?>

        <!-- Add Treatment -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2"data-aos="fade-right">

                        <h4 class="page-title">Add Treatment</h4>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form action="<?php echo site_url('hospital_Controller/addTreat') ?>" method="post">

                            <div class="form-group"data-aos="fade-right">

                                <label>Department Name:</label>

                                <select id="deptName" name="deptName" class="form-control">

                                    <option value="" selected>Select Department</option>
                                    <?php if($depts!==''):?>

                                    <?php foreach ($depts as $x) : ?>

                                        <option value="<?php echo $x['dept_id'] ?>"><?php echo $x['dept_name'] ?></option>

                                    <?php endforeach; ?>

                                    <?php else:?>
                                       
                                        <?php endif;?>
                                </select><br>
                                <span id='Error' display='none' class="text-info">*NOTE: If the department is not listed please add the department first</span>
                               

                            </div>

                            <div class="form-group"data-aos="fade-left">

                                <label>Treatment Name:</label>

                                <select id="treatName" name="treatName" class="form-control">

                                    <option value="" selected>Select Treatment</option>



                                </select>

                                <div data-parent="other" style="display: none; margin-top: 20px;">

                                    <label>Specify the Treatment name:</label>

                                    <input type="text" name="newTreatName" id="newTreatName" class="form-control">

                                    <br>

                                    <label>Treatment Description:</label>

                                    <input type="text" name="description" id="description" class="form-control">

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-6 col-sm-6">

                                    <label>Duration <small class="text-muted">(In Days)</small></label>

                                    <input type="text" name="duration" id="duration" class="form-control" value="">

                                </div>

                                <div class="col-6 col-sm-6">

                                    <label>Budget <small class="text-muted">(In INR)</small></label>

                                    <input type="text" name="budget" id="budget" class="form-control" value="">

                                </div>

                            </div>

                            <div class="m-t-20 text-center">

                                <button class="btn btn-primary submit-btn">Add Treatment</button>

                            </div>

                            <script>
                                
                            </script>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    <?php elseif ($layout == 2) : ?>

        <!-- Edit Treatment -->

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <h4 class="page-title">Edit Treatment</h4>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form action="<?php echo site_url('hospital_Controller/edittreat') ?>" method="post">

                            <div class="form-group row">

                                <div class="col-6 col-sm-6">

                                    <label>Treatment Name</label>

                                    <input class="form-control" type="text" name="treat_name" readonly value="<?php echo $treatData['treat_name'] ?>">

                                </div>

                                <div class="col-6 col-sm-6">

                                    <label>Treatment ID</label>

                                    <input class="form-control" type="text" name="treat_id" readonly value="<?php echo $treatData['treat_id'] ?>">

                                </div>

                            </div>

                            <div class="form-group">

                                <label>Department</label>

                                <input class="form-control" type="text" name="dept" readonly value="<?php echo $treatData['dept_name'] ?>">

                            </div>

                            <div class="form-group row">

                                <div class="col-6">

                                    <label>Duration <small class="text-muted">(In Days)</small>:</label>

                                    <input type="text" name="duration" id="duration" class="form-control" value="<?php echo $treatData['duration'] ?>">

                                </div>

                                <div class="col-6">

                                    <label>Budget <small class="text-muted">(In INR)</small>:</label>

                                    <input type="text" name="budget" id="budget" class="form-control" value="<?php echo $treatData['budget'] ?>">

                                </div>

                            </div>

                            <div class="m-t-20 text-center">

                                <button class="btn btn-primary submit-btn">Save Treatment</button>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        $("#search").on("keyup", function() {

            var date = $(this).val().toLowerCase();


            console.log(date);
            $(".table tbody tr").filter(function() {

                $(this).toggle($(this).text().toLowerCase().indexOf(date) > -1)

            });

        });
    </script>
    <script type="text/javascript">

        $(document).ready(function() {

            $('#deptName').change(function() {

                var dept_id = $('#deptName').val();



                //console.log("/hospital_Controller/fetchtreat?q="+dept_id);

                var xhttp = new XMLHttpRequest();

                xhttp.onreadystatechange = function() {

                    if (this.readyState == 4 && this.status == 200) {

                        //console.log(this.responseText);

                        document.getElementById("treatName").innerHTML = this.responseText;

                    }

                };



                xhttp.open("GET", "<?php echo site_url() ?>/hospital_Controller/fetchtreat?q=" + dept_id, true);

                xhttp.send();





            });

        });

        $(function() {

            $("#treatName").on("change", function() {

                if ($(this).val() === "other") {

                    $("div[data-parent='" + $(this).val() + "']").show().siblings("[data-parent]").hide();



                } else {

                    $("[data-parent]").hide();

                }

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

                    //  ^

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