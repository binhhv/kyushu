<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of monitoring
 *
 * @author maxmalla006
 */
class monitoring extends CI_Controller{
    public function __construct() {

        parent::__construct(); 
        $this->load->library('chart');
        $this->load->model('MonitoringModel');
        $this->load->library("Pdf");
    }
    public function index() {
        $today = getdate();
        //$strToDay = $today['mday'].'-'.$today['mon'].'-'.$today['year'];
        if(isset($_POST['monName'])){
            $monName = $_POST['monName'];
            $type = $_POST['type'];
            if($type == 0){
                $this->MonitoringModel->exportCSVMonitoringDay($monName);
            }
            else {
                 $this->exportPDFMonitoringDay($monName);
            }
        }
        else{
           
            //$this->create_pdf();
            $data['value'] = $this->getValue();
            $data['hournow'] = $today['hours'];
            //$data['chart'] = $this->getAllChartMonitoring();
            $this->load->view('monitoring',$data);
        }
        //$this->load->view('chart1');
       
    }
              
    /*function getValue(){  
        $today = getdate();
        $arrayFile =  array();
        $arrayValue =  array();
        $hours = ($today['hours'] < 10) ? "0".$today['hours'] : $today['hours'];
		$day = ($today['mday'] < 10)? "0".$today['mday'] : $today['mday'];
        $month = ($today['mon'] < 10) ? "0".$today['mon'] : $today['mon'];
        $strFileDate = $today['year'].$month.$day."-".$hours ;
		
        //$strFileDate = $today['year'].$today['mon'].$today['mday']."-".$hours ;
        array_push($arrayFile,  "mon01_".$strFileDate,"mon02_".$strFileDate,"mon03_".$strFileDate,"mon04_".$strFileDate);
        foreach ($arrayFile as $value) {
            if (file_exists($_SERVER["DOCUMENT_ROOT"]."/data/".$value.".csv"))
            {
                $file = fopen($_SERVER["DOCUMENT_ROOT"]."/data/".$value.".csv","r");
                $array_data = fgetcsv($file);
                $arrayValue[$this->strstr_replica($value, '_', true)]=array('value'=>$this->getRoundValue((float)$array_data[0],3,1),'unit'=>'μSv/h','fontsize'=>'');
                fclose($file); 
            }
            else {
                 $arrayValue[$this->strstr_replica($value, '_', true)]=array('value'=>'データ未取得','unit'=>'','fontsize'=>'18px');;
            }
        }
        return $arrayValue;
    }*/
	function getValue(){  
        $today = getdate();
        $arrayFile =  array();
        $arrayValue =  array();
        $hours = ($today['hours'] < 10) ? "0".$today['hours'] : $today['hours'];
		$day = ($today['mday'] < 10)? "0".$today['mday'] : $today['mday'];
        $month = ($today['mon'] < 10) ? "0".$today['mon'] : $today['mon'];
        $strFileDate = $today['year'].$month.$day."_".$hours ;
		
        //$strFileDate = $today['year'].$today['mon'].$today['mday']."-".$hours ;
        $array_mon01 = array('path'=>"/Sharedfolder/DAYDATA/2/".$strFileDate,'name'=>'mon01');
        $array_mon02 = array('path'=>"/Sharedfolder/DAYDATA/3/".$strFileDate,'name'=>'mon02');
        $array_mon03 = array('path'=>"/Sharedfolder/DAYDATA/4/".$strFileDate,'name'=>'mon03');
        $array_mon04 = array('path'=>"/Sharedfolder/DAYDATA/5/".$strFileDate,'name'=>'mon04');
        array_push($arrayFile, $array_mon01,$array_mon02,$array_mon03,$array_mon04);
        foreach ($arrayFile as $value) {
            if (file_exists($_SERVER["DOCUMENT_ROOT"].$value['path'].".csv"))
            {
                $file = fopen($_SERVER["DOCUMENT_ROOT"].$value['path'].".csv","r");
                $array_data = fgetcsv($file);
                $arrayValue[$value['name']]=array('value'=>$this->getRoundValue((float)$array_data[0],3,1),'unit'=>'μSv/h','fontsize'=>'');
                fclose($file); 
            }
            else {
                 $arrayValue[$value['name']]=array('value'=>'データ未取得','unit'=>'','fontsize'=>'18px');;
            }
        }
        return $arrayValue;
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
    /*
    function getAllChartMonitoring(){
        $today = getdate();
        $strToDay = $today['mday'].'-'.$today['mon'].'-'.$today['year'];
        $data = array();
        $data['chart1'] =$this->getChartMonitoring('mon01',$strToDay);
        $data['chart2'] =$this->getChartMonitoring('mon02',$strToDay);
        $data['chart3'] =$this->getChartMonitoring('mon03',$strToDay);
        $data['chart4'] =$this->getChartMonitoring('mon04',$strToDay); 
        return $data;
    }*/
    /*function getChart($data){
        return $this->chart->draw_chart($data);
    }*/
  
    function getValueReload(){
        if(isset($_POST['type'])){
            
            $arrayMon = $this->getValue();
            //$output = array(); // it will wrap all of your value
            //$today = getdate();
            //$strToDay = $today['mday'].'-'.$today['mon'].'-'.$today['year'];
            //unset($temp); // Release the contained value of the variable from the last loop
            //$temp = array();
           // $temp['status']= 'success';
            //$temp['mon01']= $arrayMon['mon01'];
            //$temp['mon02']= $arrayMon['mon02'];
            //$temp['mon03']= $arrayMon['mon03'];
            //$temp['mon04']= $arrayMon['mon04'];
            
            //$temp['chart1'] =$this->getChartMonitoring('mon01',$strToDay);
            //$temp['chart2'] =$this->getChartMonitoring('mon02',$strToDay);
            //$temp['chart3'] =$this->getChartMonitoring('mon03',$strToDay);
            //$temp['chart4'] =$this->getChartMonitoring('mon04',$strToDay); 
           // array_push($output,$temp);
             $today = getdate();
           //echo 'success';
           // exit(json_encode($temp));
            echo $arrayMon['mon01']['value'].','. $arrayMon['mon01']['unit'].','. $arrayMon['mon01']['fontsize'].','.
                    $arrayMon['mon02']['value'].','. $arrayMon['mon02']['unit'].','. $arrayMon['mon02']['fontsize'].','.
                    $arrayMon['mon03']['value'].','. $arrayMon['mon03']['unit'].','. $arrayMon['mon03']['fontsize'].','.
                    $arrayMon['mon04']['value'].','. $arrayMon['mon04']['unit'].','. $arrayMon['mon04']['fontsize'].','.$today['hours'];
        }
    }
    
   

    function getChartMonitoring($name,$dayClick = null){
       if(is_null($dayClick)){
            $todaye1 = getdate();
           $strDay = $todaye1['mday'];
            $strMonth = $todaye1['mon'];
             $strYear = $todaye1['year'];
		}        else {
             $todaye1 = new DateTime((string)$dayClick);
			  $todaye1 = new DateTime((string)$dayClick);
             $strDay = $todaye1->format('d');
            $strMonth =  $todaye1->format('m');
             $strYear =  $todaye1->format('Y');
		}
		$today = getdate();
        $hour = $today['hours'];
        $hours = ($today['hours'] < 10) ? "0".$today['hours'] : $today['hours'];
	    $day = ($today['mday'] < 10)? "0".$today['mday'] : $today['mday'];
        $month = ($today['mon'] < 10) ? "0".$today['mon'] : $today['mon'];
        $arrayPoint = array();
        $h = $hour;
        for($i = 0 ; $i <= 24;$i ++){
           
            if($h > 23){
                $h = 0;
            }
            $arrayPoint[$i] = ($h < 10) ? '0'.$h : $h;
            $h ++;
            //$h = ($hour + $i > 23)? : $hour + $i;
           
        }
        //$arrayPoint = range(0,24); 
        $data['arrayPoint'] = $arrayPoint;
        $data['data'] = $this->MonitoringModel->getMonitoringDay($name,$dayClick);
        $data['maxValue'] = max($data['data']);
		$data['xname'] = '時';
        $data['type'] =0;
        //$data['filename'] = "chart_".$name."_".$today['year'].$month.$day;//."-".$today->format('H');
		//$data['filename'] = "chart_".$name."_".$todaye1->format('Y').$todaye1->format('m').$todaye1->format('d');
		$data['filename'] = "chart_".$name."_".$strYear.$strMonth.$strDay;//."-".$today->format('H');
        return $this->chart->draw_chart($data);
    }
   
     function getChartMonOfDay(){
        if(isset($_POST['chartMon'])){
            $monName = 'mon0'.substr($_POST['chartMon'], -1);
            $archive = (isset($_POST['archive'])) ? $_POST['archive'] : null;
            $temp = array();
            $chart = $this->getChartMonitoring($monName);
            //$temp['chart'] = $archive == null ? $chart : '../' .$chart;  
            $imgChart = $archive == null ? $chart : '../' .$chart; 
            echo $imgChart;
            //exit(json_encode($temp));
        }
    }
     public function getChartDay(){
            if(isset($_POST['mon']) && isset($_POST['date']) && isset($_POST['month']) && isset($_POST['year']) ){
                $monName = $_POST['mon'];
                $d = $_POST['date'];
                $m = $_POST['month'];
                $y = $_POST['year'];
                $strDay = $d.'-'.$m.'-'.$y;
                $temp = array();
                //$temp['chart'] = '../'.$this->getChartMonitoring($monName,$strDay);
                
                //exit(json_encode($temp));
                $imgChart = '../'.$this->getChartMonitoring($monName,$strDay);
                echo $imgChart;
            }
    }
    function getChartMonitoringArchive($name,$day = null){
        if(is_null($day)){
             $today = new DateTime();
        }
        else {
             $today = new DateTime((string)$day);
        }
        $arrayPoint = range(0,23); 
        $data['arrayPoint'] = $arrayPoint;
        $data['data'] = $this->MonitoringModel->getMonitoringDayArchive($name,$day);
        $data['maxValue'] = max($data['data']);
        $data['xname'] = '時';
        $data['type'] =0;
        $data['filename'] = "chart_".$name."_".$today->format('Y').$today->format('m').$today->format('d');//."-".$today->format('H');
        return $this->chart->draw_chart($data);
    }
    public function getChartDayArchive(){
        if(isset($_POST['mon']) && isset($_POST['date']) && isset($_POST['month']) && isset($_POST['year']) ){
                $monName = $_POST['mon'];
                $d = $_POST['date'];
                $m = $_POST['month'];
                $y = $_POST['year'];
                if ($d == -1) {
                $strDay = null;
                } else {
                    $strDay = $d . '-' . $m . '-' . $y;
                }
                $temp = array();
                //$temp['chart'] = '../'.$this->getChartMonitoring($monName,$strDay);
                
                //exit(json_encode($temp));
                $imgChart = '../'.$this->getChartMonitoringArchive($monName,$strDay);
                echo $imgChart;
            }
    }
    public function getChartMonthYear(){
        if(isset($_POST['type']) && isset($_POST['mon']) && isset($_POST['month']) && isset($_POST['year']) ){
            $type = $_POST['type'];
            $monName = $_POST['mon'];
            $m = $_POST['month'];
            $y = $_POST['year'];
            
            $temp = array();
            //$temp['chart'] = '../'.$this->getChartMonitoringMonthYear($monName,$m,$y,$type);
                
           // exit(json_encode($temp));
            $imgChart = '../'.$this->getChartMonitoringMonthYear($monName,$m,$y,$type);
            echo $imgChart;
        }
    }
     function getChartMonitoringMonthYear($name,$month,$year,$type){
        if($type ==1){
            $date = mktime(12, 0, 0, $month, 1, $year);
            $daysInMonth = date("t", $date);
            $arrayPoint = range(1,$daysInMonth);// with day for month
			//$arrayPoint = range(1,31);//num day in month default 31
            $filename = "chart_".$name."_".$year.$month;
			$data['xname'] = '日';
            $data['type'] =0;
        }
        else {
           //$arrayPoint = range(1,12);  
		   $arrayPoint = array('1','','2','','3','','4','','5','','6','','7','','8','','9','','10','','11','','12','');
           $filename = "chart_".$name."_".$year;
		   $data['xname'] ='月';
           $data['type'] =1;
        }
        $data['arrayPoint'] = $arrayPoint;

        $data['data'] = $this->MonitoringModel->getMonitoringMonthYear($name,$month,$year,$type);
        $data['maxValue'] = max($data['data']);
        $data['filename'] = $filename;//."-".$today->format('H');
        return $this->chart->draw_chart($data);
    }
    public function create_pdf($view,$monName,$day =null) {
        //$html = "<b>最新情報</b>";
        if(is_null($day)){
            $dt = new DateTime(); 
        }
        else { $dt = new DateTime($day); }
        $dnow = $dt->format('Ymd');
       
        $this->load->library('Pdf');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetAutoPageBreak(TRUE, 0);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP-10, PDF_MARGIN_RIGHT);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM-15);
        $fontname = $pdf->addTTFfont(APPPATH.'libraries/MS Gothic.ttf', 'TrueTypeUnicode', '');

