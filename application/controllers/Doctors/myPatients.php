<?php
// print_r($_SESSION);die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<title>Private Patients</title>
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">

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

		<!-- View Patient -->

		<div class="page-wrapper">

			<div class="content">

				<div class="row">

					<div class="col-sm-4 col-3" data-aos="fade-right">

						<h4 class="page-title">Private Patients</h4>

					</div>

					<div class="col-sm-8 col-9 text-right m-b-20" data-aos="fade-left">

						<a href="<?php echo site_url('DoctorProfile_Controller/addPersonalPatient') ?>" class="btn btn btn-success btn-rounded float-right"><i class="fa fa-plus"></i> Add Patient</a>

					</div>

				</div>
				<div class="row">
					<div class="col-lg-4 search-bar">
						<input type="text" class="form-control mb-3" placeholder="Search Patients" id="search">
						<i class="fa fa-search" aria-hidden="true"></i>
					</div>
				</div>
				<div class="row">

					<div class="col-md-12">

						<div class="table-responsive">

							<table class="table table-border table-striped custom-table datatable mb-0">

								<thead>

									<tr>

										<th>#</th>

										<th>Name</th>

										<th>Age</th>

										<th>Address</th>

										<th>Phone</th>

										<th>Email</th>

										<th>Prescription</th>

										<th>View Details</th>

										<th>PDF</th>

										<th class="text-right">Action</th>

									</tr>

								</thead>

								<tbody>

									<?php $time = time();

									$year = "YYYY" ?>

									<?php $no = 0;

									if (count($patients)) :

										foreach ($patients as $x) : ?>

											<tr class="searchpatients">

												<td><?php $no = $no + 1;

													echo $no; ?></td>

												<td data-th="Name:"><?php echo $x['p_name'] ?></td>

												<td data-th="Age:"><?php echo (date('Y') - date("Y", strtotime($x['dob']))) ?></td>

												<td data-th="Address:"><?php echo $x['address'] ?></td>

												<td data-th="Phone:"><?php echo $x['phone'] ?></td>

												<td data-th="Email:"><?php echo $x['email_id'] ?></td>

												<td data-th="Prescription:"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#MedicationModal<?php echo $x['p_id']; ?>">

														<?php

														$res = $this->db->select('*')->from('hospital_patients_medication')->where('p_id', $x['p_id'])->get();

														if ($res->num_rows() > 0) {
															echo "View/Edit Prescription";
														} else {
															echo "Add Prescription";
														}

														?>

													</button></td>

												<td data-th="Send History:"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo $x['p_id']; ?>exampleModalLong">
														View History
													</button></td>

												<td data-th="PDF:"> <a href="<?php echo site_url('Medications_pdf_controller/generatePdf/' . $x['p_id']) ?>"><i class="fa fa-file-pdf-o" style="font-size:30px;color:red"></i></a></td>


												<td data-th="Action:" class="text-right">

													<div class="dropdown dropdown-action">

														<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

														<div class="dropdown-menu dropdown-menu-right">

															<a class="dropdown-item" href="<?php echo site_url('DoctorProfile_Controller/editPrivatePatient/' . $x['p_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

															<a class="dropdown-item" href="<?php echo site_url('DoctorProfile_Controller/delPrivatePatient/' . $x['p_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

														</div>

													</div>

													<div class="mob-action text-left">

														<a class="" href="<?php echo site_url('DoctorProfile_Controller/editPrivatePatient/' . $x['p_id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>

														<a style="padding: 27px;" class="" href="<?php echo site_url('DoctorProfile_Controller/delPrivatePatient/' . $x['p_id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

													</div>

												</td>

											</tr>

											<div class="modal fade" id="<?php echo $x['p_id']; ?>exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLongTitle">Patient History</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>

														<div class="modal-body">
															<div class="container">
																<div class="row p-2">
																	<div class="col-12">
																		<h4><strong>Patient Name: </strong><?php echo $x['p_name'] ?></h4>
																	</div>
																</div>
																<?php
																foreach ($treat_history as $y) :
																	if ($x['p_id'] == $y['p_id']) { ?>
																		<div class="row">
																			<div class="col"><strong>Department</strong></div>
																			<div class="col"><strong>Treatment</strong></div>
																			<div class="col"><strong>From Date</strong></div>
																			<div class="col"><strong>To Date</strong></div>
																		</div>

																		<div class="row">

																			<form id="add-details<?php echo $y['tret_id']; ?>" action="<?php echo site_url('hospital_Controller/updateHosTreat') ?>" method="post">
																				<?php echo '<div class="col">' . $y['dept_name'] . '</div>' ?>
																				<?php echo '<div class="col">' . $y['treat_name'] . '</div>' ?>
																				<?php echo '<div class="col">' . $y['from_date'] . '</div>' ?>
																				<?php echo '<div class="col">' . $y['to_date'] . '</div>' ?>
																		</div>

																		<small class="hide" style="display: none;"> From Date - </small>
																		<input type="date" class="form-control my-1" id="f_d<?php echo $y['tret_id']; ?>" style="display: none;" name="f_d" value="<?php echo $y['from_date'] ?>">
																		<small class="hide" style="display: none;"> To Date - </small>
																		<input type="date" class="form-control" id="t_d<?php echo $y['tret_id']; ?>" style="display: none;" name="t_d" value="<?php echo $y['to_date'] ?>">

																		<hr>
																		<div class="row">
																			<div class="col-12"><strong>Details : </strong>
																				<p id="details<?php echo $y['tret_id']; ?>"><?php echo $y['details']; ?></p>
																				<input type="hidden" id="p_id" name="treat_id" value="<?php echo $y['treat_id']; ?>">
																				<textarea style="display:none" name="details" class="form-control" name="" id="edit-details<?php echo $y['tret_id']; ?>" cols="10" rows="2"><?php echo $y['details']; ?></textarea>


																				<a href="javascript:void(0)" id="edit-btn<?php echo $y['treat_id']; ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit Details</a>
																				<button type="submit" class="btn-small btn-success my-1" style="display: none; float:right" id="save-btn<?php echo $y['tret_id']; ?>"> Save</button>

																				</form>

																			</div>

																		</div>

																		<hr>

																<?php }

																endforeach; ?>



															</div>

														</div>

														<!-- <div class="modal-footer">

													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

													<button type="button" class="btn btn-primary">Save changes</button>

													</div> -->

													</div>

												</div>

											</div>

											<div class="modal sharemodal" id="ShareModal<?php echo $x['p_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5>Share Medication</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>

														<div class="modal-body">
															<div class="container col">
																<h4>Share via:</h4>
																<div style="display: flex; height: 140px; justify-content: flex-start; align-items: center; align-content: center;">

																	<a href="#" style="margin: 10px; text-align: center;">
																		<h2 style="border: 1px solid transparent; background-color: #25D366; color: white; padding: 8px 16px;border-radius: 50%;font-size: 50px;"><i class="fab fa-whatsapp"></i></h2>

																		<span>Whatsapp</span>

																	</a>

																	<a href="<?php echo site_url('hospital_controller/sendPdfEmail?pid=' . $x['p_id'] . '') ?>" style="margin: 10px; text-align: center;">
																		<h2 style="border: 1px solid transparent; background-color: #BB001B; color: white; padding: 10px 18px;border-radius: 50%;font-size: 45px;margin: 10px;"><i class="far fa-envelope"></i></i></h2>
																		<span>Email</span>
																	</a>

																	<a href="<?php echo site_url('hospital_controller/viewMedication?pid=' . $x['p_id'] . '') ?>" style="margin: 10px; text-align: center;">

																		<h2 style="border: 1px solid transparent; background-color: grey; color: white; padding: 10px 18px;border-radius: 50%;font-size: 45px;margin: 10px;"><i class="fa fa-print" aria-hidden="true"></i></i></h2>
																		<span>Print</span>
																	</a>
																</div>
															</div>
														</div>

														<!-- <div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="button" class="btn btn-primary">Save changes</button>
													</div> -->

													</div>

												</div>

											</div>

											<div class="modal fade" id="exampleModal<?php echo $x['p_id']; ?>" tabindex="-100" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">

													<div class="modal-content" style="margin-right:200px!important;width:600px;max-height:100vh;">
														<form method="POST" action="<?php echo base_url('DoctorProfile_Controller/addSymptoms') ?>">
															<h3 class="text-center">Add symptoms <button type="button" class="btn btn" onclick="showpage()" style="margin-left:250px" data-dismiss="modal">X</button></h3>

															<div class="modal-body">

																<input type="hidden" name="p_id" value="<?php echo $x['p_id'] ?>">
																Symptoms <input type="text" name="symptoms" class="form-control">
																Provisional Diagnosis <input type="text" name='provisional' class="form-control" required>


															</div>
															<div class="modal-footer">

																<button type="submit" class="btn btn-success">Add Symptom</button>
															</div>
														</form>

													</div>
												</div>
											</div>

											<!-- Modal -->

											<div class="modal fade" id="MedicationModal<?php echo $x['p_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="MedicationModal" aria-hidden="true">
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content" id="hidetreat">
														<div class="modal-header">
															<h3 class="modal-title text-center" id="exampleModalLongTitle">Prescribed Medications</h3>
															<div>
																<!-- Button trigger modal -->
																<button type="button" data-dismiss="modal" aria-label="close" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $x['p_id']; ?>">
																	symptoms
																</button>

																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
														</div>
														<div class="modal-body">
															<div class="container">
																<div class="row p-2 mb-2 mdl-mob" style="display: none;">
																	<div class="col-12">
																		<h4 class="text-dark">Patient Name:&nbsp;&nbsp;<strong><?php echo $x['p_name'] ?></strong></h4>
																		<?php foreach ($medicines as $z) : ?>
																			<?php if ($z['p_id'] != $x['p_id']) {
																				continue;
																			} ?>

																			<div class="p-2 border-top border-bottom" style="white-space: nowrap;">
																				<p><strong>Medicine Name: </strong>&emsp;&emsp;&ensp;<?php echo $z['medicine'] ?></p>
																				<p><strong>Dosage: </strong>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<?php echo $z['dosage'] ?> </p>
																				<p><strong>Prescribed Date: </strong>&emsp;&emsp;<?php echo date("d/m/Y", strtotime($z['created_at'])) ?></p>
																				<p><strong>Prescribed Time: </strong>&emsp;&emsp;<?php echo date("g:i A", strtotime($z['created_at'])) ?></p>
																				<p><strong>Duration<small>(in days)</small>: </strong>&emsp;&emsp;&ensp;<?php echo $z['duration'] ?></p>
																				<!-- <p><strong>Assigned Doctor: </strong>&emsp;&ensp;&nbsp;<?php echo $z['doc_name'] ?></p> -->

																			</div>
																		<?php endforeach; ?>
																	</div>
																</div>

																<div class="row p-2 mb-2 mdl">
																	<div class="col-12">
																		<h4 class="text-dark">Patient Name:&nbsp;&nbsp;<strong><?php echo $x['p_name'] ?></strong></h4>
																	</div>
																</div>

																<div class="row p-2 border-top border-bottom mdl">
																	<div class="col-3 text-center">
																		<h4>Medicine Name</h4>
																	</div>

																	<div class="col-2 text-center">
																		<h4>Dosage</h4>
																	</div>

																	<div class="col-2 text-center">
																		<h4>Duration <br><small>(in days)</small></h4>
																	</div>

																	<div class="col-3 text-center">
																		<h4>Medicine Time</h4>
																	</div>


																	<div class="col-2 text-center">
																		<h4>Action</h4>
																	</div>

																</div>

																<?php foreach ($medicines as $z) : ?>

																	<?php if ($z['p_id'] != $x['p_id']) {

																		continue;
																	} ?>

																	<div id="dataShow<?php echo $z['id'] ?>" class="row p-2 border-bottom mdl">
																		<div id="medShw<?php echo $z['id'] ?>" class="col-3 text-center"><?php echo $z['medicine'] ?></div>
																		<div id="dosShw<?php echo $z['id'] ?>" class="col-2 text-center"><?php echo $z['dosage'] ?> </div>
																		<!-- <div class="col-3 text-center"><?php echo date("d/m/Y", strtotime($z['created_at'])) . ' ' . date("g:i A", strtotime($z['created_at'])) ?></div> -->
																		<div id="durShw<?php echo $z['id'] ?>" class="col-2 text-center"><?php echo $z['duration'] ?></div>
																		<div class="col-3 text-center" id="med_time<?php echo $z['id'] ?>"><?php echo $z['medicine_time'] ?></div>
																		<!--<div class="col-2 text-center"><?php echo $z['doc_name'] ?></div> -->
																		<!-- <div class="col-1 text-center">   <a href="<?php echo site_url('Medications_pdf_controller/generatePdf/' . $z['id']) ?>"
																	target="_blank"><i class="fa fa-file-pdf-o"
																	style="font-size:30px;color:red"></i></a></div> -->



																		<div class="col-2 text-center">
																			<div class="dropdown dropdown-action">
																				<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
																				<div class="dropdown-menu dropdown-menu-right">
																					<a class="dropdown-item" id="edit<?php echo $z['id'] ?>" href="javascript:void(0)"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
																					<a class="dropdown-item" href="<?php echo site_url('DoctorProfile_Controller/delete_private_patients_medicine/' . $z['id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>
																				</div>
																			</div>
																		</div>
																	</div>

																	<div id="dataEdit<?php echo $z['id'] ?>" style="display:none;" class="row p-2 border-bottom">

																		<form id="medForm<?php echo $z['id'] ?>" action="<?php echo site_url('DoctorProfile_Controller/edit_private_patients_medicine/' . $z['id']) ?>" method="POST">

																			<input type="hidden" name="hos_id" id="hos_id" value="<?php echo $x['hos_id']; ?>">

																			<input type="hidden" name="p_id" id="p_id" value="<?php echo $x['p_id']; ?>">

																			<div class="col-3 "><input type="text" name="medicine" class="form-control" value="<?php echo $z['medicine'] ?>" id="medicine" required></div>

																			<div class="col-2 ">
																				<textarea rows="3" name="dosage" class="form-control" value="<?php echo $z['dosage'] ?>" id="dosage" required><?php echo $z['dosage']; ?></textarea>
																			</div>

																			<div class="col-2">
																				<input type="number" name="duration" class="form-control" value="<?php echo $z['duration'] ?>" id="duration" required>
																			</div>

																			<!-- <div class="col-3 "><?php echo date("d/m/Y", strtotime($z['created_at'])) . ' ' . date("g:i A", strtotime($z['created_at'])) ?></div> -->

																			<div class="col">

																				<select name="medicine_time" class="form-control" required>
																					<option value="After Food" <?php echo $z['medicine_time'] === 'After Food' ? 'selected' : ''; ?>>After Food</option>
																					<option value="Before Food" <?php echo $z['medicine_time'] === 'Before Food' ? 'selected' : ''; ?>>Before Food</option>
																					<option value="Empty Stomach" <?php echo $z['medicine_time'] === 'Empty Stomach' ? 'selected' : ''; ?>>Empty Stomach</option>
																				</select>

																			</div>


																			<div class="col mr-3"><button type="submit" class="btn btn-block btn-success btn-lg"> SAVE</button></div>
																		</form>
																	</div>
																<?php endforeach; ?>

																<div class="row add_btn justify-content-center p-2">
																	<div class="col-5">
																		<button onclick="add()" class="btn btn-block btn-success">Add Medicine</button>
																	</div>
																</div>

																<div style="display:none" class="medForm mt-2 row p-2 border border-muted">
																	<form id="add-medicine<?php echo $x['p_id'] ?>" action="<?php echo site_url('DoctorProfile_Controller/add_private_patients_medicine') ?>" method="post">
																		<div class="col-12 form-group">
																			<label for="medicine">Medicine Name:</label>
																			<input type="text" name="medicine" class="form-control" id="medicine" required>
																		</div>


																		<div class="col-12 form-group">
																			<label for="duration">Duration <small>(in days)</small> :</label>
																			<input type="number" name="duration" class="form-control" id="duration" required>

																		</div>

																		<div class="col-12 form-group">

																			<label for="dosage">Dosage:</label><br>

																			<div class="d-flex justify-content-between">
																				<div>
																					<input type="checkbox" name="dosage[]" class="mr-2 ml-2" id="morning">
																					<label>Morning <input type="radio" name="mor_dosage" class="mr-2 ml-2" value="1">1
																						<input type="radio" name="mor_dosage" class="mr-2 ml-2" value="1/2"></label>1/2
																				</div>

																				<div class="mr-5">
																					<input type="checkbox" name="dosage[]" class="mr-2 ml-2" id="aft">
																					<label>Afternoon <input type="radio" name="aft_dosage" class="mr-2 ml-2" value="1">1
																						<input type="radio" name="aft_dosage" class="mr-2 ml-2" value="1/2"></label>1/2 <br>
																				</div>
																			</div>

																			<div class="d-flex justify-content-between">
																				<div>
																					<input type="checkbox" name="dosage[]" class="mr-2 ml-2" id="eve">
																					<label>Evening <input type="radio" name="eve_dosage" class="mr-2 ml-2" value="1">1
																						<input type="radio" name="eve_dosage" class="mr-2 ml-2" value="1/2"></label>1/2

																				</div>
																				<div class="" style="margin-right:80px;">
																					<input type="checkbox" name="dosage[]" class="mr-2 ml-2" id="night">
																					<label>Night <input type="radio" name="nit_dosage" class="mr-2 ml-2" value="1">1
																						<input type="radio" name="nit_dosage" class="mr-2 ml-2" value="1/2"></label>1/2 <br>
																				</div>

																			</div>


																		</div>
																		<div class="col-12 form-group">

																			<label for="dosage">Medicine Time:</label><br>

																			<input type="radio" name="medicine_time" class="mr-2 ml-2" style="" value="Before Food" required><label>Before Food</label>
																			<input type="radio" name="medicine_time" class="mr-2 ml-2" style="" value="After Food" required><label>After Food</label>
																			<input type="radio" name="medicine_time" class="mr-2 ml-2" style="" value="Empty Stomach" required><label>Empty Stomach</label>

																		</div>





																		<input type="hidden" name="hos_id" id="hos_id" value="<?php echo $x['hos_id']; ?>">
																		<input type="hidden" name="p_id" id="p_id" value="<?php echo $x['p_id']; ?>">
																		<div class="col-6 form-group">
																			<button type="button" onclick="cancel()" class="btn btn-block btn-danger">CANCEL</button>
																		</div>

																		<div class="col-6 form-group">
																			<button type="submit" class="btn btn-block btn-success">ADD</button>
																		</div>
																	</form>
																</div>
															</div>
														</div>

														<!-- <div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="button" class="btn btn-primary">Save changes</button>
													</div> -->
													</div>
												</div>
											</div>
										<?php endforeach; ?>
									<?php else : ?>
										<?php //echo "<span style='color:red'>No Patients Added</span><script>document.getElementById('hideData').style.display='none'</script>" 
										?>
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
						<form method="post" action="<?php echo site_url('DoctorProfile_Controller/addPatient') ?>">

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group" data-aos="fade-right">
										<label>Patient ID: </label>
										<input class="form-control" readonly name="p_id" value="<?php echo uniqid('P') ?>" type="text">
										<!-- <input  readonly name="hos_id" value="" type="hidden"> -->
									</div>
								</div>



								<div class="col-sm-6">
									<div class="form-group" data-aos="fade-left">
										<label>Full Name: <span class="text-danger">*</span></label>
										<input class="form-control" name="p_name" id="p_name" type="text">
										<span class="text-danger"><?php echo form_error('p_name'); ?></span>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group" data-aos="fade-right">
										<label>Email ID: <span class="text-danger">*</span></label>
										<input class="form-control" type="email" name="email_id" id="email_id">
										<span class="text-danger"><?php echo form_error('email_id'); ?></span>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group" data-aos="fade-right">
										<label>Date of Birth: <span class="text-danger">*</span></label>
										<input type="date" class="form-control" name="dob" id="dob">
										<span class="text-danger"><?php echo form_error('dob'); ?></span>

									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group gender-select" data-aos="fade-left">
										<label class="gen-label">Gender: <span class="text-danger">*</span></label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" value="male" class="form-check-input" checked>Male
											</label>
										</div>

										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" value="female" class="form-check-input">Female
											</label>


										</div>
										<span class="text-danger"><?php echo form_error('gender'); ?></span>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group" data-aos="fade-left">
												<label>Address <span class="text-danger">*</span></label>
												<input type="text" class="form-control " name="address" id="address">
												<span class="text-danger"><?php echo form_error('address'); ?></span>

											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group" data-aos="fade-right">
										<label>Phone No : <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="phone" id="phone">
										<span class="text-danger"><?php echo form_error('phone'); ?></span>

									</div>
								</div>
							</div>

							<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-success submit-btn">Add Patient</button>
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
						<form method="post" action="<?php echo site_url('DoctorProfile_Controller/editPrivatePatient/' . $this->uri->segment(3)) ?>">
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
										<input class="form-control" name="p_name" id="p_name" value="<?php echo $pData[0]['p_name'] ?>" type="text">
										<span class="text-danger"><?php echo form_error('p_name'); ?></span>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<label>Email ID: <span class="text-danger">*</span></label>
										<input class="form-control" type="email" name="email_id" value="<?php echo $pData[0]['email_id'] ?>" id="email_id">
										<span class="text-danger"><?php echo form_error('email_id'); ?></span>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<label>Date of Birth: <span class="text-danger">*</span></label>
										<input type="date" value="<?php echo $pData[0]['dob'] ?>" class="form-control" name="dob" id="dob">
										<span class="text-danger"><?php echo form_error('dob'); ?></span>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Gender: <span class="text-danger">*</span></label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" <?php if ($pData[0]['gender'] == 'male') {

																						echo 'checked';
																					} ?> value="male" class="form-check-input">Male

											</label>

										</div>

										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" <?php if ($pData[0]['gender'] == 'female') {

																						echo 'checked';
																					} ?> value="female" class="form-check-input">Female

											</label>
										</div>

										<span class="text-danger"><?php echo form_error('gender'); ?></span>

									</div>
								</div>

								<div class="col-sm-6">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Address <span class="text-danger">*</span></label>
												<input type="text" value="<?php echo $pData[0]['address'] ?>" class="form-control" name="address" id="address">
												<span class="text-danger"><?php echo form_error('address'); ?></span>
											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<label>Phone No : <span class="text-danger">*</span></label>
										<input class="form-control" type="text" value="<?php echo $pData[0]['phone'] ?>" name="phone" id="phone">
										<span class="text-danger"><?php echo form_error('phone'); ?></span>

									</div>
								</div>
							</div>

							<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-success submit-btn">Save Patient</button>
							</div>
						</form>
					</div>

				</div>

			</div>

		</div>

	<?php endif; ?>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="<?php echo base_url('js/jquery.slimscroll.js') ?>"></script>
	<script src="<?php echo base_url('js/select2.min.js') ?>"></script>
	<script src="<?php echo base_url('js/moment.min.js') ?>"></script>
	<script src="<?php echo base_url('js/bootstrap-datetimepicker.min.js') ?>"></script>
	<!-- <script src="<?php echo base_url('js/app.js') ?>"></script> -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	</script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<script>
		$(document).ready(function() {
			// select notFound row
			var notFound = $("#notFound")
			// make it hidden by default
			notFound.hide()
			$('input[name="mor_dosage"]').on("click", function() {
				var data = $('input[name="mor_dosage"]:checked').val();
				// alert(data);

				document.getElementById("morning").setAttribute("value", data + " Morning");
			});

			$('input[name="aft_dosage"]').on("click", function() {
				var data = $('input[name="aft_dosage"]:checked').val();
				// alert(data);

				document.getElementById("aft").setAttribute("value", data + " Aft");
			});

			$('input[name="eve_dosage"]').on("click", function() {
				var data = $('input[name="eve_dosage"]:checked').val();
				// alert(data);

				document.getElementById("eve").setAttribute("value", data + " Eve");
			});

			$('input[name="nit_dosage"]').on("click", function() {
				var data = $('input[name="nit_dosage"]:checked').val();
				// alert(data);

				document.getElementById("night").setAttribute("value", data + " Night");
			});

			$("#search").on("keyup", function() {
				var value = $(this).val().toLowerCase()
				// select all items
				var allItems = $(".table tbody tr ")

				// get list of matched items, (do not toggle them)
				var matchedItems = $(".table tbody tr").filter(function() {
					return $(this).text().toLowerCase().indexOf(value) > -1
				});
				// hide all items first
				allItems.toggle(false)
				// then show matched items
				matchedItems.toggle(true)
				// if no item matched then show notFound row, otherwise hide it
				if (matchedItems.length == 0) notFound.show()
				else notFound.hide().allItems;
			});
		});
	</script>
	<script>
		$(document).ready(function() {

			var flag = 1;

			<?php foreach ($treat_history as $y) : ?>

				$("#edit-btn<?php echo $y['tret_id'] ?>").click(

					function() {



						if (flag == 1) {

							$("#details<?php echo $y['tret_id']; ?>").hide();
							$("#edit-details<?php echo $y['tret_id']; ?>").show();
							$("#f_d<?php echo $y['tret_id']; ?>").show();
							$("#t_d<?php echo $y['tret_id']; ?>").show();
							$("#save-btn<?php echo $y['tret_id']; ?>").show();
							$(".hide").show();
							flag = 0;
						} else {
							$("#details<?php echo $y['tret_id']; ?>").show();
							$("#edit-details<?php echo $y['tret_id']; ?>").hide();
							$("#f_d<?php echo $y['tret_id']; ?>").hide();
							$("#t_d<?php echo $y['tret_id']; ?>").hide();
							$("#save-btn<?php echo $y['tret_id']; ?>").hide();
							$(".hide").hide();
							flag = 1;

						}

					}

				)



				$("#add-details<?php echo $y['tret_id']; ?>").submit(function(event) {



					var formData = {
						treat_id: <?php echo $y['tret_id']; ?>,
						details: $("#edit-details<?php echo $y['tret_id']; ?>").val(),
					};

					$.ajax({
						type: "POST",
						url: "<?php echo site_url('DoctorProfile_Controller/updateDocTreat') ?>",
						data: formData,
						dataType: "json",
						encode: true,

					}).done(function(data) {
						console.log(data);
					});

					event.preventDefault();
				});
			<?php endforeach; ?>

			<?php foreach ($medicines as $z) : ?>
				$('#edit<?php echo $z['id'] ?>').click(function() {
					$('#dataShow<?php echo $z['id'] ?>').hide();
					$('#dataEdit<?php echo $z['id'] ?>').show();
				});

				$('#medForm<?php echo $z['id'] ?>').submit(function(event) {
					var data = $('#medForm<?php echo $z['id'] ?>').serialize();
					var form_action = $('#medForm<?php echo $z['id'] ?>').prop('action');
					// console.log(data);
					event.preventDefault();

					$.ajax({
						type: "POST",
						url: form_action,
						data: data,

					}).done(function(response) {
						var data = response;
						var parsedJson = JSON.parse(data);
						// console.log(parsedJson);

						$('#medShw<?php echo $z['id'] ?>').html(parsedJson.medicine);
						$('#dosShw<?php echo $z['id'] ?>').html(parsedJson.dosage);
						$('#durShw<?php echo $z['id'] ?>').html(parsedJson.duration);
						$('#med_time<?php echo $z['id'] ?>').html(parsedJson.medicine_time);
						$('#dataShow<?php echo $z['id'] ?>').show();
						$('#dataEdit<?php echo $z['id'] ?>').hide();
					});

				});
			<?php endforeach; ?>
		});
	</script>
	<script>
		function add() {
			$('.medForm').show();
			$('.add_btn').hide();
		}

		function cancel() {
			$('.medForm').hide();
			$('.add_btn').show();
		}

		function addMedicine(id) {

			//

		}
	</script>


	<script>
		$("#search").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$(".searchpatient").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	</script>


	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
		AOS.init({
			offset: 130,
			duration: 1000,
		});
	</script>



</body>

</html>