<?php
defined('BASEPATH') or exit('No direct script access allowed');
class hospitalView_Model extends CI_Model
{

    public function hospitalData($hos_id)
    {
        $search = array(
            'hos_id' => $hos_id,
        );

        $hospitalDet = $this->db->where($search)
            ->get('hospital_details');
        $hospitalPost = $this->db->where($search)
            ->order_by('hospital_posts.post_time', 'desc')
            ->get('hospital_posts');
        $appointments = $this->db->select('doctors_appointment.*,user_details.*,doctor_details.*')
            ->from('doctor_details')
            ->join('doctors_appointment', 'doctors_appointment.doc_id = doctor_details.doc_id')
            ->join('user_details', 'user_details.email_id = doctors_appointment.user_id')
            ->where($search)
            ->order_by('doctors_appointment.appt_datetime', 'desc')
            ->limit(6)
            ->get()
            ->result_array();
        $depts = $this->db->select('hospital_departments.*,departments.*,avg(department_review_user.star_rating) as avr,count(department_review_user.star_rating) as total_reviews')
            ->from('hospital_departments')
            ->where('hospital_departments.hos_id', $hos_id)
            ->join('department_review_user', 'department_review_user.dept_id = hospital_departments.dept_id AND department_review_user.hos_id = hospital_departments.hos_id', 'left')
            ->join('departments', 'departments.dept_id = hospital_departments.dept_id', 'inner')
            ->group_by('hospital_departments.dept_id')
            ->order_by('avr', 'desc')
            ->get();
        $post = $this->db->select('*')
            ->from('hospital_posts')
            ->join('hospital_details', 'hospital_details.hos_id = hospital_posts.hos_id')
            ->order_by('hospital_posts.post_time', 'desc')
            ->get();
        $assocDoc = $this->db->select('doctor_details.*,departments.dept_name,avg(doctor_review_user.star_rating) as star_rating, count(doctor_review_user.star_rating) as review_count')
            ->from('doctor_details')
            ->where($search)
            ->join('departments', 'departments.dept_id = doctor_details.specialization')
            ->join('doctor_review_user', 'doctor_review_user.doc_id = doctor_details.doc_id', 'left')
            ->group_by('doctor_review_user.doc_id')
            ->order_by('star_rating', 'desc')
            ->get();
        $q = $this->db->select('*')
            ->from('hospital_consults')
            ->where($search)
            ->join('user_details', 'user_details.email_id = hospital_consults.email_id')
            ->get();
        /* echo '<pre>';
        print_R($depts->result_array()); */
        if ($hospitalDet->num_rows() && $hospitalPost->num_rows() && $assocDoc->num_rows() && $q->num_rows()) {

            $data = array(
                'hospitalDet' => $hospitalDet->result_array(),
                'hospitalPost' => $hospitalPost->result_array(),
                'assocDoc' => $assocDoc->result_array(),
                'consultData' => $q->result_array(),
                'post' => $post->result_array(),
                'depts' => $depts->result_array(),
                'appointments' => $appointments
            );

            return $data;
        } else {
            return false;
        }
    }
    public function offerData($hos_id)
    {
        $search = array(
            'hospital_offers.hos_id' => $hos_id
        );
        $q = $this->db->select('hospital_offers.*,doctor_details.doc_name')
            ->from('hospital_offers')
            ->join('doctor_details', 'doctor_details.doc_id = hospital_offers.doc_id')
            ->where($search)
            ->get();
        $q2 = $this->db->select('hospital_offers.*,treatments.treat_name')
            ->from('hospital_offers')
            ->join('treatments', 'treatments.treat_id = hospital_offers.treat_id')
            ->where($search)
            ->get();
            
            if ($q->num_rows()) {
            $data = array(
                'offers' => $q->result_array(),
                'toffers' => $q2->result_array()
            );
            return $data;
        } else {
            return false;
        }
        // $q3 = $this->db->select('hospital_offers.*,total_avails.avail_count')
        //     ->from('hospital_offers')
        //     ->join('total_avail', 'total_avail.avail_count = hospital_offers.total_avails')
        //     ->where($search)
        //     ->get();
       

        
    }
    public function getAdvertise($hos_id)
    {
        $ads = $this->db->where('hos_id', $hos_id)
            ->get('hospital_advertisement')
            ->result_array();
        if ($ads) {
            $data = array(
                'ads' => $ads
            );
            return $data;
        } else {
            return false;
        }
    }
    public function updAd($search, $data)
    {
        $this->db->where($search)
            ->update('hospital_advertisement', $data);
        $q = $this->db->where($data)
            ->get('hospital_advertisement');
        if ($q->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
    public function fetchAd()
    {
        $query = $this->db->select('*')
            ->from('hospital_advertisement')
            ->order_by('ad_id', 'random')
            ->get()
            ->result_array();
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }
    public function getAdById($ad_id)
    {
        $ad = $this->db->where('ad_id', $ad_id)
            ->get('hospital_advertisement')
            ->result_array();
        if ($ad) {
            $data = array(
                'ad' => $ad,
            );
            return $data;
        } else {
            return false;
        }
    }
    public function addAdvertise($data)
    {
        $this->db->insert('hospital_advertisement', $data);
        $q = $this->db->where($data)
            ->get('hospital_advertisement');
        if ($q->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
    public function getOfferById($coupon_id)
    {
        $offer = $this->db->where('coupon_id', $coupon_id)
            ->get('hospital_offers');
        if ($offer->num_rows()) {
            $data = array(
                'offer' => $offer->result_array()
            );
            return $data;
        } else {
            return false;
        }
    }
    public function addOffer($data)
    {
        $this->db->insert('hospital_offers', $data);
        $q = $this->db->where($data)
            ->get('hospital_offers');
        if ($q->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
    public function updOffer($search, $data)
    {
        //  echo '<pre>';
        //         print_R($search);
        //         die;
        $this->db->where($search)
            ->update('hospital_offers', $data);
        $q = $this->db->where($data)
            ->get('hospital_offers');
        if ($q->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
    public function hosData()
    {
        $hospitalPost = $this->db->select('hospital_posts.*, hospital_details.*')
            ->from('hospital_posts')
            ->join('hospital_details', 'hospital_posts.hos_id = hospital_details.hos_id')
            ->order_by('post_time', 'desc')
            ->get();
        if ($hospitalPost->num_rows()) {
            $data = array(
                'hospitalPost' => $hospitalPost->result_array()
            );
            return $data;
        } else {
            return false;
        }
    }
    public function reviewUserData($hosId)
    {
        $search = array(
            'hos_id' => $hosId,
        );
        $q = $this->db->select('*')
            ->from('hospital_review_user')
            ->where($search)
            ->join('user_details', 'user_details.email_id = hospital_review_user.email_id')
            ->get();
        if ($q->num_rows()) {
            return $q->result_array();
        } else {
            return false;
        }
    }
    public function deptsAll($hos_id)
    {
        $q = $this->db->query("SELECT * FROM departments WHERE dept_id NOT IN (SELECT dept_id FROM hospital_departments WHERE hos_id = '$hos_id');");
        if ($q->num_rows()) {
            return $q->result_array();
        } else {
            return false;
        }
    }

    public function addNewDept($data)
    {
        $dept = array(
            'dept_id' => $data['dept_id'],
            'dept_name' => $data['dept_name'],
            'dept_description' => $data['dept_description'],
        );
        $rev = array(
            'dept_id' => $data['dept_id'],
            'hos_id' => $data['hos_id'],
        );
        $hos_dept = array(
            'dept_id' => $data['dept_id'],
            'hos_id' => $data['hos_id'],
            'status' => $data['status'],
            'facilities' => $data['facilities'],
            'block_no' => $data['block_no'],
            'floor_no' => $data['floor_no'],
            'total_beds' => $data['total_beds'],
            'available_beds' => $data['available_beds'],
            'open_at' => $data['open_at'],
            'close_at' => $data['close_at'],
            'services' => $data['services'],
            'addon_services' => $data['addon_services'],
        );
        if (isset($data['spoc'])) {
            $hos_dept['spoc'] = $data['spoc'];
            $hos_dept['spoc_no'] = $data['spoc_no'];
            $hos_dept['spoc_email'] = $data['spoc_email'];
        }
        $this->db->insert('departments', $dept);
        $this->db->insert('hospital_departments', $hos_dept);
        $this->db->insert('department_review_user', $rev);

        $q = $this->db->where($dept)
            ->get('departments');
        $q1 = $this->db->where($hos_dept)
            ->get('hospital_departments');
        if ($q->num_rows() && $q1->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
    public function updDept($search, $data)
    {
        $this->db->where($search)
            ->update('hospital_departments', $data);
        $search = array(
            'dept_id' => $search['dept_id'],
            'hos_id' => $search['hos_id'],
            'facilities' => $data['facilities'],
            'status' => $data['status'],
        );
        $q = $this->db->where($search)
            ->get('hospital_departments');
        if ($q->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
    public function delDept($hos_id, $dept_id)
    {
        $search = array(
            'hos_id' => $hos_id,
            'dept_id' => $dept_id,
        );
        $this->db->delete('hospital_departments', $search);
        $q = $this->db->where($search)
            ->get('hospital_departments');
        if (!$q->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
    public function deptData($search)
    {
        $dept_id = $search['dept_id'];
        $q = $this->db->where($search)
            ->get('hospital_departments');
        $q1 = $this->db->where('dept_id', $dept_id)
            ->get('departments');
        if ($q->num_rows() && $q1->num_rows()) {
            $data = array(
                'hosDept' => $q->result_array(),
                'dept' => $q1->result_array(),
            );
            return $data;
        } else {
            return false;
        }
    }
    public function treatData($hos_id)
    {

        $data = $this->db->select('*')
            ->from('hospital_treatments')
            ->where('hospital_treatments.hos_id', $hos_id)
            ->join('treatments', 'treatments.treat_id = hospital_treatments.treat_id')
            ->join('departments', 'departments.dept_id = treatments.dept_id')
            ->join('hospital_departments', 'hospital_departments.dept_id = treatments.dept_id AND hospital_departments.hos_id = hospital_treatments.hos_id')
            ->get();
        if ($data->num_rows()) {
            return $data->result_array();
        } else {
            return false;
        }
    }
    public function getTreat($hos_id)
    {
        $depts = $this->db->where('hospital_departments.hos_id', $hos_id)
            ->join('departments', 'departments.dept_id = hospital_departments.dept_id')
            ->get('hospital_departments');

        if ($depts->num_rows()) {
            $data = array(
                'depts' => $depts->result_array(),

            );
            return $data;
        } else {
            return false;
        }
    }
    public function fetchTreat($dept_id)
    {
        $hos_id = $_SESSION['email_id'];
        $q = $this->db->query("SELECT * FROM treatments WHERE dept_id = '$dept_id' AND treat_id NOT IN (SELECT treat_id FROM hospital_treatments WHERE hos_id = '$hos_id');");
        $output = '<option value="" selected>Select a treatment</option>';
        $output .= '<option value="other">Other</option>';
        if ($q->num_rows()) {
            $q = $q->result_array();
            foreach ($q as $x) {
                $output .= '<option value="' . $x['treat_id'] . '">' . $x['treat_name'] . '</option>';
            }
        }
        return $output;
    }
    public function fetchDoc($dept_id)
    {
        $hos_id = $_SESSION['email_id'];
        $search = array(
            'doctor_details.specialization' => $dept_id,
            'doctor_details.hos_id' => $hos_id
        );
        $q = $this->db->select('doctor_details.doc_id,doctor_details.doc_name')
            ->from('doctor_details')
            ->where($search)
            ->get()
            ->result_array();

        $output = '<option value="">Select a Doctor</option>';

        foreach ($q as $x) {
            $output .= '<option value="' . $x['doc_id'] . '">Dr ' . $x['doc_name'] . '</option>';
        }
        return $output;
    }
    public function addNewTreat($treat, $hostreat)
    {
        $this->db->insert('treatments', $treat);
        $this->db->insert('hospital_treatments', $hostreat);

        $q = $this->db->where($treat)
            ->get('treatments');
        $q1 = $this->db->where($hostreat)
            ->get('hospital_treatments');
        if ($q->num_rows() && $q1->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
    public function addTreat($hostreat)
    {
        $this->db->insert('hospital_treatments', $hostreat);
        $q1 = $this->db->where($hostreat)
            ->get('hospital_treatments');
        if ($q1->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
    public function updPatient($search, $data)
    {
        $this->db->where($search)
            ->update('hospital_patients', $data);
        $q = $this->db->where($data)
            ->get('hospital_patients');
        if ($q->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
    public function editTreatData($treat_id)
    {
        $data = $this->db->select('*')
            ->from('hospital_treatments')
            ->where('hospital_treatments.treat_id', $treat_id)
            ->join('treatments', 'treatments.treat_id = hospital_treatments.treat_id')
            ->join('departments', 'departments.dept_id = treatments.dept_id')
            ->get();
        if ($data->num_rows()) {
            return $data->result_array();
        } else {
            return false;
        }
    }
    public function updTreat($data, $search)
    {
        $this->db->where($search)
            ->update('hospital_treatments', $data);
        $search = array(
            'treat_id' => $search['treat_id'],
            'hos_id' => $search['hos_id'],
            'budget' => $data['budget'],
            'duration' => $data['duration'],
        );
        $q = $this->db->where($search)
            ->get('hospital_treatments');

        if ($q->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
    public function delTreat($hos_id, $treat_id)
    {
        $search = array(
            'hos_id' => $hos_id,
            'treat_id' => $treat_id,
        );
        $this->db->delete('hospital_treatments', $search);
        $q = $this->db->where($search)
            ->get('hospital_treatments');
        if (!$q->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
    public function addDept($data)
    {
        if ($data) {

            $rev = array(
                'dept_id' => $data['dept_id'],
                'hos_id' => $data['hos_id'],
            );
            $this->db->insert('hospital_departments', $data);
            $this->db->insert('department_review_user', $rev);

            $q = $this->db->where($data)
                ->get('hospital_departments');
            if ($q->num_rows()) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function docUnschData($hos_id)
    {
        $doc = $this->db->query("SELECT * FROM doctor_details WHERE hos_id = '$hos_id' AND doc_id NOT IN (SELECT doc_id FROM doctors_schedule);");
        if ($doc->num_rows()) {
            // echo '<pre>';
            // print_R($doc->result_array());
            $data = array(
                'doctors' => $doc->result_array()
            );
            return $data;
        } else {
            return false;
        }
    }
    public function addDocSch($data)
    {
        $this->db->insert('doctors_schedule', $data);
        $q = $this->db->where($data)
            ->get('doctors_schedule');
        if ($q->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
    public function addPatient($data)
    {
        $this->db->insert('hospital_patients', $data);
        $q = $this->db->where($data)
            ->get('hospital_patients');
        if ($q->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
    public function updDocSch($search, $data)
    {

        $this->db->where($search)
            ->update('doctors_schedule', $data);
        $q = $this->db->where($data)
            ->get('doctors_schedule');
        if ($q->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
    public function updHosData($search, $data)
    {
        $this->db->where($search)
            ->update('hospital_details', $data);
        $q = $this->db->where($data)
            ->get('hospital_details');
        if ($q->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
    public function editSch($doc_id)
    {
        $schedule = $this->db->select('*')
            ->from('doctors_schedule')
            ->join('doctor_details', 'doctor_details.doc_id = doctors_schedule.doc_id')
            ->where('doctors_schedule.doc_id', $doc_id)
            ->get();
        if ($schedule->num_rows()) {
            $data = array(
                'schedule' => $schedule->result_array()
            );
            return $data;
        } else {
            return false;
        }
    }
    public function docSchedules($hos_id)
    {
        $search = array(
            'doctor_details.hos_id' => $hos_id
        );

        $doctors = $this->db->select('*')
            ->from('doctor_details')
            ->join('doctors_schedule', 'doctors_schedule.doc_id = doctor_details.doc_id')
            ->join('departments', 'departments.dept_id = doctor_details.specialization')
            ->where($search)
            ->get()
            ->result_array();
        if ($doctors) {
            $data = array(
                'doctors' => $doctors
            );
            return $data;
        } else {
            return false;
        }
    }
    public function adData($ad_id)
    {
        $adDetails = $this->db->select('*')
            ->from('hospital_advertisement')
            ->where('ad_id', $ad_id)
            ->get()
            ->result_array();
        $hosDetails = $this->db->select('*')
            ->from('hospital_details')
            ->where('hos_id', $adDetails[0]['hos_id'])
            ->get()
            ->result_array();
        if ($adDetails) {
            $data = array(
                'adDetails' => $adDetails,
                'hosDetails' => $hosDetails
            );
            return $data;
        } else {
            return false;
        }
    }
    public function updateHosTreatment($search, $data)
    {
        $this->db->where($search)
            ->update('doctor_treatments', $data);
    }

    public function trendingoffers($hos_id)
    {
        
        $search = array(
            'hospital_offers.hos_id' => $hos_id
        );

        $q3 = $this->db->select('hospital_offers.*,hospital_details.hos_name')
        ->from('hospital_offers')
        ->join('hospital_details', 'hospital_offers.hos_id = hospital_details.hos_id')
        ->order_by('avail_count desc')
        ->limit(5)
        // ->where($search)
        ->get();

        if ($q3->num_rows()) {
            $data = array(
                'offers' => $q3->result_array(),
                
            );
        // print_r($data);
        // echo $_SESSION['email_id'];
        // die;

            return $data;
        } else {
            return false;
        }
            // $this->db->select('')

    }
}
