<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

/**
 * @author Leo: How It Works Model
 * @created: 2021/8/1
*/
 
class PermissionModel extends CI_Model{ 
    
    private $primaryKey = "id";
    private $name = "user_permission";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function List($params = array()) {
        $this->db->select('m.*')->from($this->name." m");
   
        
        $query = $this->db->get();
        if ($query !== false && $query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return [];
    }

    public function add($params = array()) {
        $params['created_date'] = date("Y-m-d H:i:s");
        $this->db->insert($this->name, $params);
        
        return $this->db->insert_id();
    }

    public function get($id) {
        $this->db->select()->from($this->name);
        $this->db->where($this->primaryKey, $id);
        return $this->db->get()->row_array();
    }

    public function update($id, $params = array()) {
        $params['created_date'] = date("Y-m-d H:i:s");
        $this->db->where($this->primaryKey, $id);
        return $this->db->update($this->name, $params);
    }

    public function delete($id) {
        return $this->db->delete($this->name, array(
            'id' => $id
        ));
    }
    
}