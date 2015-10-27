<?php

class order extends CI_model {
    
    function get_all_orders() {
        $query = "SELECT * from orders where orders.user_id = ?";
        $value = $this->session->userdata('user_id'); 
    	return $this->db->query($query, $values)->result_array();
    }

    function insert_order($info) {

    	//insert shippping address
    	$query = "INSERT INTO addresses (first_name, last_name, address, address_2, city, state, zipcode, created_at, updated_at)
    				values(?,?,?,?,?,NOW(),NOW())";
    	$values = array($info['ship_first_name]', $info['ship_last_name'], $info['ship_address'], $info['ship_address2'], $info['ship_city']
    					, $info['ship_state'], $info['ship_zipcode']);
    	$this->db->query($query, $values);
    	$ship_id = $this->db->insert_id();//ship id to be inserted into order table
    	$query = "INSERT INTO shipping_address(user_id, shipping_id) values (?,?)";
    	$values = array($this->session->userdata('user_id'), $ship_id);
    	$this->db->query($query, $values);

    	//insert billing address
		$query = "INSERT INTO addresses (first_name, last_name, address, address_2, city, state, zipcode, created_at, updated_at)
				values(?,?,?,?,?,NOW(),NOW())";
		$values = array($info['ship_first_name]', $info['ship_last_name'], $info['bill_address'], $info['bill_address2'], $info['bill_city']
					, $info['bill_state'], $info['bill_zipcode']);
		$this->db->query($query, $values);
		$bill_id = $this->db->insert_id();
		$query = "INSERT INTO billing_address(user_id, shipping_id) values (?,?)";
		$values = array($this->session->userdata('user_id'), $ship_id);
		$this->db->query($query, $values);

		//insert card into cards table
    	$query = "INSERT INTO cards(card_num, security_code, expiration_date, created_at, updated_at)
    				values(?,?,?,NOW(), NOW())";
    	$values = array($info['card_num'], $info['security_code'], $info['expiration_date']);
    	$this->db->query($query, $values);

    	//insert order into orders table
    	$query = "INSERT INTO orders (status, created_at, updated_at, shipping_id, billing_id, user_id)
    				values(?,NOW(),NOW(),?,?,?)";
    	$values = array('order in process', $ship_id, $bill_id, $this->session->userdata('user_id'));
    	$this->db->query($query, $values);
    	$order_id = $this->db->insert_id();

    	$products = $this->session->userdata('products')
    	foreach($prodcuts as $product)
    	{
    		for($i = 0; $i < $product['quantity']; $i++)//for loop to insert how ever many products into the product_orders 
    		{
    			$this->insert_product($order_id, $product['id']);//insert into the product_orders table
    		}
    	}
    }

    public function insert_product($order_id, $product_id)
    {
    	$query = "INSERT INTO products_orders(product_id, order_id, created_at, updated_at)
    				values(?,?, NOW(), NOW())";
    	$values = array($order_id, $product_id);
    	return $this->db->query($query, $values);
    }
}

?>