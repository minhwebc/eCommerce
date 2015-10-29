<?php

class product extends CI_model {
    
    
    function count_products($type) {
        if ($type == 'seasonal') {
            $s = $this->db->query("select count(products.id) as num
                        from products 
                        join categorization on categorization.product_id = products.id
                        join categories on categorization.category_id = categories.id
                        where categories.name = 'Seasonal'")->row_array();
            return intval($s['num']);
        } else if ($type == 'food') {
            $s = $this->db->query("select count(products.id) as num
                        from products 
                        join categorization on categorization.product_id = products.id
                        join categories on categorization.category_id = categories.id
                        where categories.name = 'Food'")->row_array();
            return intval($s['num']);
        } else if ($type == 'reminders') {
            $s = $this->db->query("select count(products.id) as num
                        from products 
                        join categorization on categorization.product_id = products.id
                        join categories on categorization.category_id = categories.id
                        where categories.name = 'Reminders'")->row_array();
            return intval($s['num']);
        } else if ($type == 'other') {
            $s = $this->db->query("select count(products.id) as num
                        from products 
                        join categorization on categorization.product_id = products.id
                        join categories on categorization.category_id = categories.id
                        where categories.name = 'Other'")->row_array();
            return intval($s['num']);
        } else {
            return $this->db->count_all('products');
        }
    } 
    
    function count_all_products() {
        return $this->db->count_all('products');
    } 
    
    function get_all_products() {
        $query = "select * from products join images on images.product_id = products.id"; 
        return $this->db->query($query)->result_array();
    }
    
    function get_recent_products() {
        $query = "select * from products join images on images.product_id = products.id limit 3"; 
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

    function get_categories(){
        $query = "SELECT id, name FROM categories";
        return $this->db->query($query)->result_array();
    }

    public function update_count($product_id, $sold, $count)
    {
        $data = array('quantity_sold'=>$sold, 'inventory_count'=>$count);
        $this->db->where('id',$product_id);
        $this->db->update('products',$data);
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

    function get_products_by_limit($limit, $start, $type){
        $this->db->limit($limit, $start);
        $this->db->from('products');
        $this->db->join('images', 'images.product_id = products.id');
        $this->db->join('categorization', 'categorization.product_id = products.id');
        $this->db->join('categories', 'categorization.category_id = categories.id');
        if ($type != 'all'){
            $this->db->where('categories.name', $type);
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
    
    function get_all_products_by_limit($limit, $start){
        $this->db->limit($limit, $start);
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
         // var_dump($post);
         // die();
        $query = "INSERT INTO products (name, price, description, inventory_count, created_at, updated_at) VALUES (?,?,?,?, NOW(),NOW())";
        $values = array($post["name"], $post["price"], $post["description"], $post["inventory_count"]);
        $this->db->query($query,$values);
        return $this->db->query("select MAX(id) AS id FROM products")->row_array(); 
    }

    
    //add category to item
    public function add_category($post, $product_id){
        // var_dump($post);
        //  die();
        if ($this->input->post('category_new') == null) {
            $query ="SELECT id FROM categories WHERE name = {$post['category']}";
            $id=$this->db->query($query, $id)->row_array();
        } else {
            $query = "INSERT INTO categories (name, created_at, updated_at) VALUES (?, NOW(), NOW())";           
            $values = array($post["category_new"]);
            $this->db->query($query,$values);
            $id = $this->db->insert_id();

        }

        $query = "INSERT into categorization (category_id, product_id, created_at, updated_at) VALUES (?,?, NOW(), NOW())";
        $values =array($id, $product_id);
        
        return $this->db->query($query, $values);
    }
    
    public function add_image($source, $id){
        $query = "INSERT INTO images (source, product_id, created_at, updated_at) VALUES (?,?,NOW(),NOW())";
        $values = array($source, $id);
        return $this->db->query($query, $values);
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