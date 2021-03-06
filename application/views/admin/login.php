<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $basepath;?>">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Wecome to Admin</title>
<link rel="stylesheet" href="public/admin/css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="public/admin/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="public/admin/js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="public/admin/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>


<script src="public/admin/js/jquery/jquery_main.js"  type="text/javascript"></script>
<script src="public/admin/js/jquery/jquery.validate.js"  type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function() {	

	var container = $('div.error-msg');
	var validator1 = $("#login_frm").validate({
	                    //FOR THIS Option You will have to use jquery.metadata.js 
	highlight:false,
	unhighlight:false,
	rules: {
		username: {
			required: true
		},
		password: {
			required: true
		}
	},
	messages: {
	   username: {
			required: "<div class='er' style='line-height:3px;padding-top:0px;'>The username field is required.</div>"
		},
		password: {
			required: "<div class='er' style='line-height:3px;padding-top:0px;'>The password field is required.</div>"			
		}
	} 
});
	 
	
});
</script>
 
</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<a href="admin"><img src="public/admin/images/shared/logo.png"  alt="" /></a>
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
    
     <form name="login_frm" id="login_frm" method="post" action="admin/login">
		<table border="0" cellpadding="0" cellspacing="0">
        <?php if(isset($err_msg_invalid)) { ?>
        	<tr>
            	<td colspan="2" align="center"><div class="er"><?php echo $err_msg_invalid; ?></div></td>	
            </tr>
        <?php } ?>
		<tr>
			<th>Username</th>
			<td><input type="text"  name="username" id="username" class="login-inp" />
            <?php if(!empty($error)) { ?> <div class="er"  >
							<?php echo form_error("username"); ?>
							 
						</div><?php } ?>
            </td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" name="password" id="password" value=""  onfocus="this.value=''" class="login-inp" />
             <?php if(!empty($error)) { ?> <div class="er">
							<?php echo form_error("password"); ?>
							 
						</div><?php } ?>
            </td>
		</tr>
		<tr>
			<th></th>
			<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Remember me</label></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="image" class="submit-login" name="sub" value="Login" /></td>
		</tr>
		</table>
        </form>
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<a href="" class="forgot-pwd">Forgot Password?</a>
 </div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td><input type="text" value=""   class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="button" class="submit-login"  /></td>
		</tr>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>
</html>