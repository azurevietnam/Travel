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

    /*
     * Load Tour order list
     */
    public function loadOrderList($table){
        $query = '
            SELECT
                ORDER_ID
                , TOURS_ID
                , (select TOURS_TIT_VI from tours t where t.TOURS_ID = o.TOURS_ID) AS TOUR_TITLE
                , CUST_NAME
                , CUST_EMAIL
                , CUST_PHONE
                , FROM_DATE
                , TO_DATE
                , STATUS
            FROM
              '.$table.' o
            ORDER BY
              STATUS ASC
              ,FROM_DATE DESC
        ';
        $result = $this->db->query($query);
        return $result->result();
    }

    public function loadTourOrderById($orderID){
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
                , USER_NOTE
                , FROM_DATE
                , TO_DATE
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

    public function updateTourOrder($orderID, $orderData){
        $this->db->where('ORDER_ID', $orderID);
        $this->db->update('tours_order', $orderData);
    }

    /*
     * Load hotel order list
     */
    public function loadHotelOrderList(){
        $query = '
            SELECT
                ORDER_ID
                , HOTEL_ID
                , (SELECT HOTEL_NAME_VI FROM hotels WHERE HOTEL_ID = H.HOTEL_ID) AS HOTEL_NM
                , CUST_NAME
                , CUST_EMAIL
                , CUST_PHONE
                , FROM_DATE
                , TO_DATE
                , HOTEL_TP
                , ROOM_QTY
                , STATUS
            FROM
              hotel_order H
            ORDER BY
              STATUS ASC
              ,FROM_DATE DESC
        ';
        $result = $this->db->query($query);
        return $result->result();
    }

    /*
     * Load RESTAURANT order list
     */
    public function loadRestOrderList(){
        $query = '
            SELECT
                ORDER_ID
                , RESTAURANT_ID
                , (SELECT RESTAURANT_NAME_VI FROM restaurant WHERE RESTAURANT_ID = O.RESTAURANT_ID) AS REST_NM
                , CUST_NAME
                , CUST_EMAIL
                , CUST_PHONE
                , FROM_DATE
                , TO_DATE
                , RESTAURANT_TP
                , MEALS
                , STATUS
            FROM
              restaurant_order O
            ORDER BY
              STATUS ASC
              ,FROM_DATE DESC
        ';
        $result = $this->db->query($query);
        return $result->result();
    }

    /*
     * Load CAR order list
     */
    public function loadCarOrderList(){
        $query = '
            SELECT
                ORDER_ID
                , CUST_NAME
                , CUST_EMAIL
                , CUST_PHONE
                , FROM_DATE
                , TO_DATE
                , CAR_TP
                , CAR_CLASS
                , STATUS
            FROM
              car_order
            ORDER BY
              STATUS ASC
              ,FROM_DATE DESC
        ';
        $result = $this->db->query($query);
        return $result->result();
    }

    /*
     * Load hotel order by ID
     */
    public function loadHotelOrderById($orderID){
        $query = '
            SELECT
                ORDER_ID
                , HOTEL_ID
                , (SELECT HOTEL_NAME_VI FROM hotels WHERE HOTEL_ID = H.HOTEL_ID) AS HOTEL_NM
                , CUST_NAME
                , CUST_EMAIL
                , CUST_PHONE
                , CUST_ADDRESS
                , CUST_CONTENT
                , USER_NOTE
                , FROM_DATE
                , TO_DATE
                , HOTEL_TP
                , ROOM_TP
                , ROOM_QTY
                , ADULT_QTY
                , KID_QTY
                , INFAN_QTY
                , STATUS
            FROM
              hotel_order H
            WHERE
              ORDER_ID = ?
        ';
        $result = $this->db->query($query,$orderID);
        return $result->result();
    }

    /*
     * Load restaurant order by ID
     */
    public function loadRestOrderById($orderID){
        $query = '
            SELECT
                ORDER_ID
                , RESTAURANT_ID
                , (SELECT RESTAURANT_NAME_VI FROM restaurant WHERE RESTAURANT_ID = O.RESTAURANT_ID) AS REST_NM
                , CUST_NAME
                , CUST_EMAIL
                , CUST_PHONE
                , CUST_ADDRESS
                , CUST_CONTENT
                , USER_NOTE
                , FROM_DATE
                , TO_DATE
                , RESTAURANT_TP
                , MEALS
                , ADULT_QTY
                , KID_QTY
                , INFAN_QTY
                , STATUS
            FROM
              restaurant_order O
            WHERE
              ORDER_ID = ?
        ';
        $result = $this->db->query($query,$orderID);
        return $result->result();
    }

    /*
     * Load car order by ID
     */
    public function loadCarOrderById($orderID){
        $query = '
            SELECT
                ORDER_ID
                , CUST_NAME
                , CUST_EMAIL
                , CUST_PHONE
                , CUST_ADDRESS
                , CUST_CONTENT
                , USER_NOTE
                , FROM_DATE
                , TO_DATE
                , CAR_TP
                , CAR_CLASS
                , CAR_QTY
                , STATUS
            FROM
              car_order
            WHERE
              ORDER_ID = ?
        ';
        $result = $this->db->query($query,$orderID);
        return $result->result();
    }

    /*
     * update order
     */
    public function updateOrder($orderID, $orderData, $table){
        $this->db->where('ORDER_ID', $orderID);
        $this->db->update($table, $orderData);
    }
}