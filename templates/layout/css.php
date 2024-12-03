<!-- Css Files -->

<?php

$css->set("css/animate.min.css");

$css->set("bootstrap/bootstrap.css");

$css->set("fontawesome512/all.css");

$css->set("confirm/confirm.css");

$css->set("holdon/HoldOn.css");

$css->set("holdon/HoldOn-style.css");

$css->set("mmenu/mmenu.css");

$css->set("fancybox3/jquery.fancybox.css");

$css->set("fancybox3/jquery.fancybox.style.css");

$css->set("css/account.css");

$css->set("css/cart.css");

$css->set("photobox/photobox.css");

$css->set("slick/slick.css");

$css->set("slick/slick-theme.css");

$css->set("slick/slick-style.css");

$css->set("fotorama/fotorama.css");

$css->set("fotorama/fotorama-style.css");

$css->set("magiczoomplus/magiczoomplus.css");

//$css->set("datetimepicker/jquery.datetimepicker.css");

$css->set("owlcarousel2/owl.carousel.css");

$css->set("owlcarousel2/owl.theme.default.css");

$css->set("simplenotify/simple-notify.css");

//$css->set("fileuploader/font-fileuploader.css");

//$css->set("fileuploader/jquery.fileuploader.min.css");

//$css->set("fileuploader/jquery.fileuploader-theme-dragdrop.css");

$css->set("comment/comment.css");

//$css->set("js/swiper/swiper.min.css");

$css->set("css/style.css");

$css->set("css/responsive.css");

echo $css->get();

?>



<!-- Background -->

<?php

$bgbody = $d->rawQueryOne("select status, options, photo from #_photo where act = ? and type = ? limit 0,1", array('photo_static', 'background'));



if (!empty($bgbody['status']) && strstr($bgbody['status'], 'hienthi')) {

    $bgbodyOptions = json_decode($bgbody['options'], true)['background'];

    if ($bgbodyOptions['type_show']) {

        echo '<style type="text/css">body{background: url(' . UPLOAD_PHOTO_L . $bgbody['photo'] . ') ' . $bgbodyOptions['repeat'] . ' ' . $bgbodyOptions['position'] . ' ' . $bgbodyOptions['attachment'] . ' ;background-size:' . $bgbodyOptions['size'] . '}</style>';

    } else {

        echo ' <style type="text/css">body{background-color:#' . $bgbodyOptions['color'] . '}</style>';

    }

}

?>



<!-- Js Google Analytic -->

<?= htmlspecialchars_decode($setting['analytics']) ?>



<!-- Js Head -->

<?= htmlspecialchars_decode($setting['headjs']) ?>


<script id="wpcp_disable_selection" type="text/javascript">
//<![CDATA[
var image_save_msg='You Can Not Save images!';
	var no_menu_msg='Context Menu disabled!';
	var smessage = "Content is protected !!";

function disableEnterKey(e)
{
	if (e.ctrlKey){
     var key;
     if(window.event)
          key = window.event.keyCode;     //IE
     else
          key = e.which;     //firefox (97)
    //if (key != 17) alert(key);
     if (key == 97 || key == 65 || key == 67 || key == 99 || key == 88 || key == 120 || key == 26 || key == 85  || key == 86 || key == 83 || key == 43)
     {
          if(wccp_free_iscontenteditable(e)) return true;
		  show_wpcp_message('You are not allowed to copy content or view source');
          return false;
     }else
     	return true;
     }
}

function disable_copy(e)
{	
	var elemtype = e.target.nodeName;
	var isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
	elemtype = elemtype.toUpperCase();
	var checker_IMG = '';
	if (elemtype == "IMG" && checker_IMG == 'checked' && e.detail >= 2) {show_wpcp_message(alertMsg_IMG);return false;}
	if (elemtype != "TEXT" && elemtype != "TEXTAREA" && elemtype != "INPUT" && elemtype != "PASSWORD" && elemtype != "SELECT" && elemtype != "OPTION" && elemtype != "EMBED")
	{
		if (smessage !== "" && e.detail == 2)
			show_wpcp_message(smessage);
		
		if (isSafari)
			return true;
		else
			return false;
	}	
}
var timeout_result;
function show_wpcp_message(smessage)
{
	if (smessage !== "")
		{
		var smessage_text = '<span>Alert: </span>'+smessage;
		document.getElementById("wpcp-error-message").innerHTML = smessage_text;
		document.getElementById("wpcp-error-message").className = "msgmsg-box-wpcp warning-wpcp showme";
		clearTimeout(timeout_result);
		timeout_result = setTimeout(hide_message, 3000);
		}
}
function hide_message()
{
	document.getElementById("wpcp-error-message").className = "msgmsg-box-wpcp warning-wpcp hideme";
}
function disable_copy_ie()
{
	var elemtype = window.event.srcElement.nodeName;
	elemtype = elemtype.toUpperCase();
	if (elemtype == "IMG") {show_wpcp_message(alertMsg_IMG);return false;}
	if (elemtype != "TEXT" && elemtype != "TEXTAREA" && elemtype != "INPUT" && elemtype != "PASSWORD" && elemtype != "SELECT" && elemtype != "OPTION" && elemtype != "EMBED")
	{
		//alert(navigator.userAgent.indexOf('MSIE'));
			//if (smessage !== "") show_wpcp_message(smessage);
		return false;
	}
}	
function reEnable()
{
	return true;
}
document.onkeydown = disableEnterKey;
document.onselectstart = disable_copy_ie;
if(navigator.userAgent.indexOf('MSIE')==-1)
{
	document.onmousedown = disable_copy;
	document.onclick = reEnable;
	//$("#wpcp-error-message").addClass('showme');
}
function disableSelection(target)
{
    //For IE This code will work
    if (typeof target.onselectstart!="undefined")
    target.onselectstart = disable_copy_ie;
    
    //For Firefox This code will work
    else if (typeof target.style.MozUserSelect!="undefined")
    {target.style.MozUserSelect="none";}
    
    //All other  (ie: Opera) This code will work
    else
    target.onmousedown=function(){return false}
    target.style.cursor = "default";
}
//Calling the JS function directly just after body load
window.onload = function(){disableSelection(document.body);};
//]]>
</script>
	<script id="wpcp_disable_Right_Click" type="text/javascript">
	//<![CDATA[
	document.ondragstart = function() { return false;}
	/* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	Disable context menu on images by GreenLava Version 1.0
	^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */
	    function nocontext(e) {
	       return false;
	    }
	    document.oncontextmenu = nocontext;
	//]]>
</script>