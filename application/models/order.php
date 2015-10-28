<?php

class order extends CI_model {
    
    function get_all_orders() {
        $query = "SELECT * from orders where orders.user_id = ?";
        $value = $this->session->userdata('user_id'); 
    	return $this->db->query($query, $values)->result_array();
    }

    function insert_order($info, $total) {

    	$bill_id;
    	if($this->session->userdata('user_id') == null){
    		$user_id = 0;
    	}
		$user_id = 1; //$this->session->userdata('user_id'), changes this back when you have a user_id
    	//insert shippping address
    	$query = "INSERT INTO addresses (first_name, last_name, address, address_2, city, state, zipcode, created_at, updated_at)
    				values(?,?,?,?,?,?,?,NOW(),NOW())";
    	$values = array($info['ship_first_name'], $info['ship_last_name'], $info['ship_address'], $info['ship_address2'], $info['ship_city']
    					, $info['ship_state'], $info['ship_zipcode']);
    	$this->db->query($query, $values);
    	$ship_id = $this->db->insert_id();//ship id to be inserted into order table
    	$query = "INSERT INTO shipping_addresses(user_id, shipping_id) values (?,?)";
    	$values = array($user_id, $ship_id);
    	$this->db->query($query, $values);


    	//insert billing address
    	if($info['ship_address'] == $info['bill_address'])//check if the two addresses are the same or not
    	{
    		$bill_id = $ship_id;
    		$query = "INSERT INTO billing_addresses(user_id, billing_id) values (?,?)";
			$values = array($user_id, $ship_id);
			$this->db->query($query, $values);

    	}else{

			$query = "INSERT INTO addresses (first_name, last_name, address, address_2, city, state, zipcode, created_at, updated_at)
					values(?,?,?,?,?,NOW(),NOW())";
			$values = array($info['bill_first_name'], $info['bill_last_name'], $info['bill_address'], $info['bill_address2'], $info['bill_city']
						, $info['bill_state'], $info['bill_zipcode']);
			$this->db->query($query, $values);
			$bill_id = $this->db->insert_id();
			$query = "INSERT INTO billing_addresses(user_id, billing_id) values (?,?)";
			$values = array($user_id, $ship_id);
			$this->db->query($query, $values);

		}

		//insert card into cards table
    	$query = "INSERT INTO cards(card_num, security_code, expiration_date, created_at, updated_at, user_id)
    				values(?,?,?,NOW(), NOW(),?)";
    	$expiration_date = $info['expiry_month']."/".$info['expiry_year'];
    	$values = array($info['card_num'], $info['security_code'], $expiration_date, $user_id);
    	$this->db->query($query, $values);


    	//insert order into orders table
    	$query = "INSERT INTO orders (status, total, created_at, updated_at, shipping_id, billing_id, user_id)
    				values(?,?,NOW(),NOW(),?,?,?)";
    	$values = array('order in process',$total, $ship_id, $bill_id, $user_id);
    	$this->db->query($query, $values);
    	$order_id = $this->db->insert_id();


    	$products = $this->session->userdata('products');
    	foreach($products as $product)
    	{
    		$this->insert_product($order_id, $product['id'], $product['amount']);//insert into the product_orders table
    	}
        return array('products' => $products, 'order_id' => $order_id);
    }

    public function insert_product($order_id, $product_id, $quantity)
    {
    	$query = "INSERT INTO product_orders(product_id, order_id, quantity, created_at, updated_at)
    				values(?,?,?, NOW(), NOW())";
    	$values = array($product_id, $order_id,$quantity);
    	return $this->db->query($query, $values);
    }

    public function get_date($order_id)
    {
        $query="SELECT orders.created_at from orders where orders.id = ?";
        $values = array($order_id);
        return $this->db->query($query, $values)->row_array();
    }
}

?>