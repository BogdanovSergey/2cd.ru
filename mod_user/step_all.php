<?


	$search_menu = "&nbsp;<input type=\"text\" $DESIGN[textbox_head_search]
			 name=\"words\"
			 value=\"$WORDS[search_site_search]\"
			 onFocus=\"if(this.value=='$WORDS[search_site_search]') {this.value='';}\">
			 <a href=\"javascript:if(document.forms['search_form'].words.value != '$WORDS[search_site_search]')
			 { document.location='?user=search&words='+document.forms['search_form'].words.value+'&search_in_goods=on'; }\"
			 onMouseOver=\"window.status='$WORDS[search_site_search]';\">
			<img src=\"$IMAGES[search]\" border=0></a>";
	$i=1;
	foreach($USER_BUTTONS as $key => $value) {
		if($i != count($USER_BUTTONS)) { $tail = ' |'; } else { $tail = ''; }
	 	if($key == $HTTP_GET_VARS[user]) {
			$PARTS[header_bottom] .= " <b>$value[0]</b>".$tail; }
		else {
			if(!$HTTP_GET_VARS[user] && $key=='main') {
				$PARTS[header_bottom] .= " <b>$value[0]</b>".$tail; }
			else { $PARTS[header_bottom]  .= " <a href=\"?user=$key\">$value[0]</a>".$tail; }
		}
		$i++;
	}
	$PARTS[header_bottom] = "<form name=\"search_form\">".
				"<input type=\"hidden\" name=\"user\" value=\"search\">".
				"<input type=\"hidden\" name=\"search_in_goods\" value=\"on\">".
				"<table cellspacing=0 cellpadding=0 border=0 width=100%><tr valign=bottom><td>$search_menu</td>".
				'<td valign="bottom" align="center">&nbsp;<br>'.$PARTS[header_bottom].'</td></tr></table></form>';









?>
