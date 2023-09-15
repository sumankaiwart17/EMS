<?php
defined('BASEPATH') or exit('No direct script access allowed');



class UserProfile_Controller extends MY_Controller
{
    public function changepass()
    {
        $layout = 3;
        // layout = 0 -->My Account
        // layout = 3 -->Change Password
        $email = $_SESSION['email_id'];
        if (!$this->input->post()) {
            $this->load->model('userProfile_Model');
            $userpass = $this->userProfile_Model->getPass($email);
            $data['userpass'] = $userpass;
            $data['layout'] = $layout;
            $this->load->view('Users/myaccount', $data);
        } else {
            $search = array(
                'email_id' => $this->input->post('email'),
            );
            $data = array(
                'password' => $this->input->post('password'),

            );
            $this->load->model('userProfile_Model');
            $confirmed = $this->userProfile_Model->putPass($search, $data);
            if ($confirmed) {
                header('location:' . site_url('UserProfile_Controller/myaccount?id=' . $_SESSION['email_id'] . ''));
            } else {
                echo '<script>alert("Something went wrong! Try again.")</script>';
            }
        }
    }
  public function myaccount()
    {

        $layout = 0;
        // layout = 0 -->My Account
        // layout = 3 -->Change Password
        $pmail = $this->input->get('id');
        $email = $_SESSION['email_id'];

        if (!$this->input->post()) {

            $userData = $this->db->select('*')
                ->from('user_details')
                ->where(['email_id' => $pmail])
                ->get()
                ->result_array();

            $data['userdata'] = $userData;
            if ($userData) {

                $_SESSION['sesid'] = $email;
                $_SESSION['getid'] = $pmail;
                $data['layout'] = $layout;

                $this->load->view('Users/myaccount', $data);
            } else {

                // echo "error" . $_SESSION['email_id'];
                $this->load->view('Users/UserLogin');
            }
        }
      
         else {
            
            
        $search = array(
                
              'email_id' => $this->input->post('email_id'),
            );
          
            if ($_FILES['picture']['name']) {
                $config['upload_path'] = './userUploads/';
                $config['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('picture')) {
                   
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('Users/myaccount', $error);
                } else {
                    $upload_data = $this->upload->data();
                    $image_path = base_url('userUploads/' . $upload_data['file_name']);
                 
                    $data = array(
                        'picture' => $image_path,
                        'name' => $this->input->post('name'),
                        'country' => $this->input->post('country'),
                        'state' => $this->input->post('state'),
                        'city' => $this->input->post('city'),
                        'zip' => $this->input->post('zip'),
                        'phone' => $this->input->post('phone'),
                        'dob' => $this->input->post('dob'),
                        'gender' => $this->input->post('gender'),
                        'blood_group' => $this->input->post('blood_group'),
                        'about' => $this->input->post('about'),
                    );

                    // echo"<pre>";
                    //    print_r($data);
                    // echo"</pre>";
                    // die;

                }
            } else {
                $data = array(
                    'name' => $this->input->post('name'),
                    'country' => $this->input->post('country'),
                    'state' => $this->input->post('state'),
                    'city' => $this->input->post('city'),
                    'zip' => $this->input->post('zip'),
                    'phone' => $this->input->post('phone'),
                    'dob' => $this->input->post('dob'),
                    'gender' => $this->input->post('gender'),
                    'blood_group' => $this->input->post('blood_group'),
                    'about' => $this->input->post('about'),
                );



            }
        //  echo "<pre>";
        //  print_r($search);
        //  print_r($data);
        //  die;
            $this->load->model('userProfile_Model');
            $confirmed = $this->userProfile_Model->upUserData($search, $data);
            //  echo "<pre>";
            // print_r($confirmed);
            // die;
            if ($confirmed) {

                header('location:' . site_url('userProfile_Controller/myaccount?id=' . $_SESSION['email_id'] . ''));
            } else {
                $_SESSION['loginMessage'] = 'You need to Login or Register first ';
                header('location:' . site_url('userProfile_Controller/login'));
            }
        }

    }
       
