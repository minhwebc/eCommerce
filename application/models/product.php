<?php

class product extends CI_model {
    
    function get_all_products() {
        $query = "select * from products"; 
        return $this->db->query($query)->result_array();
    }
    
}

?>