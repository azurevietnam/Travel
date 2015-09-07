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
class adminCommonModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function createID($cateID, $tableName, $keyID){
        $keyCateID = substr($cateID,0,1);
        $maxID ="";
        $returnID = $keyCateID;
        $maxCurrentID = $this->getMaxID($keyCateID,$tableName,$keyID);
        foreach ($maxCurrentID as $row) {
            $maxID  = $row->$keyID;
        }
        $numID = substr($maxID,1,5);
        $setNum = $numID + 1;
        $lenNum = strlen($setNum);
        if($lenNum<5){
            for($i=0; $i<5-$lenNum; $i++){
                $returnID .= '0';
            }
        }
        $returnID .= $setNum;
        return $returnID;
    }

    public function getMaxID($cateID, $tableName, $keyID){
        $query = $this->db->select_max($keyID);
        $query = $this->db->like($keyID, $cateID, 'after');
        $query = $this->db->get($tableName);
        return $query->result();
    }
}