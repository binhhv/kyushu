<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>  線量アーカイブ | 九州大学アイソトープ総合センター</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.remodal.css" type="text/css">
  
  <!--[if lt IE 9]><script src="http://qu.workmanage.biz/system/wp-content/themes/oroginal-theme/js/html5shiv.js"></script><![endif]-->
  <!--[if (gte IE 6)&(lte IE 8)]><script src="http://qu.workmanage.biz/system/wp-content/themes/oroginal-theme/js/selectivizr.js"></script><![endif]-->
  <script src="<?php echo base_url(); ?>assets/js/jquery.remodal.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/setting.js"></script>
  <meta name='robots' content='noindex,follow' />
<link rel="alternate" type="application/rss+xml" title="九州大学アイソトープ総合センター &raquo; 線量アーカイブ のコメントのフィード" href="http://qu.workmanage.biz/system/monitoring/archive/feed" />
<link rel='canonical' href='<?php echo site_url('monitoring/archive')?>' />
<link rel='shortlink' href='http://qu.workmanage.biz/system/?p=287' />
	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
<script>
       function changeCalendar(type,valueType){
           //$('#ilb_currentYear').html(333);
           var imgloading = '<?php echo base_url(); ?>' + 'assets/img/loading_icon_comment.gif';
           $('#img_chartDay').attr("src",imgloading);
           
          
           var currentYear = $('#ilb_currentYear').text();
           var currentMonth = $('#ilb_currentMonth').text();
           var mon = $('#iselect_mon').val();
           
           
           
           
           //alert(currentYear+currentMonth);
           $.ajax({
             type: 'POST',
             url: '<?php echo site_url('monitoring/getCalendar');?>',
            data:{type: type,valueType:valueType,currentMonth: currentMonth, currentYear:currentYear,mon:mon},
            success:function(data){
                           var  arrayData = data.split(',');
                           $('#ilb_currentMonth').html(arrayData[1]);
                           $('#ilb_currentYear').html(arrayData[2]);
                           $('#itb_Calendar').html(arrayData[0]); 
                           document.getElementById('img_chartDay').src=arrayData[3];
                           $('#lb_titleGraph').html(arrayData[4]);
                           /*if(type == 0){
                                $('#lb_titleGraph').html(arrayData[2] + '年の線量  ');
                           }
                           else {
                               $('#lb_titleGraph').html(arrayData[2] + '年'+ arrayData[1] + '月の線量  ');
                           }*/
                       },
            error: function(data) { // if error occured
                     alert(data);
                },
              dataType:'text'
              });
      
       }
        
       $(function() {
             $("#itb_Calendar").on("click", "td", function() {
              //alert($( this ).text());
              var day =  parseInt($(this).text());
              if(!isNaN(day)){var imgloading = '<?php echo base_url(); ?>' + 'assets/img/loading_icon_comment.gif';
              $('#img_chartDay').attr("src",imgloading);
              
              var month =  parseInt($('#ilb_currentMonth').text());
              var year =  parseInt($('#ilb_currentYear').text());
              
              var daynow = new Date();
              var dnow =  parseInt(daynow.getDate());
              var mnow =  parseInt(daynow.getMonth())+1;
              var ynow =  parseInt(daynow.getFullYear());
              var mon = $('#iselect_mon').val();
              
              $('#i_day').val(day);
              $('#i_month').val(month);
              $('#i_year').val(year);
              
              $('#lb_titleGraph').html(year + '年'+ month + '月' + day +'日の線量  ');
              //alert(daynow.getDate());
               // alert(day);
              //if(compareDay(day,month,year,dnow,mnow,ynow)){
                    $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('monitoring/getChartDayArchive');?>',
                    data:{mon:mon ,date: day,month: month, year:year},
                    success:function(data){
                                   //$('#img_chartDay').attr('src', data);
                                   document.getElementById('img_chartDay').src=data;
                                   $('#i_typeExport').val(2);
                              },
                   error: function(data) { // if error occured
                            alert('error');
                       },
                     dataType:'text'
                     });
                      }
              //}
              
            });
        });
        
        function compareDay(day,mon,year,dnow,mnow,ynow){
           
            if(ynow > year){
                return true;
            }
            if(ynow === year && mnow > mon){ return true; }
            if(ynow === year && mnow === mon && dnow > day){ return true; }
            return false;
        }
        
        function getChartMonthYear(type){
             var imgloading = '<?php echo base_url(); ?>' + 'assets/img/loading_icon_comment.gif';
             $('#img_chartDay').attr("src",imgloading);
             var month =  parseInt($('#ilb_currentMonth').text());
             var year =  parseInt($('#ilb_currentYear').text());
             var mon = $('#iselect_mon').val();
             $('#i_month').val(month);
             $('#i_year').val(year);
             $('#i_typeExport').val(type);
             
             if(type == 0){
                  $('#lb_titleGraph').html(year + '年の線量  ');
             }
             else {
                 $('#lb_titleGraph').html(year + '年'+ month + '月の線量  ');
             }
             $.ajax({
                  type: 'POST',
                  url: '<?php echo site_url('monitoring/getChartMonthYear');?>',
                  data:{mon:mon ,type: type,month: month, year:year},
                  success:function(data){
                                 //$('#img_chartDay').attr('src', data); 
                                 document.getElementById('img_chartDay').src=data;
                            },
                 error: function(data) { // if error occured
                          alert(data.chart);
                     },
                   dataType:'text'
                   });
        }

        function getMonName(sel){
           // $('#ilb_mon').html( sel.value.substr(sel.value.length - 1));
           $('#ilb_mon').html($("#iselect_mon option:selected").text());
        }
       function exportCSV(){
           $('#i_monName').val($('#iselect_mon').val());
           $('#i_type').val('0');
           
           $('#formMain').submit();
       }
       function exportPDF(){
           $('#i_monName').val($('#iselect_mon').val());
           $('#i_type').val('1');
           $('#formMain').submit();
       }
       function getChartToDay(){
        var day = -1;
        var month =  parseInt($('#ilb_currentMonth').text());
        var year =  parseInt($('#ilb_currentYear').text());
        $('#i_month').val(month);
        $('#i_year').val(year);
        var mon = $('#iselect_mon').val();
        $('#i_typeExport').val(2);   
        var imgloading = '<?php echo base_url(); ?>' + 'assets/img/loading_icon_comment.gif';
        $('#img_chartDay').attr("src",imgloading);
        $.ajax({
            type: 'POST',
             url: '<?php echo site_url('monitoring/getChartDayArchive');?>',
         data:{mon:mon ,date: day,month: month, year:year},
         success:function(data){
                     //alert(b);
                     //$('#img_chartDay').attr("src", data);
                     document.getElementById('img_chartDay').src=data;
                    },
         error: function(data) { 
                   alert('error');
             },
           dataType:'text'
           });
       }
       
