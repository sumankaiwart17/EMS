<?php

defined('BASEPATH') or exit('No direct script access allowed');



class UserProfile_Controller extends MY_Controller

{

    public function index(){

        $this->load->view('Users/UserLogin');

    }



    public function regPage()

    {

        $this->load->view('Users/userRegister');

    }



    public function register()

    {

        $config = array(

            array(

                'field' => 'email',

                'label' => 'Username',

                'rules' => 'required|is_unique[user_registration.email_id]',

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

            $userdata = array(

                'name' => $name,

                'email_id' => $email,

                'password' => $pass,

            );



            // loading the insertion model

            $this->load->model('registerModel');

            $username = $this->registerModel->insertData($userdata);

            if ($username) {



                $_SESSION['email_id'] = $username;

                $_SESSION['userLog'] = true;

                if(isset($_SESSION['callBy'])){

                    $callBy = $_SESSION['callBy'];

                    header('location:'.site_url($callBy));

                    unset($_SESSION['callBy']);

                } else {

                    header('location:'.site_url('userProfile_Controller/timeline'));

                }

            } else {

                header('location: regPage');

            }

        }else{

            $this->load->view('Users/userRegister');

        }

        

        

    }



    public function login()

    {



        $email_id = $this->input->post('email');

        $password = $this->input->post('password');





        $this->load->model('loginModel');

        $confirmed = $this->loginModel->isValid($email_id, $password);

        if ($confirmed) {

            $_SESSION['email_id'] = $confirmed;

            $_SESSION['userLog'] = true;

            if(isset($_SESSION['callBy'])){

                $callBy = $_SESSION['callBy'];

                header('location:'.site_url($callBy));

                unset($_SESSION['callBy']);

            }else{

                header('location: ' . site_url('userProfile_Controller/timeline'));

            }

            

        } else {

            header('location: ' . site_url('userProfile_Controller/index'));

        }

    }



    public function logout()

    {



        unset($_SESSION['email_id']);

        unset($_SESSION['userLog']);

        header('location: ' . site_url());

    }



    public function viewProfile()

    {

        $email = $_SESSION['email_id'];

        $this->load->model('userProfile_Model');

        $userData = $this->userProfile_Model->getData($email);



        if ($userData) {

            $this->load->view('userprofile', $userData);

        } else {

            echo "error" . $_SESSION['email_id'];

        }

    }



    public function viewOffers(){

        $this->load->model('appointment_Model');

        $data = $this->appointment_Model->getOffers();

        if($data){

            // echo '<pre>';

            // print_R($data);

            // die;

            $filters = $this->review_Model->reviewfilterCategory();

            $data['filters'] = $filters;

            $this->load->view('Users/offers', $data);

        }

    }



    public function reviews()

    {

        $this->load->model('review_Model');

        $data = $this->review_Model->getreviews();

        if ($data) {

            $reviewCount = 0;

            $reviews = array();

            foreach ($data['hosRev'] as $x) {

                $reviews[$reviewCount] = $x;

                $reviewCount += 1;

            }

            foreach ($data['depRev'] as $x) {

                $reviews[$reviewCount] = $x;

                $reviewCount += 1;

            }

            foreach ($data['docRev'] as $x) {

                $reviews[$reviewCount] = $x;

                $reviewCount += 1;

            }

            function date_compare($a, $b)

            {

                $t1 = strtotime($a['datetime']);

                $t2 = strtotime($b['datetime']);

                return $t1 - $t2;

            }

            usort($reviews, 'date_compare');

            $reviews = array_reverse($reviews);

            $filters = $this->review_Model->reviewfilterCategory();



            $data = array(

                'reviews' => $reviews,

                'filters' => $filters

            );

            // echo '<pre>';

            // print_R($data['reviews']);

            // die;

            $this->load->view('Users/reviews', $data);

        } else {

            echo '<script>alert("Database Error")</script>';

        }

    }

    public function compare()

    {

        $this->load->model('hospital_Model');

        $data = $this->hospital_Model->topHos();

        if ($data) {

            // echo '<pre>';

            // print_R($data);

            // die;

            $data['userAddress'] = $this->get_client_address();

            $data['filters'] = $this->review_Model->reviewfilterCategory();

            $this->load->view('Users/compare', $data);

        }

    }

    public function compareSelected()

    {

        if ($this->input->post()) {

            $hos_id = array();

            $dept_id = array('dept006', 'dept005', 'dept008', 'dept004');

            $hos_id = explode(',', $this->input->post('hospitals'));

            sort($hos_id);

            $this->load->model('hosCompare_Model');

            $addressFrom = $this->get_client_address();

            //$addressFrom = 'Bosepukur, Kolkata, West Bengal';

            $data['distance'] = array();

            $data['overview'] = $this->hosCompare_Model->overviewData($hos_id);

            foreach ($data['overview'] as $x) {

                $addressTo = $x['city'] . ',' . $x['state'] . ',' . $x['country'] . ',' . $x['zip'];

                $distance = $this->getDistance($addressFrom, $addressTo, "K");

                array_push($data['distance'], $distance);

            }

            $data['overallRating'] = $this->hosCompare_Model->overallRating($hos_id);

            $data['departments'] = $this->hosCompare_Model->departmentCompare($hos_id, $dept_id);

            $data['emc'] = $this->hosCompare_Model->availableEmc($hos_id);

            if ($data) {

                $this->load->view('Users/compareHos', $data);

            }

            // print_R($data['distance']);

            // $this->load->view('Users/compareHos');

        }

    }

    public function fetchdept()

    {

        if ($this->input->get('q')) {

            echo $this->review_Model->fetchDept($this->input->get('q'));

        }

    }

    public function fetchtreat()

    {

        if ($this->input->get('q')) {

            echo $this->review_Model->fetchTreat($this->input->get('q'));

        }

    }

    public function postRevOnSlctdHos()

    {

        

        $hos_id = $this->uri->segment(3);



        $_SESSION['email_id'] = 'example@gm.com';

        $email_id = $_SESSION['email_id'];

        $this->load->model('review_Model');

        $data = $this->review_Model->postData($email_id);

        if ($hos_id) {

            $data['selected'] = 'Hospital';

            $data['dataID'] = $hos_id;

        }

        $this->load->view('Users/post_review', $data);

    }

    public function postReview()

    {

        if (!$this->input->post()) {

            if(!isset($_SESSION['userLog'])){

                $_SESSION['loginMessage'] = 'You need to Login or Register first to post a Review!!';

                $_SESSION['callBy'] = 'userProfile_Controller/postReview';

                header('location:'.site_url('userProfile_Controller/index'));



            }else{

                $email_id = $_SESSION['email_id'];

                $this->load->model('review_Model');

                $data = $this->review_Model->postData($email_id);

                $this->load->view('Users/post_review', $data);

            }

        } else {

            if ($this->input->post('revname') == 'Hospital') {

                $data = array(

                    'hos_id' => $this->input->post('hos_id'),

                    'review_content' => $this->input->post('review_content'),

                    'review_title' => $this->input->post('review_title'),

                    'star_rating' => $this->input->post('star_rating'),

                    'email_id' => $_SESSION['email_id'],

                    'datetime' => date('Y-m-d H:i:s'),

                );

                if ($_FILES['document']['name']) {

                    $config['upload_path'] = './userUploads/';

                    $config['allowed_types'] = 'gif|jpg|png|pdf|csf';





                    $this->load->library('upload', $config);



                    if (!$this->upload->do_upload('document')) {

                        $error = array('error' => $this->upload->display_errors());

                        $_SESSION['error'] = $error;

                    } else {

                        $upload_data = $this->upload->data();

                        $image_path = base_url('userUploads/' . $upload_data['file_name']);

                        $data['document'] = $image_path;

                    }

                }

                if ($this->input->post('id_proof')) {

                    $data['id_proof'] = $this->input->post('id_proof');

                }

                $this->load->model('review_Model');

                $confirmed = $this->review_Model->postReview($data, $this->input->post('revname'));

                if ($confirmed) {

                    header('location: reviews');

                } else {

                    header('location: postReview');

                }

            } elseif ($this->input->post('revname') == 'Doctor') {

                $data = array(

                    'doc_id' => $this->input->post('doc_id'),

                    'review_content' => $this->input->post('review_content'),

                    'review_title' => $this->input->post('review_title'),

                    'star_rating' => $this->input->post('star_rating'),

                    'email_id' => $_SESSION['email_id'],

                    'datetime' => date('Y-m-d H:i:s'),

                );

                if ($_FILES['document']['name']) {

                    $config['upload_path'] = './userUploads/';

                    $config['allowed_types'] = 'gif|jpg|png|pdf|csf';





                    $this->load->library('upload', $config);



                    if (!$this->upload->do_upload('document')) {

                        $error = array('error' => $this->upload->display_errors());

                        $_SESSION['error'] = $error;

                    } else {

                        $upload_data = $this->upload->data();

                        $image_path = base_url('userUploads/' . $upload_data['file_name']);

                        $data['document'] = $image_path;

                    }

                }

                if ($this->input->post('id_proof')) {

                    $data['id_proof'] = $this->input->post('id_proof');

                }

                $this->load->model('review_Model');

                $confirmed = $this->review_Model->postReview($data, $this->input->post('revname'));

                if ($confirmed) {

                    header('location: reviews');

                } else {

                    header('location: postReview');

                }

            } elseif ($this->input->post('revname') == 'Department') {

                $data = array(

                    'hos_id' => $this->input->post('hos_id'),

                    'dept_id' => $this->input->post('dept_id'),

                    'review_content' => $this->input->post('review_content'),

                    'review_title' => $this->input->post('review_title'),

                    'star_rating' => $this->input->post('star_rating'),

                    'email_id' => $_SESSION['email_id'],

                    'datetime' => date('Y-m-d H:i:s'),

                );

                if ($_FILES['document']['name']) {

                    $config['upload_path'] = './userUploads/';

                    $config['allowed_types'] = 'gif|jpg|png|pdf|csf';





                    $this->load->library('upload', $config);



                    if (!$this->upload->do_upload('document')) {

                        $error = array('error' => $this->upload->display_errors());

                        $_SESSION['error'] = $error;

                    } else {

                        $upload_data = $this->upload->data();

                        $image_path = base_url('userUploads/' . $upload_data['file_name']);

                        $data['document'] = $image_path;

                    }

                }

                if ($this->input->post('id_proof')) {

                    $data['id_proof'] = $this->input->post('id_proof');

                }

                $this->load->model('review_Model');

                $confirmed = $this->review_Model->postReview($data, $this->input->post('revname'));

                if ($confirmed) {

                    header('location: reviews');

                } else {

                    header('location: postReview');

                }

            } elseif ($this->input->post('revname') == 'Treatment') {

                $data = array(

                    'hos_id' => $this->input->post('hos_id'),

                    'treat_id' => $this->input->post('treat_id'),

                    'review_content' => $this->input->post('review_content'),

                    'review_title' => $this->input->post('review_title'),

                    'star_rating' => $this->input->post('star_rating'),

                    'email_id' => $_SESSION['email_id'],

                    'datetime' => date('Y-m-d H:i:s'),

                );

                if ($_FILES['document']['name']) {

                    $config['upload_path'] = './userUploads/';

                    $config['allowed_types'] = 'gif|jpg|png|pdf|csf';





                    $this->load->library('upload', $config);



                    if (!$this->upload->do_upload('document')) {

                        $error = array('error' => $this->upload->display_errors());

                        $_SESSION['error'] = $error;

                    } else {

                        $upload_data = $this->upload->data();

                        $image_path = base_url('userUploads/' . $upload_data['file_name']);

                        $data['document'] = $image_path;

                    }

                }

                if ($this->input->post('id_proof')) {

                    $data['id_proof'] = $this->input->post('id_proof');

                }

                $this->load->model('review_Model');

                $confirmed = $this->review_Model->postReview($data, 'Hospital');

                if ($confirmed) {

                    header('location: reviews');

                } else {

                    header('location: postReview');

                }

            } elseif ($this->input->post('revname') == 'Disease') {

                if ($this->input->post('hos_id')) {

                    $data = array(

                        'hos_id' => $this->input->post('hos_id'),

                        'dis_id' => $this->input->post('dis_id'),

                        'review_content' => $this->input->post('review_content'),

                        'review_title' => $this->input->post('review_title'),

                        'star_rating' => $this->input->post('star_rating'),

                        'email_id' => $_SESSION['email_id'],

                        'datetime' => date('Y-m-d H:i:s'),

                    );

                } elseif ($this->input->post('doc_id')) {

                    $data = array(

                        'doc_id' => $this->input->post('doc_id'),

                        'dis_id' => $this->input->post('dis_id'),

                        'review_content' => $this->input->post('review_content'),

                        'review_title' => $this->input->post('review_title'),

                        'star_rating' => $this->input->post('star_rating'),

                        'email_id' => $_SESSION['email_id'],

                        'datetime' => date('Y-m-d H:i:s'),

                    );

                }

                if ($_FILES['document']['name']) {

                    $config['upload_path'] = './userUploads/';

                    $config['allowed_types'] = 'gif|jpg|png|pdf|csf';





                    $this->load->library('upload', $config);



                    if (!$this->upload->do_upload('document')) {

                        $error = array('error' => $this->upload->display_errors());

                        $_SESSION['error'] = $error;

                    } else {

                        $upload_data = $this->upload->data();

                        $image_path = base_url('userUploads/' . $upload_data['file_name']);

                        $data['document'] = $image_path;

                    }

                }

                if ($this->input->post('id_proof')) {

                    $data['id_proof'] = $this->input->post('id_proof');

                }

                $this->load->model('review_Model');

                if ($this->input->post('hos_id')) {

                    $confirmed = $this->review_Model->postReview($data, 'Hospital');

                } elseif ($this->input->post('doc_id')) {

                    $confirmed = $this->review_Model->postReview($data, 'Doctor');

                }

                if ($confirmed) {

                    header('location: reviews');

                } else {

                    echo "POST coudnt possible";

                }

            }

        }

    }

    public function recommendMe()

    {

        if (!$this->input->post()) {

            $this->load->model('recommend_Model');

            $data = $this->recommend_Model->getData();

            if ($data) {

                $this->load->view('Users/recommend_me', $data);

            } else {

                echo 'prob';

            }

        } else {

            if ($this->input->post('action') == 'search') {

                $treat_id = $this->input->post('treat_id');

                $budget = $this->input->post('budget');

                $adDiv = '';

                $this->load->model('recommend_Model');

                $data1 = $this->recommend_Model->searchData($treat_id, $budget);

                

                if ($data1) {

                    $data = $this->hospitalView_Model->fetchAd();

                    // echo 'search found';

                    if($data){

                        $adDiv = '<li class="bc-banner text-center mb-2">

                        <a href="">

                        <!-- <div class="bc-banner-header">

                            <img src="'.base_url('images/AAHRS_logo5.png').'" alt="HubSpot Marketing Free" width="100">

                        </div> -->

                        <div class="bc-banner-body">

                            <h2>'.$data[0]['ad_title'].'</h2> 

                            <p>'.$data[0]['ad_desc'].'</p>

                            <span class="btn btn-primary">Visit Profile</span>

                        </div>

                        <img src="'.base_url('images/dd.jpg').'" alt="aahrs" class="bc-banner-cover img-responsive">

                        </a>

                    </li>';

                    }

                    $output = '';

                    $rank = 1;

                    $count = sizeof($data1);

                    

                    foreach($data1 as $x){

                        $sup = '';

                        if ($rank == 1) {

                            $sup = 'st';

                        } else if ($rank == 2) {

                            $sup = 'nd';

                        } else if ($rank == 3) {

                            $sup = 'rd';

                        } else if ($rank <= 10) {

                            $sup = 'th';

                        }

                        if ($rank <= 10){

                            $ranking = '<div style="font-style: italic; font-family: Trebuchet MS; font-size:large;" class="ribbon-'. $rank .' expandable">'.$rank . '<sup>' . $sup . '</sup></div> ';}

                        if ($x['spoc'] != 0) {

                           $contact = '<p class="text-dark">SPOC: '. $x['spoc'] . '<br>' . $x['spoc_no'] . ', ' . $x['spoc_email'] .'</p>';

                        }else { 

                            $contact = '<p class="text-dark">Phone:'. $x['phone'] . '<br>Email: ' . $x['email_id'].' </p>';

                        } 

                        

                        $output .= '<li class="booking-card" style="background-image: url('. base_url('images/' . $x['logo']).');background-repeat: no-repeat;background-position: 0px 0px;background-size: 220px 220px;">'.$ranking.'

                        <div class="book-container">

                                 <div class="content">

                                     <a href="'.site_url('hospital_Controller/recHospital/' . $x['hos_id']).'" class="btn">View Details</a>

                                 </div>

                             </div>

                             <div class="informations-container">

                                 <h2 class="title"><a href="'.site_url('hospital_Controller/recHospital/' . $x['hos_id']).'">'. $x['hos_name'] .'</a> <small>'.$x['city'].'</small></h2>

                                 <div class="d-flex pt-2 justify-content-between">

                                     <div class="my-auto">

                                         <p class="text-center"><strong style="font-size: 15px;">' . $x['totalRate'] . ' Reviews</strong></p>

                                     </div>

                                     <div class="">

                                         <p class="text-center mb-1">' . round($x['avr'], 1) . ' out of 5</p>

                                         <span class="text-center">

                                             <div id="rateYo' . $x['hos_id'] . '"></div>

                                         </span>

                                     </div>

                                 </div>

                                 <div class="more-information row">

                                     <p class="sub-title mb-0 col-12" style="font-size: 14px;">' . $x['treat_name'] . ' Treatment</p>

                                     <p class="price col-12 mt-0">Budget:&nbsp;&nbsp;<svg class="icon" style="width:20px;height:20px" viewBox="0 0 24 24">

                                             <path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z" />

                                         </svg>' . $x['budget'] . '&nbsp;<i class="fas fa-rupee-sign fa-sm"></i></p>



                                     <div class=" mx-auto">



                                         <form action="' . site_url('appointment_Controller/hosAppointment') . '" method="post">

                                             <input type="hidden" name="hos_id"  value="' . $x['hos_id'] . '">

                                             <input type="hidden" name="dept_id"  value="' . $x['dept_id'] . '">

                                             <a href="' . site_url('MainController/viewHospital/' . $x['hos_id']) . '" class="btn btn-sm mb-1 btn-primary btn-block" style="">View Profile</a>

                                             <button type="submit" name="submit" class="btn btn-sm btn-danger btn-block">Book Appointment</button>

                                         </form>

                                     </div>

                                 </div>

                             </div>

                         </li>

                         <script>

                         $(function() {

                           

                                $("#rateYo' . $x['hos_id'] . '").rateYo({

                                    rating: ' . round($x['avr'], 1) . ',

                                    readOnly: true,

                                    starWidth: "15px",

                                    spacing: "2px"

                                });

                           

                        });

                         </script>';

                        if ($rank == 4 || $rank == $count) {

                            $output .= $adDiv;

                        }

                        $rank++;

                    }

                    echo $output;

                }

            } else {

                echo 'No Data Found';

            }

        }



        //

    }





    

    public function fetchRev()

    {

        if (isset($_POST['action'])) {

            $hos_id = NULL;

            $dept_id = NULL;

            $doc_id = NULL;

            $highRate = NULL;

            $lowRate = NULL;

            if (isset($_POST['hos_id']))

                $hos_id = $_POST['hos_id'];

            if (isset($_POST['dept_id']))

                $dept_id = $_POST['dept_id'];

            if (isset($_POST['doc_id']))

                $doc_id = $_POST['doc_id'];

            if (isset($_POST['highRate']))

                $highRate = $_POST['highRate'];

            if (isset($_POST['lowRate']))

                $lowRate = $_POST['lowRate'];

            echo $this->review_Model->filterData($hos_id, $dept_id, $doc_id, $highRate, $lowRate);

        }

    }

    public function fetchDoc()

    {

        if (isset($_POST['action'])) {

            $hos_id = NULL;

            $dept_id = NULL;

            if (isset($_POST['hos_id']))

                $hos_id = $_POST['hos_id'];

            if (isset($_POST['dept_id']))

                $dept_id = $_POST['dept_id'];

            echo $this->review_Model->filterDoc($hos_id, $dept_id);

        }

    }

    public function fetchHos()

    {

        if (isset($_POST['action'])) {

            $budget = NULL;

            $rate = NULL;

            $treat_id = $_POST['treat_id'];

            if (isset($_POST['budget']))

                $budget = $_POST['budget'];

            if (isset($_POST['rating']))

                $rate = $_POST['rating'];

            echo $this->review_Model->filterHosData($treat_id, $rate, $budget);

        }

    }

    public function fetchTopHos()

    {

        if (isset($_POST['action'])) {

            $dept_id = NULL;

            if (isset($_POST['dept_id']))

                $dept_id = $_POST['dept_id'];

            echo $this->review_Model->filterTopHos($dept_id);

        }

    }

    public function fetchCompHos()

    {

        if (isset($_POST['action'])) {

            $dept_id = NULL;

            $treat_id = NULL;

            $star_rate = NULL;

            $selectedHos = NULL;

            $highRate = NULL;

            $lowRate = NULL;

            $emc = NULL;

            $search = NULL;

            $location = NULL;

            if (isset($_POST['dept_id']))

                $dept_id = $_POST['dept_id'];

            if (isset($_POST['treat_id']))

                $treat_id = $_POST['treat_id'];

            if (isset($_POST['star_rate']))

                $star_rate = $_POST['star_rate'];

            if (isset($_POST['highRate']))

                $highRate = $_POST['highRate'];

            if (isset($_POST['lowRate']))

                $lowRate = $_POST['lowRate'];

            if (isset($_POST['emc']))

                $emc = $_POST['emc'];

            if (isset($_POST['selectedHos']))

                $selectedHos = $_POST['selectedHos'];

            if (isset($_POST['search']))

                $search = $_POST['search'];

            if (isset($_POST['location']))

                $location = $_POST['location'];

            echo $this->review_Model->filterCompHos($dept_id,$treat_id,$star_rate,$highRate,$lowRate,$emc,$selectedHos,$search,$location);

        }

    }

    public function get_client_address() {

		$ipaddress = '';

		if (getenv('HTTP_CLIENT_IP'))

			$ipaddress = getenv('HTTP_CLIENT_IP');

		else if(getenv('HTTP_X_FORWARDED_FOR'))

			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');

		else if(getenv('HTTP_X_FORWARDED'))

			$ipaddress = getenv('HTTP_X_FORWARDED');

		else if(getenv('HTTP_FORWARDED_FOR'))

			$ipaddress = getenv('HTTP_FORWARDED_FOR');

		else if(getenv('HTTP_FORWARDED'))

		   $ipaddress = getenv('HTTP_FORWARDED');

		else if(getenv('REMOTE_ADDR'))

			$ipaddress = getenv('REMOTE_ADDR');

		else

			$ipaddress = 'UNKNOWN';

		// echo $ipaddress;

        $ip = $ipaddress;



        // Use JSON encoded string and converts

        // it into a PHP variable

        $ipdat = @json_decode(file_get_contents(

            "http://www.geoplugin.net/json.gp?ip=" . $ip

        ));



        /* echo 'Country Name: ' . $ipdat->geoplugin_countryName . "\n";

        echo 'City Name: ' . $ipdat->geoplugin_city . "\n";

        echo 'Continent Name: ' . $ipdat->geoplugin_continentName . "\n";

        echo 'Latitude: ' . $ipdat->geoplugin_latitude . "\n";

        echo 'Longitude: ' . $ipdat->geoplugin_longitude . "\n";

        echo 'Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "\n";

        echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n";

        echo 'Timezone: ' . $ipdat->geoplugin_timezone; */



       $address = $ipdat->geoplugin_city;



        return $address;

	}

    public function getDistance($addressFrom, $addressTo, $unit = ''){

		// Google API key AIzaSyDBdT11tFFlQfhyo6nB6uaYPM1w_CmYUNU

		$apiKey = 'AIzaSyDBdT11tFFlQfhyo6nB6uaYPM1w_CmYUNU';

		

		// Change address format

		$formattedAddrFrom    = str_replace(' ', '+', $addressFrom);

		$formattedAddrTo     = str_replace(' ', '+', $addressTo);

		

		// Geocoding API request with start address

		$geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);

		$outputFrom = json_decode($geocodeFrom);

		if(!empty($outputFrom->error_message)){

			return $outputFrom->error_message;

		}

		

		// Geocoding API request with end address

		$geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);

