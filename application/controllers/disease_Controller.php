<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disease_Controller extends MY_Controller {

    public function diseaseView(){
		$disId = $this->uri->segment(3);
		$this->load->model('disease_Model');
		$data = $this->disease_Model->getData($disId);
		if($data){
			$disData = array();
			$aricles = array();
			$topHospitals = array();
			$topDoctors = array();
			$bstHospitals = array();
			$bstDoctors = array();
			foreach($data['disData'] as $x => $y){
				$disData = $y;
            }
            foreach($data['articles'] as $x => $y){
                $articles[$x] = $y;
			}
			foreach($data['topHospitals'] as $x => $y){
				$topHospitals[$x] = $y;
			}
			foreach($data['topDoctors'] as $x => $y){
				$topDoctors[$x] = $y;
			}
			foreach($data['bstHospitals'] as $x => $y){
				$bstHospitals[$x] = $y;
			}
			foreach($data['bstDoctors'] as $x => $y){
				$bstDoctors[$x] = $y;
			}
            $data = array(
                'disData' => $disData,
				'articles' => $articles,
				'topHospitals' => $topHospitals,
				'topDoctors' => $topDoctors,
				'bstDoctors' => $bstDoctors,
				'bstHospitals' => $bstHospitals,
            );
			$this->load->view('disease_view.php',$data);
		}
		
	}


}
?>