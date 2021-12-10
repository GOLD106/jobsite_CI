<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * @author Olamide
 * @description Chat history track
 * @created 
*/

class CompanyManagement extends CI_Controller {

    public $data;

    public function __construct() {

        parent::__construct();
        $this->load->model('admin_model','admin');
        // $this->load->model('companymanagement_model','company_management');
        $this->load->model('admin_model', 'admin');
        if(!$this->session->userdata('admin_id'))
        {
        redirect(base_url()."admin");
        }
        $admin_id=$this->session->userdata('admin_id');
        if ($admin_id != 1) {
            header('Location: '.base_url());
            http_response_code(404);
            exit();
        }
        $this->data['theme'] = 'admin';
        $this->data['model'] = 'company_management';
        $this->data['base_url'] = base_url();
        $this->session->keep_flashdata('error_message');
        $this->session->keep_flashdata('success_message');
        $this->load->helper('user_timezone_helper');
        $this->data['user_role']=$this->session->userdata('role');
    }

    public function index()
    {
        $this->data['page'] = 'index';
        $companies_name = $this->db->select('id, name, email, profile_img, you_are_appling_as')
                                // ->where('you_are_appling_as', 10) //organization
                                // ->or_where('you_are_appling_as', 2) //shop vendon
                                // ->or_where('you_are_appling_as', 5) //subcontractor
                                // ->or_where('you_are_appling_as', 12) //partner
                                ->get('users')
                                ->result_array();
        $result = array();
        foreach($companies_name as $company) {
            $subscriptions = $this->db->select('subscription_id, subscriber_id, type, subscription_name, fee, currency_code, fee_description, expiry_date_time')
                                ->join('subscription_fee s', 's.id = subscription_details.subscription_id', 'LEFT')
                                ->where('subscription_details.subscriber_id', $company['id'])
                                ->get('subscription_details')
                                ->result_array();

            if(empty($subscriptions)){
                    
                $result[] = array(
                    'id' => $company['id'],
                    'name' => $company['name'],
                    'email' => $company['email'],
                    'profile_img' => $company['profile_img'],
                    'subscription_name' => '',
                    'subscription_type' => '',
                    'subscription_fee' => '',
                    'subscription_currency' => '',
                    'subscription_description' => '',
                    'subscription_expiry_date_time' => ''
                );
            } else {
                foreach($subscriptions as $subscription) {
                    
                    $result[] = array(
                        'id' => $company['id'],
                        'name' => $company['name'],
                        'email' => $company['email'],
                        'profile_img' => $company['profile_img'],
                        'subscription_name' => $subscription['subscription_name'],
                        'subscription_type' => $subscription['type'],
                        'subscription_fee' => $subscription['fee'],
                        'subscription_currency' => $subscription['currency_code'],
                        'subscription_description' => $subscription['fee_description'],
                        'subscription_expiry_date_time' => $subscription['expiry_date_time']
                    );
                }
            }
        }
        $this->data['status'] = $this->db->select('status, user_id')->where('status', 'true')->get('shift_schedule')->result_array();
        $this->data['lists'] = $result;
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }
    public function permission_management()
    {
        $user_id = $this->input->post('id');
        $data['status'] = $this->input->post('status');
        $this->db->where('user_id', $user_id)->update('shift_schedule', $data);
        $result = $this->db->select('status, user_id')->get('shift_schedule')->result_array();
        echo json_encode($result);
    }

}
