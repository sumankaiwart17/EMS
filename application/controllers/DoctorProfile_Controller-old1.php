<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DoctorProfile_Controller extends MY_Controller
{
    public function docReg()
    {
        $this->load->view('Doctors/doctorRegister');
    }
    public function docLogin()
    {
        $this->load->view('Doctors/doctorLogin');
    }
    public function docDashboard()
    {
        $this->load->view('Doctors/docDashboard');
    }
    public function my_patients()
    {
        $doc_id = $_SESSION['doc_id'];
        $data['patients'] = $this->db->where('doc_id',$doc_id)
                             ->where('hos_id','')
                             ->get('hospital_patients')
                             ->result_array();
        $this->load->view('Doctors/myPatients',$data);
    }
    public function patients()
    {
        $this->load->view('Doctors/patients');
    }
    public function profile()
    {
        $this->load->view('Doctors/profile');
    }
    public function prescription()
    {
        $this->load->view('Doctors/prescription');
    }
    public function treatment()
    {
        $this->load->view('Doctors/treatment');
    }
    public function consult()
    {
        $doc_id = $_SESSION['doc_id'];
        $this->load->model('doctors_Model');
        $data = $this->doctors_Model->getConsultData($doc_id);
        if($data){
            $this->load->view('Doctors/consult',$data);
        }else{
            $this->load->view('Doctors/consult');

        }
        
    }
    public function register()
    {
        $config = array(
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required|is_unique[doctor_details.email_id]',
                'errors' => array(
                    'required' => 'You must provide an Email ID.',
                    'is_unique' => 'This ID already exists')
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|max_length[12]|min_length[6]',
                'errors' => array(
                        'required' => 'You must provide a %s.',)
            ),
            array(
                'field' => 'cpassword',
                'label' => 'Password',
                'rules' => 'required|matches[password]',
                'errors' => array(
                        'required' => 'You must provide a %s.',)
            ),
            array(
                'field' => 'name',
                'label' => 'name',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'You must provide Your Full Name.',)
            )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run()){
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $pass = $this->input->post('password');
            $doc_id = uniqid('DOC');
            $userdata = array(
                'doc_name' => $name,
                'email_id' => $email,
                'password' => $pass,
                'doc_id' => $doc_id
            );

            // loading the insertion model
            $this->load->model('registerModel');
            $doc_id = $this->registerModel->insertDoctorData($userdata);
            if ($doc_id) {

                $_SESSION['doc_id'] = $doc_id;
                $_SESSION['docLog'] = true;
                
                    header('location:'.site_url('doctorProfile_Controller/docDashboard'));
                
            } else {
                header('location: docReg');
            }
        }else{
            $this->load->view('Doctors/doctorRegister');
        }
        
        
    }

    public function login()
    {

        $email_id = $this->input->post('email');
        $password = $this->input->post('password');


        $this->load->model('loginModel');
        $confirmed = $this->loginModel->isValidDoc($email_id, $password);
        if ($confirmed) {
            $_SESSION['doc_id'] = $confirmed;
            $_SESSION['docLog'] = true;
                header('location: ' . site_url('doctorProfile_Controller/docDashboard'));
            
        } else {
            header('location: ' . site_url('doctorProfile_Controller/docLogin'));
        }
    }

    public function consultReply()
    {
        $consult_id = $this->uri->segment(3);
        $this->load->model('doctors_Model');
        $consultData = $this->doctors_Model->getConsultDatabyId($consult_id);
        $this->load->view('Doctors/consultReply',$consultData);
    }
    public function consultDelete()
    {
        $consult_id = $this->uri->segment(3);
        $this->load->model('doctors_Model');
        $q = $this->doctors_Model->deleteConsultData($consult_id);
        $this->load->view('Doctors/consult');
    }

    public function save_consult_answer()
    {
        $consult_id = $this->input->post('consult_id');
        $query = $this->input->post('query');
        $answer = $this->input->post('answer');

        $data = array(
            'consult_id' => $consult_id,
            'query' => $query,
            'answer' => $answer
        );

        $this->load->model('doctors_Model');
        $q = $this->doctors_Model->insertConsultData($data);
        header('location:consultReply/'.$consult_id.'');
    }
    public function logout(){
		unset($_SESSION);
		$this->load->view('Doctors/doctorLogin');
    } 
    public function addPersonalPatient(){
        $this->load->view('Doctors/addPersonalPatient');
    }

    public function addPatient(){
            $doc_id = $_SESSION['doc_id'];
            $data = array(
                'p_id' => $this->input->post('p_id'),
                'p_name' => $this->input->post('p_name'),
                'doc_id' => $doc_id,
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'dob' => $this->input->post('dob'),
                'gender' => $this->input->post('gender'),
                'email_id' => $this->input->post('email_id'),
            );
            // echo '<pre>';
            // print_R($data);
            // die;
            $this->load->model('doctors_Model');
            $confirmed = $this->doctors_Model->addPatient($data);
            if($confirmed){
                header('location: '.site_url('doctorProfile_Controller/my_patients'));
            }else{
                header('location: '.site_url('doctorProfile_Controller/addPersonalPatient'));
            }
        
    }

}

?>