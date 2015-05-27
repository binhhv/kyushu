<?php
class chart {
    function chart() {
       include(APPPATH."libraries/pChart/pData.class");
       include(APPPATH."libraries/pChart/pChart.class");
    }
    function draw_chart($params){
        /*$DataSet = new pData();   
        //$DataSet->ImportFromCSV(APPPATH."data/CSV.csv",",",array(1),TRUE,0);
        $DataSet->AddPoint($params['data'],"Serie1"); 
        //if(!is_null($dataoption)){
        $DataSet->AddPoint($params['arrayPoint'],"Serie2");
        //}
        //$DataSet->setSerieTicks("Serie1",4);
        $DataSet->AddAllSeries();   
        $DataSet->RemoveSerie("Serie2"); 
        $DataSet->SetAbsciseLabelSerie("Serie2");   
        $DataSet->SetYAxisName("μSv/h");
        //$DataSet->SetYAxisUnit("μGy/h");
        //$DataSet->SetYAxisName("Response time");
        $DataSet->SetXAxisName("時");
        
        // Initialise the graph   
        $Test = new pChart(700,230);
        $Test->setFixedScale(0, isset($params['maxValue']) ? $params['maxValue'] * 2 : 2);//xét giá trị trục tung 
        $Test->setColorPalette(0,255,0,0); // xét màu line.
        
        $Test->setFontProperties(APPPATH."libraries/pChart/meiryob.ttc",8);   
        
        
        $Test->setGraphArea(65,30,680,185);///(70,30,680,200);   
        $Test->drawFilledRoundedRectangle(7,7,693,223,5,255,255,255);   
        $Test->drawRoundedRectangle(5,5,695,225,5,230,230,230);   
        $Test->drawGraphArea(255,255,255,FALSE);
        $Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,150,150,150,TRUE,0,2);   
        $Test->drawGrid(1,TRUE,150,150,150,100);
        $Test->setLineStyle(2);
        // Draw the 0 line   
        $Test->setFontProperties(APPPATH."libraries/pChart/meiryob.ttc",6);   
        $Test->drawTreshold(0,143,55,72,TRUE,TRUE);   

        // Draw the line graph
        $Test->createColorGradientPalette(125,15,64,100,100,100,10);
        $Test->drawLineGraph($DataSet->GetData(),$DataSet->GetDataDescription());   
         
        // Finish the graph   
        $Test->setFontProperties(APPPATH."libraries/pChart/meiryob.ttc",8);   
       // $Test->drawLegend(75,35,$DataSet->GetDataDescription(),255,255,255);   
        $Test->setFontProperties(APPPATH."libraries/pChart/meiryob.ttc",10);   
        //$Test->drawTitle(60,22,"example 1",50,50,50,585);  
        $imagefile=APPPATH.'data/'.$params['filename'].'.png';
        $Test->Render($imagefile);
        return $imagefile;*/
        $DataSet = new pData();   
        //$DataSet->ImportFromCSV(APPPATH."data/CSV.csv",",",array(1),TRUE,0);
        $DataSet->AddPoint($params['data'],"Serie1"); 
        //if(!is_null($dataoption)){
        $DataSet->AddPoint($params['arrayPoint'],"Serie2");
        //}
        //$DataSet->setSerieTicks("Serie1",4);
        $DataSet->AddAllSeries();   
        $DataSet->RemoveSerie("Serie2"); 
        $DataSet->SetAbsciseLabelSerie("Serie2");   
        $DataSet->SetYAxisName("μSv/h");
        //$DataSet->SetYAxisUnit("μGy/h");
        //$DataSet->SetYAxisName("Response time");
        $DataSet->SetXAxisName("時");
        
        // Initialise the graph   
        $Test = new pChart(700,230);
        $Test->setFixedScale(0, 1.5);//isset($params['maxValue']) ? $params['maxValue'] * 2 : 2);//xét giá trị trục tung 
        $Test->setColorPalette(0,255,0,0); // xét màu line.
        
        $Test->setFontProperties(APPPATH."libraries/pChart/meiryob.ttc",8);   
        
        
        $Test->setGraphArea(65,30,680,185);///(70,30,680,200);   
        $Test->drawFilledRoundedRectangle(7,7,693,223,5,255,255,255);   //background graph
        //$Test->drawRoundedRectangle(5,5,695,225,5,230,230,230);   
        $Test->drawGraphArea(255,255,255,FALSE);
        $Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,150,150,150,TRUE,0,2);   
        $Test->drawGrid(1,TRUE,150,150,150,100);
        $Test->setLineStyle(2);
        // Draw the 0 line   
        $Test->setFontProperties(APPPATH."libraries/pChart/meiryob.ttc",6);   
        $Test->drawTreshold(0,143,55,72,TRUE,TRUE);   

        // Draw the line graph
        //$Test->loadColorPalette(APPPATH.'libraries/palette.txt','|'); 
        $Test->createColorGradientPalette(125,15,64,100,100,100,10);  
        $Test->drawLineGraph($DataSet->GetData(),$DataSet->GetDataDescription());   
         
