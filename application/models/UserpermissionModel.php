<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

/**
 * @author Vadim: User Permission Model
 * @created: 2021/9/1
*/
 
class UserpermissionModel extends CI_Model{ 
    
    private $primaryKey = "id";
    private $name = "users";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function List($params = array()) {
        $this->db
            ->select("*")
            ->from("subscription_details")
            ->where('type', 2);
        $subscription_details = $this->db->get_compiled_select();
        $this->db->reset_query();

        $this->db->select('m.*,p.name as permission_name,C.country_name, subscription_name, you_are_appling_as ')->from($this->name." m");
        $this->db->join("user_permission p","p.id = m.permission","LEFT");
        $this->db->join("country_table C", "C.id= m.country_code", "LEFT");
        $this->db->join("($subscription_details) SD", "SD.subscriber_id=m.id", "LEFT");
        $this->db->join("subscription_fee S", "S.id=SD.subscription_id", "LEFT");

        if (array_key_exists('category',$params) && !empty($params['category'])) {
            $this->db->where('category', $params['category']);
        }
        if (array_key_exists('status',$params) && !empty($params['status'])) {
            $this->db->where('status', $params['status']);
        }
        if (array_key_exists('limit',$params) && !empty($params['limit'])) {
            $this->db->limit($params['limit']);
        }
        if (array_key_exists('order_by',$params) && !empty($params['order_by'])) {
            $sort = "ASC";
            if (array_key_exists('sort',$params) && !empty($params['sort'])) {
                $sort = $params['sort'];
            }
            $this->db->order_by($params['order_by'], $sort);
        }
        else {
            $this->db->order_by('created_at','DESC');
        }
        $query = $this->db->get();
        if ($query !== false && $query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return [];
    }

    public function add($params = array()) {
        $params['created_at'] = date("Y-m-d H:i:s");
        $params['updated_at'] = date("Y-m-d H:i:s");
        return $this->db->insert($this->name, $params);
    }

    public function get($id) {

       
        $this->db->select()->from($this->name);
        $this->db->where($this->primaryKey, $id);
        return $this->db->get()->row_array();
    }

    public function update($id, $params = array()) {
        
        $this->db->where($this->primaryKey, $id);
        return $this->db->update($this->name, $params);
    }

    public function delete($id) {
        return $this->db->delete($this->name, array(
            'id' => $id
        ));
    }
    
}