<?php
defined('BASEPATH') or exit('No direct script access allowed');
//  require 'vendor/autoload.php';
//  use Dompdf\Dompdf as Dompdf;


class hospital_Controller extends MY_Controller

{
    public function getslots()
    {
        $this->load->model('hospitalView_Model');
    

        echo $this->hospitalView_Model->getslots($this->input->get('q'));

    }


public function addSymptoms(){


    $p_id=$this->input->post('p_id');
   
    $data=array(


        'p_id'=>$this->input->post('p_id'),
        'symptoms' =>$this->input->post('symptoms'),

        'provisional' =>$this->input->post('provisional'),

    );
    
    $this->load->model('hospitalView_Model');

    $addSymptoms=$this->hospitalView_Model->adsymptoms($data,$p_id);
if($addSymptoms){


    header('location:' . site_url('hospital_Controller/ongoing_treatments'));
}



}
    

   
public function index()
    {
        if (!$this->session->userdata('email_id'))

        redirect('hospital/login-page');

    $hos_id = $_SESSION['email_id'];

    $data['patients'] = $this->db->where('hos_id', $hos_id)

        ->where('doc_id !=', '')

        ->get('hospital_patients')

        ->result_array();

    $data['treat_history'] = $this->db->select('doctor_treatments.id as tret_id,doctor_treatments.*,hospital_registration.*,departments.*,treatments.*, hospital_patients.*')

        ->from('doctor_treatments')

        ->where('doctor_treatments.hos_id', $hos_id)

        ->where('doctor_treatments.doc_id !=', '')

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

        ->where('hospital_patients_medication.hos_id', $hos_id)

        ->order_by('hospital_patients_medication.created_at')

        ->get()

        ->result_array();

        // echo"<pre>";print_r($data['medicines']);die;



    $data['treatments'] = $this->db->select('treatments.*')

        ->from('treatments')

        ->join('hospital_treatments', 'hospital_treatments.treat_id = treatments.treat_id')

        ->where('hospital_treatments.hos_id', $hos_id)

        ->get()

        ->result_array();

    $data['doctors'] = $this->db->select('doctor_details.*')

        ->from('doctor_details')

        ->where('doctor_details.hos_id', $hos_id)

        ->get()

        ->result_array();

    $data['hospital'] = $this->db->select('hospital_patients_medication.*,hospital_details.*')

        ->from('hospital_details')

        ->join('hospital_patients_medication', 'hospital_details.hos_id = hospital_patients_medication.hos_id')

        ->where('hospital_details.hos_id', $hos_id)

        ->order_by('hospital_patients_medication.created_at')

        ->get()

        ->result_array();

    // echo '<pre>';

    // print_r($data['hospital']);

    // die;
       $this->load->view('hospital/add-doctor',$data);
    }



    public function addslot() 
    {
     
       
        
        $data = array(  
            'slots'   => $this->input->post('slots'),  
            'hos_id' => $_SESSION['email_id'],
            
            ); 
        
    $this->load->model('hospitalView_Model');
      $slots=$this->hospitalView_Model->addslots($data);
 
            if($slots)
            {
                header('location:' .site_url('hospital_Controller/appointments'));
             }
  }
 public function editslot(){
 
  
    $data = array(
        'slots' => $this->input->post('slots'),
                  );

    $data=$this->db->update('hospital_slots', $data);

    if($data)
    {
        header('location:' .site_url('hospital_Controller/appointments'));
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



        $address = $ipdat->geoplugin_region;



        return $address;
    }

    public function getLatLon($address)

    {

        $apiKey = 'AIzaSyDBdT11tFFlQfhyo6nB6uaYPM1w_CmYUNU';

        $formattedAddress = str_replace(' ', '+', $address);

        $geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddress . '&sensor=false&key=' . $apiKey);

        $output = json_decode($geocode);

        $latitude    = $output->results[0]->geometry->location->lat;

        $longitude    = $output->results[0]->geometry->location->lng;

        return $latitude . ',' . $longitude;
    }

    public function getNearestAirport($city)

    {

        // $city = 'Kolkata';

        $apiKey =  'AIzaSyDBdT11tFFlQfhyo6nB6uaYPM1w_CmYUNU';

        // https://maps.googleapis.com/maps/api/geocode/json?address=airport%20Kolkata&sensor=false&key=AIzaSyDBdT11tFFlQfhyo6nB6uaYPM1w_CmYUNU

        $airportData = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=airport%20' . $city . '&sensor=false&key=' . $apiKey);

        $airport = json_decode($airportData);

        // echo '<pre>';

        // print_R($airport);

        $airport_name = $airport->results[0]->address_components[0]->long_name;

        return $airport_name;
    }

    public function getNearestTrainBus($latlong)

