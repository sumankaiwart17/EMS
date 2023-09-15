

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Form</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/bdd84c35b8.js" crossorigin="anonymous"></script> 

    <style>

         body{

    background-color: #16B1BE;

     }

    .picture-container{

    position: relative;

    text-align: left;

    padding-left: 10px;

}

.picture{

    width: 120px;

    height: 130px;

    cursor: pointer;

    background-color: #999999;

    border: 4px solid #CCCCCC;

    color: #FFFFFF;

    margin: 0px auto;

    overflow: hidden;

    transition: all 0.2s;

    -webkit-transition: all 0.2s;

    margin-left: -60px;

    margin-bottom: 0;

}

.picture:hover{

    border-color: #2ca8ff;

}

.content.ct-wizard-green .picture:hover{

    border-color: #05ae0e;

}

.content.ct-wizard-blue .picture:hover{

    border-color: #3472f7;

}

.content.ct-wizard-orange .picture:hover{

    border-color: #ff9500;

}

.content.ct-wizard-red .picture:hover{

    border-color: #ff3b30;

}

.picture input[type="file"] {

    cursor: pointer;

    display: block;

    height: 130px;

    left: 0;

    opacity: 0 !important;

    position: absolute;

    top: 0;

    width: 120px;

}



.picture-src{

    width: 100%;

    

}

    </style>

    </head>



    <?php include('navbar.php'); ?>



    <script>

      $(document).ready(function(){

  // Prepare the preview for profile picture

      $("#wizard-picture").change(function(){

          readURL(this);

      });

  });

  function readURL(input) {

      if (input.files && input.files[0]) {

          var reader = new FileReader();

  

          reader.onload = function (e) {

              $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');

          }

          reader.readAsDataURL(input.files[0]);

      }

  }

    </script>

    <body>

        <div class="container">

            <div class="row">

                <div class="col"><a class="btn btn-sm btn-dark text-white" href="<?php echo site_url('userProfile_Controller/viewProfile') ?>">Edit Later</a></div>

            </div>

        </div>

          <div class="card w-75" style="margin-left: 12%;margin-bottom: 4%;margin-top: 4%;">

            

                

                <form action="<?php echo site_url('userProfile_Controller/editProfile'); ?>" method="post"  onsubmit="return validation()" enctype="multipart/form-data">

                <div class="card-body">

                <h2 class="mb-5" style="color: green;">EDIT INFORMATION</h2>

               

                    <div class="container">

                        <div class="picture-container" style="margin-left: 20px">

                            <div class="picture">

                            <?php if(!$picture): ?>

                                <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview" title="">

                            <?php else: ?>

                                <img src="<?php echo $picture; ?>" class="picture-src" id="wizardPicturePreview" title="">

                            <?php endif; ?>

                                <input type="file" id="wizard-picture" class="userProfilePic" name="proPic">

                            </div>

                            <div class="col-lg-9" style="margin-left: 70px; margin-top: -30px;">

                             <h6 class="">Choose Picture </h6>

                             

                             </div>

                    

                        </div>

                    </div>

                </div>

                    <h3 class="mb-6" style="margin-left: 20px">ACCOUNT INFORMATION</h3>

                    <div class="form-group row">

                      <label for="inputEmail3" class="col-sm-2 col-form-label" style="padding-left: 4%;">Name</label>

                      <div class="col-sm-9">

                        <input type="text" class="form-control" placeholder="" name="newName" value="<?php echo $name ?>">

                      

                        

                      </div>

                    </div>

                    <div class="form-group row">

                        <label for="inputPassword3" class="col-sm-2 col-form-label" style="padding-left: 4%;">Email</label>

                        <div class="col-sm-9">

                            <input type="email" class="form-control" readonly id="inputEmail3" value="<?php echo $_SESSION['email_id'] ?>">

                         

                        </div>

                      </div>

                      <h3 class="mb-3" style="margin-left: 20px">CHANGE PASSWORD</h3>

                      

                              <div class="form-group  row">

                                  <label for="inputPasswordOld" class="col-sm-2 col-form-label" style="padding-left: 4%;">Current Password</label>

                                  <div class="col-sm-9">

                                  <input type="password" class="form-control" id="inputPasswordOld" required="">

                                  <span id="msgOld" class="text-danger"></span>

                                  </div>

                              </div>

                              <div class="form-group row">

                                  <label for="inputPasswordNew" class="col-sm-2 col-form-label" style="padding-left: 4%;">New Password</label>

                                  <div class="col-sm-9">

                                  <input type="password" class="form-control" id="inputPasswordNew" name="newPass" required="">

                                  <span id="msgNew" class="form-text small text-muted">

                                          The password must be 8-20 characters, and must <em>not</em> contain spaces.

                                      </span>

                                      </div>

                              </div>

                              <div class="form-group row">

                                  <label for="inputPasswordNewVerify" class="col-sm-2 col-form-label" style="padding-left: 4%;">Verify</label>

                                  <div class="col-sm-9">

                                  <input type="password" class="form-control" id="inputPasswordNewVerify" required="">

                                  <span id="msgNewV" class="form-text small text-muted">

                                          To confirm, type the new password again.

                                      </span>

                                      </div>

                              </div>

                              <div class="form-group row justify-content-center">

                                  <button type="submit" class="btn btn-success btn-lg col-2 ">Save</button>

                              </div>

                  

            

                          

                    

                    



                  </form>

            </div>

          </div>

          <?php include 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script>

      function validation(){

			var oldPass = document.getElementById('inputPasswordOld').value ;

			var newPass = document.getElementById('inputPasswordNew').value;

            var newPassv = document.getElementById('inputPasswordNewVerify').value;



			

			if(oldPass != "<?php echo $password; ?>"){

				document.getElementById('msgOld').innerHTML = "Password doesn't match";

                return false;

			}else if(newPass == oldPass){

                document.getElementById('msgNew').innerHTML = "Password cannot match the old password";

                return false;

            }else if(newPass != newPassv){

                document.getElementById('msgNewV').innerHTML = "Password doesn't match with the new password";

                return false;

            }

		

		}

    </script>

</body>

</html>

