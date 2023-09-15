<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url('css/cssUser/style.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/cssUser/') ?>dist/css/pignose.calendar.min.css" />
  <title>AAHRS | Book Appointment</title>
  <style>
    /*.show{
      padding-right: 0px !important;
    }*/

    .modal-lg{
      max-width: 70% !important;
    }

    .card {
      box-shadow: 10px 10px 8px #888888;
      transition: 0.3s ease-in-out;
      cursor: pointer;
    }

    .card:hover {
      transform: scale(1.02);
    }

    .ul {
      width: 100%;
    }

    .li {
      width: calc(100%/3);
    }

    .slots {
      margin-top: 20px;
      padding-left: 20px;
      padding-right: 20px;
    }

    .slots input[type="radio"] {
      opacity: 0;
      position: fixed;
      width: 0;
    }

    .slots label {
      align-items: center;
      display: inline-block;
      background-color: white;
      padding: 10px 10px;
      color: #c20a2b;
      margin-right: 10px;
      font-family: sans-serif, Arial;
      font-size: 16px;
      border: 2px solid #c20a2b;
      border-radius: 4px;
    }
    .slots label:hover {
      background-color: #c20a2b;
      color: white;
    }

    .slots input[type="radio"]:focus+label {
      border: 2px solid #c20a2b;
    }

    .slots input[type="radio"]:checked+label {
      background-color: #c20a2b;
      border-color: #c20a2b;
      color: white;
    }

    .shifts {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
    }

    .package-card.active {
      outline: none;
      border-color: #9ecaed;
      box-shadow: 0 0 10px #9ecaed;
    }
  </style>

