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

    public function pay()
    {
        $this->order->insert_order($this->input->post());
        redirect('/orders');
    }
}

?>