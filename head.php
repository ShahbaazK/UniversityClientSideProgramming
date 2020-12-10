<script>
function lightbg_clr() {
    $('#qu').val("");
    $('#textbox-clr').text("");
    $('#search-layer').css({"width":"auto","height":"auto"});
	$('#livesearch').css({"display":"none"});
	$("#qu").focus();
 };

function fx(str)
{
    var s1=document.getElementById("qu").value;
    var xmlhttp;
    if (str.length==0) {
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.border="0px";
        document.getElementById("search-layer").style.width="auto";
        document.getElementById("search-layer").style.height="auto";
        document.getElementById("livesearch").style.display="block";
        $('#textbox-clr').text("");
        return;
    }
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
            document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
            document.getElementById("search-layer").style.width="100%";
            document.getElementById("search-layer").style.height="100%";
            document.getElementById("livesearch").style.display="block";
            $('#textbox-clr').text("X");
        }
    }
xmlhttp.open("GET","ajax_handler.php?n="+s1,true);
xmlhttp.send();
}
</script>

<div id="headdown">
	<div class="logo"><a href="Ajax.phtml">Logo</a></div>
		<div class="srbox">
			<form action="trainers.php" method="get">
			  <div class="bk">
              	<input type="text" onKeyUp="fx(this.value)" autocomplete="off" name="qu" id="qu" class="textbox" placeholder="What are you looking for ?" tabindex="1">
				<button type="button" class="textbox-clr" id="textbox-clr" onClick="lightbg_clr()()"</button>
				<button type="submit" class="query-submit" tabindex="2"><i class="fa fa-search" style="color:#727272; font-size:20px"></i></button>
		    	<div id="livesearch"></div>
   	  		  </div>
			</form>
		</div>

</div>