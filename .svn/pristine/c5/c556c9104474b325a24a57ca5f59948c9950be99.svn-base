<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css" />
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css">
    <script>
    function getMonName(sel){
           // $('#ilb_mon').html( sel.value.substr(sel.value.length - 1));
           $('#ilb_mon').html($("#iselect_mon option:selected").text());
        }
    <script type="text/javascript">
    $(function(){
        $(document).on('click','input[type=text]',function(){ this.select(); });
    });
</script>
    <body>
       
        <div class="container" style="margin-top: 50px; height: 200px">
             
            <div class="container1">
            <div align="center" style="float: top; margin-top: 10px">
                <strong><font style="font-size: 30px"><label>管理画面</label></font></strong>
                <br>
                <br>
                 
            </div>
                <div align="left" style="float: top; margin-top: 10px; margin-left: 45px">
                <label style="font-size: 18px">■ TOPページ表示</label>

                 
            </div>
                <form name="change" id="login" method="POST" action="<?php echo site_url('admin/saveChange') ?>">
            
            
            <div id="styled-select" style="float: left; margin-top: 20px; margin-left: 45px">
                
            <select name="taskOption" id="taskOption">
              <option value="mon01" <?php if (isset($name) && $name=="mon01") echo 'selected="selected"';?>>伊都1号機</option>
              <option value="mon02"  <?php if (isset($name) && $name=="mon02") echo 'selected="selected"';?>>伊都2号機</option>
              <option value="mon03" <?php if (isset($name) && $name=="mon03") echo 'selected="selected"';?>>箱崎1号機</option>
              <option value="mon04" <?php if (isset($name) && $name=="mon04") echo 'selected="selected"';?>>箱崎2号機</option>
            </select>
               <div align="center" id="oubo_xxx">
            </div>
          </div>
            <div style="float: right; margin-top: 20px; margin-right: 45px">
                 <input type="submit" name="change" value="変更" onClick="this.select();"/>
            </div>
             
            
        </form>
            
        </div>
        
            
        
             
        </div>
        
    </body>
</html>
