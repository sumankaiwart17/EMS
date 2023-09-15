<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Googlelogin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		require_once APPPATH . 'third_party/src/Google_Client.php';
		require_once APPPATH . 'third_party/src/contrib/Google_Oauth2Service.php';
	}

	public function index()
	{
		$this->load->view('Users/userLogin');
	}
	public function logout()
	{
		$gClient = new Google_Client();
		unset($_SESSION['token']);
		$gClient->revokeToken();
		header('location: ' . site_url());
	}
	public function login()
	{

		$clientId = '43881820333-fa9q1st2d3e9tb6habu2k0mhv8r6qkfg.apps.googleusercontent.com'; //Google client ID
		$clientSecret = 'r6bhd2XTw674ds3D-a3nhyOl'; //Google client secret
		$redirectURL = base_url() . 'index.php/googlelogin/login';

		//https://curl.haxx.se/docs/caextract.html

		//Call Google API
		$gClient = new Google_Client();
		$gClient->setApplicationName('Login');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectURL);
		$google_oauthV2 = new Google_Oauth2Service($gClient);

		if (isset($_GET['code'])) {
			$gClient->authenticate($_GET['code']);
			$_SESSION['token'] = $gClient->getAccessToken();
			header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
		}

		if (isset($_SESSION['token'])) {
			$gClient->setAccessToken($_SESSION['token']);
		}

		if ($gClient->getAccessToken()) {
			$userProfile = $google_oauthV2->userinfo->get();
			$check = $this->db->where('email_id', $userProfile['email'])->get('user_registration');
			if ($check->num_rows() > 0) {
				$_SESSION['email_id'] = $userProfile['email'];
				$_SESSION['userLog'] = true;
				// echo "<pre>";
				// print_r($userProfile);
				// die;
				header('location:' . site_url('userProfile_Controller/timeline'));
			} else {
				$data['email_id'] = $userProfile['email'];
				$data2['picture'] = $userProfile['picture'];
				$data2['email_id'] = $userProfile['email'];
				$data2['name'] = $userProfile['name'];

				$this->db->insert('user_registration', $data);
				$this->db->insert('user_details', $data2);
				$_SESSION['email_id'] = $userProfile['email'];
				$_SESSION['userLog'] = true;
				header('location:' . site_url('userProfile_Controller/timeline'));
			}
			// echo "<pre>";
			// print_r($userProfile);
			// die;
		} else {
			$url = $gClient->createAuthUrl();
			header("Location: $url");
			exit;
		}
	}
}
