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
        $data['orderNum'] = $this->getOrderByStatus(1);

        return $data;
    }
    //get numbers order by status
    public function getOrderByStatus($status){
        $query = 'select count(*) as cnt from tours_order where STATUS = ?';
        $result = $this->db->query($query, $status);
        foreach ($result->result() as $row) {
            $cnt = $row->cnt;
        }
        return $cnt;
//        $this->db->where('STATUS',$status);
//        $this->db->get('tours_order');
//        return $this->db->count_all_results();
    }
}