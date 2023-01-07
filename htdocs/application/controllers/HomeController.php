<?php

    class HomeController extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->library(array('form_validation', 'ion_auth'));
            $this->load->helper(array('url', 'html'));
            
            if(!$this->ion_auth->logged_in() AND !$this->ion_auth->in_group(2))
            {
                redirect('/', 'refresh');
            }
        }
        
        public function index()
        {
            $user = $this->ion_auth->user()->row();
            
            $data['fullname'] = $user->first_name .' '. $user->last_name;
            

            $this->db->select('id, name1, name2, photo');
            $data['candidates'] = $this->db->get('candidates');
            
            $this->load->view('home/index', $data);
        }
        
        public function vote($id)
        {
            $user = $this->ion_auth->user()->row();
            
            $data = array(
                'user_id' => $user->id,
                'candidate_id' => $id
            );
            

            $this->db->trans_begin();

            $this->db->insert('votes', $data);

            if ($this->db->trans_status() === FALSE)
            {
                    $this->db->trans_rollback();
                    redirect('home/try_again');
            }
            else
            {
                    $this->db->trans_commit();
                    $this->ion_auth->logout();
                    redirect('info', 'refresh');
            }
            
        }

        public function error()
        {
            $user = $this->ion_auth->user()->row();
            
            $data['fullname'] = $user->first_name .' '. $user->last_name;
            

            $this->db->select('id, name1, name2, photo');
            $data['candidates'] = $this->db->get('candidates');
            
            $this->load->view('home/error', $data);
        }

    }