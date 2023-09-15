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

	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


	<style>

		.mob-action {

			display: none;

		}

	</style>

</head>



<body>

	<!-- Navbar -->

	<?php include('navbar.php'); ?>



	<?php if ($layout == 0) : ?>

		<!-- View Patient -->

		<div class="page-wrapper">

			<div class="content">

				<div class="row">

					<div class="col-sm-4 col-3"data-aos="fade-right">

						<h4 class="page-title">Patients</h4>

					</div>

					<div class="col-sm-8 col-9 text-right m-b-20"data-aos="fade-left">

						<a href="<?php echo site_url('doctorProfile_Controller/addPersonalPatient') ?>" class="btn btn btn-success btn-rounded float-right"><i class="fa fa-plus"></i> Add Patient</a>

					</div>

				</div>

				<div class="row">

					<div class="col-md-12">

						<div class="table-responsive">

							<table class="table table-border table-striped custom-table datatable mb-0">

								<thead>

									<tr>

										<th>Sl. No.</th>

										<th>Name</th>

										<th>Age</th>

										<th>Address</th>

										<th>Phone</th>

										<th>Email</th>

										<th class="text-right">Action</th>

									</tr>

								</thead>

								<tbody>

									<?php $time = time();

									$year = "YYYY" ?>

									<?php $no = 0;

									if(count($patients)):

									foreach ($patients as $x) : ?>

										<tr>

											<td><?php $no = $no + 1;

												echo $no; ?></td>

											<td data-th="Name:"><?php echo $x['p_name'] ?></td>

											<td data-th="Age:"><?php echo (date('Y') - date("Y", strtotime($x['dob']))) ?></td>

											<td data-th="Address:"><?php echo $x['address'] ?></td>

											<td data-th="Phone:"><?php echo $x['phone'] ?></td>

											<td data-th="Email:"><?php echo $x['email_id'] ?></td>

											<td data-th="Action:" class="text-right">

												<div class="dropdown dropdown-action">

													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

													<div class="dropdown-menu dropdown-menu-right">

														<a class="dropdown-item" href="<?php echo site_url('doctorProfile_controller/editPrivatePatient/' . $x['p_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

														<a class="dropdown-item" href="<?php echo site_url('doctorProfile_controller/delPrivatePatient/' . $x['p_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

													</div>

												</div>

												<div class="mob-action text-left">

													<a class="" href="<?php echo site_url('doctorProfile_controller/editPrivatePatient/' . $x['p_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

													<a style="padding: 27px;" class="" href="<?php echo site_url('doctorProfile_controller/delPrivatePatient/' . $x['p_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

												</div>

											</td>

										</tr>

									<?php endforeach; ?>

                                   <?php else: ?>

                                        <tr>

                                            <td colspan="12">

                                                <center>

                                                    <p class="text-danger"><?php echo 'No patients added till far'; ?></p>

                                                </center>

                                            </td>

                                        </tr>

                                        <?php endif; ?>

								</tbody>

							</table>

						</div>

					</div>

				</div>

			</div>

		</div>

	<?php elseif ($layout == 1) : ?>

		<!-- Add Personal Patient -->

		<div class="page-wrapper">

			<div class="content">

				<div class="row">

					<div class="col-sm-4">

						<h4 class="page-title">Add Personal Patient</h4>

					</div>

				</div>

				<div class="row">

					<div class="col-md-12">

						<form method="post" action="<?php echo site_url('doctorProfile_Controller/addPatient') ?>">

							<div class="row">

								<div class="col-sm-6">

									<div class="form-group"data-aos="fade-right">

										<label>Patient ID: </label>

										<input class="form-control" readonly name="p_id" value="<?php echo uniqid('P') ?>" type="text">

										<!-- <input  readonly name="hos_id" value="" type="hidden"> -->

									</div>

								</div>

								<div class="col-sm-6">

								</div>

								<div class="col-sm-6">

									<div class="form-group"data-aos="fade-left">

										<label>Full Name: <span class="text-danger">*</span></label>

										<input class="form-control" required name="p_name" id="p_name" type="text">

									</div>

								</div>

								<div class="col-sm-6">

									<div class="form-group"data-aos="fade-right">

										<label>Email ID: <span class="text-danger">*</span></label>

										<input class="form-control" required type="email" name="email_id" id="email_id">

									</div>

								</div>

								<div class="col-sm-6">

									<div class="form-group"data-aos="fade-right">

										<label>Date of Birth: <span class="text-danger">*</span></label>

										<div class="cal-icon">

											<input type="date" required class="form-control" name="dob" id="dob">

										</div>

									</div>

								</div>

								<div class="col-sm-6">

									<div class="form-group gender-select"data-aos="fade-left">

										<label class="gen-label">Gender: <span class="text-danger">*</span></label>

										<div class="form-check-inline">

											<label class="form-check-label">

												<input type="radio" required name="gender" value="male" class="form-check-input">Male

											</label>

										</div>

										<div class="form-check-inline">

											<label class="form-check-label">

												<input type="radio" required name="gender" value="female" class="form-check-input">Female

											</label>

										</div>

									</div>

								</div>

								<div class="col-sm-6">

									<div class="row">

										<div class="col-sm-12">

											<div class="form-group" data-aos="fade-left">

												<label>Address <span class="text-danger">*</span></label>

												<input type="text" required class="form-control " name="address" id="address">

											</div>

										</div>

									</div>

								</div>

								<div class="col-sm-6">

									<div class="form-group" data-aos="fade-right">

										<label>Phone No.: <span class="text-danger">*</span></label>

										<input class="form-control" required type="text" name="phone" id="phone">

									</div>

								</div>

							</div>

							<div class="m-t-20 text-center">

								<button type="submit" class="btn btn-primary submit-btn">Add Patient</button>

							</div>

						</form>

					</div>

				</div>

			</div>

		</div>

	<?php elseif ($layout == 2) : ?>

		<!-- Edit Personal Patients -->

		<div class="page-wrapper">

			<div class="content">

				<div class="row">

					<div class="col-sm-4">

						<h4 class="page-title">Edit Personal Patients</h4>

					</div>

				</div>

				<div class="row">

					<div class="col-md-12">

						<form method="post" action="<?php echo site_url('doctorProfile_Controller/editPrivatePatient') ?>">

							<div class="row">

								<div class="col-sm-6">

									<div class="form-group">

										<label>Patient ID: </label>

										<input class="form-control" readonly name="p_id" value="<?php echo $pData[0]['p_id'] ?>" type="text">

									</div>

								</div>

								<div class="col-sm-6">

									<div class="form-group">

										<label>Full Name: <span class="text-danger">*</span></label>

										<input class="form-control" required name="p_name" id="p_name" value="<?php echo $pData[0]['p_name'] ?>" type="text">

									</div>

								</div>

								<div class="col-sm-6">

									<div class="form-group">

										<label>Email ID: <span class="text-danger">*</span></label>

										<input class="form-control" required type="email" name="email_id" value="<?php echo $pData[0]['email_id'] ?>" id="email_id">

									</div>

								</div>

								<div class="col-sm-6">

									<div class="form-group">

										<label>Date of Birth: <span class="text-danger">*</span></label>

										<div class="cal-icon">

											<input type="date" required value="<?php echo $pData[0]['dob'] ?>" class="form-control" name="dob" id="dob">

										</div>

									</div>

								</div>

								<div class="col-sm-6">

									<div class="form-group gender-select">

										<label class="gen-label">Gender: <span class="text-danger">*</span></label>

										<div class="form-check-inline">

											<label class="form-check-label">

												<input type="radio" required name="gender" <?php if ($pData[0]['gender'] == 'male') {

																								echo 'checked';

																							} ?> value="male" class="form-check-input">Male

											</label>

										</div>

										<div class="form-check-inline">

											<label class="form-check-label">

												<input type="radio" required name="gender" <?php if ($pData[0]['gender'] == 'female') {

																								echo 'checked';

																							} ?> value="female" class="form-check-input">Female

											</label>

										</div>

									</div>

								</div>

								<div class="col-sm-6">

									<div class="row">

										<div class="col-sm-12">

											<div class="form-group">

												<label>Address <span class="text-danger">*</span></label>

												<input type="text" required value="<?php echo $pData[0]['address'] ?>" class="form-control" name="address" id="address">

											</div>

										</div>

									</div>

								</div>

								<div class="col-sm-6">

									<div class="form-group">

										<label>Phone No.: <span class="text-danger">*</span></label>

										<input class="form-control" required type="text" value="<?php echo $pData[0]['phone'] ?>" name="phone" id="phone">

									</div>

								</div>

							</div>

							<div class="m-t-20 text-center">

								<button type="submit" class="btn btn-primary submit-btn">Save Patient</button>

							</div>

						</form>

					</div>

				</div>

			</div>

		</div>

	<?php endif; ?>



	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
		AOS.init({
		offset: 130,
		duration: 1000,
		});
	</script>

</body>



</html>