<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Read extends CI_Controller {
	public $cm_userDataArr = null;
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('/user/model_read');
		$this->load->view('/common/head');
		$this->cm_userDataArr = $this->model_read->getUserDatas();
	}

	public function index()
	{
		$this->load->view('/user/nav', array('users' => $this->cm_userDataArr));
		$this->load->view('/user/table', array('users' => $this->cm_userDataArr));
	}
	public function get($member_id)
	{
		$cm_userData = $this->model_read->getUserData($member_id);

		$this->load->view('/user/nav', array('users' => $this->cm_userDataArr));
		$this->load->view('/user/table', array('users' => $cm_userData));
	}
}
