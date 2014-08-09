<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('chat_model');
    }

    public function index()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data = array(
                'messages' => $this->chat_model->get_all(),
                'username' => $session_data['username'],
                'user_id' => $session_data['id']
            );
            $this->load->view('view_chat', $data);
        }
        else
        {
            redirect('user', 'refresh');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
//        session_destroy();
        redirect('user', 'refresh');
    }

    public function add_new_message(){
        $data = $this->chat_model->add_new_message($_POST['new_message']);
        echo json_encode($data);
    }

    public function get_username(){
        $session_data = $this->session->userdata('logged_in');
        echo json_encode($session_data);
    }
}
