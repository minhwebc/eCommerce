<?php

class order extends CI_model {
    
    function get_all_orders() {
        $query = "select * from orders"; 
        return $this->db->query($query)->result_array();
    }
    
}

?>