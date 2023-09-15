<?php

defined('BASEPATH') OR exit('No direct script access allowed');

 require 'vendor/autoload.php';
 use Dompdf\Dompdf as Dompdf;


class Medications_pdf_controller extends MY_Controller {

    public function generatePdf(){

        $patients_id = $this->uri->segment(3);

        $dompdf = new Dompdf();

        $this->load->model('Medication_pdf_Model');

        $patients_det = $this->Medication_pdf_Model->fetch_patients_det($patients_id);

        $doc_id = $patients_det[0]['doc_id'];
        $p_name = $patients_det[0]['p_name'];
        $p_id = $patients_det[0]['p_id'];
 
        $doc_det = $this->Medication_pdf_Model->fetch_doc_det($doc_id);
        
        $medicine_det = $this->Medication_pdf_Model->fetch_medicine_det($patients_id);
        //    echo '<pre>';
        //         print_r($medicine_det);
        //         '</pre>'; die;
        if($medicine_det==""){
            echo "<script>alert('Please add medicine');
            window.location.href='http://localhost/aahrs-new/hospital_Controller/ongoing_treatments';
            
            </script>";


                    //    echo "
                
                    //    <script>function clicked() {
                    //         Swal.fire({
                    //             position: 'top-end',
                    //             icon: 'info',
                    //             title: 'Please add medicine',
                    //             showConfirmButton: false,
                    //             timer: 1800
                    //         });

                    //     };
                    //     clicked();

                    //     window.setTimeout(function() {
                    //         window.location.href='http://localhost/aahrs-new/hospital_Controller/ongoing_treatments';

                    //     }, 1900);
                    //     </script>";

            //$hos_id =  $medicine_det[0]['hos_id'];
            //history.back();
        }
        
        else{
            $hos_id =  $medicine_det[0]['hos_id'];
            
            $hos_det = $this->Medication_pdf_Model->fetch_hos_det($hos_id);

//             if($hos_det){
//   echo "<script>alert('Doc has removed');
//             window.location.href='http://localhost/aahrs-new/hospital_Controller/ongoing_treatments';
            
//             </script>";
//             }else{
               
//             }
        }

        //$hos_det = $this->Medication_pdf_Model->fetch_hos_det($hos_id);


       // $this->load->library('pdf');

   

        $html = $this->load->view('Hospital/Medication_pdf', [
            'p_name' => $patients_det[0]['p_name'],
            'gender'=>$patients_det[0]['gender'],
            'address'=>$patients_det[0]['address'],
            'phone'=>$patients_det[0]['phone'],
            'p_id'=>$patients_det[0]['p_id'],
            'dob'=> $patients_det[0]['dob'],
            'symptoms'=> $patients_det[0]['symptoms'],
            //'advice '=> $patients_det[0]['advice '],
            'provisional'=> $patients_det[0]['provisional'],
            'doc_name'=>$doc_det[0]['doc_name'],
            'doc_phone'=>$doc_det[0]['phone'],
            'degree'=>$doc_det[0]['degree'],
            'email_id'=>$doc_det[0]['email_id'],
             'signature'=>$doc_det[0]['signature'],
            'city'=>$hos_det[0]['city'],
            'hos_phone'=>$hos_det[0]['phone'],
            'state'=>$hos_det[0]['state'],
            'country'=>$hos_det[0]['country'],
            'zip'=>$hos_det[0]['zip'],
            'registration_num'=>$doc_det[0]['registration_num'],
            'medicine' => $medicine_det,
            'hos_name'=>$hos_det[0]['hos_name'],
            'address'=>$hos_det[0]['address'],
        //    'city'=>$doc_det[0]['city'],
          

        ], true);
            
       $dompdf->set_option('isRemoteEnabled', TRUE);

      // PDF::setOptions(['isPhpEnabled' => true]);

       $dompdf->loadHtml($html);

        //$this->pdf->createPDF($html, 'mypdf', false);
        
        $dompdf->setPaper('A4','portrait');

        $dompdf->render();

        $dompdf->stream( $p_name."_".$p_id.".pdf",array("Attachment"=>0));
    }
    

}
?>