<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Document</title>
</head>

<body>
 



    <div id="sidebar" data-aos="fade-down" class="<?php if ($this->uri->segment(2) == 'compare' || $this->uri->segment(2) == 'recHospital') : ?>col-sm-2 text-right<?php else : echo 'col-sm-2';

                                                                                                                                                                endif; ?> left-bar-desk" <?php if ($this->uri->segment(2) == 'compare') { ?> styles="padding-left: 100px !important;" <?php } ?>>



        <div id="recommend">

            <a href="<?php echo site_url('user/recommend-me') ?>" class="btn text-white btn-md <?php if ($this->uri->segment(2) != 'recommend-me') {

                                                                                                    echo 'btn-danger';
                                                                                                } else {

                                                                                                    echo 'btn-primary active';
                                                                                                } ?>  font-weight-bold">Recommend Me</a>

            <p class="ml-2 mb-0">

                <?php if (isset($_SESSION['userLog'])) {

                    $search = array(

                        'user_id' => $_SESSION['email_id']

                    );
                } else {

                    $search = array(

                        'user_id' => $_SERVER['REMOTE_ADDR']

                    );
                }

                $data = $this->db->select('treatments.treat_name, recommendme_search.*')

                    ->from('recommendme_search')

                    ->join('treatments', 'treatments.treat_id = recommendme_search.treat_id')

                    ->where($search)

                    ->order_by('recommendme_search.count', 'desc')

                    ->limit(2)

                    ->get()

                    ->result_array();





                //  print_r($data);

                ?>

                <?php foreach ($data as $x) : ?>

                    <a href="<?php echo site_url('userProfile_Controller/recommendMe?t=' . $x['treat_id'] . '&b=' . $x['budget']) ?>"><?php echo $x['treat_name'] ?></a><br>

                    <!-- <a href="">Past Searches</a> -->

                <?php endforeach; ?>

            </p>

        </div>

        <div id="compare" class="mb-3 mt-3">

            <a href="<?php echo site_url('userProfile_Controller/compare') ?>" class="btn text-white btn-lg <?php if ($this->uri->segment(2) == 'compare' || $this->uri->segment(2) == 'compareSelected') {

                                                                                                                echo 'btn-primary active';
                                                                                                            } else {

                                                                                                                echo 'btn-danger';
                                                                                                            } ?>  font-weight-bold">Compare</a><br>

            <?php

            $q = $this->db->select('*')

                ->from('hoscompare_search')

                ->join('hospital_details', 'hospital_details.hos_id = hoscompare_search.hos_id')

                ->order_by('count', 'desc')

                ->limit('5')

                ->get()

                ->result_array();

            ?>

            <?php foreach ($q as $x) { ?>

                <a href="<?php echo site_url("userProfile_Controller/compare") ?>">

                    <span class="badge badge-pill badge-secondary"><?php echo $x['hos_name'] ?></span>

                </a>

            <?php } ?>

        </div>

        <div id="consults" class="pl-1 mb-3">

            <a href="<?php echo site_url('userProfile_Controller/userconsult') ?>">

                <h5 class="sidebar-header">Consults</h5>

            </a>

            <?php

            $q = $this->db->select('consult_title')

                ->from('doctor_consults')

                ->order_by('post_time', 'desc')

                ->limit('5')

                ->distinct()

                ->get()

                ->result_array();

            ?>

            <?php foreach ($q as $x) { ?>

                <a href="#">

                    <span class="badge badge-pill badge-secondary"><?php echo $x['consult_title'] ?></span>

                </a>

            <?php } ?>

        </div>

        <div id="" class="pl-1 mb-3">

            <a href="#" style="text-decoration: none;">

                <h5 class="sidebar-header">Articles</h5>

            </a>

        </div>

        <?php if (isset($_SESSION['userLog'])) {

            $userData = $this->db->where('email_id', $_SESSION['email_id'])

                ->get('user_details')

                ->result_array();


        if(isset($userData[0]['treatment']) == 1)
        {
            if ($userData[0]['treatment'] != '') {

                $treat_name = $userData[0]['treatment'];

                $x = $this->db->select('treat_id')->from('treatments')->where('treat_name', $treat_name)->get()->result_array();
            }

        }

        if(isset($userData[0]['department']) == 1)
        {
            if ($userData[0]['department'] != '') {

                $dept_name = $userData[0]['department'];

                $y = $this->db->select('dept_id')->from('departments')->where('dept_name', $dept_name)->get()->result_array();

                $dept_id = $y[0]['dept_id'];



                $z = $this->db->select('hos_id')->from('hospital_departments')->where('dept_id', $dept_id)->get()->result_array();
            }
        }

        ?>

            <div id="" class="pl-1 mb-3">

                <a href="#" data-toggle="modal" data-target="#exampleModal">

                   

                        <p>

                            <?php  
                        if(isset($userData[0]['treatment']) == 1)
                        {
                            if ($userData[0]['treatment'] != '') { ?>

                                <a href="<?php echo site_url('userProfile_Controller/recommendMe?t=' . $x[0]['treat_id'] . '&b=50000') ?>">

                                    <?php echo $userData[0]['treatment'] ?>

                                </a>

                                <br>

                            <?php } 
                       ?>

                            <a href="">

                                <?php echo $userData[0]['disease'] ; }?>

                            </a>
                           
                            <?php
                        if(isset($userData[0]['department']) == 1)
                        {
                            if ($userData[0]['department'] != '') {

                                foreach ($z as $hid) {

                                    $a = $this->db->select('hos_name')->from('hospital_details')->where('hos_id', $hid['hos_id'])->get()->result_array();

                                    foreach ($a as $hn) { ?>

                                        <a href="<?php echo site_url('hospital_Controller/recHospital/' . $hid['hos_id']) ?>">

                                            <?php echo $hn['hos_name'] ?>

                                        </a><br>

                            <?php }
                                }
                            } 
                        }?>

                        </p>

            </div>

        <?php } ?>

        <div id="" class="pl-1 mb-3">

            <a href="#">

              

            </a>

          

            <?php

            $c = $this->db->select('consult_title')

                ->from('doctor_consults')

                ->order_by('post_time', 'desc')

                ->limit('1')

                ->distinct()

                ->get()

                ->result_array();

            ?>

            <?php foreach ($c as $x) { ?>

                <a href="#">

                    <span class="badge badge-pill badge-secondary"><?php echo $x['consult_title'] ?></span>

                </a>

            <?php } ?>

            <?php if (isset($_SESSION['userLog'])) {

                $search = array(

                    'user_id' => $_SESSION['email_id']

                );
            } else {

                $search = array(

                    'user_id' => $_SERVER['REMOTE_ADDR']

                );
            }

            $data = $this->db->select('treatments.treat_name, recommendme_search.*')

                ->from('recommendme_search')

                ->join('treatments', 'treatments.treat_id = recommendme_search.treat_id')

                ->where($search)

                ->order_by('recommendme_search.count', 'desc')

                ->limit(2)

                ->get()

                ->result_array();

            //  print_r($data);

            ?>

            <?php foreach ($data as $x) : ?>

                <a href="<?php echo site_url('userProfile_Controller/recommendMe?t=' . $x['treat_id'] . '&b=' . $x['budget']) ?>"><span class="badge badge-pill badge-secondary"><?php echo $x['treat_name'] ?></span></a>

                <!-- <a href="">Past Searches</a> -->

            <?php endforeach; ?>

 

            <a href=""><span class="badge badge-pill badge-secondary">Cancer</span></a>

            <!-- <a href=""><span class="badge badge-pill badge-secondary">dental</span></a> -->

            <!-- <a href=""><span class="badge badge-pill badge-secondary">Apollo</span></a> -->

            <!-- <a href=""><span class="badge badge-pill badge-secondary">gingivitis</span></a> -->

            <!-- <a href=""><span class="badge badge-pill badge-secondary">hypothermia</span></a> -->

        </div>

        <div id="" class="pl-1 mb-3">

            <?php if ($this->uri->segment(2) != 'viewOffers') : ?>

                <a href="<?php echo site_url('userProfile_Controller/viewOffers'); ?>">

                    <h5 class="sidebar-header">Offers</h5>

                </a>

                <p>

                    <?php $Leftoffer = $this->db->select('hospital_offers.*,hospital_details.hos_name')

                        ->from('hospital_offers')

                        ->join('hospital_details', 'hospital_details.hos_id = hospital_offers.hos_id')

                        ->where('hospital_offers.status !=', '0')

                        ->get()

                        ->result_array();

                    shuffle($Leftoffer);

                    //    print_R($offers);

                    
                    for ($i = 0; $i < 3; $i++) : ?>

                        <?php if (!isset($Leftoffer[$i])) : ?>

                            <?php break; ?>

                        <?php else : ?>
                            <!-- <?php echo site_url('appointment_Controller/offerBooking/' . $Leftoffer[$i]['coupon_code']) ?> -->
                            
                            <a href="<?php echo site_url('userProfile_Controller/viewOffers'); ?>"><span class="text-danger font-weight-bold"><?php echo $Leftoffer[$i]['discount'] . '% OFF-' . $Leftoffer[$i]['hos_name'] . '</span>&nbsp;' . $Leftoffer[$i]['coupon_title']; ?></a><br>

                        <?php endif; ?>
                    <?php endfor; ?>

                </p>

            <?php endif; ?>

        </div>

    </div>

    <div class="left-bar-mob col-8">

        <button class="btn btn-danger toggle-left-bar"><i class="fas fa-bars"></i></button>

        <ul>

            <li><a href="<?php echo site_url('userProfile_Controller/recommendMe') ?>">Recommend Me</a></li>

            <li><a href="<?php echo site_url('userProfile_Controller/compare') ?>">Compare</a></li>

            <li><a href="<?php echo site_url('userProfile_Controller/userconsult') ?>">Consults</a></li>

            <li><a href="#">Articles</a></li>

            <li><a href="#">Most Searched</a></li>

            <li><a href="<?php echo site_url('userProfile_Controller/viewOffers'); ?>">Offers</a></li>

        </ul>

    </div>

    <div class="wrapper" id="chat_window" style="display: none;">

        <div class="title">AAHRS Chatbot<span id="chat_close" class="mr-2" style="cursor: pointer; float: right;"><i class="fas fa-times"></i></span></div>

        <div class="form">

            <div class="bot-inbox inbox">

                <!-- <div class="icon">

                  <i class="fas fa-robot"></i>

              </div>

              <div class="msg-header">

                  <p>Hello there, how can I help you?</p>

              </div> -->

                <div class="container actions bot-actions">

                    <div class="options badge option-support">

                        <h3>Support</h3>

                    </div><br>

                    <div class="options badge option-faqs">

                        <h3>FAQs</h3>

                    </div><br>

                    <div class="options badge option-report">

                        <h3>Report</h3>

                    </div><br>

                    <div class="options badge option-contact">

                        <h3>Contact Me</h3>

                    </div><br>

                </div>

                <div class="container actions Contact-actions" style="display:none;">

                    <form class="contact_me">

                        <h4>Please provide us the following details</h4>

                        <div class="form-group">

                            <label for="contact-name">Full Name</label>

                            <input type="text" class="form-control" name="contact-name" id="contact-name" required>

                        </div>

                        <div class="form-group">

                            <label for="contact-email">Email ID</label>

                            <input type="text" class="form-control" name="contact-email" id="contact-email" required>

                        </div>

                        <div class="form-group">

                            <label for="contact-phno">Contact No.</label>

                            <input type="text" class="form-control" name="contact-phno" id="contact-phno" required>

                        </div>

                        <div class="form-group mx-auto">

                            <center><button type="submit" class="btn">Contact Me</button></center>

                        </div>

                    </form>

                </div>

                <div class="container actions Report-actions" style="display:none;">

                    <form class="report_issue">

                        <h4>Please provide us the following details</h4>

                        <div class="form-group">

                            <label for="report_name">Full Name</label>

                            <input type="text" class="form-control" name="report_name" id="report_name" required>

                        </div>

                        <div class="form-group">

                            <label for="report_email">Email ID</label>

                            <input type="text" class="form-control" name="report_email" id="report_email" required>

                        </div>

                        <div class="form-group">

                            <label for="report_phno">Phone no.</label>

                            <input type="text" class="form-control" name="report_phno" id="report_phno" required>

                        </div>

                        <div class="form-group">

                            <label for="report_message">Report Message</label>

                            <textarea class="form-control" name="report_message" id="report_message" required></textarea>

                        </div>

                        <div class="form-group mx-auto">

                            <center><button type="submit" class="btn">Submit</button></center>

                        </div>

                    </form>

                </div>

                <div class="container actions Support-actions" style="display:none;">

                    <div class="options badge" data-value="chat">

                        <h3>Chat with Bot</h3>

                    </div><br>

                </div>

                <div class="container actions FAQs-actions" style="display:none;">

                    <?php $q = $this->db->get('faqs')->result_array();

                    foreach ($q as $x) : ?>

                        <span class="options badge faq_ques" data-value="<?php echo $x['answer'] ?>"><?php echo $x['question'] ?></span>

                    <?php endforeach; ?>


                </div>

            </div>

        </div>

        <div class="typing-field">

            <div class="input-data">

                <div id="chatbot_queries">

                    <input style="display: none;" id="data" type="text" placeholder="Type something here.." required>

                    <button style="display: none;" id="send-btn">Send</button>

                </div>

                <div id="trigger_actions">

                    <span class="badge p-3"><i class="fas fa-headset fa-lg"></i> Actions</span>

                </div>

            </div>

            <i id="chatbot_close_text" style="display: none;" class="far fa-times-circle"></i>

        </div>

    </div>

    <button id="show_chat_window"><i class="fas fa-comment-dots fa-2x"></i></button>

    <script>
        //   chatbot

        $('#chatbot_close_text').click(function() {

            $('#trigger_actions').show();

            $('#data').hide();

            $('#send-btn').hide();

            $('#chatbot_close_text').hide();

        })

        $('.queries').click(function() {

            var x = $(this).html();

            $('#data').val(x);

            $('#send-btn').click();

        })

        $('#trigger_actions').click(function() {

            if ($('.bot-actions').is(':visible')) {

                $('.bot-actions').siblings().hide();

                $('.bot-actions').hide();

            } else {

                $('.bot-actions').siblings().hide();

                $('.bot-actions').show();

            }

        });

        $('.option-contact').click(function() {

            $('.bot-actions').hide();

            $('.Contact-actions').show();

        });

        $('.option-report').click(function() {

            $('.bot-actions').hide();

            $('.Report-actions').show();

        });

        $('.option-support').click(function() {

            $('.bot-actions').hide();

            $('.Support-actions').show();

        });

        $('.option-faqs').click(function() {

            $('.bot-actions').hide();

            $('.FAQs-actions').show();

        });

        $('#chatbot_others').click(function() {

            $('#chatbot_queries').hide();

            $('#data').show();

            $('#send-btn').show();

            $('#chatbot_close_text').show();

        })

        $('#show_chat_window').click(function() {

            $('#chat_window').show();

            $('#show_chat_window').hide();

        })

        $('#chat_close').click(function() {

            $('#chat_window').hide();

            $('#show_chat_window').show();

            $('#chatbot_queries').show();

            $('.bot-actions').show();

            $('#data').hide();

            $('#send-btn').hide();

        })


        $(document).ready(function() {

            $("#send-btn").on("click", function() {

                $value = $("#data").val();

                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value +

                    '</p></div></div>';

                $(".form").append($msg);

                $("#data").val('');



                // start ajax code

                $.ajax({

                    url: '<?php echo site_url('ChatBot_Controller/message') ?>',

                    type: 'POST',

                    data: 'text=' + $value,

                    success: function(result) {

                        $replay =

                            '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-robot"></i></div><div class="msg-header"><p>' +

                            result + '</p></div></div>';

                        $(".form").append($replay);

                        // when chat goes down the scroll bar automatically comes to the bottom

                        $(".form").scrollTop($(".form")[0].scrollHeight);

                    }

                });

            });

            $('.report_issue').submit(function(e) {

                e.preventDefault();

                //   console.log($(this).serialize());

                var reportData = $(this).serialize();

                $.ajax({

                    type: 'post',

                    url: '<?php echo site_url('userProfile_Controller/user_report') ?>',

                    data: reportData,

                    success: function(res) {

                        console.log(res);

                        if (res == 'done') {

                            $('.Report-actions').hide();

                            $msg =

                                '<div class="user-inbox inbox"><div class="msg-header"><p>Your report has been successfully received!!</p></div></div>';

                            $(".form").append($msg);

                        }

                    }

                });

            });

            $('.contact_me').submit(function(e) {

                e.preventDefault();

                //   console.log($(this).serialize());

                var contactData = $(this).serialize();

                $.ajax({

                    type: 'post',

                    url: '<?php echo site_url('userProfile_Controller/user_contact') ?>',

                    data: contactData,

                    success: function(res) {

                        console.log(res);

                        if (res == 'done') {

                            $('.Contact-actions').hide();

                            $msg =

                                '<div class="user-inbox inbox"><div class="msg-header"><p>Your details has been successfully received!! You will be contacted by our representative shortly</p></div></div>';

                            $(".form").append($msg);

                        }

                    }

                });

            });

            $('.faq_ques').click(function() {

                $('.FAQs-actions').hide();

                var ques = $(this).html();

                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + ques + '</p></div></div>';

                $(".form").append($msg);

                var ans = $(this).attr('data-value');

                $replay =

                    '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-robot"></i></div><div class="msg-header"><p>' +

                    ans + '</p></div></div>';

                $(".form").append($replay);

                //   console.log(ans);

            });

            var navflag = 0;

            $('.toggle-left-bar').click(function() {

                if (navflag == 0) {

                    $(this).siblings().show();

                    $(this).html('<i class="fas fa-times"></i>');

                    navflag = 1;

                } else {

                    $(this).siblings().hide();

                    $(this).html('<i class="fas fa-bars"></i>');

                    navflag = 0;

                }



            });



        });
    </script>

    <style>
        #mySidenav a {

            position: fixed;

            right: 0%;

            transition: 0.3s;

            padding: 20px;

            height: 300px;

            width: 50px;

            text-decoration: none;

            font-size: 20px;

            color: white;

            border-radius: 0 5px 5px 0;
            top: 90px;
            background: #d21818;

        }

        .sidebar-header {
            color: #d21818 !important;
            text-decoration: underline;
        }

        .sidebar-header:hover {
            transform: translateX(8px);
            transition: all 0.5s linear;
        }

        #chat_window {
            z-index: 109 !important;
        }

        #show_chat_window {
            position: fixed;
            bottom: 50px;
            right: 30px;
            z-index: 100;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #d21818 !important;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
        }


        .wrapper {
            border: none !important;
        }




        .bot-actions1 {
            border: 1px ridge #d21818;
            border-radius: 10px;
            position: absolute;
            bottom: 5%;
            height: max-content;
            width: 90%;
        }

        .wrapper .title {
            background: #6c757d !important;
        }

        .wrapper1 .title {
            background: #6c757d;
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            line-height: 60px;
            text-align: center;
            border-bottom: 1px solid #0879c9;
            border-radius: 5px 5px 0 0;
        }



        .options {
            background: #d21818 !important;
        }

        #trigger_actions {
            border: 1px ridge #d21818;
            color: #d21818;
        }

        .bot-actions {
            border: 1px ridge #d21818 !important;
        }

        .bot-actions:before {
            border-top: 20px solid #d21818 !important;
        }

        #trigger_actions:hover {
            background-color: #d21818 !important;
            color: #fff;
        }

        .badge-secondary {
            color: #fff;
            background-color: #6c757d;
            padding: 10px !important;
            margin: 5px 0px;
        }



        .modal-footer {
            padding: 1rem 1rem;
        }



        .emBtn {

            display: none;

            position: fixed;

            right: 5%;

            bottom: 15%;

            transition: 0.3s;

            /* padding: 20px; */

            /* height: 300px; */

            /* border: 1px ridge red; */

            width: 50px;

            text-decoration: none;

            border-radius: 0 5px 5px 0;

            z-index: 99;

        }



        @media only screen and (max-width: 991.98px) {

            #mySidenav a {

                display: none;

            }

            .left-bar-mob {
                display: block;
                position: fixed;
                top: 10%;
                z-index: 99;
                right: 0px;
                left: auto;
            }





            .emBtn {

                display: block;
                bottom: 17% !important;

            }

            #show_chat_window {
                bottom: 60px !important;
                right: 10px !important;
                font-size: 12px;

            }


            .wrapper {
                width: 330px;
                bottom: 66px;
                right: 22px;
            }

            .wrapper .form {
                padding: 20px 15px;
                min-height: 300px;
                max-height: 400px;
                overflow-y: auto;
            }

            .bot-actions {
                bottom: 20% !important;
            }

            .options h3 {
                font-size: 1rem;
            }

            .toggle-left-bar {
                margin: 0%;
                position: fixed;
                left: auto;
                right: 10px;
                top: 3%;
                background: none;
                border: none;
                box-shadow: inherit;
            }

            .btn-danger.focus,
            .btn-danger:focus {
                box-shadow: inherit !important;
                background: none !important;
            }

        }

        



        #about {

            top: 90px;

            background-color: #d21818;

        }

        #about1 {

            bottom: 120px;
            height: 220px !important;
            background-color: #d21818;

        }


        
    </style>

    <div id="mySidenav" class="sidenav wrapper" data-toggle="modal" data-target="#emergencyModal">

        <div style="margin-right:80px;">

           

        </div>

    </div>

    <div class="emBtn">

        <a data-toggle="modal" data-target="#emergencyModal" class="btn"><img src="<?php echo base_url('images/em-icon.png') ?>" style="height:50px;width:50px;" alt=""></a>

    </div>

    <form method="post" action="<?php echo site_url('emergency_controller/emergency') ?>">

        <div class="modal fade" id="emergencyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Contact us now!</h5>

                        <button type="button" class="close" style="outline:none!important;" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label>Paitent Name</label>

                            <input type="text" class="form-control" placeholder="Enter Name" name="pname" required>

                        </div>

                        <div class="form-group">

                            <label>Paitent age</label>

                            <input type="text" class="form-control" placeholder="Enter Age" name="page" required>

                        </div>

                        <div class="form-group">

                            <label>Phone number</label>

                            <input type="number" class="form-control" placeholder="Enter Phone number" name="pnum" required>

                        </div>

                        <div class=form-group>

                            <label>Adress</label>

                            <input type="text" class="form-control" placeholder="Enter adress" name="padd" required>

                        </div>

                        <div class="form-check">

                            <input type="checkbox" class="form-check-input" id="exampleCheck1">

                            <label class="form-check-label" for="exampleCheck1">I agree to the terms and

                                conditions*</label>

                        </div>

                        <button type="submit" name="reqamb" class="btn btn-danger" style="margin-top:15px;">Request for ambulence</button>



                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                    </div>

    </form>

    </div>




    </div>

    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 130,
            duration: 1000,
        });
    </script>

</body>

</html>