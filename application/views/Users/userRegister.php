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

        background: linear-gradient(to right, #CF0814, #ffffff);

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

            <h2>User Registration</h2>

        </div>



    </div>

    <div class="main">

        <div class="col-md-6 col-sm-12">

            <h3>Please enter the details correctly</h3>

            <div class="float-left"><a class="log-btn ml-2 text-primary"
                    href="<?php echo site_url('user/login-page') ?>">Already Registered? Login</a></div>

            <div class="login-form">

                <form action="<?php echo site_url('userProfile_Controller/register') ?>" method="post">



                    <div class="form-group">

                        <label>Full Name</label>

                        <input type="text" class="form-control" name="name" placeholder="Full Name"
                            value="<?php echo set_value('name') ?>" autocomplete="one-time-code">

                        <span class="text-danger"><?php echo form_error('name') ?></span>

                    </div>

                    <div class="form-group">

                        <label>Email ID</label>

                        <input type="email" class="form-control" name="email" placeholder="Email ID"
                            value="<?php echo set_value('email') ?>" autocomplete="one-time-code">

                        <span class="text-danger"><?php echo form_error('email') ?></span>

                    </div>

                    <div class="form-group">

                        <label>Password</label>

                        <input type="password" class="form-control" name="password" placeholder="Password"
                            value="<?php echo set_value('password') ?>" autocomplete="one-time-code">

                        <span class="text-danger"><?php echo form_error('password') ?></span>

                    </div>
                    <div class="form-group">

                        <label>Confirm Password</label>

                        <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password"
                            value="<?php echo set_value('password') ?>" autocomplete="one-time-code">

                        <span class="text-danger"><?php echo form_error('cpassword') ?></span>

                    </div>

                    <button type="submit" class="btn btn-black mt-2 float-left">Register</button>

                </form>

            </div>

        </div>

    </div>



</body>

</html>