    public function medicalHis()
    {
        $layout = 0;
        // layout = 0 -->view page
        // layout = 1 -->add page
        // layout = 2 -->edit page
        $search = array(
            'email_id' => $_SESSION['email_id'],
        );
        $this->load->model('userProfile_Model');
        $docs = $this->userProfile_Model->gethis($search);
        $data['docs'] = $docs;
        $data['layout'] = $layout;
        $this->load->view('Users/medicalhis', $data);
    }
    public function editHis()
    {
        $layout = 2;
        // layout = 0 -->view page
        // layout = 1 -->add page
        // layout = 2 -->edit page
        if (!$this->input->post()) {
            $search = array(
                'email_id' => $_SESSION['email_id'],
                'id' => $this->uri->segment(3),
            );
            $this->load->model('userProfile_Model');
            $docs = $this->userProfile_Model->gethis($search);
            $data['docs'] = $docs;
            $data['layout'] = $layout;
            // echo "<pre>";
            // print_r($data);
            // die;
            $this->load->view('Users/medicalhis', $data);
        } else {
            $search = array(
                'email_id' => $_SESSION['email_id'],
                'id' => $this->input->post('id'),
            );
            $data = array(
                'Name' => $this->input->post('Name'),
                'date' => $this->input->post('date'),
            );
            // echo "<pre>";
            // print_r($data);
            // die;
            $this->load->model('userProfile_Model');
            $confirmed = $this->userProfile_Model->updatehis($search, $data);
            if ($confirmed) {
                header('location:' . site_url('userProfile_Controller/medicalHis'));
            } else {
                echo '<script>alert("Something went wrong! Try again.")</script>';
            }
        }
    }
    public function delHis()
    {
        $search = array(
            'email_id' => $_SESSION['email_id'],
            'id' => $this->uri->segment(3),
        );
        $this->load->model('userProfile_Model');
        $confirmed = $this->userProfile_Model->delmhis($search);
        if ($confirmed) {
            header('location:' . site_url('userProfile_Controller/medicalHis'));
        } else {
            echo '<script>alert("Something went wrong! Try again.")</script>';
        }
        // echo "<pre>";
        // print_r($search);
        // die;
    }
    public function addmedicalHis()
    {
        $layout = 1;
        // layout = 0 -->view page
        // layout = 1 -->add page
        // layout = 2 -->edit page
        if (!$this->input->post()) {
            $data['layout'] = $layout;
            $this->load->view('Users/medicalhis', $data);
        } else {
            $email = $_SESSION['email_id'];
            $type = $this->input->post('type');
            $date = $this->input->post('date');
            // echo "<pre>";
            // print_r($_FILES);
            // die;
            foreach ($_FILES['document']['name'] as $key => $val) {

                if ($_FILES['document']['type'][$key] == 'image/png' || $_FILES['document']['type'][$key] == 'image/jpeg' || $_FILES['document']['type'][$key] == 'application/pdf') {
                    move_uploaded_file($_FILES['document']['tmp_name'][$key], './userUploads/' . $val);
                    $data = array(
                        'email_id' => $email,
                        'type' => $type,
                        'Name' => $val,
                        'report_prescription' => 'userUploads/' . $val,
                        'date' => $date,
                    );
                    // echo "<pre>";
                    // print_r($data);
                    // die;
                    $this->db->insert('user_medical_history', $data);
                } else {
                    echo '<script>alert("Something went wrong! Try again.")</script>';
                }
                header('location:' . site_url('userProfile_Controller/medicalHis'));
            }
        }
    }
    public function saveComment()
    {
        $data = array(
            'comment' => $this->input->post('comment'),
            'email_id' => $this->input->post('email_id'),
            'post_id' => $this->input->post('post_id'),
            'comment_time' => date('Y-m-d H:i:s')
        );
        // $search = array();

        $this->db->insert('post_likes_comment_share', $data);

        // print_r($data);

        $q = $this->db->select('*')->from('post_likes_comment_share')->join('user_details', 'user_details.email_id = post_likes_comment_share.email_id')->order_by("post_likes_comment_share.id", "desc")->limit(1)->get()->result_array();

        // print_r($q);

        if ($q[0]['picture'] != '') {
            $image = $q[0]['picture'];
        } else {
            $image = base_url('images/avatar.png');
        }

        echo '<li class="comment user-comment">

            <div class="info">
                <a href="#">' . $q[0]['name'] . '</a>
                <span><small>' . $q[0]['comment_time'] . '</small></span>
            </div>

            <a class="avatar" href="#">

                    <img src="' . $image . '" width="35" alt="Profile Avatar" title="' . $q[0]['name'] . '" />

            </a>

            <p>' . $q[0]['comment'] . '</p>

        </li>';
    }
    public function savePreference()
    {
        $treat = $this->input->post('treat');
        $dept = $this->input->post('dept');
        $disease = $this->input->post('disease');
        $email = $this->input->post('email');
        // echo $treat . ',' . $dept . ',' . $disease . ',' . $email;
        $data =  array(
            'treatment' => $treat,
            'disease' => $disease,
            'department' => $dept
        );

        $this->db->where('email_id', $email)->update('user_details', $data);
        echo "success";
    }
    public function index()
    {
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

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run()) {
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
                if (isset($_SESSION['callBy'])) {
                    $callBy = $_SESSION['callBy'];
                    header('location:' . site_url($callBy));
                    unset($_SESSION['callBy']);
                } else {
                    // $this->load->view('Users/timeline');
                    header('location: ' . site_url('user/timeline'));
                }
            } else {
                header('location: regPage');
            }
        } else {
            $this->load->view('Users/userRegister');
        }
    }

    public function checkLikes()
    {
        $search = $this->input->post();
        $q = $this->db->where($search)->get('post_likes_comment_share')->result_array();
        if ($q != NULL) {
            if ($q[0]['likes'] == 1)
                echo 'liked';
            else
                echo 'notliked';
        } else {
            echo 'notliked';
        }
    }

    public function postLiked()
    {
        $search = $this->input->post();
        // print_r($search);
        $q = $this->db->where($search)->get('post_likes_comment_share')->result_array();
        if ($q != NULL) {
            $data = array(
                'likes' => 1
            );
            $this->db->where($search)->update('post_likes_comment_share', $data);
        } else {
            $data = array(
                'email_id' => $search['email_id'],
                'post_id' => $search['post_id'],
                'likes' => 1
            );
            $this->db->insert('post_likes_comment_share', $data);
        }
    }

    public function postUnLiked()
    {
        $search = $this->input->post();
        $q = $this->db->where($search)->get('post_likes_comment_share')->result_array();
        if ($q != NULL) {
            $data = array(
                'likes' => 0
            );
            $this->db->where($search)->update('post_likes_comment_share', $data);
        }
    }

    // public function __construct()
    // {
    //     helper("form");
    // }
    public function login()
    {

        // helper(['form','url']);
        // $validation = \Config\Services::validation();
        // $check = $this->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
        // if(! $check)
        // {
        //     return view('userLogin',['validation'=> $this->validator]);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
        // }
        // else{
        //     header('location: ' . site_url('user/timeline'));
        // }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        //$this->form_validation->set_message('required','{field} must bbe filled')


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('Users/UserLogin');
            //header('location: ' . site_url('user/login-page'));

        } else {
            $email_id = $this->input->post('email');
            $password = $this->input->post('password');


            $this->load->model('loginModel');
            $confirmed = $this->loginModel->isValid($email_id, $password);
            if ($confirmed) {
                $_SESSION['email_id'] = $confirmed;
                $_SESSION['userLog'] = true;
                if (isset($_SESSION['callBy'])) {
                    $callBy = $_SESSION['callBy'];
                    header('location:' . site_url($callBy));
                    unset($_SESSION['callBy']);
                } else {
                    header('location: ' . site_url('user/timeline'));
                }
            } else {
                $data = $this->session->set_flashdata('status', 'Invalid credentials. Please try again.');
                header('location: ' . site_url('user/login-page', $data));
            }
            //     header('location: ' . site_url('user/index'));
        }
    }
    public function viewProfile()
    {
        $email_id = $_SESSION['email_id'];
        $this->load->model('userProfile_Model');
        $userData = $this->userProfile_Model->getData($email_id);

        if ($userData) {
            $this->load->view('userprofile', $userData);
        } else {
            echo "error" ;
        }
    }

    public function logout()
    {

        unset($_SESSION['email_id']);
        unset($_SESSION['userLog']);
        if (isset($_SESSION['token'])) {

            header('location: ' . site_url('Googlelogin/logout'));
        }
        header('location: ' . site_url());
    }


    public function viewOffers()
    {
        $this->load->model('Appointment_Model');
        $data = $this->Appointment_Model->getOffers();
        if ($data) {
            // echo '<pre>';
            // print_R($data);
            // die;
            $filters = $this->review_Model->reviewfilterCategory();
            $data['filters'] = $filters;
            $this->load->view('Users/offers', $data);
        } else {
            $this->load->view('Users/offers');
        }
    }

    public function  reviews()
    {
        $this->load->model('Review_Model');
        $data = $this->Review_Model->getreviews();
        // echo '<pre>';
        // print_R($data);
        // die;
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
            foreach ($data['treatRev'] as $x) {
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

            $this->load->view('Users/reviews', $data);
        } else {
            $this->load->view('Users/reviews');
        }
    }
    public function compare()
    {
        $this->load->model('hospital_Model');
        $data = $this->hospital_Model->topHos();
        if (isset($data['userAddress'])) {
            $data['userAddress'] = $this->get_client_address();
            $data['filters'] = $this->review_Model->reviewfilterCategory();
            // echo '<pre>';
            // print_R($data);
            // die;
            $this->load->view('Users/compare', $data);
        } else {
            $this->load->view('Users/compare', $data);
        }
    }
    public function compareSelected()
    {
        if ($this->input->post()) {
            $zip = $this->input->post('zip');
            $hos_id = array();
            $dept_id = array('dept006', 'dept005', 'dept008', 'dept004');
            $hos_id = explode(',', $this->input->post('hospitals'));
            foreach ($hos_id as $x) {
                $query = $this->db->select('*')
                    ->from('hoscompare_search')
                    ->where('hos_id', $x)
                    ->get();
                if ($query->num_rows()) {
                    $count = $query->row('count');
                    $count += 1;
                    $this->db->where('hos_id', $x)
                        ->update('hoscompare_search', array('count' => $count));
                } else {
                    $this->db->insert('hoscompare_search', array('hos_id' => $x));
                }
            }
            sort($hos_id);
            $this->load->model('hosCompare_Model');
           $addressFrom = $this->get_client_address();
             $addressFrom = 'Kolkata, West Bengal,' . $zip;
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
            $data['cleanRating'] = $this->hosCompare_Model->cleanRating($hos_id);
            $data['accomoRating'] = $this->hosCompare_Model->accomoRating($hos_id);
            $data['availRating'] = $this->hosCompare_Model->availRating($hos_id);
            $data['facilitieRating'] = $this->hosCompare_Model->facilitieRating($hos_id);

            // echo "<pre>";
            // print_r($data);
            // die;
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

    public function postRevOnSlctdHos($email_id)
    { 
              // print_r($hos_id);die;
     $email_id = $this->input->get('id');
//     print_r($email_id);
     $hos_id =$this->uri->segment(3);
    //
      // echo"<pre>";print_r($email_id);die;
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
            if (!isset($_SESSION['userLog'])) {
                $_SESSION['loginMessage'] = 'You need to Login or Register first to post a Review!!';
                $_SESSION['callBy'] = 'userProfile_Controller/postReview';
                header('location:' . site_url('userProfile_Controller/index'));
            } else {
                $email_id = $_SESSION['email_id'];

                $this->load->model('review_Model');
                $data = $this->review_Model->postData($email_id);

                $this->load->view('Users/post_review', $data);
            }
        } else {
            if ($this->input->post('revname') == 'Hospital') {
                // $hos_id = $this->uri->segment(3);
                $data = array(
                    'hos_id' => $this->input->post('hos_id'),
                    'review_content' => $this->input->post('review_content'),
                    'review_title' => $this->input->post('review_title'),
                    'star_rating' => $this->input->post('star_rating0'),
                    'star_rating_cleanliness' => $this->input->post('star_rating'),
                    'star_rating_accomodation' => $this->input->post('star_rating2'),
                    'star_rating_availability' => $this->input->post('star_rating3'),
                    'star_rating_facilities' => $this->input->post('star_rating4'),
                    'id_proof' => $this->input->post('id_proof'),

                    'email_id' => $_SESSION['email_id'],
                    'datetime' => date('Y-m-d H:i:s'),
                );
                // echo"<pre>";
                // print_r($data);die;

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
                // echo"<pre>";

                // print_r($confirmed);
                // echo"</pre>";
                // die;

                if ($confirmed) {
                    $_SESSION['review_posted'] = True;
                    header('location:' . site_url('userProfile_Controller/reviews'));
                } else {
                    header('location: postReview');
                }
            } elseif ($this->input->post('revname') == 'Doctor') {
                $data = array(
                    'doc_id' => $this->input->post('doc_id'),
                    'review_content' => $this->input->post('review_content'),
                    'review_title' => $this->input->post('review_title'),
                    'star_rating' => $this->input->post('star_rating0'),
                    'star_rating_promptness' => $this->input->post('star_rating5'),
                    'star_rating_bedside_manner' => $this->input->post('star_rating6'),
                    'star_rating_ontime' => $this->input->post('star_rating7'),
                    'star_rating_follow_up' => $this->input->post('star_rating8'),
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
                    $_SESSION['review_posted'] = True;
                    header('location:' . site_url('userProfile_Controller/reviews'));
                } else {
                    header('location: postReview');
                }
            } elseif ($this->input->post('revname') == 'Department') {
                $data = array(
                    'hos_id' => $this->input->post('hos_id'),
                    'dept_id' => $this->input->post('dept_id'),
                    'review_content' => $this->input->post('review_content'),
                    'review_title' => $this->input->post('review_title'),
                    'star_rating' => $this->input->post('star_rating0'),
                    'star_rating_dept_doctors_availability' => $this->input->post('star_rating9'),
                    'star_rating_department_facilities' => $this->input->post('star_rating10'),
                    'star_rating_medicine_availability' => $this->input->post('star_rating11'),
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
                    $_SESSION['review_posted'] = True;
                    header('location:' . site_url('userProfile_Controller/reviews'));
                } else {
                    header('location: postReview');
                }
            } elseif ($this->input->post('revname') == 'Treatment') {
                $data = array(
                    'hos_id' => $this->input->post('hos_id'),
                    'treat_id' => $this->input->post('treat_id'),
                    'review_content' => $this->input->post('review_content'),
                    'review_title' => $this->input->post('review_title'),
                    'star_rating' => $this->input->post('star_rating0'),
                    'star_rating_treatment_promptness' => $this->input->post('star_rating12'),
                    'star_rating_treatment_methodology' => $this->input->post('star_rating13'),
                    'star_rating_treatment_services' => $this->input->post('star_rating14'),
                    'star_rating_treatment_clinical_support' => $this->input->post('star_rating15'),
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
                $confirmed = $this->review_Model->postReview($data, 'Treatment');
                if ($confirmed) {
                    $_SESSION['review_posted'] = True;
                    header('location:' . site_url('userProfile_Controller/reviews'));
                } else {
                    header('location: postReview');
                }
            }
            // echo "<pre>"; print_r($data); die;  
            elseif ($this->input->post('revname') == 'Disease') {
                if ($this->input->post('hos_id')) {
                    $data = array(
                        'hos_id' => $this->input->post('hos_id'),
                        'dis_id' => $this->input->post('dis_id'),
                        'review_content' => $this->input->post('review_content'),
                        'review_title' => $this->input->post('review_title'),
                        'star_rating' => $this->input->post('star_rating0'),
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

    public function user_report()
    {
        // print_r($this->input->post());
        $data = array(
            'name' => $this->input->post('report_name'),
            'email' => $this->input->post('report_email'),
            'phone_no' => $this->input->post('report_phno'),
            'message' => $this->input->post('report_message'),
        );
        $this->db->insert('user_report_issues', $data);
        echo 'done';
    }

    public function user_contact()
    {
        $data = array(
            'name' => $this->input->post('contact-name'),
            'email' => $this->input->post('contact-email'),
            'phone' => $this->input->post('contact-phno'),
        );
        $this->db->insert('contact_me', $data);
        echo 'done';
    }

    public function recommendMe()
    {
        if (!$this->input->post()) {

            $this->load->model('recommend_Model');
            $data = $this->recommend_Model->getData();

            if ($this->input->get('t') && $this->input->get('b')) {
                $treat_id = $this->input->get('t');
                $budget = $this->input->get('b');
                //  echo $treat_id .'-'. $budget;

                $data['preSearch'] = array(
                    'treat_id' => $treat_id,
                    'budget' => $budget,
                );
                //   echo"<pre>";

                //   print_r($data);
                //   echo'</pre>';
                //   die;
            }
            if ($data) {

                $this->load->view('Users/recommend_me', $data);
            } else {

                $this->load->view('Users/recommend_me');
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
                    if ($data) {
                        $adDiv = '<li class="bc-banner text-center mb-2">
                        <a href="">
                        <!-- <div class="bc-banner-header">
                            <img src="' . base_url('images/AAHRS_logo5.png') . '" alt="HubSpot Marketing Free" width="100">
                        </div> -->
                        <div class="bc-banner-body">
                            <h2>' . $data[0]['ad_title'] . '</h2> 
                            <p>' . $data[0]['ad_desc'] . '</p>
                            <span class="btn btn-primary">Visit Profile</span>
                        </div>
                        <img src="' . base_url('images/dd.jpg') . '" alt="aahrs" class="bc-banner-cover img-responsive">
                        </a>
                    </li>';
                    }
                    $output = '';
                    $rank = 1;
                    $count = sizeof($data1);

                    foreach ($data1 as $x) {
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
                        if ($rank <= 10) {
                            $ranking = '<div style="font-style: italic; font-family: Trebuchet MS; font-size:large;" class="ribbon-' . $rank . ' expandable">' . $rank . '<sup>' . $sup . '</sup></div> ';
                        }
                        if ($x['spoc'] != 0) {
                            $contact = '<p class="text-dark">SPOC: ' . $x['spoc'] . '<br>' . $x['spoc_no'] . ', ' . $x['spoc_email'] . '</p>';
                        } else {
                            $contact = '<p class="text-dark">Phone:' . $x['phone'] . '<br>Email: ' . $x['email_id'] . ' </p>';
                        }

                        $output .= '<li class="booking-card" style="background-image: url(' . base_url('images/' . $x['logo']) . ');background-repeat: no-repeat;background-position: 0px 0px;background-size: 220px 220px;">' . $ranking . '
                        <div class="book-container">
                                 <div class="content">
                                     <a href="' . site_url('hospital_Controller/recHospital/' . $x['hos_id']) . '" class="btn">View Details</a>
                                 </div>
                             </div>
                             <div class="informations-container">
                                 <h2 class="title"><a href="' . site_url('hospital_Controller/recHospital/' . $x['hos_id']) . '">' . $x['hos_name'] . '</a> <small>' . $x['city'] . '</small></h2>
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
                                             <a href="' . site_url('mainController/viewHospital/' . $x['hos_id']) . '" class="btn btn-sm mb-1 btn-primary btn-block" style="">View Profile</a>
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
                } else {
                    echo "<label style='color:red'>Hospital not found </label>";
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
            $treat_id = NULL;
            if (isset($_POST['hos_id']))
                $hos_id = $_POST['hos_id'];
            if (isset($_POST['dept_id']))
                $dept_id = $_POST['dept_id'];
            if (isset($_POST['treat_id']))
                $treat_id = $_POST['treat_id'];
            if (isset($_POST['doc_id']))
                $doc_id = $_POST['doc_id'];
            if (isset($_POST['highRate']))
                $highRate = $_POST['highRate'];
            if (isset($_POST['lowRate']))
                $lowRate = $_POST['lowRate'];
         echo $this->review_Model->filterData($hos_id, $dept_id, $treat_id, $doc_id, $highRate, $lowRate);

           
        }
    }

    public function fetchDocName()
    {
        if (isset($_POST['action'])) { 
            $search=NULL;
                if (isset($_POST['search']))
                $search = $_POST['search'];
            echo $this->review_Model->filterDocName($search);
        }
    }
    public function fetchDoc()
    {
        if (isset($_POST['action'])) {
            $hos_id = NULL;
            $dept_id = NULL;
            $doc_name=NULL;
            if (isset($_POST['hos_id']))
                $hos_id = $_POST['hos_id'];
            if (isset($_POST['dept_id']))
                $dept_id = $_POST['dept_id'];
                if (isset($_POST['doc_name']))
                $doc_name = $_POST['doc_name'];
            echo $this->review_Model->filterDoc($hos_id, $dept_id,$doc_name);
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
            $hos_name=NULL;
            if (isset($_POST['dept_id']))
                $dept_id = $_POST['dept_id'];
                if (isset($_POST['hos_name']))
                $hos_name = $_POST['hos_name'];
            echo $this->review_Model->filterTopHos($dept_id,$hos_name);
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
            echo $this->review_Model->filterCompHos($dept_id, $treat_id, $star_rate, $highRate, $lowRate, $emc, $selectedHos, $search, $location);
        }
    }
    public function get_client_address()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
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

        if($address=$ipdat->geoplugin_region){        
        $address = $ipdat->geoplugin_region;
        return $address;
        }
      
       
    }
    public function getDistance($addressFrom, $addressTo, $unit = '')
    {
        // Google API key AIzaSyDBdT11tFFlQfhyo6nB6uaYPM1w_CmYUNU
        $apiKey = 'AIzaSyDBdT11tFFlQfhyo6nB6uaYPM1w_CmYUNU';

        // Change address format
        $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
        $formattedAddrTo     = str_replace(' ', '+', $addressTo);

        // Geocoding API request with start address
        $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&sensor=false&key=' . $apiKey);
        $outputFrom = json_decode($geocodeFrom);
        if (!empty($outputFrom->error_message)) {
            return $outputFrom->error_message;
        }

        // Geocoding API request with end address
        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrTo . '&sensor=false&key=' . $apiKey);
        $outputTo = json_decode($geocodeTo);
        if (!empty($outputTo->error_message)) {
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
        if ($unit == "K") {
            return round($miles * 1.609344, 2) . ' km';
        } elseif ($unit == "M") {
            return round($miles * 1609.344, 2) . ' meters';
        } else {
            return round($miles, 2) . ' miles';
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
            $this->load->view('Users/top_hospitals');
        }
    }
    public function top_doctors()
    {

        $filters = $this->review_Model->reviewfilterCategory();
        $this->load->model('doctors_Model');
        $doctors = $this->doctors_Model->topDoc();
        // echo '<pre>';
        // print_r($doctors);
        // die;
        if ($doctors) {
            $data['filters'] = $filters;
            $data['doctors'] = $doctors;
            // echo '<pre>';
            // print_r($data['filter']);
            $this->load->view('Users/top_doctors', $data);
        } else {
            $this->load->view('Users/top_doctors');
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

            $this->load->view('Users/timeline');
        }
    }

    public function adDetails()
    {
        $ad_id = $this->input->get('id');
        // echo $ad_id;
        $this->load->model('hospitalView_Model');
        $data = $this->hospitalView_Model->adData($ad_id);
        // echo '<pre>';
        // print_r($data);
        // die;
        $this->load->view('Users/ad_details', $data);
    }
    public function userConsult()
    {
        $this->load->model('consult_model', 'cm');
        $cm = $this->cm->consultmodel();
        $cfd = $this->cm->consult_filter_data();
        $cfdt = $this->cm->consult_filter_data_treatment();
        $data = array(
            'result' => $cm,
            'filters' => $cfd,
            'filters_treatment' => $cfdt

        );
        $this->load->view('Users/consult_view', $data);
    }
    public function fetchconsult()
    {
        $this->load->model('consult_model');
        if (isset($_POST['dept_id'])) {
            $dept_id = $_POST['dept_id'];
        } else {
            $dept_id = '';
        }
        if (isset($_POST['treat_id'])) {
            $treat_id = $_POST['treat_id'];
        } else {
            $treat_id = '';
        }
        // print_r($dept_id);
        $q = $this->consult_model->filterDataconsult($dept_id, $treat_id);
        // echo "<pre>";
        // print_r($q);
        // die;
        $res = "";
        $count = 0;
        foreach ($q as $rs) {
            $res .= '<div class="card card-body mt-2 mb-0 pb-2">
                <div class="row">
                    <div class="col-12">
                        <img src="' . $rs['picture'] . '" class="img-thumbnail ml-2 mr-2 float-left rounded-circle" style="height: 50px; width:50px;" alt="">
                        <h5 class="pt-2"><a href="">' . $rs['name'] . '</a> consulted
                                <a href="#"><strong class="rev-sub">' . $rs['doc_name'] . '</strong></a> 
                            <br>
                            <small style="font-size:13px;">' . $rs['post_time'] . '</small>
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <strong class="pl-2 mt-2 text-info query-title" style="font-size: 18px;">' . $rs['consult_title'] . ' </strong>
                        <p class="pl-2 pt-2 wwdtext"><strong class="query">' . $rs['consult_query'] . '</strong></p>';
            if ($rs['answer'] != NULL) {
                $count += 1;
                $res .= '<input type="button" id="view_reply_' . $count . '" class="btn btn-primary showbtn reply" value="Reply" style="float:right">
                            <div id="show-data-' . $count . '"  style="display:none;">
                                <div class="row" style="flex-direction:column; margin-left:12px;">
                                    <img src="' . $rs['doc_pic'] . '" class="img-thumbnail ml-3 mr-3 float-right rounded-circle" style="height: 50px; width:50px;" alt="">
                                    <h5 class="pt-2"><a href="">' . $rs['doc_name'] . '</a> <span style="font-size:10px">replied-</span>
                                </div>
                                <p class="pl-2 pt-2 wwdtext">' . $rs['answer'] . '</p>
                                <button id="hidebtn-' . $count . '" class="btn btn-danger" style="float:right">Hide Reply</button>
                            </div>';
            } else {
                $res .= '<input type="button" class="btn btn-success no-reply" style="float:right" value="No Reply">';
            }
            $res .= '</div>
                        </div>
                    </div>' . '<script>
                    $(document).ready(function(){
                        $("#view_reply_' . $count . '").click(function(){
                            $("#view_reply_' . $count . '").hide();
                            $("#show-data-' . $count . '").show();
                        });
                        $("#hidebtn-' . $count . '").click(function(){ 
                            $("#view_reply_' . $count . '").show();
                            $("#show-data-' . $count . '").hide();
                        });
                    });
                </script>';
        }
        echo $res;
    }
    public function fetchOffer()
    {
        if (isset($_POST['action'])) {
            $hos_id = '';
            $doc_id = '';
            $treat_id = '';
            if (isset($_POST['hos_id']))
                $hos_id = $_POST['hos_id'];
            if (isset($_POST['doc_id']))
                $doc_id = $_POST['doc_id'];
            if (isset($_POST['treat_id']))
                $treat_id = $_POST['treat_id'];

            $this->load->model('offer_Model');
            echo $this->offer_Model->filterOffer($hos_id, $doc_id, $treat_id);
        }
    }

    public function feedbacks()
    {
        $email = $_SESSION['email_id'];
        $this->load->model('review_Model');
        $data = $this->review_Model->myfeeedback($email);

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
            foreach ($data['treatRev'] as $x) {
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

            $data = array(
                'reviews' => $reviews,
            );
            //      echo "<pre>";
            // print_r($data);
            //  die;
            $this->load->view('Users/feedbacks', $data);
        } else {


            $this->load->view('Users/feedbacks');
        }
    }
    public function myappoint()
    {
        $layout = 0;
        // layout = 0 -->view page
        // layout = 11 -->view doc appt
        // layout = 12 -->view trt appt

        $email = $_SESSION['email_id'];
        $this->load->model('appointment_Model');
        $data = $this->appointment_Model->myappoint($email);
        if (empty($data['docappoint']) && empty($data['treatappoint'])) {
            $data['layout'] = $layout;
            $this->load->view('Users/myappointments', $data);
        } else {
            $data['layout'] = $layout;
            $this->load->view('Users/myappointments', $data);
        }
    }
    public function bookingDoc()
    {
        $layout = 11;
        // layout = 0 -->view page
        // layout = 11 -->view doc appt
        // layout = 12 -->view trt appt
        $user_id = $_SESSION['email_id'];
        $apt_id = $this->uri->segment(3);
        $this->load->model('appointment_Model');
        $doc = $this->appointment_Model->appointSeldoc($user_id, $apt_id);
        if ($doc) {
            $data['layout'] = $layout;
            $data['doc'] = $doc;
            // echo '<pre>';
            // print_r($data);
            // die;
            $this->load->view('Users/myappointments', $data);
        } else {
            echo "something went Wrong";
        }
    }
    public function bookingTrt()
    {
        $layout = 12;
        // layout = 0 -->view page
        // layout = 11 -->view doc appt
        // layout = 12 -->view trt appt
        $user_id = $_SESSION['email_id'];
        $apt_id = $this->uri->segment(3);
        $this->load->model('appointment_Model');
        $trt = $this->appointment_Model->appointSeltrt($user_id, $apt_id);
        if ($trt) {
            $data['layout'] = $layout;
            $data['trt'] = $trt;
            // echo '<pre>';
            // print_r($data);
            // die;
            $this->load->view('Users/myappointments', $data);
        } else {
            echo "something went Wrong";
        }
    }
}
