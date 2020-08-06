<?php
Class Logina extends CI_Controller{
    
     function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }
    
    function index(){
                $this->load->helper(array('captcha','url'));
        if ($this->input->post() && ($this->input->post('secutity_code') == $this->session->userdata('mycaptcha'))) {
            $this->load->view('welcome');
        }
        else
        {
            // load codeigniter captcha helper
            $this->load->helper('captcha');
 
            $vals = array(
                'img_path'   => './captcha/',
                'img_url'    => base_url().'captcha/',
                'img_width'  => '200',
                'img_height' => 30,
                'border' => 0, 
                'expiration' => 7200
            );
 
            // create captcha image
            $cap = create_captcha($vals);
 
            // store image html code in a variable
            $data['image'] = $cap['image'];
 
            // store the captcha word in a session
            $this->session->set_userdata('mycaptcha', $cap['word']);
 
            $this->load->view('auth/login', $data);
    }
}
    
    function cheklogin(){
        $username      = $this->input->post('username');
        //$password   = $this->input->post('password');
        $password = $this->input->post('password',TRUE);
        $hashPass = password_hash($password,PASSWORD_DEFAULT);
        $test     = password_verify($password, $hashPass);
        // query chek users
        $this->db->where('username',$username);
        //$this->db->where('password',  $test);
        $users       = $this->db->get('admin');
        if($users->num_rows()>0){
            $user = $users->row_array();
            if(password_verify($password,$user['password'])&&$this->input->post() && ($this->input->post('secutity_code') == $this->session->userdata('mycaptcha'))){
                // retrive user data to session
                $this->session->set_userdata($user);
                $this->session->set_userdata('mycaptcha', $cap['word']);
                json_encode($users);
                redirect('welcome');
            }else{
                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('status_login','username atau password yang anda input salah');
            redirect('auth');
        }
    }
    // public function login_api_ci(){
    //     $username =   $this->input->get('username');
    //     $pass =    $this->input->get('password');
    //     $query = $this->Admin_model->login_api($username,$pass);
    //     echo json_encode($query);
    // }
    
    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
        redirect('auth');
    }
}
