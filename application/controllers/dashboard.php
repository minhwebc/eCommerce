<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('user');
    } 
    
	public function index() {
        if ($this->session->userdata('admin')) {
            redirect('/dashboard/admin');
        } else {
            $users = $this->user->get_all_users();
            $this->load->view('dashboard', array('users' => $users));
        }
	}
}

?>
