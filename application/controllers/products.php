<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class products extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler();
        $this->load->model('product');
    }
    
    public function index() {
        
        if (!($this->session->userdata('cart_amount')) && !($this->session->userdata('products'))) {
            $this->session->userdata('cart_amount', 0);
            $this->session->userdata('products', array()); //set the products to an empty array so later we can push in new array of products as the users
            //orders more
        }
        
        $products = $this->product->get_all_products();
        $this->load->view('index', array(
            "products" => $products
        ));
    }
    
    public function show($id)
    {
        
        $product       = $this->product->get_product_by_id($id);
        $category      = $product['category_id']; //get the category of that product so we can get products with the same category
        $same_products = $this->product->get_similar_product($category, $id); //get those products
        $this->load->view('show', array(
            'product' => $product,
            'similar' => $same_products
        ));
    }
    
    public function category($category_id, $page_numer)
    {
        $start    = 1 + 15 * ($page_numer - 1);
        $products = $this->product->get_products_by_limit($start);
        $this->load->view('page', array('products'=> $products));
    }
    
    public function update_cart()
    {
        $amount      = $this->session->userdata('cart_amount');
        $totalAmount = $amount + $this->input->post('amount'); //add the new amount to the shopping cart
        $this->session->set_userdata('cart_amount', $totalAmount);
        $products = $this->session->userdata('products');
        $existed  = false; //added or not
        foreach ($products as $product) { //traversing through the products array to find if the product being added already exist in the cart
            if ($product['name'] == $this->input->post('name')) { //if it exists, add the new amount to the amount in the array
                $product['amount'] += $this->input->post('amount');
                $newProduct = array(
                    'id'       => $product['id'],
                    'name'     => $product['name'],
                    'price'    => $product['price'],
                    'quantity' => $product['amount']);
                $existed = true;
                break;
            }
        }
        //if it doesnt exist
        //create an array with the infomation of the product we just added to cart
        if ($existed == false) {
            $newProduct = array(
                'id'       => $this->input->post('product_id');
                'name'     => $this->input->post('name'),
                'price'    => $this->input->post('price'),
                'quantity' => $this->input->post('amount')
            );
            array_push($products, $newProduct); //push it into the session cart
            $this->session->set_userdata('products', $products);
        }
        $this->load->view('added_product', $newProduct); //load the views files with the new product array being pushed onto it
    }

    //procceed to checkout method
    public function cart(){
        $this->load->view('checkout');
    }

    public function find(){
        $products = $this->product->find($this->input->post());
        $this->load->view('search_result', array('products'=>$products));
    }
}

?>