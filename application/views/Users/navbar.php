<?php if (isset($_SESSION['userLog']) && $_SESSION['userLog'] == true) {

$userData = $this->db->where('email_id', $_SESSION['email_id'])

  ->get('user_details')

  ->result_array();

} ?>

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
  color: #fff;
}

nav .logo img{
  height: 43px;
   margin-top: 16px !important;
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

  <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-flor">

      <div class="container">

          <a class="navbar-brand" href="#"><img src="<?php echo base_url('images/AAHRS_logo5.png') ?>" alt="logo"

                  style="height: 43px; margin-top: 5px;"></a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"

              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

              <span class="navbar-toggler-icon"></span>

          </button>



          <div class="collapse navbar-collapse" id="navbarSupportedContent">

              <ul class="navbar-nav ml-auto"><?php if (!isset($userData)) : ?>

                  <li class="nav-item">

                      <a class="nav-link  " href="<?php echo site_url('user/login-page') ?>"><span

                              class="login-btn btn btn-danger">Join Now</span> </a>

                  </li>

                  <?php else : ?>

                  <li class="nav-item noti">

                      <a class="nav-link mt-2 mr-2" href="#"><i class="fas fa-bell fa-lg"></i></a>

                  </li>

                  <li class="nav-item bell">

                      <a class="nav-link mt-2 mr-2" href="#"><i class="fas fa-comment fa-lg"></i></a>

                  </li>



                  <li class="nav-item dropdown">

                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"

                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                          <img src="<?php if ($userData[0]['picture'] != '') {

                                          echo $userData[0]['picture'];

                                        } else {

                                          echo base_url('images/avatar.png');

                                        } ?>" class="img rounded-circle" style="height: 40px;width:40px;"

                              alt="profilepic">

                      </a>

                      <div class="dropdown-menu" style="z-index:1;" aria-labelledby="navbarDropdown">

                          <a class="dropdown-item"

                              href="<?php echo site_url('userProfile_Controller/myaccount?id=' .$_SESSION['email_id'] . '') ?>">My

                              Account</a>

                          <a class="dropdown-item"

                              href="<?php echo site_url('userProfile_Controller/myappoint') ?>">My Appointments</a>

                          <a class="dropdown-item"

                              href="<?php echo site_url('userProfile_Controller/feedbacks') ?>">My Feedbacks</a>

                          <a class="dropdown-item"

                              href="<?php echo site_url('userProfile_Controller/medicalHis') ?>">Medical History</a>

                          <div class="dropdown-divider"></div>

                          <a class="dropdown-item" href="<?php echo site_url('LogIO_Controller/logout') ?>">Log

                              Out</a>

                      </div>

                  </li>

                  <?php endif; ?>

              </ul>



          </div>

      </div>



  </nav> -->

     <header class="bg-flor">
       <div class="container">
           <nav>
               <div class="logo">
                <a href="<?php echo site_url('user/timeline') ?>">    <img src="<?php echo base_url('images/AAHRS_logo5.png') ?>" alt="logo"></a>
               </div>
 
               <ul>
                   <li>

                       <a class="nav-link mt-2 " href="#"><i class="fas fa-bell fa-lg"></i></a>

                   </li>

                    <li>

                       <a class="nav-link mt-2 " href="#"><i class="fas fa-comment fa-lg"></i></a>

                    </li>




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
 
                  
                     
                           <div class="dropdown-menu" style="z-index:1;" id='hideData' aria-labelledby="navbarDropdown">
                            <?php if(isset($_SESSION['email_id'])):?>

                              <a class="dropdown-item" href="<?php echo site_url('userProfile_Controller/myaccount?id='.$_SESSION['email_id'].'') ?>">My Account</a>
                        <?php else:?>
                        <?php echo'no sess';;?>
                       
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


                  <!-- <li>

                   <a class="nav-link mt-2 " href="#">
                   <button onclick="myFunction()" class="mobile-nav"><i class="fas fa-bars"></i></button> 
                   </a>
                         
                   <div class="right-nav-sec"id="myDIV">
                          <ul>

                          <li><a href="<?php echo site_url('userProfile_Controller/recommendMe') ?>">Recommend Me</a></li>

                          <li><a href="<?php echo site_url('userProfile_Controller/compare') ?>">Compare</a></li>

                          <li><a href="<?php echo site_url('userProfile_Controller/userconsult') ?>">Consults</a></li>

                          <li><a href="#">Articles</a></li>

                          <li><a href="#">Most Searched</a></li>

                          <li><a href="<?php echo site_url('userProfile_Controller/viewOffers'); ?>">Offers</a></li>

                      </ul> 

                  </div>

                  </li> -->



              </ul>

          <?php else: ?>

             <?php echo"<script>document.getElementById('navbarDropdown').style.display='none'</script>"?>
             <a href="<?php echo site_url('user/login-page'); ?> "id='login' class="btn" style="width:80px;height:37px;text-decoration:none;font-weight:500;top:10px;position:relative;background:white;color:red">Login</a>

          <?php endif; ?>







          </nav>

      </div>
  </header>



  <div class="container mt-3">



      <div class="row desk-nav justify-content-center">

          <div class=" col-12 col-sm-6 col-md-2 col-lg-2 text-center"><a

                  href="<?php echo site_url('user/timeline') ?>"

                  class="user-link <?php if ($this->uri->segment(2) == 'timeline') : ?> <?php echo 'active' ?> <?php endif; ?>"

                  class="user-link">Timeline</a></div>

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

                  class="user-link">Appointment&nbspBooking</a></div>

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
                  <span class="tooltiptext">Appointment Booking</span>
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