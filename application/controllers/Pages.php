<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller{

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
        function __construct()
    {
        parent::__construct();
       $this->load->model("report_model");
    }
	public function index()
	{
            //$this->load->view('pages/header',$header);
            
            $data['dash']['world']=$this->report_model->GetWorldSummary();
            $data['dash']['india']=$this->report_model->GetWorldSummary("IND");

            $data['cumulatetrend']=$this->report_model->getCumulative();
            $data['last7cumulatetrend']=$this->report_model->getCumulative(7);
            $data['latest']=$this->report_model->LatestReports();
            $this->load->view('pages/dashboard',$data);
            //$this->load->view('pages/footer');
	}
        public function updateData(){
            echo $this->report_model->getJsonDataCovidOut();
            
        }
	
        public function updateData1(){
            echo $this->report_model->getJsonDataWorldoMeter();
        }
        
	
        public function updateDataMohfw(){
            echo $this->report_model->getMohfwData();
        }
        
        public function updateDataFlou(){
            echo $this->report_model->getDatafromFlourish();
        }
        
      
}
