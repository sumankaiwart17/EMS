<?php
// echo "<pre>";
// print_r($consult);
// die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>Consult</title>
    <style>
        .mob-action {
            display: none;
        }
        .search-bar {
			position: relative;

		}

		.search-bar i {
			position: absolute;
			top: 13px;
			right: 27px;
		}
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php include('navbar.php'); ?>

    <?php if ($layout == 0) : ?>
        <!-- View Consult Queries -->
        <div class="page-wrapper">
            <div class="content">
                <div class="alert alert-success" style="display:none;" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <?php if (isset($_SESSION['consult'])) : ?>
                        <strong><?php echo $_SESSION['consult'] ?></strong>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="page-title">Consult Queries</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 search-bar">
                        <input type="text" class="form-control mb-3" placeholder="Search Consult" id="search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="min-width:200px;">Name</th>
                                        <th>Query</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th style="min-width: 110px;">Query Date</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    if (!empty($consult)) : ?>


                                        <?php foreach ($consult as $x) : ?>
                                            <tr class="searchconsult">

                                                <td><?php $no = $no + 1;echo $no; ?></td>
                                                <td>
                                                    <img width="28" height="28" src="<?php echo $x['picture'] === "" ? base_url('images/avatar.png') : $x['picture']; ?>" class="rounded-circle" alt="">
                                                    <h2><?php echo $x['name']; ?></h2>
                                                </td>
                                                <td data-th="Query:"><?php echo $x['consult_title'] ?></td>
                                                <td data-th="Email:"><?php echo $x['email_id'] ?></td>
                                                <td data-th="Mobile:"><?php echo $x['phone']; ?></td>
                                                <td data-th="Query Date:"><?php echo $x['post_time'] ?></td>
                                                <td data-th="Status:"><?php if ($x['answer'] == '') { ?>
                                                        <span class="custom-badge status-green">Active</span>
                                                    <?php } else { ?>
                                                        <span class="custom-badge status-grey">Answered</span>
                                                    <?php } ?>
                                                </td>
                                                <td data-th="Action:" class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="<?php echo site_url('doctorProfile_Controller/consultReply/' . $x['con_id'] . '') ?>"><i class="fa fa-pencil m-r-5"></i>Reply</a>
                                                            <a class="dropdown-item" href="<?php echo site_url('doctorProfile_Controller/consultDelete/' . $x['con_id'] . '') ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="mob-action text-left">
                                                        <a class="" href="<?php echo site_url('doctorProfile_Controller/consultReply/' . $x['con_id'] . '') ?>"><i class="fas fa-reply m-r-5"></i> Reply</a>
                                                        <a style="padding: 22px;" class="" href="<?php echo site_url('doctorProfile_Controller/consultDelete/' . $x['con_id'] . '') ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                </tbody>
                            </table>
                        <?php else : ?>
                         
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif ($layout == 3) : ?>
        <!-- Consult Reply -->
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4">
                    <label>Consult Title</label>
                        <h4 class="page-title"><?php echo $data[0]['consult_title']; ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo site_url('doctorProfile_Controller/save_consult_answer'); ?>" method="post">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Query</label>
                                    <input class="form-control" type="text" name="query" value="<?php echo $data[0]['consult_query']; ?>" readonly>
                                    <input class="form-control" type="hidden" name="consult_id" value="<?php echo $this->uri->segment(3); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Answer</label>
                                    <textarea name="answer" id="" cols="30" rows="10" class="form-control"><?php echo $data[0]['answer']; ?></textarea>
                                </div>
                            </div>
                            <div class="m-t-20">
                                <button class="btn btn-primary submit-btn" type="submit">Reply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>    
$("#search").on("keyup", function() {
	var value = $(this).val().toLowerCase();
	$(".searchconsult").filter(function() {
	$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	});
});
</script>


    
    <script>
        <?php if (isset($_SESSION['consult'])) { ?>
            $("#success-alert").fadeTo(5000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(500);
            });
        <?php
            unset($_SESSION['consult']);
        } ?>
    </script>
</body>

</html>