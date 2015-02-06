<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Emails extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
	}
	

	public function edit_mail()
	{
			$data = array(
            'email_for'=>$this->input->post('email_for'),
			'email_sub'=>$this->input->post('subject'),
			'email_body'=>$this->input->post('body'),
            );
			
			$result = $this->common->update_emailtemp($data);

        $data           = array();      // array to pass back data
        if($result){
            $data['success'] = true;
            $data['message'] = 'Data save successfully';
        }else{
            $data['success'] = false;
            $data['message']  = 'sometthing Bad happened please try again';
        }

        echo json_encode($data);

	}

    public function save_social()
    {
        $data = array(
            'facebook'=>$this->input->post('facebook'),
            'twitter'=>$this->input->post('twitter'),
            'googleplus'=>$this->input->post('googleplus'),
        );

        $result = $this->common->update_sociallinks($data);

        $data           = array();      // array to pass back data
        if($result){
            $data['success'] = true;
            $data['message'] = 'social links save successfully';
        }else{
            $data['success'] = false;
            $data['message']  = 'sometthing Bad happened please try again';
        }

        echo json_encode($data);

    }

    public function save_metadata()
    {
        $data = array(
            'meta_name'=>$this->input->post('title'),
            'meta_keys'=>$this->input->post('keywords'),
            'meta_desc'=>$this->input->post('description'),
        );

        $result = $this->common->update_metadata($data);

        $data  = array();      // array to pass back data
        if($result){
            $data['success'] = true;
            $data['message'] = 'Meta Data save successfully';
        }else{
            $data['success'] = false;
            $data['message']  = 'sometthing Bad happened please try again';
        }

        echo json_encode($data);
    }

    public function save_approval()
    {
        $data = array(
            'approval_method'=>$this->input->post('app_method')
        );

        $result = $this->common->update_approval($data);

        $data  = array();      // array to pass back data
        if($result){
            $data['success'] = true;
            $data['message'] = 'Approval Method save successfully';
        }else{
            $data['success'] = false;
            $data['message']  = 'something Bad happened please try again';
        }

        echo json_encode($data);
    }
	
	function edit($slug) {
		$this->load->library("form_validation");
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('meta_keywords', 'Bottom Column Point 3', 'required');
		$this->form_validation->set_rules('meta_desc', 'Bottom Column Point 3', 'required');
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['slug'] = $slug;
			$data['content'] = "admin/pages";
			$this->load->view('admin/layout/layout', $data);
		}
		else
		{
			$data = array(
				'title'=>$this->input->post('title'),
				'ban_desc1'=>$this->input->post('description'),
				'meta_keyword'=>$this->input->post('meta_keywords'),
				'meta_desc'=>$this->input->post('meta_desc')
            );
			
			$this->common->updatepages($data, $slug);
			
			$this->session->set_flashdata('data', "Page updated Successfully");
			
			redirect(base_url()."index.php/admin/pages/edit/".$slug);
		}
	}
	
	function create_user()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('area', 'Area', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('email', 'Email ID', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$data['content'] = "admin/user_add";
			$this->load->view('admin/layout/layout', $data);
		}
		else
		{
			
				$data=array(
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'password'=>$this->input->post('password'),
				'phone'=>$this->input->post('phone'),
				'city'=>$this->input->post('area'),
				'status'=>$this->input->post('status'),
				'package'=>$this->input->post('package'),
				'added_date'=>date('Y-m-d')

			);
			
		
			$this->common->add_user($data);
			redirect(base_url()."index.php/admin/users");
		}
	}
	
}