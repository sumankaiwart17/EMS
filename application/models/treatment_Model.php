<?php 

    class treatment_Model extends CI_Model{

        public function getData($treat_id){
            $search = array(
                'treat_id' => $treat_id,
            );
            $treatData = $this->db->select('*')
                                ->from('treatments')
                                ->join('departments','departments.dept_id = treatments.dept_id')
                                ->where($search)
                                ->get();
            $articles = $this->db->select('*')
                                 ->get('disease_articles');
            $bstDoctors = $this->db->query('SELECT doctor_details.* , avg(doctor_review_user.star_rating) FROM doctor_details
                INNER JOIN doctor_review_user ON doctor_review_user.doc_id = doctor_details.doc_id GROUP BY doctor_review_user.doc_id ORDER BY avg(doctor_review_user.star_rating) DESC;');
            $hospitals = $this->db->select('*,avg(hospital_review_user.star_rating) as avr,sum(hospital_review_user.star_rating) as ratings,count(hospital_review_user.star_rating) as totalRate')
            ->from('hospital_treatments')
            ->where('hospital_treatments.treat_id',$treat_id)
            ->join('treatments','treatments.treat_id = hospital_treatments.treat_id')
            ->join('hospital_details','hospital_details.hos_id = hospital_treatments.hos_id')
            ->join('hospital_review_user','hospital_review_user.hos_id = hospital_details.hos_id')
            ->join('hospital_departments','hospital_departments.dept_id = treatments.dept_id AND hospital_departments.hos_id = hospital_treatments.hos_id')
            ->group_by('hospital_review_user.hos_id')
            ->order_by('avr','desc')
            ->get();
            
           /*  echo '<pre>';
            print_R($treatData->result_array()); */
            if($treatData->num_rows() && $articles->num_rows()){
                $data = array(
                    'treatData' => $treatData->result_array(),
                    'articles' => $articles->result_array(),
                    'bstDoctors' => $bstDoctors->result_array(),
                    'hospitals' => $hospitals->result_array()
                );   
                return $data;
           }
        }

    }

?>