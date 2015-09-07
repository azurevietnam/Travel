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
        $this->load->model('admin_models/CateModel');
    }

    public function index(){
        $headerData = $this->header_mode->headerData();
        $cateData['cateList'] = $this->CateModel->loadAllCate();

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/admin-category',$cateData);
        $this->load->view('admin/includes/admin-footer');
    }

    public function updateCate($cateID){

    }

    public function addCate(){
        $headerData = $this->header_mode->headerData();
        $cateData['cateGroup'] = $this->CateModel->loadAllGroupCate();

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/add-cate', $cateData);
        $this->load->view('admin/includes/admin-footer');
    }

    public function insertCate(){
        $cateGrp = $this->input->post('cate_grp');
        $cateID = $this->CateModel->createCateID($cateGrp);
        $cateData = array(
            'CATEGORY_ID'       => $cateID,
            'CATEGORY_NM_EN'    => $this->input->post('cate_title_en'),
            'CATEGORY_NM_VI'    => $this->input->post('cate_title_vi'),
            'GROUP_ID'          => $cateGrp
        );
        if($this->CateModel->insertCate($cateData) == true){
            $this->index();
        }else{
            $this->addCate();
        }
    }
}