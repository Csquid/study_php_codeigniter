<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PracDB extends CI_Controller {
	public function __construct()
	{
			parent::__construct();
	}

	public function index()
	{
		$this->load->model('/pracDB/model_pracDB');
		$data = $this->model_pracDB->getAllData();

		foreach($data as $entry) {
			var_dump($entry);
		}
		
		$this->load->view('/common/head');
		$this->load->view('/pracDB/db_view');
	}
}
