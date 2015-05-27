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
//        $dirPath1 = $_SERVER["DOCUMENT_ROOT"]."/data/";
        $mon01 = "1";
        $mon02 = "2";
        $mon03 = "3";
        $mon04 = "4";
        $mon05 = "5";
        
        $dirPath1 = $_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYDATA/$mon01/";
        $dirPath2 = $_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYDATA/$mon02/";
        $dirPath3 = $_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYDATA/$mon03/";
        $dirPath4 = $_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYDATA/$mon04/";
        $dirPath5 = $_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYDATA/$mon05/";
        
        
        if (file_exists($dirPath1)){
            $dir = $dirPath1;
            $dir = opendir($dir);
            while (($currentFile = readdir($dir)) !== false) {
                if ($this->endsWith($currentFile, '.csv')){
                    $files1 = $currentFile;
                    $filescheck1 = "mon00"."_".$files1;
                    $data = (String)$this->monitoringmodel->getMonitoringByString($filescheck1);
                    if(strcmp($data, "1")){
                         $this->parse_file($files1, $dirPath1, $filescheck1);
                    }
                }
            }
            closedir($dir);
        }
        
        //folder 2
        if (file_exists($dirPath2)){
            $dir2 = $dirPath2;
            $dir2 = opendir($dir2);
            while (($currentFile = readdir($dir2)) !== false) {
                if ($this->endsWith($currentFile, '.csv')){
                    $files2 = $currentFile;
                    $filescheck2 = "mon01"."_".$files2;
                    $data = (String)$this->monitoringmodel->getMonitoringByString($filescheck2);
                    if(strcmp($data, "1")){
                         $this->parse_file($files2, $dirPath2, $filescheck2);
//                         $this->parse_file($files2, $filescheck2);
                    }
                }
            }
            closedir($dir2);
        }
        
        //folder 3
        if (file_exists($dirPath3)){
            $dir3 = $dirPath3;
            $dir3 = opendir($dir3);
            while (($currentFile = readdir($dir3)) !== false) {
                if ($this->endsWith($currentFile, '.csv')){
                    $files3 = $currentFile;
                    $filescheck3 = "mon02"."_".$files3;
                    $data = (String)$this->monitoringmodel->getMonitoringByString($filescheck3);
                    if(strcmp($data, "1")){
                         $this->parse_file($files3, $dirPath3, $filescheck3);
//                         $this->parse_file($files3, $filescheck3);
                    }
                }
            }
            closedir($dir3);
        }
        //folder 4
        if (file_exists($dirPath4)){
            $dir4 = $dirPath4;
            $dir4 = opendir($dir4);
            while (($currentFile = readdir($dir4)) !== false) {
                if ($this->endsWith($currentFile, '.csv')){
                    $files4 = $currentFile;
                    $filescheck4 = "mon03"."_".$files4;
                    $data = (String)$this->monitoringmodel->getMonitoringByString($filescheck4);
                    if(strcmp($data, "1")){
//                         $this->parse_file($files4, $filescheck4);
                         $this->parse_file($files4, $dirPath4, $filescheck4);
                        
                    }
                }
            }
            closedir($dir4);
        }
        
         //folder 5
        if (file_exists($dirPath5)){
            $dir5 = $dirPath5;
            $dir5 = opendir($dir5);
            while (($currentFile = readdir($dir5)) !== false) {
                if ($this->endsWith($currentFile, '.csv')){
                    $files5 = $currentFile;
                    $filescheck5 = "mon04"."_".$files5;
                    $data = (String)$this->monitoringmodel->getMonitoringByString($filescheck5);
                    if(strcmp($data, "1")){
//                         $this->parse_file($files5, $filescheck5);
                          $this->parse_file($files5, $dirPath5, $filescheck5);
                    }
                }
            }
            closedir($dir5);
        }
        
        //update file
        
        $dirPathupdate1 = $_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYDATAUPDATE/$mon01/";
        $dirPathupdate2 = $_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYDATAUPDATE/$mon02/";
        $dirPathupdate3 = $_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYDATAUPDATE/$mon03/";
        $dirPathupdate4 = $_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYDATAUPDATE/$mon04/";
        $dirPathupdate5 = $_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYDATAUPDATE/$mon05/";
        $this->getAllFileUpdate($dirPathupdate1, "mon00", $mon01);
        $this->getAllFileUpdate($dirPathupdate2, "mon01", $mon02);
        $this->getAllFileUpdate($dirPathupdate3, "mon02", $mon03);
        $this->getAllFileUpdate($dirPathupdate4, "mon03", $mon04);
        $this->getAllFileUpdate($dirPathupdate5, "mon04", $mon05);
        
        
        
//        $dirPath1 = $_SERVER["DOCUMENT_ROOT"]."/data/";
//        $dirPath2 = $_SERVER["DOCUMENT_ROOT"]."/dataold/";
        
        //movie file
       
        $dirPathmove1 = $_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYOLDDATA/$mon01/";
        $dirPathmove2 = $_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYOLDDATA/$mon02/";
        $dirPathmove3 = $_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYOLDDATA/$mon03/";
        $dirPathmove4 = $_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYOLDDATA/$mon04/";
        $dirPathmove5 = $_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYOLDDATA/$mon05/";
        
        $this->moveFile($dirPath1, $dirPathmove1, "mon00");
        $this->moveFile($dirPath2, $dirPathmove2, "mon01");
        $this->moveFile($dirPath3, $dirPathmove3, "mon02");
        $this->moveFile($dirPath4, $dirPathmove4, "mon03");
        $this->moveFile($dirPath5, $dirPathmove5, "mon04");
        
