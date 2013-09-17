function getHTTPObject(){ 
	var xmlhttp; 
	if(window.XMLHttpRequest){ 
    	xmlhttp = new XMLHttpRequest(); 
	}else if (window.ActiveXObject){ 
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
	  	if (!xmlhttp){ 	
			xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
		} 
  } 
  return xmlhttp; 
}

var gbl_divid, busy;
var anim_duration=300;

/**********************************************************************/
/***************** To change status of faction starts *****************/
function change_status(user_id, status_var)
{
	
	gbl_divid="st"+user_id;
	change_st_http=getHTTPObject();
	page_url="admin/change_status/"+user_id+'-'+status_var;	
	
	change_st_http.open("GET",page_url,true);
	change_st_http.onreadystatechange=change_st_user_result;
	change_st_http.send(null);
}

function change_status_book(book_id, status_var)
{
	
	gbl_divid="st"+book_id;
	change_st_http=getHTTPObject();
	page_url="admin/change_book_status/"+book_id+'-'+status_var;	
	
	change_st_http.open("GET",page_url,true);
	change_st_http.onreadystatechange=change_st_user_result;
	change_st_http.send(null);
}



function change_st_user_result()
{
	if (change_st_http.readyState==4)
	{ 
		document.getElementById(gbl_divid).innerHTML= change_st_http.responseText;
		$('#'+gbl_divid).animate({opacity: 1}, anim_duration,'easeIn',function(){busy=false;});
	}
}
/***************** To change status of faction ends *****************/
/********************************************************************/

/*******************************************************************/
/***************** To change status of user starts *****************/
function change_st_user(rec_id, status_var)
{
	gbl_divid="st"+rec_id;
	change_st_http=getHTTPObject();
	page_url="admin_users/change_status/"+rec_id+'-'+status_var;	
	change_st_http.open("GET",page_url,true);
	change_st_http.onreadystatechange=change_st_user_result;
	change_st_http.send(null);
}
function change_st_user_result()
{
	if (change_st_http.readyState==4)
	{ 
		document.getElementById(gbl_divid).innerHTML= change_st_http.responseText;
		$('#'+gbl_divid).animate({opacity: 1}, anim_duration,'easeIn',function(){busy=false;});
	}
}
/***************** To change status of user ends *****************/
/*****************************************************************/

/*********************************************************************/
/***************** To change status of stance starts *****************/
function change_st_stance(rec_id, status_var)
{
	gbl_divid="st"+rec_id;
	change_st_http=getHTTPObject();
	page_url="admin_deals/change_status/"+rec_id+'-'+status_var;	
	change_st_http.open("GET",page_url,true);
	change_st_http.onreadystatechange=change_st_stance_result;
	change_st_http.send(null);
}
function change_st_stance_result()
{
	if (change_st_http.readyState==4)
	{ 
		document.getElementById(gbl_divid).innerHTML= change_st_http.responseText;
		$('#'+gbl_divid).animate({opacity: 1}, anim_duration,'easeIn',function(){busy=false;});
	}
}
/***************** To change status of stance ends *****************/
/*******************************************************************/