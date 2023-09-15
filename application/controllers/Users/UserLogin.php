<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        /* style link buttons */
        .btn-social {
            padding: 12px;
            border: none;
            border-radius: 4px;
            display: inline-block;
            font-size: 17px;
            line-height: 20px;
        }

        .google {
            background-color: #dd4b39;
            color: white;
        }

        .fa {
            /* font: normal normal normal 14px/1.6 FontAwesome !important; */
        }

        body {
            font-family: "Lato", sans-serif;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>User Login</title>
</head>

<body>
    <header class="header pt-5">

    </header>

    <div class="sidenav">
        <div class="login-main-text">
            <h1>AAHRS</h1>
            <h2>User Login</h2>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">


            <?php if (isset($_SESSION['loginMessage'])) : ?>
                <div class="login-message">
                    <h4><?php echo $_SESSION['loginMessage'] ?></h4>
                </div>
                <?php unset($_SESSION['loginMessage']); ?>
            <?php endif; ?> 
            <div class="login-form">

            
         <?php if($this->session->flashdata('status')){?>
            
         <div class="alert alert-danger">

                <?= 
               $this->session->flashdata('status'); ?>

            </div>
        <?php } 
         unset($_SESSION['status']);?>

                <form action="<?php echo site_url('userProfile_Controller/login') ?>" method="post">
                    <div class="form-group">
                        <label> Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Please enter your email" autocomplete="one-time-code" >
                        <span class="text-danger"><?php echo form_error('email');?></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Please enter your password" autocomplete="one-time-code" >
                        <span class="text-danger"><?php echo form_error('password');?></span>
                    </div>
                    <button type="submit" class="btn btn-black">Login</button>
                    <a class="ml-2" href="<?php echo site_url('user/registration-page') ?>">Register New User</a>
                </form>
            </div>
            <br>
            <button type="submit" onclick="window.location = '<?= base_url() ?>index.php/Googlelogin/login';" class="btn fa google fa-google btn-social"> Continue with Google</button>
        </div>
    </div>

</body>

</html>
