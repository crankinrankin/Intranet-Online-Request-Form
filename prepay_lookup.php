<STYLE type="text/css">
.okButton {
background-color: #D4D4D4;
font-color: #000000;
font-size: 9pt;
font-family: arial;
width: 70px;
height:	20px;  
}
.alertTitle {
background-color: red;
font-family: arial;
font-size: 9pt;
color: #FFFFFF;
font-weight: bold;
}
.alertMessage {
font-family: arial;
font-size: 9pt;
color: #000000;
font-weight: normal;
}
.alertBoxStyle {
cursor: default;
filter: alpha(opacity=90);
background-color: #E4E4E4;
position: fixed;
top: 200px;
left: 200px;
width: 200px;
height: 200px;
visibility:hidden; z-index: 999;
border-style: groove;
border-width: 5px;
border-color: #FFFFFF;
text-align: center;
}
</STYLE>
<div id="alertLayer" class=alertBoxStyle></div>
<SCRIPT LANGUAGE="JavaScript">
function BrowserCheck() {
var b = navigator.appName;
if (b == "Netscape") this.b = "NS";
else if (b == "Microsoft Internet Explorer") this.b = "IE";
else this.b = b;
this.v = parseInt(navigator.appVersion);
this.NS = (this.b == "NS" && this.v>=4);
this.NS4 = (this.b == "NS" && this.v == 4);
this.NS5 = (this.b == "NS" && this.v == 5);
this.IE = (this.b == "IE" && this.v>=4);
this.IE4 = (navigator.userAgent.indexOf('MSIE 4')>0);
this.IE5 = (navigator.userAgent.indexOf('MSIE 5')>0);
if (this.IE5 || this.NS5) this.VER5 = true;
if (this.IE4 || this.NS4) this.VER4 = true;
this.OLD = (! this.VER5 && ! this.VER4) ? true : false;
this.min = (this.NS||this.IE);
}
is = new BrowserCheck();
alertBox = (is.VER5) ? document.getElementById("alertLayer").style
: (is.NS) ? document.layers["alertLayer"]
: document.all["alertLayer"].style;

function hideAlert(){
alertBox.visibility = "hidden";}

function makeAlert(aTitle,aMessage){
document.all.alertLayer.innerHTML = "<table border=0 width=100% height=100%>" +
"<tr height=5><td colspan=4 class=alertTitle>" + " " + aTitle + "</td></tr>" +
"<tr height=5><td width=5></td></tr>" +
"<tr><td width=5></td><td width=20 align=left><img src='indexforward/bowser.png'></td><td align=center class=alertMessage>" + aMessage + "<BR></td><td width=5></td></tr>" + 
"<tr height=5><td width=5></td></tr>" +
"<tr><td width=5></td><td colspan=2 align=center><input type=button value='OK' onClick='hideAlert()' class=okButton><BR></td><td width=5></td></tr>" +
"<tr height=5><td width=5></td></tr></table>";
thisText = aMessage.length;
if (aTitle.length > aMessage.length){ thisText = aTitle.length; }

aWidth = (thisText * 5) + 80;
aHeight = 100;
if (aWidth < 150){ aWidth = 200; }
if (aWidth > 350){ aWidth = 515; }
if (thisText > 60){ aHeight = 110; }
if (thisText > 120){ aHeight = 130; }
if (thisText > 180){ aHeight = 150; }
if (thisText > 240){ aHeight = 170; }
if (thisText > 300){ aHeight = 210; }
if (thisText > 360){ aHeight = 210; }
if (thisText > 420){ aHeight = 230; }
if (thisText > 490){ aHeight = 250; }
if (thisText > 550){ aHeight = 270; }
if (thisText > 610){ aHeight = 290; }

alertBox.width = aWidth;
alertBox.height = aHeight;
alertBox.left = (document.body.clientWidth - aWidth)/2;
alertBox.top = (document.body.clientHeight - aHeight)/2;

alertBox.visibility = "visible";
}

function includeCSS(p_file) {
	var v_css  = document.createElement('link');
	v_css.rel = 'stylesheet'
	v_css.type = 'text/css';
	v_css.href = p_file;
	document.getElementsByTagName('head')[0].appendChild(v_css);
}
	function loadXMLDoc(url) // AJAX CODE BY CLINT
		{
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		account = document.getElementById('TextBox1_Name').value;
		xmlhttp.open("GET",url+"?account="+account,false);
		xmlhttp.send(null);
		//blank = "";
		document.getElementById('TextBox1_Name').innerHTML=xmlhttp.responseText;
		flagged = xmlhttp.responseText;
		//alert(flagged);
		//document.getElementById('finished').innerHTML=blank;
		//prepay = document.getElementById('updated').value;
		//prepay = document.getElementById('updated').innerHTML;
		if (flagged != ""){
		makeAlert("Dash is Looking Out for You!" , "<font color='red'>This customer <b>(Account: " + account + ") </b> is set up in DDMS with at least one department designated as a PrePay.<br/> In the 'Additional Notes' section tell us if this user should be set to <br/>Option 1) <u>'always charge to a credit card'</u><br/>Option 2) <u>'always charge to account'.</u></font>");
		//alert("<font color='red'>This customer <b>(Account:) /b> is set up in DDMS with at least one department designated as a PrePay.<br/> Please contact Clint Immediately after sending this form to let him know if this user should be set to <u>always charge to a credit card</u> or always <u>charge to their account</u>'./font>");
			}
		
		}
	</script>