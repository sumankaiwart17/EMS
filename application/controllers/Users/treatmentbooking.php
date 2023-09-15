<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/cssUser/') ?>dist/css/pignose.calendar.min.css" />
  <link rel="stylesheet" href="<?php echo base_url('css/cssUser/style.css') ?>">
  <title>AAHRS | Book Treatmentt</title>
  <style>
    .modal-lg {
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
      <!-- treatmentbooking -->
      <div class="col-12 col-sm-12 col-md-10 col-lg-10">
        <?php if (!isset($treatments[0]['coupon_id'])) : ?>
          <h4>Select from the best treatments in <?php echo $hos_name ?> Hospital</h4>
        <?php else : ?>
          <h4><?php echo $treatments[0]['hos_name'] ?> Hospital</h4>
        <?php endif; ?>
        <div class="row pt-2">
          <?php foreach ($treatments as $x) :
          ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              <div class="card p-2 <?php echo $x['treat_id'] . '-card'; ?> card-body">
                <div class="row">
                  <img src="<?php echo base_url('images/' . $x['logo']) ?>" class="img-thumbnail float-left rounded-square ml-3" style="height:110px;width:85px; border:none;" alt="">
                  <div class="col-6 m-0 p-1">
                    <h5 class="text-info" style="font-size:18px;"><?php echo $x['treat_name'] ?> Treatment<span class="badge p-1 badge-success position-absolute ml-1 mt-1 text-white font-weight-bold" style="border-radius: 50px; font-size: 8px;"><i class="fas fa-check-circle text-white"></i> verified</span></h5>
                    <p class="m-0 p-0 text-info" style="font-size:14px;"><?php echo $x['dept_name'] ?> Department</p>
                    <p class="text-muted m-0 mt-1 p-0" style="font-size:12px;">Treatment Duration: <?php echo $x['duration'] ?> Days</p>
                    <p class="text-muted m-0 mt-1 p-0" style="font-size:12px;">Treatment Fee: <?php if (!isset($treatments[0]['coupon_id'])) : ?><strong><i class="fas fa-rupee-sign"></i> <?php echo round($x['budget']) ?>/-</strong><?php else : ?>&nbsp;&nbsp;<span style="text-decoration: line-through;"><i class="fas fa-rupee-sign"></i><?php echo round($x['budget']) ?></span>&nbsp;&nbsp;<strong><i class="fas fa-rupee-sign"></i><?php echo round($x['budget'] - (($x['budget'] / 100) * $x['discount'])) ?></strong>&nbsp;<span class="badge badge-success">Coupon Applied</span><?php endif; ?></p>
                  </div>
                  <div class="col-3 mt-3 pr-3 row justify-content-center">
                    <h6 class="text-danger p-0 m-0" style="font-size:14px;"><?php echo $x['total_rate'] ?> Reviews</h6>
                    <p class="p-0 m-0" style="font-size:13px;"><?php echo round($x['Avg_star_rating'], 1) ?> out of 5</p>
                    <div id="rateYo<?php echo $x['treat_id'] ?>" class="m-0 p-0"></div>
                    <a href="" style="font-size:15px;" class="btn btn-danger member mt-4 p-1" data-toggle="modal" data-target="#modal<?php echo $x['treat_id'] ?>">Book Treatment</a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach;
          ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <?php foreach ($treatments as $x) : ?>
    <div class="modal fade" id="modal<?php echo $x['treat_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal<?php echo $x['treat_id']  ?>" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title pl-3 text-danger" id="exampleModalLongTitle">Treatment Booking</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo site_url('appointment_Controller/booktrtAppt') ?>" method="post">
            <div class="page1">
              <div class="modal-body">
                <div id="input" class="row justify-content-center">
                  <?php
                  $datestring = '%Y-%m-%d';
                  $min = '%Y-%m-%d';
                  $curtime = time();
                  // echo mdate($datestring, $time)
                  ?>
                  <div class="col-10 col-sm-10 col-md-8 col-lg-8">
                    <div class="form-group">
                      <img src="<?php echo base_url('images/' . $x['logo']) ?>" class="img-thumbnail float-left rounded-square mr-4" style="height:120px;width:130px;">
                      <input type="hidden" name="uname" id="uname" value="<?php echo $userData[0]['name'] ?>">
                      <p><strong>Treatment Name</strong>: <?php echo $x['treat_name'] ?>
                        <br><strong>Email ID</strong>: <?php echo $x['hos_email'] ?>
                        <br><strong>Department Name</strong>: <?php echo $x['dept_name'] ?>
                        <br><strong>Appointment Fee</strong>:<?php if (!isset($treatments[0]['coupon_id'])) : ?><strong><i class="fas fa-rupee-sign"></i> <?php echo round($x['budget']) ?>/-</strong><?php else : ?>&nbsp;&nbsp;<span style="text-decoration: line-through;"><i class="fas fa-rupee-sign"></i><?php echo round($x['budget']) ?></span>&nbsp;&nbsp;<strong><i class="fas fa-rupee-sign"></i><?php echo round($x['budget'] - (($x['budget'] / 100) * $x['discount'])) ?>/-</strong>&nbsp;<span class="badge badge-success">Coupon Applied</span><?php endif; ?>
                      </p>
                      <input type="hidden" name="uid" id="uid" value="<?php echo $userData[0]['email_id'] ?>">
                      <input type="hidden" name="treat_id" id="treat_id" value="<?php echo $x['treat_id'] ?>">
                      <input type="hidden" name="hos_id" id="hos_id" value="<?php echo $x['hos_id'] ?>">
                    </div>
                  </div>
                  <div class=" row pr-2 mt-3">
                    <div class="col-4 col-sm-4 col-md-3 col-lg-3">
                      <p class="shifts text-muted">Appointment For&nbsp;<span class="text-danger">*</span></p>
                    </div>
                    <div class="col-8 col-sm-8 col-md-9 col-lg-9">
                      <select name="apt_for" id="apt_for" class="form-control col-6">
                        <option value="me" selected>Me</option>
                        <option value="others">Others</option>
                      </select>
                    </div>
                    <br />
                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 hidden" style="display: none;">
                      <p class="shifts text-muted">Patient Phone&nbsp;<span class="text-danger">*</span></p>
                    </div>
                    <div class="col-8 col-sm-8 col-md-9 col-lg-9 hidden" style="display: none;"><input type="number" name="phone" class="form-control col-6" id="phone" />
                      <button id="otp" class="btn btn-danger float-left mt-2 mb-2">Get OTP</button>
                    </div>
                    <br>
                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 hidden2" style="display: none;">
                      <p class="shifts text-muted">Enter OTP here&nbsp;<span class="text-danger">*</span></p>
                    </div>
                    <div class="col-8 col-sm-8 col-md-9 col-lg-9 hidden2" style="display: none;"><input type="number" name="otpfeild" class="form-control col-6" id="otpfeild" />
                      <button id="" class="btn btn-success float-left mt-2 mb-2">Verify OTP</button>
                    </div>
                    <br>
                    <div class="col-4 col-sm-4 col-md-3 col-lg-3">
                      <p class="shifts text-muted">Appointment Date&nbsp;<span class="text-danger">*</span></p>
                    </div>
                    <div class="col-8 col-sm-8 col-md-9 col-lg-9"><input type="text" name="date" class="input-calendar<?php echo $x['treat_id'] ?> form-control col-6" id="calendar<?php echo $x['treat_id'] ?>" value="<?php echo mdate($datestring, $curtime) ?>"></div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <span class="validate_msg mr-auto text-danger"></span>
                <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="nextpage()" class="btn btn-primary">Proceed&nbsp;&nbsp;<i class="fas fa-arrow-right"></i></button>
              </div>
            </div>
            <div class="page2" style="display:none;">
              <div class="row">
                <div class="col-12 col-sm-12 col-md-6 dol-lg-6">
                  <img src="<?php echo base_url('images/' . $x['logo']) ?>" class="img-thumbnail float-left rounded-square mr-4" style="height:120px;width:130px;">
                  <p class="pt-3"><strong>Treatment Name</strong>: <?php echo $x['treat_name'] ?>
                    <br><strong>Hospital Name</strong>: <?php echo $x['hos_name'] ?>
                    <br><strong>Hospital Email ID</strong>: <?php echo $x['hos_email'] ?>
                    <br><strong>Department</strong>: <?php echo $x['dept_name'] ?>
                    <br><strong>Treatment Fee</strong>:<?php if (!isset($treatments[0]['coupon_id'])) : ?><strong><i class="fas fa-rupee-sign"></i> <?php echo round($x['budget']) ?>/-</strong><?php else : ?>&nbsp;&nbsp;<span style="text-decoration: line-through;"><i class="fas fa-rupee-sign"></i><?php echo round($x['budget']) ?></span>&nbsp;&nbsp;<strong><i class="fas fa-rupee-sign"></i><?php echo round($x['budget'] - (($x['budget'] / 100) * $x['discount'])) ?>/-</strong>&nbsp;<span class="badge badge-success">Coupon Applied</span><?php endif; ?>
                  </p>
                  <hr>
                  <h4 class="p-2 text-center">Treatment Booking Details</h4>
                  <p class="p-3">
                    <strong>Booking Person</strong>: <?php echo $userData[0]['name'] ?><br>
                  </p>
                </div>
                <div class="col-12 col-sm-12 col-md-6 dol-lg-6 border-left">
                  <div class="row pt-2">
                    <div class="col-4 p-0">
                      <div class="card package-card m-1 text-white bg-primary" style="width:85%;">
                        <div class="card-body">
                          <h5 class="text-center">Pay Full Fee now and avail your appointment without any wait</h5>
                          <center><input type="radio" style="display:none;" name="package" id="package" value="fullpay"></center>
                        </div>
                      </div>
                    </div>
                    <div class="col-4 p-0">
                      <div class="card package-card m-1 text-white bg-secondary" style="width:85%;">
                        <div class="card-body ">
                          <h5 class="text-center">Pay 30% and Confirm your Slot now</h5>
                          <center><input type="radio" style="display:none;" name="package" id="package" value="30percent"></center>
                        </div>
                      </div>
                    </div>
                    <div class="col-4 p-0">
                      <div class="card package-card m-1 text-dark bg-light" style="width:85%;">
                        <div class="card-body ">
                          <h5 class="text-center">Continue without payment</h5>
                          <center><input type="radio" style="display:none;" name="package" id="package" value="paylater"></center>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button onclick="prevpage()" type="button" class="btn btn-secondary mr-auto"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Back</button>
                <button type="submit" class="btn btn-success">Book Now</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  <?php endforeach; ?>
  <script>
    var myDiv = $('.wwdtext');
    myDiv.text(myDiv.text().substring(0, 200));

    $(function() {
      <?php foreach ($treatments as $x) : ?>
        $("#rateYo<?php echo $x['treat_id'] ?>").rateYo({
          rating: <?php echo round($x['Avg_star_rating'], 1) ?>,
          readOnly: true,
          starWidth: "15px",
          spacing: "3px"
        });
      <?php endforeach; ?>
    });
  </script>
  <script>
    $('.package-card').click(function() {
      $(this).find('input[type=radio]').prop('checked', true);
      $('.package-card').removeClass('active');
      $(this).addClass('active');
    });

    function nextpage() {
      if ($('.page1').is(':visible')) {
        $('.page1').hide();
        $('.page2').show();
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
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
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

      foreach ($treatments as $x) :
        // $onDays = explode(',', $x['weekdays']);
        // $disabDays = array();
        // foreach ($weekdays as $a => $b) {
        //   if (!in_array($b, $onDays)) {
        //     array_push($disabDays, $a);
        //   } }
      ?>
        $('.input-calendar<?php echo $x['treat_id'] ?>').pignoseCalendar({
          minDate: moment('<?php echo mdate($datestring, $curtime) ?>'),
          apply: onApplyHandler,
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
        select: function(date, context) {
          var message = `You selected ${(date[0] === null ? 'null' : date[0].format('YYYY-MM-DD'))}.
							   <br />
							   <br />
							   <strong>Events for this date</strong>
							   <br />
							   <br />
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
                                <br />
                                <strong>Events for this date</strong>
                                <br />
                                <br />
                                <div class="active-dates"></div>`;
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

      // Disabled date settings.
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
      $('.hidden2').css("display", "block");
    });
  </script>

  <script type="text/javascript" src="<?php echo base_url('css/cssUser/') ?>dist/js/pignose.calendar.full.min.js"></script>
</body>

</html>