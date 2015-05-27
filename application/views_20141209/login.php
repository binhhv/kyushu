

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css" />
</head>
<body>
    
    <div class="container">
        <div >
        <img src="<?php echo base_url(); ?>assets/img/head1.png" style="width: 500px; height: 40px;"/>
    </div> 
        <div class="container1">        
                    <form name="login" id="login" method="POST" action="<?php echo site_url('admin/checkLogin') ?>">
                        <div align="center">
                            <table>
                                <tr>
                                    <td　align="center">
                                        <label style="font-size: 18px">ログイン画面</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label style="font-size: 18px">ログイン</label>
                                    </td>
                                    <td>
                                        <input type="text" id="username" name="username" placeholder="ユーザ名..." autocomplete="off" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       <label style="font-size: 18px">パスワード</label>
                                            
                                    </td>
                                    <td>
                                       <input type="password" id="password" name="password" placeholder="パスワード..." autocomplete="off" />  
                                    </td>
                                </tr>
                            </table>                    
                        </div>                         
                                <div align="center" id="oubo_xxx">
                                    <input type="submit" name="login" value="ログイン" />
                                </div>
                                

                        </form>
    </div> 	
	</div>

</body>
</html>