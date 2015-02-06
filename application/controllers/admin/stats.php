<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stats extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
	}
	
	function index()
	{
		$data['query'] = $this->stat->propviews();
		$data['content'] = "admin/stats";
		$this->load->view('admin/layout/layout', $data);
	}
	
    function prop_views()
	{
		$data['query'] = $this->stat->propviews();
		$data['content'] = "admin/prop_views";
		$this->load->view('admin/layout/layout', $data);
	}

    function reg_views()
    {
        $data['query'] = $this->stat->getallareas();
        $data['content'] = "admin/reg_views";
        $this->load->view('admin/layout/layout', $data);
    }
    
    function reg_stat()
	{
		$rows = $this->stat->getallareas();
        foreach($rows as $row){
            $data['area_name'] = $row->area_name;
              $data['views'] = $this->stat->areaviews($row->area_id);
              $data2[] = $data;
            
        }
        $data['query'] = json_encode($data2);;
		$data['content'] = "admin/region_stat";
		$this->load->view('admin/layout/layout', $data);
	}
    
    function prop_stat()
	{  
	   if(isset($_GET['s_date']) && isset($_GET['e_date']) ){
	       $s_date = $this->input->get('s_date');
        $e_date = $this->input->get('e_date');
	   }
       else{
        $s_date = '2014-12-28';
        $e_date = '2015-01-07' ;
       }
        $data['s_date'] = $s_date;
        $data['e_date'] = $e_date;
		$data['content'] = "admin/prop_stat";
		$this->load->view('admin/layout/layout', $data);
	}
}