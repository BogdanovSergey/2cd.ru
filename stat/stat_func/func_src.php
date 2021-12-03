<?

	function HTML_setup_counter($zone) {
		global $MY;
		global $HTML_COUNTER;
		global $HTTP_SERVER_VARS;
        	if(!$zone){$zone=1;}
        	$HTML_COUNTER ='
<!-- SiteSpy -->
<script language="javascript">
zone='.$zone.';
n=navigator;d=document;s=screen;d.cookie="c=c";Cc=0;if(d.cookie)Cc=1;
t=(new Date()).getTimezoneOffset();b=n.appName;p=n.cpuClass;l=n.browserLanguage;
js=\'1.0\';j=(n.javaEnabled())?1:0;ty=(n.appName.substring(0,2)=="Mi")?0:1;
de =(ty==0)?s.colorDepth:s.pixelDepth;h=\''.$MY[www].'\';h1 =\'/stat/\';
cf=\''.$HTTP_SERVER_VARS['HTTP_REFERER'].'\';
str=\'?z=\'+zone+\'&c=\'+Cc+\'&t=\'+t+\'&b=\'+b+\'&l=\'+l+\'&p=\'+p+\'&j=\'+j+\'&r=\'+s.width+\'x\'+s.height+\'&de=\'+de+\'&cf=\'+cf;
</script><script language="javascript1.1">js=\'1.1\';</script><script language="javascript1.2">js=\'1.2\';
</script><script language="javascript1.3">js=\'1.3\';</script><script language="javascript">
document.write(\'<i\'+\'mg hei\'+\'ght=1 wid\'+\'th=1 s\'+\'rc="\'+h+h1+str+\'&js=\'+js+\'&h=\'+escape(window.location.href)+\'">\');
</script><noscript><img src="'.$MY[www].'/stat/?js=0" border=0 width=1 height=1></noscript>
<!--  -->
';
	}





?>
