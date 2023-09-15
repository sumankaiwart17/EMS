<?php

defined('BASEPATH') or exit('No direct script access allowed');



class hosCompare_Model extends CI_Model

{



    public function overviewData($hos_id)

    {

        $q = $this->db->select('hospital_details.*,avg(hospital_review_user.star_rating) as star_rating')

            ->from('hospital_details')

            ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_details.hos_id')

            ->where_in('hospital_details.hos_id', $hos_id)

            ->group_by('hospital_details.hos_id')

            ->order_by('hospital_details.hos_id')

            ->get()

            ->result_array();



        $q1 = $this->db->select('hospital_departments.hos_id, count(hospital_departments.hos_id) as total_dept')

            ->from('hospital_departments')

            ->where_in('hospital_departments.hos_id', $hos_id)

            ->group_by('hospital_departments.hos_id')

            ->order_by('hospital_departments.hos_id')

            ->get()

            ->result_array();

                  

        if ($q && $q1) {

            for ($i = 0; $i < count($hos_id); $i++) {

                $q[$i]['total_dept'] = $q1[$i]['total_dept'];

            if(isset($q[$i]['total_dept']) && isset($q1[$i]['total_dept']) &&$q[$i]['total_dept']!=='' &&$q1[$i]['total_dept']!==''){
             $q[$i]['total_dept'] = $q1[$i]['total_dept'];

            }
        }
         // echo '<pre>';

            // print_R($q);

            // print_R($q1);



            return $q;

        }
        else{
            echo"";
        }
    }

    public function overallRating($hos_id)

    {

        $q = $this->db->select('avg(hospital_review_user.star_rating) as star_rating,count(hospital_review_user.star_rating) as total_review, hos_id')

            ->from('hospital_review_user')

            ->where_in('hospital_review_user.hos_id', $hos_id)

            ->group_by('hospital_review_user.hos_id')

            ->order_by('hos_id')

            ->get()

            ->result_array();

        $q1 = $this->db->select('count(*) as negative_review, hos_id ')

            ->from('hospital_review_user')

            ->where('hospital_review_user.star_rating <', 3)

            ->where_in('hospital_review_user.hos_id', $hos_id)

            ->group_by('hospital_review_user.hos_id')

            ->order_by('hos_id')

            ->get()

            ->result_array();

        $q2 = $this->db->select('count(*) as positive_review, hos_id ')

            ->from('hospital_review_user')

            ->where('hospital_review_user.star_rating >=', 3)

            ->where_in('hospital_review_user.hos_id', $hos_id)

            ->group_by('hospital_review_user.hos_id')

            ->order_by('hos_id')

            ->get()

            ->result_array();

        if ($q) {



            for ($i = 0; $i < count($hos_id); $i++) {
                if(isset( $q[$i]['negative_review']) ==1 && isset($q[$i]['positive_review']) ==1)
                {
                    $q[$i]['negative_review'] = $q1[$i]['negative_review'];

                $q[$i]['positive_review'] = $q2[$i]['positive_review']; 
                }
               else{
                continue;
               }

            }

            // echo '<pre>';

            // print_R($q);

            return $q;

        }

    }

    public function cleanRating($hos_id)

    {

        $q = $this->db->select('avg(hospital_review_user.star_rating_cleanliness) as clean_rating,count(hospital_review_user.star_rating_cleanliness) as total_review, hos_id')

            ->from('hospital_review_user')

            ->where_in('hospital_review_user.hos_id', $hos_id)

            ->group_by('hospital_review_user.hos_id')

            ->order_by('hos_id')

            ->get()

            ->result_array();

        return $q;

    }

    public function accomoRating($hos_id)

    {

        $q = $this->db->select('avg(hospital_review_user.star_rating_accomodation) as accomo_rating,count(hospital_review_user.star_rating_accomodation) as total_review, hos_id')

            ->from('hospital_review_user')

            ->where_in('hospital_review_user.hos_id', $hos_id)

            ->group_by('hospital_review_user.hos_id')

            ->order_by('hos_id')

            ->get()

            ->result_array();

        return $q;

    }

    public function availRating($hos_id)

    {

        $q = $this->db->select('avg(hospital_review_user.star_rating_availability) as avail_rating,count(hospital_review_user.star_rating_availability) as total_review, hos_id')

            ->from('hospital_review_user')

            ->where_in('hospital_review_user.hos_id', $hos_id)

            ->group_by('hospital_review_user.hos_id')

            ->order_by('hos_id')

            ->get()

            ->result_array();

        return $q;

    }

    public function facilitieRating($hos_id)

    {

        $q = $this->db->select('avg(hospital_review_user.star_rating_facilities) as facil_rating,count(hospital_review_user.star_rating_facilities) as total_review, hos_id')

            ->from('hospital_review_user')

            ->where_in('hospital_review_user.hos_id', $hos_id)

            ->group_by('hospital_review_user.hos_id')

            ->order_by('hos_id')

            ->get()

            ->result_array();

        return $q;

    }

    public function departmentCompare($hos_id, $dept_id)

    {

        $q = $this->db->select('avg(department_review_user.star_rating) as star_rating,count(*) as total_review, hos_id')

            ->from('department_review_user')

            ->where_in('department_review_user.hos_id', $hos_id)

            ->group_by('department_review_user.hos_id')

            ->order_by('hos_id')

            ->get()

            ->result_array();

        $q2 = array();

        $search = array();

        foreach ($dept_id as $x) {

            foreach ($hos_id as $y) {

                $search = array(

                    'hos_id' => $y,

                    'dept_id' => $x

                );

                $tmp = $this->db->select('count(*) as status')

                    ->from('hospital_departments')

                    ->where($search)

                    ->get()

                    ->result_array();

                // echo '<pre>';

                // print_R($tmp);

                $q2[$x][$y] = $tmp;

            }

        }



        if ($q && $q2) {

            $data = array(

                'overall' => $q,

                'dept' => $q2

            );

            // echo '<pre>';

            // print_R($data);

            return $data;

        }

    }

    public function availableEmc($hos_id)

    {

        $q = $this->db->select('hospital_details.emc')

            ->from('hospital_details')

            ->where_in('hospital_details.hos_id', $hos_id)

            ->order_by('hos_id')

            ->get()

            ->result_array();



        if ($q) {

            return $q;

        }

    }

}

