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
class Cate_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    /*
     *  Load All Category
     */
    public function loadAllCate(){
        $sql = 'Select CATEGORY_ID, CATEGORY_NM_VI, CATEGORY_DESC_VI, cate.GROUP_ID, GROUP_NAME From category cate, cate_group grp Where cate.GROUP_ID = grp.GROUP_ID';
        $result = $this->db->query($sql);
        return $result->result();
    }

    /*
     *  Load All Category Group
     */
    public function loadAllGroupCate(){
        $query = $this->db->get('cate_group');
        return $query->result();
    }

    /*
     *  Create Category ID
     */
    public function createCateID($grpID){
        $maxID = 1;
        $categoryID = $grpID;
        $sql = 'SELECT MAX(CATEGORY_ID) AS CATEGORY_ID FROM category WHERE CATEGORY_ID LIKE ?'.'"%"';
        $result = $this->db->query($sql,$grpID);
        foreach($result->result() as $row){
            $maxID = $row->CATEGORY_ID;
        }
        if(isset($maxID)){
            $subID = substr($maxID,1,5);
            $subMaxID = $subID + 1;
            $subLen = strlen($subMaxID);
            for($i = 0; $i < 5 - $subLen; $i++){
                $categoryID .= '0';
            }
            $categoryID .= $subMaxID;
        }else{
            $categoryID = $grpID.'00001';
        }
        return $categoryID;
    }
    /*
     *  Insert New Category
     */
    public function insertCate($cateData){
        if($this->db->insert('category',$cateData)){
            return true;
        }else{
            return false;
        }
    }
    /*
     *  get category by cateID
     */
    public function getCateByID($cateID){
        $sql = 'SELECT
                    CATEGORY_ID
                    , CATEGORY_NM_EN
                    , CATEGORY_NM_VI
                    , CATEGORY_DESC_VI
                    , CATEGORY_DESC_EN
                    , cate.GROUP_ID
                    , grp.GROUP_NAME
                    , cate.IMG_URL
                    , cate.MAIN_CATE
                    , cate.COLOR_CD
                FROM
                    category cate
                    , cate_group grp
                WHERE
                    CATEGORY_ID = ?
                    AND cate.GROUP_ID = grp.GROUP_ID';
        $result = $this->db->query($sql,$cateID);
        return $result->result();
    }

    public function updateCate($cateID, $cateData){
        $this->db->where('CATEGORY_ID',$cateID);
        if($this->db->update('category',$cateData)){
            return true;
        }else{
            return false;
        }
    }
}