<?php
/**
 * Created by PhpStorm.
 * User: HAILONG_ICT
 * Date: 12/4/2015
 * Time: 10:08 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if(!($this->session->userdata('language'))){
            $this->session->set_userdata('language', 'vietnam');
            $this->session->set_userdata('lang_code', 'VI');
        }
        $this->load->model('Index_model');
    }

    public function loadTourCate(){
        $cateID = $this->input->post('cateid');
        if($cateID != null || $cateID != ""){
            $tourGrp = $this->Index_model->loadTourbyCategory($cateID);
            $output = null;
            echo '<option value=""></option>';
            foreach ($tourGrp as $row)
            {
                $output .= "<option value='".$row->TOURS_ID."'>".$row->TOURS_TITLE."</option>";
            }
            echo $output;
        }
    }

    /*
     * insert hotel request
     */
    public function insertHotelRequest(){
        $this->form_validation->set_rules('c_name', 'Cust name', 'required');
        $this->form_validation->set_rules('c_phone', 'Cust phone', 'required');
        $this->form_validation->set_rules('c_email', 'Cust email', 'required');
        $this->form_validation->set_rules('c_address', 'Cust address', 'required');

        if ($this->form_validation->run() == TRUE) {
            $reqData = array(
                'CUST_NAME' => $this->input->post('c_name'),
                'CUST_EMAIL' => $this->input->post('c_email'),
                'CUST_PHONE' => $this->input->post('c_phone'),
                'CUST_ADDRESS' => $this->input->post('c_address'),
                'CUST_CONTENT' => $this->input->post('c_request'),
                'FROM_DATE' => date('Y-m-d',strtotime($this->input->post('f_date'))),
                'TO_DATE' => date('Y-m-d',strtotime($this->input->post('t_date'))),
                'HOTEL_TP' => $this->input->post('h_type'),
                'ROOM_QTY' => $this->input->post('h_room'),
                'ADULT_QTY' => $this->input->post('a_adult'),
                'KID_QTY' => $this->input->post('a_kid')
            );
            if ($this->Index_model->insertHotelRequest($reqData) == true) {
                $data['message'] = "success";
                $hData['toursCate'] = $this->Index_model->loadTourCate();
                $hData['newsCate'] = $this->Index_model->loadNewsCate();
                $hData['toursQBCate'] = $this->Index_model->tourGroup('Q');

                $this->load->view('includes/short-header',$hData);
                $this->load->view('success',$data);
                $this->load->view('includes/footer');
            } else {
                $data['error'] = validation_errors();
                $data['message'] = "fail";
                $hData['toursCate'] = $this->Index_model->loadTourCate();
                $hData['newsCate'] = $this->Index_model->loadNewsCate();
                $hData['toursQBCate'] = $this->Index_model->tourGroup('Q');

                $this->load->view('includes/short-header',$hData);
                $this->load->view('success',$data);
                $this->load->view('includes/footer');
            }
        }else{
            $data['error'] = validation_errors();
            $data['message'] = "fail";
            $hData['toursCate'] = $this->Index_model->loadTourCate();
            $hData['newsCate'] = $this->Index_model->loadNewsCate();
            $hData['toursQBCate'] = $this->Index_model->tourGroup('Q');

            $this->load->view('includes/short-header',$hData);
            $this->load->view('success',$data);
            $this->load->view('includes/footer');
        }
    }

    /*
     * insert restaurant request
     */
    public function insertRestaurantRequest(){
        $this->form_validation->set_rules('c_name', 'Cust name', 'required');
        $this->form_validation->set_rules('c_phone', 'Cust phone', 'required');
        $this->form_validation->set_rules('c_email', 'Cust email', 'required');
        $this->form_validation->set_rules('c_address', 'Cust address', 'required');

        if ($this->form_validation->run() == TRUE) {
            $reqData = array(
                'CUST_NAME' => $this->input->post('c_name'),
                'CUST_EMAIL' => $this->input->post('c_email'),
                'CUST_PHONE' => $this->input->post('c_phone'),
                'CUST_ADDRESS' => $this->input->post('c_address'),
                'CUST_CONTENT' => $this->input->post('c_request'),
                'FROM_DATE' => date('Y-m-d',strtotime($this->input->post('f_date1'))),
                'TO_DATE' => date('Y-m-d',strtotime($this->input->post('t_date1'))),
                'MEALS' => $this->input->post('c_meal'),
                'ADULT_QTY' => $this->input->post('a_adult'),
                'KID_QTY' => $this->input->post('a_kid')
            );
            if ($this->Index_model->insertRestaurantRequest($reqData) == true) {
                $data['message'] = "success";
                $hData['toursCate'] = $this->Index_model->loadTourCate();
                $hData['newsCate'] = $this->Index_model->loadNewsCate();
                $hData['toursQBCate'] = $this->Index_model->tourGroup('Q');
                $this->load->view('includes/short-header',$hData);
                $this->load->view('success',$data);
                $this->load->view('includes/footer');
            } else {
                $data['error'] = validation_errors();
                $data['message'] = "fail";
                $hData['toursCate'] = $this->Index_model->loadTourCate();
                $hData['newsCate'] = $this->Index_model->loadNewsCate();
                $hData['toursQBCate'] = $this->Index_model->tourGroup('Q');
                $this->load->view('includes/short-header',$hData);
                $this->load->view('success',$data);
                $this->load->view('includes/footer');
            }
        }else{
            $data['error'] = validation_errors();
            $data['message'] = "fail";
            $hData['toursCate'] = $this->Index_model->loadTourCate();
            $hData['newsCate'] = $this->Index_model->loadNewsCate();
            $hData['toursQBCate'] = $this->Index_model->tourGroup('Q');
            $this->load->view('includes/short-header',$hData);
            $this->load->view('success',$data);
            $this->load->view('includes/footer');
        }
    }

    /*
     * insert restaurant request
     */
    public function insertCarRequest(){
        $this->form_validation->set_rules('c_name', 'Cust name', 'required');
        $this->form_validation->set_rules('c_phone', 'Cust phone', 'required');
        $this->form_validation->set_rules('c_email', 'Cust email', 'required');
        $this->form_validation->set_rules('c_address', 'Cust address', 'required');

        if ($this->form_validation->run() == TRUE) {
            $reqData = array(
                'CUST_NAME' => $this->input->post('c_name'),
                'CUST_EMAIL' => $this->input->post('c_email'),
                'CUST_PHONE' => $this->input->post('c_phone'),
                'CUST_ADDRESS' => $this->input->post('c_address'),
                'CUST_CONTENT' => $this->input->post('c_request'),
                'FROM_DATE' => date('Y-m-d',strtotime($this->input->post('f_date2'))),
                'TO_DATE' => date('Y-m-d',strtotime($this->input->post('t_date2'))),
                'CAR_TP' => $this->input->post('c_type'),
                'CAR_QTY' => $this->input->post('c_quantity')
            );
            if ($this->Index_model->insertCarRequest($reqData) == true) {
                $data['message'] = "success";
                $hData['toursCate'] = $this->Index_model->loadTourCate();
                $hData['newsCate'] = $this->Index_model->loadNewsCate();
                $hData['toursQBCate'] = $this->Index_model->tourGroup('Q');
                $this->load->view('includes/short-header',$hData);
                $this->load->view('success',$data);
                $this->load->view('includes/footer');
            } else {
                $data['error'] = validation_errors();
                $data['message'] = "fail";
                $hData['toursCate'] = $this->Index_model->loadTourCate();
                $hData['newsCate'] = $this->Index_model->loadNewsCate();
                $hData['toursQBCate'] = $this->Index_model->tourGroup('Q');
                $this->load->view('includes/short-header',$hData);
                $this->load->view('success',$data);
                $this->load->view('includes/footer');
            }
        }else{
            $data['error'] = validation_errors();
            $data['message'] = "fail";
            $hData['toursCate'] = $this->Index_model->loadTourCate();
            $hData['newsCate'] = $this->Index_model->loadNewsCate();
            $hData['toursQBCate'] = $this->Index_model->tourGroup('Q');
            $this->load->view('includes/short-header',$hData);
            $this->load->view('success',$data);
            $this->load->view('includes/footer');
        }
    }

    /*
     * insert restaurant request
     */
    public function insertTourRequest(){
        $this->form_validation->set_rules('c_name', 'Cust name', 'required');
        $this->form_validation->set_rules('c_phone', 'Cust phone', 'required');
        $this->form_validation->set_rules('c_email', 'Cust email', 'required');
        $this->form_validation->set_rules('c_address', 'Cust address', 'required');

        if ($this->form_validation->run() == TRUE) {
            $reqData = array(
                'TOURS_ID' => $this->input->post('drb_tourGrp'),
                'CUST_NAME' => $this->input->post('c_name'),
                'CUST_EMAIL' => $this->input->post('c_email'),
                'CUST_PHONE' => $this->input->post('c_phone'),
                'CUST_ADDRESS' => $this->input->post('c_address'),
                'CUST_CONTENT' => $this->input->post('c_request'),
                'FROM_DATE' => date('Y-m-d',strtotime($this->input->post('f_date3'))),
                'TO_DATE' => date('Y-m-d',strtotime($this->input->post('t_date3'))),
                'ADULTS' => $this->input->post('a_adult'),
                'KIDS' => $this->input->post('a_kid')
            );
            if ($this->Index_model->insertTourRequest($reqData) == true) {
                $data['message'] = "success";
                $hData['toursCate'] = $this->Index_model->loadTourCate();
                $hData['newsCate'] = $this->Index_model->loadNewsCate();
                $hData['toursQBCate'] = $this->Index_model->tourGroup('Q');
                $this->load->view('includes/short-header',$hData);
                $this->load->view('success',$data);
                $this->load->view('includes/footer');
            } else {
                $data['error'] = validation_errors();
                $data['message'] = "fail";
                $hData['toursCate'] = $this->Index_model->loadTourCate();
                $hData['newsCate'] = $this->Index_model->loadNewsCate();
                $hData['toursQBCate'] = $this->Index_model->tourGroup('Q');
                $this->load->view('includes/short-header',$hData);
                $this->load->view('success',$data);
                $this->load->view('includes/footer');
            }
        }else{
            $data['error'] = validation_errors();
            $data['message'] = "fail";
            $hData['toursCate'] = $this->Index_model->loadTourCate();
            $hData['newsCate'] = $this->Index_model->loadNewsCate();
            $hData['toursQBCate'] = $this->Index_model->tourGroup('Q');
            $this->load->view('includes/short-header',$hData);
            $this->load->view('success',$data);
            $this->load->view('includes/footer');
        }
    }

    /*
     * load tour group
     */
    public function tourGroup($grpID){
        $data['tourGroup'] = $this->Index_model->tourGroup($grpID);
        $hData['toursCate'] = $this->Index_model->loadTourCate();
        $hData['newsCate'] = $this->Index_model->loadNewsCate();
        $hData['toursQBCate'] = $this->Index_model->tourGroup($grpID);

        $this->load->view('includes/short-header',$hData);
        $this->load->view('tours-group', $data);
        $this->load->view('includes/footer');
    }

    /*
     * get news list
     */
    public function newsList($cateID){
        if(isset($cateID)){
            $data['pages'] = ceil($this->Index_model->pagesPaging($cateID) / 9);
            $data['CATE_ID'] = $cateID;
            $hData['toursCate'] = $this->Index_model->loadTourCate();
            $hData['newsCate'] = $this->Index_model->loadNewsCate();
            $hData['toursQBCate'] = $this->Index_model->tourGroup('Q');

            $this->load->view('includes/short-header',$hData);
            $this->load->view('news-list', $data);
            $this->load->view('includes/footer');
        }
    }

    public function loadNews($cateID){
        if($_POST) {
            //sanitize post value
            $group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
            //throw HTTP error if group number is not valid
            if(!is_numeric($group_number)){
                header('HTTP/1.1 500 Invalid number!');
                exit();
            }
            //get current starting point of records
            $position = ($group_number * 4);
            $queryResult = $this->Index_model->loadNews($cateID,$position);
            foreach($queryResult as $row){
                echo '<div class="col-sm-6 col-md-4 col-lg-3">
                        <article class="box">
                                <a href="'.base_url('home/News/'.$row->NEWS_ID).'" title="">
                                    <img src="'.base_url($row->NEWS_RPV_IMG).'" alt="">
                                </a>
                            <div class="details">
                                <h4 class="box-title"><a href="'.base_url('home/News/'. $row->TEXT_LINK).'"><div class="title-height">'. $row->NEWS_TITLE.'</div></a></h4>
                                <div class="content-height">
                                    '.$row->NEWS_SHRT_CNT.'...
                                </div>
                            </div>
                        </article>
                    </div>';
            }
        }
    }

    /*
     * load news by id
     */
    public function news($textLink){
        $newsID = $this->Index_model->getNewsIDbyTextLink($textLink);
        if(isset($newsID)){
            $data['newsData'] = $this->Index_model->loadNewsByID($newsID);
            $data['newsRelation'] = $this->Index_model->newsRelation($newsID);
            $hData['toursCate'] = $this->Index_model->loadTourCate();
            $hData['newsCate'] = $this->Index_model->loadNewsCate();
            $hData['toursQBCate'] = $this->Index_model->tourGroup('Q');

            $this->load->view('includes/short-header',$hData);
            $this->load->view('news-detail', $data);
            $this->load->view('includes/footer');
        }else{
            echo 'Thông tin bài vi?t không t?n t?i.';
        }
    }
}