</head>
<body class="bg-body">
  <?php include('navbar.php'); ?>
  <div class="container mt-2">
    <div class="row">
      <!-- left Bar -->
      <?php include('left-sidebar.php'); ?>
      <!-- Doctors -->
      <div class="col-12 col-sm-12 col-md-10 col-lg-10">
        <?php if (isset($doctors) && ($doctors !== '')) : ?>
          <?php if (isset($doctors[0]['coupon_id'])) : ?>
            <h4>Offers In <?php echo $doctors[0]['hos_name'] ?> Hospital</h4>
          <?php else : ?>
            <h4>Select The Best Doctors In <?php echo $hos_name[0]['hos_name'] ?> Hospital</h4>
          <?php endif; ?>
          <div class="row pt-2">        
            <?php foreach ($doctors as $x) :
            ?>
              <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card p-2 <?php echo $x['doc_id'] . '-card'; ?> card-body">
                  <div class="row">
                    <img src="<?php echo $x['picture'] ?>" class="img-thumbnail float-left rounded-square ml-3" style="height:100px;width:90px; border:none;" alt="">
                    <span class="badge badge-primary position-absolute ml-4 p-1" style="border-radius:50px; margin-top:102px; font-size:8px;"><i class="fas fa-thumbs-up"></i> 100% OnTime</span>
                    <div class="col-6 m-0 p-1">
                      <h5 style="font-size:18px;"><a href="<?php echo site_url('mainController/viewDoctor/' . $x['doc_id']) ?>" class="text-info">Dr. <?php echo $x['doc_name'] ?></a> <span class="badge p-1 badge-success position-absolute ml-1 mt-1 text-white font-weight-bold" style="border-radius: 50px; font-size: 8px;"><i class="fas fa-check-circle text-white"></i> verified</span></h5>
                      <p class="m-0 p-0" style="font-size:12px;"><?php echo $x['department'] ?> <small style="" class="text-muted">over 12 years of experience</small></p>
                      <p class="text-muted m-0 mt-1 p-0" style="font-size:12px;">Appointment Duration: <strong><?php echo $x['consult_duration'] ?> mins</strong></p>

                      <p class="text-muted m-0 mt-1 p-0" style="font-size:12px;">Appointment Fee: <?php if (!isset($doctors[0]['coupon_id'])) : ?><strong><i class="fas fa-rupee-sign"></i> <?php echo round($x['consult_fee']) ?>/-</strong><?php else : ?>&nbsp;&nbsp;<span style="text-decoration: line-through;"><i class="fas fa-rupee-sign"></i><?php echo round($x['consult_fee']) ?></span>&nbsp;&nbsp;<strong><i class="fas fa-rupee-sign"></i><?php echo round($x['consult_fee'] - (($x['consult_fee'] / 100) * $x['discount'])) ?></strong>&nbsp;<span class="badge badge-success">Coupon Applied</span><?php endif; ?></p>
                    </div>

                    <div class="col-3 mt-3 pr-3 row justify-content-center">
                      <h6 class="text-danger p-0 m-0" style="font-size:14px;"><?php echo $x['total_rate'] ?> Reviews</h6>
                      <p class="p-0 m-0" style="font-size:13px;"><?php echo round($x['star_rating'], 1) ?> out of 5</p>
                      <div id="rateYo<?php echo $x['doc_id'] ?>" class="m-0 p-0"></div>
                      <a href="" style="font-size:15px;" class="btn btn-danger member mt-5 p-1" data-toggle="modal" data-target="#modal<?php echo $x['doc_id'] ?>">Book Appointment</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <?php foreach ($doctors as $x) :
  ?>

    <div class="modal fade" id="modal<?php echo $x['doc_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal<?php echo $x['doc_id']  ?>" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title pl-3 text-danger" id="exampleModalLongTitle">Doctor's Appointment</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="<?php echo site_url('appointment_Controller/bookAppt') ?>" method="post">

            <div class="page1">
              <div class="modal-body">
                <div id="input" class="row">
                  <?php
                  $datestring = '%Y-%m-%d';
                  $min = '%Y-%m-%d';

                  $curtime = time();

                  // echo mdate($datestring, $time)

                  ?>
                  <div class="col-10 col-sm-10 col-md-8 col-lg-8">
                    <div class="form-group">
                      <img src="<?php echo $x['picture'] ?>" style="height:120px;width:120px; border-radius:100%;" class="float-left mr-4 img-thumbnail rounded-square" alt="">
                      <input type="hidden" name="pt_name" value="<?php echo $userData[0]['name'] ?>">
                      <p class="pt-2"><strong>Doctor Name</strong> : <?php echo $x['doc_name'] ?>
                        <br><strong>Email</strong> : <?php echo $x['email_id'] ?>
                        <br><strong>Department</strong> : <?php echo $x['department'] ?>
                        <br><strong>Appointment Fee</strong> : <?php if (!isset($doctors[0]['coupon_id'])) : ?><strong><i class="fas fa-rupee-sign"></i> <?php echo round($x['consult_fee']) ?>/-</strong><?php else : ?>&nbsp;&nbsp;<span style="text-decoration: line-through;"><i class="fas fa-rupee-sign"></i><?php echo round($x['consult_fee']) ?></span>&nbsp;&nbsp;<strong><i class="fas fa-rupee-sign"></i><?php echo round($x['consult_fee'] - (($x['consult_fee'] / 100) * $x['discount'])) ?>/-</strong>&nbsp;<span class="badge badge-success">Coupon Applied</span><?php endif; ?>
                      </p>
                      <input type="hidden" name="uid" id="uid" value="<?php echo $userData[0]['email_id'] ?>">
                      <input type="hidden" name="doc_id" id="doc_id" value="<?php echo $x['doc_id'] ?>">
                   <?php if(isset($x['discount'])):?>
                    <input type="hidden" name="consult_fee" value="<?php echo round($x['consult_fee'] - (($x['consult_fee'] / 100) * $x['discount'])) ?>">
                    <?php else:?>
                      <input type="hidden" name="consult_fee" value="<?php echo $x['consult_fee'] ?>">
                      <?php endif;?>
                    </div>
                  </div>

                  <div class=" row pr-2 mt-5" style="padding:0px 30px;">
                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 pr-0">
                      <p class="text-muted ml-1">Appointment&nbsp;For&nbsp;<span class="text-danger">*</span></p>
                    </div>
                    <div class="col-8 col-sm-8 col-md-9 col-lg-9 pr-0">
                      <select name="apt_for" id="apt_for" class="form-control col-6">
                        <option value="me" selected>Me</option>
                        <option value="others">Others</option>
                      </select>
                    </div>
                    <br/>

                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 hidden pr-0 mt-4" style="display: none;">
                      <p class="text-muted">Patient Name&nbsp;<span class="text-danger">*</span></p>
                    </div>
                    <div class="col-8 col-sm-8 col-md-9 col-lg-9 mt-4 mb-4 hidden" style="display: none;"><input type="text" name="pt_name1" class="form-control col-6" />
                      <!-- <button id="otp" class="btn btn-danger float-left mt-2 mb-2">Get OTP</button> -->
                    </div>
                    <br>
                    <br>

                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 pr-0">
                    <p class="text-muted">Patient Phone&nbsp;<span class="text-danger">*</span></p>
                      <p class="text-muted mt-5">Appointment&nbsp;Date&nbsp;<span class="text-danger">*</span></p>                    
                    </div>

                    <div class="col-8 col-sm-8 col-md-9 col-lg-9 pr-0">
                    <input type="text" class="form-control w-50" name='phone' required />
                    <br>

                      <input type="text" name="date" class="input-calendar<?php echo $x['doc_id'] ?> form-control col-6" id="calendar<?php echo $x['doc_id'] ?>" required />
                    </div>
                    <br>

                    <div id="slots<?php echo $x['doc_id'] ?>" class="slots row justify-content-center">
                      <!-- <p class="shifts text-muted col-4 col-sm-4 col-md-3 col-lg-3"><i class="fas fa fa-lg"></i> Availbale&nbsp;Slots<span class="text-danger">&nbsp;*</span></p> -->
                     
                    
                      <div class="col-8 col-sm-8 col-md-9 col-lg-9 pr-0">
                      </div>
                     
                      <p class="validate_msg"></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="page2" style="display:none;">
              <div class="row">
                <div class="col-12 col-sm-12 col-md-6 dol-lg-6">
                  <img src="<?php echo $x['picture'] ?>" style="height:130px;width:120px;" class="float-left mr-4 img-thumbnail rounded-square" alt="">
                  <p class="pt-3"><strong>Doctor Name</strong>: <?php echo $x['doc_name'] ?>
                    <br><strong>Hospital Name</strong>: <?php echo $x['hos_name'] ?>
                    <br><strong>Doctor Email ID</strong>: <?php echo $x['email_id'] ?>
                    <br><strong>Doctor Specialization</strong>: <?php echo $x['dept_name'] ?>
                    <br><strong>Doctor Appointment Fee</strong>:<?php if (!isset($doctors[0]['coupon_id'])) : ?><strong><i class="fas fa-rupee-sign"></i> <?php echo round($x['consult_fee']) ?>/-</strong><?php else : ?>&nbsp;&nbsp;<span style="text-decoration: line-through;"><i class="fas fa-rupee-sign"></i><?php echo round($x['consult_fee']) ?></span>&nbsp;&nbsp;<strong><i class="fas fa-rupee-sign"></i><?php echo round($x['consult_fee'] - (($x['consult_fee'] / 100) * $x['discount'])) ?>/-</strong>&nbsp;<span class="badge badge-success">Coupon Applied</span><?php endif; ?>
                  </p>

                  <h4 class="p-2 text-center">Appointment Booking Details</h4>
                  <p class="p-3">
                    <strong>Pateint Name</strong>:<br>
                    <strong>Slot time</strong>: <span class="slot_time"></span><br>
                  </p>
                </div>
                <div class="col-12 col-sm-12 col-md-6 dol-lg-6 border-left">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Book Now</button>
            </div>
        </div>
        </form>
      </div>
    </div>
    </div>
  <?php endforeach;
  ?>



