<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class guides extends CI_Controller
{

    /**
     * Index Page for guide controller.
     *
     * Maps to the following URL
     *        http://vungchuatravel.com/index
     *    - or -
     *        http://vungchuatravel.com/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://vungchuatravel.com
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */


    function __construct()
    {
        parent::__construct();
        $this->load->model('Guide_model');
    }

    public function guides_list($cateID)
    {
        if(isset($cateID)){
            $data['pages'] = ceil($this->Guide_model->pagesPaging($cateID) / 4);
            $data['CATE_ID'] = $cateID;

            $this->load->view('includes/short-header');
            $this->load->view('guides', $data);
            $this->load->view('includes/footer');
        }
    }

    public function guide_detail($guideID){
        if(isset($guideID)){
            $data['guideID'] = $guideID;
            $data['imgData'] = $this->Guide_model->loadImgUrl($guideID);
            $data['guideDetail'] = $this->Guide_model->getGuideDetail($guideID);
            $data['guideRelation'] = $this->Guide_model->guideRelation($guideID);
            $SEOdata['metaData'] = $this->Guide_model->tourSEOkey($guideID);

            $this->load->view('includes/short-header',$SEOdata);
            $this->load->view('guide-detail', $data);
            $this->load->view('includes/footer');
        }
    }
    //    load post
    public function loadPost($cateID){
        if($_POST) {
            //sanitize post value
            $group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
            //throw HTTP error if group number is not valid
            if(!is_numeric($group_number)){
                header('HTTP/1.1 500 Invalid number!');
                exit();
            }
            //get current starting point of records
            $position = ($group_number * 4);
            $queryResult = $this->Guide_model->loadGuidePost($cateID,$position);
            foreach($queryResult as $row){
                echo '<div class="col-sms-6 col-sm-6 col-md-3">
                <article class="box">
                    <a href="'.base_url().'popup/index/'.$row->IMG_GRP_ID.'" title="" class="hover-effect popup-gallery"><img src="'. base_url().$row->TRAVEL_GUIDE_RPV_IMG_URL .'" alt="" width="270" height="160" /></a>
                    <div class="details">
                        <h4 class="box-title"><a href="'.base_url().'guides/guide_detail/'. $row->TRAVEL_GUIDE_ID.'"><div class="title-height">'. $row->TG_TIT.'</div><small>'. $row->LOCATION.' - '.$row->NATIONAL.'</small></a></h4>
                    </div>
                </article>
            </div>';
            }
        }
    }
}
