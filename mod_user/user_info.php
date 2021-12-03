<?

	function USE_remind_password() {
	    global $WORDS;
	    global $HTTP_GET_VARS;
	    $tmp = mysql_query("SELECT id,first_name,middle_name,email,passwd FROM S_users WHERE email='$HTTP_GET_VARS[email]'");
	    $res = mysql_fetch_object($tmp);
	    if($res->id) {
		    mail($res->email, $WORDS[remind_subject],
			"$WORDS[remind_msg_hello] $res->first_name $res->middle_name,\n".
			"$WORDS[remind_msg_we]\n".
			"$WORDS[remind_msg_login] $res->login\n",
			"$WORDS[remind_msg_passwd] $res->passwd\n",
			"$WORDS[remind_msg_bye]\n",
			"From: $WORDS[remind_from]");
	    }
	}
	
	function USE_get_user_info() {
		global $SESSION;
		if($SESSION[is_open] && $SESSION[user_id]) {
			$res = mysql_query("SELECT * FROM S_users WHERE id=$SESSION[user_id]");
			$row = mysql_fetch_object($res);
			$MYINFO[authorized]	= 1;
			$MYINFO[first_name]	= $row->first_name;
			$MYINFO[middle_name]	= $row->middle_name;
			$MYINFO[last_name]	= $row->last_name;
		}
		return $MYINFO;
	}

	function USE_get_user_order_items($user_id) {
		$tmp = mysql_query("SELECT SUM(amount) FROM S_basket WHERE user_id=$user_id");
		$res =  mysql_fetch_array($tmp);
		return $res[0];
	}

	function USE_get_user_order_size($user_id) {
		$size = 0;
		$tmp = mysql_query("SELECT product_id,level_id FROM S_basket WHERE user_id=$user_id");
		while($res = mysql_fetch_object($tmp)) {
			if($res->product_id > 0) {
				$size += GOO_get_item_size(0,$res->product_id);
			} elseif($res->level_id > 0) {
				$size += GOO_get_item_size(1,$res->level_id);
			}
		}
		return $size;
	}



?>