<?php else : ?>
  <?php echo "<label style='color:#88888'>No Doctor Schedule</label>" ?>
<?php endif; ?>
<script>
  var myDiv = $('.wwdtext');
  myDiv.text(myDiv.text().substring(0, 200));
  $(function() {
    <?php foreach ($doctors as $x) : ?>
      $("#rateYo<?php echo $x['doc_id'] ?>").rateYo({
        rating: <?php echo round($x['star_rating'], 1) ?>,
        readOnly: true,
        starWidth: "15px",
        spacing: "3px"
      });
    <?php endforeach; ?>
  });
</script>

<script>
  $(document).ready(function() {
    <?php foreach ($doctors as $x) : ?>
      $("#calendar<?php echo $x['doc_id'] ?>").on('change', function() {
        var date = $(this).val();
        var doc_id = '<?php echo $x['doc_id'] ?>';
        console.log(date);
        $.ajax({
          url: '<?php echo site_url('appointment_Controller/fetchSlot') ?>',
          method: 'POST',
          data: {
            date: date,
            doc_id: doc_id,
          },
          success: function(response) {
            console.log(response);
            $("#slots<?php echo $x['doc_id'] ?>").html(response);
          }
        });
      });
    <?php endforeach; ?>
  });

  $('.package-card').click(function() {
    $(this).find('input[type=radio]').prop('checked', true);
    $('.package-card').removeClass('active');
    $(this).addClass('active');
    console.log($('.package-card').find('input[type=radio]:checked').val());

  });
  function nextpage() {
    if ($('.page1').is(':visible') && $(".slots input[type=radio]:checked").val()) {
      $('.page1').hide();
      $('.page2').show();
      $('.slot_time').html($(".slots input[type=radio]:checked").val());
      // console.log($(".slots input[type=radio]:checked").val());
    } else {
      $('.validate_msg').html('Please select a slot!!');
    }
  }
  function prevpage() {
    if ($('.page2').is(':visible')) {
      $('.page2').hide();
      $('.page1').show();
      // console.log($(".slots input[type=radio]:checked").val());
    }
  }
