<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class products extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->output->enable_profiler();
        $this->load->model('product');
        
        if ($this->session->userdata('cart_amount') == NULL && $this->session->userdata('products') == NULL) {
            $this->session->set_userdata('cart_amount', 0);
            $this->session->set_userdata('products', array()); 
            //set the products to an empty array so later we can push in new array of products as the users
            //orders more
        }
    }
    
    public function index() {
        $products = $this->product->get_all_products();
        $this->load->view('index', array(
            "products" => $products
        ));
    }
    
    public function show($id){
        $product = $this->product->get_product_by_id($id);
        $same_products = $this->product->get_similar_products($id); //get those products
        $this->load->view('show', array(
            'product' => $product,
            'similar' => $same_products
        ));
    }
    
    public function category($category_id, $page_numer) {
        $start = 1 + 15 * ($page_numer - 1);
        $products = $this->product->get_products_by_limit($start);
        $this->load->view('page', array('products'=> $products));
    }
    
    public function update_cart() {
        //updates the amount of items in the cart
        $amount = $this->session->userdata('cart_amount');
        $totalAmount = $amount + $this->input->post('amount');
        $this->session->set_userdata('cart_amount', $totalAmount);
        
        //updates the IDs and quantity of products in the cart
        $products = $this->session->userdata('products');
        $exist  = false; //added or not
        $count = 0;
        
        //traversing through the products array to find if the product being added already exist in the cart
        foreach ($products as $product) {          
            if ($product['id'] == $this->input->post('product_id')) { 
                $product['amount'] += $this->input->post('amount');
                $newProduct = array(
                    'id'       => $product['id'],
                    'amount'   => $product['amount']
                );
                $exist = true;
                $products[$count] = $newProduct;
                $this->session->set_userdata('products', $products);
                redirect('/products/add_to_cart/' . $newProduct['id']);            
            }
            $count++;
        }

        //if it doesnt exist create an array with the infomation of the product we just added to cart
        $newProduct = array(
            'id'       => $this->input->post('product_id'),
            'amount' => $this->input->post('amount')
        );
        
        //push it into the session cart
        array_push($products, $newProduct); 
        $this->session->set_userdata('products', $products);
        redirect('/products/add_to_cart/' . $newProduct['id']);
    }
    
    public function remove_from_cart($id) {
        $amount = $this->session->userdata('cart_amount');
        $products = $this->session->userdata('products');
        $update = array();
        foreach ($products as $product) {
            if ($product['id'] != $id) {
                array_push($update, $product);
            } else {
                $this->session->set_userdata('cart_amount', ($amount - $product['amount']));   
            }
        }
        $this->session->set_userdata('products', $update);
        redirect('/products/cart');
    }

    public function add_to_cart($id) {
        $added = $this->product->get_product_by_id($id);
        $this->session->set_flashdata('newProduct', $added);
        redirect('/products/cart');
    }
    
    public function cart(){
        $products = $this->session->userdata('products');
        $items = array();
        foreach($products as $product){
            $info = $this->product->get_product_by_id($product['id']);
            $item = array('name' => $info['name'],
                        'price' => $info['price'],
                        'amount' => $product['amount'],
                        'id' => $info['id'],
                        'source' => $info['source']);
            array_push($items, $item);
        }
        
        $this->session->keep_flashdata('newProduct'); 
        $this->load->view('cart', array(
            'items' => $items
        )); 
    }
        
    
    //proceed to checkout method
    public function checkout(){
        $products = $this->session->userdata('products');
        $items = array();
        foreach($products as $product){
            $info = $this->product->get_product_by_id($product['id']);
            $item = array('name' => $info['name'],
                        'price' => $info['price'],
                        'amount' => $product['amount']);
            array_push($items, $item);
        }
        $this->load->view('checkout', array('items'=>$items));
    }

    public function find(){
        $products = $this->product->find($this->input->post());
        $this->load->view('search_result', array('products'=>$products));
    }

}

?>