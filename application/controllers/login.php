<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
	}
	
	function index()
	{
		$data['msg'] = "";
        $data['create_msg'] = "";
		$data['content'] = "login";
		$this->load->view('layout/layout', $data);
	}
	
	function login() {

		$login=$this->dbcommon->getdetails($this->input->post('email'), $this->input->post('password'));
		if($login) {
			if($login->status == 1) {
				$this->session->set_userdata('login', $this->input->post('email'));
				$this->session->set_userdata('user_id', $login->user_id);
				$this->session->set_userdata('user_name', $login->name);
				$user = $login->user_id;
			
				//echo '<script>window.location="";</script>';
                $data['create_msg'] = "";
                $data['msg'] = "login succeefully";
                $data['content'] = 'login';
                $data['title'] = "Login";
                $this->load->view('layout/layout',$data);
			}
			else {
                $data['create_msg'] = "";
				$data['msg'] = "Your Account is not Verified Please Verify it from Your Email Account";
				$data['content'] = 'login';
				$data['title'] = "Login";
				$this->load->view('layout/layout',$data);
			}
		}
		else {
            $data['create_msg'] = "";
            $data['msg'] = "Username & Password Not Matching";
            $data['content'] = 'login';
            $data['title'] = "Login";
            $this->load->view('layout/layout', $data);
        }
	}
	function register() {

			$varif_reg = random_string('alnum', 25);
			
			$data = array('name'=> $_POST['name'],'city'=> $_POST['city'],'phone'=> $_POST['phone'],'email'=> $_POST['email'],'password'=> md5($_POST['password']),'registration_date'=> date('Y-m-d'),'verify_code'=> $varif_reg);
			
			$result=$this->dbcommon->register_user($data);

            if($result):
                $data['msg'] = "";
                $data['create_msg'] = "Thank You For Registering, Please check your email to verify the Account.";
                $data['title'] = "Login";
                $data['content'] = "login";
                $this->load->view('layout/layout', $data);
            else:
                $data['msg'] = "";
                $data['create_msg'] = "Account not created. something went wrong";
                $data['title'] = "Login";
                $data['content'] = "login";
                $this->load->view('layout/layout', $data);
            endif;

        /*
			$register_new_user = array('subject' => 'Thank you for Registering with Hunt Property','email' => urlencode($_POST['email']),'name' => $_POST['name'],'code' => urlencode($varif_reg));
			
			$parserdata['code'] = $varif_reg;
			$parserdata['name'] = $this->input->post('name');
			$config['mailtype'] = "html";
			$this->email->initialize($config);
			$this->email->from($this->config->item('email_from'), $this->config->item('email_from_name'));
			$this->email->to($_POST['email']); 
			$this->email->subject('Hunt Property Email Verification');
			$this->email->message($this->parser->parse('parser/new_user_parser', $parserdata, TRUE));
			
			$this->email->send();
			
			$data['msg'] = "Thank You For Registering, Please check your email to verify the Account.";
			$data['title'] = "Login";
			$data['content'] = "login";
			$this->load->view('layout/layout', $data);
        */
		//}
	}
	function verify($verify_code) {
		$data = array('status' => "1");
		$this->db->where('verify_code', $verify_code);
		$this->db->update('user', $data);
		$this->session->set_flashdata('notification', 'Your Account is Verified Thanks.');
		
		echo "<script>window.location='".base_url()."login';</script>";
	}
	function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('login');
		
		redirect(base_url()."login");	
	}
	function forgot_pwd() {
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_error_delimiters('', '');
		
		if ($this->form_validation->run() == FALSE) {
			$data['msg'] = "";
			$data['title'] = "Forgot Password";
			$data['content'] = "forgot";
			$this->load->view('layout/layout', $data);
		}
		else {	
		$login=$this->dbcommon->getdet($this->input->post('email_login'));
			if($login) {
						$this->load->library('email');
						
						$config['mailtype'] = "html";
						$this->email->initialize($config);
						
						$to_forgot = $this->input->post('email_login');
						$this->email->from('tp.zaeem92@gmail.com', 'Hunt Property');
						$this->email->to($to_forgot);
						$this->email->subject('Reset Password');
						$this->email->message('Hi, hope you are fine. \n Please follow the Link mentioned below \n '.base_url()."login/resetPwd/".$login->varify_reg);
						$this->email->send();
						$data['msg'] = "";
						$data['title'] = "Login";
						$data['content'] = "login";
						$this->load->view('layout/layout', $data);
				}
				else
				{
					$data['msg'] = "Email ID not registered";
					$data['content'] = 'forgot';
					$data['title'] = "Forgot Password";
					$this->load->view('layout/layout',$data);	
				}
			}
	
	}
}