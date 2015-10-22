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
class Tour_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $user_language = $this->session->userdata('language');
        if(strlen($this->session->userdata('language')) <1 ){
            $this->session->set_userdata('language', 'vietnam');
            $this->session->set_userdata('lang_code', 'VI');
        }
        $this->lang->load($user_language, $user_language);
    }

    public function addTourOrder($data){
        if($this->db->insert('tours_order',$data)){
            return true;
        }else{
            return false;
        }
    }

    //    page paging
    public function pagesPaging($cateID){
        $totalActSql = "";
        if($cateID != 'all') {
            $totalActSql = "SELECT COUNT(*) AS P_RECORDS FROM tours WHERE CATEGORY_ID = ? AND RPV_YN = 'Y'";
        }else{
            $totalActSql = "SELECT COUNT(*) AS P_RECORDS FROM tours WHERE RPV_YN = 'Y'";
        }
        $query = $this->db->query($totalActSql, array($cateID));
        $row = $query->row();
        return $row->P_RECORDS;
    }



    //load images gallery
    public function loadImgUrl($imgGrp){
        $imgSql = "SELECT IMG_ID, IMG_GRP_ID, IMG_URL, IMG_ALT FROM img_grp WHERE IMG_GRP_ID = ?";
        $query = $this->db->query($imgSql, array($imgGrp));
        return $query->result();
    }

    //load tour detail
    public function loadTourDetail($tourID){
        $Sql = "SELECT
                    TOURS_ID
                    , CATEGORY_ID
                    , LOCATION_ID
                    , (SELECT n.NATIONAL_NAME FROM national n, location l WHERE l.NATIONAL_ID = n.NATIONAL_ID AND l.LOCATION_ID = TOUR.LOCATION_ID ) AS NATIONAL
                    , (SELECT LOCATION_NM_" . $this->session->userdata('lang_code') . " FROM location WHERE LOCATION_ID = TOUR.LOCATION_ID) AS LOCATION
                    , TOURS_TIT_" . $this->session->userdata('lang_code') . " AS TOURS_TIT
                    , TOURS_CNT_" . $this->session->userdata('lang_code') . " AS TOUR_CNT
                    , TOURS_RPV_IMG_URL
                    , TOURS_LENGTH
                    , TOURS_TRANSPORT_" . $this->session->userdata('lang_code') . " AS TRANSPORT
                    , TOURS_PRICE_CNT_" . $this->session->userdata('lang_code') . " AS PRICE_CNT
                    , TOURS_PRICE_" . $this->session->userdata('lang_code') . " AS PRICE
                    , DISCOUNT
                    , FORMAT(TOURS_PRICE_" . $this->session->userdata('lang_code') . ",0) AS TOUR_PRICE
                    , TOURS_REMARK_" . $this->session->userdata('lang_code') . " AS REMARK
                    , (SELECT LOCATION_NM_" . $this->session->userdata('lang_code') . " FROM location WHERE LOCATION_ID = TOUR.START_ARRIVAL_LOCATION) AS START_ARRIVAL_LOCATION
                    , (SELECT LOCATION_NM_" . $this->session->userdata('lang_code') . " FROM location WHERE LOCATION_ID = TOUR.START_DEPARTURE_LOCATION) AS START_DEPARTURE_LOCATION
                    , START_ARRIVAL_TIME
                    , START_DEPARTURE_TIME
                    , (SELECT LOCATION_NM_" . $this->session->userdata('lang_code') . " FROM location WHERE LOCATION_ID = TOUR.END_ARRIVAL_LOCATION) AS END_ARRIVAL_LOCATION
                    , (SELECT LOCATION_NM_" . $this->session->userdata('lang_code') . " FROM location WHERE LOCATION_ID = TOUR.END_DEPARTURE_LOCATION) AS END_DEPARTURE_LOCATION
                    , END_ARRIVAL_TIME
                    , END_DEPARTURE_TIME
                    , MAP_PLACE_X
                    , MAP_PLACE_Y
                    , IMG_GRP_ID
                FROM tours TOUR
                WHERE TOURS_ID = ?";
        $query = $this->db->query($Sql,$tourID);
        return $query->result();
    }

    //load tour schedule
    public function loadTourSchedule($tourID){
        $Sql = "SELECT
                    SCHEDULE_ID
                    , TOUR_ID
                    , DAYS
                    , ARRIVAL_TIME
                    , DEPARTURE_TIME
                    , SCHEDULE_CONTENT_" . $this->session->userdata('lang_code') . " AS CONTENT
                FROM tours_detail SCHEDULE
                WHERE TOUR_ID = ?";
        $query = $this->db->query($Sql,$tourID);
        return $query->result();
    }

    public function tourRelation($tourID){
        $locationID = null;
        $sqlLocal = "SELECT LOCATION_ID FROM tours WHERE TOURS_ID = ?";
        $queryLoca = $this->db->query($sqlLocal,$tourID);
        $row = $queryLoca->row();
        $locationID =  $row->LOCATION_ID;
        $Sql ="SELECT
                    TOURS_ID
                    , LOCATION_ID
                    , (SELECT LOCATION_NM_" . $this->session->userdata('lang_code') . " FROM location WHERE LOCATION_ID = TOUR.LOCATION_ID) AS LOCATION
                    , (SELECT n.NATIONAL_NAME FROM national n, location l WHERE l.NATIONAL_ID = n.NATIONAL_ID AND l.LOCATION_ID = TOUR.LOCATION_ID ) AS NATIONAL
                    , TOURS_TIT_" . $this->session->userdata('lang_code') . " AS TOURS_TIT
                    , TOURS_RPV_IMG_URL
                    , TOURS_LENGTH
                    , FORMAT(TOURS_PRICE_" . $this->session->userdata('lang_code') . ",0) AS PRICE
                FROM tours TOUR
                WHERE LOCATION_ID = ? AND DISPLAY_YN = 'Y'
                LIMIT 5";
        $query = $this->db->query($Sql,$locationID);
        return $query->result();
    }

    public function tourSEOkey($tourID){
        $Sql ="SELECT
                    TOURS_ID
                    , META_TITLE_" . $this->session->userdata('lang_code') . " AS META_TITLE
                    , DESCRIPTION_" . $this->session->userdata('lang_code') . " AS DESCRIPTION
                    , KEYWORDS_" . $this->session->userdata('lang_code') . " AS KEYWORDS
                FROM tours TOUR
                WHERE TOURS_ID = ?";
        $query = $this->db->query($Sql,$tourID);
        return $query->result();
    }

    public function loadPostTour($cateID,$position){
        if($cateID != 'all') {
            $SqlStr = "SELECT TOURS_ID,CATEGORY_ID, (SELECT n.NATIONAL_NAME FROM national n, location l WHERE l.NATIONAL_ID = n.NATIONAL_ID AND l.LOCATION_ID = TOUR.LOCATION_ID ) AS NATIONAL
                , (SELECT LOCATION_NM_" . $this->session->userdata('lang_code') . " FROM location WHERE LOCATION_ID = TOUR.LOCATION_ID) as LOCATION, TOURS_TIT_" . $this->session->userdata('lang_code') . " as TOURS_TIT,
                SUBSTRING(TOURS_SHRT_CNT_" . $this->session->userdata('lang_code') . ",1,150) AS SHORT_CNT, TOURS_RPV_IMG_URL, TOURS_LENGTH, FORMAT(TOURS_PRICE_" . $this->session->userdata('lang_code') . ",0) as TOURS_PRICE
                , IMG_GRP_ID, MAP_PLACE_X, MAP_PLACE_Y FROM tours TOUR WHERE CATEGORY_ID = ? AND DISPLAY_YN='Y' ORDER BY TOURS_CREATE_TIME DESC, TOURS_UPDATE_TIME DESC LIMIT $position, 9";
        }else{
            $SqlStr = "SELECT TOURS_ID,CATEGORY_ID, (SELECT n.NATIONAL_NAME FROM national n, location l WHERE l.NATIONAL_ID = n.NATIONAL_ID AND l.LOCATION_ID = TOUR.LOCATION_ID ) AS NATIONAL
                , (SELECT LOCATION_NM_" . $this->session->userdata('lang_code') . " FROM location WHERE LOCATION_ID = TOUR.LOCATION_ID) as LOCATION, TOURS_TIT_" . $this->session->userdata('lang_code') . " as TOURS_TIT,
                SUBSTRING(TOURS_SHRT_CNT_" . $this->session->userdata('lang_code') . ",1,150) AS SHORT_CNT, TOURS_RPV_IMG_URL, TOURS_LENGTH, FORMAT(TOURS_PRICE_" . $this->session->userdata('lang_code') . ",0) as TOURS_PRICE
                , IMG_GRP_ID, MAP_PLACE_X, MAP_PLACE_Y FROM tours TOUR WHERE DISPLAY_YN='Y' ORDER BY TOURS_CREATE_TIME DESC, TOURS_UPDATE_TIME DESC LIMIT $position, 9";
        }

        $query = $this->db->query($SqlStr, array($cateID));
        return $query->result();
    }
}