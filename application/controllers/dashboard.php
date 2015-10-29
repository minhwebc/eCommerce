<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->output->enable_profiler();
        $this->load->model('product');
        $this->load->library('pagination');

        
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
        $config = array();
        $config['base_url'] = ('/dashboard/products');
        $config['total_rows'] = $this->product->count_products();
        $config['per_page'] = 4;
        $config['attributes'] = array('class' => 'inactive');
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_link'] = '&laquo;';
        $config['last_tag_open'] ='<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_tag_open'] ='<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] ='<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['uri_segment'] = 3;
        
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['results'] = $this->product->get_products_by_limit($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        
        $this->load->view('products', $data);
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
    
    public function update_search(){
        $this->load->model('order');
        if($this->input->post('search') == 'show_all'){
            redirect('/dashboard/orders');
        } else if($this->input->post('search') == 'shipped') {
            $orders = $this->order->update_search('shipped');
            $this->load->view('orders', array('orders' => $orders));
        } else {
            $orders = $this->order->update_search('process');
            $this->load->view('orders', array('orders' => $orders));
        }
    }
}

?>
