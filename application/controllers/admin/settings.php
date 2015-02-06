<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
	}
	
	function index()
	{
		$data['content'] = "admin/settings";
		$this->load->view('admin/layout/layout', $data);
	}

}