        // Finish the graph   
        $Test->setFontProperties(APPPATH."libraries/pChart/meiryob.ttc",8);   
       // $Test->drawLegend(75,35,$DataSet->GetDataDescription(),255,255,255);   
        $Test->setFontProperties(APPPATH."libraries/pChart/meiryob.ttc",10);   
        //$Test->drawTitle(60,22,"example 1",50,50,50,585);  
        $imagefile=APPPATH.'data/'.$params['filename'].'.png';
        $Test->Render($imagefile);
        return $imagefile;
        
    }
   /* function draw_line_graph($params) {
        /*$DataSet = new pData;
        $DataSet->AddPoint($params['data'],"Serie1");  //需要显示的数据
        $DataSet->AddPoint($params['date'],"Serie2"); //横坐标的数据
        $DataSet->AddSerie("Serie1");
        $DataSet->SetAbsciseLabelSerie("Serie2");
        $DataSet->SetSerieName("订单总金额","Serie1");
       // $DataSet->SetYAxisName("RMB"); //纵坐标上显示的文字
        //$DataSet->SetXAxisName('横坐标：日期'); //横坐标上显示的文字
        //$DataSet->SetXAxisFormat("date"); //横坐标的数据类型
        
        $Test = new pChart($params['height'],$params['width']); //图表文件的高度和宽度
        //$Test->setDateFormat($params['date_format']); //横坐标显示的日期格式
        $Test->setColorPalette(0,255,0,0);
 
        $Test->setFontProperties(base_url()."libraries/pChart/tahoma.ttf",12); //设置使用的字体及字号
        $Test->setGraphArea(60,60,$params['x_area'],$params['y_area']); //图形区域的高度和宽度
        $Test->drawGraphArea(252,252,252); //线的颜色
        $Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,150,150,150,TRUE,0,2);
        $Test->drawGrid(4,TRUE,230,230,230,255);
        
        $Test->drawLineGraph($DataSet->GetData(),$DataSet->GetDataDescription());
        $Test->drawPlotGraph($DataSet->GetData(),$DataSet->GetDataDescription(),3,2,255,255,255);
        $Test->setFontProperties(base_url()."libraries/pChart/tahoma.ttf",8); //设置数据值所用字体及字号
        $Test->writeValues($DataSet->GetData(),$DataSet->GetDataDescription(),"Serie1"); //输出每个点的数据值
        
        $Test->setFontProperties(base_url()."libraries/pChart/tahoma.ttf",11); //设置使用的字体及字号
        $Test->drawLegend(75,65,$DataSet->GetDataDescription(),255,255,255);
 
        $Test->setFontProperties(base_url()."libraries/pChart/tahoma.ttf",12); //设置使用的字体及字号
        $Test->drawTitle(60,22,$params['title'],50,50,50,585);
            
         $DataSet = new pData;   
        //$DataSet->ImportFromCSV(APPPATH."data/bulkdata.csv",",",array(1,2,3),FALSE,0);   
        $DataSet->AddAllSeries();   
        $DataSet->SetAbsciseLabelSerie();   
        $DataSet->SetSerieName("January","Serie1");   
        $DataSet->SetSerieName("February","Serie2");   
        $DataSet->SetSerieName("March","Serie3");   

        // Initialise the graph   
        $Test = new pChart(700,230);   
        $Test->setFontProperties(APPPATH."assets/Fonts/tahoma.ttf",8);   
        $Test->setGraphArea(60,30,680,200);   
        $Test->drawFilledRoundedRectangle(7,7,693,223,5,240,240,240);   
        $Test->drawRoundedRectangle(5,5,695,225,5,230,230,230);   
        $Test->drawGraphArea(255,255,255,TRUE);
        $Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),5,150,150,150,TRUE,0,2);   
        $Test->drawGrid(4,TRUE,230,230,230,50);

        // Draw the 0 line   
        $Test->setFontProperties(APPPATH."assets/Fonts/tahoma.ttf",6);   
        $Test->drawTreshold(0,143,55,72,TRUE,TRUE);   

        // Draw the line graph
        $Test->drawLineGraph($DataSet->GetData(),$DataSet->GetDataDescription());   
        $Test->drawPlotGraph($DataSet->GetData(),$DataSet->GetDataDescription(),3,2,255,255,255);   

        // Finish the graph   
        $Test->setFontProperties(APPPATH."assets/Fonts/tahoma.ttf",8);   
        $Test->drawLegend(65,35,$DataSet->GetDataDescription(),255,255,255);   
        $Test->setFontProperties(APPPATH."assets/Fonts/tahoma.ttf",10);   
        //$Test->drawTitle(60,22,"example 1",50,50,50,585);   
        //$Test->Render("data/example1.png"); 
        $Test->drawTitle(60,22,$params['title'],50,50,50,585);
        $imagefile=APPPATH.'data/'.$params['filename'].'.png'; //设置生成文件的保存路径
        $Test->Render($imagefile);   //生成文件
 
         return $imagefile;  //返回文件名
    }*/
}