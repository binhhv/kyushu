<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of monitoringmodel
 *
 * @author maxmalla006
 */
class monitoringmodel extends CI_Model{
    
    public function checkLogin($username, $password){
       $flag = "0";
       $sql = "SELECT * FROM admin WHERE username = '$username' and password = '$password'" ;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $flag = "1";      
        }
        return $flag;
    }
    public function UpdateDataChange($param){
        $data['namepoint'] = $param;
        $query = $this->db->update('pointmonitoring', $data);       
        if($query)
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    public function getMonitoring(){
        $name = '';
         $sql = "SELECT * FROM pointmonitoring";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $name = (string)$row->namepoint;  
            
        } else {
            return FALSE;
        }
        return $name;
    }

    public function insertMonitoring($param){
        $data = array(
            'day' => $param['day'],
            'hour' => $param['hour'],
            'monitoringdata' => $param['monitoringdata'],
            'unit' => $param['unit'],
            'idmonitor' => $param['idmonitor'],
            'namesearch' =>$param['namesearch']
        );
        

        date_default_timezone_set("Japan");
        $curentdate = date('Y/m/d');
        $currentDateTime=date('H:i:s');
        $newDateTime = date('Ah:i', strtotime($currentDateTime));
        $time = $curentdate. " " .$newDateTime;
        $data['dateregister'] = $time;
        $data['flag'] = 1;
        $query = $this->db->insert('monitoringdata', $data);
		 
        if($query)
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    public function avgmonitoringdate($param){
        $data = array(
            'day' => $param['day'],
            'monitoringdata' => $param['monitoringdata'],
            'unit' => $param['unit'],
            'idmonitor' => $param['idmonitor'],
            'namesearch' => $param['namesearch'],
            'nameavgmonth' => $param['nameavgmonth']

        );
        
		$data['flag'] = 1;
        $query = $this->db->insert('avgmonitoringdate', $data);
		 
        if($query)
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

 
    public function avgmonitoringmonth($param){
        $data = array(
            'month' => $param['month'],
            'year' => $param['year'],
            'unit' => $param['unit'],
            'idmonitor' => $param['idmonitor'],
            'namesearch' => $param['namesearch'],
            'monitoringdata' => $param['monitoringdata']
        );
        
        $query = $this->db->insert('avgmonitoringmonth', $data);
		 
        if($query)
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function avgmonitoringdateUpdate($param, $nameandday){
        $data = array(
            'day' => $param['day'],
            'monitoringdata' => $param['monitoringdata'],
            'unit' => $param['unit'],
            'idmonitor' => $param['idmonitor']
        );
		$data['flag'] = 2;

        $this->db->where('namesearch', $nameandday);
        $query = $this->db->update('avgmonitoringdate', $data);       
        if($query)
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }


//update month of year
    public function avgmonitoringdateUpdateByMonth($param, $namesearch){
        $data['monitoringdata'] = $param['monitoringdata'];
        $this->db->where('namesearch', $namesearch);
        $query = $this->db->update('avgmonitoringmonth', $data);       
        if($query)
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function updateMonitoring($param, $strName){
         $data = array(
            'day' => $param['day'],
            'hour' => $param['hour'],
            'monitoringdata' => $param['monitoringdata'],
            'monitoringdataold' => $param['monitoringdataold'],
            'unit' => $param['unit'],
            'idmonitor' => $param['idmonitor']
        );
         
        date_default_timezone_set("Japan");
        $curentdate = date('Y/m/d');
        $currentDateTime=date('H:i:s');
        $newDateTime = date('Ah:i', strtotime($currentDateTime));
        $time = $curentdate. " " .$newDateTime;
        $data['dateupdate'] = $time;
        $data['flag'] = 2;
        $this->db->where('namesearch', $strName);
        $query = $this->db->update('monitoringdata', $data);
        
        if($query)
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    public function getMonitoringLast(){
        $name = '';
        $sql = "SELECT * FROM monitoringdata ORDER BY id DESC LIMIT 1";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $name = (string)$row->namesearch;   
            
        } else {
            return FALSE;
        }
        return $name;
    }
    public function getMonitoringByString($str){
        $flag = "0";
        $sql = "SELECT * FROM monitoringdata WHERE namesearch = '$str'" ;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $flag = "1";      
        }
        return $flag;
    }
    public function getMonitoringByName($str){
        $sql = "SELECT namesearch, monitoringdata, day, idmonitor FROM monitoringdata WHERE namesearch = '$str'" ;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
//            $flag = (string)$row->namesearch;
            return $query->row_array();
        }else{
            return FALSE;
        }
    }
    public function getaverageByDay($strday, $may){
        $flag = "0";
        $sql = "SELECT * FROM avgmonitoringdate WHERE day = '$strday' and idmonitor = '$may'" ;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $flag = "1";      
        }
        return $flag;
    }

 public function getaverageByMonth($namesearch){
        $flag = "0";
        $sql = "SELECT * FROM avgmonitoringmonth WHERE namesearch = '$namesearch'" ;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $flag = "1";      
        }
        return $flag;
    }







    public function getAverageByData($strday, $may, $data){
        $flag = "0";
        $sql = "SELECT * FROM avgmonitoringdate WHERE day = '$strday' and idmonitor = '$may' and monitoringdata = '$data'" ;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $flag = "1";      
        }
        return $flag;
    }

    public function averageOfDay(){
        $sql = "SELECT day, idmonitor, AVG(monitoringdata) as average FROM monitoringdata group by day, idmonitor" ;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $rowr = $query->result();
            foreach ($rowr as $row) {
                $data[] = $row;
            }
            return $data;
        }  else {
            return FALSE;
        }
        
    }
    


