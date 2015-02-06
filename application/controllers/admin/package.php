<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Package extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
	}
	
	function index()
	{
		
		$data['content'] = "admin/properties-packages";
		$this->load->view('admin/layout/layout', $data);
	}
	function frame()
	{
		$this->load->view('admin/iframe-packages');
	}
	
	function manage_packages ()
	{
		$data['content'] = "admin/properties-edit-packages";
		$this->load->view('admin/layout/layout', $data);
	}
	
	function pack()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules('optionname', 'option name', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['query'] = $this->common->getpackopt();
			$data['content'] = "admin/pack_opt";
			$this->load->view('admin/layout/layout', $data);
		}
		else
		{
			$data=array('option_name'=>$this->input->post('optionname'));
			$result = $this->common->addpackageoptions($data);

            $data = array();      // array to pass back data
            if($result){
                $data['success'] = true;
                $data['message'] = 'Option added succesfully!';
            }else{
                $data['success'] = false;
                $data['message']  = 'some error occur please try again !!!';
            }
            echo json_encode($data);

		}
	}
	
	function update_freepack() {
			$this->load->library("form_validation");
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$data['content'] = "admin/properties-edit-packages";
			$this->load->view('admin/layout/layout', $data);
		}
		
		$option=",";
		$option_check=$this->input->post("option");
		foreach($option_check as $checkbox) {
			$option.=$checkbox.",";
		}
			
		$data=array(
				'package_name'=>$this->input->post('name'),
				'price'=>$this->input->post('price'),
				'validity'=>$this->input->post('validity'),
				'pub_within'=>$this->input->post('published'),
				'photos'=>$this->input->post('photos'),
				'options' => $option
				
			);

		 $result= $this->common->updatefree($data);

        $data           = array();      // array to pass back data
        if($result){
            $data['success'] = true;
            $data['message'] = 'Free package updated Successfully!';
        }else{
            $data['success'] = false;
            $data['message']  = 'Something bad happened please try again';
        }

        echo json_encode($data);
		 //redirect(base_url()."index.php/admin/package/manage_packages");
	}
	
	function update_bronzepack() {
			$this->load->library("form_validation");
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$data['content'] = "admin/properties-edit-packages";
			$this->load->view('admin/layout/layout', $data);
		}
		 	$option=",";
			$option_check=$this->input->post("option");
			foreach($option_check as $checkbox) {
				$option.=$checkbox.",";
			}
		$data=array(
				'package_name'=>$this->input->post('name'),
				'price'=>$this->input->post('price'),
				'validity'=>$this->input->post('validity'),
				'pub_within'=>$this->input->post('published'),
				'photos'=>$this->input->post('photos'),
				'options' => $option
				
			);

        $result = $this->common->updatebronze($data);

        $data           = array();      // array to pass back data
        if($result){
            $data['success'] = true;
            $data['message'] = 'Bronze package updated Successfully!';
        }else{
            $data['success'] = false;
            $data['message']  = 'Something bad happened please try again';
        }

        echo json_encode($data);

	}
	
	function update_silverpack() {
		$this->load->library("form_validation");
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$data['content'] = "admin/properties-edit-packages";
			$this->load->view('admin/layout/layout', $data);
		}
		 	$option=",";
			$option_check=$this->input->post("option");
			foreach($option_check as $checkbox) {
				$option.=$checkbox.",";
			}
		$data=array(
				'package_name'=>$this->input->post('name'),
				'price'=>$this->input->post('price'),
				'validity'=>$this->input->post('validity'),
				'pub_within'=>$this->input->post('published'),
				'photos'=>$this->input->post('photos'),
				'options' => $option
				
			);
		$result = $this->common->updatesilver($data);

        $data           = array();      // array to pass back data
        if($result){
            $data['success'] = true;
            $data['message'] = 'Silver package updated Successfully!';
        }else{
            $data['success'] = false;
            $data['message']  = 'Something bad happened please try again';
        }
        echo json_encode($data);
	}
	
	function update_goldpack() {
		$this->load->library("form_validation");
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$data['content'] = "admin/properties-edit-packages";
			$this->load->view('admin/layout/layout', $data);
		}
		 	$option=",";
			$option_check=$this->input->post("option");
			foreach($option_check as $checkbox) {
				$option.=$checkbox.",";
			}
		$data=array(
				'package_name'=>$this->input->post('name'),
				'price'=>$this->input->post('price'),
				'validity'=>$this->input->post('validity'),
				'pub_within'=>$this->input->post('published'),
				'photos'=>$this->input->post('photos'),
				'options' => $option
			);
		$result= $this->common->updategold($data);

        $data           = array();      // array to pass back data
        if($result){
            $data['success'] = true;
            $data['message'] = 'Gold package updated Successfully!';
        }else{
            $data['success'] = false;
            $data['message']  = 'Something bad happened please try again';
        }
        echo json_encode($data);
	}
	
	function deletepackopt($id) {
		 $this->common->delpackopt($id);
		 redirect(base_url()."index.php/admin/package/pack");
	}

}


