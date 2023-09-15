<?php

defined('BASEPATH') or exit('No direct script access allowed');

class doctors_Model extends CI_Model

{

    public function docData($docId)

    {

        $search = array(

            'doc_id' => $docId,

        );

        $q = $this->db->where($search)

            ->get('doctor_registration');

        $q1 = $this->db->where($search)

            ->get('doctor_details');

        if ($q->num_rows() || $q1->num_rows()) {

            $data = array(

                'docReg' => $q->result_array(),

                'docDet' => $q1->result_array(),

            );

            return $data;

        } else {

            return false;

        }

    }



    public function doctorsConsult($consultId)

    {

        $search = array(

            'doctor_consults.id' => $consultId,

        );

        $q = $this->db->select('doctor_consults.*,doctor_details.doc_name,doctor_details.picture as doc_pic,user_details.name,user_details.picture')

            ->from('doctor_consults')

            ->join('doctor_details', 'doctor_details.doc_id = doctor_consults.doc_id')

            ->join('user_details', 'user_details.email_id = doctor_consults.email_id', 'left')

            ->where($search)

            ->get();



        $data = array(

            'consultData' => $q->result_array(),

        );



        return $data;

    }



    public function addConsultation($data)

    {

        $this->db->insert('doctor_consults', $data);

    }



    public function updDoc($data)

    {

        $search = array(

            'doc_id' => $data['doc_id'],

        );

        $docReg = array(

            'doc_name' => $data['doc_name'],

            'adhar' => $data['adhar'],

        );

        if (array_key_exists('picture', $data)) {

            $docDet = array(

                'doc_name' => $data['doc_name'],

                'state_medical_council' => $data['state_medical_council'],

                'email_id' => $data['email_id'],

                'city' => $data['city'],

                'country' => $data['country'],

                'state' => $data['state'],

                'zip' => $data['zip'],

                'phone' => $data['phone'],

                'specialization' => $data['specialization'],
                
                 'department' => $data['department'],

                'picture' => $data['picture'],


                'degree' => $data['degree'],

                'speciality' => $data['speciality'],

                'experience' => $data['experience'],

                'services' => $data['services'],
                
                'awards' => $data['awards'],

                'certifications'  => $data['certifications'],

            );

        } else {

            $docDet = array(

                'doc_name' => $data['doc_name'],

                'state_medical_council' => $data['state_medical_council'],

                'email_id' => $data['email_id'],

                'city' => $data['city'],

                'country' => $data['country'],

                'state' => $data['state'],

                'zip' => $data['zip'],

                'phone' => $data['phone'],

                'specialization' => $data['specialization'],
              
                'department' => $data['department'],

                'degree' => $data['degree'],

                'speciality' => $data['speciality'],

                'experience' => $data['experience'],

                'services' => $data['services'],
                
                'awards' => $data['awards'],

                'certifications'  => $data['certifications'],
            );

        }

        $this->db->where($search)

            ->update('doctor_registration', $docReg);

        $this->db->where($search)

            ->update('doctor_details', $docDet);



        $q = $this->db->where($docReg)

            ->get('doctor_registration');

        $q1 = $this->db->where($docDet)

            ->get('doctor_details');


        if ($q->num_rows() || $q1->num_rows()) {

            return true;

        } else {

            return false;

        }

    }



    public function delDoc($doc_id)

    {

        $search = array(

            'doc_id' => $doc_id,

        );

        $data = array(

            'hos_id' => NULL,

        );

        $this->db->where($search)

            ->update('doctor_details', $data);

        $check = array(

            'doc_id' => $doc_id,

            'hos_id' => '',

        );

        $q = $this->db->where($check)

            ->get('doctor_details');

        if ($q->num_rows()) {

            return true;

        } else {

            return false;

        }

    }



    public function doctorsProfile($docId)

    {

        $search = array(

            'doc_id' => $docId,

        );

        $q = $this->db->where($search)

            ->get('doctor_details');

        $q2 = $this->db->select('*')

            ->from('doctor_review_user')

            ->where($search)

            ->join('user_details', 'user_details.email_id = doctor_review_user.email_id')

            ->get();

        $q1 = $this->db->where($search)

            ->get('doctors_experience');

        $q3 = $this->db->select('doctor_consults.*,user_details.picture,user_details.name')

            ->from('doctor_consults')

            ->join('user_details', 'user_details.email_id = doctor_consults.email_id', 'left')

            ->where('doctor_consults.doc_id', $docId)

            ->get();

        $q4 =  $this->db->where($search)

            ->get('doctor_posts');

        if ($q->num_rows()) {

            $data = array(

                'doctorData' => $q->result_array(),

                'reviewData' => $q2->result_array(),

                'expData' => $q1->result_array(),

                'consultData' => $q3->result_array(),

                'postData' => $q4->result_array(),

            );

            return $data;

        } else {

            return false;

        }

    }



