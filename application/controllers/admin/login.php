<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
	}
	
	public function index()
	{
		$data['msg'] = "";
		$data['content'] = "admin/login";
		$this->load->view('admin/login', $data);
	}
    
    public function sign_in()
	{
        if(isset($_POST['userid']) && isset($_POST['password'])):

            $name = $this->input->post('userid');
            $pass = $this->input->post('password');

            $info = $this->common->adminlog($name,$pass);
            $data  = array();
            if($info):
                $newdata = array(
                    'admin_name'=>$info[0]['admin_name'],
                    'date'=>$info[0]['added_date'],
                    'username'  => 'admin',
                    'logged_in' => TRUE
                );
                $data['success'] = true;
                $data['message'] = 'Login successfully !!!';
                $this->session->set_userdata($newdata);
            else:
                $data['success'] = false;
                $data['message']  = 'Something went wrong please try again';
            endif;

            //echo json_encode($data);
            //redirect(base_url()."index.php/admin/home");

        //redirect(base_url()."index.php/admin/login");
        endif;
        echo json_encode($data);
    }
       
    public function sign_out()
	{
	       $newdata = array(
                   'username'  => 'admin',
                   'logged_in' => TRUE
               );

            $this->session->unset_userdata($newdata);
            redirect(base_url()."index.php/admin/login");
	}

    public function testinng()
    {
        $data = $this->common->adminlog('uzair@adminom','admin!admin');
        if($data):
            print_r($data);
        else:
            echo 'nothig found';
        endif;
    }


}