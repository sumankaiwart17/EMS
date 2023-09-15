<?php





class registerModel extends CI_Model {



    public function insertData($userdata){

        $userReg = array(

            'email_id' => $userdata['email_id'],

            'password' => $userdata['password'],

        );

        $userDet = array(

            'email_id' => $userdata['email_id'],

            'name' => $userdata['name'],

            

        );

        

        $this->db->insert('user_registration',$userReg);

        $this->db->insert('user_details',$userDet);

        

        $q = $this->db->where($userReg)

                      ->get('user_registration');

        if($q->num_rows()){

            return $q->row('email_id');

        }

        else{

             return False;

        } 

        

    }



    public function insertDoctorData($userdata){
 
        $docReg = array(

            'doc_name' => $userdata['doc_name'],

            'password' => $userdata['password'],

            'doc_id' => $userdata['doc_id'],

            'email_id' => $userdata['email_id'],

             'adhar' => $userdata['adhar'],

        );

        $docDet = array(

            'email_id' => $userdata['email_id'],

            'doc_name' => $userdata['doc_name'],

            'doc_id' => $userdata['doc_id'],

            'country' => $userdata['country'],

            'city' => $userdata['city'],

            'state' => $userdata['state'],

            'phone' => $userdata['phone'],

            'zip' => $userdata['zip'],

            'degree' => $userdata['degree'],
                    
            'speciality' => $userdata['speciality'],

            'specialization' => $userdata['specialization'],

            'about' => $userdata['about'],

            'experience' => $userdata['experience'],

            'services' =>$userdata['services'],

            'awards' =>  $userdata['awards'],

            'certifications' =>$userdata['certifications'],

            //'picture' => $userdata['picture'],

        ); 

        

        $this->db->insert('doctor_registration',$docReg);

        $this->db->insert('doctor_details',$docDet);

        

        $q = $this->db->where($docReg)

                      ->get('doctor_registration');

        if($q->num_rows()){

            return $q->row('doc_id');

        }

        else{

             return False;

        } 

        

    }











}