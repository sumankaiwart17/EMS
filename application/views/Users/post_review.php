<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssUser/style.css') ?>">

    <title>AAHRS | Post Review</title>

</head>

<body class="bg-body">

    <?php include ('navbar.php'); ?>

    <div class="container mt-2">

        <div class="row">

            <!-- left Bar -->

            <?php include('left-sidebar.php'); ?>

            <!-- Reviews -->

            <div class="col-sm-10 bg-light">

                <div class="row">

                    <div class="col-12 pl-4 pt-3">

                    

                        <form action="<?php echo site_url('userProfile_Controller/postReview') ?>" class="row form" enctype="multipart/form-data" method="post">

                            <!-- <div class="form-group col-12">

                                <label for="">Name:</label>

                                <input type="text" readonly class="form-control col-6">

                            </div> -->

                            <div class="col-12 row">

                            <h2 class="col-12 col-sm-12 col-md-4 col-lg-4 text-left">Post a Review</h2>

                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 ">

                                <div class="card card-body pb-0" style="width: 100%; border-radius:0px;border-left: 4px ridge red;">

                                    <blockquote>

                                        <p><strong class="text-danger">Note:</strong> You must provide a legit Supportive Document and an ID of patient against your review</p>

                                    </blockquote>

                                </div>

                                

                            </div>

                            </div>

                            

                                <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 pt-3">

                                

                                    <label class="form-label mt-3" for=""><strong>Review on:&nbsp;&nbsp;</strong><span class="text-danger font-weight-bold">*</span></label>

                                    <select id="revname" name="revname" class="form-control">

                                        <option value="">Select from here</option>

                                        <option value="Hospital">Hospital</option>

                                        <option value="Doctor">Doctor</option>

                                        <option value="Department">Department</option>

                                       

                                    </select>

                                </div>    

                                <div data-parent="Hospital" style="display: none; margin-top:20px;" class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                    <label class="form-label" for="">Hospital:&nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></label>

                                    <select id="hosName" name="hos_id" class="form-control">

                                    <option value="">Select a Hospital</option>
                         
               
                   
                                    <?php foreach($hosData as $x): ?>
                                       
                                        <option value="<?php echo $x['hos_id'] ?>"><?php echo $x['hos_name'] ?></option>

                                    <?php endforeach; ?>

                                    </select>

                                </div>

                                <div data-parent="Doctor" style="display: none; margin-top:20px;" class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                    <label for="">Doctor:&nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></label>

                                    <select id="docName" name="doc_id" class="form-control">

                                    <option value="">Select a Doctor</option>

                                    <?php foreach($docData as $x): ?>

                                        <option value="<?php echo $x['doc_id'] ?>"><?php echo $x['doc_name'] ?></option>

                                    <?php endforeach; ?>

                                    </select>

                                </div>

                                <div data-parent="Department" style="display: none; margin-top:20px;" class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                    <label for="">Department:&nbsp;&nbsp;<span id="rec" style="display:none;" class="text-danger font-weight-bold">*</span><small id="rec1" style="display:none;" class="text-danger font-weight-light">(optional)</small></label>

                                    <select id="deptName" name="dept_id" class="form-control">

                                    

                                    <option value="">Select A Hospital</option>

                                    </select>

                                </div>

                                <div data-parent="Treatment" style="display: none; margin-top:20px;" class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                    <label for="">Treatment:&nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></label>

                                    <select id="treatName" name="treat_id" class="form-control">

                                    <option value="">Select A Hospital</option>

                                    </select>

                                </div>

                                <div data-parent="Disease" style="display: none; margin-top:20px;" class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                    <label for="">Disease&nbsp;&nbsp;</label>

                                    <select id="diseases" name="dis_id" class="form-control">

                                    <option value="">(optional)</option>

                                    <?php foreach($diseases as $x): ?>

                                        <option value="<?php echo $x['dis_id'] ?>"><?php echo $x['dis_name'] ?></option>

                                    <?php endforeach; ?>

                                    </select>

                                </div>

                                </div>

                            

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12" data-parent="revCon" style="display: none;">

                                <h4 class="form-group text-left mt-2 mb-3">Review Content</h4>

                                <div class="row">

                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                    <label for="">Review Title:&nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></label>

                                    <input type="text" name="review_title" class="form-control">

                                </div>

                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                    <label for="">Overall Rating:&nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></label>

                                    <input type="text" id="star_rating0" name="star_rating0" class="" style="display:none;">

                                    <div class="row pl-2" style="cursor:not-allowed;">

                                        <div id="rateYo0" class="" style="cursor:not-allowed;"></div>

                                        <div id="rateYo0_count" style="font-size:20px; background-color:#3366ff" class="counter badge badge-warning rounded-rectangle">0</div>

                                    </div>

                                </div>

                                <div class="form-group col-12">

                                    <label for="">Review Content:&nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></label>

                                    <!-- <div id="toolbar-container"></div> -->

                                    <textarea name="review_content" class="form-control" style="height:100px;"></textarea>

                                    <!-- <textarea  id="" ></> -->

                                </div>

                                <hr>

                                <div class="hospital-rates container">

                                    <div class="d-flex justify-content-between">

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <p>Rate for cleanliness - &nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></p>

                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <input type="text" id="star_rating" name="star_rating" class=""  style="display:none;" value="0" required>

                                            <div class="row pl-2">

                                                <div id="rateYo" class=""></div>

                                                <div style="font-size:20px;" class="counter badge badge-warning rounded-rectangle">0</div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between">

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <p>Rate for Accomodations - &nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></p>

                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <input type="text" id="star_rating" name="star_rating2" class="" value="0" style="display:none;" required>

                                            <div class="row pl-2">

                                                <div id="rateYo2" class=""></div>

                                                <div style="font-size:20px;" class="counter badge badge-warning rounded-rectangle">0</div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between">

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <p>Rate for Availability - &nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></p>

                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <input type="text" id="star_rating" name="star_rating3" class="" style="display:none;" value="0" required>

                                            <div class="row pl-2">

                                                <div id="rateYo3" class=""></div>

                                                <div style="font-size:20px;" class="counter badge badge-warning rounded-rectangle">0</div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between">

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <p>Rate for Facilities - &nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></p>

                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <input type="text" id="star_rating" name="star_rating4" class="" style="display:none;" value="0" required>

                                            <div class="row pl-2">

                                                <div id="rateYo4" class=""></div>

                                                <div style="font-size:20px;" class="counter badge badge-warning rounded-rectangle">0</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="doctor-rates container">

                                    <div class="d-flex justify-content-between">

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <p>Rate for Promptness - &nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></p>

                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <input type="text" id="star_rating" name="star_rating5" class="" style="display:none;">

                                            <div class="row pl-2">

                                                <div id="rateYo5" class=""></div>

                                                <div style="font-size:20px;" class="counter badge badge-warning rounded-rectangle">0</div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between">

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <p>Rate for Bedside Manner - &nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></p>

                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <input type="text" id="star_rating" name="star_rating6" class="" style="display:none;" value="0" required>

                                            <div class="row pl-2">

                                                <div id="rateYo6" class=""></div>

                                                <div style="font-size:20px;" class="counter badge badge-warning rounded-rectangle">0</div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between">

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <p>Rate for On-time - &nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></p>

                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <input type="text" id="star_rating" name="star_rating7" class="" style="display:none;" value="0" required>

                                            <div class="row pl-2">

                                                <div id="rateYo7" class=""></div>

                                                <div style="font-size:20px;" class="counter badge badge-warning rounded-rectangle">0</div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between">

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <p>Rate for Follow-up - &nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></p>

                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <input type="text" id="star_rating" name="star_rating8" class="" style="display:none;" value="0" required>

                                            <div class="row pl-2">

                                                <div id="rateYo8" class=""></div>

                                                <div style="font-size:20px;" class="counter badge badge-warning rounded-rectangle">0</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="department-rates container">

                                    <div class="d-flex justify-content-between">

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <p>Rate for Doctors Availability - &nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></p>

                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <input type="text" id="star_rating" name="star_rating9" class="" style="display:none;" value="0" required>

                                            <div class="row pl-2">

                                                <div id="rateYo9" class=""></div>

                                                <div style="font-size:20px;" class="counter badge badge-warning rounded-rectangle">0</div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between">

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <p>Rate for Department facilities - &nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></p>

                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <input type="text" id="star_rating" name="star_rating10" class="" style="display:none;" value="0" required>

                                            <div class="row pl-2">

                                                <div id="rateYo10" class=""></div>

                                                <div style="font-size:20px;" class="counter badge badge-warning rounded-rectangle">0</div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between">

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <p>Rate for Medicine Availability - &nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></p>

                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <input type="text" id="star_rating" name="star_rating11" class="" style="display:none;" value="0" required>

                                            <div class="row pl-2">

                                                <div id="rateYo11" class=""></div>

                                                <div style="font-size:20px;" class="counter badge badge-warning rounded-rectangle">0</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="treatment-rates container">

                                    <div class="d-flex justify-content-between">

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <p>Rate for Promptness - &nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></p>

                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <input type="text" id="star_rating" name="star_rating12" class="" style="display:none;" value="0" required>

                                            <div class="row pl-2">

                                                <div id="rateYo12" class=""></div>

                                                <div style="font-size:20px;" class="counter badge badge-warning rounded-rectangle">0</div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between">

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <p>Rate for Methodology - &nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></p>

                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <input type="text" id="star_rating" name="star_rating13" class="" style="display:none;" value="0" required>

                                            <div class="row pl-2">

                                                <div id="rateYo13" class=""></div>

                                                <div style="font-size:20px;" class="counter badge badge-warning rounded-rectangle">0</div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between">

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <p>Rate for Services - &nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></p>

                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <input type="text" id="star_rating" name="star_rating14" class="" style="display:none;" value="0" required>

                                            <div class="row pl-2">

                                                <div id="rateYo14" class=""></div>

                                                <div style="font-size:20px;" class="counter badge badge-warning rounded-rectangle">0</div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between">

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <p>Rate for Clinical Support - &nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span></p>

                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                            <input type="text" id="star_rating" name="star_rating15" class="" style="display:none;" value="0" required>

                                            <div class="row pl-2">

                                                <div id="rateYo15" class=""></div>

                                                <div style="font-size:20px;" class="counter badge badge-warning rounded-rectangle">0</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                    <label for="">Supportive Document&nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span>&nbsp;<span class="badge badge-secondary rounded-circle"  data-toggle="tooltip" title="Your Medical Bill/ID Card/Prescription which support your review"><i class="fas fa-info"></i></span></label>

                                    <input type="file" name="document" required="" class="form-control">

                                    <?php if(isset($_SESSION['error'])): ?>

                                    <span class="text-danger"></span>

                                    <?php endif; ?>

                                </div>

                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                    <label for="">Patient ID&nbsp;&nbsp;<span class="text-danger font-weight-bold">*</span>&nbsp;<span class="badge badge-secondary rounded-circle" data-toggle="tooltip" data-html="true" title="Patient ID or Unique ID assigned to you<br>(Please check your medical bill, prescription, visting card, etc.)."><i class="fas fa-info"></i></span></label>

                                    <input type="text" name="id_proof" required="" class="form-control">

                                </div>

                                <div class="form-group  col-12 col-sm-12 col-md-4 col-lg-3">

                                    <button type="submit" class="btn btn-block btn-success">POST</button>

                                </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>



