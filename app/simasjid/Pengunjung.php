<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung extends SIMASJID_Core{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('pengunjung_m');
	}
	
	public function index(){
		$this->data['title'] = 'Dashboard';
		$this->load->view('module_pengunjung/dashboard', $this->data);

	}
}