<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class users extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('user');
    } 
    
	public function index() {
        $this->load->view('index');
	}
    
    public function signin() {
        $this->load->view('signin');   
    }
    
    public function signinUser(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
        $user = $this->user->get_user_by_email($this->input->post('email'));

        if (md5($this->input->post('password')) == $user['password'] && $this->form_validation->run() == true){
            $this->session->set_userdata(array('id' => $user['id'], 'admin' => $user['admin']));
            if ($this->session->userdata('admin')){
                    redirect ('/dashboard');
            }
            redirect('/');
        } else {
            $this->session->set_flashdata('errors', 'You entered an invalid email or password'); 
            redirect('signin');
        }
    }
    
    public function register(){
        $this->load->view('register');  
    }
    
    public function registerUser(){        
        $this->load->library("form_validation");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
		$this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required|matches[confirm]|md5");
		$this->form_validation->set_rules("confirm", "Confirm Password", "trim|required|md5");
        
        if($this->form_validation->run() === false){
            $this->session->set_flashdata('errors', validation_errors());
            redirect('register');
        } else {
            if($this->user->add_user($this->input->post())) {
                $user = $this->user->get_user_by_email($this->input->post('email'));
                $this->session->set_userdata(array('id' => $user['id'], 'admin' => $user['admin']));
                if ($this->session->userdata('admin')){
                    redirect ('/dashboard');
                }
                redirect('/');
            }           
        }
    }
    
    public function logoff(){
        $this->session->sess_destroy();
        redirect('/');
    }   
    
}

?>