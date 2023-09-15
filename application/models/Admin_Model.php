<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');



class Admin_Model extends CI_Model 

{

     public function isValid($data)

    {



        $q = $this->db->where($data)

            ->get('admin_login');

        //     echo"<pre>";
        //  print_r($q);
        //     echo"</pre>";
        //     die;
        if ($q->num_rows()) {

            $data = array(

                'name' => $q->row('name'),

                'password' => $q->row('password')

            );

            return $data;

        } else {

            return False;

        }

    }

     public function addNewDept($data)

    {

        $dept = array(

            'dept_id' => $data['dept_id'],

            'dept_name' => $data['dept_name'],

            'dept_description' => $data['dept_description'],

        );

         $this->db->insert('departments', $dept);

         $q = $this->db->where($dept)

            ->get('departments');

        if ($q->num_rows()) {

            return true;

        } else {

            return false;

        }
    }

     public function hospitalData()

    {
        $depts = $this->db->select('*')->from('departments')->get();
             

         if ($depts->num_rows())
         {

          $data = array(

                'depts' => $depts->result_array()

            );

    //    echo"<pre>";
    //      print_r($depts);
    //         echo"</pre>";
    //         die;

            return $data;

        
        } else {

            return false;

        }

    }
}

?>