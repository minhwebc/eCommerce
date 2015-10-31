<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('product');
        $this->load->library('pagination');
        $this->load->model('order');
        $this->load->helper(array('form', 'url'));
        
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
    
    
    public function products() {
        $config = array();
        $config['base_url'] = ('/dashboard/products');
        $config['total_rows'] = $this->product->count_all_products();
        $config['per_page'] = 5;
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

        $data['results'] = $this->product->get_all_products_by_limit($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        $this->load->view('products', $data);
	}
    

    //load create view page
    public function create(){
        $cat_results=$this->product->get_categories();
        $this->load->view('create', array(
            'cat_results'=> $cat_results));
    }
    
 
    public function edit($id){
        $product = $this->product->get_one($id);
        $cat_results=$this->product->get_categories();
        $this->load->view("edit", array(
                "product" => $product,
                "cat_results" =>$cat_results
        ));
    }

    //update item
    public function update_product(){
        $this->product->update_product($this->input->post());
        redirect("/dashboard/products");
    }

    //delete item from database
    public function delete($id){
        $this->product->delete($id);
        redirect("/dashboard/products");
    }

    public function update_search() {
        if (!$this->input->post('search') || 
            $this->input->post('search') == 'show_all') {
            redirect('/dashboard/orders/all');
        } else if ($this->input->post('search') == 'shipped') {
            redirect('/dashboard/orders/shipped');
        } else if ($this->input->post('search') == 'cancelled') {
            redirect('/dashboard/orders/cancelled');
        } else {
            redirect('/dashboard/orders/process');
        }
    }

    public function upload(){
        $this->load->view('create', array('error' => ' ' ));
    }

    //add image when creating a new item
     public function create_product(){ 
        $config['upload_path']          = './assets/images';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->upload->initialize($config);
        if(! $this->upload->do_upload('userfile')){
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
            die();
            $this->load->view('create', $error);        
        }else{
            $data = array('upload_data' => $this->upload->data());
            $file_path = "assets/images/".$data["upload_data"]["file_name"];
             // echo $file_path;

            $id = $this->product->create($this->input->post());
            $this->product->add_category($this->input->post(), $id);    
            $this->product->add_image($data["upload_data"]["file_name"], $id);   
        // var_dump($this->input->post());
        // die();

        redirect("/dashboard/products");
        }
    }

    public function orders($type) {
        $config = array();
        $config['base_url'] = ('/dashboard/orders/' . $type);
        $config['total_rows'] = $this->order->count_orders($type);
        $config['per_page'] = 10;
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
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['results'] = $this->order->get_orders_by_limit($config['per_page'], $page, $type);
        $data['links'] = $this->pagination->create_links();
        $data['status'] = $type;
        $this->load->view('orders', $data);
    }

}

?>
