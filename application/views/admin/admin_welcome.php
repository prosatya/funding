<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $basepath;?>">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Admin Dashboard</title>
<link rel="stylesheet" href="public/admin/css/screen.css" type="text/css" media="screen" title="default" />
<script src="public/admin/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="public/admin/js/jquery/ui.core.js" type="text/javascript"></script>
<script src="public/admin/js/jquery/ui.checkbox.js" type="text/javascript"></script>
<!--  styled select box script version 1 -->
<script src="public/admin/js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<!-- Custom jquery scripts -->
<script src="public/admin/js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="public/admin/js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="public/admin/js/jquery/jquery.dimensions.js" type="text/javascript"></script>
</head>
<body> 
<?php echo include('header.php');?>
<div class="clear"></div>
<div id="content-outer">
<div id="content">
	<div id="page-heading">
		<h1>Dashboard</h1>
	</div>
	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="public/admin/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="public/admin/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
			<div id="content-table-inner">
				<div id="table-content">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                    <tr>
                        <th class="table-header-repeat line-left minwidth-1" colspan="2"><a>Users</a>	</th>
                        <th class="table-header-repeat line-left minwidth-1"><a >Active</a></th>
					<th class="table-header-options line-left minwidth-1"><a >Deactive</a></th>
                    <th class="table-header-repeat line-left"><a >Total</a></th>
                    </tr>
                    <tr>
                        <td colspan="2">Users</td>
                        <td ><?php if($total_active>0) { echo $total_active; } else { echo 'No user found.' ;}?></td>
                         <td ><?php if($total_deactive>0) { echo $total_deactive; }  else { echo 'No user found.' ;}?></td>
                          <td ><?php if($total>0) { echo $total; }  else { echo 'No user found.' ;}?></td>
                    </tr>
                    <tr class="alternate-row">
                         <td colspan="2">Comapny Users</td>
                       <td ><?php if($total_user_company_active > 0) { echo $total_user_company_active; }  else { echo 'No user found.' ;} ?></td>
                         <td ><?php if($total_user_company_deactive > 0) { echo $total_user_company_deactive; }  else { echo 'No user found.' ;}?></td>
                          <td ><?php if($total_company > 0) { echo $total_company; }  else { echo 'No user found.' ;}?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Investor Users</td>
                       <td ><?php if($total_user_investor_active > 0) { echo $total_user_investor_active; } else { echo 'No user found.' ;}?></td>
                         <td ><?php if($total_user_investor_deactive > 0) { echo $total_user_investor_deactive; }  else { echo 'No user found.' ;}?></td>
                          <td ><?php if($total_investore>0) { echo $total_investore; } else { echo 'No user found.' ;}?></td>
                    </tr>
                    
                     
				</table>
				
                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                    <tr>
                        <th class="table-header-repeat line-left minwidth-1" colspan="5"><a >Category</a>	</th>
                    </tr>
                    <tr>
                        <td colspan="4">Total Main Categories</td>
                        <td >5</td>
                    </tr>
                    <tr class="alternate-row">
                        <td colspan="4">Total Sub Categories</td>
                        <td >5</td>
                    </tr>
              </table>
                
                 
			</div>
			 
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<?php include('footer.php');?>
<!-- end footer -->
 
</body>
</html>