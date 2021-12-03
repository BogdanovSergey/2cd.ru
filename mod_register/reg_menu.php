<?
	function REG_show_auth_form() {
		global $WORDS;
		global $DESIGN;
		global $SESSION;
		global $ORDER_INFO;
		global $HTTP_GET_VARS;
		global $HTTP_POST_VARS;
		global $CURRENT_POSITION;
		$MYINFO = USE_get_user_info();
		USE_refresh_order();

		#$all_amount = "$WORDS[user_items_in_bask] $ORDER_INFO[items]";
		$out = "<b><center>$WORDS[user_alertinfo]</b><br>";
		if(!$SESSION[is_open]) {
			
			if($MYINFO[authorized]) {
				$out .= "$WORDS[user_ok]<br>";
			} else {
				$out .= "$WORDS[user_notok]<br>";
			}
		} else {
			$out = "<center>$WORDS[hello_user] $MYINFO[first_name]!</center><br>".$out;
			if($MYINFO[authorized]) {
				$userok=1;
				$out .= "$WORDS[user_ok]<br>";
			} else {
				$out .= "$WORDS[user_notok]<br>";
			}
		}
		if($CURRENT_POSITION != 'basket') {
			$goto_basket = "<tr><td colspan=2 align=center>&nbsp;<br><a href=\"?user=basket\">$WORDS[goto_basket]</a></td></tr>";
		}
		#$round_size = ;
		$out .= "<br><table border=0 cellpadding=0 cellspacing=0 width=90%>".
			"<tr><td colspan=2 align=center><b>$WORDS[user_basket]</b></td></tr>".
			"<tr><td>$WORDS[user_basketsize]</td>	<td><b>".GOO_round_size($ORDER_INFO[size])."</b></td></tr>".
			"<tr><td>$WORDS[user_amount_disks]</td>	<td><b>$ORDER_INFO[disks]</b></td></tr>".
			"<tr><td>$WORDS[user_ready_price]</td>	<td><b>$ORDER_INFO[price] $WORDS[RUB]</b></td></tr>".
			$goto_basket.
			"</table>";
		$out .='</center>';

		if (!$userok) {
		    # point user to "order filling" place if he wants
		    if($CURRENT_POSITION=='basket' && ($HTTP_GET_VARS[order] || $HTTP_POST_VARS[order])) {
			    $pointer = '<input type="hidden" name="order" value="1">';
		    }
		
		    $out .=
'<hr width=99% align=center>
<form method="POST" name="auth">
'.$pointer.'
<table border=0 cellpadding=0 cellspacing=0 align=center>
<tr align=center>
	<td><b>'.$WORDS[user_enter].'</b></td>
	</tr>
<tr align=right>
	<td>'.$WORDS[global_login]. ': <input type="text" name="i1"
					value="'.$WORDS[reg_default_email].'"
					onFocus="if(this.value==\''.$WORDS[reg_default_email].'\') {this.value=\'\';}"
					'.$DESIGN[textbox_auth].'> &nbsp;</td>
	</tr>
<tr align=right>
	<td>'.$WORDS[global_passwd].': <input type="password" name="i2"
					value="password"
					onFocus="if(this.value==\'password\') {this.value=\'\';}"
					'.$DESIGN[textbox_auth].'> &nbsp;</td>
	</tr>
<tr align=right>
	<td><a href="javascript:document.forms[\'auth\'].submit();" OnMouseOver="window.status=\'\';"><img src="images/s1/btn_enter.gif" border=0></a> &nbsp;</td>
</tr>
<tr align=right>
	<td><a href="javascript:
	    if( document.forms[\'auth\'].i1.value.length != 0 &&
		document.forms[\'auth\'].i1.value	 != \''.$WORDS[reg_default_email].'\' &&
		document.forms[\'auth\'].i1.value.indexOf(\'@\') != -1	&&
		document.forms[\'auth\'].i1.value.indexOf(\'.\') != -1) {
		    alert(\'reminding\');
		    document.location=\'?user=remind&email=\'+document.forms[\'auth\'].i1.value;
	    } else {
		    email = prompt(\'put\');
		    if(email.length>=5 && email !=\'undefined\') {
			document.location=\'?user=remind&email=\'+email;
		    }
	    }
	" OnMouseOver="window.status=\'\';">'.$WORDS[forget_password].'</a>&nbsp;</td>
</tr>
</table>
</form>
';
		}
		$out .= "<br>";
		return $out;
	}
# onBlur="if(this.value==\'\') {this.value=\'ÅÍÜÊÌ@ÅÍÜÊÌ.ru\';}"
# onBlur="if(this.value==\'\') {this.value=\'password\';}"

?>