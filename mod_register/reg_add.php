<?

	function REG_add1() {
		global $SESSION;
		global $HTTP_POST_VARS;
		$out = $SESSION[key_id];
		#if($HTTP_POST_VARS[sex]=='on')		{ $sex = 'm'; } else { $sex = 'f'; }
		#if($HTTP_POST_VARS[org_type]==1) 	{ $org = 'j'; } else { $org = 'p'; }
		$sex=0;
		$org=0;
		if($HTTP_POST_VARS[news]=='on') { $news= '1'; } else { $news= '0'; }
		#$birth = $HTTP_POST_VARS[bd].'/'.$HTTP_POST_VARS[bm].'/'.$HTTP_POST_VARS[by];
		$birth	= 0;
		$curtime = get_time();
		mysql_query("INSERT INTO S_users(filled,
						 first_name, 
						 last_name,
						 middle_name,
						 email,
						 sex,
						 passwd, 
						 phone, 
						 org_type, 
						 birth_date, 
						 want_news,
						 city,postindex,region,oblast,street,building,flat,metro,create_time) VALUES(
									0,	
						  			'$HTTP_POST_VARS[fname]',
						  			'$HTTP_POST_VARS[lname]',
									'$HTTP_POST_VARS[mname]',
						  			'$HTTP_POST_VARS[email]',
						  			'$sex',
						  			'$HTTP_POST_VARS[pass1]',
						  			'$HTTP_POST_VARS[phone]',
						  			'$org',
						  			'$birth',
						  			'$news',
									'','','','','','','','',
									'$curtime')
						 ") || $out =0;

		if($out) {
			$res = mysql_query("SELECT id FROM S_users WHERE
						email='$HTTP_POST_VARS[email]' and passwd='$HTTP_POST_VARS[pass1]'
						and filled=0");
			$row = mysql_fetch_row($res);
			if($row[0]) {
				KEY_reg_user_on_current_session($SESSION[key_id],$row[0]); }
		}
		return $out;
	}


	function REG_add2() {
		global $MY;
		global $WORDS;
		global $ORDER;
		global $SESSION;
		global $HTTP_POST_VARS;
		$out = $HTTP_POST_VARS[regno]; 
		$uid = $SESSION[user_id];
		$deliver = $MY[deliver_time][$HTTP_POST_VARS[deliver_time]].' '.
			   $MY[deliver_at][$HTTP_POST_VARS[deliver_at]];
		$res = mysql_query("SELECT filled FROM S_users WHERE id=$uid");
		$row = mysql_fetch_row($res);
		if(!$HTTP_POST_VARS[city2]) {
			$city = $WORDS[city][$HTTP_POST_VARS[city]-1];
		} else {
			$city = $HTTP_POST_VARS[city2];
		}

		if($row[0]==0 || $ORDER) {
			# user updates himself
			if($ORDER) { $filled = ''; }
			else	   { $filled = 'filled=0 and'; }

			mysql_query("UPDATE S_users SET 
						filled	=	1,
						city	=	'$city',
						postindex=	'$HTTP_POST_VARS[postindex]',
						region	=	'$HTTP_POST_VARS[region]',
						oblast	=	'$HTTP_POST_VARS[oblast]',
						street	=	'$HTTP_POST_VARS[street]',
						building=	'$HTTP_POST_VARS[build]',
						flat	=	'$HTTP_POST_VARS[flat]',
						korp	=	'$HTTP_POST_VARS[korp]',
						entrance=	'$HTTP_POST_VARS[entrance]',
						flour	=	'$HTTP_POST_VARS[flour]',
						code	=	'$HTTP_POST_VARS[code]',
						metro	=	'$HTTP_POST_VARS[metro]',
						cancall_time1=	'$HTTP_POST_VARS[cancall_time]',
						cancall_time2=	'$HTTP_POST_VARS[cancall_at]',
						deliver_time1=	'$HTTP_POST_VARS[deliver_time]',
						deliver_time2=	'$HTTP_POST_VARS[deliver_at]',
						additional  =	'$HTTP_POST_VARS[additional]'
						WHERE $filled id=$uid")
			|| die('Cant update user info by his uid');
		} else {
			$out=0;
		}

		if($out) {
			KEY_open_access($SESSION[key_id]);	 /* ############CAN BE HACKEd??? */
		}
		return $out;
	}



?>