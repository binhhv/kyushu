<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>  線量カウンター | 九州大学アイソトープ総合センター</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
  <script type="text/javascript" 
       src="http://maps.google.com/maps/api/js?sensor=false">
  </script> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.remodal.css" type="text/css">
  
 <!-- <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>-->
  <!--[if lt IE 9]><script src="http://qu.workmanage.biz/system/wp-content/themes/oroginal-theme/js/html5shiv.js"></script><![endif]-->
  <!--[if (gte IE 6)&(lte IE 8)]><script src="http://qu.workmanage.biz/system/wp-content/themes/oroginal-theme/js/selectivizr.js"></script><![endif]-->
 
  <script src="<?php echo base_url(); ?>assets/js/jquery.remodal.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/setting.js"></script>
  <meta name='robots' content='noindex,follow' />
<link rel="alternate" type="application/rss+xml" title="九州大学アイソトープ総合センター &raquo; 線量カウンター のコメントのフィード" href="<?php echo site_url('monitoring/feed')?>" />
<link rel='canonical' href='<?php echo site_url('monitoring')?>' />
<link rel='shortlink' href='<?php echo site_url('')?>' />
	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>


<script>
    
    setInterval(function(){
       // $('#lb_mon02').html('1231231');
	var now = new Date();
	//alert(now.getMinutes());
	//if(now.getMinutes() == 0){
		//alert('123');
            $.ajax({
            type: 'POST',
             url: '<?php echo site_url('monitoring/getValueReload');?>',
            data:{type:'123'},
         success:function(data){
                    //alert('right');
                        //var Obj = jQuery.parseJSON(data);
                        //alert(data);
                        var  arrayData = data.split(',');
                        $('#lb_mon1').html(arrayData[0]); 
                        $('#lb_mon2').html(arrayData[3]);
                        $('#lb_mon3').html(arrayData[6]);
                        $('#lb_mon4').html(arrayData[9]);
                        
                        $('#lb_unitmon1').html(arrayData[1]);
                        $('#lb_unitmon2').html(arrayData[4]);
                        $('#lb_unitmon3').html(arrayData[7]);
                        $('#lb_unitmon4').html(arrayData[10]);
                        
                        $('#lb_mon1').css("font-size",arrayData[2]);
                        $('#lb_mon2').css("font-size",arrayData[5]);
                        $('#lb_mon3').css("font-size",arrayData[8]);
                        $('#lb_mon4').css("font-size",arrayData[11]);
                        
                        $('#lb_hournow').html(arrayData[12]);
                       // $('#img_chart1').attr("src", data.chart1); 
                       // $('#img_chart2').attr("src", data.chart2);
                        //$('#img_chart3').attr("src", data.chart3);
                        //$('#img_chart4').attr("src", data.chart4);
                    },
         error: function(data) { // if error occured
                  //$('#lb_mon1').html('---'); 
                  //$('#lb_mon2').html('---');
                  //$('#lb_mon3').html('---');
                  //$('#lb_mon4').html('---');
             },
           dataType:'text'
           });
           //}
    }, 6000);
    function startTime() {
 
    /*
    var d = new Date();

    // convert to msec
    // subtract local time zone offset
    // get UTC time in msec
    var utc = d.getTime() - (d.getTimezoneOffset() * 60000);

    // create new Date object for different city
    // using supplied offset
    var nd = new Date(utc + (3600000*offset));
    */
    var today=new Date();
    var y=today.getFullYear();
    var month=today.getMonth() + 1;
    var d=today.getDate();
    var h=today.getHours();
    var m=today.getMinutes();
    var s=today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('lb_date1').innerHTML = y + "年" + month + "月" + d + "日";
    document.getElementById('lb_time1').innerHTML = h+":"+m;
    document.getElementById('lb_date2').innerHTML = y + "年" + month + "月" + d + "日";
    document.getElementById('lb_time2').innerHTML = h+":"+m;
    document.getElementById('lb_date3').innerHTML = y + "年" + month + "月" + d + "日";
    document.getElementById('lb_time3').innerHTML = h+":"+m;
    document.getElementById('lb_date4').innerHTML = y + "年" + month + "月" + d + "日";
    document.getElementById('lb_time4').innerHTML = h+":"+m;
    var t = setTimeout(function(){startTime()},500);
    }

    function checkTime(i) {
        if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
    function exportCSV(monName){
       // alert(monName);
       $('#i_monName').val(monName);
       $('#i_type').val('0');
       $('#formMain').submit();
       }
     function exportPDF(monName){
       // alert(monName);
       $('#i_monName').val(monName);
       $('#i_type').val('1');
       $('#formMain').submit();
       }
   function getChartMon(b){
        
        var mon = b.substr(b.length - 1);
        var town ='';
        if(mon == 1 || mon == 2){
            town ='伊都';
        }
        else town ='箱崎';
		var titleGraph = '最新' +  $('#lb_hournow').text() +'時間線量'+'　'+town+ (mon%2 - 2)*-1 +'号機';
        //var titleGraph = '最新' +  $('#lb_hournow').text() +'時間線量'+'　'+ mon +'号機' +'（'+town + '地区）';
        $('#lb_title' + b).html(titleGraph);
        
        var imgloading = '<?php echo base_url(); ?>' + 'assets/img/loading_icon_comment.gif';
        $('#img_' + b).attr("src",imgloading);
        $.ajax({
            type: 'POST',
             url: '<?php echo site_url('monitoring/getChartMonOfDay');?>',
            data:{chartMon:b},
         success:function(data){
                     //alert(b);
                     //alert(data);
                     //$('#img_' + b).src =  data;//attr("src", data);
                     document.getElementById('img_' + b).src=data;
                    },
         error: function(data) { 
                   alert('error');
             },
           dataType:'text'
           });
    }
</script>

<script>

function initialize1() {
        var map_options = {
            center: new google.maps.LatLng(33.597583,130.217972),
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var google_map = new google.maps.Map(document.getElementById("map_canvas1"), map_options);

        var info_window = new google.maps.InfoWindow({
            content: 'loading'
        });

        var t = [];
        var x = [];
        var y = [];
        var h = [];

        t.push('Location Name 1');
        x.push(33.597583);
        y.push(130.217972);
        h.push('<p><strong>Location Name 1</strong><br/>Address 1</p>');

        t.push('Location Name 2');
        x.push(33.597833);
        y.push(130.217028);
        h.push('<p><strong>Location Name 2</strong><br/>Address 2</p>');

        var i = 0;
        for ( item in t ) {
            var m = new google.maps.Marker({
                map:       google_map,
                animation: google.maps.Animation.DROP,
                title:     t[i],
                position:  new google.maps.LatLng(x[i],y[i]),
                html:      h[i]
            });

            
            i++;
        }
    }

$(document).ready(function() { initialize1(); });
</script>
<script>

function initialize2() {
        var map_options = {
            center: new google.maps.LatLng(33.625644,130.423308),
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var google_map = new google.maps.Map(document.getElementById("map_canvas2"), map_options);

        var info_window = new google.maps.InfoWindow({
            content: 'loading'
        });

        var t = [];
        var x = [];
        var y = [];
        var h = [];

        t.push('Location Name 1');
        x.push(33.625644);
        y.push(130.423308);
        h.push('<p><strong>Location Name 1</strong><br/>Address 1</p>');

        t.push('Location Name 2');
        x.push(33.626081);
        y.push(130.424592);
        h.push('<p><strong>Location Name 2</strong><br/>Address 2</p>');

        var i = 0;
        for ( item in t ) {
            var m = new google.maps.Marker({
                map:       google_map,
                animation: google.maps.Animation.DROP,
                title:     t[i],
                position:  new google.maps.LatLng(x[i],y[i]),
                html:      h[i]
            });

            
            i++;
        }
    }

$(document).ready(function() { initialize2(); });
</script>
</head>

<body onload="startTime()">
  <label id="lb_hournow" style="display:none"><?php echo $hournow; ?></label>
  <div class="wrapper">
    <div class="wrapper_inner">
     <!-- <div class="header">
        <header>
          <div class="set-width">
            <div class="header-logo">
                            <a href="<?php echo site_url('')?>"><img src="<?php echo base_url(); ?>assets/img/header-logo.png" alt="九州大学"></a>
              <a href="<?php echo site_url('')?>"><img src="<?php echo base_url(); ?>assets/img/header-logo2.png" alt="九州大学 アイソトープ 総合センター"></a>
                          </div>
              <div class="header-subnav" >
              <ul>
                <li id="menu-item-203" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-203"><a href="<?php echo site_url('sat')?>">学生・教員</a></li>
<li id="menu-item-202" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-202"><a href="<?php echo site_url('inquiry')?>">お問い合わせ</a></li>
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
                <li id="menu-item-198" class="g-nav2 menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-page-parent menu-item-198"><a href="http://qu.workmanage.biz/system/summary">概要</a></li>
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
  <div class="contents page page-282">
    <div class="breadcrumbs set-width" xmlns:v="http://rdf.data-vocabulary.org/#">
        <!-- Breadcrumb NavXT 5.1.1 -->
<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to 九州大学アイソトープ総合センター." href="<?php echo site_url('')?>" class="home">TOP</a></span> &gt; <span typeof="v:Breadcrumb"><span property="v:title">線量率</span></span>    </div>
    <div class="set-width row">
      <h1 class="titletype-2">
                   線量率
              </h1>

      <div class="left sidebar">
        
        
        
        
                  <ul class="sidenav">
            <li id="menu-item-284" class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-page-parent menu-item-284"><a href="<?php echo site_url('monitoring')?>">線量率</a></li>
<li id="menu-item-289" class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-page-parent menu-item-289"><a href="<?php echo site_url('monitoring/archive')?>">線量アーカイブ</a></li>
<li id="menu-item-290" class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-page-parent menu-item-290"><a href="#">測定結果報告書
        <br><label style="font-size:12px">(空間線量率・大気浮遊じん)</label></a></li>
          </ul>
        
<!--          -->

      </div>
      <div class="right page-contents">
        <p class="last-update">最終更新日<time>2014.11.7</time></p>
        <h2 class="titletype-1">モニタリングポスト</h2>
<div class="box">
  <p class="sen-box-mb">九州大学アイソトープ総合センターは、放射線の測定、放射性物質の除染、被災地の支援などに、精力的に取り組み、原子力災害の被災自治体の復興支援とともに、全国レベルでの放射線にかかわる知識と技術の提供を進めています。放射線量情報は60分毎に更新しています。</p>

  <h3 class="titletype-5">伊都地区</h3>
  <div class="box sen-box">
    <h4 class="titletype-4">計測地</h4>
    <div id="map_canvas1" style="width:566px;height:300px;">Google Map</div><br>
    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13288.9005543593!2d130.4247127!3d33.625404!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x35418e49dc4c228f%3A0xa24aeee510b5a4a8!2z56aP5bKh55yM56aP5bKh5biC5p2x5Yy6566x5bSO77yW5LiB55uu77yR77yQ4oiS77yR!5e0!3m2!1sja!2sjp!4v1414827434267" width="566" height="300" frameborder="0" style="border:0"></iframe>-->
    
    <div class="row">
        <h5>伊都1号機</h5>
      <div class="left">
        <time><label id="lb_date1"></label>&nbsp;<label id="lb_time1"></label>現在</time>
        <p><strong><label id="lb_mon1" style="font-size:<?php echo $value['mon01']['fontsize']?>;"><?php echo $value['mon01']['value']; ?></label></strong><label id="lb_unitmon1"><?php echo $value['mon01']['unit'];?></label></p>
        <div class="btn-g24">
            <a href="#graph1" onclick="pop('graph1');">最新24時間のグラフを見る</a>
        </div>
      </div>
      <div class="right">
          <img src="<?php echo base_url(); ?>assets/img/device_ito01.jpg">
        <!--<time><label id="lb_date2"></label>&nbsp;<label id="lb_time2"></label>現在</time>
        <p><strong><label id="lb_mon2" style="font-size:<?php echo $value['mon02']['fontsize']?>;"> <?php echo $value['mon02']['value']; ?></label></strong><label id="lb_unitmon2"><?php echo $value['mon02']['unit'];?></label></p>
        <div class="btn-g24">
          <a href="#graph2">最新24時間のグラフを見る</a>
        </div>-->
      </div>
    </div>
    <br>
    <div class="row">
      <h5>伊都2号機</h5>
      <div class="left">
        <time><label id="lb_date2"></label>&nbsp;<label id="lb_time2"></label>現在</time>
        <p><strong><label id="lb_mon2" style="font-size:<?php echo $value['mon02']['fontsize']?>;"><?php echo $value['mon02']['value']; ?></label></strong><label id="lb_unitmon2"><?php echo $value['mon02']['unit'];?></label></p>
        <div class="btn-g24">
            <a href="#graph2" onclick="pop('graph2');">最新24時間のグラフを見る</a>
        </div>
      </div>
      <div class="right">
           <img src="<?php echo base_url(); ?>assets/img/device_ito02.jpg">
        <!--<h5>伊都2号機</h5>
        <time><label id="lb_date2"></label>&nbsp;<label id="lb_time2"></label>現在</time>
        <p><strong><label id="lb_mon2" style="font-size:<?php echo $value['mon02']['fontsize']?>;"> <?php echo $value['mon02']['value']; ?></label></strong><label id="lb_unitmon2"><?php echo $value['mon02']['unit'];?></label></p>
        <div class="btn-g24">
          <a href="#graph2">最新24時間のグラフを見る</a>
        </div>-->
      </div>
    </div>
  </div>
  
  <div class="box sen-box">
  <h4 class="titletype-4"></h4>

  <div class="row">
      <h5>加速器施設</h5>
      <div style="border: 1px solid #cfcfcf;margin: 10px;padding: 10px;">
      <strong style="font-size: 60px;"><label>準備中</label></strong><br><br>
      <strong style="font-size: 25px;"><label >点検中</label></strong>
      <div>
  </div>
  </div>
  </div></div>
  <h3 class="titletype-5">箱崎地区実験室</h3>
  <div class="box sen-box">
    <h4 class="titletype-4">計測地</h4>
    <div id="map_canvas2" style="width:566px;height:300px;">Google Map</div><br>
    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13288.9005543593!2d130.4247127!3d33.625404!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x35418e49dc4c228f%3A0xa24aeee510b5a4a8!2z56aP5bKh55yM56aP5bKh5biC5p2x5Yy6566x5bSO77yW5LiB55uu77yR77yQ4oiS77yR!5e0!3m2!1sja!2sjp!4v1414827434267" width="566" height="300" frameborder="0" style="border:0"></iframe>-->
    <div class="row">
      <h5>箱崎1号機</h5>
      <div class="left">
        <time><label id="lb_date3"></label>&nbsp;<label id="lb_time3"></label>現在</time>
        <p><strong><label id="lb_mon3" style="font-size:<?php echo $value['mon03']['fontsize']?>;"><?php echo $value['mon03']['value']; ?></label></strong><label id="lb_unitmon3"><?php echo $value['mon03']['unit'];?></label></p>
        <div class="btn-g24">
          <a href="#graph3">最新24時間のグラフを見る</a>
        </div>
      </div>
      <div class="right">
           <img src="<?php echo base_url(); ?>assets/img/device_hakozaki01.jpg">
        <!--<h5>箱崎2号機</h5>
        <time><label id="lb_date4"></label>&nbsp;<label id="lb_time4"></label>現在</time>
        <p><strong><label id="lb_mon4" style="font-size:<?php echo $value['mon04']['fontsize']?>;" ><?php echo $value['mon04']['value']; ?></label></strong><label id="lb_unitmon4"><?php echo $value['mon04']['unit'];?></label></p>
        <div class="btn-g24">
          <a href="#graph4">最新24時間のグラフを見る</a>
        </div>-->
      </div>
    </div>
    <br>
    <div class="row">
      <h5>箱崎2号機</h5>
      <div class="left">
        <time><label id="lb_date4"></label>&nbsp;<label id="lb_time4"></label>現在</time>
        <p><strong><label id="lb_mon4" style="font-size:<?php echo $value['mon04']['fontsize']?>;"><?php echo $value['mon04']['value']; ?></label></strong><label id="lb_unitmon4"><?php echo $value['mon04']['unit'];?></label></p>
        <div class="btn-g24">
          <a href="#graph4">最新24時間のグラフを見る</a>
        </div>
      </div>
      <div class="right">
          <img src="<?php echo base_url(); ?>assets/img/device_hakozaki02.jpg">
        <!--<h5>箱崎2号機</h5>
        <time><label id="lb_date4"></label>&nbsp;<label id="lb_time4"></label>現在</time>
        <p><strong><label id="lb_mon4" style="font-size:<?php echo $value['mon04']['fontsize']?>;" ><?php echo $value['mon04']['value']; ?></label></strong><label id="lb_unitmon4"><?php echo $value['mon04']['unit'];?></label></p>
        <div class="btn-g24">
          <a href="#graph4">最新24時間のグラフを見る</a>
        </div>-->
      </div>
    </div>
      <p class="notes">※固定型や可搬型モニタリングポストは、空気吸収線量率[μGy/h](マイクログレイ毎時)で測定しており、ウェブサイト上では、環境　放射線モニタリング指針（原子力安全委員会）に基づき、１[μGy/h](マイクログレイ毎時) ＝ １[μSv/h](マイクロシーベルト毎時)　として換算し、実効線量を表示しています。<br />
        一方、一般的なサーベイメータや福島県内に設置しているリアルタイム線量測定システム等は、１ｃｍ線量当量率[μSv/h] (マイクロ　シーベルト毎時)を測定しています。<br />
        実効線量と１ｃｍ線量当量は、どちらも[μSv](マイクロシーベルト)単位ですが、一般的に1cm線量当量は 実効線量より高めの値と　なります。<br />
        （※環境放射線モニタリング指針では、「１ｃｍ線量当量[Sv]でも 線量評価は可能だが、安全側の評価となることに留意する必要が　ある」旨、記載されています。）</p>
      <p class="notes">※可搬型モニタリングポスト及びリアルタイム線量測定システムについては、冬季期間中、降雪の影響により欠測する場合があります。</p>
  </div>
</div>

<!-- モーダルウィンドウ -->
<form action="<?php echo site_url('monitoring'); ?>" method="post" id ="formMain">
 <input type="text" name="monName" id="i_monName" style="display:none;" />
 <input type="text" name="type" id="i_type" style="display:none;" />
<div class="remodal" data-remodal-id="graph1">
    <p class="modal-title"><label id="lb_titlegraph1">最新24時間線量　1号機</label></p>
  <img src="<?php echo base_url(); ?>assets/img/loading_icon_comment.gif" width="562" height="188" alt="" id="img_graph1"> <!-- <?php //echo $chart['chart1']; ?>-->
  <div class="row" style="display: none">
    <div class="left">
      <div class="csv-dl-btn">
          <label class="csv" onclick="exportCSV('mon01');">CSVファイルをダウンロード</label>
      </div>
    </div>
    <div class="right">
      <div class="pdf-dl-btn">
          <label class="pdf" onclick="exportPDF('mon01');">PDFファイルをダウンロード</label>
      </div>
    </div>
  </div>
  <p></p>
</div>

<div class="remodal" data-remodal-id="graph2">
    <p class="modal-title"><label id="lb_titlegraph2">最新24時間線量　2号機</label></p>
  <img src="<?php echo base_url(); ?>assets/img/loading_icon_comment.gif" width="562" height="188" alt="" id="img_graph2">
  
 <div class="row" style="display: none">
    <div class="left">
      <div class="csv-dl-btn">
        <label class="csv" onclick="exportCSV('mon02');">CSVファイルをダウンロード</label>
      </div>
    </div>
    <div class="right">
      <div class="pdf-dl-btn">
          <label class="pdf" onclick="exportPDF('mon02');">PDFファイルをダウンロード</label>
      </div>
    </div>
  </div>
  <p></p>
</div>

<div class="remodal" data-remodal-id="graph3">
    <p class="modal-title"><label id="lb_titlegraph3">最新24時間線量　3号機</label></p>
  <img src="<?php echo base_url(); ?>assets/img/loading_icon_comment.gif" width="562" height="188" alt="" id="img_graph3">
  <div class="row" style="display: none">
    <div class="left">
      <div class="csv-dl-btn">
        <label class="csv" onclick="exportCSV('mon03');">CSVファイルをダウンロード</label>
      </div>
    </div>
    <div class="right">
      <div class="pdf-dl-btn">
          <label class="pdf" onclick="exportPDF('mon03');">PDFファイルをダウンロード</label>
      </div>
    </div>
  </div> 
  <p></p>
</div>

<div class="remodal" data-remodal-id="graph4">
    <p class="modal-title"><label id="lb_titlegraph4">最新24時間線量　4号機</label></p>
  <img src="<?php echo base_url(); ?>assets/img/loading_icon_comment.gif" width="562" height="188" alt="" id="img_graph4">
  <div class="row" style="display: none">
    <div class="left">
      <div class="csv-dl-btn">
          <label class="csv" onclick="exportCSV('mon04');">CSVファイルをダウンロード</label>
      </div>
    </div>
    <div class="right">
      <div class="pdf-dl-btn">
          <label class="pdf" onclick="exportPDF('mon04');">PDFファイルをダウンロード</label>
      </div>
    </div>
  </div> 
  <p></p>
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