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

    public function getNewOrder(){
        $headerData = $this->header_mode->headerData();
        $data['order'] = $this->order_mode->loadOrderList();

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/order-list',$data);
        $this->load->view('admin/includes/admin-footer');
    }

    public function editOrder($orderID){
        $headerData = $this->header_mode->headerData();
        $data['orderDetail'] = $this->order_mode->loadOrderById($orderID);

        $this->load->view('admin/includes/admin-header',$headerData);
        $this->load->view('admin/order-detail',$data);
        $this->load->view('admin/includes/admin-footer');
    }

    public function updateOrder(){
        $orderID = $this->input->post('orderID');
        $orderData = array(
            'DEPARTING_DATE'		=> date('Y-m-d',strtotime($this->input->post('ord_date'))),
            'STATUS'				=> $this->input->post('cbxStatus')
        );

        $this->order_mode->updateOrder($orderID, $orderData);

        $this->editOrder($orderID);
    }
}
