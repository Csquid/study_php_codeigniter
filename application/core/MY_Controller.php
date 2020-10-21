<?php
// 공통적인 부분의 로직을 작성할수있음
class MY_Controller extends CI_Controller {
    function __construct()
    {
        parent::__construct();
    }
    
    protected function head() {
        $this->load->library('user_agent');             // 이전 페이지
        $this->load->library('form_validation');
        $this->load->helper('form', 'url');             // redirect(), base_url() 사용하기 위함
        $this->load->view('/common/head');
        $this->load->model('UserModel');
    }
}