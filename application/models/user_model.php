<?php
class User_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function login($username)
    {
        $this -> db -> select('id, username');
        $this -> db -> from('user');
        $this -> db -> where('username', $username);
        $this -> db -> limit(1);
        $query = $this -> db -> get();
        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            date_default_timezone_set( 'Europe/Moscow' );
            $data = array(
                'username' => $username ,
                'date' => date('Y-m-d')
            );
            $this->db->insert('user', $data);

            $this -> db -> select('id, username');
            $this -> db -> from('user');
            $this -> db -> where('username', $username);
            $this -> db -> limit(1);
            $query = $this -> db -> get();

            return $query->result();
        }
    }
}