<?
	include('mod_user/user_info.php');
	include('mod_goods/goods_show.php');

	if($HTTP_GET_VARS[id]) {
		$PARTS[center_up] = ADM_show_users_by_letter();
	} else {
		$PARTS[center_up] = ADM_show_last_users();
		$PARTS[center_up] .= ADM_show_users_preface();
	}




	function ADM_show_users_by_letter() {
		global $WORDS;
		global $IMAGES;
		global $COLORS;
		global $HTTP_GET_VARS;
		settype($HTTP_GET_VARS[id],'integer');
		$ll = $HTTP_GET_VARS[id]-1;
		foreach($WORDS[first_letters][$ll] as $l) {
			if($sqlstr)	{$o ='OR';}
			$sqlstr .= "$o ORD(UCASE(SUBSTRING(REVERSE(first_name),LENGTH(first_name))))=ORD('$l') ";
		}
		$tmp = mysql_query("SELECT id,first_name,middle_name,last_name,email,metro,create_time,want_news FROM S_users WHERE $sqlstr");
		while($res= mysql_fetch_object($tmp)) {
			$ui = USE_get_user_order_items($res->id);
			$us = GOO_round_size(USE_get_user_order_size($res->id));
			if(!$ui) {$ui='';}
			if(!$us) {$us='';}
			$body .= "<tr bgcolor=\"$COLORS[table_body_bgcolor]\"><td>&nbsp;$res->first_name</td><td>&nbsp;$res->middle_name</td>".
				 "<td>&nbsp;$res->last_name</td><td>&nbsp;$res->email</td><td>&nbsp;".$WORDS[metro][$res->metro-1]."</td>".
				"<td>$ui</td><td>$us</td><td>$res->want_news</td><td>&nbsp;$res->create_time</td></tr>";
		}
		return SKIN_table($IMAGES[panel_new],618,"<td>$WORDS[reg_fname]</td><td>&nbsp;$WORDS[reg_mname]</td>".
			"<td>&nbsp;$WORDS[reg_lname]</td><td>$WORDS[reg_email]</td><td>$WORDS[reg_metro]</td><td>$WORDS[order_items]</td>".
			"<td>$WORDS[order_size]</td><td>$WORDS[user_want_news]</td><td>$WORDS[reg_created]</td>",$body);
	}

	function ADM_show_last_users() {
		global $WORDS;
		global $IMAGES;
		global $COLORS;
		$tmp = mysql_query("SELECT id,first_name,last_name,email,create_time,want_news FROM S_users ORDER BY id DESC LIMIT 0,10");
                while($res= mysql_fetch_object($tmp)) {
			$ui = USE_get_user_order_items($res->id);
			$us = GOO_round_size(USE_get_user_order_size($res->id));
                        if(!$ui) {$ui='';}
			if(!$us) {$us='';}
			$body .= "<tr bgcolor=\"$COLORS[table_body_bgcolor]\"><td>&nbsp;$res->first_name</td>".
				 "<td>&nbsp;$res->last_name</td><td>&nbsp;$res->email</td>".
				 "<td>$ui</td><td>$us</td><td>$res->want_news</td><td>&nbsp;$res->create_time</td></tr>";

		}

		return SKIN_table($IMAGES[panel_new],618,"<td>$WORDS[reg_fname]</td><td>&nbsp;$WORDS[reg_lname]</td>".
			"<td>$WORDS[reg_email]</td><td>$WORDS[order_items]</td><td>$WORDS[order_size]</td><td>$WORDS[user_want_news]</td><td>$WORDS[reg_created]</td>",$body);

	
	}


	function ADM_show_users_preface() {
		global $WORDS;
		global $IMAGES;
		global $COLORS;
		$i=0;
		
		foreach($WORDS[first_letters] as $val) {
			$i++;
			unset($sqlstr);
			unset($o);
			unset($f);
			foreach($val as $l) {
				if($sqlstr)	{$o ='OR';}
				if($others)	{$a ='AND';}
				if(!$f)		{$f =$l;  }
				$sqlstr .= "$o ORD(UCASE(SUBSTRING(REVERSE(first_name),LENGTH(first_name))))=ORD('$l') ";
				$others .= "$a ORD(UCASE(SUBSTRING(REVERSE(first_name),LENGTH(first_name))))!=ORD('$l') ";
			}
			$res = mysql_fetch_row(
				    mysql_query("SELECT COUNT(id) FROM S_users WHERE $sqlstr") );
			$res1 = mysql_fetch_row(
				    mysql_query("SELECT create_time FROM S_users WHERE $sqlstr ORDER BY id DESC LIMIT 0,1") );
			$body .= "<tr bgcolor=\"$COLORS[table_body_bgcolor]\"><td><a href=\"?admin=users&id=$i\">$f</a></td><td>$res[0]</td><td>&nbsp;$res1[0]</td></tr>";
		}
		# others info
		$res = mysql_fetch_row(
			    mysql_query("SELECT COUNT(id) FROM S_users WHERE $others") );
		$res1 = mysql_fetch_row(
			    mysql_query("SELECT create_time FROM S_users WHERE $others ORDER BY id DESC LIMIT 0,1") );
		$body .= "<tr bgcolor=\"$COLORS[table_body_bgcolor]\"><td>$WORDS[others]</td><td>$res[0]</td><td>&nbsp;$res1[0]</td></tr>";

		# info about all
		$res = mysql_fetch_row(
			    mysql_query("SELECT COUNT(id) FROM S_users") );
		$res1 = mysql_fetch_row(
				    mysql_query("SELECT create_time FROM S_users ORDER BY id DESC LIMIT 0,1") );
		
		$body .= "<tr bgcolor=\"$COLORS[table_captions_bgcolor]\"><td><b>$WORDS[itogo]</b></td><td><b>$res[0]</b></td><td><b>&nbsp;$res1[0]</b></td></tr>";
		return SKIN_table($IMAGES[panel_new],618,"<td>$WORDS[abc]</td><td>$WORDS[amount]</td><td>$WORDS[last_reg_time]</td>",$body);
	}



?>
