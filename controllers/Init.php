<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Init extends CI_Controller
{
	public function index()
	{
		redirect(base_url('index.php/connection/login/'));
	}
}
