

<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MeetingModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/kolkata');

    }

    public function get_time_zone() {
        $sql = "SELECT t.code, t.name
                FROM time_zone t";

        $time_zone_list=$this->db->query($sql)->result_array();

        return $time_zone_list;

    }   

    public function get_time_zone_text($id) {
        $this->db->select()->from('time_zone s');
        $this->db->where("s.code ='" . $id . "'");
        $result = $this->db->get()->row_array();
        return $result;

    }   

    public function add($params = array()) {

        $params['created_date'] = date("Y-m-d H:i:s");
        return $this->db->insert('meeting_ta', $params);
    }  
   


}

