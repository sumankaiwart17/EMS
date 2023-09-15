<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/cssUser/style.css') ?>">

    <title>AAHRS | OFFERS</title>

    <style>
        .card {

            box-shadow: 10px 10px 8px #888888;

            transition: 0.3s ease-in-out;

            cursor: pointer;

        }



        .card:hover {

            transform: scale(1.02);

        }



        a:hover,

        a:focus {

            text-decoration: none !important;

            outline: none !important;



        }



        .panel-group .panel {

            background-color: #fff;

            border: none;

            box-shadow: none;

            border-radius: 10px;

            margin-bottom: 11px;

            transition: 0.3s ease-in-out;

        }



        .panel-group .panel:hover {

            transform: scale(1.02);

        }



        .panel .panel-heading {

            padding: 0;

            border-radius: 10px;

            border: none;

            background-color: #fc9842;

            background-image: linear-gradient(315deg, #fc9842 0%, rgb(236, 87, 102) 74%);

        }



        .panel-heading a {

            color: #fff !important;

            display: block;

            border: none;

            padding: 20px 35px 20px;

            font-size: 20px;



            font-weight: 600;

            position: relative;

            color: #fff;

            box-shadow: none;

            transition: all 0.1s ease 0;

        }



        .new {

            animation: tween-color 5s infinite;

            /*  position: absolute;

            top: 32%;

            left: 37%; */

            font-size: 15px;



        }



        @keyframes tween-color {

            0% {

                background-color: purple;

                color: white;

            }



            25% {

                background-color: blue;

                color: white;

                transform: scaleY(-1);

            }



            50% {

                background-color: orange;

                color: white;

                transform: scaleY(1);

            }



            75% {

                color: white;

                background-color: purple;

                transform: scaleY(-1);

            }



            100% {

                background-color: blue;

                color: white;

                transform: scaleY(1);

            }

        }



        @keyframes off-color {

            0% {

                color: white;

            }



            25% {

                color: white;

            }



            50% {

                color: white;

            }



            75% {

                color: white;

            }



            100% {

                color: white;

            }

        }



        .coupon {

            max-width: 300px;

            padding: 10px;

            background-color: #FFFF99;

            border-radius: 10px;

            font-size: 15px;

            color: #26054d;

            font-weight: bold;

        }



        .panel-heading .off {

            animation: off-color 5s infinite;

            margin-top: -1%;

            font-weight: 1000;

            font-size: 30px;

        }



        .panel-heading a:after,

        .panel-heading a.collapsed:after {

            content: "\f068";

            font-family: fontawesome;

            text-align: center;

            position: absolute;

            left: -20px;

            top: 10px;

            color: #fff;

            background-color: rgb(236, 87, 102);

            border: 5px solid #fff;

            font-size: 15px;

            width: 40px;

            height: 40px;

            line-height: 30px;

            border-radius: 50%;

            transition: all 0.3s ease 0s;

        }



        .panel-heading:hover a:after,

        .panel-heading:hover a.collapsed:after {

            transform: rotate(360deg);

        }



        .panel-heading a.collapsed:after {

            content: "\f067";

        }



        #accordion .panel-body {

            background-color: #Fff;

            color: #8C8C8C;

            line-height: 25px;

            padding: 10px 25px 10px 35px;

            border-top: none;

            border-bottom-right-radius: 10px;

            border-bottom-left-radius: 10px;

            font-size: 14px;

            position: relative;

        }
    </style>

</head>

<?php

$alert = '';

$book_status = '';

if (isset($_SESSION['book_status']))

    $book_status = $_SESSION['book_status'];



if ($book_status != 0) {

    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">

                        Booking Successful!! Your Booking ID is ' . $book_status . '

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

    <span aria-hidden="true">&times;</span>

  </button>

                    </div>';
}

?>



