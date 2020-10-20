<?php  
class UserModel extends CI_Model  
{ 
    public function __construct() {
        parent::__construct();
         // autoload.php에 $autoload['libraries'] = array('database') 설정이 없다면 아래 행이 필요함
        $this->load->database(); // application/config/database.php에서 설정된 DB정보 사용됨
    }

    function login($id, $password)  
    {  
        /* 
        SQL문장을 직접 사용하는 예
            $sql    = "SELECT id FROM users WHERE id=? AND password=?";
            $result = $this->db->query($sql, array($id, $password)); //Query 실행
            if ( $result->num_rows() > 0)  { return true; }
            else  { return false; }
        */
        $this->db->where('id', $id);  
        $this->db->where('pw', $password);  

        //SELECT * FROM member WHERE id = '$id' AND password = '$password' 
        $result = $this->db->get('member');  //Query 실행
        $data = $result->row();

        // 만약 데이터가 있다면
        if ($data)  { 
            $sendData = array(
                'user_data' => array(
                    'id'   => $data->id,
                    'name' => $data->name,
                    'role' => $data->role
                )
            );
            return $sendData;
        }
        else  { 
            return false; 
        }

    }  

    function register($id, $password, $name, $birth, $email) {
        $sendData = array(
            'result' => false,
            'user_data' => null,
            'error' => ''
        );
        if($this->check_overlap('id', $id)) {
            $sendData['error'] = '아이디가 중복 입니다.';
            return $sendData;
        }
        if($this->check_overlap('email', $email)) {
            $sendData['error'] = '이메일이 중복 입니다.';
            return $sendData;
        }

        

        /*
            php 7.0부터 salt는 비권장이 됨
            
            $hash_options = [
                'cost' => 5,
                'salt' => $this->salt_config['salt']
            ];
            
            $new_password = password_hash($password, PASSWORD_BCRYPT, $hash_options);
        */

        // 암호화
        $hash_options = [ 'cost' => 7 ];
        $new_password = password_hash($password, PASSWORD_BCRYPT, $hash_options);

        $queryDataArr = array(
            'id'    => $id, 
            'pw'    => $new_password, 
            'name'  => $name, 
            'birth' => $birth, 
            'email' => $email
        );
    
        // 반환값: true, false
        if($this->db->insert('member', $queryDataArr)) {
            $sendData['result'] = true;
            $sendData['user_data'] = array(
                'id'   => $id,
                'name' => $name,
                'role' => 'iron'
            );
    
            return $sendData;
        } else {
            return false;
        }
        
    }
    
    function check_overlap($type, $data) {
        $this->db->where($type, $data);  

        //SELECT * FROM member WHERE id = '$data'
        //SELECT * FROM member WHERE email = '$data'
        $result = $this->db->get('member');  //Query 실행
        $data = $result->row();

        // 만약 데이터가 있다면
        if ($data)  { 
           return true;
        }
        else  { 
            return false; 
        }
    }
}  