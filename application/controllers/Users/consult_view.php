<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="<?php echo base_url('css/cssUser/style.css') ?>">
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

     <title>AAHRS | Reviews</title>

     <style>
         .btn-primary{
            background-color: #d21818 !important;
            border-color: #d21818 !important;
         }

         .btn-success {
    color: #fff;
    background-color: #6c757d !important;
    border-color: #6c757d !important;
}
     </style>

    
 </head>


 <body class="bg-body">
     <?php include('navbar.php'); ?>
     <div class="container mt-2">
         <div class="row">

             <!-- left Bar -->

             <?php include('left-sidebar.php'); ?>

             <!-- Reviews -->

             <div class="col-sm-8 bg-body consultData" data-aos="flip-up">
                 <form class="d-flex">
                     <input class="form-control me-2" id="search" type="search"  placeholder="Search by treatment, query.." aria-label="Search">
                 </form>

                 <!-- test consult card start -->
                 <div id="card_body_res" style= "height: 820px; overflow-y: scroll;">
<!--  -->
                 <?php foreach ($consult as $rs) : ?>
                         <div class="card card-body mt-2 mb-0 pb-2 searchconsult">
                             <div class="row">
                                 <div class="col-12 ">
                                     <img src="<?= $rs['picture'] ?>" class="img-thumbnail ml-2 mr-2 float-left rounded-circle" style="height: 50px; width:50px;" alt="">
                                     <h5 class="pt-2"><a href="<?php echo site_url('userProfile_Controller/myaccount?id=' . $rs['email_id'] . '') ?>"><?= $rs['name'] ?></a> consulted

                                         <a href="<?php echo site_url('mainController/viewDoctor/'.$rs['doc_id'])?>"><strong class="rev-sub"><?= 'Dr. '.$rs['doc_name'] ?></strong></a>

                                         <br>
                                         <small style="font-size:13px;"><?php $date = date_create($rs['post_time']);

                                                                        echo date_format($date, 'd/m/y'); ?></small>

                                     </h5>

                                 </div>

                             </div>

                             <div class="row">

                                 <div class="col-12">
                                     <strong class="pl-2 mt-2 text-info query-title" style="font-size: 18px;"><?= $rs['consult_title'] ?> </strong>
                                     <p class="pl-2 pt-2 wwdtext"><strong class="query"><?= $rs['consult_query'] ?></strong></p>

                                     <?php if ($rs['answer'] != NULL) : ?>

                                         <input type="button" id="view_reply" class="btn btn-primary showbtn reply" value="See Reply" style="float:right">

                                         <div id="show-data" style="display:none;">

                                             <div class="row" style="flex-direction:column; margin-left:12px;">

                                                 <img src="<?= $rs['picture'] ?>" class="img-thumbnail ml-1 mr-1 float-right rounded-circle" style="height: 50px; width:50px;" alt="">

                                                 <h5 class="pt-2"><a href=""><?= $rs['doc_name'] ?></a> <span style="font-size:10px">replied-</span>

                                             </div>

                                             <p class="pl-2 pt-2 wwdtext"><?= $rs['answer'] ?></p>

                                         </div>

                                         <input type="button" id="hidebtn" class="btn btn-danger hidebtn" style="float:right; display:none;" value="Hide Reply">

                                     <?php else : ?>

                                         <input type="button" class="btn btn-success no-reply" style="float:right" value="No Reply">

                                     <?php endif; ?>

                                 </div>

                             </div>

                         </div>

                     <?php endforeach; ?>

                 </div>

                 <!-- test consult card end -->

             </div>

             <!-- right Bar -->

             <div id="sidebar" class="col-sm-2">
                 <div id="" class="pl-1 mb-3">
                     <div id="sort_nr" class="pl-1 mb-3">
                         <a href="#">
                             <h5 class="sidebar-header">Sort By</h5>
                         </a>
                         <input type="radio" class="filter_Check" name="sort" id="reply" value="all" checked>&nbsp;<label for="reply">All</label><br>
                         <input type="radio" class="filter_Check" name="sort" id="reply" value="reply">&nbsp;<label for="reply">Reply</label><br>
                         <input type="radio" class="filter_Check" name="sort" id="no-reply" value="no-reply">&nbsp;<label for="no-reply">No Reply</label><br></p>
                     </div>

                     <!-- <a href="#">
                         <h5 class="sidebar-header">Filters</h5>
                     </a>

                     <div class="filter-body">
                         <p class="ml-2" style="color: #C55A11;">By Treatment</p>
                         <div class="shown">
                             <?php $c = 0;
                                foreach ($filters_treatment as $ft) :
                                    $c++;
                                ?>

                                 <input type="checkbox" class="filterCheck" id="treat_id" value="<?php echo $ft['treat_id'] ?>">&nbsp;<label for="<?php echo $ft['treat_id'] ?>"><?php echo $ft['treat_name']  ?></label><br>
                             <?php if ($c == 4) {
                                        break;
                                    }
                                endforeach;
                                ?>
                         </div>

                         <a href="javascript:void(0);" class="ml-2 more" style="color: #C55A11;" id="0">+more</a>
                         <div class="hidden" style="display:none;">
                             <?php $c = 0;
                                foreach ($filters_treatment as $ft) :
                                    $c++;
                                ?>
                                 <input type="checkbox" class="filterCheck" id="treat_id" value="<?php echo $ft['treat_id'] ?>">&nbsp;<label for="<?php echo $ft['treat_id'] ?>"><?php echo $ft['treat_name']  ?></label><br>
                             <?php if ($c == sizeof($filters_treatment)) {
                                        break;
                                    }
                                endforeach;
                                ?>
                             <a href="javascript:void(0);" class="ml-2 less" style="color: #C55A11;" id="0">-less</a>
                         </div>
                     </div>

                     <div class="filter-body">
                         <p class="ml-2" style="color: #C55A11;">By Department</p>
                         <div class="shown">
                             <?php $c = 0;
                                foreach ($filters as $f) :
                                    $c++;
                                ?>

                                 <input type="checkbox" class="filterCheck" id="dept_id" value="<?php echo $f['dept_id'] ?>">&nbsp;<label for="<?php echo $f['dept_id'] ?>"><?php echo $f['dept_name']  ?></label><br>
                             <?php if ($c == 4) {
                                        break;

                                    }
                                endforeach;
                                ?>
                         </div>

                         <a href="javascript:void(0);" class="ml-2 more" style="color: #C55A11;" id="1">+more</a>
                         <div class="hidden" style="display:none;">

                             <?php $c = 0;
                                foreach ($filters as $f) :
                                    $c++;
                                ?>

                                 <input type="checkbox" class="filterCheck" id="dept_id" value="<?php echo $f['dept_id'] ?>">&nbsp;<label for="<?php echo $f['dept_id'] ?>"><?php echo $f['dept_name']  ?></label><br>
                             <?php if ($c == sizeof($filters)) {
                                        break;
                                    }
                                endforeach;
                                ?>
                             <a href="javascript:void(0);" class="ml-2 less" style="color: #C55A11;" id="1">-less</a>
                         </div>
                     </div> -->
                 </div>
             </div>
         </div>
     </div>



     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

     <!-- Latest compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

 -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


     <script>
         var index;
         $('.showbtn').click(function() {
             index = $(this).parent().parent().parent().index();
             // console.log(index);
             $('.card').eq(index).find('#show-data').show();
             $('.card').eq(index).find('.hidebtn').show();
             $(this).hide();
         });

         $('.hidebtn').click(function() {
             index = $(this).parent().parent().parent().index();
             // console.log(index);
             $('.card').eq(index).find('#show-data').hide();
             $('.card').eq(index).find('.showbtn').show();
             $(this).hide();

         });

     </script>
	<script>    
