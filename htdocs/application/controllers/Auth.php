<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'html', 'language'));
        
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        
        $this->lang->load('auth');
    }
    
	public function index()
	{
		if(!$this->ion_auth->logged_in())
        {
            redirect('/', 'refresh');
        }
        elseif (!$this->ion_auth->is_admin())
        {
            redirect('home');
        }
        else
        {
            redirect('dashboard');
        }
	}
    
    public function login()
    {
        if($this->ion_auth->logged_in())
        {
            redirect('auth', 'refresh');
        }
        
        $this->form_validation->set_rules('identity', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if($this->form_validation->run() == TRUE)
        {
            $identity = $this->input->post('identity'); 
            $password = $this->input->post('password');
            $remember = FALSE;

            if($this->ion_auth->login($identity, $password, $remember))
            {
                redirect('/', 'refresh');
            }
            else
            {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('/', 'refresh');
            }
        }
        else
        {
            $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['identity'] = array(
                'name' => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('identity'),
                'class' => 'form-control',
                'placeholder' => 'Username',
                'required' => ''
			);
            
			$data['password'] = array(
                'name' => 'password',
				'id'   => 'password',
				'type' => 'password',
                'class' => 'form-control',
                'placeholder' => 'Password',
                'required' => ''
			);

			$this->load->view('auth/login', $data);
        }
    }

    public function thankyou()
    {
        $this->load->view('app/thanks');   
    }
    
    public function logout()
    {
        $this->ion_auth->logout();
        
        redirect('auth/login', 'refresh');
    }
}
