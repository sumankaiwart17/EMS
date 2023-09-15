<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Registration extends MY_Controller {



    public function regPage(){

        $this->load->view('register.php');

    }



    public function register(){

        // Taking the data in an array

        $name = $this->input->post('name');

        $email = $this->input->post('email');

        $country = $this->input->post('country');

        $state = $this->input->post('state');

        $city = $this->input->post('city');

        $zip = $this->input->post('zip');

        $phone = $this->input->post('phone');

        $pass = $this->input->post('password');

        $userdata = array(

            'name' => $name,

            'email_id' => $email,

            'country' => $country,

            'state' => $state,

            'city' => $city,

            'zip' => $zip,

            'phone' => $phone,

            'password' => $pass,

        );

        echo"<pre>";

        print_r($userdata);
        echo"</pre>";
        die;

        // loading the insertion model

        $this->load->model('registerModel');

        $username = $this->registerModel->insertData($userdata);

        if($username){

            

            $_SESSION['email_id'] = $username;

            $this->load->view('index.php');

        }else{

            header('location: index');

        }

        

    }



}

?>