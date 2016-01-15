<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagesConfig extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */


    function __construct(){
        parent::__construct();
        if(!($this->session->userdata('language'))){
            $this->session->set_userdata('language', 'vietnam');
            $this->session->set_userdata('lang_code', 'VI');
        }
        $this->load->model('Index_model');
    }

    public function index()
    {
        $lang_cd = $this->session->userdata('lang_code');
        $this->load->helper('url'); //load url helper array

        $data['baseURL'] = base_url();
//        Main categories
//        $data['TourCate1']= $this->Index_model->loadMainCate('T00001');
//        $data['TourCate2']= $this->Index_model->loadMainCate('T00002');
//        $data['TourCate3']= $this->Index_model->loadMainCate('T00003');
//        $data['TourCate4']= $this->Index_model->loadMainCate('T00004');
//        $data['TourCate5']= $this->Index_model->loadMainCate('T00005');
//        $data['GuideCate']= $this->Index_model->loadGuideCate('D00001');
//        $data['TourCate6']= $this->Index_model->loadMainCate('T00006');
//        $data['TourCate7']= $this->Index_model->loadMainCate('T00007');
//        $data['TourCate8']= $this->Index_model->loadMainCate('T00008');

        $data['toursCate'] = $this->Index_model->loadTourCate();
        $data['toursQBCate'] = $this->Index_model->tourGroup('Q');
        $data['newsData'] = $this->Index_model->loadNewsListByCateID('N00001',7);
        $data['promotionData'] = $this->Index_model->loadNewsListByCateID('N00002',7);
        $data['generalData'] = $this->Index_model->loadNewsListByCateID('N00003',4);

        $data['mainCate'] = $this->Index_model->loadMainHomeCate('D00001');
//        $data['Tour1'] = $this->Index_model->loadMainCateDetail('T00001');
//        $data['Tour2'] = $this->Index_model->loadMainCateDetail('T00002');
//        $data['Tour3'] = $this->Index_model->loadMainCateDetail('T00003');
//        $data['Tour3'] = $this->Index_model->loadHorMainCateDetail('T00003');
//        $data['Tour4'] = $this->Index_model->loadMainCateDetail('T00004');
//        $data['Tour5'] = $this->Index_model->loadMainCateDetail('T00005');
//        $data['Guide'] = $this->Index_model->loadMainHotDest('D00001');
//        $data['Tour6'] = $this->Index_model->loadMainCateDetail('T00006');
//        $data['Tour7'] = $this->Index_model->loadMainCateDetail('T00007');
//        $data['Tour8'] = $this->Index_model->loadMainCateDetail('T00008');

        $this->load->view('includes/header',$data);
        $this->load->view('index',$data);
        $this->load->view('includes/footer',$data);

    }
    public function setlang($lang)
    {
        if($lang == 'en')
        {
            $this->session->set_userdata('language', 'english');
            $this->session->set_userdata('lang_code', 'EN');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else if($lang == 'vi'){
            $this->session->set_userdata('language', 'vietnam');
            $this->session->set_userdata('lang_code', 'VI');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    }
}
