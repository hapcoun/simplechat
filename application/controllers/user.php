<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model','',TRUE);
    }

    public function index()
    {
            $this->load->helper(array('form'));
            $this->load->view('view_user');
    }

    public function verify(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');

        $username = $this->input->post('username');
        $result = $this->user_model->login($username);

        if($result)
        {
            $session_array = array();
            foreach($result as $row)
            {
                $session_array = array(
                    'id' => $row->id,
                    'username' => $row->username
                );
                $this->session->set_userdata('logged_in', $session_array);
            }
        }
        else
        {
            $this->form_validation->set_message('verify', 'Invalid username or password');
        }

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('view_user');
        }
        else
        {
            redirect('chat', 'refresh');
        }
    }

}

