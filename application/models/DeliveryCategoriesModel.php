<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DeliveryCategoriesModel extends CI_Model
{
    protected $_table = "delivery_categories";

	function __construct() { 
        // Set table name 
        $this->table = 'delivery_categories'; 
    }
     
    public function get_category($params = array()){ 
        $this->db->select('c.*, (SELECT COUNT(s.id) FROM delivery_services AS s WHERE s.category=c.id AND s.status=1 ) AS category_count');
               $this->db->from($this->_table.' c');
               $this->db->where('c.status',1);
               $this->db->order_by('category_count','DESC');
         
        if(array_key_exists("where", $params)){ 
            foreach($params['where'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        }
         
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){ 
                if(!empty($params['id'])){ 
                    $this->db->where('id', $params['id']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
               
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit'],$params['start']); 
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit']); 
                } 
                 
                $query = $this->db->get(); 
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
            } 
        } 
         
        return $result; 
    } 

    public function getPopularCategories($limit = 3) {
        $this->db
            ->select("sum(total_views) as total_views, category")
            ->from('delivery_services')
            ->group_by('category');
        $subquery = $this->db->get_compiled_select();
        $this->db->reset_query(); 
        
        $this->db->select('c.*, s.total_views');
        $this->db->from($this->_table.' c');
        $this->db->join("($subquery) s","s.category = c.id", "LEFT");
        $this->db->order_by('total_views', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result_array();
    }

    /**
     * @author Leo: delete category and it's images
    */
    public function delete_category($category_id) {
        $this->db->select()->from($this->_table)->where('id', $category_id);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        }
        $rows = $query->row_array();
        @unlink(realpath($rows['image']));
        @unlink(realpath($rows['thumb_image']));
        @unlink(realpath($rows['icon']));
        @unlink(realpath($rows['mobile_icon']));
        return $this->db->where('id', $category_id)->delete($this->table);
    }

}
