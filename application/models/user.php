<?php

class user extends CI_model {

    function add_user($user) {   
        $query = "insert into users (email, first_name, last_name, password, admin, created_at, updated_at)
                    values (?, ?, ?, ?, ?, NOW(), NOW())";
                    
        $values = array($user['email'], $user['first_name'], $user['last_name'], 
                        $user['password'], $admin);

        return $this->db->query($query, $values);
    }    
    
    function get_user_by_email($email) {
        $query = "select * from users where email = ?";
        $values = array($email);
        
        return $this->db->query($query, $values)->row_array();
    }
    
    function get_user_by_id($id) {
        $query = "select * from users where id = ?";
        $values = array($id);
    
        return $this->db->query($query, $values)->row_array();
    }

}

?>