</div>

    <!-- <script>

    var myDiv = $('.wwdtext');

    myDiv.text(myDiv.text().substring(0,200));

    </script> -->

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

    <script

  src="https://code.jquery.com/jquery-3.5.1.js"

  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="

  crossorigin="anonymous"></script>

  <script>

    $(function() {

        <?php if(isset($selected)): ?>

            var revOn = '<?php echo $selected ?>'; 

            var revID = '<?php echo $dataID ?>';

            $("div[data-parent='" + revOn + "']").show().siblings("[data-parent]").hide();

            $("div[data-parent='revCon']").show();

            $("div[data-parent='Disease']").show();

            $("#rec").hide();

            $("#rec1").show();

            $("div[data-parent='Department']").show();

            var options = document.getElementById("revname").options;

                for (var i = 0; i < options.length; i++) {

                if (options[i].text == revOn) {

                    options[i].selected = true;

                    break;

                }

            }

            var options = document.getElementById("hosName").options;

                for (var i = 0; i < options.length; i++) {

                if (options[i].value == revID) {

                    options[i].selected = true;

                    break;

                }

            }

        <?php else: ?>

    $("#revname").on("change", function() {

        $("#rateYo0").rateYo("option", "rating", 0);

        $('#rateYo0').next().text(0);

        if($(this).val() === "Hospital") {

            $("div[data-parent='" + $(this).val() + "']").show().siblings("[data-parent]").hide();

            $("div[data-parent='revCon']").show();

            $("div[data-parent='Disease']").show();

            $("#rec").hide();

            $("#rec1").show();

            $("div[data-parent='Department']").show();

            $(".hospital-rates").show();

            $(".doctor-rates, .department-rates, .treatment-rates").hide();

        } else if($(this).val() === "Doctor"){

            $("div[data-parent='" + $(this).val() + "']").show().siblings("[data-parent]").hide();

            $("div[data-parent='revCon']").show();

            $("div[data-parent='Disease']").show();

            $(".doctor-rates").show();

            $(".hospital-rates, .department-rates, .treatment-rates").hide();

        } else if($(this).val() === "Department"){

            $("div[data-parent='" + $(this).val() + "']").show().siblings("[data-parent]").hide();

            $("div[data-parent='revCon']").show();

            $("div[data-parent='Hospital']").show();

            $("#rec").show();

            $("#rec1").hide();

            $("div[data-parent='Disease']").show();

            $(".department-rates").show();

            $(".hospital-rates, .doctor-rates, .treatment-rates").hide();

        } else if($(this).val() === "Treatment"){

            $("div[data-parent='" + $(this).val() + "']").show().siblings("[data-parent]").hide();

            $("div[data-parent='revCon']").show();

            $("div[data-parent='Hospital']").show();

            $("div[data-parent='Disease']").show();

            $(".treatment-rates").show();

            $(".hospital-rates, .doctor-rates, .department-rates").hide();

        }else {

            $("[data-parent]").hide();

        }

    });

        <?php endif; ?>

});

  </script>