//        $this->averageOfDaymay1();
//        $this-> avgmonitoringmonth();
       
    }
    public function getAllFileUpdate($dirPath2, $name, $mon){
//        $dirPath2 = $_SERVER["DOCUMENT_ROOT"]."/dataupdateold/";
        $files = '';
        if(file_exists($dirPath2)){
            $dirupdate = $dirPath2;
            $dirupdate = opendir($dirupdate);
            while (($currentFile = readdir($dirupdate)) !== false) {
                if ($this->endsWith($currentFile, '.csv')){
                    $files = $name."_".$currentFile;
                    $data = $this->monitoringmodel->getMonitoringByName($files);
                    $datavalue = $data['namesearch'];
                    if($datavalue == $files){
                        $file = explode("_", $datavalue);
                        $file = $file[1].$file[2];
                         $this->update_file($files, $mon);
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
    public function moveFile($folder1, $folder2, $namefile){
        
        if (file_exists($folder1)){
            $dir = opendir($folder1);
            while (($currentFile = readdir($dir)) !== false) {
                if ($this->endsWith($currentFile, '.csv')){
                    
                    $value = $namefile."_".$currentFile;
                  
                    $strdata = explode('_', $value);
                    
                    if(count($strdata) == 3){
                        $strname = $strdata[0];
                        $strdate = $strdata[1];
//                        $strdate = $strdatehour[2];
         
//                        $strdatehour = explode('_', $strdatehour);
                        
//                        if(count($strdatehour) == 2){
                            
                            if(strlen($strdate) == 8){
                                $year = substr($strdate, 0, 4);
                                $month = substr($strdate, 4, 2);
                                $dayofmonth = substr($strdate, 6, 2); 
                                $data = $this->monitoringmodel->getMonitoringByName($value);
                                $data = $data['namesearch'];
                                $today = getdate();
                                $currenday = $today['mday'];
                                $currenmon = $today['mon'];
                                if($currenmon > $month){
                                    if($data == $value){
                                     //file exits database, move file
                                        $data = explode("_", $data);
                                        $data = $data[1]."_".$data[2];
                                        copy($folder1 .$data, $folder2.$data);
                                        unlink($folder1 .$data);
                                    }
                                }else{
                                    if($currenday > $dayofmonth){
                                    if($data == $value){
                                        $data = explode("_", $data);
                                        $data = $data[1]."_".$data[2];
                                     //file exits database, move file
                                        copy($folder1 .$data, $folder2.$data);
                                        unlink($folder1 .$data);
                                    }
                                }
                                }
                                
                            }
//                        }
                        
                        
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
            $day = explode('_', $param['day']);
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
    function parse_file($value, $dirPath1, $namefile) 
    {
        $content = "";
        if (file_exists($dirPath1.$value))
        {
            
            $strdata = explode('_', $namefile);
            if(count($strdata) == 3){
                $strname = $strdata[0];            
//                $strdatehour = $strdata[1];
//                $strdatehour = explode('_', $strdatehour);
//                if(count($strdatehour) == 2){
                    $strdate = $strdata[1];
                    $strhour = $strdata[2];
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
                                $param['namesearch'] = $namefile;
                                $this->monitoringmodel->insertMonitoring($param);
                            } 
                        }
                        
                    }

//                }   


                
            }
            
            
        }
        else 
        {
             $arrayValue[$this->strstr_replica($value,"_",true)]=0;
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
    public function update_file($value, $mon){
       $content = "";
//        if (file_exists($_SERVER["DOCUMENT_ROOT"]."/dataupdateold/".$value.""))
//        {
            $strdata = explode('_', $value);
            if(count($strdata) == 3){
                $strname = $strdata[0];
                $strdate = $strdata[1];
                
//                $strdatehour = explode('_', $strdatehour);

                $strdatehour = $strdata[2];
                $namefile = $strdate."".$strdatehour;
//                if(count($strdatehour) == 2){

//                    $strhour = $strdatehour[1];
                    $strhour = explode('.', $strdatehour);
                    if(count($strhour) == 2){
                        $strhour = $strhour[0];
                        if(strlen($strdate) == 8){
                            $year = substr($strdate, 0, 4);
                            $month = substr($strdate, 4, 2);
                            $dayofmonth = substr($strdate, 6, 2);
                            $currday = $year ."-". $month ."-".$dayofmonth;


                            $currentfile = explode("_", $value);
                            $currentfile = $currentfile[1]."_".$currentfile[2];
                            $file = fopen($_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYDATAUPDATE/$mon/".$currentfile."","r");
                            $array_data = fgetcsv($file);
                            $content = $arrayValue[stristr($namefile,"_",true)]=(float)$array_data[0];
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
                                     $folder1 = $_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYDATAUPDATE/$mon/";
                                     $folder2 = $_SERVER["DOCUMENT_ROOT"]."/Sharedfolder/DAYOLDDATA/$mon/";
//                                    $folder1 = $_SERVER["DOCUMENT_ROOT"]."/dataupdateold/";
//                                    $folder2 = $_SERVER["DOCUMENT_ROOT"]."/dataold/";
                                    copy($folder1 .$currentfile, $folder2.$currentfile);
                                    unlink($folder1 .$currentfile);
                                    
                                }
                            }
                        }
                    }
                       
//                }    
            }
            
            
//        }
//        else 
//        {
//             $arrayValue[stristr($value,"_",true)]=0;
//        }
        return $content;
    }
    
    
    
}
