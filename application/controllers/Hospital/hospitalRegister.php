<!DOCTYPE html>

<html lang="en">

<head>

    <style>
    body {

        font-family: "Lato", sans-serif;

        padding-bottom: 200px;

    }







    .main-head {

        height: 150px;

        background: #FFF;



    }



    .sidenav {

        height: 100%;

        background: linear-gradient(to right, #0072ff, #ffffff);

        overflow-x: hidden;

        padding-top: 20px;

    }





    .main {

        padding: 0px 10px;



    }



    @media screen and (max-height: 450px) {

        .sidenav {
            padding-top: 15px;
        }

    }



    @media screen and (max-width: 450px) {

        .login-form {

            margin-top: 5%;

        }



        .register-form {

            margin-top: 10%;

        }

    }



    @media screen and (min-width: 768px) {

        .main {

            margin-left: 40%;

        }



        .sidenav {

            width: 40%;

            position: fixed;

            z-index: 1;

            top: 0;

            left: 0;

        }



        .login-form {

            margin-top: 20%;

        }



        .register-form {

            margin-top: 20%;

        }

    }





    .login-main-text {

        margin-top: 10%;

        padding: 60px;

        color: #fff;

    }



    .login-main-text h2 {

        font-weight: 300;

    }



    .btn-black {

        background-color: #000 !important;

        color: #fff;

    }
    </style>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <title>Hospital Register</title>

</head>

<body>

    <header class="header pt-5">



    </header>



    <div class="sidenav">

        <div class="login-main-text">

            <h1>AAHRS</h1>

            <h2>Hospital Registration</h2>

        </div>



    </div>

    <div class="main">

        <div class="col-md-6 col-sm-12">

            <h3>Please enter the details correctly</h3>

            <div class="float-left"><a class="log-btn ml-2 text-primary"
                    href="<?php echo site_url('hospital/login-page') ?>">Already Registered? Login</a></div>

            <div class="login-form">

                <form action="<?php echo site_url('hospital_Controller/register') ?>" method="post">

                    <div class="form-group">

                        <label>Hospital ID</label>

                        <input type="text" class="form-control" name="hos_id" placeholder="Hospital ID"
                            value="<?php echo set_value('hos_id') ?>" autocomplete="one-time-code">

                        <span class="text-danger"><?php echo form_error('hos_id') ?></span>

                    </div>

                    <div class="form-group">

                        <label>Hospital Name</label>

                        <input type="text" class="form-control" name="hos_name" placeholder="Hospital Name"
                            value="<?php echo set_value('hos_name') ?>" autocomplete="one-time-code">

                        <span class="text-danger"><?php echo form_error('hos_name') ?></span>

                    </div>

                    <div class="form-group">

                        <label>Password</label>

                        <input type="password" class="form-control" name="password" placeholder="Password"
                            value="<?php echo set_value('password') ?>" autocomplete="one-time-code">

                        <span class="text-danger"><?php echo form_error('password') ?></span>

                    </div>

                    <div class="form-group">

                        <label>Full Address</label>

                        <input type="text" class="form-control" name="address" placeholder="Full Address"
                            value="<?php echo set_value('address') ?>" autocomplete="one-time-code">

                        <span class="text-danger"><?php echo form_error('address') ?></span>

                    </div>

                    <div class="form-group form-row">

                        <label>Pincode</label>

                        <input type="text" class="form-control" name="zip" placeholder="Pincode"
                            value="<?php echo set_value('zip') ?>" autocomplete="one-time-code">

                        <span class="text-danger"><?php echo form_error('zip') ?></span>

                    </div>

                    <div class="form-group">

                        <label>City</label>

                        <input type="text" class="form-control" name="city" placeholder="City"
                            value="<?php echo set_value('city') ?>" autocomplete="one-time-code">

                        <span class="text-danger"><?php echo form_error('city') ?></span>

                    </div>

                    <div class="form-group">

                        <label>District</label>

                        <input type="text" class="form-control" name="district" placeholder="District"
                            value="<?php echo set_value('district') ?>" autocomplete="one-time-code">

                        <span class="text-danger"><?php echo form_error('district') ?></span>

                    </div>

                    <div class="form-group">

                        <label>State</label>

                        <input type="text" class="form-control" name="state" placeholder="state"
                            value="<?php echo set_value('state') ?>" autocomplete="one-time-code">

                        <span class="text-danger"><?php echo form_error('state') ?></span>

                    </div>

                    <div class="form-group">

                        <label>Contact No.</label>

                        <input type="tel" class="form-control" name="phone" placeholder="Phone No."
                            value="<?php echo set_value('phone') ?>" autocomplete="one-time-code">

                        <span class="text-danger"><?php echo form_error('phone') ?></span>

                    </div>

                    <button type="submit" class="btn btn-black mt-2 float-left">Register</button>

                </form>

            </div>

        </div>

    </div>



</body>

</html>