<?php

class User_model extends CI_Model {
    function __construct() {        
        parent::__construct();
    }
    function check_login()
    {
         $query = $this->db->query("SELECT id FROM user WHERE username = '{$_POST['uname']}' AND password = '{$_POST['pass']}' LIMIT 1");
         if ($status = $query->result()) 
         {
            return $status[0]->id;
         } 
         else 
         {
             return 0;
         }
    }
    
    function check_username()
    {
         $query = $this->db->query("SELECT id FROM user WHERE username = '{$_POST['uname']}' LIMIT 1");
         if ($status = $query->result()) 
         {
            return $status[0]->id;
         } 
         else 
         {
             return 0;
         }
    }
    
    function add_user()
    {
        $query = $this->db->query("SELECT id FROM user WHERE username = '{$_POST['uname']}' AND password = '{$_POST['pass']}' LIMIT 1");
        if (!$status = $query->result()) 
        {
            $data = array('username' => $_POST['uname'], 'password' => $_POST['pass']);
            $str = $this->db->insert_string('user', $data); 
            $response = $this->db->query($str);
            if ($response) {
                return TRUE;
            }
        }
        else 
        {
            return FALSE;
        }
    }
    
    function get_all_users()
    {

        //$object = $this->db->query('SELECT id,username,password FROM user');
        //$object = $this->db->get('user');
        
        $this->db->select('id, username, password');

        $object = $this->db->get('user');

        return $object->result();
    }
    
    function ajax_check_login_model()
    {
        $object = $this->db->get_where('user', array('username' => $_POST['username'], 'password' => $_POST['password']), 1);
        //$object = $this->db->query("SELECT id FROM user WHERE username = '{$this->input->post('username')}' AND password = '{$this->input->post('password')}' LIMIT 1");
        if ($status = $object->result()) 
        {
            return $status[0]->id;
        } 
        else 
        {
            return 0;
        }
    }
    
    function get_user_name($user_id)
    {   
        $query = $this->db->query("SELECT username FROM user WHERE id = '$user_id' LIMIT 1");
        if ($object = $query->result()) {
            return $object[0]->username;
        }
    }
    
}