        // use the font
        $pdf->SetFont($fontname, '', '9', '', true);
        // Add a page
        $pdf->AddPage();
        //$html = "";
        $filename = $monName.'_'.$dnow.'.pdf';
        $pdf->writeHTML($view, true, false, true, false, '');
        $pdf->Output($filename, 'D');
         
      
      }
      
    function exportPDFMonitoringDay($monName,$day=null){
        $html = $this->MonitoringModel->getHTMLPDFMonitoringDay($monName,$day);
        //$view = $this->load->view('template_pdf_monitoring',$arrayData);
        $this->create_pdf($html, $monName,$day);
    }
    
   
     
    public function  archive(){
       
        if(isset($_POST['monName']) && isset($_POST['type']) && isset($_POST['typeExport'])){
            $type = $_POST['type'];
            $name = $_POST['monName'];
            $typeExport = $_POST['typeExport'];
            $day = (isset($_POST['day']) ? $_POST['day'] : null);
            $month = (isset($_POST['month']) ? $_POST['month'] : null);
            $year = (isset($_POST['year']) ? $_POST['year'] : null);
            //echo 1;
            $this->exportDataOfType($type, $typeExport,$name,$day,$month,$year);
        }
        else{
            $today = getdate();
            $data['calendar'] = $this->createCalendar();
            $data['charOnDay']= $this->getChartMonitoring('mon01'); 
            $data['year'] = $today['year'];
            $data['month'] = $today['mon'];
            $data['day'] = $today['mday'];
            $this->load->view('archive',$data);
        }
    }
    public function exportDataOfType($type,$typeExport,$name,$day = null,$month = null,$year = null){
        if($type == 1){
            switch ((int)$typeExport){
                case 0 : 
                    
                    break;
                case 1: 
                    
                    break;
                default: 
                    $strDay = ($day == null) ? null : $day.'-'.$month.'-'.$year;
                    $this->exportPDFMonitoringDay($name,$strDay);
                    break;
            }
        }
        else {
            
            switch ((int)$typeExport){
                case 0 : 
                    $this->MonitoringModel->exportCSVMonitoringMonthYear($name,0,$month,$year);
                    break;
                case 1: 
                    $this->MonitoringModel->exportCSVMonitoringMonthYear($name,1,$month,$year);
                    break;
                default: 
                    $strDay = ($day == null) ? null : $day.'-'.$month.'-'.$year;
                    $this->MonitoringModel->exportCSVMonitoringDay($name,$strDay);
                    break;
            }
        }
    }
    public function getCalendar(){
        if(isset($_POST['type']) && isset($_POST['valueType']) && isset($_POST['currentMonth']) && isset($_POST['currentYear'])){
            $type = $_POST['type'];
            $valueType = $_POST['valueType'];
            $year = $_POST['currentYear'];
            $month = $_POST['currentMonth'];
			$monName = $_POST['mon'];
            if($type == 0){
                $month = ($valueType == 0 )? intval($month) : (($month==1)?12:intval($month)-1);
                $year = ($valueType == 0 ) ? intval($year) - 1 : (($month==12)?intval($year)-1:$year);
            }
            else {
                $month =  ($valueType == 0 )? intval($month) : (($month == 12) ? 1 : intval($month) + 1);
                $year = ($valueType == 0)? intval($year) + 1 : (($month==1)? intval($year)+1:$year);
            }
			$imgChart = '../'.$this->getChartMonitoringMonthYear($monName,$month,$year,$valueType);
            if($valueType == 0){
                                $strTitle = $year.'年の線量  ';
                           }
                           else {
                              $strTitle = $year.'年'.$month.'月の線量  ';
            }
            $temp = array();
            $temp['content']= $this->showMonth($month, $year);
            $temp['month'] = $month;
            $temp['year'] = $year;
            
            $content = $this->showMonth($month, $year);
            $valueMonth =  $month;
            $valueYear = $year;
           // exit(json_encode($temp));
            //echo $content .','.$valueMonth.','.$valueYear;
			 echo $content .','.$valueMonth.','.$valueYear.','.$imgChart.','.$strTitle;
        }
    }
    function createCalendar(){
         $year = date("Y",time()); 
         $month = date("m",time());
         $data['navi']= '<table class="calendar">
        <tr>
          <th colspan="7">
            <div class="prev-year" ><label onclick="changeCalendar(0,0);" style="cursor: pointer;" >前年</label></div>
            <div class="current-year"><label id = "ilb_currentYear" onclick ="getChartMonthYear(0);" style="cursor: pointer;">'.$year.'</label>年</div>
            <div class="next-year"><label onclick="changeCalendar(1,0);" style="cursor: pointer;" >翌年</label></div>
          </th>
        </tr>
        <tr>
          <th colspan="7">
            <div class="prev-month"><label onclick="changeCalendar(0,1);" style="cursor: pointer;" >前月</label></div>
            <div class="current-month"><label id="ilb_currentMonth" onclick ="getChartMonthYear(1);" style="cursor: pointer;">'.$month.'</label>月</div>
            <div class="next-month"><label onclick="changeCalendar(1,1);" style="cursor: pointer;" >翌月</label></div>
          </th>
        </tr>
        </table>';
        //$calendarContent = "<table class='calendarcontent' id='itb_Calendar'>";
        $calendarContent = $this->showMonth($month,$year);
        //$calendarContent .= "</table>";
        $data['content'] = $calendarContent;
         return $data;
    }
    function showMonth($month, $year)
        {
            $calendar = '';
            $date = mktime(12, 0, 0, $month, 1, $year);
            $daysInMonth = date("t", $date);
            $offset = date("w", $date);
            $rows = 1;
            //$calendar .= "<div class='panel-heading text-center'><div class='row'><div class='col-md-3 col-xs-4'><a class='ajax-navigation btn btn-default btn-sm' href='calendar.php?month=".$prev_month."&year=".$prev_year."'><span class='glyphicon glyphicon-arrow-left'></span></a></div><div class='col-md-6 col-xs-4'><strong>" . date("F Y", $date) . "</strong></div>";
            //$calendar .= "<div class='col-md-3 col-xs-4 '><a class='ajax-navigation btn btn-default btn-sm' href='calendar.php?month=".$next_month."&year=".$next_year."'><span class='glyphicon glyphicon-arrow-right'></span></a></div></div></div>"; 
            $calendar .= "";
            //$calendar .= "<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>";
            $calendar .= "<tr>";
            for($i = 1; $i <= $offset; $i++) {
                $calendar .= "<td></td>";
            }
            for($day = 1; $day <= $daysInMonth; $day++) {
                if( ($day + $offset - 1) % 7 == 0 && $day != 1) {
                    $calendar .= "</tr><tr>";
                    $rows++;
                }
                 $calendar .= "<td style='cursor: pointer;text-align:center;'>" . $day . "</td>";
            }
            while( ($day + $offset) <= $rows * 7)
            {
                $calendar .= "<td></td>";
                $day++;
            }
            $calendar .= "</tr>";
            //$calendar .= "</table>";
            return $calendar;
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