<script>

    $(document).ready(function() {

        $('#hosName').change(function(){

            var hos_id = $('#hosName').val();

           

            //console.log("/hospital_Controller/fetchtreat?q="+dept_id);

                 var xhttp = new XMLHttpRequest();

                xhttp.onreadystatechange = function() {

                    if (this.readyState == 4 && this.status == 200) {

                        //console.log(this.responseText);

                    document.getElementById("deptName").innerHTML = this.responseText;

                    }

                };

                

                xhttp.open("GET", "<?php echo site_url() ?>/userProfile_Controller/fetchdept?q="+hos_id, true);

                xhttp.send();  

        });

        $('#hosName').change(function(){

            var hos_id = $('#hosName').val();

           

            //console.log("/hospital_Controller/fetchtreat?q="+dept_id);

                 var xhttp = new XMLHttpRequest();

                xhttp.onreadystatechange = function() {

                    if (this.readyState == 4 && this.status == 200) {

                        //console.log(this.responseText);

                    document.getElementById("treatName").innerHTML = this.responseText;

                    }

                };

                

                xhttp.open("GET", "<?php echo site_url() ?>/userProfile_Controller/fetchtreat?q="+hos_id, true);

                xhttp.send(); 

                

            

        });

        $(function (){

            $('[data-toggle="tooltip"]').tooltip()

        })

         $(function () {

 

            // $("#rateYo").rateYo({

            //     rating: 0

            // });

            // $("#rateYo0").rateYo({

            //     rating: 0

            //     // ratedFill: "#E74C3C"

            // });

            $("#rateYo0").rateYo({

                    rating: 0,

                    readOnly: true,

                    ratedFill: "#3366ff",

                });

                $('#rateYo0').next().text(0);

            

            $("#rateYo, #rateYo2, #rateYo3, #rateYo4, #rateYo5, #rateYo6, #rateYo7, #rateYo8, #rateYo9, #rateYo10, #rateYo11, #rateYo12, #rateYo13, #rateYo14, #rateYo15").rateYo()

            .on("rateyo.set", function (e, data) {

 

                var star_rating = data.rating;

                //  $("#star_rating, #star_rating2, #star_rating3, #star_rating4, #star_rating5, #star_rating6, #star_rating7, #star_rating8, #star_rating9, #star_rating10, #star_rating11, #star_rating12, #star_rating13, #star_rating14, #star_rating15").val(star_rating);

                $(this).parent().parent().find('#star_rating').val(star_rating);

            })

              

            $("#rateYo, #rateYo2, #rateYo3, #rateYo4, #rateYo5, #rateYo6, #rateYo7, #rateYo8, #rateYo9, #rateYo10, #rateYo11, #rateYo12, #rateYo13, #rateYo14, #rateYo15 ").rateYo()

            .on("rateyo.change", function (e, data) {

                var rating = data.rating;

                $(this).next().text(rating);

                

            });

        });



            $('#rateYo, #rateYo2, #rateYo3, #rateYo4').on("rateyo.set", function (e, data) {

                var x=0;

                if($('#revname').val() == "Hospital")

                {   

                    x = (parseFloat($('#rateYo').next().html()) + parseFloat($('#rateYo2').next().html()) + parseFloat($('#rateYo3').next().html()) + parseFloat($('#rateYo4').next().html())) / 4;

                    x = parseFloat(x).toFixed(1);

                    

                // console.log(x);

                }

                $("#rateYo0").rateYo("option", "rating", x);

                $('#rateYo0').next().text(x);

                $('#star_rating0').val(x);

            });

            $('#rateYo5, #rateYo6, #rateYo7, #rateYo8').on("rateyo.set", function (e, data) {

                var x=0;

                if($('#revname').val() == "Doctor")

                {

                    x = (parseFloat($('#rateYo5').next().html()) + parseFloat($('#rateYo6').next().html()) + parseFloat($('#rateYo7').next().html()) + parseFloat($('#rateYo8').next().html())) / 4;

                    x = parseFloat(x).toFixed(1);

                // console.log(x);

                }

                $("#rateYo0").rateYo("option", "rating", x);

                $('#rateYo0').next().text(x);

                $('#star_rating0').val(x);

            });

            $('#rateYo9, #rateYo10, #rateYo11').on("rateyo.set", function (e, data) {

                var x=0;

                if($('#revname').val() == "Department")

                {

                    x = (parseFloat($('#rateYo9').next().html()) + parseFloat($('#rateYo10').next().html()) + parseFloat($('#rateYo11').next().html())) / 3;

                    x = parseFloat(x).toFixed(1);

                // console.log(x);

                }

                $("#rateYo0").rateYo("option", "rating", x);

                $('#rateYo0').next().text(x);

                $('#star_rating0').val(x);

            });

            $('#rateYo12, #rateYo13, #rateYo14, #rateYo15').on("rateyo.set", function (e, data) {

                var x=0;

                if($('#revname').val() == "Treatment")

                {

                    x = (parseFloat($('#rateYo12').next().html()) + parseFloat($('#rateYo13').next().html()) + parseFloat($('#rateYo14').next().html()) + parseFloat($('#rateYo15').next().html())) / 4;

                    x = parseFloat(x).toFixed(1);

                // console.log(x);

                }

                $("#rateYo0").rateYo("option", "rating", x);

                $('#rateYo0').next().text(x);

                $('#star_rating0').val(x);

            });



    });

</script>

<!-- <script>

    $('#rateYo12').click(function(){

        var x = parseFloat($('#rateYo12_count ').html());

        $("#rateYo0").rateYo({

                    rating: x,

                    readOnly: true

                });

        $("#rateYo0_count").html(x);

    })

</script> -->

    <!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

<!-- Latest compiled and minified JavaScript -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

 --><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>

</html>