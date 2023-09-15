<?php 
class holiday extends CI_Model
{
public function add_holiday ($data)
{
    $this->db->insert('holiday_list',$data);
    return true;
}
public function getdata()
{
   $data=$this->db->select('*')
            ->from('holiday_list')
            ->order_by('holiday_date')
            ->get()
            ->result_array();
            // echo "<pre>";
            // print_r($data);
            // die;
            return $data;


}




}


