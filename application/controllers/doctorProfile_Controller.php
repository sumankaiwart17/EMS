<?php

defined('BASEPATH') or exit('No direct script access allowed');



class doctorProfile_Controller extends MY_Controller

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

      if(!$this->session->userdata('doc_id'))

        redirect('doctor/doctor-login');

        $this->load->view('Doctors/docDashboard');

    }

    public function my_patients()

    {

      if(!$this->session->userdata('doc_id'))

        redirect('doctor/doctor-login');

        $layout = 0;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $doc_id = $_SESSION['doc_id'];

        $data['patients'] = $this->db->where('doc_id', $doc_id)

            ->where('hos_id', '')

            ->get('hospital_patients')

            ->result_array();

        $data['layout'] = $layout;

        $this->load->view('Doctors/myPatients', $data);

    }

    public function patients()

    {

      if(!$this->session->userdata('doc_id'))

        redirect('doctor/doctor-login');

        $doc_id = $_SESSION['doc_id'];

        $data['patients'] = $this->db->where('doc_id', $doc_id)

            ->where('hos_id !=', '')

            ->get('hospital_patients')

            ->result_array();

        $this->load->view('Doctors/patients', $data);

    }

    public function profile()

    {

      if(!$this->session->userdata('doc_id'))

        redirect('doctor/doctor-login');

        $layout = 0;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $doc_id = $_SESSION['doc_id'];

        $this->load->model('doctors_Model');

        $data = $this->doctors_Model->doctorsProfile($doc_id);

        if ($data) {

            $doctorData = array();

            $reviewData = array();

            $expData = array();

            $consultData = array();

            $postData = array();



            foreach ($data['doctorData'] as $x => $y) {

                $doctorData = $y;

            }

            foreach ($data['reviewData'] as $x => $y) {

                $reviewData[$x] = $y;

            }

            foreach ($data['expData'] as $x => $y) {

                $expData[$x] = $y;

            }

            foreach ($data['consultData'] as $x => $y) {

                $consultData[$x] = $y;

            }

            foreach ($data['postData'] as $x => $y) {

                $postData[$x] = $y;

            }

            $data = array(

                'doctorData' => $doctorData,

                'reviewData' => $reviewData,

                'expData' => $expData,

                'consultData' => $consultData,

                'postData' => $postData,

                'layout' => $layout,

            );



            // echo '<pre>';

            // print_r($data);

            // die;

            $this->load->view('Doctors/profile', $data);

        } else {

            echo "dataBase Error!!";

        }

    }

    public function edit_doc_profile()

    {

        $layout = 2;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $data['layout'] = $layout;

        $this->load->view('Doctors/profile', $data);

    }

    public function updateDocTreat()

    {

        $treat_id = $this->input->post('treat_id');

        $details = $this->input->post('details');

        // $treatData = array(

        //     'treat_id' => $treat_id,

        //     'details' => $details

        // );

        $search['id'] =  $this->input->post('treat_id');

        $data['details'] = $this->input->post('details');

        $this->load->model('doctors_Model');

        $data = $this->doctors_Model->updateDocTreatment($search, $data);

        // if ($data) {

        //     $this->load->view('Doctors/treatment');

        // } else {

        //     $this->load->view('Doctors/treatment');

        // }

        $this->treatment();

    }

    public function prescription()

    {

      if(!$this->session->userdata('doc_id'))

        redirect('doctor/doctor-login');

        $layout = 0;

        // layout = 0 -->view page

        $doc_id = $_SESSION['doc_id'];

        $data['patients'] = $this->db->where('doc_id', $doc_id)

            ->where('hos_id!=', '')

            ->get('hospital_patients')

            ->result_array();

        $data['layout'] = $layout;

        $this->load->view('Doctors/prescription', $data);

    }

    public function consult()

    {

      if(!$this->session->userdata('doc_id'))

        redirect('doctor/doctor-login');

      if(!$this->session->userdata('doc_id'))

        redirect('doctor/doctor-login');

        $layout = 0;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $doc_id = $_SESSION['doc_id'];

        $this->load->model('doctors_Model');

        $data = $this->doctors_Model->getConsultData($doc_id);

        if ($data) {

            $data['layout'] = $layout;

            $this->load->view('Doctors/consult', $data);

        } else {

            $data['layout'] = $layout;

            $this->load->view('Doctors/consult', $data);

        }

    }

    public function register()

    {

     
        $rules = array(

            array(

                'field' => 'email',

                'label' => 'email',

                'rules' => 'required|is_unique[doctor_details.email_id]',

                'errors' => array(

                    'required' => 'You must provide an Email ID.',

                    'is_unique' => 'This ID already exists'

                )

            ),

            array(

                'field' => 'password',

                'label' => 'Password',

                'rules' => 'required|max_length[12]|min_length[6]',

                'errors' => array(

                    'required' => 'You must provide a %s.',

                )

            ),

            array(

                'field' => 'cpassword',

                'label' => 'Password',

                'rules' => 'required|matches[password]',

                'errors' => array(

                    'required' => 'You must provide a %s.',

                )

            ),

            array(

                'field' => 'name',

                'label' => 'name',

                'rules' => 'required',

                'errors' => array(

                    'required' => 'You must provide Your Full Name.',

                )

            )

        );



        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {

            //  $config['upload_path'] = './userUploads/';

            //     $config['allowed_types'] = 'gif|jpg|png';

            //     $this->load->library('upload',$config);

            //     if (!$this->upload->do_upload('picture')) {
            //         $error = array('error' => $this->upload->display_errors());

            //         $this->load->view('Doctors/doctorRegister', $error);
            //     } 
            //     else {

                    // $upload_data = $this->upload->data();

                    // $image_path = base_url('userUploads/' . $upload_data['file_name']);

                    $name = $this->input->post('name');

                    $email = $this->input->post('email');

                    $pass = $this->input->post('password');

                    $adhar = $this->input->post('adhar');

                    $country = $this->input->post('country');

                    $city = $this->input->post('city');

                    $state = $this->input->post('state');

                    $phone = $this->input->post('phone');

                    $zip = $this->input->post('zip');

                    $degree =  $this->input->post('degree');

                    $speciality =  $this->input->post('speciality');

                    $specialization =  $this->input->post('specialization');

                    $about = $this->input->post('about');

                    $experience =  $this->input->post('experience');

                    $services =  $this->input->post('services');

                    $awards =  $this->input->post('awards');
                    
                    $certifications = $this->input->post('certifications');

                    $doc_id = $this->input->post('docId');

                    // $doc_id = uniqid('DOC');

                    //$image_path = $this->input->post('picture');

                    $userdata = array(

                        'doc_name' => $name,

                        'email_id' => $email,

                        'password' => $pass,

                        'adhar' => $adhar ,
                
                        'country' => $country,
                
                        'city' => $city ,
                
                        'state' => $state ,
                
                        'phone' => $phone,
                
                        'zip' => $zip ,
                        
                        'doc_id' => $doc_id,

                        'degree' => $degree,

                        'speciality' => $speciality,

                        'specialization' => $specialization,

                        'about' =>$about,

                        'experience' => $experience,

                        'services' => $services,

                        'awards' =>  $awards,

                        'certifications' =>  $certifications,

                       // 'picture' => $image_path,

                    );



                    // loading the insertion model

                    $this->load->model('registerModel');

                    $doc_id = $this->registerModel->insertDoctorData($userdata);

                    // echo '<pre>';
                    // print_r($doc_id);
                    // '</pre>';

                    if ($doc_id) {



                        $_SESSION['doc_id'] = $doc_id;

                        $_SESSION['docLog'] = true;


 
                        header('location:' . site_url('doctor/doctor-dashboard'));

                    } else {

                        header('location: docReg');

                    }

               // }
              

        }
         else {

                    $this->load->view('doctor/doctor-registration');

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

            header('location: ' . site_url('doctor/doctor-dashboard'));

        } else {

            header('location: ' . site_url('doctor/doctor-login'));

        }

    }



    public function consultReply()

    {

        $layout = 3;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        // layout = 3 -->reply

        $consult_id = $this->uri->segment(3);

        $this->load->model('doctors_Model');

        $consultData = $this->doctors_Model->getConsultDatabyId($consult_id);

        $consultData['layout'] = $layout;

        $this->load->view('Doctors/consult', $consultData);

    }

    public function consultDelete()

    {

        $consult_id = $this->uri->segment(3);

        $this->load->model('doctors_Model');

        $q = $this->doctors_Model->deleteConsultData($consult_id);

        $this->load->view('Doctors/consult');

    }



    public function add_patients_medicine()

    {

        if ($this->input->post()) {

            $this->db->insert('hospital_patients_medication', $this->input->post());

        }

        header('location:' . site_url('doctorProfile_Controller/treatment'));

    }



    public function edit_patients_medicine()

    {

        $id = $this->uri->segment(3);

        $this->db->where('id', $id)

            ->update('hospital_patients_medication', $this->input->post());

        $response = $this->db->where('id', $id)

            ->get('hospital_patients_medication')

            ->result_array();

        echo $response[0]['medicine'] . ',' . $response[0]['dosage'] . ',' . $response[0]['duration'];

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

        $_SESSION['consult'] = "successfully replied to the query - " . $query;

        header('location:' . site_url('doctorProfile_Controller/consult'));

    }

    public function logout()

    {

        unset($_SESSION['doc_id']);

      	redirect('doctor/doctor-login');

        //$this->load->view('Doctors/doctorLogin');

    }

    public function addPersonalPatient()

    {

        $layout = 1;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $data['layout'] = $layout;

        $this->load->view('Doctors/myPatients', $data);

    }



    public function addPatient()

    {

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

        if ($confirmed) {

            header('location: ' . site_url('doctorProfile_Controller/my_patients'));

        } else {

            header('location: ' . site_url('doctorProfile_Controller/addPersonalPatient'));

        }

    }



    public function delPrivatePatient()

    {

        $search = array(

            'p_id' => $this->uri->segment(3),

            'doc_id' => $_SESSION['doc_id']

        );

      	$this->load->model('Doctors_Model');

        $this->db->delete('hospital_patients', $search);

        $q = $this->db->where($search)

            ->get('hospital_patients');

        if (!$q->num_rows()) {

            header('location:' . site_url('doctor/doctor-private-patients'));

        } else {

            header('location:' . site_url('doctor/doctor-private-patients'));

        }

    }



    public function editPrivatePatient()

    {

        $layout = 2;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        if (!$this->input->post()) {

            $search = array(

                'p_id' => $this->uri->segment(3),

                'doc_id' => $_SESSION['doc_id']

            );

            $pData = $this->db->where($search)

                ->get('hospital_patients')

                ->result_array();

            $data['pData'] = $pData;

            // $data['docs'] = $docs;

            if ($data) {

                // print_R($data);

                $data['layout'] = $layout;

                $this->load->view('Doctors/myPatients', $data);

            } else {

                header('location:' . site_url('doctorProfile_Controller/my_patients'));

            }

        } else {

            $search['p_id'] =  $this->input->post('p_id');

            $data = $this->input->post();

            // print_R($data);

            $this->load->model('doctors_Model');

            $confirmed = $this->doctors_Model->updPatient($search, $data);

            if ($confirmed) {

                header('location:' . site_url('doctorProfile_Controller/my_patients'));

            } else {

                header('location:' . site_url('doctorProfile_Controller/editPrivatePatient'));

            }

        }

    }



    public function editPrescription()

    {

        $layout = 2;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $data['layout'] = $layout;

        $this->load->view('Doctors/prescription', $data);

    }





    public function treatment()

    {

      if(!$this->session->userdata('doc_id'))

        redirect('doctor/doctor-login');

        $layout = 0;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $doc_id = $_SESSION['doc_id'];

        $data['patients'] = $this->db->where('doc_id', $doc_id)

            ->where('hos_id !=', '')

            ->get('hospital_patients')

            ->result_array();

        $doc_id = $_SESSION['doc_id'];

        $data['treat_history'] = $this->db->select('doctor_treatments.id as tret_id,doctor_treatments.*,hospital_registration.*,departments.*,treatments.*, hospital_patients.*')

            ->from('doctor_treatments')

            ->where('doctor_treatments.doc_id', $doc_id)

            ->where('doctor_treatments.hos_id !=', '')

            // ->where('doctor_treatments.p_id', $p_id)

            ->join('hospital_registration', 'hospital_registration.hos_id = doctor_treatments.hos_id')

            ->join('departments', 'departments.dept_id = doctor_treatments.dept_id')

            ->join('treatments', 'treatments.treat_id = doctor_treatments.treat_id')

            ->join('hospital_patients', 'hospital_patients.p_id=doctor_treatments.p_id')

            ->get()

            ->result_array();

        $data['medicines'] = $this->db->select('hospital_patients_medication.*,doctor_details.doc_name,treatments.treat_name')

            ->from('hospital_patients_medication')

            ->join('doctor_details', 'doctor_details.doc_id = hospital_patients_medication.doc_id')

            ->join('treatments', 'treatments.treat_id = hospital_patients_medication.treat_id')

            ->where('hospital_patients_medication.doc_id', $doc_id)

            ->order_by('hospital_patients_medication.created_at')

            ->get()

            ->result_array();

        $data['treatments'] = $this->db->select('treatments.*')->from('treatments')->join('doctor_details', 'doctor_details.specialization = treatments.dept_id')->where('doctor_details.doc_id', $doc_id)->get()->result_array();

        $data['layout'] = $layout;

        // echo '<pre>';

        // print_r( $data['treatments']);

        // die;

        $this->load->view('Doctors/treatment', $data);

    }

}