</script>
</head>

<body onload="getChartToDay();">
  <div class="wrapper">
    <div class="wrapper_inner">
      <!--<div class="header">
        <header>
          <div class="set-width">
            <div class="header-logo">
                            <a href="<?php echo site_url('')?>"><img src="<?php echo base_url(); ?>assets/img/header-logo.png" alt="九州大学"></a>
              <a href="<?php echo site_url('')?>"><img src="<?php echo base_url(); ?>assets/img/header-logo2.png" alt="九州大学 アイソトープ 総合センター"></a>
                          </div>
            <div class="header-subnav">
              <ul>
                <li id="menu-item-203" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-203"><a href="http://qu.workmanage.biz/system/sat">学生・教員</a></li>
<li id="menu-item-202" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-202"><a href="http://qu.workmanage.biz/system/inquiry">お問い合わせ</a></li>
              </ul>
            </div>
          </div>
          <div class="header-nav">
            <nav class="set-width">
              <ul >
                  <li id="menu-item-197" class="g-nav1 menu-item menu-item-type-post_type menu-item-object-page menu-item-197"><a href="<?php echo site_url('notice')?>">お知らせ</a></li>
                <li id="menu-item-198" class="g-nav2 menu-item menu-item-type-post_type menu-item-object-page menu-item-198"><a href="<?php echo site_url('summary')?>">概要</a></li>
                <li id="menu-item-200" class="g-nav3 menu-item menu-item-type-post_type menu-item-object-page menu-item-200"><a href="<?php echo site_url('radiation')?>">放射線安全管理部</a></li>
                <li id="menu-item-199" class="g-nav4 menu-item menu-item-type-post_type menu-item-object-page menu-item-199"><a href="<?php echo site_url('nuclearnuclear')?>">核燃料安全管理部</a></li>
                <li id="menu-item-201" class="g-nav5 menu-item menu-item-type-post_type menu-item-object-page menu-item-201"><a href="<?php echo site_url('network')?>">放射線安全安心ネットワーク</a></li>
              </ul>
            </nav>
          </div>
        </header>
      </div>-->
  <div class="header">
        <header>
          <div class="set-width">
            <div class="header-logo">
                            <a href="http://qu.workmanage.biz/system/"><img src="http://qu.workmanage.biz/system/wp-content/themes/oroginal-theme/img/header-logo.png" alt="九州大学"></a>
              <a href="http://qu.workmanage.biz/system/"><img src="http://qu.workmanage.biz/system/wp-content/themes/oroginal-theme/img/header-logo2.png" alt="九州大学 アイソトープ 総合センター"></a>
                          </div>
            <div class="header-subnav">
              <ul>
                <li id="menu-item-202" class="hd-inquiry menu-item menu-item-type-post_type menu-item-object-page menu-item-202"><a href="http://qu.workmanage.biz/system/inquiry">お問い合わせ</a></li>
              </ul>
            </div>
          </div>
          <div class="header-nav">
            <nav class="set-width">
              <ul >
              <li id="menu-item-197" class="g-nav1 menu-item menu-item-type-post_type menu-item-object-page menu-item-197"><a href="http://qu.workmanage.biz/system/notice">お知らせ</a></li>
                <li id="menu-item-198" class="g-nav2 menu-item menu-item-type-post_type menu-item-object-page menu-item-198"><a href="http://qu.workmanage.biz/system/summary">概要</a></li>
                <li id="menu-item-391" class="g-nav3 menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-391"><a href="#">部門</a>
                <ul class="sub-menu">
                        <li id="menu-item-393" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-108 current_page_item menu-item-393"><a href="http://qu.workmanage.biz/system/summary/radiation">放射線安全管理部</a></li>
                        <li id="menu-item-395" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-395"><a href="http://qu.workmanage.biz/system/summary/nuclearnuclear">核燃料安全管理部</a></li>
                        <li id="menu-item-415" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-415"><a href="http://qu.workmanage.biz/system/summary/%e6%94%be%e5%b0%84%e7%b7%9a%e6%95%99%e8%82%b2%e9%83%a8">放射線教育部</a></li>
                        <li id="menu-item-414" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-414"><a href="http://qu.workmanage.biz/system/summary/%e6%94%be%e5%b0%84%e7%b7%9a%e7%a7%91%e5%ad%a6%e9%83%a8">放射線科学部</a></li>
                        <li id="menu-item-413" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-413"><a href="http://qu.workmanage.biz/system/summary/%e6%94%be%e5%b0%84%e7%b7%9a%e7%9b%a3%e8%a6%96%e6%83%85%e5%a0%b1%e9%83%a8">放射線監視情報部</a></li>
                        <li id="menu-item-412" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-412"><a href="http://qu.workmanage.biz/system/summary/%e6%94%be%e5%b0%84%e7%b7%9a%e5%81%a5%e5%ba%b7%e5%bd%b1%e9%9f%bf%e7%ae%a1%e7%90%86%e9%83%a8">放射線健康影響<br />管理部</a></li>
                </ul>
                </li>
                <li id="menu-item-392" class="g-nav4 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-392"><a href="#">実験室</a>
                <ul class="sub-menu">
                        <li id="menu-item-394" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-394"><a href="http://qu.workmanage.biz/system/sat/ito">伊都地区実験室</a></li>
                        <li id="menu-item-563" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-563"><a href="http://qu.workmanage.biz/system/sat/hospital">病院地区実験室</a></li>
                        <li id="menu-item-564" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-564"><a href="http://qu.workmanage.biz/system/sat/hakozaki">箱崎地区実験室</a></li>
                        <li id="menu-item-561" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-561"><a href="http://qu.workmanage.biz/system/sat/semi_high">全学核燃料物質<br />取扱施設</a></li>
                </ul>
                </li>
                <li id="menu-item-201" class="g-nav5 menu-item menu-item-type-post_type menu-item-object-page menu-item-201"><a href="http://qu.workmanage.biz/system/network">放射線安全安心ネットワーク</a></li>
              </ul>
            </nav>
          </div>
        </header>
      </div>
  <div class="contents page page-287">
    <div class="breadcrumbs set-width" xmlns:v="http://rdf.data-vocabulary.org/#">
        <!-- Breadcrumb NavXT 5.1.1 -->
