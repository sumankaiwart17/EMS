<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">

    <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>

    <title>Departments</title>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        .mob-action {

            display: none;

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

                        <a href="<?php echo site_url('hospital/add-department') ?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Department</a>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12" data-aos="fade-up">

                        <div class="table-responsive">

                            <table class="table table-striped mb-0">

                                <thead >

                                    <tr id="table">

                                        <th>#</th>

                                        <th>Department Name</th>


                                        <th class="text-right">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php $x = 0; ?>
                           
                                    <?php if($depts):?>

                                    <?php foreach ($depts as $y) : ?>

                                        <?php $x = $x + 1; ?>

                                        <tr style="margin-bottom: 5px;">

                                            <td><?php echo $x ?></td>

                                            <td data-th="Department Name:"><?php echo $y['dept_name'] ?></td>

                                            <td data-th="Action:" class="text-right">

                                                <div class="dropdown dropdown-action">

                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                                                    <div class="dropdown-menu dropdown-menu-right">


                                                        <a class="dropdown-item" href="<?php echo site_url('hospital_Controller/delDept/' . $y['id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                    </div>

                                                </div>

                                                <div class="mob-action text-left">

                                                   


                                                    <a style="padding: 20px;" class="" href="<?php echo site_url('hospital_controller/delDept/' . $y['id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                </div>

                                            </td>

                                        </tr>

                                    <?php endforeach; ?>
                                    <?php  else:?>
                                    
                                        <?php echo"<label style='color:red';>no departments Added </label><script>document.getElementById('table').style.display='none'</script>"?>

                                    <?php endif;?>
                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>


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
                        <div class="col-sm-10">
                        <span id="dept_res"></span>
                        


 
                            <select name="dept[]"  class='form-control checkDept' required placeholder="Select Dept" >

  <option value="">add department</option>
                                <?php foreach ($depts as $x) : ?>
                                    <option value="<?php echo $x['dept_name'] ?>"><?php echo $x['dept_name'] ?></option>

                                <?php endforeach; ?>
                            </select>

                          

                                </div>
                            <div class="form-group">

                                <div class="m-t-20 text-center">

                                    <button class="btn btn-primary submit-btn" id="add_btn" >Add Department</button>

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
 <script>
        $(document).ready(function() {



            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {

                removeItemButton: true,
    
                maxItemCount: 1,

            });





        });
    </script>
 <script>  
 
 $(document).ready(function() {
 
$('.checkDept').change(function() {

    var dept_name = $('.checkDept').val();



    console.log(dept_name);

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            // console.log(this.responseText);

        const data= document.getElementById("dept_res").innerHTML = this.responseText;
  
         
           if(data!==''){
            document.getElementById("add_btn").disabled = true;
           }
           else{

            document.getElementById("add_btn").disabled = false;
           }
  

        }

    };



    const d = xhttp.open("GET", "<?php echo site_url() ?>/hospital_Controller/checkDept?q=" + dept_name,
        true);
    // console.log(d);
    //    return;

    xhttp.send();





});

});</script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 130,
            duration: 1000,
        });
    </script>

</body>



</html>