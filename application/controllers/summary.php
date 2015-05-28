<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of summary
 *
 * @author maxmalla006
 */
class summary extends CI_Controller{
    public function __construct() {

        parent::__construct();
    }
    public function index() {
       $this->load->view('summary');
       
    }
    public function objective(){
        $this->load->view('objective');
    }
     public function organization(){
        $this->load->view('organization');
    }
     public function capacity(){
        $this->load->view('capacity');
    }
     public function leader(){
        $this->load->view('leader');
    }
     public function manager(){
        $this->load->view('manager');
    }
     public function staff(){
        $this->load->view('staff');
    }
    public function evaluation(){
        $this->load->view('evaluation');
    }


    //hung commit teo
    ///sumary binh
    //hung row one
    //change
    
}