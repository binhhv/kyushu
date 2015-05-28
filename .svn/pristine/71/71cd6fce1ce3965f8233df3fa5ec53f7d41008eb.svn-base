<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author maxmalla006
 */
class admin extends CI_Controller{
    public function __construct() {

        parent::__construct();
        $this->load->model('monitoringmodel');
    }
    public function index() {
       $this->load->view('login');
    }
    public function checkLogin() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $checklogin = $this->monitoringmodel->checkLogin($username, $password);
        if(strcmp($checklogin, "1")){
            $msg = "Wrong Username or Password. Please retry";
            header("location:admin?msg=$msg");
        }else{
            $name['name'] = $this->monitoringmodel->getMonitoring();
             redirect('admin/changeshow', $name);
        }  
    }
    public function changeshow(){
        $name['name'] = $this->monitoringmodel->getMonitoring();
        $this->load->view('changeshow', $name);
        
    }
    public function saveChange(){
//        $this->monitoringmodel->UpdateDataChange($param);
         $param = isset($_POST['taskOption']) ? $_POST['taskOption'] : false;
        if($param) {
            $this->monitoringmodel->UpdateDataChange($param);
        } else {
          exit; 
        }
        redirect('admin/changeshow');
    }
      
}
