<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->output->enable_profiler();
        
        if (!$this->session->userdata('admin')) {
            redirect('/');
        }
    } 
    
	public function index() {
        $this->load->view('dashboard');
	}
    
    public function users() {
        $this->load->model('user');
        $users = $this->user->get_all_users();
        $this->load->view('users', array('users' => $users));
	}
    
    public function orders() {
        $this->load->model('order');
        $orders = $this->order->get_all_orders();
        $this->load->view('orders', array('orders' => $orders));
	}
    
    public function products() {
        $this->load->model('product');
        $products = $this->product->get_all_products();
        $this->load->view('products', array('products' => $products));
	}
}

?>
