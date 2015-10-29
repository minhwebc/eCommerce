<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload extends CI_Model {
public function __construct()
{
parent::__construct();
}
function add_image($data)
{

$this->db->set('source', $data);
$this->db->insert('ecommerce1');
}

}