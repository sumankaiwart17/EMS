<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <title>Customers</title>

    <style>


.search-bar{
            position: relative;
            
        }

        .search-bar i{
            position: absolute;
            top: 13px;
            right: 27px;
        }


        @media only screen and (max-width: 991.98px) {



            .table-responsive td {

                text-indent: 40% !important;

            }



            .table-responsive td:nth-child(1) {

                text-align: left !important;

            }



            .table-responsive td:before {

                width: 35% !important;

            }

        }



        .mob-action {

            display: none;

        }

    </style>

</head>



<body>

    <!-- Navbar -->

    <?php include('navbar.php'); ?>

    <!-- Customer Queries -->



    <div class="page-wrapper">

        <div class="content">

            <div class="row">

                <div class="col-sm-4">

                    <h4 class="page-title">Customer Queries</h4>

                </div>

            </div>


            <div class="row">
                    <div class="col-lg-4 search-bar">
                        <input type="text"class="form-control mb-3"placeholder="Search patinets"  id="search">
                         <i class="fa fa-search" aria-hidden="true"></i>     
                    </div>
            </div>


            <div class="row">

                <div class="col-md-12">

                    <div class="table-responsive">

                        <table class="table table-striped custom-table">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th style="min-width:200px;">Name</th>

                                    <th>Query ID</th>

                                    <th>Email</th>

                                    <th>Mobile</th>

                                    <th style="min-width: 110px;">Query Date</th>

                                    <th>Query</th>

                                    <th class="text-right">Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr style="margin-bottom: 5px;">

                                    <td>1</td>

                                    <td data-th="Name: ">

                                        <img width="28" height="28" src="<?php echo base_url('images/dslr1.jpg') ?>" class="rounded-circle" alt="">

                                        <h2>Albina Simonis</h2>

                                    </td>

                                    <td data-th="Query ID: ">NS-0001</td>

                                    <td data-th="Email: ">albinasimonis@example.com</td>

                                    <td data-th="Mobile: ">828-634-2744</td>

                                    <td data-th="Query Date: ">7 May 2015</td>

                                    <td data-th="Query: ">

                                        <span class="custom-badge status-green">Active</span>

                                    </td>

                                    <td data-th="Action: " class="text-right">

                                        <div class="dropdown dropdown-action">

                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu dropdown-menu-right">

                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>

                                            </div>

                                        </div>

                                        <div class="mob-action text-left">

                                            <a class="" href="#"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                            <a style="padding: 27px;" class="" href="#" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                        </div>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</body>



</html>