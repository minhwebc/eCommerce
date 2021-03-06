<?php

class order extends CI_model {
    
    function count_orders($type) {
        if ($type == 'shipped') {
            $s = $this->db->query("select count(id) as num
                        from orders 
                        where status = 'shipped'")->row_array();
            return intval($s['num']);
        } else if ($type == 'process') {
            $p = $this->db->query("select count(id) as num
                        from orders 
                        where status = 'order in process'")->row_array();
            return intval($p['num']);
        } else if ($type == 'cancelled') {
            $c = $this->db->query("select count(id) as num
                        from orders 
                        where status = 'order in cancelled'")->row_array();
            return intval($c['num']);
        } else {
            return $this->db->count_all('orders');
        }
    }
    
    function get_all_orders() {
        $query = "SELECT orders.id, orders.created_at, orders.total, orders.status, addresses.address, addresses.city, addresses.state, addresses.zipcode, addresses.first_name, addresses.last_name from orders
                    left join addresses
                    on orders.billing_id = addresses.id;";
    	return $this->db->query($query)->result_array();
    }
    function get_order_by_id($id){
        $query = "SELECT orders.id, orders.created_at, orders.total, orders.status, addresses.address, addresses.city, addresses.state, addresses.zipcode, addresses.first_name, addresses.last_name from orders
                    left join addresses
                    on orders.shipping_id = addresses.id
                    where orders.id = ?";
        $values = array($id);
        $shipping = $this->db->query($query, $values)->row_array();
        $query = "SELECT orders.id, orders.created_at, orders.total, orders.status, addresses.address, addresses.city, addresses.state, addresses.zipcode, addresses.first_name, addresses.last_name from orders
                    left join addresses
                    on orders.billing_id = addresses.id
                    where orders.id = ?";
        $values = array($id);
        $billing = $this->db->query($query, $values)->row_array();
        $query = "SELECT * from orders 
                left join product_orders
                on product_orders.order_id = orders.id
                left join products
                on products.id = product_orders.product_id
                where orders.id = ?";
        $values = array($id);
        $products = $this->db->query($query, $values)->result_array();
        return array('ship'=>$shipping, 'bill'=>$billing, 'products'=>$products);   
    }

    function get_orders_by_limit($limit, $start, $status){
        $this->db->limit($limit, $start);
        $this->db->from('orders');
        $this->db->join('users', 'users.id = orders.user_id');
        $this->db->join('addresses', 'billing_id = addresses.id');
        if ($status != 'all') {
            if($status == 'process') { $status = 'order in process'; }
            $this->db->where('status', $status);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[] = $row;   
            }
            return $data;
        }
        
        return false;
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
            $this->load->model('product');
            $item = $this->product->get_product_by_id($product['id']);
            $item['quantity_sold'] = $item['quantity_sold'] + $product['amount'];
            $item['inventory_count'] = $item['inventory_count'] - $product['amount'];
            $this->product->update_count($product['id'], $item['quantity_sold'], $item['inventory_count']);
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

    public function update_status_order($info)
    {
        $data = array('status'=>$info['status']);
        $this->db->where('id',$info['order_id']);
        $this->db->update('orders',$data);
    }

    public function update_search($str)
    {
        if($str == 'shipped'){
            $query = "SELECT orders.id, orders.created_at, orders.total, orders.status, addresses.address, addresses.city, addresses.state, addresses.zipcode, addresses.first_name, addresses.last_name from orders
                    left join addresses
                    on orders.billing_id = addresses.id
                    where orders.status = 'Shipped';";
            return $this->db->query($query)->result_array();
        }else{
            $query = "SELECT orders.id, orders.created_at, orders.total, orders.status, addresses.address, addresses.city, addresses.state, addresses.zipcode, addresses.first_name, addresses.last_name from orders
                    left join addresses
                    on orders.billing_id = addresses.id
                    where orders.status = 'Order in process';";
            return $this->db->query($query)->result_array();
        }
    }
}

?>