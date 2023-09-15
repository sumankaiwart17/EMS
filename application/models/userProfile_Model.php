<?php



class userProfile_Model extends CI_Model

{

    public function getPass($email)

    {

        $search = array(

            'email_id' => $email,

        );

        return $this->db->where($search)

            ->get('user_registration')

            ->result_array();

    }

    public function putPass($search, $data)

    {

        $data2 = array(

            'email_id' => $search['email_id'],

            'password' => $data['password'],

        );

        // echo "<pre>";

        // print_r($data2);

        // die;

        $this->db->where($search)

            ->update('user_registration', $data);

        $q = $this->db->where($data2)

            ->get('user_registration');

        if ($q->num_rows()) {

            return true;

        } else {

            return false;

        }

    }



    public function upUserData($search, $data)

    {
        $q=$this->db->where($search)

            ->update('user_details', $data);
           

        if ($q) {

            return true;

        } else {

            return false;

        }

    }

    public function getData($email)

    {

        $search = array(

            'email_id' => $email,

        );

        $q = $this->db->where($search)

            ->get('user_details');

        $q2 = $this->db->where($search)

            ->get('user_registration');

        if ($q->num_rows() && $q2->num_rows()) {

            $data = array(

                'name' => $q->row('name'),

                'password' => $q2->row('password'),

                'picture' => $q->row('picture'),

                'email_id' => $q->row('email_id'),

                'country' => $q->row('country'),

                'state' => $q->row('state'),

                'city' => $q->row('city'),

            );

            return $data;

        } else {

            return false;

        }

    }



    public function updateData($newData)

    {

        $search = array(

            'email_id' => $newData['email_id'],

        );

        $userReg = array(

            'password' => $newData['password'],

        );

        $userDet = array(

            'name' => $newData['name'],

            'picture' => $newData['picture'],

        );



        // updating the tables

        $this->db->where($search)

            ->update('user_registration', $userReg);



        $this->db->where($search)

            ->update('user_details', $userDet);



        // checking

        $check1 = array(

            'email_id' => $newData['email_id'],

            'password' => $newData['password'],

        );

        $q = $this->db->where($check1)

            ->get('user_registration');

        $check2 = array(

            'email_id' => $newData['email_id'],

            'name' => $newData['name'],

            'picture' => $newData['picture'],

        );

        $q2 = $this->db->where($check2)

            ->get('user_details');



        if ($q->num_rows() && $q2->num_rows()) {

            $userdata = array(

                'name' => $q2->row('name'),

                'picture' => $q2->row('picture'),

                'email_id' => $q2->row('email_id'),

                'country' => $q2->row('country'),

                'state' => $q2->row('state'),

                'city' => $q2->row('city'),



            );

            return $userdata;

        } else {

            return false;

        }

    }

    public function gethis($search)

    {

        $data = $this->db->where($search)

            ->get('user_medical_history')

            ->result_array();

        return $data;

    }

    public function updatehis($search, $data)

    {

        $this->db->where($search)

            ->update('user_medical_history', $data);

        $q = $this->db->where($data)

            ->get('user_medical_history');

        if ($q->num_rows()) {

            return true;

        } else {

            return false;

        }

    }

    public function delmhis($search)

    {

        $path = $this->db->select('report_prescription')

            ->where($search)

            ->get('user_medical_history')

            ->result_array();

        $file_pointer = './' . $path[0]['report_prescription'];

        // echo "<pre>";/userUploads/ACFrOgDmHR79.pdf

        // print_r($file_pointer);

        // die;

        if (!unlink($file_pointer)) {

            return false;

        } else {

            $this->db->delete('user_medical_history', $search);

            return true;

        }

    }

}

