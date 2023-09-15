<?php 

// print_r($_SESSION);
// die;

if (isset($_SESSION['userLog'])) {
$userData = $this->db->where('email_id', $_SESSION['email_id'])
->get('user_details')->result_array();
if(!$userData){
  header('location:' . site_url('userProfile_Controller/index'));
}
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
      integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
      crossorigin="anonymous" />

  <link rel="stylesheet" href="<?php echo base_url('css/cssUser/style.css') ?>">

  <title></title>

  <style>

  .login-btn {

      padding: 5px 8px 5px 8px;

      border: 2px solid whitesmoke;

      color: white;

      transition: 0.25s ease-in-out;

  }


  .user-header{
    background-color: #fff;
    padding: 0;
    box-sizing: border-box;
    border-radius: 0;
    padding: 0px 80px;
    height: 80px;
    position: sticky;
    z-index: 100;
    top: 0;
    box-shadow: 0 4px 8px rgb(0 0 0 / 12%);
  }
 
#login{
box-shadow: #d21818;

}
nav{
  display:flex;
  justify-content: space-between;
  padding:10px 0px;
}

nav ul{
  margin-bottom:0px;
  display:flex;
  list-style-type:none;
  margin-left: 15px;
}

.nav-link {
  display: block;
  padding: 0.5rem 1rem;
  color: #C82333;
}

nav .logo img{
  height: 43px;
   margin-top: 16px !important;
   filter: brightness(.5);
}


.left-side-nav{
  background: #ffdbdb;
  display:none;
}

.left-side-nav ul {
  display: block;
  margin: 0 !important;
  justify-content: inherit;
  line-height: 48px;
  padding: 30px;
  position: absolute;
  left: 0px;
  z-index: 10000;
  background: #ffcfcf;
  top: 114px;
  left: 10px;
}



  .login-btn:hover {

      transform: scale(1.2);

      background: whitesmoke;

      cursor: pointer;

      color: red;

  }

  .navbar-dark .navbar-nav .nav-link {
  color: #fff !important;
}

.navbar-dark .navbar-nav .nav-link:hover{
  color: #fff !important;
}

  .dropdown-item:focus,

  .dropdown-item:hover {

      color: #fff !important;

      text-decoration: blue;

      background-color: #d21818 !important;

  }

  .bg-flor {
   background-color:#d21818 !important;
}

.nav-link:focus, .nav-link:hover {
  text-decoration: none;
  color: #fff !important;
}



.tooltip-01 {
position: relative;
display: inline-block;

}

.user-link{
  font-size:18px;
}

.tooltip-01 .tooltiptext {
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 20px;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 106%;
  margin-left: -60px;
  opacity: 0;
  transition: opacity 0.3s;
  font-size: 14px;
}

.tooltip-01 .tooltiptext::after {
content: "";
position: absolute;
top: 100%;
left: 50%;
margin-left: -5px;
border-width: 5px;
border-style: solid;
border-color: #555 transparent transparent transparent;
}

.tooltip-01:hover .tooltiptext {
visibility: visible;
opacity: 1;
}


.mobile-nav{
  background:none;
  border:none !important;
  outline:none !important;
  color:#fff;
  display:none;
}

.right-nav-sec ul{
  padding:30px;
  display:inherit;
  background: #ffd1d1;
  line-height:45px;
  position:absolute;
  opacity:0;
}

.right-nav-sec ul li a{
  color:#f00;
  text-decoration:none;
}

.review{
  margin-top: 12px;
    margin-right: 20px;
    font-weight: 700;
    color: #d21818;
}


@media only screen and (max-width: 991.98px){
  nav .logo img{
  height: 38px;
   margin-top: 13px;
}

.mobile-nav{
  display:block;
}

nav {
  justify-content:inherit !important;
  position: relative;
}

.nav-link {
  display: block;
  color: #fff;
  padding: 10px !important;
}

.nav-link:focus, .nav-link:hover {
  text-decoration: none;
  color: #fff !important;
}



.left-bar-mob ul {
  list-style: none;
  display: none;
  padding-top: 11%;
  height: 50vh !important;
  background-color: #fcf3f3;
  margin-top: 30px !important;
}

.dropdown-menu {
  left:-30px !important;
}

.right-nav-sec ul{
  padding:30px;
  background: #ffd1d1;
  line-height:45px;
  position:absolute;
  right: 0px;
  top: 90px;
  z-index: 1000;
  opacity: 1;
}






}

  </style>

</head>



