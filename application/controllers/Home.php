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
                $this->load->view('includes/short-header');
                $this->load->view('success',$data);
                $this->load->view('includes/footer');
            } else {
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
                $this->load->view('includes/short-header');
                $this->load->view('success',$data);
                $this->load->view('includes/footer');
            } else {
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
                $this->load->view('includes/short-header');
                $this->load->view('success',$data);
                $this->load->view('includes/footer');
            } else {
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
                $this->load->view('includes/short-header');
                $this->load->view('success',$data);
                $this->load->view('includes/footer');
            } else {
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
}