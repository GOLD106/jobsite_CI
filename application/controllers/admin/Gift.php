<?php

/**
 * @author: Olamide 
 * @desc: Gift CRUD on super admin panel
 * @created: 
*/

class Gift extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->data['theme']  = 'admin';
        $this->data['model'] = 'Gift';
        $this->load->model('admin_model');
        $this->load->model('GiftModel');
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
        $dataList = $this->GiftModel->List();
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
                redirect(base_url() . 'gift');
            } else {
                $data = array();
                $uploaded_file_name = '';
                if (isset($_FILES) && isset($_FILES['gift_image']['name']) && !empty($_FILES['gift_image']['name']))
                {
                    $uploaded_file_name = $_FILES['gift_image']['name'];
                    $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                    $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                    $this->load->library('common');
                    $upload_sts = $this->common->global_file_upload('uploads/gift_images/', 'gift_image', time() . $filename);
    
                    if (isset($upload_sts['success']) && $upload_sts['success'] == 'y')
                    {
                        $uploaded_file_name = $upload_sts['data']['file_name'];
    
                        if (!empty($uploaded_file_name))
                        {
                            $image_url = 'uploads/gift_images/' . $uploaded_file_name;
                            $data['img'] = $image_url;
                            // $data['thumb_image'] = image_resize(50, 50, $image_url, 'thu_' . $uploaded_file_name, "gift_images");
                        }
                    }
                }
                $data['title'] = $this->input->post('title');
                
                if ($this->GiftModel->add($data)) {
                    $message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>new data created successfully.</div>";
                }
                $this->session->set_flashdata('message', $message);
                redirect(base_url() . 'admin/gift');
            }
        }
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function edit($id)
    {
        $this->data['page'] = 'edit';
        $datalist = $this->GiftModel->get($id);
        $this->data['datalist'] = $datalist;
        if ($this->data['admin_id'] > 1) {
            $this->session->set_flashdata('message', '<p class="alert alert-danger">Permission Denied</p>');
            redirect(base_url() . 'gift');
        } else {
            if ($this->input->post('form_submit')) {
                $data = array();
                $uploaded_file_name = '';
                if (isset($_FILES) && isset($_FILES['gift_image']['name']) && !empty($_FILES['gift_image']['name']))
                {
                    $uploaded_file_name = $_FILES['gift_image']['name'];
                    $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                    $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                    $this->load->library('common');
                    $upload_sts = $this->common->global_file_upload('uploads/gift_images/', 'gift_image', time() . $filename);
    
                    if (isset($upload_sts['success']) && $upload_sts['success'] == 'y')
                    {
                        $uploaded_file_name = $upload_sts['data']['file_name'];
    
                        if (!empty($uploaded_file_name))
                        {
                            $image_url = 'uploads/gift_images/' . $uploaded_file_name;
                            $data['img'] = $image_url;
                            // $data['thumb_image'] = image_resize(50, 50, $image_url, 'thu_' . $uploaded_file_name, "gift_images");
                        }
                    }
                }

                 $data['title'] = $this->input->post('title');
                if ($this->GiftModel->update($id, $data)) {
                    $message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>data edited successfully.</div>";
                }
                $this->session->set_flashdata('message', $message);
                redirect(base_url() . 'gift');
            }
        }
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function delete()
    {
        if ($this->data['admin_id'] > 1) {
            $this->session->set_flashdata('message', '<p class="alert alert-danger">Permission Denied</p>');
            redirect(base_url() . 'admin/gift');
        } else {
            $id = $this->input->post('tbl_id');
            if (!empty($id)) {
                $datalist = $this->GiftModel->get($id);
                @unlink($datalist['img']);
                $this->GiftModel->delete($id);
                $message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>data deleted successfully.</div>";
                echo 1;
            }
            $this->session->set_flashdata('message', $message);
        }
    }

}
