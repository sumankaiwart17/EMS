
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
  <?php include 'navbar.php'; ?>
    <div class="conatiner-fuild">
      <div class="row row-content">
        <div class="col-12 col-sm-8 offset-sm-2 bg-light">
        <form action="<?php echo site_url('userProfile_Controller/register') ?>" method="post"  onsubmit="return validation()" enctype="multipart/form-data" >
        <h1 class="form-header p-2 text-center">User Registration</h1>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="name" required="">
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required="">
            </div>
            <div class="form-group">
              <label for="pass">Password</label>
              <input type="password" class="form-control" id="pass" name="password" placeholder="password" required="">
            </div>
            <div class="form-group">
              <label for="cpass">Confirm Password</label>
              <input type="password" class="form-control" id="cpass" placeholder="confirm password" required="">
              <span id="msgPass" class="text-danger"></span>
            </div>
            <div class="form-group row">
              <div class="col">
              <label for="country">Country</label>
              <input type="text" class="form-control" id="country" name="country" placeholder="Country" required="">
              </div>
              <div class="col">
              <label for="state">State</label>
              <input type="text" class="form-control" id="state" name="state" placeholder="State" required="">
              </div>
              <div class="col">
              <label for="city">City</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="City" required="">
              </div>
            </div>
            <div class="form-group row">
              <div class="col">
              <label for="zip">Zip Code</label>
              <input type="text" class="form-control" id="zip" name="zip" placeholder="postal zip" required="">
              </div>
              <div class="col">
              <label for="phnnum">Phone Number</label>
              <input type="text" class="form-control" id="phnnum" name="phone" placeholder="Phone No." required="">
              </div>
            </div>
            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary">Register</button>
            </div>
         </form>
        </div>
      </div>
    </div>


  <?php include 'footer.php'; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
      function validation(){
			var pass = document.getElementById('pass').value ;
			var cpass = document.getElementById('cpass').value;

			
			if(pass != cpass){
				document.getElementById('msgPass').innerHTML = "Password doesn't match";
				return false;
			}else{
        document.getElementById('msgPass').innerHTML = "";
      }
		
		}
    </script>
  </body>
</html>