<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Admin_Controller extends MY_Controller {

    public function index(){
        $this->load->view('Admin/AdminLogin');
    }

    public function login()

    {

        $data = array(

            'name' => $this->input->post('name'),

            'password' => $this->input->post('password'),

        );

        $this->load->model('Admin_Model');

        $confirmed = $this->Admin_Model->isValid($data);

        // echo"<pre>";
        // print_r($confirmed);

        // echo"</pre>";
        // die;

        if ($confirmed) {

            $_SESSION['admin_name'] = $confirmed['name'];

          
       // echo $_SESSION['admin_name'];
           redirect('Admin/dashboard');

            //header('location: dashboard');

        } else {

            echo '<script>alert("Credentials Didnt Match!!")</script>';

            $this->load->view('Admin/AdminLogin');
        }
    }

    public function logout()

    {

        unset($_SESSION['admin_name']);

        $this->load->view('Admin/AdminLogin');

        //header('location: Admin/AdminLogin');

        //$this->load->view('Hospital/hospitalLogin');

    }
     public function dashboard(){
         $this->load->view('Admin/dashboard');
     }

     public function departments()

    {

        // if(isset($_SESSION)):

        //     redirect('Admin/AdminLogin');
        // endif;

         $layout = 0;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

        // $hos_id = $_SESSION['admin_name'];

        $this->load->model('Admin_Model');

        $data = $this->Admin_Model->hospitalData();


        if ($data) {

            $depts = array();



            foreach ($data['depts'] as $x => $y) {

                $depts[$x] = $y;
            }





            $data = array(

                'depts' => $depts,

                'layout' => $layout,

            );

            $this->load->view('Admin/departments', $data);
        } else {
            redirect('Admin/AdminLogin');
            // echo "dataBase Error!!";
        }
    }

     public function addDept()

    {

        $layout = 1;

        // layout = 0 -->view page

        // layout = 1 -->add page

        // layout = 2 -->edit page

    
        if (!$this->input->post()) {

            // $hos_id = $_SESSION['admin_name'];

            // $hosData = $this->hospitalView_Model->hospitalData($hos_id);

            // $deptData = $this->hospitalView_Model->deptsAll($hos_id);

            //if ($hosData || $deptData) {

                $data = array(

                    // 'hosDepts' => $hosData['depts'],

                    // 'depts' => $deptData,

                    'layout' => $layout,

                );
                //    echo"<pre>";

                //      print_r($data);
                //     echo"</pre>";
                //     die;

                $this->load->view('Admin/departments',$data);
                // echo"<pre>";

                //  print_r($data);
                // echo"</pre>";
                // die;



           // }
        } else {

        //    $rules = $this->form_validation->set_rules(
        //         'newDeptName',
        //         'newDeptName',
        //         'trim|required|callback__duplicate_validation',
        //         array(
        //             'callback__duplicate_validation' => 'Duplicate record'
        //         )
        //     );



            if ($this->input->post('deptName') == 'other') {
               
                $data = array(

                    'dept_name' => $this->input->post('newDeptName'),

                    'dept_description' => $this->input->post('description'),

                    'dept_id' => 'dept000' . $this->input->post('newDeptName'),

                );

            
                $this->load->model('Admin_Model');
                $confirmed = $this->Admin_Model->addNewDept($data);

                if ($confirmed) {

                    echo "<script>alert('Department Added Successfully!!')</script>";

                    header('location:' . site_url('Admin/departments'));
                } else {

                    echo "<script>alert('Something went wrong!! Please try again')</script>";

                   header('location:' . site_url('Admin/add-department'));
                }
            } else {
                    $data2['layout'] = $layout;

                    $this->load->view('Admin/departments', $data2);
               
            }
        }
    }

    public function delDept()

    {

        $dept_id = $this->uri->segment(3);

        $hos_id = $_SESSION['email_id'];





        $confirmed = $this->hospitalView_Model->delDept($hos_id, $dept_id);

        if ($confirmed) {

            header('location:' . site_url() . '/hospital_Controller/departments');
        } else {

            echo '<script>alert("Couldnt complete the process!! Try again later")</script>';
        }
    }

}

?>
