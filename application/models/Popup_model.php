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
class Popup_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function loadImgUrl($imgGrp){
        $imgSql = "SELECT IMG_ID, IMG_GRP_ID, IMG_URL, IMG_ALT FROM img_grp WHERE IMG_GRP_ID = ?";
        $query = $this->db->query($imgSql, array($imgGrp));
        return $query->result();
    }
}