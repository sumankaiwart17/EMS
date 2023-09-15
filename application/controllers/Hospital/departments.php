<?php

// echo "<pre>";
// print_r($doctors);
// die;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

        .search-bar {
            position: relative;

        }

        .search-bar i {
            position: absolute;
            top: 13px;
            right: 27px;
        }

        .table-striped > tbody > tr:nth-of-type(2n + 1) {
    background-color: #f6f6f6;
}

.table-striped tr {
    background-color: #fff;
    box-shadow: 0 0 3px #e5e5e5;
}

.page-wrapper .content{
    height:100vh;
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
                    <div class="col-lg-4 search-bar">

                        <input type="text" class="form-control mb-3" placeholder="Search Departments" id="search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>


                </div>


                <div class="row">

                    <div class="col-md-12" data-aos="fade-up">

                        <div class="table-responsive">

                            <table class="table table-striped mb-0">

                                <thead>

                                    <tr id="table" style="background:#fff;">

                                        <th>#</th>

                                        <th>Department Name</th>

                                        <th>No of Doctors</th>

                                        <th class="text-right">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php $x = 0; ?>

                                    <?php if ($depts) : ?>

                                        <?php foreach ($depts as $y) : ?>

                                            <?php $x = $x + 1; ?>

                                            <tr style="margin-bottom: 5px;" class="searchDept">

                                                <td><?php echo $x ?></td>

                                                <td data-th="Department Name:"><?php echo $y['dept_name'] ?></td>

                                                <td data-th="No of Doctors:"><?php echo array_key_exists($y['dept_name'],$doctors) ? $doctors[$y['dept_name']] : 0; ?></td>

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
                                    <?php else : ?>

                                        <?php echo "<label style='color:red';>No Departments Added </label><script>document.getElementById('table').style.display='none'</script>" ?>

                                    <?php endif; ?>
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

                                <select name="dept" class='form-control' id="checkDept" required placeholder="Select Dept">

                                    <option value="">Add Department</option>
                                    <?php foreach ($depts as $x) : ?>
                                        <option value="<?php echo $x['dept_name'] ?>"><?php echo $x['dept_name'] ?></option>

                                    <?php endforeach; ?>
                                </select>



                            </div>
                            <div class="form-group">

                                <div class="m-t-20 text-center">

                                    <button class="btn btn-primary submit-btn" id="add_btn">Add Department</button>

                                </div>


                        </form>

                    </div>

                </div>

            </div>

        </div>




    <?php endif; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $("#search").on("keyup", function() {
            var date = $(this).val().toLowerCase();
            console.log(date);
            $(".searchDept").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(date) > -1)
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#checkDept').change(function() {
                var dept = $(this).val();
                console.log(dept);
                $.ajax({
                    url: "<?php echo site_url('hospital_Controller/checkDept'); ?>",
                    method: "POST",
                    data: {
                        dept: dept
                    },
                    success: function(response) {
                        if (response) {
                            alert('Department Already Added');
                            document.getElementById('add_btn').disabled = true
                        } else {
                            document.getElementById('add_btn').disabled = false
                        }
                    }
                });
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