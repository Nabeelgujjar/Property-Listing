<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
	}
	
	function index()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['query'] = $this->common->subprop();
			$data['content'] = "admin/categories";
			$this->load->view('admin/layout/layout', $data);
		}
		else
		{
			$data=array('sub_prop_name'=>$this->input->post('category'));
            //print_r($data);
			$result = $this->common->addsubprops($data);
            $data = array();      // array to pass back data
            if($result){
                $data['success'] = true;
                $data['message'] = 'Category added succesfully!';
            }else{
                $data['success'] = false;
                $data['message']  = 'some error occur please try again !!!';
            }
            echo json_encode($data);

		}
	}

	function delete($id) {
		 $this->common->delsubprop($id);
		 redirect(base_url()."index.php/admin/categories");
	}
}