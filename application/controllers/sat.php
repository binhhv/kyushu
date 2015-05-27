<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sat
 *
 * @author maxmalla006
 */
class sat extends CI_Controller{
    public function __construct() {

        parent::__construct();
    }
    public function index() {
       $this->load->view('sat');
    }
    public function approval(){
        $this->load->view('approval');
    }
    public function equipment(){
        $this->load->view('equipment');
    }
    
    public function use1(){
        $this->load->view('use');
    }
    public function ito(){
        $this->load->view('ito');
    }

}
