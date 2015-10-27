
<?php

class product extends CI_model {
    
    function get_all_products() {
        $query = "select * from products join images on images.product_id = products.id"; 
        return $this->db->query($query)->result_array();
    }
    
    function get_product_by_id($id) {
    	$query = "SELECT * FROM products
    	          left join categorization 
    	          on products.id = categorization.product_id 
    			  where products.id = ?";
    	$values = array($id);
    	return $this->db->query($query, $values)->row_array();
    }

    function get_similar_product($category_id) {
    	$query="SELECT * FROM categories
    			left join categorization
    			on categories.id = categorization.category_id
    			left join products
    			on products.id = categorization.product_id
    			where categories.id = ?
    			limit 6";
    	$values = array($category_id);
    	return $this->db->query($query, $values)->result_array();
    }

    function get_products_by_limit($start){
    	$query= "SELECT * FROM products limit ?, 15";
    	$values = $start;
    	return $this->db->query($query, $values)->result_array();
    }
 
}

?>