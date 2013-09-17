<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title> <?php echo $meta_title; ?>  </title>
<link href="<?php echo base_url(); ?><?php echo base_url(); ?>images/favicon.ico" rel="icon" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">


<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700">
<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Crete+Round:400,400italic">
<link href="<?php echo base_url(); ?>css/style.css?v=1.1" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-latest.js"></script>
    <script type="text/javascript">
        $(function() {
          if ($.browser.msie && $.browser.version.substr(0,1)<7)
          {
			$('li').has('ul').mouseover(function(){
				$(this).children('ul').show();
				}).mouseout(function(){
				$(this).children('ul').hide();
				})
          }
        });        
    </script>
   <script src="<?php echo base_url(); ?>js/jquery-1.7.min.js" type="text/javascript"></script>
	<!--[if IE 6]>
		<script src="<?php echo base_url(); ?>js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script>
	<![endif]-->
	<script src="<?php echo base_url(); ?>js/jquery.jcarousel.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/functions.js" type="text/javascript"></script>
</head>

<body>
<div class="wrapper">
<div class="headerdiv">
<div class="logo"><img src="<?php echo base_url(); ?>images/logo.png" /></div>
<div class="rightdiv">
<div class="support">
	<div class="support1"><a href="<?php echo base_url(); ?>news/viewnews/10">Support</a></div>
	<div class="support1"><a href="#">Language</a></div>
    <?php if($this->session->userdata('user_login')) { ?>
    <div class="support102">Hello, <?php echo $this->session->userdata('user_name'); ?></div>
    <div class="support1"><a href="<?php echo base_url(); ?>user/logout">logout</a></div>
  
    <?php }else{ ?>
    <div class="support102"><a href="<?php echo base_url(); ?>user/registration">Create An Account</a></div>
    <div class="support1"><a href="<?php echo base_url(); ?>user/login">Login</a></div>
    <?php }?>
    
    </div>
<div class="clear"></div>
<div class="icon">
	<a target="_blank" href="https://www.facebook.com/pages/Firebird/171269243024758"><img src="<?php echo base_url(); ?>images/face.png" /></a>
    <a href="#"><img src="<?php echo base_url(); ?>images/twit.png" /></a>
    <a href=""><img src="<?php echo base_url(); ?>images/balloon.png" /></a>
    <a href="#"><img src="<?php echo base_url(); ?>images/yoytub.png" /></a>
 </div>
</div>

</div>
<!------------endheader------------------------->
<div class="clear"></div>
<div class="navigation">
<div id="naviN">

<ul id="menu">
	<li><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/home.png" /></a></li>
	<li><a href="<?php echo base_url(); ?>news/viewnews/2">About Us</a></li>
	<li>
		<a href="<?php echo base_url(); ?>browseproject">Company</a>	
	</li>
	<li>
		<a href="<?php echo base_url(); ?>browseinvestor">Investor </a>	
	</li>

	<li>
		<a href="<?php echo base_url(); ?>meeting">Events</a>	
	</li>
    <li>
		<a href="<?php echo base_url(); ?>blog">Blog</a>	
	</li>
	<li>
		<a href="<?php echo base_url(); ?>news/viewnews/7">FAQ</a>	
	</li>
    <li>
		<a href="<?php echo base_url(); ?>user/contactus">Contact</a>	
	</li>
   
</ul>

</div>
</div>
<div class="clear"></div>
<div class="mainsitediv">

