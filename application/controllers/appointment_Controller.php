<?php



defined('BASEPATH') OR exit('No direct script access allowed');







class Appointment_Controller extends MY_Controller {







    public function hosAppointment(){



        



            if(!isset($_SESSION['userLog'])){



                // $_SESSION['postData'] = $this->input->post();



                $_SESSION['loginMessage'] = 'You need to Login or Register first to book an Appoinment!!';
 


                $_SESSION['callBy'] = 'appointment_Controller/hosAppointment';



                header('location:'.site_url('userProfile_Controller/index'));



            }else{



                if(isset($_SESSION['postData'])){



                    $hos_id = $_SESSION['postData']['hos_id'];



                    $dept_id = $_SESSION['postData']['dept_id'];



                    unset($_SESSION['postData']);



                }else{



                    $hos_id = $this->input->post('hos_id') ;



                    $dept_id = $this->input->post('dept_id') ; 



                }



                



                // $_SESSION['hosdata'] = array(



                //     'hos_id' => $hos_id,



                //     'dept_id' => $dept_id



                // );



                $this->load->model('Appointment_Model');



                $data = $this->Appointment_Model->apptByHos($hos_id,$dept_id);

// print_r($data);die;

                if($data){



                    // $hos_name = $this->db->select('hos_name')



                    //                     ->where('hos_id',$hos_id)



                    //                     ->get('hospital_details')



                    //                     ->result_array();



                    // $data['hos_name'] = $hos_name[0]['hos_name'];



                    // // echo '<pre>';



                    // print_R($data);



                    // die;



                    $this->load->view('Users/appointmentBooking',$data);



                }else{



                    echo 'error';



                }



            }



            



        



    }



    public function offerBooking(){



        $coupon_code = $this->uri->segment(3);



        $this->load->model('Appointment_Model');



        // echo $coupon_id;



        $data = $this->Appointment_Model->apptByOff($coupon_code);



        if($data){



            // $hos_name = $this->db->select('hos_name')



            //                      ->where('hos_id',$hos_id)



            //                      ->get('hospital_details')



            //                      ->result_array();



            // $data['hos_name'] = $hos_name[0]['hos_name'];



            // echo '<pre>';



            // print_R($data);



            // die;



            $this->load->view('Users/appointmentBooking',$data);



        }else{



            echo 'error';



        }



    }



    public function bookAppt(){



        if($this->input->post()){



            



            $data = array(



                'user_id' => $this->input->post('uid'),



                'doc_id' => $this->input->post('doc_id'),



                'appt_status' => 1,



                'pt_name' =>$this->input->post('pt_name'),



                'phone' => $this->input->post('phone'),

           

                'appt_slot_time' => $this->input->post('slot'),



                'appt_id' => uniqid('APPT'),



                'appt_datetime' => $this->input->post('date'),



            );



          

            $this->load->model('appointment_Model');



            $confirmed = $this->appointment_Model->bookAppt($data);



            if($confirmed){



                $_SESSION['book_status'] = $confirmed[0]['appt_id']; 



                header('location:'.site_url('userProfile_Controller/reviews'));



            }else{



                $_SESSION['book_status'] = 0;



                header('location:'.site_url('userProfile_Controller/recommendMe'));



            }



        }



    }



    public function fetchSlot(){



        if($this->input->post()){



            $doc_id = $this->input->post('doc_id');



            $date = $this->input->post('date');



            echo $this->review_Model->fetchSlot($doc_id,$date);







            



        }



    }







}



?>





