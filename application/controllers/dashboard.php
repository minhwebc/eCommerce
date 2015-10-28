<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->output->enable_profiler();
        $this->load->model('product');
        
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
    

    public function create(){
        $this->load->view("create");
    }
    
    public function create_product(){
        $this->product->create($this->input->post());   
        redirect("/dashboard/products/");
    }

    public function edit($id){
        $product = $this->product->get_one($id);
        $this->load->view("edit", array(
                "product" => $product
        ));
    }

    public function update_product(){
        $this->product->update_product($this->input->post());
        redirect("/dashboard/products");
    }

    public function delete($id){
        $this->product->delete($id);
        redirect("/dashboard/products");
    }
}

?>
