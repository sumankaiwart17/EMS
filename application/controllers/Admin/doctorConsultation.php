<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>AAHRS | Doctor Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css"> -->
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
   <!--  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    
    <style type="text/css">
    	body{
    background-color: #f3f6f8;
    margin-top:10px;
}
.thumb-lg {
    height: 88px;
    width: 88px;
}
.profile-user-box {
    position: relative;
    border-radius: 5px;
}
.bg-custom {
    background-color: #02c0ce!important;
}
.profile-user-box {
    position: relative;
    border-radius: 5px;
}

.card-box {
    padding: 10px;
    border-radius: 3px;
    margin-bottom: 10px;
    background-color: #fff;
}
.inbox-widget .inbox-item img {
    width: 40px;
}
.text-mahagony{
    color: #7c0a02!important;
}
.inbox-widget .inbox-item {
    border-bottom: 1px solid #f3f6f8;
    overflow: hidden;
    padding: 10px 0;
    position: relative
}

.inbox-widget .inbox-item .inbox-item-img {
    display: block;
    float: left;
    margin-right: 15px;
    width: 40px
}

.inbox-widget .inbox-item img {
    width: 40px
}

.inbox-widget .inbox-item .inbox-item-author {
    color: #313a46;
    display: block;
    margin: 0
}

.inbox-widget .inbox-item .inbox-item-text {
    color: #98a6ad;
    display: block;
    font-size: 14px;
    margin: 0
}

.inbox-widget .inbox-item .inbox-item-date {
    color: #98a6ad;
    font-size: 11px;
    position: absolute;
    right: 7px;
    top: 12px
}

.comment-list .comment-box-item {
    position: relative
}

.comment-list .comment-box-item .commnet-item-date {
    color: #98a6ad;
    font-size: 11px;
    position: absolute;
    right: 7px;
    top: 2px
}

.comment-list .comment-box-item .commnet-item-msg {
    color: #313a46;
    display: block;
    margin: 10px 0;
    font-weight: 400;
    font-size: 15px;
    line-height: 24px
}

.comment-list .comment-box-item .commnet-item-user {
    color: #98a6ad;
    display: block;
    font-size: 14px;
    margin: 0
}

.comment-list a+a {
    margin-top: 15px;
    display: block
}

.ribbon-box .ribbon-primary {
    background: #cc5500;
}

.ribbon-box .ribbon {
    position: relative;
    float: left;
    clear: both;
    padding: 5px 12px 5px 12px;
    margin-left: -30px;
    margin-bottom: 15px;
    font-family: Rubik,sans-serif;
    -webkit-box-shadow: 2px 5px 10px rgba(49,58,70,.15);
    -o-box-shadow: 2px 5px 10px rgba(49,58,70,.15);
    box-shadow: 2px 5px 10px rgba(49,58,70,.15);
    color: #fff;
    font-size: 13px;
}
.text-custom {
    color: #02c0ce!important;
}

.badge-custom {
    background: #02c0ce;
    color: #fff;
}
.badge {
    font-family: Rubik,sans-serif;
    -webkit-box-shadow: 0 0 24px 0 rgba(0,0,0,.06), 0 1px 0 0 rgba(0,0,0,.02);
    box-shadow: 0 0 24px 0 rgba(0,0,0,.06), 0 1px 0 0 rgba(0,0,0,.02);
    padding: .35em .5em;
    font-weight: 500;
}
.text-muted {
    color: #98a6ad!important;
}

.font-13 {
    font-size: 13px!important;
}

body {
    overflow-x: hidden;
}

