<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Amenities extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
	}
	
	function index()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules('amenityname', 'amenity name', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['query'] = $this->common->amenity();
			$data['content'] = "admin/amenities";
			$this->load->view('admin/layout/layout', $data);
		}
		else
		{
			$data=array('amenity_name'=>$this->input->post('amenityname'));
			$result = $this->common->addamenities($data);

            $data = array();      // array to pass back data
            if($result){
                $data['success'] = true;
                $data['message'] = 'Amenity added succesfully!';
            }else{
                $data['success'] = false;
                $data['message']  = 'some error occur please try again !!!';
            }
            echo json_encode($data);

		}
	}

	function delete($id) {
		 $this->common->delamenity($id);
		 redirect(base_url()."index.php/admin/amenities");
	}
}