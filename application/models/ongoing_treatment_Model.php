<?php

class ongoing_treatment_Model extends CI_Model{

    public function sendPdfEmaildata($pid)
    {
        $data = $this->db->select('hospital_patients_medication.*,doctor_details.doc_name,treatments.treat_name,hospital_patients.p_name,hospital_patients.email_id, hospital_details.*')
            ->from('hospital_patients_medication')
            ->join('doctor_details', 'doctor_details.doc_id = hospital_patients_medication.doc_id')
            ->join('treatments', 'treatments.treat_id = hospital_patients_medication.treat_id')
            ->join('hospital_patients', 'hospital_patients.p_id = hospital_patients_medication.p_id')
            ->join('hospital_details', 'hospital_details.hos_id = hospital_patients_medication.hos_id')
            ->where('hospital_patients_medication.p_id', $pid)
            ->order_by('hospital_patients_medication.created_at')
            ->get()
            ->result_array();
        
        return $data;
    }

}

?>