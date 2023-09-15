<?php if (!$_SESSION['email_id']) {

	header('location:' . site_url('mainController/temp'));

} ?>

<!DOCTYPE html>

<html lang="en">



<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

	<title>Dashboard</title>

	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


	<style>


      
         .dash-widget,.card,.shadow-lg,.member-panel,.fixed-top{
            box-shadow: 0 4px 24px 0 rgb(34 41 47 / 10%);

			
        }

		@media only screen and (max-width: 991.98px) {



			.btn {

				display: initial !important;

			}



			.table-responsive td {

				text-indent: 40% !important;

			}



			.table-responsive td:nth-child(1) {

				text-indent: 0% !important;

			}

		}

	</style>



</head>



<body>

	<!-- Navbar -->

	<?php include('navbar.php'); ?>

	<!-- Dashboard -->

	<div class="page-wrapper">

		<div class="content">



			<div class="row">



				<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">

					<div class="dash-widget"data-aos="fade-right">

						<span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>

						<div class="dash-widget-info text-right">

							<h3><?php echo count($assocDoc) ?></h3>

							<span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>

						</div>

					</div>

				</div>

				<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">

					<div class="dash-widget"data-aos="fade-right">

						<span class="dash-widget-bg2"><i class="fas fa-user"></i></span>

						<div class="dash-widget-info text-right">

							<h3>1072</h3>

							<span class="widget-title2">Followers <i class="fa fa-check" aria-hidden="true"></i></span>

						</div>

					</div>

				</div>

				<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">

					<div class="dash-widget"data-aos="fade-right">


						<span class="dash-widget-bg3"><i class="fa fa-comment" aria-hidden="true"></i></span>

						<div class="dash-widget-info text-right">

							<h3><?php echo count($hospitalPost) ?></h3>

							<span class="widget-title3">Posts <i class="fa fa-check" aria-hidden="true"></i></span>

						</div>

					</div>

				</div>

				<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">

					<div class="dash-widget"data-aos="fade-right">

						<span class="dash-widget-bg4"><i class="fas fa-share" aria-hidden="true"></i></span>

						<div class="dash-widget-info text-right">

							<h3>618</h3>

							<span class="widget-title4">Shares <i class="fa fa-check" aria-hidden="true"></i></span>

						</div>

					</div>

				</div>

			</div>

			<div class="row">

				<div class="col-12 col-md-6 col-lg-8 col-xl-8">

					<div class="card shadow-lg"data-aos="fade-left">

						<div class="card-header bg-light">

							<h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a href="<?php echo site_url('hospital_Controller/appointments') ?>" class="btn btn-primary float-right">View all</a>

						</div>

						<div class="card-body p-0">

							<div class="table-responsive">

								<table class="table mb-0">

									<thead class="d-none">

										<tr>

											<th>Patient Name</th>

											<th>Doctor Name</th>

											<th>Timing</th>

											<th class="text-right">Status</th>

										</tr>

									</thead>

									<tbody>

										<?php foreach ($appointments as $x) : ?>

											<tr style="margin-bottom: 5px;">

												<td style="min-width: 200px;">

													<a class="avatar" href="#"><?php echo substr($x['name'], 0, 1); ?></a>

													<h2><a href="#"><?php echo $x['name'] . '<span>' . $x['city'] . ', ' . $x['state'] . '</span>'; ?></a></h2>

												</td>

												<td>

													<h5 class="time-title p-0">Appointment With</h5>

													<p>Dr. <?php echo $x['doc_name'] ?></p>

												</td>

												<td>

													<h5 class="time-title p-0">Timing</h5>

													<p><?php echo $x['appt_slot_time'] ?></p>

												</td>

												<td class="text-left">

													<a href="<?php echo site_url('hospital_Controller/appointments') ?>" class="btn btn-outline-primary take-btn">Take up</a>

												</td>

											</tr>

										<?php endforeach; ?>

										<!-- <tr>

												<td style="min-width: 200px;">

													<a class="avatar" href="profile.html">B</a>

													<h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>

												</td>                 

												<td>

													<h5 class="time-title p-0">Appointment With</h5>

													<p>Dr. Cristina Groves</p>

												</td>

												<td>

													<h5 class="time-title p-0">Timing</h5>

													<p>7.00 PM</p>

												</td>

												<td class="text-right">

													<a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>

												</td>

											</tr>

											<tr>

												<td style="min-width: 200px;">

													<a class="avatar" href="profile.html">B</a>

													<h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>

												</td>                 

												<td>

													<h5 class="time-title p-0">Appointment With</h5>

													<p>Dr. Cristina Groves</p>

												</td>

												<td>

													<h5 class="time-title p-0">Timing</h5>

													<p>7.00 PM</p>

												</td>

												<td class="text-right">

													<a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>

												</td>

											</tr>

											<tr>

												<td style="min-width: 200px;">

													<a class="avatar" href="profile.html">B</a>

													<h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>

												</td>                 

												<td>

													<h5 class="time-title p-0">Appointment With</h5>

													<p>Dr. Cristina Groves</p>

												</td>

												<td>

													<h5 class="time-title p-0">Timing</h5>

													<p>7.00 PM</p>

												</td>

												<td class="text-right">

													<a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>

												</td>

											</tr>

											<tr>

												<td style="min-width: 200px;">

													<a class="avatar" href="profile.html">B</a>

													<h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>

												</td>                 

												<td>

													<h5 class="time-title p-0">Appointment With</h5>

													<p>Dr. Cristina Groves</p>

												</td>

												<td>

													<h5 class="time-title p-0">Timing</h5>

													<p>7.00 PM</p>

												</td>

												<td class="text-right">

													<a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>

												</td>

											</tr> -->

									</tbody>

								</table>

							</div>

						</div>

					</div>

				</div>

				<div class="col-12 col-md-6 col-lg-4 col-xl-4">

					<div class="card member-panel"data-aos="fade-left">

						<div class="card-header bg-white">

							<h4 class="card-title mb-0">Doctors</h4>

						</div>

						<div class="card-body">

							<ul class="contact-list">

								<?php foreach ($assocDoc as $x) : ?>

									<li>

										<div class="contact-cont">

											<div class="float-left user-img m-r-10">

												<a href="profile.html" title="John Doe"><img src="<?php echo $x['picture'] ?>" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>

											</div>

											<div class="contact-info">

												<span class="contact-name text-ellipsis"><?php echo $x['doc_name'] ?></span>

												<span class="contact-date"><?php echo $x['specialization'] ?></span>

											</div>

										</div>

									</li>

								<?php endforeach; ?>

							</ul>

						</div>

						<div class="card-footer text-center bg-white">

							<a href="<?php echo site_url('hospital_Controller/doctors') ?>" class="text-muted">View all Doctors</a>

						</div>

					</div>

				</div>

			</div>

			<div class="row">

				<div class="col-12 col-md-6 col-lg-6 col-xl-6">

					<div class="card"data-aos="fade-up">

						<div class="card-body">

							<div class="chart-title">

								<h4>Patient Total</h4>

								<span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>

							</div>

							<canvas id="linegraph"></canvas>

						</div>

					</div>

				</div>

				<div class="col-12 col-md-6 col-lg-6 col-xl-6">

					<div class="card"data-aos="fade-right">

						<div class="card-body">

							<div class="chart-title">

								<h4>Patients In</h4>

								<div class="float-right">

									<ul class="chat-user-total">

										<li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>

										<li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>

									</ul>

								</div>

							</div>

							<canvas id="bargraph"></canvas>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>





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