<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
	}
	

	public function edit_homepage($id)
	{
		
		$this->load->library("form_validation");
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('subtitle', 'Sub Title', 'required');
		$this->form_validation->set_rules('banner', 'Banner', 'required');
		$this->form_validation->set_rules('desc1', 'Description Point 1', 'required');
		$this->form_validation->set_rules('desc2', 'Description Point 2', 'required');
		$this->form_validation->set_rules('desc3', 'Description Point 3', 'required');
		$this->form_validation->set_rules('col1', 'Column Title 1', 'required');
		$this->form_validation->set_rules('des1', 'Bottom Column Point 1', 'required');
		$this->form_validation->set_rules('col2', 'Column Title 2', 'required');
		$this->form_validation->set_rules('des2', 'Bottom Column Point 2', 'required');
		$this->form_validation->set_rules('col3', 'Column Title 3', 'required');
		$this->form_validation->set_rules('des3', 'Bottom Column Point 3', 'required');
		$this->form_validation->set_rules('meta_keywords', 'Bottom Column Point 3', 'required');
		$this->form_validation->set_rules('descp', 'Bottom Column Point 3', 'required');
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['id'] = $id;
			$data['content'] = "admin/manage_homepage";
			$this->load->view('admin/layout/layout', $data);
		}
		else
		{
			$data = array(
			'title'=>$this->input->post('title'),
			'sub_title'=>$this->input->post('subtitle'),
			'ban'=>$this->input->post('banner'),
			'ban_desc1'=>$this->input->post('desc1'),
			'ban_desc2'=>$this->input->post('desc2'),
			'ban_desc3'=>$this->input->post('desc3'),
                'ban2_title'=>$this->input->post('ban2_title'),
                'ban2_text'=>$this->input->post('ban2_text'),
			'col1'=>$this->input->post('col1'),
			'col_des1'=>$this->input->post('des1'),
			'col2'=>$this->input->post('col2'),
			'col_des2'=>$this->input->post('des2'),
			'col3'=>$this->input->post('col3'),
			'col_des3'=>$this->input->post('des3'),
			'meta_keyword'=>$this->input->post('meta_keywords'),
			'meta_desc'=>$this->input->post('descp'),
                'meta_title'=>$this->input->post('meta_title')

            );
			
			$result = $this->common->update_homepage($data);

            $data           = array();      // array to pass back data
            if($result){
                $data['success'] = true;
                $data['message'] = 'Page Updated successfully';
            }else{
                $data['success'] = false;
                $data['message']  = 'sometthing Bad happened please try again';
            }

            echo json_encode($data);
			
			//redirect(base_url()."index.php/admin/home");
		}
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