</script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>



<script type="text/javascript">
  //<![CDATA[

  $(function() {

    $('#wrapper .version strong').text('v' + $.fn.pignoseCalendar.version);
    function onSelectHandler(date, context) {
      /**
       * @date is an array which be included dates(clicked date at first index)
       * @context is an object which stored calendar interal data.
       * @context.calendar is a root element reference.
       * @context.calendar is a calendar element reference.
       * @context.storage.activeDates is all toggled data, If you use toggle type calendar.
       * @context.storage.events is all events associated to this date
       */
      var $element = context.element;
      var $calendar = context.calendar;
      var $box = $element.siblings('.box').show();
      var text = 'You selected date ';
      if (date[0] !== null) {
        text += date[0].format('YYYY-MM-DD');
      }
      if (date[0] !== null && date[1] !== null) {
        text += ' ~ ';
      } else if (date[0] === null && date[1] == null) {
        text += 'nothing';
      }



      if (date[1] !== null) {

        text += date[1].format('YYYY-MM-DD');

      }



      $box.text(text);

    }



    function onApplyHandler(date, context) {

      /**

       * @date is an array which be included dates(clicked date at first index)
       * @context is an object which stored calendar interal data.
       * @context.calendar is a root element reference.
       * @context.calendar is a calendar element reference.
       * @context.storage.activeDates is all toggled data, If you use toggle type calendar.
       * @context.storage.events is all events associated to this date
       */

      var $element = context.element;
      var $calendar = context.calendar;
      var $box = $element.siblings('.box').show();
      var text = 'You applied date ';



      if (date[0] !== null) {
        text += date[0].format('YYYY-MM-DD');
      }



      if (date[0] !== null && date[1] !== null) {
        text += ' ~ ';
      } else if (date[0] === null && date[1] == null) {
        text += 'nothing';
      }



      if (date[1] !== null) {
        text += date[1].format('YYYY-MM-DD');
      }
      $box.text(text);
    }



    // Default Calendar

    $('.calendar').pignoseCalendar({
      select: onSelectHandler
    });



    // Input Calendar

    <?php $weekdays = [0 => 'Sun', 1 => 'Mon', 2 => 'Tue', 3 => 'Wed', 4 => 'Thur', 5 => 'Fri', 6 => 'Sat'];
    foreach ($doctors as $x) :
      $onDays = explode(',', $x['weekdays']);
      $disabDays = array();
      foreach ($weekdays as $a => $b) {
        if (!in_array($b, $onDays)) {
          array_push($disabDays, $a);
        }
      } ?>

      $('.input-calendar<?php echo $x['doc_id'] ?>').pignoseCalendar({
        minDate: moment('<?php echo mdate($datestring, $curtime) ?>'),
        apply: onApplyHandler,
        disabledWeekdays: <?php echo '[' . implode(', ', $disabDays) . ']' ?>,
        buttons: true, // It means you can give bottom button controller to the modal which be opened when you click.
      });

    <?php endforeach; ?>

    // Calendar modal

    var $btn = $('.btn-calendar').pignoseCalendar({
      apply: onApplyHandler,
      modal: true, // It means modal will be showed when you click the target button.
      buttons: true
    });



    // Color theme type Calendar

    $('.calendar-dark').pignoseCalendar({
      theme: 'dark', // light, dark, blue
      select: onSelectHandler
    });



    // Blue theme type Calendar

    $('.calendar-blue').pignoseCalendar({
      theme: 'blue', // light, dark, blue
      select: onSelectHandler
    });



    // Schedule Calendar

    $('.calendar-schedules').pignoseCalendar({
      scheduleOptions: {
        colors: {
          holiday: '#2fabb7',
          seminar: '#5c6270',
          meetup: '#ef8080'
        }

      },

      schedules: [{
        name: 'holiday',
        date: '2017-08-08'
      }, {
        name: 'holiday',
        date: '2017-09-16'
      }, {
        name: 'holiday',
        date: '2017-10-01',
      }, {
        name: 'holiday',
        date: '2017-10-05'
      }, {
        name: 'holiday',
        date: '2017-10-18',
      }, {
        name: 'seminar',
        date: '2017-11-14'
      }, {
        name: 'seminar',
        date: '2017-12-01',
      }, {
        name: 'meetup',
        date: '2018-01-16'
      }, {
        name: 'meetup',
        date: '2018-02-01',
      }, {
        name: 'meetup',
        date: '2018-02-18'
      }, {
        name: 'meetup',
        date: '2018-03-04',
      }, {
        name: 'meetup',
        date: '2018-04-01'
      }, {
        name: 'meetup',
        date: '2018-04-19',
      }],

      select:function(date, context) {

        var message=`You selected ${(date[0] === null ? 'null' : date[0].format('YYYY-MM-DD'))}.
							   <br/>
							   <br/>
							   <strong>Events for this date</strong>
							   <br/> 
							   <br/>
							   <div class="schedules-date"></div>`;

        var $target = context.calendar.parent().next().show().html(message);



        for (var idx in context.storage.schedules) {
          var schedule = context.storage.schedules[idx];
          if (typeof schedule !== 'object') {
            continue;
          }
          $target.find('.schedules-date').append('<span class="ui label default">' + schedule.name + '</span>');
        }
      }
    });



    // Multiple picker type Calendar

    $('.multi-select-calendar').pignoseCalendar({
      multiple: true,
      select: onSelectHandler
    });



    // Toggle type Calendar

    $('.toggle-calendar').pignoseCalendar({
      toggle: true,
      select: function(date, context) {
        var message = `You selected ${(date[0] === null ? 'null' : date[0].format('YYYY-MM-DD'))}.
                                <br />
                                <br />  <strong>Events for this date</strong>
                                <br />  
                                <br />   <div class="active-dates"></div>`;
        var $target = context.calendar.parent().next().show().html(message);



        for (var idx in context.storage.activeDates) {
          var date = context.storage.activeDates[idx];
          if (typeof date !== '<span class="ui label"><i class="fas fa-code"></i>string</span>') {
            continue;
          }

          $target.find('.active-dates').append('<span class="ui label default">' + date + '</span>');
        }
      }
    });



    //Disabled date settings.
    
    (function() {
      // IIFE Closure
      var times = 30;
      var disabledDates = [];
      for (var i = 0; i < times; /* Do not increase index */ ) {
        var year = moment().year();
        var month = 0;
        var day = parseInt(Math.random() * 364 + 1);
        var date = moment().year(year).month(month).date(day).format('YYYY-MM-DD');

        if ($.inArray(date, disabledDates) === -1) {
          disabledDates.push(date);
          i++;
        }
      }



      disabledDates.sort();
      var $dates = $('.disabled-dates-calendar').siblings('.guide').find('.guide-dates');
      for (var idx in disabledDates) {
        $dates.append('<span>' + disabledDates[idx] + '</span>');
      }



      $('.disabled-dates-calendar').pignoseCalendar({
        select: onSelectHandler,
        disabledDates: disabledDates
      });
    }());



    // Disabled Weekdays Calendar.
    $('.disabled-weekdays-calendar').pignoseCalendar({
      select: onSelectHandler,
      disabledWeekdays: [0, 6]
    });



    // Disabled Range Calendar.

    var minDate = moment().set('dates', Math.min(moment().day(), 2 + 1)).format('YYYY-MM-DD');
    var maxDate = moment().set('dates', Math.max(moment().day(), 24 + 1)).format('YYYY-MM-DD');
    $('.disabled-range-calendar').pignoseCalendar({
      select: onSelectHandler,
      minDate: minDate,
      maxDate: maxDate
    });



    // Multiple Week Select

    $('.pick-weeks-calendar').pignoseCalendar({
      pickWeeks: true,
      multiple: true,
      select: onSelectHandler
    });



    // Disabled Ranges Calendar.

    $('.disabled-ranges-calendar').pignoseCalendar({
      select: onSelectHandler,

      disabledRanges: [
        ['2016-10-05', '2016-10-21'],
        ['2016-11-01', '2016-11-07'],
        ['2016-11-19', '2016-11-21'],
        ['2016-12-05', '2016-12-08'],
        ['2016-12-17', '2016-12-18'],
        ['2016-12-29', '2016-12-30'],
        ['2017-01-10', '2017-01-20'],
        ['2017-02-10', '2017-04-11'],
        ['2017-07-04', '2017-07-09'],
        ['2017-12-01', '2017-12-25'],
        ['2018-02-10', '2018-02-26'],
        ['2018-05-10', '2018-09-17'],
      ]
    });



    // I18N Calendar
    $('.language-calendar').each(function() {
      var $this = $(this);
      var lang = $this.data('lang');
      $this.pignoseCalendar({
        lang: lang
      });
    });
    // This use for DEMO page tab component.
    $('.menu .item').tab();
  });

  //]]>



  $('#apt_for').on('change', function() {
    var conceptName = $('#apt_for').find(":selected").text();
    console.log(conceptName);

    if (conceptName == 'Others') {
      $('.hidden').css("display", "block");

    } else {
      $('.hidden').css("display", "none");
      $('.hidden2').css("display", "none");
    }
  });



  $('#otp').on('click', function() {
    $('.hidden2').css("display", "block");});

</script>

<script type="text/javascript" src="<?php echo base_url('css/cssUser/') ?>dist/js/pignose.calendar.full.min.js"></script>

</body>
</html>