<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url', 'cookie'));
        $this->load->library('form_validation');
        $this->load->model('admin_models/adminCommonModel');
        $this->load->model('admin_models/order_mode');
        $this->load->model('admin_models/header_mode');
        $this->load->model('admin_models/Cate_model');
    }

    public function index(){
        $headerData = $this->header_mode->headerData();
        $cateData['cateList'] = $this->Cate_model->loadAllCate();

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/admin-category',$cateData);
        $this->load->view('admin/includes/admin-footer');
    }

    public function editCate($cateID){
        $headerData = $this->header_mode->headerData();
        $cateData['cateData'] = $this->Cate_model->getCateByID($cateID);
        $cateData['cateGroup'] = $this->Cate_model->loadAllGroupCate();

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/edit-cate',$cateData);
        $this->load->view('admin/includes/admin-footer');
    }
    public function updateCate(){
//        upload image
        $urlImg = '/resources/images/Tours/upload/rpv_img/';
        $config['upload_path'] = './resources/images/Tours/upload/rpv_img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width'] = '900';
        $config['max_height'] = '500';
        //load upload library
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('rpv_img');
        if(strlen($this->upload->data('file_name')) > 1){
            $urlImg .= $this->upload->data('file_name');
        }else{
            $urlImg = $this->input->post('rpv_img_old');
        }

        $cateGrp = $this->input->post('cate_grp');
        $cateID = $this->input->post('cate_id');
        $cateData = array(
            'CATEGORY_NM_EN'    => $this->input->post('cate_title_en'),
            'CATEGORY_NM_VI'    => $this->input->post('cate_title_vi'),
            'CATEGORY_DESC_EN'    => $this->input->post('cate_desc_en'),
            'CATEGORY_DESC_VI'    => $this->input->post('cate_desc_vi'),
            'IMG_URL'           => $urlImg,
            'GROUP_ID'          => $cateGrp,
            'MAIN_CATE'    => $this->input->post('main_cate'),
            'COLOR_CD'    => $this->input->post('color_cd'),
            'FONT_COLOR_CD'    => $this->input->post('font_color_cd')
        );
        if($this->Cate_model->updateCate($cateID, $cateData) == true){
            $this->index();
        }else{
            $this->editCate($cateID);
        }
    }

    public function addCate(){
        $headerData = $this->header_mode->headerData();
        $cateData['cateGroup'] = $this->Cate_model->loadAllGroupCate();

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/add-cate', $cateData);
        $this->load->view('admin/includes/admin-footer');
    }

    public function insertCate(){
//      upload img
        $urlImg = '/resources/images/Tours/upload/rpv_img/';
        $config['upload_path'] = './resources/images/Tours/upload/rpv_img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width'] = '900';
        $config['max_height'] = '500';
        //load upload library
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('rpv_img');
        $urlImg .= $this->upload->data('file_name');

        $cateGrp = $this->input->post('cate_grp');
        $cateID = $this->Cate_model->createCateID($cateGrp);
        $cateData = array(
            'CATEGORY_ID'       => $cateID,
            'CATEGORY_NM_EN'    => $this->input->post('cate_title_en'),
            'CATEGORY_NM_VI'    => $this->input->post('cate_title_vi'),
            'CATEGORY_DESC_EN'    => $this->input->post('cate_desc_en'),
            'CATEGORY_DESC_VI'    => $this->input->post('cate_desc_vi'),
            'IMG_URL'           => $urlImg,
            'GROUP_ID'          => $cateGrp,
            'MAIN_CATE'    => $this->input->post('main_cate'),
            'COLOR_CD'    => $this->input->post('color_cd'),
            'FONT_COLOR_CD'    => $this->input->post('font_color_cd')
        );
        if($this->Cate_model->insertCate($cateData) == true){
            $this->index();
        }else{
            $this->addCate();
        }
    }
}