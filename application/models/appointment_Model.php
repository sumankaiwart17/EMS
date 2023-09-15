<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Appointment_Model extends CI_Model

{




    public function apptByHos($hos_id,)

    {

        $time = time();

        $datestring = '%Y-%m-%d';

        $curr_date = mdate($datestring, $time);

        // $search = array(

        // 'doctor_details.hos_id' => $hos_id,

        //      'doctor_details.specialization' => $dept_id,

        // );

        // echo"<pre>";print_r($search);die;

        $q = $this->db->get('doctor_details');



        // echo '<pre>';

        // print_R($q->result_array());die;

        $doctors = $this->db->select('doctor_details.*,departments.dept_name,doctors_schedule.*,avg(doctor_review_user.star_rating) as star_rating,count(doctor_review_user.star_rating) as total_rate')

            ->from('doctor_details')

            ->join('doctors_schedule', 'doctors_schedule.doc_id = doctor_details.doc_id')

            ->join('doctor_review_user', 'doctor_review_user.doc_id = doctor_details.doc_id', 'left')

            ->join('departments', 'departments.dept_id = doctor_details.specialization')

            // ->where($search)

            ->group_by('doctor_review_user.doc_id')

            ->order_by('star_rating', 'desc')

            ->get()

            ->result_array();



        $userData = $this->db->where('email_id', 'example@gm.com')

            ->get('user_details')

            ->result_array();



        $experinces = array();

        $appointments = array();

        foreach ($doctors as $x) {

            $experinces[$x['doc_id']] = $this->db->where('doc_id', $x['doc_id'])

                ->get('doctors_experience')

                ->result_array();

            $search1 = array(

                'doc_id' => $x['doc_id'],

                'appt_datetime' => $curr_date,

            );

            $appointments[$x['doc_id']] = $this->db->where($search1)

                ->get('doctors_appointment')

                ->result_array();
        }



        // echo '<pre>';

        // print_R($experinces);

        // echo '<pre>';

        // print_R($doctors);

        // echo '<pre>';

        // print_R($appointments);



        // // slot calculation

        // $start = $doctors[0]['strt_time'];

        // $end = $doctors[0]['end_time'];

        // $brk = $doctors[0]['brk_time'];

        // $brk_dur = $doctors[0]['brk_dur'];

        // $dur = $doctors[0]['consult_duration'];

        // $start = explode(':', $start);

        // $start = $start[0] * 60 + $start[1] + $start[2] / 60;

        // //before break

        // $brk = explode(':', $brk);

        // $brk = $brk[0] * 60 + $brk[1] + $brk[2] / 60;

        // $slot_mins_brk = $brk - $start;

        // $no_of_slots_brk = $slot_mins_brk / $dur;

        // $slots_arr_brk = array();

        // $time = $start;

        // $i = 0;

        // while ($no_of_slots_brk > 0) {

        //     $slots_arr_brk[$i] = intdiv($time, 60) . ':' . ($time % 60);;

        //     $no_of_slots_brk -= 1;

        //     $i += 1;

        //     $time = $time + $dur;

        // }

        // echo "Before Break <br/>";

        // print_R($slots_arr_brk);

        // //after break

        // $end = explode(':', $end);

        // $end = $end[0] * 60 + $end[1] + $end[2] / 60;

        // $slot_mins = $end - $brk - $brk_dur * 60;

        // $time = $brk + $brk_dur * 60;

        // $no_of_slots = $slot_mins / $dur;

        // $slots_arr = array();

        // while ($no_of_slots > 0) {

        //     $slots_arr[$i] = intdiv($time, 60) . ':' . ($time % 60);;

        //     $no_of_slots -= 1;

        //     $i += 1;

        //     $time = $time + $dur;

        // }

        // echo "After Break <br/>";

        // print_R($slots_arr);



        //availabe slots



        // echo "After Break <br/><pre>";

        // print_R($slots_arr);

        $slots = array();

        $bookSlots = array();



        foreach ($doctors as $x) {

            $bookSlots[$x['doc_id']] = array();

            foreach ($appointments[$x['doc_id']] as $y) {

                array_push($bookSlots[$x['doc_id']], $y['appt_slot_time']);
            }

            $slots[$x['doc_id']] =  explode(',', $x['slots']);
        }

        $noData='<!DOCTYPE html>

        <html lang="en">
        
        
        
        <head>
        
          <meta charset="UTF-8">
        
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
          <link rel="stylesheet" href="<?php echo base_url("css/cssUser/style.css") ?>">
        
          <link rel="stylesheet" type="text/css" href="<?php echo base_url("css/cssUser/") ?>dist/css/pignose.calendar.min.css" />
        
          <title>AAHRS | Book Appointment</title>
        
          <style>
          
          
          </html>
          
          '
          


    
;


        if ($doctors && $experinces && $appointments  /* && $slots_arr_brk && $slots_arr */) {

            $data = array(

                'doctors' => $doctors,

                'experiences' => $experinces,

                'appointments' => $appointments,

                'slots' => $slots,

                'userData' => $userData,

                'bookSlots' => $bookSlots

            );

            // echo '<pre>';

            // print_R($data);die;;
            

            return $data;
        } else {

            return $noData;
        }
    }

    public function apptByOff($coupon_code)

    {


        $coupon = $coupon_code;

        $time = time();

        $datestring = '%Y-%m-%d';

        $curr_date = mdate($datestring, $time);


        $where = "hospital_offers.coupon_code='" . $coupon . "'";
        $doctors = $this->db->select('*,avg(doctor_review_user.star_rating) as star_rating,count(doctor_review_user.star_rating) as total_rate')

            ->from('hospital_offers')


            ->join('hospital_details', 'hospital_details.hos_id = hospital_offers.hos_id')

            ->join('doctor_details', 'doctor_details.doc_id = hospital_offers.doc_id')

            ->join('doctors_schedule', 'doctors_schedule.doc_id = hospital_offers.doc_id')

            ->join('doctor_review_user', 'doctor_review_user.doc_id = hospital_offers.doc_id', 'left')

            ->join('departments', 'departments.dept_id = doctor_details.specialization')

            ->where($where)

            ->group_by('doctor_review_user.doc_id')

            ->get()

            ->result_array();






        $userData = $this->db->where('email_id', 'example@gm.com')

            ->get('user_details')

            ->result_array();



        $experinces = array();

        $appointments = array();

        foreach ($doctors as $x) {

            $experinces[$x['doc_id']] = $this->db->where('doc_id', $x['doc_id'])

                ->get('doctors_experience')

                ->result_array();

            $search1 = array(

                'doc_id' => $x['doc_id'],

                'appt_datetime' => $curr_date,

            );

            $appointments[$x['doc_id']] = $this->db->where($search1)

                ->get('doctors_appointment')

                ->result_array();
        }

        $slots = array();

        $bookSlots = array();



        foreach ($doctors as $x) {

            $bookSlots[$x['doc_id']] = array();

            foreach ($appointments[$x['doc_id']] as $y) {

                array_push($bookSlots[$x['doc_id']], $y['appt_slot_time']);
            }

            $slots[$x['doc_id']] =  explode(',', $x['slots']);
        }



        if ($doctors || $experinces || $appointments  /* && $slots_arr_brk && $slots_arr */) {

            $data = array(

                'doctors' => $doctors,

                'experiences' => $experinces,

                'appointments' => $appointments,

                'slots' => $slots,

                'userData' => $userData,

                'bookSlots' => $bookSlots

            );

            // echo '<pre>';

            // print_R($data);

            // die;

            return $data;
        } else {

            return false;
        }
    }



    public function bookAppt($data)

    {

        $this->db->insert('doctors_appointment', $data);

        $q = $this->db->where($data)

            ->get('doctors_appointment');



        if ($q->num_rows()) {

            return $q->result_array();
        } else {

            return false;
        }
    }

    public function booktrtAppt($data)

    {

        $this->db->insert('hospital_treatments_appointment', $data);

        $q = $this->db->where($data)

            ->get('hospital_treatments_appointment');



        //   echo"<pre>";

        // print_r($q);
        //   echo"</pre>";
        //   die;

        if ($q->num_rows()) {

            return $q->result_array();
        } else {

            return false;
        }
    }

    public function editAppt($data)

    {

        $this->db->set('doc_id', $data['doc_id'])

            ->set('pt_name', $data['pt_name'])

            ->set('user_id', $data['user_id'])

            ->set('phone', $data['phone'])

            ->set('appt_slot_time', $data['appt_slot_time'])

            ->set('appt_datetime', $data['appt_datetime'])

            ->set('appt_status', $data['appt_status'])

            ->where('appt_id', $data['appt_id'])

            ->update('doctors_appointment');

        return;
    }



    public function edittrtAppt($data)

    {

        $this->db->set('treat_id', $data['treat_id'])

            ->set('hos_id', $data['hos_id'])

            ->set('contact_no', $data['contact_no'])

            ->set('appt_datetime', $data['appt_datetime'])

            ->set('user_id', $data['user_id'])

            ->set('appt_status', $data['appt_status'])

            ->where('appt_id', $data['appt_id'])

            ->update('hospital_treatments_appointment');

        return;
    }



    public function getOffers()

    {

        $offers = $this->db->select('hospital_offers.*,hospital_details.*,doctor_registration.doc_name,treatments.treat_name')

            ->from('hospital_offers')

            ->join('hospital_details', 'hospital_details.hos_id = hospital_offers.hos_id')

            ->join('doctor_registration', 'doctor_registration.doc_id = hospital_offers.doc_id', 'left')

            ->join('treatments', 'treatments.treat_id = hospital_offers.treat_id', 'left')

            ->order_by('hospital_offers.coupon_id', 'desc')

            ->get()

            ->result_array();

        if ($offers) {

            $data = array(

                'offers' => $offers

            );

            return $data;
        } else {

            return false;
        }
    }

    public function admin_hospital_appointmentTrt($hos_id)

    {

        $data = $this->db->select('*,hospital_treatments_appointment.id as apt_id')

            ->from('hospital_treatments_appointment')

            ->join('treatments', 'treatments.treat_id = hospital_treatments_appointment.treat_id')

            ->join('departments', 'departments.dept_id = treatments.dept_id')

            ->join('hospital_details', 'hospital_details.hos_id = hospital_treatments_appointment.hos_id')

            ->join('user_details', 'hospital_treatments_appointment.user_id = user_details.email_id ', 'left')

            ->where(['hospital_treatments_appointment.hos_id' => $hos_id])

            ->get()

            ->result_array();

        if ($data) {

            // echo "<pre>";

            // print_r($data);

            // die;

            return $data;
        } else {

            return false;
        }
    }

    public function admin_hospital_appointment($hos_id)

    {

        $search = array(

            'doctor_details.hos_id' => $hos_id

        );



        $appointments = $this->db->select('doctor_details.*,doctors_appointment.*,user_details.name, doctors_schedule.consult_duration as duration_time')

            ->from('doctor_details')

            ->join('doctors_appointment', 'doctors_appointment.doc_id = doctor_details.doc_id')

            // ->join('departments', 'departments.dept_id = doctor_details.specialization')

            ->join('doctors_schedule', 'doctors_appointment.doc_id=doctors_schedule.doc_id')

            ->join('user_details', 'doctors_appointment.user_id = user_details.email_id ', 'left')

            ->where($search)

            ->get()

            ->result_array();


        // echo"<pre>";

        // print_r($appointments);


        // echo"</pre>";
        // die;

        //$appointments = $this->db->()



        if ($appointments) {

            $data = array(

                'appointments' => $appointments

            );

            return $data;
        } else {

            return false;
        }

        // $appointments = $this->db->query("SELECT doctor_details.doc_id,doctors_appointment.* FROM doctor_details,doctors_appointment WHERE doctors_appointment.doc_id = doctor_details.doc_id AND doctor_details.hos_id = '$hos_id' ");



        //return $appointments;

    }




    public function fetch_department_and_doctor($hos_id)

    {

        $search = array(

            'hospital_departments.hos_id' => $hos_id,

        );
        $doctors = $this->db->select('doctor_details.*,departments.dept_name,doctors_schedule.*')

            ->from('doctor_details')

            ->join('doctors_schedule', 'doctors_schedule.doc_id = doctor_details.doc_id')

           // ->join('doctor_review_user', 'doctor_review_user.doc_id = doctor_details.doc_id', 'left')

          ->join('departments', 'departments.dept_name = doctor_details.department')

            //    ->where($search)

            //->group_by('doctor_review_user.doc_id')

            ->order_by('doctor_details.doc_id', 'desc')

            ->get()

            ->result_array();
        //     echo '<pre>';
        // print_r($doctors);die;
        $experinces = array();

        $appointments = array();

        foreach ($doctors as $x) {

            $experinces[$x['doc_id']] = $this->db->where('doc_id', $x['doc_id'])

                ->get('doctors_experience')

                ->result_array();

            $search1 = array(

                'doc_id' => $x['doc_id'],

                // 'appt_datetime' => $curr_date,

            );

            $appointments[$x['doc_id']] = $this->db->where($search1)

                ->get('doctors_appointment')

                ->result_array();
        }



        $departments = $this->db->distinct()->select('hospital_departments.*,departments.*')

            ->from('hospital_departments')

            ->join('departments', 'departments.dept_id = hospital_departments.dept_id')

            ->where($search)

            ->get()

            ->result_array();

        //$appointments = $this->db->()



        if ($departments || $doctors) {

            $data = array(

                'departments' => $departments,
                'doctors' => $doctors,

            );

            return $data;
        } else {

            return false;
        }

        // $appointments = $this->db->query("SELECT doctor_details.doc_id,doctors_appointment.* FROM doctor_details,doctors_appointment WHERE doctors_appointment.doc_id = doctor_details.doc_id AND doctor_details.hos_id = '$hos_id' ");



        //return $appointments;

    }




    public function edit_appointment($hos_id)

    {

        $apptId = $this->uri->segment(3);

        $appointment = $this->db->select('doctors_appointment.*')

            ->from('doctors_appointment')

            ->where('appt_id', $apptId)

            ->get()

            ->result_array();

        $doc = $this->db->select('doctor_details.*')

            ->from('doctor_details')

            ->where('doc_id', $appointment[0]['doc_id'])

            ->get()

            ->result_array();

        $doc_sch = $this->db->select('doctors_schedule.*')

            ->from('doctors_schedule')

            ->where('doc_id', $doc[0]['doc_id'])

            ->get()

            ->result_array();

        $dept = $this->db->select('departments.*')

            ->from('departments')

            ->where('dept_id', $doc[0]['specialization'])

            ->get()

            ->result_array();

        $patient = $this->db->select('user_details.*')

            ->from('user_details')

            ->where('email_id', $appointment[0]['user_id'])

            ->get()

            ->result_array();

        // echo ('<pre>');

        // print_r($dept);

        // die;

        $search = array(

            'hospital_departments.hos_id' => $hos_id,

        );



        $departments = $this->db->distinct()->select('hospital_departments.*,departments.*')

            ->from('hospital_departments')

            ->join('departments', 'departments.dept_id = hospital_departments.dept_id')

            ->where($search)

            ->get()

            ->result_array();

        //$appointments = $this->db->()



        if ($departments) {

            $data = array(

                'departments' => $departments,

                'appointment' => $appointment,

                'patient' => $patient,

                'doc' => $doc,

                'dept' => $dept,

                'doc_sch' => $doc_sch

            );

            return $data;
        } else {

            return false;
        }
    }

    public function edit_appointment_statusTrt($appt_id, $appt_status)

    {

        $this->db->set('appt_status', $appt_status)

            ->where('appt_id', $appt_id)

            ->update('hospital_treatments_appointment');

        return;
    }

    public function edit_appointment_status($appt_id, $appt_status)

    {

        $this->db->set('appt_status', $appt_status)

            ->where('appt_id', $appt_id)

            ->update('doctors_appointment');

        // $data = array(



        // )

        return;
    }



    public function save_appointment($data)

    {

        $this->db->insert('crud', $data);

        return $this->db->insert_id();
    }

    public function treatmentbooking($coupon_code, $user_id)

    {

        $time = time();

        $datestring = '%Y-%m-%d';

        $curr_date = mdate($datestring, $time);

        $treatments = $this->db->select('*,hospital_details.email_id as hos_email,avg(hospital_review_user.star_rating) as Avg_star_rating,count(hospital_review_user.star_rating) as total_rate')

            ->from('hospital_offers', 'treatments')

            ->join('hospital_details', 'hospital_details.hos_id = hospital_offers.hos_id')

            ->join('treatments', 'treatments.treat_id = hospital_offers.treat_id')

            ->join('departments', 'departments.dept_id = treatments.dept_id')

            ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_offers.hos_id', 'left')

            ->join('hospital_treatments', '(hospital_treatments.treat_id = hospital_offers.treat_id and hospital_treatments.hos_id = hospital_offers.hos_id)')

            ->where('hospital_offers.coupon_code', $coupon_code)

            ->get()

            ->result_array();




        $userData = $this->db->select('*')

            ->from('user_details')

            ->where('user_details.email_id', $user_id)

            ->get()

            ->result_array();

        if ($treatments) {

            $data = array(

                'treatments' => $treatments,

                'userData' => $userData,

            );

            return $data;
        } else {

            return false;
        }





        // if ($appointments) {

        //     $data = array(

        //         'appointments' => $appointments

        //     );

        //     return $data;

        // } else {

        //     return false;

        // }





    }

    public function myappoint($email)

    {

        $docappoint = $this->db->select('*,doctors_appointment.id as apt_id')

            ->from('doctors_appointment')

            ->join('doctor_details', 'doctor_details.doc_id = doctors_appointment.doc_id')

            ->join('hospital_details', 'hospital_details.hos_id = doctor_details.hos_id')

            ->order_by("doctors_appointment.booking_datetime", "asc")

            ->where('doctors_appointment.user_id', $email)

            ->get()

            ->result_array();

        $treatappoint = $this->db->select('*,hospital_treatments_appointment.id as apt_id')

            ->from('hospital_treatments_appointment')

            ->join('treatments', 'treatments.treat_id = hospital_treatments_appointment.treat_id')

            ->join('departments', 'departments.dept_id = treatments.dept_id')

            ->join('hospital_details', 'hospital_details.hos_id = hospital_treatments_appointment.hos_id')

            ->order_by("hospital_treatments_appointment.appt_datetime", "asc")

            ->where('hospital_treatments_appointment.user_id', $email)

            ->get()

            ->result_array();

        $data = array(

            'docappoint' => $docappoint,

            'treatappoint' => $treatappoint,

        );

        // echo ('<pre>');

        // print_r($data);

        // die;

        if ($data) {

            return $data;
        } else {

            return false;
        }
    }

    public function appointSeldoc($user_id, $apt_id)

    {

        $data = $this->db->select('*,doctors_appointment.id as apt_id,doctor_details.email_id as d_email,doctor_details.phone as d_phone,hospital_details.email_id as h_email,hospital_details.phone as h_phone')

            ->from('doctors_appointment')

            ->join('doctor_details', 'doctor_details.doc_id = doctors_appointment.doc_id')

            ->join('hospital_details', 'hospital_details.hos_id = doctor_details.hos_id')

            ->join('departments', 'departments.dept_id = doctor_details.specialization')

            ->where(['doctors_appointment.user_id' => $user_id])

            ->where(['doctors_appointment.id' => $apt_id])

            ->get()

            ->result_array();



        if ($data) {

            return $data;
        } else {

            return false;
        }
    }

    public function appointSeltrt($user_id, $apt_id)

    {

        $data = $this->db->select('*,hospital_treatments_appointment.id as apt_id,hospital_details.email_id as h_email,hospital_details.phone as h_phone')

            ->from('hospital_treatments_appointment')

            ->join('treatments', 'treatments.treat_id = hospital_treatments_appointment.treat_id')

            ->join('departments', 'departments.dept_id = treatments.dept_id')

            ->join('hospital_details', 'hospital_details.hos_id = hospital_treatments_appointment.hos_id')

            ->where(['hospital_treatments_appointment.user_id' => $user_id])

            ->where(['hospital_treatments_appointment.id' => $apt_id])

            ->get()

            ->result_array();



        if ($data) {

            return $data;
        } else {

            return false;
        }
    }



    public function edit_trtappointment($search)

    {

        $data = $this->db->select('*')

            ->from('hospital_treatments_appointment')

            ->join('user_details', 'user_details.email_id = hospital_treatments_appointment.user_id', 'left')

            ->where($search)

            ->get()

            ->result_array();

        return $data;
    }
}
