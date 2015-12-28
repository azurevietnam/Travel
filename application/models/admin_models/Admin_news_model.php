<?php
/**
 * Created by PhpStorm.
 * User: HAILONG_ICT
 * Date: 12/18/2015
 * Time: 3:48 PM
 */
class Admin_news_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function loadAllCateByGroup($cateGrp){
        $query = 'SELECT CATEGORY_ID, CATEGORY_NM_VI, GROUP_ID FROM CATEGORY WHERE GROUP_ID = ?';
        $result = $this->db->query($query, $cateGrp);
        return $result->result();
    }

    public function loadAllNewsByCateID($cateID){
        $query = 'SELECT
                    NEWS_ID
                    , CATEGORY_ID
                    , NEWS_TITLE_VI
                    ,CREATE_TIMESTAMP
                    , STATUS
                FROM `news` WHERE CATEGORY_ID = ? ORDER BY CREATE_TIMESTAMP DESC';
        $result = $this->db->query($query, $cateID);
        return $result->result();
    }

    public function loadNewsByID($newsID){
        $result = $this->db->get('news');
        $this->db->where('NEWS_ID', $newsID);
        return $result->result();
//        $query = 'SELECT * FROM `news` WHERE NEWS_ID = ?';
//        $result = $this->db->query($query, $newsID);
//        return $result->result();
    }


    public function insertNews($newsData){
        if($this->db->insert('news',$newsData)){
            return true;
        }else{
            return false;
        }
    }
}