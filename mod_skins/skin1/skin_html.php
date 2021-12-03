<?

	if($ADMIN_CONNECTED)	$adv_js		= '<script src="func.js.php"></script>';
	if(!$TITLE) 		$TITLE		= $WORDS[title_simple];
	if(!$DESCRIPTION)	$DESCRIPTION 	= $WORDS[description_simple];
	if(!$KEYWORDS)		$KEYWORDS	= $WORDS[keywords_simple];
	if($BODY_ONLOAD)	{$BODY_ONLOAD	= " onLoad=\"$BODY_ONLOAD\"";
				 $more_func	= 'function close_win() {tid = setTimeout("window.close();",1000);}'; }

	$HTML_begin =
'<html>
<head>
<title>'.$TITLE.'</title>
<meta http-equiv="Content-Type" content="text/html; charset='.$WORDS[meta_charset].'">
<meta http-equiv="Content-Language" content="'.$WORDS[meta_language].'">
<meta HTTP-EQUIV="Pragma" content="no-cache">
<meta name="Robots" content="'.$WORDS[meta_robots].'">
<meta name="revisit-after" content="10days"> 
<meta name="Description" content="'.$DESCRIPTION.'">
<meta name="Keywords" content="'.$KEYWORDS.'">
<link rel="SHORTCUT ICON" href="'.$MY[www].'/favicon.ico">
<link rel="StyleSheet" type="text/css" href="'.$CSS_SRC.'">
<script src="func.js"></script>
'.$adv_js."
<script>
    function wstatus() 	 {window.status='$MY[goods_add_alt]';}
    function wstatuslvl(){window.status='$MY[level_add_alt]';}
    function cstatus()	 {window.status='';}
    $more_func
</script>
".'
</head>
<body bgcolor="#ffffff" link="#000ff" vlink="#0000ff"'.$BODY_ONLOAD.'>
';

	if($CURRENT_POSITION) $copy = "<font class=COPY><center>$WORDS[copyright]</center></font>";
	$HTML_end = 
"
$copy
</body>
</html>
";

?>
