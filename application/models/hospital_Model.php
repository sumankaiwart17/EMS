<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');



class hospital_Model extends CI_Model

{



    public function insertData($hosdata)

    {

        $hosReg = array(

            'hos_id' => $hosdata['hos_id'],

            'hos_name' => $hosdata['hos_name'],

            'password' => $hosdata['password'],

        );

        $hosDet = array(

            'hos_id' => $hosdata['hos_id'],

            'hos_name' => $hosdata['hos_name'],

            'address' => $hosdata['address'],

            'district' => $hosdata['district'],

            'state' => $hosdata['state'],

            'city' => $hosdata['city'],

            'zip' => $hosdata['zip'],

            'phone' => $hosdata['phone'],

        );



        $this->db->insert('hospital_registration', $hosReg);

        $this->db->insert('hospital_details', $hosDet);



        $q = $this->db->where($hosReg)

            ->get('hospital_registration');

        if ($q->num_rows()) {
            
            $data = array(

                'hos_id' => $q->row('hos_id'),

                'hos_name' => $q->row('hos_name')

            );
 
            return $data;
            // return $q->row('hos_id');

        } else {

            return False;

        }

    }



    public function isValid($data)

    {



        $q = $this->db->where($data)

            ->get('hospital_registration');

        //     echo"<pre>";
        //  print_r($q);
        //     echo"</pre>";
        //     die;
        if ($q->num_rows()) {

            $data = array(

                'hos_id' => $q->row('hos_id'),

                'hos_name' => $q->row('hos_name')

            );

            return $data;

        } else {

            return False;

        }

    }



    public function topHos()

    {

        $q = $this->db->select('hospital_details.*, avg(hospital_review_user.star_rating) as star_rating, count(hospital_review_user.star_rating) as review_count')

            ->from('hospital_details')

            ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_details.hos_id')

            //->where($search)

            ->group_by('hospital_review_user.hos_id')

            ->order_by('star_rating', 'desc')

            ->get();

        // echo '<pre>';

        // print_R($q->result_array());

        // die;

        if ($q->num_rows()) {

            $data = array(

                'topHos' => $q->result_array(),

            );

            return $data;

        } else {

            return false;

        }

    }

}