function show_organization(e){var t=document.getElementById("org_name"+e),n=document.getElementById("org_info"+e);document.getElementById("org_info"+e).style.display=="none"?document.getElementById("org_info"+e).style.display="block":document.getElementById("org_info"+e).style.display="none"}function send_newsletter(){var e,t=document.getElementById("last_news").value,n=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;if(t!=""&&n.test(t)){var r="http://rou-lindner-school.landingpages.tv/send-email/?email="+t;document.getElementById("span_btnlistserv").style.display="block";window.XMLHttpRequest?e=new XMLHttpRequest:e=new ActiveXObject("Microsoft.XMLHTTP");e.onreadystatechange=function(){e.readyState==4&&e.status==200&&e.responseText&&(document.getElementById("span_btnlistserv").innerHTML="Subscribed Successfully.")};e.open("GET",r,!0);e.send()}else{document.getElementById("last_news").focus();alert("Please enter valid email address.")}}function send_pre_newsletter(){var e,t=document.getElementById("pre_news").value,n=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;if(t!=""&&n.test(t)){var r="http://rou-lindner-school.landingpages.tv/send-email/?email="+t;document.getElementById("span_pre_news").style.display="block";window.XMLHttpRequest?e=new XMLHttpRequest:e=new ActiveXObject("Microsoft.XMLHTTP");e.onreadystatechange=function(){e.readyState==4&&e.status==200&&e.responseText&&(document.getElementById("span_pre_news").innerHTML="Subscribed Successfully.")};e.open("GET",r,!0);e.send()}else{document.getElementById("pre_news").focus();alert("Please enter valid email address.")}}function send_sign_newsletter(){var e,t=document.getElementById("sign_news").value,n=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;if(t!=""&&n.test(t)){var r="http://rou-lindner-school.landingpages.tv/send-email/?email="+t;document.getElementById("span_sign_news").style.display="block";window.XMLHttpRequest?e=new XMLHttpRequest:e=new ActiveXObject("Microsoft.XMLHTTP");e.onreadystatechange=function(){e.readyState==4&&e.status==200&&e.responseText&&(document.getElementById("span_sign_news").innerHTML="Subscribed Successfully.")};e.open("GET",r,!0);e.send()}else{document.getElementById("sign_news").focus();alert("Please enter valid email address.")}}function showNewsletter(e){e&&window.open(e)}function show_organization(e){e&&(location.href="http://rou-lindner-school.landingpages.tv/category/organization-lists/"+e)}jQuery(document).ready(function(e){e(".enqDropIn").length>0&&e(".enqDropIn").customSelect();e("#mainSlider").length&&e("#mainSlider").flexslider({animation:"slide",slideshow:!0,controlNav:!0});e(".categoriesSlides").length});