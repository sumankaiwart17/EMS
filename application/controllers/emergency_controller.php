<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class emergency_Controller extends MY_Controller {

    public function emergency()
    {   
        $name=$this->input->post('pname');
        $age=$this->input->post('page');
        $phone=$this->input->post('pnum');
        $padd=$this->input->post('padd');
        $data=array(
            'name'=>$name,
            'age'=>$age,
            'contact'=>$phone,
           'address'=>$padd
        ); 
        $this->load->model('timelinemodel');
        $confirm=$this->timelinemodel->reqamb($data);
        if($confirm)
        {
            $_SESSION['emergency']=true;
            header('location:'.site_url('userProfile_Controller/timeline'));
        }      
            
        // $this->load->library('form_validation');
        // $this->form_validation->set_rules('pname','Paitent Name','required|alpha');
        // $this->form_validation->set_rules('page','Paitent age','required|num');
        // $this->form_validation->set_rules('pnum','Phone number','required|num');
        // $this->form_validation->set_rules('padd','Adress','required');

        // if( $this->form_validation-run())
        // {
        //     echo "HELP IS ON THE WAY";
        // }
        // else
        // {
        //     echo validation_errors();
       


    }



}


















?>
