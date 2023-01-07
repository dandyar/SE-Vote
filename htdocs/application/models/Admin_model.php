<?php

    class Admin_model extends CI_Model
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function select_member($id)
        {
            $this->db->from('users');
            $this->db->where('id', $id);

            $query = $this->db->get();

            return $query->row();
        }

        public function updated_users()
        {
          $this->db->select('
            updated_by,
            updated_on,
            CONCAT("Telah melakukan update data pada peserta dengan ID ") as description,
            id
          ');
          $this->db->from('members');
          $array = array('updated_on !=' => '', 'updated_by !=' => '');
          $this->db->where($array);
          $query = $this->db->get();

          return $query->result();
        }



    }
