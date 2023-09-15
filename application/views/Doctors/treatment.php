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
	<title>Treatment</title>
</head>

<body>
	<!-- Navbar -->
	<?php include('navbar.php'); ?>
	<!-- View Treatments -->
	<?php if ($layout == 0) : ?>
		<div class="page-wrapper">
			<div class="content">
				<div class="row">
					<div class="col-sm-4 col-3">
						<h4 class="page-title">Treatments</h4>
					</div>
					<div class="col-sm-8 col-9 text-right m-b-20">

					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
										<th>Name</th>
										<th>Age</th>
										<th>Address</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Medications</th>
										<th>View Details</th>
									</tr>
								</thead>
								<tbody>
									<?php $time = time();
									$year = "YYYY" ?>
									<?php foreach ($patients as $x) : ?>
										<tr>
											<td><?php echo $x['p_name'] ?></td>
											<td data-th="Age:"><?php echo (date('Y') - date("Y", strtotime($x['dob']))) ?></td>
											<td data-th="Address:"><?php echo $x['address'] ?></td>
											<td data-th="Phone:"><?php echo $x['phone'] ?></td>
											<td data-th="Email:"><?php echo $x['email_id'] ?></td>
											<td data-th="Medication:"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MedicationModal<?php echo $x['p_id']; ?>">
													View Medications
												</button></td>
											<td data-th="View Details:"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $x['p_id']; ?>exampleModalLong">
													View Details
												</button></td>
										</tr>


										<!-- Modal -->
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
																		<?php echo '<div class="col">' . $y['dept_name'] . '</div>' ?>
																		<?php echo '<div class="col">' . $y['treat_name'] . '</div>' ?>
																		<?php echo '<div class="col">' . $y['from_date'] . '</div>' ?>
																		<?php echo '<div class="col">' . $y['to_date'] . '</div>' ?>
																		<hr>
																	</div>
																	<div class="row">
																		<div class="col-12"><strong>Details : </strong>
																			<p id="details<?php echo $y['tret_id']; ?>"><?php echo $y['details']; ?></p>
																			<form id="add-details<?php echo $y['tret_id']; ?>" action="<?php echo site_url('doctorProfile_Controller/updateDocTreat') ?>" method="post">
																				<input type="hidden" id="p_id" name="treat_id" value="<?php echo $y['tret_id']; ?>">
																				<textarea style="display:none" name="details" class="form-control" name="" id="edit-details<?php echo $y['tret_id']; ?>" cols="10" rows="2"><?php echo $y['details']; ?></textarea>
																				<a href="javascript:void(0)" id="edit-btn<?php echo $y['tret_id']; ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit Details</a>
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
										<div class="modal fade" id="MedicationModal<?php echo $x['p_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="MedicationModal" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h3 class="modal-title text-center" id="exampleModalLongTitle">Prescribed Medications</h3>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<div class="container">
															<div class="row p-2 mb-2">
																<div class="col-12">
																	<h4 class="text-dark">Patient Name:&nbsp;&nbsp;<strong><?php echo $x['p_name'] ?></strong></h4>
																</div>
															</div>
															<div class="row p-2 border-top border-bottom">
																<div class="col text-center">
																	<h4>Medicine Name</h4>
																</div>
																<div class="col text-center">
																	<h4>Dosage</h4>
																</div>
																<div class="col text-center">
																	<h4>Prescribed <nobr>Date & Time</nobr>
																	</h4>
																</div>
																<div class="col text-center">
																	<h4>Duration <small>(in days)</small></h4>
																</div>
																<div class="col text-center">
																	<h4>Action</h4>
																</div>
															</div>
															<?php foreach ($medicines as $z) : ?>
																<?php if ($z['p_id'] != $x['p_id']) {
																	continue;
																} ?>
																<div id="dataShow<?php echo $z['id'] ?>" class="row p-2 border-bottom">
																	<div id="medShw<?php echo $z['id'] ?>" class="col text-center"><?php echo $z['medicine'] ?></div>
																	<div id="dosShw<?php echo $z['id'] ?>" class="col text-center"><?php echo $z['dosage'] ?> </div>
																	<div class="col text-center"><?php echo date("d/m/Y", strtotime($z['created_at'])) . '<br>' . date("g:i A", strtotime($z['created_at'])) ?></div>
																	<div id="durShw<?php echo $z['id'] ?>" class="col text-center"><?php echo $z['duration'] ?></div>
																	<div id="durShw<?php echo $z['id'] ?>" class="col text-center">
																		<div class="dropdown dropdown-action">
																			<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
																			<div class="dropdown-menu dropdown-menu-right">
																				<a class="dropdown-item" id="edit<?php echo $z['id'] ?>" href="javascript:void(0)"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
																				<a class="dropdown-item" href="<?php echo site_url('hospital_controller/delete_patients_medicine/' . $z['id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>
																			</div>
																		</div>
																	</div>
																</div>
																<div id="dataEdit<?php echo $z['id'] ?>" style="display: none;" class="row p-2 border-bottom">
																	<form id="medForm<?php echo $z['id'] ?>" action="<?php echo site_url('doctorProfile_controller/edit_patients_medicine/' . $z['id']) ?>" method="post">
																		<div class="col text-center"><input type="text" name="medicine" class="form-control" value="<?php echo $z['medicine'] ?>" id="medicine"></div>
																		<div class="col text-center"><input type="text" name="dosage" class="form-control" value="<?php echo $z['dosage'] ?>" id="dosage"></div>
																		<div class="col text-center"><?php echo date("d/m/Y", strtotime($z['created_at'])) . '<br>' . date("g:i A", strtotime($z['created_at'])) ?></div>
																		<div class="col text-center"><input type="number" name="duration" class="form-control" value="<?php echo $z['duration'] ?>" id="duration"></div>

																		<div class="col text-center"><button type="submit" class="btn btn-block btn-success">SAVE</button></div>
																	</form>
																</div>
															<?php endforeach; ?>
															<div class="row add_btn justify-content-center p-2">
																<div class="col-5">
																	<button onclick="add()" class="btn btn-block btn-primary">Add Medicine</button>
																</div>
															</div>
															<div style="display:none" class="medForm mt-2 row p-2 border border-muted">
																<form id="add-medicine<?php echo $x['p_id'] ?>" action="<?php echo site_url('doctorProfile_Controller/add_patients_medicine') ?>" method="post">
																	<div class="col-12 form-group">
																		<label for="medicine">Medicine Name:</label>
																		<input type="text" name="medicine" class="form-control" id="medicine">
																	</div>
																	<div class="col-12 form-group">
																		<label for="dosage">Dosage:</label>
																		<input type="text" name="dosage" class="form-control" id="dosage">
																	</div>
																	<div class="col-12 form-group">
																		<label for="duration">Duration:</label>
																		<input type="number" name="duration" class="form-control" id="duration">
																	</div>
																	<div class="col-12 form-group">
																		<label for="treat_id">Treatment:</label>
																		<select name="treat_id" class="form-control" id="treat_id">
																			<?php foreach ($treatments as $t) : ?>
																				<option value="<?php echo $t['treat_id'] ?>"><?php echo $t['treat_name'] ?></option>
																		</select>
																	<?php endforeach; ?>
																	</div>
																	<input type="hidden" name="hos_id" id="hos_id" value="<?php echo $x['hos_id']; ?>">
																	<input type="hidden" name="p_id" id="p_id" value="<?php echo $x['p_id']; ?>">
																	<input type="hidden" name="doc_id" id="doc_id" value="<?php echo $x['doc_id']; ?>">
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
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script>
		$(document).ready(function() {
			var flag = 1;
			<?php foreach ($treat_history as $y) : ?>
				$("#edit-btn<?php echo $y['tret_id'] ?>").click(
					function() {

						if (flag == 1) {
							$("#details<?php echo $y['tret_id']; ?>").hide();
							$("#edit-details<?php echo $y['tret_id']; ?>").show();
							$("#save-btn<?php echo $y['tret_id']; ?>").show();
							flag = 0;
						} else {
							$("#details<?php echo $y['tret_id']; ?>").show();
							$("#edit-details<?php echo $y['tret_id']; ?>").hide();
							$("#save-btn<?php echo $y['tret_id']; ?>").hide();
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
						url: "<?php echo site_url('doctorProfile_Controller/updateDocTreat') ?>",
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
						var data = response.split(",");
						// console.log(data);
						$('#medShw<?php echo $z['id'] ?>').html(data[0]);
						$('#dosShw<?php echo $z['id'] ?>').html(data[1]);
						$('#durShw<?php echo $z['id'] ?>').html(data[2]);
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
	</script>
</body>

</html>