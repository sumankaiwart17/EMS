<?php



class Medication_pdf_Model extends CI_Model{

    // function fetch_medicine_det($medicine_id){
    //      $this->db->where('id',$medicine_id);
    //      $data = $this->db->get('hospital_patients_medication')->result_array();
    //          return $data;

    //     //       echo '<pre>';
    //     // print_r($data);
        
    //     // '</pre>'; die;

    //     //  foreach($data->result() as $row)
    //     //  {

    //     //  }
    // }

     function fetch_patients_det($patients_id){

         $data = $this->db->where('p_id',$patients_id)->get('hospital_patients')->result_array();
         return $data;
       
     }

     public function fetch_doc_det($doc_id)

    {

        $data = $this->db->where('doc_id',$doc_id)

            ->get('doctor_details')->result_array();

        return $data;

        //  echo '<pre>';
        // print_r($data);
        // '</pre>'; die;

    }

      function fetch_medicine_det($patients_id)

    {

        $data = $this->db->where('p_id',$patients_id)->get('hospital_patients_medication')->result_array();

        if($data){
            return $data;
        }
        else{
            return false;
        }
        

        //  echo '<pre>';
        // print_r($data);
        // '</pre>'; die;

    }

      function fetch_hos_det($hos_id)

    {

        $data = $this->db->where('hos_id',$hos_id)->get('hospital_details')->result_array();

        return $data;

        //  echo '<pre>';
        // print_r($data);
        // '</pre>'; die;

    }
   
   
   
}

?>