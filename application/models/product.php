<?php

class product extends CI_model {
    
    function count_products() {
        return $this->db->count_all('products');
    }
    
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
        $this->db->limit(2, $start);
        $this->db->from('products');
        $this->db->join('images', 'images.product_id = products.id');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[] = $row;   
            }
            return $data;
        }
        
        return false;
    }

  
    //get product information 
    public function get_one($id){
        $query = "SELECT id, name, price, description, inventory_count FROM products WHERE id = ?";
        $values = $id;
        return $this->db->query($query,$values)->row_array();
    }

    // admin create new product
    public function create($post){
        $query = "INSERT INTO products (name, price, description, inventory_count, created_at, updated_at) VALUES (?,?,?,? NOW(),NOW())";
        $values = array($post["name"], $post["price"], $post["description"], $post["inventory"]);
        return $this->db->query($query,$values);
    }

    // admin update or change product details 
    public function update_product($post){
        $query = "UPDATE products 
                  SET name = ?, price = ?, description = ?, inventory_count=?, updated_at = NOW() 
                  WHERE id = ?";
        $values = array($post["name"], $post["price"], $post["description"], $post["inventory"],  $post["id"]);
        $this->db->query($query,$values);
    }

    //admin deletes product
    public function delete($id){
        $query = "DELETE FROM categorization WHERE categorization.product_id = ?";
        $values = $id;
        $this->db->query($query, $values);
        $query = "DELETE FROM images WHERE id = ?";
        $values = $id;
        $this->db->query($query, $values);
        $query = "DELETE FROM products WHERE id = ?";
        $values = $id;
        $this->db->query($query, $values);
    }
 
}

?>