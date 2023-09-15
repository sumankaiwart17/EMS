<?php 
class timelinemodel extends CI_Model
{
public function reqamb($data)
{  
    $this->db->insert('emergency',$data);
    return true;
}
public function getdata()
{
   $em=$this->db->select('*')
            ->from('emergency')
            ->order_by('emr_id')
            ->get()
            ->result_array();
            


}




}
