<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

/**
 * @author Vadim: Rfq Model
 * @created: 2021/9/15
*/
 
class RfqModel extends CI_Model{ 
    
    private $primaryKey = "id";
    private $name = "rfq_ta";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }    

    public function add($params = array()) {
       
               
        if ($this->db->insert($this->name, $params))
        {
            return true ;
        }else {
            var_dump($this->db->error());
            exit;
        };
    }

    public function List($params = array()) {
        $sql = " SELECT r.*, cat.category_name
                 FROM rfq_ta r 
                 LEFT JOIN categories AS cat ON cat.id = r.category" ;
                       
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    public function get($id) {
        $this->db->select()->from($this->name);
        $this->db->where($this->primaryKey, $id);
        return $this->db->get()->row_array();
    }

    public function delete($id) {
        return $this->db->delete($this->name, array(
            'id' => $id
        ));
    }



   
    
}