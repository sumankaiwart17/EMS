<?php

// if(!$_SESSION['email_id']){

//     header ('location:'.site_url('mainController/temp'));

// } 

?>

<!DOCTYPE html>

<html lang="en">



<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

	<title>Patient</title>

	<style>
		.search-bar {
			position: relative;

		}

		.search-bar i {
			position: absolute;
			top: 13px;
			right: 27px;
		}

		.mob-action {

			display: none;

		}
	</style>

</head>



<body>

	<!-- Navbar -->

	<?php include('navbar.php'); ?>

	<?php if ($layout == 0) : ?>

		<!-- Send Prescription View Page -->

		<div class="page-wrapper">

			<div class="content">

				<div class="row">

					<div class="col-sm-4 col-3">

						<h4 class="page-title">Prescription</h4>

					</div>

					<div class="col-sm-8 col-9 text-right m-b-20">



					</div>

				</div>
				<div class="row">
                    <div class="col-lg-4 search-bar">
                        <input type="text" class="form-control mb-3" placeholder="Search Prescription" id="search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                </div>
				<div class="row">

					<div class="col-md-12">

						<div class="table-responsive">

							<table class="table table-border table-striped custom-table datatable mb-0">

								<thead>

									<tr >

										<th>#</th>

										<th>Name</th>

										<th>Age</th>

										<th>Address</th>

										<th>Phone</th>

										<th>Email</th>

										<th>Status</th>

										<th class="text-right">Action</th>

									</tr>

								</thead>

								<tbody>

									<?php $time = time();

									$year = "YYYY";

									$no = 0;
									?>

									<?php foreach ($patients as $x) : ?>

										<tr class="searchprescription">

											<td><?php $no = $no + 1;

												echo $no; ?></td>

											<td> <?php echo $x['p_name'] ?></td>

											<td data-th="Age:"><?php echo (date('Y') - date("Y", strtotime($x['dob']))) ?></td>

											<td data-th="Address:"><?php echo $x['address'] ?></td>

											<td data-th="Phone:"><?php echo $x['phone'] ?></td>

											<td data-th="Email:"><?php echo $x['email_id'] ?></td>

											<td data-th="Status:"><span class=" custom-badge status-green">Active</span></td>

											<td data-th="Action:" class="text-right">

												<div class="dropdown dropdown-action">

													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

													<div class="dropdown-menu dropdown-menu-right">

														<a class="dropdown-item" href="<?php echo site_url('doctorProfile_Controller/editPrescription/' . $x['p_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i>Perscription</a>

														<!-- <a class="dropdown-item" href="<?php //echo site_url('hospital_controller/delPatient/'.$x['p_id']) 

																							?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a> -->

													</div>

												</div>

												<div class="mob-action text-left">

													<a class="" href="<?php echo site_url('doctorProfile_Controller/editPrescription/' . $x['p_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

													<!-- <a style="padding: 27px;" class="" href="<?php //echo site_url('hospital_controller/delPatient/'.$x['p_id'])  

																									?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a> -->

												</div>

											</td>

										</tr>

									<?php endforeach; ?>

								</tbody>

							</table>

						</div>

					</div>

				</div>

			</div>

		</div>

	<?php elseif ($layout == 2) : ?>

		<!-- Edit Prescription-->

		<div class="page-wrapper">

			<div class="content">

				<div class="row">

					<div class="col-sm-4">

						<h4 class="page-title">Edit Prescription</h4>

					</div>

				</div>

			</div>

		</div>

	<?php endif; ?>

	<script>
		$("#search").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$(".searchprescription").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	</script>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</body>



</html>