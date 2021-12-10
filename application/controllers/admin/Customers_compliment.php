<?php

/**
 * @author: Leo 
 * @desc: Customers complement CRUD on super admin panel
 * @created: 
*/

class Customers_compliment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->data['theme']  = 'admin';
        $this->data['model'] = 'customers_compliment';
        $this->load->model('admin_model');
        $this->load->model('CustomersComplimentModel');
        $this->data['base_url'] = base_url();
        $this->data['admin_id']  = $this->session->userdata('id');
        $this->user_role         = !empty($this->session->userdata('user_role')) ? $this->session->userdata('user_role') : 0;
        $this->data['main_menu'] = $this->admin_model->get_all_footer_menu();
        $this->load->helper('ckeditor');
        $this->load->helper('common_helper');
        // Array with the settings for this instance of CKEditor (you can have more than one)
        $this->data['ckeditor_editor1'] = array(
            //id of the textarea being replaced by CKEditor
            'id' => 'ck_editor_textarea_id',
            // CKEditor path from the folder on the root folder of CodeIgniter
            'path' => 'assets/js/ckeditor',
            // optional settings
            'config' => array(
                'toolbar' => "Full",
                'filebrowserBrowseUrl' => base_url() . 'assets/js/ckfinder/ckfinder.html',
                'filebrowserImageBrowseUrl' => base_url() . 'assets/js/ckfinder/ckfinder.html?Type=Images',
                'filebrowserFlashBrowseUrl' => base_url() . 'assets/js/ckfinder/ckfinder.html?Type=Flash',
                'filebrowserUploadUrl' => base_url() . 'assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                'filebrowserImageUploadUrl' => base_url() . 'assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                'filebrowserFlashUploadUrl' => base_url() . 'assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            )
        );
    }
    public function index($offset = 0)
    {
        $this->data['page']  = 'index';
        $dataList = $this->CustomersComplimentModel->List();
        for ($i=0; $i < count($dataList); $i++) { 
            # code...
            if($dataList[$i]['customer_image'] == "" || !file_exists(realpath($dataList[$i]['customer_image']))) {
                $dataList[$i]['customer_image'] = 'uploads/customer_images/no_image.jpg';
            }
        }
        $this->data['lists'] = $dataList;
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function create()
    {
        $this->data['page'] = 'create';
        if ($this->input->post('form_submit')) {
            if ($this->data['admin_id'] > 1) {
                $this->session->set_flashdata('message', '<p class="alert alert-danger">Permission Denied</p>');
                redirect(base_url() . 'admin/customers_compliment');
            } else {
                $data = array();
                $data['category'] = $this->input->post('category');
                $data['customer_name'] = $this->input->post('customer_name');
                if (isset($_FILES) && isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    $uploaded_file_name = $_FILES['image']['name'];
                    $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                    $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                    $this->load->library('common');
                    $upload_sts = $this->common->global_file_upload('uploads/customer_images/', 'image', time() . $filename);
                    
                    if (isset($upload_sts['success']) && $upload_sts['success'] == 'y') {
                        $uploaded_file_name = $upload_sts['data']['file_name'];
    
                        if (!empty($uploaded_file_name)) {
                            $image_url = 'uploads/customer_images/' . $uploaded_file_name;
                            // $data['image'] = image_resize(480, 320, $image_url,  $uploaded_file_name,"customer_images");
                            $data['customer_image'] = $image_url;
                        }
                    }
                }
                $data['content'] = $this->input->post('content'); 
                $data['status'] = $this->input->post('status');
                if ($this->CustomersComplimentModel->add($data)) {
                    $message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>new data created successfully.</div>";
                }
                $this->session->set_flashdata('message', $message);
                redirect(base_url() . 'admin/customers_compliment');
            }
        }
        $this->load->model("Categories_model", "Categories");
        $categories = $this->Categories->get_category();
        $this->data['categories'] = $categories;
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function edit($id)
    {
        $this->data['page'] = 'edit';
        $datalist = $this->CustomersComplimentModel->get($id);
        $this->data['datalist'] = $datalist;
        if ($this->data['admin_id'] > 1) {
            $this->session->set_flashdata('message', '<p class="alert alert-danger">Permission Denied</p>');
            redirect(base_url() . 'admin/customers_compliment');
        } else {
            if ($this->input->post('form_submit')) {
                $data = array();
                $data['category'] = $this->input->post('category');
                $data['customer_name'] = $this->input->post('customer_name');
                if (isset($_FILES) && isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    $uploaded_file_name = $_FILES['image']['name'];
                    $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                    $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                    $this->load->library('common');
                    $upload_sts = $this->common->global_file_upload('uploads/customer_images/', 'image', time() . $filename);
                    
                    if (isset($upload_sts['success']) && $upload_sts['success'] == 'y') {
                        $uploaded_file_name = $upload_sts['data']['file_name'];
    
                        if (!empty($uploaded_file_name)) {
                            $image_url = 'uploads/customer_images/' . $uploaded_file_name;
                            // $data['image'] = image_resize(480, 320, $image_url,  $uploaded_file_name,"customer_images");
                            $data['customer_image'] = $image_url;
                            @unlink($datalist['customer_image']);
                        }
                    }
                }
                $data['content'] = $this->input->post('content'); 
                $data['status'] = $this->input->post('status');
                
                if ($this->CustomersComplimentModel->update($id, $data)) {
                    $message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>data edited successfully.</div>";
                }
                $this->session->set_flashdata('message', $message);
                redirect(base_url() . 'admin/customers_compliment');
            }
        }
        $this->load->model("Categories_model", "Categories");
        $categories = $this->Categories->get_category();
        $this->data['categories'] = $categories;
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function delete()
    {
        if ($this->data['admin_id'] > 1) {
            $this->session->set_flashdata('message', '<p class="alert alert-danger">Permission Denied</p>');
            redirect(base_url() . 'admin/customers_compliment');
        } else {
            $id = $this->input->post('tbl_id');
            if (!empty($id)) {
                $datalist = $this->CustomersComplimentModel->get($id);
                @unlink($datalist['image']);
                $this->CustomersComplimentModel->delete($id);
                $message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>data deleted successfully.</div>";
                echo 1;
            }
            $this->session->set_flashdata('message', $message);
        }
    }

}