    {

      $latlong = '22.5126331,88.3654507';

      ///'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=22.5126331,88.3654507&rankby=distance&type=train_station&key=AIzaSyDBdT11tFFlQfhyo6nB6uaYPM1w_CmYUNU'

        $apiKey =  'AIzaSyDBdT11tFFlQfhyo6nB6uaYPM1w_CmYUNU';

        $trainData = file_get_contents('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=' . $latlong . '&rankby=distance&type=train_station&key=' . $apiKey);

        $train_station = json_decode($trainData);

        $busData = file_get_contents('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=' . $latlong . '&rankby=distance&type=bus_station&key=' . $apiKey);

        $bus_station = json_decode($busData);

        // echo '<pre>';

        // print_R($train_station);

        // print_R($bus_station);

        $train_station_name = $train_station->results[0]->name;

        $bus_station_name = $bus_station->results[0]->name;

        // echo $train_station_name;

        // echo $bus_station_name;

        $train_bus = array(

            'train_station_name' => $train_station_name,

            'bus_station_name' => $bus_station_name

        );

        return $train_bus;
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



    public function register()

    {





        $config = array(

            array(

                'field' => 'hos_id',

                'label' => 'Username',

                'rules' => 'required|is_unique[hospital_registration.hos_id]',

                'errors' => array(

                    'required' => 'You must provide a Hospital ID.',

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

                'field' => 'hos_name',

                'label' => 'hos_name',

                'rules' => 'required',

                'errors' => array(

                    'required' => 'You must provide a Hospital Name.',

                )

            ),

            array(

                'field' => 'address',

                'label' => 'address',

                'rules' => 'required',

                'errors' => array(

                    'required' => 'You must provide a %s.',

                )

            ),

            array(

                'field' => 'city',

                'label' => 'city',

                'rules' => 'required',

                'errors' => array(

                    'required' => 'You must provide a %s.',

                )

            ),

            array(

                'field' => 'zip',

                'label' => 'zip',

                'rules' => 'required',

                'errors' => array(

                    'required' => 'You must provide a Pincode.',

                )

            ),

            array(

                'field' => 'district',

                'label' => 'district',

                'rules' => 'required',

                'errors' => array(

                    'required' => 'You must provide a %s.',

                )

            ),

            array(

                'field' => 'state',

                'label' => 'state',

                'rules' => 'required',

                'errors' => array(

                    'required' => 'You must provide a %s.',

                )

            ),

            array(

                'field' => 'phone',

                'label' => 'phone',

                'rules' => 'required|max_length[12]|min_length[8]',

                'errors' => array(

                    'required' => 'You must provide a Contact Number.'

                )

            )

        );



        $this->form_validation->set_rules($config);

        if ($this->form_validation->run()) {



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

            $data = $this->hospital_Model->insertData($hosdata);
            // $hos_id = $this->hospital_Model->insertData($hosdata);

            if ($data) {

                $_SESSION['hos_name'] = $data['hos_name'];;

                $_SESSION['email_id'] = $data['hos_id'];

                $_SESSION['hosLog'] = true;

                //redirect('hospital/dashboard'); 
                header('location: dashboard');
            } else {

                // echo '<script>alert("Database Error!!")</script>';

                $this->load->view('Hospital/hospitalRegister');
            }
        } else {

            $this->load->view('Hospital/hospitalRegister');
        }
    }

    public function hosAdvertise()

    {

        if (!$this->session->userdata('email_id'))

            redirect('hospital/login-page');

        $layout = 0;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        $data = $this->hospitalView_Model->getAdvertise($hos_id);

        $data['layout'] = $layout;

        if ($data) {

            $this->load->view('Hospital/hosAdvertise', $data);
        } else {

            $this->load->view('Hospital/hosAdvertise');
        }
    }

    public function hospost(){

    
        $config['upload_path'] = './userUploads/';

        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {

            $error = array('error' => $this->upload->display_errors());

            $this->load->view('Hospital/profile', $error);
        } else {



            $upload_data = $this->upload->data();

            $image_path =  $upload_data['file_name'];
            //Prepare array of user data
            $userData = array(
              
                'post_title' => $this->input->post('post_title'),
                'post_content' => $this->input->post('post_content'),
                'image' => $image_path,
                'post_id' => $_SESSION['email_id'],
                'hos_id' => $_SESSION['email_id'],
                'post_time' => date('Y-m-d H:i:s'),
            
            );
        }
        
            $this->load->model('hospitalView_model');

            $this->hospitalView_model->insertPost($userData);
            if($userData){
                header('location:' . site_url('hospital_Controller/profile'));
            }
          



    }
    public function addAdvertise()

    {

        $layout = 1;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        if (!$this->input->post()) {

            $data['layout'] = $layout;

            $this->load->view('Hospital/hosAdvertise', $data);
        } else {

            $data = array(

                'ad_title' => $this->input->post('ad_title'),

                'hos_id' => $_SESSION['email_id'],

                'ad_desc' => $this->input->post('ad_desc'),

                'status' => $this->input->post('status'),

            );

            $confirmed = $this->hospitalView_Model->addAdvertise($data);

            if ($confirmed) {

                header('location:' . site_url('hospital_Controller/hosAdvertise'));
            } else {

                header('location:' . site_url('hospital_Controller/addAdvertise'));
            }
        }
    }

    public function editAdvertise()

    {

        $layout = 2;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        if (!$this->input->post()) {

            $ad_id = $this->uri->segment(3);

            $data = $this->hospitalView_Model->getAdById($ad_id);

            $data['layout'] = $layout;

            // echo "<pre>";

            // print_r($data);

            // die;

            $this->load->view('Hospital/hosAdvertise', $data);
        } else {

            $search = array(

                'ad_id' => $this->input->post('ad_id')

            );

            $data = array(

                'ad_title' => $this->input->post('ad_title'),

                'ad_desc' => $this->input->post('ad_desc'),

                'status' => $this->input->post('status'),

            );

            $confirmed = $this->hospitalView_Model->updAd($search, $data);

            if ($confirmed) {

                header('location:' . site_url('hospital_Controller/hosAdvertise'));
            } else {

                header('location:' . site_url('hospital_Controller/editAdvertise'));
            }
        }
    }
    public function delAdvertise()

    {

        $search = array(

            'ad_id' => $this->uri->segment(3),

            'hos_id' => $_SESSION['email_id']

        );

        $this->db->delete('hospital_advertisement', $search);

        $q = $this->db->where($search)

            ->get('hospital_advertisement');

        if (!$q->num_rows()) {

            header('location:' . site_url('hospital_Controller/hosAdvertise'));
        } else {

            header('location:' . site_url('hospital_Controller/hosAdvertise'));
        }
    }

    public function login()

    {

        $data = array(

            'hos_id' => $this->input->post('hos_id'),

            'password' => $this->input->post('password'),

        );

        $this->load->model('Hospital_Model');

        $confirmed = $this->Hospital_Model->isValid($data);

        // echo"<pre>";
        // print_r($confirmed);

        // echo"</pre>";
        // die;

        if ($confirmed) {

            $_SESSION['email_id'] = $confirmed['hos_id'];

            $_SESSION['hos_name'] = $confirmed['hos_name'];

            $_SESSION['hosLog'] = true;

            redirect('hospital/dashboard');

            //header('location: dashboard');

        } else {

            echo '<script>alert("Credentials Didnt Match!!")</script>';

            $this->load->view('Hospital/hospitalLogin');
        }
    }

    public function logout()

    {

        unset($_SESSION['email_id']);

        header('location: login-page');

        //$this->load->view('Hospital/hospitalLogin');

    }

    public function recHospital()

    {

        $hos_id = $this->uri->segment(3);

//    echo"<pre>";
// print_r($hos_id);
//    echo"</pre>";
//    die;


        $data = $this->hospitalView_Model->hospitalData($hos_id);
    
//    echo"<pre>";
// print_r($data);
//    echo"</pre>";
//    die;

        if ($data) {

            $hospitalDet = array();

            $hospitalPost = array();

            $assocDoc = array();

            $reviews = array();

            $consultData = array();

            $depts = array();



            foreach ($data['hospitalDet'] as $x => $y) {

                $hospitalDet = $y;
            }



            foreach ($data['hospitalPost'] as $x => $y) {

                $hospitalPost[$x] = $y;
            }

            foreach ($data['assocDoc'] as $x => $y) {

                $assocDoc[$x] = $y;
            }

            foreach ($data['consultData'] as $x => $y) {

                $consultData[$x] = $y;
            }

            foreach ($data['depts'] as $x => $y) {

                $depts[$x] = $y;
            }

            $search = array(

                'hospital_treatments.hos_id' => $hos_id

            );

            foreach ($depts as $x => $y) {

                $search['hospital_treatments.dept_id'] = $y['dept_id'];

                $depts[$x]['treatments'] = $this->db->select('treatments.treat_name,hospital_treatments.duration,hospital_treatments.budget')->from('hospital_treatments')->join('treatments', 'treatments.treat_id = hospital_treatments.treat_id')->where($search)->get()->result_array();
            }

            // echo '<pre>';

            // print_R($depts);

            // die;

            $reviews = $this->hospitalView_Model->reviewUserData($hos_id);

            // $addressFrom = $this->get_client_address();

            if($addressFrom = 'Kolkata, West Bengal'){

            $addressTo = $hospitalDet['hos_name'] . ',' . $hospitalDet['city'] . ',' . $hospitalDet['state'] . ',' . $hospitalDet['country'] . ',' . $hospitalDet['zip'];

            $distance = $this->getDistance($addressFrom, $addressTo, "K");

            $airport = $this->getNearestAirport($hospitalDet['city']);

            $airport_distance = $this->getDistance($airport, $addressTo, "K");

            $lat_lon = $this->getLatLon($addressTo);

            // echo $lat_lon;

            // die;

            $train_bus = $this->getNearestTrainBus($lat_lon);

            // echo '<pre>';

            // print_R($train_bus);

            // die;

            $train_distance = $this->getDistance($train_bus['train_station_name'], $addressTo, "K");

            $bus_distance = $this->getDistance($train_bus['bus_station_name'], $addressTo, "K");

            $conectivity = array(

                'airport' => $airport,

                'airport_distance' => $airport_distance,

                'train' => $train_bus['train_station_name'],

                'train_distance' => $train_distance,

                'bus' => $train_bus['bus_station_name'],

                'bus_distance' => $bus_distance

            );

            $data = array(

                'hospitalDet' => $hospitalDet,

                'hospitalPost' => $hospitalPost,

                'assocDoc' => $assocDoc,

                'reviews' => $reviews,

                'consultData' => $consultData,

                'depts' => $depts,

                'distance' => $distance,

                'conectivity' => $conectivity

            );
        }else{
            echo  "Address Not Found";
        }

            // echo '<pre>';

            // print_R($data['depts']);

            // die; 

            $this->load->view('recommended_hospital', $data);
        } else {

            $this->load->view('recommended_hospital');
        }
    }

    public function comparison()

    {

        if (!$this->session->userdata('email_id'))

            redirect('hospital/login-page');

        $hos_id = $_SESSION['email_id'];

        $data = array();

        $data['hospitals'] = $this->db->select('hos_id,hos_name')->where('hos_id !=', $hos_id)->from('hospital_details')->get()->result_array();

        for ($i = 1; $i <= 12; $i++) {

            $data['rev_counts'][$i] = $this->db->query("SELECT count(*) as count FROM `hospital_review_user` where hos_id = '$hos_id' AND datetime like '%-%$i-%'")->result_array();

            $data['patient_counts'][$i] = $this->db->query("SELECT count(*) as count FROM `hospital_patients` where hos_id = '$hos_id' AND createdOn like '%-%$i-%'")->result_array();

            $data['avg_rev_count'][$i] = $this->db->query("SELECT AVG(a.rev) as avg from (SELECT count(*) as rev, hos_id FROM `hospital_review_user` where datetime like '%-%$i-%' group by hos_id) a")->result_array();

            $data['avg_patient_count'][$i] = $this->db->query("SELECT AVG(a.patient) as avg from (SELECT count(*) as patient, hos_id FROM `hospital_patients` where createdOn like '%-%$i-%' group by hos_id) a")->result_array();
        }

        // echo '<pre>';

        // print_R($data);

        // die;

        $this->load->view('Hospital/comparison', $data);
    }



    public function LCHosData()

    {

        $hos_id = $this->input->post('hos_id');

        $data = array();

        for ($i = 1; $i <= 12; $i++) {

            $data['rev_counts'][$i] = $this->db->query("SELECT count(*) as count FROM `hospital_review_user` where hos_id = '$hos_id' AND datetime like '%-%$i-%'")->result_array();
        }

        echo json_encode($data);
    }



    public function BCHosData()

    {

        $hos_id = $this->input->post('hos_id');

        $data = array();

        for ($i = 1; $i <= 12; $i++) {

            $data['patient_counts'][$i] = $this->db->query("SELECT count(*) as count FROM `hospital_patients` where hos_id = '$hos_id' AND createdOn like '%-%$i-%'")->result_array();
        }

        echo json_encode($data);
    }



    public function hosOffers()

    {

        if (!$this->session->userdata('email_id'))

            redirect('hospital/login-page');

        $layout = 0;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 21 -->edit page for offer on doctor

        // layout = 22 -->edit page for offer on treatment

        $hos_id = $_SESSION['email_id'];

        $this->load->model('hospitalView_Model');

        $data = $this->hospitalView_Model->offerData($hos_id);

        $data['layout'] = $layout;

        // echo "<pre>";

        // print_r($data);

        // die;

        if ($data) {

            $this->load->view('Hospital/offers', $data);
        } else {

            $data['error'] = 'database error';

            $this->load->view('Hospital/offers', $data);
        }
    }

    public function addOffer()

    {

        $layout = 1;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 21 -->edit page for offer on doctor

        // layout = 22 -->edit page for offer on treatment

        if (!$this->input->post()) {

            $hos_id = $_SESSION['email_id'];

            $docs = $this->db->select('doctor_details.doc_name,doctor_details.doc_id')

                ->where('doctor_details.hos_id', $hos_id)

                ->get('doctor_details')

                ->result_array();

            $treats = $this->db->select('treatments.treat_id , treatments.treat_name')

                ->from('hospital_treatments')

                ->join('treatments', 'treatments.treat_id = hospital_treatments.treat_id')

                ->where('hospital_treatments.hos_id', $hos_id)->get()->result_array();

            // print_r($treats);

            // die;

            $data['layout'] = $layout;

            $data['docs'] = $docs;

            $data['treats'] = $treats;

            if ($this->uri->segment(3) != '') {

                $search = array(

                    'coupon_id' => $this->uri->segment(3),



                );

                $data['offer'] = $this->db->where($search)->get('hospital_offers')->result_array();

                // $this->load->view('Hospital/offers',$data);

            }

            $this->load->view('Hospital/offers', $data);
        } else {

            if ($this->input->post('offer_on') == 'Doctor') {

                $data = array(

                    'offer_on' => $this->input->post('offer_on'),

                    'hos_id' => $_SESSION['email_id'],

                    'doc_id' => $this->input->post('doc_id'),

                    'coupon_title' => $this->input->post('coupon_title'),

                    'coupon_code' => strtoupper($this->input->post('coupon_code')),

                    'coupon_desc' => $this->input->post('coupon_desc'),

                    'status' => $this->input->post('status'),

                    'valid_till' => $this->input->post('valid_till'),

                    'discount' => $this->input->post('discount'),

                );
            } else if ($this->input->post('offer_on') == 'Treatment') {

                $data = array(

                    'offer_on' => $this->input->post('offer_on'),

                    'hos_id' => $_SESSION['email_id'],

                    'treat_id' => $this->input->post('treat_id'),

                    'coupon_title' => $this->input->post('coupon_title'),

                    'coupon_code' => strtoupper($this->input->post('coupon_code')),

                    'coupon_desc' => $this->input->post('coupon_desc'),

                    'status' => $this->input->post('status'),

                    'valid_till' => $this->input->post('valid_till'),

                    'discount' => $this->input->post('discount'),

                );
            }

            $this->load->model('hospitalView_Model');

            $confirmed = $this->hospitalView_Model->addOffer($data);

            if ($confirmed) {

                header('location:' . site_url('hospital_Controller/hosOffers'));
            } else {

                header('location:' . site_url('hospital_Controller/addOffers'));
            }
        }
    }

    public function editOffer()

    {

        $layout = 21;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 21 -->edit page for offer on doctor

        // layout = 22 -->edit page for offer on treatment

        if (!$this->input->post()) {

            $hos_id = $_SESSION['email_id'];

            $coupon_id = $this->uri->segment(3);

            $this->load->model('hospitalView_Model');

            $data = $this->hospitalView_Model->getOfferById($coupon_id);

            if ($data) {

                $docs = $this->db->select('doctor_details.doc_name,doctor_details.doc_id')

                    ->where('doctor_details.hos_id', $hos_id)

                    ->get('doctor_details')

                    ->result_array();

                $data['layout'] = $layout;

                $data['docs'] = $docs;

                // echo '<pre>';

                // print_R($data);

                $this->load->view('Hospital/offers', $data);
            }
        } else {

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

            $confirmed = $this->hospitalView_Model->updOffer($search, $data);

            if ($confirmed) {

                header('location:' . site_url('hospital_Controller/hosOffers'));
            } else {

                header('location:' . site_url('hospital_Controller/editOffer'));
            }
        }
    }

    public function editOfferTreat()

    {

        $layout = 22;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 21 -->edit page for offer on doctor

        // layout = 22 -->edit page for offer on treatment

        if (!$this->input->post()) {

            $hos_id = $_SESSION['email_id'];

            $coupon_id = $this->uri->segment(3);

            $this->load->model('hospitalView_Model');

            $data = $this->hospitalView_Model->getOfferById($coupon_id);

            if ($data) {



                $treats = $this->db->select('treatments.treat_id , treatments.treat_name')

                    ->from('hospital_treatments')

                    ->join('treatments', 'treatments.treat_id = hospital_treatments.treat_id')

                    ->where('hospital_treatments.hos_id', $hos_id)->get()->result_array();

                $data['layout'] = $layout;

                $data['treats'] = $treats;

                // echo '<pre>';

                // print_R($data);

                // die;

                $this->load->view('Hospital/offers', $data);
            }
        } else {

            $data = array(

                'hos_id' => $_SESSION['email_id'],

                'treat_id' => $this->input->post('treat_id'),

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

            $confirmed = $this->hospitalView_Model->updOffer($search, $data);

            if ($confirmed) {

                header('location:' . site_url('hospital_Controller/hosOffers'));
            } else {

                header('location:' . site_url('hospital_Controller/editOfferTreat'));
            }
        }
    }

    public function dashboard()

    {

        if (!$this->session->userdata('email_id'))

            redirect('hospital/login-page');

        $hos_id = $_SESSION['email_id'];

        // echo"$hos_id";
        // die;

        //$id =$_POST['hos_id'];


        $data = $this->hospitalView_Model->hospitalData($hos_id);

        if ($data) {

            $hospitalDet = array();

            $hospitalPost = array();

            $assocDoc = array();

            $reviews = array();

            $consultData = array();



            foreach ($data['hospitalDet'] as $x => $y) {

                $hospitalDet = $y;
            }



            foreach ($data['hospitalPost'] as $x => $y) {

                $hospitalPost[$x] = $y;
            }

            foreach ($data['assocDoc'] as $x => $y) {

                $assocDoc[$x] = $y;
            }

            foreach ($data['consultData'] as $x => $y) {

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

            $this->load->view('Hospital/dashboard', $data);
        } 
        else{
         redirect('hospital/login-page');
        }
    }

    public function doctors()

    {

        if ($this->session->userdata('email_id'))

            $layout = 0;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];



        $data = $this->hospitalView_Model->hospitalData($hos_id);

        if ($data) {

            $hospitalDet = array();

            $hospitalPost = array();

            $assocDoc = array();

            $reviews = array();

            $consultData = array();

            $post = array();


            foreach ($data['hospitalDet'] as $x => $y) {

                $hospitalDet = $y;
            }



            foreach ($data['hospitalPost'] as $x => $y) {

                $hospitalPost[$x] = $y;
            }

            foreach ($data['assocDoc'] as $x => $y) {

                $assocDoc[$x] = $y;
            }

            foreach ($data['consultData'] as $x => $y) {

                $consultData[$x] = $y;
            }

            foreach ($data['post'] as $x => $y) {

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

                'layout' => $layout,

            );

            $this->load->view('Hospital/doctors', $data);
        } else {

            redirect('hospital/login-page');
        }
    }



    public function addDoc()

    {
            
        $layout = 1;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        if (!$this->input->post()) {

            $data = $this->hospitalView_Model->get_department();



            if ($data) {

                $data['layout'] = $layout;

                $this->load->view('Hospital/doctors', $data);
            } else {

                $data['layout'] = $layout;

                $this->load->view('Hospital/doctors', $data);
            }
        } else {

            

            $rules = array(

                array(

                    'field' => 'docId',

                    'label' => 'Doctor ID',

                    'rules' => 'required|is_unique[doctor_registration.doc_id]',

                    'errors' => array(

                        'required' => 'You must provide a %s.',

                        'is_unique' => 'Registration number already exists'

                    )

                ),

                array(

                    'field' => 'pass',

                    'label' => 'Password',

                    'rules' => 'required|max_length[12]|min_length[6]',

                    'errors' => array(

                        'required' => 'You must provide a %s.',

                    )

                ),

                array(

                    'field' => 'cpass',

                    'label' => 'Confirm Password',

                    'rules' => 'required|matches[pass]',

                    'errors' => array(

                        'required' => 'You must %s.',

                    )

                ),

                array(

                    'field' => 'docName',

                    'label' => 'Doctor Name',

                    'rules' => 'required',

                    'errors' => array(

                        'required' => 'You must provide a %s.',

                    )

                ),

                array(

                    'field' => 'emailId',

                    'label' => 'Email ID',

                    'rules' => 'required|is_unique[doctor_details.email_id]',

                    'errors' => array(

                        'required' => 'You must provide a %s.',

                        'is_unique' => '%s already exist.'

                    )

                ),

                array(

                    'field' => 'city',

                    'label' => 'City',

                    'rules' => 'required',

                    'errors' => array(

                        'required' => 'You must provide a %s.',

                    )

                ),

                array(

                    'field' => 'zip',

                    'label' => 'Postalcode',

                    'rules' => 'required',

                    'errors' => array(

                        'required' => 'You must provide a %s.',

                    )

                ),

                array(

                    'field' => 'country',

                    'label' => 'Country',

                    'rules' => 'required',

                    'errors' => array(

                        'required' => 'You must provide a %s.',

                    )

                ),

                array(

                    'field' => 'state',

                    'label' => 'State/Province',

                    'rules' => 'required',

                    'errors' => array(

                        'required' => 'You must provide a %s.',

                    )

                ),


                array(

                    'field' => 'adhar',

                    'label' => 'Adhaar No.',

                    //'rules' => 'required|max_length[12]|min_length[12]|is_unique[doctor_registration.adhar]',

                    'errors' => array(

                        'required' => 'You must provide a %s.',

                        'is_unique' => '%s already exist.'

                    )

                ),

                array(

                    'field' => 'phone',

                    'label' => 'phone',

                    //'rules' => 'required|max_length[10]|min_length[10]',

                    'errors' => array(

                        'required' => 'You must provide a Contact Number.'

                    )

                )

            );

            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run()) {

               
                
                $config['upload_path'] = './userUploads/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $this->load->library('upload', $config);
                
                if (!$this->upload->do_upload('picture')) {
                   
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('Hospital/add-doctor', $error);
                } else {
                   
                    $upload_data = $this->upload->data();

                    $image_path = base_url('userUploads/' . $upload_data['file_name']);

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
                        'specialization1' => $this->input->post('specialization1'),
                        'specialization2' => $this->input->post('specialization2'),
                        'specialization3' => $this->input->post('specialization3'),

                        'picture' => $image_path,

                        'degree' => $this->input->post('degree'),

                        'speciality' => $this->input->post('speciality'),

                         'about' => $this->input->post('about'),

                        'experience' => $this->input->post('experience'),

                        'services' => $this->input->post('services'),

                        'awards' => $this->input->post('awards'),
                        
                        'certifications' => $this->input->post('certifications'),

                    );

                    $this->load->model('doctors_Model');

                    $confirmed = $this->doctors_Model->register($data); //inserted into two table regis,details

                //    echo '<pre>';
                //   print_r($confirmed);die;

                    if ($confirmed) {

                        header('location:' . site_url('hospital/doctors'));
                    } else {

                        echo "<script>alert('Database Error')</script>";
                    }
                }
            } else {

                $data2['layout'] = $layout;

                $this->load->view('Hospital/doctors', $data2);
            }
        }
    }

    public function editDoc()

    {

        $layout = 2;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        if (!$this->input->post()) {

            $docId = $this->uri->segment(3);
            
         
            $this->load->model('Doctors_Model');

            $data = $this->Doctors_Model->docData($docId);
    // echo"<pre>";print_r($data);;die;
            if ($data) {

                $data = array(

                    'docReg' => $data['docReg'][0],

                    'docDet' => $data['docDet'][0],

                    'layout' => $layout,

                );

                $this->load->view('Hospital/doctors', $data);
            } else {

                echo 'Database error!!';
            }
        } else {

            if ($_FILES['picture']['name']) {

                $config['upload_path'] = './userUploads/';

                $config['allowed_types'] = 'gif|jpg|png';





                $this->load->library('upload', $config);



                if (!$this->upload->do_upload('picture')) {

                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('Hospital/edit-doctor', $error);
                } else {

                    $upload_data = $this->upload->data();

                    $image_path = base_url('userUploads/' . $upload_data['file_name']);

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
                        'specialization1' => $this->input->post('specialization1'),
                        'specialization2' => $this->input->post('specialization2'),
                        'specialization3' => $this->input->post('specialization3'),

                        'picture' => $image_path,

                        'degree' => $this->input->post('degree'),

                        'speciality' => $this->input->post('speciality'),

                         'about' => $this->input->post('about'),

                        'experience' => $this->input->post('experience'),

                        'services' => $this->input->post('services'),

                        'awards' => $this->input->post('awards'),
                        
                        'certifications' => $this->input->post('certifications'),

                    );

                }
            } else {
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
                    'specialization1' => $this->input->post('specialization1'),
                    'specialization2' => $this->input->post('specialization2'),
                    'specialization3' => $this->input->post('specialization3'),

                    'degree' => $this->input->post('degree'),

                    'speciality' => $this->input->post('speciality'),

                     'about' => $this->input->post('about'),

                    'experience' => $this->input->post('experience'),

                    'services' => $this->input->post('services'),

                    'awards' => $this->input->post('awards'),
                    
                    'certifications' => $this->input->post('certifications'),

                );

            }

            $this->load->model('doctors_Model');

            $confirmed = $this->doctors_Model->updDoc($data);

            if ($confirmed) {

                header('location: doctors');
            } else {

                echo '<script>alert("Couldnt update!! try again later")</script>';
            }
        }
    }

    public function delDoc()

    {

        $doc_id = $this->uri->segment(3);



        $this->load->model('doctors_Model');

        $confirmed = $this->doctors_Model->delDoc($doc_id);

        if ($confirmed) {

            header('location:' . site_url() . 'hospital_Controller/doctors');
        } else {

            echo '<script>alert("Couldnt complete the process!! Try again later")</script>';
        }
    }

    public function editprofile()

    {

        $this->load->view('Hospital/editProfile');
    }



    public function addAppointment()
    {

        $layout = 1;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        $this->load->model('appointment_Model');

        $data = $this->appointment_Model->fetch_department_and_doctor($hos_id);
        
        $data['treatData'] = $this->hospitalView_Model->treatData($hos_id);

        //$data['age'] = 23;
        
    //   echo"<pre>";print_r($data['doctors']);die;

        $data['layout'] = $layout;

        $this->load->model('appointment_Model');

        $slots = $this->appointment_Model->apptByHos($hos_id);
        $data['slots']=$slots;

        // echo '<pre>';
        // print_r($data);

        // die;
       
        

        $this->load->view('Hospital/appointments', $data);
    }



    public function editAppointment()

    {

        $layout = 2;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->editdoc appointment page

        $hos_id = $_SESSION['email_id'];

        $this->load->model('appointment_Model');

        $data = $this->appointment_Model->edit_appointment($hos_id);

        // echo '<pre>';

        // print_r($data);

        // die;

        //$data['age'] = 23;

        $data['layout'] = $layout;

        $this->load->view('Hospital/appointments', $data);
    }

    public function edittrtAppointment()

    {

        $layout = 3;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->editdoc appointment page

        // layout = 3 -->edit treatment appointment page

        $hos_id = $_SESSION['email_id'];

        $apt_id = $this->uri->segment(3);

        $search = array(

            'appt_id' => $apt_id,

            'hos_id' => $hos_id

        );

        $this->load->model('appointment_Model');

        $appointment = $this->appointment_Model->edit_trtappointment($search);

        $data['appointment'] = $appointment;

        $data['treatData'] = $this->hospitalView_Model->treatData($hos_id);

        $data['layout'] = $layout;

        // echo '<pre>';

        // print_r($data);

        // die;

        $this->load->view('Hospital/appointments', $data);
    }

    public function deltrtAppointment()

    {

        $hos_id = $_SESSION['email_id'];

        $apt_id = $this->uri->segment(3);

        $search = array(

            'appt_id' => $apt_id,

            'hos_id' => $hos_id

        );

        $this->db->delete('hospital_treatments_appointment', $search);

        $q = $this->db->where($search)

            ->get('hospital_treatments_appointment');

        if (!$q->num_rows()) {

            header('location:' . site_url('hospital_Controller/appointments'));
        } else {

            header('location:' . site_url('hospital_Controller/appointments'));
        }
    }

    public function editAppointmentStatustrt()

    {

        $appt_id = $this->input->post('appt_id');

        $appt_status = $this->input->post('appt_status');

        if ($appt_status == 0) {

            $appt_status = 1;
        } elseif ($appt_status == 1) {

            $appt_status = 2;
        } elseif ($appt_status == 2) {

            $appt_status = 0;
        }

        $this->load->model('appointment_Model');

        $this->appointment_Model->edit_appointment_statusTrt($appt_id, $appt_status);

        header('location:' . site_url('hospital_Controller/appointments'));
    }

    public function editAppointmentStatus()

    {

        $appt_id = $this->uri->segment(3);

        $appt_status = $this->input->post('appt_status');



        if ($appt_status == 0) {

            $appt_status = 1;
        } elseif ($appt_status == 1) {

            $appt_status = 2;
        } elseif ($appt_status == 2) {

            $appt_status = 0;
        }



        // echo $appt_id;

        // echo '    ';

        // echo $appt_status;

        // die;



        $this->load->model('appointment_Model');

        $data = $this->appointment_Model->edit_appointment_status($appt_id, $appt_status);

        $this->load->view('Hospital/appointments', $data);
    }

    public function fetchDoc() 

    {

        if ($this->input->get('q')) {

            echo $this->hospitalView_Model->fetchDoc($this->input->get('q'));
        }
    }



    public function addDept()

    {

        $layout = 1;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        if (!$this->input->post()) {

            $hos_id = $_SESSION['email_id'];

            $hosData = $this->hospitalView_Model->hospitalData($hos_id);

            $deptData = $this->hospitalView_Model->deptsAll($hos_id);

            if ($hosData || $deptData) {

                $data = array(

                    'hosDepts' => $hosData['depts'],

                    'depts' => $deptData,

                    'layout' => $layout,

                );
                //    echo"<pre>";

                //      print_r($data);
                //     echo"</pre>";
                //     die;

                $this->load->view('Hospital/departments', $data);
                // echo"<pre>";

                //  print_r($data);
                // echo"</pre>";
                // die;



            }
        } else {

            if ($this->input->post('deptName') == 'other') {

                $data = array(

                    'dept_name' => $this->input->post('newDeptName'),

                    'dept_description' => $this->input->post('description'),

                    'dept_id' => 'dept000' . $this->input->post('newDeptName'),

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

                if ($this->input->post('spocCheck')) {

                    $data['spoc'] = $this->input->post('spoc');

                    $data['spoc_no'] = $this->input->post('spocNo');

                    $data['spoc_email'] = $this->input->post('spocEmail');
                }

                $confirmed = $this->hospitalView_Model->addNewDept($data);

                if ($confirmed) {

                    echo "<script>alert('Department Added Successfully!!')</script>";

                    header('location:' . site_url('hospital/departments'));
                } else {

                    echo "<script>alert('Something went wrong!! Please try again')</script>";

                    header('location:' . site_url('hospital/add-department'));
                }
            } else {

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

                // echo"<pre>";
                //  print_r($data);
                // echo"</pre>";
                // die;

                if ($this->input->post('spocCheck')) {

                    $data['spoc'] = $this->input->post('spoc');

                    $data['spoc_no'] = $this->input->post('spocNo');

                    $data['spoc_email'] = $this->input->post('spocEmail');
                }



                $confirmed = $this->hospitalView_Model->addDept($data);
         
                if ($confirmed) {

                    echo "<script>alert('Department Added Successfully!!')</script>";

                    header('location:' . site_url('hospital_Controller/departments'));
                } else {

                    echo "<script>alert('Something went wrong!! Please try again')</script>";

                    header('location:' . site_url('hospital_Controller/addDept'));
                }
            }
        }
    }

    public function delDept()

    {

        $dept_id = $this->uri->segment(3);

        $hos_id = $_SESSION['email_id'];





        $confirmed = $this->hospitalView_Model->delDept($hos_id, $dept_id);

        if ($confirmed) {

            header('location:' . site_url() . '/hospital_Controller/departments');
        } else {

            echo '<script>alert("Couldnt complete the process!! Try again later")</script>';
        }
    }

    public function profile()

    {

        if (!$this->session->userdata('email_id'))

            redirect('hospital/login-page');

        $layout = 0;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        $data = $this->hospitalView_Model->hospitalData($hos_id);

        if ($data) {

            $hospitalDet = array();

            $hospitalPost = array();

            $assocDoc = array();

            $reviews = array();

            $consultData = array();

            $post = array();



            foreach ($data['hospitalDet'] as $x => $y) {

                $hospitalDet = $y;
            }



            foreach ($data['hospitalPost'] as $x => $y) {

                $hospitalPost[$x] = $y;
            }

            foreach ($data['assocDoc'] as $x => $y) {

                $assocDoc[$x] = $y;
            }

            foreach ($data['consultData'] as $x => $y) {

                $consultData[$x] = $y;
            }

            foreach ($data['post'] as $x => $y) {

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

                'layout' => $layout,

            );

            $this->load->view('Hospital/profile', $data);
        } else {

               redirect('hospital/login-page');;
        }
    }

    public function edit_hos_profile()
    {

        $layout = 2;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        $data = $this->hospitalView_Model->hospitalData($hos_id);

        if ($data) {

            $hospitalDet = array();

            foreach ($data['hospitalDet'] as $x => $y) {

                $hospitalDet = $y;
            }



            $data = array(

                'hospitalDet' => $hospitalDet,

                'layout' => $layout,

            );

            $this->load->view('Hospital/profile', $data);
        } else {

         $this->load->view('Hospital/profile');
        }
    }



    public function upd_hospital_profile()

    {

        $layout = 2;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        $this->load->model('hospitalView_Model');



        $search = array(

            'hos_id' => $hos_id,

        );


        $config['upload_path'] = './userUploads/';

        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('picture')) {

            $error = array('error' => $this->upload->display_errors());

            $this->load->view('Hospital/profile', $error);
        } else {



            $upload_data = $this->upload->data();
            $image_path =  $upload_data['file_name'];
            // $image_path = base_url('userUploads/' . $upload_data['file_name']);
            $data = array(

                'hos_name' => $this->input->post('hospital_name'),

                'country' => $this->input->post('country'),

                'city' => $this->input->post('city'),

                'state' => $this->input->post('state'),

                'zip' => $this->input->post('zip'),

                'email_id' => $this->input->post('email'),

                'phone' => $this->input->post('phone'),

                'about' => $this->input->post('about'),

                'address' => $this->input->post('address'),

                'logo' => $this->input->post('pic'),

                'cover_pic' => $this->input->post('cover_pic'),

                'cover_pic' => $image_path,

                'logo' => $image_path,

            );


            $this->load->model('hospitalView_Model');

            $updated = $this->hospitalView_Model->updHosData($search, $data);


            if ($updated) { ?>



<?php
                header('location:profile');
            } else {

                header('location:' . site_url('hospital/profile'));
            }
        }


        if ($data) {

            $hospitalDet = array();

            foreach ($data['hospitalDet'] as $x => $y) {

                $hospitalDet = $y;
            }



            $data = array(

                'hospitalDet' => $hospitalDet,

                'layout' => $layout,

            );

            $this->load->view('Hospital/profile', $data);
        } else {
                $this->load->view('Hospital/profile');
            // echo "dataBase Error!!";
        }
    }



    public function patients()

    {

        if ($this->session->userdata('email_id')) {

            $layout = 0;

            // layout = 0 -->view page

            // layout = 1 -->add page

            // layout = 2 -->edit page

            $hos_id = $_SESSION['email_id'];

            $data['patients'] = $this->db->where('hos_id', $hos_id)

                ->get('hospital_patients')

                ->result_array();

            $data['layout'] = $layout;

            $this->load->view('Hospital/patients', $data);
        } else {

            return redirect('hospital/login-page');
        }
    }




    public function delPatient()

    {

        $search = array(

            'p_id' => $this->uri->segment(3),

            'hos_id' => $_SESSION['email_id']

        );

        $this->db->delete('hospital_patients', $search);

        $q = $this->db->where($search)

            ->get('hospital_patients');

        if (!$q->num_rows()) {

            header('location:' . site_url('hospital_Controller/patients'));
        } else {

            header('location:' . site_url('hospital_Controller/patients'));
        }
    }

    public function delOffer()

    {

        $search = array(

            'coupon_id' => $this->uri->segment(3),

            'hos_id' => $_SESSION['email_id']

        );

        $this->db->delete('hospital_offers', $search);

        $q = $this->db->where($search)

            ->get('hospital_offers');

        if (!$q->num_rows()) {

            header('location:' . site_url('hospital_Controller/hosOffers'));
        } else {

            header('location:' . site_url('hospital_Controller/hosOffers'));
        }
    }

    public function editPatient()

    {

        $layout = 2;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        if (!$this->input->post()) {

            $search = array(

                'p_id' => $this->uri->segment(3),

                'hos_id' => $_SESSION['email_id']

            );

            $docs = $this->db->select('doctor_details.doc_name,doctor_details.doc_id')

                ->where('doctor_details.hos_id', $search['hos_id'])

                ->get('doctor_details')

                ->result_array();

            $pData = $this->db->where($search)

                ->get('hospital_patients')

                ->result_array();

            $data['pData'] = $pData;

            $data['docs'] = $docs;

            $data['layout'] = $layout;

            if ($data) {

                // echo "<pre>";

                // print_R($data);

                // die;

                $this->load->view('Hospital/patients', $data);
            } else {

                header('location:' . site_url('hospital_Controller/patients'));
            }
        } else {

            $search['p_id'] =  $this->input->post('p_id');

            $data = $this->input->post();

            $this->load->model('hospitalView_Model');

            $confirmed = $this->hospitalView_Model->updPatient($search, $data);

            if ($confirmed) {

                header('location:' . site_url('hospital_Controller/patients'));
            } else {

                header('location:' . site_url('hospital_Controller/editPatient'));
            }
        }
    }



    public function addPatient()

    {

        $layout = 1;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        if (!$this->input->post()) {

            $hos_id = $_SESSION['email_id'];

            $docs = $this->db->select('doctor_details.doc_name,doctor_details.doc_id')

                ->where('doctor_details.hos_id', $hos_id)

                ->get('doctor_details')

                ->result_array();




            // echo"<Pre>";

            // print_r($docs);
            // echo"</pre>";
            // die;



            $data = array(

                'hos_id' => $hos_id,

                'docs' => $docs,

                'layout' => $layout,

            );


            // echo"<Pre>";

            // print_r($data);
            // echo"</pre>";
            // die;



            $this->load->view('Hospital/patients', $data);
        } else {

            $data = array(

                'p_id' => $this->input->post('p_id'),

                'p_name' => $this->input->post('p_name'),

                'hos_id' => $this->input->post('hos_id'),

                'doc_id' => $this->input->post('doc_id'),

                'address' => $this->input->post('address'),

                'phone' => $this->input->post('phone'),

                'whatsapp' => $this->input->post('whatsapp'),

                'dob' => $this->input->post('dob'),

                'gender' => $this->input->post('gender'),

                'email_id' => $this->input->post('email_id'),

            );

            //  echo '<pre>';

            //  print_R($data);

            //   echo"</pre>";
            //   die;
            $this->load->model('hospitalView_Model');

            $confirmed = $this->hospitalView_Model->addPatient($data);

            if ($confirmed) {

                header('location: ' . site_url('hospital_Controller/patients'));
            } else {

                header('location: ' . site_url('hospital_Controller/addPatient'));
            }
        }
    }


    public function showslots (){

        $hos_id = $_SESSION['email_id'];

      


        $this->load->model('appointment_Model');

        $data = $this->appointment_Model->apptByHos($hos_id);
        
      $data['layout']=1;

//    echo"<pre>";print_r($data);die;
        if($data){

        //     $hos_name = $this->db->select('hos_name')

        //                         ->where('hos_id',$hos_id)

        //                         ->get('hospital_details')

        //                         ->result_array();

        //    $data['hos_name'] = $hos_name[0]['hos_name'];

            $this->load->view('Hospital/appointments',$data);

        }else{

            echo 'Something problem on appointments bookings';

        }


    



    }
      
    public function appointments()

    {
       
        if (!$this->session->userdata('email_id'))

            redirect('hospital/login-page');

          
         
        $layout = 0;
        $layout=1;
      
     
        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        $this->load->model('appointment_Model');

        $data = $this->appointment_Model->admin_hospital_appointment($hos_id);

        // echo '<pre>';

        // print_r($data);

        // die;

        //$data['age'] = 23;

        $trt = $this->appointment_Model->admin_hospital_appointmentTrt($hos_id);

        //echo "<pre>";

        //print_r($data);

        //die;
        $layout=0;
         $this->load->model('hospitalView_Model');
       
         $slots=$this->hospitalView_Model->get_slots($hos_id);
         $data['slots']=$slots;
         $data['layout']=$layout;

       


       
        
         $data['treatments'] = $trt;

        $data['layout'] = $layout;
        $hos_id = $_SESSION['email_id'];
       

        
        $this->load->view('Hospital/appointments', $data);
        
    }





    public function schedule()

    {

        if (!$this->session->userdata('email_id'))

            redirect('hospital/login-page');

        $layout = 0;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page 

        $hos_id = $_SESSION['email_id'];

        $this->load->model('hospitalView_Model');

        $data = $this->hospitalView_Model->docSchedules($hos_id);

        if ($data) {

            // echo '<pre>';

            // print_R($data);

            $data['layout'] = $layout;


            $this->load->view('Hospital/schedule', $data);
        } else {

            $layout = 0;

            $data['layout'] = $layout;


            $this->load->view('Hospital/schedule', $data);
        }
    }

    public function editSchedule()

    {

        $layout = 2;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        if (!$this->input->post()) {

            $doc_id = $this->uri->segment(3);

            $this->load->model('hospitalView_Model');

            $data = $this->hospitalView_Model->editSch($doc_id);

            if ($data) {

                // echo '<pre>';

                // print_R($data);

                $data['layout'] = $layout;

                $this->load->view('Hospital/schedule', $data);
            }
        } else {

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

            $i = 0;

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

                'weekdays' => implode(',', $this->input->post('weekdays')),

                'strt_time' => date("H:i:s", strtotime($this->input->post('strt_time'))),

                'end_time' => date("H:i:s", strtotime($this->input->post('end_time'))),

                'brk_time' => date("H:i:s", strtotime($this->input->post('brk_time'))),

                'brk_dur' => $this->input->post('brk_dur'),

                'consult_duration' => $this->input->post('appt_dur'),

                'status' => $this->input->post('status'),

                'slots' => implode(',', $slots)

            );
        

            $this->load->model('hospitalView_Model');

            $confirmed = $this->hospitalView_Model->updDocSch($search, $data);

            

            if ($confirmed) {

                header('location:' . site_url('hospital_Controller/schedule'));
            } else {

                header('location:' . site_url('hospital_Controller/editSchedule'));
            }
        }
    }

    public function delSchedule()

    {



        $search = array(

            'doctors_schedule.doc_id' => $this->uri->segment(3)

        );

        $this->load->model('hospitalView_Model');
       $q= $this->hospitalView_Model->delSchedule($search);
    
       if($q){
        header('location:' . site_url('hospital_Controller/schedule'));
       }
           
         
    }

    public function addSchedule()

    {

        $layout = 1;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        if (!$this->input->post()) {
            $hos_id = $_SESSION['email_id'];
            $this->load->model('hospitalView_Model');
            $data = $this->hospitalView_Model->docUnschData($hos_id);
            //     echo"<pre>";
            // print_r($data);
            //     echo"<pre>";die;
            if ($data!==0 ) {



                $data['layout'] = $layout;
                // echo"<pre>";
                // print_r($data);
                //     echo"<pre>";die;

                $this->load->view('Hospital/schedule', $data);
            } 
        } else {



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

            $i = 0;

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

                'weekdays' => implode(',', $this->input->post('weekdays')),

                'strt_time' => date("H:i:s", strtotime($this->input->post('strt_time'))),

                'end_time' => date("H:i:s", strtotime($this->input->post('end_time'))),

                'brk_time' => date("H:i:s", strtotime($this->input->post('brk_time'))),

                'brk_dur' => $this->input->post('brk_dur'),

                'consult_duration' => $this->input->post('appt_dur'),

                'status' => $this->input->post('status'),

                'slots' => implode(',', $slots)

            );
//   echo"<pre>"
            $this->load->model('hospitalView_Model');

            
            $confirmed = $this->hospitalView_Model->addDocSch($data);

            if ($confirmed) {

                header('location:' . site_url('hospital/doctors-schedule'));
            } else {

                header('location:' . site_url('hospital/add-doctor-schedule'));
            }
        }
    }



    public function cusQueries()

    {

        if (!$this->session->userdata('email_id'))

            redirect('hospital/login-page');

        $this->load->view('Hospital/customerQuery');
    }

    public function editDept()

    {

        $layout = 2;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        if (!$this->input->post()) {

            $search = array(

                'dept_id' => $this->uri->segment('3'),

                'hos_id' => $_SESSION['email_id'],

            );



            $data = $this->hospitalView_Model->deptData($search);



            if ($data) {

                $data = array(

                    'hosDept' => $data['hosDept'][0],

                    'dept' => $data['dept'][0],

                    'layout' => $layout,

                );

                $this->load->view('Hospital/departments', $data);
            }
        } else {

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

            if ($this->input->post('spocCheck')) {

                $data['spoc'] = $this->input->post('spoc');

                $data['spoc_no'] = $this->input->post('spocNo');

                $data['spoc_email'] = $this->input->post('spocEmail');
            }

            $search = array(

                'dept_id' => $this->input->post('deptID'),

                'hos_id' => $_SESSION['email_id'],

            );



            $confirmed = $this->hospitalView_Model->updDept($search, $data);

            if ($confirmed) {

                echo '<script>alert("Update Done!!")</script>';

                header('location: departments');
            } else {

                echo '<script>alert("Update Not Done!!")</script>';
            }
        }
    }

    public function treatmentView()

    {

        $treatId = $this->uri->segment(3);

        $this->load->model('treatment_Model');

        $data = $this->treatment_Model->getData($treatId);

        $this->load->view('treatment_view.php', $data);
    }

    public function treatments()

    {

        if (!$this->session->userdata('email_id'))

            redirect('hospital/login-page');

        $layout = 0;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        $data = $this->hospitalView_Model->treatData($hos_id);

        if ($data) {

            $data = array(

                'treatData' => $data,

                'layout' => $layout,

            );

            $this->load->view('Hospital/treatments', $data);
        } else {

            $data['layout'] = $layout;

            $this->load->view('Hospital/treatments', $data);
        }
    }

    public function addTreat()

    {

        $layout = 1;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        if (!$this->input->post()) {

            $hos_id = $_SESSION['email_id'];
            // echo"<pre>";
            // print_r($hos_id);
            //  echo"</pre>";
            //  die;



            $data = $this->hospitalView_Model->getTreat($hos_id);
            //    echo"<pre>";
            // print_r($data);
            //  echo"</pre>";
            //  die;

            if ($data) {

                $data['layout'] = $layout;

                $this->load->view('Hospital/treatments', $data);
            } 
            else{
                $data['layout'] = $layout;
                $this->load->view('Hospital/treatments', $data);
            }
        } else {

            if ($this->input->post('treatName') == 'other') {

                $treat = array(

                    'treat_id' => "trt00" . $this->input->post('newTreatName'),

                    'dept_id' => $this->input->post('deptName'),

                    'treat_name' => $this->input->post('newTreatName'),

                    'treat_desc' => $this->input->post('description'),

                );

                $hostreat = array(

                    'treat_id' => "trt00" . $this->input->post('newTreatName'),

                    'hos_id' => $_SESSION['email_id'],

                    'duration' => $this->input->post('duration'),

                    'budget' => $this->input->post('budget'),

                );



                $confirmed = $this->hospitalView_Model->addNewTreat($treat, $hostreat);

                if ($confirmed) {

                    header('location: treatments');
                } else {

                    echo '<script>alert("Something went wrong!! Try again later")</script>';
                }
            } else {

                $hostreat = array(

                    'treat_id' => $this->input->post('treatName'),

                    'hos_id' => $_SESSION['email_id'],

                    'duration' => $this->input->post('duration'),

                    'budget' => $this->input->post('budget'),

                );

                $confirmed = $this->hospitalView_Model->addTreat($hostreat);

                if ($confirmed) {

                    header('location: treatments');
                } else {

                    echo '<script>alert("Something went wrong!! Try again later")</script>';
                }
            }
        }
    }

    public function fetchtreat()

    {

        if ($this->input->get('q')) {

            echo $this->hospitalView_Model->fetchTreat($this->input->get('q'));
        }
    }

    public function edittreat()

    {

        $layout = 2;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        if (!$this->input->post()) {



            $treat_id = $this->uri->segment(3);

            $data = $this->hospitalView_Model->editTreatData($treat_id);

            // echo"<pre>";

            // print_r($data);
            // echo"</pre>";
            // die;
            if ($data) {

                $data = array(

                    'treatData' => $data[0],

                    'layout' => $layout,

                );

                $this->load->view('Hospital/treatments', $data);
            } else {

                echo "<script>alert('Oops, Something went wrong')</script>";

              
            }
        } else {

            $data = array(

                'duration' => $this->input->post('duration'),

                'budget' => $this->input->post('budget'),

            );

            $search = array(

                'treat_id' => $this->input->post('treat_id'),

                'hos_id' => $_SESSION['email_id'],

            );





            $confirmed = $this->hospitalView_Model->updTreat($data, $search);

            if ($confirmed) {

                header('location:treatments');
            } else {

                echo '<script>alert("Update not done!! try again later")</script>';
            }
        }
    }

    public function delTreat()

    {

        $treat_id = $this->uri->segment(3);

        $hos_id = $_SESSION['email_id'];

        $confirmed = $this->hospitalView_Model->delTreat($hos_id, $treat_id);

        if ($confirmed) {

            header('location:' . site_url('hospital_Controller/treatments'));
        } else {

            echo '<script>alert("Couldnt complete the process!! Try again later")</script>';
        }
    }

    public function departments()

    {

        if (!$this->session->userdata('email_id'))

            redirect('hospital/login-page');

        $layout = 0;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        $data = $this->hospitalView_Model->hospitalData($hos_id);

        if ($data) {

            $depts = array();



            foreach ($data['depts'] as $x => $y) {

                $depts[$x] = $y;
            }





            $data = array(

                'depts' => $depts,

                'layout' => $layout,

            );

            $this->load->view('Hospital/departments', $data);
        } else {
                redirect('hospital/login-page');
            // echo "dataBase Error!!";
        }
    }

    public function delAppointment()

    {

        $apt_id = $this->uri->segment(3);

        $search = array(

            'appt_id' => $apt_id

        );

        $this->db->delete('doctors_appointment', $search);

        $q = $this->db->where($search)

            ->get('doctors_appointment');

        if (!$q->num_rows()) {

            header('location:' . site_url('hospital_Controller/appointments'));
        } else {

            header('location:' . site_url('hospital_Controller/appointments'));
        }
    }


    public function checkDoc()
    {





        $this->load->model('hospitalView_Model');

        $data = $this->hospitalView_Model->checkdoc($this->input->get('q'));

        if (!$data) {

            echo "<label class='text-danger'>Doctor not available in that particular date. 
            Please add the particular doctor's schedule.</label>";
        }
    }


    public function save_appointment_data()

    {

        /*load registration view form*/

        //$this->load->view('add-appointment');



        /*Check submit button */

        if ($this->input->post()) {

            if ($this->input->post('appt_on') == 'Doctor') {


                $q = $this->db->where('email_id', $this->input->post('email'))

                    ->get('user_details');

                if ($q->num_rows()) {

                    $data['appt_id'] = $this->input->post('appt_id');

                    $data['doc_id'] = $this->input->post('doc_id');

                    $data['pt_name'] = $this->input->post('pt_name');

                    $data['appt_slot_time'] = $this->input->post('time');

                    $data['appt_datetime'] = $this->input->post('date');

                    $data['appt_status'] = $this->input->post('status');

                    $data['user_id'] = $this->input->post('email');

                    $data['dept_id'] = $this->input->post('dept_id');

                    $data['phone'] = $this->input->post('phone');



                    //     echo"<pre>";

                    //   print_r($data);
                    //     echo"</pre>";
                    //   die;
                    $this->load->model('appointment_Model');


                    $confirmed = $this->appointment_Model->bookAppt($data);

                    if ($confirmed) {

                        header('location:' . site_url('hospital_Controller/appointments'));
                    }
                } else {

                    $userDet = array(

                        'name' => $this->input->post('pt_name'),

                        'email_id' => $this->input->post('email'),

                        'phone' => $this->input->post('phone'),

                    );

                    $this->db->insert('user_details', $userDet);



                    $data['appt_id'] = $this->input->post('appt_id');

                    $data['doc_id'] = $this->input->post('doc_id');

                    $data['appt_slot_time'] = $this->input->post('time');

                    $data['appt_datetime'] = $this->input->post('date');

                    $data['appt_status'] = $this->input->post('status');

                    $data['user_id'] = $this->input->post('email');



                    $this->load->model('appointment_Model');

                    $confirmed = $this->appointment_Model->bookAppt($data);

                    if ($confirmed) {

                        header('location:' . site_url('hospital_Controller/appointments'));
                    }
                }







                // print_r($data);

                // die;

                // $user = $this->Home_model->saverecords($data);

                // if ($user > 0) {

                //     echo "Records Saved Successfully";

                // } else {

                //     echo "Insert error !";

                // }

            } elseif ($this->input->post('appt_on') == 'Treatment') {

                $q = $this->db->where('email_id', $this->input->post('email'))

                    ->get('user_details');

                if ($q->num_rows()) {

                    $data['appt_id'] = $this->input->post('appt_id');

                    $data['pt_name'] = $this->input->post('pt_name');

                    $data['contact_no'] = $this->input->post('contact_no');

                    $data['treat_id'] = $this->input->post('treat_id');

                    $data['hos_id'] = $_SESSION['email_id'];

                    $data['appt_datetime'] = $this->input->post('date');

                    $data['appt_status'] = $this->input->post('status');

                    $data['user_id'] = $this->input->post('email');

                    // echo "<pre>";

                    // print_r($data);

                    // die;

                    $this->load->model('appointment_Model');

                    $confirmed = $this->appointment_Model->booktrtAppt($data);

                    if ($confirmed) {

                        header('location:' . site_url('hospital_Controller/appointments'));
                    }
                } else {

                    $userDet = array(

                        'name' => $this->input->post('pt_name'),

                        'email_id' => $this->input->post('email'),

                        'phone' => $this->input->post('phone'),

                    );

                    $this->db->insert('user_details', $userDet);



                    $data['appt_id'] = $this->input->post('appt_id');

                    $data['treat_id'] = $this->input->post('treat_id');

                    $data['hos_id'] = $_SESSION['email_id'];

                    $data['appt_datetime'] = $this->input->post('date');

                    $data['appt_status'] = $this->input->post('status');

                    $data['user_id'] = $this->input->post('email');

                    // echo "<pre>";

                    // print_r($data);

                    // die;

                    $this->load->model('appointment_Model');

                    $confirmed = $this->appointment_Model->booktrtAppt($data);

                    if ($confirmed) {

                        header('location:' . site_url('hospital_Controller/appointments'));
                    }
                }
            }
        }
    }



    public function fetchWeekdays()

    {

        $doc_id = $this->input->get('q');

        $weekdays = $this->db->select('weekdays')->where('doc_id', $doc_id)->get('doctors_schedule')->result_array();

        if ($weekdays) {

            echo $weekdays[0]['weekdays'];
        }
    }



    public function edit_trtappointment_data()

    {

        if ($this->input->post()) {

            $data['appt_id'] = $this->input->post('appt_id');

            $data['treat_id'] = $this->input->post('treat_id');

            $data['contact_no'] = $this->input->post('contact_no');

            $data['hos_id'] = $_SESSION['email_id'];

            $data['appt_datetime'] = $this->input->post('date');

            $data['appt_status'] = $this->input->post('status');

            $data['user_id'] = $this->input->post('email');

            // echo "<pre>";

            // print_r($data);

            // die;

            $this->load->model('appointment_Model');

            $this->appointment_Model->edittrtAppt($data);

            header('location:' . site_url('hospital_Controller/appointments'));
        }
    }

    public function edit_appointment_data()

    {

        if ($this->input->post()) {

            $data['appt_id'] = $this->input->post('appt_id');

            $data['doc_id'] = $this->input->post('doc_id');

            $data['phone'] = $this->input->post('phone');

            $data['pt_name'] = $this->input->post('pt_name');

            $data['appt_slot_time'] = $this->input->post('time');

            $data['appt_datetime'] = $this->input->post('date');

            $data['appt_status'] = $this->input->post('status');

            $data['user_id'] = $this->input->post('email');



            // echo "<pre>";

            // print_r($data);

            // die;

            $this->load->model('appointment_Model');

            $this->appointment_Model->editAppt($data);

            header('location:' . site_url('hospital_Controller/appointments'));
        }
    }



    public function add_patients_medicine()

    {

        if ($this->input->post()) {

            $this->db->insert('hospital_patients_medication', $this->input->post());
        }

        header('location:' . site_url('hospital_Controller/ongoing_treatments'));
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



    public function delete_patients_medicine()

    {

        $id = $this->uri->segment(3);

        $this->db->where('id', $id)

            ->delete('hospital_patients_medication');

        header('location:' . site_url('hospital_Controller/ongoing_treatments'));
    }



    public function ongoing_treatments()

    {

        if (!$this->session->userdata('email_id'))

            redirect('hospital/login-page');

        $hos_id = $_SESSION['email_id'];

        $data['patients'] = $this->db->where('hos_id', $hos_id)

            ->where('doc_id !=', '')

            ->get('hospital_patients')

            ->result_array();

        $data['treat_history'] = $this->db->select('doctor_treatments.id as tret_id,doctor_treatments.*,hospital_registration.*,departments.*,treatments.*, hospital_patients.*')

            ->from('doctor_treatments')

            ->where('doctor_treatments.hos_id', $hos_id)

            ->where('doctor_treatments.doc_id !=', '')

            // ->where('doctor_treatments.p_id', $p_id)

            ->join('hospital_registration', 'hospital_registration.hos_id = doctor_treatments.hos_id')

            ->join('departments', 'departments.dept_id = doctor_treatments.dept_id')

            ->join('treatments', 'treatments.treat_id = doctor_treatments.treat_id')

            ->join('hospital_patients', 'hospital_patients.p_id=doctor_treatments.p_id')

            ->get()

            ->result_array();





            $data['medicines'] = $this->db->select('hospital_patients_medication.*')//,doctor_details.doc_name,treatments.treat_name')

            ->from('hospital_patients_medication')

            //->join('doctor_details', 'doctor_details.doc_id = hospital_patients_medication.doc_id')

            //->join('treatments', 'treatments.treat_id = hospital_patients_medication.treat_id')

            ->where('hospital_patients_medication.hos_id', $hos_id)

            ->order_by('hospital_patients_medication.created_at')

            ->get()

            ->result_array();

            // echo"<pre>";print_r($data['medicines']);die;



        $data['treatments'] = $this->db->select('treatments.*')

            ->from('treatments')

            ->join('hospital_treatments', 'hospital_treatments.treat_id = treatments.treat_id')

            ->where('hospital_treatments.hos_id', $hos_id)

            ->get()

            ->result_array();

        $data['doctors'] = $this->db->select('doctor_details.*')

            ->from('doctor_details')

            ->where('doctor_details.hos_id', $hos_id)

            ->get()

            ->result_array();

        $data['hospital'] = $this->db->select('hospital_patients_medication.*,hospital_details.*')

            ->from('hospital_details')

            ->join('hospital_patients_medication', 'hospital_details.hos_id = hospital_patients_medication.hos_id')

            ->where('hospital_details.hos_id', $hos_id)

            ->order_by('hospital_patients_medication.created_at')

            ->get()

            ->result_array();

        // echo '<pre>';

        // print_r($data['hospital']);

        // die;

        $this->load->view('Hospital/ongoing_treatments', $data);
    }

    public function adddoctor(){
        $pid = $this->input->get('pid');

        $this->load->model('ongoing_treatment_Model');

        $fetchdatasendemail = $this->ongoing_treatment_Model->sendPdfEmaildata($pid);



        // echo "<pre>";

        // print_r($fetchdatasendemail[0]['p_name']);

        // die; 

        if (empty($fetchdatasendemail)) {

            header('Location:' . site_url('hospital_Controller/index'));

            $_SESSION["nodatatosend"] = TRUE;

            die;
        }
    }
    public function viewMedication()

    {

        $pid = $this->input->get('pid');

        $this->load->model('ongoing_treatment_Model');

        $fetchdatasendemail = $this->ongoing_treatment_Model->sendPdfEmaildata($pid);



        // echo "<pre>";

        // print_r($fetchdatasendemail[0]['p_name']);

        // die; 

        if (empty($fetchdatasendemail)) {

            header('Location:' . site_url('hospital_Controller/ongoing_treatments'));

            $_SESSION["nodatatosend"] = TRUE;

            die;
        }



        $this->load->library('Pdf');

        $html = '';

        $html .= '<!DOCTYPE html>

                <html lang="en">

                    <head>

                        <meta charset="UTF-8">

                        <meta http-equiv="X-UA-Compatible" content="IE=edge">

                        <meta name="viewport" content="width=device-width, initial-scale=1.0">

                        <title></title>

                        <style>

                            table th, table td{

                                border: 1px solid #ddd;

                            }

                        </style>

                        

                    </head>

                    <body>

                        <table style="border-bottom:1px solid gray">

                            <tr>

                                <td style="border:none;"><img class="avatar" src="' . base_url('userUploads/' . $fetchdatasendemail[0]['logo']) . '" style="height:100px; width:100px;"></td>

                                <td style="border: none; text-align: right;" cellpadding="10">

                                    <strong>' . $fetchdatasendemail[0]['hos_name'] . '</strong><br>

                                    <i>' . $fetchdatasendemail[0]['city'] . ', ' . $fetchdatasendemail[0]['state'] . '</i><br>

                                    <i>' . $fetchdatasendemail[0]['country'] . '- ' . $fetchdatasendemail[0]['zip'] . '</i><br>

                                    <i>' . $fetchdatasendemail[0]['email_id'] . ', ' . $fetchdatasendemail[0]['phone'] . '</i>

                                </td>

                            </tr>

                        </table>

                            

                        <h4 style="text-align:center;">Patient Name:&nbsp;&nbsp;<strong>' . $fetchdatasendemail[0]['p_name'] . '</strong></h4>                        

                            

                        <table cellpadding="5">

                            <tr border="1" cellspacing="1" style="background-color: #04AA6D;">

                                <th><b>Medicine Name</b></th>

                                <th><b>Dosage</b></th>

                                <th><b>Prescribed <nobr>Date & Time</nobr></b></th>

                                <th><b>Duration</b> <small>(in days)</small></th>

                                <th><b>Assigned Doctor</b></th>

                            </tr>

                    ';

        foreach ($fetchdatasendemail as $z) {

            $html .= '<tr>

                        <td  class="col-2 text-center">' . $z['medicine'] . '</td>

                        <td  class="col-2 text-center">' . $z['dosage'] . ' </td>

                        <td class="col-2 text-center">' . date("d/m/Y", strtotime($z['created_at'])) . '<br>' . date("g:i A", strtotime($z['created_at'])) . '</td>

                        <td  class="col-2 text-center">' . $z['duration'] . '</td>

                        <td class="col-2 text-center">' . $z['doc_name'] . '</td>     

                    </tr>';
        }

        $html .= '</table>

                </body>

            </html>';



        ob_start();

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set default monospaced font

        // set margins

        $pdf->SetMargins(5, 3, 5);

        // remove default header/footer

        $pdf->setPrintHeader(false);

        $pdf->setPrintFooter(false);

        // set auto page breaks

        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor

        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set default font subsetting mode

        $pdf->setFontSubsetting(true);

        // Set font

        // dejavusans is a UTF-8 Unicode font, if you only need to

        // print standard ASCII chars, you can use core fonts like

        // helvetica or times to reduce file size.

        // $fontname = TCPDF_FONTS::addTTFfont('ubuntu.ttf', 'TrueTypeUnicode', '', 96);

        // $fontbold = TCPDF_FONTS::addTTFfont('ubuntuB.ttf', 'TrueTypeUnicode', '', 96);

        // $pdf->SetFont($fontname, '', 10);

        $pdf->AddPage();

        // Print text using writeHTMLCell()

        $pdf->writeHTML($html, true, false, true, false, '');

        //$pdf->Output(dirname(__FILE__).'example_001.pdf', 'F');

        // $pdf_name = ''.$customer.time().'.pdf';

        //$pdf_name = 'test.pdf';

        ob_end_flush();



        $pdf->Output(uniqid() . '-' . $pid, 'I');
    }

    public function sendPdfEmail()

    {

        $pid = $this->input->get('pid');

        $this->load->model('ongoing_treatment_Model');

        $fetchdatasendemail = $this->ongoing_treatment_Model->sendPdfEmaildata($pid);



        // echo "<pre>";

        // print_r($fetchdatasendemail[0]['p_name']);

        // die; 

        if (empty($fetchdatasendemail)) {

            header('Location:' . site_url('hospital_Controller/ongoing_treatments'));

            $_SESSION["nodatatosend"] = TRUE;

            die;
        }



        $this->load->library('Pdf');

        $html = '';

        $html .= '<!DOCTYPE html>

                <html lang="en">

                    <head>

                        <meta charset="UTF-8">

                        <meta http-equiv="X-UA-Compatible" content="IE=edge">

                        <meta name="viewport" content="width=device-width, initial-scale=1.0">

                        <title></title>

                        <style>

                            table th, table td{

                                border: 1px solid #ddd;

                            }

                        </style>

                        

                    </head>

                    <body>

                        <table style="border-bottom:1px solid gray">

                            <tr>

                                <td style="border:none;"><img class="avatar" src="' . base_url('userUploads/' . $fetchdatasendemail[0]['logo']) . '" style="height:100px; width:100px;"></td>

                                <td style="border: none; text-align: right;" cellpadding="10">

                                    <strong>' . $fetchdatasendemail[0]['hos_name'] . '</strong><br>

                                    <i>' . $fetchdatasendemail[0]['city'] . ', ' . $fetchdatasendemail[0]['state'] . '</i><br>

                                    <i>' . $fetchdatasendemail[0]['country'] . '- ' . $fetchdatasendemail[0]['zip'] . '</i><br>

                                    <i>' . $fetchdatasendemail[0]['email_id'] . ', ' . $fetchdatasendemail[0]['phone'] . '</i>

                                </td>

                            </tr>

                        </table>

                            

                        <h4 style="text-align:center;">Patient Name:&nbsp;&nbsp;<strong>' . $fetchdatasendemail[0]['p_name'] . '</strong></h4>                        

                            

                        <table cellpadding="5">

                            <tr border="1" cellspacing="1" style="background-color: #04AA6D;">

                                <th><b>Medicine Name</b></th>

                                <th><b>Dosage</b></th>

                                <th><b>Prescribed <nobr>Date & Time</nobr></b></th>

                                <th><b>Duration</b> <small>(in days)</small></th>

                                <th><b>Assigned Doctor</b></th>

                            </tr>

                    ';

        foreach ($fetchdatasendemail as $z) {

            $html .= '<tr>

                        <td  class="col-2 text-center">' . $z['medicine'] . '</td>

                        <td  class="col-2 text-center">' . $z['dosage'] . ' </td>

                        <td class="col-2 text-center">' . date("d/m/Y", strtotime($z['created_at'])) . '<br>' . date("g:i A", strtotime($z['created_at'])) . '</td>

                        <td  class="col-2 text-center">' . $z['duration'] . '</td>

                        <td class="col-2 text-center">' . $z['doc_name'] . '</td>     

                    </tr>';
        }

        $html .= '</table>

                </body>

            </html>';



        ob_start();

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set default monospaced font

        // set margins

        $pdf->SetMargins(5, 3, 5);

        // remove default header/footer

        $pdf->setPrintHeader(false);

        $pdf->setPrintFooter(false);

        // set auto page breaks

        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor

        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set default font subsetting mode

        $pdf->setFontSubsetting(true);

        // Set font

        // dejavusans is a UTF-8 Unicode font, if you only need to

        // print standard ASCII chars, you can use core fonts like

        // helvetica or times to reduce file size.

        // $fontname = TCPDF_FONTS::addTTFfont('ubuntu.ttf', 'TrueTypeUnicode', '', 96);

        // $fontbold = TCPDF_FONTS::addTTFfont('ubuntuB.ttf', 'TrueTypeUnicode', '', 96);

        // $pdf->SetFont($fontname, '', 10);

        $pdf->AddPage();

        // Print text using writeHTMLCell()

        $pdf->writeHTML($html, true, false, true, false, '');

        //$pdf->Output(dirname(__FILE__).'example_001.pdf', 'F');

        // $pdf_name = ''.$customer.time().'.pdf';

        //$pdf_name = 'test.pdf';

        ob_end_flush();



        // $pdf->Output(uniqid().'-'.$pid, 'I');

        // die;



        $filename = uniqid() . '-' . $pid;

        $fname = APPPATH . '/Medication/' . $filename . '.pdf';

        $pdf->Output($fname, 'F');

        // die;



        // $path = 'your path goes here';

        // $file = $path . "/" . $filename;



        $mailto = $fetchdatasendemail[0]['email_id'];

        $subject = 'Medication Pdf for the patient';

        $message = 'Dear, ' . $fetchdatasendemail[0]['p_name'] . 'this mail is regarding your medication history. Your Medication History is attached below. Thank you.';



        $content = file_get_contents($fname);

        $content = chunk_split(base64_encode($content));



        // a random hash will be necessary to send mixed content

        $separator = md5(time());



        // carriage return type (RFC)

        $eol = "\r\n";



        // main header (multipart mandatory)

        $headers = "From: name <info@dotlinkertech.com>" . $eol;

        $headers .= "MIME-Version: 1.0" . $eol;

        $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;

        $headers .= "Content-Transfer-Encoding: 7bit" . $eol;

        $headers .= "This is a MIME encoded message." . $eol;



        // message

        $body = "--" . $separator . $eol;

        $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;

        $body .= "Content-Transfer-Encoding: 8bit" . $eol;

        $body .= $message . $eol;



        // attachment

        $body .= "--" . $separator . $eol;

        $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;

        $body .= "Content-Transfer-Encoding: base64" . $eol;

        $body .= "Content-Disposition: attachment" . $eol;

        $body .= $content . $eol;

        $body .= "--" . $separator . "--";



        //SEND Mail

        if (mail($mailto, $subject, $body, $headers)) {

            echo "mail send ... OK";

            header('Location:' . site_url('hospital_Controller/ongoing_treatments'));
        } else {

            echo "mail send ... ERROR!";

            print_r(error_get_last());
        }
    }

    public function updateHosTreat()

    {

        $treat_id = $this->input->post('treat_id');

        $details = $this->input->post('details');

        $from_date = $this->input->post('f_d');

        $to_date = $this->input->post('t_d');

        // $treatData = array(

        //     'treat_id' => $treat_id,

        //     'details' => $details

        // );

        $search['id'] =  $this->input->post('treat_id');

        $data['details'] = $this->input->post('details');

        $data['from_date'] = $this->input->post('f_d');

        $data['to_date'] = $this->input->post('t_d');

        $this->load->model('hospitalView_Model');

        $data = $this->hospitalView_Model->updateHosTreatment($search, $data);

        // if ($data) {

        //     $this->load->view('Doctors/treatment');

        // } else {

        //     $this->load->view('Doctors/treatment');

        // }

        $this->ongoing_treatments();
    }

    public function holiday()

    {

        if (!$this->session->userdata('email_id'))

            redirect('hospital/login-page');

        $layout = 0;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $this->load->model('holiday');

        $data = $this->holiday->getdata();

        $holidays = array(

            'result' =>  $data,

            'layout' => $layout,

        );

        $this->load->view('Hospital/holiday_list', $holidays);
    }



    public function employees()

    {

        if (!$this->session->userdata('email_id'))

            redirect('hospital/login-page');

        $layout = 0;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        $this->load->model('employees_Model');

        $data = $this->employees_Model->get_data($hos_id);

        $employees = array(

            'result' => $data,

            'layout' => $layout,

        );

        $this->load->view('Hospital/employees', $employees);
    }



    public function addEmp()

    {

        // add employee page

        $layout = 1;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        $data = array(

            'hos_id' => $hos_id,

            'layout' => $layout,

        );

        $this->load->view('Hospital/employees', $data);
    }



    public function addEmpp()

    {

        // save employee details to database

        $hos_id = $_SESSION['email_id'];

        $this->load->model('employees_Model');

        $data = array(

            'emp_id' => $this->input->post('emp_id'),

            'emp_name' => $this->input->post('emp_name'),

            'email' => $this->input->post('email'),

            'join_date' => $this->input->post('join_date'),

            'role' => $this->input->post('role'),

            'mobile' => $this->input->post('phone'),

            'hos_id' => $hos_id,

            'stat' => $this->input->post('status'),

        );

        $this->employees_Model->put_data($data);

        header('location:' . site_url('hospital/employees-list'));
    }



    public function editEmp()

    {

        $layout = 2;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        if (!$this->input->post()) {

            $search = array(

                'emp_id' => $this->uri->segment(3),

                'hos_id' => $_SESSION['email_id']

            );

            $empData = $this->db->where($search)

                ->get('employee_details')

                ->result_array();

            $data['empData'] = $empData;

            $data['layout'] = $layout;

            if ($data) {

                $this->load->view('Hospital/employees', $data);
            } else {

                header('location:' . site_url('hospital/employees'));
            }
        } else {

            $search['emp_id'] =  $this->input->post('emp_id');

            $data = $this->input->post();

            $this->load->model('employees_Model');

            $confirmed = $this->employees_Model->update_data($search, $data);

            if ($confirmed) {

                header('location:' . site_url('hospital/employees-list'));
            } else {

                header('location:' . site_url('hospital/edit-employee'));
            }
        }
    }



    public function delEmp()

    {

        $search = array(

            'emp_id' => $this->uri->segment(3),

            'hos_id' => $_SESSION['email_id']

        );

        $this->db->delete('employee_details', $search);

        $q = $this->db->where($search)

            ->get('employee_details');

        if (!$q->num_rows()) {

            header('location:' . site_url('hospital/employees-list'));
        } else {

            header('location:' . site_url('hospital/employees-list'));
        }
    }

    public function fetchByEmpRole()

    {

        $search = array(

            'hos_id' => $this->input->post('hos_id'),

            'role' => $this->input->post('emp_role'),

        );



        $q = $this->db->select('*')->from('employee_details')->where($search)->get()->result_array();

        $res = "<div class='row'>

        <div class='col-md-12'>

            <div class='table-responsive'>

                <table class='table table-striped mb-0'>

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Name</th>

                            <th>Employee ID</th>

                            <th>Email</th>

                            <th>Mobile</th>

                            <th>Join Date</th>

                            <th>Role</th>

                            <th>Status</th>

                            <th class='text-right'>Action</th>

                        </tr>

                    </thead>

        <tbody>";

        $x = 0;

        foreach ($q as $emp) {

            $x = $x + 1;

            $res .=  "

        <tr>

        <td>" . $x . "</td>

        <td>" . $emp['emp_name'] . "</td>

        <td>" . $emp['emp_id'] . "</td>

        <td>" . $emp['email'] . "</td>

        <td>" . $emp['mobile'] . "</td>

        <td>" . $emp['join_date'] . "</td>

        <td>" . $emp['role'] . "</td>";



            if ($emp['stat']) :

                $res .= "<td><span class='custom-badge status-green'>Active</span></td>";

            else :

                $res .= "<td><span class='custom-badge status-red'>Inactive</span></td>";

            endif;



            $res .= "<td class='text-right'>

        <div class='dropdown dropdown-action'>

            <a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='fa fa-ellipsis-v'></i></a>

            <div class='dropdown-menu dropdown-menu-right'>

                <a class='dropdown-item' href='" . site_url('hospital_Controller/editEmp/' . $emp['emp_id']) . "'><i class='fas fa-pencil-alt m-r-5'></i> Edit</a>

                <a class='dropdown-item' href='" . site_url('hospital_Controller/delEmp/' .  $emp['emp_id']) . "' onclick='return confirm('Are you sure, you want to delete it?')'><i class='fas fa-trash m-r-5'></i> Delete</a>

            </div>

        </div>

        </td>

        </tr>";
        }

        $res .= "

        </tbody>

        </table>

        </div>

        </div>

        </div>";



        echo $res;
    }



    public function leaves()

    {

        if (!$this->session->userdata('email_id'))

            redirect('hospital/login-page');

        $layout = 0;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        $this->load->model('employees_Model');

        $data = $this->employees_Model->get_leavedata($hos_id);

        $leave = array(

            'leaves' => $data,

            'layout' => $layout,

        );

        $this->load->view('Hospital/leaves', $leave);
    }

    public function addLeaves()

    {

        $layout = 1;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        $this->load->model('employees_Model');

        $data = $this->employees_Model->get_data($hos_id);

        $data2 = $this->employees_Model->get_holiday($hos_id);

        $employees = array(

            'result' => $data,

            'holiday' => $data2,

            'layout' => $layout,

        );

        $this->load->view('Hospital/leaves', $employees);
    }



    public function fetchEmpleves()

    {

        if ($this->input->get('q')) {

            $this->load->model('employees_Model');

            echo $this->employees_Model->fetchEmpleves($this->input->get('q'));
        }
    }

    public function addLeavesdata()

    {

        $hos_id = $_SESSION['email_id'];

        $this->load->model('employees_Model');

        $emp_name = $this->employees_Model->getname($this->input->post('emp_id'));

        $data = array(

            'emp_id' => $this->input->post('emp_id'),

            'emp_name' => $emp_name,

            'leave_type' => $this->input->post('leave_type'),

            'from_date' => $this->input->post('from_date'),

            'to_date' => $this->input->post('to_date'),

            'no_days' => $this->input->post('no_days'),

            'reason' => $this->input->post('reason'),

            'hos_id' => $hos_id,

        );

        $this->employees_Model->putleavedata($data);

        $search = array(

            'emp_id' => $this->input->post('emp_id'),

            'hos_id' => $_SESSION['email_id']

        );

        $data2 = array(

            'rem_leaves' => $this->input->post('rem_leaves')

        );



        $this->employees_Model->upleavedata($search, $data2);

        header('location:' . site_url('hospital_Controller/leaves'));
    }



    public function delLeave()

    {

        $search = array(

            'id' => $this->uri->segment(3),

            'hos_id' => $_SESSION['email_id']

        );

        $this->load->model('employees_Model');

        $this->employees_Model->delLeave($search);

        $this->leaves();
    }



    public function editLeave()

    {

        $layout = 2;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        $id = $this->uri->segment(3);

        $this->load->model('employees_Model');

        $search = array(

            'id' => $id,

            'hos_id' => $hos_id

        );

        if (!$this->input->post()) {

            $ldata = $this->db->where($search)

                ->get('leaves_details')

                ->result_array();

            // echo "<pre>";

            // print_r($ldata);

            // die;

            $data2 = $this->employees_Model->get_holiday($hos_id);

            $data = array(

                'leaveData' => $ldata,

                'holiday' => $data2,

                'layout' => $layout,

            );

            if ($data) {

                $this->load->view('Hospital/leaves', $data);
            } else {

                header('location:' . site_url('hospital_Controller/leaves'));
            }
        } else {

            $data = array(

                'emp_id' => $this->input->post('emp_id'),

                'emp_name' => $this->input->post('emp_name'),

                'leave_type' => $this->input->post('leave_type'),

                'from_date' => $this->input->post('from_date'),

                'to_date' => $this->input->post('to_date'),

                'no_days' => $this->input->post('no_days'),

                'reason' => $this->input->post('reason')

            );

            $id1 = $this->input->post('id');

            $search = array(

                'id' => $id1,

                'hos_id' => $hos_id

            );

            $this->employees_Model->editleavedata($search, $data);

            $search2 = array(

                'emp_id' => $this->input->post('emp_id'),

                'hos_id' => $hos_id

            );

            $data2 = array(

                'rem_leaves' => $this->input->post('rem_leaves')

            );

            $this->employees_Model->upleavedata($search2, $data2);

            header('location:' . site_url('hospital_Controller/leaves'));
        }
    }

    public function add_holiday()

    {

        $layout = 1;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        if ($this->input->post()) {

            $data = array(

                'holiday_name' => $this->input->post('holiday_name'),

                'holiday_date' => $this->input->post('holiday_date'),

                'hos_id'       => $hos_id

            );



            $this->load->model('holiday');

            $this->holiday->add_holiday($data);

            $this->holiday();
        } else {

            $data = array(

                'layout' => $layout,

            );

            $this->load->view("hospital/holiday_list", $data);
        }
    }



    public function delholiday()

    {

        $search = array(

            'id' => $this->uri->segment(3),

            'hos_id' => $_SESSION['email_id']

        );

        // echo "<div>";

        // print_r($search);

        // die;

        // $this->load->model('holiday');

        // $this->holiday->holiday($search);

        // $this->holiday_list();

        $this->db->delete('holiday_list', $search);

        return redirect('hospital_Controller/holiday');
    }



    public function edit_holiday()

    {

        $layout = 2;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        if ($this->input->post()) {

            $data = array(

                'holiday_name' => $this->input->post('holiday_name'),

                'holiday_date' => $this->input->post('holiday_date'),

                'hos_id'       => $hos_id

            );

            $search = array(

                'id' => $this->input->post('id'),

                'hos_id' => $hos_id

            );

            $this->db->where(['id' => $search['id'], 'hos_id' => $search['hos_id']])

                ->update('holiday_list', $data);

            return redirect('hospital_Controller/holiday');
        } else {

            $id = $this->uri->segment(3);

            $data['holiday'] = $this->db->select('*')->from('holiday_list')->where('id', $id)

                ->get()->result_array();

            $data['layout'] = $layout;

            $this->load->view("hospital/holiday_list", $data);
        }
    }



    public function diagnostic_services()

    {

        if (!$this->session->userdata('email_id'))

            redirect('hospital/login-page');

        $layout = 0;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        $this->load->model('diagnostic_services_Model');

        $data = $this->diagnostic_services_Model->getData($hos_id);

        $diag = array(

            'result' => $data,

            'layout' => $layout,

        );

        $this->load->view('Hospital/diagnostic_services', $diag);
    }



    public function add_Diagservice()

    {

        $layout = 1;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        $data = array(

            'hos_id' => $hos_id,

            'layout' => $layout,

        );

        if (!$this->input->post()) {

            $this->load->view('Hospital/diagnostic_services', $data);
        } else {

            $data2 = array(

                'diag_id' => $this->input->post('diag_id'),

                'p_name' => $this->input->post('p_name'),

                'p_details' => $this->input->post('p_details'),

                'pre_testinfo' => $this->input->post('pre_testinfo'),

                'loc_type' => $this->input->post('loc_type'),

                'avail_hrs' => $this->input->post('avail_hrs'),

                'report_delivary' => $this->input->post('report_delivary'),

                'price' => $this->input->post('price'),

                'stat' => $this->input->post('stat'),

                'hos_id' => $hos_id

            );

            $this->load->model('diagnostic_services_Model');

            $this->diagnostic_services_Model->put_data($data2);

            header('location:' . site_url('hospital_Controller/diagnostic_services'));
        }
    }



    public function edit_Diagservice()

    {

        $layout = 2;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        $hos_id = $_SESSION['email_id'];

        $diag_id = $this->uri->segment(3);

        $this->load->model('diagnostic_services_Model');

        if (!$this->input->post()) {

            $search = array(

                'hos_id' => $hos_id,

                'diag_id' => $diag_id,

            );

            $data =  $this->diagnostic_services_Model->getEditData($search);

            $diag['data'] = $data;

            $diag['layout'] = $layout;

            $this->load->view('Hospital/diagnostic_services', $diag);
        } else {

            $search = array(

                'hos_id' => $hos_id,

                'diag_id' => $this->input->post('diag_id')

            );

            $data2 = array(

                'p_name' => $this->input->post('p_name'),

                'p_details' => $this->input->post('p_details'),

                'pre_testinfo' => $this->input->post('pre_testinfo'),

                'loc_type' => $this->input->post('loc_type'),

                'avail_hrs' => $this->input->post('avail_hrs'),

                'report_delivary' => $this->input->post('report_delivary'),

                'price' => $this->input->post('price'),

                'stat' => $this->input->post('stat'),

            );

            $this->diagnostic_services_Model->up_data($search, $data2);

            header('location:' . site_url('hospital_Controller/diagnostic_services'));
        }
    }

    public function del_Diagservice()

    {

        $search = array(

            'diag_id' => $this->uri->segment(3),

            'hos_id' => $_SESSION['email_id']

        );

        $this->db->delete('hospital_diagnostics', $search);

        header('location:' . site_url('hospital_Controller/diagnostic_services'));
    }



    public function trending_offers()

    {

        if (!$this->session->userdata('email_id'))

            redirect('hospital/login-page');

        $hos_id = $_SESSION['email_id'];

        $this->load->model('hospitalView_Model');

        $data = $this->hospitalView_Model->trendingoffers($hos_id);

        // echo "<pre>";

        // print_r($data);

        // die;

        if ($data) {

            $this->load->view('Hospital/trendingoffers', $data);
        } else {

            $data['error'] = 'database error';

            $this->load->view('Hospital/trendingoffers', $data);
        }
    }

    public function booster()

    {

        $this->load->view('Hospital/booster');
    }

    public function get_doc_degee()

    {
        $degree_name  = $this->input->post('degree_name');  
          echo $degree_name;
        
   
    }

   


}
?>
