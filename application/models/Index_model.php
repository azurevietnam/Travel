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
class Index_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        if(!($this->session->userdata('language'))){
            $this->session->set_userdata('language', 'english');
            $this->session->set_userdata('lang_code', 'EN');
        }
    }

    public function loadMainHotDest($cateID)
    {
        $hotDesDtlSql = "SELECT TRAVEL_GUIDE_ID, (SELECT n.NATIONAL_NAME FROM national n, location l WHERE l.NATIONAL_ID = n.NATIONAL_ID AND l.LOCATION_ID = TG.LOCATION_ID ) AS NATIONAL
        ,(SELECT LOCATION_NM_".$this->session->userdata('lang_code')." FROM location WHERE LOCATION_ID = TG.LOCATION_ID) as LOCATION, TRAVEL_GUIDE_TITLE_".$this->session->userdata('lang_code')." as TG_TIT,
        SUBSTRING(TRAVEL_GUIDE_SHRT_CONTENT_".$this->session->userdata('lang_code').",1,150) AS SHORT_CNT, TRAVEL_GUIDE_RPV_IMG_URL, IMG_GRP_ID FROM travel_guides TG WHERE CATEGORY_ID = ? AND RPV_YN='Y' ORDER BY CREATE_TIMESTAMP DESC LIMIT 4";
        $query = $this->db->query($hotDesDtlSql, array($cateID));
        return $query->result();
    }

    public function loadMainCate($cateid)
    {
        $Sql = "select CATEGORY_ID, CATEGORY_NM_".$this->session->userdata('lang_code')." AS CATEGORY_NAME, CATEGORY_DESC_".$this->session->userdata('lang_code')." AS CATEGORY_DESC,
        (select count(TOURS_ID) from tours where CATEGORY_ID = cate.CATEGORY_ID ) as POST_COUNT, IMG_URL
        from category cate WHERE  CATEGORY_ID = ?";
        $query = $this->db->query($Sql,array($cateid));
        return $query->result();
    }
    public function loadGuideCate($cateid)
    {
        $Sql = "select CATEGORY_ID, CATEGORY_NM_".$this->session->userdata('lang_code')." AS CATEGORY_NAME, CATEGORY_DESC_".$this->session->userdata('lang_code')." AS CATEGORY_DESC,
        (select count(TRAVEL_GUIDE_ID) from travel_guides where CATEGORY_ID = cate.CATEGORY_ID ) as POST_COUNT, IMG_URL
        from category cate WHERE  CATEGORY_ID = ?";
        $query = $this->db->query($Sql,array($cateid));
        return $query->result();
    }

    public function loadMainCateDetail($cateID)
    {
        $toursSql = "SELECT TOURS_ID, (SELECT n.NATIONAL_NAME FROM national n, location l WHERE l.NATIONAL_ID = n.NATIONAL_ID AND l.LOCATION_ID = TOUR.LOCATION_ID ) AS NATIONAL
        , (SELECT LOCATION_NM_".$this->session->userdata('lang_code')." FROM location WHERE LOCATION_ID = TOUR.LOCATION_ID) as LOCATION, TOURS_TIT_".$this->session->userdata('lang_code')." as TOURS_TIT,
        SUBSTRING(TOURS_SHRT_CNT_".$this->session->userdata('lang_code').",1,150) AS SHORT_CNT, TOURS_RPV_IMG_URL, TOURS_LENGTH, FORMAT(TOURS_PRICE_".$this->session->userdata('lang_code').",0) as TOURS_PRICE
        , IMG_GRP_ID FROM tours TOUR WHERE CATEGORY_ID = ? AND RPV_YN='Y' ORDER BY TOURS_CREATE_TIME DESC LIMIT 4";
        $query = $this->db->query($toursSql,array($cateID));
        return $query->result();
    }
    public function loadHorMainCateDetail($cateID)
    {
        $toursSql = "SELECT TOURS_ID, (SELECT n.NATIONAL_NAME FROM national n, location l WHERE l.NATIONAL_ID = n.NATIONAL_ID AND l.LOCATION_ID = TOUR.LOCATION_ID ) AS NATIONAL
        , (SELECT LOCATION_NM_".$this->session->userdata('lang_code')." FROM location WHERE LOCATION_ID = TOUR.LOCATION_ID) as LOCATION, TOURS_TIT_".$this->session->userdata('lang_code')." as TOURS_TIT,
        SUBSTRING(TOURS_SHRT_CNT_".$this->session->userdata('lang_code').",1,150) AS SHORT_CNT, TOURS_RPV_IMG_URL, TOURS_LENGTH, FORMAT(TOURS_PRICE_".$this->session->userdata('lang_code').",0) as TOURS_PRICE
        , IMG_GRP_ID FROM tours TOUR WHERE CATEGORY_ID = ? AND RPV_YN='Y' ORDER BY TOURS_CREATE_TIME DESC LIMIT 10";
        $query = $this->db->query($toursSql,array($cateID));
        return $query->result();
    }

    /*
     * load tour category
     */
    public function loadTourCate(){
        $tourCate = "SELECT CATEGORY_ID, CATEGORY_NM_".$this->session->userdata('lang_code')." AS CATE_NAME FROM `category` WHERE `GROUP_ID` = 'T' ";
        $query = $this->db->query($tourCate);
        return $query->result();
    }

    /*
     * load 3 main Category in home page
     */
    public function loadMainHomeCate(){
        $mainCate = "SELECT CATEGORY_ID, CATEGORY_NM_".$this->session->userdata('lang_code')." AS CATE_NAME
                    , CATEGORY_DESC_".$this->session->userdata('lang_code')." AS CATE_DESC, MAIN_CATE, COLOR_CD
                    FROM `category` WHERE `MAIN_CATE` <> 0  ORDER BY MAIN_CATE ASC";
        $query = $this->db->query($mainCate);
        return $query->result();
    }

    /*
     * load all tour by category
     */

    public function loadTourbyCategory($cateID){
        $sql = "SELECT TOURS_ID, CATEGORY_ID, TOURS_TIT_".$this->session->userdata('lang_code')." AS TOURS_TITLE FROM Tours WHERE CATEGORY_ID = ? AND DISPLAY_YN = 'Y'";
        $query = $this->db->query($sql, $cateID);
        return $query->result();
    }

    /*
     * Insert Hotel request
     */
    public function insertHotelRequest($data){
        if($this->db->insert('hotel_order',$data)){
            return true;
        }else{
            return false;
        }
    }

    /*
     * Insert Restaurant request
     */
    public function insertRestaurantRequest($data){
        if($this->db->insert('restaurant_order',$data)){
            return true;
        }else{
            return false;
        }
    }

    /*
     * Insert Car request
     */
    public function insertCarRequest($data){
        if($this->db->insert('car_order',$data)){
            return true;
        }else{
            return false;
        }
    }

    /*
     * Insert Tour request
     */
    public function insertTourRequest($data){
        if($this->db->insert('tours_order',$data)){
            return true;
        }else{
            return false;
        }
    }
}