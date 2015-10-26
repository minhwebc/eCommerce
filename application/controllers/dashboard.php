<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('user');
        $this->output->enable_profiler();
        
        if (!$this->session->userdata('admin')) {
            redirect('/');
        }
    } 
    
	public function index() {
        $users = $this->user->get_all_users();
        $this->load->view('dashboard', array('users' => $users));
	}
    
    public function users() {
        $users = $this->user->get_all_users();
        $this->load->view('users', array('users' => $users));
	}
    
    	public function orders() {
        $users = $this->user->get_all_orders();
        $this->load->view('orders', array('orders' => $users));
	}
    
    	public function products() {
        $users = $this->user->get_all_products();
        $this->load->view('products', array('products' => $users));
	}
}

?>
