<?php 
defined('BASEPATH') or exit('No direct script access allowed');
    class disease_Model extends CI_Model{

        public function getData($disId){
            $search = array(
                'dis_id' => $disId,
            );
            $disData = $this->db->where($search)
                                ->get('diseases');
            $articles = $this->db->where($search)
                                 ->get('disease_articles');
            $bstDoctors =$this->db->query('SELECT doctor_details.* , avg(doctor_review_user.star_rating) FROM doctor_details
                INNER JOIN doctor_review_user ON doctor_review_user.doc_id = doctor_details.doc_id GROUP BY doctor_review_user.doc_id ORDER BY avg(doctor_review_user.star_rating) DESC;');
            $bstHospitals = $this->db->query('SELECT hospital_details.* , avg(hospital_review_user.star_rating) FROM hospital_details
                INNER JOIN hospital_review_user ON hospital_review_user.hos_id = hospital_details.hos_id GROUP BY hospital_review_user.hos_id ORDER BY avg(hospital_review_user.star_rating) DESC;');
            $topHospitals = $this->db->query('SELECT hospital_details.* , avg(hospital_review_user.star_rating) FROM hospital_details
                INNER JOIN hospital_review_user ON hospital_review_user.hos_id = hospital_details.hos_id GROUP BY hospital_review_user.hos_id ORDER BY avg(hospital_review_user.star_rating) DESC LIMIT 3;');
            $topDoctors = $this->db->query('SELECT doctor_details.* , avg(doctor_review_user.star_rating) FROM doctor_details
                INNER JOIN doctor_review_user ON doctor_review_user.doc_id = doctor_details.doc_id GROUP BY doctor_review_user.doc_id ORDER BY avg(doctor_review_user.star_rating) DESC LIMIT 3;');
            
            
            if($disData->num_rows() && $articles->num_rows()){
                $data = array(
                    'disData' => $disData->result_array(),
                    'articles' => $articles->result_array(),
                    'topHospitals' => $topHospitals->result_array(),
                    'topDoctors' => $topDoctors->result_array(),
                    'bstHospitals' => $bstHospitals->result_array(),
                    'bstDoctors' => $bstDoctors->result_array(),
                );   
                return $data;
           }
        }

    }

?>