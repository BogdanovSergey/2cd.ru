<?
	function REG_results_form() {
		global $WORDS;
		global $COLORS;
		global $IMAGES;
		global $SESSION;
		return '
<table border=0 width=100% cellpadding=0 cellspacing=0>
	<tr><td align=left colspan=3>
	<img src="'.$IMAGES[empty_center_panel][0].'"><img src="'.$IMAGES[empty_center_panel][1].'"
		height=22 width=280><img src="'.$IMAGES[empty_center_panel][2].'">
	</td></tr>
	<tr><td bgcolor="'.$COLORS[admin_goods_ark].'" valign=top>
 		<table border=0 align=center cellpadding=2 cellspacing=1 width=100%>
		<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td colspan=2>'.$WORDS[register_thankyou].'</td></tr>
 		</table>
	</td></tr>
</table>
<br>
';
	}

	function REG_form1($before_order) {
		global $TMP_MSG;
		global $ORDER;
		global $WORDS;
		global $COLORS;
		global $DESIGN;
		global $IMAGES;
		global $HTTP_POST_VARS;
		global $CURRENT_POSITION;
		if($CURRENT_POSITION=='basket') {
		    $w = '442';
		    $agreement = $TMP_MSG.$WORDS[reg_agreement_order];
		} else {
		    $w = '280';
		    $agreement = $TMP_MSG.$WORDS[reg_agreement];
		}
		# "year" select menu"
/*		if(!$HTTP_POST_VARS[by] || $HTTP_POST_VARS[by]==0) {
			 $by = '<option value=0 selected>no</option>';
			} else { $by = '<option value=0>no</option>'; }
			for($i=99;$i>19;$i--) {
				$y   = 1900+$i;
				$sel = '';
				if($HTTP_POST_VARS[by]==$y) { $sel=' selected';  } 
				$by .= "<option value=\"$y\"$sel>$y</option>\n"; }

		# "month" select menu"
		if(!$HTTP_POST_VARS[bm] || $HTTP_POST_VARS[bm]==0) {
			 $bm = '<option value=0 selected>no</option>';
			} else { $bm = '<option value=0>no</option>'; }
			for($i=1;$i<13;$i++) {
				$sel = '';
				if($HTTP_POST_VARS[bm]==$i) { $sel=' selected';  } 
				$bm .= "<option value=\"$i\"$sel>$i</option>\n"; }

		# "day" select menu"
		if(!$HTTP_POST_VARS[bd] || $HTTP_POST_VARS[bd]==0) {
			 $bd = '<option value=0 selected>no</option>';
			} else { $bd = '<option value=0>no</option>'; }
			for($i=1;$i<32;$i++) {
				$sel = '';
				if($HTTP_POST_VARS[bd]==$i) { $sel=' selected';  }
				$bd .= "<option value=\"$i\"$sel>$i</option>\n"; }
*/
		if($HTTP_POST_VARS[news]=='on')	$news_check = ' checked';
		if(!$HTTP_POST_VARS[regstep]) 	$news_check = ' checked';
#		if($HTTP_POST_VARS[org]=='1')	$org1_check = ' checked';
#		if($HTTP_POST_VARS[org]=='2')	$org2_check = ' checked';
#		if($HTTP_POST_VARS[sex]=='1')	$sex1_check = ' checked';
#		if($HTTP_POST_VARS[sex]=='2')	$sex2_check = ' checked';

		# is this simple registration or user trying to make an order?
		if($before_order) {
			$hid = '<input type="hidden" name="user" value="basket">';
			$hid .='<input type="hidden" name="order" value="1">'; }
		else {
			$hid = '<input type="hidden" name="user" value="register">'; }
		$r_col = $COLORS[admin_table_succession][0];
return '
<table border=0 width=100% cellpadding=0 cellspacing=0>
	<tr><td align=left colspan=3>
	<img src="'.$IMAGES[panel_reg].'"><img src="'.$IMAGES[empty_center_panel][1].'"
		height=22 width='.$w.'><img src="'.$IMAGES[empty_center_panel][2].'">
	</td></tr>
	<tr><td bgcolor="'.$COLORS[admin_goods_ark].'" valign=top>
 		<table border=0 align=center cellpadding=2 cellspacing=1 width=100%>
<form method="POST" name="reg1">
'.$hid.'
<input type="hidden" name="regstep" value="1">
<tr bgcolor="'.$r_col.'"><td colspan=2 align=left>'.$agreement.'</td></tr>
<tr bgcolor="'.$r_col.'"><td><b>'.$WORDS[reg_fname].'</b></td>		<td><input type="text" name="fname" value="'.$HTTP_POST_VARS[fname].'" '.$DESIGN[textbox_reg].'> <font color="red">*</font></td></tr>
<tr bgcolor="'.$r_col.'"><td>'	 .$WORDS[reg_lname].'</td>		<td><input type="text" name="lname" value="'.$HTTP_POST_VARS[lname].'" '.$DESIGN[textbox_reg].'></td></tr>
<tr bgcolor="'.$r_col.'"><td>'	 .$WORDS[reg_mname].'</td>		<td><input type="text" name="mname" value="'.$HTTP_POST_VARS[mname].'" '.$DESIGN[textbox_reg].'></td></tr>
<tr bgcolor="'.$r_col.'"><td><b>'.$WORDS[reg_email].'</b></td>		<td><input type="text" name="email" '.$DESIGN[textbox_reg].'> <font color="red">*</font></td></tr>
<tr bgcolor="'.$r_col.'"><td><b>'.$WORDS[reg_phone].'</td>		<td><input type="text" name="phone" value="'.$HTTP_POST_VARS[phone].'" '.$DESIGN[textbox_reg].'> <font color="red">*</font></td></tr>
<tr bgcolor="'.$r_col.'"><td><b>'.$WORDS[reg_passwd1].'</b></td>	<td><input type="password" name="pass1" '.$DESIGN[textbox_reg2].'> <font color="red">*</font></td></tr>
<tr bgcolor="'.$r_col.'"><td><b>'.$WORDS[reg_passwd2].'</b></td>	<td><input type="password" name="pass2" '.$DESIGN[textbox_reg2].'> <font color="red">*</font></td></tr>
<tr bgcolor="'.$r_col.'"><td>'	.$WORDS[reg_asknews].'</td>		<td><input type="checkbox" name="news"'.$news_check.'></td></tr>
<tr bgcolor="'.$r_col.'"><td>&nbsp;</td>				<td><input type="button" name="butt" value="'.$WORDS[reg_btn_second_step].'" OnClick="reg_form1(document.forms[\'reg1\']);" '.$DESIGN[btn].'></td></tr>

</form>
 		</table>
    </td></tr>
</table><br>
';
	}

	function REG_form2($before_order,$no) {
		global $MY;
		global $ORDER;
		global $WORDS;
		global $IMAGES;
		global $COLORS;
		global $DESIGN;
		global $CURRENT_POSITION;
		global $HTTP_POST_VARS;

		if($ORDER) {
			# user updates his adress
			$agreement  = $WORDS[reg_make_order];
			$btn_submit = $WORDS[make_order];
			$u = USE_get_user_by_keyid();
			$HTTP_POST_VARS[metro] 		= $u->metro;
			$HTTP_POST_VARS[city] 		= $u->city;
			$HTTP_POST_VARS[postindex]	= $u->postindex;
			$HTTP_POST_VARS[region] 	= $u->region;
			$HTTP_POST_VARS[oblast] 	= $u->oblast;
			$HTTP_POST_VARS[street] 	= $u->street;
			$HTTP_POST_VARS[build]	 	= $u->building;
			$HTTP_POST_VARS[flat] 		= $u->flat;
			$HTTP_POST_VARS[korp] 		= $u->korp;
			$HTTP_POST_VARS[entrance]	= $u->entrance;
			$HTTP_POST_VARS[flour]		= $u->flour;
			$HTTP_POST_VARS[code]	 	= $u->code;
			$HTTP_POST_VARS[cancall_time]	= $u->cancall_time1;
			$HTTP_POST_VARS[cancall_at]	= $u->cancall_time2;
			$HTTP_POST_VARS[deliver_time]	= $u->deliver_time1;
			$HTTP_POST_VARS[deliver_at]	= $u->deliver_time2;
			$HTTP_POST_VARS[additional]	= $u->additional;
		} else {
			$agreement  = $WORDS[reg_step2];
			$btn_submit = $WORDS[reg_btn_finish];
		}
		if($CURRENT_POSITION=='basket') {
		    $w = '442';
		} else {
		    $w = '280';
		}

		$metro	= "\n<option value=\"0\">$WORDS[reg_metro_choose]</option>\n";
		$city	= "\n<option value=\"0\">$WORDS[reg_city_choose]</option>\n";
		
		for($i=1;$i<=count($WORDS[metro]);$i++) {
			$sel = '';
			if($HTTP_POST_VARS[metro]==$i) { $sel = ' selected'; }
			$metro .= "<option value=\"".$i."\"$sel>".$WORDS[metro][$i-1]."</option>\n";
		}

		if(!in_array($HTTP_POST_VARS[city],$WORDS[city])) {
			$HTTP_POST_VARS[city2] = $HTTP_POST_VARS[city];
		}
		$i=1;
		foreach($WORDS[city] as $val) {
			$sel = '';
			if($HTTP_POST_VARS[city]==$val) { $sel = ' selected'; }
			if(!$HTTP_POST_VARS[city] && $val==$WORDS[reg_city_default]) { $sel = ' selected'; }
			$city .= "<option value=\"".$i."\"$sel>".$WORDS[city][$i-1]."</option>\n";
			$i++;
		}
/*
		for($i=0;$i<count($MY[cancall_time]);$i++) {
			$cancall_time .= "<option value=\"".$i."\">".$MY[cancall_time][$i]."</option>\n"; }
		for($i=0;$i<count($MY[deliver_time]);$i++) {
			$deliver_time .= "<option value=\"".$i."\">".$MY[deliver_time][$i]."</option>\n"; }
		for($i=0;$i<count($MY[deliver_at]);$i++) {
			$deliver_at .= "<option value=\"".$i."\">".$MY[deliver_at][$i]."</option>\n"; }
		for($i=0;$i<count($MY[cancall_at]);$i++) {
			$cancall_at .= "<option value=\"".$i."\">".$MY[cancall_at][$i]."</option>\n"; }
*/
		# is this simple registration or user trying to make an order?
		if($before_order) {
			$hid = '<input type="hidden" name="user" value="basket">';
			$hid .='<input type="hidden" name="order" value="1">'; }
		else {
			$hid = '<input type="hidden" name="user" value="register">'; }
		$r_col = $COLORS[admin_table_succession][0];
		if(!$HTTP_POST_VARS[city2]) $HTTP_POST_VARS[city2] = $WORDS[reg_other_city];
return '
<table border=0 width=100% cellpadding=0 cellspacing=0>
	<tr><td align=left colspan=3>
	<img src="'.$IMAGES[panel_reg].'"><img src="'.$IMAGES[empty_center_panel][1].'"
		height=22 width='.$w.'><img src="'.$IMAGES[empty_center_panel][2].'">
	</td></tr>
	<tr><td bgcolor="'.$COLORS[admin_goods_ark].'" valign=top>
 		<table border=0 align=center cellpadding=2 cellspacing=1 width=100%>

<form method="POST" name="reg2">
'.$hid.'
<input type="hidden" name="regstep" value="2">
<input type="hidden" name="regno" value="'.$no.'">
<tr bgcolor="'.$r_col.'"><td colspan=2 align=left>'.$agreement.'</td></tr>
<tr bgcolor="'.$r_col.'"><td><b>'.$WORDS[reg_city].'</b></td>	<td><select name="city" '.$DESIGN[select].'>'.$city.'</select> <input type="text" '.$DESIGN[textbox_reg2].' name="city2" value="'.$HTTP_POST_VARS[city2].'"> <font color="red">*</font></td></tr>
<tr bgcolor="'.$r_col.'"><td>'.$WORDS[reg_metro].'</td>	<td><select name="metro" '.$DESIGN[select].'>'.$metro.'</select></td></tr>
<tr bgcolor="'.$r_col.'"><td>'.$WORDS[reg_postindex].'</td>	<td><input type="text" '.$DESIGN[textbox_reg].' name="postindex" value="'.$HTTP_POST_VARS[postindex].'"></td></tr>
<tr bgcolor="'.$r_col.'"><td>'.$WORDS[reg_oblast].'</td>	<td><input type="text" '.$DESIGN[textbox_reg].' name="oblast" value="'.$HTTP_POST_VARS[oblast].'"></td></tr>
<tr bgcolor="'.$r_col.'"><td>'.$WORDS[reg_region].'</td>	<td><input type="text" '.$DESIGN[textbox_reg].' name="region" value="'.$HTTP_POST_VARS[region].'"></td></tr>
<tr bgcolor="'.$r_col.'"><td><b>'.$WORDS[reg_street].'</b></td>	<td><input type="text" '.$DESIGN[textbox_reg].' name="street" value="'.$HTTP_POST_VARS[street].'"> <font color="red">*</font></td></tr>
<tr bgcolor="'.$r_col.'"><td><b>'.$WORDS[reg_build].'</b></td>	<td><input type="text" '.$DESIGN[textbox_reg2].' name="build" value="'.$HTTP_POST_VARS[build].'"> <font color="red">*</font></td></tr>
<tr bgcolor="'.$r_col.'"><td>'.$WORDS[reg_korp].'</td>	 	<td><input type="text" '.$DESIGN[textbox_reg2].' name="korp" value="'.$HTTP_POST_VARS[korp].'"></td></tr>
<tr bgcolor="'.$r_col.'"><td>'.$WORDS[reg_entrance].'</td>	<td><input type="text" '.$DESIGN[textbox_reg2].' name="entrance" value="'.$HTTP_POST_VARS[entrance].'"></td></tr>
<tr bgcolor="'.$r_col.'"><td>'.$WORDS[reg_code].'</td>	 	<td><input type="text" '.$DESIGN[textbox_reg2].' name="code" value="'.$HTTP_POST_VARS[code].'"></td></tr>
<tr bgcolor="'.$r_col.'"><td>'.$WORDS[reg_flour].'</td>	 	<td><input type="text" '.$DESIGN[textbox_reg2].' name="flour" value="'.$HTTP_POST_VARS[flour].'"></td></tr>
<tr bgcolor="'.$r_col.'"><td><b>'.$WORDS[reg_flat].'</b></td>	<td><input type="text" '.$DESIGN[textbox_reg2].' name="flat" value="'.$HTTP_POST_VARS[flat].'"> <font color="red">*</font></td></tr>
<tr bgcolor="'.$r_col.'"><td>'.$WORDS[reg_additional].'</td>	<td><textarea '.$DESIGN[textarea_simple].' 	name="additional" rows=10 cols=20>'.$HTTP_POST_VARS[additional].'</textarea></td></tr>
<tr bgcolor="'.$r_col.'"><td>&nbsp;</td>			<td><input type="button" '.$DESIGN[btn].' 	name="butt" OnClick="if(document.forms[\'reg2\'].city2.value.length==0 ||  document.forms[\'reg2\'].city2.value==\''.$WORDS[reg_other_city].'\') { document.forms[\'reg2\'].city2.value=\'\'; } reg_form2(document.forms[\'reg2\']);" value="'.$btn_submit.'"></td></tr>
</form>
 		</table>
    </td></tr>
</table><br>
';
	}

?>