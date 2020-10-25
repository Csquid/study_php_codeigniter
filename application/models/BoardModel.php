<?php  
class BoardModel extends CI_Model  
{
    public function __construct() {
        parent::__construct();
         // autoload.php에 $autoload['libraries'] = array('database') 설정이 없다면 아래 행이 필요함
        $this->load->database(); // application/config/database.php에서 설정된 DB정보 사용됨
        $this->load->model('UserModel');
    }

    function select_list()
    {   
        $this->db->order_by('board_id', 'DESC');
        $result = $this->db->get('board')->result();

        return $result;
    }
    function get_listCnt() 
    {
        return $this->db->get('board')->num_rows();
    }
    
}