
<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

/**
 * @author Vadim: Common Model
 * @created: 2021/9/18
*/
 
class CommonModel extends CI_Model{ 
    
  

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_commission_fee($userId) {

       

        $user_info = $this->db->where('id', $userId)->get('users')->row_array();

        var_dump($user_info);
        exit; 
        $user_type = $user_info ['you_are_appling_as'];
   
       
        if($user_type == '9') {
            $com_fee = 0.11;
        }
        else {
            $subscription_detail = $this->db->where('subscriber_id', $userId)->get('subscription_details')->row_array();
            $subscription = $subscription_detail['subscription_id'];
                                

            $where = array('user_type =' => (int)$user_type, 'subscription =' => (int)$subscription);
            $result_fee = $this->db->where($where)->get('commission_ta')->row_array();
          
            $com_fee = isset($result_fee['commission_fee']) ? $result_fee['commission_fee']:0.12;
          

            
        }   
        return $com_fee;
       
    }

     public function get_transaction_fee($userId) {

        $init_fee = 0.01;

        $user_info = $this->db->where('id', $userId)->get('users')->row_array();
        $user_type = $user_info ['you_are_appling_as'];
        $result_fee = $this->db->where('user_type',$user_type)->get('transaction_fee_1')->row_array();
        $trans_fee = isset($result_fee['transaction_fee']) ? $result_fee['transaction_fee']: $init_fee;
       return $trans_fee;
    }

    

    



   
    
}