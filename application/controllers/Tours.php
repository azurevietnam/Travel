<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tours extends CI_Controller
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
        $this->load->model('Tour_model');
    }
// tours list
    public function tours_list($cateID)
    {
        if(isset($cateID)){
            $data['pages'] = ceil($this->Tour_model->pagesPaging($cateID) / 4);
            $data['CATE_ID'] = $cateID;

            $this->load->view('includes/short-header');
            $this->load->view('tours', $data);
            $this->load->view('includes/footer');
        }
    }

    /*
     *Tour list and search function attach
     */
    public function tours_list1($cateID)
    {
        if(isset($cateID)){
            $data['pages'] = ceil($this->Tour_model->pagesPaging($cateID) / 9);
            $data['CATE_ID'] = $cateID;

            $this->load->view('includes/short-header');
            $this->load->view('tours-list', $data);
            $this->load->view('includes/footer');
        }
    }

// tours detail.
    public function tours_detail($tourID){
        if(isset($tourID)){
            $data['imgData'] = $this->Tour_model->loadImgUrl($tourID);
            $data['tourID'] = $tourID;
            $data['tour_detail'] = $this->Tour_model->loadTourDetail($tourID);
            $data['tour_schedule'] = $this->Tour_model->loadTourSchedule($tourID);
            $data['tour_relation'] = $this->Tour_model->tourRelation($tourID);
            $SEOdata['metaData'] = $this->Tour_model->tourSEOkey($tourID);

            $this->load->view('includes/short-header',$SEOdata);
            $this->load->view('tours-detail', $data);
            $this->load->view('includes/footer');
        }
    }

    //TOUR BOOKING
    public function tours_booking($tourID){
        if (isset($tourID))
        {
            $data['imgData'] = $this->Tour_model->loadImgUrl($tourID);
            $data['tourID'] = $tourID;
            $data['tour_detail'] = $this->Tour_model->loadTourDetail($tourID);
            $data['tour_schedule'] = $this->Tour_model->loadTourSchedule($tourID);
            $data['tour_relation'] = $this->Tour_model->tourRelation($tourID);
            $SEOdata['metaData'] = $this->Tour_model->tourSEOkey($tourID);

            $this->load->view('includes/short-header',$SEOdata);
            $this->load->view('tours-booking',$data);
            $this->load->view('includes/footer');
        }
        else
        {
            $this->load->view('includes/header');
            $this->load->view('index');
            $this->load->view('includes/footer');
        }
    }

    public function tours_order($tourID){
//        $this->load->helper(array('tours/tours_booking'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'full name', 'required');
        $this->form_validation->set_rules('email_address', 'Email', 'required', 'valid_email');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone_number', 'phone number', 'required');
        $this->form_validation->set_rules('departure_date', 'date', 'required');

        if ($this->form_validation->run() == TRUE){
            $data = array(
                'TOURS_ID' => $tourID,
                'CUST_NAME' => $this->input->post('name'),
                'CUST_EMAIL' => $this->input->post('email_address'),
                'CUST_PHONE' => $this->input->post('phone_number'),
                'CUST_ADDRESS' => $this->input->post('address'),
                'CUST_CONTENT' => $this->input->post('request'),
                'DEPARTING_DATE' =>  date('Y-m-d',strtotime($this->input->post('departure_date'))),
                'ADULTS' => $this->input->post('adultnumber'),
                'KIDS' => $this->input->post('kidnumber'),
                'INFANTS' => $this->input->post('infantnumber'),
                'RECEIPT_EMAIL' => $this->input->post('is_receive_promotion'),
                'STATUS' => 1
            );
            if($this->Tour_model->Tour_model->addTourOrder($data) == true){
                $data['message'] = "success";
                $this->load->view('includes/short-header');
                $this->load->view('success',$data);
                $this->load->view('includes/footer');
            }else{
                $data['error'] = validation_errors();
                $data['message'] = "fail";
                $this->load->view('includes/short-header');
                $this->load->view('success',$data);
                $this->load->view('includes/footer');
            }
        }else{
            $data['error'] = validation_errors();
            $data['message'] = "fail";
            $this->load->view('includes/short-header');
            $this->load->view('success',$data);
            $this->load->view('includes/footer');
        }
    }

    //    load post
    public function loadPost($cateID){
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
            $queryResult = $this->Tour_model->loadPostTour($cateID,$position);
            foreach($queryResult as $row){
                echo '<div class="col-sm-6 col-md-4 col-lg-3">
                        <article class="box">
                                <a href="'.base_url().'popup/index/'.$row->IMG_GRP_ID.'" title="" class="hover-effect popup-gallery">
                                    <img src="'.base_url().$row->TOURS_RPV_IMG_URL.'" alt="">
                                </a>
                            <div class="details">
                                <h4 class="box-title"><a href="'.base_url().'tours/tours_detail/'. $row->TOURS_ID.'"><div class="title-height">'. $row->TOURS_TIT.'</div><small>'. $row->LOCATION.' - '.$row->NATIONAL.'</small></a></h4>
                                <div class="content-height">
                                    '.$row->SHORT_CNT.'...
                                </div>
                                <div class="price">
                                    <span>'.$row->TOURS_PRICE.' '.$this->lang->line('currency').'</span>
                                </div>
                                <div class="align">
                                    <div class="time">
                                        <i class="soap-icon-clock yellow-color"></i>
                                        <span>'.$row->TOURS_LENGTH.' '.$this->lang->line('day').'</span>
                                    </div>
                                </div>
                                <a href="'.base_url().'tours/tours_detail/'. $row->TOURS_ID.'" class="button btn-small full-width">'.$this->lang->line('booknow').'</a>
                            </div>
                        </article>
                    </div>';
            }
            }
    }

    /*
     * function search by condition
     */
    public function loadTour($rate, $price, $minPrice, $maxPrice, $name, $popular, $location){

    }
    //    load post
    public function loadPost1($cateID){
        if($_POST) {
            //sanitize post value
            $group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
            //throw HTTP error if group number is not valid
            if(!is_numeric($group_number)){
                header('HTTP/1.1 500 Invalid number!');
                exit();
            }
            //get current starting point of records
            $position = ($group_number * 9);
            $queryResult = $this->Tour_model->loadPostTour($cateID,$position);
            foreach($queryResult as $row){
                echo '<div class="col-sm-6 col-md-4">
                            <article class="box">
                                <figure>
                                    <a href="'.base_url().'popup/index/'.$row->IMG_GRP_ID.'" class="hover-effect popup-gallery"><img alt="'. $row->TOURS_TIT.'" src="'.base_url().$row->TOURS_RPV_IMG_URL.'"></a>
                                </figure>
                                <div class="details">
                                    <h4 class="box-title"><a href="'.base_url().'tours/tours_detail/'. $row->TOURS_ID.'"><div class="title-height">'. $row->TOURS_TIT.'</div><small>'. $row->LOCATION.' - '.$row->NATIONAL.'</small></a></h4>
                                    <span class="price">
                                        <small>'.$this->lang->line('currency').'</small>
                                        '.$row->TOURS_PRICE.'
                                    </span>
                                    <div class="feedback">
                                        <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                        <span class="review">270 reviews</span>
                                    </div>
                                    <p class="description">'.$row->SHORT_CNT.'</p>
                                    <div class="action">
                                        <a class="button btn-small" href="'.base_url().'tours/tours_detail/'. $row->TOURS_ID.'">'.$this->lang->line('select').'</a>
                                        <a class="button btn-small yellow popup-map" href="#" data-box="'.$row->MAP_PLACE_X.','.$row->MAP_PLACE_Y.'">'.$this->lang->line('viewmap').'</a>
                                    </div>
                                </div>
                            </article>
                        </div>';
            }
        }
    }
}