		$outputTo = json_decode($geocodeTo);

		if(!empty($outputTo->error_message)){

			return $outputTo->error_message;

		}

		

		// Get latitude and longitude from the geodata

		$latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;

		$longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;

		$latitudeTo        = $outputTo->results[0]->geometry->location->lat;

		$longitudeTo    = $outputTo->results[0]->geometry->location->lng;

		

		// Calculate distance between latitude and longitude

		$theta    = $longitudeFrom - $longitudeTo;

		$dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));

		$dist    = acos($dist);

		$dist    = rad2deg($dist);

		$miles    = $dist * 60 * 1.1515;

		

		// Convert unit and return distance

		$unit = strtoupper($unit);

		if($unit == "K"){

			return round($miles * 1.609344, 2).' km';

		}elseif($unit == "M"){

			return round($miles * 1609.344, 2).' meters';

		}else{

			return round($miles, 2).' miles';

		}

	}

	/* $addressFrom = 'Chowbaga Road, Anandapur

	PO:East Kolkata Township, Kolkata 700 107';

	$addressTo   = 'Kolkata, West Bengal';



	// Get distance in km

	$distance = getDistance($addressFrom, $addressTo, "K");

	echo $distance; */

    public function edit()

    {

        $email = $_SESSION['email_id'];

        $this->load->model('userProfile_Model');

        $userData = $this->userProfile_Model->getData($email);



        if ($userData) {

            $this->load->view('editprofile', $userData);

        } else {

            echo "error" . $_SESSION['email_id'];

        }

    }



    public function editProfile()

    {



        $config['upload_path'] = './userUploads/';

        $config['allowed_types'] = 'gif|jpg|png';





        $this->load->library('upload', $config);



        if (!$this->upload->do_upload('proPic')) {

            $error = array('error' => $this->upload->display_errors());

            $this->load->view('editprofile', $error);

        } else {

            $upload_data = $this->upload->data();

            $image_path = base_url('userUploads/' . $upload_data['file_name']);



            $newData = array(

                'name' => $this->input->post('newName'),

                'password' => $this->input->post('newPass'),

                'email_id' => $_SESSION['email_id'],

                'picture' => $image_path,

            );



            $this->load->model('userProfile_Model');

            $userdata = $this->userProfile_Model->updateData($newData);

            if ($userdata) {

                header('location:viewProfile');

            } else {

                header('location:edit');

            }

        }

    }



    /* public function fetchSlot()

    {

    } */





    public function top_hospitals()

    {

        $filters = $this->review_Model->reviewfilterCategory();

        $this->load->model('hospital_Model');

        $data = $this->hospital_Model->topHos();

        // echo '<pre>';

        // print_r($data);

        // die;

        if ($data) {

            $data['filters'] = $filters;

            $this->load->view('Users/top_hospitals', $data);

        } else {

            echo 'error';

        }

    }

    public function top_doctors()

    {

        $filters = $this->review_Model->reviewfilterCategory();

        $this->load->model('doctors_Model');

        $data = $this->doctors_Model->topDoc();

        // echo '<pre>';

        // print_r($data);

        if ($data) {

            $data['filters'] = $filters;

            // echo '<pre>';

            // print_r($data['filter']);

            $this->load->view('Users/top_doctors', $data);

        } else {

            echo 'error';

        }

    }

    public function timeline()

    {

        $filters = $this->review_Model->reviewfilterCategory();

        $this->load->model('hospitalView_Model');

        $data = $this->hospitalView_Model->hosData();

        // echo '<pre>';

        // print_r($data);

        // die;

        if ($data) {

            $data['filters'] = $filters;

            $this->load->view('Users/timeline', $data);

        } else {

            echo 'error';

        }

    }

}

