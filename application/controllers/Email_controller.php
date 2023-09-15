<?php 

   class Email_controller extends CI_Controller { 

 

      function __construct() { 

         parent::__construct(); 

         $this->load->library('session'); 

         $this->load->helper('form'); 

      } 

		

      public function index() { 

	

        $appointments = $this->db->select('doctor_details.*,doctors_appointment.*,departments.*,user_details.name, doctors_schedule.consult_duration as duration_time')

            ->from('doctor_details')

            ->join('doctors_appointment', 'doctors_appointment.doc_id = doctor_details.doc_id')

            ->join('departments', 'departments.dept_id = doctor_details.specialization')

            ->join('doctors_schedule', 'doctors_appointment.doc_id=doctors_schedule.doc_id')

            ->join('user_details', 'doctors_appointment.user_id = user_details.email_id ')

            ->get()

            ->result_array();

            

        foreach($appointments as $a)

        {

          // echo "<pre>";

          // print_r($a);

          // die;

          $emaildate = $a['appt_datetime'];

          $emailtime = date('H:i', (strtotime($a['appt_slot_time']) + $a['duration_time']*60 + 1800));

          

          if($a['appt_slot_time'] >= '22:59')

          {

            $emaildate = date("d-m-Y", strtotime("$emaildate +1 day"));

          }

          

          // echo $emaildate . ' ' . $emailtime.'      ';

          date_default_timezone_set('Asia/Calcutta');

          $currentdate =  date('Y-m-d');

          $currenttime = date('H:i');

          // echo $currentdate . ' ' . $currenttime;

          // echo "<br>";

          if($currentdate == $emaildate)

          {

            if(($currenttime >= $emailtime) && $x['appt_status']==2 && $x['email_status']==0)

            {

              $this->send_mail($x['user_id'], $x['name'], $x['doc_name']);

            }

          }

        }

        // die;

      } 

  

      public function send_mail($to_emai, $name, $doc_name) { 

         $from_email = "info@dotlinkertech.com"; 

         $fromName = "Aahrs";

   

         //Load email library 

         $this->load->library('email'); 

   

         $this->email->from($from_email, 'Dot-Linker'); 

         $this->email->to($to_email);

         //$this->email->cc('another@another-example.com');

         //$this->email->bcc('them@their-example.com');

        

         $this->email->set_header('Header1', "MIME-Version: 1.0" . "\r\n");

         $this->email->set_header('Header2', "Content-type:text/html;charset=UTF-8" . "\r\n");

         $this->email->set_mailtype("html");

        

         $this->email->subject('Post Consultation review by:'.$name.''); 

        

         $htmlContent = '<!DOCTYPE html>

                                    <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

                                    <head>

                                      <meta charset="UTF-8">

                                      <meta name="viewport" content="width=device-width,initial-scale=1">

                                      <meta name="x-apple-disable-message-reformatting">

                                      <title></title>

                                      <!--[if mso]>

                                      <noscript>

                                        <xml>

                                          <o:OfficeDocumentSettings>

                                            <o:PixelsPerInch>96</o:PixelsPerInch>

                                          </o:OfficeDocumentSettings>

                                        </xml>

                                      </noscript>

                                      <![endif]-->

                                      <style>

                                        table, td, div, h1, p {font-family: Arial, sans-serif;}

                                      </style>

                                    </head>

                                    <body style="margin:0;padding:0;">

                                      <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">

                                        <tr>

                                          <td align="center" style="padding:0;">

                                            <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">

                                              <tr>

                                                <td align="center" style="padding:40px 0 30px 0;background:#70bbd9;">

                                                  <img src="https://projects.dotlinkertech.com/testemail/images/AAHRS_logo5.png" alt="" width="300" style="height:auto;display:block;" />

                                                </td>

                                              </tr>

                                              <tr>

                                                <td style="padding:36px 30px 42px 30px;">

                                                  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">

                                                    <tr>

                                                      <td style="padding:0 0 36px 0;color:#153643;">

                                                      	<p style="margin:0 0 12px 0;font-size:36px;line-height:24px;font-family:Arial,sans-serif;">Hello '.$name.'</p>

                                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Hope you are doing good after your consultation with our Dr.'.$doc_name.' .

															                            If you are satisfied with the treatments and pleased with our dotor, you can send us a review

														                            </p>

                                                        <button style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif; background-color:red; outline:none; border-radius:5px; border:1px solid black; padding:5px;"><a href="'.site_url('userProfile_Controller/postReview').'" style="color:white;text-decoration:none;">Post a Review</a></button>

                                                      </td>

                                                    </tr>

                                                  </table>

                                                </td>

                                              </tr>

                                              <tr>

                                                <td style="padding:30px;background:#ee4c50;">

                                                  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">

                                                    <tr>

                                                      <td style="padding:0;width:50%;" align="left">

                                                        <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">

                                                          &copy;2021 Dotlinker Technologies Pvt. Ltd.<br/><a href="https://dotlinkertech.com/" style="color:#ffffff;text-decoration:underline;">DotLinker</a>

                                                        </p>

                                                      </td>

                                                      <td style="padding:0;width:50%;" align="right">

                                                        <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">

                                                          <tr>

                                                            <td style="padding:0 0 0 10px;width:38px;">

                                                              <a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>

                                                            </td>

                                                            <td style="padding:0 0 0 10px;width:38px;">

                                                              <a href="https://www.facebook.com/dotlinkertech/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>

                                                            </td>

                                                          </tr>

                                                        </table>

                                                      </td>

                                                    </tr>

                                                  </table>

                                                </td>

                                              </tr>

                                            </table>

                                          </td>

                                        </tr>

                                      </table>

                                    </body>

                                    </html>';

        

        $this->email->message($htmlContent); 

   

         //Send mail 

         if($this->email->send()) 

         $this->session->set_flashdata("email_sent","Email sent successfully."); 

         else 

         $this->session->set_flashdata("email_sent","Error in sending Email."); 

         $this->load->view('email_form'); 

      } 

   } 

?>