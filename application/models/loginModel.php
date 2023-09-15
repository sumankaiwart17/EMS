<?php

class loginmodel extends CI_Model{

    public function isValid($user,$pass){
        $array=array(
            'email_id' => $user,
            'password' => $pass,
        );
        $q =$this->db->where($array)
             ->get('user_registration');
        if($q->num_rows()){
            return $q->row('email_id');
        }
        else{
            return False;
        }
    
    }

    public function isValidDoc($user,$pass){
        $array=array(
            'email_id' => $user,
            'password' => $pass,
        );
        $q =$this->db->where($array)
             ->get('doctor_registration');
        if($q->num_rows()){
            return $q->row('doc_id');
        }
        else{
            return False;
        }
    
    }


}




?>