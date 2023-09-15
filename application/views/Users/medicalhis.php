<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('css/cssUser/style.css') ?>">
    <title>AAHRS | My Medical History</title>
    <style>
        .dropdown-toggle::after {
            display: none !important;
        }

        .mob-action {
            display: none;
        }

        @media only screen and (max-width: 991.98px) {

            .btn {
                display: initial !important;
            }
        }
    </style>
</head>

<body class="bg-body">
    <?php include('navbar.php'); ?>
    <div class="container mt-2">
        <div class="row">
            <?php include('left-sidebar.php'); ?>
            <?php if ($layout == 0) : ?>
                <!-- View -->
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 mob-responsive">
                    <div class="d-flex justify-content-between row">
                        <h4>Medical History</h4>
                        <a href="<?php echo site_url('userProfile_Controller/addmedicalHis') ?>" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add History</a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $slno = 0;
                                foreach ($docs as $x) : ?>
                                    <tr style="margin-bottom: 5px;">
                                        <td><?php $slno += 1;
                                            echo $slno; ?></td>
                                        <td data-th="Title:"><a href="<?php echo base_url($x['report_prescription']) ?>" target="_blank"><?php echo $x['Name'] ?></a></td>
                                        <td data-th="Type:"><?php echo $x['type'] ?></td>
                                        <td data-th="Date:"><?php echo $x['date'] ?></td>
                                        <td data-th="Action:" class="text-right">
                                            <div class="dropdown dropdown-action dropdown-action1">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="<?php echo site_url('userProfile_Controller/editHis/' . $x['id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="<?php echo site_url('userProfile_Controller/delHis/' . $x['id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>

                                                </div>
                                            </div>
                                            <div class="mob-action text-left">
                                                <a class="" href="<?php echo site_url('userProfile_Controller/editHis/' . $x['id']) ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                <a style="padding: 10px;" class="" href="<?php echo site_url('userProfile_Controller/delHis/' . $x['id']) ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="fas fa-trash m-r-5"></i> Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php elseif ($layout == 1) : ?>
                <!-- Add -->
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 mob-responsive">
                    <h4>Add Medical History</h4><br>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                        <form action="<?php echo site_url('userProfile_Controller/addmedicalHis') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="type">Select Type:<span class="text-danger">*</span></label>
                                        <select id="type" name="type" required class="form-control">
                                            <option value="Report">Report</option>
                                            <option value="Prescription">Prescription</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Upload files</label>
                                        <div class="doc-upload">
                                            <div class="upload-input">
                                                <input type="file" class="form-control" id="docpic" required name="document[]" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date on document</label>
                                        <input class="form-control" required name="date" type="date">
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>

                    </div>
                <?php elseif ($layout == 2) : ?>
                    <!-- Edit -->
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8 mob-responsive">
                        <h4>Edit Medical History</h4> <br>

                        <form action="<?php echo site_url('userProfile_Controller/editHis') ?>" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" required name="Name" type="text" value="<?php echo $docs[0]['Name'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date on document</label>
                                        <input class="form-control" required name="date" type="date" value="<?php echo $docs[0]['date'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6" style="display:none;">
                                    <div class="form-group">
                                        <label>ID</label>
                                        <input class="form-control" required name="id" type="text" value="<?php echo $docs[0]['id'] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>

                    </div>
                <?php endif; ?>
                </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>