<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('user_agent');             // 이전 페이지
        $this->load->library('form_validation');
        $this->load->helper('form', 'url');             // redirect(), base_url() 사용하기 위함
        $this->load->view('/common/head');
        $this->load->model('UserModel');
    }
    public function index()
    {
        redirect(base_url() . 'index.php/');
    }
    // 로그인
    public function login()
    {
        // 로그인이 되어있는 상태에서 url로 들어오는것을 방지하기 위함
        if ($this->session->userdata('is_login')) {
            redirect(base_url() . 'index.php/');
        }

        $this->load->view('/user/login');
    }
    // 로그아웃
    public function logout()
    {
        // 만약 로그인이 되어있다면
        if ($this->session->userdata('is_login')) {
            $this->session->sess_destroy();

            /*
                unset(
                    $_SESSION['user']['id'],
                    $_SESSION['user']['name'],
                    $_SESSION['user']['role']
                );
            */
            $this->session->set_userdata('is_login', false);
            redirect(base_url() . 'index.php/');
        } else {
            return;
        }
    }

    // 회원가입
    public function register()
    {
        // 로그인이 되어있는 상태에서 url로 들어오는것을 방지하기 위함
        if ($this->session->userdata('is_login')) {
            redirect(base_url() . 'index.php/');
        }
        $this->load->view('/user/register');

    }

    // 로그인 확인
    public function login_check()
    {
        $this->form_validation->set_rules('id', 'user id', 'required');      // 필드명, 이용자가 읽기쉬운 이름, 검사규칙
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run()) { //입력 데이터 유효성검사 통과

            $id   = $this->input->post('id');
            $pass = $this->input->post('password');

            //데이터가 있다면 연관배열 데이터들, 없다면 false
            $session_data = $this->UserModel->login($id, $pass);
            
            $this->after_login($session_data);
        } else {
            // 아이디 또는 패스워드를 적지 않음
            redirect(base_url() . 'index.php/auth/login/');
        }
    }

    // 회원가입 처리
    public function register_process()
    {
        // 필수
        $this->form_validation->set_rules('id', 'user id', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $password = $this->input->post('password');
            $name = $this->input->post('name');
            $birth = $this->input->post('birth');
            $email = $this->input->post('email');

            //데이터가 있다면 $session_data['result']는 true, 없다면 false
            $session_data = $this->UserModel->register($id, $password, $name, $birth, $email);

            if($session_data['result']) {
                $this->after_login($session_data);
            } else {
                $this->session->set_flashdata('error', $session_data['error']);
                redirect(base_url() . 'index.php/auth/register/');
            }
         
        } else {
            $this->session->set_flashdata('error', 'id, pw, email 은 필수요소 입니다.');
            redirect(base_url() . 'index.php/auth/register/');
        }
    }

    // 로그인 후 처리
    public function after_login($session_data) {
        if ($session_data) {  //로그인 성공 
            $session_data['is_login'] = true;

            unset($session_data['result']);
            $this->session->set_userdata($session_data);
            redirect(base_url() . 'index.php/');
        } else  { //로그인 실패
            $this->session->set_flashdata('error', '로그인에 실패했습니다');
            redirect(base_url() . 'index.php/auth/login/');
        }
    }
}
