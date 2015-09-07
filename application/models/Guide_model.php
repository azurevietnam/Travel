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
class Guide_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $user_language = $this->session->userdata('language');
        if (strlen($this->session->userdata('language')) <1 ) {
            $this->session->set_userdata('language', 'vietnam');
            $this->session->set_userdata('lang_code', 'VI');
        }
        $this->lang->load($user_language, $user_language);
    }

    //load images gallery
    public function loadImgUrl($imgGrp){
        $imgSql = "SELECT IMG_ID, IMG_GRP_ID, IMG_URL, IMG_ALT FROM img_grp WHERE IMG_GRP_ID = ?";
        $query = $this->db->query($imgSql, array($imgGrp));
        return $query->result();
    }

//    page paging
    public function pagesPaging($cateID){
        $totalActSql = "";
        if($cateID != 'all') {
            $totalActSql = "SELECT COUNT(*) AS P_RECORDS FROM travel_guides WHERE CATEGORY_ID = '" . $cateID . "' AND RPV_YN = 'Y'";
        }else{
            $totalActSql = "SELECT COUNT(*) AS P_RECORDS FROM travel_guides WHERE RPV_YN = 'Y'";
        }
        $query = $this->db->query($totalActSql);
        $row = $query->row();
        return $row->P_RECORDS;
        $this->db->escape_str();
    }

    public function getGuideDetail($guideID){
        $strQuery = "SELECT
                          TRAVEL_GUIDE_ID
                          , CATEGORY_ID
                          , (SELECT n.NATIONAL_NAME FROM national n, location l WHERE l.NATIONAL_ID = n.NATIONAL_ID AND l.LOCATION_ID = GUIDE.LOCATION_ID ) AS NATIONAL
                          , (SELECT LOCATION_NM_" . $this->session->userdata('lang_code') . " FROM location WHERE LOCATION_ID = GUIDE.LOCATION_ID) AS LOCATION
                          , LOCATION_ID
                          , TRAVEL_GUIDE_TITLE_" . $this->session->userdata('lang_code')." AS GUIDE_TITLE
                          , TRAVEL_GUIDE_SHRT_CONTENT_" . $this->session->userdata('lang_code')." AS GUIDE_SRT_CNT
                          , TRAVEL_GUIDE_RPV_IMG_URL
                          , TRAVEL_GUIDE_CONTENT_" . $this->session->userdata('lang_code')." AS GUIDE_CONTENT
                          , IMG_GRP_ID
                    FROM
                          `travel_guides` GUIDE
                    WHERE
                          TRAVEL_GUIDE_ID = ?
                          AND DISPLAY_YN = 'Y'";
        $query = $this->db->query($strQuery, $guideID);
        return $query->result();
    }

    public function guideRelation($guideID){
        //get categories ID
        $strQueryCateID = "SELECT CATEGORY_ID FROM `travel_guides` WHERE TRAVEL_GUIDE_ID = ? ";
        $queryCate = $this->db->query($strQueryCateID,$guideID);
        $row = $queryCate->row();
        $cateID =  $row->CATEGORY_ID;
        //fill categories ID
        $strQuery = "SELECT
                          TRAVEL_GUIDE_ID
                          , CATEGORY_ID
                          , (SELECT n.NATIONAL_NAME FROM national n, location l WHERE l.NATIONAL_ID = n.NATIONAL_ID AND l.LOCATION_ID = GUIDE.LOCATION_ID ) AS NATIONAL
                          , (SELECT LOCATION_NM_" . $this->session->userdata('lang_code') . " FROM location WHERE LOCATION_ID = GUIDE.LOCATION_ID) AS LOCATION
                          , LOCATION_ID
                          , TRAVEL_GUIDE_TITLE_" . $this->session->userdata('lang_code')." AS GUIDE_TITLE
                          , TRAVEL_GUIDE_SHRT_CONTENT_" . $this->session->userdata('lang_code')." AS GUIDE_SRT_CNT
                          , TRAVEL_GUIDE_RPV_IMG_URL
                          , TRAVEL_GUIDE_CONTENT_" . $this->session->userdata('lang_code')." AS GUIDE_CONTENT
                          , IMG_GRP_ID
                    FROM
                          `travel_guides` GUIDE
                    WHERE
                          CATEGORY_ID = ?
                          AND DISPLAY_YN = 'Y'
                    LIMIT 5
                    ";
        $query = $this->db->query($strQuery, $cateID);
        return $query->result();
    }

    public function tourSEOkey($guideID){
        $Sql ="SELECT
                    TRAVEL_GUIDE_ID
                    , META_TITLE_" . $this->session->userdata('lang_code') . " AS META_TITLE
                    , DESCRIPTION_" . $this->session->userdata('lang_code') . " AS DESCRIPTION
                    , KEYWORDS_" . $this->session->userdata('lang_code') . " AS KEYWORDS
                FROM travel_guides GUIDE
                WHERE TRAVEL_GUIDE_ID = ?";
        $query = $this->db->query($Sql,$guideID);
        return $query->result();
    }

    public function loadGuidePost($cateID, $position){
        $SqlStr = "";
        if($cateID != 'all') {
            $SqlStr = "SELECT TRAVEL_GUIDE_ID, (SELECT n.NATIONAL_NAME FROM national n, location l WHERE l.NATIONAL_ID = n.NATIONAL_ID AND l.LOCATION_ID = TG.LOCATION_ID ) AS NATIONAL
        ,(SELECT LOCATION_NM_".$this->session->userdata('lang_code')." FROM location WHERE LOCATION_ID = TG.LOCATION_ID) as LOCATION, TRAVEL_GUIDE_TITLE_".$this->session->userdata('lang_code')." as TG_TIT,
        SUBSTRING(TRAVEL_GUIDE_SHRT_CONTENT_".$this->session->userdata('lang_code').",1,150) AS SHORT_CNT, TRAVEL_GUIDE_RPV_IMG_URL, IMG_GRP_ID FROM travel_guides TG WHERE CATEGORY_ID = '".$cateID."' AND RPV_YN='Y' LIMIT $position, 4 ";
        }else{
            $SqlStr = "SELECT TRAVEL_GUIDE_ID, (SELECT n.NATIONAL_NAME FROM national n, location l WHERE l.NATIONAL_ID = n.NATIONAL_ID AND l.LOCATION_ID = TG.LOCATION_ID ) AS NATIONAL
        ,(SELECT LOCATION_NM_".$this->session->userdata('lang_code')." FROM location WHERE LOCATION_ID = TG.LOCATION_ID) as LOCATION, TRAVEL_GUIDE_TITLE_".$this->session->userdata('lang_code')." as TG_TIT,
        SUBSTRING(TRAVEL_GUIDE_SHRT_CONTENT_".$this->session->userdata('lang_code').",1,150) AS SHORT_CNT, TRAVEL_GUIDE_RPV_IMG_URL, IMG_GRP_ID FROM travel_guides TG WHERE RPV_YN='Y' LIMIT $position, 4 ";
        }
        $query = $this->db->query($SqlStr);
        return $query->result();
    }
}