<body class="bg-body">

    <?php include('navbar.php'); ?>

    <div class="container mt-2">

        <div class="row">

            <?php

            //print_r($topDocs);

            ?>

            <!-- left Bar -->

            <?php include('left-sidebar.php'); ?>

            <!-- Offers-->

            <div class="col-12 col-sm-12 col-md-8 col-lg-8">

                <div class="alert alert-success" id="success-alert">

                    <button type="button" class="close" data-dismiss="alert">x</button>

                    <strong>Copied Coupon Code Successfully!!</strong>

                </div>

                <form class="d-flex mb-2">

                    <input class="form-control me-2" id="myInput" type="search" onkeyup="searchFunction()" placeholder="Search offers.." aria-label="Search">

                </form>

                <div class="panel-group" id="accordion" style="height: 800px; overflow-y: scroll; width: 100%; padding: 0px 30px" role="tablist" aria-multiselectable="true">

                    <?php $first = 1;
if(isset($offers))
{
                    foreach ($offers as $x) : ?>

                        <?php if ($x['status'] != 0) : ?>

                            <div class="panel panel-default">

                                <div class="panel-heading" role="tab" id="<?php echo $x['coupon_id'] ?>">

                                    <h4 class="panel-title">

                                        <a class="<?php if ($first == 1) {

                                                        echo 'first';
                                                    } else {

                                                        echo 'collapsed';
                                                    } ?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $x['coupon_id'] ?>" aria-expanded="true" aria-controls="collapse<?php echo $x['coupon_id'] ?>">

                                            <span class="Shos_name"><?php echo $x['hos_name'] ?></span> - <?php echo $x['coupon_title'] ?>

                                            <span style="<?php $date1 = date_create($x['creat_on']);

                                                            $date2 = date_create(date('Y-m-d'));

                                                            $diff = date_diff($date1, $date2);

                                                            $days = $diff->format("%a") + 1;

                                                            if ($days > 3) {

                                                                echo "display:none;";
                                                            } ?>" class="badge new badge-warning rounded">New</span><span class="float-right off mr-2 text-white discount"><?php echo $x['discount'] ?>% OFF</span>

                                        </a>

                                    </h4>

                                </div>

                                <div id="collapse<?php echo $x['coupon_id'] ?>" class="panel-collapse collapse <?php if ($first == 1) {

                                                                                                                    echo 'show';
                                                                                                                } ?> in" role="tabpanel" aria-labelledby="<?php echo $x['coupon_id'] ?>">

                                    <div class="panel-body container pt-0">

                                        <div class="row pt-0 mt-0">

                                            <div class="col-12">

                                                <span style="font-size: 15px;" class="validity mt-4 p-2 badge badge-success float-right mr-3">Valid Till:<?php $date = date_create($x['valid_till']);

                                                                                                                                                            echo date_format($date, " dS M' y"); ?>

                                                </span>

                                                <img src="<?php echo $x['logo'] ?>" class="img-thumbnail float-left" style="border:0px; height:80px; width:80px;" alt="">

                                                <h6 class="text-dark pt-4"><strong style="font-size: 20px; margin-left:10px;"><?php echo $x['hos_name'] ?></strong> <small><?php echo $x['city'] . ', ' . $x['state'] ?></small></h6>

                                            </div>

                                        </div>

                                        <div class="row mt-2">

                                            <div class="col-8 text-dark">

                                                <h6>Offer Description</h6>

                                                <p class="wwdtext<?php echo $x['coupon_id'] ?>" style="margin: auto;">

                                                    <?php echo $x['coupon_desc'] ?>

                                                </p>

                                                <p class="Sdt_name">

                                                    <?php

                                                    if ($x['doc_name'] != "") {

                                                        echo "Book Dr. " . $x['doc_name'] . "'s appoinment now.";
                                                    } elseif ($x['treat_name'] != "") {

                                                        echo "Book appoinment on " . $x['treat_name'] . " now.";
                                                    }



                                                    ?>

                                                </p>



                                            </div>

                                            <div class="col-4">

                                                <!-- <p style="font-size: 20px; font-weight: bold;" class="">Coupon Code: -->

                                                <center><span id="coupon<?php echo $x['coupon_id'] ?>" class="coupon" style="font-size: 14px;"><?php echo $x['coupon_code'] ?> <a class="btn p-1 mb-1" onclick="copyFunction(<?php echo $x['coupon_id'] ?>)"><i class="far text-weight-bold fa-copy fa-lg"></i></a></span></center><!-- </p> -->

                                                <?php

                                                if ($x['offer_on'] == 'Doctor') {

                                                ?><a href="<?php echo site_url('appointment_Controller/OfferBooking/' . $x['coupon_code']) ?>" style="margin-top: 5px;" class="btn btn-danger btn-block btn-md">Book Now</a>

                                                <?php } elseif ($x['offer_on'] == 'Treatment') {

                                                ?><a href="<?php echo site_url('appointment_Controller/treatofferbooking/' . $x['coupon_code']) ?>" style="margin-top: 5px;" class="btn btn-danger btn-block btn-md">Book Now</a>

                                                <?php }

                                                ?>

                                                <center> <a class="text-danger pop" href="#" data-toggle="popover" title="Terms & Conditions" data-placement="top" data-content="Terms of service are the legal agreements between a service provider and a person who wants to use that service. The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.">&ast; Terms & Conditions</a></center>



                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        <?php $first++;

                        endif; ?>

                    <?php endforeach; 
                    }
                    else{
                         echo"<label style='color:red'> </label>";
                    }
                    ?>

                </div>

            </div>



            <!-- right Bar -->

            <div id="sidebar" class="col-sm-2">

                <div id="recommend" class=" mb-3">

                    <a href="<?php echo site_url('userProfile_Controller/postReview') ?>" class="btn text-white btn-lg font-weight-bold btn-danger">Post a Review</a>

                </div>

                <div id="" class="pl-1 mb-3">

                    <a href="#">

                        <h5 class="sidebar-header">Filters</h5>

                    </a>

                    <div>

                        <p class="ml-2" style="color: #C55A11;">By Hospital</p>

                        <div class="shown">


                            <?php if (isset($filters) && $filters['hos'] !== '') : ?>
                                <?php

                                $c = 0;


                                foreach ($filters['hos'] as $x) :

                                    $c++;

                                ?>



                                    <input type="checkbox" class="filterCheck" id="hos_id" value="<?php echo $x['hos_id'] ?>">&nbsp;<label for="<?php echo $x['hos_id'] ?>"><?php echo $x['hos_name'] ?></label><br>

                                <?php if ($c == 4) {

                                        break;
                                    }

                                endforeach;

                                ?>




                        </div>

                    </div>

                    <a href="javascript:void(0);" class="ml-2 more" style="color: #C55A11;" id="0">+more</a>

                    <div class="h-s hidden" style="display:none">

                        <input type="text" id="hos_search" style="outline: none;border: 1px solid lightgrey;border-radius: 5px;" placeholder="Search">

                        <div class="hidden2" style="height: 125px; overflow-y: scroll; width: 185px;">

                            <?php $c = 0;



                                foreach ($filters['hos'] as $x) :

                                    $c++;

                            ?>

                                <p style="margin-bottom:0px;"><input type="checkbox" class="filterCheck filterCheckhos" id="hos_id" value="<?php echo $x['hos_id'] ?>"><?php echo ' ' . $x['hos_name'] ?></p>

                            <?php if ($c == sizeof($filters['hos'])) {

                                        break;
                                    }

                                endforeach;

                            ?>



                        </div>

                        <a href="javascript:void(0);" class="ml-2 less" style="color: #C55A11;" id="0">-less</a>
                    <?php else : ?>

                        <?php echo "<label style='color:red'>No Hospital Added</label>" ?>
                    <?php endif; ?>

                    </div>



                    <div>

                        <p class="ml-2" style="color: #C55A11;">By Doctor</p>

                        <div class="shown">

                            <?php if (isset($filters) && ($filters['docs'] !== '')) : ?>
                                <?php $c = 0;


                                foreach ($filters['docs'] as $x) :

                                    $c++;

                                ?>

                                    <input type="checkbox" class="filterCheck" id="doc_id" value="<?php echo $x['doc_id']

                                                                                                    ?>">&nbsp;<label for="<?php echo $x['doc_id']

                                                                                                                            ?>"><?php echo $x['doc_name']

                                                                                                                                ?></label><br>

                                <?php if ($c == 4) {

                                        break;
                                    }

                                endforeach;

                                ?>


                        </div>

                        <a href="javascript:void(0);" class="ml-2 more" style="color: #C55A11;" id="1">+more</a>

                        <div class="d-s hidden" style="display:none">

                            <input type="text" id="doc_search" style="outline: none;border: 1px solid lightgrey;border-radius: 5px;" placeholder="Search">

                            <div class="hidden2" style="height: 125px; overflow-y: scroll; width: 185px;">

                                <?php $c = 0;

                                foreach ($filters['docs'] as $x) :

                                    $c++;

                                ?>

                                    <p style="margin-bottom:0px;"><input type="checkbox" class="filterCheck filterCheckdoc" id="doc_id" value="<?php echo $x['doc_id'] ?>"><?php echo ' ' . $x['doc_name'] ?></p>

                                <?php if ($c == sizeof($filters['docs'])) {

                                        break;
                                    }

                                endforeach;

                                ?>
                           


                            </div>

                            <a href="javascript:void(0);" class="ml-2 less" style="color: #C55A11;" id="1">-less</a>

                        </div>
                        <?php else : ?>
                                <?php echo "<label style='color:red'>No Doctors Added</label>" ?>
                            <?php endif; ?>


                    </div>



                    <div>

                        <p class="ml-2" style="color: #C55A11;">By Treatment</p>

                        <div class="shown">

                            <?php if (isset($filters) && $filters['treat'] !== '') : ?>
                                <?php $c = 0;


                                foreach ($filters['treat'] as $x) :

                                    $c++;

                                ?>

                                    <input type="checkbox" class="filterCheck" id="treat_id" value="<?php echo $x['treat_id']

                                                                                                    ?>">&nbsp;<label for="<?php echo $x['treat_id']

                                                                                                                            ?>"><?php echo $x['treat_name']

                                                                                                                                ?></label><br>

                                <?php if ($c == 4) {

                                        break;
                                    }

                                endforeach;

                                ?>


                        </div>

                    </div>

                    <a href="javascript:void(0);" class="ml-2 more" style="color: #C55A11;" id="2">+more</a>

                    <div class="t-s hidden" style="display:none">

                        <input type="text" id="treat_search" style="outline: none;border: 1px solid lightgrey;border-radius: 5px;" placeholder="Search">

                        <div class="hidden2" style="height: 125px; overflow-y: scroll; width: 185px;">

                            <?php $c = 0;

                                foreach ($filters['treat'] as $x) :

                                    $c++;

                            ?>

                                <p style="margin-bottom:0px;"><input type="checkbox" class="filterCheck filterChecktreat" id="treat_id" value="<?php echo $x['treat_id'] ?>"><?php echo ' ' . $x['treat_name'] ?></p>

                            <?php if ($c == sizeof($filters['treat'])) {

                                        break;
                                    }

                                endforeach;

                            ?>
                 



                        </div>
                        <a href="javascript:void(0);" class="ml-2 less" style="color: #C55A11;" id="2">-less</a>

                    </div>
                    <?php else : ?>
                            <?php echo "<label style='color:red'>No Treatments Added</label>" ?>
                        <?php endif; ?>



                </div>

            </div>

        </div>

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

        <script>
            $(document).ready(function() {

                $(".filterCheckhos").each(function() {

                    $(this).add(this.nextSibling) // the text

                        .add(this.nextSibling.nextSibling) // the <br>

                        .wrapAll("<label class='hname'></label>")

                });

                $("#hos_search").keyup(function() {

                    var re = new RegExp($(this).val(), "i")

                    $('.hname').each(function() {

                        var text = $(this).text(),

                            matches = !!text.match(re);

                        $(this).toggle(matches)

                    });

                });

            });
        </script>

        <script>
            $(document).ready(function() {

                $(".filterCheckdoc").each(function() {

                    $(this).add(this.nextSibling) // the text

                        .add(this.nextSibling.nextSibling) // the <br>

                        .wrapAll("<label class='dname'></label>")

                });

                $("#doc_search").keyup(function() {

                    var re = new RegExp($(this).val(), "i")

                    $('.dname').each(function() {

                        var text = $(this).text(),

                            matches = !!text.match(re);

                        $(this).toggle(matches)

                    });

                });

            });
        </script>

        <script>
            $(document).ready(function() {

                $(".filterChecktreat").each(function() {

                    $(this).add(this.nextSibling) // the text

                        .add(this.nextSibling.nextSibling) // the <br>

                        .wrapAll("<label class='tname'></label>")

                });

                $("#treat_search").keyup(function() {

                    var re = new RegExp($(this).val(), "i")

                    $('.tname').each(function() {

                        var text = $(this).text(),

                            matches = !!text.match(re);

                        $(this).toggle(matches)

                    });

                });

            });
        </script>

        <!-- <script>

    var myDiv = $('.wwdtext');

    myDiv.text(myDiv.text().substring(0,200));

    </script> -->

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

        <script>
            <?php foreach ($offers as $x) : ?>

                var myDiv = $('.wwdtext<?php echo $x['coupon_id'] ?>');

                myDiv.text(myDiv.text().substring(0, 220));

            <?php endforeach; ?>
        </script>

        <script>
            function searchFunction() {

                var input, filter, cards, a, b, c, i, txtValuea, txtValueb, txtValuec;

                input = document.getElementById("myInput");

                filter = input.value.toUpperCase();

                cards = document.getElementsByClassName("panel");

                for (i = 0; i < cards.length; i++) {

                    a = cards[i].getElementsByClassName("Shos_name")[0];

                    b = cards[i].getElementsByClassName("Sdt_name")[0];

                    c = cards[i].getElementsByClassName("discount")[0];

                    txtValuea = a.textContent || a.innerText;

                    txtValueb = b.textContent || b.innerText;

                    txtValuec = c.textContent || c.innerText;

                    if (txtValuea.toUpperCase().indexOf(filter) > -1 || txtValueb.toUpperCase().indexOf(filter) > -1 || txtValuec.toUpperCase().indexOf(filter) > -1) {

                        cards[i].style.display = "";

                        // console.log(cards[0].innerText);

                    } else {

                        cards[i].style.display = "none";

                    }

                }

            }
        </script>

        <script>
            $(document).ready(function() {

                $(".filterCheck").click(function() {



                    var action = 'data';

                    var hos_id = get_filter_text('hos_id');

                    var doc_id = get_filter_text('doc_id');

                    var treat_id = get_filter_text('treat_id');

                    // console.log(hos_id + ' ' + doc_id + ' ' + treat_id);

                    $.ajax({

                        url: '<?php echo site_url('userProfile_Controller/fetchOffer') ?>',

                        method: 'POST',

                        data: {

                            action: action,

                            hos_id: hos_id,

                            doc_id: doc_id,

                            treat_id: treat_id,

                        },

                        success: function(response) {

                            // console.log(response);

                            $(".panel-group").html(response);

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
            function copyFunction(id) {

                /* Get the text field */

                var copyText = document.getElementById("coupon" + id);

                var textArea = document.createElement("textarea");

                textArea.value = copyText.textContent;

                document.body.appendChild(textArea);

                textArea.select();

                console.log(textArea.value);







                /* Copy the text inside the text field */

                document.execCommand("copy");

                textArea.remove();

                /* Alert the copied text */

                showAlert();

            }

            $(document).ready(function() {

                $("#success-alert").hide();



            });



            function showAlert() {

                $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {

                    $("#success-alert").slideUp(500);

                });

            }
        </script>

        <!-- Latest compiled and minified CSS -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

        <!-- Latest compiled and minified JavaScript -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function() {

                $('[data-toggle="popover"]').popover();

            });

            $('.pop').popover().click(function() {

                setTimeout(function() {

                    $('.pop').popover('hide');

                }, 5000);

            });
        </script>


</body>



</html>