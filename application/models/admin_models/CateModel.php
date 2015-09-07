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
class CateModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    /*
     *  Load All Category
     */
    public function loadAllCate(){
        $sql = 'Select CATEGORY_ID, CATEGORY_NM_VI, cate.GROUP_ID, GROUP_NAME From category cate, cate_group grp Where cate.GROUP_ID = grp.GROUP_ID';
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
}