<?
	function KEY_authenticate() {
		global $SESSION;
		global $HTTP_COOKIE_VARS;
		$keyid = KEY_test_subnet();				# test ip adress of session and get key ID
		$SESSION[key_id] = $keyid;
		$SESSION[key]	 = $HTTP_COOKIE_VARS[k];
		$SESSION[user_id]= KEY_get_userid_by_session($keyid);
		if(strlen($HTTP_COOKIE_VARS[k])==100 && $keyid) {
			$working = KEY_test_work_time($keyid);		# user is browsing now ?
			if(!$working) {
				KEY_update_time($keyid);	# user has quited some time ago, he is NOT authorized
			} else {
				$authorized = KEY_test_auth($keyid);	# did user passed through passwd authentication?
			}
			if($authorized) {				 # user is fully authorized
				$SESSION[is_open] = 1;
				
			}
			
		} else { KEY_set(); }
		
	}

	function KEY_set() {
		global $REMOTE_ADDR;
		$ok = 0;
		while(!$ok) {
			$key = KEY_generate();
			$res = @mysql_query("SELECT id FROM S_keys WHERE rand_key='$key'");
			$row = @mysql_fetch_row();
			if(!$row[0]) { $ok=1; }
		}
		$sn = explode('.',$REMOTE_ADDR);
		$act_time = time();
		mysql_query("INSERT INTO S_keys(rand_key,act_time,is_open,user_id,ip_subnet1,ip_subnet2,ip_subnet3) 
					 VALUES('$key','$act_time',0,0,'$sn[0]','$sn[1]','$sn[2]')")
		|| die('Cant register new key!');
		setcookie("k", $key, time()+31536000*5);
	}

	function KEY_generate() {
		srand ((double) microtime() * 1000000);
		for($i=0;$i<100;$i++) {
			$w = rand(0,2);
			if	($w==0) { $random_key .= rand(0,9);		}
			elseif	($w==1) { $random_key .= chr(rand(65,90));	}
			else		{ $random_key .= chr(rand(97,122));	}
		}
		return $random_key;
	}

	function KEY_test_subnet() {
		global $REMOTE_ADDR;
		global $HTTP_COOKIE_VARS;
		$subnet = explode('.',$REMOTE_ADDR);
		$res= @mysql_query("SELECT ip_subnet1,ip_subnet2,ip_subnet3,id,user_id FROM S_keys WHERE
										rand_key='$HTTP_COOKIE_VARS[k]'");
		$row= mysql_fetch_row($res);
		if(	$subnet[0] == $row[0] &&
			$subnet[1] == $row[1] &&
			$subnet[2] == $row[2]) { return $row[3]; }
		else { return 0; }
	}

	function KEY_test_work_time($keyid) {
		global $MY;
		$cur_time = time()-$MY[time_per_session];	# session is open only for 2 hours
		$res = @mysql_query("SELECT id FROM S_keys WHERE id=$keyid and act_time>=$cur_time");
		$row = @mysql_fetch_row($res);
		if($row[0]) { return 1; }
		else 	    { return 0; }
	}

	function KEY_test_auth($keyid) {
		$res = @mysql_query("SELECT is_open FROM S_keys WHERE id=$keyid");
		$row = @mysql_fetch_row($res);
		if($row[0]==1) { return 1; }
		else 	       { return 0; }
	}

	function KEY_update_time($keyid) {
		$curtime = time();
		mysql_query("UPDATE S_keys SET act_time='$curtime', is_open=0, user_id=0 WHERE id=$keyid");
#		|| die('Cant update time from last action');
	}

	function KEY_open_access($keyid) {
		global $SESSION;
		$SESSION[is_open] = 1;
		mysql_query("UPDATE S_keys SET is_open=1 WHERE id=$keyid")
		|| die('Cant open access');
	}
	
	function KEY_get_userid_by_session($keyid) {
		$res = @mysql_query("SELECT user_id FROM S_keys WHERE id=$keyid");
		$row = @mysql_fetch_row($res);
		if($row[0]>0) {
			return $row[0];
		} else {
			return 0; }
	}

	function KEY_reg_user_on_current_session($keyid,$userid) {
		mysql_query("UPDATE S_keys SET user_id='$userid' WHERE id=$keyid")
		|| die('Cant register user on current session');
	}



?>