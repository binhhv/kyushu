<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>九州大学アイソトープ総合センター</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.remodal.css" type="text/css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
  <!--[if lt IE 9]><script src="http://qu.workmanage.biz/system/wp-content/themes/oroginal-theme/js/html5shiv.js"></script><![endif]-->
  <!--[if (gte IE 6)&(lte IE 8)]><script src="http://qu.workmanage.biz/system/wp-content/themes/oroginal-theme/js/selectivizr.js"></script><![endif]-->
  <script src="<?php echo base_url(); ?>assets/jquery.remodal.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/setting.js"></script>
  <meta name='robots' content='noindex,follow' />
<link rel="alternate" type="application/rss+xml" title="九州大学アイソトープ総合センター &raquo; ホーム のコメントのフィード" href="<?php echo site_url('home/feed')?>" />
<link rel='canonical' href='<?php echo site_url('sat')?>' />
<link rel='shortlink' href='<?php echo site_url('sat')?>' />
	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
</head>


<script>

setInterval(function(){
       // $('#lb_mon02').html('1231231');
	var now = new Date();
	//alert(now.getMinutes());
	//if(now.getMinutes() == 0){
		//alert('123');
            $.ajax({
            type: 'POST',
             url: '<?php echo site_url('index/getValueReload');?>',
            data:{type:'123'},
         success:function(data){
                    //alert('right');
                        //var Obj = jQuery.parseJSON(data);
                        //alert(data);
                        var  arrayData = data.split(',');
                        $('#ilb_addressmon').html(arrayData[0]); 
                        $('#lb_mon').html(arrayData[1]); 
                        $('#lb_unitmon').html(arrayData[2]);
                        $('#lb_mon').css("font-size",arrayData[3]);
                        
                        //$('#lb_hournow').html(arrayData[12]);
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
    }, 100);
</script>
    

<body>
  <div class="wrapper">
    <div class="wrapper_inner">
      <div class="header">
        <header>
          <div class="set-width">
            <div class="header-logo">
              <h1>              <a href="<?php echo site_url('')?>"><img src="<?php echo base_url(); ?>assets/img/header-logo.png" alt="九州大学"></a>
              <a href="<?php echo site_url('')?>"><img src="<?php echo base_url(); ?>assets/img/header-logo2.png" alt="九州大学 アイソトープ 総合センター"></a>
              </h1>            </div>
            <div class="header-subnav">
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
      </div>
  <div class="contents">
    <div class="slide">
      <img src="<?php echo base_url(); ?>assets/img/slide-img-1.jpg" width="980" height="446" alt="">
    </div>
    <div class="set-width row">
      <div class="left contents-left">
        <h2 class="titletype-1" style="font-weight:lighter;">最新情報</h2>
        <div class="top-news">
                  <article class="new">
            <a href="system/archives/240">              <time>2014.10.30</time>
                            <h1 class="noicon">教育訓練（新規/X線）を開催します。</h1>                        </a>
          </article>
                  <article>
            <a href="/pdf/pamphlet.pdf" target="_blank">              <time>2014.9.05</time>
                            <h1 class="pdf-dl-btn">放射性物質を発見したら</h1>
                                      </a>
          </article>
        
        </div>
      </div>
      <div class="right sidebar">
                  <div class="banner">
                      <img src="<?php echo base_url(); ?>assets/img/side-banner-title.png" style="margin-left:-5px;">
                   <!--<strong><label style="font-size:15px; font-style: bold;">線量カウンター</label></strong>-->
                   <div class="address_mon">
                       <label id="ilb_addressmon"><?php echo $value['mon']['address']; ?></label>
                   </div>
                 
                      <div style="text-align:center;">
                        <!--<time><label id="lb_date1"></label>&nbsp;<label id="lb_time1"></label>現在</time>-->
                         <p><strong><label id="lb_mon" style="font-size:<?php echo $value['mon']['fontsize']?>;"><?php echo $value['mon']['value']; ?></label></strong><label id="lb_unitmon"><?php echo $value['mon']['unit'];?></label></p>

                        </div>
                  </div>
        <div class="side-subnav">
          <ul>
            <li><a href="<?php echo site_url('monitoring')?>"><img src="<?php echo base_url(); ?>assets/img/side-link-1.png" alt=""></a></li>
            <li><a href="<?php echo site_url('monitoring/archive')?>"><img src="<?php echo base_url(); ?>assets/img/side-link-2.png" alt=""></a></li>
          </ul>
        </div>
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