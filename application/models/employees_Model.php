<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Employees_Model extends CI_Model
{
    public function get_data($id)
    {
        $data = $this->db->select('*')
            ->from('employee_details')
            ->where(['hos_id' => $id])
            ->get()
            ->result_array();
        // echo "<pre>";
        // print_r($data);
        // die;
        return $data;
    }

    public function put_data($data)
    {
        $this->db->insert('employee_details', $data);
    }

    public function update_data($search, $data)
    {
        $this->db->where($search)
            ->update('employee_details', $data);
        $q = $this->db->where($data)
            ->get('employee_details');
        if ($q->num_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_holiday($hos_id)
    {
        $data = $this->db->select('*')
            ->from('holiday_list')
            ->where(['hos_id' => $hos_id])
            ->get()
            ->result_array();
        // echo "<pre>";
        // print_r($data);
        // die;
        return $data;
    }

    public function fetchEmpleves($emp_id)
    {
        $hos_id = $_SESSION['email_id'];
        $search = array(
            'emp_id' => $emp_id,
            'hos_id' => $hos_id
        );
        $data = $this->db->select('rem_leaves')
            ->from('employee_details')
            ->where($search)
            ->get()
            ->result_array();
        // echo "<pre>";
        // print_r($data);
        // die;
        return $data[0]['rem_leaves'];
    }

    public function getname($emp_id)
    {
        $data = $this->db->select('emp_name')
            ->from('employee_details')
            ->where(['emp_id' => $emp_id])
            ->get()
            ->result_array();
        // echo "<pre>";
        // print_r($data);
        // die;
        return $data[0]['emp_name'];
    }

    public function putleavedata($data)
    {
        $this->db->insert('leaves_details', $data);
    }

    public function upleavedata($search, $data)
    {
        $this->db->where($search)
            ->update('employee_details', $data);
    }

    public function get_leavedata($id)
    {
        $data = $this->db->select('*')
            ->from('leaves_details')
            ->where(['hos_id' => $id])
            ->get()
            ->result_array();
        // echo "<pre>";
        // print_r($data);
        // die;
        return $data;
    }

    public function delLeave($search)
    {
        $data = $this->db->select('*')
            ->from('leaves_details')
            ->where($search)
            ->get()
            ->result_array();
        $search2 = array(
            'emp_id' => $data[0]['emp_id'],
            'hos_id' => $data[0]['hos_id']
        );
        $data2 = $this->db->select('rem_leaves')
            ->from('employee_details')
            ->where($search2)
            ->get()
            ->result_array();
        $data3 = array(
            'rem_leaves' => $data2[0]['rem_leaves'] + $data[0]['no_days']
        );
        $this->db->delete('leaves_details', $search);
        $this->db->where($search2)
            ->update('employee_details', $data3);
        // echo "<div>";
        // print_r($data3);
        // die;
    }

    public function editleavedata($search, $data)
    {
        // echo "<div>";
        // print_r($search);
        // die;
        $this->db->where($search)
            ->update('leaves_details', $data);
    }
}
