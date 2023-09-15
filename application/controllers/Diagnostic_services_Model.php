<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Diagnostic_services_Model extends CI_Model
{
    public function getData($hos_id)
    {
        $data = $this->db->select('*')
            ->from('hospital_diagnostics')
            ->where(['hos_id' => $hos_id])
            ->get()
            ->result_array();
        // echo "<pre>";
        // print_r($data);
        // die;
        return $data;
    }
    public function put_data($data)
    {
        $this->db->insert('hospital_diagnostics', $data);
    }
    public function getEditData($search)
    {
        $data = $this->db->select('*')
            ->from('hospital_diagnostics')
            ->where($search)
            ->get()
            ->result_array();
        return $data;
    }
    public function up_data($search, $data2)
    {
        $this->db->where($search)
            ->update('hospital_diagnostics', $data2);
    }
}
