
<?php

class product extends CI_model {
    
    function get_all_products() {
        $query = "select * from products join images on images.product_id = products.id"; 
        return $this->db->query($query)->result_array();
    }
    
    function get_product_by_id($id) {
    	$query = "SELECT * FROM products
                  join images
                  on images.product_id = products.id
    	          left join categorization 
    	          on products.id = categorization.product_id 
    			  where products.id = ?";
    	$values = array($id);
    	return $this->db->query($query, $values)->row_array();
    }

    function get_similar_products($id) {
    	$query="SELECT * from products 
                join categorization 
                on categorization.product_id = products.id 
                join images on images.product_id = products.id
                where categorization.category_id in (
                select categorization.category_id from products 
                join categorization 
                on categorization.product_id = products.id
                join images
                where categorization.product_id = ?) AND products.id != ?
    			limit 4";
    	$values = array($id, $id);
    	return $this->db->query($query, $values)->result_array();
    }

    function get_products_by_limit($start){
    	$query= "SELECT * FROM products limit ?, 15";
    	$values = $start;
    	return $this->db->query($query, $values)->result_array();
    }

    public function get_products_by_id(){

    }

    
 
}

?>