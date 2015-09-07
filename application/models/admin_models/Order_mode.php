<?php
/**
 * @package	VCTravel
 * @author	Hai Long
 * @copyright	Copyright (c) 2015 - 2015, VungChuaTravel
 * @license	hailong
 * @link	vungchuatravel.com
 * @since	Version 1.0.0
 * @filesource
 */
class order_mode extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function loadOrder(){
        $this->db->where('STATUS',1);
        $this->db->or_where('STATUS',2);
        $query = $this->db->get('tours_order');
        return $query->result();
    }

    public function loadOrderList(){
        $query = '
            SELECT
                ORDER_ID
                , TOURS_ID
                , (select TOURS_TIT_VI from tours t where t.TOURS_ID = o.TOURS_ID) AS TOUR_TITLE
                , CUST_NAME
                , CUST_EMAIL
                , CUST_PHONE
                , DEPARTING_DATE
                , STATUS
            FROM
              tours_order o
            ORDER BY
              DEPARTING_DATE DESC
              , STATUS ASC
        ';
        $result = $this->db->query($query);
        return $result->result();
    }

    public function loadOrderById($orderID){
        $query = '
            SELECT
                ORDER_ID
                , TOURS_ID
                , (select TOURS_TIT_VI from tours t where t.TOURS_ID = o.TOURS_ID) AS TOUR_TITLE
                , CUST_NAME
                , CUST_EMAIL
                , CUST_PHONE
                , CUST_ADDRESS
                , CUST_CONTENT
                , DEPARTING_DATE
                , ADULTS
                , KIDS
                , INFANTS
                , STATUS
            FROM
              tours_order o
            WHERE
              ORDER_ID = ?
        ';
        $result = $this->db->query($query,$orderID);
        return $result->result();
    }

    public function updateOrder($orderID, $orderData){
        $this->db->where('ORDER_ID', $orderID);
        $this->db->update('tours_order', $orderData);
    }
}