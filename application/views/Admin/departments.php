<?php if (!$_SESSION['admin_name']) {

header('location:' . site_url('Admin/AdminLogin'));

} ?>

<!DOCTYPE html>

<html lang="en">



<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="<?php echo base_url('css/cssHos/style.css') ?>">



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
    crossorigin="anonymous" />

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">


<title>Departments</title>

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<style>
    .btn-primary {
    border-color: transparent;
    background-color: #777777;
}
.mob-action {

    display: none;

}

.swal2-popup {
    width: 22rem !important;
}

@media only screen and (max-width: 991.98px) {

    .table-responsive td {

        text-indent: 50% !important;

    }



    .table-responsive td:nth-child(1) {

        text-align: left !important;

    }


}
</style>

</head>



<body>

<!-- Navbar -->

<?php include('navbar.php'); ?>

<?php if ($layout == 0) : ?>

<!-- View Dapartments -->

<div class="page-wrapper">

    <div class="content">

        <div class="row">

            <div class="col-sm-5 col-5" data-aos="fade-right">

                <h4 class="page-title">Departments</h4>

            </div>

            <div class="col-sm-7 col-7 text-right m-b-30" data-aos="fade-left">

                <a href="<?php echo site_url('Admin/add-department') ?>" class="btn btn-primary btn-rounded"><i
                        class="fa fa-plus"></i> Add Department</a>

            </div>

        </div>

        <div class="row">

            <div class="col-md-12" data-aos="fade-up">

                <div class="table-responsive">

                    <table class="table table-striped mb-0">

                        <thead id="hideData">

                            <tr>

                                <th>#</th>

                                <th>Department Name</th>

                                <!-- <th>Status</th> -->

                                <th class="text-right">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $x = 0; ?>
<?php if(isset($depts)):?>

                            <?php foreach ($depts as $y) : ?>

                            <?php $x = $x + 1; ?>

                            <tr style="margin-bottom: 5px;">

                                <td><?php echo $x ?></td>

                                <td data-th="Department Name:"><a data-toggle="modal"
                                        data-target="#exampleModalCenter<?php echo $y['dept_id'] ?>"
                                        href=""><?php echo $y['dept_name'] ?></a></td>

                               

                                <td data-th="Action:" class="text-right">

                                    <div class="dropdown dropdown-action">

                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                                        <div class="dropdown-menu dropdown-menu-right">

                                            <a class="dropdown-item"
                                                href="<?php echo site_url('Admin_Controller/editDept/' . $y['id']) ?>"><i
                                                    class="fas fa-pencil-alt m-r-5"></i> Edit</a>

                                            <a class="dropdown-item"
                                                href="<?php echo site_url('Admin_Controller/delDept/' . $y['id']) ?>"
                                                onclick="return confirm('Are you sure, you want to delete it?')"><i
                                                    class="fas fa-trash m-r-5"></i> Delete</a>

                                        </div>

                                    </div>

                                    

                                </td>

                            </tr>

                            <?php endforeach; ?>

                            <?php else:?>
                                <?php echo"<span style='color:red'>No Departments Added</span><script>document.getElementById('hideData').style.display='none'</script>";?>
                            <?php endif;?> 

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>



<?php elseif ($layout == 1) : ?>

<!-- Add Department -->

<div class="page-wrapper">

    <div class="content">
        
        <div class="row">

            <div class="col-lg-8 offset-lg-2" data-aos="fade-right">

                <h4 class="page-title">Add Department</h4>

            </div>

        </div>

        <div class="row">

            <div class="col-lg-8 offset-lg-2">

                <form action="<?php echo site_url('Admin_Controller/addDept') ?>" method="post">

                    <div class="form-group" data-aos="fade-up">

                        <label>Department Name:</label>

                        <select id="deptName" name="deptName" class="form-control">

                            <!-- <?php foreach ($depts as $x) : ?>

                            <option value="<?php echo $x['dept_id'] ?>"><?php echo $x['dept_name'] ?></option>

                            <?php endforeach; ?> -->

                            <option id='other' value="other">add New-Dept</option>

                        </select>
                        <script>const check=document.getElementById('other').value;
                        if(check==''){
                         document.getElementById('CheckData').style.display='none'

                        }

                    
                    </script>
                   
                    
                        <div data-parent="other" id='CheckData'style=" margin-top: 10px;">

                            <label>Specify the name:</label>

                            <input type="text" name="newDeptName" id="checkDept" class="form-control">
                            <span id="dept_res" style="color:red"></span>
                            <span class="text-danger"><?php echo form_error('newDeptName') ?></span>
                            <br>

                            <label>Description:</label>

                            <input type="text" name="description" id="description" class="form-control">

                        </div>

                         

                    </div>
                    <div class="m-t-20 text-center">

                        <button id="submitbtn" class="btn btn-primary submit-btn">Add Department</button>

                    </div>

                </form>

            </div>

        </div>
        <?php // else : ?>
        <!-- <script>
        clicked();

        function clicked() {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Already Added',
                showConfirmButton: false,
                timer: 1300
            });

        };
        window.setTimeout(function() {
            window.location = 'departments';

        }, 2000);
        </script> -->
        <?php 
         
    //endif; ?>
    </div>

</div>

<?php elseif ($layout == 2) : ?>

<!-- Edit Department -->

<div class="page-wrapper">

    <div class="content">

        <div class="row">

            <div class="col-lg-8 offset-lg-2">

                <h4 class="page-title">Edit Department</h4>

            </div>

        </div>

        <div class="row">

            <div class="col-lg-8 offset-lg-2">

                <form action="<?php echo site_url('Admin_Controller/updDept') ?>" method="post">

                    <div class="form-group">

                        <label>Department ID</label>

                        <input class="form-control" type="text" name="deptID" readonly
                            value="<?php echo $dept[0]['dept_id'] ?>">

                    </div>

                    <div class="form-group">

                        <label>Department Name</label>

                        <input class="form-control" type="text" name="deptname" 
                            value="<?php echo $dept[0]['dept_name'] ?>">

                    </div>

                   

                 

                        <button class="btn btn-primary submit-btn">Save Department</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<?php endif; ?>
<script>
                $(document).ready(function() {

                    $('#checkDept').keyup(function() {

                        var dept_name = $('#checkDept').val();



                        // console.log(dept_name);

                        var xhttp = new XMLHttpRequest();

                        xhttp.onreadystatechange = function() {

                            if (this.readyState == 4 && this.status == 200) {

                                console.log(this.responseText);

                                document.getElementById("dept_res").innerHTML = this.responseText;

                            }

                        };



                        const d = xhttp.open("GET", "<?php echo site_url() ?>/Admin_Controller/checkDept?q=" + dept_name,
                            true);
                        console.log(d);
                        //    return;

                        xhttp.send();





                    });

                });
            </script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>




<script>


$(function() {

    $("select").on("change", function() {

        if ($(this).val() === "other") {

            $("div[data-parent='" + $(this).val() + "']").show().siblings("[data-parent]").hide();



        } else {

            $("[data-parent]").hide();

        }

    });

});

$(document).ready(function() {

    $('#spocCheck').click(function() {

        if (this.checked)

            $('#spocDet').show();

        else

            $('#spocDet').hide();

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