public function averageOfMonth(){
        $sql = "SELECT nameavgmonth, AVG(monitoringdata) as average FROM avgmonitoringdate group by nameavgmonth" ;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $rowr = $query->result();
            foreach ($rowr as $row) {
                $data[] = $row;
            }
            return $data;
        }  else {
            return FALSE;
        }
    }












    public function getAverageOfDayUpdate($strDay, $strName){
        $sql = "SELECT day, idmonitor, AVG(monitoringdata) as average FROM monitoringdata where day = '$strDay' and idmonitor = '$strName'" ;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }  else {
            return FALSE;
        }
    }
    public function getMonitoringByStatus(){
        $flag = '0';
        $sql = "SELECT day, idmonitor FROM monitoringdata where flag = 2 group by day, idmonitor" ;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $rowr = $query->result();
            foreach ($rowr as $row) {
                $data[] = $row;
            }
            return $data;
        }  else {
            return FALSE;
        }
    }


  //get monitoring status by month
    public function getMonitoringByStatusMonth(){
        $flag = '0';
        $sql = "SELECT nameavgmonth, monitoringdata FROM avgmonitoringdate where flag = 2 group by nameavgmonth" ;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $rowr = $query->result();
            foreach ($rowr as $row) {
                $data[] = $row;
            }
            return $data;
        }  else {
            return FALSE;
        }
    }


    public function getAverageByName($namesearch){
        $name = "";
        $sql = "SELECT monitoringdata FROM avgmonitoringdate WHERE  namesearch = '$namesearch'" ;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $name = (string)$row->monitoringdata;  
        }
        return $name;
    }
    

  //get average by month
    public function getAverageByNameOfMonth($namesearch){
        $name = "";
        $sql = "SELECT monitoringdata FROM avgmonitoringmonth WHERE  namesearch = '$namesearch'" ;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $name = (string)$row->monitoringdata;  
        }
        return $name;
    }
    //binh
    
    public function getData($name,$day=null){
        if(is_null($day)){
           $dt = new DateTime();
        }
        else{
           $dt = new DateTime($day); 
        }
        $dnow = $dt->format('Y-m-d');
        $sql="SELECT * FROM monitoringdata WHERE idmonitor = '".$name."' and cast(day as date) = '".$dnow."'";
	$query = mysql_query($sql);
        $arrayData = array();
        while ($row = mysql_fetch_array($query)) {
            $arrayData[(int)$row['hour']] = $row['monitoringdata'];
           // array_push($arrayData, $row['monitoringdata']);
        }
        return $arrayData;
     }
 
     public function getMonitoringDay($name,$day = null){
       if(is_null($day)){
           $dt = new DateTime();
           $today = getdate();
           $hours = $today['hours'];
        }
        else{
           $dt = new DateTime($day); 
           $hours = 23;
        }
        $dnow = $dt->format('Y-m-d');
        $sql="SELECT * FROM monitoringdata WHERE idmonitor = '".$name."' and cast(day as date) = '".$dnow."'";
	$query = mysql_query($sql);
        $arrayData =array("","","","","","","","","","","","","","","","","","","","","","","","");
       // $i = 0;
        while ($row = mysql_fetch_array($query)) {
            $arrayData[(int)$row['hour']] = $row['monitoringdata'];
           // array_push($arrayData, $row['monitoringdata']);
        }
        //edit 25/11/2014 
        $arrayDataChart = array_fill(0, 23, '');
        for($i = 0 ; $i <= $hours ; $i ++){
            $arrayDataChart[$i] = $arrayData[$i];
        }
        return $arrayDataChart;

     }
     public function getMonitoringMonthYear($name,$month,$year,$type){
         if($type == 0){
             $arrayData = array_fill(1, 12, '');
             $sql = "SELECT * FROM avgmonitoringmonth WHERE idmonitor = '".$name."' and year = ".(int)$year."";
         } else {
             $date = mktime(12, 0, 0, $month, 1, $year);
             $daysInMonth = date("t", $date);
             $arrayData = array_fill(1, $daysInMonth, '');// day for month
			 //$arrayData = array_fill(1, 31, ''); //day in month default 31
             $dtstart = new DateTime('01-'.$month.'-'.$year);
             $dtend = new DateTime($daysInMonth.'-'.$month.'-'.$year);
             $dstart = $dtstart->format('Y-m-d');
             $dend = $dtend->format('Y-m-d');
             $sql = "SELECT * FROM avgmonitoringdate WHERE idmonitor = '".$name."' and cast(day as date) >= '".$dstart."' and cast(day as date) <= '".$dend."'";
         }
         $query = mysql_query($sql);
        // $numRows = mysql_num_rows($query);
         if($query){
            while ($row = mysql_fetch_array($query)) {
               if($type == 0){
                $index =  (int)$row['month'];
               } else {

                   $index = (int)substr($row['day'],-2);
               }

               $arrayData[$index] = $row['monitoringdata'];
            }

         }

         return $arrayData;
     }
     public function getExportMonitoringDay($name,$day = null){
        $output = "";
        if(is_null($day)){
            $today = getdate();
            $strDay =$today['mon'].'/'.$today['mday'].'/'.$today['year'];
            $hours = $today['hours'];
        }
        else {
            $dt = new DateTime($day);
            $strDay = $dt->format('m/d/Y');
            $hours = 23;
        }
        $arrayData = $this->getData($name,$day);
        for($i = 0 ; $i <= $hours ; $i ++){
            $strHour = ($i < 10) ? '0'.$i : $i ;
            if(isset($arrayData[$i])){
                $output .='"'.$strDay.'",'.'"'.$strHour.'":00,'.'"'.$arrayData[$i].'",'.'μSv/h,'."\n";
            }
            else {
                $output .='"'.$strDay.'",'.'"'.$strHour.'":00,'.'0,'.'μSv/h,'."\n";
                //$countArray ++;
            }
        }
        return $output;
     }
     public function exportCSVMonitoringDay($name,$day=null){
         if (is_null($day)) {
            $dt = new DateTime();
        } else {
            $dt = new DateTime($day);
        }
        $dnow = $dt->format('Ymd');
        $output = $this->getExportMonitoringDay($name,$day);
        $csv_filename = $name.'_'.$dnow.'.csv';
        header('Content-type: application/csv; charset=Shift_JIS; encoding=Shift_JIS');
        header('Content-Disposition: attachment; filename='.$csv_filename);
        echo mb_convert_encoding($output,"SJIS-WIN","UTF-8");
        exit();
     }
     
     
      public function getExportCSVMonitoringMonthYear($name,$month,$year,$type){
          $arrayData = array();
          //$output = '';
          if($type == 0){
             $arrayData = array_fill(1, 12, 0);
             $sql = "SELECT * FROM avgmonitoringmonth WHERE idmonitor = '".$name."' and year = ".(int)$year."";
         } else {
             $date = mktime(12, 0, 0, $month, 1, $year);
             $daysInMonth = date("t", $date);
             $arrayData = array_fill(1, $daysInMonth, 0);
             $dtstart = new DateTime('01-'.$month.'-'.$year);
             $dtend = new DateTime($daysInMonth.'-'.$month.'-'.$year);
             $dstart = $dtstart->format('Y-m-d');
             $dend = $dtend->format('Y-m-d');
             $sql = "SELECT * FROM avgmonitoringdate WHERE idmonitor = '".$name."' and cast(day as date) >= '".$dstart."' and cast(day as date) <= '".$dend."'";
         }
         $query = mysql_query($sql);
         while ($row = mysql_fetch_array($query)) {
            if($type == 0){
                $index =  (int)$row['month'];
                 //$arrayData[$index] = $row['monitoringdata'];
            } else {
                $index = (int)substr($row['day'],-2);
                
                
            }
            $arrayData[$index] = $row['monitoringdata'];
           
         }
         return $arrayData;
     }
     public function getDataExportCSVMonitoringMonthYear($name,$month,$year,$type){
         $output = '';
         $arrayData =  $this->getExportCSVMonitoringMonthYear($name,$month,$year,$type);
         
         for($i = 1; $i <= count($arrayData); $i ++){
             if(isset($arrayData[$i])){
                 $valueData = $arrayData[$i];
             }
             else {
                 $valueData= 0;
             }
             if ($type == 0) {
                $output .='"' . ($i) . '",' . '"' .  $valueData . '",' . 'μSv/h,' . "\n";
            } else {
                $output .='' . $month . '/' . ($i) . '/' . $year . ',' . '"' .$valueData . '",' . 'μSv/h,' . "\n";
            }
        }
         return $output;
     }
     public function exportCSVMonitoringMonthYear($monName,$typeExport,$month = null,$year = null){
        if($typeExport == 0){
             $filename = $monName."_".$year;
        }
        else {
            $filename = $monName."_".$year.$month; 
        }
        $output =$this->getDataExportCSVMonitoringMonthYear($monName, $month, $year, $typeExport);

        $csv_filename =$filename.'.csv';
        header('Content-type: application/csv; charset=Shift_JIS; encoding=Shift_JIS');
        header('Content-Disposition: attachment; filename='.$csv_filename);
        echo mb_convert_encoding($output,"SJIS-WIN","UTF-8");
        exit();
     }
     
     public function getHTMLPDFMonitoringDay($monName,$day = null){
         $arrayData = $this->getData($monName,$day);
        if(is_null($day)){
            $today = getdate();
            $hours = $today['hours'];
            $year = $today['year'];
            $month = $today['mon'];
            $day = $today['mday'];
        }
        else {
            $dt = new DateTime($day);
            $hours = 23;
            $year = $dt->format('Y');
            $month = $dt->format('m');
            $day = $dt->format('d');
        }
        
         //$today = getdate();
         $html="<style> 
             @charset 'utf8';
                
                .pdf_content{
                    padding:20px;
                    font-family:'メイリオ', Meiryo,'ＭＳ Ｐゴシック', 'MS PGothic','ヒラギノ角ゴ Pro W3', 'Hiragino Kaku Gothic Pro',  Osaka, sans-serif;   
                }
            .pdf_content table{
                    margin-top:20px;
                    width:100%;
                    border-spacing: 0;
                  
                    }
            .pdf_content table th{
                    background-color:#CCC;
                    border: 1px solid #000000;
                    padding:10px 0 10px 0; 
                    text-align:center;
            }
            .pdf_content table tr td{
                    border: 1px solid #000000;
                    padding:10px;
                    font-weight:normal;
            }
            .pdf_content table tr td.top{
                    border-top:none;
            }
            .pdf_content table tr td.right{
                    border-right:none;
            }
            .pdf_content table th.right{
                    border-right:none;
            }
            </style>";
         $html.='<div class="pdf_content">
           <h2> <span>中央処理装置(箱崎)観測日 '.$year.'年'.$month.'月'.$day.'日 00：00 ～ '.$year.'年'.$month.'月'.$day.'日　'.$hours.'：00 </span></h2>
            <br><br>
            <table cellpadding="5">
            <tbody>
            <tr>
                    <th class="right">観測日</th>
                    <th class="right">時間</th>
                    <th class="right">線量</th>
            </tr>';
             for($i = 0 ; $i <= $hours ; $i ++){
                 $html.='<tr>';
                 $ihour = $i < 10 ? '0'.$i.':00' : $i.':00';
                    if(isset($arrayData[$i])){
                        $html.='<td class="top right">'.$year.'年'.$month.'月'.$day.'日</td>';
                        $html.='<td class="top right">'.$ihour.'</td>';
                        $html.='<td class="right"><table><tr><td width="30">'.$arrayData[$i].'</td><td>μSv/h</td></tr></table></td>';
                       // $output .='"'.$dnow.'",'.'"'.$i.'":00,'.'"'.$arrayData[$i].'",'.'μSv/h,'."\n";
                    }
                    else {
                        $html.='<td class="top right">'.$year.'年'.$month.'月'.$day.'日</td>';
                        $html.='<td class="top right">'.$ihour.'</td> ';
                        $html.='<td class="right"><table><tr><td width="30">0.000</td><td>μSv/h</td></tr></table></td>';
                        //$output .='"'.$dnow.'",'.'"'.$i.'":00,'.'0,'.'μSv/h,'."\n";
                        //$countArray ++;
                    }
                $html.='</tr>';
            }
            $html.= '
            </tbody>
            </table>
            </div>';
            return $html;
         
     }
}
