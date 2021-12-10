<?php

/**
 * @author: Vadim 
 * @desc: Permission CRUD on super admin panel
 * @created: 
*/

class Permission extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->data['theme']  = 'admin';
        $this->data['model'] = 'permission';
        $this->load->model('admin_model');
        $this->load->model('PermissionModel');
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
        $dataList = $this->PermissionModel->List();
        
        for ($i=0; $i < count($dataList); $i++) { 
            # code...
            if($dataList[$i]['image'] == "" || !file_exists(realpath($dataList[$i]['image']))) {
                $dataList[$i]['image'] = 'uploads/how_to_work_images/no_image.jpg';
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
                redirect(base_url() . 'admin/permission');
            } else {
                $data = array();
                $data['name'] = $this->input->post('title');
                $data['user_type'] = $this->input->post('user_type');
                $data['description'] = $this->input->post('description');             
                $data['active'] = $this->input->post('status');
               
                $access_data = array();
                $access_data = $this->input->post('accesscheck');
               

                $insert_id = $this->PermissionModel->add($data);
                       
               
                if ($insert_id) {
                    $message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>new data created successfully.</div>";
                    $permission_access = array();  
                    $permission_access['permission_id'] = $insert_id;
                    $module_result = $this->db->where('status', 1)->select('id')->get('admin_modules')->result_array(); 
                 
                    foreach ($module_result as $module) {
                        $permission_access['module_id'] = $module['id'];
                        if (in_array($module['id'], $access_data))
                        {
                            $permission_access['access'] = 1;
                        }
                        else
                        {
                            $permission_access['access'] = 0;
                        } 
                        $result = $this->db->insert('permission_access', $permission_access);;                        
                    }

                    $message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>new data created successfully.</div>";

                }               

                $this->session->set_flashdata('message', $message);
                redirect(base_url() . 'admin/permission');
            }
        }
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function edit($id)
    {
        $this->data['page'] = 'edit';
        $datalist = $this->PermissionModel->get($id);
        $this->data['datalist'] = $datalist;
       
     

        if ($this->data['admin_id'] > 1) {
            $this->session->set_flashdata('message', '<p class="alert alert-danger">Permission Denied</p>');
            redirect(base_url() . 'admin/permission');
        } else {
            if ($this->input->post('form_submit')) {
                $data = array();
                $data['name'] = $this->input->post('title');
                $data['description'] = $this->input->post('description'); 
                $data['active'] = $this->input->post('status');
                $data['user_type'] = $this->input->post('user_type');

                $access_data = array();
                $access_data = $this->input->post('accesscheck');

                if ($this->PermissionModel->update($id, $data)) {
                    $message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>data edited successfully.</div>";
                    $permission_access = array();  
                    $permission_access['permission_id'] = $id;
                    $module_result = $this->db->where('status', 1)->select('id')->get('admin_modules')->result_array(); 
                 
                    foreach ($module_result as $module) {
                        $permission_access['module_id'] = $module['id'];

                        $access_result = $this->db->where('permission_id', $id)->where('module_id', $module['id'])->select('id')->get('permission_access')->result_array();
                                           

                        if (in_array($module['id'], $access_data))
                        {
                            $permission_access['access'] = 1;
                        }
                        else
                        {
                            $permission_access['access'] = 0;
                        } 
                        $result = $this->db->where('id', $access_result[0]['id'])->update('permission_access', $permission_access);
                                                
                    }

                }
                $this->session->set_flashdata('message', $message);
                redirect(base_url() . 'admin/permission');
            }
        }
       
      
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
