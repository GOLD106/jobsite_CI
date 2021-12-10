<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

/**
 * @author Vadim: Commission Model
 * @created: 2021/9/18
*/
 
class CommissionModel extends CI_Model{ 
    
    private $primaryKey = "id";
    private $name = "commission_ta";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function List($params = array()) {
        $sql = " SELECT c.* ,sf.subscription_name
                 FROM commission_ta c
                 LEFT JOIN subscription_fee sf ON sf.id = c.subscription" ;
                       
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    

    public function add($params = array()) {
       
        $params['created_date'] = date("Y-m-d H:i:s");     

        if ($this->db->insert($this->name, $params))
        {
            return true ;
        }else {
            var_dump($this->db->error());
            exit;
        };
    }



    public function get($id) {
        $this->db->select()->from($this->name);
        $this->db->where($this->primaryKey, $id);
        return $this->db->get()->row_array();
    }

    public function update($id, $params = array()) {
        $params['created_date'] = date("Y-m-d H:i:s");
        $this->db->where($this->primaryKey, $id);
        if($this->db->update($this->name, $params))
        {
            return true ;
        }else {
            var_dump($this->db->error());
            exit;
        };
    }

    public function delete($id) {
        return $this->db->delete($this->name, array(
            'id' => $id
        ));
    }
    
}