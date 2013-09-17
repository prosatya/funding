<?php
 
  $currentFile = $_SERVER["REQUEST_URI"];
  $parts =explode('/', $currentFile);
   $currentFile = $parts[count($parts) - 1];
   $currentFile1 = $parts[count($parts) - 2];
   # if($currentFile1) 
 
 #A PHP Error was encounteredSeverity: NoticeMessage: Undefined variable: edit_eventFilename: admin/header.phpLine Number: 83

?>
<div id="page-top-outer">    
<!-- Start: page-top -->
<div id="page-top">
	<!-- start logo -->
	<div id="logo">
	<a href=""><img src="public/admin/images/shared/logo.png"   alt="" /></a>
	</div>
	<!-- end logo -->
	<!--  start top-search -->
	<!--<div id="top-search">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td><input type="text" value="Search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>
		<td>
		<select  class="styledselect">
			<option value=""> All</option>
			<option value=""> Products</option>
			<option value=""> Categories</option>
			<option value="">Clients</option>
			<option value="">News</option>
		</select> 
		</td>
		<td>
		<input type="image" src="public/admin/images/shared/top_search_btn.gif"  />
		</td>
		</tr>
		</table>
	</div>-->
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<div class="clear">&nbsp;</div>

<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
			
			 
			<a href="admin/logout" id="logout"><img src="public/admin/images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
			
		
		</div>
		<!-- end nav-right -->
<?php 
 $cuurent='current';
  $select_sub_show='select_sub show';
  $sub_show='sub_show';
  $class='';  
?>

		<!--  start nav -->
		<div class="nav">
		<div class="table">
		<?php if($currentFile=='dashboard') { ?>  <ul class="current">  <?php } else {  ?><ul class="select"> <?php } ?>
		<li><a href="admin/dashboard"><b>Dashboard</b> </a> 
		 
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<?php if($currentFile=='user_details' || $currentFile=='category_details'  || $currentFile=='project_details'  || $currentFile=='page_list'  || $currentFile=='event_view'  || $currentFile1=='details'  || $currentFile1=='edit_user'  || $currentFile1=='view_category'  || $currentFile1=='view_project'  || $currentFile1=='edit_project'  || $currentFile1=='edit_category'  || $currentFile1=='view_page'  || $currentFile1=='edit_page'  || $currentFile1=='event_details'  || $currentFile1=='edit_event' ||  $currentFile1=='invite_user' || $currentFile=='add_event' || $currentFile=='add_project' || $currentFile=='add_page' || $currentFile=='contactus_details' || $currentFile1=='contact_view' || $currentFile=='company_details' || $currentFile1=='company_view' || $currentFile1=='edit_company' || $currentFile=='investor_details' || $currentFile1=='investor_view' || $currentFile1=='edit_investor') {  $select_sub_show='select_sub show';
   ?>  <ul class="current">  <?php } else { $select_sub_show='sub_show'; ?><ul class="select"> <?php } ?>
         
        
        <li><a href="admin/user_details"><b>Manage</b> </a> 
		<div class="<?php echo $select_sub_show; ?>">
			<?php if($currentFile!='dashboard') { ?>
            <ul class="sub">
				<?php if($currentFile=='user_details' || $currentFile1=='details' || $currentFile1=='edit_user' ) { ?> <li class="sub_show" ><?php } else { ?> <li> <?php } ?><a href="admin/user_details">User</a></li>
				<?php if($currentFile=='category_details' || $currentFile1=='view_category' || $currentFile1=='edit_category' ) { ?> <li class="sub_show" ><?php } else { ?> <li> <?php } ?><a href="admin/category_details">Category</a></li>
				<?php if($currentFile=='project_details' || $currentFile1=='view_project' || $currentFile1=='edit_project' || $currentFile=='add_project'  ) { ?> <li class="sub_show" ><?php } else { ?> <li> <?php } ?><a href="admin/project_details">Projects</a></li>
                <?php if($currentFile=='page_list' || $currentFile1=='view_page' || $currentFile1=='edit_page' || $currentFile=='add_page') { ?> <li class="sub_show" ><?php } else { ?> <li> <?php } ?><a href="admin/page_list">Pages</a></li>
                 <?php if($currentFile=='event_view' || $currentFile1=='invite_user' || $currentFile1=='event_details' || $currentFile1=='edit_event' || $currentFile=='add_event') { ?> <li class="sub_show" ><?php } else { ?> <li> <?php } ?><a href="admin/event_view">Event</a></li>
                 <?php if($currentFile=='contactus_details' || $currentFile1=='contact_view' ) { ?> <li class="sub_show" ><?php } else { ?> <li> <?php } ?><a href="admin/contactus_details">ContactUs</a></li>
                 
                 <?php if($currentFile=='company_details' || $currentFile1=='company_view' || $currentFile1=='edit_company' ) { ?> <li class="sub_show" ><?php } else { ?> <li> <?php } ?><a href="admin/company_details">Comapny</a></li>
                 
                  <?php if($currentFile=='investor_details' || $currentFile1=='investor_view' || $currentFile1=='edit_investor' ) { ?> <li class="sub_show" ><?php } else { ?> <li> <?php } ?><a href="admin/investor_details">Investor</a></li>
                 
			</ul>
            <?php } ?>
		</div>
		 
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
	 
</div>
<div class="clear"></div>
 </div>