.container-fluid {
    background-image: linear-gradient(to right, #7B1FA2, #E91E63)
}

.sm-text {
    font-size: 10px;
    letter-spacing: 1px
}

.sm-text-1 {
    font-size: 14px
}

.green-tab {
    background-color: #00C853;
    color: #fff;
    border-radius: 5px;
    padding: 5px 3px 5px 3px
}

.btn-red {
    background-color: #E64A19;
    color: #fff;
    border-radius: 20px;
    border: none;
    outline: none
}

.btn-red:hover {
    background-color: #BF360C
}

.btn-red:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

.round-icon {
    font-size: 40px;
    padding-bottom: 10px
}

.fa-circle {
    font-size: 10px;
    color: #EEEEEF
}

.green-dot {
    color: #4CAF50
}

.red-dot {
    color: #E64A19
}

.yellow-dot {
    color: #FFD54F
}

.grey-text {
    color: #BDBDBD
}

.green-text {
    color: #4CAF50
}
.scrollable{
    height: 800px;
    overflow: scroll;
}
.scrollable::-webkit-scrollbar{
    display: none;
}
.block {
    border-right: 1px solid #F5EEEE;
    border-top: 1px solid #F5EEEE;
    border-bottom: 1px solid #F5EEEE
}

.profile-pic img {
    border-radius: 50%
}

.rating-dot {
    letter-spacing: 5px
}

.via {
    border-radius: 20px;
    height: 28px
}


 .ratings {
     background-color: #fff;
     padding: 54px;
     border: 1px solid rgba(0, 0, 0, 0.1);
     box-shadow: 0px 10px 10px #E0E0E0
 }

 .product-rating {
     font-size: 20px
 }

 .stars i {
     font-size: 18px;
     color: #28a745
 }

 .rating-text {
     margin-top: 10px
 }
 @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
.bg-lgreen{
    background-color:#90ee90!important;
}
 body {
     margin: 0;
     font-family: 'Open Sans', serif;
     background: #eee
 }
    </style>
</head>

<body>

<div class="content">
<?php include 'Users/navbar.php'; ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <div id="sidebar" class="pr-2">
                    <div id="recommend" class=" mb-3">
                        <a href="<?php echo site_url('userProfile_Controller/recommendMe') ?>" class="btn text-white btn-lg btn-danger font-weight-bold" >Recommend Me</a>
                        <p class="ml-2"><a href="">Dentistry</a><br>
                        <a href="">Past Searches</a></p>
                    </div>
                    <div id="" class="pl-1 mb-3">
                        <a href="#"><h5 class="sidebar-header">Consults</h5></a>
                        <p><a href="">Cardio Exercises</a><br>
                        <a href="">Root Canal - Dentistry</a></p>
                    </div>
                    <div id="" class="pl-1 mb-3">
                        <a href="#"><h5 class="sidebar-header">Articles</h5></a>
                    </div>
                    <div id="" class="pl-1 mb-3">
                        <a href="#"><h5 class="sidebar-header">My Preferences</h5><a>                                                                                                                    <p><a href="">Cancer</a><br>
                        <a href="">Dental Practices</a></p>
                    </div>
                    <div id="" class="pl-1 mb-3">
                        <a href="#"><h5 class="sidebar-header">Most Searched</h5></a>
                        <a href=""><span class="badge badge-pill badge-secondary">Cancer</span></a>
                        <a href=""><span class="badge badge-pill badge-secondary">dental</span></a>
                        <a href=""><span class="badge badge-pill badge-secondary">Apollo</span></a>
                        <a href=""><span class="badge badge-pill badge-secondary">gingivitis</span></a>
                        <a href=""><span class="badge badge-pill badge-secondary">hypothermia</span></a>
                    </div>
                    <div id="" class="pl-1 mb-3">
                        <a href="#"><h5 class="sidebar-header">Offers</h5></a>
                        <p><a href=""><span class="text-danger font-weight-bold">20% OFF-AMRI</span>&nbsp;full body Check up</a><br>
                        <a href=""><span class="text-danger font-weight-bold">COMBO OFFER-Apollo</span>&nbsp;Cardio Check up</a><br>
                        <a href=""><span class="text-danger font-weight-bold">@2599-Woodlands</span>&nbsp;Cardio Check up</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
            <h5>Online Consultation</h5>
            <div class="login-form">
                <div class="card">
                    <div class="card-header">
                        <h5>Title : <?php echo $consultData[0]['consult_title'] ?></h5>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-3 text-center border-right">
                            <img src="<?php echo $consultData[0]['picture'] ?>" class="rounded-circle" style="height: 50px;width:50px;"><br>
                            <strong>Re. <?php echo $consultData[0]['name'] ?></strong> 
                        </div>
                        <div class="col-6 text-left">
                            <h5 class="card-title">Query - </h5>
                            <p class="card-text"><?php echo $consultData[0]['consult_query'] ?></p>
                            <br>
                        </div>
                    </div>
                            
                            <?php if($consultData[0]['answer']!=''){?>
                                <hr>
                    <div class="row">
                                <div class="col-6 offset-3">
                                <h5 class="card-title">Reply - </h5>
                                    <p><?php echo $consultData[0]['answer'] ?></p>
                                </div>
                                <div class="col-3 text-center border-left">
                                <img src="<?php echo $consultData[0]['doc_pic'] ?>" class="rounded-circle" style="height: 50px;width:50px;"><br>
                                <br><strong>Re. <?php echo $consultData[0]['doc_name'] ?></strong> 
                                </div>
                            </div>
                        
                    </div>
                                <?php } ?>
                </div>
               
                
               
            </div>
    
                
                
                


            
        </div>
        <!-- end row -->
        
        <!-- end row -->
    </div>
    <!-- container -->
</div>
<?php// include 'footer.php' ?>
<script>
    $(function () {
                <?php foreach ($reviewData as $x): ?>
                    $("#rateYo<?php echo $x['review_id'] ?>").rateYo({
                        rating: <?php echo $x['star_rating'] ?>,
                        readOnly: true,
                        starWidth: "20px",
                        spacing: "3px"
                    });
                <?php endforeach; ?>
            });
    </script> 
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>   
<!-- <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script> -->
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>