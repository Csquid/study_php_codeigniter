<?php
class Model_pracDB extends CI_Model {
    function __construct()
    {  
        //super() 과 비슷한 함수
        parent::__construct();
    }

    public function getAllData() {
        return $this->db->query('SELECT * FROM member')->result();
    }
}