$("#search").on("keyup", function() {
	var value = $(this).val().toLowerCase();
	$(".searchconsult").filter(function() {
	$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	});
});
</script>

     <script>

         $(document).ready(function() {
             $(".filterCheck").click(function() {
                 var action = 'data';
                 var dept_id = get_filter_text('dept_id');
                 var treat_id = get_filter_text('treat_id');
                 console.log(dept_id);
                 console.log(treat_id);
                 $.ajax({
                     url: '<?php echo site_url('userProfile_Controller/fetchconsult') ?>',
                     method: 'POST',
                     data: {
                         action: action,
                         dept_id: dept_id,
                         treat_id: treat_id
                     },

                     success: function(response) {
                         // console.log(response);
                         $("#card_body_res").html(response);
                     }
                 });
             });

             function get_filter_text(text_id) {
                 var filterData = [];
                 $('#' + text_id + ':checked').each(function() {
                     filterData.push($(this).val());

                 });
                 return filterData;
             }
         });
     </script>

     <script>

         $(document).ready(function() {
             var i;
             $(".filter_Check").click(function() {
                 if ($(this).val() == "all") {
                     x = $(".card-body").length;
                     for (i = 0; i < x; i++) {
                         $(".card-body").eq(i).show();
                     }
                 }

                 if ($(this).val() == "reply") {
                     x = $(".card-body").length;
                     for (i = 0; i < x; i++) {
                         if ($(".card-body").eq(i).find(".showbtn").val() == "See Reply") {
                             $(".card-body").eq(i).show();
                         } else {
                             $(".card-body").eq(i).hide();
                         }
                     }
                 }

                 if ($(this).val() == "no-reply") {
                     x = $(".card-body").length;
                     for (i = 0; i < x; i++) {
                         if ($(".card-body").eq(i).find(".no-reply").val() == "No Reply") {
                             $(".card-body").eq(i).show();
                         } else {
                             $(".card-body").eq(i).hide();
                         }
                     }
                 }
             });
         });

     </script>
     <script>
         $(document).ready(function() {
             var index;
             $(".more").click(function() {
                 index = $(this).attr('id');
                 $(".hidden").eq(index).show();
                 $(".more").eq(index).hide();
                 $(".shown").eq(index).hide();
             });

             $(".less").click(function() {
                 index = $(this).attr('id');
                 $(".more").eq(index).show();
                 $(".hidden").eq(index).hide();
                 $(".shown").eq(index).show();
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