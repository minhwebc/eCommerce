<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class Orders extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product');
        $this->load->model('order');
    }
    
    public function index()
    {
        $this->load->view('summary');
    }

    public function pay($total)
    {
        $info = $this->order->insert_order($this->input->post(), $total);
        $order_date = $this->order->get_date($info['order_id']);
        $products = $info['products'];
        $items = array();
        foreach($products as $product){
            $item = $this->product->get_product_by_id($product['id']);
            $amount = array('amount' => $product['amount']);
            array_push($item, $amount);
            array_push($items, $item);
        }
        $this->session->sess_destroy();
        $this->load->view('receipt', array('products' => $items, 'order_date'=>$order_date, 'total' => $total));
    }
    
    public function show($id){
        $info = $this->order->get_order_by_id($id);
        $this->load->view('show_order', $info);
    }
    
    public function update_status(){
        $this->order->update_status_order($this->input->post());
        redirect('/dashboard/orders/' . ($this->input->post('status')));
    }
}

?>