<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Board extends MY_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->head();
        $this->load->model('BoardModel');
    }
    public function index() 
    {
        $board_list = $this->getBoardList();
        $this->load->view('/board/list', ['board_list' => $board_list]);
    }
    public function create()
    {
        $this->load->view('/board/create');
    }
    private function getBoardList() 
    {
        $data = $this->BoardModel->select_list();

        return $data;
    }
    public function setPagination($currentPage) 
    {
        // 현재 페이지
        $page = $currentPage;
        // 페이지 범위 ex) 1~10 11~20
        $range = 10;
        // 게시물 총 개수
        $listCnt = $this->BoardModel->get_listCnt();
        $startPage = $page;

    }
}