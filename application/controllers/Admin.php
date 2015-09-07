<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */


    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url', 'cookie'));
        $this->load->library('form_validation');
        $this->load->model('admin_models/Admin_Model');
        $this->load->model('admin_models/header_mode');
    }

    // function chinh
    public function index(){
        if($this->_user_is_login() == true){
            $headerData = $this->header_mode->headerData();
            $this->load->view('admin/includes/admin-header',$headerData);
            $this->load->view('admin/index');
            $this->load->view('admin/includes/admin-footer');
        }else{
            //check auto login if already have cookie
            $user_cookie = "userCookie";
            if(isset($_COOKIE[$user_cookie])){
                $user = parse_str($_COOKIE[$user_cookie]);
                //get cookie info
                $username = $user['username'];
                $this->session->set_userdata('username',$username);
                redirect(base_url('admin/index'));
            }else{
                redirect(base_url('admin/signin'));
            }
        }
    }

    // goi form dang nhap
    public function signin(){
        if($this->_user_is_login() == true){
            redirect('admin/index');
        }else{
            $this->load->view('admin/signin');
        }
    }

    // hàm kiểm tra user va password khi đăng nhập
    public function login(){
        $this->form_validation->set_rules('username', 'username', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'required|xss_clean');

        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $remember = $this->input->post('rememberme');
        $chkExist = $this->Admin_Model->checkLogin($username, $password);
        if($chkExist > 0){
            if($remember == 1){
                $cookie_name	=	'userCookie';
                $cookie_time	=	3600*24*30; // 30 days.
                setcookie('ci-session', 'user='."", time() - 3600);	// Unset cookie of user
                setcookie($cookie_name, 'username='.$username, time() + $cookie_time);
            }else {
                $this->session->set_userdata('username', $username);
                $this->session->set_flashdata('suscess', 'Đăng nhập thành công');
                redirect('admin/index');
            }
        }else{
            $data['error_msg'] = 'Tên đăng nhập hoặc mật khẩu không chính xác.';
            $this->load->view('admin/signin',$data);
        }
    }

    // gọi form đăng ký
    public function signup(){
        $this->load->view('admin/signup');
    }

    //check user da dang nhap hay chua
    private function _user_is_login()
    {
        $user_data = $this->session->userdata('username');
        if(!$user_data)
        {
            return false;
        }
        return true;
    }

    // hàm log out
    public function logout()
    {
        if($this->_user_is_login() == true)
        {
            $this->session->sess_destroy();	// Unset session of user
            $cookiename	=	"userCookie";
            setcookie($cookiename, 'user='."", time() - 3600);	// Unset cookie of user
            redirect(base_url('admin/signin'));
        }
        $this->session->set_flashdata('flash_message', 'Đăng xuất thành công');
        redirect(base_url('admin/signin'));
    }

    // hàm chức năng đăng ký
    public function adminRegister(){

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required|matches[pwd_confirm]');
        $this->form_validation->set_rules('pwd_confirm', 'password confirm', 'required');

        $this->form_validation->set_message('required', 'Yêu cầu nhập đầy đủ thông tin.');
        $this->form_validation->set_message('matches', 'Xác nhận mật khẩu thất bại.');

        if ($this->form_validation->run() == TRUE){
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $chk = $this->Admin_Model->checkUser($username,$email);

            if($chk<=0) {
                $data = array(
                    'USERNAME' => $this->input->post('username'),
                    'PASSWORD' => md5($this->input->post('password')),
                    'EMAIL' => $this->input->post('email'),
                    'ADMIN_LEVEL' => 2,
                );
                $this->db->insert('web_manager', $data);
                echo '<script type="text/javascript">alert("Đăng ký thành công. Bạn có thể đăng nhập");</script>';
                $this->load->view('admin/signin');
            }else{
                $data['existUser'] = 'Tên đăng nhập hoặc Email đã tồn tại.';
                $this->load->view('admin/signup',$data);
            }
        }else{
//            $data['error'] = validation_errors();
            $this->load->view('admin/signup');
        }
    }
}
