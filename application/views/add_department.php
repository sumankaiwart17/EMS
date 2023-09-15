<!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/bdd84c35b8.js" crossorigin="anonymous"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 </head>
 <style>
   body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
  background-color: #16B1BE;
}
.navbar {
  background-color: #0879c9;
}
.navbar .navbar-nav .nav-link{
  color: #fff;
}
.navbar .navbar-nav .nav-link:hover{
  color: #fbc531;
}
.navbar .navbar-nav .active> .nav-link{
  color: #fbc531;
}
@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}
 </style>
 </head>
 <?php include('navbar.php'); ?>
 <body>
 
  <div class="card" style="margin-left: 0.5%;margin-bottom: 4%;margin-top: 5%;">
    <div class="card-header-muted">
        <h3 class="mb-5" style="color: #16B1BE;">ADD DEPARTMENTS</h3>
       </div>
       <div class="d-flex justify-content-between">
        <div>Total: 167 Departments</div>
        <div>Select all &nbsp;
          Action with selected (6) <i class="fas fa-angle-down"></i></div>
    </div>
        <div class="card-body">
        <table class="table table-striped table table-bordered table table-hover" style="padding: 0%;">
        <thead>
      <tr class="table-secondary">
        <th scope="col"><input type="checkbox" id="id">
        <label for="id">ID</label></th>
        <th scope="col">Department</th>
        <th scope="col">Till open</th>
        <th scope="col">Department type</th>
        <th scope="col">Block number</th>
        <th scope="col">Floor number</th>
        <th scope="col">SPOC</th>
        <th scope="col">Services</th>
        <th scope="col">Add-ons services</th>
        <th scope="col">Docs</th>
        <th scope="col">Control</th>
      </tr>
    </thead>
    <tbody>
      <tr class="table-secondary">
        <td scope="row" data-label="ID"><input type="checkbox" id="id">
          <label for="id">10</label></td>
        <td data-label="Department">CSE</td>
        <td data-label="Till open">24hrs</td>
        <td data-label="Department type">1st</td>
        <td data-label="Block number">5</td>
        <td data-label="Floor number">5th</td>
        <td data-label="SPOC">Yes</td>
        <td data-label="Services">Faith</td>
        <td data-label="Add-ons services">Pk</td>
        <td data-label="Docs">Required</td>
        <td data-label="Control"><i class="fas fa-pen-square fa-lg"> <i class="fas fa-baby-carriage fa-sm"></i></i></td>
      </tr>
      <tr class="table-info">
        <td scope="row" data-label="ID"><input type="checkbox" id="234">
          <label for="25">25</label></td>
        <td data-label="Department">IT</td>
        <td data-label="Till open">20hrs</td>
        <td data-label="Department type">2nd</td>
        <td data-label="Block number">9</td>
        <td data-label="Floor number">3rd</td>
        <td data-label="SPOC">Yes</td>
        <td data-label="Services">Faith</td>
        <td data-label="Add-ons services">Pk</td>
        <td data-label="Docs">Required</td>
        <td data-label="Control"><i class="fas fa-pen-square fa-lg"> <i class="fas fa-baby-carriage fa-sm"></i></i></td>
      </tr>
      <tr>
        <td scope="row" data-label="ID"><input type="checkbox" id="234">
          <label for="30">30</label></td>
        <td data-label="Department">ECE</td>
        <td data-label="Till open">10hrs</td>
        <td data-label="Department type">3rd</td>
        <td data-label="Block number">7</td>
        <td data-label="Floor number">4th</td>
        <td data-label="SPOC">Yes</td>
        <td data-label="Services">Faith</td>
        <td data-label="Add-ons services">Pk</td>
        <td data-label="Docs">Required</td>
        <td data-label="Control"><i class="fas fa-pen-square fa-lg"> <i class="fas fa-baby-carriage fa-sm"></i></i></td>
      </tr>
      <tr class="table-info">
        <td scope="row" data-label="ID"><input type="checkbox" id="234">
          <label for="45">45</label></td>
        <td data-label="Department">CIVIL</td>
        <td data-label="Till open">5hrs</td>
        <td data-label="Department type">4th</td>
        <td data-label="Block number">10</td>
        <td data-label="Floor number">2nd</td>
        <td data-label="SPOC">Yes</td>
        <td data-label="Services">Faith</td>
        <td data-label="Add-ons services">Pk</td>
        <td data-label="Docs">Required</td>
        <td data-label="Control"><i class="fas fa-pen-square fa-lg"> <i class="fas fa-baby-carriage fa-sm"></i></i></td>
        </tr>
        <tr>
          <td scope="row" data-label="ID"><input type="checkbox" id="234">
            <label for="50">50</label></td>
          <td data-label="Department">MECH</td>
          <td data-label="Till open">7hrs</td>
          <td data-label="Department type">5th</td>
          <td data-label="Block number">2</td>
          <td data-label="Floor number">1st</td>
          <td data-label="SPOC">Yes</td>
          <td data-label="Services">Faith</td>
          <td data-label="Add-ons services">Pk</td>
          <td data-label="Docs">Required</td>
          <td data-label="Control"><i class="fas fa-pen-square fa-lg"> <i class="fas fa-baby-carriage fa-sm"></i></i></td>
        </tr>
       
    </tbody>
  </table> 
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!-- popup modal (for location)-->
	<script src="js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- //popup modal (for location)-->
</body>
</html>