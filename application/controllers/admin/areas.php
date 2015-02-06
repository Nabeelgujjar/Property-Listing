<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Areas extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
	}
	
	function index()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules('areaname', 'area name', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['query'] = $this->common->area();
			$data['content'] = "admin/areas";
			$this->load->view('admin/layout/layout', $data);
		}
		else
		{
			$data=array('area_name'=>$this->input->post('areaname'));
			$result = $this->common->addareas($data);

            $data = array();      // array to pass back data
            if($result){
                $data['success'] = true;
                $data['message'] = 'City added succesfully!';
            }else{
                $data['success'] = false;
                $data['message']  = 'some error occur please try again !!!';
            }
            echo json_encode($data);

			//redirect(base_url()."index.php/admin/areas");
		}
	}

	function delete($id) {
		 $this->common->delareas($id);
		 redirect(base_url()."index.php/admin/areas");
	}
}