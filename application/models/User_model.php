<?php
if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}
class User_model extends CI_Model
{
    private $name = "users";

    public function __construct()
    {
        parent::__construct();
    }

    # added by maksimU : for staff deleting
    public function delete_user($user_id)
    {
        $this->db->where("id", $user_id);
        $this->db->delete("users");
        return;
    }
    # maksimU end

    public function get_user($user_id)
    {
        $user = $this->db
            ->select("*")
            ->from("users")
            ->where("id", $user_id)
            ->get()
            ->result_array();

        if (!empty($user)) {
            return $user[0];
        }
        return [];
    }

    /**
     * @author Leo: get user detail info 
     * @return array
    */
    public function get_user_details($user_id) {
        $this->db
            ->select("*")
            ->from($this->name)
            ->where('id',$user_id);
        $subquery = $this->db->get_compiled_select();
        $this->db->reset_query();

        $this->db
            ->select("*")
            ->from("subscription_details")
            ->where('type', 2);
        $subscription_details = $this->db->get_compiled_select();
        $this->db->reset_query();

        $this->db->select('m.*,a.address,a.country_id,a.state_id,a.city_id,a.pincode,c.country_name,ST.name as state_name,CI.name as city_name,S.subscription_name,S.fee_description as subscription_description,SD.subscriber_id,SD.subscription_date,SD.expiry_date_time as subscription_expiry_date');
        $this->db->from("($subquery) m");
        $this->db->join("user_address a","m.id = a.user_id", "LEFT");
        $this->db->join("country_table c","a.country_id = c.id", "LEFT");
        $this->db->join("state ST", "ST.id=a.state_id", "LEFT");
        $this->db->join("city CI", "CI.id=a.city_id", "LEFT");

        $this->db->join("($subscription_details) SD", "SD.subscriber_id=m.id", "LEFT");
        $this->db->join("subscription_fee S", "S.id=SD.subscription_id", "LEFT");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return null;
    }

    /* Leo */
    public function insertUser($input_data) {
    
        $userInput = $input_data;
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
            $ret = true;
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
    public function updateUser($input_data) {
        $user_id = $input_data['user_id'];
        unset($input_data['user_id']);
        $result = $this->db->where('id', $user_id)->update('users',$input_data);
        //print($this->db->last_query()); exit;
        return $result;
    }

    public function find_users($where)
    {
        $users = $this->db
            ->select("*")
            ->from("users")
            ->where($where)
            ->get()
            ->result_array();

        if (!empty($users)) {
            return $users;
        }
        return [];
    }

    public function get_myserviceman_list()
    {
        $this->db->select("users.id, users.name, users.mobileno, users.email");
        $this->db->from("services s");
        $this->db->join("categories c", "c.id = s.category", "LEFT");
        $this->db->join("subcategories sc", "sc.id = s.subcategory", "LEFT");
        $this->db->join("book_service as bs", "bs.service_id = s.id", "LEFT");
        $this->db->join("users", "users.id = s.user_id", "LEFT");
        $this->db->where("s.status = 1");
        $this->db->where("NOT ISNULL(users.id)");
        $this->db->where("bs.user_id", $this->session->userdata("id"));
        $this->db->group_by("users.id");
        $this->db->order_by("s.id", "DESC");
        $result = $this->db->get();
        $result = $result->result_array();
        return $result;
    }

    public function get_myclient_list()
    {
        $this->db->select("users.id, users.name, users.mobileno, users.email");
        $this->db->from("services s");
        $this->db->join("categories c", "c.id = s.category", "LEFT");
        $this->db->join("subcategories sc", "sc.id = s.subcategory", "LEFT");
        $this->db->join("book_service as bs", "bs.service_id = s.id", "LEFT");
        $this->db->join("users", "users.id = bs.user_id", "LEFT");
        $this->db->where("s.status = 1");
        $this->db->where("NOT ISNULL(users.id)");
        $this->db->where("s.user_id", $this->session->userdata("id"));
        $this->db->group_by("users.id");
        $this->db->order_by("s.id", "DESC");
        $result = $this->db->get();
        $result = $result->result_array();
        return $result;
    }

    /*find user type*/
    public function get_user_type($mobile_no, $country_code)
    {
        $user = $this->db
            ->select("*")
            ->from("users")
            ->where("country_code", $country_code)
            ->where("mobileno", $mobile_no)
            ->get()
            ->row();

        $provider = $this->db
            ->select("*")
            ->from("providers")
            ->where("country_code", $country_code)
            ->where("mobileno", $mobile_no)
            ->get()
            ->row();

        if (!empty($user)) {
            return $user;
        }

        if (!empty($provider)) {
            return $provider;
        }
        return "";
    }

    public function getUserInfo($user_id)
    {
        $this->db->select("users.*");
        $this->db->from("users");
        $this->db->where("id", $user_id);
        $this->db->where("status", 1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $userdata = $query->row_array();
            return $userdata;
        } else {
            return false;
        }
    }

    public function getEmployeeScheduleList($start_date, $end_date)
    {
        $sql = " SELECT users.id, users.name, users.l_name, users.profile_img ";
        $sql .=
            " , bs.book_service_id, bs.service_date, bs.service_time, bs.status as book_service_status ";
        $sql .= " , bs.category_name, bs.subcategory_name, bs.service_title ";
        $sql .= " FROM users ";
        $sql .= " LEFT JOIN ( ";
        $sql .=
            " SELECT jbs.id AS book_service_id, jbs.service_date AS service_date, jbs.service_time AS service_time ";
        $sql .= " ,jbs.status as status ";
        $sql .=
            " ,jsv.user_id AS user_id ,jsv.service_title AS service_title  ";
        $sql .= " ,mc.category_name AS category_name ";
        $sql .= " ,sc.subcategory_name AS subcategory_name ";
        $sql .= " FROM book_service AS jbs  ";
        $sql .= " LEFT JOIN services jsv ON jbs.service_id = jsv.id ";
        $sql .= " LEFT JOIN categories mc ON jsv.category = mc.id ";
        $sql .= " LEFT JOIN subcategories sc ON jsv.subcategory = sc.id ";
        $sql .= " WHERE DATEDIFF('" . $start_date . "',jbs.service_date) <=0 ";
        $sql .= " AND DATEDIFF(jbs.service_date,'" . $end_date . "') <=0 ";
        $sql .= " ) bs ON users.id = bs.user_id ";
        $sql .= " WHERE users.you_are_appling_as = 8 AND users.`status` = 1 ";
        $sql .= " ORDER BY users.id,bs.service_date,bs.service_time ";
        $query = $this->db->query($sql);
        $result = $query->result_array();

        return $result;
    }
}
