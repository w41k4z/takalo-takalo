<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Connection extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
    
    public function login($error = '')
	{
		$data = array();
		$data['error'] = strlen($error) > 0 ? "Invalid data. Please verify all input" : $error;
		$this->load->view('login', $data);
	}
    
    public function register()
	{
		$this->load->view('register');
	}
	
	public function authenticate() {
        $password = $this->input->post("password");
        $mail = $this->input->post("mail");
		$user = $this->client->logIn($password, $mail);
		if($user != null) {
			$this->session->set_userdata('user', $user);
			redirect(base_url('index.php/page/'));
		} else {
			redirect(base_url("index.php/connection/login/error"));
		}
    }
	
	public function create_account() {
		$name = $this->input->post("name");
        $first_name = $this->input->post("firstName");
		$password = $this->input->post("password");
        $mail = $this->input->post("mail");
        $contact = $this->input->post("contact");
		
		$new_client_id = $this->client->create($name, $first_name, $contact);
		$this->account->create($new_client_id, $password, $mail, false);
		
		$this->session->set_userdata('user', $this->client->get_user_by_id($new_client_id));
		redirect(base_url('index.php/page/'));
	}
}