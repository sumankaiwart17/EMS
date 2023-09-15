

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('css/cssUser/style.css') ?>">

<title>Rateyo</title>

</head>

<body>

<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">
                                            <input type="text" id="star_rating" name="star_rating" class=""  style="display:none;" value="0" required>
                                            <div class="row pl-2">
                                                <div id="rateYo" class=""></div>
                                                <div style="font-size:20px;" class="counter badge badge-warning rounded-rectangle">0</div>
                                            </div>
                                        </div>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
 
</body>
<script>
$(function(){
 
    $("#rateYo").rateYo({
        rating: 3,
        readOnly: true,
        starWidth: "20px",
        spacing: "3px"
    });
});



</script>

</html>