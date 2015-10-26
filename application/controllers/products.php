<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class products extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('product');
    } 
    
	public function index() {
        $products = $this->product->get_all();
        $this->load->view('index', array("products"=>$products));
	}

    public function show($id){
        $product = $this->product->get_product_by_id($id);
        $this->load->view('product', array('product'=>$product));
    }

    public function category($category_id, $page_numer){
        $products = $this->product->get_all();
    }

    public function update_cart(){

    }  
    
}

?>