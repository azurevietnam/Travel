<?php
/**
 * Created by PhpStorm.
 * User: HAILONG_ICT
 * Date: 12/18/2015
 * Time: 11:05 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_news extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url', 'cookie'));
        $this->load->library('form_validation');
        $this->load->model('admin_models/Admin_Tour_Model');
        $this->load->model('admin_models/adminCommonModel');
        $this->load->model('admin_models/order_mode');
        $this->load->model('admin_models/header_mode');
        $this->load->model('admin_models/Admin_news_model');
    }

    public function newsList(){

        $headerData = $this->header_mode->headerData();
        $data['newsCate'] = $this->Admin_news_model->loadAllCateByGroup('N');

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/news-list',$data);
        $this->load->view('admin/includes/admin-footer');
    }

    public function getAllPostByCateId(){
        $cateID = $this->input->post('cateId');
        if($cateID != null || $cateID != ""){
            $newList = $this->Admin_news_model->loadAllNewsByCateID($cateID);

            echo '<table class="table table-bordered table-striped mb-none" id="datatable-news">
                <thead>
                <tr>
                    <th>Tiêu Đề</th>
                    <th>Ngày Tạo</th>
                    <th>Trạng Thái</th>
                    <th>Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>';
            foreach($newList as $row){
                echo'
                 <tr class="gradeX">
                            <td><a href="'.base_url('home/news/'.$row->NEWS_ID).'">'.$row->NEWS_TITLE_VI.'</a></td>
                            <td>'.$row->CREATE_TIMESTAMP.'</td>
                            <td>'.($row->STATUS == "1"? "Kích hoạt" :"Hết hạn").'</td>
                            <td class="actions">
                                <a href="'.base_url('admin_news/editNews/'.$row->NEWS_ID).'"><i class="fa fa-pencil" style="color:red"></i></a>
                            </td>
                        </tr>
                ';
            }

            echo '</tbody> </table>';
        }
    }

    public function addNews(){
        $headerData = $this->header_mode->headerData();
        $data['newsCate'] = $this->Admin_news_model->loadAllCateByGroup('N');

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/news-edit', $data);
        $this->load->view('admin/includes/admin-footer');
    }
    public function insertNews(){

        $this->form_validation->set_rules('vi_title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('en_title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('shrt_cnt_vi', 'Nội dung ngắn', 'required');
        $this->form_validation->set_rules('shrt_cnt_en', 'Nội dung ngắn', 'required');
        $this->form_validation->set_rules('content_vi', 'Nội dung', 'required');
        $this->form_validation->set_rules('content_en', 'Nội dung', 'required');
        $this->form_validation->set_rules('vi_meta_title', 'thẻ meta', 'required');
        $this->form_validation->set_rules('en_meta_title', 'thẻ meta', 'required');
        $this->form_validation->set_rules('vi_description', 'description', 'required');
        $this->form_validation->set_rules('en_description', 'description', 'required');
        $this->form_validation->set_rules('vi_keywords', 'Từ khóa', 'required');
        $this->form_validation->set_rules('en_keywords', 'Từ khóa', 'required');

        if ($this->form_validation->run() == TRUE) {
            // upload represent image
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

            $newsData = array(
                'CATEGORY_ID'       =>      $this->input->post('drb_category'),
                'NEWS_TITLE_EN'       =>      $this->input->post('en_title'),
                'NEWS_TITLE_VI'       =>      $this->input->post('vi_title'),
                'NEWS_SHRT_CNT_EN'       =>      $this->input->post('shrt_cnt_en'),
                'NEWS_SHRT_CNT_VI'       =>      $this->input->post('shrt_cnt_vi'),
                'NEWS_CONTENT_EN'       =>      $this->input->post('content_en'),
                'NEWS_CONTENT_VI'       =>      $this->input->post('content_vi'),
                'NEWS_RPV_IMG'       =>      $urlImg,
                'META_TITLE_EN'       =>      $this->input->post('en_meta_title'),
                'META_DESC_EN'       =>      $this->input->post('en_description'),
                'META_KEYWORD_EN'       =>      $this->input->post('en_keywords'),
                'META_TITLE_VI'       =>      $this->input->post('vi_meta_title'),
                'META_DESC_VI'       =>      $this->input->post('vi_description'),
                'META_KEYWORD_VI'       =>      $this->input->post('vi_keywords')
            );

            if($this->Admin_news_model->insertNews($newsData) == true){
                $this->newsList();
            }else{
                $this->addNews();
            }
        }else{
            $this.redirect(base_url('admin_news/newsEdit'));
        }
    }

    public function editNews($newsID){
        $headerData = $this->header_mode->headerData();
        $data['newsCate'] = $this->Admin_news_model->loadAllCateByGroup('N');
        $data['postData'] = $this->Admin_news_model->loadNewsByID($newsID);

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/news-edit', $data);
        $this->load->view('admin/includes/admin-footer');
    }
    public function updateNews(){
        $this->form_validation->set_rules('vi_title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('en_title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('shrt_cnt_vi', 'Nội dung ngắn', 'required');
        $this->form_validation->set_rules('shrt_cnt_en', 'Nội dung ngắn', 'required');
        $this->form_validation->set_rules('content_vi', 'Nội dung', 'required');
        $this->form_validation->set_rules('content_en', 'Nội dung', 'required');
        $this->form_validation->set_rules('vi_meta_title', 'thẻ meta', 'required');
        $this->form_validation->set_rules('en_meta_title', 'thẻ meta', 'required');
        $this->form_validation->set_rules('vi_description', 'description', 'required');
        $this->form_validation->set_rules('en_description', 'description', 'required');
        $this->form_validation->set_rules('vi_keywords', 'Từ khóa', 'required');
        $this->form_validation->set_rules('en_keywords', 'Từ khóa', 'required');

        if ($this->form_validation->run() == TRUE) {
            // upload represent image
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

            $newsData = array(
                'CATEGORY_ID'       =>      $this->input->post('drb_category'),
                'NEWS_TITLE_EN'       =>      $this->input->post('en_title'),
                'NEWS_TITLE_VI'       =>      $this->input->post('vi_title'),
                'NEWS_SHRT_CNT_EN'       =>      $this->input->post('shrt_cnt_en'),
                'NEWS_SHRT_CNT_VI'       =>      $this->input->post('shrt_cnt_vi'),
                'NEWS_CONTENT_EN'       =>      $this->input->post('content_en'),
                'NEWS_CONTENT_VI'       =>      $this->input->post('content_vi'),
                'NEWS_RPV_IMG'       =>      $urlImg,
                'META_TITLE_EN'       =>      $this->input->post('en_meta_title'),
                'META_DESC_EN'       =>      $this->input->post('en_description'),
                'META_KEYWORD_EN'       =>      $this->input->post('en_keywords'),
                'META_TITLE_VI'       =>      $this->input->post('vi_meta_title'),
                'META_DESC_VI'       =>      $this->input->post('vi_description'),
                'META_KEYWORD_VI'       =>      $this->input->post('vi_keywords')
            );
            $newsID = $this->input->post('news_id');

            if($this->Admin_news_model->updateNews($newsData, $newsID) == true){
                $this->newsList();
            }else{
                $this->addNews();
            }
        }else{
            $this.redirect(base_url('admin_news/newsEdit'));
        }
    }
}