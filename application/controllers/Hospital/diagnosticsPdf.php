<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Invoice Template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    /*
  Common invoice styles. These styles will work in a browser or using the HTML
  to PDF anvil endpoint.
*/
    body {
      font-size: 16px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table tr td {
      padding: 0;
    }

    table tr td:last-child {
      text-align: right;
    }

    .bold {
      font-weight: bold;
    }

    .right {
      text-align: right;
    }

    .large {
      font-size: 1.75em;
    }

    .total {
      font-weight: bold;
      color: #fb7578;
    }

    .logo-container {
      margin: 20px 0 70px 0;
    }

    .invoice-info-container {
      font-size: 0.875em;
    }

    .invoice-info-container td {
      padding: 4px 0;
    }

    .client-name {
      font-size: 1.5em;
      vertical-align: top;
    }

    .line-items-container {
      margin: 70px 0;
      font-size: 0.875em;
    }

    .line-items-container th {
      text-align: left;
      color: #999;
      border-bottom: 2px solid #ddd;
      padding: 10px 0 15px 0;
      font-size: 0.75em;
      text-transform: uppercase;

    }

    .line-items-container th:last-child {

      text-align: right;

    }

    .line-items-container td {
      padding: 15px 0;
    }

    .line-items-container tbody tr:first-child td {
      padding-top: 25px;
    }

    .line-items-container.has-bottom-border tbody tr:last-child td {
      padding-bottom: 25px;
      border-bottom: 2px solid #ddd;
    }

    .line-items-container.has-bottom-border {
      margin-bottom: 0;
    }

    .line-items-container th.heading-quantity {
      width: 50px;
    }



    .line-items-container th.heading-price {
      text-align: right;
      width: 100px;
    }



    .line-items-container th.heading-subtotal {

      width: 80px;

    }



    .payment-info {

      width: 38%;

      font-size: 0.75em;

      line-height: 1.5;

    }



    .footer {

      margin-top: 100px;

    }



    .footer-thanks {

      font-size: 1.125em;

    }



    .footer-thanks img {

      display: inline-block;

      position: relative;

      top: 1px;

      width: 16px;

      margin-right: 4px;

    }



    .footer-info {
      float: right;
      margin-top: 5px;
      font-size: 0.75em;
      color: #ccc;
    }



    .footer-info span {

      padding: 0 5px;

      color: black;

    }



    .footer-info span:last-child {

      padding-right: 0;

    }



    .page-container {

      display: none;

    }

    /*
  The styles here for use when generating a PDF invoice with the HTML code.
  * Set up a repeating page counter
  * Place the .footer-info in the last page's footer

*/



    .footer {

      margin-top: 30px;

    }



    .footer-info {

      float: none;

      position: running(footer);

      margin-top: -25px;

    }



    .page-container {

      display: block;

      position: running(pageContainer);

      margin-top: -25px;

      font-size: 12px;

      text-align: right;

      color: #999;

    }



    .page-container .page::after {

      content: counter(page);

    }



    .page-container .pages::after {

      content: counter(pages);

    }



    @page {

      @bottom-right {

        content: element(pageContainer);

      }



      @bottom-left {

        content: element(footer);

      }

    }
  </style>
</head>

<body>

  <div class="web-container">
    <div class="page-container">
    </div>
    <div class="logo-container">
    </div>
    <table class="invoice-info-container">
      <tr>
        <td rowspan="2" class="client-name"> Hospital Name </td>
        <td> Anvil Co </td>
      </tr>
      <tr>
        <td>
          123 Main Street
        </td>

      </tr>

      <tr>
        <td>
          Invoice Date: <strong><?php echo date('H/M/Y',) ?></strong>
        </td>

        <td> San Francisco CA, 94103,
          <br> San Francisco CA, 94103
        </td>
      </tr>
    </table>
    <hr>

    <table class="invoice-info-container">
      <thead>
        <tr>
          <th class="heading-quantity">
            <p style="width: 50%;text-align:left">hospital No: </p>
            <p style="width: 50%;text-align:left">Name : <?php echo $singledata[0]['patient_name'] ?> </p>
            <p style="width: 50%;text-align:left">Address :<?php echo $singledata[0]['address'] ?> </p>
            <p style="width: 50%;text-align:left">Phone : <?php echo $singledata[0]['contact'] ?> </p>
            <p style="width: 60%;text-align:left">Email : <?php echo $singledata[0]['email_id'] ?></p>
            <p style="width: 60%;text-align:left">Age : <?php echo $singledata[0]['age'] ?></p>
          </th>

          <!-- <th class="heading-description"> </th>
          <th class="heading-price"></th>
          <th class="heading-subtotal" style="width:300px"></th>
            <p style="text-align: left;">Age: <?php //echo $singledata[0]['age']
                                              ?> </p> -->

        </tr>
      </thead>
    </table>


    <table class="line-items-container">
      <thead style="background-color: lightblue;">
        <tr>
          <th class="heading-quantity">#</th>

          <th class="heading-quantity">Payment Mode:</th>
          <th class="heading-quantity">Discharge Date:</th>
          <th class="heading-quantity">AMOUNT</th>
        </tr>
      </thead>

      <tbody>

        <tr>
          <td>1</td>
          <td>Blue large widgets</td>
          <td>jkdkwq</td>
          <td class="bold">$30.00</td>
        </tr>
      </tbody>
    </table>


    <div>
      <p>Notice:</p>
      <div style="float:left;border:1px dotted black;width:300px;height:50px"></div>
    </div>
  </div>


  <table class="line-items-container has-bottom-border">

    <thead>
      <tr></tr>
    </thead>
    <tbody>
      <tr>
        <td class="payment-info">
          <div>
          </div>
        </td>
    </tbody>
  </table>



  <div class="footer">
    <div class="footer-info">
    </div>
    <div class="footer-thanks" style="background-color:lightblue;bottom:0px;position:absolute;width:100%;text-align: center">
      <span>Thank you!</span>
    </div>
  </div>
  </div>


</body>

</html>