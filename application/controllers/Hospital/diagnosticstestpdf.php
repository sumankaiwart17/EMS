<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        @page {
            margin: -10px 35px 0px 35px !important;
        }

        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: normal;
            src: url(http://themes.googleusercontent.com/static/fonts/opensans/v8/cJZKeOuBrn4kERxqtaUH3aCWcynf_cDxXwCLxiixG1c.ttf) format('truetype');
        }

        body {
            max-width: 100%;
            padding: 2%;
            font-family: system-ui;
        }

        .float {
            float: left;
        }

        .img img {
            width: 50px;
            margin-left: 70px;
        }

        .text {

            text-align: left;

        }

        .text p {
            font-size: 14px;
            color: #959595;
        }

        p {
            font-size: 14px;
            color: black;
        }

        .text h3 {
            margin: 0px;
        }

        .border_buttom {
            border-bottom: 2px solid #000;
            height: 140px;

        }

        .border_buttom2 {
            border-bottom: 2px solid #000;

            padding-bottom: 500px !important;

        }

        .border-0 {
            border-right: 0px !important;
        }

        .border-02 {
            border-left: 0px !important;
            text-align: left;
            padding-left: 15px;
        }

        .border-01 {
            border-bottom: 0px !important;
        }

        .present-details .heading {
            margin-bottom: -20px;
        }

        table {
            padding: 30px 0px;
            width: 100%;
        }

        table tr td {
            line-height: 40px;
        }

        .heading {
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
            margin-top: 30px;
        }

        .heading h4 {
            text-align: center;
            font-weight: 700;
        }

        .content {
            padding: 0px 0px;
        }
    </style>

</head>

<body>

    <table class="head" style="padding: 0px;">
        <tr>
            <td>
                <div class="text">
                    <p><span style="margin-top:0px;color:#0083A3;font-size:18px;font-weight: 500;"> <?php echo  'xyz' ?></span> <br>
                        Mob. No: 706227272 <br>
                    </p>
                </div>

            </td>
            <td>
                <div class="img">
                    <!-- <img src="<? //php  echo base_url('images/AAHRS_logo1.png') 
                                ?>" alt=""> -->
                </div>
            </td>
            <td>
                <div class="text" style="margin-left:120px;">
                    <p><span style="margin-top:0px;color:#0083A3;font-size:18px;font-weight: 500;"> </span> <br>
                        <span> Address: <?php echo 'kolkata,west bengal' . ', ' . 'kolkata' . ', ' . 'west bengal'; ?><br> Pin: <?php echo '712149' ?><br>
                    </p>
                </div>
            </td>
        </tr>
    </table>





    <table>
        <tr>
            <td>LAB NO <span style="padding-left:82px;">: 5</span></td>
            <td><span style="padding-left:100px">DATE</span><span style="padding-left:100px;">: <?php echo ' ' . date('d-m-20y') ?></span></td>
        </tr>
        <tr>
            <td>PATIENT NAME <span style="padding-left:24px;">: <?php echo $singledata[0]['patient_name'] ?></span></td>
            <td><span style="padding-left:100px">GENDER</span><span style="padding-left:80px;">:<?php echo ' ' . $singledata[0]['gender'] ?></span></td>
        </tr>

        <tr>
            <td>REF. BY DR. <span style="padding-left:50px;">: <?php echo $singledata[0]['refarellby'] ?></span></td>
            <?php if (isset($singledata[0]['dob'])) : ?>
                <td><span style="padding-left:100px">AGE</span> <span style="padding-left:109px;">: <?php echo (date('Y') - date("Y", strtotime($singledata[0]['dob']))) ?></span></td>

            <?php elseif ($singledata[0]['age']) : ?>
                <td><span style="padding-left:100px">AGE</span> <span style="padding-left:109px;">: <?php echo ' ' . $singledata[0]['age'] ?></span></td>

            <?php endif; ?>
        </tr>

        <tr>
            <td>SEMPLE COLL.AT <span style="padding-left:18px;">: CRYSTAL LAB</span></td>
        </tr>
    </table>

    <div class="heading">
        <h4>ANTI MICROSOMAL ANITBODY (AMA)</h4>
    </div>

    <table>
        <tr>
            <td>TEST</td>
            <td>RESULT</td>
            <td>NORMAL VALUES</td>
        </tr>

<?php foreach ($test_result as $x) :?>        
        <tr>


            <td><?php echo $x['test_name']?></td>
            <td><?php echo $x['test_result']?></td>
            <td><?php echo $x['normal_value']?></td>
        </tr>
       <?php endforeach;?>
    </table>

    <div class="content">
        <p>Normal Ranges: Negative: Titre Less than and equal to 1:10</p>
        <p>Positive: Titre More than 1 : 10</p>
        <p>(AMA are also called as Anti - TPO Antibodies)</p>
    </div>

    <!--<div class="footer">
        <h3>Chandan Vartak
            D.M.L.T.</h3>
        <p>Highlighted Result Values Indicate Abnormal <br>
            Report Printed By My Lab www.crystaldatainc.com</p>
    </div>-->

    <table style="position: absolute;bottom:160px;width:100%;border-top:1px solid #000;padding-top:20px">

        <tr style="text-align: left">
            <th style="text-align: left">Chandan Vartak D.M.L.T.</th>
            <th>Dr. Pankaj ShahM.D. M.B.B.S.</th>
        </tr>

        <tr>
            <td>Highlighted Result Values Indicate Abnormal<br>Report Printed By My Lab www.crystaldatainc.com</td>
        </tr>
    </table>

</body>

</html>