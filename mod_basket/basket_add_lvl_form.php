<?
	function BAS_show_add_lvl_form($p,$amount,$is) {
		global $HTML_begin;
		global $HTML_end;
		global $IMAGES;
		global $WORDS;
		if($is) {
			$msg = "<b>$WORDS[add_form_level_no]</b>";
		} else {
			$msg = $WORDS[add_form_level];
		}
		$size= "(".GOO_round_size($p->size).")";
		$out = $HTML_begin.'
			<table height=100% width=100% align=center cellspacing=0 cellpadding=0 border=0>
			    <tr><td align=center>'.$msg.' </td></tr>
			    <tr><td>&nbsp;</td></tr>
			    <tr><td align=center><b>'.$p->caption.'</b> '.$size.'</td></tr>
			    <tr><td>&nbsp;</td></tr>
			    <tr><td align=center><a href="#" OnClick="window.close();"><img src='.$IMAGES[btn_ok].' alt="'.$WORDS[close_window].'" border=0></a></td></tr>
			    <tr><td>&nbsp;</td></tr>
			    <tr><td align=center>'.$WORDS[automatic_close].'</td></tr>
			</table>
		'.
		$HTML_end;
		return $out;
	}

?>