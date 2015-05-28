<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author maxmalla006
 */
class index extends CI_Controller{
    public function __construct() {

        parent::__construct();
        $this->load->model('monitoringmodel');
    }
    public function index() {
         $data['value'] = $this->getValue();
       $this->load->view('index', $data);
//       $this->createDirectory("data", "dataold", "dataupdateold");
    
        $this->getAllFiles();
//       $this->moveFile();
//       $this->getAllFileUpdate();
//         $this->averageOfDaymay1();
//        $this->getValue();
        
       
      
    }
    
    function getValue(){  
        $today = getdate();
        $arrayFile =  array();
        $arrayValue =  array();
        $getmonitoring = (String)$this->monitoringmodel->getMonitoring();
        $numMon = (int)substr($getmonitoring,-1);
        $strAddressMon='';
        switch ($numMon){
            case 1:
                $strAddressMon = '伊都1号機';//伊都地区(1号機)';
                break;
            case 2:
                $strAddressMon = '伊都2号機';//伊都地区(2号機)';
                break;
            case 3:
                $strAddressMon = '箱崎1号機';//箱崎地区(3号機)';
                break;
            default :
                $strAddressMon = '箱崎2号機';//箱崎地区(4号機)';
                break;
        }
        $hours = ($today['hours'] < 10) ? "0".$today['hours'] : $today['hours'];
        $strFileDate = $today['year'].$today['mon'].$today['mday']."-".$hours ;
        array_push($arrayFile,  $getmonitoring."_".$strFileDate);
        foreach ($arrayFile as $value) {
            if (file_exists($_SERVER["DOCUMENT_ROOT"]."/data/".$value.".csv"))
            {
                $file = fopen($_SERVER["DOCUMENT_ROOT"]."/data/".$value.".csv","r");
                $array_data = fgetcsv($file);
                $arrayValue['mon']=array('value'=>$this->getRoundValue((float)$array_data[0],3,0),'unit'=>'μSv/h','fontsize'=>'','address'=>$strAddressMon);
                fclose($file); 
            }
            else {
                 $arrayValue['mon']=array('value'=>'データ未取得','unit'=>'','fontsize'=>'18px','address'=>$strAddressMon);;
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
   public function createDirectory($folder1, $folder2, $folder3){
       
       $dirPath = $_SERVER["DOCUMENT_ROOT"]."/".$folder1;
       $dirPath2 = $_SERVER["DOCUMENT_ROOT"]."/".$folder2;
       $dirPath3 = $_SERVER["DOCUMENT_ROOT"]."/".$folder3;
        if(!is_dir($dirPath)){
            $result = mkdir($dirPath, 0775, true);
            chmod($dirPath, 0775);
        }
        if(!is_dir($dirPath2)){
            $result2 = mkdir($dirPath2, 0775, true);
            chmod($dirPath2, 0775);
        }
        if(!is_dir($dirPath3)){
            $result3 = mkdir($dirPath3, 0775, true);
             chmod($dirPath3, 0775);
//            if ($result3 == 1) {
//            echo $dirPath3 . " has been created";
//            } 
//            else {
//                echo $dirPath3 . " has NOT been created";
//            }
            }
//            else{
//                echo "The Directory {$dirPath3} exists";
//            }
   }
    
    public function getAllFiles() {
        $dirPath1 = $_SERVER["DOCUMENT_ROOT"]."/data/";
        $files = '';
        if (file_exists($dirPath1)){
            $dir = $dirPath1;
            $dir = opendir($dir);
            while (($currentFile = readdir($dir)) !== false) {
                if ($this->endsWith($currentFile, '.csv')){
                    $files = $currentFile;
                   
                    $data = (String)$this->monitoringmodel->getMonitoringByString($files);
                    if(strcmp($data, "1")){
                         $this->parse_file($files, $dirPath1);
                    }
                }
            }
            closedir($dir);
        }
        $this->getAllFileUpdate();
        
        $dirPath1 = $_SERVER["DOCUMENT_ROOT"]."/data/";
        $dirPath2 = $_SERVER["DOCUMENT_ROOT"]."/dataold/";
        $this->moveFile($dirPath1, $dirPath2);
        
        $this->averageOfDaymay1();
        $this-> avgmonitoringmonth();
        return $files;
    }
    public function getAllFileUpdate(){
        $dirPath2 = $_SERVER["DOCUMENT_ROOT"]."/dataupdateold/";
        $files = '';
        if(file_exists($dirPath2)){
            $dirupdate = $dirPath2;
            $dirupdate = opendir($dirupdate);
            while (($currentFile = readdir($dirupdate)) !== false) {
                if ($this->endsWith($currentFile, '.csv')){
                    $files = $currentFile;
                    $data = $this->monitoringmodel->getMonitoringByName($files);
                    $datavalue = $data['namesearch'];
                    if($datavalue == $files){
                         $this->update_file($files);
                    }
                }
            }
            $getnameandday = $this->monitoringmodel->getMonitoringByStatus();
            if($getnameandday != ''){
                foreach ($getnameandday as $rowdata) {
                    $param['day'] = $rowdata->day;
                    $param['idmonitor'] = $rowdata->idmonitor;
                    $nameandday = $param['idmonitor'].$param['day'];
                    $dataavg = $this->monitoringmodel->getAverageOfDayUpdate($param['day'], $param['idmonitor']);
                    $dataa['day'] = $dataavg['day'];
                    $dataa['idmonitor'] = $dataavg['idmonitor'];
                    $dataa['monitoringdata'] = $dataavg['average'];
                    $dataa['unit'] = "μSv/h";

                    $checkname = (String)$this->monitoringmodel->getAverageByName($nameandday);               
                     if($checkname != $dataavg['average'] ){
                         $this->monitoringmodel->avgmonitoringdateUpdate($dataa,  $nameandday);
                     }
                }
            }
            //update average by month
            $getnameandmonth = $this->monitoringmodel->getMonitoringByStatusMonth();
            if($getnameandmonth != ''){
                foreach ($getnameandmonth as $rowdata) {
                    $param['nameavgmonth'] = $rowdata->nameavgmonth;
                    $param['monitoringdata'] = $rowdata->monitoringdata;
                    $checkname = (String)$this->monitoringmodel->getAverageByNameOfMonth($param['nameavgmonth']);               
                     if($checkname != $param['monitoringdata'] ){
                         $this->monitoringmodel->avgmonitoringdateUpdateByMonth($param, $param['nameavgmonth']);
                     }
                }
            }

//            $datecc = (String)$this->monitoringmodel->getAverageByData($day, $strname, $dataa['monitoringdata']);
//            if(strcmp($datecc, "1")){
//                
//            } 
            closedir($dirupdate);
        }
        
        return $files;
    }
    public function moveFile($folder1, $folder2){
        if (file_exists($folder1)){
            $dir = opendir($folder1);
            while (($currentFile = readdir($dir)) !== false) {
                if ($this->endsWith($currentFile, '.csv')){
                    $value = $currentFile;
                    $strdata = explode('_', $value);
                    
                    if(count($strdata) == 2){
                        $strname = $strdata[0];
                        $strdatehour = $strdata[1];
                        $strdatehour = explode('-', $strdatehour);
                        
                        if(count($strdatehour) == 2){
                            $strdate = $strdatehour[0];
                            if(strlen($strdate) == 8){
                                $year = substr($strdate, 0, 4);
                                $month = substr($strdate, 4, 2);
                                $dayofmonth = substr($strdate, 6, 2); 
                                $data = $this->monitoringmodel->getMonitoringByName($value);
                                $data = $data['namesearch'];
                                $today = getdate();
                                $currenday = $today['mday'];
                                if($currenday > $dayofmonth){
                                    if($data == $value){
                                     //file exits database, move file
                                        copy($folder1 .$data, $folder2.$data);
                                        unlink($folder1 .$data);
                                    }
                                }
                            }
                        }
                        
                        
                    }
                    

                }
            }
            closedir($dir);
        }


        
        
    }
    
    public function averageOfDaymay1(){
        $data = $this->monitoringmodel->averageOfDay();
        
        foreach ($data as $rowdata) {
            $param['day'] = $rowdata->day;
            $param['idmonitor'] = $rowdata->idmonitor;
            $param['monitoringdata'] = $rowdata->average;
            $param['unit'] = "μSv/h";
            $param['namesearch'] = $rowdata->idmonitor.$rowdata->day;
            $day = explode('-', $param['day']);
            $nameavgmonth = $rowdata->idmonitor."_".$day[0]."_".$day[1];
            $param['nameavgmonth'] = $nameavgmonth;
            $datecc = (String)$this->monitoringmodel->getaverageByDay($param['day'], $param['idmonitor']);
            if(strcmp($datecc, "1")){
                $this->monitoringmodel->avgmonitoringdate($param);
            } 
        }
    }
    public function avgmonitoringmonth(){
        $data = $this->monitoringmodel->averageOfMonth();
        foreach ($data as $rowdata) {
            $namesearch = explode("_", $rowdata->nameavgmonth);
            $idmon = $namesearch[0];
            $year = $namesearch[1];
            $month = $namesearch[2];
            $param['month'] = $month;
            $param['year'] = $year;
            $param['idmonitor'] = $idmon;
            $param['namesearch'] = $rowdata->nameavgmonth;
            $param['monitoringdata'] = $rowdata->average;
            $param['unit'] = "μSv/h";
           
            
            $datecc = (String)$this->monitoringmodel->getaverageByMonth($rowdata->nameavgmonth);
            if(strcmp($datecc, "1")){
                $this->monitoringmodel->avgmonitoringmonth($param);
            } 
        }
    }

    public function endsWith($haystack, $needle) {
        return substr($haystack, -strlen($needle)) == $needle;
    }
    function parse_file($value, $dirPath1) 
    {
        $content = "";
        if (file_exists($dirPath1.$value))
        {
            
            $strdata = explode('_', $value);
            if(count($strdata) == 2){
                $strname = $strdata[0];            
                $strdatehour = $strdata[1];
                $strdatehour = explode('-', $strdatehour);
                if(count($strdatehour) == 2){
                    $strdate = $strdatehour[0];
                    $strhour = $strdatehour[1];
                    $strhour = explode('.', $strhour);
                    if(count($strhour) == 2){
                        $strhour = $strhour[0];
                        if(strlen($strdate) == 8){
                            $year = substr($strdate, 0, 4);
                            $month = substr($strdate, 4, 2);
                            $dayofmonth = substr($strdate, 6, 2);
                            $currday = $year ."-". $month ."-".$dayofmonth;


                            $data = $this->monitoringmodel->getMonitoringLast();
                            $file = fopen($dirPath1.$value."","r");
                            $array_data = fgetcsv($file);
                            $content = $arrayValue[$this->strstr_replica($value, '_', true)]=(float)$array_data[0];
                            fclose($file); 

                            if($data != $value){
                                $param['day'] = $currday;
                                $param['hour'] = $strhour;
                                $param['monitoringdata'] = $content;
                                $param['unit'] = "μSv/h";
                                $param['idmonitor'] = $strname;
                                $param['namesearch'] = $value;
                                $this->monitoringmodel->insertMonitoring($param);
                            } 
                        }
                        
                    }

                }   


                
            }
            
            
        }
        else 
        {
             $arrayValue[stristr($value,"_",true)]=0;
        }
        return $content;
    }
    
    function strstr_replica($haystack, $needle, $beforeNeedle = false) {
		$needlePosition = strpos($haystack, $needle);
		
		if ($needlePosition === false) {
			return false;
		}
		
		if ($beforeNeedle) {
			return substr($haystack, 0, $needlePosition);
		} else {
			return substr($haystack, $needlePosition);
		}
	}
    public function update_file($value){
        $content = "";
        if (file_exists($_SERVER["DOCUMENT_ROOT"]."/dataupdateold/".$value.""))
        {
            $strdata = explode('_', $value);
            if(count($strdata) == 2){
                $strname = $strdata[0];
                $strdatehour = $strdata[1];
                $strdatehour = explode('-', $strdatehour);
                $strhour = '';
                $strdate = $strdatehour[0];
                if(count($strdatehour) == 2){

                    $strhour = $strdatehour[1];
                    $strhour = explode('.', $strhour);
                    if(count($strhour) == 2){
                        $strhour = $strhour[0];
                        if(strlen($strdate) == 8){
                            $year = substr($strdate, 0, 4);
                            $month = substr($strdate, 4, 2);
                            $dayofmonth = substr($strdate, 6, 2);
                            $currday = $year ."-". $month ."-".$dayofmonth;



                            $file = fopen($_SERVER["DOCUMENT_ROOT"]."/dataupdateold/".$value."","r");
                            $array_data = fgetcsv($file);
                            $content = $arrayValue[stristr($value,"_",true)]=(float)$array_data[0];
                            fclose($file); 
                            $data = $this->monitoringmodel->getMonitoringByName($value);
                            $namesearch = $data['namesearch'];
                            $monitoringdata = $data['monitoringdata'];
                            $day = $data['day'];
                            $idmonitor = $data['idmonitor'];
                            if($namesearch == $value){
                                if($content != $monitoringdata){
                                    $param['day'] = $currday;
                                    $param['hour'] = $strhour;
                                    $param['monitoringdata'] = $content;
                                    $param['monitoringdataold'] = $monitoringdata;
                                    $param['unit'] = "μSv/h";
                                    $param['idmonitor'] = $strname;
                                    $this->monitoringmodel->updateMonitoring($param, $namesearch);       
                                    
                                    //update by day
                                    $folder1 = $_SERVER["DOCUMENT_ROOT"]."/dataupdateold/";
                                    $folder2 = $_SERVER["DOCUMENT_ROOT"]."/dataold/";
                                    copy($folder1 .$namesearch, $folder2.$namesearch);
                                    unlink($folder1 .$namesearch);
                                    
                                }
                            }
                        }
                    }
                       
                }    
            }
            
            
        }
        else 
        {
             $arrayValue[stristr($value,"_",true)]=0;
        }
        return $content;
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
