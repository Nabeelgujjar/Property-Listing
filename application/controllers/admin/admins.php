<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
    }

    function index()
    {
        $data['query'] = $this->common->admins();
        $data['content'] = "admin/admins";
        $this->load->view('admin/layout/layout', $data);
    }

    function admins()
    {
        $data['query'] = $this->common->admins();
        $data['content'] = "admin/admins";
        $this->load->view('admin/layout/layout', $data);
    }

    function actadmin($id) {
        $this->common->actadmin($id);
        redirect(base_url()."index.php/admin/admins");
    }
    function deactadmin($id) {
        $this->common->deactadmin($id);
        redirect(base_url()."index.php/admin/admins");
    }


    function delete($id) {
        $this->common->deladmin($id);
        redirect(base_url()."index.php/admin/admins");
    }
    public function edit_admin($id)
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');


        if ($this->form_validation->run() == FALSE)
        {
            $data['id'] = $id;
            $data['content'] = "admin/edit_admin";
            $this->load->view('admin/layout/layout', $data);
        }
        else
        {
            $data = array(
                'admin_name'=>$this->input->post('name'),
                'email'=>$this->input->post('email'),
                'pass'=>$this->input->post('password'),
                'id'=>$this->input->post('id'),
                'status'=>$this->input->post('status'),

            );

            $result = $this->common->update_admin($this->input->post('id'),$data);
            $data = array();      // array to pass back data
            if($result){
                $data['success'] = true;
                $data['message'] = 'Data updated succesfully!';
            }else{
                $data['success'] = false;
                $data['message']  = 'some error occur please try again !!!';
            }
            echo json_encode($data);
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
        //$this->form_validation->set_rules('package', 'Package', 'required');

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
                //'package_id'=>$this->input->post('package'),
                'registration_date'=>date('Y-m-d')
            );

            $result = $this->common->add_user($data);

            $data = array();      // array to pass back data
            if($result){
                $data['success'] = true;
                $data['message'] = 'User added succesfully!';
            }else{
                $data['success'] = false;
                $data['message']  = 'some error occur please try again !!!';
            }
            echo json_encode($data);

        }


    }

    function create_admin()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email ID', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == FALSE)
        {

            $data['content'] = "admin/admin_add";
            $this->load->view('admin/layout/layout', $data);
        }
        else
        {
            $data=array(
                'admin_name'=>$this->input->post('name'),
                'email'=>$this->input->post('email'),
                'pass'=>$this->input->post('password'),
                'status'=>$this->input->post('status'),
            );

            $result = $this->common->add_admin($data);

            $data = array();      // array to pass back data
            if($result){
                $data['success'] = true;
                $data['message'] = 'Admin added succesfully!';
            }else{
                $data['success'] = false;
                $data['message']  = 'some error occur please try again !!!';
            }
            echo json_encode($data);

        }


    }

}