<?php
class Model_read extends CI_Model {
    function __construct()
    {  
        //super() 과 비슷한 함수
        parent::__construct();
    }

    public function getUserDatas() {
        return $this->db->query('SELECT * FROM member')->result();
        // return $this->db->query('SELECT * FROM member')->result_array();
    }
    public function getUserData($member_id) {   
        return $this->db->get_where('member', array('member_id' => $member_id))->result();
        // return $this->db->query("SELECT * FROM member where member_id ='.$member_id.'")->result();
    }
}