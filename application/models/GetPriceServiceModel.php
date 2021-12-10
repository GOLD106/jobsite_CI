<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

/**
 * @author Leo: GetPriceService Model
 * @created: 
*/
 
class GetPriceServiceModel extends CI_Model{ 
    
    private $primaryKey = "id";
    private $name = "get_price_service";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function list($params = array()) {
        $this->db->select('f.*,s.service_title,si.thumb_image as service_thumb_image')->from($this->name." f");
        $this->db->join("services s","s.id = f.service_id","LEFT");
        $this->db->join("services_image si","si.service_id = s.id", "LEFT");
        
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
        return $this->db->insert($this->name, $params);
    }

    public function get($id) {
        $this->db->select()->from($this->name);
        $this->db->where($this->primaryKey, $id);
        return $this->db->get()->row_array();
    }

    public function update($id, $params = array()) {
        $params['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where($this->primaryKey, $id);
        return $this->db->update($this->name, $params);
    }

    public function delete($id) {
        return $this->db->delete($this->name, array(
            'id' => $id
        ));
    }
    
}