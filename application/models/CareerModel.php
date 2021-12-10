<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class CareerModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/kolkata');

    }

    public function get_location() {
        $sql = "SELECT DISTINCT s.service_location
                FROM services s";

        $country_list=$this->db->query($sql)->result_array();

        return $country_list;

    }

    public function get_category()
    {
        $sql = "SELECT c.id, c.category_name ,cc.count_id
                FROM categories c
                LEFT JOIN (SELECT s.category,COUNT(s.id) count_id
                FROM services s
                GROUP BY  s.category)  AS cc ON cc.category = c.id 
                ORDER BY c.id" ;
        $result = $this->db->query($sql)->result_array();
        return $result;

    }

    public function get_category_detail($location)
    {
        $sql = 'SELECT c.id, c.category_name ,IFNULL (cc.count_id,0) count_id
                    FROM categories c
                    LEFT JOIN (SELECT s.category,COUNT(s.id) count_id,s.service_location
                    FROM services s
                    WHERE s.service_location LIKE "%'.$location.'%"
                    GROUP BY  s.category)  AS cc ON cc.category = c.id 
                    ORDER BY c.id' ;
                       
        $result = $this->db->query($sql)->result_array();
        return $result;

    }

   
    public function get_total_service () {
        $query = $this->db->query('SELECT * FROM services');
        $result = $query->num_rows();
        return $result ;
    }

    public function get_service_count ($location) {

        $this->db->select('*');
        $this->db->from ('services s');
        $this->db->like('s.service_location',$location);
        $result = $this->db->get()->num_rows();
        return $result ;
    }




    public function get_category_id($category_name)
    {
        return $this->db->select('id')->where('category_name', rawurldecode(utf8_decode($category_name)))->get('categories')->row()->id;
    }
    
    public function  get_services () {
        $this->db->select('s.id,s.service_title,s.about');
        $this->db->from('services s');
        $this->db->order_by('s.total_views', 'DESC');
        $this->db->limit(20);
        $result = $this->db->get()->result_array();
        return $result;


    } 

    public function  get_services_location ($location) {
        $this->db->select('s.id,s.service_title,s.about');
        $this->db->from('services s');
        $this->db->like('s.service_location',$location);
        $this->db->order_by('s.total_views', 'DESC');
        $result = $this->db->get()->result_array();
        return $result;
    } 

    public function  get_services_detail ($location,$category_id) {
        $this->db->select('s.id,s.service_title,s.about');
        $this->db->from('services s');
        $this->db->like('s.service_location',$location);
        $this->db->where('s.category ='.$category_id);
        $this->db->order_by('s.total_views', 'DESC');
        $result = $this->db->get()->result_array();
     
       
        return $result;
    } 


    public function get_service($id) {
        $this->db->select()->from('services s');
        $this->db->where("s.status = 1 AND s.id ='" . $id . "'");
        $result = $this->db->get()->row_array();
        return $result;


    }



    public function add($params = array()) {

        $params['created_date'] = date("Y-m-d H:i:s");
      

        return $this->db->insert('career_ta', $params);
    }

    public function List($params = array()) {
        $sql = "SELECT c.id, c.name,c.email,ct.country_name,c.phone_number,
                     c.skill_name,c.user_address,c.appling_as,c.upload_file,
                     s.service_title,c.created_date   
                FROM career_ta c 
                LEFT JOIN country_table AS ct ON ct.country_id = c.country_code
                LEFT JOIN services AS s ON s.id = c.service_id" ;
                       
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    public function check_email($email)
    {
               
        $this->db->where("email", $email);
        return $this->db->count_all_results("career_ta");
    }


 
}