     public function topDoc()
    {
        
       $sql = $this->db->select('*')
       ->from('doctor_review_user')
       ->get();
       
        if($sql->num_rows() > 0)
        {

        $doctors = $this->db->select('doctor_details.*,doctors_schedule.*,avg(doctor_review_user.star_rating) as star_rating, avg(doctor_review_user.star_rating_ontime) as star_rating_ontime,count(doctor_review_user.star_rating) as review_count')
            ->from('doctor_details')
            ->join('doctors_schedule', 'doctors_schedule.doc_id=doctor_details.doc_id')
            ->join('doctor_review_user', 'doctor_review_user.doc_id=doctor_details.doc_id','left')
            ->group_by('doctor_details.doc_id')
            ->order_by('doctor_review_user.star_rating', 'desc')->get()
            ->result_array();
        }
        else
        {
            $doctors = $this->db->select('doctor_details.*,doctors_schedule.*,doctor_review_user.star_rating,doctor_review_user.star_rating_ontime')
            ->from('doctor_details')
            ->join('doctors_schedule', 'doctors_schedule.doc_id=doctor_details.doc_id')
            ->join('doctor_review_user', 'doctor_review_user.doc_id=doctor_details.doc_id','left')
            ->get()
            ->result_array();
        }
        return $doctors;
    }

    public function getConsultData($doc_id)

    {

        $consult = $this->db->where('doc_id', $doc_id)

            ->get('doctor_consults')

            ->result_array();

        if ($consult) {

            $data = array(

                'consult' => $consult

            );

            return $data;

        } else {

            return false;

        }

    }

    public function getConsultDatabyId($consult_id)

    {

        $consultData = $this->db->where('id', $consult_id)

            ->get('doctor_consults')

            ->result_array();

        if ($consultData) {

            $data = array(

                'consultData' => $consultData

            );

            return $data;

        } else {

            return false;

        }

    }

    public function insertConsultData($data)

    {

        $search = array(

            'id' => $data['consult_id'],

        );

        $consult = array(

            'consult_query' => $data['query'],

            'answer' => $data['answer'],

        );

        $q = $this->db->where($search)

            ->update('doctor_consults', $consult);



        if ($q) {

            return true;

        } else {

            return false;

        }

    }

    public function deleteConsultData($consult_id)

    {

        $q =  $this->db->where('id', $consult_id)

            ->delete('doctor_consults');



        if ($q) {

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



    public function updateDocTreatment($search, $data)

    {

        $this->db->where($search)

            ->update('doctor_treatments', $data);

    }

  public function register($data){

        $doc_reg = array(

            'registration_num' => $data['registration_num'],

            'email_id' => $data['email_id'],

            'doc_name' => $data['doc_name'],

            'password' => $data['password'],

            'adhar' => $data['adhar'],

           // 'license' => $data['doc_id']

        );

        $doc_det = array(

            'registration_num' => $data['registration_num'],

            'email_id' => $data['email_id'],

            'doc_name' => $data['doc_name'],

            'state_medical_council' => $data['state_medical_council'],

            'specialization' => $data['specialization'],

            'department' => $data['department'],

            'country' => $data['country'],

            'state' => $data['state'],

            'city' => $data['city'],

            'zip' => $data['zip'],

            'phone' => $data['phone'],

            'hos_id' => $data['hos_id'],
            
          'signature' => $data['signature'],

            'degree' => $data['degree'],

            'about' => $data['about'],

            'speciality' => $data['speciality'],

            'experience' => $data['experience'],

            'services' => $data['services'],
            
            'awards' => $data['awards'],

            'certifications'  => $data['certifications'],

            'picture' => $data['picture']
        );

                //    echo '<pre>';
                //   print_r($doc_det);die;

        $this->db->insert('doctor_details',$doc_det);

        $this->db->insert('doctor_registration',$doc_reg);

        return true;

    }

    public function get_state_council($council,$regis){


        //  $q = $this->db->select('doctor_details.registration_num')

        //     ->from('doctor_details')

        //     ->where('state_medical_council', $state_medical_council)

        //     ->get()->result_array();

         $q = $this->db->query("SELECT registration_num FROM doctor_details WHERE state_medical_council = '$council' AND registration_num IN ($regis)");

        //  if($q){
        //     echo '<script>
        //         alert("already exist");
        //     </script>';
        //  };

        //    if ($q->num_rows()) {

        //     return true;

        // } else {

        //     return false;

        // }
        if ($q->num_rows()) {

           return $q->result_array();
         

        } else {

            

           return false;

        }
       
        //     $data =  $q->result_array();


        //  $items = array();
        // foreach($data as $x)
        // {
        //      $items[] = $x;
        // }


        // //  echo '<pre>';
        // //          print_r($items);die;

        //  if ($items) {

        //   echo "suman"; 

        //  }
        //  else{
        //     echo "error";
        //  }
   
    }

}

