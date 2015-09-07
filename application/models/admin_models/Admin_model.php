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
class Admin_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    // hàm kiểm tra user và email đã tồn tại hay chưa
    public function checkUser($username, $email){
        $data = array(
            'USERNAME' => $username,
            'EMAIL' => $email
        );
        $strSql = "SELECT COUNT(*) AS COUNT FROM `web_manager` where USERNAME = ? OR EMAIL = ?";
        $query = $this->db->query($strSql,$data);
        $row = $query->row();
        return $row->COUNT;
    }

    // hàm kiểm tra user đăng nhập thành công hay không.
    public function checkLogin($username, $password){
        $data = array(
            'USERNAME' => $username,
            'PASSWORD' => $password
        );
        $strSql = "SELECT COUNT(*) AS COUNT FROM `web_manager` where USERNAME = ? AND PASSWORD = ?";
        $query = $this->db->query($strSql,$data);
        $row = $query->row();
        return $row->COUNT;
    }
}