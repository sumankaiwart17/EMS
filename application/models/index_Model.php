<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class index_Model extends CI_Model{

    public function retrieve(){

        $hospitals = $this->db->select('hos_name,logo,hos_id')
                            ->get('hospital_details');
        $diseases = $this->db->select('dis_name,picture,dis_id')
                        ->get('diseases');
        $doctors = $this->db->select('doc_name,picture,doc_id')
                            ->get('doctor_details');
        
        if($hospitals->num_rows() && $doctors->num_rows() && $diseases->num_rows()){
            
            
            $data = array(
                'hospitals' => $hospitals->result_array(),
                'diseases' => $diseases->result_array(),
                'doctors' => $doctors->result_array(),
            );
            return $data;
        }else{
            return false;
        }
        

    }

}


?>