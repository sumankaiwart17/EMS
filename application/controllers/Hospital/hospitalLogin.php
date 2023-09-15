<!DOCTYPE html>

<html lang="en">

<head>

    <style>
    body {

        font-family: "Lato", sans-serif;

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

            margin-top: 50%;

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

    <title>Hospital Login</title>

</head>

<body>

    <header class="header pt-5">



    </header>



    <div class="sidenav">

        <div class="login-main-text">

            <h1>AAHRS</h1>

            <h2>Hospital Login</h2>

        </div>

    </div>

    <div class="main">

        <div class="col-md-6 col-sm-12">

            <div class="login-form">

                <form action="<?php echo base_url()?>hospital_Controller/login" method="post">

                    <div class="form-group">

                        <label>Hospital ID</label>

                        <input type="text" class="form-control" name="hos_id" placeholder="Hospital ID" required=""
                            autocomplete="one-time-code">

                    </div>

                    <div class="form-group">

                        <label>Password</label>

                        <input type="password" class="form-control" name="password" placeholder="Password" required=""
                            autocomplete="one-time-code">

                    </div>

                    <button type="submit" class="btn btn-black">Login</button>

                    <a class="ml-2" href="<?php echo site_url('hospital/registration-page') ?>">Register New
                        Hospital</a>

                </form>

            </div>

        </div>

    </div>



</body>

</html>