<body>

     <header class="user-header">
       <div class="container">
           <nav>
               <div class="logo">
                <a href="<?php echo site_url('user/timeline') ?>">    <img src="<?php echo base_url('images/AAHRS_logo5.png') ?>" alt="logo"></a>
               </div>

               
 
               <ul>  
               <a href="<?php echo site_url('user/reviews')?>" class="review">Reviews</a>

                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
                           <?php if(isset($userData) &&$userData!=='') : ?>
                            <?php 
                               if(isset($userData[0]['picture']) == 1)
                               {
                                 if($userData[0]['picture']!==''):?>
                                   <img src="<?php echo $userData[0]['picture'] ?>" class="img-fluid rounded-circle" style='width:40px;height:40px;box-shadow:5px 5px 5px .5' alt="">
                              
                             
                                    <?php else:?>
                               <img src="<?php echo base_url('images/avatar.png')?>" style='width:40px;height:40px;border-radius:25px;background:white' />
                                <?php endif;
                                }?>

                      </a>
 
                  
                      <?php if(isset($_SESSION['email_id'])):?>
                           <div class="dropdown-menu" style="z-index:1;" id='hideData' aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="<?php echo site_url('userProfile_Controller/myaccount?id='.base64_encode($_SESSION['email_id']).'') ?>">My Account</a>
      
                          <?php endif;?>
                          <a class="dropdown-item" href="<?php echo site_url('userProfile_Controller/myappoint') ?>">My
                              Appointments</a>
                          <a class="dropdown-item" href="<?php echo site_url('userProfile_Controller/feedbacks') ?>">My
                              Feedbacks</a>
                          <a class="dropdown-item" href="<?php echo site_url('userProfile_Controller/medicalHis') ?>">Medical History</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="<?php echo site_url('LogIO_Controller/logout') ?>">Log
                              Out</a>
                          <!-- http://localhost/aahrs/LogIO_Controller/logout -->
                      </div>

                  </li>


              </ul>

          <?php else: ?>

       

             <?php echo"<script>document.getElementById('navbarDropdown').style.display='none'</script>"?>
             <a href="<?php echo site_url('user/login-page'); ?> "id='login' class="btn" style="width:80px;height:37px;text-decoration:none;font-weight:500;top:10px;position:relative;background:red;color:white">Login</a>

          <?php endif; ?>







          </nav>

      </div>
  </header>



  <div class="container mt-5">

      <div class="row desk-nav justify-content-center">
          <div class=" col-12 col-sm-6 col-md-2 col-lg-2 text-center"><a
                  href="<?php echo site_url('user/recommend-me') ?>"
                  class="user-link <?php if ($this->uri->segment(2) == 'recommend-me') : ?> <?php echo 'active' ?> <?php endif; ?>"
                  class="user-link">Recommend Me</a></div>

          <div class=" col-12 col-sm-6 col-md-2 col-lg-2 text-center"><a
                  href="<?php echo site_url('user/reviews') ?>"
                  class="user-link <?php if ($this->uri->segment(2) == 'reviews') : ?> <?php echo 'active' ?> <?php endif; ?>">Reviews</a>
          </div>

          <div class=" col-12 col-sm-6 col-md-2 col-lg-2 text-center"><a
                  href="<?php echo site_url('user/top-hospitals') ?>"
                  class="user-link <?php if ($this->uri->segment(2) == 'top-hospitals') : ?> <?php echo 'active' ?> <?php endif; ?>">Top
                  Hospitals</a></div>

          <div class=" col-12 col-sm-6 col-md-2 col-lg-2 text-center"><a
                  href="<?php echo site_url('user/top-doctors') ?>"
                  class="user-link <?php if ($this->uri->segment(2) == 'top-doctors') : ?> <?php echo 'active' ?> <?php endif; ?>"
                  class="user-link">Appointment&nbsp;Booking</a></div>
      </div>

      <div class="row mob-nav justify-content-center">

          <div class=" col-3 col-sm-3 text-center"><a href="<?php echo site_url('user/timeline') ?>"

                  class="user-link <?php if ($this->uri->segment(2) == 'timeline') : ?> <?php echo 'active' ?> <?php endif; ?>"

                  class="user-link">
                  
                  
                  <div class="tooltip-01"><i  class="fas fa-stream"></i>
                  <span class="tooltiptext">Timeline</span>
                  </div>

              </a></div>

          <div class=" col-3 col-sm-3 col-md-2 col-lg-2 text-center"><a

                  href="<?php echo site_url('user/reviews') ?>"

                  class="user-link <?php if ($this->uri->segment(2) == 'reviews') : ?> <?php echo 'active' ?> <?php endif; ?>">
                      
                      <div class="tooltip-01"><i class="fas fa-star-half-alt"></i>
                  <span class="tooltiptext">Reviews</span>
                  </div>
                      
                  </a>

          </div>


          <div class=" col-3 col-sm-3 col-md-2 col-lg-2 text-center">
              <a href="<?php echo site_url('user/top-hospitals') ?>"

                  class="user-link <?php if ($this->uri->segment(2) == 'top-hospitals') : ?> <?php echo 'active' ?> <?php endif; ?>">
                      
                      <div class="tooltip-01"><i class="fas fa-hospital"></i>
                  <span class="tooltiptext">Top hospitals</span>
                  </div>
                  </a>

          </div>


          <div class=" col-3 col-sm-3 col-md-2 col-lg-2 text-center"><a

                  href="<?php echo site_url('user/top-doctors') ?>"

                  class="user-link <?php if ($this->uri->segment(2) == 'top-doctors') : ?> <?php echo 'active' ?> <?php endif; ?>"

                  class="user-link">
                  <div class="tooltip-01"><i class="fas fa-user-md"></i>
                  <span class="tooltiptext">Appointment Booking</span>
                  </div>
              </a>
              </div>

      </div>



  </div>





  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"

      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">

  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"

      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">

  </script>


<script>
function myFunction() {
var x = document.getElementById("myDIV");
if (x.style.display === "none") {
  x.style.display = "block";
} else {
  x.style.display = "none";
}
}
</script> 


</body>



</html>