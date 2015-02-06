<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('dbcommon');
		$this->load->library("form_validation");
	}
	
	public function index()
	{
		$data['msg'] = "";
		$data['title'] = "Home";
		$data['content'] = "welcome_message";
		$this->load->view('layout/layout', $data);
	}
	function search_filter() {
		$where = " where 2>0";
		if(isset($_POST['search'])) {
			$subpropname = $this->dbcommon->getsubpropbyname($_POST['search']);
			$subpropid = $subpropname->sub_prop_id;
			$where.= " and sub_prop_id = '".$subpropid."'";
		}
		
		if(isset($_REQUEST['sub_property']) && $_REQUEST['sub_property'] != "") {
			$where.=" and sub_prop_id= '".$_REQUEST['sub_property']."'";
		}
		
		if(isset($_REQUEST['property_type']) && $_REQUEST['property_type'] != "") {
			$where.=" and i_want_to= '".$_REQUEST['property_type']."'";
		}
		
		$where="";
		 if(isset($_POST['sort'])) {
			if($_POST['sort'] == "1") {
				$where.=" order by prop_id";
			}
			elseif($_POST['sort'] == "2") {
				$where.=" order by price asc";
			}
			elseif($_POST['sort'] == "3") {
				$where.=" order by price desc";
			}
		}
		
		if(isset($_POST['property_type'])) {	
			if($_POST['property_type'] == 1)
			{
				$contract = "RENT";
			}
			else
			{
				$contract = "SALE";
			}
			//$this->sesson->set_userdata('contract', $contract);
		}
		
		$rowcount = count($this->dbcommon->searchresults($where));
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'welcome/search_filter';
		$config['total_rows'] = $rowcount;
		$config['per_page'] = 1;
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript: void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$uri=$this->uri->segment(3);
		if(!isset($uri) || $uri == "") {
			$offset=0;
		} else {
			$offset=$uri;
		}
		
		$where.=" limit ".$offset.", 1";
		$query=$this->dbcommon->searchresults($where);
		$data['contract'] = $this->session->userdata('contract');
		$data['query'] = $query;
		$data['title'] = "Search Properties";
		$data['content'] = "search_results";
		$this->load->view('layout/layout', $data);
	}
		function view_detail($id) {
			$propdetails = $this->dbcommon->propertydetails($id);
			$getarea=$this->dbcommon->getareabyid($propdetails->area_id);
			$getsubprop=$this->dbcommon->getsubpropbyid($propdetails->sub_prop_id);
		
			if($propdetails->bedrooms != "0") {
				$title=$propdetails->bedrooms."BHK ".$getsubprop->sub_prop_name;
			} else {
				$title=$getsubprop->sub_prop_name;
			}
		
			$data['id'] = $id;
			$data['title'] = $title;
			$data['propdetails'] = $propdetails;
			$data['getarea'] = $getarea;
			$data['getsubprop'] = $getsubprop;
			$data['msg'] = "";
			$data['title'] = $title;
			$data['content'] = "property_detail";
			$this->load->view('layout/layout', $data);
		}
		
		function property_for_sale() {
		
		$limit = "";
		$rowcount = count($this->dbcommon->propforsale($limit));
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'welcome/property_for_sale';
		$config['total_rows'] = $rowcount;
		$config['per_page'] = 10;
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript: void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$uri=$this->uri->segment(3);
		if(!isset($uri) || $uri == "") {
			$offset=0;
		} else {
			$offset=$uri;
		}
		
		$limit.= " limit ".$offset.", 10";
		$query=$this->dbcommon->propforsale($limit);
	
		$data['query'] = $query;
		$data['title'] = "Properties For Sale";
		$data['content'] = "prop_for_sale";
		$this->load->view('layout/layout', $data);
	}
		function property_for_rent() {
		
		$limit = "";
		$rowcount = count($this->dbcommon->propforrent($limit));
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'welcome/property_for_rent';
		$config['total_rows'] = $rowcount;
		$config['per_page'] = 1;
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript: void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$uri=$this->uri->segment(3);
		if(!isset($uri) || $uri == "") {
			$offset=0;
		} else {
			$offset=$uri;
		}
		
		$limit.= " limit ".$offset.", 1";
		$query=$this->dbcommon->propforrent($limit);
	
		$data['query'] = $query;
		$data['title'] = "Properties For Rent";
		$data['content'] = "prop_for_rent";
		$this->load->view('layout/layout', $data);
	}
		function all_properties() {
		
		$limit = "";
		$rowcount = count($this->dbcommon->allprops($limit));
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'welcome/all_properties';
		$config['total_rows'] = $rowcount;
		$config['per_page'] = 1;
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript: void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$uri=$this->uri->segment(3);
		if(!isset($uri) || $uri == "") {
			$offset=0;
		} else {
			$offset=$uri;
		}
		
		$limit.= " limit ".$offset.", 1";
		$query=$this->dbcommon->allprops($limit);
	
		$data['query'] = $query;
		$data['title'] = "All Properties";
		$data['content'] = "all_props";
		$this->load->view('layout/layout', $data);
	}
		
		function sendmail($id) {
		
		$from = $this->input->post('email');
		$message = $this->input->post('phone'). " / n ". $this->input->post('message');
		$subject = "Property Enquiry";
		$to = "tp.zaeem92@gmail.com";
		$this->load->library('email');
		$id = $this->input->post('id');

		$this->email->from($from, 'Name');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);

		$this->email->send();
		redirect(base_url()."property/view_detail/".$id);  
		
		}
}