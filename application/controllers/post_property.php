<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_property extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('dbcommon');
		$this->load->library("form_validation");
	}
	function index()
		{
			$data['content'] = "post_prop";
			$this->load->view('layout/layout', $data);
		}
	function add_property()
		{
	
		$this->form_validation->set_rules('area', 'City', 'required');
		$this->form_validation->set_rules('postal_code', 'Postal Code', 'required');
		$this->form_validation->set_rules('plot_no', 'Plot No.', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('plot_area', 'Plot Area', 'required');
		$this->form_validation->set_rules('sub_prop', 'Sub Property Type', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('type', 'Contract Type', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
	
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if($this->form_validation->run() == FALSE)
		{
			
			$data['content'] = "post_prop";
			$this->load->view('layout/layout', $data);
		}
		else
		{		
				$amenity=",";
				$amenity_check=$this->input->post("amenity");
				foreach($amenity_check as $checkbox) {
				$amenity.=$checkbox.",";
				}
				if(isset($_POST['package']) && $_POST['package']!= '1')
				{
				$filename=uniqid();
			
				$path_info = pathinfo($_FILES["floorplan"]["name"]);
				$fileExtension = $path_info['extension'];

				$config['upload_path'] = './uploads/floorplan/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] = $filename.".".$fileExtension;
			
				$this->load->library('upload', $config);
			
				$this->upload->do_upload('floorplan');
				
				$filename2=uniqid();
			
				$path_info2 = pathinfo($_FILES["epc"]["name"]);
				$fileExtension2 = $path_info2['extension'];

				$config2['upload_path'] = './uploads/epc/';
				$config2['allowed_types'] = 'gif|jpg|png';
				$config2['file_name'] = $filename2.".".$fileExtension2;
			
				$this->upload->initialize($config2);
				$this->upload->do_upload('epc');
				}
			
				
				
					$filename3=uniqid();
				
					$path_info3 = pathinfo($_FILES["propimg"]["name"]);
					$fileExtension3 = $path_info3['extension'];
	
					$config3['upload_path'] = './uploads/propimg/';
					$config3['allowed_types'] = 'gif|jpg|png';
					$config3['file_name'] = $filename2.".".$fileExtension2;
			
					$this->load->library('upload', $config3);
				
					$this->upload->do_upload('propimg');

				$data=array(
				'area_id'=>$this->input->post('area'),
				'sub_prop_id'=>$this->input->post('sub_prop'),
				'postal_code'=>$this->input->post('postal_code'),
				'plot_no'=>$this->input->post('plot_no'),
				'ameni_id'=>$amenity,
				'address'=>$this->input->post('address'),
				'bedrooms'=>$this->input->post('bedrooms'),
				'bathrooms'=>$this->input->post('bathrooms'),
				'reception'=>$this->input->post('reception'),
				'plot_area'=>$this->input->post('plot_area'),
				'price'=>$this->input->post('price'),
				'description'=>$this->input->post('description'),
				'post_date'=>date('Y-m-d'),
				'i_want_to'=>$this->input->post('type'),
				'package_id'=>$this->input->post('package'),
				'floorplan'=>$filename.".".$fileExtension,
				'epc'=>$filename2.".".$fileExtension2,
				'prop_img'=>$filename3.".".$fileExtension3,
				'user_id'=>$this->session->userdata('user_id')

				);
				
				$this->dbcommon->add_prop($data);
				redirect(base_url());
			}
	}
}
	
	function view_packages()
	{
		$data['content'] = "admin/properties-packages";
		$this->load->view('admin/layout/layout', $data);
	}
	
	function frame()
	{
		$data['content'] = "admin/iframe-packages";
		$this->load->view('admin/layout/layout', $data);
	}
	
	function do_upload()
	{
		}