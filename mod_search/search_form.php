<?

	function SEA_make_form() {
		global $DESIGN;
		global $WORDS;
		global $CONTENT;
		global $HTTP_GET_VARS;
		if(!$HTTP_GET_VARS[words]) {
			$sig		='checked';
			$am_sel[2]	='selected';
		}

		if($HTTP_GET_VARS[amount]==1)	{ $am_sel[1]='selected'; }
		if($HTTP_GET_VARS[amount]==2)	{ $am_sel[2]='selected'; }
		if($HTTP_GET_VARS[amount]==3)	{ $am_sel[3]='selected'; }
		if($HTTP_GET_VARS[amount]==4)	{ $am_sel[4]='selected'; }
		if($HTTP_GET_VARS[logic]==1)	{ $am_log[1]='selected'; } else
						{ $am_log[0]='selected'; }
		if($HTTP_GET_VARS[search_in_news]   ) { $sin='checked'; }
		if($HTTP_GET_VARS[search_in_authors]) { $sia='checked'; }
		if($HTTP_GET_VARS[search_in_goods]  ) { $sig='checked'; }

		$CONTENT[search] =
'
<form name="search">
<input type="hidden" name="user" value="search">
<table width=100% cellspacing=0 cellpadding=0 border=0>
<tr>
    <td align=right>'.$WORDS[search_words].':&nbsp; <input type="text" name="words" '.$DESIGN[textbox_search].' value="'.$HTTP_GET_VARS[words].'"></td>
</tr>
<tr>
    <td align=right>'.$WORDS[search_results_per_page].'&nbsp; 
		<select name="amount" '.$DESIGN[search].'>
		<option value=1 '.$am_sel[1].'> &nbsp; &nbsp;10 </option>
		<option value=2 '.$am_sel[2].'> &nbsp; &nbsp;30 </option>
		<option value=3 '.$am_sel[3].'> &nbsp; &nbsp;50 </option>
		<option value=4 '.$am_sel[4].'> &nbsp; &nbsp;100 </option>
		</select>
</td>
</tr>
<tr>
    <td align=right>'.$WORDS[search_logic].':&nbsp; 
		<select name="logic" '.$DESIGN[search].'>
		<option value=0 '.$am_log[0].'>ιμι</option>
		<option value=1 '.$am_log[1].'>ι</option>
		</select>
</td>
</tr><tr>
    <td align=right>'.$WORDS[search_in_goods].':&nbsp; <input type="checkbox" name="search_in_goods" '.$sig.'></td>
</tr>
<tr>
    <td align=right>'.$WORDS[search_in_news].':&nbsp; <input type="checkbox" name="search_in_news" '.$sin.'></td>
</tr>
<tr>
    <td align=right>'.$WORDS[search_in_authors].':&nbsp; <input type="checkbox" name="search_in_authors" '.$sia.'></td>
</tr>
<tr>
    <td align=right><a href="javascript:document.forms[\'search\'].submit()"><img src="images/s1/btn_search.gif" border=0></a></td>
</tr>

</table>
</form>

';

	}

?>