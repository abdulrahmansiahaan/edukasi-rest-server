<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct() {
		parent::__construct();
	}

	public function index() {
        $data['title'] = 'Uji Logika';
		$this->load->view('templates/header', $data);
		$this->load->view('dashboard/dashboard');
		$this->load->view('templates/footer');
	}

}