<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to 九州大学アイソトープ総合センター." href="<?php echo site_url('')?>" class="home">TOP</a></span> &gt; <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to 線量カウンター." href="<?php echo site_url('monitoring')?>" class="post post-page">線量率</a></span> &gt; <span typeof="v:Breadcrumb"><span property="v:title">線量アーカイブ</span></span>    </div>
    <div class="set-width row">
      <h1 class="titletype-2">
                   線量率
              </h1>

      <div class="left sidebar">
        
        
        
        
                  <ul class="sidenav">
            <li id="menu-item-284" class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-page-parent menu-item-284"><a href="<?php echo site_url('monitoring')?>">線量率</a></li>
<li id="menu-item-289" class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-page-parent menu-item-289"><a href="<?php echo site_url('monitoring/archive')?>">線量アーカイブ</a></li>
<li id="menu-item-290" class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-page-parent menu-item-290"><a href="http://qu.workmanage.biz/system/monitoring/report">測定結果報告書
<br><label style="font-size:12px">(空間線量率・大気浮遊じん)</label></a></li>
          </ul>
        
<!--          -->

      </div>
      <div class="right page-contents">
        <p class="last-update">最終更新日<time>2014.11.7</time></p>
        <!--<iframe src="http://localhost/kyushu/archive" width="653" height="1000" scrolling="no" seamless="seamless" frameborder="0" style="border:0; overflow:hidden;">
                <p>Your browser does not support iframes.</p>
        </iframe>-->
        <h2 class="titletype-1">線量アーカイブ</h2>
