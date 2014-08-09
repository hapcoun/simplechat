<?php
class Chat_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_all()
    {
        $this->db->select('chat.id, chat.user_id, chat.date, chat.text, user.username');
        $this->db->from('chat');
        $this->db->join('user', 'user.id = chat.user_id');
        $this->db->limit(100);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_new_message($message){
        $session_data = $this->session->userdata('logged_in');
        $data = array(
            'text' => $message,
            'date' => date('Y-m-d H:i:s'),
            'user_id' => $session_data['id']
        );
        $this->db->insert('chat', $data);
        $data['username'] = $session_data['username'];
        return $data;
    }
}