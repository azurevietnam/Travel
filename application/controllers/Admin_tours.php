<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_tours extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */


    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url', 'cookie'));
        $this->load->library('form_validation');
        $this->load->model('admin_models/Admin_Tour_Model');
        $this->load->model('admin_models/adminCommonModel');
        $this->load->model('admin_models/order_mode');
        $this->load->model('admin_models/header_mode');
    }
    public function adminTours(){

        $tourData['alltour'] = $this->Admin_Tour_Model->getAllTour();
        $headerData = $this->header_mode->headerData();

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/admin-tours',$tourData);
        $this->load->view('admin/includes/admin-footer');
    }

    public function addTour(){
        $dataTour['national'] = $this->Admin_Tour_Model->getAllNational();
        $dataTour['category'] = $this->Admin_Tour_Model->getAllCategory();
        $headerData = $this->header_mode->headerData();

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/add-tours',$dataTour);
        $this->load->view('admin/includes/admin-footer');
    }

    public function addSuccess($status){
        $dataTour['national'] = $this->Admin_Tour_Model->getAllNational();
        $dataTour['category'] = $this->Admin_Tour_Model->getAllCategory();
        $dataTour['status'] = $status;
        $headerData = $this->header_mode->headerData();

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/add-tours',$dataTour);
        $this->load->view('admin/includes/admin-footer');
    }

    public function editTour($tourID){
        $dataTour['national'] = $this->Admin_Tour_Model->getAllNational();
        $dataTour['category'] = $this->Admin_Tour_Model->getAllCategory();
        $dataTour['tourData'] = $this->Admin_Tour_Model->loadTour($tourID);
        $dataTour['tourID'] = $tourID;
        $headerData = $this->header_mode->headerData();

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/edit-tours',$dataTour);
        $this->load->view('admin/includes/admin-footer');
    }

    public function removeTour($tourID){
        echo 'remove tours'.$tourID;
    }

    public function createTour(){

        $this->form_validation->set_rules('drb_national', 'Quốc gia', 'required');
        $this->form_validation->set_rules('drb_province', 'Tỉnh thành', 'required');
        $this->form_validation->set_rules('drb_category', 'Danh Mục', 'required');
        $this->form_validation->set_rules('rpv_yn', 'Bài đăng nổi bật', 'required');
        $this->form_validation->set_rules('display_yn', 'Post bài', 'required');
        $this->form_validation->set_rules('vi_title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('en_title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('text_link', 'text link', 'required');
        $this->form_validation->set_rules('shrt_cnt_vi', 'Nội dung ngắn', 'required');
        $this->form_validation->set_rules('shrt_cnt_en', 'Nội dung ngắn', 'required');
        $this->form_validation->set_rules('content_vi', 'Nội dung', 'required');
        $this->form_validation->set_rules('content_en', 'Nội dung', 'required');
        $this->form_validation->set_rules('tour_length', 'Thời gian tour', 'required');
        $this->form_validation->set_rules('trans_vi', 'Phương tiện', 'required');
        $this->form_validation->set_rules('trans_en', 'Phương tiện', 'required');
        $this->form_validation->set_rules('price_cnt_vi', 'Chi tiế giá', 'required');
        $this->form_validation->set_rules('price_cnt_en', 'Chi tiế giá', 'required');
        $this->form_validation->set_rules('note_vi', 'Lưu ý', 'required');
        $this->form_validation->set_rules('note_en', 'Lưu ý', 'required');
        $this->form_validation->set_rules('price_vi', 'Giá', 'required');
        $this->form_validation->set_rules('price_en', 'Giá', 'required');
        $this->form_validation->set_rules('note_en', 'Giá', 'required');
        $this->form_validation->set_rules('note_vi', 'Giá', 'required');
        $this->form_validation->set_rules('str_dpt_province', 'Địa điểm xuất phát', 'required');
        $this->form_validation->set_rules('str_dpt_time', 'Thời gian xuất phát', 'required');
        $this->form_validation->set_rules('str_arv_province', 'Điểm đến', 'required');
        $this->form_validation->set_rules('str_arv_time', 'thời gian đến', 'required');
        $this->form_validation->set_rules('end_dpt_province', 'Địa điểm trở về', 'required');
        $this->form_validation->set_rules('end_dpt_time', 'Thời gian trở về', 'required');
        $this->form_validation->set_rules('end_arv_province', 'Địa điểm kết thúc tour', 'required');
        $this->form_validation->set_rules('end_arv_time', 'Thời gian kết thúc tour', 'required');
        $this->form_validation->set_rules('x_place', 'Tọa độ bản đồ X', 'required');
        $this->form_validation->set_rules('y_place', 'Tọa độ bản đồ Y', 'required');
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

            //create tour info
            $cateID = $this->input->post('drb_category');

            $tourID = $this->adminCommonModel->createID($cateID,'tours','TOURS_ID');

            //get from post info
            $tourData = array(
                'TOURS_ID'						=> $tourID,
                'LOCATION_ID'					=> $this->input->post('drb_province'),
                'CATEGORY_ID'					=> $this->input->post('drb_category'),
                'RPV_YN'						=> $this->input->post('rpv_yn'),
                'TOURS_TIT_EN'					=> $this->input->post('en_title'),
                'TOURS_TIT_VI'					=> $this->input->post('vi_title'),
                'TEXT_LINK'					    => $this->input->post('text_link'),
                'TOURS_SHRT_CNT_EN'				=> $this->input->post('shrt_cnt_en'),
                'TOURS_SHRT_CNT_VI'				=> $this->input->post('shrt_cnt_vi'),
                'TOURS_CNT_EN'					=> $this->input->post('content_en'),
                'TOURS_CNT_VI'					=> $this->input->post('content_vi'),
                'TOURS_RPV_IMG_URL'				=> $urlImg,
                'TOURS_LENGTH'					=> $this->input->post('tour_length'),
                'TOURS_TRANSPORT_EN'			=> $this->input->post('trans_en'),
                'TOURS_TRANSPORT_VI'			=> $this->input->post('trans_vi'),
                'TOURS_PRICE_CNT_EN'			=> $this->input->post('price_cnt_en'),
                'TOURS_PRICE_CNT_VI'			=> $this->input->post('price_cnt_vi'),
                'TOURS_PRICE_EN'				=> $this->input->post('price_en'),
                'TOURS_PRICE_VI'				=> $this->input->post('price_vi'),
                'DISCOUNT'						=> $this->input->post('discount'),
                'TOURS_REMARK_EN'				=> $this->input->post('note_en'),
                'TOURS_REMARK_VI'				=> $this->input->post('note_vi'),
                'START_ARRIVAL_LOCATION'		=> $this->input->post('str_arv_province'),
                'START_DEPARTURE_LOCATION'		=> $this->input->post('str_dpt_province'),
                'START_ARRIVAL_TIME'			=> $this->input->post('str_arv_time'),
                'START_DEPARTURE_TIME'			=> $this->input->post('str_dpt_time'),
                'END_ARRIVAL_LOCATION'			=> $this->input->post('end_arv_province'),
                'END_DEPARTURE_LOCATION'		=> $this->input->post('end_dpt_province'),
                'END_ARRIVAL_TIME'				=> $this->input->post('end_arv_time'),
                'END_DEPARTURE_TIME'			=> $this->input->post('end_dpt_time'),
                'MAP_PLACE_X'					=> $this->input->post('x_place'),
                'MAP_PLACE_Y'					=> $this->input->post('y_place'),
                'IMG_GRP_ID'					=> $tourID,
                'DISPLAY_YN'					=> $this->input->post('display_yn'),
                'META_TITLE_EN'					=> $this->input->post('en_meta_title'),
                'DESCRIPTION_EN'				=> $this->input->post('en_description'),
                'KEYWORDS_EN'					=> $this->input->post('en_keywords'),
                'META_TITLE_VI'					=> $this->input->post('vi_meta_title'),
                'DESCRIPTION_VI'				=> $this->input->post('vi_description'),
                'KEYWORDS_VI'					=> $this->input->post('vi_keywords')
            );
//            var_dump($tourData);
            if($this->Admin_Tour_Model->addTour($tourData) == true){
                $this->adminTours();
            }else{
                $this->addTour();
            }
        }
        else{
            $this.redirect(base_url('admin_tours/addTour'));
        }
    }

    public function updateTour(){
        $this->form_validation->set_rules('drb_national', 'Quốc gia', 'required');
        $this->form_validation->set_rules('drb_province', 'Tỉnh thành', 'required');
        $this->form_validation->set_rules('drb_category', 'Danh Mục', 'required');
        $this->form_validation->set_rules('vi_title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('en_title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('text_link', 'text link', 'required');
        $this->form_validation->set_rules('shrt_cnt_vi', 'Nội dung ngắn', 'required');
        $this->form_validation->set_rules('shrt_cnt_en', 'Nội dung ngắn', 'required');
        $this->form_validation->set_rules('content_vi', 'Nội dung', 'required');
        $this->form_validation->set_rules('content_en', 'Nội dung', 'required');
        $this->form_validation->set_rules('tour_length', 'Thời gian tour', 'required');
        $this->form_validation->set_rules('trans_vi', 'Phương tiện', 'required');
        $this->form_validation->set_rules('trans_en', 'Phương tiện', 'required');
        $this->form_validation->set_rules('price_cnt_vi', 'Chi tiế giá', 'required');
        $this->form_validation->set_rules('price_cnt_en', 'Chi tiế giá', 'required');
        $this->form_validation->set_rules('note_vi', 'Lưu ý', 'required');
        $this->form_validation->set_rules('note_en', 'Lưu ý', 'required');
        $this->form_validation->set_rules('price_vi', 'Giá', 'required');
        $this->form_validation->set_rules('price_en', 'Giá', 'required');
        $this->form_validation->set_rules('note_en', 'Giá', 'required');
        $this->form_validation->set_rules('note_vi', 'Giá', 'required');
        $this->form_validation->set_rules('str_dpt_province', 'Địa điểm xuất phát', 'required');
        $this->form_validation->set_rules('str_dpt_time', 'Thời gian xuất phát', 'required');
        $this->form_validation->set_rules('str_arv_province', 'Điểm đến', 'required');
        $this->form_validation->set_rules('str_arv_time', 'thời gian đến', 'required');
        $this->form_validation->set_rules('end_dpt_province', 'Địa điểm trở về', 'required');
        $this->form_validation->set_rules('end_dpt_time', 'Thời gian trở về', 'required');
        $this->form_validation->set_rules('end_arv_province', 'Địa điểm kết thúc tour', 'required');
        $this->form_validation->set_rules('end_arv_time', 'Thời gian kết thúc tour', 'required');
        $this->form_validation->set_rules('x_place', 'Tọa độ bản đồ X', 'required');
        $this->form_validation->set_rules('y_place', 'Tọa độ bản đồ Y', 'required');
        $this->form_validation->set_rules('vi_meta_title', 'thẻ meta', 'required');
        $this->form_validation->set_rules('en_meta_title', 'thẻ meta', 'required');
        $this->form_validation->set_rules('vi_description', 'description', 'required');
        $this->form_validation->set_rules('en_description', 'description', 'required');
        $this->form_validation->set_rules('vi_keywords', 'Từ khóa', 'required');
        $this->form_validation->set_rules('en_keywords', 'Từ khóa', 'required');

        $tourID = $this->input->post('tourID');

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
            //get from post info
            $tourData = array(
                'LOCATION_ID'					=> $this->input->post('drb_province'),
                'CATEGORY_ID'					=> $this->input->post('drb_category'),
                'RPV_YN'						=> $this->input->post('rpv_yn'),
                'TOURS_TIT_EN'					=> $this->input->post('en_title'),
                'TOURS_TIT_VI'					=> $this->input->post('vi_title'),
                'TEXT_LINK'					    => $this->input->post('text_link'),
                'TOURS_SHRT_CNT_EN'				=> $this->input->post('shrt_cnt_en'),
                'TOURS_SHRT_CNT_VI'				=> $this->input->post('shrt_cnt_vi'),
                'TOURS_CNT_EN'					=> $this->input->post('content_en'),
                'TOURS_CNT_VI'					=> $this->input->post('content_vi'),
                'TOURS_RPV_IMG_URL'				=> $urlImg,
                'TOURS_LENGTH'					=> $this->input->post('tour_length'),
                'TOURS_TRANSPORT_EN'			=> $this->input->post('trans_en'),
                'TOURS_TRANSPORT_VI'			=> $this->input->post('trans_vi'),
                'TOURS_PRICE_CNT_EN'			=> $this->input->post('price_cnt_en'),
                'TOURS_PRICE_CNT_VI'			=> $this->input->post('price_cnt_vi'),
                'TOURS_PRICE_EN'				=> $this->input->post('price_en'),
                'TOURS_PRICE_VI'				=> $this->input->post('price_vi'),
                'DISCOUNT'						=> $this->input->post('discount'),
                'TOURS_REMARK_EN'				=> $this->input->post('note_en'),
                'TOURS_REMARK_VI'				=> $this->input->post('note_vi'),
                'START_ARRIVAL_LOCATION'		=> $this->input->post('str_arv_province'),
                'START_DEPARTURE_LOCATION'		=> $this->input->post('str_dpt_province'),
                'START_ARRIVAL_TIME'			=> $this->input->post('str_arv_time'),
                'START_DEPARTURE_TIME'			=> $this->input->post('str_dpt_time'),
                'END_ARRIVAL_LOCATION'			=> $this->input->post('end_arv_province'),
                'END_DEPARTURE_LOCATION'		=> $this->input->post('end_dpt_province'),
                'END_ARRIVAL_TIME'				=> $this->input->post('end_arv_time'),
                'END_DEPARTURE_TIME'			=> $this->input->post('end_dpt_time'),
                'MAP_PLACE_X'					=> $this->input->post('x_place'),
                'MAP_PLACE_Y'					=> $this->input->post('y_place'),
                'DISPLAY_YN'					=> $this->input->post('display_yn'),
                'META_TITLE_EN'					=> $this->input->post('en_meta_title'),
                'DESCRIPTION_EN'				=> $this->input->post('en_description'),
                'KEYWORDS_EN'					=> $this->input->post('en_keywords'),
                'META_TITLE_VI'					=> $this->input->post('vi_meta_title'),
                'DESCRIPTION_VI'				=> $this->input->post('vi_description'),
                'KEYWORDS_VI'					=> $this->input->post('vi_keywords')
            );
//            var_dump($tourData);
            if($this->Admin_Tour_Model->updateTour($tourID, $tourData) == true){
                $this->adminTours();
            }else{
                $this.redirect(base_url('admin_tours/editTour/'.$tourID));
            }
        }
        else{
            $this.redirect(base_url('admin_tours/editTour/'.$tourID));
        }
    }

    public function addNational(){

        $this->form_validation->set_rules('add_national', 'Country name', 'required|is_unique[national.NATIONAL_NAME]');

        $national = $this->input->post('add_national');

        if ($this->form_validation->run() == TRUE) {
            $localData = array(
                'NATIONAL_NAME' => $national
            );
            if ($this->Admin_Tour_Model->addNational($localData) == true) {
                $this->addSuccess('success');
            } else {
                $this->addSuccess('fail');
            }
        }else{
            $this->addSuccess('fail');
        }
    }

    public function addLocation(){
        $this->form_validation->set_rules('drb_national', 'Country name', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('add_province_vi', 'Province Vi name', 'required');
        $this->form_validation->set_rules('add_province_en', 'Province En name', 'required');

        $nationalID = $this->input->post('drb_national');
        $provinceViNm = $this->input->post('add_province_vi');
        $provinceEnNm = $this->input->post('add_province_en');

        if ($this->form_validation->run() == TRUE) {
            $localData = array(
                'NATIONAL_ID' => $nationalID,
                'LOCATION_NM_EN' => $provinceEnNm,
                'LOCATION_NM_VI' => $provinceViNm
            );
            if ($this->Admin_Tour_Model->addLocation($localData) == true) {
                $this->addSuccess('success');
            } else {
                $this->addSuccess('fail');
            }
        }else{
            $this->addSuccess('fail');
        }
    }

    public function getLocation(){
        $nationalID = $this->input->post('national');
        if($nationalID != null || $nationalID > 0){
            $provinceData = $this->Admin_Tour_Model->getLocalByNationID($nationalID);
            $output = null;
            foreach ($provinceData as $row)
            {
                $output .= "<option value='".$row->LOCATION_ID."'>".$row->LOCATION_NM_VI."</option>";
            }
            echo $output;
        }
    }

    //load all tour images
    public function images($tourID){

        $data['tourID'] = $tourID;
        $data['tourImages'] = $this->loadTourImage($tourID);
        $headerData = $this->header_mode->headerData();

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/add-images',$data);
        $this->load->view('admin/includes/admin-footer');
//        if(isset($tourID)){
//            $imgData = $this->Admin_Tour_Model->loadImages($tourID);
//        }
    }

    public function uploadImages(){
        $tourID = $this->input->post('tourID');

        $start = 'start';
        $sLoop = 1;
        while ($start == 'start'){
            $ctrlID = 'image_n0'.$sLoop;
            $imgCtrlID = 'tour_img'.$sLoop;
            $elePostID = $this->input->post($ctrlID);
            if(isset($elePostID)){
                $imgID = $this->Admin_Tour_Model->getImgSeq($tourID);
                // upload image and get img url $urlImg
                $urlImg = '/resources/images/Tours/upload/tour_img/';
                $config['upload_path'] = './resources/images/Tours/upload/tour_img/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2000';
                $config['max_width'] = '1012';
                $config['max_height'] = '600';
                //load upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload($imgCtrlID);
                $urlImg .= $this->upload->data('file_name');

                $imgData = array(
                    'IMG_ID' => $imgID,
                    'IMG_GRP_ID' => $tourID,
                    'IMG_URL' => $urlImg,
                    'IMG_ALT' => $this->input->post($ctrlID)
                );
                $instStatus = $this->Admin_Tour_Model->insertTourImg($imgData);
                if($instStatus == false){
                    $start = 'end';
                }
                $sLoop ++;
            }else{
                $start = 'end';
            }
        }
        $this.redirect(base_url('admin_tours/images/'.$tourID));
    }

    public function loadTourImage($tourID){
        $tourImages = $this->Admin_Tour_Model->loadTourImages($tourID);
        return $tourImages;
    }

    public function updateImages(){
        $tourID = $this->input->post('tourID');
        $start = 'start';
        $sLoop = 1;
        while ($start == 'start'){
            $ctrlImgID = 'imgID'.$sLoop;
            $imgID = $this->input->post($ctrlImgID);
            if(isset($imgID)){
                $cbxUpdate = $this->input->post('cbxUpdate'.$sLoop);
                $imgAlt = $this->input->post('img_alt'.$sLoop);
                if($cbxUpdate == 'U'){
                    $imgData = array(
                        'IMG_ALT' => $imgAlt
                    );
                    $this->Admin_Tour_Model->updateImg($imgData, $imgID);
                }else{
                    $this->Admin_Tour_Model->deleteImg($imgID);
                }
                $sLoop++;
            }else{
                $start = 'end';
            }
        }
        $this.redirect(base_url('admin_tours/images/'.$tourID));
    }

    public function schedule($tourID){
        $data['tourID'] = $tourID;
        $data['tourSchedule'] = $this->Admin_Tour_Model->loadTourSchedule($tourID);
        $headerData = $this->header_mode->headerData();

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/tour-schedule',$data);
        $this->load->view('admin/includes/admin-footer');
    }

    public function insertSchedule(){
        $tourID = $this->input->post('tourID');

        $start = 'start';
        $sLoop = 1;
        while ($start == 'start'){
            $ctrlID = 'txt_day_'.$sLoop;
            $elePostID = $this->input->post($ctrlID);
            if(isset($elePostID)){
                $scheID = $this->Admin_Tour_Model->getScdSeq($tourID);
                $scheData = array(
                    'SCHEDULE_ID' => $scheID,
                    'TOUR_ID' => $tourID,
                    'DAYS' => $this->input->post('txt_day_'.$sLoop),
                    'DEPARTURE_TIME' => $this->input->post('start_time_'.$sLoop),
                    'ARRIVAL_TIME' => $this->input->post('end_time_'.$sLoop),
                    'SCHEDULE_CONTENT_EN' => $this->input->post('cnt_en_'.$sLoop),
                    'SCHEDULE_CONTENT_VI' => $this->input->post('cnt_vi_'.$sLoop)
                );
                $instStatus = $this->Admin_Tour_Model->insertSchedule($scheData);
                if($instStatus == false){
                    $start = 'end';
                }
                $sLoop ++;
            }else{
                $start = 'end';
            }
        }
        $this.redirect(base_url('admin_tours/schedule/'.$tourID));
    }

    public function updateSchedule(){
        $tourID = $this->input->post('tourID');

        $start = 'start';
        $sLoop = 1;
        while ($start == 'start'){
            $ctrlScheID = 'scheID_'.$sLoop;
            $scheID = $this->input->post($ctrlScheID);
            if(isset($scheID)){
                $cbxUpdate = $this->input->post('cbxUpdate'.$sLoop);
                if($cbxUpdate == 'U'){
                    $scheData = array(
                        'DAYS' => $this->input->post('txt_day_'.$sLoop),
                        'DEPARTURE_TIME' => $this->input->post('start_time_'.$sLoop),
                        'ARRIVAL_TIME' => $this->input->post('end_time_'.$sLoop),
                        'SCHEDULE_CONTENT_EN' => $this->input->post('cnt_en_'.$sLoop),
                        'SCHEDULE_CONTENT_VI' =>$this->input->post('cnt_vi_'.$sLoop)
                    );
                    $this->Admin_Tour_Model->updateSchedule($scheID, $scheData);
                }else{
                    $this->Admin_Tour_Model->deleteSchedule($scheID);
                }
                $sLoop++;
            }else{
                $start = 'end';
            }
        }
        $this.redirect(base_url('admin_tours/schedule/'.$tourID));
    }
}