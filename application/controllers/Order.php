<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order extends CI_Controller
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
        $this->load->model('admin_models/order_mode');
        $this->load->model('admin_models/header_mode');
    }

    public function getNewTourOrder(){
        $headerData = $this->header_mode->headerData();
        $data['tourOrder'] = $this->order_mode->loadOrderList('tours_order');

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/order-list',$data);
        $this->load->view('admin/includes/admin-footer');
    }
    public function getNewHotelOrder(){
        $headerData = $this->header_mode->headerData();
        $data['hotelOrder'] = $this->order_mode->loadHotelOrderList();

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/order-list',$data);
        $this->load->view('admin/includes/admin-footer');
    }
    public function getNewRestOrder(){
        $headerData = $this->header_mode->headerData();
        $data['restOrder'] = $this->order_mode->loadRestOrderList('restaurant_order');

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/order-list',$data);
        $this->load->view('admin/includes/admin-footer');
    }
    public function getNewCarOrder(){
        $headerData = $this->header_mode->headerData();
        $data['carOrder'] = $this->order_mode->loadCarOrderList('car_order');

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/order-list',$data);
        $this->load->view('admin/includes/admin-footer');
    }

    public function editTourOrder($orderID){
        $headerData = $this->header_mode->headerData();
        $data['tourOrderDetail'] = $this->order_mode->loadTourOrderById($orderID);

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/order-detail',$data);
        $this->load->view('admin/includes/admin-footer');
    }

    public function editHotelOrder($orderID){
        $headerData = $this->header_mode->headerData();
        $data['hotelOrderDetail'] = $this->order_mode->loadHotelOrderById($orderID);
        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/order-detail',$data);
        $this->load->view('admin/includes/admin-footer');
    }

    public function editRestOrder($orderID){
        $headerData = $this->header_mode->headerData();
        $data['restOrderDetail'] = $this->order_mode->loadRestOrderById($orderID);
        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/order-detail',$data);
        $this->load->view('admin/includes/admin-footer');
    }

    public function editCarOrder($orderID){
        $headerData = $this->header_mode->headerData();
        $data['carOrderDetail'] = $this->order_mode->loadCarOrderById($orderID);
        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/order-detail',$data);
        $this->load->view('admin/includes/admin-footer');
    }


    public function updateTourOrder(){
        $orderID = $this->input->post('orderID');
        $orderData = array(
            'USER_NOTE'     => $this->input->post('user_note'),
            'FROM_DATE'		=> date('Y-m-d',strtotime($this->input->post('ord_f_date'))),
            'TO_DATE'		=> date('Y-m-d',strtotime($this->input->post('ord_t_date'))),
            'STATUS'				=> $this->input->post('cbxStatus')
        );

        $this->order_mode->updateOrder($orderID, $orderData, 'tour_order');

        $this->editTourOrder($orderID);
    }

    public function updateHotelOrder(){
        $orderID = $this->input->post('orderID');
        $orderData = array(
            'USER_NOTE'     => $this->input->post('user_note'),
            'FROM_DATE'		=> date('Y-m-d',strtotime($this->input->post('ord_f_date'))),
            'TO_DATE'		=> date('Y-m-d',strtotime($this->input->post('ord_t_date'))),
            'STATUS'				=> $this->input->post('cbxStatus')
        );

        $this->order_mode->updateOrder($orderID, $orderData, 'hotel_order');

        $this->editHotelOrder($orderID);
    }

    public function updateRestOrder(){
        $orderID = $this->input->post('orderID');
        $orderData = array(
            'USER_NOTE'     => $this->input->post('user_note'),
            'FROM_DATE'		=> date('Y-m-d',strtotime($this->input->post('ord_f_date'))),
            'TO_DATE'		=> date('Y-m-d',strtotime($this->input->post('ord_t_date'))),
            'STATUS'				=> $this->input->post('cbxStatus')
        );

        $this->order_mode->updateOrder($orderID, $orderData, 'restaurant_order');

        $this->editRestOrder($orderID);
    }

    public function updateCarOrder(){
        $orderID = $this->input->post('orderID');
        $orderData = array(
            'USER_NOTE'     => $this->input->post('user_note'),
            'FROM_DATE'		=> date('Y-m-d',strtotime($this->input->post('ord_f_date'))),
            'TO_DATE'		=> date('Y-m-d',strtotime($this->input->post('ord_t_date'))),
            'STATUS'				=> $this->input->post('cbxStatus')
        );

        $this->order_mode->updateOrder($orderID, $orderData, 'car_order');

        $this->editCarOrder($orderID);
    }
}
