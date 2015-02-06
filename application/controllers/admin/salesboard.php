<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salesboard extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
	}
	
    function sale_orders()
	{
		$data['query'] = $this->common->sales();
		$data['content'] = "admin/sales-orders";
		$this->load->view('admin/layout/layout', $data);
	}
    
    
    function sale_cancels()
	{
		$data['query'] = $this->common->sales_cancel();
		$data['content'] = "admin/sales-cancelled";
		$this->load->view('admin/layout/layout', $data);
	}
	
	function create_saleboard()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_message('saleboardimage', 'Salesboard Image', 'callback_checkfile');
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['content'] = "admin/create_saleboard";
			$this->load->view('admin/layout/layout', $data);
		}
		else
		{
			$filename=uniqid();
			
			if($_FILES["saleboardimage"]["name"] != "") {
				$path_info = pathinfo($_FILES["saleboardimage"]["name"]);
				$fileExtension = $path_info['extension'];
	
				$config['upload_path'] ='./public/uploads/saleboardimages';
				$config['allowed_types'] = 'gif|jpg|bmp|png|jpeg';
				$config['file_name'] = $filename.".".$fileExtension;
			
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
                $this->upload->do_upload('saleboardimage');
				
				if ( ! $this->upload->do_upload('saleboardimage')) {
					$message['error'] = $this->upload->display_errors();
					$message['content'] = "admin/create_saleboard";
					$this->load->view('admin/layout/layout', $message);
					goto a;
				} else {
					$file_name = $filename.".".$fileExtension;
				}
			} else {
				$file_name=$this->input->post('prev_image');
			}
			
			$data=array(
				'price'=>$this->input->post('price'),
				'title'=>$this->input->post('title'),
				'description'=>$this->input->post('description'),
				'img'=>$file_name
			);
			
			$this->common->edit_saleboard($data);
			redirect(base_url()."index.php/admin/salesboard/create_saleboard");
			a:
		}
	}
}