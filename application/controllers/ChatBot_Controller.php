<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ChatBot_Controller extends MY_Controller
{
    public function message()
    {
        $getMesg = $this->input->post('text');
        $check_data = $this->db->query("SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'");
        if ($check_data->num_rows() > 0) {
            $check_data = $check_data->result_array();
            $replay = $check_data[0]['replies'];
            echo $replay;
        } else {
            $data = array(
                'queries' => $getMesg,
                'email' => $_SESSION['email_id']
            );
            $this->db->insert('chatbot_extra_queries', $data);
            echo "We will get back to you soon!";
        }
    }
}
