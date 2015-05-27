<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of top
 *
 * @author maxmalla003
 */
class top extends CI_Controller{
    public function __construct() {

        parent::__construct();
        $this->load->model('monitoringmodel');
    }
    public function index() {
       $data['value'] = $this->getValue();
       $this->load->view('top', $data);
    }
    function getValue(){  
        $today = getdate();
        $arrayFile =  array();
        $arrayValue =  array();
        $getmonitoring = (String)$this->monitoringmodel->getMonitoring();
        $numMon = (int)substr($getmonitoring,-1);
        $strAddressMon='';
        $path='';
        switch ($numMon){
            case 1:
                $strAddressMon = '伊都1号機';//伊都地区(1号機)';
                $path='/Sharedfolder/DAYDATA/2/';
                break;
            case 2:
                $strAddressMon = '伊都2号機';//伊都地区(2号機)';
                $path='/Sharedfolder/DAYDATA/3/';
                break;
            case 3:
                $strAddressMon = '箱崎1号機';//箱崎地区(3号機)';
                $path='/Sharedfolder/DAYDATA/4/';
                break;
            default :
                $strAddressMon = '箱崎2号機';//箱崎地区(4号機)';
                $path='/Sharedfolder/DAYDATA/5/';
                break;
        }
        $hours = ($today['hours'] < 10) ? "0".$today['hours'] : $today['hours'];
        $day = ($today['mday'] < 10)? "0".$today['mday'] : $today['mday'];
        $month = ($today['mon'] < 10) ? "0".$today['mon'] : $today['mon'];
        
        $strFileDate = $today['year'].$month.$day."_".$hours ;
        array_push($arrayFile,  $path.$strFileDate);
        foreach ($arrayFile as $value) {
            if (file_exists($_SERVER["DOCUMENT_ROOT"].$value.".csv"))
            {
                $file = fopen($_SERVER["DOCUMENT_ROOT"].$value.".csv","r");
                $array_data = fgetcsv($file);
                $arrayValue['mon']=array('value'=>$this->getRoundValue((float)$array_data[0],3,1),'unit'=>'μSv/h','fontsize'=>'','address'=>$strAddressMon);
                fclose($file); 
            }
            else {
                 $arrayValue['mon']=array('value'=>'データ未取得','unit'=>'','fontsize'=>'15px','address'=>$strAddressMon);;
            }
        }
        return $arrayValue;
    }
     function getValueReload(){
        if(isset($_POST['type'])){
            $arrayMon = $this->getValue();
            echo $arrayMon['mon']['address'].','.$arrayMon['mon']['value'].','. $arrayMon['mon']['unit'].','. $arrayMon['mon']['fontsize'];
        }
    }
    public function getRoundValue($value,$option,$type){
        if($type == 0){
            return round($value,$option);
        }
        else{
            $valuePow = pow(10,$option);
            return (float) ((int)($value*$valuePow))/$valuePow;
        }
    }
}