<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital_Controller extends MY_Controller {

    public function register(){

        
        $config = array(
            array(
                'field' => 'hos_id',
                'label' => 'Username',
                'rules' => 'required|is_unique[hospital_registration.hos_id]',
                'errors' => array(
                    'required' => 'You must provide a Hospital ID.',
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
                'field' => 'hos_name',
                'label' => 'hos_name',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'You must provide a Hospital Name.',)
            ),
            array(
                'field' => 'address',
                'label' => 'address',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'You must provide a %s.',)
            ),
            array(
                'field' => 'city',
                'label' => 'city',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'You must provide a %s.',)
            ),
            array(
                'field' => 'zip',
                'label' => 'zip',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'You must provide a Pincode.',)
            ),
            array(
                'field' => 'district',
                'label' => 'district',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'You must provide a %s.',)
            ),
            array(
                'field' => 'state',
                'label' => 'state',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'You must provide a %s.',)
            ),
            array(
                'field' => 'phone',
                'label' => 'phone',
                'rules' => 'required|max_length[12]|min_length[8]',
                'errors' => array(
                        'required' => 'You must provide a Contact Number.')
            )
        );

        $this->form_validation->set_rules($config);
        if($this->form_validation->run()){
            
            $hosdata = array(
                'hos_id' => $this->input->post('hos_id'),
                'hos_name' => $this->input->post('hos_name'),
                'password' => $this->input->post('password'),
                'address' => $this->input->post('address'),
                'district' => $this->input->post('district'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'zip' => $this->input->post('zip'),
                'phone' => $this->input->post('phone'),
            );
            
            // loading the insertion model
            $this->load->model('hospital_Model');
            $hos_id = $this->hospital_Model->insertData($hosdata);
            if($hos_id){
                
                $_SESSION['email_id'] = $hos_id;
                $_SESSION['hosLog'] = true;
                header('location: dashboard');
            }else{
                echo '<script>alert("Database Error!!")</script>';
                $this->load->view('Hospital/hospitalRegister');
            }
        }else{
            $this->load->view('Hospital/hospitalRegister');
        }
        
    }
    public function hosAdvertise(){
        $hos_id = $_SESSION['email_id'];
        $data = $this->hospitalView_Model->getAdvertise($hos_id);
        if($data){
            $this->load->view('Hospital/hosAdvertise',$data);
        }else{
            $this->load->view('Hospital/hosAdvertise');

        }
    }
    public function addAdvertise(){
        if(!$this->input->post()){
            $this->load->view('Hospital/addAdvertise');
        }else{
            $data = array(
                'ad_title' => $this->input->post('ad_title'),
                'hos_id' => $_SESSION['email_id'],
                'ad_desc' => $this->input->post('ad_desc'),
                'status' => $this->input->post('status'),
            );
            $confirmed = $this->hospitalView_Model->addAdvertise($data);
            if($confirmed){
                header('location:'.site_url('hospital_Controller/hosAdvertise'));
            }else{
                header('location:'.site_url('hospital_Controller/addAdvertise'));
            }
        }
    }
    public function editAdvertise(){
        if(!$this->input->post()){
            $ad_id = $this->uri->segment(3);
            $data = $this->hospitalView_Model->getAdById($ad_id);
            if($data){
                $this->load->view('Hospital/editAdvertise',$data);
            }
        }else{
            $search = array(
                'ad_id' => $this->input->post('ad_id')
            );
            $data = array(
                'ad_title' => $this->input->post('ad_title'),
                'ad_desc' => $this->input->post('ad_desc'),
                'status' => $this->input->post('status'),
            );
            $confirmed = $this->hospitalView_Model->updAd($search,$data);
            if($confirmed){
                header('location:'.site_url('hospital_Controller/hosAdvertise'));
            }else{
                header('location:'.site_url('hospital_Controller/editAdvertise'));
            }
        }
    }
    public function delAdvertise(){
        $search = array(
            'ad_id' => $this->uri->segment(3),
            'hos_id' => $_SESSION['email_id']
        );
        $this->db->delete('hospital_advertisement',$search);
        $q = $this->db->where($search)
                      ->get('hospital_advertisement');
        if(!$q->num_rows()){
            header('location:'.site_url('hospital_Controller/hosAdvertise'));
        }else{
            header('location:'.site_url('hospital_Controller/hosAdvertise'));
        }
    }
    public function login(){
        $data = array(
            'hos_id' => $this->input->post('hos_id'),
            'password' => $this->input->post('password'),
        );

        $this->load->model('hospital_Model');
        $confirmed = $this->hospital_Model->isValid($data);
        if($confirmed){
            $_SESSION['email_id']=$confirmed['hos_id'];
            $_SESSION['hos_name']=$confirmed['hos_name'];
            $_SESSION['hosLog'] = true;
             header('location: dashboard');
        }else{
            echo '<script>alert("Credentials Didnt Match!!")</script>';
            $this->load->view('Hospital/hospitalLogin');
        }
    }
    public function logout(){
		unset($_SESSION['email_id']);
		$this->load->view('Hospital/hospitalLogin');
    } 
    public function recHospital(){
		$hos_id = $this->uri->segment(3);
		 
		$data = $this->hospitalView_Model->hospitalData($hos_id);
		if($data){
			$hospitalDet = array();
			$hospitalPost = array();
			$assocDoc = array();
			$reviews = array();
            $consultData = array();
            $depts = array();

			foreach($data['hospitalDet'] as $x=>$y){
				$hospitalDet = $y;
			}
			
			foreach($data['hospitalPost'] as $x=>$y ){
				$hospitalPost[$x] = $y;
			}
			foreach($data['assocDoc'] as $x=>$y ){
				$assocDoc[$x] = $y;
			}
			foreach($data['consultData'] as $x=>$y ){
				$consultData[$x] = $y;
            }
            foreach($data['depts'] as $x=>$y ){
				$depts[$x] = $y;
			}
			
			
			$reviews = $this->hospitalView_Model->reviewUserData($hos_id);
						
			$data = array(
				'hospitalDet' => $hospitalDet,
				'hospitalPost' => $hospitalPost,
				'assocDoc' => $assocDoc,
				'reviews' => $reviews,
                'consultData' => $consultData, 
                'depts' => $depts,
			);
			$this->load->view('recommended_hospital',$data); 
		}else{
			echo "dataBase Error!!";
		}
    }
    public function comparison(){
        $this->load->view('Hospital/comparison');
    }
    public function hosOffers(){
        $hos_id = $_SESSION['email_id'];
        $this->load->model('hospitalView_Model');
        $data = $this->hospitalView_Model->offerData($hos_id);
        if($data){
            $this->load->view('Hospital/viewOffers',$data);
        }else{
            $data['error'] = 'database error';
            $this->load->view('Hospital/viewOffers',$data);
        }
        
    }
    public function addOffer(){
        if(!$this->input->post()){
            $hos_id = $_SESSION['email_id'];
            $docs = $this->db->select('doctor_details.doc_name,doctor_details.doc_id')
                             ->where('doctor_details.hos_id',$hos_id)
                             ->get('doctor_details')
                             ->result_array();
            $data['docs'] = $docs;
            $this->load->view('Hospital/add-offer',$data);
        }else{
            $data = array(
                'hos_id' => $_SESSION['email_id'],
                'doc_id' => $this->input->post('doc_id'),
                'coupon_title' => $this->input->post('coupon_title'),
                'coupon_code' => strtoupper($this->input->post('coupon_code')),
                'coupon_desc' => $this->input->post('coupon_desc'),
                'status' => $this->input->post('status'),
                'valid_till' => $this->input->post('valid_till'),
                'discount' => $this->input->post('discount'),
            );
            $this->load->model('hospitalView_Model');
            $confirmed = $this->hospitalView_Model->addOffer($data);
            if($confirmed){
                header('location:'.site_url('hospital_Controller/hosOffers'));
            }else{
                header('location:'.site_url('hospital_Controller/addOffers'));

            }
        }
    }
    public function editOffer(){
        if(!$this->input->post()){
            $hos_id = $_SESSION['email_id'];
            $coupon_id = $this->uri->segment(3);
            $this->load->model('hospitalView_Model');
            $data = $this->hospitalView_Model->getOfferById($coupon_id);
            if($data){
                $docs = $this->db->select('doctor_details.doc_name,doctor_details.doc_id')
                             ->where('doctor_details.hos_id',$hos_id)
                             ->get('doctor_details')
                             ->result_array();
                $data['docs'] = $docs;
                // echo '<pre>';
                // print_R($data);
                $this->load->view('Hospital/edit-offer',$data);
            }
        }else{
            $data = array(
                'hos_id' => $_SESSION['email_id'],
                'doc_id' => $this->input->post('doc_id'),
                'coupon_title' => $this->input->post('coupon_title'),
                'coupon_code' => strtoupper($this->input->post('coupon_code')),
                'coupon_desc' => $this->input->post('coupon_desc'),
                'status' => $this->input->post('status'),
                'valid_till' => $this->input->post('valid_till'),
                'discount' => $this->input->post('discount'),
            );
            $search = array(
                'coupon_id' => $this->input->post('coupon_id'),
            );
            // echo '<pre>';
            // print_R($data);
            // die;
            $this->load->model('hospitalView_Model');
            $confirmed = $this->hospitalView_Model->updOffer($search,$data);
            if($confirmed){
                header('location:'.site_url('hospital_Controller/hosOffers'));
            }else{
                header('location:'.site_url('hospital_Controller/editOffer'));
            }
        }
    }
    public function dashboard(){
        $hos_id = $_SESSION['email_id'];
         
        $data = $this->hospitalView_Model->hospitalData($hos_id);
		if($data){
			$hospitalDet = array();
			$hospitalPost = array();
			$assocDoc = array();
			$reviews = array();
			$consultData = array();

			foreach($data['hospitalDet'] as $x=>$y){
				$hospitalDet = $y;
			}
			
			foreach($data['hospitalPost'] as $x=>$y ){
				$hospitalPost[$x] = $y;
			}
			foreach($data['assocDoc'] as $x=>$y ){
				$assocDoc[$x] = $y;
			}
			foreach($data['consultData'] as $x=>$y ){
				$consultData[$x] = $y;
			}
			
			
			$reviews = $this->hospitalView_Model->reviewUserData($hos_id);
						
			$data = array(
				'hospitalDet' => $hospitalDet,
				'hospitalPost' => $hospitalPost,
				'assocDoc' => $assocDoc,
				'reviews' => $reviews,
                'consultData' => $consultData,
                'appointments' => $data['appointments'] 
			);
			$this->load->view('Hospital/dashboard',$data); 
		}else{
			echo "dataBase Error!!";
		}
    }
    public function doctors(){
        $hos_id = $_SESSION['email_id'];
         
        $data = $this->hospitalView_Model->hospitalData($hos_id);
		if($data){
			$hospitalDet = array();
			$hospitalPost = array();
			$assocDoc = array();
			$reviews = array();
            $consultData = array();
            $post = array();

			foreach($data['hospitalDet'] as $x=>$y){
				$hospitalDet = $y;
			}
			
			foreach($data['hospitalPost'] as $x=>$y ){
				$hospitalPost[$x] = $y;
			}
			foreach($data['assocDoc'] as $x=>$y ){
				$assocDoc[$x] = $y;
			}
			foreach($data['consultData'] as $x=>$y ){
				$consultData[$x] = $y;
            }
            foreach($data['post'] as $x=>$y ){
				$post[$x] = $y;
			}
			
			
			$reviews = $this->hospitalView_Model->reviewUserData($hos_id);
						
			$data = array(
				'hospitalDet' => $hospitalDet,
				'hospitalPost' => $hospitalPost,
				'assocDoc' => $assocDoc,
				'reviews' => $reviews,
                'consultData' => $consultData, 
                'post' => $post,
			);
			$this->load->view('Hospital/doctors',$data); 
		}else{
			echo "dataBase Error!!";
		}
    }
    public function addDoc(){
        if(!$this->input->post()){
            $this->load->view('Hospital/add-doctor');
        }else{
            $rules = array(
                array(
                    'field' => 'docId',
                    'label' => 'Doctor ID',
                    'rules' => 'required|is_unique[doctor_registration.doc_id]',
                    'errors' => array(
                        'required' => 'You must provide a %s.',
                        'is_unique' => 'This ID already exists')
                ),
                array(
                    'field' => 'pass',
                    'label' => 'Password',
                    'rules' => 'required|max_length[12]|min_length[6]',
                    'errors' => array(
                            'required' => 'You must provide a %s.',)
                ),
                array(
                    'field' => 'cpass',
                    'label' => 'Confirm Password',
                    'rules' => 'required|matches[pass]',
                    'errors' => array(
                            'required' => 'You must %s.',)
                ),
                array(
                    'field' => 'docName',
                    'label' => 'Doctor Name',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'You must provide a %s.',)
                ),
                array(
                    'field' => 'emailId',
                    'label' => 'Email ID',
                    'rules' => 'required|is_unique[doctor_details.email_id]',
                    'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist.')
                ),
                array(
                    'field' => 'city',
                    'label' => 'City',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'You must provide a %s.',)
                ),
                array(
                    'field' => 'zip',
                    'label' => 'Postalcode',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'You must provide a %s.',)
                ),
                array(
                    'field' => 'country',
                    'label' => 'Country',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'You must provide a %s.',)
                ),
                array(
                    'field' => 'state',
                    'label' => 'State/Province',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'You must provide a %s.',)
                ),
                array(
                    'field' => 'specialization',
                    'label' => 'Specialization',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'You must provide a %s.',)
                ),
                array(
                    'field' => 'adhar',
                    'label' => 'Adhaar No.',
                    'rules' => 'required|is_unique[doctor_registration.adhar]',
                    'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist.')
                ),
                array(
                    'field' => 'phone',
                    'label' => 'phone',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'You must provide a Contact Number.')
                )
            );
            $this->form_validation->set_rules($rules);
            if($this->form_validation->run()){
                $config['upload_path'] = './userUploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                        

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('picture'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('Hospital/add-doctor',$error);
                }
                else
                {
                    $upload_data = $this->upload->data();
                    $image_path = base_url('userUploads/'.$upload_data['file_name']);
                    $data = array(
                        'hos_id' => $_SESSION['email_id'],
                        'doc_id' => $this->input->post('docId'),
                        'doc_name' => $this->input->post('docName'),
                        'password' => $this->input->post('pass'),
                        'email_id' => $this->input->post('emailId'),
                        'adhar' => $this->input->post('adhar'),
                        'country' => $this->input->post('country'),
                        'city' => $this->input->post('city'),
                        'state' => $this->input->post('state'),
                        'phone' => $this->input->post('phone'),
                        'zip' => $this->input->post('zip'),
                        'specialization' => $this->input->post('specialization'),
                        'picture' => $image_path,
                    );
                    $this->load->model('doctors_Model');
                    $confirmed = $this->doctors_Model->register($data);
                    if($confirmed){
                        header('location:'.site_url('hospital_Controller/doctors'));
                    }else{
                        echo "<script>alert('Database Error')</script>";
                    }
                }
            }else{
                $this->load->view('Hospital/add-doctor');
            }

            
        }
        
    }
    public function editDoc(){
        if(!$this->input->post()){
            $docId = $this->uri->segment(3);
            $this->load->model('doctors_Model');
            $data = $this->doctors_Model->docData($docId);
            if($data){
                $data = array(
                    'docReg' => $data['docReg'][0],
                    'docDet' => $data['docDet'][0],
                );
                $this->load->view('Hospital/edit-doctor',$data);
            }else{
                echo 'Database error!!';
            }
        }else{
            if($_FILES['picture']['name']){
                $config['upload_path'] = './userUploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                        

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('picture'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('Hospital/edit-doctor',$error);
                }
                else
                {
                    $upload_data = $this->upload->data();
                    $image_path = base_url('userUploads/'.$upload_data['file_name']);
                    $data = array(
                        'doc_id' => $this->input->post('docId'),
                        'doc_name' => $this->input->post('docName'),
                        'email_id' => $this->input->post('emailId'),
                        'specialization' => $this->input->post('specialization'),
                        'adhar' => $this->input->post('adhar'),
                        'country' => $this->input->post('country'),
                        'city' => $this->input->post('city'),
                        'state' => $this->input->post('state'),
                        'zip' => $this->input->post('zip'),
                        'phone' => $this->input->post('phone'),
                        'picture' => $image_path,
                    ); 
                }
            }else{
                $data = array(
                    'doc_id' => $this->input->post('docId'),
                    'doc_name' => $this->input->post('docName'),
                    'email_id' => $this->input->post('emailId'),
                    'specialization' => $this->input->post('specialization'),
                    'adhar' => $this->input->post('adhar'),
                    'country' => $this->input->post('country'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'zip' => $this->input->post('zip'),
                    'phone' => $this->input->post('phone'),
                );
            }
            $this->load->model('doctors_Model');
            $confirmed = $this->doctors_Model->updDoc($data);
            if($confirmed){
                header('location: doctors');
            }else{
                echo '<script>alert("Couldnt update!! try again later")</script>';
                
            }
        }
    }
    public function delDoc(){
        $doc_id = $this->uri->segment(3);

        $this->load->model('doctors_Model');
        $confirmed = $this->doctors_Model->delDoc($doc_id);
        if($confirmed){
            header('location:'.site_url().'hospital_Controller/doctors');
        }else{
            echo '<script>alert("Couldnt complete the process!! Try again later")</script>';
        }
    }
    public function editprofile(){
        $this->load->view('Hospital/editProfile');
    }

    public function addAppointment(){
        $hos_id = $_SESSION['email_id'];
        $this->load->model('appointment_Model');
        $data = $this->appointment_Model->fetch_department_and_doctor($hos_id);
        // echo '<pre>';
        // print_r($data);
        // die;
        //$data['age'] = 23;
        $this->load->view('Hospital/add-appointment',$data);
    }

    public function fetchDoc(){
        if($this->input->get('q')){
            echo $this->hospitalView_Model->fetchDoc($this->input->get('q'));
        }
    }

    public function addDept(){
        if(!$this->input->post()){
            $hos_id = $_SESSION['email_id'];
             
            $hosData = $this->hospitalView_Model->hospitalData($hos_id);
            $deptData = $this->hospitalView_Model->deptsAll($hos_id);
            if($hosData && $deptData){
                $data = array(
                    'hosDepts' => $hosData['depts'],
                    'depts' => $deptData,
                );
                $this->load->view('Hospital/add-department',$data);
            }
            
        }else{
            if($this->input->post('deptName') == 'other'){
                $data = array(
                    'dept_name' => $this->input->post('newDeptName'),
                    'dept_description' => $this->input->post('description'),
                    'dept_id' => 'dept000'.$this->input->post('newDeptName'),
                    'status' => $this->input->post('status'),
                    'facilities' => $this->input->post('facilities'),
                    'hos_id' => $_SESSION['email_id'],
                    'block_no' => $this->input->post('block'),
                    'total_beds' => $this->input->post('total_beds'),
                    'available_beds' => $this->input->post('available_beds'),
                    'floor_no' => $this->input->post('floor'),
                    'open_at' => $this->input->post('openAt'),
                    'close_at' => $this->input->post('closeAt'),
                    'services' => $this->input->post('services'),
                    'addon_services' => $this->input->post('addOns'),
                );
                if($this->input->post('spocCheck')){
                    $data['spoc'] = $this->input->post('spoc');
                    $data['spoc_no'] = $this->input->post('spocNo');
                    $data['spoc_email'] = $this->input->post('spocEmail');
                }
                $confirmed = $this->hospitalView_Model->addNewDept($data);
                if($confirmed){
                    echo "<script>alert('Department Added Successfully!!')</script>";
                    header('location: departments');
                }
                else{
                    echo "<script>alert('Something went wrong!! Please try again')</script>";
                    header('location: addDept');
                }
            }else{
                $data = array(
                    'dept_id' => $this->input->post('deptName'),
                    'status' => $this->input->post('status'),
                    'facilities' => $this->input->post('facilities'),
                    'hos_id' => $_SESSION['email_id'],
                    'block_no' => $this->input->post('block'),
                    'floor_no' => $this->input->post('floor'),
                    'total_beds' => $this->input->post('total_beds'),
                    'available_beds' => $this->input->post('available_beds'),
                    'open_at' => $this->input->post('openAt'),
                    'close_at' => $this->input->post('closeAt'),
                    'services' => $this->input->post('services'),
                    'addon_services' => $this->input->post('addOns'),
                );
                if($this->input->post('spocCheck')){
                    $data['spoc'] = $this->input->post('spoc');
                    $data['spoc_no'] = $this->input->post('spocNo');
                    $data['spoc_email'] = $this->input->post('spocEmail');
                }
                 
                $confirmed = $this->hospitalView_Model->addDept($data);
                if($confirmed){
                    echo "<script>alert('Department Added Successfully!!')</script>";
                    header('location: departments');
                }
                else{
                    echo "<script>alert('Something went wrong!! Please try again')</script>";
                    header('location: addDept');
                }
            }
        }

    }
    public function delDept(){
        $dept_id = $this->uri->segment(3);
        $hos_id = $_SESSION['email_id'];

         
        $confirmed = $this->hospitalView_Model->delDept($hos_id,$dept_id);
        if($confirmed){
            header('location:'.site_url().'/hospital_Controller/departments');
        }else{
            echo '<script>alert("Couldnt complete the process!! Try again later")</script>';
        }
    }
    public function profile(){
        $hos_id = $_SESSION['email_id'];
         
        $data = $this->hospitalView_Model->hospitalData($hos_id);
		if($data){
			$hospitalDet = array();
			$hospitalPost = array();
			$assocDoc = array();
			$reviews = array();
            $consultData = array();
            $post = array();

			foreach($data['hospitalDet'] as $x=>$y){
				$hospitalDet = $y;
			}
			
			foreach($data['hospitalPost'] as $x=>$y ){
				$hospitalPost[$x] = $y;
			}
			foreach($data['assocDoc'] as $x=>$y ){
				$assocDoc[$x] = $y;
			}
			foreach($data['consultData'] as $x=>$y ){
				$consultData[$x] = $y;
            }
            foreach($data['post'] as $x=>$y ){
				$post[$x] = $y;
			}
			
			
			$reviews = $this->hospitalView_Model->reviewUserData($hos_id);
						
			$data = array(
				'hospitalDet' => $hospitalDet,
				'hospitalPost' => $hospitalPost,
				'assocDoc' => $assocDoc,
				'reviews' => $reviews,
                'consultData' => $consultData, 
                'post' => $post,
			);
			$this->load->view('Hospital/profile',$data); 
		}else{
			echo "dataBase Error!!";
		}
    }
    public function edit_hos_profile(){
        $hos_id = $_SESSION['email_id'];
        $data = $this->hospitalView_Model->hospitalData($hos_id);

        if($data){
			$hospitalDet = array();
			foreach($data['hospitalDet'] as $x=>$y){
				$hospitalDet = $y;
            }
						
			$data = array(
				'hospitalDet' => $hospitalDet,
			);
			$this->load->view('Hospital/editProfile',$data);
		}else{
			echo "dataBase Error!!";
		}
    }

    public function upd_hospital_profile(){
        $hos_id = $_SESSION['email_id'];
        $this->load->model('hospitalView_Model');

        $search = array(
            'hos_id' => $hos_id,
        );
        $data = array(
            'hos_name' => $this->input->post('hospital_name'),
            'district' => $this->input->post('country'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'zip' => $this->input->post('zip'),
            'email_id' => $this->input->post('email'),
            'phone' => $this->input->post('phn'),
            'about' => $this->input->post('about'),
            'address'=> $this->input->post('address'),
        );
        // echo '<pre>';
        // print_R($this->input->post());
        $this->load->model('hospitalView_Model');
        $updated = $this->hospitalView_Model->updHosData($search,$data);
        if($updated){
            header('location:profile');
        }else{
            header('location:editProfile');
        }


        if($data){
			$hospitalDet = array();
			foreach($data['hospitalDet'] as $x=>$y){
				$hospitalDet = $y;
            }
						
			$data = array(
				'hospitalDet' => $hospitalDet,
			);
			$this->load->view('Hospital/editProfile',$data);
		}else{
			echo "dataBase Error!!";
		}
    }



    public function patients(){
        $hos_id = $_SESSION['email_id'];
        $data['patients'] = $this->db->where('hos_id',$hos_id)
                             ->get('hospital_patients')
                             ->result_array();
        $this->load->view('Hospital/patients',$data);
    }
    public function delPatient(){
        $search = array(
            'p_id' => $this->uri->segment(3),
            'hos_id' => $_SESSION['email_id']
        );
        $this->db->delete('hospital_patients',$search);
        $q = $this->db->where($search)
                      ->get('hospital_patients');
        if(!$q->num_rows()){
            header('location:'.site_url('hospital_Controller/patients'));
        }else{
            header('location:'.site_url('hospital_Controller/patients')); 
        }
    }
    public function delOffer(){
        $search = array(
            'coupon_id' => $this->uri->segment(3),
            'hos_id' => $_SESSION['email_id']
        );
        $this->db->delete('hospital_offers',$search);
        $q = $this->db->where($search)
                      ->get('hospital_offers');
        if(!$q->num_rows()){
            header('location:'.site_url('hospital_Controller/hosOffers'));
        }else{
            header('location:'.site_url('hospital_Controller/hosOffers'));
        }
    }
    public function editPatient(){
        if(!$this->input->post()){
            $search = array(
                'p_id' => $this->uri->segment(3),
                'hos_id' => $_SESSION['email_id']
            );
            $docs = $this->db->select('doctor_details.doc_name,doctor_details.doc_id')
                             ->where('doctor_details.hos_id',$search['hos_id'])
                             ->get('doctor_details')
                             ->result_array();
            $pData = $this->db->where($search)
                             ->get('hospital_patients')
                             ->result_array();
            $data['pData'] = $pData;
            $data['docs'] = $docs;
            if($data){
                // print_R($data);
               $this->load->view('Hospital/edit-patient',$data);
            }else{
                header('location:'.site_url('hospital_Controller/patients'));
            }
        }else{
            $search['p_id'] =  $this->input->post('p_id');
            $data = $this->input->post();
            // print_R($data);
            $this->load->model('hospitalView_Model');
            $confirmed = $this->hospitalView_Model->updPatient($search,$data);
            if($confirmed){
                header('location:'.site_url('hospital_Controller/patients'));
            }else{
                header('location:'.site_url('hospital_Controller/editPatient'));
            }
        }
    }
    
    public function addPatient(){
        if(!$this->input->post()){
            $hos_id = $_SESSION['email_id'];
            $docs = $this->db->select('doctor_details.doc_name,doctor_details.doc_id')
                             ->where('doctor_details.hos_id',$hos_id)
                             ->get('doctor_details')
                             ->result_array();
            $data = array(
                'hos_id' => $hos_id,
                'docs' => $docs
            );
            // print_R($docs);                 
            $this->load->view('Hospital/add-patient',$data);
        }else{
            $data = array(
                'p_id' => $this->input->post('p_id'),
                'p_name' => $this->input->post('p_name'),
                'hos_id' => $this->input->post('hos_id'),
                'doc_id' => $this->input->post('doc_id'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'dob' => $this->input->post('dob'),
                'gender' => $this->input->post('gender'),
                'email_id' => $this->input->post('email_id'),
            );
            // echo '<pre>';
            // print_R($data);
            $this->load->model('hospitalView_Model');
            $confirmed = $this->hospitalView_Model->addPatient($data);
            if($confirmed){
                header('location: '.site_url('hospital_Controller/patients'));
            }else{
                header('location: '.site_url('hospital_Controller/addPatient'));
            }
        }
        
    }

    public function appointments(){
        $hos_id = $_SESSION['email_id'];
        $this->load->model('appointment_Model');
        $data = $this->appointment_Model->admin_hospital_appointment($hos_id);
        // echo '<pre>';
        // print_r($data);
        // die;
        //$data['age'] = 23;
        $this->load->view('Hospital/appointments',$data);
    }
    public function schedule(){
        $hos_id = $_SESSION['email_id'];
        $this->load->model('hospitalView_Model');
        $data = $this->hospitalView_Model->docSchedules($hos_id);
        if($data){
            // echo '<pre>';
            // print_R($data);
            $this->load->view('Hospital/schedule',$data);
        }else{
            echo 'error';
        }
        // $this->load->view('Hospital/schedule');
    }
    public function editSchedule(){
        if(!$this->input->post()){
            $doc_id = $this->uri->segment(3);
            $this->load->model('hospitalView_Model');
            $data = $this->hospitalView_Model->editSch($doc_id);
            if($data){
                // echo '<pre>';
                // print_R($data);
                $this->load->view('Hospital/edit-schedule',$data);
            }
        }else{
            $arr_len = 0;
            $start =  date("H:i:s", strtotime($this->input->post('strt_time')));
            $end =  date("H:i:s", strtotime($this->input->post('end_time')));
            $brk =  date("H:i:s", strtotime($this->input->post('brk_time')));
            $brk_dur = $this->input->post('brk_dur');
            $dur = $this->input->post('appt_dur');
            $start = explode(':', $start);
            $start = $start[0] * 60 + $start[1] + $start[2] / 60;
            //before break
            $brk = explode(':', $brk);
            $brk = $brk[0] * 60 + $brk[1] + $brk[2] / 60;
            $slot_mins_brk = $brk - $start;
            $no_of_slots_brk = $slot_mins_brk / $dur;
            $slots_arr_brk = array();
            $time = $start;
            $i = 0;
            $mins = 0;
    
            while ($no_of_slots_brk > 0) {
                if (($time % 60) == 0) {
                    $mins = '00';
                } else {
                    $mins = $time % 60;
                }
    
                if (floor($time / 60) < 12) {
                    if (floor($time / 60) == 0) {
                        $slots_arr_brk[$i] = '12:' . $mins . ' AM';
                    } else {
                        $slots_arr_brk[$i] = floor($time / 60) . ':' . $mins . ' AM';
                    }
                } else {
                    if (floor($time / 60) == 12) {
                        $slots_arr_brk[$i] = '12:' . $mins . ' PM';
                    } else {
                        $slots_arr_brk[$i] = floor(($time / 60) - 12) . ':' . $mins . ' PM';
                    }
                }
                $no_of_slots_brk -= 1;
                $i += 1;
                $time = $time + $dur;
            }
            /* echo "Before Break <br/><pre>";
            print_R($slots_arr_brk); */
            //after break
            $i=0;
            $end = explode(':', $end);
            $end = $end[0] * 60 + $end[1] + $end[2] / 60;
            $slot_mins = $end - $brk - $brk_dur * 60;
            $time = $brk + $brk_dur * 60;
            $no_of_slots = $slot_mins / $dur;
            $slots_arr = array();
            
            while ($no_of_slots > 0) {
                if (($time % 60) == 0) {
                    $mins = '00';
                } else {
                    $mins = $time % 60;
                }
    
                if (floor($time / 60) < 12) {
                    if (floor($time / 60) == 0) {
                        $slots_arr[$i] = '12:' . $mins . ' AM';
                    } else {
                        $slots_arr[$i] = floor($time / 60) . ':' . $mins . ' AM';
                    }
                } else {
                    if (floor($time / 60) == 12) {
                        $slots_arr[$i] = '12:' . $mins . ' PM';
                    } else {
                        $slots_arr[$i] = floor(($time / 60) - 12) . ':' . $mins . ' PM';
                    }
                }
                $no_of_slots -= 1;
                $i += 1;
                $time = $time + $dur;
            }
            $slots = array_merge($slots_arr_brk, $slots_arr);
            $search = array(
                'doctors_schedule.doc_id' => $this->input->post('doc_id'),
            );
            $data = array(
                'weekdays' => implode(',',$this->input->post('weekdays')),
                'strt_time' => date("H:i:s", strtotime($this->input->post('strt_time'))),
                'end_time' => date("H:i:s", strtotime($this->input->post('end_time'))),
                'brk_time' => date("H:i:s", strtotime($this->input->post('brk_time'))),
                'brk_dur' => $this->input->post('brk_dur'),
                'consult_duration' => $this->input->post('appt_dur'),
                'status' => $this->input->post('status'),
                'slots' => implode(',',$slots)
            );
            // echo '<pre>';
            // print_R($this->input->post());
            $this->load->model('hospitalView_Model');
            $confirmed = $this->hospitalView_Model->updDocSch($search,$data);
            if($confirmed){
                header('location:schedule');
            }else{
                header('location:editSchedule');
            }
        }
    }
    public function delSchedule(){
        
        $search = array(
            'doctors_schedule.doc_id' => $this->uri->segment(3)
        );
        $this->db->delete('doctors_schedule',$search);
        $q = $this->db->where($search)
                      ->get('doctors_schedule');
        if(!$q->num_rows){
            header('location:'.site_url('hospital_Controller/schedule'));
        }else{
            header('location:'.site_url('hospital_Controller/schedule'));
        }
    }
    public function addSchedule(){
        if(!$this->input->post()){
            $hos_id = $_SESSION['email_id'];
            $this->load->model('hospitalView_Model');
            $data = $this->hospitalView_Model->docUnschData($hos_id);
            if($data){
                $this->load->view('Hospital/add-schedule',$data);
            }else{
                $this->load->view('Hospital/add-schedule');
            }
            //$this->load->view('Hospital/add-schedule');
        }else{
            // echo '<pre>';
            // print_R($this->input->post());
            // $week = implode(',',$this->input->post('weekdays'));
            // echo $week;
            
        $arr_len = 0;
        $start =  date("H:i:s", strtotime($this->input->post('strt_time')));
        $end =  date("H:i:s", strtotime($this->input->post('end_time')));
        $brk =  date("H:i:s", strtotime($this->input->post('brk_time')));
        $brk_dur = $this->input->post('brk_dur');
        $dur = $this->input->post('appt_dur');
        $start = explode(':', $start);
        $start = $start[0] * 60 + $start[1] + $start[2] / 60;
        //before break
        $brk = explode(':', $brk);
        $brk = $brk[0] * 60 + $brk[1] + $brk[2] / 60;
        $slot_mins_brk = $brk - $start;
        $no_of_slots_brk = $slot_mins_brk / $dur;
        $slots_arr_brk = array();
        $time = $start;
        $i = 0;
        $mins = 0;

        while ($no_of_slots_brk > 0) {
            if (($time % 60) == 0) {
                $mins = '00';
            } else {
                $mins = $time % 60;
            }

            if (floor($time / 60) < 12) {
                if (floor($time / 60) == 0) {
                    $slots_arr_brk[$i] = '12:' . $mins . ' AM';
                } else {
                    $slots_arr_brk[$i] = floor($time / 60) . ':' . $mins . ' AM';
                }
            } else {
                if (floor($time / 60) == 12) {
                    $slots_arr_brk[$i] = '12:' . $mins . ' PM';
                } else {
                    $slots_arr_brk[$i] = floor(($time / 60) - 12) . ':' . $mins . ' PM';
                }
            }
            $no_of_slots_brk -= 1;
            $i += 1;
            $time = $time + $dur;
        }
        /* echo "Before Break <br/><pre>";
        print_R($slots_arr_brk); */
        //after break
        $i=0;
        $end = explode(':', $end);
        $end = $end[0] * 60 + $end[1] + $end[2] / 60;
        $slot_mins = $end - $brk - $brk_dur * 60;
        $time = $brk + $brk_dur * 60;
        $no_of_slots = $slot_mins / $dur;
        $slots_arr = array();
        
        while ($no_of_slots > 0) {
            if (($time % 60) == 0) {
                $mins = '00';
            } else {
                $mins = $time % 60;
            }

            if (floor($time / 60) < 12) {
                if (floor($time / 60) == 0) {
                    $slots_arr[$i] = '12:' . $mins . ' AM';
                } else {
                    $slots_arr[$i] = floor($time / 60) . ':' . $mins . ' AM';
                }
            } else {
                if (floor($time / 60) == 12) {
                    $slots_arr[$i] = '12:' . $mins . ' PM';
                } else {
                    $slots_arr[$i] = floor(($time / 60) - 12) . ':' . $mins . ' PM';
                }
            }
            $no_of_slots -= 1;
            $i += 1;
            $time = $time + $dur;
        }
        $slots = array_merge($slots_arr_brk, $slots_arr);
            $data = array(
                'doc_id' => $this->input->post('doc_id'),
                'weekdays' => implode(',',$this->input->post('weekdays')),
                'strt_time' => date("H:i:s", strtotime($this->input->post('strt_time'))),
                'end_time' => date("H:i:s", strtotime($this->input->post('end_time'))),
                'brk_time' => date("H:i:s", strtotime($this->input->post('brk_time'))),
                'brk_dur' => $this->input->post('brk_dur'),
                'consult_duration' => $this->input->post('appt_dur'),
                'status' => $this->input->post('status'),
                'slots' => implode(',',$slots)
            );
            $this->load->model('hospitalView_Model');
            $confirmed = $this->hospitalView_Model->addDocSch($data);
            if($confirmed){
                header('location:schedule');
            }else{
                header('location:addSchedule');
            }
        }
    }
    
    public function cusQueries(){
        $this->load->view('Hospital/customerQuery');
    }
    public function editDept(){
        
        if(!$this->input->post()){
            $search = array(
                'dept_id' => $this->uri->segment('3'),
                'hos_id' => $_SESSION['email_id'],
            );
             
            $data = $this->hospitalView_Model->deptData($search);
            
            if($data){
                $data = array(
                    'hosDept' => $data['hosDept'][0],
                    'dept' => $data['dept'][0],
                );
                $this->load->view('Hospital/edit-department',$data);
            }
        }else{
            $data = array(
                'facilities' => $this->input->post('facilities'),
                'status' => $this->input->post('status'),
                'block_no' => $this->input->post('block'),
                'floor_no' => $this->input->post('floor'),
                'total_beds' => $this->input->post('total_beds'),
                'available_beds' => $this->input->post('available_beds'),
                'open_at' => $this->input->post('openAt'),
                'close_at' => $this->input->post('closeAt'),
                'services' => $this->input->post('services'),
                'addon_services' => $this->input->post('addOns'),
                
            );
            if($this->input->post('spocCheck')){
                $data['spoc'] = $this->input->post('spoc');
                $data['spoc_no'] = $this->input->post('spocNo');
                $data['spoc_email'] = $this->input->post('spocEmail');
            }
            $search = array(
                'dept_id' => $this->input->post('deptID'),
                'hos_id' => $_SESSION['email_id'],
            );
             
            $confirmed = $this->hospitalView_Model->updDept($search,$data);
            if($confirmed){
                echo '<script>alert("Update Done!!")</script>' ;
                header ('location: departments');
            }else{
                echo '<script>alert("Update Not Done!!")</script>' ;
            }
        }

    }
    public function treatmentView(){
		$treatId = $this->uri->segment(3);
        $this->load->model('treatment_Model');
        $data = $this->treatment_Model->getData($treatId);
		$this->load->view('treatment_view.php',$data);
	}
    public function treatments(){
        $hos_id = $_SESSION['email_id'];
         
        $data = $this->hospitalView_Model->treatData($hos_id);
        if($data){
            $data = array(
                'treatData' => $data
            );
            $this->load->view('Hospital/treatments',$data);
        }else{
            $this->load->view('Hospital/treatments');
        }
    }
    public function addtreat(){
        if(!$this->input->post()){
            $hos_id = $_SESSION['email_id'];

            $data = $this->hospitalView_Model->getTreat($hos_id);
            if($data){
                
                $this->load->view('Hospital/add-treatment',$data);
                
            }else{
                echo "<script>alert('Oops, Something went wrong')</script>";
            }
        }else{
            if($this->input->post('treatName')=='other'){
                $treat = array(
                    'treat_id' => "trt00".$this->input->post('newTreatName'),
                    'dept_id' => $this->input->post('deptName'),
                    'treat_name' => $this->input->post('newTreatName'),
                    'treat_desc' => $this->input->post('description'),
                );
                $hostreat = array(
                    'treat_id' => "trt00".$this->input->post('newTreatName'),
                    'hos_id' => $_SESSION['email_id'],
                    'duration' => $this->input->post('duration'),
                    'budget' => $this->input->post('budget'),
                );

                $confirmed = $this->hospitalView_Model->addNewTreat($treat,$hostreat);
                if($confirmed){
                    header('location: treatments');
                }else{
                    echo '<script>alert("Something went wrong!! Try again later")</script>';
                }
            }else{
                $hostreat = array(
                    'treat_id' => $this->input->post('treatName'),
                    'hos_id' => $_SESSION['email_id'],
                    'duration' => $this->input->post('duration'),
                    'budget' => $this->input->post('budget'),
                );
                $confirmed = $this->hospitalView_Model->addTreat($hostreat);
                if($confirmed){
                    header('location: treatments');
                }else{
                    echo '<script>alert("Something went wrong!! Try again later")</script>';
                }
            }

        }

    }
    public function fetchtreat(){
        if($this->input->get('q')){
            echo $this->hospitalView_Model->fetchTreat($this->input->get('q'));
        }
    }
    public function edittreat(){
        
        if(!$this->input->post()){

            $treat_id = $this->uri->segment(3);
            $data = $this->hospitalView_Model->editTreatData($treat_id);
            if($data){
                $data = array(
                    'treatData' => $data[0]
                );
                $this->load->view('Hospital/edit-treatment',$data);
            }else{
                echo "<script>alert('Oops, Something went wrong')</script>";
                edittreat();
            }
            
        }else{
            $data = array(
                'duration' => $this->input->post('duration'), 
                'budget' => $this->input->post('budget'),
            );
            $search = array(
                'treat_id' => $this->input->post('treat_id'),
                'hos_id' => $_SESSION['email_id'],
            );

             
            $confirmed = $this->hospitalView_Model->updTreat($data,$search);
            if ($confirmed){
                header('location:treatments');
            }else{
                echo '<script>alert("Update not done!! try again later")</script>';
            }

        }
        
    }
    public function delTreat(){
        $treat_id = $this->uri->segment(3);
        $hos_id = $_SESSION['email_id'];

         
        $confirmed = $this->hospitalView_Model->delTreat($hos_id,$treat_id);
        if($confirmed){
            header('location:'.site_url().'hospital_Controller/treatments');
        }else{
            echo '<script>alert("Couldnt complete the process!! Try again later")</script>';
        }
    }
    public function departments(){
        $hos_id = $_SESSION['email_id'];
         
        $data = $this->hospitalView_Model->hospitalData($hos_id);
		if($data){
			$depts = array();

			foreach($data['depts'] as $x=>$y ){
				$depts[$x] = $y;
			}
			
						
			$data = array(
				'depts' => $depts,
			);
			$this->load->view('Hospital/departments',$data); 
		}else{
			echo "dataBase Error!!";
		}
    }
    public function delAppointment(){
        $apt_id = $this->uri->segment(3);
        $search = array(
            'appt_id' => $apt_id
        );
        $this->db->delete('doctors_appointment',$search);
        $q = $this->db->where($search)
                      ->get('doctors_appointment');
        if(!$q->num_rows()){
            header('location:'.site_url('hospital_Controller/appointments'));
        }else{
            header('location:'.site_url('hospital_Controller/appointments'));
        }
    }
    public function save_appointment_data()
	{
		/*load registration view form*/
		//$this->load->view('add-appointment');
	
		/*Check submit button */
		if($this->input->post())
		{
            $q=$this->db->where('email_id',$this->input->post('email'))
                        ->get('user_details');
            if($q->num_rows()){
                $data['appt_id']=$this->input->post('appt_id');
                $data['doc_id']=$this->input->post('doc_id');
                $data['appt_slot_time']=$this->input->post('time');
                $data['appt_datetime']=$this->input->post('date');
                $data['appt_status']=$this->input->post('status');
                $data['user_id']=$this->input->post('email');

                $this->load->model('appointment_Model');
                $confirmed = $this->appointment_Model->bookAppt($data);
                if($confirmed){
                    header('location:'.site_url('hospital_Controller/appointments'));
                }
            }else{
                $userDet = array(
                    'name' => $this->input->post('pt_name'),
                    'email_id' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                );
                $this->db->insert('user_details',$userDet);

                $data['appt_id']=$this->input->post('appt_id');
                $data['doc_id']=$this->input->post('doc_id');
                $data['appt_slot_time']=$this->input->post('time');
                $data['appt_datetime']=$this->input->post('date');
                $data['appt_status']=$this->input->post('status');
                $data['user_id']=$this->input->post('email');

                $this->load->model('appointment_Model');
                $confirmed = $this->appointment_Model->bookAppt($data);
                if($confirmed){
                    header('location:'.site_url('hospital_Controller/appointments'));
                }
            }

		    

            print_r( $data);
            die;
			$user=$this->Home_model->saverecords($data);
			if($user>0){
			        echo "Records Saved Successfully";
			}
			else{
					echo "Insert error !";
			}
		}
	}
}
?>