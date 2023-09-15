<?php

defined('BASEPATH') or exit('No direct script access allowed');



class MainController extends MY_Controller

{



	/**

	 * Index Page for this controller.

	 *

	 * Maps to the following URL

	 * 		http://example.com/index.php/welcome

	 *	- or -

	 * 		http://example.com/index.php/welcome/index

	 *	- or -

	 * Since this controller is set as the default controller in

	 * config/routes.php, it's displayed at http://example.com/

	 *

	 * So any other public methods not prefixed with an underscore will

	 * map to /index.php/welcome/<method_name>

	 * @see https://codeigniter.com/user_guide/general/urls.html

	 */

	public function index()

	{

		

		$this->load->model('index_Model');

		$data = $this->index_Model->retrieve();

		if ($data) {

			$hospitals = array();

			$diseases = array();

			$doctors = array();

			foreach ($data['hospitals'] as $x => $y) {

				$hospitals[$x] = $y;

			}

			foreach ($data['diseases'] as $x => $y) {

				$diseases[$x] = $y;

			}

			foreach ($data['doctors'] as $x => $y) {

				$doctors[$x] = $y;

			}

			$data = array(

				'hospitals' => $hospitals,

				'diseases' => $diseases,

				'doctors' => $doctors,

			);

         

			$this->load->view('index', $data);

		}

	}

	

	public function temp()

	{
            
		$this->load->view('Hospital/hospitalLogin');

	}

public function temp2()

	{

		$data['depts'] = $this->db->select('*')

		->from('departments')

		->get()->result_array();
		$this->load->view('Hospital/hospitalRegister',$data);

	}



	public function viewDoctor()

	{

		$docId = $this->uri->segment(3);

		$this->load->model('doctors_Model');

		$data = $this->doctors_Model->doctorsProfile($docId);

		if ($data) {

			$doctorData = array();

			$reviewData = array();

			$expData = array();

			$consultData = array();



			foreach ($data['doctorData'] as $x => $y) {

				$doctorData = $y;

			}

			foreach ($data['reviewData'] as $x => $y) {

				$reviewData[$x] = $y;

			}

			foreach ($data['expData'] as $x => $y) {

				$expData[$x] = $y;

			}

			foreach ($data['consultData'] as $x => $y) {

				$consultData[$x] = $y;

			}

			$data = array(

				'doctorData' => $doctorData,

				'reviewData' => $reviewData,

				'expData' => $expData,

				'consultData' => $consultData,

			);

			$this->load->view('doctor_profile_view', $data);

		} else {

			$this->load->view('doctor_profile_view');
		}





		//

	}

	public function docConsult()

    {

		$consultId = $this->uri->segment(3);

		$this->load->model('doctors_Model');

		$data = $this->doctors_Model->doctorsConsult($consultId);

        $this->load->view('doctorConsultation',$data);

    }



	public function addConsultaion()

	{

		$data = array(

			'email_id' => $_SESSION['email_id'],

			'post_time' => date('Y-m-d'),

			'doc_id' => $this->input->post('doc_id'),

			'consult_title' => $this->input->post('title'),

			'consult_query' => $this->input->post('query'),

		);
//   echo"<pre>";
//   print_r($data);
//   echo"</pre>";
//   die;
		$doc_id = $data['doc_id'];

		$this->load->model('doctors_Model');

		$this->doctors_Model->addConsultation($data);

		header('location:'.site_url('mainController/viewDoctor/'.$doc_id));

	}

	public function viewHospital()

	{
		

		$hos_id = $this->uri->segment(3);

		$this->load->model('hospitalView_Model');

		$data = $this->hospitalView_Model->hospitalData($hos_id);

		if ($data) {

			$hospitalDet = array();

			$hospitalPost = array();

			$assocDoc = array();

			$reviews = array();

			$consultData = array();



			foreach ($data['hospitalDet'] as $x => $y) {

				$hospitalDet = $y;

			}



			foreach ($data['hospitalPost'] as $x => $y) {

				$hospitalPost[$x] = $y;

			}

			foreach ($data['assocDoc'] as $x => $y) {

				$assocDoc[$x] = $y;

			}

			foreach ($data['consultData'] as $x => $y) {

				$consultData[$x] = $y;

			}





			$reviews = $this->hospitalView_Model->reviewUserData($hos_id);

			// echo"<pre>";print_r($reviews);die;

			$data = array(

				'hospitalDet' => $hospitalDet,

				'hospitalPost' => $hospitalPost,

				'assocDoc' => $assocDoc,

				'reviews' => $reviews,

				'consultData' => $consultData,

			);
		

			$this->load->view('hospital_profile_view', $data);

		} else {

			$this->load->view('hospital_profile_view');

		}

	}

	

	

}