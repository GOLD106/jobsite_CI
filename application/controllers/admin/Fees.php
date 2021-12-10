<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * @author Leo
 * @description Fees Controller
 * @created 
*/

class Fees extends CI_Controller {

    public $data;

    public function __construct() {

        parent::__construct();
        $this->load->model('admin_model','admin');
        $this->load->model('Fee_model','fee_model');
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
        $this->data['model'] = 'fees';
        $this->data['base_url'] = base_url();
        $this->session->keep_flashdata('error_message');
        $this->session->keep_flashdata('success_message');
        $this->load->helper('user_timezone_helper');
        $this->data['user_role']=$this->session->userdata('role');
    }

    public function index()
    {
        $this->data['page'] = 'index';
        $params = array();
        if ($this->input->post('form_submit')) {
            extract($_POST);
            $params['name'] = $name;
        }

        $result = $this->fee_model->getFeeList();
    
        $this->data['params'] = $params;
        $this->data['lists'] = $result;
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    // public function commission()
    // {
    // //   $this->common_model->checkAdminUserPermission(1);
    //   $this->data['page'] = 'commission';
    //   $params = array();
    //   if ($this->input->post('form_submit')) {
    //     extract($_POST);
    //     $params['name'] = $name;
    //   }

    //   $result = $this->db->get('commission')->result_array();
    // //   var_dump($result);
    //   $this->data['params'] = $params;
    //   $this->data['lists'] = $result;
    //   $this->load->vars($this->data);
    //   $this->load->view($this->data['theme'] . '/template');
    // }

    public function transaction()
    {
    //   $this->common_model->checkAdminUserPermission(1);
        $this->data['page'] = 'transaction';
        $params = array();
        if ($this->input->post('form_submit')) {
            extract($_POST);
            $params['name'] = $name;
        }
        $result = $this->db->get('transaction_fee')->result_array();
        $this->data['params'] = $params;
        $this->data['lists'] = $result;
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    
    }

    public function create()
    {           
        if ($this->input->post('form_submit')) {
            $data = array();
            $data['name'] = $this->input->post('fee_name');
            $data['type'] = $this->input->post('fee_type');
            $data['fee'] = $this->input->post('fee_value');

            $result = $this->fee_model->insertFee($data);
            if($result == 1){
                $this->session->set_flashdata('success_message','Created successfully.');
                redirect(base_url() . 'admin/fees');
            }else if($result == 2){
                $this->session->set_flashdata('error_message','Already exist same fee');
            }else{
                $this->session->set_flashdata('error_message','Something wrong, Please try fill again');
            }
        }

        $this->data['page'] = 'create';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function edit($id)
    { 
        if(!isset($id)){
            $this->session->set_flashdata('error_message','Invalid Fee, Please try again');
            redirect(base_url() . 'admin/fees');
        }
        
        if ($this->input->post('form_submit')) {
            $data = array();
            $data['id'] = $id;
            $data['name'] = $this->input->post('fee_name');
            $data['type'] = $this->input->post('fee_type');
            $data['fee'] = $this->input->post('fee_value');

            $result = $this->fee_model->updateFee($data);

            if($result == 1){
                $this->session->set_flashdata('success_message','Updated successfully.');
                redirect(base_url() . 'admin/fees');
            }else if($result == 2){
                $this->session->set_flashdata('error_message','Already exist same fee');
            }else{
                $this->session->set_flashdata('error_message','Something wrong, Please try fill again');
            }
        }

        $feeAry = $this->fee_model->findFee($id);

        $this->data['page'] = 'edit';
        $this->data['feeAry'] = $feeAry;
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    /* Leo */
    public function check_fee_name() {
        $fee_name = $this->input->post('fee_name');
        $id = $this->input->post('fee_id');
        if (!empty($id))
        {
            $this->db->select('*');
            $this->db->where('replace(name," ","")=replace("' . $fee_name . '"," ","")');
            $this->db->where('id !=', $id);
            $this->db->from('fees');
            $result = $this->db->get()->num_rows();
        }
        else
        {
            $this->db->select('*');
            $this->db->where('replace(name," ","")=replace("' . $fee_name . '"," ","")');
            $this->db->from('fees');
            $result = $this->db->get()->num_rows();
        }
        if ($result > 0)
        {
            $isAvailable = false;
        }
        else
        {
            $isAvailable = true;
        }
        echo json_encode(array(
            'valid' => $isAvailable
        ));
    }

    /* Leo */
    public function check_fee_type() {
        $fee_type = $this->input->post('fee_type');
        $id = $this->input->post('fee_id');
        if (!empty($id))
        {
            $this->db->select('*');
            $this->db->where('replace(type," ","")=replace("' . $fee_type . '"," ","")');
            $this->db->where('id !=', $id);
            $this->db->from('fees');
            $result = $this->db->get()->num_rows();
        }
        else
        {
            $this->db->select('*');
            $this->db->where('replace(type," ","")=replace("' . $fee_type . '"," ","")');
            $this->db->from('fees');
            $result = $this->db->get()->num_rows();
        }
        if ($result > 0)
        {
            $isAvailable = false;
        }
        else
        {
            $isAvailable = true;
        }
        echo json_encode(array(
            'valid' => $isAvailable
        ));
    }

    public function transaction_create()
    {
        if ($this->input->post('form_submit')) {
            $data = array();
            // $service_num = $this->input->post('service_num');
            $service_name = $this->input->post('service_name');
            $transaction_id = $this->input->post('transaction_id');
            $date = $this->input->post('transaction_date');
            $currency_code = $this->input->post('currency');
            $amount = $this->input->post('amount');

            $ins_data=array("service_name"=>$service_name, "transaction_id"=>$transaction_id, "date"=>$date, "currency_code"=>$currency_code, "amount"=>$amount, "created_at"=>date('Y-m-d H:i:s'), "updated_at"=>date('Y-m-d H:i:s'));

            $result = $this->db->insert('transaction_fee', $ins_data);
            if($result == 1){
                $this->session->set_flashdata('success_message','Created successfully.');
                redirect(base_url() . 'admin/transaction');
            }else if($result == 2){
                $this->session->set_flashdata('error_message','Already exist same fee');
            }else{
                $this->session->set_flashdata('error_message','Something wrong, Please try fill again');
            }
        }

        $this->data['page'] = 'transaction_create';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }
    public function transaction_edit($id) 
    {
        if(!isset($id)){
            $this->session->set_flashdata('error_message','Invalid Fee, Please try again');
            redirect(base_url() . 'admin/transaction');
        }
        
        if ($this->input->post('form_submit')) {
            $data = array();
            $data['service_name'] = $this->input->post('service_name');
            $data['transaction_id'] = $this->input->post('transaction_id');
            $data['date'] = $this->input->post('transaction_date');
            $data['currency_code'] = $this->input->post('currency');
            $data['amount'] = $this->input->post('amount');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->db->where('id', $id)->update('transaction_fee', $data);

            if($result == 1){
                $this->session->set_flashdata('success_message','Updated successfully.');
                redirect(base_url() . 'admin/transaction');
            }else if($result == 2){
                $this->session->set_flashdata('error_message','Already exist same fee');
            }else{
                $this->session->set_flashdata('error_message','Something wrong, Please try fill again');
            }
        }
        $feeAry = $this->db->select("*")->from('transaction_fee')->where('id',$id)->get()->row_array();

        $this->data['page'] = 'transaction_edit';
        $this->data['feeAry'] = $feeAry;
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function delete_transaction_fee()
    {   
        $id = $this->input->post('fee_id');
        if (!empty($id)) {
            $this->fee_model->delete_row($id);
            $this->db->where('id', $id)->delete('transaction_fee');
            $this->session->set_flashdata('success_message','Deleted successfully');
            echo json_encode(array('sec'=>1));
        }else{
            $this->session->set_flashdata('error_message','Something wrong, Please try again');
            echo json_encode(array('sec'=>0));
        }
    }

    public function delete_fee()
    {   
        $id = $this->input->post('fee_id');
        if (!empty($id)) {
            $this->fee_model->delete_row($id);
            $this->session->set_flashdata('success_message','Deleted successfully');
            echo json_encode(array('sec'=>1));
        }else{
            $this->session->set_flashdata('error_message','Something wrong, Please try again');
            echo json_encode(array('sec'=>0));
        }
    }
}
