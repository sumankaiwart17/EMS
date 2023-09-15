<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class LogIO_Controller extends MY_Controller {



    public function login(){

		$email= $this->input->post('email');

		$pass = $this->input->post('password');

		$this->load->model('loginModel');

		$username = $this->loginModel->isValid($email,$pass);

		if($username){

            

            $_SESSION['email_id'] = $username;

            $this->load->view('index');

        }

        else{

            $this->load->view('index');

        } 

	}
 


	public function logout(){


		unset($_SESSION['email_id']);

		unset($_SESSION['userLog']);
		
	
		
		header('location:'.site_url('user/login-page'));

    } 

    

}

?>