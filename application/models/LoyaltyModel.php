<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

/**
 * @author Vadim: Loyalty Model
 * @created: 2021/9/19
*/
 
class LoyaltyModel extends CI_Model{ 
    
    private $primaryKey = "id";
    private $name = "loyalty";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function List($params = array()) {
        
        $sql = "SELECT u.name user_name, lt.name loyalty_type, l.*
                FROM loyalty l 
                LEFT JOIN users u ON u.id = l.user_name
                LEFT JOIN loyalty_type lt ON lt.id = l.loyalty_type";

        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    public function add($params = array()) {
        $params['created_date'] = date("Y-m-d H:i:s");      

        if($this->db->insert($this->name,$params)) {
            return true;
        }else {
            var_dump($this->db->error());
            exit;
        }
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