<?php

/**
 * @author: Vadim 
 * @desc: User Permission CRUD on super admin panel
 * @created: 
*/

class Userpermission extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->data['theme']  = 'admin';
        $this->data['model'] = 'userpermission';
        $this->load->model('admin_model');
        $this->load->model('UserpermissionModel');
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
        $dataList = $this->UserpermissionModel->List();
     
        $this->data['lists'] = $dataList;
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function edit($id)
    {
        $this->data['page'] = 'edit';
        $datalist = $this->UserpermissionModel->get($id);
       
        $this->data['datalist'] = $datalist;
        if ($this->data['admin_id'] > 1) {
            $this->session->set_flashdata('message', '<p class="alert alert-danger">Permission Denied</p>');
            redirect(base_url() . 'admin/permission');
        } else {
            if ($this->input->post('form_submit')) {
                $data = array();

                $data['permission'] = $this->input->post('permission');
                if ($this->UserpermissionModel->update($id, $data)) {
                    $message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>data edited successfully.</div>";
                }
                $this->session->set_flashdata('message', $message);
                redirect(base_url() . 'admin/userpermission');
            }
        }
       
        $this->load->model('PermissionModel');
        $permissions = $this->PermissionModel->List();
        $this->data['permissions'] = $permissions;
      
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function delete()
    {
        if ($this->data['admin_id'] > 1) {
            $this->session->set_flashdata('message', '<p class="alert alert-danger">Permission Denied</p>');
            redirect(base_url() . 'admin/permission');
        } else {
            $id = $this->input->post('tbl_id');
            if (!empty($id)) {
                $datalist = $this->PermissionModel->get($id);
                $this->PermissionModel->delete($id);
                $message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>data deleted successfully.</div>";
                echo 1;
            }
            $this->session->set_flashdata('message', $message);
        }
    }

}
