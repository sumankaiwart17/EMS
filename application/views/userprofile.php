<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>AAHRS</title>
  </head>
  <body>
    <?php include 'navbar.php';?>

    <div class="conatiner p-5">
        <div class="row row-content">
            <div class="col-sm-1 order-sm-last"><a href="<?php echo site_url('userProfile_Controller/edit') ?>" class="btn btn-sm btn-dark text-white">Edit Details</a></div>
            <div class="col-12 col-sm-2 offset-sm-4 order-sm-first">
                <img src="<?php echo $picture; ?>" height="150" width="120">
            </div> 
        </div>
        
        <div class="row row-content">
        
            <div class="col-12 col-sm-6 offset-sm-4">
            <h2 class="row-header">User Details</h2>
                <h4>Name: <?php echo $name; ?></h4>
                <h4>Email ID: <?php echo $email_id; ?></h4>
                <h4>Country: <?php echo $country; ?></h4>
                <h4>State: <?php echo $state; ?></h4>
                <h4>City: <?php echo $city; ?></h4>
            </div> 
        </div>
    </div>


    <?php include 'footer.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>