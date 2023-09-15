<?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Consult_model extends CI_Model

    {

        public function consultmodel()

        {

            $docdet = $this->db->select('doctor_consults.*, doctor_details.doc_name, doctor_details.specialization, doctor_details.picture as doc_pic,

                                         user_details.name, user_details.picture, departments.dept_id, departments.dept_name, 

                                         treatments.treat_id, treatments.treat_name')

                                ->from('doctor_consults')

                                ->join('doctor_details', 'doctor_details.doc_id=doctor_consults.doc_id')

                                ->join('user_details', 'user_details.email_id=doctor_consults.email_id')

                                ->join('departments', 'departments.dept_id=doctor_details.specialization')

                                ->join('treatments', 'treatments.treat_id=doctor_consults.treat_id')

                                ->get()

                                ->result_array();

            return $docdet;

        }

        public function consult_filter_data()

        {

            $depts = $this->db->distinct()

                ->select('departments.dept_name , departments.dept_id')

                ->from('doctor_consults')

                ->join('doctor_details', 'doctor_details.doc_id=doctor_consults.doc_id')

                ->join('user_details', 'user_details.email_id=doctor_consults.email_id')

                ->join('departments', 'departments.dept_id=doctor_details.specialization')

                ->get();



            return $depts->result_array();  

        }

        public function consult_filter_data_treatment()

        {

            $treat_ment = $this->db->distinct()

                ->select('treatments.treat_id , treatments.treat_name')

                ->from('doctor_consults')

                ->join('doctor_details', 'doctor_details.doc_id=doctor_consults.doc_id')

                ->join('user_details', 'user_details.email_id=doctor_consults.email_id')

                ->join('treatments', 'treatments.treat_id=doctor_consults.treat_id')

                ->get();



            return $treat_ment->result_array();

        }

        public function filterDataconsult($dept_id, $treat_id)

        {

            // $data = array(

            //     'dept_id' => $dept_id,

            //     'treat_id' => $treat_id

            // );

            // return $data;

            if($dept_id != '' && $treat_id == '')

            {

                $data = $this->db->select('doctor_consults.*, doctor_details.doc_name, doctor_details.specialization, doctor_details.picture as doc_pic,

                                            user_details.name, user_details.picture, departments.dept_id, departments.dept_name, 

                                            treatments.treat_id, treatments.treat_name')

                                    ->from('doctor_consults')

                                    ->join('doctor_details', 'doctor_details.doc_id=doctor_consults.doc_id')

                                    ->join('user_details', 'user_details.email_id=doctor_consults.email_id')

                                    ->join('departments', 'departments.dept_id=doctor_details.specialization')

                                    ->join('treatments', 'treatments.treat_id=doctor_consults.treat_id')

                                    ->where_in('departments.dept_id', $dept_id)

                                    ->order_by('doctor_consults.post_time', 'desc')

                                    ->get()

                                    ->result_array();

            }

            else if($dept_id == '' && $treat_id != '')

            {

                $data = $this->db->select('doctor_consults.*, doctor_details.doc_name, doctor_details.specialization, doctor_details.picture as doc_pic,

                                            user_details.name, user_details.picture, departments.dept_id, departments.dept_name, 

                                            treatments.treat_id, treatments.treat_name')

                                    ->from('doctor_consults')

                                    ->join('doctor_details', 'doctor_details.doc_id=doctor_consults.doc_id')

                                    ->join('user_details', 'user_details.email_id=doctor_consults.email_id')

                                    ->join('departments', 'departments.dept_id=doctor_details.specialization')

                                    ->join('treatments', 'treatments.treat_id=doctor_consults.treat_id')

                                    ->where_in('doctor_consults.treat_id', $treat_id)

                                    ->order_by('doctor_consults.post_time', 'desc')

                                    ->get()

                                    ->result_array();

            }

            else if($dept_id != '' && $treat_id != '')

            {

                $data = $this->db->select('doctor_consults.*, doctor_details.doc_name, doctor_details.specialization, doctor_details.picture as doc_pic,

                                            user_details.name, user_details.picture, departments.dept_id, departments.dept_name, 

                                            treatments.treat_id, treatments.treat_name')

                                    ->from('doctor_consults')

                                    ->join('doctor_details', 'doctor_details.doc_id=doctor_consults.doc_id')

                                    ->join('user_details', 'user_details.email_id=doctor_consults.email_id')

                                    ->join('departments', 'departments.dept_id=doctor_details.specialization')

                                    ->join('treatments', 'treatments.treat_id=doctor_consults.treat_id')

                                    ->where_in('doctor_consults.treat_id', $treat_id)

                                    ->where_in('departments.dept_id', $dept_id)

                                    ->order_by('doctor_consults.post_time', 'desc')

                                    ->get()

                                    ->result_array();

            }

            else 

            {

                $data = $this->db->select('doctor_consults.*, doctor_details.doc_name, doctor_details.specialization, doctor_details.picture as doc_pic,

                                            user_details.name, user_details.picture, departments.dept_id, departments.dept_name, 

                                            treatments.treat_id, treatments.treat_name')

                                ->from('doctor_consults')

                                ->join('doctor_details', 'doctor_details.doc_id=doctor_consults.doc_id')

                                ->join('user_details', 'user_details.email_id=doctor_consults.email_id')

                                ->join('departments', 'departments.dept_id=doctor_details.specialization')

                                ->join('treatments', 'treatments.treat_id=doctor_consults.treat_id')

                                ->order_by('doctor_consults.post_time', 'desc')

                                ->get()

                                ->result_array();

            }

            return $data;

        }

    }

?>