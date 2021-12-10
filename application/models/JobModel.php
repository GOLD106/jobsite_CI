<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class JobModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/kolkata');

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

    public function get_sub_category($location)
    {
        $sql = 'SELECT s.id, s.subcategory_name
                    FROM subcategories s                  
                    WHERE s.category ="'.$location.'"' ;
                   
                       
        $result = $this->db->query($sql)->result_array();
        return $result;

    }

    public function get_service_list($subcategory)
    {
        $sql = 'SELECT s.id, s.service_title
                    FROM services s                  
                    WHERE s.subcategory ="'.$subcategory.'"' ;
                   
                       
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



    public function add_jobpost($params = array()) {

        $params['created_date'] = date("Y-m-d H:i:s");
        $params['created_by'] = "2";
      

        return $this->db->insert('job_post', $params);
    }

    // job match part 

    public function  get_job_list() {
       $sql =   " SELECT jp.title,jp.job_type, jp.job_price,
                        SUBSTR(ca.category_name,1,8)  category_name, 
                        jp.description,jp.location,jp.id
                  FROM job_post jp
                  LEFT JOIN categories ca ON ca.id = jp.category 
                  ORDER BY created_date DESC                  
                  LIMIT 5
                ";

        $result = $this->db->query($sql)->result_array();
        return $result;
    } 

    public function  get_job_list_search($search) {
        $sql =   " SELECT jp.title,jp.job_type, jp.job_price,
                            SUBSTR(ca.category_name,1,8)  category_name, 
                            jp.description,jp.location, jp.id
                    FROM job_post jp
                    LEFT JOIN categories ca ON ca.id = jp.category 
                    WHERE jp.description LIKE '%".$search."%'
                   
                 ";          
 
         $result = $this->db->query($sql)->result_array();
         return $result;
     } 

     public function  get_job_list_all() {
        $sql =   " SELECT jp.title,jp.job_type, jp.job_price,
                         SUBSTR(ca.category_name,1,8)  category_name, 
                         jp.description,jp.location,jp.id
                   FROM job_post jp
                   LEFT JOIN categories ca ON ca.id = jp.category 
                   ORDER BY created_date DESC               
              
                 ";
 
         $result = $this->db->query($sql)->result_array();
         return $result;
     } 

     public function get_detail_job($id) {
        $sql =" SELECT jp.title,jp.job_type, jp.job_price,
                            SUBSTR(ca.category_name,1,8)  category_name, 
                            jp.description,jp.location, jp.id
                    FROM job_post jp
                    LEFT JOIN categories ca ON ca.id = jp.category 
                    WHERE jp.id = '".$id."'";                  
                   
        $result = $this->db->query($sql)->row_array();
        return $result;
     }


     public function add_bidding_data($params = array()) {

        $params['created_date'] = date("Y-m-d H:i:s");
      

        return $this->db->insert('bidding_ta', $params);
    }

    public function get_proposal_data($job_id) {
        $sql = "SELECT  jp.title,b.amount, jp.job_type,  SUBSTR(ca.category_name,1,8)  category_name, jp.location, u.name , jp.id ,u.profile_img
                FROM  job_post jp
                LEFT JOIN bidding_ta b ON b.job_id = jp.id
                LEFT JOIN categories ca ON ca.id = jp.category
                LEFT JOIN users u ON u.id = b.user_id
                WHERE jp.id = '".$job_id."'";
         $result = $this->db->query($sql)->result_array();
         return $result;        
                
    }
    public function get_count_bid($job_id) {
        $sql = "SELECT COUNT(job_id) cnt_bid, ROUND(AVG(amount),2) avg_amount
                FROM bidding_ta b
                WHERE b.job_id = '".$job_id."'";
        $result = $this->db->query($sql)->result_array();
        return $result;

    }
    

}

