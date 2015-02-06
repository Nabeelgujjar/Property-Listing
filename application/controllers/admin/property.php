<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Property extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
	}

	
	function manage_featured() {
		$this->form_validation->set_rules('price', 'City', 'required');
		$this->form_validation->set_rules('validity_period', 'City', 'required');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = "admin/manage_featured";
			$this->load->view('admin/layout/layout', $data);
		}
		else
		{
			$data=array("price" => $this->input->post('price'), "validity_period" => $this->input->post('validity_period'));
			$update=$this->common->update_featured($data);

            $data  = array();      // array to pass back data
            if($update){
                $data['success'] = true;
                $data['message'] = 'Data updated successfully !!!';
            }else{
                $data['success'] = false;
                $data['message']  = 'Something went wrong please try again';
            }

            echo json_encode($data);
		}
	}
	
	function sale()
	{
		$data['query'] = $this->common->propforsale();
		$data['content'] = "admin/prop_for_sale";
		$this->load->view('admin/layout/layout', $data);
	}
	function rent()
	{
		$data['query'] = $this->common->propforrent();
		$data['content'] = "admin/prop_for_rent";
		$this->load->view('admin/layout/layout', $data);
	}
	function featured()
	{
		$data['query'] = $this->common->featuredprop();
		$data['content'] = "admin/feat_prop";
		$this->load->view('admin/layout/layout', $data);
	}
	function userprop($id)
	{
		$data['query'] = $this->common->userprop($id);
		$data['content'] = "admin/prop_for_rent";
		$this->load->view('admin/layout/layout', $data);
	}
	function delete($id) {
		 $result = $this->common->delprop($id);
        $data           = array();      // array to pass back data
        if($result){
            $data['success'] = true;
            $data['message'] = 'Property Deleted successfully';
        }else{
            $data['success'] = false;
            $data['message']  = 'sometthing Bad happened please try again';
        }
		// redirect(base_url()."index.php/admin/property/sale");
	}
	function allowprop($id) {
		 $this->common->allowprop($id);
		 $chk = $this->common->propertydetails($id);
		 if($chk->i_want_to == 2)
		 {
		 redirect(base_url()."index.php/admin/property/sale");
		 }
		 else
		 {
			redirect(base_url()."index.php/admin/property/rent"); 
		 }
	}
	
	function blockprop($id) {
		 $this->common->blockprop($id);
		 $chk = $this->common->propertydetails($id);
		 if($chk->i_want_to == 2)
		 {
		 redirect(base_url()."index.php/admin/property/sale");
		 }
		 else
		 {
			redirect(base_url()."index.php/admin/property/rent"); 
		 }
	}
    
    function select_pack()
	{
		$data['content'] = "admin/select_pack";
		$this->load->view('admin/layout/layout', $data);
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
	
			$data['content'] = "admin/post_prop";
			$this->load->view('admin/layout/layout', $data);
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
				if($_FILES["floorplan"]["name"] != "") {
					$filename=uniqid();
				
					$path_info = pathinfo($_FILES["floorplan"]["name"]);
					$fileExtension = $path_info['extension'];
		
					$config['upload_path'] = 'C:\wamp\www\hp_new\public\public\uploads\floorplan';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['file_name'] = $filename.".".$fileExtension;
				
					$this->load->library('upload', $config);
				
					if (!$this->upload->do_upload('floorplan')) {
						$message['error'] = $this->upload->display_errors();
						$message['content'] = "admin/post_prop";
						$this->load->view('admin/layout/layout', $message);
						goto b;
					
					}
					else
					{
						$floorplan=$filename.".".$fileExtension;
					}
				}
				
				if($_FILES["epc"]["name"] != "") {
				
				$filename2=uniqid();
			
				$path_info2 = pathinfo($_FILES["epc"]["name"]);
				$fileExtension2 = $path_info2['extension'];
	
				$config2['upload_path'] = 'C:\wamp\www\hp_new\public\public\uploads\epc';
				$config2['allowed_types'] = 'gif|jpg|png';
				$config2['file_name'] = $filename2.".".$fileExtension2;
			
				//$this->upload->initialize($config2);
                
                $this->load->library('upload', $config2);
				if (!$this->upload->do_upload('epc')) {
							
							
					$message['error2'] = $this->upload->display_errors();
					$message['content'] = "admin/post_prop";
					$this->load->view('admin/layout/layout', $message);
					goto b;
				
				}
				else
				{
					$epc=$filename2.".".$fileExtension2;
				}
				
				}
			}
			
			if($_FILES["propimg"]["name"] != "") {
			
			$filename3=uniqid();
		
			$path_info3 = pathinfo($_FILES["propimg"]["name"]);
			$fileExtension3 = $path_info3['extension'];
	
			$config3['upload_path'] = 'C:\wamp\www\hp_new\public\public\uploads\propimg';
			$config3['allowed_types'] = 'gif|jpg|png';
			$config3['file_name'] = $filename3.".".$fileExtension3;
	
			//$this->upload->initialize($config3);
            
            $this->load->library('upload', $config3);
            
			if (!$this->upload->do_upload('propimg')) {
							
							
					$message['error3'] = $this->upload->display_errors();
					$message['content'] = "admin/post_prop";
					$this->load->view('admin/layout/layout', $message);
					goto b;
				
				}
				else
				{
					$propimg=$filename3.".".$fileExtension3;
				}
			
			}
	
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
				'floorplan'=>$floorplan,
				'epc'=>$epc,
				'prop_img'=>$propimg
			);
				
			$this->dbcommon->add_prop($data);
			redirect(base_url()."index.php/admin/property/sale");
			b:
		}
	}
    
    function add_property_user($id)
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
            $data['user_id'] = $id;
			//$data['content'] = "admin/post_prop_user";
            $data['content'] = "admin/proper-post";
			$this->load->view('admin/layout/layout', $data);
		}
		else
		{		
			$amenity=",";
			$amenity_check=$this->input->post("amenity");
			foreach($amenity_check as $checkbox) {
				$amenity.=$checkbox.",";
			}
		
			if(isset($this->common->getpackbyid($id)->package_id) && $this->common->getpackbyid($id)->package_id!= '1')
			{
				if($_FILES["floorplan"]["name"] != "") {
					$filename=uniqid();
				
					$path_info = pathinfo($_FILES["floorplan"]["name"]);
					$fileExtension = $path_info['extension'];
		
					$config['upload_path'] = 'C:\wamp\www\hp_new\public\public\uploads\floorplan';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['file_name'] = $filename.".".$fileExtension;
				
					$this->load->library('upload', $config);
				
					if (!$this->upload->do_upload('floorplan')) {
						$message['error'] = $this->upload->display_errors();
						$message['content'] = "admin/post_prop_user";
						$this->load->view('admin/layout/layout', $message);
						goto b;
					
					}
					else
					{
						$floorplan=$filename.".".$fileExtension;
					}
				}
				
				if($_FILES["epc"]["name"] != "") {
				
				$filename2=uniqid();
			
				$path_info2 = pathinfo($_FILES["epc"]["name"]);
				$fileExtension2 = $path_info2['extension'];
	
				$config2['upload_path'] = 'C:\wamp\www\hp_new\public\public\uploads\epc';
				$config2['allowed_types'] = 'gif|jpg|png';
				$config2['file_name'] = $filename2.".".$fileExtension2;
			
				//$this->upload->initialize($config2);
                
                $this->load->library('upload', $config2);
				if (!$this->upload->do_upload('epc')) {
							
							
					$message['error2'] = $this->upload->display_errors();
					$message['content'] = "admin/post_prop_user";
					$this->load->view('admin/layout/layout', $message);
					goto b;
				
				}
				else
				{
					$epc=$filename2.".".$fileExtension2;
				}
				
				}
			}
			
			if($_FILES["propimg"]["name"] != "") {
			
			$filename3=uniqid();
		
			$path_info3 = pathinfo($_FILES["propimg"]["name"]);
			$fileExtension3 = $path_info3['extension'];
	
			$config3['upload_path'] = 'C:\wamp\www\hp_new\public\public\uploads\propimg';
			$config3['allowed_types'] = 'gif|jpg|png';
			$config3['file_name'] = $filename3.".".$fileExtension3;
	
			//$this->upload->initialize($config3);
            
            $this->load->library('upload', $config3);
            
			if (!$this->upload->do_upload('propimg')) {
							
							
					$message['error3'] = $this->upload->display_errors();
					$message['content'] = "admin/post_prop_user";
					$this->load->view('admin/layout/layout', $message);
					goto b;
				
				}
				else
				{
					$propimg=$filename3.".".$fileExtension3;
				}
			
			}
	
			$data=array(
                'user_id'=>$id,
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
				'package_id'=>$this->common->getpackbyid($id)->package_id,
				'floorplan'=>$floorplan,
				'epc'=>$epc,
				'prop_img'=>$propimg
			);
				
			$this->dbcommon->add_prop($data);
			redirect(base_url()."index.php/admin/property/sale");
			b:
		}
	}


    function add_new_property_user()
    {
        if( isset($_POST['amenity']) && !empty($_POST['amenity']) ) {
            $amenity = ",";
            $amenity_check = $this->input->post("amenity");
            foreach ($amenity_check as $checkbox) {
                $amenity .= $checkbox . ",";
            }
        }
        else {
            $amenity = ",";
        }

        $length = 10;
        $alphabets = range('A','Z');
        $numbers = range('0','9');
        $additional_characters = array('_','-');
        $final_array = array_merge($alphabets,$numbers,$additional_characters);

        $password = '';

        while($length--) {
            $key = array_rand($final_array);
            $password .= $final_array[$key];
        }
         $uni_id = $password.$this->input->post('user_id');
        $data=array(
            'user_id'=>$this->input->post('user_id'),
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
            'package_id'=>$this->common->getpackbyid($this->input->post('user_id'))->package_id,
            'floorplan'=>'no_image.png',
            'epc'=>'no_image.png',
            'prop_img'=>'no_image.png',
            'prop_uni_id'=> $uni_id
        );

            $result = $this->dbcommon->add_prop($data);
            $data           = array();      // array to pass back data
        if($result){
            $data['success'] = true;
            $data['message'] = 'Property added successfully';
        }else{
            $data['success'] = false;
            $data['message']  = 'sometthing Bad happened please try again';
        }

        echo json_encode($data);

    }

    function save_way($path){
        //rmdir('./test');
        exec('rm -rf ./'.$path);
    }

	
	function edit_property($id)
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
	
			$data['id'] = $id;
			$data['content'] = "admin/edit_prop";
			$this->load->view('admin/layout/layout', $data);
		}
		else
		{
			$row = $this->common->propertydetails($id);
			$amenity=",";
			$amenity_check=$this->input->post("amenity");
			foreach($amenity_check as $checkbox) {
				$amenity.=$checkbox.",";
			}
				
			if(isset($_POST['package']) && $_POST['package']!= '1')
			{
					if($_FILES["floorplan"]["name"] != "") {
						$filename=uniqid();
						$path_info = pathinfo($_FILES["floorplan"]["name"]);
						$fileExtension = $path_info['extension'];
		
						$config['upload_path'] = 'C:\wamp\www\hp_new\public\public\uploads\floorplan';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['file_name'] = $filename.".".$fileExtension;
					
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if (!$this->upload->do_upload('floorplan')) {
							
							$message['id'] = $id;
							$message['error'] = $this->upload->display_errors();
							$message['content'] = "admin/edit_prop";
							$this->load->view('admin/layout/layout', $message);
							goto a;
						} else {
							$floorplan=$filename.".".$fileExtension;
						}
						
						
					} else {
						$floorplan=$row->floorplan;
					}
					
				if($_FILES["epc"]["name"] != "") {
					$filename2=uniqid();
				
					$path_info2 = pathinfo($_FILES["epc"]["name"]);
					$fileExtension2 = $path_info2['extension'];
	
					$config2['upload_path'] = 'C:\wamp\www\hp_new\public\public\uploads\epc';
					$config2['allowed_types'] = 'gif|jpg|png';
					$config2['file_name'] = $filename2.".".$fileExtension2;
				
					$this->upload->initialize($config2);
					if (!$this->upload->do_upload('epc')) {
						
							$message['id'] = $id;
							$message['error2'] = $this->upload->display_errors();
							$message['content'] = "admin/edit_prop";
							$this->load->view('admin/layout/layout', $message);
							goto a;
						} else {
							$epc=$filename2.".".$fileExtension2;
						}
						
					
				} else {
					$epc=$row->epc;
				}
			}
	
			if($_FILES["propimg"]["name"] != "") {
				$filename3=uniqid();
			
				$path_info3 = pathinfo($_FILES["propimg"]["name"]);
				$fileExtension3 = $path_info3['extension'];
	
				$config3['upload_path'] = 'C:\wamp\www\hp_new\public\public\uploads\propimg';
				$config3['allowed_types'] = 'gif|jpg|png';
				$config3['file_name'] = $filename3.".".$fileExtension3;
		
				$this->load->library('upload', $config3);
				$this->upload->initialize($config3);
				if (!$this->upload->do_upload('propimg')) {
							$message['id'] = $id;
							$message['error3'] = $this->upload->display_errors();
							$message['content'] = "admin/edit_prop";
							$this->load->view('admin/layout/layout', $message);
							goto a;
						} else {
							$prop_img=$filename3.".".$fileExtension3;
						}
						
				
			} else {
				$prop_img=$row->prop_img;
			}
				
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
				'floorplan'=>$floorplan,
				'epc'=>$epc,
				'prop_img'=>$prop_img
			);
				
			$this->common->update_prop($id,$data);
			redirect(base_url()."index.php/admin/property/sale");
			a:
		}
	}

    function upload_test()
    {
        $data['content'] = "admin/upload_test";
        $this->load->view('admin/layout/layout', $data);
    }

    function upload_pro()
    {
        $amenity=",";
        $amenity_check=$this->input->post("amenity");
        foreach($amenity_check as $checkbox) {
            $amenity.=$checkbox.",";
        }

        if($_FILES["upload_floor"]["name"] != ""):
            $filename=uniqid();
            $path_info = pathinfo($_FILES["upload_floor"]["name"]);
            $fileExtension = $path_info['extension'];

            $config['upload_path'] = './public/uploads/floorplan';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $filename.".".$fileExtension;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('upload_floor')):

                //$message['id'] = $id;
                $message['user_id'] = $this->input->post('user_id');
                $message['error1'] = $this->upload->display_errors();
                $message['content'] = "admin/proper-post";
                $this->load->view('admin/layout/layout', $message);
                goto a;
            else:
                $floorplan=$filename.".".$fileExtension;
            endif;
        else:
            $floorplan= 'no_image.png';
        endif;

        if($_FILES["upload_epc"]["name"] != ""):
            $filename2=uniqid();

            $path_info2 = pathinfo($_FILES["upload_epc"]["name"]);
            $fileExtension2 = $path_info2['extension'];

            $config2['upload_path'] = './public/uploads/epc';
            $config2['allowed_types'] = 'gif|jpg|png';
            $config2['file_name'] = $filename2.".".$fileExtension2;

            $this->upload->initialize($config2);
            if (!$this->upload->do_upload('upload_epc')):
                //$message['id'] = $id;
                $message['user_id'] = $this->input->post('user_id');
                $message['error2'] = $this->upload->display_errors();
                $message['content'] = "admin/proper-post";
                $this->load->view('admin/layout/layout', $message);
                goto a;
            else:
                $epc=$filename2.".".$fileExtension2;
            endif;

        else:
            $epc='no_image.png';
        endif;

        $prop_img = $this->prop_img_upload();

        $length = 10;
        $alphabets = range('A','Z');
        $numbers = range('0','9');
        $additional_characters = array('_','-');
        $final_array = array_merge($alphabets,$numbers,$additional_characters);

        $password = '';

        while($length--) {
            $key = array_rand($final_array);
            $password .= $final_array[$key];
        }
        $uni_id = $password.$this->input->post('user_id');
        $data=array(
            'user_id'=>$this->input->post('user_id'),
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
            'package_id'=>$this->common->getpackbyid($this->input->post('user_id'))->package_id,
            'floorplan'=>$floorplan,
            'epc'=>$epc,
            'prop_img'=>$prop_img,
            'prop_uni_id'=> $uni_id
        );

        $result = $this->dbcommon->add_prop($data);
        if($result):
            $message['user_id'] = $this->input->post('user_id');
            $message['success1'] = 'Property added successfully';
            $message['content'] = "admin/proper-post";
            $this->load->view('admin/layout/layout', $message);
        else:
            $message['user_id'] = $this->input->post('user_id');
            $message['error3'] = 'something bad happened Please try again';
            $message['content'] = "admin/proper-post";
            $this->load->view('admin/layout/layout', $message);
        endif;
        //redirect(base_url()."index.php/admin/home");
        a:
    }


    public function prop_img_upload(){

        $config3['upload_path'] = './public/uploads/propimg';
        $config3['allowed_types'] = 'gif|jpg|png';
        $config3['encrypt_name'] = TRUE;
        $this->load->library('upload', $config3);
        $this->upload->initialize($config3);
        if ($_FILES['prop_img']):
            $images= $this->_upload_files('prop_img');
            foreach($images as $i):
               $data[] = $i['file_name'];
                //echo '</br>';
            endforeach;
        else:
            $data[] = 'no_image.png';
        endif;

        return implode(",",$data);
    }

    private function _upload_files($field='userfile'){
        $files = array();
        foreach( $_FILES[$field] as $key => $all )
            foreach( $all as $i => $val )
                $files[$i][$key] = $val;

        $files_uploaded = array();
        for ($i=0; $i < count($files); $i++) {
            $_FILES[$field] = $files[$i];
            if ($this->upload->do_upload($field))
                $files_uploaded[$i] = $this->upload->data($files);
            else
                $files_uploaded[$i] = null;
        }
        return $files_uploaded;
    }


    function remove_prop_img()
    {
        if(isset($_POST['image'])):
          $prop_img = $this->input->post('image');
           exec('rm -rf ./public/uploads/propimg/'.$prop_img);

        $row = $this->common->propertydetails(100);
        $data2 = explode(',',$row->prop_img);

        if(($key = array_search($prop_img, $data2)) !== false) {
            unset($data2[$key]);
        }

        $new_data = implode(',',$data2);

            $data1=array(
                'prop_img'=>$new_data
            );


           $result =  $this->common->update_img($row->prop_id,$data1);
            $data           = array();      // array to pass back data
            if($result){
                $data['success'] = true;
                $data['message'] = 'Image Deleted successfully';
            }else{
                $data['success'] = false;
                $data['message']  = 'sometthing Bad happened please try again';
            }

        else:
            $data['success'] = false;
            $data['message']  = 'sometthing Bad happened please try again';

        endif;

        echo json_encode($data);

    }

    function edit_pro()
    {
        $amenity=",";
        $amenity_check=$this->input->post("amenity");
        foreach($amenity_check as $checkbox) {
            $amenity.=$checkbox.",";
        }

        if($_FILES["upload_floor"]["name"] != ""):
            $filename=uniqid();
            $path_info = pathinfo($_FILES["upload_floor"]["name"]);
            $fileExtension = $path_info['extension'];

            $config['upload_path'] = './public/uploads/floorplan';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $filename.".".$fileExtension;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('upload_floor')):

                //$message['id'] = $id;
                $message['user_id'] = $this->input->post('user_id');
                $message['error1'] = $this->upload->display_errors();
                $message['content'] = "admin/proper-post";
                $this->load->view('admin/layout/layout', $message);
                goto a;
            else:
                $floorplan=$filename.".".$fileExtension;
            endif;
        else:
            $floorplan= 'no_image.png';
        endif;

        if($_FILES["upload_epc"]["name"] != ""):
            $filename2=uniqid();

            $path_info2 = pathinfo($_FILES["upload_epc"]["name"]);
            $fileExtension2 = $path_info2['extension'];

            $config2['upload_path'] = './public/uploads/epc';
            $config2['allowed_types'] = 'gif|jpg|png';
            $config2['file_name'] = $filename2.".".$fileExtension2;

            $this->upload->initialize($config2);
            if (!$this->upload->do_upload('upload_epc')):
                //$message['id'] = $id;
                $message['user_id'] = $this->input->post('user_id');
                $message['error2'] = $this->upload->display_errors();
                $message['content'] = "admin/proper-post";
                $this->load->view('admin/layout/layout', $message);
                goto a;
            else:
                $epc=$filename2.".".$fileExtension2;
            endif;

        else:
            $epc='no_image.png';
        endif;

        $prop_img = $this->prop_img_upload();

        $length = 10;
        $alphabets = range('A','Z');
        $numbers = range('0','9');
        $additional_characters = array('_','-');
        $final_array = array_merge($alphabets,$numbers,$additional_characters);

        $password = '';

        while($length--) {
            $key = array_rand($final_array);
            $password .= $final_array[$key];
        }
        $uni_id = $password.$this->input->post('user_id');
        $data=array(
            'user_id'=>$this->input->post('user_id'),
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
            'package_id'=>$this->common->getpackbyid($this->input->post('user_id'))->package_id,
            'floorplan'=>$floorplan,
            'epc'=>$epc,
            'prop_img'=>$prop_img,
            'prop_uni_id'=> $uni_id
        );

        $result = $this->dbcommon->add_prop($data);
        if($result):
            $message['user_id'] = $this->input->post('user_id');
            $message['success1'] = 'Property added successfully';
            $message['content'] = "admin/proper-post";
            $this->load->view('admin/layout/layout', $message);
        else:
            $message['user_id'] = $this->input->post('user_id');
            $message['error3'] = 'something bad happened Please try again';
            $message['content'] = "admin/proper-post";
            $this->load->view('admin/layout/layout', $message);
        endif;

    }

}