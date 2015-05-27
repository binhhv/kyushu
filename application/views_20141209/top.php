<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
             url: '<?php echo site_url('top/getValueReload');?>',
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
</body>
</html>