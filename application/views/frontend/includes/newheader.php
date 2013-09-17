<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title> <?php echo $meta_title; ?>  </title>
<link href="<?php echo base_url(); ?><?php echo base_url(); ?>images/favicon.ico" rel="icon" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">


<link href='http://fonts.googleapis.com/css?family=Carme' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="<?php echo base_url(); ?>js//jquery-latest.js"></script>
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
<div class="support1"><a href="#">Support</a></div>
<div class="support1"><a href="#">Language</a></div>

 <?php if($this->session->userdata('user_login')) { ?>
          <div class="links">My Account
            <ul>
              <li><a href="#">Notifications <b> (1)</b></a> </li>
               <?php if($this->session->userdata('user_type') == "company") { ?>
                  <li><a href="<?php echo base_url().'project/addnew' ?>">Add New Project</a></li>
               <?php  } ?> 
              <li><a href="<?php echo base_url().'user/editProfile'; ?>">My Profile</a></li>
              <li><a href="#">Edit Settings</a></li>
              <li><a href="<?php echo base_url().'user/changePassword'; ?>">Change Password</a></li>
              <li><a href="<?php echo base_url().'user/logout'; ?> ">Logout</a></li>
            </ul>
          </div>

          <?php } else{ ?>
                 <a href=" <?php echo base_url().'user/login' ; ?>">login</a>
                 <a href=" <?php echo base_url().'user/registration' ; ?> ">create an account</a>
           <?php } ?>
       </div>
   

<div class="clear"></div>
<div class="icon"><a href="#"><img src="<?php echo base_url(); ?>images/face.png" /></a><a href="#"><img src="<?php echo base_url(); ?>images/twit.png" /></a><img src="<?php echo base_url(); ?>images/balloon.png" /><a href="#"><img src="<?php echo base_url(); ?>images/yoytub.png" /></a></div>
</div>

</div>
<!------------endheader------------------------->
<div class="clear"></div>
<div class="navigation">
<div id="naviN">

<ul id="menu">
	<li><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/home.png" /></a></li>
	<li><a href="#">About Us</a></li>
	<li><a href="#">Showcase</a></li>
	<li>
		<a href="#">Browse Projects</a>	
	</li>
	<li>
		<a href="#">FAQ,</a>	
	</li>
    <li>
		<a href="#">Events</a>	
	</li>
    <li>
		<a href="#">Blog</a>	
	</li>
    <li>
		<a href="#">Investor </a>	
	</li>
    <li>
		<a href="#">Contact</a>	
	</li>
   
</ul>

</div>
</div>
<div class="clear"></div>
<div class="mainsitediv">

