<?php

class order extends CI_model {
    
    function get_all_orders() {
        $query = "SELECT * from orders where orders.user_id = ?";
        $value = $this->session->userdata('user_id'); 
    	return $this->db->query($query, $values)->result_array();
    }

    function insert_order($info) {
    	if($info)
    	$query = "INSERT INTO orders (status, created_at, updated_at)"
    }
}

?>