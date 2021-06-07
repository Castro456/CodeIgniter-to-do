<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $email;
	private $password;
	private $result;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');	
	}
	
	public function index()
	{
		$this->load->view('loginview'); 
	}
	
	public function loadlogin()
	{

		// if ($this->input->post()) {
			$this->form_validation->set_rules("em","Email Id","required|valid_email");
			$this->form_validation->set_rules("psr","Password","required|alpha_numeric");
			if ($this->form_validation->run() == FALSE)
			{
			
			}

			else 
			{
			$em = $_POST['em'];
			$pass = $_POST['psr'];
			$password = md5($pass);
			$this->email = $em;
			$this->password = $password;
			$this->fetching();
			}
		// }
		$this->index();
	}

	public function fetching()
	{
		$check_email = $this->email;
		$this->load->model('loginmodel');
		$data = $this->loginmodel->logindb($check_email);
		$this->result = $data;
		$this->checking();

	}

	public function checking()
	{
    
		try {
			$results = $this->result;
		  $checkpass = $results[0]['pass_word'];
			$password = $this->password;

			if($checkpass == $password){
				echo "<div class='alert alert-success'> Success", "</div>";
				$this->setsession();
				// redirect('loggeduser');
			}

			else {
				throw new Exception("Username or Password Incorrect" );   
			}

	}catch(Exception $e) {
			echo  "<div class='alert alert-danger'> Message:"  .$e->getMessage();    
			echo "</div>";
	}
	}

	public function setsession()
	{
		$usr_session = $this->result;
		$this->session->set_userdata('username',$usr_session[0]['username']);
		$this->session->set_userdata('id',$usr_session[0]['id']);
	}

	public function unset_session()
	{
		session_destroy();
		redirect('home');
	}

}