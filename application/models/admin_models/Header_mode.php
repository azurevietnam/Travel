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
class header_mode extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    //return header data
    public function headerData(){
        $data['tourOrderNum'] = $this->getOrderByStatus('tours_order', 1);
        $data['hotelOrderNum'] = $this->getOrderByStatus('hotel_order', 1);
        $data['carOrderNum'] = $this->getOrderByStatus('car_order', 1);
        $data['restOrderNum'] = $this->getOrderByStatus('restaurant_order', 1);

        $data['tourOrderNumInPrc'] = $this->getOrderByStatus('tours_order', 2);
        $data['hotelOrderNumInPrc'] = $this->getOrderByStatus('hotel_order', 2);
        $data['carOrderNumInPrc'] = $this->getOrderByStatus('car_order', 2);
        $data['restOrderNumInPrc'] = $this->getOrderByStatus('restaurant_order', 2);

        return $data;
    }
    //get numbers order by status
    public function getOrderByStatus($table, $status){
        $query = 'select count(*) as cnt from '.$table.' where STATUS = ?';
        $result = $this->db->query($query, $status);
        foreach ($result->result() as $row) {
            $cnt = $row->cnt;
        }
        return $cnt;
    }
}