<div class="box sen-box-arc">
    <div class="tac">
      <select name="#" id="iselect_mon" onchange="getMonName(this);">
       <option value="mon01">伊都1号機</option>
        <option value="mon02">伊都2号機</option>
        <option value="mon03">箱崎1号機</option>
        <option value="mon04">箱崎2号機</option>
      </select>
    </div>
    <?php echo $calendar['navi']; ?>
    <div id="idiv_contentCalendar">
        <table class='calendarcontent' id='itb_Calendar'>
            <?php echo $calendar['content']; ?>
        </table>
    </div>
    
    <p class="graph-title"><label id="lb_titleGraph"><?php echo $year ; ?>年<?php echo $month; ?>月<?php echo $day; ?>日の線量　</label>&nbsp;<label id="ilb_mon" >伊都1号機</label></p>
    <div class="tac"><img  width="562" height="188" alt="" id="img_chartDay">
        <br><br><br>
        測定データについては<a href="http://qu.workmanage.biz/system/inquiry">お問い合わせ</a>ください。
    </div>
    <form action="<?php echo site_url('monitoring/archive'); ?>" method="post" id ="formMain" style="display:none;">
    <input type="text" name="monName" id="i_monName" style="display:none;" />
    <input type="text" name="type" id="i_type" style="display:none;" />
    <input type="text" name="day" id="i_day" style="display:none;" />
    <input type="text" name="month" id="i_month" style="display:none;" />
    <input type="text" name="year" id="i_year" style="display:none;" />
    <input type="text" name="typeExport" id="i_typeExport" style="display:none;" />
    <div class="left" style="margin-left:40px;">
    <div class="csv-dl-btn">
        <label class="csv" onclick="exportCSV();">CSVファイルをダウンロード</label>
    </div>
    </div>
    <div class="right">
      <div class="pdf-dl-btn">
          <label class="pdf" onclick="exportPDF();">PDFファイルをダウンロード</label>
      </div>
    </div>
    </form>
     </div>
    </div>
  </div>

        <div class="footer">
        <footer>
          <div class="footer-bg">
            <div class="set-width">
              <div class="pagetop">
                <a id="page-top" href="#"><img src="<?php echo base_url(); ?>assets/img/footer-page-top.png" alt=""></a>
              </div>
              <div class="footer-top row">
                <p class="left">[箱崎地区実験室] 　〒812-8581　福岡市東区箱崎6-10-1<br>
                  Tel 092-642-2703　Fax 092-642-2706</p>
                <p class="right">[病院地区実験室] 　〒812-8582　福岡市東区馬出3-1-1<br>
                  Tel 092-642-6194　Fax 092-642-6200　</p>
              </div>
            </div>
          </div>
          <div class="footer-bot set-width">
            <a class="footer-sitemap" href="#">サイトマップ</a>
            <a class="footer-logo" href="http://www.kyushu-u.ac.jp/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/footer-logo.png" width="221" height="55" alt=""></a>
            <small>Copyright © KYUSHU UNIVERSITY. All Rights Reserved.</small>
          </div>
        </footer>
      </div>
    </div>
  </div>

</body>
</html>