<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Vadim 2021-09-29
class InvoiceModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/kolkata');

    }  

    public function get_invoice()
    {
        $sql = "SELECT inv.*, s.service_title,s.currency_code,s.service_amount
                FROM invoice_ta inv
                LEFT JOIN services AS s ON s.id = inv.service_id
                WHERE inv.add_flag = '1' " ;
                
        $result = $this->db->query($sql)->result_array();
        return $result;

    }
    
   

 
}

