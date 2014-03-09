$(document).ready(function(){
	
	if($(".enqDropIn").length > 0)
	  { 
	   $('.enqDropIn').customSelect();
	  }
	  
	if($("#mainSlider").length){
		$('#mainSlider').flexslider({
			animation: "slide",
			 slideshow: true,
			 controlNav: true
		});
	}
	if($(".categoriesSlides").length){
		/*$('.categoriesSlides').flexslider({
			animation: "slide",
			 slideshow: true
		});*/
	}
	
			
});

function show_organization(id){
	var org_name = document.getElementById('org_name'+id);
	var org_info = document.getElementById('org_info'+id);
	
	if(document.getElementById('org_info'+id).style.display == 'none'){
		document.getElementById('org_info'+id).style.display = 'block';
	} else {
		document.getElementById('org_info'+id).style.display = 'none';
	}
}

function send_newsletter(){
	var xmlhttp;
	var email = document.getElementById('last_news').value;
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	if(email !='' && filter.test(email)){
	var url = "http://rou-lindner-school.landingpages.tv/send-email/?email="+email;
		document.getElementById('span_btnlistserv').style.display='block';
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
		xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			if(xmlhttp.responseText){
				document.getElementById('span_btnlistserv').innerHTML = 'Subscribed Successfully.';
			}
		}
	  }
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
	} else {
		document.getElementById('last_news').focus();
		alert("Please enter valid email address.");
	}
}

function send_pre_newsletter(){
	var xmlhttp;
	var email = document.getElementById('pre_news').value;
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	if(email !='' && filter.test(email)){
	var url = "http://rou-lindner-school.landingpages.tv/send-email/?email="+email;
		document.getElementById('span_pre_news').style.display='block';
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
		xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			if(xmlhttp.responseText){
				document.getElementById('span_pre_news').innerHTML = 'Subscribed Successfully.';
				//alert(xmlhttp.responseText);
			}
		}
	  }
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
	} else {
		document.getElementById('pre_news').focus();
		alert("Please enter valid email address.");
	}
}

function send_sign_newsletter(){
	var xmlhttp;
	var email = document.getElementById('sign_news').value;
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	if(email !='' && filter.test(email)){
	var url = "http://rou-lindner-school.landingpages.tv/send-email/?email="+email;
		document.getElementById('span_sign_news').style.display='block';
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
		xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			if(xmlhttp.responseText){
				document.getElementById('span_sign_news').innerHTML = 'Subscribed Successfully.';
				//alert(xmlhttp.responseText);
			}
		}
	  }
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
	} else {
		document.getElementById('sign_news').focus();
		alert("Please enter valid email address.");
	}
}

function showNewsletter(val) {
	if(val){
		//location.target = "_blank";
		//location.href = val;
		window.open(val);
		
	}
}

function show_organization(val){
	if(val){
		location.href="http://rou-lindner-school.landingpages.tv/category/organization-lists/"+val;
	}
}
