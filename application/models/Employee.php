<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Employee extends CI_Model{ 
     
    function __construct() { 
        // Set table name 
        $this->table = 'users'; 
    } 
    
    function getDetail($employeeId){
        $this->db->select("users.*");
        $this->db->from('users');
        $this->db->where('id', $employeeId);
        $this->db->where('status', 1);
        // $this->db->where('you_are_appling_as', C_YOUARE_EMPLOYEE);
        $query = $this->db->get();
        if($query->num_rows() == 1){
            $userdata =  $query->row_array();
            $employeeData = $this->getEmployeeData($employeeId);
            if (!is_array($employeeData)) $employeeData = [];
            return array_merge($userdata, $employeeData);
        }else{
            return false;
        }
    }

    /* Leo */
    function getList() {
        $this->db->select("u.*, e.recognition_img, e.work_time, e.work_day, e.work_start, e.work_end");
        $this->db->from('users u');
        $this->db->join('employee e','e.user_id = u.id', "LEFT");
        $this->db->where('status', 1);
        $this->db->where('you_are_appling_as', C_YOUARE_EMPLOYEE);
        $query = $this->db->get();
        return $query->result_array();
    }

    /* Leo */
    public function update_status($data) {
        $this->db->set('status', $data['status']);
        $this->db->where('id', $data['user_id']);
        $ret = $this->db->update('users');
        return $ret;
    }

    /* Leo */
    public function insertEmployee($input_data) {
    
        $userInput = $input_data;
        unset($userInput['employee_id']);
        unset($userInput['user_id']);
        $userInput['created_at'] = date('Y-m-d H:i:s');
        // print_r($userInput); exit;
        $result  = $this->db->insert('users',$userInput);
        $last_query=$this->db->insert_id();        
        $records=array();
        $ret = false;
        if($result) {
            $user_id = $last_query;
            $token = $this->getToken(14,$user_id);
            
            /*insert wallet*/
            $wallet_data=array(
                "token"=>$token,
                "currency_code" => $input_data['currency_code'],
                "user_provider_id"=>$user_id,
                "type"=>2,
                "wallet_amt"=>0,
                "created_at"=>date('Y-m-d H:i:s')
            );

            $wallet_result  = $this->db->insert('wallet_table',$wallet_data);
            
            $this->db->where('id', $user_id);
            $this->db->update('users', array('token'=>$token));
          
            $profile_img=base_url().'assets/img/professional.png';
            $this->db->select('id,name,email,mobileno,IF(profile_img IS NULL or profile_img = "", "'.$profile_img.'", profile_img) as profile_img,token');            
            $this->db->where('id',$user_id);
            $records=$this->db->get('users')->row_array();
            if($records){
                $employee_data=array(
                    "user_id" => $records['id'],
                    "created_at"=>date('Y-m-d H:i:s')
                );
                $employee = $this->db->insert('employee',$employee_data);
                if($employee){
                    $ret = true;
                }else{
                    $this->db->where('id', $records['id']);
                    $this->db->delete('users');
                }
            }
        }
        return $ret;
    }

    /* Leo */
    public function getToken($length,$user_id) {
        $token = $user_id;
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited
        for ($i=0; $i < $length; $i++) {
             $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
        }
        return $token;
    }
    /* Leo */
    public function crypto_rand_secure($min, $max) {
        $range = $max - $min;
        if ($range < 0) return $min; // not so random...
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    /* Leo */
    public function updateEmployeeDetail($input_data) {
        $user_id = $input_data['user_id'];
        unset($input_data['user_id']);
        unset($input_data['employee_id']);
        $this->db->where('id', $user_id)->update('users',$input_data);
        //print($this->db->last_query()); exit;
        return;
    }

    /* Leo */
    public function deleteEmployee($employee_id){

        $this->db->where('user_id',$employee_id);
        $this->db->delete($this->table);

        $this->db->where('id',$employee_id);
        $this->db->delete("users");
        return true;
    }

    function getEmployeeData($employeeId){
        $this->db->select('recognition_img, work_time, work_day, work_start, work_end');
        $this->db->from('employee');
        $this->db->where('user_id', $employeeId);
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->row_array():array(); 
        if(isset($result['work_day']) && !empty($result['work_day'])){
            $result['work_day'] = json_decode($result['work_day']);
        }
        return $result;
    }

    function updateEmployee($employeeId, $data){
        $user_count = $this->db->where('user_id', $employeeId)->count_all_results('employee');
        if (count($data) > 0) {
            if ($user_count == 1)
            {
                $this->db->where('user_id', $employeeId);
                $this->db->update('employee', $data);
            }
            else
            {
                $data['user_id'] = $employeeId;
                $this->db->insert('employee', $data);
            }

            return true;

        }else{
            return false;
        }
    }
}