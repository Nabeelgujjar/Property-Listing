<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
	}
	
	public function index()
	{
	   if($this->session->userdata('username') !== 'admin'){
	       redirect(base_url()."index.php/admin/login");
	   }

      //$gold = $this->common->totalgoldtoday();
//$silver = $this->common->totalsilvertoday();
    //$bronze = $this->common->totalbronzetoday();
        //$sale = ($gold * $this->common->goldprize()->price) + ($silver * $this->common->silverprize()->price) + ( $bronze * $this->common->bronzeprize()->price);

        if(isset($_GET['s_date']) && isset($_GET['e_date']) ){
            $s_date = $this->input->get('s_date');
            $e_date = $this->input->get('e_date');
        }
        else{
            $s_date = '2014-12-28';
            $e_date = '2015-01-07';
        }
        //$data['sale'] = $sale;
        $data['s_date'] = $s_date;
        $data['e_date'] = $e_date;
		$data['msg'] = "";
		$data['content'] = "admin/home";
		$this->load->view('admin/layout/layout', $data);
	}
}