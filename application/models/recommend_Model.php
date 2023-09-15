<?php



class recommend_Model extends CI_Model

{



    public function getData()
 
    {

        $q = $this->db->select('*')

            ->from('treatments')

            ->get();

       

        $q1 = $this->db->select('*')

            ->from('diseases')

            ->get();

        /* echo '<pre>';

            print_R($q1->result_array()); */

        if ($q->num_rows() || $q1->num_rows()) {

            $data = array(

                'treats' => $q->result_array(),

                'diseases' => $q1->result_array(),

            );

            return $data;

        } else {

            return false;

        }

    }

    public function searchData($treat_id, $budget)

    {

        if(isset($_SESSION['userLog'])){

            $data = array(

                'treat_id' => $treat_id,

                'budget' => $budget,

                'user_id' => $_SESSION['email_id'],

            );

        }else{

            $data = array(

                'treat_id' => $treat_id,

                'budget' => $budget,

                'user_id' => $_SERVER['REMOTE_ADDR'],

            );

        }

        

        $query = $this->db->select('*')

            ->from('recommendme_search')

            ->where($data)

            ->get();

        if ($query->num_rows()) {

            $count = $query->row('count');

            $count += 1;

            $this->db->where($data)

                ->update('recommendme_search', array('count' => $count));

        } else {

            $this->db->insert('recommendme_search', $data);

        }

        $search = array(

            'hospital_treatments.treat_id' => $treat_id,

            'hospital_treatments.budget <=' => $budget,



        );

        $q = $this->db->select('*,avg(hospital_review_user.star_rating) as avr,sum(hospital_review_user.star_rating) as ratings,count(hospital_review_user.star_rating) as totalRate')

            ->from('hospital_treatments')

            ->where($search)

            ->join('treatments', 'treatments.treat_id = hospital_treatments.treat_id')

            ->join('hospital_details', 'hospital_details.hos_id = hospital_treatments.hos_id')

            ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_details.hos_id')

            ->join('hospital_departments', 'hospital_departments.dept_id = treatments.dept_id AND hospital_departments.hos_id = hospital_treatments.hos_id')

            ->group_by('hospital_review_user.hos_id')

            ->order_by('avr', 'desc')

            ->get();

        /* echo '<pre>';

            print_R($q->result_array()); */

        if ($q->num_rows()) {

            return $q->result_array();

        } else {

            return false;

        }

    }

}

