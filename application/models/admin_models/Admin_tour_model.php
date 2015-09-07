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
class Admin_Tour_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllTour(){
        $sqlQuery = "  SELECT
                            TOURS_ID
                            , (SELECT CATEGORY_NM_VI FROM category WHERE CATEGORY_ID = TOUR.CATEGORY_ID) AS CATE_NAME
                            , TOURS_TIT_VI
                            , RPV_YN
                            , DISPLAY_YN
                            , (SELECT COUNT(*) FROM tours_detail WHERE TOUR_ID = TOUR.TOURS_ID)AS SCHEDULE_CNT
                            , (SELECT COUNT(*) FROM img_grp WHERE IMG_GRP_ID = TOUR.TOURS_ID)AS IMG_CNT
                        FROM
                            tours TOUR
                    ";
        $result = $this->db->query($sqlQuery);
        return $result->result();
    }

    public function getAllNational(){
        $sqlQuery = "  SELECT
                            NATIONAL_ID
                            , NATIONAL_NAME
                        FROM
                            national
                        ORDER BY
                        	NATIONAL_NAME ASC
                    ";
        $result = $this->db->query($sqlQuery);
        return $result->result();
    }

    public function getLocalByNationID($nationalID){
        $sqlQuery = "  SELECT
                            LOCATION_ID
                            , NATIONAL_ID
                            , LOCATION_NM_VI
                        FROM
                            location
                        WHERE
                            NATIONAL_ID =?
                        ORDER BY
                        	LOCATION_NM_VI ASC
                    ";
        $result = $this->db->query($sqlQuery,$nationalID);
        return $result->result();
    }

    public function getAllCategory(){
        $sqlQuery = "  SELECT
                            CATEGORY_ID
                            , CATEGORY_NM_VI
                        FROM
                            category
                        ORDER BY
                        	CATEGORY_NM_VI ASC
                    ";
        $result = $this->db->query($sqlQuery);
        return $result->result();
    }

    public function addNational($data){
        if($this->db->insert('national',$data)){
            return true;
        }else{
            return false;
        }
    }

    public function addLocation($data){
        if($this->db->insert('location',$data)){
            return true;
        }else{
            return false;
        }
    }

    public function loadTour($tourID){
        $sqlQurey = ("SELECT
                TOURS_ID
                , (SELECT NATIONAL_ID FROM location WHERE LOCATION_ID = TOUR.LOCATION_ID) AS NATIONAL_ID
                , (SELECT NATIONAL_NAME FROM national NAL, location LOC WHERE NAL.NATIONAL_ID = LOC.NATIONAL_ID AND LOC.LOCATION_ID = TOUR.LOCATION_ID) AS NATIONAL_NAME
                , LOCATION_ID
                , (SELECT LOCATION_NM_VI FROM location WHERE LOCATION_ID = TOUR.LOCATION_ID) AS LOCATION_NM
                , CATEGORY_ID
                , (SELECT CATEGORY_NM_VI FROM category WHERE CATEGORY_ID = TOUR.CATEGORY_ID) AS CATEGORY_NM
                , RPV_YN
                , TOURS_TIT_EN
                , TOURS_TIT_VI
                , TOURS_SHRT_CNT_EN
                , TOURS_SHRT_CNT_VI
                , TOURS_CNT_EN
                , TOURS_CNT_VI
                , TOURS_RPV_IMG_URL
                , TOURS_LENGTH
                , TOURS_TRANSPORT_EN
                , TOURS_TRANSPORT_VI
                , TOURS_PRICE_CNT_EN
                , TOURS_PRICE_CNT_VI
                , TOURS_PRICE_EN
                , TOURS_PRICE_VI
                , DISCOUNT
                , TOURS_CREATE_TIME
                , TOURS_UPDATE_TIME
                , TOURS_REMARK_EN
                , TOURS_REMARK_VI
                , (SELECT NATIONAL_ID FROM location WHERE LOCATION_ID = TOUR.START_DEPARTURE_LOCATION) AS START_DEPARTURE_NATIONAL_ID
                , (SELECT NATIONAL_NAME FROM national NAL, location LOC WHERE NAL.NATIONAL_ID = LOC.NATIONAL_ID AND LOC.LOCATION_ID = TOUR.START_DEPARTURE_LOCATION) AS START_DEPARTURE_NATIONAL_NAME
                , (SELECT LOCATION_NM_VI FROM location WHERE LOCATION_ID = TOUR.START_DEPARTURE_LOCATION) AS START_DEPARTURE_LOCATION_NM
                , START_DEPARTURE_LOCATION
                , START_DEPARTURE_TIME
                , (SELECT NATIONAL_ID FROM location WHERE LOCATION_ID = TOUR.START_ARRIVAL_LOCATION) AS START_ARRIVAL_NATIONAL_ID
                , (SELECT NATIONAL_NAME FROM national NAL, location LOC WHERE NAL.NATIONAL_ID = LOC.NATIONAL_ID AND LOC.LOCATION_ID = TOUR.START_ARRIVAL_LOCATION) AS START_ARRIVAL_NATIONAL_NAME
                , (SELECT LOCATION_NM_VI FROM location WHERE LOCATION_ID = TOUR.START_ARRIVAL_LOCATION) AS START_ARRIVAL_LOCATION_NM
                , START_ARRIVAL_LOCATION
                , START_ARRIVAL_TIME
                , (SELECT NATIONAL_ID FROM location WHERE LOCATION_ID = TOUR.END_DEPARTURE_LOCATION) AS END_DEPARTURE_NATIONAL_ID
                , (SELECT NATIONAL_NAME FROM national NAL, location LOC WHERE NAL.NATIONAL_ID = LOC.NATIONAL_ID AND LOC.LOCATION_ID = TOUR.END_DEPARTURE_LOCATION) AS END_DEPARTURE_NATIONAL_NAME
                , (SELECT LOCATION_NM_VI FROM location WHERE LOCATION_ID = TOUR.END_DEPARTURE_LOCATION) AS END_DEPARTURE_LOCATION_NM
                , END_DEPARTURE_LOCATION
                , END_DEPARTURE_TIME
                , (SELECT NATIONAL_ID FROM location WHERE LOCATION_ID = TOUR.END_ARRIVAL_LOCATION) AS END_ARRIVAL_NATIONAL_ID
                , (SELECT NATIONAL_NAME FROM national NAL, location LOC WHERE NAL.NATIONAL_ID = LOC.NATIONAL_ID AND LOC.LOCATION_ID = TOUR.END_ARRIVAL_LOCATION) AS END_ARRIVAL_NATIONAL_NAME
                , (SELECT LOCATION_NM_VI FROM location WHERE LOCATION_ID = TOUR.END_ARRIVAL_LOCATION) AS END_ARRIVAL_LOCATION_NM
                , END_ARRIVAL_LOCATION
                , END_ARRIVAL_TIME
                , MAP_PLACE_X
                , MAP_PLACE_Y
                , IMG_GRP_ID
                , DISPLAY_YN
                , META_TITLE_EN
                , DESCRIPTION_EN
                , KEYWORDS_EN
                , META_TITLE_VI
                , DESCRIPTION_VI
                , KEYWORDS_VI
            FROM
                tours TOUR
            WHERE
                TOUR.TOURS_ID = ?
        ");
        $query = $this->db->query($sqlQurey,$tourID);
        return $query->result();
    }

    public function loadImages($tourID){
        $query = $this->db->get_where('img_grp', array('IMG_GRP_ID' => $tourID));
        return $query->result();
    }

    public function addTour($tourArray){
        if($this->db->insert('tours',$tourArray)){
            return true;
        }else{
            return false;
        }
    }

    public function updateTour($tourID, $tourArray){
        $this->db->where('TOURS_ID', $tourID);
        if($this->db->update('tours', $tourArray)){
            return true;
        }else{
            return false;
        }
    }

    public function updateTourStatus($tourID, $status){

    }

    public function getImgSeq($tourID){
        $maxID ='';
        $returnID = $tourID;

        $this->db->select_max('IMG_ID');
        $this->db->where('IMG_GRP_ID',$tourID);
        $query = $this->db->get('img_grp');

        foreach($query->result() as $row){
            $maxID = $row->IMG_ID;
        }
        if($maxID != ''){
            $oldSeq = substr($maxID,6,2);
            $newSeq = $oldSeq+1;
            $lenNum = strlen($newSeq);
            if($lenNum <2){
                $returnID .= '0';
            }
            return $returnID.$newSeq;
        }else{
            return $tourID.'01';
        }
    }

    public function insertTourImg($imgData){
        if($this->db->insert('img_grp',$imgData)){
            return true;
        }else{
            return false;
        }
    }

    public function updateImg($imgData, $imgID){
        $this->db->where('IMG_ID', $imgID);
        $this->db->update('img_grp', $imgData);
    }

    public function deleteImg($imgID){
        $this->db->where('IMG_ID', $imgID);
        $this->db->delete('img_grp');
    }

    public function loadTourImages($tourID){
        $this->db->where('IMG_GRP_ID',$tourID);
        $query = $this->db->get('img_grp');
        return $query->result();
    }

    public function loadTourSchedule($tourID){
        $this->db->where('TOUR_ID',$tourID);
        $query = $this->db->get('tours_detail');
        return $query->result();
    }

    public function insertSchedule($scheduleData){
        if($this->db->insert('tours_detail',$scheduleData)){
            return true;
        }else{
            return false;
        }
    }

    public function updateSchedule($scheduleID, $scheduleData){
        $this->db->where('SCHEDULE_ID', $scheduleID);
        $this->db->update('tours_detail', $scheduleData);
    }

    public function deleteSchedule($scheduleID){
        $this->db->where('SCHEDULE_ID', $scheduleID);
        $this->db->delete('tours_detail');
    }

    public function getScdSeq($tourID){
        $maxID ='';
        $returnID = $tourID;

        $this->db->select_max('SCHEDULE_ID');
        $this->db->where('TOUR_ID',$tourID);
        $query = $this->db->get('tours_detail');

        foreach($query->result() as $row){
            $maxID = $row->SCHEDULE_ID;
        }
        if($maxID != ''){
            $oldSeq = substr($maxID,6,2);
            $newSeq = $oldSeq+1;
            $lenNum = strlen($newSeq);
            if($lenNum <2){
                $returnID .= '0';
            }
            return $returnID.$newSeq;
        }else{
            return $tourID.'01';
        }
    }
}
