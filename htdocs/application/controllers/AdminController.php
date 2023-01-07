<?php

    class AdminController extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->library(array('form_validation', 'ion_auth'));
            $this->load->helper(array('url', 'html'));

            if(!$this->ion_auth->logged_in() OR !$this->ion_auth->is_admin())
            {
                redirect('auth/login', 'refresh');
            }
        }

        public function index()
        {
            $this->load->model('admin_model');
            $data['a'] = $this->db->get('votes_view');
            $data['user'] = $this->ion_auth->user()->row();
            $data['members'] = $this->db->count_all('members');
            $data['votes'] = $this->db->count_all('votes');
            $data['admin'] = $this->db->count_all('admin');
            $data['admin_img'] = array(
                "src" => "images/admin/admin.png",
                "alt" => "admin.png",
                "class" => "pull-right",
                "width" => "64"
            );

            $data['notifications'] = $this->admin_model->updated_users();


            $this->load->view('templates/header', $data);
            $this->load->view('admin/dashboard', $data);
            $this->load->view('templates/footer', $data);
        }

        public function kotak_suara()
        {
            $data['user'] = $this->ion_auth->user()->row();

            $this->db->select('id, fullname, class, active');
            $this->db->where('active', 0);
            $data['members'] = $this->db->get('members');

            $this->load->view('templates/header', $data);
            $this->load->view('admin/tbl_vote', $data);
            $this->load->view('templates/footer', $data);
        }

        public function daftar_peserta()
        {
            $query = $this->db->query('SELECT * FROM members');
            $data['user'] = $this->ion_auth->user()->row();

            $data['members'] = $query->result();

            $this->load->view('templates/header', $data);
            $this->load->view('admin/tbl_members', $data);
            $this->load->view('templates/footer', $data);
        }

        public function edit($id)
        {
            $this->load->model('admin_model');
            $data = $this->admin_model->select_member($id);

            echo json_encode($data);
        }

        public function update_user()
        {
            $admin = $this->ion_auth->user()->row();

            $id = $this->input->post('id');
            $data = array(
		'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'username' => $this->input->post('username'),
                'class' => $this->input->post('class'),
                'password' => $this->input->post('password'),
                'updated_on' => time(),
                'updated_by' => $admin->username
            );

            $this->ion_auth->update($id, $data);
            echo json_encode(array("status" => TRUE));
        }

    }
