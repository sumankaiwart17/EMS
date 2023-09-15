!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>Booster offers</title>
    <style>
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
    <!-- custom quries -->
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Booster Packs</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-border table-striped custom-table datatable mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Packs</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Benifits</th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr style="margin-bottom: 5px;">
                                    <td scope="row">1</td>
                                    <td data-th="Pack:"><a href="<?php echo site_url('hospital/hospital-offers') ?>" class="btn btn btn-primary btn-rounded ">Basic boost</a></td>
                                    <td data-th="Price:">INR:500</td>
                                    <td data-th="Benifits:">Will be shown under search bar in offer page </td>
                                </tr>

                                <tr style="margin-bottom: 5px;">
                                    <td scope="row">2</td>
                                    <td data-th="Pack:"><a href="<?php echo site_url('hospital/hospital-offers') ?>" class="btn btn btn-primary btn-rounded ">Plus boost</a></td>
                                    <td data-th="Price:">INR:1000</td>
                                    <td data-th="Benifits:">Will be shown leftside bar in offer page </td>
                                </tr>
                                <tr style="margin-bottom: 5px;">
                                    <td scope="row">3</td>
                                    <td data-th="Pack:"><a href="<?php echo site_url('hospital/hospital-offers') ?>" class="btn btn btn-primary btn-rounded ">Premium boost</a></td>
                                    <td data-th="Price:">INR:5000</td>
                                    <td data-th="Benifits:">Will be shown leftside bar in every page </td>
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