<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

  private $name;
  private $em;
  private $usr;
  private $psr;
  private $dob;
  private $ag;
  private $compemail;

  public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');	
	}

  public function index(){
     $this->load->view("registerview");
  }

  public function loadregister()
  {
    	$this->form_validation->set_rules("firstname","Name","required|alpha");
      $this->form_validation->set_rules("email","Email Id","required|valid_email");
      $this->form_validation->set_rules("usr","UserName","required|alpha_numeric");
			$this->form_validation->set_rules("psr","Password","required|alpha_numeric|exact_length[6]");
      $this->form_validation->set_rules("dob","DOB","required");
			$this->form_validation->set_rules("age","Age","required|numeric|greater_than_equal_to[1]");
			if ($this->form_validation->run() == FALSE)
			{
			
			}

			else 
			{
			$firstname = $_POST['firstname'];
      $email = $_POST['email'];
      $username = $_POST['usr'];
      $password = $_POST['psr'];
      $dateofbirth = $_POST['dob'];
      $age = $_POST['age'];
      $this->name = $firstname;
      $this->em = $email;
      $this->usr = $username;
      $this->psr = md5($password);
      $this->dob = $dateofbirth;
      $this->ag = $age;
      $this->verifyemail();
			}
      $this->index();
      // $this->load->view("registerview");
    }

    public function verifyemail()
    {
      $email1 = $this->em;
      $this->load->model('registermodel');
      $check = $this->registermodel->registeremail($email1);
      $this->compemail = $check;
      $this->compareemail();
      
    }

    public function compareemail()
    {
      $check = $this->compemail;
      $email1 = $this->em;
      $compare = @$check[0]['email'];
      if ($compare == $email1) {
        echo "<div class='alert alert-danger'> Entered mail id already Exist!", "</div>";
      }
      else {
        $this->datainsert();
        echo "<div class='alert alert-success'>Registered Successfully, can login now!", "</div>";
      }
    }

    public function datainsert()
    {
      $name = $this->name;
      $usrmail = $this->em;
      $usrname = $this->usr;
      $usrpass = $this->psr;
      $usrdob = $this->dob;
      $usrage = $this->ag;
      $this->load->model('registermodel');
      $this->registermodel->registeruser($name,$usrmail,$usrname,$usrpass,$usrdob,$usrage);
      
    }

    public function display(){
      echo "Happy";
    }
}