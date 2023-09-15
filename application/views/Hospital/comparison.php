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

	<title>Comparison</title>
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


</head>



<body>

	<!-- Navbar -->

	<?php include('navbar.php'); ?>

	<!-- Comparison Graph -->

	<div class="page-wrapper">

		<div class="content">

			<div class="row">

				<div class="col-12 col-md-6 col-lg-6 col-xl-6">

					<div class="card"data-aos="fade-up">

						<div class="card-body">

							<div class="chart-title">

								<h4>Reviews</h4>

								<!-- <span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span> -->

								<select class="float-right mr-2" name="" id="line_comp">

									<option value="avg">Avg</option>

									<?php foreach ($hospitals as $x) : ?>

										<option value="<?php echo $x['hos_id'] . ',' . $x['hos_name'] ?>"><?php echo $x['hos_name'] ?></option>

									<?php endforeach; ?>

								</select>

								<label class="float-right mr-2" for="comp">Compare With</label>

							</div>

							<canvas id="linegraph"></canvas>

						</div>

					</div>

				</div>

				<div class="col-12 col-md-6 col-lg-6 col-xl-6">

					<div class="card"data-aos="fade-up">

						<div class="card-body">

							<div class="chart-title">

								<h4>No. of Patients</h4>

								<!-- <div class="float-right">

										<ul class="chat-user-total">

											<li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>

											<li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>

										</ul>

									</div> -->

								<select class="float-right mr-2" name="" id="comp">

									<option value="avg">Avg</option>

									<?php foreach ($hospitals as $x) : ?>

										<option value="<?php echo $x['hos_id'] . ',' . $x['hos_name'] ?>"><?php echo $x['hos_name'] ?></option>

									<?php endforeach; ?>

								</select>

								<label class="float-right mr-2" for="comp">Compare With</label>

							</div>

							<canvas id="bargraph"></canvas>

						</div>

					</div>

				</div>

				<div class="col-12 col-md-6 col-lg-6 col-xl-6">

					<div class="hospital-barchart"data-aos="fade-left">

						<h4 class="card-title d-inline-block">Social Engagement</h4>

					</div>

					<div class="bar-chart"data-aos="fade-left">

						<div class="legend">

							<div class="item">

								<h4>Level1</h4>

							</div>



							<div class="item">

								<h4>Level2</h4>

							</div>

							<div class="item text-right">

								<h4>Level3</h4>

							</div>

							<div class="item text-right">

								<h4>Level4</h4>

							</div>

						</div>

						<div class="chart clearfix">

							<div class="item">

								<div class="bar">

									<span class="percent">30%</span>

									<div class="item-progress" data-percent="30">

										<span class="title">Likes</span>

									</div>

								</div>

							</div>

							<div class="item">

								<div class="bar">

									<span class="percent">71%</span>

									<div class="item-progress" data-percent="71">

										<span class="title">Comments</span>

									</div>

								</div>

							</div>

							<div class="item">

								<div class="bar">

									<span class="percent">82%</span>

									<div class="item-progress" data-percent="82">

										<span class="title">Shares</span>

									</div>

								</div>

							</div>

							<!-- 

                            <div class="item">

                                <div class="bar">

                                    <span class="percent">67%</span>

                                    <div class="item-progress" data-percent="67">

                                        <span class="title">Treatment</span>

                                    </div>

                                </div>

                            </div>

                            <div class="item">

                                <div class="bar">

                                    <span class="percent">30%</span>									

                                    <div class="item-progress" data-percent="30">

                                        <span class="title">Discharge</span>

                                    </div>

                                </div>

                            </div> -->

						</div>

					</div>

				</div>

			</div>



		</div>

	</div>





	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script src="<?php echo base_url() ?>/js/jquery.slimscroll.js"></script>

	<script src="<?php echo base_url() ?>/js/Chart.bundle.js"></script>

	<!-- <script src="<?php echo base_url() ?>/js/chart.js"></script> -->

	<script src="<?php echo base_url() ?>/js/app.js"></script>

	<script>

		$(document).ready(function() {

			// Bar Chart

			var hos_id = '<?php echo $_SESSION['email_id'] ?>';

			var hos_name = '<?php echo $_SESSION['hos_name'] ?>';

			var dataset = [{

					label: hos_name,

					backgroundColor: "rgba(0, 158, 251, 0.5)",

					data: [<?php foreach ($rev_counts as $x) {

								echo $x[0]['count'] . ',';

							} ?>],

				},

				{

					label: "Average",

					backgroundColor: "rgba(255, 0, 0, 0.5)",

					fill: true,

					data: [<?php foreach ($avg_rev_count as $x) {

								if ($x[0]['avg'] != NULL)

									echo $x[0]['avg'] . ',';

								else

									echo '0,';

							} ?>]

				},

			];

			linchart(dataset);

			var dataset2 = [{

					label: hos_name,

					backgroundColor: "rgba(0, 158, 251, 0.5)",

					borderColor: "rgba(0, 158, 251, 1)",

					borderWidth: 1,

					data: [<?php foreach ($patient_counts as $x) {

								echo $x[0]['count'] . ',';

							} ?>],

				},

				{

					label: "Average",

					backgroundColor: "rgba(255, 0, 0, 0.5)",

					borderColor: "rgba(255, 0, 0, 1)",

					borderWidth: 1,

					data: [<?php foreach ($avg_patient_count as $x) {

								if ($x[0]['avg'] != NULL)

									echo $x[0]['avg'] . ',';

								else

									echo '0,';

							} ?>]

				},

			];

			barchart(dataset2);

			$("#line_comp").change(function() {

				if ($(this).val() == 'avg') {

					dataset = [{

							label: hos_name,

							backgroundColor: "rgba(0, 158, 251, 0.5)",

							data: [<?php foreach ($rev_counts as $x) {

										echo $x[0]['count'] . ',';

									} ?>],

						},

						{

							label: "Average",

							backgroundColor: "rgba(255, 0, 0, 0.5)",

							fill: true,

							data: [<?php foreach ($avg_rev_count as $x) {

										if ($x[0]['avg'] != NULL)

											echo $x[0]['avg'] . ',';

										else

											echo '0,';

									} ?>]

						},

					];

					linchart(dataset);

				} else {

					var hid = $(this).val().split(",", 1)[0];

					var hname = $(this).val().split(",", 2)[1];

					// console.log(hid);

					$.ajax({

						type: 'post',

						url: '<?php echo site_url('hospital_Controller/LCHosData') ?>',

						data: {

							hos_id: hid

						},

						success: function(res) {

							var arr = [];

							var data = JSON.parse(res);

							// console.log(data);

							$.each(data.rev_counts, function(index, value) {

								arr.push(value[0].count);

							});

							// console.log(arr);

							dataset = [{

									label: hos_name,

									backgroundColor: "rgba(0, 158, 251, 0.5)",

									data: [<?php foreach ($rev_counts as $x) {

												echo $x[0]['count'] . ',';

											} ?>],

								},

								{

									label: hname,

									backgroundColor: "rgba(255, 255, 0, 0.5)",

									fill: true,

									data: arr

								},

							];

							linchart(dataset);



						}

					});

				}

			});



			$("#comp").change(function() {

				if ($(this).val() == 'avg') {

					dataset = [{

							label: hos_name,

							backgroundColor: "rgba(0, 158, 251, 0.5)",

							borderColor: "rgba(0, 158, 251, 1)",

							borderWidth: 1,

							data: [<?php foreach ($patient_counts as $x) {

										echo $x[0]['count'] . ',';

									} ?>],

						},

						{

							label: "Average",

							backgroundColor: "rgba(255, 0, 0, 0.5)",

							borderColor: "rgba(255, 0, 0, 1)",

							borderWidth: 1,

							data: [<?php foreach ($avg_patient_count as $x) {

										if ($x[0]['avg'] != NULL)

											echo $x[0]['avg'] . ',';

										else

											echo '0,';

									} ?>],

						},

					];

					barchart(dataset);

				} else {

					var hid = $(this).val().split(",", 1)[0];

					var hname = $(this).val().split(",", 2)[1];

					// console.log(hid);

					$.ajax({

						type: 'post',

						url: '<?php echo site_url('hospital_Controller/BCHosData') ?>',

						data: {

							hos_id: hid

						},

						success: function(res) {

							var arr = [];

							var data = JSON.parse(res);

							// console.log(data);

							$.each(data.patient_counts, function(index, value) {

								arr.push(value[0].count);

							});

							// console.log(arr);

							dataset = [{

									label: hos_name,

									backgroundColor: "rgba(0, 158, 251, 0.5)",

									data: [<?php foreach ($patient_counts as $x) {

												echo $x[0]['count'] . ',';

											} ?>],

								},

								{

									label: hname,

									backgroundColor: "rgba(255, 255, 0, 0.5)",

									fill: true,

									data: arr

								},

							];

							barchart(dataset);



						}

					});

				}

			});



			// Bar Chart

			function barchart($data) {

				var barChartData = {

					labels: [

						"Jan",

						"Feb",

						"Mar",

						"Apr",

						"May",

						"Jun",

						"Jul",

						"Aug",

						"Sep",

						"Oct",

						"Nov",

						"Dec",

					],

					datasets: $data,

				};



				var ctx = document.getElementById("bargraph").getContext("2d");

				window.myBar = new Chart(ctx, {

					type: "bar",

					data: barChartData,

					options: {

						responsive: true,

						legend: {

							display: false,

						},

					},

				});

			}





			// Line Chart



			function linchart(data) {

				var lineChartData = {

					labels: [

						"Jan",

						"Feb",

						"Mar",

						"Apr",

						"May",

						"Jun",

						"Jul",

						"Aug",

						"Sep",

						"Oct",

						"Nov",

						"Dec",

					],

					datasets: data,



				};



				var linectx = document.getElementById("linegraph").getContext("2d");

				// linectx.reset();

				window.myLine = new Chart(linectx, {

					type: "line",

					data: lineChartData,

					options: {

						responsive: true,

						legend: {

							display: false,

						},

						tooltips: {

							mode: "index",

							intersect: false,

						},

					},

				});

			}



			// Bar Chart 2



			barChart();



			$(window).resize(function() {

				barChart();

			});



			function barChart() {

				$(".bar-chart")

					.find(".item-progress")

					.each(function() {

						var itemProgress = $(this),

							itemProgressWidth =

							$(this).parent().width() * ($(this).data("percent") / 100);

						itemProgress.css("width", itemProgressWidth);

					});

			}

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