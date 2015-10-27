
<?php

class product extends CI_model {
    
    function get_all_products() {
        $query = "SELECT * from products"; 
        return $this->db->query($query)->result_array();
    }
    
    function get_product_by_id($id) {
    	$query = "SELECT * FROM products
    	          left join catergorization 
    	          on products.id = catergorization.product_id 
    			  where products.id = ?";
    	$values = array($id);
    	return $this->db->query($query, $values)->row_array();
    }

    function get_similar_product($catergory_id) {
    	$query="SELECT * FROM catergories
    			left join catergorization
    			on catergories.id = catergorization.catergory_id
    			left join products
    			on products.id = catergorization.product_id
    			where catergories.id = ?
    			limit 6";
    	$values = array($catergory_id);
    	return $this->db->query($query, $values)->result_array();
    }

    function get_products_by_limit($start){
    	$query= "SELECT * FROM products limit ?, 15";
    	$values = $start;
    	return $this->db->query($query, $values)->result_array();
    }
 
}

?>