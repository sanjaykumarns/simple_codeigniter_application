<?php
Class Logins extends CI_Controller {
    
    public function index()
    {
      $this->load->view('header', array('page'=>'login'));  
      $data = array('title' => 'Login');
      $this->load->view('display_login', $data);
    }
    
    function ajax_check_login()
    {
        $this->load->model('user_model');
        $user_id = $this->user_model->ajax_check_login_model();
        if ($user_id) 
        {
            $this->create_session($user_id);
            echo 1; // valid
        } else {
            echo -1;    //invalid
        }  
    }
    
    public function create_session($user_id)
    {
        $this->load->library('session');
        if($this->session) {
            $user_name = $this->user_model->get_user_name($user_id);
            $this->session->set_userdata(array(
                    'user_id'    => $user_id,
                    'user_name'  => $user_name
                ));
        }
    }
        
    public function home()
    {
        $this->load->view('header', array('page'=>'home'));  
        $data = array(
               'title' => 'Login');
        $this->load->view('home', $data);
    }
    
    public function signout()
    {
        $this->session->sess_destroy();
        $this->load->view('header', array('page'=>'login'));  
        $data = array(
               'title' => 'Login');
        $this->load->view('display_login', $data);
    }
    
    public function signup()
    {
        $this->load->view('header', array('page'=>'signup'));
        $data = array('title' => 'Signup');
        $this->load->view('signup', $data);
    }
    
     public function insert_user()
    {
        $this->load->helper(array('form', 'url'));
		$this->load->library('form_validation'); 
        $this->form_validation->set_rules('uname', 'Username', 'required|callback_check_username');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
		{
            $this->load->view('header', array('page'=>'signup'));
			$this->load->view('signup');
		}
		else
		{
            $this->load->model('user_model');
            $status = $this->user_model->add_user();
			$this->view_all();
		}
        /*$data = array(
               'title' => 'Signup',
                'dupUname'=>'',
                'errUname' => '',
                'errPass' => ''
                );
        $errFlag = 0;
        if (!($_POST['uname'])) {
            $errFlag = 1;
            $data['errUname'] = 'Enter Username';
        } else {
            $this->load->model('user_model');
            if ($userNameExists = $this->user_model->check_username()) {
                $errFlag = 1;
                $data['dupUname'] = 'Username already exists, Change Username';
            }
            
        }
        if (!$_POST['pass']) {
            $errFlag = 1;
            $data['errPass'] = 'Enter Password';
        }  
        
        if (!$errFlag) {
            $this->load->model('user_model');
            $status = $this->user_model->add_user();
            if ($status) 
            {
                $this->view_all();
            }
        } else {
            $this->load->view('header', array('page'=>'signup'));
        }
        $this->load->view('signup', $data);*/
    }
    
    public function check_username()
    {
        $this->load->model('user_model');
        if ($this->user_model->check_username()) {
            $this->form_validation->set_message('check_username', 'Username already exists, Change it');
            return FALSE;
        }
    }
    
    public function view_all($user_id)
    {
        $this->load->view('header', array('page'=>'view'));
        $this->load->model('user_model');
        $users = $this->user_model->get_all_users();
        $json_users = json_decode(json_encode($users), TRUE);
        $data = array(
                    'json_users' => $json_users,
                    'logged_in_user_id' => $user_id
                );
        $this->load->view('view_all_users',$data); 
    }
    
    public function header()
    {
        
    }
}